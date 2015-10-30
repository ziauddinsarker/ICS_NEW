<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();


    }

    /**
     * @return array
     */
    public function get() {
        $company = $this->input->post('search');
        $this->db->select('tbl_company_id');
        $this->db->from('ppnw_costing');
        $this->db->like('tbl_company_id', $company);
        $query = $this->db->get();

        $company_array = array();
        foreach ($query->result() as $row) {
            $company_array[] = $row->tbl_company_id;
        }
        $data = $company_array;
        return $data;
    }


    /**
     *
     */

    public function get_buyer(){
        $query = $this->db->get('company');
        return $query->result();
    }

    /**
     * @return mixed
     */
	public function get_picture(){
    $this->db->select('product.id,product.product_description,full_path');
    $this->db->from('product');
    $this->db->join('product_details', 'product.id = product_details.product_id');
    $this->db->group_by('id');
    $this->db->order_by('id', 'ASC');
    $query = $this->db->get();
    return $query->result();
    }


    /**
     * @return mixed
     */
    public function get_user_employee($username){
        $this->db->select('username,employee_name,employee_email,employee_join_date,image_name');
        $this->db->from('users');
        $this->db->join('users_employee', 'users_employee.user_id = users.id');
        $this->db->join('employee', 'users_employee.employee_id = employee.employee_id');
        $this->db->join('employee_picture', 'employee.employee_picture_id = employee_picture.image_id');
        $this->db->where('username',$username);
        $query = $this->db->get();
        return $query->result();
    }

    function get_todo($user_id){
        $this->db->select('*');
        $this->db->from('task_by_user');
        $this->db->join('users', 'task_by_user.task_user_id = users.id');
        $this->db->join('tasks', 'task_by_user.task_id = tasks.id');
        $this->db->where('task_user_id',$user_id);
        $query = $this->db->get();
        return $query->result();
    }


    function task_by_user($data){
        $this->db->insert('task_by_user',$data);
    }

    /**
     * @param $data
     * @return mixed
     */
    function add_todo($data)
    {
        $this->db->insert('tasks',$data);
        return $this->db->insert_id();
    }


    /**
     * @param $todo_id
     */
    function delete_todo($todo_id)
    {
        $this->db->where('id',$todo_id);
        $this->db->where('id',$todo_id);
        $this->db->delete('tasks');
    }

}