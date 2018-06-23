<?php
 class MemberlevelModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getSearch($search){
		$sql = "";
		if (!empty($search['active_code'])) {
			$sql .= " AND ml.active_code = '".$search['active_code']."' ";
		}
		if (!empty($search['member_id'])) {
			$sql .= " AND ml.member_id = '".$search['member_id']."' ";
		}
		if (!empty($search['time_use'])) {
			$sql .= " AND ml.time_use = '".$search['time_use']."' ";
		}
		if (isset($search['active_status']) && $search['active_status'] !== '') {
			$sql .= " AND ml.active_status = '".$search['active_status']."' ";
		}
		if (isset($search['paid_status']) && $search['paid_status'] !== '') {
			$sql .= " AND ml.paid_status = '".$search['paid_status']."' ";
		}
		if (isset($search['no_dup']) && $search['no_dup'] === '1') {
			$sql .= " AND ml.is_new = '1' ";
		}
		else {
			
		}
		if (!empty($search['level'])) {
			$sql .= " AND ml.level = '".$search['level']."' ";
		}
		return $sql;
	}
	function getList($search,$page,$numrows){
		$search = $this->getSearch($search);
		$sql = "SELECT ml.*, m.`fullname`, sp.`name`
				FROM ivt_member_level ml
				INNER JOIN ivt_member m ON m.id = ml.`member_id`
				INNER JOIN `ivt_service_price` sp ON sp.`level` = ml.`level`
				WHERE 1 $search
				ORDER BY ml.datecreate DESC";
		   
        $sql.= ' limit '.$page.','.$numrows;
		
		return $this->model->query($sql)->execute();
	}
	function getTotal($search){
		$search = $this->getSearch($search);
		$sql = "SELECT count(1) as total
				FROM ivt_member_level ml
				INNER JOIN ivt_member m ON m.id = ml.`member_id`
				INNER JOIN `ivt_service_price` sp ON sp.`level` = ml.`level`
				WHERE 1 $search";
		$query = $this->model->query($sql)->execute();
		if(empty($query[0]->total)){
			return 0;
		}
		else{
			return $query[0]->total;
		}
	}
	function updateActiveStatus() {
		$date = gmdate('Y-m-d H:i:s', time() + 3600*7);
		$sql = "UPDATE ivt_member_level
				SET active_status = 2
				WHERE active_status = 1 
				AND to_date < '$date'";
		$this->model->executeQuery($sql);
	}
	
}