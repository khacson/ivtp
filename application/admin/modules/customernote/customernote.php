<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author 
 * @copyright 2015
 */
class Customernote extends CI_Controller {
    private $route;
	private $login;
	function __construct(){
		parent::__construct();	
		$this->load->model(array('model','base_model'));
		$this->login = $this->admin->getSession('login');
		$this->route = $this->router->class;
		$menus = $this->admin->getSession('menus');
		$this->title = $menus[$this->route];
		$this->load->library('upload');
	}
	function _remap($method, $params = array()) {
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        }
        $this->_view();
    }
	function _view(){
		$data = new stdClass();
		$permission = $this->base_model->getPermission($this->login, $this->route);
		if (!isset($permission['view'])) {
	    	redirect(admin_url().'home.html');
	    }
		
		$user_id = $this->login->id;
		
		$data->colList = $this->model->getAllCol($user_id);
	    $data->permission = $permission;
		$data->csrfName = $this->security->get_csrf_token_name();
		$data->csrfHash = $this->security->get_csrf_hash();
		$data->routes = $this->route;
		$data->login = $this->login;
	    $data->controller = admin_url().($this->uri->segment(1));
	    $data->memberList = $this->base_model->getAllMember();
		
		$content = $this->load->view('view',$data,true);
		$this->admin->write('content',$content,true);
		$this->admin->write('title',$this->title,true);
        $this->admin->render();
	}
	function getList(){
		
		if(!isset($_POST['csrf_stock_name'])){
			//show_404();
		}
		$param = array();
		$numrows = 200; 
		$data = new stdClass();
		///
		$index = $this->input->post('index');
        $order = $this->input->post('order');
		if(!empty($order)) {
            $order = str_replace('ord_', '', $order);
        }//
		$page = $this->input->post('page'); 
		$search = $this->input->post('search');
		$search = json_decode($search,true);
		///
		$search['index'] = $index;
        $search['order'] = $order;
		$query = $this->model->getList($search,$page,$numrows);
		$data->start = empty($page) ? 1 : $page + 1;
	    $starList = $this->base_model->getStar();
		$arrStar = array();
		foreach ($starList as $item) {
			$arrStar[$item->id] = $item->name;
		}
		$data->arrStar = $arrStar;

		$count = $this->model->getTotal($search);
		$data->datas = $query;
		$page_view=$this->admin->pagination($count,$numrows,5,'user/',$page);
		$data->permission = $this->base_model->getPermission($this->login, $this->route);
		$result = new stdClass();
		$result->paging = $page_view;
        $result->cPage = $page;
		$result->viewtotal = $count; 
		$result->csrfHash = $this->security->get_csrf_hash();
        $result->content = $this->load->view('list', $data, true);
		echo json_encode($result);
	}
	function get_chat_history() {
		$chat_code = $this->input->post('chat_code');
		$data = new stdClass();
		$data->chatLog = $this->model->getChatHistory($chat_code);
		
		$result = new stdClass();
		$result->csrfHash = $this->security->get_csrf_hash();
        $result->content = $this->load->view('chat_history', $data, true);
		echo json_encode($result);
	}
	function getAllCol() {
		$data = new stdClass();
		$user_id = $this->login->id;
		
		$data->datas = $this->model->getAllCol($user_id);
		
		$result = new stdClass();
		$result->csrfHash = $this->security->get_csrf_hash();
        $result->content = $this->load->view('list_col', $data, true);
		echo json_encode($result);
	}
	function addCol() {
		$user_id = $this->login->id;
		$col_order = $this->model->getMaxOrder($user_id);
		//insert new col
		$sql = "INSERT INTO ivt_customernote_col (user_id, col_order) VALUE ($user_id, $col_order)";
		$this->model->executeQuery($sql);
		echo 1;die;
	}
	function editCol() {
		$col_id = $this->input->post('col_id');
		$col_name = $this->input->post('col_name');
		$col_order = $this->input->post('col_order');
		$col_color = $this->input->post('col_color');
		$isshow = $this->input->post('isshow');
		$isdelete = $this->input->post('isdelete');
		
		$arr = array();
		if (!empty($col_name)) { $arr['col_name'] = $col_name; }
		if (!empty($col_order)) { $arr['col_order'] = $col_order; }
		if (!empty($col_color)) { $arr['col_color'] = $col_color; }
		if ($isshow === '0' || $isshow === '1') { $arr['isshow'] = $isshow; }
		if ($isdelete === '0' || $isdelete === '1') { $arr['isdelete'] = $isdelete; }
		$this->model->table('ivt_customernote_col')->where('id', $col_id)->update($arr);
		
		echo 1;die;
	}
	function move() {
		$col_id = $this->input->post('col_id');
		$type = $this->input->post('type');
		if($type == 'moveUp'){
			$rs = $this->model->moveUp($col_id);
		}
		else{
			$rs = $this->model->moveDown($col_id);
		}
		
		$arr = array();
		$arr['msg'] = $rs;
		$arr['csrfHash'] = $this->security->get_csrf_hash();
		echo json_encode($arr);die;
	}
	
	
	
}