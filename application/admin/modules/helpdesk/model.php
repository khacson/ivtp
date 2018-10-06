<?php
include APPPATH.'libraries/vendor/autoload.php';
use Firebase\JWT\JWT;

 class HelpdeskModel extends CI_Model{
	function __construct(){
		parent::__construct();
		
	}
	
	function create_custom_token($uid, $service_account_email, $private_key) {
		$now_seconds = time();
		$payload = array(
			"iss" => $service_account_email,
			"sub" => $service_account_email,
			"aud" => "https://identitytoolkit.googleapis.com/google.identity.identitytoolkit.v1.IdentityToolkit",
			"iat" => $now_seconds,
			"exp" => $now_seconds+(60*60),  // Maximum expiration time is one hour
			"uid" => $uid
		);
		return JWT::encode($payload, $private_key, "RS256");
	}
	function get_firebasedb_info($id) {
		$sql = "SELECT * FROM ivt_firebasedb
				WHERE id IN(SELECT firebasedb FROM ivt_users WHERE id = '$id')";
		$rs = $this->model->query($sql)->execute();
		if (empty($rs)) {
			echo 'Bạn không có quyền vào trang này'; die;
		}
		return $rs[0];
	}
	function get_firebasedb_info2($dbname) {
		$content = file_get_contents(APPPATH."libraries/firebasedb/$dbname.json");
		return json_decode($content);
	}
	function update_last_response($chat_code, $last_response) {
		$array['last_response'] = $last_response;
		$array['last_response_utc'] = gmdate('Y-m-d H:i:s', time());
		$this->model->table('ivt_users_chat')->where('chat_code', $chat_code)->update($array);
	}
	function create_chatcode($user_id, $member_id, $firebasedb, $isGuest) {
		//moi khach hang chat nhieu lan trong ngay thi dung chung 1 ma chat
		if ($isGuest) {
			$chat_code = 'C'.$user_id.'G'.$member_id;
		}
		else {
			$chat_code = 'C'.$user_id.'M'.$member_id;
		}
		$check = $this->check_exist_chatcode($chat_code); 
		if (empty($check)) {
			$array['chat_code'] = $chat_code;
			$array['user_id'] = $user_id;
			$array['member_id'] = $member_id;
			$array['firebasedb'] = $firebasedb;
			$array['datecreate']  = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
			$this->model->table('ivt_users_chat')->insert($array);	
		}
		else {
			$array['dateupdate']  = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
			$this->model->table('ivt_users_chat')->where('id', $check->id)->update($array);	
		}
		return $chat_code;
	}
	function check_exist_chatcode($chat_code) {	
		$rs = $this->model->table('ivt_users_chat')
						->select('id')
						->where('chat_code', $chat_code)
						->find();
		return $rs;
	}
}