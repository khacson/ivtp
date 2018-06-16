<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @copyright 2018
 */
class Member extends CI_Controller {
    
	function __construct(){
		parent::__construct();			
	    $this->load->model();
		$this->rows = 20;
	}
    function  _remap($method, $params = array()){
        if(method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        $url = $this->uri->segment(2);
		if(empty($url)){
			$this->_view();
		}
		else{
			$this->_detail($url);
		}
    }
	function _view(){
		$login = $this->site->getSession('login');
		$finds = $this->model->getInfor();
		$data = new stdClass();
		//$data->news = $this->model->getNews();
		//$data->services = $this->model->getService();
		$data->finds = $finds;
		
        $content = $this->load->view('view',$data,true);
        $this->site->write('content',$content,true);
		$this->site->write('title',$finds->meta_title,true);
		$this->site->write('keywords',$finds->meta_keyword,true);
		$this->site->write('description',$finds->mete_description,true);
        $this->site->render();
	}
	function login(){
		$data = new stdClass();
		
		$content = $this->load->view('login',$data,true);
        $this->site->write('content',$content,true);
        $this->site->render();
	}
	function clicklogin(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$pass = md5($password).md5(md5('ivt').md5($password));
		$query = $this->model->table('ivt_member')
					  ->where('email',$email)
					  ->where('isdelete',1)
					  ->find();
		if(empty($query->id)){
			echo 0; exit;
		}
		else{
			$password = $query->password;
			if($password != $pass){
				echo 0; exit;
			}
			else{
				$this->admin->SetSession("pblogin", $query);
				echo 1; exit;
			}
		}
	}
	function register(){
		$data = new stdClass();
		$content = $this->load->view('register',$data,true);
        $this->site->write('content',$content,true);
        $this->site->render();
	}
	function forgetpassword(){
		$data = new stdClass();
		
		$content = $this->load->view('forgetpassword',$data,true);
        $this->site->write('content',$content,true);
        $this->site->render();
	}
}