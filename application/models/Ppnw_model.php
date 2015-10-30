<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ppnw_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    //get the costing for particular user
    //Get All ppnw costing info
    function gel_all_ppnw_costing($username){
        $this->db->select('*');
        $this->db->from('costing_by_user');
        $this->db->join('ppnw_costing', 'costing_by_user.costing_user_ppnw = ppnw_costing.ics_order_id');
        $this->db->join('users', 'costing_by_user.costing_user_id = users.id');
        $this->db->where('username',$username);
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $query->result();
    }

    /**
     * @param $username
     * @return mixed
     */
      function gel_total_ppnw_costing($username){
           $this->db->select('*');
           $this->db->from('costing_by_user');
           $this->db->join('ppnw_costing', 'costing_by_user.costing_user_ppnw = ppnw_costing.ics_order_id');
           $this->db->join('users', 'costing_by_user.costing_user_id = users.id');
           //$this->db->where('username',$username);
           $total = $this->db->where('username',$username);
           return $query->result($total);
       }

    function add_costing_by_user($data){
        $this->db->insert('costing_by_user',$data);
        return $this->db->insert_id();
    }



    /**
     * @param $post_id
     * @return mixed
     */
    function edit_ppnw_costing($ppnw_costing_id) {
        $data = $this->db->get_where('ppnw_costing', array('ics_order_id' => $ppnw_costing_id))->row();
        return $data;
    }


    /**
     *
     * @param $data
     * @param $id
     */
    function update_ppnw_costing($data, $id){
        $this->db->where('ics_order_id',$id);
        $this->db->update('ppnw_costing',$data);
    }

    /**
     * @param $id
     */
    public function ppnw_total_count_by_user($username)
    {
        $this->db->select('users.id,users.username,COUNT(*) as ppnw_count');
        $this->db->from('ppnw_costing');
        $this->db->join('costing_by_user', 'costing_by_user.costing_user_ppnw = ppnw_costing.ics_order_id');
        $this->db->join('users', 'costing_by_user.costing_user_id = users.id');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }



    /*
     * @param $id
     * @return mixed
     */

    function show_single_costing_by_user($user_id, $id){
        $this->db->select('*');
        $this->db->from('ppnw_costing');
        $this->db->join('costing_by_user','costing_by_user.costing_user_ppnw = ppnw_costing.ics_order_id');
        $this->db->join('users','costing_by_user.costing_user_id = users.id');
        $this->db->where('users.id', $user_id);
        $this->db->where('ppnw_costing.ics_order_id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    //get the username & password from tbl_usrs
    //Get All Posts
    /*function gel_all_ppnw_costing(){
        $this->db->select('*');
        $this->db->from('ppnw_costing');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $query->result();
    }*/

    /**
     * @param $ppnw_costing_id
     */
    function delete_ppnw_costing($ppnw_costing_id)
    {
        $this->db->where('ics_order_id',$ppnw_costing_id);
        $this->db->delete('ppnw_costing');
    }
}