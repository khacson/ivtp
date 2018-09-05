<?php

/**
 * @author Sonnk
 * @copyright 2017
 */
class incMenu extends CI_Include {

    function __construct() {
        parent::__construct();
        $this->load->incModel();
		$data = new stdClass();
		$data->arrActive = $this->model->getActiveMenu();
		$data->uri = $this->uri->segment(1);
		$data->markettendCatalogs = $this->model->getMarkettendCatalog();
		$data->investmentCatalogs = $this->model->getInvestmentCatalog();
		$data->logins = $this->site->GetSession("pblogin");
		$data->finds = $this->model->getInfor();
		$data->redirectUrl = $this->model->getFullUrl();
		$this->load->incView($data);
    }
}