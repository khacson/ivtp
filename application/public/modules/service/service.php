<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @copyright 2018
 */
class Service extends CI_Controller {
    
	function __construct(){
		parent::__construct();	
	    $this->load->model(array('model','base_model'));
		$this->rows = 20;
		$this->normal_price = $this->base_model->getPrice(1);
		$this->vip_price = $this->base_model->getPrice(2);
	}
    function  _remap($method, $params = array()){
        if(method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        $url = $this->uri->segment(2);
		if(empty($url)){
			$this->_view();
		}
		else{
			$this->_detail($url);
		}
    }
	function _view(){ //echo $this->base_model->getMemberLevel();die;
		$login = $this->site->getSession('pblogin');
		$finds = $this->model->getInfor();
		$data = new stdClass();
		//$data->news = $this->model->getNews();
		$data->services = $this->model->getService();
		$data->finds = $finds;
		$data->login = $login;
		$data->normal_price = $this->normal_price;
		$data->vip_price = $this->vip_price;
		$data->serviceInfo = $this->model->getServiceDetail();
	
		
        $content = $this->load->view('view',$data,true);
        $this->site->write('content',$content,true);
		$this->site->write('title','Dịch vụ',true);
		$this->site->write('keywords',$finds->meta_keyword,true);
		$this->site->write('description',$finds->mete_description,true);
        $this->site->render();
	}
	function _detail($url){
		$data = new stdClass();
		$finds = $this->model->getFindDetail($url);
		if(empty($finds->id)){
			 redirect(base_url().'dich-vu.html', 'location');
		}
		$this->site->write('title',$finds->meta_title,true);
		$this->site->write('description',$finds->meta_keyword,true);
		$this->site->write('keywords',$finds->mete_description,true);
		$this->site->write('title_page',$finds->title,true);
		$data->finds = $finds;
		
		$content = $this->load->view('detail',$data,true);
        $this->site->write('content',$content,true);
        $this->site->render();
	}
}