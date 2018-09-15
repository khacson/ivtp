<?php

/**
 * @author Sonnk
 * @copyright 2017
 */
class incFooter extends CI_Include {

    function __construct() {
        parent::__construct();
        $this->load->incModel();
		$this->load->model(array('base_model'));
		$base_model = new base_model();
		
		$data = new stdClass();
		$data->finds = $this->model->getInfor();
		$data->user_id = $base_model->getLastChatUser();
		
		$this->load->incView($data);
    }
}