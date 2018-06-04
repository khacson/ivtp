<?php
 class IncreasecatalogModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function investmentType(){
		$query = $this->model->table('ivt_investmentcatalog')
				 ->select('id,catalog_name')
				 ->where('isdelete',0)
				 ->order_by('ordering')
				 ->find_all();
		return $query;
	}
	function getSearch($search){
		$sql = "";
		if (!empty($search['title'])) {
			$sql .= " AND title LIKE '%".$search['title']."%' ";
		}
		return $sql;
	}
	function getList(){
		$sql = "SELECT *
				FROM ivt_increase_catalog
				WHERE isdelete = 0 AND mcp IS NOT NULL";
		return $this->model->query($sql)->execute();
	}
	function getTotal($search){
		$sql = " SELECT COUNT(1) AS total
				FROM ivt_investment
				WHERE isdelete = 0 ";
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
		$query = $this->model->table('ivt_investment')
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
		WHERE table_name='ivt_investment'; 
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
	function saves($array){
		 $check = $this->model->table('ivt_investment')
		 ->select('id')
		 ->where('isdelete',0)
		 ->where('title',$array['title'])
		 ->find();
		 if(!empty($check->id)){
			 return -1;	
		 }
		 $result = $this->model
						->table('ivt_investment')
						->insert($array);	
		 return $result;
	}
	function edits($array,$id){
		 $check = $this->model->table('ivt_investment')
		 ->select('id')
		 ->where('isdelete',0)
		 ->where('title',$array['title'])
		 ->where('id <>',$id)
		 ->find();
		 if(!empty($check->id)){
			 return -1;	
		 }//print_r($array);exit;
		 $result = $this->model->table('ivt_investment')->save($id,$array);	
		 return $result;
	}
	function clearOldData() {
		$sql = 'TRUNCATE ivt_increase_catalog_title';
		$this->model->executeQuery($sql);
		
		$sql = 'TRUNCATE ivt_increase_catalog_detail';
		$this->model->executeQuery($sql);
		
		$sql = 'TRUNCATE ivt_increase_catalog';
		$this->model->executeQuery($sql);
	}
	function insertTitle($arrTitle, $username, $datecreate, $type) {
		$array['type'] = $type;
		$array['titles'] = json_encode($arrTitle, JSON_UNESCAPED_UNICODE);
		$array['datecreate'] = $datecreate;
        $array['usercreate'] = $username;
		$this->model
			->table('ivt_increase_catalog_title')
			->insert($array);
	}
	function getParentId() {
		$data = $this->model->table('ivt_increase_catalog')
		 ->where('isdelete',0)
		 ->where('mcp IS NOT NULL')
		 ->find_combo('mcp', 'id');
		 return $data;
	}
	function getTitles($type) {
		$data = $this->model->table('ivt_increase_catalog_title')
				->select('titles')
				->where('isdelete',0)
				->where('type',$type)
				->find();
		$arr = json_decode($data->titles, true);
		if (!is_array($arr)) {
			$arr = array();
		}
		return $arr;
	}
	function get_inc_des_avg() {
		$data = $this->model->table('ivt_increase_catalog')
				->select('inc_des_avg')
				->where('isdelete',0)
				->where('inc_des_avg IS NOT NULL')
				->find();
		return $data->inc_des_avg;
	}
	function getMcp($id) {
		$data = $this->model->table('ivt_increase_catalog')
				->select('mcp')
				->where('id',$id)
				->find();
		return $data->mcp;
	}
	function getDataYear($id) {
		$data = $this->model->table('ivt_increase_catalog_detail')
				->select('*')
				->where('parent_id',$id)
				->where('type', 1)
				->find_all();
		return $data;
	}
	function getDataQuater($id) {
		$data = $this->model->table('ivt_increase_catalog_detail')
				->select('*')
				->where('parent_id',$id)
				->where('type', 2)
				->find_all();
		return $data;
	}
	function getImage($id) {
		$data = $this->model->table('ivt_increase_catalog_detail')
				->select('image')
				->where('parent_id',$id)
				->where('type', 3)
				->find();
		return $data->image;
	}
	function getUpdateInfo() {
		$data = $this->model->table('ivt_increase_catalog')
				->select('usercreate, datecreate')
				->where('isdelete', 0)
				->find();
		return $data;
	}
}