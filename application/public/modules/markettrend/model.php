<?php
/**
 * @author 
 * @copyright 2018
 */
class MarkettrendModel extends CI_Model
{
	function __construct(){
		parent::__construct('');
	}
	function getFind($id){
		$query = $this->model->table('ivt_markettrend')
					  ->where('id',$id)
					  ->find();
		return $query;
	}
	function getInfor(){
		$query = $this->model->table('ivt_contact')
					  ->where('isdelete',0)
					  ->find();
		return $query;
	}
}