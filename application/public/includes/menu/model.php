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
		$sql = "
			select m.id, m.catalog_name, m.friendlyurl,
				(
					select concat(mt.friendlyurl,'-','-dt',mt.id)
					from ivt_markettrend mt 
					where mt.typeid = m.id
					order by mt.datecreate desc
					limit 1
				) as max_id
				from ivt_markettrendcatalog m
				where m.isdelete = 0
				order by m.catalog_name asc
		";
		$query = $this->model->query($sql)->execute();
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