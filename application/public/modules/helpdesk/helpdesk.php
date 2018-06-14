<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @copyright 2018
 */
class Helpdesk extends CI_Controller {
    
	function __construct(){
		parent::__construct();			
	    $this->load->model(array('model','base_model'));
		$this->rows = 20;
	}
    function  _remap($method, $params = array()){
        if(method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        $uri = $this->uri->segment(2);
		if(empty($uri)){
			$this->_view();
		}
		else{
			//Ghi chú link Chi tiết thì thêm dtid sau cùng VD: tieu-de-tin-dt123.html
			$arr_id = explode("-",$uri);
			$count = count($arr_id);
			$key = substr($arr_id[$count-1],0,2);
			$id = substr($arr_id[$count-1],2);
			if($key == 'dt' && is_numeric($id)){
				$this->detail($id);
			}
			else{
				$this->_view($uri);
			}
		}
    }
	function _view(){
		$login = $this->site->getSession('login');
		$finds = $this->model->getInfor();
		$data = new stdClass();
		
	    $data->userList = $this->base_model->getAllHelpDeskUser();
		
        $content = $this->load->view('view',$data,true);
        $this->site->write('content',$content,true);
		$this->site->write('title',$finds->meta_title,true);
		$this->site->write('keywords',$finds->meta_keyword,true);
		$this->site->write('description',$finds->mete_description,true);
        $this->site->render();
	}
	function detail($user_id){
		$data = new stdClass();
		$login = new stdClass();
		/*$finds = $this->model->getFindNews($mcp_id);
		if(!empty($finds->id)){
			$this->site->write('title',$finds->meta_title,true);
			$this->site->write('description',$finds->meta_keyword,true);
			$this->site->write('keywords',$finds->mete_description,true);
			$this->site->write('title_page',$finds->title,true);
		}
		$data->finds = $finds;*/
		$login->id = 111;
		$login->fullname = 'Đặng Thu Huyền';
		$login->signature = 'photo.jpg';
		$data->login = $login;
		$data->userInfo = $this->model->get_user_info($user_id);
		$data->user_id = $user_id;
		
		$dbinfo = $this->model->get_firebasedb_info($user_id);
		$dbinfo2 = $this->model->get_firebasedb_info2($dbinfo->name);
		//echo '<pre>'; print_r($dbinfo);die;
		
		
		$chat_code = $this->model->create_chatcode($user_id, $login->id, $dbinfo->id);

		$data->chat_code = $chat_code;
		$data->configdb = $dbinfo->config;
		$data->token = $this->model->create_custom_token($login->id, $dbinfo2->client_email, $dbinfo2->private_key);
	    $data->starList = $this->base_model->getStar();
		
		$data->controller = base_url() . ($this->uri->segment(1));
        $data->csrfName = $this->security->get_csrf_token_name();
        $data->csrfHash = $this->security->get_csrf_hash();
		$content = $this->load->view('detail',$data,true);
        $this->site->write('content',$content,true);
        $this->site->render();
	}
	function upload_image() {
		if (isset($_FILES)) { 
			$filename = date('dmYHis').'_'.$_FILES['image_file']['name'];
			move_uploaded_file($_FILES['image_file']['tmp_name'], 'upload/chat/'.$filename);
			echo base_url().'/upload/chat/'.$filename;
		}
	}
	function save_rating() {
		$array['star'] = $this->input->post('star');
		$array['note'] = $this->input->post('note');
		$chat_code = $this->input->post('chat_code');
		$this->model->table('ivt_users_chat')->where('chat_code', $chat_code)->update($array);
	}
	function save_chat() {
		$array['chat_code'] = $this->input->post('chat_code');
		$array['type'] = $this->input->post('type');
		$array['name'] = $this->input->post('name');
		$array['avatar'] = $this->input->post('avatar');
		$array['msg'] = $this->input->post('msg');
		$date = $this->input->post('datecreate');
		$array['datecreate'] = date('Y-m-d H:i:s', strtotime($date));
		$this->model->table('ivt_users_chat_detail')->insert($array);
		$this->model->update_last_response($array['chat_code'], $array['datecreate']);
	}
	function getNewToken() {
		$login->id = 111;
		$login->fullname = 'Đặng Thu Huyền';
		$login->signature = 'photo.jpg';
		
		$dbinfo = $this->model->get_firebasedb_info($user_id);
		$dbinfo2 = $this->model->get_firebasedb_info2($dbinfo->name);
		//echo '<pre>'; print_r($dbinfo);die;
		
		$token = $this->model->create_custom_token($login->id, $dbinfo2->client_email, $dbinfo2->private_key);
		echo $token;die;
	}

}