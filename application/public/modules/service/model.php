<?php
/**
 * @author 
 * @copyright 2016
 */
class ServiceModel extends CI_Model
{
	function __construct(){
		parent::__construct('');
	}
	function getService(){
		$query = $this->model->table('ivt_service')
					  ->where('id',8)
					  ->find();
		return $query;
	}
	function getFindDetail($url){
		$query = $this->model->table('ivt_service')
					  ->where('isdelete',0)
					  ->where('friendlyurl',$url)
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