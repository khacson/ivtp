<?php
/**
 * @author 
 * @copyright 2018
 */
class InvestmentModel extends CI_Model
{
	function __construct(){
		parent::__construct('');
	}
	function getFind($id){
		$query = $this->model->table('ivt_investment')
					  ->where('id',$id)
					  ->find();
		return $query;
	}
	function getService(){
		$query = $this->model->table('ivt_service')
					  ->where('isdelete',0)
					  ->find_all();
		return $query;
	}
	function getInfor(){
		$query = $this->model->table('ivt_contact')
					  ->where('isdelete',0)
					  ->find();
		return $query;
	}
	function getFindCatalog($friendlyurl){
		$query = $this->model->table('ivt_investmentcatalog')
					  ->select('id,catalog_name,friendlyurl')
					  ->where('friendlyurl',$friendlyurl)
					  ->find();
		return $query;
	}
	function getFindNew($id){
		$query = $this->model->table('ivt_investment')
					  ->where('id <>',$id)
					  ->order_by('datecreate','desc')
					  ->limit(10)
					  ->find_all();
		return $query;
	}
	function getInvestmentCatalog(){
		$sql = "
			select m.id, m.catalog_name, m.friendlyurl
				from ivt_investmentcatalog m
				where m.isdelete = 0
				order by m.catalog_name asc
		";
		$query = $this->model->query($sql)->execute();
		return $query;
	}
	function getFindC($id){
		$query = $this->model->table('ivt_investmentcatalog')
					   ->select('catalog_name')
					  ->where('id',$id)
					  ->find();
		return $query;
	}
	function getSearch($search){
		$and = '';
		if(!empty($search)){
			$typeid = $this->getFindCatalog($search)->id;
			if(!empty($typeid)){
				$and.= " and m.typeid = '".$typeid."' ";
			}
		}
		return $and;
	}
	function getTotal($search){
		$and = $this->getSearch($search);
		$sql = "
			select COUNT(1) AS total
			from ivt_investment m 
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
			from ivt_investment m 
			where m.isdelete = 0
			$and
			order by m.datecreate desc
		";
		$sql.= ' limit '.$page.','.$numrows; 
		return $this->model->query($sql)->execute();
	}
	function getTotalComment($blogid){
		$sql = "
			SELECT count(1) total
			FROM ivt_investment_commets c
			where c.accept = 1
			and c.blogid = '$blogid'
			;
		";
		$query = $this->model->query($sql)->execute();
		$total = 0;
		if(!empty($query[0]->total)){
			$total = $query[0]->total;
		}
		return $total;
	}
	function updateHasChild($id) {
		$array['has_child'] = 1;
		$this->model->table('ivt_investment_commets')->where('id', $id)->update($array);	
	}
}