<?php
/**
 * @author 
 * @copyright 2018
 */
class MemberModel extends CI_Model
{
	function __construct(){
		parent::__construct('');
	}
	function getService(){
		$query = $this->model->table('ivt_service')
					  ->where('isdelete',0)
					  ->find_all();
		return $query;
	}
	function getInfor(){
		$query = $this->model->table('ivt_contact')
					  ->where('isdelete',0)
					  ->find();
		return $query;
	}
	function getActiveCode() {
		$code = $this->base_model->rand_string(5);
		$rs = $this->model->table('ivt_member_level')
						  ->select('id')
						  ->where('active_code', $code)
						  ->find();
		if (empty($rs)) {
			return $code;
		}
		else {
			return $this->getActiveCode();
		}
	}	
	function getTotalPaid($price_per_mon, $time_use) {
		if ($time_use < 6) {
			return $price_per_mon * $time_use;
		}
		else if ($time_use >= 6 && $time_use < 12) {
			return $price_per_mon * $time_use * (1 - DISCOUNT_RATE_1);
		}
		else if ($time_use >= 12) {
			return $price_per_mon * $time_use * (1 - DISCOUNT_RATE_2);
		}
	}
	function getServiceInfo($pblogin) {
		$arr = array(
			'service_name' => '',
			'from_date' => '',
			'to_date' => '',
			'status' => '',
		);
		$today = gmdate('Y-m-d H:i:s', time() + 7*3600);
		//kiem tra co dk dich vu hay k
		$rs = $this->model->table('ivt_member_level')
						  ->select('*')
						  ->where('member_id', $pblogin->id)
						  ->where('active_status', 1)
						  ->order_by('dateupdate desc')
						  ->find();
		if (!empty($rs->level)) {
			if ($rs->level == 1) {
				$service_name = 'Normal';
			}
			else if ($rs->level == 2) {
				$service_name = 'VIP';
			}
			if (strtotime($rs->to_date) >= strtotime($today)) {
				$arr['status'] = 'Đã kích hoạt';
			}
			else {
				$arr['status'] = 'Đã hết hạn';
			}
			$arr['service_name'] = $service_name;
			$arr['from_date'] = date('d/m/Y H:i', strtotime($rs->from_date));
			$arr['to_date'] = date('d/m/Y H:i', strtotime($rs->to_date));
			return $arr;
		}
		
		//mien phi 30 ngay
		$rs = $this->model->table('ivt_member')
						  ->select('dateactice')
						  ->where('id', $pblogin->id)
						  ->where('active', 1)
						  ->find();
		if (!empty($rs->dateactice)) {
			$t = strtotime($today) - strtotime($rs->dateactice);
			if ($t/86400 <= DAY_FREE) {
				$arr['status'] = 'Đã kích hoạt';
			}
			else {
				$arr['status'] = 'Đã hết hạn';
			}
			
			//VIP 30 ngay
			$arr['service_name'] = 'Free (VIP '.DAY_FREE.' ngày)';
			$arr['from_date'] = date('d/m/Y H:i', strtotime($rs->dateactice));
			$arr['to_date'] = date('d/m/Y H:i', strtotime('+'.DAY_FREE.' days', strtotime($rs->dateactice)));
			return $arr;
		}
		
	}
}