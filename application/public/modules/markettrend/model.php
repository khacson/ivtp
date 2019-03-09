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
	function getFindC($id){
		$query = $this->model->table('ivt_markettrendcatalog')
					   ->select('catalog_name')
					  ->where('id',$id)
					  ->find();
		return $query;
	}
	function getFindCatalog($friendlyurl){ 
		$query = $this->model->table('ivt_markettrendcatalog')
					  ->select('id,catalog_name')
					  ->where('friendlyurl',$friendlyurl)
					  ->find();
		return $query;
	}
	function getFindNew($id, $typeid = 0){
		$query = $this->model->table('ivt_markettrend')
					  ->where('id <>',$id);
		if (!empty($typeid)) {
			$query = $query->where('typeid',$typeid);
		}
		$query = $query->order_by('datecreate','desc')
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
		if(!empty($search['cat_id'])){
			$typeid = $search['cat_id'];
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
	function getTotalComment($blogid){
		$sql = "
			SELECT count(1) total
			FROM ivt_markettrend_comment c
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
		$this->model->table('ivt_markettrend_comment')->where('id', $id)->update($array);	
	}
}