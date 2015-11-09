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

    /**
     * @return array
     */
    private function setup_upload_option(){
        $config = array();
        $config['upload_path'] 	= './assets/images/employee/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['encrypt_name'] = TRUE;
        $config['overwrite']	= false;
        return $config;
    }
    /**
     *
     */
    public function do_upload() {

        /*
                $this->load->library('upload');
                $files = $_FILES;

                $_FILES['file']['name'] 	= $files['file']['name'];
                $_FILES['file']['type'] 	= $files['file']['type'];
                $_FILES['file']['tmp_name'] = $files['file']['tmp_name'];
                $_FILES['file']['size'] 	= $files['file']['size'];
                $_FILES['file']['error'] 	= $files['file']['error'];

                $this->upload->initialize($this->setup_upload_option());

                if($this->upload->do_upload() == false)
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('multiple/form',$error);
                }else{
                    $data = $this->upload->data('file');
                    $dataarray = array(
                        'image_name' => $data['file_name'],
                        'image_size' => $data['file_size'],
                        'image_ext' => $data['file_ext'],
                     'full_path' => $data['full_path']
                    );

                    $this->db->insert('employee_picture', $dataarray);
                }

            redirect('user/user_profile');



     */

                $this->load->library('upload');

                $config['upload_path'] 	= './assets/images/employee/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['overwrite']	= FALSE;

                $this->load->library('upload', $config);
                $this->upload->data('file');
                if (!empty($_FILES)) {
                    $dataarray = array(
                        'image_name' => $_FILES['file']['name'],
                        'image_size' => $_FILES['file']['size'],
                        'image_ext' => $_FILES['file']['ext'],
                        'full_path' => $_FILES['file']['upload_path']
                    );\


                    var_dump($dataarray);


                    //$tempFile = $_FILES['file']['tmp_name'];
                    //$fileName = $_FILES['file']['name'];
                    //$targetPath = getcwd() . './assets/images/employee/';
                    //$targetFile = $targetPath . $fileName ;
                     //move_uploaded_file($tempFile, $targetFile);
                    // if you want to save in db,where here
                    // with out model just for example
                    $this->load->database(); // load database
                    $this->db->insert('employee_picture',$dataarray);
                    redirect('user/user_profile');
                }


    }





}