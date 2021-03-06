<?php

/**
 * @author 
 * @copyright 2015-05
 */
class base_model extends CI_Model {

    function __construct() {
        parent::__construct('');
        $this->load->model();
        $this->route = $this->router->class;
    }

    function sendMail($from, $to, $subject, $message, $cc = "", $bcc = "") {

        $this->load->library('email');

        $this->email->set_header('Header1', 'Value1');
        $this->email->from('khacson2504@gmail.com', 'Stock');
        $this->email->to('khacson1610@gmail.com');
        $this->email->cc('khacson2504@gmail.com');
        $this->email->bcc('khacson1610@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;

        $this->email->initialize($config);

        if (!$this->email->send()) {
            print_r(111);
        }
    }

    public function getPermission($login, $route) {
        $right = '';
        if (isset($login->params[$route])) {
            $right = json_encode($login->params[$route]);
        }
        return json_decode($right, true);
    }

    public function getGroup($schoolid) {
        $query = $this->model->table('ivt_groups')
                ->select('id,groupname')
                ->where('isdelete', 0);

        if (!empty($schoolid)) {
            $query = $query->where('id', $schoolid);
        }
        $query = $query->find_all();
        return $query;
    }

    public function getAllProduct() {
        $query = $this->model->table('ivt_product')
                ->select('id,product_name,manufactureid,default_img')
                ->where('isdelete', 0);
        $query = $query->find_all();
        return $query;
    }

    public function getAllCarrier() {
        $query = $this->model->table('ivt_supplier')
                ->select('id,supplier_name,supplier_image')
                ->where('isdelete', 0);
        $query = $query->find_all();
        return $query;
    }

    public function getAllColor() {
        $query = $this->model->table('ivt_color')
                ->select('id,colorname')
                ->where('isdelete', 0);
        $query = $query->find_all();
        return $query;
    }

    public function getMacAddress() {
        $ip = $_SERVER['REMOTE_ADDR']; 
		return $ip;
        $mac = shell_exec("arp -a $ip");
        $arr = explode(" ", $mac);
        if (isset($arr[3])) {
            $macAddress = $arr[3];
        } else {
            $macAddress = $ip;
        }
        if ($macAddress != 'entries') {
            return $ip . ' ' . $macAddress;
        } else {
            return $ip;
        }
    }

    public function getAllManufacturer() {
        $rs = $this->db->where('isdelete', 0)->get('ivt_manufacture')->result();
        return $rs;
    }

    public function getAllCurrency() {
        $rs = $this->db->where('isdelete', 0)->get('ivt_currency')->result();
        return $rs;
    }

    public function getAllStatus() {
        $rs = $this->db->where('isdelete', 0)->get('ivt_status')->result();
        return $rs;
    }

    public function getAllCapacity() {
        $rs = $this->db->where('isdelete', 0)->get('ivt_capacity')->result();
        return $rs;
    }

    public function getAllInstock() {
        $arr = array("Sold", "Instock");
        return $arr;
    }

    public function getAllOS() {
        $rs = $this->db->where('isdelete', 0)->get('ivt_os')->result();
        return $rs;
    }

    public function getAllPay() {
        $sql = "SELECT * 
                FROM ivt_payment_methods
                WHERE isdelete=0 ";
        return $this->model->query($sql)->execute();
    }

    public function getAllDelivery() {
        $sql = "SELECT * 
                FROM ivt_delivery_methods
                WHERE isdelete=0 ";
        return $this->model->query($sql)->execute();
    }

    public function getAllAccessoriesType() {
        $sql = "SELECT * 
                FROM ivt_accessories_type
                WHERE isdelete=0 ";
        return $this->model->query($sql)->execute();
    }

    public function getAllAccessoriesTypePhone() {
        $sql = "SELECT * 
                FROM ivt_accessories_of_phone
                WHERE isdelete=0 ";
        return $this->model->query($sql)->execute();
    }

    function inverse_column($table, $column, $id) {
        $sql = "UPDATE " . $table . " SET " . $column . " = " . $column . " XOR 1 WHERE id = " . $id;
        $this->db->query($sql);
        return "success";
    }

    function update_column($table, $column, $id, $value) {
        $sql = "UPDATE " . $table . " SET " . $column . " = '" . $value . "' WHERE id = " . $id;
        $this->db->query($sql);
        return "success";
    }

    public function getSearchPrice() {
        $rs = $this->db->select("name, range")->where("isdelete", 0)->from("ivt_price_filter")->get()->result();
        return $rs;
    }

    function getAllMember() {
        $sql = "SELECT id,fullname FROM ivt_member
                        WHERE isdelete=0 and fullname <>''";
        return $this->model->query($sql)->execute();
    }
	
	function getStar() {
        $sql = "SELECT id,name FROM ivt_star ORDER BY id";
        return $this->model->query($sql)->execute();
    }
	
	function getFirebaseDB() {
        $sql = "SELECT * FROM ivt_firebasedb";
        return $this->model->query($sql)->execute();
    }
	
	function getAllUser() {
        $sql = "SELECT id,username,fullname FROM ivt_users
                        WHERE isdelete=0";
        return $this->model->query($sql)->execute();
    }
	
	function getHelpDeskUser($login) {
		$search = '';
		if ($login->grouptype !=  0) {
			$search = " AND id = ".$login->id;
		}
        $sql = "SELECT * FROM ivt_users
                WHERE groupid = 2 AND isdelete=0 AND is_full = 0 $search
				ORDER BY fullname";
        return $this->model->query($sql)->execute();	
	}
	
	function getAllHelpDeskUser($online_status="") {
		$search = '';
		if ($online_status !== '') {
			$search = " AND online_status = $online_status";
		}
        $sql = "SELECT * FROM ivt_users
                WHERE groupid = 2 AND isdelete=0 AND is_full = 0 $search
				ORDER BY -ordering DESC, fullname";
        return $this->model->query($sql)->execute();
    }
	
	function getAllCustomerServiceUser() {
        $sql = "SELECT * FROM ivt_users
                WHERE groupid = 3 AND isdelete=0
				ORDER BY online_status DESC";
        return $this->model->query($sql)->execute();
    }
	
	function updateOnlineStatus($id, $status) {
		$sql = "UPDATE ivt_users
				SET online_status = $status
				WHERE id = $id";
		$this->db->query($sql);
	}
	
	function formatDate($date) {
		$arr = explode('/', $date);
		return $arr[2].'-'.$arr[0].'-'.$arr[1];
	}

    function getAllCountry() {
        $sql = "SELECT id as countryid, country_name as countryname 
					FROM ivt_country
                    WHERE isdelete=0 ";
        return $this->model->query($sql)->execute();
    }

    function getAllDistrict($country = '') {
        if (empty($country)) {
            return array();
        } else {
            return array();
        }
    }

    public function getAllGuarantee() {
        $rs = $this->db->select("id, guaranteename")->where("isdelete", 0)->from("ivt_guarantee")->get()->result();
        return $rs;
    }

    public function getAllProvince($countryid = "") {
        if ($countryid == "all") {
            $rs = $this->db->select("id, province_name")->where("isdelete", 0)->from("ivt_province")->get()->result();
            return $rs;
        } else if (!empty($countryid)) {
            $rs = $this->db->select("id, province_name")->where("isdelete", 0)->where("countryid", $countryid)->from("ivt_province")->get()->result();
            return $rs;
        } else {
            return array();
        }
    }

    function delall($table, $arrid) {
        $arr_id = array_filter($arrid);
        $this->db->where_in("id", $arr_id)->update($table, array("isdelete" => 1));
        return 'success';
    }

	function getPrice($level) {
		$rs = $this->model->table('ivt_service_price')
							->select('price')
							->where('level', $level)
							->find();
		return $rs->price;
	}

	function sendEmail2($to, $sub, $msg){	
		$ci = get_instance();
		$ci->load->library('email');
		$ci->load->library('parser');
		$config['useragent'] = 'CodeIgniter';
		$config['protocol'] = "smtp"; //smtp
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = $this->getEmail(); 
		$config['smtp_pass'] = $this->getEmailPass(); 
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
		$ci->email->from($this->getEmail(),'InvestorPro');
		$list = array($to);
		$ci->email->to($list); 
		$ci->email->subject($sub); 
		
		$ci->email->message($msg);
		//$ci->email->set_header('��ng k? t�i kho?n', '��ng k? th�nh c�ng');
		$send = $ci->email->send();	
		return $send;
	}

	function getImageType($tmp_file) {
		$info   = getimagesize($tmp_file);
		if (!isset($info['mime'])) {
			return '';
		}
		$temp = explode('/', $info['mime']);
		return end($temp);
	}
	
	function isImage($filename, $fileUrl){
		$allowed =  $this->getAllowType();
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$ext = strtolower($ext);
		if(!in_array($ext,$allowed) ) {
			//check ext
			return false;
		}
		//truong hop nguoi dung doi ext bang cach go vao
		if(@is_array(getimagesize($fileUrl))){
			$image = true;
		} else {
			$image = false;
		}
		return $image;		
	}
	
	function getAllowType(){
		return array('gif','png' ,'jpg','jpeg');
	}
	
	function resizeImg($width, $height, $src_path, $new_path, $x, $y, $w, $h, $ext){
		$x = (float) $x;
		$y = (float) $y;
		$w = (float) $w;
		$h = (float) $h;
		if(strtolower($ext) == 'png'){
			$quality = 9;
			$img_r = imagecreatefrompng($src_path);
			$dst_r = ImageCreateTrueColor( $width, $height );

			imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
			$width,$height,$w,$h);

			imagepng($dst_r,$new_path,$quality);
		}
		elseif(strtolower($ext) == 'jpg' || strtolower($ext) == 'jpeg'){
			$quality = 100;
			$img_r = imagecreatefromjpeg($src_path);
			$dst_r = ImageCreateTrueColor( $width, $height );

			imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
			$width,$height,$w,$h);

			imagejpeg($dst_r,$new_path,$quality);
		}
	}
	
	function translateEmail($arrTrans, $msg) {
		foreach ($arrTrans as $k=>$v) {
			$msg = str_replace($k, $v, $msg);
		}
		return $msg;
	}
	
	function getServiceName($level) {
		$rs = $this->model->table('ivt_service_price')
						  ->select('name')
						  ->where('level', $level)
						  ->find();
		return $rs->name;
	}
		
	function getSendMailInfo() {
		$rs = $this->model->table('ivt_sendmail')
						  ->select('*')
						  ->find();
		return $rs;
	}
	
	function getMemberLevel() {
		$pblogin = $this->site->getSession('pblogin');
		if (empty($pblogin)) {
			return 0;
		}
		//mien phi 30 ngay
		$today = gmdate('Y-m-d H:i:s', time() + 7*3600);
		$rs = $this->model->table('ivt_member')
						  ->select('dateactice')
						  ->where('id', $pblogin->id)
						  ->where('active', 1)
						  ->find();
		if (!empty($rs->dateactice)) {
			$t = strtotime($today) - strtotime($rs->dateactice);
			if ($t/86400 <= DAY_FREE) {
				return 2;
			}
		}
		//kiem tra co dk dich vu hay k
		$rs = $this->model->table('ivt_member_level')
						  ->select('level')
						  ->where('member_id', $pblogin->id)
						  ->where('active_status', 1)
						  ->where("to_date >= '$today'")
						  ->order_by('dateupdate desc')
						  ->find();
		if (!empty($rs->level)) {
			return $rs->level;
		}
		return 0;
	}
	
	function checkExpiredDate($member_id) {//return $this->setSessionExpiredDate(-1);
		$pblogin = $this->site->getSession('pblogin');
		if (empty($pblogin)) {
			return 0;
		}
		
		$today = gmdate('Y-m-d H:i:s', time() + 7*3600);
		//kiem tra co dk dich vu hay k
		$rs = $this->model->table('ivt_member_level')
						  ->select('level, to_date')
						  ->where('member_id', $pblogin->id)
						  ->where('active_status', 1)
						  ->where("to_date >= '$today'")
						  ->order_by('dateupdate desc')
						  ->find();
		if (!empty($rs->level)) {
			$t = (strtotime($rs->to_date) - strtotime($today))/86400;
			if ($t <= ALERT_DAY) {
				return $this->setSessionExpiredDate($t);
			}
			return '';
		}
		//mien phi 30 ngay
		$rs = $this->model->table('ivt_member')
						  ->select('dateactice')
						  ->where('id', $pblogin->id)
						  ->where('active', 1)
						  ->find();
		if (!empty($rs->dateactice)) {
			$t = (strtotime($today) - strtotime($rs->dateactice))/86400;
			$t = DAY_FREE - $t;
			if ($t <= ALERT_DAY) {
				return $this->setSessionExpiredDate($t);
			}
			return '';
		}
		return $this->setSessionExpiredDate(-1);
	}
	
	function setSessionExpiredDate($t) {
		$_SESSION['expiredDate'] = ceil($t);
	}
	
	function getMemberInfo($memberID) {
		$rs = $this->model->table('ivt_member')
						  ->select('*')
						  ->where('id', $memberID)
						  ->find();
		return $rs;
	}
	
	function getEmail() {
		return 'investorpro.jsc@gmail.com';
	}
	
	function getEmailPass() {
		return 'DRBL2018';
	}
	
	function rand_string($length) {
		$str = '';
		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}
	
	function getFullUrl() {
		$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		return urlencode($url);
	}

	function getButton() {
		$redirectUrl = $this->getFullUrl();
		$str = '<div class="buttonlist">';
		$str .= '<a class="btn btn-primary" href="'.base_url().'dang-nhap.html?r='.$redirectUrl.'">Đăng nhập</a> ';
		$str .= '<a class="btn btn-primary" href="'.base_url().'dang-ky.html">Đăng ký thành viên</a> ';
		$str .= '<a class="btn btn-primary" href="'.base_url().'dich-vu.html">Đăng ký dịch vụ</a>';
		$str .= '</div>';
		return $str;
	}
	
	function getUserFullname($user_id) {
		$rs = $this->model->table('ivt_users')
						  ->select('fullname')
						  ->where('id', $user_id)
						  ->find();
		return $rs->fullname;
	}
	
	function getStarRate($chat_code) {
        $sql = "SELECT star, DATE(datecreate) datecreate FROM ivt_users_chat_rating
                WHERE chat_code = '$chat_code'
				ORDER BY datecreate DESC
				LIMIT 1;";
        $rs = $this->model->query($sql)->execute();	
		if (empty($rs)) {
			return 0;
		}
		$now = gmdate('Y-m-d', time() + 7*3600);
		if (strtotime($rs[0]->datecreate) == strtotime($now)) {
			return $rs[0]->star;
		}
		return 0;
	}
	
	function getLastChatUser() {
		$member_level = $this->getMemberLevel();
		$rs = $this->getAllCustomerServiceUser();
		$cskh_id = $rs[0]->id;
		if ($member_level < 2) {
			return $cskh_id;
		}
		else {
			$pblogin = $this->site->getSession('pblogin');
			$member_id = $pblogin->id;
			//nguoi chat lan cuoi
			$sql = "SELECT u.id as user_id, u.online_status FROM ivt_member m
					INNER JOIN ivt_users u ON u.id = m.lastchat
					WHERE m.id = $member_id
					LIMIT 1";
			$rs = $this->query($sql)->execute(); 
			if (empty($rs)) {
				$sql = "SELECT c.user_id, u.online_status FROM ivt_users_chat c
						INNER JOIN ivt_users u ON u.id = c.user_id
						WHERE member_id = $member_id
						ORDER BY last_response DESC
						LIMIT 1";
				$rs = $this->query($sql)->execute(); 
				//nguoi nay online thi lay
				if (!empty($rs) && $rs[0]->online_status == 1) {
					return $rs[0]->user_id;
				}
			}
			
			//nguoi nay online thi lay
			if (!empty($rs) && $rs[0]->online_status == 1) {
				return $rs[0]->user_id;
			}
			
			//lay ngau nhien 1 nguoi online
			$sql = "SELECT id FROM ivt_users
					WHERE groupid = 2 AND online_status = 1 AND isdelete = 0";
			$rs = $this->query($sql)->execute();
			if (empty($rs)) {
				return $cskh_id;
			}
			$index = rand(0, count($rs));
			return $rs[$index]->id;
		}
		return $cskh_id;
	}

	function getUniqueAccessId() {
		if (isset($_COOKIE['investorproaccesssessionid'])) {
			$val = $_COOKIE['investorproaccesssessionid'];
			setcookie('investorproaccesssessionid', $val, time() + 86400*360);
			return $val;
		}
		$val = md5(time());
		setcookie('investorproaccesssessionid', $val, time() + 86400*360);
		return $val;
	}
	
	
	
	
	
	
	
	
	
	
	
	
}
