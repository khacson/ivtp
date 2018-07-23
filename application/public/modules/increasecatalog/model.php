<?php
/**
 * @author 
 * @copyright 2018
 */
class IncreasecatalogModel extends CI_Model
{
	function __construct(){
		parent::__construct('');
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
	function getUpdateInfo() {
		$data = $this->model->table('ivt_increase_catalog')
				->select('usercreate, datecreate')
				->where('isdelete', 0)
				->find();
		return $data;
	}
	function getTitles($type) {
		$data = $this->model->table('ivt_increase_catalog_title')
				->select('titles')
				->where('isdelete',0)
				->where('type',$type)
				->find();
		$arr = json_decode($data->titles, true);
		if (!is_array($arr)) {
			$arr = array();
		}
		return $arr;
	}
	function get_inc_des_avg() {
		$data = $this->model->table('ivt_increase_catalog')
				->select('inc_des_avg')
				->where('isdelete',0)
				->where('inc_des_avg IS NOT NULL')
				->find();
		return $data->inc_des_avg;
	}
	function getList(){
		$sql = "SELECT *
				FROM ivt_increase_catalog
				WHERE isdelete = 0 AND mcp IS NOT NULL";
		return $this->model->query($sql)->execute();
	}
	function getMcp($id) {
		$data = $this->model->table('ivt_increase_catalog')
				->select('mcp, cp_name')
				->where('id',$id)
				->find();
		return $data;
	}
	function getDataYear($id) {
		$data = $this->model->table('ivt_increase_catalog_detail')
				->select('*')
				->where('parent_id',$id)
				->where('type', 1)
				->find_all();
		return $data;
	}
	function getDataQuater($id) {
		$data = $this->model->table('ivt_increase_catalog_detail')
				->select('*')
				->where('parent_id',$id)
				->where('type', 2)
				->find_all();
		return $data;
	}
	function getImage($id) {
		$data = $this->model->table('ivt_increase_catalog_detail')
				->select('image')
				->where('parent_id',$id)
				->where('type', 3)
				->find();
		return $data->image;
	}
	function getFindNew($id, $typeid = 0){
		$query = $this->model->table('ivt_markettrend')
					  ->where('id <>',$id)
					  ->where('isdelete',0);
		if (!empty($typeid)) {
			$query = $query->where('typeid',$typeid);
		}
		$query = $query->order_by('datecreate','desc')
				 ->limit(10)
				 ->find_all();
		return $query;
	}
	
	
	
	
	
	
}