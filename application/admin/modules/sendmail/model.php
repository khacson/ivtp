<?php
 class SendmailModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->login = $this->admin->getSession('login');
	}
	function finds(){
		 $query = $this->model->table('ivt_sendmail')
					   ->select('*')
					   ->where('isdelete',0)
					   ->find();
		 if(empty($query->id)){
			 $arr = array();
			 $arr['title_register'] = '';
			 $arr['title_forgot'] = '';
			 $arr['send_register'] = '';
			 $arr['send_forgot'] = '';
			 $arr['datecreate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
			 $arr['usercreate'] = $this->login->username;
			 $this->model->table('ivt_sendmail')->insert($arr);
			 $query = $this->model->table('ivt_sendmail')
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