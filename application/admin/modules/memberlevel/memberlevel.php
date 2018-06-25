<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author 
 * @copyright 2015
 */
class Memberlevel extends CI_Controller {
    private $route;
	private $login;
	function __construct(){
		parent::__construct();	
		$this->load->model(array('model','base_model'));
		$this->login = $this->admin->getSession('login');
		$this->route = $this->router->class;
		$menus = $this->admin->getSession('menus');
		$this->title = $menus[$this->route];
		$this->load->library('upload');
	}
	function _remap($method, $params = array()) {
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        }
        $this->_view();
    }
	function _view(){
		$data = new stdClass();
		$permission = $this->base_model->getPermission($this->login, $this->route);
		if (!isset($permission['view'])) {
	    	redirect(admin_url().'home.html');
	    }
		$this->model->updateActiveStatus();
	    $data->permission = $permission;
		$data->csrfName = $this->security->get_csrf_token_name();
		$data->csrfHash = $this->security->get_csrf_hash();
		$data->routes = $this->route;
		$data->login = $this->login;
	    $data->controller = admin_url().($this->uri->segment(1));
	    $data->userList = $this->base_model->getAllHelpDeskUser();
	    $data->memberList = $this->base_model->getAllMember();
	    $data->starList = $this->base_model->getStar();
		
		$content = $this->load->view('view',$data,true);
		$this->admin->write('content',$content,true);
		$this->admin->write('title',$this->title,true);
        $this->admin->render();
	}
	function getList(){
		
		if(!isset($_POST['csrf_stock_name'])){
			//show_404();
		}
		$this->model->updateActiveStatus();
		$param = array();
		$numrows = 200; 
		$data = new stdClass();
		///
		$index = $this->input->post('index');
        $order = $this->input->post('order');
		if(!empty($order)) {
            $order = str_replace('ord_', '', $order);
        }//
		$page = $this->input->post('page'); 
		$search = $this->input->post('search');
		$search = json_decode($search,true);
		///
		$search['index'] = $index;
        $search['order'] = $order;
		$query = $this->model->getList($search,$page,$numrows);
		$data->start = empty($page) ? 1 : $page + 1;
	    $starList = $this->base_model->getStar();
		$arrStar = array();
		foreach ($starList as $item) {
			$arrStar[$item->id] = $item->name;
		}
		$data->arrStar = $arrStar;

		$count = $this->model->getTotal($search);
		$data->datas = $query;
		$page_view=$this->admin->pagination($count,$numrows,5,'user/',$page);
		$data->permission = $this->base_model->getPermission($this->login, $this->route);
		$result = new stdClass();
		$result->paging = $page_view;
        $result->cPage = $page;
		$result->viewtotal = $count; 
		$result->csrfHash = $this->security->get_csrf_hash();
        $result->content = $this->load->view('list', $data, true);
		echo json_encode($result);
	}
	function changeStatus() {
		$login = $this->login;
		if (empty($login) || empty($login->id)) {
			$result = new stdClass();
			$result->csrfHash = $this->security->get_csrf_hash();
			$result->status = 0;
			echo json_encode($result);die;
		}
		$type = $this->input->post('type');
		$new_status = $this->input->post('new_status');
		$id = $this->input->post('idR');
		
		$rs = $this->model->table('ivt_member_level')
					->select('*')
					->where('id', $id)
					->find();
		if (empty($rs)) {
			$result = new stdClass();
			$result->csrfHash = $this->security->get_csrf_hash();
			$result->status = 0;
			echo json_encode($result);die;
		}
		$time_use = $rs->time_use;
		$level = $rs->level;
		$total_paid = $rs->total_paid;
		$active_code = $rs->active_code;
		$memberId = $rs->member_id;
		
		if ($type == 'active_status') {
			if ($new_status == 1) {
				$array['from_date'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
				$array['to_date'] = gmdate('Y-m-d H:i:s', strtotime("+$time_use months") + 7*3600);
			}
			else {
				$array['from_date'] = NULL;
				$array['to_date'] = NULL;
			}
		}
		$array[$type] = $new_status;
		$array['dateupdate'] = gmdate('Y-m-d H:i:s', time() + 7*3600);
		$array['userupdate'] = $login->username;
		
		$this->model->table('ivt_member_level')
					->where('id', $id)
					->update($array);
		
		if ($type == 'active_status') {
			if ($new_status == 1) {
				$to = $login->email;
				$arrMailInfo = $this->base_model->getSendMailInfo();
				$sub = $arrMailInfo->title_active_service;
				
				if ($time_use < 12 ) {
					$time_use = $time_use.' tháng';
				}
				elseif ($time_use >= 12 ) {
					$time_use = $time_use/12 .' năm';
				}
				$memberInfo = $this->base_model->getMemberInfo($memberId);
				$gender = $memberInfo->sex == 1 ? 'anh' : 'chị';
				$arrTrans['{gender}'] = $gender;
				$arrTrans['{Gender}'] = ucfirst($gender);
				$arrTrans['{fullname}'] = $memberInfo->fullname;
				$arrTrans['{email}'] = $memberInfo->email;
				$arrTrans['{service_name}'] = $this->base_model->getServiceName($level);
				$arrTrans['{time_use}'] = $time_use;
				$arrTrans['{total_paid}'] = number_format($total_paid);
				$arrTrans['{active_code}'] = $active_code;	
				$arrTrans['{from_date}'] = date('d/m/Y H:i', strtotime($array['from_date']));	
				$arrTrans['{to_date}'] = date('d/m/Y H:i', strtotime($array['to_date']));	
				
				$msg = $this->base_model->translateEmail($arrTrans, $arrMailInfo->send_active_service);
				
				$send = $this->base_model->sendEmail2($to, $sub, $msg);
			}
		}
		
		$result = new stdClass();
		$result->csrfHash = $this->security->get_csrf_hash();
		$result->status = 1;
		echo json_encode($result);
	}


}