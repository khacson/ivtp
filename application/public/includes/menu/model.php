<?php
/**
 * @author Sonnk
 * @copyright 2018
 */
 
class incModelMenu extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getMarkettendCatalog(){
		$query = $this->model->table('ivt_markettrendcatalog')
							->select('id,catalog_name,friendlyurl')
							->where('isdelete',0)
							->order_by('catalog_name','asc')
							->find_all();
		return $query;
	}
	function getInvestmentCatalog(){
		$query = $this->model->table('ivt_investmentcatalog')
							->select('id,catalog_name,friendlyurl')
							->where('isdelete',0)
							->order_by('catalog_name','asc')
							->find_all();
		return $query;
	}
	function getInfor(){
		$query = $this->model->table('ivt_contact')
							->select('*')
							->find();
		return $query;
	}
}