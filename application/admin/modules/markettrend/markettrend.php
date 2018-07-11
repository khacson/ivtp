<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author 
 * @copyright ivt_
 */
class Markettrend extends CI_Controller {

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
	function form($id=''){
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
        $data->groups = $this->base_model->getGroup(''); 
		$data->finds = $this->model->detail($id);
        $data->markettrendTypes = $this->model->markettrendType('');
		
		$content = $this->load->view('form', $data, true);
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
    function save() {

        $permission = $this->base_model->getPermission($this->login, $this->route);
        $token = $this->security->get_csrf_hash();
        $array = json_decode($this->input->post('search'), true);
        
        if (!isset($permission['add'])) {
            $result['status'] = 0;
            $result['csrfHash'] = $token;
            echo json_encode($result);
            exit;
        }
        if (isset($_FILES['userfile']) && $_FILES['userfile']['name'] != "") {
            $imge_name = $_FILES['userfile']['name'];
            $this->upload->initialize($this->set_upload_options());
            $image_data = $this->upload->do_upload('userfile', $imge_name); //Ten hinh 
            $array['image'] = $image_data;
            $resize = $this->resizeImg($image_data);
        }
		if (isset($_FILES['userfile2']) && $_FILES['userfile2']['name'] != "") {
            $temp = explode('.', $_FILES['userfile2']['name']);
			$ext = end($temp);
			$filename = $_FILES['userfile2']['name'];			
			$src_path = $_FILES['userfile2']['tmp_name'];
			$new_path = 'files/markettrend/thumb/'.$filename;
			
			$this->base_model->resizeImg(THUMB_WIDTH, THUMB_HEIGHT, $src_path, $new_path, $array['x'], $array['y'], $array['w'], $array['h'], $ext);
			$array['thumb'] = $filename;
        }
		unset($array['x']);
		unset($array['y']);
		unset($array['w']);
		unset($array['h']);
        $login = $this->login;
		$array['friendlyurl'] = $this->admin->friendlyURL($array['title']);
        $array['description_sort'] = $this->input->post('description_sort');
		$array['description_long'] = $this->input->post('description_long');
        $array['datecreate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
        $array['usercreate'] = $login->username;//print_r($array);exit;
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
        $array = json_decode($this->input->post('search'), true);
        $id = $this->input->post('id');
        $login = $this->login;
		$finds = $this->model->table('ivt_markettrend')
					  ->select('image,thumb')
					  ->where('id',$id)
					  ->find();
        if (isset($_FILES['userfile']) && $_FILES['userfile']['name'] != "") {
			if(file_exists('files/markettrend/'.$finds->image)){
				$imge_name = strtolower(uniqid()).$_FILES['userfile']['name'];
			}
			else {
				$filename = $_FILES['userfile']['name'];
			}
			$imge_name = $_FILES['userfile']['name'];
            $this->upload->initialize($this->set_upload_options());
            $image_data = $this->upload->do_upload('userfile', $imge_name); //Ten hinh 
            $array['image'] = $image_data;
            //$resize = $this->resizeImg($image_data);
        }
		if (isset($_FILES['userfile2']) && $_FILES['userfile2']['name'] != "") {
			if(file_exists('files/markettrend/thumb/'.$finds->thumb)){
				$filename = strtolower(uniqid()).$_FILES['userfile2']['name'];
			}
			else {
				$filename = $_FILES['userfile2']['name'];
			}
			
			$temp = explode('.', $_FILES['userfile2']['name']);
			$ext = end($temp);
			$filename = $_FILES['userfile2']['name'];			
			$src_path = $_FILES['userfile2']['tmp_name'];
			$new_path = 'files/markettrend/thumb/'.$filename;
			
			$this->base_model->resizeImg(THUMB_WIDTH, THUMB_HEIGHT, $src_path, $new_path, $array['x'], $array['y'], $array['w'], $array['h'], $ext);
			$array['thumb'] = $filename;
        }
		unset($array['x']);
		unset($array['y']);
		unset($array['w']);
		unset($array['h']);
		
		$array['friendlyurl'] = $this->admin->friendlyURL($array['title']);
        $array['description_sort'] = $this->input->post('description_sort');
		$array['description_long'] = $this->input->post('description_long');
        $array['dateupdate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
        $array['userupdate'] = $login->username;
//print_r($array);exit;
        $result['status'] = $this->model->edits($array, $id);
        $result['csrfHash'] = $token;
        echo json_encode($result);
    }
	function removeImage() {
		$id = $this->input->post('id');
		$sql = "UPDATE ivt_markettrend SET image = NULL WHERE id = $id;";
		$this->model->executeQuery($sql);
	}
    function resizeImg($image_data,$width='',$height='') {
        $this->load->library('image_lib');
        $configz = array();
        $configz['image_library'] = 'gd2';
        $configz['source_image'] = './files/markettrend/thumb/' . $image_data;
        $configz['new_image'] = './files/markettrend/thumb/' . $image_data;
        $configz['create_thumb'] = TRUE;
        $configz['maintain_ratio'] = TRUE;
		if(!empty($width)){
			 $configz['width'] = $width;
		}
		if(!empty($height)){
			 $configz['height'] = $height;
		}
        $this->image_lib->initialize($configz);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    private function set_upload_options() {
        $config = array();
        $config['allowed_types'] = 'jpg|jpeg|gif|png';
        $config['upload_path'] = './files/markettrend/';
        $config['encrypt_nam'] = 'TRUE';
        $config['remove_spaces'] = TRUE;
        //$config['max_size'] = 0024;
        return $config;
    }
	private function set_upload_options2() {
        $config = array();
        $config['allowed_types'] = 'jpg|jpeg|gif|png';
        $config['upload_path'] = './files/markettrend/thumb/';
        $config['encrypt_nam'] = 'TRUE';
        $config['remove_spaces'] = TRUE;
        //$config['max_size'] = 0024;
        return $config;
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
		$finds = $this->model->table('ivt_markettrend')
					  ->select('image,thumb')
					  ->where('id',$id)
					  ->find();
					  
		if(file_exists('files/markettrend/'.$finds->image) && !empty($finds->image)){
			unlink('files/markettrend/'.$finds->image);
		}
		if(file_exists('files/markettrend/thumb/'.$finds->thumb) && !empty($finds->thumb)){
			unlink('files/markettrend/thumb/'.$finds->thumb);	
		}
		$this->model->table('ivt_markettrend')->where("id in ($id)")->delete();	
		
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
}