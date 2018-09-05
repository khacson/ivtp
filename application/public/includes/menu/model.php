<?php
/**
 * @author Sonnk
 * @copyright 2018
 */
 
class incModelMenu extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getFullUrl() {
		$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		return urlencode($url);
	}
	function getMarkettendCatalog(){
		$query = $this->model->table('ivt_markettrendcatalog')
							->select('id,catalog_name,friendlyurl')
							->where('isdelete',0)
							->order_by('catalog_name','asc')
							->find_all();
		return $query;
	}
	function getInvestmentCatalogMenu(){
		$sql = "
			select m.id, m.catalog_name, m.friendlyurl,
				(
					select concat(mt.friendlyurl,'-','dt',mt.id)
					from ivt_investment mt 
					where mt.typeid = m.id
					and is_top = 1
					limit 1
				) as max_id
				from ivt_investmentcatalog  m
				where m.isdelete = 0
				order by m.catalog_name asc
		";
		$rs = $this->model->query($sql)->execute();
		if (empty($rs[0]->max_id)) {
			$sql = "select m.id, m.catalog_name, m.friendlyurl,
					(
						select concat(mt.friendlyurl,'-','dt',mt.id)
						from ivt_investment mt 
						where mt.typeid = m.id
						order by mt.datecreate desc
						limit 1
					) as max_id
					from ivt_investmentcatalog m
					where m.isdelete = 0
					order by m.catalog_name asc
					";
			$rs2 = $this->model->query($sql)->execute();
			return $rs2;
		}
		else {
			return $rs;
		}
	}
	function getInvestmentCatalog(){
		$query = $this->model->table('ivt_investmentcatalog')
							->select('id,catalog_name,friendlyurl')
							->where('isdelete',0)
							->order_by('catalog_name','asc')
							->find_all();
		return $query;
	}
	function getActiveMenu() {
		$uri = $this->uri->segment(1);
		if ($uri == 'danh-muc-tang-truong') {
			return $this->setActiveMenu('danh-muc-dau-tu');
		}
		else {
			return $this->setActiveMenu($uri);
		}
	}
	function getArrMenu() {
		return array(
			'trang-chu' => '',
			'gioi-thieu' => '',
			'xu-huong-thi-truong' => '',
			'tu-van' => '',
			'danh-muc-dau-tu' => '',
			'dich-vu' => '',
			'lien-he' => '',
		);
	}
	function setActiveMenu($key) {
		$arr = $this->getArrMenu();
		$arr[$key] = 'active';
		return $arr;
	}
	function getInfor(){
		$query = $this->model->table('ivt_contact')
							->select('*')
							->find();
		return $query;
	}
}