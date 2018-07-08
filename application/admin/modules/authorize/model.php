<?php
/**
 * @author Son Nguyen
 * @copyright 2015
 */
 class AuthorizeModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function login($u, $p = null) {
		$query = $this->model->table('ivt_users')
		->select("ivt_users.*,ivt_groups.params, ivt_groups.grouptype")
		->join('ivt_groups', 'ivt_groups.id = ivt_users.groupid', 'inner')
		->where('ivt_users.isdelete',0)	
		->where('ivt_groups.isdelete',0)	
		->where('ivt_users.username',$u)
		->find();
		return $query;
	}
	function getListMenu(){
		$menu = $this->model->table('ivt_menus')
							->select('name,route')
							->where('isdelete',0)
							->where('route <>','')
							->where('route <>','#')
							->find_all();
		$arr = array();
		foreach($menu as $item){
			$arr[$item->route] = $item->name;
		}
		return $arr;
	}
	function getRouter($str){
		$json = json_decode($str);
		$menu = $this->model->table('ivt_menus')
							->select('id,route')
							->where('isdelete',0)
							->where('route <>','')
							->find_all();
		$arr_menu = array();
		foreach($menu as $item){
			$arr_menu[$item->id] = $item->route;
		}
		$arr_right = array();
		if(!empty($json)){
			foreach($json as $id=>$right){
				if(isset($arr_menu[$id])){
					$arr_right[$arr_menu[$id]] = $right;
				}	
			}
		}
		
		return $arr_right;
	}
	function insertTimeLog($uid , $address, $GMTTime){
		$data['timelogin'] = $GMTTime;
		$data['ipaddress'] = $address;
		$data['username'] = $uid;	
		$id = $this->model->table('ivt_time_login')->save('', $data);
		return $id;
	}
	function getLanguage($lang=''){
		if($lang != ""){
			$langs = $lang;	
		}
		else{
			$langs = "vn";	
		}
		$query = $this->model->table('ivt_language')
					  ->select('keyword,translation,langpage')
					  ->where('isdelete',0)
					  ->where('language',$langs)
					  ->find_all();
		$arr = array();
		foreach($query as $item){
			$arr[$item->langpage][$item->keyword]	= $item->translation;
		}
		return $arr;
	}
}