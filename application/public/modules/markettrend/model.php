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
	function getSearch($search){
		$and = '';
		if(!empty($search['productName'])){
			$and.= " and m.friendlyurl = '".$search['productName']."' ";
		}
		return $and;
	}
	function getTotal($search){
		$and = $this->getSearch($search);
		$sql = "
			select COUNT(1) AS total
			from ivt_markettrend m 
			where m.isdelete = 0
			$and
			;
		";
		$query = $this->model->query($sql)->execute();
		if(empty($query[0]->total)){
			return 0;
		}
		else{
			return $query[0]->total;
		}
	}
	function getList($search, $page, $numrows){
		$and = $this->getSearch($search);
		$sql = "
			select m.*
			from ivt_markettrend m 
			where m.isdelete = 0
			$and
			order by m.datecreate desc
		";
		$sql.= ' limit '.$page.','.$numrows;
		return $this->model->query($sql)->execute();
	}
}