<?php
/**
 * @author Sonnk
 * @copyright 2017
 */
 
class incModelMenu extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getProduct(){
		$query = $this->model->table('ivt_product')
							->where('isdelete',0)
							->order_by('title','asc')
							->find_all();
		return $query;
	}
}