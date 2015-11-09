<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_image extends CI_Controller
{
/*
    function __construct()
    {
        parent::__construct();
        $this->load->model('image_upload_model');
    }
    function index()
    {
        $this->load->view('admin/admin_home_image_view', array('error' => ' ' ));
    }
    function do_upload()
    {
        if($this->input->post('upload'))
        {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']    = '1024';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload())
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/admin_home_image_view', $error);
            }
            else
            {
                $data=$this->upload->data();
                $this->thumb($data);

                $file=array(
                    'img_name'=>$data['raw_name'],
                    'thumb_name'=>$data['raw_name'].'_thumb',
                    'ext'=>$data['file_ext'],
                    'upload_date'=>time()
                );
                $this->upload_model->add_image($file);
                $data = array('upload_data' => $this->upload->data());
                $this->load->view('upload_success', $data);
            }
        }
        else
        {
            redirect(site_url('upload'));
        }
    }
    function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }


*/

    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        $this->load->model('ppnw_model');
        $this->load->model('image_upload_model');

        $username = $this->session->userdata('username');

        $this->data['employee'] = $this->admin_model->get_user_employee($username);

        //$this->data['ppnw_all_costing'] = $this->ppnw_model->gel_all_ppnw_costing();
        $this->data['ppnw_all_costing'] = $this->ppnw_model->gel_all_ppnw_costing($username);
        $this->data['ppnw_all_count'] = $this->ppnw_model->ppnw_total_count_by_user($username);
    }
    /************************************************/
    /*****************PPNW***************************/
    /************************************************/
    /**
     * Show All PP Nonwovens Costing in a page of a Particular user
     */

    public function index()
    {
        $this->load->view('admin/admin_header_view', $this->data);
        $this->load->view('admin/admin_home_image_view', $this->data);
        $this->load->view('admin/admin_footer_view');
    }

    /******************Works Fine*******************/
    public function save_image()
    {
        $url = $this->do_upload();
        $title = $_POST["title"];
        $newid = $this->image_upload_model->save($url, $title);
        var_dump($newid);
        //var_dump($url);
        echo $url;
    }

    private function do_upload()
    {

        $type = explode('.', $_FILES["pic"]["name"]);
        // var_dump($type);
        $type = $type[count($type) - 1];
        //var_dump($type);
        $url = "./assets/images/eimg/" . uniqid(rand()) . '.' . $type;

        if (is_uploaded_file($_FILES["pic"]["tmp_name"])) {
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $url)) {
                return $url;
            }
            return "";
        }
    }
    /***************************************/
    /**
     * @return array
     */
    private function setup_upload_option()
    {
        $config = array();
        $config['upload_path'] = './assets/images/eimg';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['encrypt_name'] = TRUE;
        $config['overwrite'] = false;
        return $config;
    }

    /**
     *
     */
    public function doing_upload()
    {
        $files = $_FILES;
        $count = count($_FILES['userfile']['name']);

        for ($i = 0; $i < $count; $i++) {
            $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
            $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
            $_FILES['userfile']['error'] = $files['userfile']['error'][$i];

            $this->upload->initialize($this->setup_upload_option());

            if ($this->upload->do_upload() == false) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/admin_home_image_view', $error);
            } else {
                $data = $this->upload->data();
                $dataarray = array(
                    'product_id' => $id,
                    'product_name' => $data['file_name'],
                    'product_size' => $data['file_size'],
                    'product_ext' => $data['file_ext'],
                    'full_path' => $data['full_path']
                );

                $this->db->insert('product_details', $dataarray);
            }
        }
    }
}