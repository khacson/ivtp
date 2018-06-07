<?php
include APPPATH.'\libraries\vendor\autoload.php';
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
		$content = file_get_contents(APPPATH."\libraries\\$dbname.json");
		return json_decode($content);
	}
	function create_chatcode($user_id, $member_id, $firebasedb) {
		$chat_code = uniqid();
		$array['chat_code'] = $chat_code;
		$array['user_id'] = $user_id;
		$array['member_id'] = $member_id;
		$array['firebasedb'] = $firebasedb;
		$array['datecreate']  = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
		$this->model->table('ivt_users_chat')->insert($array);	
		return $chat_code;
	}
	function get_user_fullname($user_id) {
		$sql = "SELECT * FROM ivt_users WHERE id = '$user_id'";
		$rs = $this->model->query($sql)->execute();
		if (empty($rs)) {
			echo 'Vui lòng chọn nhân viên để được tư vấn'; die;
		}
		return $rs[0]->fullname;
	}
	
}