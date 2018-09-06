<?php
/**
 * @author 
 * @copyright 2018
 */
class SearchModel extends CI_Model
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
	function safeText($text) {
		$arrReplace = array('where', 'or', 'update', 'delete', 'select', 'and', '=', '"', "'");
		$text = strtolower($text);
		$text = strip_tags($text);
		$text = str_replace($arrReplace, '', $text);
		return $text;
	}
	function getSearch($search){
		$and = '';
		if(!empty($search)){
			$search = $this->safeText($search);
			$and.= " and (
				m.title LIKE '%$search %' 
				OR m.title LIKE '% $search%' 
				OR m.description_long LIKE '%$search %'
				OR m.description_long LIKE '% $search%'
			)";
		}
		return $and;
	}
	function getTotal($search){
		$and = $this->getSearch($search);
		$sql = "
			select COUNT(1) AS total from (
				select 1
				from ivt_markettrend m 
				where m.isdelete = 0 $and
				
				UNION ALL
				
				select 1
				from ivt_investment m 
				where m.isdelete = 0 $and
			) a
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
			select thumb, friendlyurl, id, title, description_sort, datecreate, 
			'xu-huong-thi-truong' as prefix, 'markettrend' as fname
			from ivt_markettrend m 
			where m.isdelete = 0 $and
			
			UNION ALL
			
			select thumb, friendlyurl, id, title, description_sort, datecreate, 
			'danh-muc-dau-tu' as prefix, 'investment' as fname
			from ivt_investment m 
			where m.isdelete = 0 $and
			
			order by datecreate desc
		";
		$sql.= ' limit '.$page.','.$numrows; //echo $sql;die;
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