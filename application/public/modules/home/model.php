<?php
/**
 * @author Sonnk
 * @copyright 2016
 */

class HomeModel extends CI_Model
{
	function __construct(){
		parent::__construct('');
	}
	function getService(){
		$query = $this->model->table('ivt_service')
					  ->select('id,title,description_sort')
					  ->where('isdelete',0)
					  ->order_by('ordering','asc')
					  ->limit(3)
					  ->find_all();
		return $query;
	}
	function getSupperlier(){
		$query = $this->model->table('ivt_supperlier')
					  ->select('id,supperlier_name,img,url')
					  ->where('isdelete',0)
					  ->limit(6)
					  ->find_all();
		return $query;
	}
	function getMarkettrend(){
		$sql = "
			SELECT `id`, `title`, `friendlyurl`, `description_sort`, `image`, `datecreate`, `thumb`, 
			(select count(1) total from ivt_markettrend_comment mc where mc.blogid = m.`id`) comment
			FROM `ivt_markettrend` m  
			WHERE m.`isdelete` =0 
			AND m.`isshow` = 1 
			ORDER BY m.`id` DESC LIMIT 3
		";
		return $this->model->query($sql)->execute();
	}
	function getInvestment(){
		$sql = "
			SELECT `id`, `title`, `friendlyurl`, `description_sort`, `image`, `datecreate`, `thumb`, 
			(select count(1) total from ivt_investment_commets mc where mc.blogid = m.`id`) comment
			FROM `ivt_investment` m  
			WHERE m.`isdelete` =0 
			AND m.`isshow` = 1 
			ORDER BY m.`id` DESC LIMIT 3
		";
		return $this->model->query($sql)->execute();
	}
	function getSlideList(){
		$query = $this->model->table('ivt_slide')
					  ->select('id,slide_name,description,url,img')
					  ->where('isdelete',0)
					  ->find_all();
		return $query;
	}
	function getSlideAbout(){
		$query = $this->model->table('mm_slide_about')
					  ->select('id,slide_name,description,url,img')
					  ->where('isdelete',0)
					  //->order_by('ordering','asc')
					  ->find_all();
		return $query;
	}
	function getAbounts(){
		$query = $this->model->table('ivt_about')
					  ->select('id,about_title,description_short')
					  ->where('isdelete',0)
					  ->find();
		return $query;
	}
	function getInfor(){
		$query = $this->model->table('ivt_contact')
					  ->where('isdelete',0)
					  ->find();
		return $query;
	}
	function getPictureType(){
		$query = $this->model->table('ivt_picturetype')
					  ->select('id,picturetype_name')
					  ->where('isdelete',0)
					  ->order_by('ordering','asc')
					  ->find_all();
		return $query;
	}
	function getCP(){
		$sql = "
			SELECT m.id, m.mcp, m.curr_price, m.open_price, m.inc_des
			FROM ivt_increase_catalog m
			where m.isdelete = 0
			order by m.curr_price desc
			limit 4
		";
		return $this->model->query($sql)->execute();
	}
	function getCPTang(){
		$sql = "
			SELECT m.id, m.mcp, m.curr_price, m.open_price, m.inc_des
			FROM ivt_increase_catalog m
			where m.isdelete = 0
			order by m.inc_des desc
			limit 5
		";
		return $this->model->query($sql)->execute();
	}
	function getCatalogDetail(){
		//ivt_increase_catalog_detail
	}
}