<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author 
 * @copyright ivt_
 */
class Increasecatalog extends CI_Controller {

    private $route;
    private $login;

    function __construct() {
        parent::__construct();
        $this->load->model(array('model', 'base_model'));
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

    function _view() {
        $data = new stdClass();
        $permission = $this->base_model->getPermission($this->login, $this->route);
        if (!isset($permission['view'])) {
            redirect(admin_url().'home.html');
        }
		$updateInfo = $this->model->getUpdateInfo();
        $data->permission = $permission;
        $data->csrfName = $this->security->get_csrf_token_name();
        $data->csrfHash = $this->security->get_csrf_hash();
        $data->routes = $this->route;
        $data->login = $this->login;
        $data->controller = admin_url() . ($this->uri->segment(1));
        $data->titles = $this->model->getTitles(1);
        $data->usercreate = $updateInfo->usercreate;
        $data->datecreate = date('d/m/Y H:i:s', strtotime($updateInfo->datecreate));
		
        
		$content = $this->load->view('view', $data, true);
        $this->admin->write('content', $content, true);
        $this->admin->write('title', $this->title, true);
        $this->admin->render();
    }
	function detail() {
        $data = new stdClass();
        $permission = $this->base_model->getPermission($this->login, $this->route);
        if (!isset($permission['view'])) {
            redirect(admin_url().'home.html');
        }
		$mcp_id = $this->uri->segment(3);
        $data->permission = $permission;
        $data->csrfName = $this->security->get_csrf_token_name();
        $data->csrfHash = $this->security->get_csrf_hash();
        $data->routes = $this->route;
        $data->login = $this->login;
        $data->controller = admin_url() . ($this->uri->segment(1));
		
        $data->mcp = $this->model->getMcp($mcp_id);
        $data->titleYear = $this->model->getTitles(2);
        $data->titleQuater = $this->model->getTitles(3);
		$data->dataYear = $this->model->getDataYear($mcp_id);
		$data->dataQuater = $this->model->getDataQuater($mcp_id);
		$data->image = $this->model->getImage($mcp_id);
		
        
		$content = $this->load->view('detail', $data, true);
        $this->admin->write('content', $content, true);
        $this->admin->write('title', $this->title, true);
        $this->admin->render();
    }
	function form($id=''){
		$data = new stdClass();
        $permission = $this->base_model->getPermission($this->login, $this->route);
        if (!isset($permission['view'])) {
            redirect(admin_url().'home.html');
        }
        $data->permission = $permission;
        $data->csrfName = $this->security->get_csrf_token_name();
        $data->csrfHash = $this->security->get_csrf_hash();
        $data->routes = $this->route;
        $data->login = $this->login;
        $data->controller = admin_url() . ($this->uri->segment(1));
        $data->groups = $this->base_model->getGroup(''); 
		$data->finds = $this->model->detail($id);
        $data->investmentTypes = $this->model->investmentType('');
		
		$content = $this->load->view('form', $data, true);
        $this->admin->write('content', $content, true);
        $this->admin->write('title', $this->title, true);
        $this->admin->render();
	}
    function getList() {

        if (!isset($_POST['csrf_stock_name'])) {
            //show_404();
        }
        $param = array();
        $numrows = 2000;
        $data = new stdClass();
        $page = $this->input->post('page');
        $query = $this->model->getList();
        $data->start = empty($page) ? 1 : $page + 1;
		$count = count($query);
		
        $data->datas = $query;
		$data->inc_des_avg = $this->model->get_inc_des_avg();
        $page_view = $this->admin->pagination($count, $numrows, 5, 'investment/', $page);
        $data->permission = $this->base_model->getPermission($this->login, $this->route);
        $result = new stdClass();
        $result->paging = $page_view;
        $result->cPage = $page;
        $result->viewtotal = $count;
        $result->csrfHash = $this->security->get_csrf_hash();
        $result->content = $this->load->view('list', $data, true);
        echo json_encode($result);
    }
    function save() {

        $permission = $this->base_model->getPermission($this->login, $this->route);
        $token = $this->security->get_csrf_hash();
        $array = json_decode($this->input->post('search'), true);
        
        if (!isset($permission['add'])) {
            $result['status'] = 0;
            $result['csrfHash'] = $token;
            echo json_encode($result);
            exit;
        }
        if (isset($_FILES['userfile']) && $_FILES['userfile']['name'] != "") {
            $imge_name = $_FILES['userfile']['name'];
            $this->upload->initialize($this->set_upload_options());
            $image_data = $this->upload->do_upload('userfile', $imge_name); //Ten hinh 
            $array['image'] = $image_data;
            $resize = $this->resizeImg($image_data);
        }
		if (isset($_FILES['userfile2']) && $_FILES['userfile2']['name'] != "") {
            $imge_name = $_FILES['userfile2']['name'];
            $this->upload->initialize($this->set_upload_options2());
            $image_data = $this->upload->do_upload('userfile2', $imge_name); //Ten hinh 
            $array['thumb'] = $image_data;
            $resize = $this->resizeImg($image_data,300,300);
        }
        $login = $this->login;
		$array['friendlyurl'] = $this->admin->friendlyURL($array['title']);
        $array['description_sort'] = $this->input->post('description_sort');
		$array['description_long'] = $this->input->post('description_long');
        $array['datecreate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
        $array['usercreate'] = $login->username;//print_r($array);exit;
        $result['status'] = $this->model->saves($array);
        $result['csrfHash'] = $token;
        echo json_encode($result);
    }
    function edit() {
        $token = $this->security->get_csrf_hash();
        $permission = $this->base_model->getPermission($this->login, $this->route);
        if (!isset($permission['edit'])) {
            $result['status'] = 0;
            $result['csrfHash'] = $token;
            echo json_encode($result);
            exit;
        }
        $array = json_decode($this->input->post('search'), true);
        $id = $this->input->post('id');
        $login = $this->login;
		$finds = $this->model->table('ivt_investment')
					  ->select('image,thumb')
					  ->where('id',$id)
					  ->find();
        if (isset($_FILES['userfile']) && $_FILES['userfile']['name'] != "") {
			if(file_exists('files/investment/'.$finds->image)){
				unlink('files/investment/'.$finds->image);
			}
			$imge_name = $_FILES['userfile']['name'];
            $this->upload->initialize($this->set_upload_options());
            $image_data = $this->upload->do_upload('userfile', $imge_name); //Ten hinh 
            $array['image'] = $image_data;
            //$resize = $this->resizeImg($image_data);
        }
		if (isset($_FILES['userfile2']) && $_FILES['userfile2']['name'] != "") {
			if(file_exists('files/investment/thumb/'.$finds->thumb)){
				unlink('files/investment/thumb/'.$finds->thumb);
			}
			$imge_name = $_FILES['userfile2']['name'];
            $this->upload->initialize($this->set_upload_options2());
            $image_data = $this->upload->do_upload('userfile2', $imge_name); //Ten hinh 
            $array['thumb'] = $image_data;
            $resize = $this->resizeImg($image_data,300,300);
        }
		$array['friendlyurl'] = $this->admin->friendlyURL($array['title']);
        $array['description_sort'] = $this->input->post('description_sort');
		$array['description_long'] = $this->input->post('description_long');
        $array['dateupdate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
        $array['userupdate'] = $login->username;
//print_r($array);exit;
        $result['status'] = $this->model->edits($array, $id);
        $result['csrfHash'] = $token;
        echo json_encode($result);
    }

    function resizeImg($image_data,$width='',$height='') {
        $this->load->library('image_lib');
        $configz = array();
        $configz['image_library'] = 'gd2';
        $configz['source_image'] = './files/investment/thumb/' . $image_data;
        $configz['new_image'] = './files/investment/thumb/' . $image_data;
        $configz['create_thumb'] = TRUE;
        $configz['maintain_ratio'] = TRUE;
		if(!empty($width)){
			 $configz['width'] = $width;
		}
		if(!empty($height)){
			 $configz['height'] = $height;
		}
        $this->image_lib->initialize($configz);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    private function set_upload_options() {
        $config = array();
        $config['allowed_types'] = 'jpg|jpeg|gif|png';
        $config['upload_path'] = './files/investment/';
        $config['encrypt_nam'] = 'TRUE';
        $config['remove_spaces'] = TRUE;
        //$config['max_size'] = 0024;
        return $config;
    }
	private function set_upload_options2() {
        $config = array();
        $config['allowed_types'] = 'jpg|jpeg|gif|png';
        $config['upload_path'] = './files/investment/thumb/';
        $config['encrypt_nam'] = 'TRUE';
        $config['remove_spaces'] = TRUE;
        //$config['max_size'] = 0024;
        return $config;
    }
    function deletes() {
        $token = $this->security->get_csrf_hash();
        $id = $this->input->post('id');
        $permission = $this->base_model->getPermission($this->login, $this->route);
        if (!isset($permission['delete'])) {
            $result['status'] = 0;
            $result['csrfHash'] = $token;
            echo json_encode($result);
            exit;
        }
        $login = $this->login;
		$finds = $this->model->table('ivt_investment')
					  ->select('image,thumb')
					  ->where('id',$id)
					  ->find();
					  
		if(file_exists('files/investment/'.$finds->image) && !empty($finds->image)){
			unlink('files/investment/'.$finds->image);
		}
		if(file_exists('files/investment/thumb/'.$finds->thumb) && !empty($finds->thumb)){
			unlink('files/investment/thumb/'.$finds->thumb);	
		}
		$this->model->table('ivt_investment')->where("id in ($id)")->delete();	
		
        $result['status'] = 1;
        $result['csrfHash'] = $token;
        echo json_encode($result);
    }
	function isshow(){
		$array = array();
		$id = $this->input->post('id');
		$value = $this->input->post('value');
		$array['isshow'] = $value * -1 + 1;
		$this->model->table('ivt_investment')->save($id,$array);	
	}
	function readExcel() {
		$login = $this->login;
		$username = $login->username;
		$datecreate = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
		//echo '<pre>';print_r($login);die;
		
		ini_set('memory_limit', '-1');
		set_time_limit(0);
		
        include(APPPATH . 'libraries/excel2013/PHPExcel/IOFactory' . EXT);
		$path = str_replace('\\','/',FCPATH).'backup/';
        $filename = $_FILES['myfile']['name'];
		$file = $path;
        if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $path.$filename)){
            $file = $path.$filename;
		}
        //$inputFileType = PHPExcel_IOFactory::identify($file);
        //$objReader = PHPExcel_IOFactory::createReader($inputFileType);
        //$objReader->setReadDataOnly(true);
        //$objPHPExcel = $objReader->load($file);
		
		$objPHPExcel = PHPExcel_IOFactory::load($file);
		
		$this->db->trans_start();
		
		//clear old data
		$this->model->clearOldData();
		
		//import sheet cha
		$this->importParent($objPHPExcel, $username, $datecreate);
		
		//import sheet con
		$arrParentId = $this->importChild($objPHPExcel, $username, $datecreate);
        
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			$result['status'] = 0;
			echo json_encode($result);	exit;
		}
		
		$missing = array();
		if (!empty($arrParentId)) {
			foreach ($arrParentId as $mcp=>$id) {
				$missing[] =  $mcp;
			}
		}
		
		$result['status'] = 1;
		$result['missing'] = implode(', ', $missing);
        echo json_encode($result);	exit;
	}
	function importParent($objPHPExcel, $username, $datecreate) {
		try {
            $objPHPExcel->setActiveSheetIndex(1);
        } catch (Exception $e) {
            echo "Not found Sheet 0";
            exit();
        }
        $objWorksheet = $objPHPExcel->getActiveSheet();	

		//get titles row
		$arrTitle = array();
		for ($col=2; $col <=12; $col++) {
			$arrTitle[] = trim($objWorksheet->getCellByColumnAndRow($col, 3)->getValue());
		}
		$this->model->insertTitle($arrTitle, $username, $datecreate, 1);
		//echo '<pre>';print_r($arrTitle, $login);die;
		
		$arrData = array();
		for ($row = 4; $row <= 50; $row++) {
			$str = '';
			for ($col = 'C'; $col <='M'; $col++) {
				$val = $objWorksheet->getCell($col.$row)->getValue();
				if(strstr($val,'=') == true) {
					$val = $objWorksheet->getCell($col.$row)->getOldCalculatedValue();
				}
				$val = trim($val);
				$str .= "'$val',";
			}
			$arrData[] = '('.$str."'$username','$datecreate')";
		}	
		//insert parent
		$sql = "INSERT INTO ivt_increase_catalog (mcp,curr_price,pe,t1,t2,t3,t4,note,open_price,inc_des,trend,usercreate,datecreate)
		VALUES ".implode(',', $arrData);
		$this->model->executeQuery($sql);
		
		//insert inc_des_avg
		$inc_des_avg = $objWorksheet->getCell('L51')->getOldCalculatedValue();
		$sql = "INSERT INTO ivt_increase_catalog (inc_des_avg,usercreate,datecreate) VALUES ('$inc_des_avg', '$username', '$datecreate')";
		$this->model->executeQuery($sql);
	}
	function importChild($objPHPExcel, $username, $datecreate) { 
		$arrParentId = $this->model->getParentId();	
		$sheetCount = $objPHPExcel->getSheetCount();
		
		$k = 0;
		for($i=2; $i<$sheetCount; $i++){
			$objPHPExcel->setActiveSheetIndex($i);
			$objWorksheet = $objPHPExcel->getActiveSheet();
			$mcp = trim($objWorksheet->getCell('C1')->getValue());
			if (!isset($arrParentId[$mcp])) {
				continue;
			} 
			
			$parent_id = $arrParentId[$mcp];
			unset($arrParentId[$mcp]);
			if ($k == 0) {
				$k = 1;
				$this->insertChildTitle($objWorksheet, $username, $datecreate);
			}
			
			//insert child year
			$arrData = array();
			for ($row = 4; $row <= 26; $row++) {
				$title = $objWorksheet->getCell('B'.$row)->getValue();
				if (empty($title)) {
					continue;
				}
				$str = "'$parent_id','1',";
				for ($col = 'B'; $col <='K'; $col++) {
					if ($col == 'H') {
						continue;
					}
					$val = $objWorksheet->getCell($col.$row)->getValue();
					if(strstr($val,'=') == true) {
						$val = $objWorksheet->getCell($col.$row)->getOldCalculatedValue();
					}
					$val = trim($val);
					$str .= "'$val',";
				}
				$arrData[] = '('.$str."'$username','$datecreate')";
			}	
			
			$sql = "INSERT INTO ivt_increase_catalog_detail (parent_id,type,title,unit,year1,year2,year3,year4,spend,curr_year,finish,usercreate,datecreate)
			VALUES ".implode(',', $arrData);
			$this->model->executeQuery($sql);
			
			//insert child quater
			$arrData = array();
			for ($row = 30; $row <= 60; $row++) {
				$title = $objWorksheet->getCell('B'.$row)->getValue();
				if (empty($title)) {
					continue;
				}
				$str = "'$parent_id','2',";
				for ($col = 'B'; $col <='K'; $col++) {
					$val = $objWorksheet->getCell($col.$row)->getValue();
					if(strstr($val,'=') == true) {
						$val = $objWorksheet->getCell($col.$row)->getOldCalculatedValue();
					}
					$val = trim($val);
					$str .= "'$val',";
				}
				$arrData[] = '('.$str."'$username','$datecreate')";
			}	
			
			$sql = "INSERT INTO ivt_increase_catalog_detail (parent_id,type,title,unit,t1,t2,t3,t4,t5,t6,t7,t8,usercreate,datecreate)
			VALUES ".implode(',', $arrData);
			$this->model->executeQuery($sql);
						
			//insert image
			$image = $this->saveImageFromExcel($objWorksheet, $mcp);
			if ($image != '') {
				$sql = "INSERT INTO ivt_increase_catalog_detail  	(parent_id,type,image,usercreate,datecreate)
				VALUES ('$parent_id','3','$image','$username','$datecreate')";
				$this->model->executeQuery($sql);
			}
		}
		return $arrParentId;
	}
	function insertChildTitle($objWorksheet, $username, $datecreate) {
		//get titles row
		$arrTitle = array();
		for ($col = 'B'; $col <='I'; $col++) {
			$val = $objWorksheet->getCell($col.'2')->getValue();
			if(strstr($val,'=') == true) {
				$val = $objWorksheet->getCell($col.'2')->getOldCalculatedValue();
			}
			$arrTitle[] = trim($val);
		}
		$this->model->insertTitle($arrTitle, $username, $datecreate, 2);
		
		//get titles row
		$arrTitle = array();
		for ($col = 'B'; $col <='K'; $col++) {
			$val = $objWorksheet->getCell($col.'28')->getValue();
			if(strstr($val,'=') == true) {
				$val = $objWorksheet->getCell($col.'28')->getOldCalculatedValue();
			}
			$arrTitle[] = trim($val);
		}
		$this->model->insertTitle($arrTitle, $username, $datecreate, 3);
	}
	function saveImageFromExcel($objWorksheet, $mcp) {
		foreach ($objWorksheet->getDrawingCollection() as $drawing) {
			if ($drawing instanceof PHPExcel_Worksheet_MemoryDrawing) {
				ob_start();
				call_user_func(
					$drawing->getRenderingFunction(),
					$drawing->getImageResource()
				);

				$imageContents = ob_get_contents();
				ob_end_clean();
				$extension = 'png';
			} else {
				$zipReader = fopen($drawing->getPath(),'r');
				$imageContents = '';

				while (!feof($zipReader)) {
					$imageContents .= fread($zipReader,1024);
				}
				fclose($zipReader);
				$extension = $drawing->getExtension();
			}
			$myFileName = $mcp.'.'.$extension;
			file_put_contents($myFileName,$imageContents);
			
			if (@rename($myFileName, 'upload/' . $myFileName)) {
				return $myFileName;
			}
			return '';
		}
	}
	
}