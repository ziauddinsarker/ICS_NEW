<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('ppnw_model');
        $this->load->model('user_model');

        $username = $this->session->userdata('username');

        $this->data['employee'] = $this->admin_model->get_user_employee($username);

        //$this->data['ppnw_all_costing'] = $this->ppnw_model->gel_all_ppnw_costing();
        $this->data['ppnw_all_costing'] = $this->ppnw_model->gel_all_ppnw_costing($username);
    }


    public function user_profile(){
        $username = $this->session->userdata('username');
        $this->data['userinfo'] = $this->user_model->get_singl_user_info($username);
        $this->load->view('admin/admin_header_view', $this->data);
        $this->load->view('admin/admin_user_profile', $this->data);
        $this->load->view('admin/admin_footer_view');
    }






}