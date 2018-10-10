<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @copyright 2018
 */
class Helpdeskframe extends CI_Controller {
    
	function __construct(){
		parent::__construct();			
	    $this->load->model(array('model','base_model'));
		$this->rows = 20;
		$this->postLevel = 2;
	}
    function  _remap($method, $params = array()){
		if(method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
		$user_id = $this->uri->segment(2);
        $this->detail($user_id);
    }
	function _view(){
		$login = $this->site->getSession('login');
		$finds = $this->model->getInfor();
		$data = new stdClass();
		
	    $data->userList = $this->base_model->getAllHelpDeskUser();
	    $data->userServiceList = $this->base_model->getAllCustomerServiceUser();
		
		$data->listNew = $this->model->getFindNew(0);
        $content = $this->load->view('view',$data,true);
        $this->site->write('content',$content,true);
		$this->site->write('title','Tư vấn',true);
		$this->site->write('keywords',$finds->meta_keyword,true);
		$this->site->write('description',$finds->mete_description,true);
        $this->site->render();
	}
	function detail($user_id){
		$data = new stdClass();

		$data->userInfo = $this->model->get_user_info($user_id);
		$data->user_id = $user_id;
		$data->status = 'Offline';
		$data->welcome_msg = '';
		
		$data->listNew = $this->model->getFindNew(0);
		$dbinfo = $this->model->get_firebasedb_info($user_id);
		$dbinfo2 = $this->model->get_firebasedb_info2($dbinfo->name);
		
		$login = $this->site->getSession('pblogin');
		$memberLevel = $this->base_model->getMemberLevel();
		if ($memberLevel < $this->postLevel) {
			if ($data->userInfo->groupid != 3) {
				
				$redirectUrl = $this->base_model->getFullUrl();
				header('Location: '.base_url().'dang-nhap.html?r='.$redirectUrl);
				return;
				
				$content = $this->load->view('404',$data,true);
				$this->site->write('content',$content,true);
				$this->site->render();
				return;
			}
			else {
				if (empty($login)) {
					$login = new stdClass();
					$login->id = $this->model->getGuestId() * (-1);
					$login->fullname = 'Guest'.$login->id;
					$login->signature = 'noavatar.png';
					$isGuest = 1;
				}
				else {
					$isGuest = 0;
					$login->signature = $login->avatar;
				}
			}
		}
		else {
			$isGuest = 0;
			$login->signature = $login->avatar;
		}

		if ($data->userInfo->online_status == 1) {
			$data->status = 'Online';
			$data->welcome_msg = 'Xin chào bạn, mình có thể giúp được gì cho bạn ạ?';
		}
		else {
			$data->status = 'Offline';
			$data->welcome_msg = 'Xin chào bạn, bạn vui lòng để lại lời nhắn, mình sẽ phản hồi trong thời gian sớm nhất.';
		}

		$chat_code = $this->model->create_chatcode($user_id, $login->id, $dbinfo->id, $isGuest);
		$data->showViewOldChat = $this->model->getShowViewOldChat($login->id, $chat_code);
		$data->isGuest = $isGuest;
		$data->serviceGroup = $data->userInfo->groupid == 3 ? 1 : 0;
		$data->login = $login;
		$data->chat_code = $chat_code;
		$data->configdb = $dbinfo->config;
		$data->token = $this->model->create_custom_token($login->id, $dbinfo2->client_email, $dbinfo2->private_key);
	    $data->starList = $this->base_model->getStar();
	    $data->starRate = $this->base_model->getStarRate($chat_code);
		
		$data->controller2 = base_url() . ($this->uri->segment(1));
		$data->controller = base_url() . 'helpdesk';
        $data->csrfName = $this->security->get_csrf_token_name();
        $data->csrfHash = $this->security->get_csrf_hash();
		$content = $this->load->view('frame_chat',$data,true);
        echo $content;
	}
	function checkNewAlert() {
		$login = $this->site->getSession('pblogin');
		if (empty($login)) {
			echo json_encode(array()); die;
		}
		$rs = $this->model->getNewAlert($login);
		return $rs;
	}
	function createImgFromBase64() {
		$base64Src = $this->input->post('base64Src');
		$base64Src = str_replace(array('data:image/', ';base64'), '', $base64Src);
		$arr = explode(',', $base64Src);
		if ($arr[1]) {
			$content = base64_decode($arr[1]);
			$ext = $arr[0];
			$filename = uniqid().".$ext";
			file_put_contents("upload/chat/$filename", $content);
			echo base_url().'upload/chat/'.$filename; die;
		}
		echo ''; die;
	}
}