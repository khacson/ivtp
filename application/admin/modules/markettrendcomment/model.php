<?php
 class MarkettrendcommentModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function markettrendType(){
		$query = $this->model->table('ivt_markettrendcatalog')
				 ->select('id,catalog_name')
				 ->where('isdelete',0)
				 ->order_by('ordering')
				 ->find_all();
		return $query;
	}
	function getSearch($search){
		$sql = "";
		if (!empty($search['fullname'])) {
			$sql .= " AND mc.fullname LIKE '%".$search['fullname']."%' ";
		}
		if (!empty($search['phone'])) {
			$sql .= " AND mc.phone LIKE '%".$search['phone']."%' ";
		}
		if (!empty($search['title'])) {
			$sql .= " AND m.title LIKE '%".$search['description']."%' ";
		}
		return $sql;
	}
	function getList($search,$page,$numrows){
		$sql = "SELECT mc.*, m.title
				FROM ivt_markettrend_comment mc
                left join ivt_markettrend m on m.id = mc.blogid
                WHERE 0 = 0";
		$sql.= $this->getSearch($search);
                if(empty($search['order'])){
			$sql .= " ORDER BY mc.id desc ";
		}
		else{
			$sql.= " ORDER BY ".$search['order']." ".$search['index']." ";
		} 
        $sql.= ' limit '.$page.','.$numrows;
		return $this->model->query($sql)->execute();
	}
	function getTotal($search){
		$sql = " SELECT COUNT(1) AS total
				FROM ivt_markettrend_comment mc
				WHERE 0 = 0
				";
		$sql.= $this->getSearch($search);
		$query = $this->model->query($sql)->execute();
		if(empty($query[0]->total)){
			return 0;
		}
		else{
			return $query[0]->total;
		}
	}
	function detail($id){
		$query = $this->model->table('ivt_markettrend')
				 ->select('*')
				 ->where('isdelete',0)
				 ->where('id',$id)
				 ->find();
		if(!empty($query->id)){
			return $query;
		}
		else{
			return $this->getNone();
		}
	}
	function getNone(){
		$sql = "
		SELECT column_name,column_default
		FROM information_schema.columns
		WHERE table_name='ivt_markettrend'; 
		";
		//column_name
		$query = $this->model->query($sql)->execute();
		$obj = new stdClass();
		foreach($query as $item){
			$clm = $item->column_name;
			$obj->$clm = $item->column_default;
		}
		return $obj;
	}
}