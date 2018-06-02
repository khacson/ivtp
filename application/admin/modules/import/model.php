<?php
/**
 * @author sonnk
 * @copyright 2016
 */
class ImportModel extends CI_Model
{
	function __construct(){
		parent::__construct('');
	}
	function findID($id) {
		$tb = $this->base_model->loadTable();
        $query = $this->model->table($tb['g_catalog_service'])
					  ->where('isdelete',0)
					  ->where('id',$id)
					  ->find();
        return $query;
    }
	function getSearch($search){
		$sql = "";
		if(!empty($search['catalog_service_name'])){
			$sql.= " and u.catalog_service_name like '%".$search['catalog_service_name']."%' ";	
		}
		return $sql;
	}
	function getList($search,$page,$rows){
		$tb = $this->base_model->loadTable();
		$searchs = $this->getSearch($search);
		$sql = " SELECT u.*
				FROM `".$tb['g_catalog_service']."` AS u
				WHERE u.isdelete = 0 
				$searchs
				ORDER BY u.catalog_service_name ASC 
				";
		$sql.= ' limit '.$page.','.$rows;
		$query = $this->model->query($sql)->execute();
		return $query;
	}
	function getTotal($search){
		$tb = $this->base_model->loadTable();
		$searchs = $this->getSearch($search);
		$sql = " 
		SELECT count(1) total  
			FROM `".$tb['g_catalog_service']."` AS u
			WHERE u.isdelete = 0
			$searchs	
		";
		$query = $this->model->query($sql)->execute();
		return $query[0]->total;	
	}
	function saves($array,$id){
		$tb = $this->base_model->loadTable();
		$check = $this->model->table($tb['g_catalog_service'])
					  ->select('id')
					  ->where('isdelete',0)
					  ->where('catalog_service_name',$array['catalog_service_name'])
					  ->find();
		 if(!empty($check->id)){
			return -1;	
		 }
		 $result = $this->model->table($tb['g_catalog_service'])->insert($array);	
		 return $result;
	}
	function edits($array,$id){
		$tb = $this->base_model->loadTable();
		$check = $this->model->table($tb['g_catalog_service'])
				  ->select('id')
				  ->where('isdelete',0)
				  ->where('catalog_service_name',$array['catalog_service_name'])
				  ->where('id <>',$id)
				  ->find();
		if(!empty($check->id)){
			return -1;	
		}
		$this->model->table($tb['g_catalog_service'])
					->where('id',$id)
					->update($array);	
		return $id;
		
	}
	function deletes($id,$array){
		$tb = $this->base_model->loadTable();
		$this->model->table($tb['g_catalog_service'])
					->where("id in ($id)")
					->update($array);
		return 1;
	}
}