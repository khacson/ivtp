<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Son Nguyen 
 * @copyright 2015
 */
class Home extends CI_Controller {
    private $route;
	private $login;
	function __construct(){
		parent::__construct();	
		$this->load->model(array('model','base_model'));
		$this->login = $this->admin->getSession('login');
		$lang = $this->admin->lang;
		//$this->lang->load('table_header',$lang);
		//$this->lang->load('message',$lang);
		$this->route = $this->router->class;
	}
	function _remap($method, $params = array()) {
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        }
        $this->_view();
    }
	function _view(){
		$data = new stdClass();

		$data->csrfName = $this->security->get_csrf_token_name();
		$data->csrfHash = $this->security->get_csrf_hash();		
	    $data->controller = base_url().$this->route;
		$data->routes = $this->route;
		
		$content = $this->load->view('view',$data,true);
		$this->admin->write('content',$content,true);
        $this->admin->render();
	}
	function conline(){ print_r(1); exit;
		$uniqueid = $this->admin->GetSession("lmd_uniqueid_999999"); print_r($uniqueid); exit;
		if(empty($uniqueid)){
			$uniqueid = $this->randUniqueid();
			$this->admin->SetSession("lmd_uniqueid_999999",$uniqueid);
			$datecreate =  gmdate("Y-m-d", time() + 7 * 3600);
			$find = $this->model->table('mm_online')
								->where('unqueid',$unqueid)
								->where('datecreate',$datecreate)
								->find();
			if(!empty($find->id)){
				$this->model->table('mm_online')
							->where('id',$find->id)
							->update(array('status'=>1));
			}
			else{
				$arr = array();
				$arr['unqueid'] = $unqueid;
				$arr['datecreate'] = $datecreate;
				$arr['status'] = 1;
				$this->model->table('mm_online')->insert($arr);
			}
		}
	}
	function offline(){
		$uniqueid = $this->admin->GetSession("lmd_uniqueid_999999");
		$this->model->table('mm_online')
							->where('uniqueid',$uniqueid)
							->update(array('status'=>1));
		$this->admin->DeleteSession("lmd_uniqueid_999999");
	}
	function randUniqueid() {
		$length = 7;
		$pool = '0123456789';
		$str = '';
		for ($i = 0; $i < $length; $i++) {
			$str .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
		}
		$time =  gmdate("ymdHis", time() + 7 * 3600);
		return $time.$str;
	}
}