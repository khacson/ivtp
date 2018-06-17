<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @copyright 2018
 */
class Home extends CI_Controller {
    
	function __construct(){
		parent::__construct();			
	    $this->load->model();
		$this->site->setTemplate('home');
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
		$data->slides = $this->model->getSlideList();
		
		$data->supperliers = $this->model->getSupperlier();
		$data->markettrends = $this->model->getMarkettrend();
		$data->cps = $this->model->getCP();
		$data->cpTangs = $this->model->getCPTang();
		
		$content = $this->load->view('view',$data,true);
        $this->site->write('content',$content,true);
		$this->site->write('title',$find->meta_title,true); 
		$this->site->write('description',$find->mete_description,true);
		$this->site->write('keywords',$find->meta_keyword,true);
        $this->site->render();
	}
}