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
					  ->where('isdelete',0)
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
				$this->site->SetSession("pblogin", $query);
				echo 1; exit;
			}
		}
	}
	function clickregistor(){
		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$phone = $this->input->post('phone');
		$sex =  $this->input->post('sex');
		$birthday =  $this->input->post('birthday');
		$address =  $this->input->post('address');
		$working =  $this->input->post('working');
		$hobby =  $this->input->post('hobby');

		$insert = array();
		$insert['fullname'] = $fullname;
		$insert['email'] = $email;
		$insert['password'] = $password;
		$insert['sex'] = $sex;
		$insert['birthday'] = date('Y-m-d',strtotime($birthday));
		$insert['address'] = $address;
		$insert['working'] = $working;
		$insert['hobby'] = $hobby;
		//Check Email
		$query = $this->model->table('ivt_member')
					  ->select('id')
					  ->where('email',$email)
					  ->find(); 
		if(!empty($query->id)){
			echo 0; exit;
		}
		else{
			$this->sendEmail($email,$fullname);
			echo 1; exit;
		}
	}
	function sendEmail($email='',$fullname=''){	
		$ci = get_instance();
		$ci->load->library('email');
		$ci->load->library('parser');
		$config['useragent'] = 'CodeIgniter';
		$config['protocol'] = "smtp"; //smtp
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "swapphonevn@gmail.com"; 
		$config['smtp_pass'] = "swapphonevn@123";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['priority'] = 3;
		$config['wordwrap'] = TRUE;
		$config['dsn'] = TRUE;
		
		$datecreate  = '20'.strtotime(gmdate("Y-m-d H:i:s", time() + 7 * 3600));
		$ci->email->initialize($config);
		$ci->email->clear(TRUE);
		$ci->email->from('swapphonevn@gmail.com','Swapphone');
		$list = array($email);
		$ci->email->to($list); 
		$ci->email->subject('Đăng ký tài khoản Investor'); 
		
		$url = base_url();
		$message = '';
		$message.= '<h2></h2>';
		$message.= '<p>'.getLanguagePubic('xin-chao').': '.$fullname.'<b></b></p>';
		$message.= '<p>'.getLanguagePubic('xin-chuc-mung-thanh-vien').'</p>';
		$message.= '<p>'.getLanguagePubic('click-xac-nhan-mail').'</p>'; 
		$message.= '<p><a href="'.$url.'register/active?e='.$email.'&t='.$datecreate.'">Click  </a></p><br>';
		$message.= '<p>'.getLanguagePubic('tran-tong').',</p>';
		$message.= '<p>Swapphone team</p>';
		$ci->email->message($message);
		//$ci->email->set_header('Đăng ký tài khoản', 'Đăng ký thành công');
		$send = $ci->email->send();	
		return $send;
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