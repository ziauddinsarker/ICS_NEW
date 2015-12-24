<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('ppnw_model');
        $this->load->model('woven_simple_model');
        $this->load->model('woven_model');
        $this->load->model('quilt_and_suit_model');
        $this->load->model('admin_model');
        $this->load->model('user_model');
        //$this->load->library('breadcrumb');
		$this->load->library(array('ion_auth','form_validation'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $username = $this->session->userdata('username');
        $this->data['employee'] = $this->admin_model->get_user_employee($username);

        $user_id = $this->session->userdata('user_id');
        $this->data['todos'] = $this->admin_model->get_todo($user_id);



        //$groups = $this->ion_auth->groups()->result();
        //var_dump($groups);




        $this->data['ppnw_all_count'] = $this->ppnw_model->ppnw_total_count_by_user($username);
        $this->data['woven_simple_all_count'] = $this->woven_simple_model->woven_simple_total_count_by_user($username);

        $this->data['woven_all_count'] = $this->woven_model->woven_total_count_by_user($username);

        $this->data['quilt_and_suit_all_count'] = $this->quilt_and_suit_model->quilt_and_suit_total_count_by_user($username);

        $all_sess = $this->session->all_userdata();
        //var_dump($all_sess);
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
            //Get the group name
            $group = $this->ion_auth->get_users_groups()->row()->name;
            //If user is logged int then show the admin page. Admin page is not accessiable  if not logged in.

            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_view', $this->data);

            if(!($group == 'admin' || $group == 'merchandiser')) {
            }else{
                $this->load->view('admin/admin_todo', $this->data);
                $this->load->view('admin/admin_chart', $this->data);
            }

            //var_dump($group);

            $this->load->view('admin/admin_footer_view');

        }
    }



    function online(){
        if (isset($username)){ #If the user is logged in, good for the, if not, they become an ip address
            $username = $username; #Username is $_SESSION['username'];
        } else {
            $username = $_SERVER['REMOTE_ADDR']; #Username is IP Address
        }
        $time = time(); #Current time
        $previous = "120"; #Time to check in seconds

        $timeout = $time-$previous; #Timeout=time - 2two minutes
        $this->db->select('*');
        $this->db->from('online');
        $this->db->where('username',$username);
        $this->db->where('timeout',$timeout);
        $query = $this->db->get();

        //$query = "SELECT * FROM online WHERE username=\"$username\" AND timeout > \"$timeout\""; #Have you been here in the past two minutes?
        $verify = mysql_query($query); #Execute query

        $row_verify = mysql_fetch_assoc($verify); #Check if you have been here in two minutes
        if (!isset($row_verify['username'])) { #See if you were found
            $query = "INSERT INTO online (username, timeout) VALUES (\"$username\", \"$time\")"; #Put you on the online list

            $insert = mysql_query($query); #Execute query
        }
        $query = "SELECT * FROM online WHERE timeout > \"$timeout\""; #Check and see who is online in the last 2 minutes

        $online = mysql_query($query); #Execute query
        $row_online = mysql_fetch_assoc($online); #Grab the users
        if (isset($row_online['username'])) { #If there is atleast one user online

            do { #Do this
                echo $row_online['username'].""; #Output username
            } while($row_online = mysql_fetch_assoc($online)); #Until all records are displayed

        } else {
            echo "There are no members online."; #Inform user that no one is online
        }
    }




    +
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
     *ppnw
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
            $this->load->view('admin/ppnw/admin_home_ppnw_view', $this->data);
            $this->load->view('admin/admin_footer_view');
        }
    }

    /**
     * ppnew_add
     *
     * This is to show the PPnonwoven page
     */
    public function woven_add()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('login/index', 'refresh');
        } else {
            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_woven_view', $this->data);
            $this->load->view('admin/admin_footer_view');
        }
    }


    public function woven_simple_add()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('login/index', 'refresh');
        } else {
            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_woven_simple_view', $this->data);
            $this->load->view('admin/admin_footer_view');
        }
    }

    /**
     * ppnew_add
     *
     * This is to show the PPnonwoven page
     */
    public function quilt_and_suit_add()
    {
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('login/index', 'refresh');
        } else {
            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_quilt_and_suit_view', $this->data);
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
	
	/********************Auth************************/
	function auth()
	{

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			
			$this->load->view('admin/admin_header_view',$this->data);
			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			$this->load->view('admin/admin_footer_view',$this->data);
			$this->_render_page('admin/auth', $this->data);
		}
	}

}