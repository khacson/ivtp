<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @copyright 2017
 */
class Contactus extends CI_Controller {
	function __construct(){
		parent::__construct();			
	    $this->load->model();
	}
    function  _remap($method, $params = array()){
        if(method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        $this->_view();
    }
	function _view(){
		$data = new stdClass();
		$find = $this->model->getInfor();
		$data->finds = $find;
		$content = $this->load->view('view',$data,true);
        $this->site->write('content',$content,true);
		$this->site->write('title',$find->meta_title,true);
		$this->site->write('description',$find->mete_description,true);
		$this->site->write('keywords',$find->meta_keyword,true);
        $this->site->render();
	}
	function save(){
		$arrInsert = array();
		$arrInsert['fullname'] = $this->input->post('fullname');
		$arrInsert['phone'] = $this->input->post('phone');
		$arrInsert['email'] = $this->input->post('email');
		$arrInsert['description'] = $this->input->post('description');
		$arrInsert['datecreate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
		$this->model->table('ivt_contacus')->insert($arrInsert);
		echo 1;
	}
}