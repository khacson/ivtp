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
		$login = $this->site->getSession('pblogin');
		if(empty($login->id)){
			redirect(base_url(), 'location');
		}
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
				if($query->active == 0){
					echo -1; exit;
				}
				$this->site->SetSession("pblogin", $query);
				echo 1; exit;
			}
		}
	}
	function logout(){
		$this->site->DeleteSession("pblogin");
		redirect(base_url(), 'location');
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
		$birthday = str_replace('/','-',$birthday);
		$pass = md5($password).md5(md5('ivt').md5($password));
		$insert = array();
		$insert['fullname'] = $fullname;
		$insert['phone'] = $phone;
		$insert['email'] = $email;
		$insert['password'] = $pass;
		$insert['sex'] = $sex;
		$insert['birthday'] = date('Y-m-d',strtotime($birthday));
		$insert['address'] = $address;
		$insert['working'] = $working;
		$insert['hobby'] = $hobby;
		$insert['datecreate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
		//Check Email
		$query = $this->model->table('ivt_member')
					  ->select('id')
					  ->where('email',$email)
					  ->find(); 
		if(!empty($query->id)){
			echo 0; exit;
		}
		else{
			$this->model->table('ivt_member')->insert($insert);
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
		$config['smtp_pass'] = "swapphonevn@1111";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['priority'] = 3;
		$config['wordwrap'] = TRUE;
		$config['dsn'] = TRUE;
		
		$sendMail = $this->model->table('ivt_sendmail')->find();
		$title_register = '';
		if(!empty($sendMail->title_register)){
			$title_register = $sendMail->title_register;
		}
		$send_register = '';
		if(!empty($sendMail->send_register)){
			$send_register = $sendMail->send_register;
		}
		$tt = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
		$datecreate  = strtotime($tt);
		
		$ci->email->initialize($config);
		$ci->email->clear(TRUE);
		$ci->email->from('swapphonevn@gmail.com','Investor');
		$list = array($email);
		$ci->email->to($list); 
		$ci->email->subject($title_register); 
		
		$url = base_url();
		$message = '';
		$message.= '<h2></h2>';
		$message.= '<p>'.$send_register.'<b></b></p>';
		$message.= '<p><a href="'.$url.'member/active?e='.$email.'&t='.$datecreate.'">Kích hoạt tài khoản</a></p><br>';
		$message.= '<p>Trân trọng,</p>';
		$message.= '<p>Investor</p>';
		$ci->email->message($message);
		//$ci->email->set_header('Đăng ký tài khoản', 'Đăng ký thành công');
		$send = $ci->email->send();	
		return $send;
	}
	function clickForgetpassword(){
		$email = $this->input->post('email');
		$query = $this->model->table('ivt_member')
					  ->select('*')
					  ->where('email',$email)
					  ->find();
		if(empty($query->id)){
			echo -1; exit;
		}
		$fullname = $query->fullname;
		
		$ci = get_instance();
		$ci->load->library('email');
		$ci->load->library('parser');
		$config['useragent'] = 'CodeIgniter';
		$config['protocol'] = "smtp"; //smtp
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "swapphonevn@gmail.com"; 
		$config['smtp_pass'] = "swapphonevn@1111";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['priority'] = 3;
		$config['wordwrap'] = TRUE;
		$config['dsn'] = TRUE;
		
		$sendMail = $this->model->table('ivt_sendmail')->find();
		$title_forgot = '';
		if(!empty($sendMail->title_forgot)){
			$title_forgot = $sendMail->title_forgot;
		}
		$send_forgot = '';
		if(!empty($sendMail->send_forgot)){
			$send_forgot = $sendMail->send_forgot;
		}
		$tt = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
		$datecreate  = strtotime($tt);
		
		$ci->email->initialize($config);
		$ci->email->clear(TRUE);
		$ci->email->from('swapphonevn@gmail.com','Investor');
		$list = array($email);
		$ci->email->to($list); 
		$ci->email->subject($title_forgot); 
		
		$url = base_url();
		$message = '';
		$message.= '<h2></h2>';
		$message.= '<p>'.$send_forgot.'<b></b></p>';
		$message.= '<p><a href="'.$url.'member/activeEmail?e='.$email.'&t='.$datecreate.'">Click vào link để đổi mật khẩu</a></p><br>';
		$message.= '<p>Trân trọng,</p>';
		$message.= '<p>Investor</p>';
		$ci->email->message($message);
		//$ci->email->set_header('Đăng ký tài khoản', 'Đăng ký thành công');
		$send = $ci->email->send();	
		echo 1;
	}
	function register(){
		$data = new stdClass();
		$content = $this->load->view('register',$data,true);
        $this->site->write('content',$content,true);
        $this->site->render();
	}
	function activeEmail(){
		$email = '';
		if(isset($_GET['e'])){
			$email = $_GET['e'];
		}
		$t = '';
		if(isset($_GET['t'])){
			$t = $_GET['t'];
		}
		$data = new stdClass();
		$query = $this->model->table('ivt_member')
					  ->select('id,datecreate')
					  ->where('email',$email)
					  ->find(); 
		if(empty($query->id)){
			$data->content = "Xác nhận email không thành công.";
			$content = $this->load->view('activeNone',$data,true);
			$this->site->write('content',$content,true);
			$this->site->render();
		}		
		else{
			$update = array();
			$update['active'] = 1;
			$update['dateactice'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
			$dateactice = strtotime($query->datecreate);
			//print_r($query); exit;
			if($t - $dateactice > 86400){
				$data->content = "Link Xác nhận email hết hạn.";
				$content = $this->load->view('activeNone',$data,true);
				$this->site->write('content',$content,true);
				$this->site->render();
			}
			else{
				$data->id = $query->id;
				$content = $this->load->view('activeEmail',$data,true);
				$this->site->write('content',$content,true);
				$this->site->render();
			}
		}
	}
	function transPassword(){
		$id =  $this->input->post('id');
		$password = $this->input->post('password');
		$pass = md5($password).md5(md5('ivt').md5($password));
		$update = array();
		$update['password'] = $pass;
		$update['dateupdate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
		$this->model->table('ivt_member')
						  ->where('id',$id)
						  ->update($update); 
		echo 1;
	}
	function active(){
		$email = '';
		if(isset($_GET['e'])){
			$email = $_GET['e'];
		}
		$t = '';
		if(isset($_GET['t'])){
			$t = $_GET['t'];
		}
		$data = new stdClass();
		$query = $this->model->table('ivt_member')
					  ->select('id,datecreate')
					  ->where('email',$email)
					  ->find(); 
		if(empty($query->id)){
			$data->content = "Kích hoạt tài khoản không thành công.";
			$content = $this->load->view('active',$data,true);
			$this->site->write('content',$content,true);
			$this->site->render();
		}		
		else{
			$update = array();
			$update['active'] = 1;
			$update['dateactice'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
			$dateactice = strtotime($query->datecreate);
			//print_r($query); exit;
			if($t - $dateactice > 86400){
				$data->content = "Link kích hoạt tài khoản hết hạn.";
				$content = $this->load->view('active',$data,true);
				$this->site->write('content',$content,true);
				$this->site->render();
			}
			else{
				$this->model->table('ivt_member')
						  ->where('id',$query->id)
						  ->update($update); 
				$data->content = "Kích hoạt tài khoản thành công.";
				$content = $this->load->view('active',$data,true);
				$this->site->write('content',$content,true);
				$this->site->render();
			}
		}
	}
	function forgetpassword(){
		$data = new stdClass();
		
		$content = $this->load->view('forgetpassword',$data,true);
        $this->site->write('content',$content,true);
        $this->site->render();
	}
}