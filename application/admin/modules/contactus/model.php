<?php
 class ContactusModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getSearch($search){
	}
	function getList($search,$page,$numrows){
		$sql = "SELECT id,phone,email,url_facebook,url_google,url_twitter,skype,postal,datecreate,usercreate
                        FROM ivt_contact
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
				FROM ivt_contact
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
		 $check = $this->model->table('ivt_contact')
		 ->select('id')
		 ->where('isdelete',0)
		 ->where('phone',$array['phone'])
		 ->find();
		 if(!empty($check->id)){
			 return -1;	
		 }
                 
		 $result = $this->model
						->table('ivt_contact')
						->insert($array);	
		 return $result;
	}
	function edits($array,$id){
		 $check = $this->model->table('ivt_contact')
		 ->select('id')
		 ->where('isdelete',0)
		 ->where('phone',$array['phone'])
		 ->where('id <>',$id)
		 ->find();
		 if(!empty($check->id)){
			 return -1;	
		 }//print_r($array);exit;
		 
		 $result = $this->model->table('ivt_contact')->save($id,$array);	
		 return $result;
	}
	function getContacus(){
            $sql = "SELECT *
                    FROM ivt_contact
                    WHERE isdelete=0 limit 1";
            $query = $this->model->query($sql)->execute();
            return $query;
    }
}