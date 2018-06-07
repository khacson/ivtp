<?php
/**
 * @author 
 * @copyright 2018
 */
class MemberModel extends CI_Model
{
	function __construct(){
		parent::__construct('');
	}
	function getService(){
		$query = $this->model->table('ivt_service')
					  ->where('isdelete',0)
					  ->find_all();
		return $query;
	}
	function getInfor(){
		$query = $this->model->table('ivt_contact')
					  ->where('isdelete',0)
					  ->find();
		return $query;
	}
}