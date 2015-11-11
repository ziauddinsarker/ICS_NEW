<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Just_post extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('just_post_model');
        $this->load->library('form_validation');
        $this->load->library('csvimport');
    }


    function csv_index() {
        $data['just_blog_book'] = $this->just_post_model->get_just_post();
        $this->load->view('blog/header');
        $this->load->view('blog/csvindex',$data);
        $this->load->view('blog/footer');
    }

    function importcsv() {
        $data['just_blog_book'] = $this->just_post_model->get_just_post();
        $data['error'] = '';    //initialize image upload error array to empty

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();

            $this->load->view('blog/csvindex', $data);
        } else {
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];


            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'just_post_title'=>$row['title'],
                        'just_post_description'=>$row['description'],
                        'just_active'=>$row['active'],
                        'url_slug'=>$row['slug'],
                    );
                    $this->just_post_model->insert_csv($insert_data);
                }
                $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
                redirect(base_url().'just_post/csv_index');
                //echo "<pre>"; print_r($insert_data);
            } else
                $data['error'] = "Error occured";
            $this->load->view('blog/csvindex', $data);
        }

    }





    /**
     * Index of Admin Controller, This method will show all posts
     */
    public function index(){

        $data['data_get'] = $this->just_post_model->view();
        $this->load->view('blog/view', $data);
    }


    function single_post($url_slug){
        $data['posts'] = $this->just_post_model->get_single_post($url_slug);
        $this->load->view('blog/header');
        $this->load->view('blog/single_view',$data);
        $this->load->view('blog/footer');
    }

    function rev_single_post($id){
        $data['posts'] = $this->just_post_model->get_rev_single_post($id);
        //var_dump($data['posts']);

        $this->load->view('blog/header');
        $this->load->view('blog/rev_single_view',$data);
        $this->load->view('blog/footer');
    }

    /**
     * View all Posts
     */
    function add() {
        $this->load->view('blog/header');
        $this->load->view('blog/add');
        $this->load->view('blog/footer');
    }

    function save() {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('just_post_title', 'Post Title', 'required');;
        $this->form_validation->set_rules('just_post_description', 'Post Description', 'required');;

        if ($this->form_validation->run() == FALSE){
            redirect('just_post/add');
        }else{
                $this->just_post_model->add();
                redirect('just_post');
        }
    }

    /**
     *
     */
    function edit()
    {
        $post_id = $this->uri->segment(3);
        if ($post_id == NULL) {
            redirect('just_post');
        }
        $dt = $this->just_post_model->edit($post_id);

        $data['just_post_title'] = $dt->just_post_title;
        $data['just_post_description'] = $dt->just_post_description;
        $data['just_id'] = $post_id;

        $this->load->view('blog/header', $data);
        $this->load->view('blog/edit', $data);
        $this->load->view('blog/footer', $data);
    }


    /**
     * Add New Post
     */
    function update() {
        if ($this->input->post('update')) {
            $id = $this->input->post('id');
            $this->just_post_model->update($id);
            redirect('just_post');
        } else{
            $id = $this->input->post('id');
            redirect('just_post/edit/'. $id);
        }
    }

    /**
     *
     */
    function delete() {
        $u = $this->uri->segment(3);
        $this->just_post_model->delete($u);
        redirect('just_post');
    }


}

?>