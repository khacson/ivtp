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
		$data->uri = $this->uri->segment(1);
		$data->markettendCatalogs = $this->model->getMarkettendCatalog();
		$data->investmentCatalogs = $this->model->getInvestmentCatalog();
		$data->finds = $this->model->getInfor();
		$this->load->incView($data);
    }
}