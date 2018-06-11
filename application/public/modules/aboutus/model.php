<?php
/**
 * @author 
 * @copyright 2016
 */
class AboutusModel extends CI_Model
{
	function __construct(){
		parent::__construct('');
	}
	function getInfor(){
		$query = $this->model->table('ivt_about')
					  ->where('isdelete',0)
					  ->find();
		return $query;
	}
}