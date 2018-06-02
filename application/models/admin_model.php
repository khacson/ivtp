<?php

/** * @author SonNguyen * @copyright 2015 */
class admin_model extends CI_Model {

    function __construct() {
        parent::__construct('');
        $this->load->model();
    }

    public function config() {
        return $this->model->table('config')->find_combo('config_name', 'config_value');
    }

    public function getPermission($login, $route) {
        $right = array();
        if (isset($login->params[$route])) {
            $right = json_encode($login->params[$route]);
        } return json_decode($right, true);
    }

    public function convertToEn() {
        return "Q U E R T Y U I O P A S D F G H J K L Z X C V B N M q w  e r t y u i o p a s d f g h j k l z x c v b n m";
    }

    public function convertToEn2() {
        return "ứ ừ ữ ử ự ớ ờ ở ỡ ợ ố ồ ổ ỗ ộ ắ ằ ẵ ẳ ặ Ứ Ừ Ử Ữ Ự Ớ Ờ Ở Ỡ Ợ Ố Ồ Ổ Ỗ Ộ Ắ Ằ Ẳ Ẵ Ặ";
    }

}

?>