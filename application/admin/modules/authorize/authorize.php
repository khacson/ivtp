<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @copyright 2015
 */
class authorize extends CI_Controller {
    
	function __construct(){
		parent::__construct();	
		$this->load->model(array('model','base_model'));
		//$lang = $this->admin->lang;
		//$this->lang->load('message',$lang);
		$this->admin->setTemplate('login');
		$this->route = $this->router->class;
	}
	function _remap($method, $params = array()) {
                if (method_exists($this, $method)) {
                    return call_user_func_array(array($this, $method), $params);
                }
                $this->_view();  
        }
	function _view(){
		$data = new stdClass();
		$data->token = $this->security->get_csrf_hash();
		$data->routes = $this->route;
		if(isset($_COOKIE['sellffm_user'])){
			$data->username = $_COOKIE['sellffm_user'];
		}
		else{
			$data->username = '';
		}
		if(isset($_COOKIE['sellffm_pass'])){
			$data->password = $_COOKIE['sellffm_pass'];
		}
		else{
			$data->password = '';
		}
		
		$content = $this->load->view('view',$data,true);
		$this->admin->write('content',$content,true);
        $this->admin->render();
	}
	function login(){
		$debug = true;
		$u = $this->input->post("username");
		$p = $this->input->post("password");
		$remember = $this->input->post("remember");
		$captcha = md5($this->input->post("captcha"));
		$captcha_lkn =  $this->admin->GetSession("captcha_lkn");
		

		$login = $this->model->login($u);
		$address = $_SERVER['REMOTE_ADDR'];
		$GMTTime = date("Y-m-d H:i:s");
		$token = $this->security->get_csrf_hash();
		// insert log
		//$idtimelog = $this->model->insertTimeLog($u , $address, $GMTTime);
        $this->admin->DeleteSession("login");
		$result = array();
		$pass = md5("firefuma.com").md5($p);
		if($captcha != $captcha_lkn){
			$result['status'] = 0;
			$result['token'] = $this->security->get_csrf_hash();
			echo json_encode($result); exit;
		}
		if (!empty($login->id)){
			if ($pass == $login->password){ // compare password success
				// set session
				$login->logtime = $GMTTime;
				$login->params = $this->model->getRouter($login->params);
				//$lang = $this->model->getLanguage();
				unset($login->password);
				$this->admin->SetSession("login", $login);
				$listmenu = $this->model->getListMenu();
				$this->admin->SetSession("menus",$listmenu);
				//$this->admin->SetSession("language", $lang);
				//$this->admin->SetSession("keylang","vn");
				$result['status'] = 1;
				if($remember == 1){
					setcookie('sellffm_user',$u, time() + (86400 * 7),"/"); 
					setcookie('sellffm_pass',$p, time() + (86400 * 7),"/"); 
				}
				else{
					setcookie('sellffm_user','', time() + (86400 * 7),"/"); 
					setcookie('sellffm_pass','', time() + (86400 * 7),"/"); 
				}
				$result['token'] = $this->security->get_csrf_hash();
				$now = gmdate('Y-m-d H:i:s', time() + 7*3600);
				$sql = "UPDATE ivt_users set lastlogin = '$now' WHERE id = ".$login->id;
				$this->model->executeQuery($sql);
				echo json_encode($result);
			} 
			else {
				$result['status'] = 10;
				$result['token'] = $this->security->get_csrf_hash();
				echo json_encode($result);
			}
		} 
		else {
			$result['status'] = 0;
			$result['token'] = $this->security->get_csrf_hash();
			echo json_encode($result);
		}
	}
	function captcha(){
        $captcha = $this->admin->createCapcha('captcha_lkn', 160,33,1);   
    }
	function logout(){
		$login = $this->admin->getSession('login');
		$this->base_model->updateOnlineStatus($login->id, 0);
		$this->admin->DeleteSession("login");
		$this->admin->DeleteSession("menus");
		redirect(admin_url().'authorize');	
	}
}