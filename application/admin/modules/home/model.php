<?php
/**
 * @author Son Nguyen
 * @copyright 2015
 */
 class HomeModel extends CI_Model{
	function __construct(){
		//$this->load->database();
		parent::__construct();
	}
	function findID($id) {
        $query = $this->model->table('hr_groups')
					  ->where('isdelete',0)
					  ->where('id',$id)
					  ->find();
        return $query;
    }
 }