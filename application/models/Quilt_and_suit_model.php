<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quilt_and_suit_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    //get the costing for particular user
    //Get All ppnw costing info
    function gel_all_quilt_and_suit_costing($username){
        $this->db->select('*');
        $this->db->from('costing_by_user');
        $this->db->join('quilt_and_suit_costing', 'costing_by_user.costing_user_quilt_and_suit = quilt_and_suit_costing.tbl_quilt_and_suit_order_id');
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

        var_dump($query);
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
    function all_revisions_single_quilt_and_suit_costing($id){
        $this->db->select('*');
        $this->db->from('quilt_and_suit_costing_rev');
        $this->db->join('quilt_and_suit_dimension_rev','quilt_and_suit_costing_rev.tbl_quilt_and_suit_dimension_id = quilt_and_suit_dimension_rev.tbl_dimension_id');
        $this->db->where('tbl_quilt_and_suit_order_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * @param $username
     * @return mixed
     */
      function gel_total_quilt_and_suit_costing($username){
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
    function get_quilt_and_suit_costing_from_revision($id){
        $this->db->select('tbl_order_rev_id, tbl_ics_order_id');
        $this->db->from('quilt_and_suit_costing_rev');
        $this->db->where('tbl_order_rev_id',$id);
        $query = $this->db->get();
        return $query->result();

    }


    function single_revision_quilt_and_suit_costing($quilt_and_suit_costing_id) {
        $this->db->select('*');
        $this->db->join('quilt_and_suit_dimension_rev','quilt_and_suit_costing_rev.tbl_quilt_and_suit_dimension_id = quilt_and_suit_dimension_rev.tbl_dimension_id');
        $data = $this->db->get_where('quilt_and_suit_costing_rev', array('tbl_quilt_and_suit_order_rev_id' => $quilt_and_suit_costing_id))->row();
        return $data;
    }

      function single_revisions_single_quilt_and_suit_costing(){
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
    function edit_quilt_and_suit_costing($quilt_and_suit_costing_id) {
        $this->db->select('*');
        $this->db->join('quilt_and_suit_dimension','quilt_and_suit_costing.tbl_quilt_and_suit_dimension_id = quilt_and_suit_dimension.tbl_dimension_id');
        $data = $this->db->get_where('quilt_and_suit_costing', array('tbl_quilt_and_suit_order_id' => $quilt_and_suit_costing_id))->row();
        return $data;
    }




    /**
     * @param $id
     */
    public function quilt_and_suit_total_count_by_user($username)
    {
        $this->db->select('COUNT(*) as quilt_and_suit_count');
        $this->db->from('quilt_and_suit_costing');
        $this->db->join('costing_by_user', 'costing_by_user.costing_user_quilt_and_suit = quilt_and_suit_costing.tbl_quilt_and_suit_order_id');
        $this->db->join('users', 'costing_by_user.costing_user_id = users.id');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    /**
     * @param $quilt_and_suit_id
     */
    function update_quilt_and_suit_costing($quilt_and_suit_id){

        $dimension_data = array(
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

            'tbl_dimension_body_material_1_handle_length' => $this->input->post('body_material_1_handle_length'),
            'tbl_dimension_body_material_1_handle_length_allowance' => $this->input->post('body_material_1_handle_length_allowance'),
            'tbl_dimension_body_material_1_handle_length_total' => $this->input->post('body_material_1_handle_length_total'),

            'tbl_dimension_body_material_1_handle_width' => $this->input->post('body_material_1_handle_width'),
            'tbl_dimension_body_material_1_handle_width_allowance' => $this->input->post('body_material_1_handle_width_allowance'),
            'tbl_dimension_body_material_1_handle_width_total' => $this->input->post('body_material_1_handle_width_total'),

            'tbl_dimension_body_material_1_pocket_length' => $this->input->post('body_material_1_pocket_length'),
            'tbl_dimension_body_material_1_pocket_length_allowance' => $this->input->post('body_material_1_pocket_length_allowance'),
            'tbl_dimension_body_material_1_pocket_length_total' => $this->input->post('body_material_1_pocket_length_total'),

            'tbl_dimension_body_material_1_pocket_width' => $this->input->post('body_material_1_pocket_width'),
            'tbl_dimension_body_material_1_pocket_width_allowance' => $this->input->post('body_material_1_pocket_width_allowance'),
            'tbl_dimension_body_material_1_pocket_width_total' => $this->input->post('body_material_1_pocket_width_total'),

            'tbl_dimension_body_material_1_piping_length' => $this->input->post('body_material_1_piping_length'),
            'tbl_dimension_body_material_1_piping_length_allowance' => $this->input->post('body_material_1_piping_length_allowance'),
            'tbl_dimension_body_material_1_piping_length_total' => $this->input->post('body_material_1_piping_length_total'),

            'tbl_dimension_body_material_1_piping_width' => $this->input->post('body_material_1_piping_width'),
            'tbl_dimension_body_material_1_piping_width_allowance' => $this->input->post('body_material_1_piping_width_allowance'),
            'tbl_dimension_body_material_1_piping_width_total' => $this->input->post('body_material_1_piping_width_total'),


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

            'tbl_dimension_body_material_2_handle_length' => $this->input->post('body_material_2_handle_length'),
            'tbl_dimension_body_material_2_handle_length_allowance' => $this->input->post('body_material_2_handle_length_allowance'),
            'tbl_dimension_body_material_2_handle_length_total' => $this->input->post('body_material_2_handle_length_total'),

            'tbl_dimension_body_material_2_handle_width' => $this->input->post('body_material_2_handle_width'),
            'tbl_dimension_body_material_2_handle_width_allowance' => $this->input->post('body_material_2_handle_width_allowance'),
            'tbl_dimension_body_material_2_handle_width_total' => $this->input->post('body_material_2_handle_width_total'),

            'tbl_dimension_body_material_2_pocket_length' => $this->input->post('body_material_2_pocket_length'),
            'tbl_dimension_body_material_2_pocket_length_allowance' => $this->input->post('body_material_2_pocket_length_allowance'),
            'tbl_dimension_body_material_2_pocket_length_total' => $this->input->post('body_material_2_pocket_length_total'),

            'tbl_dimension_body_material_2_pocket_width' => $this->input->post('body_material_2_pocket_width'),
            'tbl_dimension_body_material_2_pocket_width_allowance' => $this->input->post('body_material_2_pocket_width_allowance'),
            'tbl_dimension_body_material_2_pocket_width_total' => $this->input->post('body_material_2_pocket_width_total'),

            'tbl_dimension_body_material_2_piping_length' => $this->input->post('body_material_2_piping_length'),
            'tbl_dimension_body_material_2_piping_length_allowance' => $this->input->post('body_material_2_piping_length_allowance'),
            'tbl_dimension_body_material_2_piping_length_total' => $this->input->post('body_material_2_piping_length_total'),

            'tbl_dimension_body_material_2_piping_width' => $this->input->post('body_material_2_piping_width'),
            'tbl_dimension_body_material_2_piping_width_allowance' => $this->input->post('body_material_2_piping_width_allowance'),
            'tbl_dimension_body_material_2_piping_width_total' => $this->input->post('body_material_2_piping_width_total'),

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

            'tbl_dimension_body_material_3_handle_length' => $this->input->post('body_material_3_handle_length'),
            'tbl_dimension_body_material_3_handle_length_allowance' => $this->input->post('body_material_3_handle_length_allowance'),
            'tbl_dimension_body_material_3_handle_length_total' => $this->input->post('body_material_3_handle_length_total'),

            'tbl_dimension_body_material_3_handle_width' => $this->input->post('body_material_3_handle_width'),
            'tbl_dimension_body_material_3_handle_width_allowance' => $this->input->post('body_material_3_handle_width_allowance'),
            'tbl_dimension_body_material_3_handle_width_total' => $this->input->post('body_material_3_handle_width_total'),

            'tbl_dimension_body_material_3_pocket_length' => $this->input->post('body_material_3_pocket_length'),
            'tbl_dimension_body_material_3_pocket_length_allowance' => $this->input->post('body_material_3_pocket_length_allowance'),
            'tbl_dimension_body_material_3_pocket_length_total' => $this->input->post('body_material_3_pocket_length_total'),

            'tbl_dimension_body_material_3_pocket_width' => $this->input->post('body_material_3_pocket_width'),
            'tbl_dimension_body_material_3_pocket_width_allowance' => $this->input->post('body_material_3_pocket_width_allowance'),
            'tbl_dimension_body_material_3_pocket_width_total' => $this->input->post('body_material_3_pocket_width_total'),

            'tbl_dimension_body_material_3_piping_length' => $this->input->post('body_material_3_piping_length'),
            'tbl_dimension_body_material_3_piping_length_allowance' => $this->input->post('body_material_3_piping_length_allowance'),
            'tbl_dimension_body_material_3_piping_length_total' => $this->input->post('body_material_3_piping_length_total'),

            'tbl_dimension_body_material_3_piping_width' => $this->input->post('body_material_3_piping_width'),
            'tbl_dimension_body_material_3_piping_width_allowance' => $this->input->post('body_material_3_piping_width_allowance'),
            'tbl_dimension_body_material_3_piping_width_total' => $this->input->post('body_material_3_piping_width_total'),

         );
        $dimension_id = $this->input->post('dimension-id');
        $this->db->where('tbl_dimension_id',$dimension_id);
        $this->db->update('quilt_and_suit_dimension',$dimension_data);


        $quilt_and_suit_update_data = array(
            'tbl_quilt_and_suit_company_name' => $this->input->post('order_company'),
            'tbl_quilt_and_suit_order_date' => $this->input->post('order_date'),
            'tbl_quilt_and_suit_item_name' => $this->input->post('order_item_name'),
            'tbl_quilt_and_suit_ref_name' => $this->input->post('order_ref_no'),

           // 'tbl_quilt_and_suit_order_gsm' => $this->input->post('quilt_and_suit_order_gsm'),
            //'tbl_quilt_and_suit_order_color' => $this->input->post('quilt_and_suit_order_color'),
            'tbl_quilt_and_suit_order_usd' => $this->input->post('order_usd'),

            'tbl_quilt_and_suit_order_wastage' => $this->input->post('order_wastage'),
            'tbl_quilt_and_suit_order_margin' => $this->input->post('order_margin'),

            'tbl_quilt_and_suit_order_quantity' => $this->input->post('order_quantity'),
            'tbl_quilt_and_suit_order_transport' => $this->input->post('order_transport'),
            'tbl_quilt_and_suit_order_bank_doc_charge' => $this->input->post('order_bank_document'),

            'tbl_order_sewing' => $this->input->post('order_sewing'),
            'tbl_order_overheads' => $this->input->post('order_overheads'),

            'tbl_order_total_material_inc_wastage' => $this->input->post('order_total_material_inc_wastage'),
            'tbl_order_total_overhead_and_other_cost' => $this->input->post('total_overhead_and_other_hidden'),
            'tbl_total_cost' => $this->input->post('total_cost_hidden'),
            'tbl_total_price' => $this->input->post('final_price_hidden'),

            //Body Material Name
            'tbl_quilt_and_suit_body_material_1_roll_width' => $this->input->post('body_material_1_roll_1'),
            'tbl_quilt_and_suit_body_material_2_roll_width' => $this->input->post('body_material_2_roll_2'),
            'tbl_quilt_and_suit_body_material_3_roll_width' => $this->input->post('body_material_3_roll_3'),

            //Body Material 1 consumption cost
            'tbl_quilt_and_suit_body_material_1_cost' => $this->input->post('body_material_1_cost'),
            'tbl_quilt_and_suit_body_material_1_consumption' => $this->input->post('body_material_1_consumption'),
            'tbl_quilt_and_suit_body_material_1_rate' => $this->input->post('body_material_1_consumption_rate'),
            'tbl_quilt_and_suit_body_material_1_total_cost' => $this->input->post('body_material_1_consumption_cost'),

            //Body Material 2 consumption cost
            'tbl_quilt_and_suit_body_material_2_cost' => $this->input->post('body_material_2_cost'),
            'tbl_quilt_and_suit_body_material_2_consumption' => $this->input->post('body_material_2_consumption'),
            'tbl_quilt_and_suit_body_material_2_rate' => $this->input->post('body_material_2_consumption_rate'),
            'tbl_quilt_and_suit_body_material_2_total_cost' => $this->input->post('body_material_2_consumption_cost'),

            //Body Material 3 consumption cost
            'tbl_quilt_and_suit_body_material_3_cost' => $this->input->post('body_material_3_cost'),
            'tbl_quilt_and_suit_body_material_3_consumption' => $this->input->post('body_material_3_consumption'),
            'tbl_quilt_and_suit_body_material_3_rate' => $this->input->post('body_material_3_consumption_rate'),
            'tbl_quilt_and_suit_body_material_3_total_cost' => $this->input->post('body_material_3_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_zipper_item_cost' => $this->input->post('zipper_cost'),
            'tbl_quilt_and_suit_trims_yard_zipper_item_consumption' => $this->input->post('zipper_consumption'),
            'tbl_quilt_and_suit_trims_yard_zipper_item_rate' => $this->input->post('zipper_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_zipper_item_total_cost' => $this->input->post('zipper_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_draw_string_item_cost' => $this->input->post('draw_string_cost'),
            'tbl_quilt_and_suit_trims_yard_draw_string_item_consumption' => $this->input->post('draw_string_consumption'),
            'tbl_quilt_and_suit_trims_yard_draw_string_item_rate' => $this->input->post('draw_string_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_draw_string_item_total_cost' => $this->input->post('draw_string_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_velcro_item_cost' => $this->input->post('velcro_cost'),
            'tbl_quilt_and_suit_trims_yard_velcro_item_consumption' => $this->input->post('velcro_consumption'),
            'tbl_quilt_and_suit_trims_yard_velcro_item_rate' => $this->input->post('velcro_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_velcro_item_total_cost' => $this->input->post('velcro_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_extra_1_name' => $this->input->post('extra_trim_yard_extra_1_name'),
            'tbl_quilt_and_suit_trims_yard_extra_2_name' => $this->input->post('extra_trim_yard_extra_2_name'),
            'tbl_quilt_and_suit_trims_yard_extra_3_name' => $this->input->post('extra_trim_yard_extra_3_name'),


            'tbl_quilt_and_suit_trims_yard_extra_1_item_cost' => $this->input->post('extra_trim_yard_1_cost'),
            'tbl_quilt_and_suit_trims_yard_extra_1_item_consumption' => $this->input->post('extra_trim_yard_1_consumption'),
            'tbl_quilt_and_suit_trims_yard_extra_1_item_rate' => $this->input->post('extra_trim_yard_1_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_extra_1_item_total_cost' => $this->input->post('extra_trim_yard_1_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_extra_2_item_cost' => $this->input->post('extra_trim_yard_2_cost'),
            'tbl_quilt_and_suit_trims_yard_extra_2_item_consumption' => $this->input->post('extra_trim_yard_2_consumption'),
            'tbl_quilt_and_suit_trims_yard_extra_2_item_rate' => $this->input->post('extra_trim_yard_2_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_extra_2_item_total_cost' => $this->input->post('extra_trim_yard_2_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_extra_3_item_cost' => $this->input->post('extra_trim_yard_3_cost'),
            'tbl_quilt_and_suit_trims_yard_extra_3_item_consumption' => $this->input->post('extra_trim_yard_3_consumption'),
            'tbl_quilt_and_suit_trims_yard_extra_3_item_rate' => $this->input->post('extra_trim_yard_3_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_extra_3_item_total_cost' => $this->input->post('extra_trim_yard_3_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_puller_item_cost' => $this->input->post('puller_cost'),
            'tbl_quilt_and_suit_trims_piece_puller_item_consumption' => $this->input->post('puller_consumption'),
            'tbl_quilt_and_suit_trims_piece_puller_item_rate' => $this->input->post('puller_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_puller_item_total_cost' => $this->input->post('puller_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_print_item_cost' => $this->input->post('print_cost'),
            'tbl_quilt_and_suit_trims_piece_print_item_consumption' => $this->input->post('print_consumption'),
            'tbl_quilt_and_suit_trims_piece_print_item_rate' => $this->input->post('print_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_print_item_total_cost' => $this->input->post('print_consumption_cost'),


            'tbl_quilt_and_suit_trims_piece_eyelet_item_cost' => $this->input->post('eyelet_cost'),
            'tbl_quilt_and_suit_trims_piece_eyelet_item_consumption' => $this->input->post('eyelet_consumption'),
            'tbl_quilt_and_suit_trims_piece_eyelet_item_rate' => $this->input->post('eyelet_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_eyelet_item_total_cost' => $this->input->post('eyelet_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_buckle_item_cost' => $this->input->post('buckle_cost'),
            'tbl_quilt_and_suit_trims_piece_buckle_item_consumption' => $this->input->post('buckle_consumption'),
            'tbl_quilt_and_suit_trims_piece_buckle_item_rate' => $this->input->post('buckle_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_buckle_item_total_cost' => $this->input->post('buckle_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_magnetic_button_item_cost' => $this->input->post('magnetic_button_cost'),
            'tbl_quilt_and_suit_trims_piece_magnetic_button_item_consumption' => $this->input->post('magnetic_button_consumption'),
            'tbl_quilt_and_suit_trims_piece_magnetic_button_item_rate' => $this->input->post('magnetic_button_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_magnetic_button_item_total_cost' => $this->input->post('magnetic_button_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_snap_button_item_cost' => $this->input->post('snap_button_cost'),
            'tbl_quilt_and_suit_trims_piece_snap_button_item_consumption' => $this->input->post('snap_button_consumption'),
            'tbl_quilt_and_suit_trims_piece_snap_button_item_rate' => $this->input->post('snap_button_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_snap_button_item_total_cost' => $this->input->post('snap_button_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_bottom_base_item_cost' => $this->input->post('bottom_base_cost'),
            'tbl_quilt_and_suit_trims_piece_bottom_base_item_consumption' => $this->input->post('bottom_base_consumption'),
            'tbl_quilt_and_suit_trims_piece_bottom_base_item_rate' => $this->input->post('bottom_base_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_bottom_base_item_total_cost' => $this->input->post('bottom_base_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_thread_item_cost' => $this->input->post('thread_cost'),
            'tbl_quilt_and_suit_trims_piece_thread_item_consumption' => $this->input->post('thread_consumption'),
            'tbl_quilt_and_suit_trims_piece_thread_item_rate' => $this->input->post('thread_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_thread_item_total_cost' => $this->input->post('thread_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_tag_item_cost' => $this->input->post('tag_cost'),
            'tbl_quilt_and_suit_trims_piece_tag_item_consumption' => $this->input->post('tag_consumption'),
            'tbl_quilt_and_suit_trims_piece_tag_item_rate' => $this->input->post('tag_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_tag_item_total_cost' => $this->input->post('tag_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_label_item_cost' => $this->input->post('label_cost'),
            'tbl_quilt_and_suit_trims_piece_label_item_consumption' => $this->input->post('label_consumption'),
            'tbl_quilt_and_suit_trims_piece_label_item_rate' => $this->input->post('label_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_label_item_total_cost' => $this->input->post('label_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_packing_item_cost' => $this->input->post('packing_cost'),
            'tbl_quilt_and_suit_trims_piece_packing_item_consumption' => $this->input->post('packing_consumption'),
            'tbl_quilt_and_suit_trims_piece_packing_item_rate' => $this->input->post('packing_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_packing_item_total_cost' => $this->input->post('packing_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_extra_1_name' => $this->input->post('extra_1_piece_name'),
            'tbl_quilt_and_suit_trims_piece_extra_1_item_cost' => $this->input->post('extra_1_piece_cost'),
            'tbl_quilt_and_suit_trims_piece_extra_1_item_consumption' => $this->input->post('extra_1_piece_consumption'),
            'tbl_quilt_and_suit_trims_piece_extra_1_item_rate' => $this->input->post('extra_1_piece_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_extra_1_item_total_cost' => $this->input->post('extra_1_piece_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_extra_2_name' => $this->input->post('extra_2_piece_name'),
            'tbl_quilt_and_suit_trims_piece_extra_2_item_cost' => $this->input->post('extra_2_piece_cost'),
            'tbl_quilt_and_suit_trims_piece_extra_2_item_consumption' => $this->input->post('extra_2_piece_consumption'),
            'tbl_quilt_and_suit_trims_piece_extra_2_item_rate' => $this->input->post('extra_2_piece_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_extra_2_item_total_cost' => $this->input->post('extra_2_piece_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_extra_3_name' => $this->input->post('extra_3_piece_name'),
            'tbl_quilt_and_suit_trims_piece_extra_3_item_cost' => $this->input->post('extra_3_piece_cost'),
            'tbl_quilt_and_suit_trims_piece_extra_3_item_consumption' => $this->input->post('extra_3_piece_consumption'),
            'tbl_quilt_and_suit_trims_piece_extra_3_item_rate' => $this->input->post('extra_3_piece_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_extra_3_item_total_cost' => $this->input->post('extra_3_piece_consumption_cost'),

        );

        $this->db->where('tbl_quilt_and_suit_order_id',$quilt_and_suit_id);
        $this->db->update('quilt_and_suit_costing',$quilt_and_suit_update_data);

        //Save Revision Data
        $quilt_and_suit_dimension_rev_data = array(
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

            'tbl_dimension_body_material_1_handle_length' => $this->input->post('body_material_1_handle_length'),
            'tbl_dimension_body_material_1_handle_length_allowance' => $this->input->post('body_material_1_handle_length_allowance'),
            'tbl_dimension_body_material_1_handle_length_total' => $this->input->post('body_material_1_handle_length_total'),

            'tbl_dimension_body_material_1_handle_width' => $this->input->post('body_material_1_handle_width'),
            'tbl_dimension_body_material_1_handle_width_allowance' => $this->input->post('body_material_1_handle_width_allowance'),
            'tbl_dimension_body_material_1_handle_width_total' => $this->input->post('body_material_1_handle_width_total'),

            'tbl_dimension_body_material_1_pocket_length' => $this->input->post('body_material_1_pocket_length'),
            'tbl_dimension_body_material_1_pocket_length_allowance' => $this->input->post('body_material_1_pocket_length_allowance'),
            'tbl_dimension_body_material_1_pocket_length_total' => $this->input->post('body_material_1_pocket_length_total'),

            'tbl_dimension_body_material_1_pocket_width' => $this->input->post('body_material_1_pocket_width'),
            'tbl_dimension_body_material_1_pocket_width_allowance' => $this->input->post('body_material_1_pocket_width_allowance'),
            'tbl_dimension_body_material_1_pocket_width_total' => $this->input->post('body_material_1_pocket_width_total'),

            'tbl_dimension_body_material_1_piping_length' => $this->input->post('body_material_1_piping_length'),
            'tbl_dimension_body_material_1_piping_length_allowance' => $this->input->post('body_material_1_piping_length_allowance'),
            'tbl_dimension_body_material_1_piping_length_total' => $this->input->post('body_material_1_piping_length_total'),

            'tbl_dimension_body_material_1_piping_width' => $this->input->post('body_material_1_piping_width'),
            'tbl_dimension_body_material_1_piping_width_allowance' => $this->input->post('body_material_1_piping_width_allowance'),
            'tbl_dimension_body_material_1_piping_width_total' => $this->input->post('body_material_1_piping_width_total'),

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

            'tbl_dimension_body_material_2_handle_length' => $this->input->post('body_material_2_handle_length'),
            'tbl_dimension_body_material_2_handle_length_allowance' => $this->input->post('body_material_2_handle_length_allowance'),
            'tbl_dimension_body_material_2_handle_length_total' => $this->input->post('body_material_2_handle_length_total'),

            'tbl_dimension_body_material_2_handle_width' => $this->input->post('body_material_2_handle_width'),
            'tbl_dimension_body_material_2_handle_width_allowance' => $this->input->post('body_material_2_handle_width_allowance'),
            'tbl_dimension_body_material_2_handle_width_total' => $this->input->post('body_material_2_handle_width_total'),

            'tbl_dimension_body_material_2_pocket_length' => $this->input->post('body_material_2_pocket_length'),
            'tbl_dimension_body_material_2_pocket_length_allowance' => $this->input->post('body_material_2_pocket_length_allowance'),
            'tbl_dimension_body_material_2_pocket_length_total' => $this->input->post('body_material_2_pocket_length_total'),

            'tbl_dimension_body_material_2_pocket_width' => $this->input->post('body_material_2_pocket_width'),
            'tbl_dimension_body_material_2_pocket_width_allowance' => $this->input->post('body_material_2_pocket_width_allowance'),
            'tbl_dimension_body_material_2_pocket_width_total' => $this->input->post('body_material_2_pocket_width_total'),

            'tbl_dimension_body_material_2_piping_length' => $this->input->post('body_material_2_piping_length'),
            'tbl_dimension_body_material_2_piping_length_allowance' => $this->input->post('body_material_2_piping_length_allowance'),
            'tbl_dimension_body_material_2_piping_length_total' => $this->input->post('body_material_2_piping_length_total'),

            'tbl_dimension_body_material_2_piping_width' => $this->input->post('body_material_2_piping_width'),
            'tbl_dimension_body_material_2_piping_width_allowance' => $this->input->post('body_material_2_piping_width_allowance'),
            'tbl_dimension_body_material_2_piping_width_total' => $this->input->post('body_material_2_piping_width_total'),

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

            'tbl_dimension_body_material_3_handle_length' => $this->input->post('body_material_3_handle_length'),
            'tbl_dimension_body_material_3_handle_length_allowance' => $this->input->post('body_material_3_handle_length_allowance'),
            'tbl_dimension_body_material_3_handle_length_total' => $this->input->post('body_material_3_handle_length_total'),

            'tbl_dimension_body_material_3_handle_width' => $this->input->post('body_material_3_handle_width'),
            'tbl_dimension_body_material_3_handle_width_allowance' => $this->input->post('body_material_3_handle_width_allowance'),
            'tbl_dimension_body_material_3_handle_width_total' => $this->input->post('body_material_3_handle_width_total'),

            'tbl_dimension_body_material_3_pocket_length' => $this->input->post('body_material_3_pocket_length'),
            'tbl_dimension_body_material_3_pocket_length_allowance' => $this->input->post('body_material_3_pocket_length_allowance'),
            'tbl_dimension_body_material_3_pocket_length_total' => $this->input->post('body_material_3_pocket_length_total'),

            'tbl_dimension_body_material_3_pocket_width' => $this->input->post('body_material_3_pocket_width'),
            'tbl_dimension_body_material_3_pocket_width_allowance' => $this->input->post('body_material_3_pocket_width_allowance'),
            'tbl_dimension_body_material_3_pocket_width_total' => $this->input->post('body_material_3_pocket_width_total'),

            'tbl_dimension_body_material_3_piping_length' => $this->input->post('body_material_3_piping_length'),
            'tbl_dimension_body_material_3_piping_length_allowance' => $this->input->post('body_material_3_piping_length_allowance'),
            'tbl_dimension_body_material_3_piping_length_total' => $this->input->post('body_material_3_piping_length_total'),

            'tbl_dimension_body_material_3_piping_width' => $this->input->post('body_material_3_piping_width'),
            'tbl_dimension_body_material_3_piping_width_allowance' => $this->input->post('body_material_3_piping_width_allowance'),
            'tbl_dimension_body_material_3_piping_width_total' => $this->input->post('body_material_3_piping_width_total'),
        );
        $this->db->insert('quilt_and_suit_dimension_rev',$quilt_and_suit_dimension_rev_data);
        $inserted_dimension_rev_id = $this->db->insert_id();

        $quilt_and_suit_data_rev = array(
            'tbl_quilt_and_suit_order_id' => $this->input->post('quilt-and-suit-id'),
            'tbl_quilt_and_suit_dimension_id' => $inserted_dimension_rev_id,
            'tbl_quilt_and_suit_id_name' => $this->input->post('order_id'),
            'tbl_quilt_and_suit_company_name' => $this->input->post('order_company'),
            'tbl_quilt_and_suit_order_date' => $this->input->post('order_date'),
            'tbl_quilt_and_suit_item_name' => $this->input->post('order_item_name'),
            'tbl_quilt_and_suit_ref_name' => $this->input->post('order_ref_no'),

            // 'tbl_quilt_and_suit_order_gsm' => $this->input->post('quilt_and_suit_order_gsm'),
            //'tbl_quilt_and_suit_order_color' => $this->input->post('quilt_and_suit_order_color'),
            'tbl_quilt_and_suit_order_usd' => $this->input->post('order_usd'),

            'tbl_quilt_and_suit_order_wastage' => $this->input->post('order_wastage'),
            'tbl_quilt_and_suit_order_margin' => $this->input->post('order_margin'),

            'tbl_quilt_and_suit_order_quantity' => $this->input->post('order_quantity'),
            'tbl_quilt_and_suit_order_transport' => $this->input->post('order_transport'),
            'tbl_quilt_and_suit_order_bank_doc_charge' => $this->input->post('order_bank_document'),

            'tbl_order_sewing' => $this->input->post('order_sewing'),
            'tbl_order_overheads' => $this->input->post('order_overheads'),

            'tbl_order_total_material_inc_wastage' => $this->input->post('order_total_material_inc_wastage'),
            'tbl_order_total_overhead_and_other_cost' => $this->input->post('total_overhead_and_other_hidden'),
            'tbl_total_cost' => $this->input->post('total_cost_hidden'),
            'tbl_total_price' => $this->input->post('final_price_hidden'),

            //Body Material Name
            'tbl_quilt_and_suit_body_material_1_roll_width' => $this->input->post('body_material_1_roll_1'),
            'tbl_quilt_and_suit_body_material_2_roll_width' => $this->input->post('body_material_2_roll_2'),
            'tbl_quilt_and_suit_body_material_3_roll_width' => $this->input->post('body_material_3_roll_3'),

            //Body Material 1 consumption cost
            'tbl_quilt_and_suit_body_material_1_cost' => $this->input->post('body_material_1_cost'),
            'tbl_quilt_and_suit_body_material_1_consumption' => $this->input->post('body_material_1_consumption'),
            'tbl_quilt_and_suit_body_material_1_rate' => $this->input->post('body_material_1_consumption_rate'),
            'tbl_quilt_and_suit_body_material_1_total_cost' => $this->input->post('body_material_1_consumption_cost'),

            //Body Material 2 consumption cost
            'tbl_quilt_and_suit_body_material_2_cost' => $this->input->post('body_material_2_cost'),
            'tbl_quilt_and_suit_body_material_2_consumption' => $this->input->post('body_material_2_consumption'),
            'tbl_quilt_and_suit_body_material_2_rate' => $this->input->post('body_material_2_consumption_rate'),
            'tbl_quilt_and_suit_body_material_2_total_cost' => $this->input->post('body_material_2_consumption_cost'),

            //Body Material 3 consumption cost
            'tbl_quilt_and_suit_body_material_3_cost' => $this->input->post('body_material_3_cost'),
            'tbl_quilt_and_suit_body_material_3_consumption' => $this->input->post('body_material_3_consumption'),
            'tbl_quilt_and_suit_body_material_3_rate' => $this->input->post('body_material_3_consumption_rate'),
            'tbl_quilt_and_suit_body_material_3_total_cost' => $this->input->post('body_material_3_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_zipper_item_cost' => $this->input->post('zipper_cost'),
            'tbl_quilt_and_suit_trims_yard_zipper_item_consumption' => $this->input->post('zipper_consumption'),
            'tbl_quilt_and_suit_trims_yard_zipper_item_rate' => $this->input->post('zipper_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_zipper_item_total_cost' => $this->input->post('zipper_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_webbing_item_cost' => $this->input->post('webbing_cost'),
            'tbl_quilt_and_suit_trims_yard_webbing_item_consumption' => $this->input->post('webbing_consumption'),
            'tbl_quilt_and_suit_trims_yard_webbing_item_rate' => $this->input->post('webbing_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_webbing_item_total_cost' => $this->input->post('webbing_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_draw_string_item_cost' => $this->input->post('draw_string_cost'),
            'tbl_quilt_and_suit_trims_yard_draw_string_item_consumption' => $this->input->post('draw_string_consumption'),
            'tbl_quilt_and_suit_trims_yard_draw_string_item_rate' => $this->input->post('draw_string_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_draw_string_item_total_cost' => $this->input->post('draw_string_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_velcro_item_cost' => $this->input->post('velcro_cost'),
            'tbl_quilt_and_suit_trims_yard_velcro_item_consumption' => $this->input->post('velcro_consumption'),
            'tbl_quilt_and_suit_trims_yard_velcro_item_rate' => $this->input->post('velcro_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_velcro_item_total_cost' => $this->input->post('velcro_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_extra_1_name' => $this->input->post('extra_trim_yard_extra_1_name'),
            'tbl_quilt_and_suit_trims_yard_extra_2_name' => $this->input->post('extra_trim_yard_extra_2_name'),
            'tbl_quilt_and_suit_trims_yard_extra_3_name' => $this->input->post('extra_trim_yard_extra_3_name'),

            'tbl_quilt_and_suit_trims_yard_extra_1_item_cost' => $this->input->post('extra_trim_yard_1_cost'),
            'tbl_quilt_and_suit_trims_yard_extra_1_item_consumption' => $this->input->post('extra_trim_yard_1_consumption'),
            'tbl_quilt_and_suit_trims_yard_extra_1_item_rate' => $this->input->post('extra_trim_yard_1_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_extra_1_item_total_cost' => $this->input->post('extra_trim_yard_1_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_extra_2_item_cost' => $this->input->post('extra_trim_yard_2_cost'),
            'tbl_quilt_and_suit_trims_yard_extra_2_item_consumption' => $this->input->post('extra_trim_yard_2_consumption'),
            'tbl_quilt_and_suit_trims_yard_extra_2_item_rate' => $this->input->post('extra_trim_yard_2_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_extra_2_item_total_cost' => $this->input->post('extra_trim_yard_2_consumption_cost'),

            'tbl_quilt_and_suit_trims_yard_extra_3_item_cost' => $this->input->post('extra_trim_yard_3_cost'),
            'tbl_quilt_and_suit_trims_yard_extra_3_item_consumption' => $this->input->post('extra_trim_yard_3_consumption'),
            'tbl_quilt_and_suit_trims_yard_extra_3_item_rate' => $this->input->post('extra_trim_yard_3_consumption_rate'),
            'tbl_quilt_and_suit_trims_yard_extra_3_item_total_cost' => $this->input->post('extra_trim_yard_3_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_puller_item_cost' => $this->input->post('puller_cost'),
            'tbl_quilt_and_suit_trims_piece_puller_item_consumption' => $this->input->post('puller_consumption'),
            'tbl_quilt_and_suit_trims_piece_puller_item_rate' => $this->input->post('puller_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_puller_item_total_cost' => $this->input->post('puller_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_print_item_cost' => $this->input->post('print_cost'),
            'tbl_quilt_and_suit_trims_piece_print_item_consumption' => $this->input->post('print_consumption'),
            'tbl_quilt_and_suit_trims_piece_print_item_rate' => $this->input->post('print_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_print_item_total_cost' => $this->input->post('print_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_eyelet_item_cost' => $this->input->post('eyelet_cost'),
            'tbl_quilt_and_suit_trims_piece_eyelet_item_consumption' => $this->input->post('eyelet_consumption'),
            'tbl_quilt_and_suit_trims_piece_eyelet_item_rate' => $this->input->post('eyelet_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_eyelet_item_total_cost' => $this->input->post('eyelet_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_buckle_item_cost' => $this->input->post('buckle_cost'),
            'tbl_quilt_and_suit_trims_piece_buckle_item_consumption' => $this->input->post('buckle_consumption'),
            'tbl_quilt_and_suit_trims_piece_buckle_item_rate' => $this->input->post('buckle_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_buckle_item_total_cost' => $this->input->post('buckle_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_magnetic_button_item_cost' => $this->input->post('magnetic_button_cost'),
            'tbl_quilt_and_suit_trims_piece_magnetic_button_item_consumption' => $this->input->post('magnetic_button_consumption'),
            'tbl_quilt_and_suit_trims_piece_magnetic_button_item_rate' => $this->input->post('magnetic_button_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_magnetic_button_item_total_cost' => $this->input->post('magnetic_button_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_snap_button_item_cost' => $this->input->post('snap_button_cost'),
            'tbl_quilt_and_suit_trims_piece_snap_button_item_consumption' => $this->input->post('snap_button_consumption'),
            'tbl_quilt_and_suit_trims_piece_snap_button_item_rate' => $this->input->post('snap_button_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_snap_button_item_total_cost' => $this->input->post('snap_button_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_bottom_base_item_cost' => $this->input->post('bottom_base_cost'),
            'tbl_quilt_and_suit_trims_piece_bottom_base_item_consumption' => $this->input->post('bottom_base_consumption'),
            'tbl_quilt_and_suit_trims_piece_bottom_base_item_rate' => $this->input->post('bottom_base_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_bottom_base_item_total_cost' => $this->input->post('bottom_base_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_thread_item_cost' => $this->input->post('thread_cost'),
            'tbl_quilt_and_suit_trims_piece_thread_item_consumption' => $this->input->post('thread_consumption'),
            'tbl_quilt_and_suit_trims_piece_thread_item_rate' => $this->input->post('thread_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_thread_item_total_cost' => $this->input->post('thread_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_tag_item_cost' => $this->input->post('tag_cost'),
            'tbl_quilt_and_suit_trims_piece_tag_item_consumption' => $this->input->post('tag_consumption'),
            'tbl_quilt_and_suit_trims_piece_tag_item_rate' => $this->input->post('tag_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_tag_item_total_cost' => $this->input->post('tag_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_label_item_cost' => $this->input->post('label_cost'),
            'tbl_quilt_and_suit_trims_piece_label_item_consumption' => $this->input->post('label_consumption'),
            'tbl_quilt_and_suit_trims_piece_label_item_rate' => $this->input->post('label_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_label_item_total_cost' => $this->input->post('label_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_packing_item_cost' => $this->input->post('packing_cost'),
            'tbl_quilt_and_suit_trims_piece_packing_item_consumption' => $this->input->post('packing_consumption'),
            'tbl_quilt_and_suit_trims_piece_packing_item_rate' => $this->input->post('packing_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_packing_item_total_cost' => $this->input->post('packing_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_extra_1_name' => $this->input->post('extra_1_piece_name'),
            'tbl_quilt_and_suit_trims_piece_extra_1_item_cost' => $this->input->post('extra_1_piece_cost'),
            'tbl_quilt_and_suit_trims_piece_extra_1_item_consumption' => $this->input->post('extra_1_piece_consumption'),
            'tbl_quilt_and_suit_trims_piece_extra_1_item_rate' => $this->input->post('extra_1_piece_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_extra_1_item_total_cost' => $this->input->post('extra_1_piece_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_extra_2_name' => $this->input->post('extra_2_piece_name'),
            'tbl_quilt_and_suit_trims_piece_extra_2_item_cost' => $this->input->post('extra_2_piece_cost'),
            'tbl_quilt_and_suit_trims_piece_extra_2_item_consumption' => $this->input->post('extra_2_piece_consumption'),
            'tbl_quilt_and_suit_trims_piece_extra_2_item_rate' => $this->input->post('extra_2_piece_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_extra_2_item_total_cost' => $this->input->post('extra_2_piece_consumption_cost'),

            'tbl_quilt_and_suit_trims_piece_extra_3_name' => $this->input->post('extra_3_piece_name'),
            'tbl_quilt_and_suit_trims_piece_extra_3_item_cost' => $this->input->post('extra_3_piece_cost'),
            'tbl_quilt_and_suit_trims_piece_extra_3_item_consumption' => $this->input->post('extra_3_piece_consumption'),
            'tbl_quilt_and_suit_trims_piece_extra_3_item_rate' => $this->input->post('extra_3_piece_consumption_rate'),
            'tbl_quilt_and_suit_trims_piece_extra_3_item_total_cost' => $this->input->post('extra_3_piece_consumption_cost'),

            'tbl_modification_date' => date("Y-m-d"),
            'tbl_modification_time' => date("h:i:sa"),
        );
        $this->db->insert('quilt_and_suit_costing_rev',$quilt_and_suit_data_rev);

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
    function delete_quilt_and_suit_costing($ppnw_costing_id)
    {
        $this->db->where('ics_order_id',$ppnw_costing_id);
        $this->db->delete('ppnw_costing');
    }
}