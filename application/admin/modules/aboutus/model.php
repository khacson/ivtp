<?php
 class AboutusModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->login = $this->admin->getSession('login');
	}
	function finds(){
		 $query = $this->model->table('ivt_about')
					   ->select('*')
					   ->where('isdelete',0)
					   ->find();
		 if(empty($query->id)){
			 $arr = array();
			 $arr['about_title'] = '';
			 $arr['image'] = '';
			 $arr['friendlyurl'] = '';
			 $arr['description_short'] = '';
			 $arr['description_long'] = '';
			 $arr['datecreate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
			 $arr['usercreate'] = $this->login->username;
			 $this->model->table('ivt_about')->insert($arr);
			 $query = $this->model->table('ivt_about')
					   ->select('*')
					   ->where('isdelete',0)
					   ->find();
			 return $query;
		 }
		 else{
			  return $query;
		 }
	}
}