<?php
 class ChatratingModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getSearch($search){
		$sql = "";
		if (!empty($search['user_id'])) {
			$sql .= " AND c.user_id = '".$search['user_id']."' ";
		}
		if (!empty($search['from_date'])) {
			$from_date = $this->base_model->formatDate($search['from_date']);
			$sql .= " AND c.datecreate >= '$from_date'";
		}
		if (!empty($search['to_date'])) {
			$to_date = $this->base_model->formatDate($search['to_date']);
			$sql .= " AND c.datecreate < '$to_date 23:59:59'";
		}
		return $sql;
	}
	function getList($search,$page,$numrows){
		$search = $this->getSearch($search);
		$sql = "SELECT u.id, u.username, u.fullname, SUM(s.point) as point
				FROM ivt_users_chat c
				INNER JOIN ivt_users u ON u.id = c.user_id
				INNER JOIN ivt_star s ON s.id = c.star
				WHERE c.last_response IS NOT NULL $search
				GROUP BY c.user_id";
		if(empty($search['order'])){
			$sql .= " ORDER BY u.username ";
		}
		else{
			$sql.= " ORDER BY ".$search['order']." ".$search['index']." ";
		}   
        $sql.= ' limit '.$page.','.$numrows;
		
		return $this->model->query($sql)->execute();
	}
	function getTotal($search){
		$search = $this->getSearch($search);
		$sql = "SELECT 1
				FROM ivt_users_chat c
				INNER JOIN ivt_users u ON u.id = c.user_id
				INNER JOIN ivt_star s ON s.id = c.star
				WHERE c.last_response IS NOT NULL $search
				GROUP BY c.user_id";
		$query = $this->model->query($sql)->execute();
		return count($query);
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