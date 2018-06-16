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
	function update_last_response($chat_code, $last_response) {
		$array['last_response'] = $last_response;
		$array['last_response_utc'] = gmdate('Y-m-d H:i:s', time());
		$this->model->table('ivt_users_chat')->where('chat_code', $chat_code)->update($array);
	}
}