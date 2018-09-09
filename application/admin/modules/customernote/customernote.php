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
		$user_id = $this->uri->segment(2);
		if (!empty($user_id)) {
			$this->login->view_user_id = $user_id;
		}
		if ($this->login->groupid == 1 && empty($user_id)) {
			$this->_view_root();
		}
        else {
			$this->_view();
		}
    }
	function _view(){
		$data = new stdClass();
		$permission = $this->base_model->getPermission($this->login, $this->route);
		if (!isset($permission['view'])) {
	    	redirect(admin_url().'home.html');
	    }
		if ($this->login->groupid == 1 && !empty($this->login->view_user_id)) {
			$user_id = $this->login->view_user_id;
			$data->view_user_name = ' - '.$this->base_model->getUserFullname($this->login->view_user_id);
		}
		else {
			$user_id = $this->login->id;
			$data->view_user_name = '';
		}
		
		$data->colList = $this->model->getAllCol($user_id);
	    $data->permission = $permission;
		$data->csrfName = $this->security->get_csrf_token_name();
		$data->csrfHash = $this->security->get_csrf_hash();
		$data->routes = $this->route;
		$data->login = $this->login;
	    $data->controller = admin_url().($this->uri->segment(1));
	    $data->memberList = $this->base_model->getAllMember();
	    $data->userList = $this->base_model->getHelpDeskUser($this->login);
		
		$content = $this->load->view('view',$data,true);
		$this->admin->write('content',$content,true);
		$this->admin->write('title',$this->title,true);
        $this->admin->render();
	}
	function _view_root(){
		$data = new stdClass();
		$permission = $this->base_model->getPermission($this->login, $this->route);
		if (!isset($permission['view'])) {
	    	redirect(admin_url().'home.html');
	    }
		
		$user_id = $this->login->id;
		
	    $data->permission = $permission;
		$data->csrfName = $this->security->get_csrf_token_name();
		$data->csrfHash = $this->security->get_csrf_hash();
		$data->routes = $this->route;
		$data->login = $this->login;
	    $data->controller = admin_url().($this->uri->segment(1));
	    $data->userList = $this->model->getUserListHasNote();
		
		$content = $this->load->view('view_root',$data,true);
		$this->admin->write('content',$content,true);
		$this->admin->write('title',$this->title,true);
        $this->admin->render();
	}
	function getList(){
		if ($this->login->groupid == 1 && !empty($this->login->view_user_id)) {
			$user_id = $this->login->view_user_id; //echo '1<pre>';var_dump($this->login->view_user_id,$this->login);
		}
		else {
			$user_id = $this->login->id;echo '2<pre>';var_dump($this->login);
		}
		if(!isset($_POST['csrf_stock_name'])){
			//show_404();
		}
		$param = array();
		$numrows = 20000; 
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
		$search['index'] = '';
        $search['order'] = '';
		$query = $this->model->getList($search,$page,$numrows);
		$data->start = empty($page) ? 1 : $page + 1;
		$data->login = $this->login;

		$count = $this->model->getTotal($search);
		$data->datas = $query;
		$page_view=$this->admin->pagination($count,$numrows,5,'user/',$page);
		$data->permission = $this->base_model->getPermission($this->login, $this->route);
		$data->colList = $this->model->getAllCol($user_id);
		$result = new stdClass();
		$result->paging = $page_view;
        $result->cPage = $page;
		$result->viewtotal = $count; 
		$result->csrfHash = $this->security->get_csrf_hash();
        $result->content = $this->load->view('list', $data, true);
		echo json_encode($result);
	}
	function getAllCol() {
		$data = new stdClass();
		if ($this->login->groupid == 1 && !empty($this->login->view_user_id)) {
			$user_id = $this->login->view_user_id;
		}
		else {
			$user_id = $this->login->id;
		}
		
		$data->datas = $this->model->getAllCol($user_id, 1);
		
		$result = new stdClass();
		$result->csrfHash = $this->security->get_csrf_hash();
        $result->content = $this->load->view('list_col', $data, true);
		echo json_encode($result);
	}
	function addCol() {
		if ($this->login->groupid == 1 && !empty($this->login->view_user_id)) {
			$user_id = $this->login->view_user_id;
		}
		else {
			$user_id = $this->login->id;
		}
		$col_order = $this->model->getMaxOrder($user_id);
		//insert new col
		$sql = "INSERT INTO ivt_customernote_col (user_id, col_order) VALUE ($user_id, $col_order)";
		$this->model->executeQuery($sql);
		echo 1;die;
	}
	function editCol() {
		$col_id = $this->input->post('col_id');
		$col_name = $this->input->post('col_name');
		$col_width = $this->input->post('col_width');
		$col_order = $this->input->post('col_order');
		$col_color = $this->input->post('col_color');
		$isshow = $this->input->post('isshow');
		$isdelete = $this->input->post('isdelete');
		
		$arr = array();
		if (!empty($col_name)) { $arr['col_name'] = $col_name; }
		if (!empty($col_width)) { $arr['col_width'] = $col_width; }
		if (!empty($col_order)) { $arr['col_order'] = $col_order; }
		if (!empty($col_color)) { $arr['col_color'] = $col_color; }
		if ($isshow === '0' || $isshow === '1') { $arr['isshow'] = $isshow; }
		if ($isdelete === '0' || $isdelete === '1') { $arr['isdelete'] = $isdelete; }
		$this->model->table('ivt_customernote_col')->where('id', $col_id)->update($arr);
		
		echo 1;die;
	}
	function saveAllCol() {
		$jsonColName = $this->input->post('jsonColName');
		$objColName = json_decode($jsonColName, true);
		
		foreach ($objColName as $col_id=>$col_name) {
			$arr = array();
			if (!empty($col_name)) { 
				$arr['col_name'] = $col_name; 
				$this->model->table('ivt_customernote_col')
							->where('id', $col_id)
							->update($arr);
			}
		}
		
		$jsonColWidth = $this->input->post('jsonColWidth');
		$objColWidth = json_decode($jsonColWidth, true);
		
		foreach ($objColWidth as $col_id=>$col_width) {
			$arr = array();
			if (!empty($col_width)) { 
				$arr['col_width'] = $col_width; 
				$this->model->table('ivt_customernote_col')
							->where('id', $col_id)
							->update($arr);
			}
		}

		echo 1;die;
	}
	function changeRowColor() {
		$row_id = $this->input->post('row_id');
		$row_color = $this->input->post('row_color');
		
		$arr = array();
		if (!empty($row_color)) { $arr['row_color'] = $row_color; }
		$this->model->table('ivt_customernote_row')->where('id', $row_id)->update($arr);
		
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
	function save() {
        $permission = $this->base_model->getPermission($this->login, $this->route);
        $token = $this->security->get_csrf_hash();
        $json = $this->input->post('search');
        $member_id = $this->input->post('member_id');
        
        if (!isset($permission['add'])) {
            $result['status'] = 0;
            $result['csrfHash'] = $token;
            echo json_encode($result);
            exit;
        }
        
        if ($this->login->groupid == 1 && !empty($this->login->view_user_id)) {
			$user_id = $this->login->view_user_id;
		}
		else {
			$user_id = $this->login->id;
		}
        $array['user_id'] = $user_id;
        $array['member_id'] = $member_id;
        $array['rows'] = strip_tags($json);
        $array['usercreate'] = $this->login->id;
        $array['datecreate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
        $result['status'] = $this->model->saves($array);
        $result['csrfHash'] = $token;
        echo json_encode($result);
    }
    function edit() {
        $token = $this->security->get_csrf_hash();
        $permission = $this->base_model->getPermission($this->login, $this->route);
        if (!isset($permission['edit'])) {
            $result['status'] = 0;
            $result['csrfHash'] = $token;
            echo json_encode($result);
            exit;
        }

        $json = $this->input->post('search');
        $member_id = $this->input->post('member_id');
        $id = $this->input->post('id');
        $array['usercreate'] = $this->login->id;
        $array['member_id'] = $member_id;
        $array['rows'] = strip_tags($json);
        $array['datecreate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);

        $result['status'] = $this->model->edits($array, $id);
        $result['csrfHash'] = $token;
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
        $login = $this->login;
        $array['datecreate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
        $array['usercreate'] = $login->id;
        $array['isdelete'] = 1;
        $this->model->table('ivt_customernote_row')->where("id IN($id)")->update($array);

        $result['status'] = 1;
        $result['csrfHash'] = $token;
        echo json_encode($result);
    }
	
}