<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author 
 * @copyright ivt_
 */
class Markettrendcomment extends CI_Controller {

    private $route;
    private $login;

    function __construct() {
        parent::__construct();
        $this->load->model(array('model', 'base_model'));
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

    function _view() {
        $data = new stdClass();
        $permission = $this->base_model->getPermission($this->login, $this->route);
        if (!isset($permission['view'])) {
            redirect(admin_url().'home.html');
        }
        $data->permission = $permission;
        $data->csrfName = $this->security->get_csrf_token_name();
        $data->csrfHash = $this->security->get_csrf_hash();
        $data->routes = $this->route;
        $data->login = $this->login;
        $data->controller = admin_url() . ($this->uri->segment(1));
        $data->markettrendTypes = $this->model->markettrendType('');
		
        
		$content = $this->load->view('view', $data, true);
        $this->admin->write('content', $content, true);
        $this->admin->write('title', $this->title, true);
        $this->admin->render();
    }
	
    function getList() {

        if (!isset($_POST['csrf_stock_name'])) {
            //show_404();
        }
        $param = array();
        $numrows = 20;
        $data = new stdClass();
        $index = $this->input->post('index');
        $order = $this->input->post('order');
		if(!empty($order)) {
            $order = str_replace('ord_', '', $order);
        }
        $page = $this->input->post('page');
        $search = $this->input->post('search');
        $search = json_decode($search, true);
        $search['index'] = $index;
        $search['order'] = $order;
        $query = $this->model->getList($search, $page, $numrows);
        $data->start = empty($page) ? 1 : $page + 1;

        $count = $this->model->getTotal($search);
        $data->datas = $query;
        $page_view = $this->admin->pagination($count, $numrows, 5, 'markettrend/', $page);
        $data->permission = $this->base_model->getPermission($this->login, $this->route);
        $result = new stdClass();
        $result->paging = $page_view;
        $result->cPage = $page;
        $result->viewtotal = $count;
        $result->csrfHash = $this->security->get_csrf_hash();
        $result->content = $this->load->view('list', $data, true);
        echo json_encode($result);
    }
    function deletes() {
        $token = $this->security->get_csrf_hash();
        $id = $this->input->post('id');
        $permission = $this->base_model->getPermission($this->login, $this->route);
        if (!isset($permission['delete'])) {
            $result['status'] = 0;
            $result['csrfHash'] = $token;
            echo json_encode($result);
            exit;
        }

		$this->model->table('ivt_markettrend_comment')->where("id in ($id)")->delete();	
		
        $result['status'] = 1;
        $result['csrfHash'] = $token;
        echo json_encode($result);
    }
	function isshow(){
		$array = array();
		$id = $this->input->post('id');
		$value = $this->input->post('value');
		$array['isshow'] = $value * -1 + 1;
		$this->model->table('ivt_markettrend')->save($id,$array);	
	}
	function edit() {
		$token =  $this->security->get_csrf_hash();
		$permission = $this->base_model->getPermission($this->login, $this->route);
		if (!isset($permission['edit'])){
			$result['status'] = 0;
			$result['csrfHash'] = $token;
			echo json_encode($result); exit;	
		}
		$search = json_decode($this->input->post('search'),true);
		$id = $this->input->post('id');
		$blogid = $this->input->post('blogid');
		$level = $this->input->post('level');
		
		$login = $this->login;
		if (!empty(trim($search['reply_msg'])) && $search['accept'] == 1) {
			$reply_id = $this->model->saveComment($search, $id, $blogid, $level, $login);
			$this->model->updateHasChild($id);
			$array['reply_id'] = $reply_id;
		}
		
		$array['dateupdate']  = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
		$array['userupdate'] = $login->username;
		$array['accept'] = $search['accept'];
		
		$rs = $this->model->table('ivt_markettrend_comment')
					->where('id', $id)
					->update($array);
		
		$result['status'] =$rs;
		$result['csrfHash'] = $token;
		echo json_encode($result);
	}
}