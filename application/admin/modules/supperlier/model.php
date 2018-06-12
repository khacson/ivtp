<?php
 class SupperlierModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getSearch($search){
		$sql = "";
		if (!empty($search['supperlier_name'])) {
			$sql .= " AND supperlier_name LIKE '%".$search['supperlier_name']."%' ";
		}
		if (!empty($search['description'])) {
			$sql .= " AND description LIKE '%".$search['description']."%' ";
		}
		if (!empty($search['url'])) {
			$sql .= " AND url LIKE '%".$search['url']."%' ";
		}
		
		return $sql;
	}
	function getList($search,$page,$numrows){
		$sql = "SELECT id,img,supperlier_name,description,url,datecreate,usercreate
                        FROM ivt_supperlier
                        WHERE isdelete = 0";
		$sql.= $this->getSearch($search);
                if(empty($search['order'])){
			$sql .= " ORDER BY id DESC ";
		}
		else{
			$sql.= " ORDER BY ".$search['order']." ".$search['index']." ";
		} 
                $sql.= ' limit '.$page.','.$numrows;
		
		return $this->model->query($sql)->execute();
	}
	function getTotal($search){
		$sql = " SELECT COUNT(1) AS total
				FROM ivt_supperlier
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
	function export($search){
		return $this->getList($search);
	}
	function saves($array){
		 $check = $this->model->table('ivt_supperlier')
		 ->select('id')
		 ->where('isdelete',0)
		 ->where('supperlier_name',$array['supperlier_name'])
		 ->find();
		 if(!empty($check->id)){
			 return -1;	
		 }
		 $result = $this->model
						->table('ivt_supperlier')
						->insert($array);	
		 return $result;
	}
	function edits($array,$id){
		 $result = $this->model->table('ivt_supperlier')->save($id,$array);	
		 return $result;
	}
	function getSlitetop($idaction){
            $sql = "SELECT *
                    FROM ivt_supperlier
                    WHERE isdelete=0 and id = ".$idaction;
            $query = $this->model->query($sql)->execute();
            return $query;
    }

}