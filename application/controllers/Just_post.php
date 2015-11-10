<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Just_post extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('just_post_model');
        $this->load->library('form_validation');
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