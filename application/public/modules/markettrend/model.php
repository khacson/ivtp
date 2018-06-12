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
	function getFindNew($id){
		$query = $this->model->table('ivt_markettrend')
					  ->where('id <>',$id)
					  ->order_by('datecreate','desc')
					  ->limit(10)
					  ->find_all();
		return $query;
	}
	function getMarkettendCatalog(){
		$sql = "
			select m.id, m.catalog_name, m.friendlyurl
				from ivt_markettrendcatalog m
				where m.isdelete = 0
				order by m.catalog_name asc
		";
		$query = $this->model->query($sql)->execute();
		return $query;
	}
	function getInfor(){
		$query = $this->model->table('ivt_contact')
					  ->where('isdelete',0)
					  ->find();
		return $query;
	}
}