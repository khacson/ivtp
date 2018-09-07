<?php
 class CustomernoteModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getSearch($search){
		$sql = "";
		if (!empty($search['user_id'])) {
			$sql .= " AND c.user_id = '".$search['user_id']."' ";
		}
		if (!empty($search['member_id'])) {
			$sql .= " AND c.member_id = '".$search['member_id']."' ";
		}
		if (!empty($search['star'])) {
			$sql .= " AND c.star = '".$search['star']."' ";
		}
		if (!empty($search['chat_code'])) {
			$sql .= " AND c.chat_code LIKE '%".$search['chat_code']."%' ";
		}
		if (!empty($search['status'])) {
			if ($search['status'] == 1) {
				$sql .= " AND TIMESTAMPDIFF(MINUTE,last_response_utc,UTC_TIMESTAMP()) < 30";
			}
			else {
				$sql .= " AND TIMESTAMPDIFF(MINUTE,last_response_utc,UTC_TIMESTAMP()) > 29";
			}
		}
		$login = $this->admin->getSession('login');
		if ($login->grouptype != 0) {
			$sql .= " AND c.user_id = '".$login->id."'";
		}
		return $sql;
	}
	function getList($search,$page,$numrows){
		$sql = "SELECT c.member_id, c.chat_code, c.star, c.note, c.last_response, u.username, u.fullname as u_fullname, m.fullname as m_fullname
				FROM ivt_users_chat c
				INNER JOIN ivt_users u ON u.id = c.user_id
				LEFT JOIN ivt_member m ON m.id = c.member_id
				WHERE c.last_response IS NOT NULL ";
		$sql.= $this->getSearch($search);
		if(empty($search['order'])){
			$sql .= " ORDER BY c.last_response DESC ";
		}
		else{
			$sql.= " ORDER BY ".$search['order']." ".$search['index']." ";
		}   
        $sql.= ' limit '.$page.','.$numrows;
		
		return $this->model->query($sql)->execute();
	}
	function getTotal($search){
		$sql = "SELECT count(1) as total
				FROM ivt_users_chat c
				INNER JOIN ivt_users u ON u.id = c.user_id
				LEFT JOIN ivt_member m ON m.id = c.member_id
				WHERE c.last_response IS NOT NULL ";
		$sql.= $this->getSearch($search);
		$query = $this->model->query($sql)->execute();
		if(empty($query[0]->total)){
			return 0;
		}
		else{
			return $query[0]->total;
		}
	}
	function getChatHistory($chat_code) {
		if (empty($chat_code)) {
			return array();
		}
		$rs = $this->model->table('ivt_users_chat_detail')
					->select('*')
					->where('chat_code', $chat_code)
					->find_all();
		return $rs;
	}
	function clearEmptyChat() {
		$date = gmdate('Y-m-d H:i:s', strtotime('-1 days'));
		$sql = "DELETE FROM ivt_users_chat 
				WHERE last_response_utc IS NULL 
				AND datecreate < '$date'";
		$this->model->executeQuery($sql);
	}
	function getAllCol($user_id) {
		$sql = "SELECT * FROM ivt_customernote_col 
				WHERE user_id = $user_id AND isdelete = 0
				ORDER BY col_order";
		$rs = $this->model->query($sql)->execute();
		return $rs;
	}
	function getMaxOrder($user_id) {
		$sql = "SELECT (COALESCE(MAX(col_order), 0) + 1) AS max_order 
				FROM ivt_customernote_col 
				WHERE user_id = $user_id AND isdelete = 0";
		$rs = $this->model->query($sql)->execute();
		return $rs[0]->max_order;
	}
	function moveUp($id){
		//find all sibling
		$sql = "SELECT id, col_order
				FROM ivt_customernote_col
				WHERE isdelete = 0
				AND user_id = (
					SELECT user_id
					FROM ivt_customernote_col
					WHERE id = $id
				)
				ORDER BY col_order";
		$rs = $this->model->query($sql)->execute();
		$idMin = 0;
		$index = 0;
		if(isset($rs[0])){
			$idMin = $rs[0]->id;
			foreach($rs as $k=>$item){
				if($item->id == $id){
					$index = $k;
					break;
				}
			}
		}
		if($id == $idMin){
			return 'min-order';
		}
		//update col_order
		$array['col_order'] = $rs[$index - 1]->col_order;
		
		$this->model->table('ivt_customernote_col')
					->where('id', $id)
					->update($array);
		
		$array['col_order'] = $rs[$index]->col_order;
		$this->model->table('ivt_customernote_col')
					->where('id', $rs[$index - 1]->id)
					->update($array);
		return 'ok';
	}
	function moveDown($id){
		//find all sibling
		$sql = "SELECT id, col_order
				FROM ivt_customernote_col
				WHERE isdelete = 0
				AND user_id = (
					SELECT user_id
					FROM ivt_customernote_col
					WHERE id = $id
				)
				ORDER BY col_order";
		$rs = $this->model->query($sql)->execute();
		$idMax = 0;
		$index = 0;
		if(isset($rs[0])){
			foreach($rs as $k=>$item){
				$idMax = $item->id;
				if($item->id == $id){
					$index = $k;
				}
			}
		}
		if($id == $idMax){
			return 'max-order';
		}
		//update col_order
		$array['col_order'] = $rs[$index + 1]->col_order;
		
		$this->model->table('ivt_customernote_col')
					->where('id', $id)
					->update($array);
		
		$array['col_order'] = $rs[$index]->col_order;
		$this->model->table('ivt_customernote_col')
					->where('id', $rs[$index + 1]->id)
					->update($array);
		return 'ok';
	}
}