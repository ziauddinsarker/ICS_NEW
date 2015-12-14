<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Woven_simple_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
    }

    //get the costing for particular user
    //Get All ppnw costing info
    function gel_all_woven_simple_costing($username){
        $this->db->select('*');
        $this->db->from('costing_by_user');
        $this->db->join('woven_simple_costing', 'costing_by_user.costing_user_woven_simple = woven_simple_costing.ics_order_id');
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
    function all_revisions_single_woven_simple_costing($id){
        $this->db->select('*');
        $this->db->from('woven_simple_costing_rev');
        $this->db->where('tbl_ics_order_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * @param $username
     * @return mixed
     */
      function gel_total_woven_simple_costing($username){
           $this->db->select('*');
           $this->db->from('costing_by_user');
           $this->db->join('woven_simple_costing', 'costing_by_user.costing_user_woven_simple = woven_simple_costing.ics_order_id');
           $this->db->join('users', 'costing_by_user.costing_user_id = users.id');
           //$this->db->where('username',$username);
           $total = $this->db->where('username',$username);
           return $query->result($total);
       }

    /**
     * @param $username
     * @return mixed
     */
    function get_woven_simple_costing_from_revision($id){
        $this->db->select('tbl_order_rev_id, tbl_ics_order_id');
        $this->db->from('woven_simple_costing_rev');
        $this->db->where('tbl_order_rev_id',$id);
        $query = $this->db->get();
        return $query->result();

    }

      function single_revisions_single_woven_simple_costing(){
          $ppnw_costing_id = $this->uri->segment(3);
           $this->db->select('*');
           $this->db->from('woven_simple_costing_rev');
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
    function edit_woven_simple_costing($ppnw_costing_id) {
        $data = $this->db->get_where('woven_simple_costing', array('ics_order_id' => $ppnw_costing_id))->row();
        return $data;
    }



    /**
     * @param $id
     */
    public function woven_simple_total_count_by_user($username)
    {
        $this->db->select('users.id,users.username,COUNT(*) as woven_simple_count');
        $this->db->from('woven_simple_costing');
        $this->db->join('costing_by_user', 'costing_by_user.costing_user_woven_simple = woven_simple_costing.ics_order_id');
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
    function update_woven_simple_costing($id){

        $ppnw_update_data = array(
            'tbl_order_id_name' => $this->input->post('order_id'),
            'tbl_company_id' => $this->input->post('order_company'),
            'tbl_order_date' => $this->input->post('order_date'),
            'tbl_item_name' => $this->input->post('order_item_name'),
            'tbl_ref_name' => $this->input->post('order_ref_no'),

            'tbl_order_gsm' => $this->input->post('order_gsm'),
            'tbl_order_color' => $this->input->post('order_colour'),
            'tbl_order_usd' => $this->input->post('order_usd'),
            'tbl_order_wastage' => $this->input->post('order_wastage'),
            'tbl_order_margin' => $this->input->post('order_margin'),
            'tbl_order_quantity' => $this->input->post('order_quantity'),
            'tbl_order_transport' => $this->input->post('order_transport'),
            'tbl_order_bank_doc_charge' => $this->input->post('order_bank_document'),

            'tbl_dimension_body_height' => $this->input->post('order_body_h'),
            'tbl_dimension_body_height_allowance' => $this->input->post('order_body_h_allowance'),
            'tbl_dimension_body_height_total' => $this->input->post('order_body_h_total'),

            'tbl_dimension_body_width' => $this->input->post('order_body_w'),
            'tbl_dimension_body_width_allowance' => $this->input->post('order_body_w_allowance'),
            'tbl_dimension_body_width_total' => $this->input->post('order_body_w_total'),

            'tbl_dimension_body_panel' => $this->input->post('order_body_panel'),
            'tbl_dimension_body_panel_allowance' => $this->input->post('order_body_panel_allowance'),
            'tbl_dimension_body_panel_total' => $this->input->post('order_body_panel_total'),

            'tbl_dimension_handle_length' => $this->input->post('order_handle_l'),
            'tbl_dimension_handle_length_allowance' => $this->input->post('order_handle_l_allowance'),
            'tbl_dimension_handle_length_total' => $this->input->post('order_handle_l_total'),

            'tbl_dimension_handle_width' => $this->input->post('order_handle_w'),
            'tbl_dimension_handle_width_allowance' => $this->input->post('order_handle_w_allowance'),
            'tbl_dimension_handle_width_total' => $this->input->post('order_handle_w_total'),

            'tbl_dimension_pocket_length' => $this->input->post('order_pocket_l'),
            'tbl_dimension_pocket_length_allowance' => $this->input->post('order_pocket_l_allowance'),
            'tbl_dimension_pocket_length_total' => $this->input->post('order_pocket_l_total'),

            'tbl_dimension_pocket_width' => $this->input->post('order_pocket_w'),
            'tbl_dimension_pocket_width_allowance' => $this->input->post('order_pocket_w_allowance'),
            'tbl_dimension_pocket_width_total' => $this->input->post('order_pocket_w_total'),

            'tbl_dimension_extra_1_length' => $this->input->post('order_extra_1_l'),
            'tbl_dimension_extra_1_length_allowance' => $this->input->post('order_extra_1_l_allowance'),
            'tbl_dimension_extra_1_length_total' => $this->input->post('order_extra_1_l_total'),

            'tbl_dimension_extra_1_width' => $this->input->post('order_extra_1_w'),
            'tbl_dimension_extra_1_width_allowance' => $this->input->post('order_extra_1_w_allowance'),
            'tbl_dimension_extra_1_width_total' => $this->input->post('order_extra_1_w_total'),

            'tbl_dimension_extra_2_length' => $this->input->post('order_extra_2_l'),
            'tbl_dimension_extra_2_length_allowance' => $this->input->post('order_extra_2_l_allowance'),
            'tbl_dimension_extra_2_length_total' => $this->input->post('order_extra_2_l_total'),

            'tbl_dimension_extra_2_width' => $this->input->post('order_extra_2_w'),
            'tbl_dimension_extra_2_width_allowance' => $this->input->post('order_extra_2_w_allowance'),
            'tbl_dimension_extra_2_width_total' => $this->input->post('order_extra_2_w_total'),

            'tbl_dimension_extra_3_length' => $this->input->post('order_extra_3_l'),
            'tbl_dimension_extra_3_length_allowance' => $this->input->post('order_extra_3_l_allowance'),
            'tbl_dimension_extra_3_length_total' => $this->input->post('order_extra_3_l_total'),

            'tbl_dimension_extra_3_width' => $this->input->post('order_extra_3_w'),
            'tbl_dimension_extra_3_width_allowance' => $this->input->post('order_extra_3_w_allowance'),
            'tbl_dimension_extra_3_width_total' => $this->input->post('order_extra_3_w_total'),

            'tbl_order_ppnw_item_cost' => $this->input->post('ppnw_cost'),
            'tbl_order_ppnw_item_consumption' => $this->input->post('ppnw_consumption'),
            'tbl_order_ppnw_rate' => $this->input->post('ppnw_consumption_rate'),
            'tbl_order_ppnw_total_item_cost' => $this->input->post('ppnw_consumption_cost'),

            'tbl_trims_yard_zipper_item_cost' => $this->input->post('zipper_cost'),
            'tbl_trims_yard_zipper_item_consumption' => $this->input->post('zipper_consumption'),
            'tbl_trims_yard_zipper_item_rate' => $this->input->post('zipper_consumption_rate'),
            'tbl_trims_yard_zipper_item_total_cost' => $this->input->post('zipper_consumption_cost'),

            'tbl_trims_yard_webbing_item_cost' => $this->input->post('webbing_cost'),
            'tbl_trims_yard_webbing_item_consumption' => $this->input->post('webbing_consumption'),
            'tbl_trims_yard_webbing_item_rate' => $this->input->post('webbing_consumption_rate'),
            'tbl_trims_yard_webbing_item_total_cost' => $this->input->post('webbing_consumption_cost'),

            'tbl_trims_yard_draw_string_item_cost' => $this->input->post('draw_string_cost'),
            'tbl_trims_yard_draw_string_item_consumption' => $this->input->post('draw_string_consumption'),
            'tbl_trims_yard_draw_string_item_rate' => $this->input->post('draw_string_consumption_rate'),
            'tbl_trims_yard_draw_string_item_total_cost' => $this->input->post('draw_string_consumption_cost'),

            'tbl_trims_yard_velcro_item_cost' => $this->input->post('velcro_cost'),
            'tbl_trims_yard_velcro_item_consumption' => $this->input->post('velcro_consumption'),
            'tbl_trims_yard_velcro_item_rate' => $this->input->post('velcro_consumption_rate'),
            'tbl_trims_yard_velcro_item_total_cost' => $this->input->post('velcro_consumption_cost'),

            'tbl_trims_yard_tape_item_cost' => $this->input->post('tape_cost'),
            'tbl_trims_yard_tape_item_consumption' => $this->input->post('tape_consumption'),
            'tbl_trims_yard_tape_item_rate' => $this->input->post('tape_consumption_rate'),
            'tbl_trims_yard_tape_item_total_cost' => $this->input->post('tape_consumption_cost'),

            'tbl_trims_yard_extra_1_item_cost' => $this->input->post('extra_trim_yard_1_cost'),
            'tbl_trims_yard_extra_1_item_consumption' => $this->input->post('extra_trim_yard_1_consumption'),
            'tbl_trims_yard_extra_1_item_rate' => $this->input->post('extra_trim_yard_1_consumption_rate'),
            'tbl_trims_yard_extra_1_item_total_cost' => $this->input->post('extra_trim_yard_1_consumption_cost'),

            'tbl_trims_yard_extra_2_item_cost' => $this->input->post('extra_trim_yard_2_cost'),
            'tbl_trims_yard_extra_2_item_consumption' => $this->input->post('extra_trim_yard_2_consumption'),
            'tbl_trims_yard_extra_2_item_rate' => $this->input->post('extra_trim_yard_2_consumption_rate'),
            'tbl_trims_yard_extra_2_item_total_cost' => $this->input->post('extra_trim_yard_2_consumption_cost'),

            /***********Trims In Piece***********/
            'tbl_trims_piece_puller_item_cost' => $this->input->post('puller_cost'),
            'tbl_trims_piece_puller_item_consumption' => $this->input->post('puller_consumption'),
            'tbl_trims_piece_puller_item_rate' => $this->input->post('puller_consumption_rate'),
            'tbl_trims_piece_puller_item_total_cost' => $this->input->post('puller_consumption_cost'),

            'tbl_trims_piece_print_item_cost' => $this->input->post('print_cost'),
            'tbl_trims_piece_print_item_consumption' => $this->input->post('print_consumption'),
            'tbl_trims_piece_print_item_rate' => $this->input->post('print_consumption_rate'),
            'tbl_trims_piece_print_item_total_cost' => $this->input->post('print_consumption_cost'),

            'tbl_trims_piece_eyelet_item_cost' => $this->input->post('eyelet_cost'),
            'tbl_trims_piece_eyelet_item_consumption' => $this->input->post('eyelet_consumption'),
            'tbl_trims_piece_eyelet_item_rate' => $this->input->post('eyelet_consumption_rate'),
            'tbl_trims_piece_eyelet_item_total_cost' => $this->input->post('eyelet_consumption_cost'),

            'tbl_trims_piece_buckle_item_cost' => $this->input->post('buckle_cost'),
            'tbl_trims_piece_buckle_item_consumption' => $this->input->post('buckle_consumption'),
            'tbl_trims_piece_buckle_item_rate' => $this->input->post('buckle_consumption_rate'),
            'tbl_trims_piece_buckle_item_total_cost' => $this->input->post('buckle_consumption_cost'),

            'tbl_trims_piece_snap_button_item_cost' => $this->input->post('snap_button_cost'),
            'tbl_trims_piece_snap_button_item_consumption' => $this->input->post('snap_button_consumption'),
            'tbl_trims_piece_snap_button_item_rate' => $this->input->post('snap_button_consumption_rate'),
            'tbl_trims_piece_snap_button_item_total_cost' => $this->input->post('snap_button_consumption_cost'),

            'tbl_trims_piece_magnetic_button_item_cost' => $this->input->post('magnetic_button_cost'),
            'tbl_trims_piece_magnetic_button_item_consumption' => $this->input->post('magnetic_button_consumption'),
            'tbl_trims_piece_magnetic_button_item_rate' => $this->input->post('magnetic_button_consumption_rate'),
            'tbl_trims_piece_magnetic_button_item_total_cost' => $this->input->post('magnetic_button_consumption_cost'),

            'tbl_trims_piece_bottom_base_item_cost' => $this->input->post('bottom_base_cost'),
            'tbl_trims_piece_bottom_base_item_consumption' => $this->input->post('bottom_base_consumption'),
            'tbl_trims_piece_bottom_base_item_rate' => $this->input->post('bottom_base_consumption_rate'),
            'tbl_trims_piece_bottom_base_item_total_cost' => $this->input->post('bottom_base_consumption_cost'),

            'tbl_trims_piece_thread_item_cost' => $this->input->post('thread_cost'),
            'tbl_trims_piece_thread_item_consumption' => $this->input->post('thread_consumption'),
            'tbl_trims_piece_thread_item_rate' => $this->input->post('thread_consumption_rate'),
            'tbl_trims_piece_thread_item_total_cost' => $this->input->post('thread_consumption_cost'),


            'tbl_trims_piece_tag_item_cost' => $this->input->post('tag_cost'),
            'tbl_trims_piece_tag_item_consumption' => $this->input->post('tag_consumption'),
            'tbl_trims_piece_tag_item_rate' => $this->input->post('tag_consumption_rate'),
            'tbl_trims_piece_tag_item_total_cost' => $this->input->post('tag_consumption_cost'),

            'tbl_trims_piece_label_item_cost' => $this->input->post('label_cost'),
            'tbl_trims_piece_label_item_consumption' => $this->input->post('label_consumption'),
            'tbl_trims_piece_label_item_rate' => $this->input->post('label_consumption_rate'),
            'tbl_trims_piece_label_item_total_cost' => $this->input->post('label_consumption_cost'),

            'tbl_trims_piece_packing_item_cost' => $this->input->post('packing_cost'),
            'tbl_trims_piece_packing_item_consumption' => $this->input->post('packing_consumption'),
            'tbl_trims_piece_packing_item_rate' => $this->input->post('packing_consumption_rate'),
            'tbl_trims_piece_packing_item_total_cost' => $this->input->post('packing_consumption_cost'),

            'tbl_trims_piece_extra_1_item_cost' => $this->input->post('extra_1_piece_cost'),
            'tbl_trims_piece_extra_1_item_consumption' => $this->input->post('extra_1_piece_consumption'),
            'tbl_trims_piece_extra_1_item_rate' => $this->input->post('extra_1_piece_consumption_rate'),
            'tbl_trims_piece_extra_1_item_total_cost' => $this->input->post('extra_1_piece_consumption_cost'),

            'tbl_trims_piece_extra_2_item_cost' => $this->input->post('extra_2_piece_cost'),
            'tbl_trims_piece_extra_2_item_consumption' => $this->input->post('extra_2_piece_consumption'),
            'tbl_trims_piece_extra_2_item_rate' => $this->input->post('extra_2_piece_consumption_rate'),
            'tbl_trims_piece_extra_2_item_total_cost' => $this->input->post('extra_2_piece_consumption_cost'),

            'tbl_trims_piece_extra_3_item_cost' => $this->input->post('extra_3_piece_cost'),
            'tbl_trims_piece_extra_3_item_consumption' => $this->input->post('extra_3_piece_consumption'),
            'tbl_trims_piece_extra_3_item_rate' => $this->input->post('extra_3_piece_consumption_rate'),
            'tbl_trims_piece_extra_3_item_total_cost' => $this->input->post('extra_3_piece_consumption_cost'),

            'tbl_order_total_material_inc_wastage' => $this->input->post('order_total_material_inc_wastage'),
            'tbl_order_sewing' => $this->input->post('order_sewing'),
            'tbl_order_overheads' => $this->input->post('order_overheads'),

            'tbl_order_total_overhead_and_other_cost' => $this->input->post('total_overhead_and_other_hidden'),
            'tbl_total_cost' => $this->input->post('total_cost_hidden'),
            'tbl_total_price' => $this->input->post('final_price_hidden'),

        );


        $this->db->where('ics_order_id',$id);
        $this->db->update('woven_simple_costing',$ppnw_update_data);


        //Save Revision Data
        $ppnw_update_rev_data = array(
            'tbl_order_id_name' => $this->input->post('order_id'),
            'tbl_company_id' => $this->input->post('order_company'),
            'tbl_order_date' => $this->input->post('order_date'),
            'tbl_item_name' => $this->input->post('order_item_name'),
            'tbl_ref_name' => $this->input->post('order_ref_no'),

            'tbl_order_gsm' => $this->input->post('order_gsm'),
            'tbl_order_color' => $this->input->post('order_colour'),
            'tbl_order_usd' => $this->input->post('order_usd'),
            'tbl_order_wastage' => $this->input->post('order_wastage'),
            'tbl_order_margin' => $this->input->post('order_margin'),
            'tbl_order_quantity' => $this->input->post('order_quantity'),
            'tbl_order_transport' => $this->input->post('order_transport'),
            'tbl_order_bank_doc_charge' => $this->input->post('order_bank_document'),

            'tbl_dimension_body_height' => $this->input->post('order_body_h'),
            'tbl_dimension_body_height_allowance' => $this->input->post('order_body_h_allowance'),
            'tbl_dimension_body_height_total' => $this->input->post('order_body_h_total'),

            'tbl_dimension_body_width' => $this->input->post('order_body_w'),
            'tbl_dimension_body_width_allowance' => $this->input->post('order_body_w_allowance'),
            'tbl_dimension_body_width_total' => $this->input->post('order_body_w_total'),

            'tbl_dimension_body_panel' => $this->input->post('order_body_panel'),
            'tbl_dimension_body_panel_allowance' => $this->input->post('order_body_panel_allowance'),
            'tbl_dimension_body_panel_total' => $this->input->post('order_body_panel_total'),

            'tbl_dimension_handle_length' => $this->input->post('order_handle_l'),
            'tbl_dimension_handle_length_allowance' => $this->input->post('order_handle_l_allowance'),
            'tbl_dimension_handle_length_total' => $this->input->post('order_handle_l_total'),

            'tbl_dimension_handle_width' => $this->input->post('order_handle_w'),
            'tbl_dimension_handle_width_allowance' => $this->input->post('order_handle_w_allowance'),
            'tbl_dimension_handle_width_total' => $this->input->post('order_handle_w_total'),

            'tbl_dimension_pocket_length' => $this->input->post('order_pocket_l'),
            'tbl_dimension_pocket_length_allowance' => $this->input->post('order_pocket_l_allowance'),
            'tbl_dimension_pocket_length_total' => $this->input->post('order_pocket_l_total'),

            'tbl_dimension_pocket_width' => $this->input->post('order_pocket_w'),
            'tbl_dimension_pocket_width_allowance' => $this->input->post('order_pocket_w_allowance'),
            'tbl_dimension_pocket_width_total' => $this->input->post('order_pocket_w_total'),

            'tbl_dimension_extra_1_length' => $this->input->post('order_extra_1_l'),
            'tbl_dimension_extra_1_length_allowance' => $this->input->post('order_extra_1_l_allowance'),
            'tbl_dimension_extra_1_length_total' => $this->input->post('order_extra_1_l_total'),

            'tbl_dimension_extra_1_width' => $this->input->post('order_extra_1_w'),
            'tbl_dimension_extra_1_width_allowance' => $this->input->post('order_extra_1_w_allowance'),
            'tbl_dimension_extra_1_width_total' => $this->input->post('order_extra_1_w_total'),

            'tbl_dimension_extra_2_length' => $this->input->post('order_extra_2_l'),
            'tbl_dimension_extra_2_length_allowance' => $this->input->post('order_extra_2_l_allowance'),
            'tbl_dimension_extra_2_length_total' => $this->input->post('order_extra_2_l_total'),

            'tbl_dimension_extra_2_width' => $this->input->post('order_extra_2_w'),
            'tbl_dimension_extra_2_width_allowance' => $this->input->post('order_extra_2_w_allowance'),
            'tbl_dimension_extra_2_width_total' => $this->input->post('order_extra_2_w_total'),

            'tbl_dimension_extra_3_length' => $this->input->post('order_extra_3_l'),
            'tbl_dimension_extra_3_length_allowance' => $this->input->post('order_extra_3_l_allowance'),
            'tbl_dimension_extra_3_length_total' => $this->input->post('order_extra_3_l_total'),

            'tbl_dimension_extra_3_width' => $this->input->post('order_extra_3_w'),
            'tbl_dimension_extra_3_width_allowance' => $this->input->post('order_extra_3_w_allowance'),
            'tbl_dimension_extra_3_width_total' => $this->input->post('order_extra_3_w_total'),

            'tbl_order_ppnw_item_cost' => $this->input->post('ppnw_cost'),
            'tbl_order_ppnw_item_consumption' => $this->input->post('ppnw_consumption'),
            'tbl_order_ppnw_rate' => $this->input->post('ppnw_consumption_rate'),
            'tbl_order_ppnw_total_item_cost' => $this->input->post('ppnw_consumption_cost'),

            'tbl_trims_yard_zipper_item_cost' => $this->input->post('zipper_cost'),
            'tbl_trims_yard_zipper_item_consumption' => $this->input->post('zipper_consumption'),
            'tbl_trims_yard_zipper_item_rate' => $this->input->post('zipper_consumption_rate'),
            'tbl_trims_yard_zipper_item_total_cost' => $this->input->post('zipper_consumption_cost'),

            'tbl_trims_yard_webbing_item_cost' => $this->input->post('webbing_cost'),
            'tbl_trims_yard_webbing_item_consumption' => $this->input->post('webbing_consumption'),
            'tbl_trims_yard_webbing_item_rate' => $this->input->post('webbing_consumption_rate'),
            'tbl_trims_yard_webbing_item_total_cost' => $this->input->post('webbing_consumption_cost'),

            'tbl_trims_yard_draw_string_item_cost' => $this->input->post('draw_string_cost'),
            'tbl_trims_yard_draw_string_item_consumption' => $this->input->post('draw_string_consumption'),
            'tbl_trims_yard_draw_string_item_rate' => $this->input->post('draw_string_consumption_rate'),
            'tbl_trims_yard_draw_string_item_total_cost' => $this->input->post('draw_string_consumption_cost'),

            'tbl_trims_yard_velcro_item_cost' => $this->input->post('velcro_cost'),
            'tbl_trims_yard_velcro_item_consumption' => $this->input->post('velcro_consumption'),
            'tbl_trims_yard_velcro_item_rate' => $this->input->post('velcro_consumption_rate'),
            'tbl_trims_yard_velcro_item_total_cost' => $this->input->post('velcro_consumption_cost'),

            'tbl_trims_yard_tape_item_cost' => $this->input->post('tape_cost'),
            'tbl_trims_yard_tape_item_consumption' => $this->input->post('tape_consumption'),
            'tbl_trims_yard_tape_item_rate' => $this->input->post('tape_consumption_rate'),
            'tbl_trims_yard_tape_item_total_cost' => $this->input->post('tape_consumption_cost'),

            'tbl_trims_yard_extra_1_item_cost' => $this->input->post('extra_trim_yard_1_cost'),
            'tbl_trims_yard_extra_1_item_consumption' => $this->input->post('extra_trim_yard_1_consumption'),
            'tbl_trims_yard_extra_1_item_rate' => $this->input->post('extra_trim_yard_1_consumption_rate'),
            'tbl_trims_yard_extra_1_item_total_cost' => $this->input->post('extra_trim_yard_1_consumption_cost'),

            'tbl_trims_yard_extra_2_item_cost' => $this->input->post('extra_trim_yard_2_cost'),
            'tbl_trims_yard_extra_2_item_consumption' => $this->input->post('extra_trim_yard_2_consumption'),
            'tbl_trims_yard_extra_2_item_rate' => $this->input->post('extra_trim_yard_2_consumption_rate'),
            'tbl_trims_yard_extra_2_item_total_cost' => $this->input->post('extra_trim_yard_2_consumption_cost'),

            /***********Trims In Piece***********/
            'tbl_trims_piece_puller_item_cost' => $this->input->post('puller_cost'),
            'tbl_trims_piece_puller_item_consumption' => $this->input->post('puller_consumption'),
            'tbl_trims_piece_puller_item_rate' => $this->input->post('puller_consumption_rate'),
            'tbl_trims_piece_puller_item_total_cost' => $this->input->post('puller_consumption_cost'),

            'tbl_trims_piece_print_item_cost' => $this->input->post('print_cost'),
            'tbl_trims_piece_print_item_consumption' => $this->input->post('print_consumption'),
            'tbl_trims_piece_print_item_rate' => $this->input->post('print_consumption_rate'),
            'tbl_trims_piece_print_item_total_cost' => $this->input->post('print_consumption_cost'),

            'tbl_trims_piece_eyelet_item_cost' => $this->input->post('eyelet_cost'),
            'tbl_trims_piece_eyelet_item_consumption' => $this->input->post('eyelet_consumption'),
            'tbl_trims_piece_eyelet_item_rate' => $this->input->post('eyelet_consumption_rate'),
            'tbl_trims_piece_eyelet_item_total_cost' => $this->input->post('eyelet_consumption_cost'),

            'tbl_trims_piece_buckle_item_cost' => $this->input->post('buckle_cost'),
            'tbl_trims_piece_buckle_item_consumption' => $this->input->post('buckle_consumption'),
            'tbl_trims_piece_buckle_item_rate' => $this->input->post('buckle_consumption_rate'),
            'tbl_trims_piece_buckle_item_total_cost' => $this->input->post('buckle_consumption_cost'),

            'tbl_trims_piece_snap_button_item_cost' => $this->input->post('snap_button_cost'),
            'tbl_trims_piece_snap_button_item_consumption' => $this->input->post('snap_button_consumption'),
            'tbl_trims_piece_snap_button_item_rate' => $this->input->post('snap_button_consumption_rate'),
            'tbl_trims_piece_snap_button_item_total_cost' => $this->input->post('snap_button_consumption_cost'),

            'tbl_trims_piece_magnetic_button_item_cost' => $this->input->post('magnetic_button_cost'),
            'tbl_trims_piece_magnetic_button_item_consumption' => $this->input->post('magnetic_button_consumption'),
            'tbl_trims_piece_magnetic_button_item_rate' => $this->input->post('magnetic_button_consumption_rate'),
            'tbl_trims_piece_magnetic_button_item_total_cost' => $this->input->post('magnetic_button_consumption_cost'),

            'tbl_trims_piece_bottom_base_item_cost' => $this->input->post('bottom_base_cost'),
            'tbl_trims_piece_bottom_base_item_consumption' => $this->input->post('bottom_base_consumption'),
            'tbl_trims_piece_bottom_base_item_rate' => $this->input->post('bottom_base_consumption_rate'),
            'tbl_trims_piece_bottom_base_item_total_cost' => $this->input->post('bottom_base_consumption_cost'),

            'tbl_trims_piece_thread_item_cost' => $this->input->post('thread_cost'),
            'tbl_trims_piece_thread_item_consumption' => $this->input->post('thread_consumption'),
            'tbl_trims_piece_thread_item_rate' => $this->input->post('thread_consumption_rate'),
            'tbl_trims_piece_thread_item_total_cost' => $this->input->post('thread_consumption_cost'),


            'tbl_trims_piece_tag_item_cost' => $this->input->post('tag_cost'),
            'tbl_trims_piece_tag_item_consumption' => $this->input->post('tag_consumption'),
            'tbl_trims_piece_tag_item_rate' => $this->input->post('tag_consumption_rate'),
            'tbl_trims_piece_tag_item_total_cost' => $this->input->post('tag_consumption_cost'),

            'tbl_trims_piece_label_item_cost' => $this->input->post('label_cost'),
            'tbl_trims_piece_label_item_consumption' => $this->input->post('label_consumption'),
            'tbl_trims_piece_label_item_rate' => $this->input->post('label_consumption_rate'),
            'tbl_trims_piece_label_item_total_cost' => $this->input->post('label_consumption_cost'),

            'tbl_trims_piece_packing_item_cost' => $this->input->post('packing_cost'),
            'tbl_trims_piece_packing_item_consumption' => $this->input->post('packing_consumption'),
            'tbl_trims_piece_packing_item_rate' => $this->input->post('packing_consumption_rate'),
            'tbl_trims_piece_packing_item_total_cost' => $this->input->post('packing_consumption_cost'),

            'tbl_trims_piece_extra_1_item_cost' => $this->input->post('extra_1_piece_cost'),
            'tbl_trims_piece_extra_1_item_consumption' => $this->input->post('extra_1_piece_consumption'),
            'tbl_trims_piece_extra_1_item_rate' => $this->input->post('extra_1_piece_consumption_rate'),
            'tbl_trims_piece_extra_1_item_total_cost' => $this->input->post('extra_1_piece_consumption_cost'),

            'tbl_trims_piece_extra_2_item_cost' => $this->input->post('extra_2_piece_cost'),
            'tbl_trims_piece_extra_2_item_consumption' => $this->input->post('extra_2_piece_consumption'),
            'tbl_trims_piece_extra_2_item_rate' => $this->input->post('extra_2_piece_consumption_rate'),
            'tbl_trims_piece_extra_2_item_total_cost' => $this->input->post('extra_2_piece_consumption_cost'),

            'tbl_trims_piece_extra_3_item_cost' => $this->input->post('extra_3_piece_cost'),
            'tbl_trims_piece_extra_3_item_consumption' => $this->input->post('extra_3_piece_consumption'),
            'tbl_trims_piece_extra_3_item_rate' => $this->input->post('extra_3_piece_consumption_rate'),
            'tbl_trims_piece_extra_3_item_total_cost' => $this->input->post('extra_3_piece_consumption_cost'),

            'tbl_order_total_material_inc_wastage' => $this->input->post('order_total_material_inc_wastage'),
            'tbl_order_sewing' => $this->input->post('order_sewing'),
            'tbl_order_overheads' => $this->input->post('order_overheads'),

            'tbl_order_total_overhead_and_other_cost' => $this->input->post('total_overhead_and_other_hidden'),
            'tbl_total_cost' => $this->input->post('total_cost_hidden'),
            'tbl_total_price' => $this->input->post('final_price_hidden'),

            'tbl_modification_date' => date("Y-m-d"),
            'tbl_modification_time' => date("h:i:sa"),
            'tbl_ics_order_id' => $id,
        );

        $this->db->insert('woven_simple_costing_rev',$ppnw_update_rev_data);




    }


    /*
     * @param $id
     * @return mixed
     */

    function show_single_costing_by_user($user_id, $id){
        $this->db->select('*');
        $this->db->from('woven_simple_costing');
        $this->db->join('costing_by_user','costing_by_user.costing_user_woven_simple = woven_simple_costing.ics_order_id');
        $this->db->join('users','costing_by_user.costing_user_id = users.id');
        $this->db->where('users.id', $user_id);
        $this->db->where('woven_simple_costing.ics_order_id', $id);
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
    function delete_woven_simple_costing($ppnw_costing_id)
    {
        $this->db->where('ics_order_id',$ppnw_costing_id);
        $this->db->delete('woven_simple_costing');
    }
}