<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class issuesc extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!is_loggedIn()) {
            redirect('admin/login');
        }
        $this->load->model('models_model');
        $this->load->model('brands_model');
    }

    public function index() {
        $data['models'] = $this->models_model->get_all_with_brand();
        $this->load->view('admin/header');
        $this->load->view('admin/models', $data);
        $this->load->view('admin/footer');
    }

}
