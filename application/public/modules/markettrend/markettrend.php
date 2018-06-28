<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @copyright 2018
 */
class Markettrend extends CI_Controller {
    
	function __construct(){
		parent::__construct();			
	    $this->load->model(array('model','base_model'));
		$this->rows = 20;
		$this->postLevel = 1;
	}
    function  _remap($method, $params = array()){
        if(method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        $uri = $this->uri->segment(2);
		if(empty($uri)){
			$this->_view();
		}
		else{
			//Ghi chú link Chi tiết thì thêm dtid sau cùng VD: tieu-de-tin-dt123.html
			$arr_id = explode("-",$uri);
			$count = count($arr_id);
			$key = substr($arr_id[$count-1],0,2);
			$id = substr($arr_id[$count-1],2);
			if($key == 'dt' && is_numeric($id)){
				$this->_detail($id);
			}
			else{
				$this->_view($uri);
			}
		}
    }
	function _view($uri=''){
		$login = $this->site->getSession('login');
		$finds = $this->model->getInfor();
		$data = new stdClass();
		
		$data->catalogs = $this->model->getMarkettendCatalog();
		$data->listNew = $this->model->getFindNew(0);
		$data->catalogFind = $this->model->getFindCatalog($uri);
		$data->uri = $uri;
		
		$memberLevel = $this->base_model->getMemberLevel();
		if ($memberLevel >= $this->postLevel) {
			$content = $this->load->view('view',$data,true);
		}
		else {
			$content = $this->load->view('404',$data,true);
		}
        
        $this->site->write('content',$content,true);
		$this->site->write('title',$finds->meta_title,true);
		$this->site->write('keywords',$finds->meta_keyword,true);
		$this->site->write('description',$finds->mete_description,true);
        $this->site->render();
	}
	function _detail($id){
		$data = new stdClass();
		$finds = $this->model->getFind($id);
		$data->catalogs = $this->model->getMarkettendCatalog();
		$data->listNew = $this->model->getFindNew($id, $finds->typeid);
		if(!empty($finds->id)){
			$this->site->write('title',$finds->meta_title,true);
			$this->site->write('description',$finds->meta_keyword,true);
			$this->site->write('keywords',$finds->mete_description,true);
			$this->site->write('title_page',$finds->title,true);
		}
		$typeid = 0;
		if(!empty($finds->typeid)){
			$typeid = $finds->typeid;
		}
		$data->catalogFind =  $this->model->getFindC($typeid);
		
		$login = $this->site->getSession('pblogin');
		if (empty($login)) {
			$m_fullname = '';
			$m_email = '';
		}
		else {
			$m_fullname = $login->fullname;
			$m_email = $login->email;
		}
		$data->finds = $finds;
		$data->totalComment = $this->model->getTotalComment($id);
		$array = array();
		$array['postId'] = $id;
		$array['m_fullname'] = $m_fullname;
		$array['m_email'] = $m_email;
		$data->commentForm = $this->load->view('comment_form',$array,true);
		
		$array['commentList'] = $this->getCommentList($id);
		$data->commentList = $this->load->view('comment_list',$array,true);
		$data->commentCount = count($array['commentList']);
		
		$memberLevel = $this->base_model->getMemberLevel();
		if ($memberLevel >= $this->postLevel) {
			$content = $this->load->view('detail',$data,true);
		}
		else {
			$content = $this->load->view('404',$data,true);
		}
		
        $this->site->write('content',$content,true);
        $this->site->render();
	}
	function getList(){
		$param = array();
        $numrows = 10;
        $data = new stdClass();
		$page = $this->input->post('page');
        $search = $this->input->post('search');
		

		$count = $this->model->getTotal($search);
        $data->datas = $this->model->getList($search, $page, $numrows);
        $page_view = $this->site->pagination($count, $numrows, 5, 'product/', $page);
		
        $result = new stdClass();
		$result->numrows = $numrows;
        $result->cPage = $page;
        $result->viewtotal = $count;
		if($count > $numrows){
			 $result->paging = $page_view;	
		}
		else{
			$result->paging = '';
		}
		if(empty($uri)){
			$data->linkImg = '';
		}
		else{
			$data->linkImg = '../';
		}
        $result->csrfHash = $this->security->get_csrf_hash();
        $result->content = $this->load->view('list', $data, true);
        echo json_encode($result);
	}
	function getCommentList($blogid) {
		//get level 0
		$sql = "SELECT * FROM ivt_markettrend_comment 
				WHERE blogid = $blogid AND parent_id = 0 AND accept = 1
				ORDER BY id DESC";
		$rs = $this->model->query($sql)->execute();
		$arr = array();
		foreach ($rs as $item) {
			$arr[] = $item;
			if ($item->has_child == 1) {
				$this->getCommentChild($arr, $item->id);
			}
		}
		return $arr;	
	}
	function getCommentChild(&$arr, $parent_id) {
		$sql = "SELECT * FROM ivt_markettrend_comment 
				WHERE parent_id = $parent_id AND accept = 1
				ORDER BY id DESC";
		$rs = $this->model->query($sql)->execute();
		foreach ($rs as $item) {
			$arr[] = $item;
			if ($item->has_child == 1) {
				$this->getCommentChild($arr, $item->id);
			}
		}
	}
	function save_comment() {
		$login = $this->site->getSession('pblogin');
		if (!empty($login)) {
			$arr['member_id'] = $login->id;
		}
		$level = $this->input->post('level');
		$arr['fullname'] = $this->input->post('fullname');
		$arr['level'] = $level === '' ? 0 : $level + 1;
		$arr['description'] = $this->input->post('description');
		$arr['parent_id'] = $this->input->post('parid');
		$arr['blogid'] = $this->input->post('blogid');
		$arr['email'] = $this->input->post('email');
		$arr['datecreate'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
		$this->model->table('ivt_markettrend_comment')->insert($arr);
		$this->model->updateHasChild($arr['parent_id']);
	}
	
	
	
	
	
	
	
	
	
	
	
}