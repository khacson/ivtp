<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author 
 * @copyright ivt_
 */
class Helpdesk extends CI_Controller {

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
            redirect('authorize');
        }
        $data->permission = $permission;
        $data->csrfName = $this->security->get_csrf_token_name();
        $data->csrfHash = $this->security->get_csrf_hash();
        $data->routes = $this->route;
        $data->login = $this->login;
        $data->controller = admin_url() . ($this->uri->segment(1));
        
		$dbinfo = $this->model->get_firebasedb_info($this->login->id);
		$dbinfo2 = $this->model->get_firebasedb_info2($dbinfo->name);
		//echo '<pre>'; print_r($dbinfo);die;

		$data->configdb = $dbinfo->config;
		$data->token = $this->model->create_custom_token($this->login->id, $dbinfo2->client_email, $dbinfo2->private_key);
		
        
		$content = $this->load->view('view', $data, true);
        $this->admin->write('content', $content, true);
        $this->admin->write('title', $this->title, true);
        $this->admin->render();
    }
	function form($id=''){
		$data = new stdClass();
        $permission = $this->base_model->getPermission($this->login, $this->route);
        if (!isset($permission['view'])) {
            redirect('authorize');
        }
        $data->permission = $permission;
        $data->csrfName = $this->security->get_csrf_token_name();
        $data->csrfHash = $this->security->get_csrf_hash();
        $data->routes = $this->route;
        $data->login = $this->login;
        $data->controller = admin_url() . ($this->uri->segment(1));
        $data->groups = $this->base_model->getGroup(''); 
		$data->finds = $this->model->detail($id);
        $data->investmentTypes = $this->model->investmentType('');
		
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
        $page_view = $this->admin->pagination($count, $numrows, 5, 'investment/', $page);
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
            $imge_name = $_FILES['userfile2']['name'];
            $this->upload->initialize($this->set_upload_options2());
            $image_data = $this->upload->do_upload('userfile2', $imge_name); //Ten hinh 
            $array['thumb'] = $image_data;
            $resize = $this->resizeImg($image_data,300,300);
        }
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
		$finds = $this->model->table('ivt_investment')
					  ->select('image,thumb')
					  ->where('id',$id)
					  ->find();
        if (isset($_FILES['userfile']) && $_FILES['userfile']['name'] != "") {
			if(file_exists('files/investment/'.$finds->image)){
				unlink('files/investment/'.$finds->image);
			}
			$imge_name = $_FILES['userfile']['name'];
            $this->upload->initialize($this->set_upload_options());
            $image_data = $this->upload->do_upload('userfile', $imge_name); //Ten hinh 
            $array['image'] = $image_data;
            //$resize = $this->resizeImg($image_data);
        }
		if (isset($_FILES['userfile2']) && $_FILES['userfile2']['name'] != "") {
			if(file_exists('files/investment/thumb/'.$finds->thumb)){
				unlink('files/investment/thumb/'.$finds->thumb);
			}
			$imge_name = $_FILES['userfile2']['name'];
            $this->upload->initialize($this->set_upload_options2());
            $image_data = $this->upload->do_upload('userfile2', $imge_name); //Ten hinh 
            $array['thumb'] = $image_data;
            $resize = $this->resizeImg($image_data,300,300);
        }
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

    function resizeImg($image_data,$width='',$height='') {
        $this->load->library('image_lib');
        $configz = array();
        $configz['image_library'] = 'gd2';
        $configz['source_image'] = './files/investment/thumb/' . $image_data;
        $configz['new_image'] = './files/investment/thumb/' . $image_data;
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
        $config['upload_path'] = './files/investment/';
        $config['encrypt_nam'] = 'TRUE';
        $config['remove_spaces'] = TRUE;
        //$config['max_size'] = 0024;
        return $config;
    }
	private function set_upload_options2() {
        $config = array();
        $config['allowed_types'] = 'jpg|jpeg|gif|png';
        $config['upload_path'] = './files/investment/thumb/';
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
		$finds = $this->model->table('ivt_investment')
					  ->select('image,thumb')
					  ->where('id',$id)
					  ->find();
					  
		if(file_exists('files/investment/'.$finds->image) && !empty($finds->image)){
			unlink('files/investment/'.$finds->image);
		}
		if(file_exists('files/investment/thumb/'.$finds->thumb) && !empty($finds->thumb)){
			unlink('files/investment/thumb/'.$finds->thumb);	
		}
		$this->model->table('ivt_investment')->where("id in ($id)")->delete();	
		
        $result['status'] = 1;
        $result['csrfHash'] = $token;
        echo json_encode($result);
    }
	function isshow(){
		$array = array();
		$id = $this->input->post('id');
		$value = $this->input->post('value');
		$array['isshow'] = $value * -1 + 1;
		$this->model->table('ivt_investment')->save($id,$array);	
	}
	function upload_image() {
		if (isset($_FILES)) { 
			$filename = date('dmYHis').'_'.$_FILES['image_file']['name'];
			move_uploaded_file($_FILES['image_file']['tmp_name'], 'upload/chat/'.$filename);
			echo base_url().'upload/chat/'.$filename;
		}
	}
	function save_chat() {
		$array['chat_code'] = $this->input->post('chat_code');
		$array['type'] = $this->input->post('type');
		$array['name'] =  $this->input->post('name');
		$array['avatar'] = $this->input->post('avatar');
		$array['msg'] = $this->input->post('msg');
		$date = $this->input->post('datecreate');
		$array['datecreate'] = date('Y-m-d H:i:s', strtotime($date));
		$this->model->table('ivt_users_chat_detail')->insert($array);
	}
}