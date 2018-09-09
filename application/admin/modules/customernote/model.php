<?php
 class CustomernoteModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->login = $this->admin->getSession('login');
	}
	function getSearch($search){
		$sql = "";
		if (!empty($search['user_id'])) {
			$sql .= " AND c.user_id = '".$search['user_id']."' ";
		}
		if (!empty($search['member_id'])) {
			$sql .= " AND c.member_id = '".$search['member_id']."' ";
		}
		unset($search['user_id']);
		unset($search['member_id']);
		
		foreach ($search as $k=>$v) {
			if (!empty($v)) {
				$sql .= " AND c.rows LIKE '%\"$k\":\"$v\"%'";
			}
		}
		if ($this->login->groupid != 1) {
			$sql .= " AND c.user_id = '".$this->login->id."' ";
		}
		else if ($this->login->groupid == 1 && !empty($this->login->view_user_id)){
			$sql .= " AND c.user_id = '".$this->login->view_user_id."' ";
		}
		return $sql;
	}
	function getList($search,$page,$numrows){
		$sql = "SELECT c.*, u.username, m.fullname
				FROM ivt_customernote_row c
				INNER JOIN ivt_users u ON u.id = c.user_id
				LEFT JOIN ivt_member m ON m.id = c.member_id
				WHERE c.isdelete = 0";
		$sql.= $this->getSearch($search);
		$sql .= " ORDER BY c.user_id, c.member_id, c.datecreate";   
        $sql.= ' limit '.$page.','.$numrows;
		//echo $sql;die;
		return $this->model->query($sql)->execute();
	}
	function getTotal($search){
		$sql = "SELECT count(1) as total
				FROM ivt_customernote_row c
				INNER JOIN ivt_users u ON u.id = c.user_id
				LEFT JOIN ivt_member m ON m.id = c.member_id
				WHERE c.isdelete = 0 ";
		$sql.= $this->getSearch($search);
		$query = $this->model->query($sql)->execute();
		if(empty($query[0]->total)){
			return 0;
		}
		else{
			return $query[0]->total;
		}
	}
	function getAllCol($user_id, $show_hidden = 0) {
		$show = "";
		if ($show_hidden == 0) {
			 $show = " AND isshow = 1";
		}
		$sql = "SELECT * FROM ivt_customernote_col 
				WHERE user_id = '$user_id' AND isdelete = 0 $show
				ORDER BY col_order"; //echo $sql;die;
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
	function saves($array){
		 $result = $this->model
						->table('ivt_customernote_row')
						->insert($array);	
		 return $result;
	}
	function edits($array,$id){
		 $result = $this->model->table('ivt_customernote_row')->save($id,$array);	
		 return $result;
	}
	function getUserListHasNote() {
		$sql = "SELECT u.* FROM ivt_customernote_row r 
				INNER JOIN ivt_users u ON u.id = r.user_id
				WHERE r.isdelete = 0
				GROUP BY u.id
				ORDER BY fullname";
        return $this->model->query($sql)->execute();
	}
	
	
}