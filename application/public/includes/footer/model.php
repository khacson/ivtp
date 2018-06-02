<?php
/**
 * @author Sonnk
 * @copyright 2017
 */
 
class incModelFooter extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getInfor(){
		$query = $this->model->table('ivt_contact')
					  ->where('isdelete',0)
					  ->find();
		return $query;
	}
}