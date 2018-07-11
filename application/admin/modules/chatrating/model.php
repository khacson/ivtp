<?php
 class ChatratingModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function create_temp_table($search) {
		$where = '';
		if (!empty($search['from_date'])) {
			$from_date = $this->base_model->formatDate($search['from_date']);
			$where .= " AND c.datecreate >= '$from_date'";
		}
		if (!empty($search['to_date'])) {
			$to_date = $this->base_model->formatDate($search['to_date']);
			$where .= " AND c.datecreate < '$to_date 23:59:59'";
		}
		$sql = "DROP TABLE IF EXISTS ivt_chat_rating_rank_temp;";
		$this->model->executeQuery($sql);
		
		$sql = "CREATE TEMPORARY TABLE ivt_chat_rating_rank_temp (
				id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
				user_id  INT(11),
				username VARCHAR(100),
				fullname VARCHAR(100),
				rank INT(11),
				point INT(11)
				) ENGINE=INNODB DEFAULT CHARSET=utf8;";
		$this->model->executeQuery($sql);
		
		$sql = "INSERT INTO ivt_chat_rating_rank_temp (user_id, username, fullname, point) 
				SELECT u.id, u.username, u.fullname, SUM(s.point) AS point
				FROM ivt_users_chat c
				INNER JOIN ivt_users u ON u.id = c.user_id
				INNER JOIN ivt_star s ON s.id = c.star
				WHERE c.last_response IS NOT NULL AND u.groupid = 2 $where
				GROUP BY c.user_id
				ORDER BY point DESC;";
		$this->model->executeQuery($sql);	
		
		//update ranking
		$sql = "UPDATE ivt_chat_rating_rank_temp SET rank = id;";
		$this->model->executeQuery($sql);
		
		//update ranking for duplicate point
		$sql = "SELECT point, rank FROM ivt_chat_rating_rank_temp
				GROUP BY point HAVING COUNT(point) > 1";
		$rs = $this->model->query($sql)->execute();
		foreach ($rs as $item) {
			$point = $item->point;
			$rank = $item->rank;
			$sql = "UPDATE ivt_chat_rating_rank_temp 
					SET rank = $rank
					WHERE point = $point;";
			$this->model->executeQuery($sql);
		}
	}
	function getSearch($search){
		$sql = "";
		if (!empty($search['user_id'])) {
			$sql .= " AND tmp.user_id = '".$search['user_id']."' ";
		}
		$login = $this->admin->getSession('login');
		if ($login->grouptype != 0) {
			$sql .= " AND tmp.user_id = ".$login->id;
		}
		return $sql;
	}
	function getList($search,$page,$numrows){
		$this->create_temp_table($search);
		$search = $this->getSearch($search);
		$sql = "SELECT *
				FROM ivt_chat_rating_rank_temp tmp
				WHERE 1 $search";  
        $sql.= ' limit '.$page.','.$numrows;
		
		return $this->model->query($sql)->execute();
	}
	function getTotal($search){
		$search = $this->getSearch($search);
		$sql = "SELECT count(1) as total
				FROM ivt_chat_rating_rank_temp tmp
				WHERE 1 $search";
		$query = $this->model->query($sql)->execute();
		return $query[0]->total;
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