<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('ppnw_model');
        $this->load->model('admin_model');
        $this->load->model('user_model');
        //$this->load->library('breadcrumb');

        $username = $this->session->userdata('username');
        $this->data['employee'] = $this->admin_model->get_user_employee($username);

        $user_id = $this->session->userdata('user_id');
        $this->data['todos'] = $this->admin_model->get_todo($user_id);

        $this->data['ppnw_all_count'] = $this->ppnw_model->ppnw_total_count_by_user($username);

        //$all_sess = $this->session->all_userdata();
       // var_dump($all_sess);
    }

    /**
     * Index
     * Check if user is logged in. If logged in then allow to see the admin page
     */
    public function index()
    {
        //Check if user is logged in or not. If not then else statement works otherwise redirect to login page
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('login/index', 'refresh');
        } else {
        //If user is logged int then show the admin page. Admin page is not accessiable  if not logged in.

            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_view', $this->data);
            $this->load->view('admin/admin_todo', $this->data);
            $this->load->view('admin/admin_chart', $this->data);
            $this->load->view('admin/admin_footer_view');
        }
    }


    public function user_profile(){
        $username = $this->session->userdata('username');
        $this->user_model->get_singl_user_info($username);
      }

    public function contacts(){
        $this->load->view('admin/admin_header_view', $this->data);
        $this->load->view('admin/admin_contact_view', $this->data);
        $this->load->view('admin/admin_footer_view');
      }
    /**
     *
     */
    public function get_company(){
        $this->load->model('admin_model');
        $data = $this->admin_model->get();
        echo json_encode($data);
    }

    /**
     *
     */
    public function get_buyer(){
        $this->load->model('');
    }

    public function json_search_buyer()
    {
        $query  = $this->admin_model->get_buyer();
        $data = array();
        foreach ($query as $key => $value)
        {
            $data[] = array('id' => $value->company_id, 'name' => $value->company_name);
        }
        echo json_encode($data);
    }



    /**
     * ppnew_add
     *
     * This is to show the PPnonwoven page
     */
    public function ppnw_add()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('login/index', 'refresh');
        } else {
            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_ppnw_view', $this->data);
            $this->load->view('admin/admin_footer_view');
        }
    }


    /**
     *
     */
    public function add_todo(){

            $data = array(
                'task' => $this->input->post('task'),
            );
            $todo_id = $this->admin_model->add_todo($data);
            $user_id = $this->session->userdata('user_id');

        $data = array(
            'task_user_id' => $user_id ,
            'task_id' => $todo_id
        );
        $this->admin_model->task_by_user($data);
        redirect('admin', 'refresh');
    }

    /**
     * @param $todo_id
     */
    function delete_todo($todo_id) //delete todo
    {
        $this->admin_model->delete_todo($todo_id);
    }

}