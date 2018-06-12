<?php
 class ChathistoryModel extends CI_Model{
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
		return $sql;
	}
	function getList($search,$page,$numrows){
		$sql = "SELECT c.member_id, c.chat_code, c.star, c.note, c.last_response, u.username, u.fullname as u_fullname, m.fullname as m_fullname
				FROM ivt_users_chat c
				INNER JOIN ivt_users u ON u.id = c.user_id
				INNER JOIN ivt_member m ON m.id = c.member_id
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
				INNER JOIN ivt_member m ON m.id = c.member_id
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
}