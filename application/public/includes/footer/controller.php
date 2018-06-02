<?php

/**
 * @author Sonnk
 * @copyright 2017
 */
class incFooter extends CI_Include {

    function __construct() {
        parent::__construct();
        $this->load->incModel();
		$data = new stdClass();
		$data->finds = $this->model->getInfor();
		$this->load->incView($data);
    }
}