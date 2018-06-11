 <?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author sonnk
 * @copyright 2016
 */

class Import extends CI_Controller {
    var $phonedetail;
	var $login;
    function __construct() {
        parent::__construct();
        $this->load->model(array('base_model','login_model','excel_model'));
        $this->phonedetail = 'g_processdetail';
		$this->login = $this->site->getSession('glogin');
		$this->route = $this->router->class;
		//$this->site->setTemplate('import');
    }
    function _remap($method, $params = array()) {
        $id = $this->uri->segment(2);
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        }
        $this->_view();
    }
    function _view() {
		$data = new stdClass();
        $login = $this->login;
        if (!isset($login['id'])){
			//redirect(base_url());
		}
		$permission = $this->base_model->getPermission($this->login, $this->route);
        if(!isset($permission['view'])) {
            redirect(admin_url().'home.html');
        }
		$data->permission = $permission;
        $data->routes = $this->route; 
        $data->groupid = $login['groupid'];
		$data->branchid = $login['branchid'];
		$data->branchs = $this->base_model->getBranch(0);
		#gegion add log
		$ctrol = getLanguage('danh-muc-dich-vu');
		$func =  getLanguage('xem');;
		$this->base_model->addAcction($ctrol,$func,'','');
		#end	
        $content = $this->load->view('view', $data, true);
        $this->site->write('content', $content, true);
        $this->site->render();
    }
    function getList() {
        $permission = $this->base_model->getPermission($this->login, $this->route);
        if (!isset($permission['view'])) {
            //redirect(admin_url().'home.html');
        }
        $rows = 20; //$this->site->config['row'];
        $page = $this->input->post('page');
        $pageStart = $page * $rows;
        $rowEnd = ($page + 1) * $rows;
        $start = empty($page) ? 1 : $page + 1;
        $searchs = json_decode($this->input->post('search'), true);
        $data = new stdClass();
        $result = new stdClass();
        $query = $this->model->getList($searchs, $page, $rows);
        $count = $this->model->getTotal($searchs);
        $data->datas = $query;
        $data->start = $start;
        $data->permission = $this->base_model->getPermission($this->login, $this->route);
        $page_view = $this->site->pagination($count, $rows, 5, $this->route, $page);
		if($count <= $rows){
			$page_view = '';
		}
		
        $result->paging = $page_view;
        $result->csrfHash = $this->security->get_csrf_hash();
        $result->viewtotal = $count;
        $result->content = $this->load->view('list', $data, true);
        echo json_encode($result);
    }
	function form(){
		$id = $this->input->post('id');
		$find = $this->model->findID($id);
		if(empty($find->id)){
			$find = $this->base_model->getColumns('g_catalog_service_promotion');
		}
		$data = new stdClass();
        $result = new stdClass();
		$data->finds = $find;
		if(empty($id)){
			$result->title = getLanguage('them-moi');
		}
		else{
			$result->title = getLanguage('sua');
		}
        $result->content = $this->load->view('form', $data, true);
		$result->id = $id;
        echo json_encode($result);
	}
	function readexcel() {
		
		ini_set('memory_limit', '-1');
        include(APPPATH . 'libraries/excel2013/PHPExcel/IOFactory' . EXT);
        $branchid = $this->input->post('branchid'); 
		$path = str_replace('\\','/',FCPATH).'/backup/';
        $filename = $_FILES['myfile']['name'];
		$file = $path;
        if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $path.$filename)){
            $file = $path.$filename;
		}
        $inputFileType = PHPExcel_IOFactory::identify($file);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($file);
        try {
            $objPHPExcel->setActiveSheetIndex(0);
        } catch (Exception $e) {
            echo "Not found Sheet 0";
            exit();
        }
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow(); // e.g. 10
        $highestColumn = $objWorksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); // e.g. 5	
		
		if($highestRow > 502){
			$result['status'] = 0;
			$result['row'] = 0;
			echo json_encode($result);	 exit;
		}		
		$this->db->trans_start();
		for ($row = 3; $row <= $highestRow; ++$row) {
			$ngaynhanmay = (trim($objWorksheet->getCellByColumnAndRow(0, $row)->getValue()));		
			if(empty($ngaynhanmay)){
				continue;
			}
			//Tên khách hàng Cột C
			$customer_name = (trim($objWorksheet->getCellByColumnAndRow(2, $row)->getValue()));				
			if (substr($customer_name, 0, 1) == '=') {
				$customer_name = $objWorksheet->getCellByColumnAndRow(2, $row)->getCalculatedValue();
			}
			//Số điện thoại Cột D
			$phone = (trim($objWorksheet->getCellByColumnAndRow(3, $row)->getValue()));				
			if (substr($phone, 0, 1) == '=') {
				$phone = $objWorksheet->getCellByColumnAndRow(3, $row)->getCalculatedValue();
			}
			if(empty($phone) && empty($customer_name)){
				break;
			}
			#region Import Khach hang
			$cusCheck = $this->model->table('g_customer_1')
									->select('id,visit')
									->where('phone',$phone)
									->find();
			if(empty($cusCheck->id)){
				$arrInsert = array();
				$arrInsert['datecreate'] = gmdate("Y-m-d H:i:s", time() + 7 * 3600);
				$arrInsert['usercreate'] = 'import';
				$arrInsert['customer_name'] = trim($customer_name);
				$arrInsert['phone'] = trim($phone);
				$arrInsert['visit'] = 1;
				$arrInsert['phone_contact'] = trim($phone);
				$customerid = $this->model->table('g_customer_1')->save('',$arrInsert);
			}
			else{
				$arrInsert = array();
				$arrInsert['customer_name'] = trim($customer_name);
				$arrInsert['phone'] = trim($phone);
				$arrInsert['visit'] = ($cusCheck->visit)+ 1;
				$arrInsert['phone_contact'] = trim($phone);
				$this->model->table('g_customer_1')->where('id',$cusCheck->id)
												   ->update($arrInsert);
				$customerid = $cusCheck->id;
			}
			#end
			#region import so phieu
			$arrInsertPhone = array();
			$arrInsertPhoneDetail = array();
			//Số Phiếu cột 1 Cột B
			$unique = (trim($objWorksheet->getCellByColumnAndRow(1, $row)->getValue()));				
			if (substr($unique, 0, 1) == '=') {
				$unique = $objWorksheet->getCellByColumnAndRow(1, $row)->getCalculatedValue();
			}
			//Tên máy cột 4 cột E
			$productname = (trim($objWorksheet->getCellByColumnAndRow(4, $row)->getValue()));				
			if (substr($productname, 0, 1) == '=') {
				$productname = $objWorksheet->getCellByColumnAndRow(4, $row)->getCalculatedValue();
			}
			//Tình trạng ban đầu cột 6 cột G
			$noidung = (trim($objWorksheet->getCellByColumnAndRow(6, $row)->getValue()));				
			if (substr($noidung, 0, 1) == '=') {
				$noidung = $objWorksheet->getCellByColumnAndRow(6, $row)->getCalculatedValue();
			}
			//Giá cột 12 cột M
			$price = (trim($objWorksheet->getCellByColumnAndRow(12, $row)->getValue()));				
			if (substr($price, 0, 1) == '=') {
				$price = $objWorksheet->getCellByColumnAndRow(12, $row)->getCalculatedValue();
			}
			//Tình trạng cột 10 K
			$tinhtrang = (trim($objWorksheet->getCellByColumnAndRow(10, $row)->getValue()));				
			if (substr($tinhtrang, 0, 1) == '=') {
				$tinhtrang = $objWorksheet->getCellByColumnAndRow(10, $row)->getCalculatedValue();
			}
			$tinhtrangs = $this->site->friendlyURL(trim($tinhtrang));
			
			//Dịch vụ cột 8 cột I
			$noidung2 = (trim($objWorksheet->getCellByColumnAndRow(8, $row)->getValue()));				
			if (substr($noidung2, 0, 1) == '=') {
				$noidung2 = $objWorksheet->getCellByColumnAndRow(8, $row)->getCalculatedValue();
			}
			//Dịch vụ cột 11 cột L Lý do
			$noidung3 = (trim($objWorksheet->getCellByColumnAndRow(11, $row)->getValue()));				
			if (substr($noidung3, 0, 1) == '=') {
				$noidung3 = $objWorksheet->getCellByColumnAndRow(11, $row)->getCalculatedValue();
			}
			//Ngày nhận máy cột 0 cột A
			$ngaynhanmay = (trim($objWorksheet->getCellByColumnAndRow(0, $row)->getValue()));				
			if (substr($ngaynhanmay, 0, 1) == '=') {
				$ngaynhanmay = $objWorksheet->getCellByColumnAndRow(0, $row)->getCalculatedValue();
			}
			$arrInsertPhone['datecreate']  = date('Y-m-d H:i:s', PHPExcel_Shared_Date::ExcelToPHP($ngaynhanmay));
			//Ngày giao máy cột 9 cột J
			$ngaygiaomay = (trim($objWorksheet->getCellByColumnAndRow(9, $row)->getValue()));				
			if (substr($ngaygiaomay, 0, 1) == '=') {
				$ngaygiaomay = $objWorksheet->getCellByColumnAndRow(9, $row)->getCalculatedValue();
			}
			
			//Ngày nhận tiền cột 16 cột Q
			$ngaynhantien = (trim($objWorksheet->getCellByColumnAndRow(16, $row)->getValue()));				
			if (substr($ngaynhantien, 0, 1) == '=') {
				$ngaynhantien = $objWorksheet->getCellByColumnAndRow(16, $row)->getCalculatedValue();
			}
			$arrInsertPhone['date_accept_money']  = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($ngaynhantien));
			
			$checkProduct = $this->model->table('g_product_1')
										->select('id')
										->where("product_name like '%$productname%' ")
										->where('isdelete',0)
										->find();
			
			if(!empty($checkProduct->id)){
				$arrInsertPhone['productid'] = $checkProduct->id;
				$arrInsertPhone['product_name'] = $productname;
				//Find produc
				$mnf = $this->model->table('g_product_1')
								   ->select('manufactureid')
								   ->where('id',$checkProduct->id)
								   ->find();
				if(!empty($mnf->manufactureid)){
					$arrInsertPhone['manufactureid'] = $mnf->manufactureid;
				}
			}
			else{
				$arrInsertPhone['productid'] = 0;
				$arrInsertPhone['product_name'] = $productname;
			}
			$arrUnique = explode("/",trim($unique)); 
			$unique_0 = $arrUnique[0];
			if(strlen($unique_0) < 5){
				$unique_0 = '00'.$unique_0;
			}
			$unique_1 = 2017;
			if(!empty($arrUnique[1])){
				$unique_1 = $arrUnique[1];
			}
			$uniqueid = substr($unique_1,2,2).$unique_0;
			$arrInsertPhone['uniqueid'] = $branchid.$uniqueid;
			$arrInsertPhone['customerid'] = $customerid;
			$arrInsertPhone['customer_name'] = $arrInsert['customer_name'];
			$arrInsertPhone['customer_phone'] = trim($phone);
			$arrInsertPhone['branchid'] = $branchid;
			$arrInsertPhone['usercreate'] = 'import'; 
			$arrInsertPhone['price'] = fmNumberSave($price);
			
			$description_old = '';
			if(!empty($noidung)){
				$description_old.= '<br>- '.$noidung;
			}
			if(!empty($noidung2)){
				$description_old.= '<br>- '.$noidung2;
			}
			if(!empty($noidung3)){
				$description_old.= '<br>- '.$noidung3;
			}
			$arrInsertPhone['description_old'] = $description_old;
			
			$phoneid = $this->model->table('g_phone_1')->save('',$arrInsertPhone);
			#end
			#insert detail date_delivery_customer
			$arrInsertPhoneDetails = array();
			if($tinhtrangs == 'da-tra-khach'){
				$arrInsertPhoneDetails['statusid'] = 2;
			}
			elseif($tinhtrangs == 'khach-khong-sua'){
				$arrInsertPhoneDetails['statusid'] = 3;
			}
			elseif($tinhtrangs == 'dang-sua'){
				$arrInsertPhoneDetails['statusid'] = 2;
			}
			elseif($tinhtrangs == 'dang-sua'){
				$arrInsertPhoneDetails['statusid'] = 1;
			}
			elseif($tinhtrangs == 'da-tra-khach'){
				$arrInsertPhoneDetails['statusid'] = 4;
			}
			//$arrInsertPhoneDetails['datecreate'] = $arrInsertPhone['datecreate'];
			$arrInsertPhoneDetails['uniqueid'] = $arrInsertPhone['uniqueid'];
			$arrInsertPhoneDetails['phoneid'] = $phoneid;
			$arrInsertPhoneDetails['processid'] = 1;
			$arrInsertPhoneDetails['nextprocessid'] = 0; //Ship out
			$arrInsertPhoneDetails['branchid'] = $branchid;
			$arrInsertPhoneDetails['datecreate']  = date('Y-m-d H:i:s', PHPExcel_Shared_Date::ExcelToPHP($ngaygiaomay));
			$phonedetailid = $this->model->table('g_phonedetail_1')->save('',$arrInsertPhoneDetails);
			$updateDetail = array();
			$updateDetail['statusacept'] = $phonedetailid;
			$this->model->table('g_phonedetail_1')->where('id',$phonedetailid)->update($updateDetail);
			#end
		}
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
			$result['status'] = 0;
			$result['row'] = 0;
			echo json_encode($result);	exit;
		}
		$result['status'] = 1;
		$result['row'] = $row -4;
        echo json_encode($result);	exit;
	}
	function export(){
		$search = '{}';
		if(isset($_GET['search'])){
			$search = $_GET['search'];
		}
		$searchs = json_decode($search,true);
		include(APPPATH . 'libraries/excel2013/PHPExcel/IOFactory' . EXT);
		
		$versionExcel = 'Excel2007';
		$objPHPExcel = new PHPExcel();
		$sheetIndex = $objPHPExcel->setActiveSheetIndex(0);
		$sheetIndex->setTitle('nha vien di lam');
		
		$sheetIndex->setCellValueByColumnAndRow(0, 1, getLanguage('stt'));
		$sheetIndex->setCellValueByColumnAndRow(1, 1, getLanguage('ma-nhan-vien'));
		$sheetIndex->setCellValueByColumnAndRow(2, 1, getLanguage('ho-ten'));
		$sheetIndex->setCellValueByColumnAndRow(3, 1, getLanguage('thoi-gian-vao'));
		$sheetIndex->setCellValueByColumnAndRow(4, 1, getLanguage('thoi-gian-ra'));
		$sheetIndex->setCellValueByColumnAndRow(5, 1, getLanguage('phong-ban'));
		$sheetIndex->setCellValueByColumnAndRow(6, 1, getLanguage('chu-vu'));
		$sheetIndex->setCellValueByColumnAndRow(7, 1, getLanguage('to-nhom'));
		$query = $this->model->getList($searchs, 0, 0);

		$i=2;
		foreach($query as $item){
			
			
			$sheetIndex->setCellValueByColumnAndRow(0, $i, ($i-1));
			$sheetIndex->setCellValueByColumnAndRow(1, $i, $item->code);
			$sheetIndex->setCellValueByColumnAndRow(2, $i, $item->fullname);
			$sheetIndex->setCellValueByColumnAndRow(3, $i, date(configs('cfdate').' H:i:s',strtotime($item->time_start)));
			$sheetIndex->setCellValueByColumnAndRow(4, $i, date(configs('cfdate').' H:i:s',strtotime($item->time_end)));
			$sheetIndex->setCellValueByColumnAndRow(5, $i, $item->departmanet_name);
			$sheetIndex->setCellValueByColumnAndRow(6, $i, $item->position_name);
			$sheetIndex->setCellValueByColumnAndRow(7, $i, $item->departmentgroup_name);

			$i++;
		}
		$today = gmdate("ymdHis", time() + 7 * 3600);;
        $name = "NV_Dilam_".$today.".xlsx";
        $boderthin = "A1:H" .($i-1);
        $sheetIndex->getStyle($boderthin)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $this->excel_model->exportExcel($objPHPExcel, $versionExcel, $name);
	}
}