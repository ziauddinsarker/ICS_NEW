<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function get_singl_user_info($uname){
        $this->db->select('employee_name, employee_phone, employee_email, employee_blood_group,image_name');
        $this->db->from('employee');
        $this->db->join('users_employee', 'users_employee.employee_id = employee.employee_id');
        $this->db->join('employee_picture', 'employee.employee_picture_id = employee_picture.image_id');
        $this->db->join('users', 'users_employee.user_id = users.id');
        $this->db->where('username',$uname);
        $query = $this->db->get();
        return $query->result();
    }


}