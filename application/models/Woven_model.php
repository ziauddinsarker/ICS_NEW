<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Woven_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    //get the costing for particular user
    //Get All ppnw costing info
    function gel_all_woven_costing($username){
        $this->db->select('*');
        $this->db->from('costing_by_user');
        $this->db->join('woven_costing', 'costing_by_user.costing_user_woven = woven_costing.tbl_woven_order_id');
        $this->db->join('users', 'costing_by_user.costing_user_id = users.id');
        $this->db->where('username',$username);
        $query = $this->db->get();
        //$rowcount = $query->num_rows();
        return $query->result();
    }



    /***************************************************************/
    /**
     * @param $q
     */
    function get_company($q){
        $this->db->select('company_name');
        $this->db->like('company_name', $q);
        $query = $this->db->get('company');

        //var_dump($query);
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $row_set[] = htmlentities(stripslashes($row['company_name'])); //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }

    function get_company_object($q){
        $this->db->select('*');
        $this->db->like('company_name', $q);
        $query = $this->db->get('company');
        if($query->num_rows > 0){
            foreach ($query->result_array() as $row){
                $new_row['company']=htmlentities(stripslashes($row['company_name']));
                $row_set[] = $new_row; //build an array
            }
            echo json_encode($row_set); //format the array into json data
        }
    }
    /***************************************************************/





    //get the costing for particular user and particular costing revisions
    //Get All ppnw costing info
    function all_revisions_single_woven_costing($id){
        $this->db->select('*');
        $this->db->from('woven_costing_rev');
        $this->db->where('tbl_woven_order_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * @param $username
     * @return mixed
     */
      function gel_total_woven_costing($username){
           $this->db->select('*');
           $this->db->from('costing_by_user');
           $this->db->join('ppnw_costing', 'costing_by_user.costing_user_ppnw = ppnw_costing.ics_order_id');
           $this->db->join('users', 'costing_by_user.costing_user_id = users.id');
           //$this->db->where('username',$username);
           $this->db->where('username',$username);
           $query = $this->db->get();
           return $query->result();
       }

    /**
     * @param $username
     * @return mixed
     */
    function get_woven_costing_from_revision($id){
        $this->db->select('tbl_order_rev_id, tbl_ics_order_id');
        $this->db->from('woven_costing_rev');
        $this->db->where('tbl_order_rev_id',$id);
        $query = $this->db->get();
        return $query->result();

    }


    function single_revision_woven_costing($woven_costing_id) {
        $this->db->select('*');
        $this->db->join('woven_dimension_rev','woven_costing_rev.tbl_woven_dimension_id = woven_dimension_rev.tbl_dimension_id');
        $data = $this->db->get_where('woven_costing_rev', array('tbl_woven_order_rev_id' => $woven_costing_id))->row();
        return $data;
    }

      function single_revisions_single_woven_costing(){
          $ppnw_costing_id = $this->uri->segment(3);
           $this->db->select('*');
           $this->db->from('ppnw_costing_rev');
           $this->db->where('tbl_order_rev_id',$ppnw_costing_id);
           $query = $this->db->get();
          return $query->result();
       }

    function add_costing_by_user($data){
        $this->db->insert('costing_by_user',$data);
        return $this->db->insert_id();
    }

    /**
     * @param $post_id
     * @return mixed
     */
    function edit_woven_costing($woven_costing_id) {
        $this->db->select('*');
        $this->db->join('woven_dimension','woven_costing.tbl_woven_dimension_id = woven_dimension.tbl_dimension_id');
        $data = $this->db->get_where('woven_costing', array('tbl_woven_order_id' => $woven_costing_id))->row();
        return $data;
    }


    /**
     * @param $id
     */
    public function woven_total_count_by_user($username)
    {
        $this->db->select('COUNT(*) as woven_count');
        $this->db->from('woven_costing');
        $this->db->join('costing_by_user', 'costing_by_user.costing_user_woven = woven_costing.tbl_woven_order_id');
        $this->db->join('users', 'costing_by_user.costing_user_id = users.id');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }


    /**
     *
     * @param $data
     * @param $id
     */
    function update_woven_costing($woven_id){

        $dimension_data = array(
            'tbl_dimnesion_body_material_first_extra_1' => $this->input->post('body_material_first_extra_1'),
            'tbl_dimnesion_body_material_first_extra_2' => $this->input->post('body_material_first_extra_2'),
            'tbl_dimnesion_body_material_first_extra_3' => $this->input->post('body_material_first_extra_3'),
            'tbl_dimnesion_body_material_second_extra_1' => $this->input->post('body_material_second_extra_1'),
            'tbl_dimnesion_body_material_second_extra_2' => $this->input->post('body_material_second_extra_2'),
            'tbl_dimnesion_body_material_second_extra_3' => $this->input->post('body_material_second_extra_3'),


            //Body Material 1
            'tbl_dimension_body_material_1_front_length' => $this->input->post('body_material_1_front_length'),
            'tbl_dimension_body_material_1_front_length_allowance' => $this->input->post('body_material_1_front_length_allowance'),
            'tbl_dimension_body_material_1_front_length_total' => $this->input->post('body_material_1_front_length_total'),

            'tbl_dimension_body_material_1_front_width' => $this->input->post('body_material_1_front_width'),
            'tbl_dimension_body_material_1_front_width_allowance' => $this->input->post('body_material_1_front_width_allowance'),
            'tbl_dimension_body_material_1_front_width_total' => $this->input->post('body_material_1_front_width_total'),

            'tbl_dimension_body_material_1_back_length' => $this->input->post('body_material_1_back_length'),
            'tbl_dimension_body_material_1_back_length_allowance' => $this->input->post('body_material_1_back_length_allowance'),
            'tbl_dimension_body_material_1_back_length_total' => $this->input->post('body_material_1_back_length_total'),

            'tbl_dimension_body_material_1_back_width' => $this->input->post('body_material_1_back_width'),
            'tbl_dimension_body_material_1_back_width_allowance' => $this->input->post('body_material_1_back_width_allowance'),
            'tbl_dimension_body_material_1_back_width_total' => $this->input->post('body_material_1_back_width_total'),

            'tbl_dimension_body_material_1_top_length' => $this->input->post('body_material_1_top_length'),
            'tbl_dimension_body_material_1_top_length_allowance' => $this->input->post('body_material_1_top_length_allowance'),
            'tbl_dimension_body_material_1_top_length_total' => $this->input->post('body_material_1_top_length_total'),

            'tbl_dimension_body_material_1_top_width' => $this->input->post('body_material_1_top_width'),
            'tbl_dimension_body_material_1_top_width_allowance' => $this->input->post('body_material_1_top_width_allowance'),
            'tbl_dimension_body_material_1_top_width_total' => $this->input->post('body_material_1_top_width_total'),

            'tbl_dimension_body_material_1_bottom_length' => $this->input->post('body_material_1_bottom_length'),
            'tbl_dimension_body_material_1_bottom_length_allowance' => $this->input->post('body_material_1_bottom_length_allowance'),
            'tbl_dimension_body_material_1_bottom_length_total' => $this->input->post('body_material_1_bottom_length_total'),

            'tbl_dimension_body_material_1_bottom_width' => $this->input->post('body_material_1_bottom_width'),
            'tbl_dimension_body_material_1_bottom_width_allowance' => $this->input->post('body_material_1_bottom_width_allowance'),
            'tbl_dimension_body_material_1_bottom_width_total' => $this->input->post('body_material_1_bottom_width_total'),

            'tbl_dimension_body_material_1_left_length' => $this->input->post('body_material_1_left_length'),
            'tbl_dimension_body_material_1_left_length_allowance' => $this->input->post('body_material_1_left_length_allowance'),
            'tbl_dimension_body_material_1_left_length_total' => $this->input->post('body_material_1_left_length_total'),

            'tbl_dimension_body_material_1_left_width' => $this->input->post('body_material_1_left_width'),
            'tbl_dimension_body_material_1_left_width_allowance' => $this->input->post('body_material_1_left_width_allowance'),
            'tbl_dimension_body_material_1_left_width_total' => $this->input->post('body_material_1_left_width_total'),

            'tbl_dimension_body_material_1_right_length' => $this->input->post('body_material_1_right_length'),
            'tbl_dimension_body_material_1_right_length_allowance' => $this->input->post('body_material_1_right_length_allowance'),
            'tbl_dimension_body_material_1_right_length_total' => $this->input->post('body_material_1_right_length_total'),

            'tbl_dimension_body_material_1_right_width' => $this->input->post('body_material_1_right_width'),
            'tbl_dimension_body_material_1_right_width_allowance' => $this->input->post('body_material_1_right_width_allowance'),
            'tbl_dimension_body_material_1_right_width_total' => $this->input->post('body_material_1_right_width_total'),

            'tbl_dimension_body_material_1_pocket_length' => $this->input->post('body_material_1_pocket_length'),
            'tbl_dimension_body_material_1_pocket_length_allowance' => $this->input->post('body_material_1_pocket_length_allowance'),
            'tbl_dimension_body_material_1_pocket_length_total' => $this->input->post('body_material_1_pocket_length_total'),

            'tbl_dimension_body_material_1_pocket_width' => $this->input->post('body_material_1_pocket_width'),
            'tbl_dimension_body_material_1_pocket_width_allowance' => $this->input->post('body_material_1_pocket_width_allowance'),
            'tbl_dimension_body_material_1_pocket_width_total' => $this->input->post('body_material_1_pocket_width_total'),

            'tbl_dimension_body_material_1_extra_1_length' => $this->input->post('body_material_1_extra_1_length'),
            'tbl_dimension_body_material_1_extra_1_length_allowance' => $this->input->post('body_material_1_extra_1_length_allowance'),
            'tbl_dimension_body_material_1_extra_1_length_total' => $this->input->post('body_material_1_extra_1_length_total'),

            'tbl_dimension_body_material_1_extra_1_width' => $this->input->post('body_material_1_extra_1_width'),
            'tbl_dimension_body_material_1_extra_1_width_allowance' => $this->input->post('body_material_1_extra_1_width_allowance'),
            'tbl_dimension_body_material_1_extra_1_width_total' => $this->input->post('body_material_1_extra_1_width_total'),

            'tbl_dimension_body_material_1_extra_2_length' => $this->input->post('body_material_1_extra_2_length'),
            'tbl_dimension_body_material_1_extra_2_length_allowance' => $this->input->post('body_material_1_extra_2_length_allowance'),
            'tbl_dimension_body_material_1_extra_2_length_total' => $this->input->post('body_material_1_extra_2_length_total'),

            'tbl_dimension_body_material_1_extra_2_width' => $this->input->post('body_material_1_extra_2_width'),
            'tbl_dimension_body_material_1_extra_2_width_allowance' => $this->input->post('body_material_1_extra_2_width_allowance'),
            'tbl_dimension_body_material_1_extra_2_width_total' => $this->input->post('body_material_1_extra_2_width_total'),

            'tbl_dimension_body_material_1_extra_3_length' => $this->input->post('body_material_1_extra_3_length'),
            'tbl_dimension_body_material_1_extra_3_length_allowance' => $this->input->post('body_material_1_extra_3_length_allowance'),
            'tbl_dimension_body_material_1_extra_3_length_total' => $this->input->post('body_material_1_extra_3_length_total'),

            'tbl_dimension_body_material_1_extra_3_width' => $this->input->post('body_material_1_extra_3_width'),
            'tbl_dimension_body_material_1_extra_3_width_allowance' => $this->input->post('body_material_1_extra_3_width_allowance'),
            'tbl_dimension_body_material_1_extra_3_width_total' => $this->input->post('body_material_1_extra_3_width_total'),

            //Body Material 2
            'tbl_dimension_body_material_2_front_length' => $this->input->post('body_material_2_front_length'),
            'tbl_dimension_body_material_2_front_length_allowance' => $this->input->post('body_material_2_front_length_allowance'),
            'tbl_dimension_body_material_2_front_length_total' => $this->input->post('body_material_2_front_length_total'),

            'tbl_dimension_body_material_2_front_width' => $this->input->post('body_material_2_front_width'),
            'tbl_dimension_body_material_2_front_width_allowance' => $this->input->post('body_material_2_front_width_allowance'),
            'tbl_dimension_body_material_2_front_width_total' => $this->input->post('body_material_2_front_width_total'),

            'tbl_dimension_body_material_2_back_length' => $this->input->post('body_material_2_back_length'),
            'tbl_dimension_body_material_2_back_length_allowance' => $this->input->post('body_material_2_back_length_allowance'),
            'tbl_dimension_body_material_2_back_length_total' => $this->input->post('body_material_2_back_length_total'),

            'tbl_dimension_body_material_2_back_width' => $this->input->post('body_material_2_back_width'),
            'tbl_dimension_body_material_2_back_width_allowance' => $this->input->post('body_material_2_back_width_allowance'),
            'tbl_dimension_body_material_2_back_width_total' => $this->input->post('body_material_2_back_width_total'),

            'tbl_dimension_body_material_2_top_length' => $this->input->post('body_material_2_top_length'),
            'tbl_dimension_body_material_2_top_length_allowance' => $this->input->post('body_material_2_top_length_allowance'),
            'tbl_dimension_body_material_2_top_length_total' => $this->input->post('body_material_2_top_length_total'),

            'tbl_dimension_body_material_2_top_width' => $this->input->post('body_material_2_top_width'),
            'tbl_dimension_body_material_2_top_width_allowance' => $this->input->post('body_material_2_top_width_allowance'),
            'tbl_dimension_body_material_2_top_width_total' => $this->input->post('body_material_2_top_width_total'),

            'tbl_dimension_body_material_2_bottom_length' => $this->input->post('body_material_2_bottom_length'),
            'tbl_dimension_body_material_2_bottom_length_allowance' => $this->input->post('body_material_2_bottom_length_allowance'),
            'tbl_dimension_body_material_2_bottom_length_total' => $this->input->post('body_material_2_bottom_length_total'),

            'tbl_dimension_body_material_2_bottom_width' => $this->input->post('body_material_2_bottom_width'),
            'tbl_dimension_body_material_2_bottom_width_allowance' => $this->input->post('body_material_2_bottom_width_allowance'),
            'tbl_dimension_body_material_2_bottom_width_total' => $this->input->post('body_material_2_bottom_width_total'),

            'tbl_dimension_body_material_2_left_length' => $this->input->post('body_material_2_left_length'),
            'tbl_dimension_body_material_2_left_length_allowance' => $this->input->post('body_material_2_left_length_allowance'),
            'tbl_dimension_body_material_2_left_length_total' => $this->input->post('body_material_2_left_length_total'),

            'tbl_dimension_body_material_2_left_width' => $this->input->post('body_material_2_left_width'),
            'tbl_dimension_body_material_2_left_width_allowance' => $this->input->post('body_material_2_left_width_allowance'),
            'tbl_dimension_body_material_2_left_width_total' => $this->input->post('body_material_2_left_width_total'),

            'tbl_dimension_body_material_2_right_length' => $this->input->post('body_material_2_right_length'),
            'tbl_dimension_body_material_2_right_length_allowance' => $this->input->post('body_material_2_right_length_allowance'),
            'tbl_dimension_body_material_2_right_length_total' => $this->input->post('body_material_2_right_length_total'),

            'tbl_dimension_body_material_2_right_width' => $this->input->post('body_material_2_right_width'),
            'tbl_dimension_body_material_2_right_width_allowance' => $this->input->post('body_material_2_right_width_allowance'),
            'tbl_dimension_body_material_2_right_width_total' => $this->input->post('body_material_2_right_width_total'),

            'tbl_dimension_body_material_2_pocket_length' => $this->input->post('body_material_2_pocket_length'),
            'tbl_dimension_body_material_2_pocket_length_allowance' => $this->input->post('body_material_2_pocket_length_allowance'),
            'tbl_dimension_body_material_2_pocket_length_total' => $this->input->post('body_material_2_pocket_length_total'),

            'tbl_dimension_body_material_2_pocket_width' => $this->input->post('body_material_2_pocket_width'),
            'tbl_dimension_body_material_2_pocket_width_allowance' => $this->input->post('body_material_2_pocket_width_allowance'),
            'tbl_dimension_body_material_2_pocket_width_total' => $this->input->post('body_material_2_pocket_width_total'),

            'tbl_dimension_body_material_2_extra_1_length' => $this->input->post('body_material_2_extra_1_length'),
            'tbl_dimension_body_material_2_extra_1_length_allowance' => $this->input->post('body_material_2_extra_1_length_allowance'),
            'tbl_dimension_body_material_2_extra_1_length_total' => $this->input->post('body_material_2_extra_1_length_total'),

            'tbl_dimension_body_material_2_extra_1_width' => $this->input->post('body_material_2_extra_1_width'),
            'tbl_dimension_body_material_2_extra_1_width_allowance' => $this->input->post('body_material_2_extra_1_width_allowance'),
            'tbl_dimension_body_material_2_extra_1_width_total' => $this->input->post('body_material_2_extra_1_width_total'),

            'tbl_dimension_body_material_2_extra_2_length' => $this->input->post('body_material_2_extra_2_length'),
            'tbl_dimension_body_material_2_extra_2_length_allowance' => $this->input->post('body_material_2_extra_2_length_allowance'),
            'tbl_dimension_body_material_2_extra_2_length_total' => $this->input->post('body_material_2_extra_2_length_total'),

            'tbl_dimension_body_material_2_extra_2_width' => $this->input->post('body_material_2_extra_2_width'),
            'tbl_dimension_body_material_2_extra_2_width_allowance' => $this->input->post('body_material_2_extra_2_width_allowance'),
            'tbl_dimension_body_material_2_extra_2_width_total' => $this->input->post('body_material_2_extra_2_width_total'),

            'tbl_dimension_body_material_2_extra_3_length' => $this->input->post('body_material_2_extra_3_length'),
            'tbl_dimension_body_material_2_extra_3_length_allowance' => $this->input->post('body_material_2_extra_3_length_allowance'),
            'tbl_dimension_body_material_2_extra_3_length_total' => $this->input->post('body_material_2_extra_3_length_total'),

            'tbl_dimension_body_material_2_extra_3_width' => $this->input->post('body_material_2_extra_3_width'),
            'tbl_dimension_body_material_2_extra_3_width_allowance' => $this->input->post('body_material_2_extra_3_width_allowance'),
            'tbl_dimension_body_material_2_extra_3_width_total' => $this->input->post('body_material_2_extra_3_width_total'),

            //Body Material 3
            'tbl_dimension_body_material_3_front_length' => $this->input->post('body_material_3_front_length'),
            'tbl_dimension_body_material_3_front_length_allowance' => $this->input->post('body_material_3_front_length_allowance'),
            'tbl_dimension_body_material_3_front_length_total' => $this->input->post('body_material_3_front_length_total'),

            'tbl_dimension_body_material_3_front_width' => $this->input->post('body_material_3_front_width'),
            'tbl_dimension_body_material_3_front_width_allowance' => $this->input->post('body_material_3_front_width_allowance'),
            'tbl_dimension_body_material_3_front_width_total' => $this->input->post('body_material_3_front_width_total'),

            'tbl_dimension_body_material_3_back_length' => $this->input->post('body_material_3_back_length'),
            'tbl_dimension_body_material_3_back_length_allowance' => $this->input->post('body_material_3_back_length_allowance'),
            'tbl_dimension_body_material_3_back_length_total' => $this->input->post('body_material_3_back_length_total'),

            'tbl_dimension_body_material_3_back_width' => $this->input->post('body_material_3_back_width'),
            'tbl_dimension_body_material_3_back_width_allowance' => $this->input->post('body_material_3_back_width_allowance'),
            'tbl_dimension_body_material_3_back_width_total' => $this->input->post('body_material_3_back_width_total'),

            'tbl_dimension_body_material_3_top_length' => $this->input->post('body_material_3_top_length'),
            'tbl_dimension_body_material_3_top_length_allowance' => $this->input->post('body_material_3_top_length_allowance'),
            'tbl_dimension_body_material_3_top_length_total' => $this->input->post('body_material_3_top_length_total'),

            'tbl_dimension_body_material_3_top_width' => $this->input->post('body_material_3_top_width'),
            'tbl_dimension_body_material_3_top_width_allowance' => $this->input->post('body_material_3_top_width_allowance'),
            'tbl_dimension_body_material_3_top_width_total' => $this->input->post('body_material_3_top_width_total'),

            'tbl_dimension_body_material_3_bottom_length' => $this->input->post('body_material_3_bottom_length'),
            'tbl_dimension_body_material_3_bottom_length_allowance' => $this->input->post('body_material_3_bottom_length_allowance'),
            'tbl_dimension_body_material_3_bottom_length_total' => $this->input->post('body_material_3_bottom_length_total'),

            'tbl_dimension_body_material_3_bottom_width' => $this->input->post('body_material_3_bottom_width'),
            'tbl_dimension_body_material_3_bottom_width_allowance' => $this->input->post('body_material_3_bottom_width_allowance'),
            'tbl_dimension_body_material_3_bottom_width_total' => $this->input->post('body_material_3_bottom_width_total'),

            'tbl_dimension_body_material_3_left_length' => $this->input->post('body_material_3_left_length'),
            'tbl_dimension_body_material_3_left_length_allowance' => $this->input->post('body_material_3_left_length_allowance'),
            'tbl_dimension_body_material_3_left_length_total' => $this->input->post('body_material_3_left_length_total'),

            'tbl_dimension_body_material_3_left_width' => $this->input->post('body_material_3_left_width'),
            'tbl_dimension_body_material_3_left_width_allowance' => $this->input->post('body_material_3_left_width_allowance'),
            'tbl_dimension_body_material_3_left_width_total' => $this->input->post('body_material_3_left_width_total'),

            'tbl_dimension_body_material_3_right_length' => $this->input->post('body_material_3_right_length'),
            'tbl_dimension_body_material_3_right_length_allowance' => $this->input->post('body_material_3_right_length_allowance'),
            'tbl_dimension_body_material_3_right_length_total' => $this->input->post('body_material_3_right_length_total'),

            'tbl_dimension_body_material_3_right_width' => $this->input->post('body_material_3_right_width'),
            'tbl_dimension_body_material_3_right_width_allowance' => $this->input->post('body_material_3_right_width_allowance'),
            'tbl_dimension_body_material_3_right_width_total' => $this->input->post('body_material_3_right_width_total'),

            'tbl_dimension_body_material_3_pocket_length' => $this->input->post('body_material_3_pocket_length'),
            'tbl_dimension_body_material_3_pocket_length_allowance' => $this->input->post('body_material_3_pocket_length_allowance'),
            'tbl_dimension_body_material_3_pocket_length_total' => $this->input->post('body_material_3_pocket_length_total'),

            'tbl_dimension_body_material_3_pocket_width' => $this->input->post('body_material_3_pocket_width'),
            'tbl_dimension_body_material_3_pocket_width_allowance' => $this->input->post('body_material_3_pocket_width_allowance'),
            'tbl_dimension_body_material_3_pocket_width_total' => $this->input->post('body_material_3_pocket_width_total'),

            'tbl_dimension_body_material_3_extra_1_length' => $this->input->post('body_material_3_extra_1_length'),
            'tbl_dimension_body_material_3_extra_1_length_allowance' => $this->input->post('body_material_3_extra_1_length_allowance'),
            'tbl_dimension_body_material_3_extra_1_length_total' => $this->input->post('body_material_3_extra_1_length_total'),

            'tbl_dimension_body_material_3_extra_1_width' => $this->input->post('body_material_3_extra_1_width'),
            'tbl_dimension_body_material_3_extra_1_width_allowance' => $this->input->post('body_material_3_extra_1_width_allowance'),
            'tbl_dimension_body_material_3_extra_1_width_total' => $this->input->post('body_material_3_extra_1_width_total'),

            'tbl_dimension_body_material_3_extra_2_length' => $this->input->post('body_material_3_extra_2_length'),
            'tbl_dimension_body_material_3_extra_2_length_allowance' => $this->input->post('body_material_3_extra_2_length_allowance'),
            'tbl_dimension_body_material_3_extra_2_length_total' => $this->input->post('body_material_3_extra_2_length_total'),

            'tbl_dimension_body_material_3_extra_2_width' => $this->input->post('body_material_3_extra_2_width'),
            'tbl_dimension_body_material_3_extra_2_width_allowance' => $this->input->post('body_material_3_extra_2_width_allowance'),
            'tbl_dimension_body_material_3_extra_2_width_total' => $this->input->post('body_material_3_extra_2_width_total'),

            'tbl_dimension_body_material_3_extra_3_length' => $this->input->post('body_material_3_extra_3_length'),
            'tbl_dimension_body_material_3_extra_3_length_allowance' => $this->input->post('body_material_3_extra_3_length_allowance'),
            'tbl_dimension_body_material_3_extra_3_length_total' => $this->input->post('body_material_3_extra_3_length_total'),

            'tbl_dimension_body_material_3_extra_3_width' => $this->input->post('body_material_3_extra_3_width'),
            'tbl_dimension_body_material_3_extra_3_width_allowance' => $this->input->post('body_material_3_extra_3_width_allowance'),
            'tbl_dimension_body_material_3_extra_3_width_total' => $this->input->post('body_material_3_extra_3_width_total'),


            //Body Material 4
            'tbl_dimension_body_material_4_front_length' => $this->input->post('body_material_4_front_length'),
            'tbl_dimension_body_material_4_front_length_allowance' => $this->input->post('body_material_4_front_length_allowance'),
            'tbl_dimension_body_material_4_front_length_total' => $this->input->post('body_material_4_front_length_total'),

            'tbl_dimension_body_material_4_front_width' => $this->input->post('body_material_4_front_width'),
            'tbl_dimension_body_material_4_front_width_allowance' => $this->input->post('body_material_4_front_width_allowance'),
            'tbl_dimension_body_material_4_front_width_total' => $this->input->post('body_material_4_front_width_total'),

            'tbl_dimension_body_material_4_back_length' => $this->input->post('body_material_4_back_length'),
            'tbl_dimension_body_material_4_back_length_allowance' => $this->input->post('body_material_4_back_length_allowance'),
            'tbl_dimension_body_material_4_back_length_total' => $this->input->post('body_material_4_back_length_total'),

            'tbl_dimension_body_material_4_back_width' => $this->input->post('body_material_4_back_width'),
            'tbl_dimension_body_material_4_back_width_allowance' => $this->input->post('body_material_4_back_width_allowance'),
            'tbl_dimension_body_material_4_back_width_total' => $this->input->post('body_material_4_back_width_total'),

            'tbl_dimension_body_material_4_top_length' => $this->input->post('body_material_4_top_length'),
            'tbl_dimension_body_material_4_top_length_allowance' => $this->input->post('body_material_4_top_length_allowance'),
            'tbl_dimension_body_material_4_top_length_total' => $this->input->post('body_material_4_top_length_total'),

            'tbl_dimension_body_material_4_top_width' => $this->input->post('body_material_4_top_width'),
            'tbl_dimension_body_material_4_top_width_allowance' => $this->input->post('body_material_4_top_width_allowance'),
            'tbl_dimension_body_material_4_top_width_total' => $this->input->post('body_material_4_top_width_total'),

            'tbl_dimension_body_material_4_bottom_length' => $this->input->post('body_material_4_bottom_length'),
            'tbl_dimension_body_material_4_bottom_length_allowance' => $this->input->post('body_material_4_bottom_length_allowance'),
            'tbl_dimension_body_material_4_bottom_length_total' => $this->input->post('body_material_4_bottom_length_total'),

            'tbl_dimension_body_material_4_bottom_width' => $this->input->post('body_material_4_bottom_width'),
            'tbl_dimension_body_material_4_bottom_width_allowance' => $this->input->post('body_material_4_bottom_width_allowance'),
            'tbl_dimension_body_material_4_bottom_width_total' => $this->input->post('body_material_4_bottom_width_total'),

            'tbl_dimension_body_material_4_left_length' => $this->input->post('body_material_4_left_length'),
            'tbl_dimension_body_material_4_left_length_allowance' => $this->input->post('body_material_4_left_length_allowance'),
            'tbl_dimension_body_material_4_left_length_total' => $this->input->post('body_material_4_left_length_total'),

            'tbl_dimension_body_material_4_left_width' => $this->input->post('body_material_4_left_width'),
            'tbl_dimension_body_material_4_left_width_allowance' => $this->input->post('body_material_4_left_width_allowance'),
            'tbl_dimension_body_material_4_left_width_total' => $this->input->post('body_material_4_left_width_total'),

            'tbl_dimension_body_material_4_right_length' => $this->input->post('body_material_4_right_length'),
            'tbl_dimension_body_material_4_right_length_allowance' => $this->input->post('body_material_4_right_length_allowance'),
            'tbl_dimension_body_material_4_right_length_total' => $this->input->post('body_material_4_right_length_total'),

            'tbl_dimension_body_material_4_right_width' => $this->input->post('body_material_4_right_width'),
            'tbl_dimension_body_material_4_right_width_allowance' => $this->input->post('body_material_4_right_width_allowance'),
            'tbl_dimension_body_material_4_right_width_total' => $this->input->post('body_material_4_right_width_total'),

            'tbl_dimension_body_material_4_pocket_length' => $this->input->post('body_material_4_pocket_length'),
            'tbl_dimension_body_material_4_pocket_length_allowance' => $this->input->post('body_material_4_pocket_length_allowance'),
            'tbl_dimension_body_material_4_pocket_length_total' => $this->input->post('body_material_4_pocket_length_total'),

            'tbl_dimension_body_material_4_pocket_width' => $this->input->post('body_material_4_pocket_width'),
            'tbl_dimension_body_material_4_pocket_width_allowance' => $this->input->post('body_material_4_pocket_width_allowance'),
            'tbl_dimension_body_material_4_pocket_width_total' => $this->input->post('body_material_4_pocket_width_total'),

            'tbl_dimension_body_material_4_extra_1_length' => $this->input->post('body_material_4_extra_1_length'),
            'tbl_dimension_body_material_4_extra_1_length_allowance' => $this->input->post('body_material_4_extra_1_length_allowance'),
            'tbl_dimension_body_material_4_extra_1_length_total' => $this->input->post('body_material_4_extra_1_length_total'),

            'tbl_dimension_body_material_4_extra_1_width' => $this->input->post('body_material_4_extra_1_width'),
            'tbl_dimension_body_material_4_extra_1_width_allowance' => $this->input->post('body_material_4_extra_1_width_allowance'),
            'tbl_dimension_body_material_4_extra_1_width_total' => $this->input->post('body_material_4_extra_1_width_total'),

            'tbl_dimension_body_material_4_extra_2_length' => $this->input->post('body_material_4_extra_2_length'),
            'tbl_dimension_body_material_4_extra_2_length_allowance' => $this->input->post('body_material_4_extra_2_length_allowance'),
            'tbl_dimension_body_material_4_extra_2_length_total' => $this->input->post('body_material_4_extra_2_length_total'),

            'tbl_dimension_body_material_4_extra_2_width' => $this->input->post('body_material_4_extra_2_width'),
            'tbl_dimension_body_material_4_extra_2_width_allowance' => $this->input->post('body_material_4_extra_2_width_allowance'),
            'tbl_dimension_body_material_4_extra_2_width_total' => $this->input->post('body_material_4_extra_2_width_total'),

            'tbl_dimension_body_material_4_extra_3_length' => $this->input->post('body_material_4_extra_3_length'),
            'tbl_dimension_body_material_4_extra_3_length_allowance' => $this->input->post('body_material_4_extra_3_length_allowance'),
            'tbl_dimension_body_material_4_extra_3_length_total' => $this->input->post('body_material_4_extra_3_length_total'),

            'tbl_dimension_body_material_4_extra_3_width' => $this->input->post('body_material_4_extra_3_width'),
            'tbl_dimension_body_material_4_extra_3_width_allowance' => $this->input->post('body_material_4_extra_3_width_allowance'),
            'tbl_dimension_body_material_4_extra_3_width_total' => $this->input->post('body_material_4_extra_3_width_total'),

            //Body Material 5
            'tbl_dimension_body_material_5_front_length' => $this->input->post('body_material_5_front_length'),
            'tbl_dimension_body_material_5_front_length_allowance' => $this->input->post('body_material_5_front_length_allowance'),
            'tbl_dimension_body_material_5_front_length_total' => $this->input->post('body_material_5_front_length_total'),

            'tbl_dimension_body_material_5_front_width' => $this->input->post('body_material_5_front_width'),
            'tbl_dimension_body_material_5_front_width_allowance' => $this->input->post('body_material_5_front_width_allowance'),
            'tbl_dimension_body_material_5_front_width_total' => $this->input->post('body_material_5_front_width_total'),

            'tbl_dimension_body_material_5_back_length' => $this->input->post('body_material_5_back_length'),
            'tbl_dimension_body_material_5_back_length_allowance' => $this->input->post('body_material_5_back_length_allowance'),
            'tbl_dimension_body_material_5_back_length_total' => $this->input->post('body_material_5_back_length_total'),

            'tbl_dimension_body_material_5_back_width' => $this->input->post('body_material_5_back_width'),
            'tbl_dimension_body_material_5_back_width_allowance' => $this->input->post('body_material_5_back_width_allowance'),
            'tbl_dimension_body_material_5_back_width_total' => $this->input->post('body_material_5_back_width_total'),

            'tbl_dimension_body_material_5_top_length' => $this->input->post('body_material_5_top_length'),
            'tbl_dimension_body_material_5_top_length_allowance' => $this->input->post('body_material_5_top_length_allowance'),
            'tbl_dimension_body_material_5_top_length_total' => $this->input->post('body_material_5_top_length_total'),

            'tbl_dimension_body_material_5_top_width' => $this->input->post('body_material_5_top_width'),
            'tbl_dimension_body_material_5_top_width_allowance' => $this->input->post('body_material_5_top_width_allowance'),
            'tbl_dimension_body_material_5_top_width_total' => $this->input->post('body_material_5_top_width_total'),

            'tbl_dimension_body_material_5_bottom_length' => $this->input->post('body_material_5_bottom_length'),
            'tbl_dimension_body_material_5_bottom_length_allowance' => $this->input->post('body_material_5_bottom_length_allowance'),
            'tbl_dimension_body_material_5_bottom_length_total' => $this->input->post('body_material_5_bottom_length_total'),

            'tbl_dimension_body_material_5_bottom_width' => $this->input->post('body_material_5_bottom_width'),
            'tbl_dimension_body_material_5_bottom_width_allowance' => $this->input->post('body_material_5_bottom_width_allowance'),
            'tbl_dimension_body_material_5_bottom_width_total' => $this->input->post('body_material_5_bottom_width_total'),

            'tbl_dimension_body_material_5_left_length' => $this->input->post('body_material_5_left_length'),
            'tbl_dimension_body_material_5_left_length_allowance' => $this->input->post('body_material_5_left_length_allowance'),
            'tbl_dimension_body_material_5_left_length_total' => $this->input->post('body_material_5_left_length_total'),

            'tbl_dimension_body_material_5_left_width' => $this->input->post('body_material_5_left_width'),
            'tbl_dimension_body_material_5_left_width_allowance' => $this->input->post('body_material_5_left_width_allowance'),
            'tbl_dimension_body_material_5_left_width_total' => $this->input->post('body_material_5_left_width_total'),

            'tbl_dimension_body_material_5_right_length' => $this->input->post('body_material_5_right_length'),
            'tbl_dimension_body_material_5_right_length_allowance' => $this->input->post('body_material_5_right_length_allowance'),
            'tbl_dimension_body_material_5_right_length_total' => $this->input->post('body_material_5_right_length_total'),

            'tbl_dimension_body_material_5_right_width' => $this->input->post('body_material_5_right_width'),
            'tbl_dimension_body_material_5_right_width_allowance' => $this->input->post('body_material_5_right_width_allowance'),
            'tbl_dimension_body_material_5_right_width_total' => $this->input->post('body_material_5_right_width_total'),

            'tbl_dimension_body_material_5_pocket_length' => $this->input->post('body_material_5_pocket_length'),
            'tbl_dimension_body_material_5_pocket_length_allowance' => $this->input->post('body_material_5_pocket_length_allowance'),
            'tbl_dimension_body_material_5_pocket_length_total' => $this->input->post('body_material_5_pocket_length_total'),

            'tbl_dimension_body_material_5_pocket_width' => $this->input->post('body_material_5_pocket_width'),
            'tbl_dimension_body_material_5_pocket_width_allowance' => $this->input->post('body_material_5_pocket_width_allowance'),
            'tbl_dimension_body_material_5_pocket_width_total' => $this->input->post('body_material_5_pocket_width_total'),

            'tbl_dimension_body_material_5_extra_1_length' => $this->input->post('body_material_5_extra_1_length'),
            'tbl_dimension_body_material_5_extra_1_length_allowance' => $this->input->post('body_material_5_extra_1_length_allowance'),
            'tbl_dimension_body_material_5_extra_1_length_total' => $this->input->post('body_material_5_extra_1_length_total'),

            'tbl_dimension_body_material_5_extra_1_width' => $this->input->post('body_material_5_extra_1_width'),
            'tbl_dimension_body_material_5_extra_1_width_allowance' => $this->input->post('body_material_5_extra_1_width_allowance'),
            'tbl_dimension_body_material_5_extra_1_width_total' => $this->input->post('body_material_5_extra_1_width_total'),

            'tbl_dimension_body_material_5_extra_2_length' => $this->input->post('body_material_5_extra_2_length'),
            'tbl_dimension_body_material_5_extra_2_length_allowance' => $this->input->post('body_material_5_extra_2_length_allowance'),
            'tbl_dimension_body_material_5_extra_2_length_total' => $this->input->post('body_material_5_extra_2_length_total'),

            'tbl_dimension_body_material_5_extra_2_width' => $this->input->post('body_material_5_extra_2_width'),
            'tbl_dimension_body_material_5_extra_2_width_allowance' => $this->input->post('body_material_5_extra_2_width_allowance'),
            'tbl_dimension_body_material_5_extra_2_width_total' => $this->input->post('body_material_5_extra_2_width_total'),

            'tbl_dimension_body_material_5_extra_3_length' => $this->input->post('body_material_5_extra_3_length'),
            'tbl_dimension_body_material_5_extra_3_length_allowance' => $this->input->post('body_material_5_extra_3_length_allowance'),
            'tbl_dimension_body_material_5_extra_3_length_total' => $this->input->post('body_material_5_extra_3_length_total'),

            'tbl_dimension_body_material_5_extra_3_width' => $this->input->post('body_material_5_extra_3_width'),
            'tbl_dimension_body_material_5_extra_3_width_allowance' => $this->input->post('body_material_5_extra_3_width_allowance'),
            'tbl_dimension_body_material_5_extra_3_width_total' => $this->input->post('body_material_5_extra_3_width_total'),

            //Body Material 6
            'tbl_dimension_body_material_6_front_length' => $this->input->post('body_material_6_front_length'),
            'tbl_dimension_body_material_6_front_length_allowance' => $this->input->post('body_material_6_front_length_allowance'),
            'tbl_dimension_body_material_6_front_length_total' => $this->input->post('body_material_6_front_length_total'),

            'tbl_dimension_body_material_6_front_width' => $this->input->post('body_material_6_front_width'),
            'tbl_dimension_body_material_6_front_width_allowance' => $this->input->post('body_material_6_front_width_allowance'),
            'tbl_dimension_body_material_6_front_width_total' => $this->input->post('body_material_6_front_width_total'),

            'tbl_dimension_body_material_6_back_length' => $this->input->post('body_material_6_back_length'),
            'tbl_dimension_body_material_6_back_length_allowance' => $this->input->post('body_material_6_back_length_allowance'),
            'tbl_dimension_body_material_6_back_length_total' => $this->input->post('body_material_6_back_length_total'),

            'tbl_dimension_body_material_6_back_width' => $this->input->post('body_material_6_back_width'),
            'tbl_dimension_body_material_6_back_width_allowance' => $this->input->post('body_material_6_back_width_allowance'),
            'tbl_dimension_body_material_6_back_width_total' => $this->input->post('body_material_6_back_width_total'),

            'tbl_dimension_body_material_6_top_length' => $this->input->post('body_material_6_top_length'),
            'tbl_dimension_body_material_6_top_length_allowance' => $this->input->post('body_material_6_top_length_allowance'),
            'tbl_dimension_body_material_6_top_length_total' => $this->input->post('body_material_6_top_length_total'),

            'tbl_dimension_body_material_6_top_width' => $this->input->post('body_material_6_top_width'),
            'tbl_dimension_body_material_6_top_width_allowance' => $this->input->post('body_material_6_top_width_allowance'),
            'tbl_dimension_body_material_6_top_width_total' => $this->input->post('body_material_6_top_width_total'),

            'tbl_dimension_body_material_6_bottom_length' => $this->input->post('body_material_6_bottom_length'),
            'tbl_dimension_body_material_6_bottom_length_allowance' => $this->input->post('body_material_6_bottom_length_allowance'),
            'tbl_dimension_body_material_6_bottom_length_total' => $this->input->post('body_material_6_bottom_length_total'),

            'tbl_dimension_body_material_6_bottom_width' => $this->input->post('body_material_6_bottom_width'),
            'tbl_dimension_body_material_6_bottom_width_allowance' => $this->input->post('body_material_6_bottom_width_allowance'),
            'tbl_dimension_body_material_6_bottom_width_total' => $this->input->post('body_material_6_bottom_width_total'),

            'tbl_dimension_body_material_6_left_length' => $this->input->post('body_material_6_left_length'),
            'tbl_dimension_body_material_6_left_length_allowance' => $this->input->post('body_material_6_left_length_allowance'),
            'tbl_dimension_body_material_6_left_length_total' => $this->input->post('body_material_6_left_length_total'),

            'tbl_dimension_body_material_6_left_width' => $this->input->post('body_material_6_left_width'),
            'tbl_dimension_body_material_6_left_width_allowance' => $this->input->post('body_material_6_left_width_allowance'),
            'tbl_dimension_body_material_6_left_width_total' => $this->input->post('body_material_6_left_width_total'),

            'tbl_dimension_body_material_6_right_length' => $this->input->post('body_material_6_right_length'),
            'tbl_dimension_body_material_6_right_length_allowance' => $this->input->post('body_material_6_right_length_allowance'),
            'tbl_dimension_body_material_6_right_length_total' => $this->input->post('body_material_6_right_length_total'),

            'tbl_dimension_body_material_6_right_width' => $this->input->post('body_material_6_right_width'),
            'tbl_dimension_body_material_6_right_width_allowance' => $this->input->post('body_material_6_right_width_allowance'),
            'tbl_dimension_body_material_6_right_width_total' => $this->input->post('body_material_6_right_width_total'),

            'tbl_dimension_body_material_6_pocket_length' => $this->input->post('body_material_6_pocket_length'),
            'tbl_dimension_body_material_6_pocket_length_allowance' => $this->input->post('body_material_6_pocket_length_allowance'),
            'tbl_dimension_body_material_6_pocket_length_total' => $this->input->post('body_material_6_pocket_length_total'),

            'tbl_dimension_body_material_6_pocket_width' => $this->input->post('body_material_6_pocket_width'),
            'tbl_dimension_body_material_6_pocket_width_allowance' => $this->input->post('body_material_6_pocket_width_allowance'),
            'tbl_dimension_body_material_6_pocket_width_total' => $this->input->post('body_material_6_pocket_width_total'),

            'tbl_dimension_body_material_6_extra_1_length' => $this->input->post('body_material_6_extra_1_length'),
            'tbl_dimension_body_material_6_extra_1_length_allowance' => $this->input->post('body_material_6_extra_1_length_allowance'),
            'tbl_dimension_body_material_6_extra_1_length_total' => $this->input->post('body_material_6_extra_1_length_total'),

            'tbl_dimension_body_material_6_extra_1_width' => $this->input->post('body_material_6_extra_1_width'),
            'tbl_dimension_body_material_6_extra_1_width_allowance' => $this->input->post('body_material_6_extra_1_width_allowance'),
            'tbl_dimension_body_material_6_extra_1_width_total' => $this->input->post('body_material_6_extra_1_width_total'),

            'tbl_dimension_body_material_6_extra_2_length' => $this->input->post('body_material_6_extra_2_length'),
            'tbl_dimension_body_material_6_extra_2_length_allowance' => $this->input->post('body_material_6_extra_2_length_allowance'),
            'tbl_dimension_body_material_6_extra_2_length_total' => $this->input->post('body_material_6_extra_2_length_total'),

            'tbl_dimension_body_material_6_extra_2_width' => $this->input->post('body_material_6_extra_2_width'),
            'tbl_dimension_body_material_6_extra_2_width_allowance' => $this->input->post('body_material_6_extra_2_width_allowance'),
            'tbl_dimension_body_material_6_extra_2_width_total' => $this->input->post('body_material_6_extra_2_width_total'),

            'tbl_dimension_body_material_6_extra_3_length' => $this->input->post('body_material_6_extra_3_length'),
            'tbl_dimension_body_material_6_extra_3_length_allowance' => $this->input->post('body_material_6_extra_3_length_allowance'),
            'tbl_dimension_body_material_6_extra_3_length_total' => $this->input->post('body_material_6_extra_3_length_total'),

            'tbl_dimension_body_material_6_extra_3_width' => $this->input->post('body_material_6_extra_3_width'),
            'tbl_dimension_body_material_6_extra_3_width_allowance' => $this->input->post('body_material_6_extra_3_width_allowance'),
            'tbl_dimension_body_material_6_extra_3_width_total' => $this->input->post('body_material_6_extra_3_width_total'),

        );
        $dimension_id = $this->input->post('dimension-id');

        $this->db->where('tbl_dimension_id',$dimension_id);
        $this->db->update('woven_dimension',$dimension_data);


        $woven_update_data = array(
            'tbl_woven_company_name' => $this->input->post('order_company'),
            'tbl_woven_order_date' => $this->input->post('order_date'),
            'tbl_woven_item_name' => $this->input->post('order_item_name'),
            'tbl_woven_ref_name' => $this->input->post('order_ref_no'),

           // 'tbl_woven_order_gsm' => $this->input->post('woven_order_gsm'),
            //'tbl_woven_order_color' => $this->input->post('woven_order_color'),
            'tbl_woven_order_usd' => $this->input->post('order_usd'),

            'tbl_woven_order_wastage' => $this->input->post('order_wastage'),
            'tbl_woven_order_margin' => $this->input->post('order_margin'),

            'tbl_woven_order_quantity' => $this->input->post('order_quantity'),
            'tbl_woven_order_transport' => $this->input->post('order_transport'),
            'tbl_woven_order_bank_doc_charge' => $this->input->post('order_bank_document'),

            'tbl_order_sewing' => $this->input->post('order_sewing'),
            'tbl_order_overheads' => $this->input->post('order_overheads'),

            'tbl_order_total_material_inc_wastage' => $this->input->post('order_total_material_inc_wastage'),
            'tbl_order_total_overhead_and_other_cost' => $this->input->post('total_overhead_and_other_hidden'),
            'tbl_total_cost' => $this->input->post('total_cost_hidden'),
            'tbl_total_price' => $this->input->post('final_price_hidden'),

            //Body Material Name
            'tbl_woven_body_material_1_name' => $this->input->post('body_material_1_name'),
            'tbl_woven_body_material_2_name' => $this->input->post('body_material_2_name'),
            'tbl_woven_body_material_3_name' => $this->input->post('body_material_3_name'),
            'tbl_woven_body_material_4_name' => $this->input->post('body_material_4_name'),
            'tbl_woven_body_material_5_name' => $this->input->post('body_material_5_name'),
            'tbl_woven_body_material_6_name' => $this->input->post('body_material_6_name'),

            //Body Material Name
            'tbl_woven_body_material_1_roll_width' => $this->input->post('body_material_1_roll_1'),
            'tbl_woven_body_material_2_roll_width' => $this->input->post('body_material_2_roll_2'),
            'tbl_woven_body_material_3_roll_width' => $this->input->post('body_material_3_roll_3'),
            'tbl_woven_body_material_4_roll_width' => $this->input->post('body_material_4_roll_4'),
            'tbl_woven_body_material_5_roll_width' => $this->input->post('body_material_5_roll_5'),
            'tbl_woven_body_material_6_roll_width' => $this->input->post('body_material_6_roll_6'),

            //Body Material 1 consumption cost
            'tbl_woven_body_material_1_cost' => $this->input->post('body_material_1_cost'),
            'tbl_woven_body_material_1_consumption' => $this->input->post('body_material_1_consumption'),
            'tbl_woven_body_material_1_rate' => $this->input->post('body_material_1_consumption_rate'),
            'tbl_woven_body_material_1_total_cost' => $this->input->post('body_material_1_consumption_cost'),

            //Body Material 2 consumption cost
            'tbl_woven_body_material_2_cost' => $this->input->post('body_material_2_cost'),
            'tbl_woven_body_material_2_consumption' => $this->input->post('body_material_2_consumption'),
            'tbl_woven_body_material_2_rate' => $this->input->post('body_material_2_consumption_rate'),
            'tbl_woven_body_material_2_total_cost' => $this->input->post('body_material_2_consumption_cost'),

            //Body Material 3 consumption cost
            'tbl_woven_body_material_3_cost' => $this->input->post('body_material_3_cost'),
            'tbl_woven_body_material_3_consumption' => $this->input->post('body_material_3_consumption'),
            'tbl_woven_body_material_3_rate' => $this->input->post('body_material_3_consumption_rate'),
            'tbl_woven_body_material_3_total_cost' => $this->input->post('body_material_3_consumption_cost'),

            //Body Material 4 consumption cost
            'tbl_woven_body_material_4_cost' => $this->input->post('body_material_4_cost'),
            'tbl_woven_body_material_4_consumption' => $this->input->post('body_material_4_consumption'),
            'tbl_woven_body_material_4_rate' => $this->input->post('body_material_4_consumption_rate'),
            'tbl_woven_body_material_4_total_cost' => $this->input->post('body_material_4_consumption_cost'),

            //Body Material 5 consumption cost
            'tbl_woven_body_material_5_cost' => $this->input->post('body_material_5_cost'),
            'tbl_woven_body_material_5_consumption' => $this->input->post('body_material_5_consumption'),
            'tbl_woven_body_material_5_rate' => $this->input->post('body_material_5_consumption_rate'),
            'tbl_woven_body_material_5_total_cost' => $this->input->post('body_material_5_consumption_cost'),

            //Body Material 6 consumption cost
            'tbl_woven_body_material_6_cost' => $this->input->post('body_material_6_cost'),
            'tbl_woven_body_material_6_consumption' => $this->input->post('body_material_6_consumption'),
            'tbl_woven_body_material_6_rate' => $this->input->post('body_material_6_consumption_rate'),
            'tbl_woven_body_material_6_total_cost' => $this->input->post('body_material_6_consumption_cost'),

            'tbl_woven_trims_yard_zipper_item_cost' => $this->input->post('zipper_cost'),
            'tbl_woven_trims_yard_zipper_item_consumption' => $this->input->post('zipper_consumption'),
            'tbl_woven_trims_yard_zipper_item_rate' => $this->input->post('zipper_consumption_rate'),
            'tbl_woven_trims_yard_zipper_item_total_cost' => $this->input->post('zipper_consumption_cost'),

            'tbl_woven_trims_yard_two_inch_webbing_item_cost' => $this->input->post('two_inch_webbing_cost'),
            'tbl_woven_trims_yard_two_inch_webbing_item_consumption' => $this->input->post('two_inch_webbing_consumption'),
            'tbl_woven_trims_yard_two_inch_webbing_item_rate' => $this->input->post('two_inch_webbing_consumption_rate'),
            'tbl_woven_trims_yard_two_inch_webbing_item_total_cost' => $this->input->post('two_inch_webbing_consumption_cost'),

            'tbl_woven_trims_yard_one_and_half_inch_webbing_item_cost' => $this->input->post('one_and_half_inch_webbing_cost'),
            'tbl_woven_trims_yard_one_and_half_webbing_item_consumption' => $this->input->post('one_and_half_inch_webbing_consumption'),
            'tbl_woven_trims_yard_one_and_half_webbing_item_rate' => $this->input->post('one_and_half_inch_webbing_consumption_rate'),
            'tbl_woven_trims_yard_one_and_half_webbing_item_total_cost' => $this->input->post('one_and_half_inch_webbing_consumption_cost'),

            'tbl_woven_trims_yard_velcro_item_cost' => $this->input->post('velcro_cost'),
            'tbl_woven_trims_yard_velcro_item_consumption' => $this->input->post('velcro_consumption'),
            'tbl_woven_trims_yard_velcro_item_rate' => $this->input->post('velcro_consumption_rate'),
            'tbl_woven_trims_yard_velcro_item_total_cost' => $this->input->post('velcro_consumption_cost'),

            'tbl_woven_trims_yard_extra_1_name' => $this->input->post('extra_trim_yard_extra_1_name'),
            'tbl_woven_trims_yard_extra_2_name' => $this->input->post('extra_trim_yard_extra_2_name'),
            'tbl_woven_trims_yard_extra_3_name' => $this->input->post('extra_trim_yard_extra_3_name'),


            'tbl_woven_trims_yard_extra_1_item_cost' => $this->input->post('extra_trim_yard_1_cost'),
            'tbl_woven_trims_yard_extra_1_item_consumption' => $this->input->post('extra_trim_yard_1_consumption'),
            'tbl_woven_trims_yard_extra_1_item_rate' => $this->input->post('extra_trim_yard_1_consumption_rate'),
            'tbl_woven_trims_yard_extra_1_item_total_cost' => $this->input->post('extra_trim_yard_1_consumption_cost'),

            'tbl_woven_trims_yard_extra_2_item_cost' => $this->input->post('extra_trim_yard_2_cost'),
            'tbl_woven_trims_yard_extra_2_item_consumption' => $this->input->post('extra_trim_yard_2_consumption'),
            'tbl_woven_trims_yard_extra_2_item_rate' => $this->input->post('extra_trim_yard_2_consumption_rate'),
            'tbl_woven_trims_yard_extra_2_item_total_cost' => $this->input->post('extra_trim_yard_2_consumption_cost'),

            'tbl_woven_trims_yard_extra_3_item_cost' => $this->input->post('extra_trim_yard_3_cost'),
            'tbl_woven_trims_yard_extra_3_item_consumption' => $this->input->post('extra_trim_yard_3_consumption'),
            'tbl_woven_trims_yard_extra_3_item_rate' => $this->input->post('extra_trim_yard_3_consumption_rate'),
            'tbl_woven_trims_yard_extra_3_item_total_cost' => $this->input->post('extra_trim_yard_3_consumption_cost'),

            'tbl_woven_trims_piece_puller_item_cost' => $this->input->post('puller_cost'),
            'tbl_woven_trims_piece_puller_item_consumption' => $this->input->post('puller_consumption'),
            'tbl_woven_trims_piece_puller_item_rate' => $this->input->post('puller_consumption_rate'),
            'tbl_woven_trims_piece_puller_item_total_cost' => $this->input->post('puller_consumption_cost'),

            'tbl_woven_trims_piece_print_item_cost' => $this->input->post('print_cost'),
            'tbl_woven_trims_piece_print_item_consumption' => $this->input->post('print_consumption'),
            'tbl_woven_trims_piece_print_item_rate' => $this->input->post('print_consumption_rate'),
            'tbl_woven_trims_piece_print_item_total_cost' => $this->input->post('print_consumption_cost'),

            'tbl_woven_trims_piece_d_buckle_item_cost' => $this->input->post('buckle_cost'),
            'tbl_woven_trims_piece_d_buckle_item_consumption' => $this->input->post('buckle_consumption'),
            'tbl_woven_trims_piece_d_buckle_item_rate' => $this->input->post('buckle_consumption_rate'),
            'tbl_woven_trims_piece_d_buckle_item_total_cost' => $this->input->post('buckle_consumption_cost'),

            'tbl_woven_trims_piece_swivel_hook_item_cost' => $this->input->post('swivel_hook_cost'),
            'tbl_woven_trims_piece_swivel_hook_item_consumption' => $this->input->post('swivel_hook_consumption'),
            'tbl_woven_trims_piece_swivel_hook_item_rate' => $this->input->post('swivel_hook_consumption_rate'),
            'tbl_woven_trims_piece_swivel_hook_item_total_cost' => $this->input->post('swivel_hook_consumption_cost'),

            'tbl_woven_trims_piece_adjustable_bukle_item_cost' => $this->input->post('adjustable_buckle_cost'),
            'tbl_woven_trims_piece_adjustable_bukle_item_consumption' => $this->input->post('adjustable_buckle_consumption'),
            'tbl_woven_trims_piece_adjustable_bukle_item_rate' => $this->input->post('adjustable_buckle_consumption_rate'),
            'tbl_woven_trims_piece_adjustable_bukle_item_total_cost' => $this->input->post('adjustable_buckle_consumption_cost'),

            'tbl_woven_trims_piece_magnetic_button_item_cost' => $this->input->post('magnetic_button_cost'),
            'tbl_woven_trims_piece_magnetic_button_item_consumption' => $this->input->post('magnetic_button_consumption'),
            'tbl_woven_trims_piece_magnetic_button_item_rate' => $this->input->post('magnetic_button_consumption_rate'),
            'tbl_woven_trims_piece_magnetic_button_item_total_cost' => $this->input->post('magnetic_button_consumption_cost'),

            'tbl_woven_trims_piece_snap_button_item_cost' => $this->input->post('snap_button_cost'),
            'tbl_woven_trims_piece_snap_button_item_consumption' => $this->input->post('snap_button_consumption'),
            'tbl_woven_trims_piece_snap_button_item_rate' => $this->input->post('snap_button_consumption_rate'),
            'tbl_woven_trims_piece_snap_button_item_total_cost' => $this->input->post('snap_button_consumption_cost'),

            'tbl_woven_trims_piece_rivet_item_cost' => $this->input->post('rivet_cost'),
            'tbl_woven_trims_piece_rivet_item_consumption' => $this->input->post('rivet_consumption'),
            'tbl_woven_trims_piece_rivet_item_rate' => $this->input->post('rivet_consumption_rate'),
            'tbl_woven_trims_piece_rivet_item_total_cost' => $this->input->post('rivet_consumption_cost'),

            'tbl_woven_trims_piece_bottom_base_item_cost' => $this->input->post('bottom_base_cost'),
            'tbl_woven_trims_piece_bottom_base_item_consumption' => $this->input->post('bottom_base_consumption'),
            'tbl_woven_trims_piece_bottom_base_item_rate' => $this->input->post('bottom_base_consumption_rate'),
            'tbl_woven_trims_piece_bottom_base_item_total_cost' => $this->input->post('bottom_base_consumption_cost'),

            'tbl_woven_trims_piece_thread_item_cost' => $this->input->post('thread_cost'),
            'tbl_woven_trims_piece_thread_item_consumption' => $this->input->post('thread_consumption'),
            'tbl_woven_trims_piece_thread_item_rate' => $this->input->post('thread_consumption_rate'),
            'tbl_woven_trims_piece_thread_item_total_cost' => $this->input->post('thread_consumption_cost'),

            'tbl_woven_trims_piece_tag_item_cost' => $this->input->post('tag_cost'),
            'tbl_woven_trims_piece_tag_item_consumption' => $this->input->post('tag_consumption'),
            'tbl_woven_trims_piece_tag_item_rate' => $this->input->post('tag_consumption_rate'),
            'tbl_woven_trims_piece_tag_item_total_cost' => $this->input->post('tag_consumption_cost'),

            'tbl_woven_trims_piece_label_item_cost' => $this->input->post('label_cost'),
            'tbl_woven_trims_piece_label_item_consumption' => $this->input->post('label_consumption'),
            'tbl_woven_trims_piece_label_item_rate' => $this->input->post('label_consumption_rate'),
            'tbl_woven_trims_piece_label_item_total_cost' => $this->input->post('label_consumption_cost'),

            'tbl_woven_trims_piece_packing_item_cost' => $this->input->post('packing_cost'),
            'tbl_woven_trims_piece_packing_item_consumption' => $this->input->post('packing_consumption'),
            'tbl_woven_trims_piece_packing_item_rate' => $this->input->post('packing_consumption_rate'),
            'tbl_woven_trims_piece_packing_item_total_cost' => $this->input->post('packing_consumption_cost'),

            'tbl_woven_trims_piece_bottom_shoe_item_cost' => $this->input->post('bottom_shoe_cost'),
            'tbl_woven_trims_piece_bottom_shoe_item_consumption' => $this->input->post('bottom_shoe_consumption'),
            'tbl_woven_trims_piece_bottom_shoe_item_rate' => $this->input->post('bottom_shoe_consumption_rate'),
            'tbl_woven_trims_piece_bottom_shoe_item_total_cost' => $this->input->post('bottom_shoe_consumption_cost'),

            'tbl_woven_trims_piece_extra_1_name' => $this->input->post('extra_1_piece_name'),
            'tbl_woven_trims_piece_extra_1_item_cost' => $this->input->post('extra_1_piece_cost'),
            'tbl_woven_trims_piece_extra_1_item_consumption' => $this->input->post('extra_1_piece_consumption'),
            'tbl_woven_trims_piece_extra_1_item_rate' => $this->input->post('extra_1_piece_consumption_rate'),
            'tbl_woven_trims_piece_extra_1_item_total_cost' => $this->input->post('extra_1_piece_consumption_cost'),

            'tbl_woven_trims_piece_extra_2_name' => $this->input->post('extra_2_piece_name'),
            'tbl_woven_trims_piece_extra_2_item_cost' => $this->input->post('extra_2_piece_cost'),
            'tbl_woven_trims_piece_extra_2_item_consumption' => $this->input->post('extra_2_piece_consumption'),
            'tbl_woven_trims_piece_extra_2_item_rate' => $this->input->post('extra_2_piece_consumption_rate'),
            'tbl_woven_trims_piece_extra_2_item_total_cost' => $this->input->post('extra_2_piece_consumption_cost'),

            'tbl_woven_trims_piece_extra_3_name' => $this->input->post('extra_3_piece_name'),
            'tbl_woven_trims_piece_extra_3_item_cost' => $this->input->post('extra_3_piece_cost'),
            'tbl_woven_trims_piece_extra_3_item_consumption' => $this->input->post('extra_3_piece_consumption'),
            'tbl_woven_trims_piece_extra_3_item_rate' => $this->input->post('extra_3_piece_consumption_rate'),
            'tbl_woven_trims_piece_extra_3_item_total_cost' => $this->input->post('extra_3_piece_consumption_cost'),

            'tbl_woven_trims_piece_extra_4_name' => $this->input->post('extra_4_piece_name'),
            'tbl_woven_trims_piece_extra_4_item_cost' => $this->input->post('extra_4_piece_cost'),
            'tbl_woven_trims_piece_extra_4_item_consumption' => $this->input->post('extra_4_piece_consumption'),
            'tbl_woven_trims_piece_extra_4_item_rate' => $this->input->post('extra_4_piece_consumption_rate'),
            'tbl_woven_trims_piece_extra_4_item_total_cost' => $this->input->post('extra_4_piece_consumption_cost'),

            'tbl_woven_trims_piece_extra_5_name' => $this->input->post('extra_5_piece_name'),
            'tbl_woven_trims_piece_extra_5_item_cost' => $this->input->post('extra_5_piece_cost'),
            'tbl_woven_trims_piece_extra_5_item_consumption' => $this->input->post('extra_5_piece_consumption'),
            'tbl_woven_trims_piece_extra_5_item_rate' => $this->input->post('extra_5_piece_consumption_rate'),
            'tbl_woven_trims_piece_extra_5_item_total_cost' => $this->input->post('extra_5_piece_consumption_cost'),
        );

        $this->db->where('tbl_woven_order_id',$woven_id);
        $this->db->update('woven_costing',$woven_update_data);



        //Save Revision Data
        $woven_dimension_rev_data = array(
            'tbl_dimnesion_body_material_first_extra_1' => $this->input->post('body_material_first_extra_1'),
            'tbl_dimnesion_body_material_first_extra_2' => $this->input->post('body_material_first_extra_2'),
            'tbl_dimnesion_body_material_first_extra_3' => $this->input->post('body_material_first_extra_3'),
            'tbl_dimnesion_body_material_second_extra_1' => $this->input->post('body_material_second_extra_1'),
            'tbl_dimnesion_body_material_second_extra_2' => $this->input->post('body_material_second_extra_2'),
            'tbl_dimnesion_body_material_second_extra_3' => $this->input->post('body_material_second_extra_3'),


            //Body Material 1
            'tbl_dimension_body_material_1_front_length' => $this->input->post('body_material_1_front_length'),
            'tbl_dimension_body_material_1_front_length_allowance' => $this->input->post('body_material_1_front_length_allowance'),
            'tbl_dimension_body_material_1_front_length_total' => $this->input->post('body_material_1_front_length_total'),

            'tbl_dimension_body_material_1_front_width' => $this->input->post('body_material_1_front_width'),
            'tbl_dimension_body_material_1_front_width_allowance' => $this->input->post('body_material_1_front_width_allowance'),
            'tbl_dimension_body_material_1_front_width_total' => $this->input->post('body_material_1_front_width_total'),

            'tbl_dimension_body_material_1_back_length' => $this->input->post('body_material_1_back_length'),
            'tbl_dimension_body_material_1_back_length_allowance' => $this->input->post('body_material_1_back_length_allowance'),
            'tbl_dimension_body_material_1_back_length_total' => $this->input->post('body_material_1_back_length_total'),

            'tbl_dimension_body_material_1_back_width' => $this->input->post('body_material_1_back_width'),
            'tbl_dimension_body_material_1_back_width_allowance' => $this->input->post('body_material_1_back_width_allowance'),
            'tbl_dimension_body_material_1_back_width_total' => $this->input->post('body_material_1_back_width_total'),

            'tbl_dimension_body_material_1_top_length' => $this->input->post('body_material_1_top_length'),
            'tbl_dimension_body_material_1_top_length_allowance' => $this->input->post('body_material_1_top_length_allowance'),
            'tbl_dimension_body_material_1_top_length_total' => $this->input->post('body_material_1_top_length_total'),

            'tbl_dimension_body_material_1_top_width' => $this->input->post('body_material_1_top_width'),
            'tbl_dimension_body_material_1_top_width_allowance' => $this->input->post('body_material_1_top_width_allowance'),
            'tbl_dimension_body_material_1_top_width_total' => $this->input->post('body_material_1_top_width_total'),

            'tbl_dimension_body_material_1_bottom_length' => $this->input->post('body_material_1_bottom_length'),
            'tbl_dimension_body_material_1_bottom_length_allowance' => $this->input->post('body_material_1_bottom_length_allowance'),
            'tbl_dimension_body_material_1_bottom_length_total' => $this->input->post('body_material_1_bottom_length_total'),

            'tbl_dimension_body_material_1_bottom_width' => $this->input->post('body_material_1_bottom_width'),
            'tbl_dimension_body_material_1_bottom_width_allowance' => $this->input->post('body_material_1_bottom_width_allowance'),
            'tbl_dimension_body_material_1_bottom_width_total' => $this->input->post('body_material_1_bottom_width_total'),

            'tbl_dimension_body_material_1_left_length' => $this->input->post('body_material_1_left_length'),
            'tbl_dimension_body_material_1_left_length_allowance' => $this->input->post('body_material_1_left_length_allowance'),
            'tbl_dimension_body_material_1_left_length_total' => $this->input->post('body_material_1_left_length_total'),

            'tbl_dimension_body_material_1_left_width' => $this->input->post('body_material_1_left_width'),
            'tbl_dimension_body_material_1_left_width_allowance' => $this->input->post('body_material_1_left_width_allowance'),
            'tbl_dimension_body_material_1_left_width_total' => $this->input->post('body_material_1_left_width_total'),

            'tbl_dimension_body_material_1_right_length' => $this->input->post('body_material_1_right_length'),
            'tbl_dimension_body_material_1_right_length_allowance' => $this->input->post('body_material_1_right_length_allowance'),
            'tbl_dimension_body_material_1_right_length_total' => $this->input->post('body_material_1_right_length_total'),

            'tbl_dimension_body_material_1_right_width' => $this->input->post('body_material_1_right_width'),
            'tbl_dimension_body_material_1_right_width_allowance' => $this->input->post('body_material_1_right_width_allowance'),
            'tbl_dimension_body_material_1_right_width_total' => $this->input->post('body_material_1_right_width_total'),

            'tbl_dimension_body_material_1_pocket_length' => $this->input->post('body_material_1_pocket_length'),
            'tbl_dimension_body_material_1_pocket_length_allowance' => $this->input->post('body_material_1_pocket_length_allowance'),
            'tbl_dimension_body_material_1_pocket_length_total' => $this->input->post('body_material_1_pocket_length_total'),

            'tbl_dimension_body_material_1_pocket_width' => $this->input->post('body_material_1_pocket_width'),
            'tbl_dimension_body_material_1_pocket_width_allowance' => $this->input->post('body_material_1_pocket_width_allowance'),
            'tbl_dimension_body_material_1_pocket_width_total' => $this->input->post('body_material_1_pocket_width_total'),

            'tbl_dimension_body_material_1_extra_1_length' => $this->input->post('body_material_1_extra_1_length'),
            'tbl_dimension_body_material_1_extra_1_length_allowance' => $this->input->post('body_material_1_extra_1_length_allowance'),
            'tbl_dimension_body_material_1_extra_1_length_total' => $this->input->post('body_material_1_extra_1_length_total'),

            'tbl_dimension_body_material_1_extra_1_width' => $this->input->post('body_material_1_extra_1_width'),
            'tbl_dimension_body_material_1_extra_1_width_allowance' => $this->input->post('body_material_1_extra_1_width_allowance'),
            'tbl_dimension_body_material_1_extra_1_width_total' => $this->input->post('body_material_1_extra_1_width_total'),

            'tbl_dimension_body_material_1_extra_2_length' => $this->input->post('body_material_1_extra_2_length'),
            'tbl_dimension_body_material_1_extra_2_length_allowance' => $this->input->post('body_material_1_extra_2_length_allowance'),
            'tbl_dimension_body_material_1_extra_2_length_total' => $this->input->post('body_material_1_extra_2_length_total'),

            'tbl_dimension_body_material_1_extra_2_width' => $this->input->post('body_material_1_extra_2_width'),
            'tbl_dimension_body_material_1_extra_2_width_allowance' => $this->input->post('body_material_1_extra_2_width_allowance'),
            'tbl_dimension_body_material_1_extra_2_width_total' => $this->input->post('body_material_1_extra_2_width_total'),

            'tbl_dimension_body_material_1_extra_3_length' => $this->input->post('body_material_1_extra_3_length'),
            'tbl_dimension_body_material_1_extra_3_length_allowance' => $this->input->post('body_material_1_extra_3_length_allowance'),
            'tbl_dimension_body_material_1_extra_3_length_total' => $this->input->post('body_material_1_extra_3_length_total'),

            'tbl_dimension_body_material_1_extra_3_width' => $this->input->post('body_material_1_extra_3_width'),
            'tbl_dimension_body_material_1_extra_3_width_allowance' => $this->input->post('body_material_1_extra_3_width_allowance'),
            'tbl_dimension_body_material_1_extra_3_width_total' => $this->input->post('body_material_1_extra_3_width_total'),

            //Body Material 2
            'tbl_dimension_body_material_2_front_length' => $this->input->post('body_material_2_front_length'),
            'tbl_dimension_body_material_2_front_length_allowance' => $this->input->post('body_material_2_front_length_allowance'),
            'tbl_dimension_body_material_2_front_length_total' => $this->input->post('body_material_2_front_length_total'),

            'tbl_dimension_body_material_2_front_width' => $this->input->post('body_material_2_front_width'),
            'tbl_dimension_body_material_2_front_width_allowance' => $this->input->post('body_material_2_front_width_allowance'),
            'tbl_dimension_body_material_2_front_width_total' => $this->input->post('body_material_2_front_width_total'),

            'tbl_dimension_body_material_2_back_length' => $this->input->post('body_material_2_back_length'),
            'tbl_dimension_body_material_2_back_length_allowance' => $this->input->post('body_material_2_back_length_allowance'),
            'tbl_dimension_body_material_2_back_length_total' => $this->input->post('body_material_2_back_length_total'),

            'tbl_dimension_body_material_2_back_width' => $this->input->post('body_material_2_back_width'),
            'tbl_dimension_body_material_2_back_width_allowance' => $this->input->post('body_material_2_back_width_allowance'),
            'tbl_dimension_body_material_2_back_width_total' => $this->input->post('body_material_2_back_width_total'),

            'tbl_dimension_body_material_2_top_length' => $this->input->post('body_material_2_top_length'),
            'tbl_dimension_body_material_2_top_length_allowance' => $this->input->post('body_material_2_top_length_allowance'),
            'tbl_dimension_body_material_2_top_length_total' => $this->input->post('body_material_2_top_length_total'),

            'tbl_dimension_body_material_2_top_width' => $this->input->post('body_material_2_top_width'),
            'tbl_dimension_body_material_2_top_width_allowance' => $this->input->post('body_material_2_top_width_allowance'),
            'tbl_dimension_body_material_2_top_width_total' => $this->input->post('body_material_2_top_width_total'),

            'tbl_dimension_body_material_2_bottom_length' => $this->input->post('body_material_2_bottom_length'),
            'tbl_dimension_body_material_2_bottom_length_allowance' => $this->input->post('body_material_2_bottom_length_allowance'),
            'tbl_dimension_body_material_2_bottom_length_total' => $this->input->post('body_material_2_bottom_length_total'),

            'tbl_dimension_body_material_2_bottom_width' => $this->input->post('body_material_2_bottom_width'),
            'tbl_dimension_body_material_2_bottom_width_allowance' => $this->input->post('body_material_2_bottom_width_allowance'),
            'tbl_dimension_body_material_2_bottom_width_total' => $this->input->post('body_material_2_bottom_width_total'),

            'tbl_dimension_body_material_2_left_length' => $this->input->post('body_material_2_left_length'),
            'tbl_dimension_body_material_2_left_length_allowance' => $this->input->post('body_material_2_left_length_allowance'),
            'tbl_dimension_body_material_2_left_length_total' => $this->input->post('body_material_2_left_length_total'),

            'tbl_dimension_body_material_2_left_width' => $this->input->post('body_material_2_left_width'),
            'tbl_dimension_body_material_2_left_width_allowance' => $this->input->post('body_material_2_left_width_allowance'),
            'tbl_dimension_body_material_2_left_width_total' => $this->input->post('body_material_2_left_width_total'),

            'tbl_dimension_body_material_2_right_length' => $this->input->post('body_material_2_right_length'),
            'tbl_dimension_body_material_2_right_length_allowance' => $this->input->post('body_material_2_right_length_allowance'),
            'tbl_dimension_body_material_2_right_length_total' => $this->input->post('body_material_2_right_length_total'),

            'tbl_dimension_body_material_2_right_width' => $this->input->post('body_material_2_right_width'),
            'tbl_dimension_body_material_2_right_width_allowance' => $this->input->post('body_material_2_right_width_allowance'),
            'tbl_dimension_body_material_2_right_width_total' => $this->input->post('body_material_2_right_width_total'),

            'tbl_dimension_body_material_2_pocket_length' => $this->input->post('body_material_2_pocket_length'),
            'tbl_dimension_body_material_2_pocket_length_allowance' => $this->input->post('body_material_2_pocket_length_allowance'),
            'tbl_dimension_body_material_2_pocket_length_total' => $this->input->post('body_material_2_pocket_length_total'),

            'tbl_dimension_body_material_2_pocket_width' => $this->input->post('body_material_2_pocket_width'),
            'tbl_dimension_body_material_2_pocket_width_allowance' => $this->input->post('body_material_2_pocket_width_allowance'),
            'tbl_dimension_body_material_2_pocket_width_total' => $this->input->post('body_material_2_pocket_width_total'),

            'tbl_dimension_body_material_2_extra_1_length' => $this->input->post('body_material_2_extra_1_length'),
            'tbl_dimension_body_material_2_extra_1_length_allowance' => $this->input->post('body_material_2_extra_1_length_allowance'),
            'tbl_dimension_body_material_2_extra_1_length_total' => $this->input->post('body_material_2_extra_1_length_total'),

            'tbl_dimension_body_material_2_extra_1_width' => $this->input->post('body_material_2_extra_1_width'),
            'tbl_dimension_body_material_2_extra_1_width_allowance' => $this->input->post('body_material_2_extra_1_width_allowance'),
            'tbl_dimension_body_material_2_extra_1_width_total' => $this->input->post('body_material_2_extra_1_width_total'),

            'tbl_dimension_body_material_2_extra_2_length' => $this->input->post('body_material_2_extra_2_length'),
            'tbl_dimension_body_material_2_extra_2_length_allowance' => $this->input->post('body_material_2_extra_2_length_allowance'),
            'tbl_dimension_body_material_2_extra_2_length_total' => $this->input->post('body_material_2_extra_2_length_total'),

            'tbl_dimension_body_material_2_extra_2_width' => $this->input->post('body_material_2_extra_2_width'),
            'tbl_dimension_body_material_2_extra_2_width_allowance' => $this->input->post('body_material_2_extra_2_width_allowance'),
            'tbl_dimension_body_material_2_extra_2_width_total' => $this->input->post('body_material_2_extra_2_width_total'),

            'tbl_dimension_body_material_2_extra_3_length' => $this->input->post('body_material_2_extra_3_length'),
            'tbl_dimension_body_material_2_extra_3_length_allowance' => $this->input->post('body_material_2_extra_3_length_allowance'),
            'tbl_dimension_body_material_2_extra_3_length_total' => $this->input->post('body_material_2_extra_3_length_total'),

            'tbl_dimension_body_material_2_extra_3_width' => $this->input->post('body_material_2_extra_3_width'),
            'tbl_dimension_body_material_2_extra_3_width_allowance' => $this->input->post('body_material_2_extra_3_width_allowance'),
            'tbl_dimension_body_material_2_extra_3_width_total' => $this->input->post('body_material_2_extra_3_width_total'),

            //Body Material 3
            'tbl_dimension_body_material_3_front_length' => $this->input->post('body_material_3_front_length'),
            'tbl_dimension_body_material_3_front_length_allowance' => $this->input->post('body_material_3_front_length_allowance'),
            'tbl_dimension_body_material_3_front_length_total' => $this->input->post('body_material_3_front_length_total'),

            'tbl_dimension_body_material_3_front_width' => $this->input->post('body_material_3_front_width'),
            'tbl_dimension_body_material_3_front_width_allowance' => $this->input->post('body_material_3_front_width_allowance'),
            'tbl_dimension_body_material_3_front_width_total' => $this->input->post('body_material_3_front_width_total'),

            'tbl_dimension_body_material_3_back_length' => $this->input->post('body_material_3_back_length'),
            'tbl_dimension_body_material_3_back_length_allowance' => $this->input->post('body_material_3_back_length_allowance'),
            'tbl_dimension_body_material_3_back_length_total' => $this->input->post('body_material_3_back_length_total'),

            'tbl_dimension_body_material_3_back_width' => $this->input->post('body_material_3_back_width'),
            'tbl_dimension_body_material_3_back_width_allowance' => $this->input->post('body_material_3_back_width_allowance'),
            'tbl_dimension_body_material_3_back_width_total' => $this->input->post('body_material_3_back_width_total'),

            'tbl_dimension_body_material_3_top_length' => $this->input->post('body_material_3_top_length'),
            'tbl_dimension_body_material_3_top_length_allowance' => $this->input->post('body_material_3_top_length_allowance'),
            'tbl_dimension_body_material_3_top_length_total' => $this->input->post('body_material_3_top_length_total'),

            'tbl_dimension_body_material_3_top_width' => $this->input->post('body_material_3_top_width'),
            'tbl_dimension_body_material_3_top_width_allowance' => $this->input->post('body_material_3_top_width_allowance'),
            'tbl_dimension_body_material_3_top_width_total' => $this->input->post('body_material_3_top_width_total'),

            'tbl_dimension_body_material_3_bottom_length' => $this->input->post('body_material_3_bottom_length'),
            'tbl_dimension_body_material_3_bottom_length_allowance' => $this->input->post('body_material_3_bottom_length_allowance'),
            'tbl_dimension_body_material_3_bottom_length_total' => $this->input->post('body_material_3_bottom_length_total'),

            'tbl_dimension_body_material_3_bottom_width' => $this->input->post('body_material_3_bottom_width'),
            'tbl_dimension_body_material_3_bottom_width_allowance' => $this->input->post('body_material_3_bottom_width_allowance'),
            'tbl_dimension_body_material_3_bottom_width_total' => $this->input->post('body_material_3_bottom_width_total'),

            'tbl_dimension_body_material_3_left_length' => $this->input->post('body_material_3_left_length'),
            'tbl_dimension_body_material_3_left_length_allowance' => $this->input->post('body_material_3_left_length_allowance'),
            'tbl_dimension_body_material_3_left_length_total' => $this->input->post('body_material_3_left_length_total'),

            'tbl_dimension_body_material_3_left_width' => $this->input->post('body_material_3_left_width'),
            'tbl_dimension_body_material_3_left_width_allowance' => $this->input->post('body_material_3_left_width_allowance'),
            'tbl_dimension_body_material_3_left_width_total' => $this->input->post('body_material_3_left_width_total'),

            'tbl_dimension_body_material_3_right_length' => $this->input->post('body_material_3_right_length'),
            'tbl_dimension_body_material_3_right_length_allowance' => $this->input->post('body_material_3_right_length_allowance'),
            'tbl_dimension_body_material_3_right_length_total' => $this->input->post('body_material_3_right_length_total'),

            'tbl_dimension_body_material_3_right_width' => $this->input->post('body_material_3_right_width'),
            'tbl_dimension_body_material_3_right_width_allowance' => $this->input->post('body_material_3_right_width_allowance'),
            'tbl_dimension_body_material_3_right_width_total' => $this->input->post('body_material_3_right_width_total'),

            'tbl_dimension_body_material_3_pocket_length' => $this->input->post('body_material_3_pocket_length'),
            'tbl_dimension_body_material_3_pocket_length_allowance' => $this->input->post('body_material_3_pocket_length_allowance'),
            'tbl_dimension_body_material_3_pocket_length_total' => $this->input->post('body_material_3_pocket_length_total'),

            'tbl_dimension_body_material_3_pocket_width' => $this->input->post('body_material_3_pocket_width'),
            'tbl_dimension_body_material_3_pocket_width_allowance' => $this->input->post('body_material_3_pocket_width_allowance'),
            'tbl_dimension_body_material_3_pocket_width_total' => $this->input->post('body_material_3_pocket_width_total'),

            'tbl_dimension_body_material_3_extra_1_length' => $this->input->post('body_material_3_extra_1_length'),
            'tbl_dimension_body_material_3_extra_1_length_allowance' => $this->input->post('body_material_3_extra_1_length_allowance'),
            'tbl_dimension_body_material_3_extra_1_length_total' => $this->input->post('body_material_3_extra_1_length_total'),

            'tbl_dimension_body_material_3_extra_1_width' => $this->input->post('body_material_3_extra_1_width'),
            'tbl_dimension_body_material_3_extra_1_width_allowance' => $this->input->post('body_material_3_extra_1_width_allowance'),
            'tbl_dimension_body_material_3_extra_1_width_total' => $this->input->post('body_material_3_extra_1_width_total'),

            'tbl_dimension_body_material_3_extra_2_length' => $this->input->post('body_material_3_extra_2_length'),
            'tbl_dimension_body_material_3_extra_2_length_allowance' => $this->input->post('body_material_3_extra_2_length_allowance'),
            'tbl_dimension_body_material_3_extra_2_length_total' => $this->input->post('body_material_3_extra_2_length_total'),

            'tbl_dimension_body_material_3_extra_2_width' => $this->input->post('body_material_3_extra_2_width'),
            'tbl_dimension_body_material_3_extra_2_width_allowance' => $this->input->post('body_material_3_extra_2_width_allowance'),
            'tbl_dimension_body_material_3_extra_2_width_total' => $this->input->post('body_material_3_extra_2_width_total'),

            'tbl_dimension_body_material_3_extra_3_length' => $this->input->post('body_material_3_extra_3_length'),
            'tbl_dimension_body_material_3_extra_3_length_allowance' => $this->input->post('body_material_3_extra_3_length_allowance'),
            'tbl_dimension_body_material_3_extra_3_length_total' => $this->input->post('body_material_3_extra_3_length_total'),

            'tbl_dimension_body_material_3_extra_3_width' => $this->input->post('body_material_3_extra_3_width'),
            'tbl_dimension_body_material_3_extra_3_width_allowance' => $this->input->post('body_material_3_extra_3_width_allowance'),
            'tbl_dimension_body_material_3_extra_3_width_total' => $this->input->post('body_material_3_extra_3_width_total'),


            //Body Material 4
            'tbl_dimension_body_material_4_front_length' => $this->input->post('body_material_4_front_length'),
            'tbl_dimension_body_material_4_front_length_allowance' => $this->input->post('body_material_4_front_length_allowance'),
            'tbl_dimension_body_material_4_front_length_total' => $this->input->post('body_material_4_front_length_total'),

            'tbl_dimension_body_material_4_front_width' => $this->input->post('body_material_4_front_width'),
            'tbl_dimension_body_material_4_front_width_allowance' => $this->input->post('body_material_4_front_width_allowance'),
            'tbl_dimension_body_material_4_front_width_total' => $this->input->post('body_material_4_front_width_total'),

            'tbl_dimension_body_material_4_back_length' => $this->input->post('body_material_4_back_length'),
            'tbl_dimension_body_material_4_back_length_allowance' => $this->input->post('body_material_4_back_length_allowance'),
            'tbl_dimension_body_material_4_back_length_total' => $this->input->post('body_material_4_back_length_total'),

            'tbl_dimension_body_material_4_back_width' => $this->input->post('body_material_4_back_width'),
            'tbl_dimension_body_material_4_back_width_allowance' => $this->input->post('body_material_4_back_width_allowance'),
            'tbl_dimension_body_material_4_back_width_total' => $this->input->post('body_material_4_back_width_total'),

            'tbl_dimension_body_material_4_top_length' => $this->input->post('body_material_4_top_length'),
            'tbl_dimension_body_material_4_top_length_allowance' => $this->input->post('body_material_4_top_length_allowance'),
            'tbl_dimension_body_material_4_top_length_total' => $this->input->post('body_material_4_top_length_total'),

            'tbl_dimension_body_material_4_top_width' => $this->input->post('body_material_4_top_width'),
            'tbl_dimension_body_material_4_top_width_allowance' => $this->input->post('body_material_4_top_width_allowance'),
            'tbl_dimension_body_material_4_top_width_total' => $this->input->post('body_material_4_top_width_total'),

            'tbl_dimension_body_material_4_bottom_length' => $this->input->post('body_material_4_bottom_length'),
            'tbl_dimension_body_material_4_bottom_length_allowance' => $this->input->post('body_material_4_bottom_length_allowance'),
            'tbl_dimension_body_material_4_bottom_length_total' => $this->input->post('body_material_4_bottom_length_total'),

            'tbl_dimension_body_material_4_bottom_width' => $this->input->post('body_material_4_bottom_width'),
            'tbl_dimension_body_material_4_bottom_width_allowance' => $this->input->post('body_material_4_bottom_width_allowance'),
            'tbl_dimension_body_material_4_bottom_width_total' => $this->input->post('body_material_4_bottom_width_total'),

            'tbl_dimension_body_material_4_left_length' => $this->input->post('body_material_4_left_length'),
            'tbl_dimension_body_material_4_left_length_allowance' => $this->input->post('body_material_4_left_length_allowance'),
            'tbl_dimension_body_material_4_left_length_total' => $this->input->post('body_material_4_left_length_total'),

            'tbl_dimension_body_material_4_left_width' => $this->input->post('body_material_4_left_width'),
            'tbl_dimension_body_material_4_left_width_allowance' => $this->input->post('body_material_4_left_width_allowance'),
            'tbl_dimension_body_material_4_left_width_total' => $this->input->post('body_material_4_left_width_total'),

            'tbl_dimension_body_material_4_right_length' => $this->input->post('body_material_4_right_length'),
            'tbl_dimension_body_material_4_right_length_allowance' => $this->input->post('body_material_4_right_length_allowance'),
            'tbl_dimension_body_material_4_right_length_total' => $this->input->post('body_material_4_right_length_total'),

            'tbl_dimension_body_material_4_right_width' => $this->input->post('body_material_4_right_width'),
            'tbl_dimension_body_material_4_right_width_allowance' => $this->input->post('body_material_4_right_width_allowance'),
            'tbl_dimension_body_material_4_right_width_total' => $this->input->post('body_material_4_right_width_total'),

            'tbl_dimension_body_material_4_pocket_length' => $this->input->post('body_material_4_pocket_length'),
            'tbl_dimension_body_material_4_pocket_length_allowance' => $this->input->post('body_material_4_pocket_length_allowance'),
            'tbl_dimension_body_material_4_pocket_length_total' => $this->input->post('body_material_4_pocket_length_total'),

            'tbl_dimension_body_material_4_pocket_width' => $this->input->post('body_material_4_pocket_width'),
            'tbl_dimension_body_material_4_pocket_width_allowance' => $this->input->post('body_material_4_pocket_width_allowance'),
            'tbl_dimension_body_material_4_pocket_width_total' => $this->input->post('body_material_4_pocket_width_total'),

            'tbl_dimension_body_material_4_extra_1_length' => $this->input->post('body_material_4_extra_1_length'),
            'tbl_dimension_body_material_4_extra_1_length_allowance' => $this->input->post('body_material_4_extra_1_length_allowance'),
            'tbl_dimension_body_material_4_extra_1_length_total' => $this->input->post('body_material_4_extra_1_length_total'),

            'tbl_dimension_body_material_4_extra_1_width' => $this->input->post('body_material_4_extra_1_width'),
            'tbl_dimension_body_material_4_extra_1_width_allowance' => $this->input->post('body_material_4_extra_1_width_allowance'),
            'tbl_dimension_body_material_4_extra_1_width_total' => $this->input->post('body_material_4_extra_1_width_total'),

            'tbl_dimension_body_material_4_extra_2_length' => $this->input->post('body_material_4_extra_2_length'),
            'tbl_dimension_body_material_4_extra_2_length_allowance' => $this->input->post('body_material_4_extra_2_length_allowance'),
            'tbl_dimension_body_material_4_extra_2_length_total' => $this->input->post('body_material_4_extra_2_length_total'),

            'tbl_dimension_body_material_4_extra_2_width' => $this->input->post('body_material_4_extra_2_width'),
            'tbl_dimension_body_material_4_extra_2_width_allowance' => $this->input->post('body_material_4_extra_2_width_allowance'),
            'tbl_dimension_body_material_4_extra_2_width_total' => $this->input->post('body_material_4_extra_2_width_total'),

            'tbl_dimension_body_material_4_extra_3_length' => $this->input->post('body_material_4_extra_3_length'),
            'tbl_dimension_body_material_4_extra_3_length_allowance' => $this->input->post('body_material_4_extra_3_length_allowance'),
            'tbl_dimension_body_material_4_extra_3_length_total' => $this->input->post('body_material_4_extra_3_length_total'),

            'tbl_dimension_body_material_4_extra_3_width' => $this->input->post('body_material_4_extra_3_width'),
            'tbl_dimension_body_material_4_extra_3_width_allowance' => $this->input->post('body_material_4_extra_3_width_allowance'),
            'tbl_dimension_body_material_4_extra_3_width_total' => $this->input->post('body_material_4_extra_3_width_total'),

            //Body Material 5
            'tbl_dimension_body_material_5_front_length' => $this->input->post('body_material_5_front_length'),
            'tbl_dimension_body_material_5_front_length_allowance' => $this->input->post('body_material_5_front_length_allowance'),
            'tbl_dimension_body_material_5_front_length_total' => $this->input->post('body_material_5_front_length_total'),

            'tbl_dimension_body_material_5_front_width' => $this->input->post('body_material_5_front_width'),
            'tbl_dimension_body_material_5_front_width_allowance' => $this->input->post('body_material_5_front_width_allowance'),
            'tbl_dimension_body_material_5_front_width_total' => $this->input->post('body_material_5_front_width_total'),

            'tbl_dimension_body_material_5_back_length' => $this->input->post('body_material_5_back_length'),
            'tbl_dimension_body_material_5_back_length_allowance' => $this->input->post('body_material_5_back_length_allowance'),
            'tbl_dimension_body_material_5_back_length_total' => $this->input->post('body_material_5_back_length_total'),

            'tbl_dimension_body_material_5_back_width' => $this->input->post('body_material_5_back_width'),
            'tbl_dimension_body_material_5_back_width_allowance' => $this->input->post('body_material_5_back_width_allowance'),
            'tbl_dimension_body_material_5_back_width_total' => $this->input->post('body_material_5_back_width_total'),

            'tbl_dimension_body_material_5_top_length' => $this->input->post('body_material_5_top_length'),
            'tbl_dimension_body_material_5_top_length_allowance' => $this->input->post('body_material_5_top_length_allowance'),
            'tbl_dimension_body_material_5_top_length_total' => $this->input->post('body_material_5_top_length_total'),

            'tbl_dimension_body_material_5_top_width' => $this->input->post('body_material_5_top_width'),
            'tbl_dimension_body_material_5_top_width_allowance' => $this->input->post('body_material_5_top_width_allowance'),
            'tbl_dimension_body_material_5_top_width_total' => $this->input->post('body_material_5_top_width_total'),

            'tbl_dimension_body_material_5_bottom_length' => $this->input->post('body_material_5_bottom_length'),
            'tbl_dimension_body_material_5_bottom_length_allowance' => $this->input->post('body_material_5_bottom_length_allowance'),
            'tbl_dimension_body_material_5_bottom_length_total' => $this->input->post('body_material_5_bottom_length_total'),

            'tbl_dimension_body_material_5_bottom_width' => $this->input->post('body_material_5_bottom_width'),
            'tbl_dimension_body_material_5_bottom_width_allowance' => $this->input->post('body_material_5_bottom_width_allowance'),
            'tbl_dimension_body_material_5_bottom_width_total' => $this->input->post('body_material_5_bottom_width_total'),

            'tbl_dimension_body_material_5_left_length' => $this->input->post('body_material_5_left_length'),
            'tbl_dimension_body_material_5_left_length_allowance' => $this->input->post('body_material_5_left_length_allowance'),
            'tbl_dimension_body_material_5_left_length_total' => $this->input->post('body_material_5_left_length_total'),

            'tbl_dimension_body_material_5_left_width' => $this->input->post('body_material_5_left_width'),
            'tbl_dimension_body_material_5_left_width_allowance' => $this->input->post('body_material_5_left_width_allowance'),
            'tbl_dimension_body_material_5_left_width_total' => $this->input->post('body_material_5_left_width_total'),

            'tbl_dimension_body_material_5_right_length' => $this->input->post('body_material_5_right_length'),
            'tbl_dimension_body_material_5_right_length_allowance' => $this->input->post('body_material_5_right_length_allowance'),
            'tbl_dimension_body_material_5_right_length_total' => $this->input->post('body_material_5_right_length_total'),

            'tbl_dimension_body_material_5_right_width' => $this->input->post('body_material_5_right_width'),
            'tbl_dimension_body_material_5_right_width_allowance' => $this->input->post('body_material_5_right_width_allowance'),
            'tbl_dimension_body_material_5_right_width_total' => $this->input->post('body_material_5_right_width_total'),

            'tbl_dimension_body_material_5_pocket_length' => $this->input->post('body_material_5_pocket_length'),
            'tbl_dimension_body_material_5_pocket_length_allowance' => $this->input->post('body_material_5_pocket_length_allowance'),
            'tbl_dimension_body_material_5_pocket_length_total' => $this->input->post('body_material_5_pocket_length_total'),

            'tbl_dimension_body_material_5_pocket_width' => $this->input->post('body_material_5_pocket_width'),
            'tbl_dimension_body_material_5_pocket_width_allowance' => $this->input->post('body_material_5_pocket_width_allowance'),
            'tbl_dimension_body_material_5_pocket_width_total' => $this->input->post('body_material_5_pocket_width_total'),

            'tbl_dimension_body_material_5_extra_1_length' => $this->input->post('body_material_5_extra_1_length'),
            'tbl_dimension_body_material_5_extra_1_length_allowance' => $this->input->post('body_material_5_extra_1_length_allowance'),
            'tbl_dimension_body_material_5_extra_1_length_total' => $this->input->post('body_material_5_extra_1_length_total'),

            'tbl_dimension_body_material_5_extra_1_width' => $this->input->post('body_material_5_extra_1_width'),
            'tbl_dimension_body_material_5_extra_1_width_allowance' => $this->input->post('body_material_5_extra_1_width_allowance'),
            'tbl_dimension_body_material_5_extra_1_width_total' => $this->input->post('body_material_5_extra_1_width_total'),

            'tbl_dimension_body_material_5_extra_2_length' => $this->input->post('body_material_5_extra_2_length'),
            'tbl_dimension_body_material_5_extra_2_length_allowance' => $this->input->post('body_material_5_extra_2_length_allowance'),
            'tbl_dimension_body_material_5_extra_2_length_total' => $this->input->post('body_material_5_extra_2_length_total'),

            'tbl_dimension_body_material_5_extra_2_width' => $this->input->post('body_material_5_extra_2_width'),
            'tbl_dimension_body_material_5_extra_2_width_allowance' => $this->input->post('body_material_5_extra_2_width_allowance'),
            'tbl_dimension_body_material_5_extra_2_width_total' => $this->input->post('body_material_5_extra_2_width_total'),

            'tbl_dimension_body_material_5_extra_3_length' => $this->input->post('body_material_5_extra_3_length'),
            'tbl_dimension_body_material_5_extra_3_length_allowance' => $this->input->post('body_material_5_extra_3_length_allowance'),
            'tbl_dimension_body_material_5_extra_3_length_total' => $this->input->post('body_material_5_extra_3_length_total'),

            'tbl_dimension_body_material_5_extra_3_width' => $this->input->post('body_material_5_extra_3_width'),
            'tbl_dimension_body_material_5_extra_3_width_allowance' => $this->input->post('body_material_5_extra_3_width_allowance'),
            'tbl_dimension_body_material_5_extra_3_width_total' => $this->input->post('body_material_5_extra_3_width_total'),

            //Body Material 6
            'tbl_dimension_body_material_6_front_length' => $this->input->post('body_material_6_front_length'),
            'tbl_dimension_body_material_6_front_length_allowance' => $this->input->post('body_material_6_front_length_allowance'),
            'tbl_dimension_body_material_6_front_length_total' => $this->input->post('body_material_6_front_length_total'),

            'tbl_dimension_body_material_6_front_width' => $this->input->post('body_material_6_front_width'),
            'tbl_dimension_body_material_6_front_width_allowance' => $this->input->post('body_material_6_front_width_allowance'),
            'tbl_dimension_body_material_6_front_width_total' => $this->input->post('body_material_6_front_width_total'),

            'tbl_dimension_body_material_6_back_length' => $this->input->post('body_material_6_back_length'),
            'tbl_dimension_body_material_6_back_length_allowance' => $this->input->post('body_material_6_back_length_allowance'),
            'tbl_dimension_body_material_6_back_length_total' => $this->input->post('body_material_6_back_length_total'),

            'tbl_dimension_body_material_6_back_width' => $this->input->post('body_material_6_back_width'),
            'tbl_dimension_body_material_6_back_width_allowance' => $this->input->post('body_material_6_back_width_allowance'),
            'tbl_dimension_body_material_6_back_width_total' => $this->input->post('body_material_6_back_width_total'),

            'tbl_dimension_body_material_6_top_length' => $this->input->post('body_material_6_top_length'),
            'tbl_dimension_body_material_6_top_length_allowance' => $this->input->post('body_material_6_top_length_allowance'),
            'tbl_dimension_body_material_6_top_length_total' => $this->input->post('body_material_6_top_length_total'),

            'tbl_dimension_body_material_6_top_width' => $this->input->post('body_material_6_top_width'),
            'tbl_dimension_body_material_6_top_width_allowance' => $this->input->post('body_material_6_top_width_allowance'),
            'tbl_dimension_body_material_6_top_width_total' => $this->input->post('body_material_6_top_width_total'),

            'tbl_dimension_body_material_6_bottom_length' => $this->input->post('body_material_6_bottom_length'),
            'tbl_dimension_body_material_6_bottom_length_allowance' => $this->input->post('body_material_6_bottom_length_allowance'),
            'tbl_dimension_body_material_6_bottom_length_total' => $this->input->post('body_material_6_bottom_length_total'),

            'tbl_dimension_body_material_6_bottom_width' => $this->input->post('body_material_6_bottom_width'),
            'tbl_dimension_body_material_6_bottom_width_allowance' => $this->input->post('body_material_6_bottom_width_allowance'),
            'tbl_dimension_body_material_6_bottom_width_total' => $this->input->post('body_material_6_bottom_width_total'),

            'tbl_dimension_body_material_6_left_length' => $this->input->post('body_material_6_left_length'),
            'tbl_dimension_body_material_6_left_length_allowance' => $this->input->post('body_material_6_left_length_allowance'),
            'tbl_dimension_body_material_6_left_length_total' => $this->input->post('body_material_6_left_length_total'),

            'tbl_dimension_body_material_6_left_width' => $this->input->post('body_material_6_left_width'),
            'tbl_dimension_body_material_6_left_width_allowance' => $this->input->post('body_material_6_left_width_allowance'),
            'tbl_dimension_body_material_6_left_width_total' => $this->input->post('body_material_6_left_width_total'),

            'tbl_dimension_body_material_6_right_length' => $this->input->post('body_material_6_right_length'),
            'tbl_dimension_body_material_6_right_length_allowance' => $this->input->post('body_material_6_right_length_allowance'),
            'tbl_dimension_body_material_6_right_length_total' => $this->input->post('body_material_6_right_length_total'),

            'tbl_dimension_body_material_6_right_width' => $this->input->post('body_material_6_right_width'),
            'tbl_dimension_body_material_6_right_width_allowance' => $this->input->post('body_material_6_right_width_allowance'),
            'tbl_dimension_body_material_6_right_width_total' => $this->input->post('body_material_6_right_width_total'),

            'tbl_dimension_body_material_6_pocket_length' => $this->input->post('body_material_6_pocket_length'),
            'tbl_dimension_body_material_6_pocket_length_allowance' => $this->input->post('body_material_6_pocket_length_allowance'),
            'tbl_dimension_body_material_6_pocket_length_total' => $this->input->post('body_material_6_pocket_length_total'),

            'tbl_dimension_body_material_6_pocket_width' => $this->input->post('body_material_6_pocket_width'),
            'tbl_dimension_body_material_6_pocket_width_allowance' => $this->input->post('body_material_6_pocket_width_allowance'),
            'tbl_dimension_body_material_6_pocket_width_total' => $this->input->post('body_material_6_pocket_width_total'),

            'tbl_dimension_body_material_6_extra_1_length' => $this->input->post('body_material_6_extra_1_length'),
            'tbl_dimension_body_material_6_extra_1_length_allowance' => $this->input->post('body_material_6_extra_1_length_allowance'),
            'tbl_dimension_body_material_6_extra_1_length_total' => $this->input->post('body_material_6_extra_1_length_total'),

            'tbl_dimension_body_material_6_extra_1_width' => $this->input->post('body_material_6_extra_1_width'),
            'tbl_dimension_body_material_6_extra_1_width_allowance' => $this->input->post('body_material_6_extra_1_width_allowance'),
            'tbl_dimension_body_material_6_extra_1_width_total' => $this->input->post('body_material_6_extra_1_width_total'),

            'tbl_dimension_body_material_6_extra_2_length' => $this->input->post('body_material_6_extra_2_length'),
            'tbl_dimension_body_material_6_extra_2_length_allowance' => $this->input->post('body_material_6_extra_2_length_allowance'),
            'tbl_dimension_body_material_6_extra_2_length_total' => $this->input->post('body_material_6_extra_2_length_total'),

            'tbl_dimension_body_material_6_extra_2_width' => $this->input->post('body_material_6_extra_2_width'),
            'tbl_dimension_body_material_6_extra_2_width_allowance' => $this->input->post('body_material_6_extra_2_width_allowance'),
            'tbl_dimension_body_material_6_extra_2_width_total' => $this->input->post('body_material_6_extra_2_width_total'),

            'tbl_dimension_body_material_6_extra_3_length' => $this->input->post('body_material_6_extra_3_length'),
            'tbl_dimension_body_material_6_extra_3_length_allowance' => $this->input->post('body_material_6_extra_3_length_allowance'),
            'tbl_dimension_body_material_6_extra_3_length_total' => $this->input->post('body_material_6_extra_3_length_total'),

            'tbl_dimension_body_material_6_extra_3_width' => $this->input->post('body_material_6_extra_3_width'),
            'tbl_dimension_body_material_6_extra_3_width_allowance' => $this->input->post('body_material_6_extra_3_width_allowance'),
            'tbl_dimension_body_material_6_extra_3_width_total' => $this->input->post('body_material_6_extra_3_width_total'),

        );
        $this->db->insert('woven_dimension_rev',$woven_dimension_rev_data);
        $inserted_dimension_rev_id = $this->db->insert_id();

        $woven_data_rev = array(
            'tbl_woven_order_id' => $this->input->post('woven-id'),
            'tbl_woven_dimension_id' => $inserted_dimension_rev_id,
            'tbl_woven_id_name' => $this->input->post('order_id'),
            'tbl_woven_company_name' => $this->input->post('order_company'),
            'tbl_woven_order_date' => $this->input->post('order_date'),
            'tbl_woven_item_name' => $this->input->post('order_item_name'),
            'tbl_woven_ref_name' => $this->input->post('order_ref_no'),

            // 'tbl_woven_order_gsm' => $this->input->post('woven_order_gsm'),
            //'tbl_woven_order_color' => $this->input->post('woven_order_color'),
            'tbl_woven_order_usd' => $this->input->post('order_usd'),

            'tbl_woven_order_wastage' => $this->input->post('order_wastage'),
            'tbl_woven_order_margin' => $this->input->post('order_margin'),

            'tbl_woven_order_quantity' => $this->input->post('order_quantity'),
            'tbl_woven_order_transport' => $this->input->post('order_transport'),
            'tbl_woven_order_bank_doc_charge' => $this->input->post('order_bank_document'),

            'tbl_order_sewing' => $this->input->post('order_sewing'),
            'tbl_order_overheads' => $this->input->post('order_overheads'),

            'tbl_order_total_material_inc_wastage' => $this->input->post('order_total_material_inc_wastage'),
            'tbl_order_total_overhead_and_other_cost' => $this->input->post('total_overhead_and_other_hidden'),
            'tbl_total_cost' => $this->input->post('total_cost_hidden'),
            'tbl_total_price' => $this->input->post('final_price_hidden'),

            //Body Material Name
            'tbl_woven_body_material_1_name' => $this->input->post('body_material_1_name'),
            'tbl_woven_body_material_2_name' => $this->input->post('body_material_2_name'),
            'tbl_woven_body_material_3_name' => $this->input->post('body_material_3_name'),
            'tbl_woven_body_material_4_name' => $this->input->post('body_material_4_name'),
            'tbl_woven_body_material_5_name' => $this->input->post('body_material_5_name'),
            'tbl_woven_body_material_6_name' => $this->input->post('body_material_6_name'),

            //Body Material Name
            'tbl_woven_body_material_1_roll_width' => $this->input->post('body_material_1_roll_1'),
            'tbl_woven_body_material_2_roll_width' => $this->input->post('body_material_2_roll_2'),
            'tbl_woven_body_material_3_roll_width' => $this->input->post('body_material_3_roll_3'),
            'tbl_woven_body_material_4_roll_width' => $this->input->post('body_material_4_roll_4'),
            'tbl_woven_body_material_5_roll_width' => $this->input->post('body_material_5_roll_5'),
            'tbl_woven_body_material_6_roll_width' => $this->input->post('body_material_6_roll_6'),

            //Body Material 1 consumption cost
            'tbl_woven_body_material_1_cost' => $this->input->post('body_material_1_cost'),
            'tbl_woven_body_material_1_consumption' => $this->input->post('body_material_1_consumption'),
            'tbl_woven_body_material_1_rate' => $this->input->post('body_material_1_consumption_rate'),
            'tbl_woven_body_material_1_total_cost' => $this->input->post('body_material_1_consumption_cost'),

            //Body Material 2 consumption cost
            'tbl_woven_body_material_2_cost' => $this->input->post('body_material_2_cost'),
            'tbl_woven_body_material_2_consumption' => $this->input->post('body_material_2_consumption'),
            'tbl_woven_body_material_2_rate' => $this->input->post('body_material_2_consumption_rate'),
            'tbl_woven_body_material_2_total_cost' => $this->input->post('body_material_2_consumption_cost'),

            //Body Material 3 consumption cost
            'tbl_woven_body_material_3_cost' => $this->input->post('body_material_3_cost'),
            'tbl_woven_body_material_3_consumption' => $this->input->post('body_material_3_consumption'),
            'tbl_woven_body_material_3_rate' => $this->input->post('body_material_3_consumption_rate'),
            'tbl_woven_body_material_3_total_cost' => $this->input->post('body_material_3_consumption_cost'),

            //Body Material 4 consumption cost
            'tbl_woven_body_material_4_cost' => $this->input->post('body_material_4_cost'),
            'tbl_woven_body_material_4_consumption' => $this->input->post('body_material_4_consumption'),
            'tbl_woven_body_material_4_rate' => $this->input->post('body_material_4_consumption_rate'),
            'tbl_woven_body_material_4_total_cost' => $this->input->post('body_material_4_consumption_cost'),

            //Body Material 5 consumption cost
            'tbl_woven_body_material_5_cost' => $this->input->post('body_material_5_cost'),
            'tbl_woven_body_material_5_consumption' => $this->input->post('body_material_5_consumption'),
            'tbl_woven_body_material_5_rate' => $this->input->post('body_material_5_consumption_rate'),
            'tbl_woven_body_material_5_total_cost' => $this->input->post('body_material_5_consumption_cost'),

            //Body Material 6 consumption cost
            'tbl_woven_body_material_6_cost' => $this->input->post('body_material_6_cost'),
            'tbl_woven_body_material_6_consumption' => $this->input->post('body_material_6_consumption'),
            'tbl_woven_body_material_6_rate' => $this->input->post('body_material_6_consumption_rate'),
            'tbl_woven_body_material_6_total_cost' => $this->input->post('body_material_6_consumption_cost'),

            'tbl_woven_trims_yard_zipper_item_cost' => $this->input->post('zipper_cost'),
            'tbl_woven_trims_yard_zipper_item_consumption' => $this->input->post('zipper_consumption'),
            'tbl_woven_trims_yard_zipper_item_rate' => $this->input->post('zipper_consumption_rate'),
            'tbl_woven_trims_yard_zipper_item_total_cost' => $this->input->post('zipper_consumption_cost'),

            'tbl_woven_trims_yard_two_inch_webbing_item_cost' => $this->input->post('two_inch_webbing_cost'),
            'tbl_woven_trims_yard_two_inch_webbing_item_consumption' => $this->input->post('two_inch_webbing_consumption'),
            'tbl_woven_trims_yard_two_inch_webbing_item_rate' => $this->input->post('two_inch_webbing_consumption_rate'),
            'tbl_woven_trims_yard_two_inch_webbing_item_total_cost' => $this->input->post('two_inch_webbing_consumption_cost'),

            'tbl_woven_trims_yard_one_and_half_inch_webbing_item_cost' => $this->input->post('one_and_half_inch_webbing_cost'),
            'tbl_woven_trims_yard_one_and_half_webbing_item_consumption' => $this->input->post('one_and_half_inch_webbing_consumption'),
            'tbl_woven_trims_yard_one_and_half_webbing_item_rate' => $this->input->post('one_and_half_inch_webbing_consumption_rate'),
            'tbl_woven_trims_yard_one_and_half_webbing_item_total_cost' => $this->input->post('one_and_half_inch_webbing_consumption_cost'),

            'tbl_woven_trims_yard_velcro_item_cost' => $this->input->post('velcro_cost'),
            'tbl_woven_trims_yard_velcro_item_consumption' => $this->input->post('velcro_consumption'),
            'tbl_woven_trims_yard_velcro_item_rate' => $this->input->post('velcro_consumption_rate'),
            'tbl_woven_trims_yard_velcro_item_total_cost' => $this->input->post('velcro_consumption_cost'),

            'tbl_woven_trims_yard_extra_1_name' => $this->input->post('extra_trim_yard_extra_1_name'),
            'tbl_woven_trims_yard_extra_2_name' => $this->input->post('extra_trim_yard_extra_2_name'),
            'tbl_woven_trims_yard_extra_3_name' => $this->input->post('extra_trim_yard_extra_3_name'),


            'tbl_woven_trims_yard_extra_1_item_cost' => $this->input->post('extra_trim_yard_1_cost'),
            'tbl_woven_trims_yard_extra_1_item_consumption' => $this->input->post('extra_trim_yard_1_consumption'),
            'tbl_woven_trims_yard_extra_1_item_rate' => $this->input->post('extra_trim_yard_1_consumption_rate'),
            'tbl_woven_trims_yard_extra_1_item_total_cost' => $this->input->post('extra_trim_yard_1_consumption_cost'),

            'tbl_woven_trims_yard_extra_2_item_cost' => $this->input->post('extra_trim_yard_2_cost'),
            'tbl_woven_trims_yard_extra_2_item_consumption' => $this->input->post('extra_trim_yard_2_consumption'),
            'tbl_woven_trims_yard_extra_2_item_rate' => $this->input->post('extra_trim_yard_2_consumption_rate'),
            'tbl_woven_trims_yard_extra_2_item_total_cost' => $this->input->post('extra_trim_yard_2_consumption_cost'),

            'tbl_woven_trims_yard_extra_3_item_cost' => $this->input->post('extra_trim_yard_3_cost'),
            'tbl_woven_trims_yard_extra_3_item_consumption' => $this->input->post('extra_trim_yard_3_consumption'),
            'tbl_woven_trims_yard_extra_3_item_rate' => $this->input->post('extra_trim_yard_3_consumption_rate'),
            'tbl_woven_trims_yard_extra_3_item_total_cost' => $this->input->post('extra_trim_yard_3_consumption_cost'),

            'tbl_woven_trims_piece_puller_item_cost' => $this->input->post('puller_cost'),
            'tbl_woven_trims_piece_puller_item_consumption' => $this->input->post('puller_consumption'),
            'tbl_woven_trims_piece_puller_item_rate' => $this->input->post('puller_consumption_rate'),
            'tbl_woven_trims_piece_puller_item_total_cost' => $this->input->post('puller_consumption_cost'),

            'tbl_woven_trims_piece_print_item_cost' => $this->input->post('print_cost'),
            'tbl_woven_trims_piece_print_item_consumption' => $this->input->post('print_consumption'),
            'tbl_woven_trims_piece_print_item_rate' => $this->input->post('print_consumption_rate'),
            'tbl_woven_trims_piece_print_item_total_cost' => $this->input->post('print_consumption_cost'),

            'tbl_woven_trims_piece_d_buckle_item_cost' => $this->input->post('buckle_cost'),
            'tbl_woven_trims_piece_d_buckle_item_consumption' => $this->input->post('buckle_consumption'),
            'tbl_woven_trims_piece_d_buckle_item_rate' => $this->input->post('buckle_consumption_rate'),
            'tbl_woven_trims_piece_d_buckle_item_total_cost' => $this->input->post('buckle_consumption_cost'),

            'tbl_woven_trims_piece_swivel_hook_item_cost' => $this->input->post('swivel_hook_cost'),
            'tbl_woven_trims_piece_swivel_hook_item_consumption' => $this->input->post('swivel_hook_consumption'),
            'tbl_woven_trims_piece_swivel_hook_item_rate' => $this->input->post('swivel_hook_consumption_rate'),
            'tbl_woven_trims_piece_swivel_hook_item_total_cost' => $this->input->post('swivel_hook_consumption_cost'),

            'tbl_woven_trims_piece_adjustable_bukle_item_cost' => $this->input->post('adjustable_buckle_cost'),
            'tbl_woven_trims_piece_adjustable_bukle_item_consumption' => $this->input->post('adjustable_buckle_consumption'),
            'tbl_woven_trims_piece_adjustable_bukle_item_rate' => $this->input->post('adjustable_buckle_consumption_rate'),
            'tbl_woven_trims_piece_adjustable_bukle_item_total_cost' => $this->input->post('adjustable_buckle_consumption_cost'),

            'tbl_woven_trims_piece_magnetic_button_item_cost' => $this->input->post('magnetic_button_cost'),
            'tbl_woven_trims_piece_magnetic_button_item_consumption' => $this->input->post('magnetic_button_consumption'),
            'tbl_woven_trims_piece_magnetic_button_item_rate' => $this->input->post('magnetic_button_consumption_rate'),
            'tbl_woven_trims_piece_magnetic_button_item_total_cost' => $this->input->post('magnetic_button_consumption_cost'),

            'tbl_woven_trims_piece_snap_button_item_cost' => $this->input->post('snap_button_cost'),
            'tbl_woven_trims_piece_snap_button_item_consumption' => $this->input->post('snap_button_consumption'),
            'tbl_woven_trims_piece_snap_button_item_rate' => $this->input->post('snap_button_consumption_rate'),
            'tbl_woven_trims_piece_snap_button_item_total_cost' => $this->input->post('snap_button_consumption_cost'),

            'tbl_woven_trims_piece_rivet_item_cost' => $this->input->post('rivet_cost'),
            'tbl_woven_trims_piece_rivet_item_consumption' => $this->input->post('rivet_consumption'),
            'tbl_woven_trims_piece_rivet_item_rate' => $this->input->post('rivet_consumption_rate'),
            'tbl_woven_trims_piece_rivet_item_total_cost' => $this->input->post('rivet_consumption_cost'),

            'tbl_woven_trims_piece_bottom_base_item_cost' => $this->input->post('bottom_base_cost'),
            'tbl_woven_trims_piece_bottom_base_item_consumption' => $this->input->post('bottom_base_consumption'),
            'tbl_woven_trims_piece_bottom_base_item_rate' => $this->input->post('bottom_base_consumption_rate'),
            'tbl_woven_trims_piece_bottom_base_item_total_cost' => $this->input->post('bottom_base_consumption_cost'),

            'tbl_woven_trims_piece_thread_item_cost' => $this->input->post('thread_cost'),
            'tbl_woven_trims_piece_thread_item_consumption' => $this->input->post('thread_consumption'),
            'tbl_woven_trims_piece_thread_item_rate' => $this->input->post('thread_consumption_rate'),
            'tbl_woven_trims_piece_thread_item_total_cost' => $this->input->post('thread_consumption_cost'),

            'tbl_woven_trims_piece_tag_item_cost' => $this->input->post('tag_cost'),
            'tbl_woven_trims_piece_tag_item_consumption' => $this->input->post('tag_consumption'),
            'tbl_woven_trims_piece_tag_item_rate' => $this->input->post('tag_consumption_rate'),
            'tbl_woven_trims_piece_tag_item_total_cost' => $this->input->post('tag_consumption_cost'),

            'tbl_woven_trims_piece_label_item_cost' => $this->input->post('label_cost'),
            'tbl_woven_trims_piece_label_item_consumption' => $this->input->post('label_consumption'),
            'tbl_woven_trims_piece_label_item_rate' => $this->input->post('label_consumption_rate'),
            'tbl_woven_trims_piece_label_item_total_cost' => $this->input->post('label_consumption_cost'),

            'tbl_woven_trims_piece_packing_item_cost' => $this->input->post('packing_cost'),
            'tbl_woven_trims_piece_packing_item_consumption' => $this->input->post('packing_consumption'),
            'tbl_woven_trims_piece_packing_item_rate' => $this->input->post('packing_consumption_rate'),
            'tbl_woven_trims_piece_packing_item_total_cost' => $this->input->post('packing_consumption_cost'),

            'tbl_woven_trims_piece_bottom_shoe_item_cost' => $this->input->post('bottom_shoe_cost'),
            'tbl_woven_trims_piece_bottom_shoe_item_consumption' => $this->input->post('bottom_shoe_consumption'),
            'tbl_woven_trims_piece_bottom_shoe_item_rate' => $this->input->post('bottom_shoe_consumption_rate'),
            'tbl_woven_trims_piece_bottom_shoe_item_total_cost' => $this->input->post('bottom_shoe_consumption_cost'),

            'tbl_woven_trims_piece_extra_1_name' => $this->input->post('extra_1_piece_name'),
            'tbl_woven_trims_piece_extra_1_item_cost' => $this->input->post('extra_1_piece_cost'),
            'tbl_woven_trims_piece_extra_1_item_consumption' => $this->input->post('extra_1_piece_consumption'),
            'tbl_woven_trims_piece_extra_1_item_rate' => $this->input->post('extra_1_piece_consumption_rate'),
            'tbl_woven_trims_piece_extra_1_item_total_cost' => $this->input->post('extra_1_piece_consumption_cost'),

            'tbl_woven_trims_piece_extra_2_name' => $this->input->post('extra_2_piece_name'),
            'tbl_woven_trims_piece_extra_2_item_cost' => $this->input->post('extra_2_piece_cost'),
            'tbl_woven_trims_piece_extra_2_item_consumption' => $this->input->post('extra_2_piece_consumption'),
            'tbl_woven_trims_piece_extra_2_item_rate' => $this->input->post('extra_2_piece_consumption_rate'),
            'tbl_woven_trims_piece_extra_2_item_total_cost' => $this->input->post('extra_2_piece_consumption_cost'),

            'tbl_woven_trims_piece_extra_3_name' => $this->input->post('extra_3_piece_name'),
            'tbl_woven_trims_piece_extra_3_item_cost' => $this->input->post('extra_3_piece_cost'),
            'tbl_woven_trims_piece_extra_3_item_consumption' => $this->input->post('extra_3_piece_consumption'),
            'tbl_woven_trims_piece_extra_3_item_rate' => $this->input->post('extra_3_piece_consumption_rate'),
            'tbl_woven_trims_piece_extra_3_item_total_cost' => $this->input->post('extra_3_piece_consumption_cost'),

            'tbl_woven_trims_piece_extra_4_name' => $this->input->post('extra_4_piece_name'),
            'tbl_woven_trims_piece_extra_4_item_cost' => $this->input->post('extra_4_piece_cost'),
            'tbl_woven_trims_piece_extra_4_item_consumption' => $this->input->post('extra_4_piece_consumption'),
            'tbl_woven_trims_piece_extra_4_item_rate' => $this->input->post('extra_4_piece_consumption_rate'),
            'tbl_woven_trims_piece_extra_4_item_total_cost' => $this->input->post('extra_4_piece_consumption_cost'),

            'tbl_woven_trims_piece_extra_5_name' => $this->input->post('extra_5_piece_name'),
            'tbl_woven_trims_piece_extra_5_item_cost' => $this->input->post('extra_5_piece_cost'),
            'tbl_woven_trims_piece_extra_5_item_consumption' => $this->input->post('extra_5_piece_consumption'),
            'tbl_woven_trims_piece_extra_5_item_rate' => $this->input->post('extra_5_piece_consumption_rate'),
            'tbl_woven_trims_piece_extra_5_item_total_cost' => $this->input->post('extra_5_piece_consumption_cost'),
            'tbl_modification_date' => date("Y-m-d"),
            'tbl_modification_time' => date("h:i:sa"),
        );
        $this->db->insert('woven_costing_rev',$woven_data_rev);

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
    function delete_woven_costing($ppnw_costing_id)
    {
        $this->db->where('ics_order_id',$ppnw_costing_id);
        $this->db->delete('ppnw_costing');
    }
}