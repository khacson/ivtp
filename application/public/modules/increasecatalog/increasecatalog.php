<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @copyright 2018
 */
class Increasecatalog extends CI_Controller {
    
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
		
		$updateInfo = $this->model->getUpdateInfo();
		$data->titles = $this->model->getTitles(1);
        $data->info = $updateInfo;
		$data->datas = $this->model->getList();
		$data->inc_des_avg = $this->model->get_inc_des_avg();
		$data->listNew = $this->model->getFindNew(0);
		
		$id = -1;
		$login = $this->site->getSession('pblogin');
		if (empty($login)) {
			$m_fullname = '';
			$m_email = '';
		}
		else {
			$m_fullname = $login->fullname;
			$m_email = $login->email;
		}
		$array = array();
		$array['postId'] = $id;
		$array['m_fullname'] = $m_fullname;
		$array['m_email'] = $m_email;
		
		$data->commentForm = $this->load->view('comment_form',$array,true);
		
		$array['commentList'] = $this->getCommentList($id);
		$data->commentList = $this->load->view('comment_list',$array,true);
		$data->commentCount = count($array['commentList']);
        $content = $this->load->view('view',$data,true);
        $this->site->write('content',$content,true);
		$this->site->write('title',$finds->meta_title,true);
		$this->site->write('keywords',$finds->meta_keyword,true);
		$this->site->write('description',$finds->mete_description,true);
        $this->site->render();
	}
	function _detail($mcp_id){
		$data = new stdClass();
		/*$finds = $this->model->getFindNews($mcp_id);
		if(!empty($finds->id)){
			$this->site->write('title',$finds->meta_title,true);
			$this->site->write('description',$finds->meta_keyword,true);
			$this->site->write('keywords',$finds->mete_description,true);
			$this->site->write('title_page',$finds->title,true);
		}
		$data->finds = $finds;*/
		
		$updateInfo = $this->model->getUpdateInfo();
		$data->mcp = $this->model->getMcp($mcp_id);
        $data->titleYear = $this->model->getTitles(2);
        $data->titleQuater = $this->model->getTitles(3);
		$data->dataYear = $this->model->getDataYear($mcp_id);
		$data->dataQuater = $this->model->getDataQuater($mcp_id);
		$data->image = $this->model->getImage($mcp_id);
		$data->info = $updateInfo;
		$data->listNew = $this->model->getFindNew(0);
		$id = -1;
		
		$login = $this->site->getSession('pblogin');
		if (empty($login)) {
			$m_fullname = '';
			$m_email = '';
		}
		else {
			$m_fullname = $login->fullname;
			$m_email = $login->email;
		}
		$array = array();
		$array['postId'] = $id;
		$array['m_fullname'] = $m_fullname;
		$array['m_email'] = $m_email;
		$data->commentForm = $this->load->view('comment_form',$array,true);
		
		$array['commentList'] = $this->getCommentList($id);
		$data->commentList = $this->load->view('comment_list',$array,true);
		$data->commentCount = count($array['commentList']);
		$content = $this->load->view('detail',$data,true);
        $this->site->write('content',$content,true);
        $this->site->render();
	}
	function getCommentList($blogid) {
		//get level 0
		$sql = "SELECT * FROM ivt_investment_commets 
				WHERE blogid = $blogid AND parent_id = 0 AND accept = 1
				ORDER BY id DESC";
		$rs = $this->model->query($sql)->execute();
		$arr = array();
		foreach ($rs as $item) {
			$arr[] = $item;
			if ($item->has_child == 1) {
				$this->getCommentChild($arr, $item->id);
			}
		}
		return $arr;	
	}
	function getCommentChild(&$arr, $parent_id) {
		$sql = "SELECT * FROM ivt_investment_commets 
				WHERE parent_id = $parent_id AND accept = 1
				ORDER BY id DESC";
		$rs = $this->model->query($sql)->execute();
		foreach ($rs as $item) {
			$arr[] = $item;
			if ($item->has_child == 1) {
				$this->getCommentChild($arr, $item->id);
			}
		}
	}
}