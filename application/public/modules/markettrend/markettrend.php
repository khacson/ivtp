<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @copyright 2018
 */
class Markettrend extends CI_Controller {
    
	function __construct(){
		parent::__construct();			
	    $this->load->model();
		$this->rows = 20;
	}
    function  _remap($method, $params = array()){
        if(method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        $uri = $this->uri->segment(2);
		if(empty($uri)){
			$this->_view();
		}
		else{
			//Ghi chú link Chi tiết thì thêm dtid sau cùng VD: tieu-de-tin-dt123.html
			$arr_id = explode("-",$uri);
			$count = count($arr_id);
			$key = substr($arr_id[$count-1],0,2);
			$id = substr($arr_id[$count-1],2);
			if($key == 'dt' && is_numeric($id)){
				$this->_detail($id);
			}
			else{
				$this->_view($uri);
			}
		}
    }
	function _view(){
		$login = $this->site->getSession('login');
		$finds = $this->model->getInfor();
		$data = new stdClass();
		//$data->news = $this->model->getNews();
		//$data->services = $this->model->getService();
		//$data->finds = $finds;
		
        $content = $this->load->view('view',$data,true);
        $this->site->write('content',$content,true);
		$this->site->write('title',$finds->meta_title,true);
		$this->site->write('keywords',$finds->meta_keyword,true);
		$this->site->write('description',$finds->mete_description,true);
        $this->site->render();
	}
	function _detail($id){
		$data = new stdClass();
		$finds = $this->model->getFind($id);
		$data->catalogs = $this->model->getMarkettendCatalog();
		$data->listNew = $this->model->getFindNew($id);
		if(!empty($finds->id)){
			$this->site->write('title',$finds->meta_title,true);
			$this->site->write('description',$finds->meta_keyword,true);
			$this->site->write('keywords',$finds->mete_description,true);
			$this->site->write('title_page',$finds->title,true);
		}
		$data->finds = $finds;
		
		$content = $this->load->view('detail',$data,true);
        $this->site->write('content',$content,true);
        $this->site->render();
	}
}