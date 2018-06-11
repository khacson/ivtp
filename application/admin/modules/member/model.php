<?php
 class MemberModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getCatalog(){
		$query = $this->model->table('ivt_member')
					  ->select('id,fullname')
					  ->where('isdelete',0)
					  ->order_by('fullname')
					  ->find_all();
		return $query;
	}
	function getSearch($search){
		$sql = "";
		if (!empty($search['fulname'])) {
			$sql .= " AND m.fulname LIKE '%".$search['fulname']."%' ";
		}
		if (!empty($search['phone'])) {
			$sql .= " AND m.phone LIKE '%".$search['phone']."%' ";
		}
		if (!empty($search['email'])) {
			$sql .= " AND m.email LIKE '%".$search['email']."%' ";
		}
		return $sql;
	}
	function getList($search,$page,$numrows){
		$sql = "SELECT *
                        FROM ivt_member m
                        WHERE m.isdelete = 0";
		$sql.= $this->getSearch($search);
                if(empty($search['order'])){
			$sql .= " ORDER BY m.datecreate desc ";
		}
		else{
			$sql.= " ORDER BY ".$search['order']." ".$search['index']." ";
		} 
                $sql.= ' limit '.$page.','.$numrows;
		
		return $this->model->query($sql)->execute();
	}
	function getTotal($search){
		$sql = " SELECT COUNT(1) AS total
				FROM ivt_member m
				WHERE m.isdelete = 0 ";
		$sql.= $this->getSearch($search);
		$query = $this->model->query($sql)->execute();
		if(empty($query[0]->total)){
			return 0;
		}
		else{
			return $query[0]->total;
		}
	}
	function export($search){
		return $this->getList($search);
	}
	function saves($array){
		 $check = $this->model->table('ivt_member')
		 ->select('id')
		 ->where('isdelete',0)
		 ->where('fullname',$array['fullname'])
		 ->find();
		 if(!empty($check->id)){
			 return -1;	
		 }
                 unset($array['fromdate']);
                 unset($array['todate']);
		 $result = $this->model
						->table('ivt_member')
						->insert($array);	
		 return $result;
	}
	function edits($array,$id){
		 $check = $this->model->table('ivt_member')
		 ->select('id')
		 ->where('isdelete',0)
		 ->where('fullname',$array['fullname'])
		 ->where('id <>',$id)
		 ->find();
		 if(!empty($check->id)){
			 return -1;	
		 }//print_r($array);exit;
		 unset($array['fromdate']);
                 unset($array['todate']);
		 $result = $this->model->table('ivt_member')->save($id,$array);	
		 return $result;
	}
	
}