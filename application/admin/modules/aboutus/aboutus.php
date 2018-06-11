<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author 
 * @copyright 2015
 */
class Aboutus extends CI_Controller {

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
        $data->finds = $this->model->finds();

        $content = $this->load->view('view', $data, true);
        $this->admin->write('content', $content, true);
        $this->admin->write('title', $this->title, true);
        $this->admin->render();
    }
	function save() {
		$array = array();
        $permission = $this->base_model->getPermission($this->login, $this->route);
        $token = $this->security->get_csrf_hash();
        if (!isset($permission['add'])) {
            $result['status'] = 0;
            $result['csrfHash'] = $token;
            echo json_encode($result);
            exit;
        }
        $finds = $this->model->finds();
		$id = $finds->id;
        $login = $this->login;
		$array['about_title'] = $this->input->post('about_title');
		$array['meta_title'] = $this->input->post('meta_title');
		$array['meta_keyword'] = $this->input->post('meta_keyword');
		$array['mete_description'] = $this->input->post('mete_description');
		
		$array['description_long'] = $this->input->post('description_long');
		$array['description_short'] = $this->input->post('description_short');
        $array['friendlyurl'] = $this->admin->friendlyURL($array['about_title']);
        $array['datecreate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
        $array['usercreate'] = $login->username;
        
		$status = $this->model->table('ivt_about')->save($id,$array);	
		
	    $result['status'] = $status;
        $result['csrfHash'] = $token;
        echo json_encode($result);
    }
}