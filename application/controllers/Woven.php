<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Woven extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('ppnw_model');
        $this->load->model('woven_model');

        $username = $this->session->userdata('username');
        $this->data['employee'] = $this->admin_model->get_user_employee($username);

        //$this->data['ppnw_all_costing'] = $this->ppnw_model->gel_all_ppnw_costing();
        $this->data['woven_all_costing'] = $this->woven_model->gel_all_woven_costing($username);
        $this->data['woven_all_count'] = $this->woven_model->woven_total_count_by_user($username);
    }


    /************************************************/
    /*****************Woven***************************/
    /************************************************/
    /**
     * Show All Woven Costing in a page of a Particular user
     */

    public function woven_all(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('login/index', 'refresh');
        } else {
            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_woven_all_view', $this->data);
            $this->load->view('admin/admin_footer_view');
        }
    }


    public function revision_woven_costing($id){

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('login/index', 'refresh');
        } else {
            $this->data['revision_single_woven_costing'] = $this->woven_model->all_revisions_single_woven_costing($id);
            //var_dump($this->data['revision_single_woven_costing']);
            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_woven_single_user_rev_view', $this->data);
            $this->load->view('admin/admin_footer_view');
        }
    }

    /**
     *Edit the PPNw Costing
     */
    public function single_revision_woven_costing($id){
        $woven_costing_id = $this->uri->segment(3);
        if ($woven_costing_id == NULL) {
            redirect('woven/woven_all');
        }

        //$dt = $this->ppnw_model->single_revisions_single_ppnw_costing();
        $dt = $this->woven_model->single_revision_woven_costing($woven_costing_id);
        //var_dump($dt);
        $data['woven_order_id'] = $dt->tbl_woven_order_id;
        $data['woven_id_name'] = $dt->tbl_woven_id_name;
        $data['woven_company_name'] = $dt->tbl_woven_company_name;
        $data['woven_order_date'] = $dt->tbl_woven_order_date;
        $data['woven_item_name'] = $dt->tbl_woven_item_name;
        $data['woven_ref_name'] = $dt->tbl_woven_ref_name;

        $data['woven_order_gsm'] = $dt->tbl_woven_order_gsm;
        $data['woven_order_color'] = $dt->tbl_woven_order_color;
        $data['woven_order_usd'] = $dt->tbl_woven_order_usd;

        $data['woven_order_wastage'] = $dt->tbl_woven_order_wastage;
        $data['woven_order_margin'] = $dt->tbl_woven_order_margin;

        $data['woven_order_quantity'] = $dt->tbl_woven_order_quantity;
        $data['woven_order_transport'] = $dt->tbl_woven_order_transport;
        $data['woven_order_bank_doc_charge'] = $dt->tbl_woven_order_bank_doc_charge;
        $data['woven_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;

        $data['woven_order_sewing'] = $dt->tbl_order_sewing;
        $data['woven_order_overheads'] = $dt->tbl_order_overheads;

        $data['woven_order_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;
        $data['woven_order_total_overhead_and_other_cost'] = $dt->tbl_order_total_overhead_and_other_cost;
        $data['woven_total_cost'] = $dt->tbl_total_cost;
        $data['woven_total_price'] = $dt->tbl_total_price;

        //Body Material Name
        $data['woven_body_material_1_name'] = $dt->tbl_woven_body_material_1_name;
        $data['woven_body_material_2_name'] = $dt->tbl_woven_body_material_2_name;
        $data['woven_body_material_3_name'] = $dt->tbl_woven_body_material_3_name;
        $data['woven_body_material_4_name'] = $dt->tbl_woven_body_material_4_name;
        $data['woven_body_material_5_name'] = $dt->tbl_woven_body_material_5_name;
        $data['woven_body_material_6_name'] = $dt->tbl_woven_body_material_6_name;

        //Body Material Roll Width
        $data['woven_body_material_1_roll_width'] = $dt->tbl_woven_body_material_1_roll_width;
        $data['woven_body_material_2_roll_width'] = $dt->tbl_woven_body_material_2_roll_width;
        $data['woven_body_material_3_roll_width'] = $dt->tbl_woven_body_material_3_roll_width;
        $data['woven_body_material_4_roll_width'] = $dt->tbl_woven_body_material_4_roll_width;
        $data['woven_body_material_5_roll_width'] = $dt->tbl_woven_body_material_5_roll_width;
        $data['woven_body_material_6_roll_width'] = $dt->tbl_woven_body_material_6_roll_width;

        //Body Material 1 consumption cost
        $data['woven_body_material_1_cost'] = $dt->tbl_woven_body_material_1_cost;
        $data['woven_body_material_1_consumption'] = $dt->tbl_woven_body_material_1_consumption;
        $data['woven_body_material_1_rate'] = $dt->tbl_woven_body_material_1_rate;
        $data['woven_body_material_1_total_cost'] = $dt->tbl_woven_body_material_1_total_cost;

        //Body Material 2 consumption cost
        $data['woven_body_material_2_cost'] = $dt->tbl_woven_body_material_2_cost;
        $data['woven_body_material_2_consumption'] = $dt->tbl_woven_body_material_2_consumption;
        $data['woven_body_material_2_rate'] = $dt->tbl_woven_body_material_2_rate;
        $data['woven_body_material_2_total_cost'] = $dt->tbl_woven_body_material_2_total_cost;

        //Body Material 3 consumption cost
        $data['woven_body_material_3_cost'] = $dt->tbl_woven_body_material_3_cost;
        $data['woven_body_material_3_consumption'] = $dt->tbl_woven_body_material_3_consumption;
        $data['woven_body_material_3_rate'] = $dt->tbl_woven_body_material_3_rate;
        $data['woven_body_material_3_total_cost'] = $dt->tbl_woven_body_material_3_total_cost;

        //Body Material 4 consumption cost
        $data['woven_body_material_4_cost'] = $dt->tbl_woven_body_material_4_cost;
        $data['woven_body_material_4_consumption'] = $dt->tbl_woven_body_material_4_consumption;
        $data['woven_body_material_4_rate'] = $dt->tbl_woven_body_material_4_rate;
        $data['woven_body_material_4_total_cost'] = $dt->tbl_woven_body_material_4_total_cost;

        //Body Material 5 consumption cost
        $data['woven_body_material_5_cost'] = $dt->tbl_woven_body_material_5_cost;
        $data['woven_body_material_5_consumption'] = $dt->tbl_woven_body_material_5_consumption;
        $data['woven_body_material_5_rate'] = $dt->tbl_woven_body_material_5_rate;
        $data['woven_body_material_5_total_cost'] = $dt->tbl_woven_body_material_5_total_cost;

        //Body Material 6 consumption cost
        $data['woven_body_material_6_cost'] = $dt->tbl_woven_body_material_6_cost;
        $data['woven_body_material_6_consumption'] = $dt->tbl_woven_body_material_6_consumption;
        $data['woven_body_material_6_rate'] = $dt->tbl_woven_body_material_6_rate;
        $data['woven_body_material_6_total_cost'] = $dt->tbl_woven_body_material_6_total_cost;


        $data['zipper_cost'] = $dt->tbl_woven_trims_yard_zipper_item_cost;
        $data['zipper_consumption'] = $dt->tbl_woven_trims_yard_zipper_item_consumption;
        $data['zipper_consumption_rate'] = $dt->tbl_woven_trims_yard_zipper_item_rate;
        $data['zipper_consumption_cost'] = $dt->tbl_woven_trims_yard_zipper_item_total_cost;


        $data['woven_trims_yard_two_inch_webbing_item_cost'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_cost;
        $data['woven_trims_yard_two_inch_webbing_item_consumption'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_consumption;
        $data['woven_trims_yard_two_inch_webbing_item_rate'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_rate;
        $data['woven_trims_yard_two_inch_webbing_item_total_cost'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_total_cost;

        $data['woven_trims_yard_one_and_half_inch_webbing_item_cost'] = $dt->tbl_woven_trims_yard_one_and_half_inch_webbing_item_cost;
        $data['woven_trims_yard_one_and_half_webbing_item_consumption'] = $dt->tbl_woven_trims_yard_one_and_half_webbing_item_consumption;
        $data['woven_trims_yard_one_and_half_webbing_item_rate'] = $dt->tbl_woven_trims_yard_one_and_half_webbing_item_rate;
        $data['woven_trims_yard_one_and_half_webbing_item_total_cost'] = $dt->tbl_woven_trims_yard_one_and_half_webbing_item_total_cost;

        $data['woven_trims_yard_velcro_item_cost'] = $dt->tbl_woven_trims_yard_velcro_item_cost;
        $data['woven_trims_yard_velcro_item_consumption'] = $dt->tbl_woven_trims_yard_velcro_item_consumption;
        $data['woven_trims_yard_velcro_item_rate'] = $dt->tbl_woven_trims_yard_velcro_item_rate;
        $data['woven_trims_yard_velcro_item_total_cost'] = $dt->tbl_woven_trims_yard_velcro_item_total_cost;


        $data['extra_trim_yard_extra_1_name'] = $dt->tbl_woven_trims_yard_extra_1_name;
        $data['extra_trim_yard_extra_2_name'] = $dt->tbl_woven_trims_yard_extra_2_name;
        $data['extra_trim_yard_extra_3_name'] = $dt->tbl_woven_trims_yard_extra_3_name;


        $data['woven_trims_yard_extra_1_item_cost'] = $dt->tbl_woven_trims_yard_extra_1_item_cost;
        $data['woven_trims_yard_extra_1_item_consumption'] = $dt->tbl_woven_trims_yard_extra_1_item_consumption;
        $data['woven_trims_yard_extra_1_item_rate'] = $dt->tbl_woven_trims_yard_extra_1_item_rate;
        $data['woven_trims_yard_extra_1_item_total_cost'] = $dt->tbl_woven_trims_yard_extra_1_item_total_cost;

        $data['woven_trims_yard_extra_2_item_cost'] = $dt->tbl_woven_trims_yard_extra_2_item_cost;
        $data['woven_trims_yard_extra_2_item_consumption'] = $dt->tbl_woven_trims_yard_extra_2_item_consumption;
        $data['woven_trims_yard_extra_2_item_rate'] = $dt->tbl_woven_trims_yard_extra_2_item_rate;
        $data['woven_trims_yard_extra_2_item_total_cost'] = $dt->tbl_woven_trims_yard_extra_2_item_total_cost;

        $data['woven_trims_yard_extra_3_item_cost'] = $dt->tbl_woven_trims_yard_extra_3_item_cost;
        $data['woven_trims_yard_extra_3_item_consumption'] = $dt->tbl_woven_trims_yard_extra_3_item_consumption;
        $data['woven_trims_yard_extra_3_item_rate'] = $dt->tbl_woven_trims_yard_extra_3_item_rate;
        $data['woven_trims_yard_extra_3_item_total_cost'] = $dt->tbl_woven_trims_yard_extra_3_item_total_cost;


        $data['woven_trims_piece_puller_item_cost'] = $dt->tbl_woven_trims_piece_puller_item_cost;
        $data['woven_trims_piece_puller_item_consumption'] = $dt->tbl_woven_trims_piece_puller_item_consumption;
        $data['woven_trims_piece_puller_item_rate'] = $dt->tbl_woven_trims_piece_puller_item_rate;
        $data['woven_trims_piece_puller_item_total_cost'] = $dt->tbl_woven_trims_piece_puller_item_total_cost;


        $data['woven_trims_piece_print_item_cost'] = $dt->tbl_woven_trims_piece_print_item_cost;
        $data['woven_trims_piece_print_item_consumption'] = $dt->tbl_woven_trims_piece_print_item_consumption;
        $data['woven_trims_piece_print_item_rate'] = $dt->tbl_woven_trims_piece_print_item_rate;
        $data['woven_trims_piece_print_item_total_cost'] = $dt->tbl_woven_trims_piece_print_item_total_cost;

        $data['woven_trims_piece_d_buckle_item_cost'] = $dt->tbl_woven_trims_piece_d_buckle_item_cost;
        $data['woven_trims_piece_d_buckle_item_consumption'] = $dt->tbl_woven_trims_piece_d_buckle_item_consumption;
        $data['woven_trims_piece_d_buckle_item_rate'] = $dt->tbl_woven_trims_piece_d_buckle_item_rate;
        $data['woven_trims_piece_d_buckle_item_total_cost'] = $dt->tbl_woven_trims_piece_d_buckle_item_total_cost;

        $data['woven_trims_piece_swivel_hook_item_cost'] = $dt->tbl_woven_trims_piece_swivel_hook_item_cost;
        $data['woven_trims_piece_swivel_hook_item_consumption'] = $dt->tbl_woven_trims_piece_swivel_hook_item_consumption;
        $data['woven_trims_piece_swivel_hook_item_rate'] = $dt->tbl_woven_trims_piece_swivel_hook_item_rate;
        $data['woven_trims_piece_swivel_hook_item_total_cost'] = $dt->tbl_woven_trims_piece_swivel_hook_item_total_cost;

        $data['woven_trims_piece_adjustable_bukle_item_cost'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_cost;
        $data['woven_trims_piece_adjustable_bukle_item_consumption'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_consumption;
        $data['woven_trims_piece_adjustable_bukle_item_rate'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_rate;
        $data['woven_trims_piece_adjustable_bukle_item_total_cost'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_total_cost;


        $data['woven_trims_piece_magnetic_button_item_cost'] = $dt->tbl_woven_trims_piece_magnetic_button_item_cost;
        $data['woven_trims_piece_magnetic_button_item_consumption'] = $dt->tbl_woven_trims_piece_magnetic_button_item_consumption;
        $data['woven_trims_piece_magnetic_button_item_rate'] = $dt->tbl_woven_trims_piece_magnetic_button_item_rate;
        $data['woven_trims_piece_magnetic_button_item_total_cost'] = $dt->tbl_woven_trims_piece_magnetic_button_item_total_cost;

        $data['woven_trims_piece_snap_button_item_cost'] = $dt->tbl_woven_trims_piece_snap_button_item_cost;
        $data['woven_trims_piece_snap_button_item_consumption'] = $dt->tbl_woven_trims_piece_snap_button_item_consumption;
        $data['woven_trims_piece_snap_button_item_rate'] = $dt->tbl_woven_trims_piece_snap_button_item_rate;
        $data['woven_trims_piece_snap_button_item_total_cost'] = $dt->tbl_woven_trims_piece_snap_button_item_total_cost;

        $data['woven_trims_piece_rivet_item_cost'] = $dt->tbl_woven_trims_piece_rivet_item_cost;
        $data['woven_trims_piece_rivet_item_consumption'] = $dt->tbl_woven_trims_piece_rivet_item_consumption;
        $data['woven_trims_piece_rivet_item_rate'] = $dt->tbl_woven_trims_piece_rivet_item_rate;
        $data['woven_trims_piece_rivet_item_total_cost'] = $dt->tbl_woven_trims_piece_rivet_item_total_cost;

        $data['woven_trims_piece_bottom_base_item_cost'] = $dt->tbl_woven_trims_piece_bottom_base_item_cost;
        $data['woven_trims_piece_bottom_base_item_consumption'] = $dt->tbl_woven_trims_piece_bottom_base_item_consumption;
        $data['woven_trims_piece_bottom_base_item_rate'] = $dt->tbl_woven_trims_piece_bottom_base_item_rate;
        $data['woven_trims_piece_bottom_base_item_total_cost'] = $dt->tbl_woven_trims_piece_bottom_base_item_total_cost;

        $data['woven_trims_piece_thread_item_cost'] = $dt->tbl_woven_trims_piece_thread_item_cost;
        $data['woven_trims_piece_thread_item_consumption'] = $dt->tbl_woven_trims_piece_thread_item_consumption;
        $data['woven_trims_piece_thread_item_rate'] = $dt->tbl_woven_trims_piece_thread_item_rate;
        $data['woven_trims_piece_thread_item_total_cost'] = $dt->tbl_woven_trims_piece_thread_item_total_cost;

        $data['woven_trims_piece_tag_item_cost'] = $dt->tbl_woven_trims_piece_tag_item_cost;
        $data['woven_trims_piece_tag_item_consumption'] = $dt->tbl_woven_trims_piece_tag_item_consumption;
        $data['woven_trims_piece_tag_item_rate'] = $dt->tbl_woven_trims_piece_tag_item_rate;
        $data['woven_trims_piece_tag_item_total_cost'] = $dt->tbl_woven_trims_piece_tag_item_total_cost;

        $data['woven_trims_piece_label_item_cost'] = $dt->tbl_woven_trims_piece_label_item_cost;
        $data['woven_trims_piece_label_item_consumption'] = $dt->tbl_woven_trims_piece_label_item_consumption;
        $data['woven_trims_piece_label_item_rate'] = $dt->tbl_woven_trims_piece_label_item_rate;
        $data['woven_trims_piece_label_item_total_cost'] = $dt->tbl_woven_trims_piece_label_item_total_cost;

        $data['woven_trims_piece_packing_item_cost'] = $dt->tbl_woven_trims_piece_packing_item_cost;
        $data['woven_trims_piece_packing_item_consumption'] = $dt->tbl_woven_trims_piece_packing_item_consumption;
        $data['woven_trims_piece_packing_item_rate'] = $dt->tbl_woven_trims_piece_packing_item_rate;
        $data['woven_trims_piece_packing_item_total_cost'] = $dt->tbl_woven_trims_piece_packing_item_total_cost;

        $data['woven_trims_piece_bottom_shoe_item_cost'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_cost;
        $data['woven_trims_piece_bottom_shoe_item_consumption'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_consumption;
        $data['woven_trims_piece_bottom_shoe_item_rate'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_rate;
        $data['woven_trims_piece_bottom_shoe_item_total_cost'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_total_cost;

        $data['woven_trims_piece_extra_1_name'] = $dt->tbl_woven_trims_piece_extra_1_name;
        $data['woven_trims_piece_extra_1_item_cost'] = $dt->tbl_woven_trims_piece_extra_1_item_cost;
        $data['woven_trims_piece_extra_1_item_consumption'] = $dt->tbl_woven_trims_piece_extra_1_item_consumption;
        $data['woven_trims_piece_extra_1_item_rate'] = $dt->tbl_woven_trims_piece_extra_1_item_rate;
        $data['woven_trims_piece_extra_1_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_1_item_total_cost;

        $data['woven_trims_piece_extra_2_name'] = $dt->tbl_woven_trims_piece_extra_2_name;
        $data['woven_trims_piece_extra_2_item_cost'] = $dt->tbl_woven_trims_piece_extra_2_item_cost;
        $data['woven_trims_piece_extra_2_item_consumption'] = $dt->tbl_woven_trims_piece_extra_2_item_consumption;
        $data['woven_trims_piece_extra_2_item_rate'] = $dt->tbl_woven_trims_piece_extra_2_item_rate;
        $data['woven_trims_piece_extra_2_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_2_item_total_cost;

        $data['woven_trims_piece_extra_3_name'] = $dt->tbl_woven_trims_piece_extra_3_name;
        $data['woven_trims_piece_extra_3_item_cost'] = $dt->tbl_woven_trims_piece_extra_3_item_cost;
        $data['woven_trims_piece_extra_3_item_consumption'] = $dt->tbl_woven_trims_piece_extra_3_item_consumption;
        $data['woven_trims_piece_extra_3_item_rate'] = $dt->tbl_woven_trims_piece_extra_3_item_rate;
        $data['woven_trims_piece_extra_3_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_3_item_total_cost;

        $data['woven_trims_piece_extra_4_name'] = $dt->tbl_woven_trims_piece_extra_4_name;
        $data['woven_trims_piece_extra_4_item_cost'] = $dt->tbl_woven_trims_piece_extra_4_item_cost;
        $data['woven_trims_piece_extra_4_item_consumption'] = $dt->tbl_woven_trims_piece_extra_4_item_consumption;
        $data['woven_trims_piece_extra_4_item_rate'] = $dt->tbl_woven_trims_piece_extra_4_item_rate;
        $data['woven_trims_piece_extra_4_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_4_item_total_cost;

        $data['woven_trims_piece_extra_5_name'] = $dt->tbl_woven_trims_piece_extra_5_name;
        $data['woven_trims_piece_extra_5_item_cost'] = $dt->tbl_woven_trims_piece_extra_5_item_cost;
        $data['woven_trims_piece_extra_5_item_consumption'] = $dt->tbl_woven_trims_piece_extra_5_item_consumption;
        $data['woven_trims_piece_extra_5_item_rate'] = $dt->tbl_woven_trims_piece_extra_5_item_rate;
        $data['woven_trims_piece_extra_5_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_5_item_total_cost;


        //Dimension for Body Material 1
        $data['dimension_id'] = $dt->tbl_dimension_id;


        $data['body_material_first_extra_1'] = $dt->tbl_dimnesion_body_material_first_extra_1;
        $data['body_material_first_extra_2'] = $dt->tbl_dimnesion_body_material_first_extra_2;
        $data['body_material_first_extra_3'] = $dt->tbl_dimnesion_body_material_first_extra_3;
        $data['body_material_second_extra_1'] = $dt->tbl_dimnesion_body_material_second_extra_1;
        $data['body_material_second_extra_2'] = $dt->tbl_dimnesion_body_material_second_extra_2;
        $data['body_material_second_extra_3'] = $dt->tbl_dimnesion_body_material_second_extra_3;



        $data['body_material_1_front_length'] = $dt->tbl_dimension_body_material_1_front_length;
        $data['body_material_1_front_length_allowance'] = $dt->tbl_dimension_body_material_1_front_length_allowance;
        $data['body_material_1_front_length_total'] = $dt->tbl_dimension_body_material_1_front_length_total;

        $data['body_material_1_front_width'] = $dt->tbl_dimension_body_material_1_front_width;
        $data['body_material_1_front_width_allowance'] = $dt->tbl_dimension_body_material_1_front_width_allowance;
        $data['body_material_1_front_width_total'] = $dt->tbl_dimension_body_material_1_front_width_total;

        $data['body_material_1_back_length'] = $dt->tbl_dimension_body_material_1_back_length;
        $data['body_material_1_back_length_allowance'] = $dt->tbl_dimension_body_material_1_back_length_allowance;
        $data['body_material_1_back_length_total'] = $dt->tbl_dimension_body_material_1_back_length_total;

        $data['body_material_1_back_width'] = $dt->tbl_dimension_body_material_1_back_width;
        $data['body_material_1_back_width_allowance'] = $dt->tbl_dimension_body_material_1_back_width_allowance;
        $data['body_material_1_back_width_total'] = $dt->tbl_dimension_body_material_1_back_width_total;

        $data['body_material_1_top_length'] = $dt->tbl_dimension_body_material_1_top_length;
        $data['body_material_1_top_length_allowance'] = $dt->tbl_dimension_body_material_1_top_length_allowance;
        $data['body_material_1_top_length_total'] = $dt->tbl_dimension_body_material_1_top_length_total;

        $data['body_material_1_top_width'] = $dt->tbl_dimension_body_material_1_top_width;
        $data['body_material_1_top_width_allowance'] = $dt->tbl_dimension_body_material_1_top_width_allowance;
        $data['body_material_1_top_width_total'] = $dt->tbl_dimension_body_material_1_top_width_total;

        $data['body_material_1_bottom_length'] = $dt->tbl_dimension_body_material_1_bottom_length;
        $data['body_material_1_bottom_length_allowance'] = $dt->tbl_dimension_body_material_1_bottom_length_allowance;
        $data['body_material_1_bottom_length_total'] = $dt->tbl_dimension_body_material_1_bottom_length_total;

        $data['body_material_1_bottom_width'] = $dt->tbl_dimension_body_material_1_bottom_width;
        $data['body_material_1_bottom_width_allowance'] = $dt->tbl_dimension_body_material_1_bottom_width_allowance;
        $data['body_material_1_bottom_width_total'] = $dt->tbl_dimension_body_material_1_bottom_width_total;

        $data['body_material_1_left_length'] = $dt->tbl_dimension_body_material_1_left_length;
        $data['body_material_1_left_length_allowance'] = $dt->tbl_dimension_body_material_1_left_length_allowance;
        $data['body_material_1_left_length_total'] = $dt->tbl_dimension_body_material_1_left_length_total;

        $data['body_material_1_left_width'] = $dt->tbl_dimension_body_material_1_left_width;
        $data['body_material_1_left_width_allowance'] = $dt->tbl_dimension_body_material_1_left_width_allowance;
        $data['body_material_1_left_width_total'] = $dt->tbl_dimension_body_material_1_left_width_total;

        $data['body_material_1_right_length'] = $dt->tbl_dimension_body_material_1_right_length;
        $data['body_material_1_right_length_allowance'] = $dt->tbl_dimension_body_material_1_right_length_allowance;
        $data['body_material_1_right_length_total'] = $dt->tbl_dimension_body_material_1_right_length_total;

        $data['body_material_1_right_width'] = $dt->tbl_dimension_body_material_1_right_width;
        $data['body_material_1_right_width_allowance'] = $dt->tbl_dimension_body_material_1_right_width_allowance;
        $data['body_material_1_right_width_total'] = $dt->tbl_dimension_body_material_1_right_width_total;

        $data['body_material_1_pocket_length'] = $dt->tbl_dimension_body_material_1_pocket_length;
        $data['body_material_1_pocket_length_allowance'] = $dt->tbl_dimension_body_material_1_pocket_length_allowance;
        $data['body_material_1_pocket_length_total'] = $dt->tbl_dimension_body_material_1_pocket_length_total;

        $data['body_material_1_pocket_width'] = $dt->tbl_dimension_body_material_1_pocket_width;
        $data['body_material_1_pocket_width_allowance'] = $dt->tbl_dimension_body_material_1_pocket_width_allowance;
        $data['body_material_1_pocket_width_total'] = $dt->tbl_dimension_body_material_1_pocket_width_total;

        $data['body_material_1_extra_1_length'] = $dt->tbl_dimension_body_material_1_extra_1_length;
        $data['body_material_1_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_1_extra_1_length_allowance;
        $data['body_material_1_extra_1_length_total'] = $dt->tbl_dimension_body_material_1_extra_1_length_total;

        $data['body_material_1_extra_1_width'] = $dt->tbl_dimension_body_material_1_extra_1_width;
        $data['body_material_1_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_1_extra_1_width_allowance;
        $data['body_material_1_extra_1_width_total'] = $dt->tbl_dimension_body_material_1_extra_1_width_total;

        $data['body_material_1_extra_2_length'] = $dt->tbl_dimension_body_material_1_extra_2_length;
        $data['body_material_1_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_1_extra_2_length_allowance;
        $data['body_material_1_extra_2_length_total'] = $dt->tbl_dimension_body_material_1_extra_2_length_total;

        $data['body_material_1_extra_2_width'] = $dt->tbl_dimension_body_material_1_extra_2_width;
        $data['body_material_1_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_1_extra_2_width_allowance;
        $data['body_material_1_extra_2_width_total'] = $dt->tbl_dimension_body_material_1_extra_2_width_total;

        $data['body_material_1_extra_3_length'] = $dt->tbl_dimension_body_material_1_extra_3_length;
        $data['body_material_1_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_1_extra_3_length_allowance;
        $data['body_material_1_extra_3_length_total'] = $dt->tbl_dimension_body_material_1_extra_3_length_total;

        $data['body_material_1_extra_3_width'] = $dt->tbl_dimension_body_material_1_extra_3_width;
        $data['body_material_1_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_1_extra_3_width_allowance;
        $data['body_material_1_extra_3_width_total'] = $dt->tbl_dimension_body_material_1_extra_3_width_total;

        //Dimension for Body Material 2
        $data['body_material_2_front_length'] = $dt->tbl_dimension_body_material_2_front_length;
        $data['body_material_2_front_length_allowance'] = $dt->tbl_dimension_body_material_2_front_length_allowance;
        $data['body_material_2_front_length_total'] = $dt->tbl_dimension_body_material_2_front_length_total;

        $data['body_material_2_front_width'] = $dt->tbl_dimension_body_material_2_front_width;
        $data['body_material_2_front_width_allowance'] = $dt->tbl_dimension_body_material_2_front_width_allowance;
        $data['body_material_2_front_width_total'] = $dt->tbl_dimension_body_material_2_front_width_total;

        $data['body_material_2_back_length'] = $dt->tbl_dimension_body_material_2_back_length;
        $data['body_material_2_back_length_allowance'] = $dt->tbl_dimension_body_material_2_back_length_allowance;
        $data['body_material_2_back_length_total'] = $dt->tbl_dimension_body_material_2_back_length_total;

        $data['body_material_2_back_width'] = $dt->tbl_dimension_body_material_2_back_width;
        $data['body_material_2_back_width_allowance'] = $dt->tbl_dimension_body_material_2_back_width_allowance;
        $data['body_material_2_back_width_total'] = $dt->tbl_dimension_body_material_2_back_width_total;

        $data['body_material_2_top_length'] = $dt->tbl_dimension_body_material_2_top_length;
        $data['body_material_2_top_length_allowance'] = $dt->tbl_dimension_body_material_2_top_length_allowance;
        $data['body_material_2_top_length_total'] = $dt->tbl_dimension_body_material_2_top_length_total;

        $data['body_material_2_top_width'] = $dt->tbl_dimension_body_material_2_top_width;
        $data['body_material_2_top_width_allowance'] = $dt->tbl_dimension_body_material_2_top_width_allowance;
        $data['body_material_2_top_width_total'] = $dt->tbl_dimension_body_material_2_top_width_total;

        $data['body_material_2_bottom_length'] = $dt->tbl_dimension_body_material_2_bottom_length;
        $data['body_material_2_bottom_length_allowance'] = $dt->tbl_dimension_body_material_2_bottom_length_allowance;
        $data['body_material_2_bottom_length_total'] = $dt->tbl_dimension_body_material_2_bottom_length_total;

        $data['body_material_2_bottom_width'] = $dt->tbl_dimension_body_material_2_bottom_width;
        $data['body_material_2_bottom_width_allowance'] = $dt->tbl_dimension_body_material_2_bottom_width_allowance;
        $data['body_material_2_bottom_width_total'] = $dt->tbl_dimension_body_material_2_bottom_width_total;

        $data['body_material_2_left_length'] = $dt->tbl_dimension_body_material_2_left_length;
        $data['body_material_2_left_length_allowance'] = $dt->tbl_dimension_body_material_2_left_length_allowance;
        $data['body_material_2_left_length_total'] = $dt->tbl_dimension_body_material_2_left_length_total;

        $data['body_material_2_left_width'] = $dt->tbl_dimension_body_material_2_left_width;
        $data['body_material_2_left_width_allowance'] = $dt->tbl_dimension_body_material_2_left_width_allowance;
        $data['body_material_2_left_width_total'] = $dt->tbl_dimension_body_material_2_left_width_total;

        $data['body_material_2_right_length'] = $dt->tbl_dimension_body_material_2_right_length;
        $data['body_material_2_right_length_allowance'] = $dt->tbl_dimension_body_material_2_right_length_allowance;
        $data['body_material_2_right_length_total'] = $dt->tbl_dimension_body_material_2_right_length_total;

        $data['body_material_2_right_width'] = $dt->tbl_dimension_body_material_2_right_width;
        $data['body_material_2_right_width_allowance'] = $dt->tbl_dimension_body_material_2_right_width_allowance;
        $data['body_material_2_right_width_total'] = $dt->tbl_dimension_body_material_2_right_width_total;

        $data['body_material_2_pocket_length'] = $dt->tbl_dimension_body_material_2_pocket_length;
        $data['body_material_2_pocket_length_allowance'] = $dt->tbl_dimension_body_material_2_pocket_length_allowance;
        $data['body_material_2_pocket_length_total'] = $dt->tbl_dimension_body_material_2_pocket_length_total;

        $data['body_material_2_pocket_width'] = $dt->tbl_dimension_body_material_2_pocket_width;
        $data['body_material_2_pocket_width_allowance'] = $dt->tbl_dimension_body_material_2_pocket_width_allowance;
        $data['body_material_2_pocket_width_total'] = $dt->tbl_dimension_body_material_2_pocket_width_total;

        $data['body_material_2_extra_1_length'] = $dt->tbl_dimension_body_material_2_extra_1_length;
        $data['body_material_2_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_2_extra_1_length_allowance;
        $data['body_material_2_extra_1_length_total'] = $dt->tbl_dimension_body_material_2_extra_1_length_total;

        $data['body_material_2_extra_1_width'] = $dt->tbl_dimension_body_material_2_extra_1_width;
        $data['body_material_2_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_2_extra_1_width_allowance;
        $data['body_material_2_extra_1_width_total'] = $dt->tbl_dimension_body_material_2_extra_1_width_total;

        $data['body_material_2_extra_2_length'] = $dt->tbl_dimension_body_material_2_extra_2_length;
        $data['body_material_2_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_2_extra_2_length_allowance;
        $data['body_material_2_extra_2_length_total'] = $dt->tbl_dimension_body_material_2_extra_2_length_total;

        $data['body_material_2_extra_2_width'] = $dt->tbl_dimension_body_material_2_extra_2_width;
        $data['body_material_2_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_2_extra_2_width_allowance;
        $data['body_material_2_extra_2_width_total'] = $dt->tbl_dimension_body_material_2_extra_2_width_total;

        $data['body_material_2_extra_3_length'] = $dt->tbl_dimension_body_material_2_extra_3_length;
        $data['body_material_2_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_2_extra_3_length_allowance;
        $data['body_material_2_extra_3_length_total'] = $dt->tbl_dimension_body_material_2_extra_3_length_total;

        $data['body_material_2_extra_3_width'] = $dt->tbl_dimension_body_material_2_extra_3_length_total;
        $data['body_material_2_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_2_extra_3_width_allowance;
        $data['body_material_2_extra_3_width_total'] = $dt->tbl_dimension_body_material_2_extra_3_width_total;

        //Dimension for Body Material 3
        $data['body_material_3_front_length'] = $dt->tbl_dimension_body_material_3_front_length;
        $data['body_material_3_front_length_allowance'] = $dt->tbl_dimension_body_material_3_front_length_allowance;
        $data['body_material_3_front_length_total'] = $dt->tbl_dimension_body_material_3_front_length_total;

        $data['body_material_3_front_width'] = $dt->tbl_dimension_body_material_3_front_width;
        $data['body_material_3_front_width_allowance'] = $dt->tbl_dimension_body_material_3_front_width_allowance;
        $data['body_material_3_front_width_total'] = $dt->tbl_dimension_body_material_3_front_width_total;

        $data['body_material_3_back_length'] = $dt->tbl_dimension_body_material_3_back_length;
        $data['body_material_3_back_length_allowance'] = $dt->tbl_dimension_body_material_3_back_length_allowance;
        $data['body_material_3_back_length_total'] = $dt->tbl_dimension_body_material_3_back_length_total;

        $data['body_material_3_back_width'] = $dt->tbl_dimension_body_material_3_back_width;
        $data['body_material_3_back_width_allowance'] = $dt->tbl_dimension_body_material_3_back_width_allowance;
        $data['body_material_3_back_width_total'] = $dt->tbl_dimension_body_material_3_back_width_total;

        $data['body_material_3_top_length'] = $dt->tbl_dimension_body_material_3_top_length;
        $data['body_material_3_top_length_allowance'] = $dt->tbl_dimension_body_material_3_top_length_allowance;
        $data['body_material_3_top_length_total'] = $dt->tbl_dimension_body_material_3_top_length_total;

        $data['body_material_3_top_width'] = $dt->tbl_dimension_body_material_3_top_width;
        $data['body_material_3_top_width_allowance'] = $dt->tbl_dimension_body_material_3_top_width_allowance;
        $data['body_material_3_top_width_total'] = $dt->tbl_dimension_body_material_3_top_width_total;

        $data['body_material_3_bottom_length'] = $dt->tbl_dimension_body_material_3_bottom_length;
        $data['body_material_3_bottom_length_allowance'] = $dt->tbl_dimension_body_material_3_bottom_length_allowance;
        $data['body_material_3_bottom_length_total'] = $dt->tbl_dimension_body_material_3_bottom_length_total;

        $data['body_material_3_bottom_width'] = $dt->tbl_dimension_body_material_3_bottom_width;
        $data['body_material_3_bottom_width_allowance'] = $dt->tbl_dimension_body_material_3_bottom_width_allowance;
        $data['body_material_3_bottom_width_total'] = $dt->tbl_dimension_body_material_3_bottom_width_total;

        $data['body_material_3_left_length'] = $dt->tbl_dimension_body_material_3_left_length;
        $data['body_material_3_left_length_allowance'] = $dt->tbl_dimension_body_material_3_left_length_allowance;
        $data['body_material_3_left_length_total'] = $dt->tbl_dimension_body_material_3_left_length_total;

        $data['body_material_3_left_width'] = $dt->tbl_dimension_body_material_3_left_width;
        $data['body_material_3_left_width_allowance'] = $dt->tbl_dimension_body_material_3_left_width_allowance;
        $data['body_material_3_left_width_total'] = $dt->tbl_dimension_body_material_3_left_width_total;

        $data['body_material_3_right_length'] = $dt->tbl_dimension_body_material_3_right_length;
        $data['body_material_3_right_length_allowance'] = $dt->tbl_dimension_body_material_3_right_length_allowance;
        $data['body_material_3_right_length_total'] = $dt->tbl_dimension_body_material_3_right_length_total;

        $data['body_material_3_right_width'] = $dt->tbl_dimension_body_material_3_right_width;
        $data['body_material_3_right_width_allowance'] = $dt->tbl_dimension_body_material_3_right_width_allowance;
        $data['body_material_3_right_width_total'] = $dt->tbl_dimension_body_material_3_right_width_total;

        $data['body_material_3_pocket_length'] = $dt->tbl_dimension_body_material_3_pocket_length;
        $data['body_material_3_pocket_length_allowance'] = $dt->tbl_dimension_body_material_3_pocket_length_allowance;
        $data['body_material_3_pocket_length_total'] = $dt->tbl_dimension_body_material_3_pocket_length_total;

        $data['body_material_3_pocket_width'] = $dt->tbl_dimension_body_material_3_pocket_width;
        $data['body_material_3_pocket_width_allowance'] = $dt->tbl_dimension_body_material_3_pocket_width_allowance;
        $data['body_material_3_pocket_width_total'] = $dt->tbl_dimension_body_material_3_pocket_width_total;

        $data['body_material_3_extra_1_length'] = $dt->tbl_dimension_body_material_3_extra_1_length;
        $data['body_material_3_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_3_extra_1_length_allowance;
        $data['body_material_3_extra_1_length_total'] = $dt->tbl_dimension_body_material_3_extra_1_length_total;

        $data['body_material_3_extra_1_width'] = $dt->tbl_dimension_body_material_3_extra_1_width;
        $data['body_material_3_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_3_extra_1_width_allowance;
        $data['body_material_3_extra_1_width_total'] = $dt->tbl_dimension_body_material_3_extra_1_width_total;

        $data['body_material_3_extra_2_length'] = $dt->tbl_dimension_body_material_3_extra_2_length;
        $data['body_material_3_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_3_extra_2_length_allowance;
        $data['body_material_3_extra_2_length_total'] = $dt->tbl_dimension_body_material_3_extra_2_length_total;

        $data['body_material_3_extra_2_width'] = $dt->tbl_dimension_body_material_3_extra_2_width;
        $data['body_material_3_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_3_extra_2_width_allowance;
        $data['body_material_3_extra_2_width_total'] = $dt->tbl_dimension_body_material_3_extra_2_width_total;

        $data['body_material_3_extra_3_length'] = $dt->tbl_dimension_body_material_3_extra_3_length;
        $data['body_material_3_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_3_extra_3_length_allowance;
        $data['body_material_3_extra_3_length_total'] = $dt->tbl_dimension_body_material_3_extra_3_length_total;

        $data['body_material_3_extra_3_width'] = $dt->tbl_dimension_body_material_3_extra_3_length_total;
        $data['body_material_3_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_3_extra_3_width_allowance;
        $data['body_material_3_extra_3_width_total'] = $dt->tbl_dimension_body_material_3_extra_3_width_total;


        //Dimension for Body Material 4
        $data['body_material_4_front_length'] = $dt->tbl_dimension_body_material_4_front_length;
        $data['body_material_4_front_length_allowance'] = $dt->tbl_dimension_body_material_4_front_length_allowance;
        $data['body_material_4_front_length_total'] = $dt->tbl_dimension_body_material_4_front_length_total;

        $data['body_material_4_front_width'] = $dt->tbl_dimension_body_material_4_front_width;
        $data['body_material_4_front_width_allowance'] = $dt->tbl_dimension_body_material_4_front_width_allowance;
        $data['body_material_4_front_width_total'] = $dt->tbl_dimension_body_material_4_front_width_total;

        $data['body_material_4_back_length'] = $dt->tbl_dimension_body_material_4_back_length;
        $data['body_material_4_back_length_allowance'] = $dt->tbl_dimension_body_material_4_back_length_allowance;
        $data['body_material_4_back_length_total'] = $dt->tbl_dimension_body_material_4_back_length_total;

        $data['body_material_4_back_width'] = $dt->tbl_dimension_body_material_4_back_width;
        $data['body_material_4_back_width_allowance'] = $dt->tbl_dimension_body_material_4_back_width_allowance;
        $data['body_material_4_back_width_total'] = $dt->tbl_dimension_body_material_4_back_width_total;

        $data['body_material_4_top_length'] = $dt->tbl_dimension_body_material_4_top_length;
        $data['body_material_4_top_length_allowance'] = $dt->tbl_dimension_body_material_4_top_length_allowance;
        $data['body_material_4_top_length_total'] = $dt->tbl_dimension_body_material_4_top_length_total;

        $data['body_material_4_top_width'] = $dt->tbl_dimension_body_material_4_top_width;
        $data['body_material_4_top_width_allowance'] = $dt->tbl_dimension_body_material_4_top_width_allowance;
        $data['body_material_4_top_width_total'] = $dt->tbl_dimension_body_material_4_top_width_total;

        $data['body_material_4_bottom_length'] = $dt->tbl_dimension_body_material_4_bottom_length;
        $data['body_material_4_bottom_length_allowance'] = $dt->tbl_dimension_body_material_4_bottom_length_allowance;
        $data['body_material_4_bottom_length_total'] = $dt->tbl_dimension_body_material_4_bottom_length_total;

        $data['body_material_4_bottom_width'] = $dt->tbl_dimension_body_material_4_bottom_width;
        $data['body_material_4_bottom_width_allowance'] = $dt->tbl_dimension_body_material_4_bottom_width_allowance;
        $data['body_material_4_bottom_width_total'] = $dt->tbl_dimension_body_material_4_bottom_width_total;

        $data['body_material_4_left_length'] = $dt->tbl_dimension_body_material_4_left_length;
        $data['body_material_4_left_length_allowance'] = $dt->tbl_dimension_body_material_4_left_length_allowance;
        $data['body_material_4_left_length_total'] = $dt->tbl_dimension_body_material_4_left_length_total;

        $data['body_material_4_left_width'] = $dt->tbl_dimension_body_material_4_left_width;
        $data['body_material_4_left_width_allowance'] = $dt->tbl_dimension_body_material_4_left_width_allowance;
        $data['body_material_4_left_width_total'] = $dt->tbl_dimension_body_material_4_left_width_total;

        $data['body_material_4_right_length'] = $dt->tbl_dimension_body_material_4_right_length;
        $data['body_material_4_right_length_allowance'] = $dt->tbl_dimension_body_material_4_right_length_allowance;
        $data['body_material_4_right_length_total'] = $dt->tbl_dimension_body_material_4_right_length_total;

        $data['body_material_4_right_width'] = $dt->tbl_dimension_body_material_4_right_width;
        $data['body_material_4_right_width_allowance'] = $dt->tbl_dimension_body_material_4_right_width_allowance;
        $data['body_material_4_right_width_total'] = $dt->tbl_dimension_body_material_4_right_width_total;

        $data['body_material_4_pocket_length'] = $dt->tbl_dimension_body_material_4_pocket_length;
        $data['body_material_4_pocket_length_allowance'] = $dt->tbl_dimension_body_material_4_pocket_length_allowance;
        $data['body_material_4_pocket_length_total'] = $dt->tbl_dimension_body_material_4_pocket_length_total;

        $data['body_material_4_pocket_width'] = $dt->tbl_dimension_body_material_4_pocket_width;
        $data['body_material_4_pocket_width_allowance'] = $dt->tbl_dimension_body_material_4_pocket_width_allowance;
        $data['body_material_4_pocket_width_total'] = $dt->tbl_dimension_body_material_4_pocket_width_total;

        $data['body_material_4_extra_1_length'] = $dt->tbl_dimension_body_material_4_extra_1_length;
        $data['body_material_4_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_4_extra_1_length_allowance;
        $data['body_material_4_extra_1_length_total'] = $dt->tbl_dimension_body_material_4_extra_1_length_total;

        $data['body_material_4_extra_1_width'] = $dt->tbl_dimension_body_material_4_extra_1_width;
        $data['body_material_4_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_4_extra_1_width_allowance;
        $data['body_material_4_extra_1_width_total'] = $dt->tbl_dimension_body_material_4_extra_1_width_total;

        $data['body_material_4_extra_2_length'] = $dt->tbl_dimension_body_material_4_extra_2_length;
        $data['body_material_4_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_4_extra_2_length_allowance;
        $data['body_material_4_extra_2_length_total'] = $dt->tbl_dimension_body_material_4_extra_2_length_total;

        $data['body_material_4_extra_2_width'] = $dt->tbl_dimension_body_material_4_extra_2_width;
        $data['body_material_4_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_4_extra_2_width_allowance;
        $data['body_material_4_extra_2_width_total'] = $dt->tbl_dimension_body_material_4_extra_2_width_total;

        $data['body_material_4_extra_3_length'] = $dt->tbl_dimension_body_material_4_extra_3_length;
        $data['body_material_4_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_4_extra_3_length_allowance;
        $data['body_material_4_extra_3_length_total'] = $dt->tbl_dimension_body_material_4_extra_3_length_total;

        $data['body_material_4_extra_3_width'] = $dt->tbl_dimension_body_material_4_extra_3_length_total;
        $data['body_material_4_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_4_extra_3_width_allowance;
        $data['body_material_4_extra_3_width_total'] = $dt->tbl_dimension_body_material_4_extra_3_width_total;

        //Dimension for Body Material 5
        $data['body_material_5_front_length'] = $dt->tbl_dimension_body_material_5_front_length;
        $data['body_material_5_front_length_allowance'] = $dt->tbl_dimension_body_material_5_front_length_allowance;
        $data['body_material_5_front_length_total'] = $dt->tbl_dimension_body_material_5_front_length_total;

        $data['body_material_5_front_width'] = $dt->tbl_dimension_body_material_5_front_width;
        $data['body_material_5_front_width_allowance'] = $dt->tbl_dimension_body_material_5_front_width_allowance;
        $data['body_material_5_front_width_total'] = $dt->tbl_dimension_body_material_5_front_width_total;

        $data['body_material_5_back_length'] = $dt->tbl_dimension_body_material_5_back_length;
        $data['body_material_5_back_length_allowance'] = $dt->tbl_dimension_body_material_5_back_length_allowance;
        $data['body_material_5_back_length_total'] = $dt->tbl_dimension_body_material_5_back_length_total;

        $data['body_material_5_back_width'] = $dt->tbl_dimension_body_material_5_back_width;
        $data['body_material_5_back_width_allowance'] = $dt->tbl_dimension_body_material_5_back_width_allowance;
        $data['body_material_5_back_width_total'] = $dt->tbl_dimension_body_material_5_back_width_total;

        $data['body_material_5_top_length'] = $dt->tbl_dimension_body_material_5_top_length;
        $data['body_material_5_top_length_allowance'] = $dt->tbl_dimension_body_material_5_top_length_allowance;
        $data['body_material_5_top_length_total'] = $dt->tbl_dimension_body_material_5_top_length_total;

        $data['body_material_5_top_width'] = $dt->tbl_dimension_body_material_5_top_width;
        $data['body_material_5_top_width_allowance'] = $dt->tbl_dimension_body_material_5_top_width_allowance;
        $data['body_material_5_top_width_total'] = $dt->tbl_dimension_body_material_5_top_width_total;

        $data['body_material_5_bottom_length'] = $dt->tbl_dimension_body_material_5_bottom_length;
        $data['body_material_5_bottom_length_allowance'] = $dt->tbl_dimension_body_material_5_bottom_length_allowance;
        $data['body_material_5_bottom_length_total'] = $dt->tbl_dimension_body_material_5_bottom_length_total;

        $data['body_material_5_bottom_width'] = $dt->tbl_dimension_body_material_5_bottom_width;
        $data['body_material_5_bottom_width_allowance'] = $dt->tbl_dimension_body_material_5_bottom_width_allowance;
        $data['body_material_5_bottom_width_total'] = $dt->tbl_dimension_body_material_5_bottom_width_total;

        $data['body_material_5_left_length'] = $dt->tbl_dimension_body_material_5_left_length;
        $data['body_material_5_left_length_allowance'] = $dt->tbl_dimension_body_material_5_left_length_allowance;
        $data['body_material_5_left_length_total'] = $dt->tbl_dimension_body_material_5_left_length_total;

        $data['body_material_5_left_width'] = $dt->tbl_dimension_body_material_5_left_width;
        $data['body_material_5_left_width_allowance'] = $dt->tbl_dimension_body_material_5_left_width_allowance;
        $data['body_material_5_left_width_total'] = $dt->tbl_dimension_body_material_5_left_width_total;

        $data['body_material_5_right_length'] = $dt->tbl_dimension_body_material_5_right_length;
        $data['body_material_5_right_length_allowance'] = $dt->tbl_dimension_body_material_5_right_length_allowance;
        $data['body_material_5_right_length_total'] = $dt->tbl_dimension_body_material_5_right_length_total;

        $data['body_material_5_right_width'] = $dt->tbl_dimension_body_material_5_right_width;
        $data['body_material_5_right_width_allowance'] = $dt->tbl_dimension_body_material_5_right_width_allowance;
        $data['body_material_5_right_width_total'] = $dt->tbl_dimension_body_material_5_right_width_total;

        $data['body_material_5_pocket_length'] = $dt->tbl_dimension_body_material_5_pocket_length;
        $data['body_material_5_pocket_length_allowance'] = $dt->tbl_dimension_body_material_5_pocket_length_allowance;
        $data['body_material_5_pocket_length_total'] = $dt->tbl_dimension_body_material_5_pocket_length_total;

        $data['body_material_5_pocket_width'] = $dt->tbl_dimension_body_material_5_pocket_width;
        $data['body_material_5_pocket_width_allowance'] = $dt->tbl_dimension_body_material_5_pocket_width_allowance;
        $data['body_material_5_pocket_width_total'] = $dt->tbl_dimension_body_material_5_pocket_width_total;

        $data['body_material_5_extra_1_length'] = $dt->tbl_dimension_body_material_5_extra_1_length;
        $data['body_material_5_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_5_extra_1_length_allowance;
        $data['body_material_5_extra_1_length_total'] = $dt->tbl_dimension_body_material_5_extra_1_length_total;

        $data['body_material_5_extra_1_width'] = $dt->tbl_dimension_body_material_5_extra_1_width;
        $data['body_material_5_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_5_extra_1_width_allowance;
        $data['body_material_5_extra_1_width_total'] = $dt->tbl_dimension_body_material_5_extra_1_width_total;

        $data['body_material_5_extra_2_length'] = $dt->tbl_dimension_body_material_5_extra_2_length;
        $data['body_material_5_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_5_extra_2_length_allowance;
        $data['body_material_5_extra_2_length_total'] = $dt->tbl_dimension_body_material_5_extra_2_length_total;

        $data['body_material_5_extra_2_width'] = $dt->tbl_dimension_body_material_5_extra_2_width;
        $data['body_material_5_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_5_extra_2_width_allowance;
        $data['body_material_5_extra_2_width_total'] = $dt->tbl_dimension_body_material_5_extra_2_width_total;

        $data['body_material_5_extra_3_length'] = $dt->tbl_dimension_body_material_5_extra_3_length;
        $data['body_material_5_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_5_extra_3_length_allowance;
        $data['body_material_5_extra_3_length_total'] = $dt->tbl_dimension_body_material_5_extra_3_length_total;

        $data['body_material_5_extra_3_width'] = $dt->tbl_dimension_body_material_5_extra_3_length_total;
        $data['body_material_5_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_5_extra_3_width_allowance;
        $data['body_material_5_extra_3_width_total'] = $dt->tbl_dimension_body_material_5_extra_3_width_total;

        //Dimension for Body Material 6
        $data['body_material_6_front_length'] = $dt->tbl_dimension_body_material_6_front_length;
        $data['body_material_6_front_length_allowance'] = $dt->tbl_dimension_body_material_6_front_length_allowance;
        $data['body_material_6_front_length_total'] = $dt->tbl_dimension_body_material_6_front_length_total;

        $data['body_material_6_front_width'] = $dt->tbl_dimension_body_material_6_front_width;
        $data['body_material_6_front_width_allowance'] = $dt->tbl_dimension_body_material_6_front_width_allowance;
        $data['body_material_6_front_width_total'] = $dt->tbl_dimension_body_material_6_front_width_total;

        $data['body_material_6_back_length'] = $dt->tbl_dimension_body_material_6_back_length;
        $data['body_material_6_back_length_allowance'] = $dt->tbl_dimension_body_material_6_back_length_allowance;
        $data['body_material_6_back_length_total'] = $dt->tbl_dimension_body_material_6_back_length_total;

        $data['body_material_6_back_width'] = $dt->tbl_dimension_body_material_6_back_width;
        $data['body_material_6_back_width_allowance'] = $dt->tbl_dimension_body_material_6_back_width_allowance;
        $data['body_material_6_back_width_total'] = $dt->tbl_dimension_body_material_6_back_width_total;

        $data['body_material_6_top_length'] = $dt->tbl_dimension_body_material_6_top_length;
        $data['body_material_6_top_length_allowance'] = $dt->tbl_dimension_body_material_6_top_length_allowance;
        $data['body_material_6_top_length_total'] = $dt->tbl_dimension_body_material_6_top_length_total;

        $data['body_material_6_top_width'] = $dt->tbl_dimension_body_material_6_top_width;
        $data['body_material_6_top_width_allowance'] = $dt->tbl_dimension_body_material_6_top_width_allowance;
        $data['body_material_6_top_width_total'] = $dt->tbl_dimension_body_material_6_top_width_total;

        $data['body_material_6_bottom_length'] = $dt->tbl_dimension_body_material_6_bottom_length;
        $data['body_material_6_bottom_length_allowance'] = $dt->tbl_dimension_body_material_6_bottom_length_allowance;
        $data['body_material_6_bottom_length_total'] = $dt->tbl_dimension_body_material_6_bottom_length_total;

        $data['body_material_6_bottom_width'] = $dt->tbl_dimension_body_material_6_bottom_width;
        $data['body_material_6_bottom_width_allowance'] = $dt->tbl_dimension_body_material_6_bottom_width_allowance;
        $data['body_material_6_bottom_width_total'] = $dt->tbl_dimension_body_material_6_bottom_width_total;

        $data['body_material_6_left_length'] = $dt->tbl_dimension_body_material_6_left_length;
        $data['body_material_6_left_length_allowance'] = $dt->tbl_dimension_body_material_6_left_length_allowance;
        $data['body_material_6_left_length_total'] = $dt->tbl_dimension_body_material_6_left_length_total;

        $data['body_material_6_left_width'] = $dt->tbl_dimension_body_material_6_left_width;
        $data['body_material_6_left_width_allowance'] = $dt->tbl_dimension_body_material_6_left_width_allowance;
        $data['body_material_6_left_width_total'] = $dt->tbl_dimension_body_material_6_left_width_total;

        $data['body_material_6_right_length'] = $dt->tbl_dimension_body_material_6_right_length;
        $data['body_material_6_right_length_allowance'] = $dt->tbl_dimension_body_material_6_right_length_allowance;
        $data['body_material_6_right_length_total'] = $dt->tbl_dimension_body_material_6_right_length_total;

        $data['body_material_6_right_width'] = $dt->tbl_dimension_body_material_6_right_width;
        $data['body_material_6_right_width_allowance'] = $dt->tbl_dimension_body_material_6_right_width_allowance;
        $data['body_material_6_right_width_total'] = $dt->tbl_dimension_body_material_6_right_width_total;

        $data['body_material_6_pocket_length'] = $dt->tbl_dimension_body_material_6_pocket_length;
        $data['body_material_6_pocket_length_allowance'] = $dt->tbl_dimension_body_material_6_pocket_length_allowance;
        $data['body_material_6_pocket_length_total'] = $dt->tbl_dimension_body_material_6_pocket_length_total;

        $data['body_material_6_pocket_width'] = $dt->tbl_dimension_body_material_6_pocket_width;
        $data['body_material_6_pocket_width_allowance'] = $dt->tbl_dimension_body_material_6_pocket_width_allowance;
        $data['body_material_6_pocket_width_total'] = $dt->tbl_dimension_body_material_6_pocket_width_total;

        $data['body_material_6_extra_1_length'] = $dt->tbl_dimension_body_material_6_extra_1_length;
        $data['body_material_6_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_6_extra_1_length_allowance;
        $data['body_material_6_extra_1_length_total'] = $dt->tbl_dimension_body_material_6_extra_1_length_total;

        $data['body_material_6_extra_1_width'] = $dt->tbl_dimension_body_material_6_extra_1_width;
        $data['body_material_6_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_6_extra_1_width_allowance;
        $data['body_material_6_extra_1_width_total'] = $dt->tbl_dimension_body_material_6_extra_1_width_total;

        $data['body_material_6_extra_2_length'] = $dt->tbl_dimension_body_material_6_extra_2_length;
        $data['body_material_6_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_6_extra_2_length_allowance;
        $data['body_material_6_extra_2_length_total'] = $dt->tbl_dimension_body_material_6_extra_2_length_total;

        $data['body_material_6_extra_2_width'] = $dt->tbl_dimension_body_material_6_extra_2_width;
        $data['body_material_6_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_6_extra_2_width_allowance;
        $data['body_material_6_extra_2_width_total'] = $dt->tbl_dimension_body_material_6_extra_2_width_total;

        $data['body_material_6_extra_3_length'] = $dt->tbl_dimension_body_material_6_extra_3_length;
        $data['body_material_6_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_6_extra_3_length_allowance;
        $data['body_material_6_extra_3_length_total'] = $dt->tbl_dimension_body_material_6_extra_3_length_total;

        $data['body_material_6_extra_3_width'] = $dt->tbl_dimension_body_material_6_extra_3_length_total;
        $data['body_material_6_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_6_extra_3_width_allowance;
        $data['body_material_6_extra_3_width_total'] = $dt->tbl_dimension_body_material_6_extra_3_width_total;

        $this->load->view('admin/admin_header_view',$this->data);
        $this->load->view('admin/admin_home_rev_woven_costing_view', $data);
        $this->load->view('admin/admin_footer_view');
    }


    /**
     * ppnw_costing
     *
     * This is for Single PP nonwoven Costing in the admin panel.
     */
    public function woven_costing()
    {

        //Create Validation Rules
        $this->form_validation->set_rules('order_id', 'Order Id', 'trim|xss_clean');
        $this->form_validation->set_rules('order_company', 'Order Company', 'trim|xss_clean');
        $this->form_validation->set_rules('order_date', 'Order Date', 'trim|xss_clean');
        $this->form_validation->set_rules('order_item_name', 'Order Item Name', 'trim|xss_clean');
        $this->form_validation->set_rules('order_ref_no', 'Order Reference Number', 'trim|xss_clean');

        $this->form_validation->set_rules('order_gsm', 'Order GSM', 'trim|xss_clean');
        $this->form_validation->set_rules('order_colour', 'Order Colour', 'trim|xss_clean');
        $this->form_validation->set_rules('order_usd', 'Order USD', 'trim|xss_clean');
        $this->form_validation->set_rules('order_wastage', 'Order Wastage', 'trim|xss_clean');
        $this->form_validation->set_rules('order_margin', 'Order Magin', 'trim|xss_clean');
        $this->form_validation->set_rules('order_quantity', 'Order Quantity', 'trim|xss_clean');
        $this->form_validation->set_rules('order_transport', 'Order Transport', 'trim|xss_clean');
        $this->form_validation->set_rules('order_bank_document', 'Order Bank Document', 'trim|xss_clean');

        //Body Material 1
        $this->form_validation->set_rules('body_material_1_front_length', 'Body Material 1 Front Length', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_front_length_allowance', 'Body Material 1 Front Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_front_length_total', 'Body Material 1 Front Length Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_front_width', 'Body Material 1 Front Width', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_front_width_allowance', 'Body Material 1 Front Width Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_front_width_total', 'Body Material 1 Front Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_back_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_back_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_back_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_back_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_back_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_back_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_top_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_top_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_top_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_top_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_top_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_top_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_bottom_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_bottom_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_bottom_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_left_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_left_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_left_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_left_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_left_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_left_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_right_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_right_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_right_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_right_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_right_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_right_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_pocket_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_pocket_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_pocket_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_pocket_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_pocket_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_pocket_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_extra_1_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_1_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_1_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_extra_1_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_1_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_1_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_extra_2_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_2_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_2_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_extra_2_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_2_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_2_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_extra_3_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_3_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_3_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_extra_3_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_3_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_extra_3_width_total', 'Order Bank Document', 'trim|xss_clean');


        //Body Material 2
        $this->form_validation->set_rules('body_material_2_front_length', 'Body Material 1 Front Length', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_front_length_allowance', 'Body Material 1 Front Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_front_length_total', 'Body Material 1 Front Length Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_front_width', 'Body Material 1 Front Width', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_front_width_allowance', 'Body Material 1 Front Width Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_front_width_total', 'Body Material 1 Front Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_back_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_back_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_back_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_back_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_back_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_back_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_top_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_top_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_top_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_top_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_top_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_top_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_bottom_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_bottom_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_bottom_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_left_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_left_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_left_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_left_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_left_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_left_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_right_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_right_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_right_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_right_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_right_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_right_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_pocket_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_pocket_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_pocket_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_pocket_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_pocket_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_pocket_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_extra_1_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_1_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_1_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_extra_1_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_1_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_1_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_extra_2_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_2_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_2_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_extra_2_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_2_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_2_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_extra_3_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_3_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_3_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_extra_3_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_3_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_extra_3_width_total', 'Order Bank Document', 'trim|xss_clean');


        //Body Material 3
        $this->form_validation->set_rules('body_material_3_front_length', 'Body Material 1 Front Length', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_front_length_allowance', 'Body Material 1 Front Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_front_length_total', 'Body Material 1 Front Length Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_front_width', 'Body Material 1 Front Width', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_front_width_allowance', 'Body Material 1 Front Width Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_front_width_total', 'Body Material 1 Front Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_back_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_back_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_back_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_back_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_back_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_back_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_top_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_top_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_top_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_top_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_top_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_top_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_bottom_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_bottom_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_bottom_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_left_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_left_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_left_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_left_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_left_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_left_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_right_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_right_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_right_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_right_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_right_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_right_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_pocket_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_pocket_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_pocket_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_pocket_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_pocket_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_pocket_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_extra_1_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_1_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_1_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_extra_1_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_1_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_1_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_extra_2_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_2_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_2_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_extra_2_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_2_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_2_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_extra_3_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_3_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_3_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_extra_3_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_3_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_extra_3_width_total', 'Order Bank Document', 'trim|xss_clean');


        //Body Material 4
        $this->form_validation->set_rules('body_material_4_front_length', 'Body Material 1 Front Length', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_front_length_allowance', 'Body Material 1 Front Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_front_length_total', 'Body Material 1 Front Length Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_front_width', 'Body Material 1 Front Width', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_front_width_allowance', 'Body Material 1 Front Width Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_front_width_total', 'Body Material 1 Front Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_back_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_back_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_back_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_back_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_back_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_back_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_top_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_top_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_top_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_top_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_top_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_top_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_bottom_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_bottom_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_bottom_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_left_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_left_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_left_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_left_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_left_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_left_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_right_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_right_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_right_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_right_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_right_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_right_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_pocket_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_pocket_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_pocket_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_pocket_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_pocket_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_pocket_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_extra_1_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_1_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_1_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_extra_1_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_1_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_1_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_extra_2_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_2_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_2_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_extra_2_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_2_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_2_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_extra_3_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_3_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_3_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_extra_3_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_3_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_extra_3_width_total', 'Order Bank Document', 'trim|xss_clean');


        //Body Material 5
        $this->form_validation->set_rules('body_material_5_front_length', 'Body Material 1 Front Length', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_front_length_allowance', 'Body Material 1 Front Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_front_length_total', 'Body Material 1 Front Length Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_front_width', 'Body Material 1 Front Width', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_front_width_allowance', 'Body Material 1 Front Width Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_front_width_total', 'Body Material 1 Front Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_back_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_back_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_back_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_back_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_back_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_back_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_top_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_top_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_top_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_top_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_top_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_top_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_bottom_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_bottom_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_bottom_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_left_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_left_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_left_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_left_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_left_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_left_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_right_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_right_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_right_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_right_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_right_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_right_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_pocket_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_pocket_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_pocket_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_pocket_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_pocket_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_pocket_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_extra_1_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_1_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_1_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_extra_1_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_1_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_1_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_extra_2_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_2_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_2_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_extra_2_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_2_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_2_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_extra_3_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_3_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_3_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_extra_3_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_3_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_extra_3_width_total', 'Order Bank Document', 'trim|xss_clean');


        //Body Material 6
        $this->form_validation->set_rules('body_material_6_front_length', 'Body Material 1 Front Length', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_front_length_allowance', 'Body Material 1 Front Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_front_length_total', 'Body Material 1 Front Length Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_front_width', 'Body Material 1 Front Width', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_front_width_allowance', 'Body Material 1 Front Width Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_front_width_total', 'Body Material 1 Front Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_back_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_back_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_back_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_back_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_back_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_back_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_top_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_top_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_top_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_top_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_top_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_top_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_bottom_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_bottom_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_bottom_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_left_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_left_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_left_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_left_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_left_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_left_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_right_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_right_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_right_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_right_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_right_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_right_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_pocket_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_pocket_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_pocket_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_pocket_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_pocket_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_pocket_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_extra_1_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_1_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_1_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_extra_1_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_1_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_1_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_extra_2_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_2_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_2_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_extra_2_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_2_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_2_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_extra_3_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_3_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_3_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_extra_3_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_3_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_extra_3_width_total', 'Order Bank Document', 'trim|xss_clean');


        //All Materials
        $this->form_validation->set_rules('body_material_1_cost', 'Body Material Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_consumption', 'Body Material Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_consumption_rate', 'Body Material Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_consumption_cost', 'Body Material Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_cost', 'Body Material Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_consumption', 'Body Material Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_consumption_rate', 'Body Material Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_consumption_cost', 'Body Material Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_cost', 'Body Material Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_consumption', 'Body Material Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_consumption_rate', 'Body Material Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_consumption_cost', 'Body Material Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_4_cost', 'Body Material Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_consumption', 'Body Material Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_consumption_rate', 'Body Material Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_4_consumption_cost', 'Body Material Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_5_cost', 'Body Material Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_consumption', 'Body Material Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_consumption_rate', 'Body Material Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_5_consumption_cost', 'Body Material Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_6_cost', 'Body Material Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_consumption', 'Body Material Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_consumption_rate', 'Body Material Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_6_consumption_cost', 'Body Material Consumption Cost', 'trim|xss_clean');


        //All Trims In Yards


        $this->form_validation->set_rules('zipper_cost', 'Zipper Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('zipper_consumption', 'Zipper Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('zipper_consumption_rate', 'Zipper Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('zipper_consumption_cost', 'Zipper Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('two_inch_webbing_cost', 'Webbing Cost Width', 'trim|xss_clean');
        $this->form_validation->set_rules('two_inch_webbing_consumption', 'Webbing Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('two_inch_webbing_consumption_rate', 'Webbing Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('two_inch_webbing_consumption_cost', 'Webbing Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('one_and_half_inch_webbing_cost', 'Webbing Cost Width', 'trim|xss_clean');
        $this->form_validation->set_rules('one_and_half_inch_webbing_consumption', 'Webbing Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('one_and_half_inch_webbing_consumption_rate', 'Webbing Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('one_and_half_inch_webbing_consumption_cost', 'Webbing Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('velcro_cost', 'Velcro Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('velcro_consumption', 'Velcro Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('velcro_consumption_rate', 'Velcro Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('velcro_consumption_cost', 'Velcro Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('extra_trim_yard_1_cost', 'Extra Trim Yard 1 Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_1_consumption', 'Extra Trim Yard 1 Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_1_consumption_rate', 'Extra Trim Yard 1 Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_1_consumption_cost', 'Extra Trim Yard 1 Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('extra_trim_yard_2_cost', 'Extra Trim Yard 2 Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_2_consumption', 'Extra Trim Yard 2 Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_2_consumption_rate', 'Extra Trim Yard 2 Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_2_consumption_cost', 'Extra Trim Yard 2 Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('extra_trim_yard_3_cost', 'Extra Trim Yard 2 Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_3_consumption', 'Extra Trim Yard 2 Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_3_consumption_rate', 'Extra Trim Yard 2 Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_3_consumption_cost', 'Extra Trim Yard 2 Consumption Cost', 'trim|xss_clean');


        //All Trims in Pices
        $this->form_validation->set_rules('puller_cost', 'Puller Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('puller_consumption', 'Puller Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('puller_consumption_rate', 'Puller Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('puller_consumption_cost', 'Puller Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('print_cost', 'Print Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('print_consumption', 'Print Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('print_consumption_rate', 'Print Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('print_consumption_cost', 'Print Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('buckle_cost', 'Buckle Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('buckle_consumption', 'Buckle Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('buckle_consumption_rate', 'Buckle Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('buckle_consumption_cost', 'Buckle Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('swivel_hook_cost', 'Buckle Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('swivel_hook_consumption', 'Buckle Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('swivel_hook_consumption_rate', 'Buckle Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('swivel_hook_consumption_cost', 'Buckle Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('adjustable_buckle_cost', 'Buckle Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('adjustable_buckle_consumption', 'Buckle Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('adjustable_buckle_consumption_rate', 'Buckle Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('adjustable_buckle_consumption_cost', 'Buckle Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('magnetic_button_cost', 'Magnetic Button Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('magnetic_button_consumption', 'Magnetic Button Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('magnetic_button_consumption_rate', 'Magnetic Button Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('magnetic_button_consumption_cost', 'Magnetic Button Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('snap_button_cost', 'Snap Button Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('snap_button_consumption', 'Snap Button Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('snap_button_consumption_rate', 'Snap Button Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('snap_button_consumption_cost', 'Snap Button Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('rivet_cost', 'Snap Button Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('rivet_consumption', 'Snap Button Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('rivet_consumption_rate', 'Snap Button Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('rivet_consumption_cost', 'Snap Button Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('bottom_base_cost', 'Bottom Base Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('bottom_base_consumption', 'Bottom Base Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('bottom_base_consumption_rate', 'Bottom Base Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('bottom_base_consumption_cost', 'Bottom Base Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('thread_cost', 'Thread Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('thread_consumption', 'Thread Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('thread_consumption_rate', 'Thread Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('thread_consumption_cost', 'Thread Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('tag_cost', 'Tag Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_consumption', 'Tag Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_consumption_rate', 'Tag Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('tag_consumption_cost', 'Tag Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('label_cost', 'Label Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('label_consumption', 'Label Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('label_consumption_rate', 'Label Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('label_consumption_cost', 'Label Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('packing_cost', 'Packing Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('packing_consumption', 'Packing Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('packing_consumption_rate', 'Packing Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('packing_consumption_cost', 'Packing Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('bottom_shoe_cost', 'Packing Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('bottom_shoe_consumption', 'Packing Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('bottom_shoe_consumption_rate', 'Packing Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('bottom_shoe_consumption_cost', 'Packing Consumption Cost', 'trim|xss_clean');
        
        $this->form_validation->set_rules('extra_1_piece_cost', 'Extra 1 Piece Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_1_piece_consumption', 'Extra 1 Piece Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_1_piece_consumption_rate', 'Extra 1 Piece Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_1_piece_consumption_cost', 'Extra 1 Piece Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('extra_2_piece_cost', 'Extra 2 Piece Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_2_piece_consumption', 'Extra 2 Piece Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_2_piece_consumption_rate', 'Extra 2 Piece Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_2_piece_consumption_cost', 'Extra 2 Piece Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('extra_3_piece_cost', 'Pocket Width', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_3_piece_consumption', 'Extra 2 Piece Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_3_piece_consumption_rate', 'Extra 2 Piece Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_3_piece_consumption_cost', 'Extra 3 Piece Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('extra_4_piece_cost', 'Extra 2 Piece Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_4_piece_consumption', 'Extra 2 Piece Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_4_piece_consumption_rate', 'Extra 2 Piece Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_4_piece_consumption_cost', 'Extra 2 Piece Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('extra_5_piece_cost', 'Pocket Width', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_5_piece_consumption', 'Extra 2 Piece Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_5_piece_consumption_rate', 'Extra 2 Piece Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_5_piece_consumption_cost', 'Extra 3 Piece Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('order_total_material_inc_wastage', 'Total Material Including Wastage', 'trim|xss_clean');
        $this->form_validation->set_rules('order_sewing', 'Sewing Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('order_overheads', 'Overhead', 'trim|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
            //fail validation
            $this->load->view('admin_header_view');
            $this->load->view('admin_home_ppnw_view', $data);
            $this->load->view('admin_footer_view');
        } else {

            $woven_dimension_data = array(
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

                //Body material 3
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



                //Body material 4
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


                //Body material 5
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


                //Body material 5
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


            $this->db->insert('woven_dimension', $woven_dimension_data);
            $inserted_dimension_id = $this->db->insert_id();

            $woven_costing_data = array(

                'tbl_woven_dimension_id' => $inserted_dimension_id,
                'tbl_woven_id_name' => $this->input->post('order_id'),
                'tbl_woven_company_name' => $this->input->post('order_company'),
                'tbl_woven_order_date' => $this->input->post('order_date'),
                'tbl_woven_item_name' => $this->input->post('order_item_name'),
                'tbl_woven_ref_name' => $this->input->post('order_ref_no'),

                'tbl_woven_order_usd' => $this->input->post('order_usd'),
                'tbl_woven_order_wastage' => $this->input->post('order_wastage'),
                'tbl_woven_order_margin' => $this->input->post('order_margin'),
                'tbl_woven_order_quantity' => $this->input->post('order_quantity'),
                'tbl_woven_order_transport' => $this->input->post('order_transport'),
                'tbl_woven_order_bank_doc_charge' => $this->input->post('order_bank_document'),

                //Body Material Name
                'tbl_woven_body_material_1_name' => $this->input->post('body_material_1_name'),
                'tbl_woven_body_material_2_name' => $this->input->post('body_material_2_name'),
                'tbl_woven_body_material_3_name' => $this->input->post('body_material_3_name'),
                'tbl_woven_body_material_4_name' => $this->input->post('body_material_4_name'),
                'tbl_woven_body_material_5_name' => $this->input->post('body_material_5_name'),
                'tbl_woven_body_material_6_name' => $this->input->post('body_material_6_name'),

                //Body Material Roll Width
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


                // All Trims in
                'tbl_woven_trims_yard_extra_1_name' => $this->input->post('extra_trim_yard_extra_1_name'),
                'tbl_woven_trims_yard_extra_2_name' => $this->input->post('extra_trim_yard_extra_2_name'),
                'tbl_woven_trims_yard_extra_3_name' => $this->input->post('extra_trim_yard_extra_3_name'),

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


                //All Trims In Piece
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

                'tbl_woven_trims_piece_rivet_item_cost' => $this->input->post('snap_button_cost'),
                'tbl_woven_trims_piece_rivet_item_consumption' => $this->input->post('snap_button_consumption'),
                'tbl_woven_trims_piece_rivet_item_rate' => $this->input->post('snap_button_consumption_rate'),
                'tbl_woven_trims_piece_rivet_item_total_cost' => $this->input->post('snap_button_consumption_cost'),

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
                'tbl_woven_trims_piece_extra_4_item_cost' => $this->input->post('extra_3_piece_cost'),
                'tbl_woven_trims_piece_extra_4_item_consumption' => $this->input->post('extra_3_piece_consumption'),
                'tbl_woven_trims_piece_extra_4_item_rate' => $this->input->post('extra_3_piece_consumption_rate'),
                'tbl_woven_trims_piece_extra_4_item_total_cost' => $this->input->post('extra_3_piece_consumption_cost'),

                'tbl_woven_trims_piece_extra_5_name' => $this->input->post('extra_5_piece_name'),
                'tbl_woven_trims_piece_extra_5_item_cost' => $this->input->post('extra_3_piece_cost'),
                'tbl_woven_trims_piece_extra_5_item_consumption' => $this->input->post('extra_3_piece_consumption'),
                'tbl_woven_trims_piece_extra_5_item_rate' => $this->input->post('extra_3_piece_consumption_rate'),
                'tbl_woven_trims_piece_extra_5_item_total_cost' => $this->input->post('extra_3_piece_consumption_cost'),

                'tbl_order_sewing' => $this->input->post('order_sewing'),
                'tbl_order_overheads' => $this->input->post('order_overheads'),

                'tbl_order_total_material_inc_wastage' => $this->input->post('order_total_material_inc_wastage'),
                'tbl_order_total_overhead_and_other_cost' => $this->input->post('total_overhead_and_other_hidden'),
                'tbl_total_cost' => $this->input->post('total_cost_hidden'),
                'tbl_total_price' => $this->input->post('final_price_hidden'),
            );


            $this->db->insert('woven_costing', $woven_costing_data);

            $inserted_id = $this->db->insert_id();
            $user_id = $this->session->userdata('user_id');

            $data = array(
                'costing_user_id' => $user_id ,
                'costing_user_woven' => $inserted_id
            );
            $this->woven_model->add_costing_by_user($data);


            /*******Add Data to revision*****************/

            $this->db->insert('woven_dimension_rev', $woven_dimension_data);
            $insert_id = $this->db->insert_id();
            $woven_data_rev = array(
                'tbl_woven_order_id' => $inserted_id,
                'tbl_woven_dimension_id' => $insert_id,
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



















            redirect(base_url('admin'));
        }
    }

    /**
     *+Edit the PPNw Costing
     */
    public function edit_woven_costing(){
        $woven_costing_id = $this->uri->segment(3);
        if ($woven_costing_id == NULL) {
            redirect('woven/woven_all');
        }

        $dt = $this->woven_model->edit_woven_costing($woven_costing_id);
        //var_dump($dt);
        $data['woven_order_id'] = $dt->tbl_woven_order_id;
        $data['woven_id_name'] = $dt->tbl_woven_id_name;
        $data['woven_company_name'] = $dt->tbl_woven_company_name;
        $data['woven_order_date'] = $dt->tbl_woven_order_date;
        $data['woven_item_name'] = $dt->tbl_woven_item_name;
        $data['woven_ref_name'] = $dt->tbl_woven_ref_name;

        $data['woven_order_gsm'] = $dt->tbl_woven_order_gsm;
        $data['woven_order_color'] = $dt->tbl_woven_order_color;
        $data['woven_order_usd'] = $dt->tbl_woven_order_usd;

        $data['woven_order_wastage'] = $dt->tbl_woven_order_wastage;
        $data['woven_order_margin'] = $dt->tbl_woven_order_margin;

        $data['woven_order_quantity'] = $dt->tbl_woven_order_quantity;
        $data['woven_order_transport'] = $dt->tbl_woven_order_transport;
        $data['woven_order_bank_doc_charge'] = $dt->tbl_woven_order_bank_doc_charge;
        $data['woven_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;

        $data['woven_order_sewing'] = $dt->tbl_order_sewing;
        $data['woven_order_overheads'] = $dt->tbl_order_overheads;

        $data['woven_order_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;
        $data['woven_order_total_overhead_and_other_cost'] = $dt->tbl_order_total_overhead_and_other_cost;
        $data['woven_total_cost'] = $dt->tbl_total_cost;
        $data['woven_total_price'] = $dt->tbl_total_price;

        //Body Material Name
        $data['woven_body_material_1_name'] = $dt->tbl_woven_body_material_1_name;
        $data['woven_body_material_2_name'] = $dt->tbl_woven_body_material_2_name;
        $data['woven_body_material_3_name'] = $dt->tbl_woven_body_material_3_name;
        $data['woven_body_material_4_name'] = $dt->tbl_woven_body_material_4_name;
        $data['woven_body_material_5_name'] = $dt->tbl_woven_body_material_5_name;
        $data['woven_body_material_6_name'] = $dt->tbl_woven_body_material_6_name;

        //Body Material Roll Width
        $data['woven_body_material_1_roll_width'] = $dt->tbl_woven_body_material_1_roll_width;
        $data['woven_body_material_2_roll_width'] = $dt->tbl_woven_body_material_2_roll_width;
        $data['woven_body_material_3_roll_width'] = $dt->tbl_woven_body_material_3_roll_width;
        $data['woven_body_material_4_roll_width'] = $dt->tbl_woven_body_material_4_roll_width;
        $data['woven_body_material_5_roll_width'] = $dt->tbl_woven_body_material_5_roll_width;
        $data['woven_body_material_6_roll_width'] = $dt->tbl_woven_body_material_6_roll_width;

        //Body Material 1 consumption cost
        $data['woven_body_material_1_cost'] = $dt->tbl_woven_body_material_1_cost;
        $data['woven_body_material_1_consumption'] = $dt->tbl_woven_body_material_1_consumption;
        $data['woven_body_material_1_rate'] = $dt->tbl_woven_body_material_1_rate;
        $data['woven_body_material_1_total_cost'] = $dt->tbl_woven_body_material_1_total_cost;

        //Body Material 2 consumption cost
        $data['woven_body_material_2_cost'] = $dt->tbl_woven_body_material_2_cost;
        $data['woven_body_material_2_consumption'] = $dt->tbl_woven_body_material_2_consumption;
        $data['woven_body_material_2_rate'] = $dt->tbl_woven_body_material_2_rate;
        $data['woven_body_material_2_total_cost'] = $dt->tbl_woven_body_material_2_total_cost;

        //Body Material 3 consumption cost
        $data['woven_body_material_3_cost'] = $dt->tbl_woven_body_material_3_cost;
        $data['woven_body_material_3_consumption'] = $dt->tbl_woven_body_material_3_consumption;
        $data['woven_body_material_3_rate'] = $dt->tbl_woven_body_material_3_rate;
        $data['woven_body_material_3_total_cost'] = $dt->tbl_woven_body_material_3_total_cost;

        //Body Material 4 consumption cost
        $data['woven_body_material_4_cost'] = $dt->tbl_woven_body_material_4_cost;
        $data['woven_body_material_4_consumption'] = $dt->tbl_woven_body_material_4_consumption;
        $data['woven_body_material_4_rate'] = $dt->tbl_woven_body_material_4_rate;
        $data['woven_body_material_4_total_cost'] = $dt->tbl_woven_body_material_4_total_cost;

        //Body Material 5 consumption cost
        $data['woven_body_material_5_cost'] = $dt->tbl_woven_body_material_5_cost;
        $data['woven_body_material_5_consumption'] = $dt->tbl_woven_body_material_5_consumption;
        $data['woven_body_material_5_rate'] = $dt->tbl_woven_body_material_5_rate;
        $data['woven_body_material_5_total_cost'] = $dt->tbl_woven_body_material_5_total_cost;

        //Body Material 6 consumption cost
        $data['woven_body_material_6_cost'] = $dt->tbl_woven_body_material_6_cost;
        $data['woven_body_material_6_consumption'] = $dt->tbl_woven_body_material_6_consumption;
        $data['woven_body_material_6_rate'] = $dt->tbl_woven_body_material_6_rate;
        $data['woven_body_material_6_total_cost'] = $dt->tbl_woven_body_material_6_total_cost;


        $data['zipper_cost'] = $dt->tbl_woven_trims_yard_zipper_item_cost;
        $data['zipper_consumption'] = $dt->tbl_woven_trims_yard_zipper_item_consumption;
        $data['zipper_consumption_rate'] = $dt->tbl_woven_trims_yard_zipper_item_rate;
        $data['zipper_consumption_cost'] = $dt->tbl_woven_trims_yard_zipper_item_total_cost;


        $data['woven_trims_yard_two_inch_webbing_item_cost'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_cost;
        $data['woven_trims_yard_two_inch_webbing_item_consumption'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_consumption;
        $data['woven_trims_yard_two_inch_webbing_item_rate'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_rate;
        $data['woven_trims_yard_two_inch_webbing_item_total_cost'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_total_cost;

        $data['woven_trims_yard_one_and_half_inch_webbing_item_cost'] = $dt->tbl_woven_trims_yard_one_and_half_inch_webbing_item_cost;
        $data['woven_trims_yard_one_and_half_webbing_item_consumption'] = $dt->tbl_woven_trims_yard_one_and_half_webbing_item_consumption;
        $data['woven_trims_yard_one_and_half_webbing_item_rate'] = $dt->tbl_woven_trims_yard_one_and_half_webbing_item_rate;
        $data['woven_trims_yard_one_and_half_webbing_item_total_cost'] = $dt->tbl_woven_trims_yard_one_and_half_webbing_item_total_cost;

        $data['woven_trims_yard_velcro_item_cost'] = $dt->tbl_woven_trims_yard_velcro_item_cost;
        $data['woven_trims_yard_velcro_item_consumption'] = $dt->tbl_woven_trims_yard_velcro_item_consumption;
        $data['woven_trims_yard_velcro_item_rate'] = $dt->tbl_woven_trims_yard_velcro_item_rate;
        $data['woven_trims_yard_velcro_item_total_cost'] = $dt->tbl_woven_trims_yard_velcro_item_total_cost;


        $data['extra_trim_yard_extra_1_name'] = $dt->tbl_woven_trims_yard_extra_1_name;
        $data['extra_trim_yard_extra_2_name'] = $dt->tbl_woven_trims_yard_extra_2_name;
        $data['extra_trim_yard_extra_3_name'] = $dt->tbl_woven_trims_yard_extra_3_name;


        $data['woven_trims_yard_extra_1_item_cost'] = $dt->tbl_woven_trims_yard_extra_1_item_cost;
        $data['woven_trims_yard_extra_1_item_consumption'] = $dt->tbl_woven_trims_yard_extra_1_item_consumption;
        $data['woven_trims_yard_extra_1_item_rate'] = $dt->tbl_woven_trims_yard_extra_1_item_rate;
        $data['woven_trims_yard_extra_1_item_total_cost'] = $dt->tbl_woven_trims_yard_extra_1_item_total_cost;

        $data['woven_trims_yard_extra_2_item_cost'] = $dt->tbl_woven_trims_yard_extra_2_item_cost;
        $data['woven_trims_yard_extra_2_item_consumption'] = $dt->tbl_woven_trims_yard_extra_2_item_consumption;
        $data['woven_trims_yard_extra_2_item_rate'] = $dt->tbl_woven_trims_yard_extra_2_item_rate;
        $data['woven_trims_yard_extra_2_item_total_cost'] = $dt->tbl_woven_trims_yard_extra_2_item_total_cost;

        $data['woven_trims_yard_extra_3_item_cost'] = $dt->tbl_woven_trims_yard_extra_3_item_cost;
        $data['woven_trims_yard_extra_3_item_consumption'] = $dt->tbl_woven_trims_yard_extra_3_item_consumption;
        $data['woven_trims_yard_extra_3_item_rate'] = $dt->tbl_woven_trims_yard_extra_3_item_rate;
        $data['woven_trims_yard_extra_3_item_total_cost'] = $dt->tbl_woven_trims_yard_extra_3_item_total_cost;


        $data['woven_trims_piece_puller_item_cost'] = $dt->tbl_woven_trims_piece_puller_item_cost;
        $data['woven_trims_piece_puller_item_consumption'] = $dt->tbl_woven_trims_piece_puller_item_consumption;
        $data['woven_trims_piece_puller_item_rate'] = $dt->tbl_woven_trims_piece_puller_item_rate;
        $data['woven_trims_piece_puller_item_total_cost'] = $dt->tbl_woven_trims_piece_puller_item_total_cost;


        $data['woven_trims_piece_print_item_cost'] = $dt->tbl_woven_trims_piece_print_item_cost;
        $data['woven_trims_piece_print_item_consumption'] = $dt->tbl_woven_trims_piece_print_item_consumption;
        $data['woven_trims_piece_print_item_rate'] = $dt->tbl_woven_trims_piece_print_item_rate;
        $data['woven_trims_piece_print_item_total_cost'] = $dt->tbl_woven_trims_piece_print_item_total_cost;

        $data['woven_trims_piece_d_buckle_item_cost'] = $dt->tbl_woven_trims_piece_d_buckle_item_cost;
        $data['woven_trims_piece_d_buckle_item_consumption'] = $dt->tbl_woven_trims_piece_d_buckle_item_consumption;
        $data['woven_trims_piece_d_buckle_item_rate'] = $dt->tbl_woven_trims_piece_d_buckle_item_rate;
        $data['woven_trims_piece_d_buckle_item_total_cost'] = $dt->tbl_woven_trims_piece_d_buckle_item_total_cost;

        $data['woven_trims_piece_swivel_hook_item_cost'] = $dt->tbl_woven_trims_piece_swivel_hook_item_cost;
        $data['woven_trims_piece_swivel_hook_item_consumption'] = $dt->tbl_woven_trims_piece_swivel_hook_item_consumption;
        $data['woven_trims_piece_swivel_hook_item_rate'] = $dt->tbl_woven_trims_piece_swivel_hook_item_rate;
        $data['woven_trims_piece_swivel_hook_item_total_cost'] = $dt->tbl_woven_trims_piece_swivel_hook_item_total_cost;

        $data['woven_trims_piece_adjustable_bukle_item_cost'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_cost;
        $data['woven_trims_piece_adjustable_bukle_item_consumption'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_consumption;
        $data['woven_trims_piece_adjustable_bukle_item_rate'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_rate;
        $data['woven_trims_piece_adjustable_bukle_item_total_cost'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_total_cost;


        $data['woven_trims_piece_magnetic_button_item_cost'] = $dt->tbl_woven_trims_piece_magnetic_button_item_cost;
        $data['woven_trims_piece_magnetic_button_item_consumption'] = $dt->tbl_woven_trims_piece_magnetic_button_item_consumption;
        $data['woven_trims_piece_magnetic_button_item_rate'] = $dt->tbl_woven_trims_piece_magnetic_button_item_rate;
        $data['woven_trims_piece_magnetic_button_item_total_cost'] = $dt->tbl_woven_trims_piece_magnetic_button_item_total_cost;

        $data['woven_trims_piece_snap_button_item_cost'] = $dt->tbl_woven_trims_piece_snap_button_item_cost;
        $data['woven_trims_piece_snap_button_item_consumption'] = $dt->tbl_woven_trims_piece_snap_button_item_consumption;
        $data['woven_trims_piece_snap_button_item_rate'] = $dt->tbl_woven_trims_piece_snap_button_item_rate;
        $data['woven_trims_piece_snap_button_item_total_cost'] = $dt->tbl_woven_trims_piece_snap_button_item_total_cost;

        $data['woven_trims_piece_rivet_item_cost'] = $dt->tbl_woven_trims_piece_rivet_item_cost;
        $data['woven_trims_piece_rivet_item_consumption'] = $dt->tbl_woven_trims_piece_rivet_item_consumption;
        $data['woven_trims_piece_rivet_item_rate'] = $dt->tbl_woven_trims_piece_rivet_item_rate;
        $data['woven_trims_piece_rivet_item_total_cost'] = $dt->tbl_woven_trims_piece_rivet_item_total_cost;

        $data['woven_trims_piece_bottom_base_item_cost'] = $dt->tbl_woven_trims_piece_bottom_base_item_cost;
        $data['woven_trims_piece_bottom_base_item_consumption'] = $dt->tbl_woven_trims_piece_bottom_base_item_consumption;
        $data['woven_trims_piece_bottom_base_item_rate'] = $dt->tbl_woven_trims_piece_bottom_base_item_rate;
        $data['woven_trims_piece_bottom_base_item_total_cost'] = $dt->tbl_woven_trims_piece_bottom_base_item_total_cost;

        $data['woven_trims_piece_thread_item_cost'] = $dt->tbl_woven_trims_piece_thread_item_cost;
        $data['woven_trims_piece_thread_item_consumption'] = $dt->tbl_woven_trims_piece_thread_item_consumption;
        $data['woven_trims_piece_thread_item_rate'] = $dt->tbl_woven_trims_piece_thread_item_rate;
        $data['woven_trims_piece_thread_item_total_cost'] = $dt->tbl_woven_trims_piece_thread_item_total_cost;

        $data['woven_trims_piece_tag_item_cost'] = $dt->tbl_woven_trims_piece_tag_item_cost;
        $data['woven_trims_piece_tag_item_consumption'] = $dt->tbl_woven_trims_piece_tag_item_consumption;
        $data['woven_trims_piece_tag_item_rate'] = $dt->tbl_woven_trims_piece_tag_item_rate;
        $data['woven_trims_piece_tag_item_total_cost'] = $dt->tbl_woven_trims_piece_tag_item_total_cost;

        $data['woven_trims_piece_label_item_cost'] = $dt->tbl_woven_trims_piece_label_item_cost;
        $data['woven_trims_piece_label_item_consumption'] = $dt->tbl_woven_trims_piece_label_item_consumption;
        $data['woven_trims_piece_label_item_rate'] = $dt->tbl_woven_trims_piece_label_item_rate;
        $data['woven_trims_piece_label_item_total_cost'] = $dt->tbl_woven_trims_piece_label_item_total_cost;

        $data['woven_trims_piece_packing_item_cost'] = $dt->tbl_woven_trims_piece_packing_item_cost;
        $data['woven_trims_piece_packing_item_consumption'] = $dt->tbl_woven_trims_piece_packing_item_consumption;
        $data['woven_trims_piece_packing_item_rate'] = $dt->tbl_woven_trims_piece_packing_item_rate;
        $data['woven_trims_piece_packing_item_total_cost'] = $dt->tbl_woven_trims_piece_packing_item_total_cost;

        $data['woven_trims_piece_bottom_shoe_item_cost'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_cost;
        $data['woven_trims_piece_bottom_shoe_item_consumption'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_consumption;
        $data['woven_trims_piece_bottom_shoe_item_rate'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_rate;
        $data['woven_trims_piece_bottom_shoe_item_total_cost'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_total_cost;

        $data['woven_trims_piece_extra_1_name'] = $dt->tbl_woven_trims_piece_extra_1_name;
        $data['woven_trims_piece_extra_1_item_cost'] = $dt->tbl_woven_trims_piece_extra_1_item_cost;
        $data['woven_trims_piece_extra_1_item_consumption'] = $dt->tbl_woven_trims_piece_extra_1_item_consumption;
        $data['woven_trims_piece_extra_1_item_rate'] = $dt->tbl_woven_trims_piece_extra_1_item_rate;
        $data['woven_trims_piece_extra_1_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_1_item_total_cost;

        $data['woven_trims_piece_extra_2_name'] = $dt->tbl_woven_trims_piece_extra_2_name;
        $data['woven_trims_piece_extra_2_item_cost'] = $dt->tbl_woven_trims_piece_extra_2_item_cost;
        $data['woven_trims_piece_extra_2_item_consumption'] = $dt->tbl_woven_trims_piece_extra_2_item_consumption;
        $data['woven_trims_piece_extra_2_item_rate'] = $dt->tbl_woven_trims_piece_extra_2_item_rate;
        $data['woven_trims_piece_extra_2_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_2_item_total_cost;

        $data['woven_trims_piece_extra_3_name'] = $dt->tbl_woven_trims_piece_extra_3_name;
        $data['woven_trims_piece_extra_3_item_cost'] = $dt->tbl_woven_trims_piece_extra_3_item_cost;
        $data['woven_trims_piece_extra_3_item_consumption'] = $dt->tbl_woven_trims_piece_extra_3_item_consumption;
        $data['woven_trims_piece_extra_3_item_rate'] = $dt->tbl_woven_trims_piece_extra_3_item_rate;
        $data['woven_trims_piece_extra_3_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_3_item_total_cost;

        $data['woven_trims_piece_extra_4_name'] = $dt->tbl_woven_trims_piece_extra_4_name;
        $data['woven_trims_piece_extra_4_item_cost'] = $dt->tbl_woven_trims_piece_extra_4_item_cost;
        $data['woven_trims_piece_extra_4_item_consumption'] = $dt->tbl_woven_trims_piece_extra_4_item_consumption;
        $data['woven_trims_piece_extra_4_item_rate'] = $dt->tbl_woven_trims_piece_extra_4_item_rate;
        $data['woven_trims_piece_extra_4_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_4_item_total_cost;

        $data['woven_trims_piece_extra_5_name'] = $dt->tbl_woven_trims_piece_extra_5_name;
        $data['woven_trims_piece_extra_5_item_cost'] = $dt->tbl_woven_trims_piece_extra_5_item_cost;
        $data['woven_trims_piece_extra_5_item_consumption'] = $dt->tbl_woven_trims_piece_extra_5_item_consumption;
        $data['woven_trims_piece_extra_5_item_rate'] = $dt->tbl_woven_trims_piece_extra_5_item_rate;
        $data['woven_trims_piece_extra_5_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_5_item_total_cost;


        //Dimension for Body Material 1
        $data['dimension_id'] = $dt->tbl_dimension_id;


        $data['body_material_first_extra_1'] = $dt->tbl_dimnesion_body_material_first_extra_1;
        $data['body_material_first_extra_2'] = $dt->tbl_dimnesion_body_material_first_extra_2;
        $data['body_material_first_extra_3'] = $dt->tbl_dimnesion_body_material_first_extra_3;
        $data['body_material_second_extra_1'] = $dt->tbl_dimnesion_body_material_second_extra_1;
        $data['body_material_second_extra_2'] = $dt->tbl_dimnesion_body_material_second_extra_2;
        $data['body_material_second_extra_3'] = $dt->tbl_dimnesion_body_material_second_extra_3;



        $data['body_material_1_front_length'] = $dt->tbl_dimension_body_material_1_front_length;
        $data['body_material_1_front_length_allowance'] = $dt->tbl_dimension_body_material_1_front_length_allowance;
        $data['body_material_1_front_length_total'] = $dt->tbl_dimension_body_material_1_front_length_total;

        $data['body_material_1_front_width'] = $dt->tbl_dimension_body_material_1_front_width;
        $data['body_material_1_front_width_allowance'] = $dt->tbl_dimension_body_material_1_front_width_allowance;
        $data['body_material_1_front_width_total'] = $dt->tbl_dimension_body_material_1_front_width_total;

        $data['body_material_1_back_length'] = $dt->tbl_dimension_body_material_1_back_length;
        $data['body_material_1_back_length_allowance'] = $dt->tbl_dimension_body_material_1_back_length_allowance;
        $data['body_material_1_back_length_total'] = $dt->tbl_dimension_body_material_1_back_length_total;

        $data['body_material_1_back_width'] = $dt->tbl_dimension_body_material_1_back_width;
        $data['body_material_1_back_width_allowance'] = $dt->tbl_dimension_body_material_1_back_width_allowance;
        $data['body_material_1_back_width_total'] = $dt->tbl_dimension_body_material_1_back_width_total;

        $data['body_material_1_top_length'] = $dt->tbl_dimension_body_material_1_top_length;
        $data['body_material_1_top_length_allowance'] = $dt->tbl_dimension_body_material_1_top_length_allowance;
        $data['body_material_1_top_length_total'] = $dt->tbl_dimension_body_material_1_top_length_total;

        $data['body_material_1_top_width'] = $dt->tbl_dimension_body_material_1_top_width;
        $data['body_material_1_top_width_allowance'] = $dt->tbl_dimension_body_material_1_top_width_allowance;
        $data['body_material_1_top_width_total'] = $dt->tbl_dimension_body_material_1_top_width_total;

        $data['body_material_1_bottom_length'] = $dt->tbl_dimension_body_material_1_bottom_length;
        $data['body_material_1_bottom_length_allowance'] = $dt->tbl_dimension_body_material_1_bottom_length_allowance;
        $data['body_material_1_bottom_length_total'] = $dt->tbl_dimension_body_material_1_bottom_length_total;

        $data['body_material_1_bottom_width'] = $dt->tbl_dimension_body_material_1_bottom_width;
        $data['body_material_1_bottom_width_allowance'] = $dt->tbl_dimension_body_material_1_bottom_width_allowance;
        $data['body_material_1_bottom_width_total'] = $dt->tbl_dimension_body_material_1_bottom_width_total;

        $data['body_material_1_left_length'] = $dt->tbl_dimension_body_material_1_left_length;
        $data['body_material_1_left_length_allowance'] = $dt->tbl_dimension_body_material_1_left_length_allowance;
        $data['body_material_1_left_length_total'] = $dt->tbl_dimension_body_material_1_left_length_total;

        $data['body_material_1_left_width'] = $dt->tbl_dimension_body_material_1_left_width;
        $data['body_material_1_left_width_allowance'] = $dt->tbl_dimension_body_material_1_left_width_allowance;
        $data['body_material_1_left_width_total'] = $dt->tbl_dimension_body_material_1_left_width_total;

        $data['body_material_1_right_length'] = $dt->tbl_dimension_body_material_1_right_length;
        $data['body_material_1_right_length_allowance'] = $dt->tbl_dimension_body_material_1_right_length_allowance;
        $data['body_material_1_right_length_total'] = $dt->tbl_dimension_body_material_1_right_length_total;

        $data['body_material_1_right_width'] = $dt->tbl_dimension_body_material_1_right_width;
        $data['body_material_1_right_width_allowance'] = $dt->tbl_dimension_body_material_1_right_width_allowance;
        $data['body_material_1_right_width_total'] = $dt->tbl_dimension_body_material_1_right_width_total;

        $data['body_material_1_pocket_length'] = $dt->tbl_dimension_body_material_1_pocket_length;
        $data['body_material_1_pocket_length_allowance'] = $dt->tbl_dimension_body_material_1_pocket_length_allowance;
        $data['body_material_1_pocket_length_total'] = $dt->tbl_dimension_body_material_1_pocket_length_total;

        $data['body_material_1_pocket_width'] = $dt->tbl_dimension_body_material_1_pocket_width;
        $data['body_material_1_pocket_width_allowance'] = $dt->tbl_dimension_body_material_1_pocket_width_allowance;
        $data['body_material_1_pocket_width_total'] = $dt->tbl_dimension_body_material_1_pocket_width_total;

        $data['body_material_1_extra_1_length'] = $dt->tbl_dimension_body_material_1_extra_1_length;
        $data['body_material_1_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_1_extra_1_length_allowance;
        $data['body_material_1_extra_1_length_total'] = $dt->tbl_dimension_body_material_1_extra_1_length_total;

        $data['body_material_1_extra_1_width'] = $dt->tbl_dimension_body_material_1_extra_1_width;
        $data['body_material_1_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_1_extra_1_width_allowance;
        $data['body_material_1_extra_1_width_total'] = $dt->tbl_dimension_body_material_1_extra_1_width_total;

        $data['body_material_1_extra_2_length'] = $dt->tbl_dimension_body_material_1_extra_2_length;
        $data['body_material_1_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_1_extra_2_length_allowance;
        $data['body_material_1_extra_2_length_total'] = $dt->tbl_dimension_body_material_1_extra_2_length_total;

        $data['body_material_1_extra_2_width'] = $dt->tbl_dimension_body_material_1_extra_2_width;
        $data['body_material_1_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_1_extra_2_width_allowance;
        $data['body_material_1_extra_2_width_total'] = $dt->tbl_dimension_body_material_1_extra_2_width_total;

        $data['body_material_1_extra_3_length'] = $dt->tbl_dimension_body_material_1_extra_3_length;
        $data['body_material_1_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_1_extra_3_length_allowance;
        $data['body_material_1_extra_3_length_total'] = $dt->tbl_dimension_body_material_1_extra_3_length_total;

        $data['body_material_1_extra_3_width'] = $dt->tbl_dimension_body_material_1_extra_3_width;
        $data['body_material_1_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_1_extra_3_width_allowance;
        $data['body_material_1_extra_3_width_total'] = $dt->tbl_dimension_body_material_1_extra_3_width_total;

        //Dimension for Body Material 2
        $data['body_material_2_front_length'] = $dt->tbl_dimension_body_material_2_front_length;
        $data['body_material_2_front_length_allowance'] = $dt->tbl_dimension_body_material_2_front_length_allowance;
        $data['body_material_2_front_length_total'] = $dt->tbl_dimension_body_material_2_front_length_total;

        $data['body_material_2_front_width'] = $dt->tbl_dimension_body_material_2_front_width;
        $data['body_material_2_front_width_allowance'] = $dt->tbl_dimension_body_material_2_front_width_allowance;
        $data['body_material_2_front_width_total'] = $dt->tbl_dimension_body_material_2_front_width_total;

        $data['body_material_2_back_length'] = $dt->tbl_dimension_body_material_2_back_length;
        $data['body_material_2_back_length_allowance'] = $dt->tbl_dimension_body_material_2_back_length_allowance;
        $data['body_material_2_back_length_total'] = $dt->tbl_dimension_body_material_2_back_length_total;

        $data['body_material_2_back_width'] = $dt->tbl_dimension_body_material_2_back_width;
        $data['body_material_2_back_width_allowance'] = $dt->tbl_dimension_body_material_2_back_width_allowance;
        $data['body_material_2_back_width_total'] = $dt->tbl_dimension_body_material_2_back_width_total;

        $data['body_material_2_top_length'] = $dt->tbl_dimension_body_material_2_top_length;
        $data['body_material_2_top_length_allowance'] = $dt->tbl_dimension_body_material_2_top_length_allowance;
        $data['body_material_2_top_length_total'] = $dt->tbl_dimension_body_material_2_top_length_total;

        $data['body_material_2_top_width'] = $dt->tbl_dimension_body_material_2_top_width;
        $data['body_material_2_top_width_allowance'] = $dt->tbl_dimension_body_material_2_top_width_allowance;
        $data['body_material_2_top_width_total'] = $dt->tbl_dimension_body_material_2_top_width_total;

        $data['body_material_2_bottom_length'] = $dt->tbl_dimension_body_material_2_bottom_length;
        $data['body_material_2_bottom_length_allowance'] = $dt->tbl_dimension_body_material_2_bottom_length_allowance;
        $data['body_material_2_bottom_length_total'] = $dt->tbl_dimension_body_material_2_bottom_length_total;

        $data['body_material_2_bottom_width'] = $dt->tbl_dimension_body_material_2_bottom_width;
        $data['body_material_2_bottom_width_allowance'] = $dt->tbl_dimension_body_material_2_bottom_width_allowance;
        $data['body_material_2_bottom_width_total'] = $dt->tbl_dimension_body_material_2_bottom_width_total;

        $data['body_material_2_left_length'] = $dt->tbl_dimension_body_material_2_left_length;
        $data['body_material_2_left_length_allowance'] = $dt->tbl_dimension_body_material_2_left_length_allowance;
        $data['body_material_2_left_length_total'] = $dt->tbl_dimension_body_material_2_left_length_total;

        $data['body_material_2_left_width'] = $dt->tbl_dimension_body_material_2_left_width;
        $data['body_material_2_left_width_allowance'] = $dt->tbl_dimension_body_material_2_left_width_allowance;
        $data['body_material_2_left_width_total'] = $dt->tbl_dimension_body_material_2_left_width_total;

        $data['body_material_2_right_length'] = $dt->tbl_dimension_body_material_2_right_length;
        $data['body_material_2_right_length_allowance'] = $dt->tbl_dimension_body_material_2_right_length_allowance;
        $data['body_material_2_right_length_total'] = $dt->tbl_dimension_body_material_2_right_length_total;

        $data['body_material_2_right_width'] = $dt->tbl_dimension_body_material_2_right_width;
        $data['body_material_2_right_width_allowance'] = $dt->tbl_dimension_body_material_2_right_width_allowance;
        $data['body_material_2_right_width_total'] = $dt->tbl_dimension_body_material_2_right_width_total;

        $data['body_material_2_pocket_length'] = $dt->tbl_dimension_body_material_2_pocket_length;
        $data['body_material_2_pocket_length_allowance'] = $dt->tbl_dimension_body_material_2_pocket_length_allowance;
        $data['body_material_2_pocket_length_total'] = $dt->tbl_dimension_body_material_2_pocket_length_total;

        $data['body_material_2_pocket_width'] = $dt->tbl_dimension_body_material_2_pocket_width;
        $data['body_material_2_pocket_width_allowance'] = $dt->tbl_dimension_body_material_2_pocket_width_allowance;
        $data['body_material_2_pocket_width_total'] = $dt->tbl_dimension_body_material_2_pocket_width_total;

        $data['body_material_2_extra_1_length'] = $dt->tbl_dimension_body_material_2_extra_1_length;
        $data['body_material_2_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_2_extra_1_length_allowance;
        $data['body_material_2_extra_1_length_total'] = $dt->tbl_dimension_body_material_2_extra_1_length_total;

        $data['body_material_2_extra_1_width'] = $dt->tbl_dimension_body_material_2_extra_1_width;
        $data['body_material_2_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_2_extra_1_width_allowance;
        $data['body_material_2_extra_1_width_total'] = $dt->tbl_dimension_body_material_2_extra_1_width_total;

        $data['body_material_2_extra_2_length'] = $dt->tbl_dimension_body_material_2_extra_2_length;
        $data['body_material_2_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_2_extra_2_length_allowance;
        $data['body_material_2_extra_2_length_total'] = $dt->tbl_dimension_body_material_2_extra_2_length_total;

        $data['body_material_2_extra_2_width'] = $dt->tbl_dimension_body_material_2_extra_2_width;
        $data['body_material_2_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_2_extra_2_width_allowance;
        $data['body_material_2_extra_2_width_total'] = $dt->tbl_dimension_body_material_2_extra_2_width_total;

        $data['body_material_2_extra_3_length'] = $dt->tbl_dimension_body_material_2_extra_3_length;
        $data['body_material_2_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_2_extra_3_length_allowance;
        $data['body_material_2_extra_3_length_total'] = $dt->tbl_dimension_body_material_2_extra_3_length_total;

        $data['body_material_2_extra_3_width'] = $dt->tbl_dimension_body_material_2_extra_3_length_total;
        $data['body_material_2_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_2_extra_3_width_allowance;
        $data['body_material_2_extra_3_width_total'] = $dt->tbl_dimension_body_material_2_extra_3_width_total;

        //Dimension for Body Material 3
        $data['body_material_3_front_length'] = $dt->tbl_dimension_body_material_3_front_length;
        $data['body_material_3_front_length_allowance'] = $dt->tbl_dimension_body_material_3_front_length_allowance;
        $data['body_material_3_front_length_total'] = $dt->tbl_dimension_body_material_3_front_length_total;

        $data['body_material_3_front_width'] = $dt->tbl_dimension_body_material_3_front_width;
        $data['body_material_3_front_width_allowance'] = $dt->tbl_dimension_body_material_3_front_width_allowance;
        $data['body_material_3_front_width_total'] = $dt->tbl_dimension_body_material_3_front_width_total;

        $data['body_material_3_back_length'] = $dt->tbl_dimension_body_material_3_back_length;
        $data['body_material_3_back_length_allowance'] = $dt->tbl_dimension_body_material_3_back_length_allowance;
        $data['body_material_3_back_length_total'] = $dt->tbl_dimension_body_material_3_back_length_total;

        $data['body_material_3_back_width'] = $dt->tbl_dimension_body_material_3_back_width;
        $data['body_material_3_back_width_allowance'] = $dt->tbl_dimension_body_material_3_back_width_allowance;
        $data['body_material_3_back_width_total'] = $dt->tbl_dimension_body_material_3_back_width_total;

        $data['body_material_3_top_length'] = $dt->tbl_dimension_body_material_3_top_length;
        $data['body_material_3_top_length_allowance'] = $dt->tbl_dimension_body_material_3_top_length_allowance;
        $data['body_material_3_top_length_total'] = $dt->tbl_dimension_body_material_3_top_length_total;

        $data['body_material_3_top_width'] = $dt->tbl_dimension_body_material_3_top_width;
        $data['body_material_3_top_width_allowance'] = $dt->tbl_dimension_body_material_3_top_width_allowance;
        $data['body_material_3_top_width_total'] = $dt->tbl_dimension_body_material_3_top_width_total;

        $data['body_material_3_bottom_length'] = $dt->tbl_dimension_body_material_3_bottom_length;
        $data['body_material_3_bottom_length_allowance'] = $dt->tbl_dimension_body_material_3_bottom_length_allowance;
        $data['body_material_3_bottom_length_total'] = $dt->tbl_dimension_body_material_3_bottom_length_total;

        $data['body_material_3_bottom_width'] = $dt->tbl_dimension_body_material_3_bottom_width;
        $data['body_material_3_bottom_width_allowance'] = $dt->tbl_dimension_body_material_3_bottom_width_allowance;
        $data['body_material_3_bottom_width_total'] = $dt->tbl_dimension_body_material_3_bottom_width_total;

        $data['body_material_3_left_length'] = $dt->tbl_dimension_body_material_3_left_length;
        $data['body_material_3_left_length_allowance'] = $dt->tbl_dimension_body_material_3_left_length_allowance;
        $data['body_material_3_left_length_total'] = $dt->tbl_dimension_body_material_3_left_length_total;

        $data['body_material_3_left_width'] = $dt->tbl_dimension_body_material_3_left_width;
        $data['body_material_3_left_width_allowance'] = $dt->tbl_dimension_body_material_3_left_width_allowance;
        $data['body_material_3_left_width_total'] = $dt->tbl_dimension_body_material_3_left_width_total;

        $data['body_material_3_right_length'] = $dt->tbl_dimension_body_material_3_right_length;
        $data['body_material_3_right_length_allowance'] = $dt->tbl_dimension_body_material_3_right_length_allowance;
        $data['body_material_3_right_length_total'] = $dt->tbl_dimension_body_material_3_right_length_total;

        $data['body_material_3_right_width'] = $dt->tbl_dimension_body_material_3_right_width;
        $data['body_material_3_right_width_allowance'] = $dt->tbl_dimension_body_material_3_right_width_allowance;
        $data['body_material_3_right_width_total'] = $dt->tbl_dimension_body_material_3_right_width_total;

        $data['body_material_3_pocket_length'] = $dt->tbl_dimension_body_material_3_pocket_length;
        $data['body_material_3_pocket_length_allowance'] = $dt->tbl_dimension_body_material_3_pocket_length_allowance;
        $data['body_material_3_pocket_length_total'] = $dt->tbl_dimension_body_material_3_pocket_length_total;

        $data['body_material_3_pocket_width'] = $dt->tbl_dimension_body_material_3_pocket_width;
        $data['body_material_3_pocket_width_allowance'] = $dt->tbl_dimension_body_material_3_pocket_width_allowance;
        $data['body_material_3_pocket_width_total'] = $dt->tbl_dimension_body_material_3_pocket_width_total;

        $data['body_material_3_extra_1_length'] = $dt->tbl_dimension_body_material_3_extra_1_length;
        $data['body_material_3_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_3_extra_1_length_allowance;
        $data['body_material_3_extra_1_length_total'] = $dt->tbl_dimension_body_material_3_extra_1_length_total;

        $data['body_material_3_extra_1_width'] = $dt->tbl_dimension_body_material_3_extra_1_width;
        $data['body_material_3_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_3_extra_1_width_allowance;
        $data['body_material_3_extra_1_width_total'] = $dt->tbl_dimension_body_material_3_extra_1_width_total;

        $data['body_material_3_extra_2_length'] = $dt->tbl_dimension_body_material_3_extra_2_length;
        $data['body_material_3_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_3_extra_2_length_allowance;
        $data['body_material_3_extra_2_length_total'] = $dt->tbl_dimension_body_material_3_extra_2_length_total;

        $data['body_material_3_extra_2_width'] = $dt->tbl_dimension_body_material_3_extra_2_width;
        $data['body_material_3_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_3_extra_2_width_allowance;
        $data['body_material_3_extra_2_width_total'] = $dt->tbl_dimension_body_material_3_extra_2_width_total;

        $data['body_material_3_extra_3_length'] = $dt->tbl_dimension_body_material_3_extra_3_length;
        $data['body_material_3_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_3_extra_3_length_allowance;
        $data['body_material_3_extra_3_length_total'] = $dt->tbl_dimension_body_material_3_extra_3_length_total;

        $data['body_material_3_extra_3_width'] = $dt->tbl_dimension_body_material_3_extra_3_length_total;
        $data['body_material_3_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_3_extra_3_width_allowance;
        $data['body_material_3_extra_3_width_total'] = $dt->tbl_dimension_body_material_3_extra_3_width_total;


        //Dimension for Body Material 4
        $data['body_material_4_front_length'] = $dt->tbl_dimension_body_material_4_front_length;
        $data['body_material_4_front_length_allowance'] = $dt->tbl_dimension_body_material_4_front_length_allowance;
        $data['body_material_4_front_length_total'] = $dt->tbl_dimension_body_material_4_front_length_total;

        $data['body_material_4_front_width'] = $dt->tbl_dimension_body_material_4_front_width;
        $data['body_material_4_front_width_allowance'] = $dt->tbl_dimension_body_material_4_front_width_allowance;
        $data['body_material_4_front_width_total'] = $dt->tbl_dimension_body_material_4_front_width_total;

        $data['body_material_4_back_length'] = $dt->tbl_dimension_body_material_4_back_length;
        $data['body_material_4_back_length_allowance'] = $dt->tbl_dimension_body_material_4_back_length_allowance;
        $data['body_material_4_back_length_total'] = $dt->tbl_dimension_body_material_4_back_length_total;

        $data['body_material_4_back_width'] = $dt->tbl_dimension_body_material_4_back_width;
        $data['body_material_4_back_width_allowance'] = $dt->tbl_dimension_body_material_4_back_width_allowance;
        $data['body_material_4_back_width_total'] = $dt->tbl_dimension_body_material_4_back_width_total;

        $data['body_material_4_top_length'] = $dt->tbl_dimension_body_material_4_top_length;
        $data['body_material_4_top_length_allowance'] = $dt->tbl_dimension_body_material_4_top_length_allowance;
        $data['body_material_4_top_length_total'] = $dt->tbl_dimension_body_material_4_top_length_total;

        $data['body_material_4_top_width'] = $dt->tbl_dimension_body_material_4_top_width;
        $data['body_material_4_top_width_allowance'] = $dt->tbl_dimension_body_material_4_top_width_allowance;
        $data['body_material_4_top_width_total'] = $dt->tbl_dimension_body_material_4_top_width_total;

        $data['body_material_4_bottom_length'] = $dt->tbl_dimension_body_material_4_bottom_length;
        $data['body_material_4_bottom_length_allowance'] = $dt->tbl_dimension_body_material_4_bottom_length_allowance;
        $data['body_material_4_bottom_length_total'] = $dt->tbl_dimension_body_material_4_bottom_length_total;

        $data['body_material_4_bottom_width'] = $dt->tbl_dimension_body_material_4_bottom_width;
        $data['body_material_4_bottom_width_allowance'] = $dt->tbl_dimension_body_material_4_bottom_width_allowance;
        $data['body_material_4_bottom_width_total'] = $dt->tbl_dimension_body_material_4_bottom_width_total;

        $data['body_material_4_left_length'] = $dt->tbl_dimension_body_material_4_left_length;
        $data['body_material_4_left_length_allowance'] = $dt->tbl_dimension_body_material_4_left_length_allowance;
        $data['body_material_4_left_length_total'] = $dt->tbl_dimension_body_material_4_left_length_total;

        $data['body_material_4_left_width'] = $dt->tbl_dimension_body_material_4_left_width;
        $data['body_material_4_left_width_allowance'] = $dt->tbl_dimension_body_material_4_left_width_allowance;
        $data['body_material_4_left_width_total'] = $dt->tbl_dimension_body_material_4_left_width_total;

        $data['body_material_4_right_length'] = $dt->tbl_dimension_body_material_4_right_length;
        $data['body_material_4_right_length_allowance'] = $dt->tbl_dimension_body_material_4_right_length_allowance;
        $data['body_material_4_right_length_total'] = $dt->tbl_dimension_body_material_4_right_length_total;

        $data['body_material_4_right_width'] = $dt->tbl_dimension_body_material_4_right_width;
        $data['body_material_4_right_width_allowance'] = $dt->tbl_dimension_body_material_4_right_width_allowance;
        $data['body_material_4_right_width_total'] = $dt->tbl_dimension_body_material_4_right_width_total;

        $data['body_material_4_pocket_length'] = $dt->tbl_dimension_body_material_4_pocket_length;
        $data['body_material_4_pocket_length_allowance'] = $dt->tbl_dimension_body_material_4_pocket_length_allowance;
        $data['body_material_4_pocket_length_total'] = $dt->tbl_dimension_body_material_4_pocket_length_total;

        $data['body_material_4_pocket_width'] = $dt->tbl_dimension_body_material_4_pocket_width;
        $data['body_material_4_pocket_width_allowance'] = $dt->tbl_dimension_body_material_4_pocket_width_allowance;
        $data['body_material_4_pocket_width_total'] = $dt->tbl_dimension_body_material_4_pocket_width_total;

        $data['body_material_4_extra_1_length'] = $dt->tbl_dimension_body_material_4_extra_1_length;
        $data['body_material_4_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_4_extra_1_length_allowance;
        $data['body_material_4_extra_1_length_total'] = $dt->tbl_dimension_body_material_4_extra_1_length_total;

        $data['body_material_4_extra_1_width'] = $dt->tbl_dimension_body_material_4_extra_1_width;
        $data['body_material_4_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_4_extra_1_width_allowance;
        $data['body_material_4_extra_1_width_total'] = $dt->tbl_dimension_body_material_4_extra_1_width_total;

        $data['body_material_4_extra_2_length'] = $dt->tbl_dimension_body_material_4_extra_2_length;
        $data['body_material_4_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_4_extra_2_length_allowance;
        $data['body_material_4_extra_2_length_total'] = $dt->tbl_dimension_body_material_4_extra_2_length_total;

        $data['body_material_4_extra_2_width'] = $dt->tbl_dimension_body_material_4_extra_2_width;
        $data['body_material_4_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_4_extra_2_width_allowance;
        $data['body_material_4_extra_2_width_total'] = $dt->tbl_dimension_body_material_4_extra_2_width_total;

        $data['body_material_4_extra_3_length'] = $dt->tbl_dimension_body_material_4_extra_3_length;
        $data['body_material_4_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_4_extra_3_length_allowance;
        $data['body_material_4_extra_3_length_total'] = $dt->tbl_dimension_body_material_4_extra_3_length_total;

        $data['body_material_4_extra_3_width'] = $dt->tbl_dimension_body_material_4_extra_3_length_total;
        $data['body_material_4_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_4_extra_3_width_allowance;
        $data['body_material_4_extra_3_width_total'] = $dt->tbl_dimension_body_material_4_extra_3_width_total;

        //Dimension for Body Material 5
        $data['body_material_5_front_length'] = $dt->tbl_dimension_body_material_5_front_length;
        $data['body_material_5_front_length_allowance'] = $dt->tbl_dimension_body_material_5_front_length_allowance;
        $data['body_material_5_front_length_total'] = $dt->tbl_dimension_body_material_5_front_length_total;

        $data['body_material_5_front_width'] = $dt->tbl_dimension_body_material_5_front_width;
        $data['body_material_5_front_width_allowance'] = $dt->tbl_dimension_body_material_5_front_width_allowance;
        $data['body_material_5_front_width_total'] = $dt->tbl_dimension_body_material_5_front_width_total;

        $data['body_material_5_back_length'] = $dt->tbl_dimension_body_material_5_back_length;
        $data['body_material_5_back_length_allowance'] = $dt->tbl_dimension_body_material_5_back_length_allowance;
        $data['body_material_5_back_length_total'] = $dt->tbl_dimension_body_material_5_back_length_total;

        $data['body_material_5_back_width'] = $dt->tbl_dimension_body_material_5_back_width;
        $data['body_material_5_back_width_allowance'] = $dt->tbl_dimension_body_material_5_back_width_allowance;
        $data['body_material_5_back_width_total'] = $dt->tbl_dimension_body_material_5_back_width_total;

        $data['body_material_5_top_length'] = $dt->tbl_dimension_body_material_5_top_length;
        $data['body_material_5_top_length_allowance'] = $dt->tbl_dimension_body_material_5_top_length_allowance;
        $data['body_material_5_top_length_total'] = $dt->tbl_dimension_body_material_5_top_length_total;

        $data['body_material_5_top_width'] = $dt->tbl_dimension_body_material_5_top_width;
        $data['body_material_5_top_width_allowance'] = $dt->tbl_dimension_body_material_5_top_width_allowance;
        $data['body_material_5_top_width_total'] = $dt->tbl_dimension_body_material_5_top_width_total;

        $data['body_material_5_bottom_length'] = $dt->tbl_dimension_body_material_5_bottom_length;
        $data['body_material_5_bottom_length_allowance'] = $dt->tbl_dimension_body_material_5_bottom_length_allowance;
        $data['body_material_5_bottom_length_total'] = $dt->tbl_dimension_body_material_5_bottom_length_total;

        $data['body_material_5_bottom_width'] = $dt->tbl_dimension_body_material_5_bottom_width;
        $data['body_material_5_bottom_width_allowance'] = $dt->tbl_dimension_body_material_5_bottom_width_allowance;
        $data['body_material_5_bottom_width_total'] = $dt->tbl_dimension_body_material_5_bottom_width_total;

        $data['body_material_5_left_length'] = $dt->tbl_dimension_body_material_5_left_length;
        $data['body_material_5_left_length_allowance'] = $dt->tbl_dimension_body_material_5_left_length_allowance;
        $data['body_material_5_left_length_total'] = $dt->tbl_dimension_body_material_5_left_length_total;

        $data['body_material_5_left_width'] = $dt->tbl_dimension_body_material_5_left_width;
        $data['body_material_5_left_width_allowance'] = $dt->tbl_dimension_body_material_5_left_width_allowance;
        $data['body_material_5_left_width_total'] = $dt->tbl_dimension_body_material_5_left_width_total;

        $data['body_material_5_right_length'] = $dt->tbl_dimension_body_material_5_right_length;
        $data['body_material_5_right_length_allowance'] = $dt->tbl_dimension_body_material_5_right_length_allowance;
        $data['body_material_5_right_length_total'] = $dt->tbl_dimension_body_material_5_right_length_total;

        $data['body_material_5_right_width'] = $dt->tbl_dimension_body_material_5_right_width;
        $data['body_material_5_right_width_allowance'] = $dt->tbl_dimension_body_material_5_right_width_allowance;
        $data['body_material_5_right_width_total'] = $dt->tbl_dimension_body_material_5_right_width_total;

        $data['body_material_5_pocket_length'] = $dt->tbl_dimension_body_material_5_pocket_length;
        $data['body_material_5_pocket_length_allowance'] = $dt->tbl_dimension_body_material_5_pocket_length_allowance;
        $data['body_material_5_pocket_length_total'] = $dt->tbl_dimension_body_material_5_pocket_length_total;

        $data['body_material_5_pocket_width'] = $dt->tbl_dimension_body_material_5_pocket_width;
        $data['body_material_5_pocket_width_allowance'] = $dt->tbl_dimension_body_material_5_pocket_width_allowance;
        $data['body_material_5_pocket_width_total'] = $dt->tbl_dimension_body_material_5_pocket_width_total;

        $data['body_material_5_extra_1_length'] = $dt->tbl_dimension_body_material_5_extra_1_length;
        $data['body_material_5_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_5_extra_1_length_allowance;
        $data['body_material_5_extra_1_length_total'] = $dt->tbl_dimension_body_material_5_extra_1_length_total;

        $data['body_material_5_extra_1_width'] = $dt->tbl_dimension_body_material_5_extra_1_width;
        $data['body_material_5_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_5_extra_1_width_allowance;
        $data['body_material_5_extra_1_width_total'] = $dt->tbl_dimension_body_material_5_extra_1_width_total;

        $data['body_material_5_extra_2_length'] = $dt->tbl_dimension_body_material_5_extra_2_length;
        $data['body_material_5_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_5_extra_2_length_allowance;
        $data['body_material_5_extra_2_length_total'] = $dt->tbl_dimension_body_material_5_extra_2_length_total;

        $data['body_material_5_extra_2_width'] = $dt->tbl_dimension_body_material_5_extra_2_width;
        $data['body_material_5_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_5_extra_2_width_allowance;
        $data['body_material_5_extra_2_width_total'] = $dt->tbl_dimension_body_material_5_extra_2_width_total;

        $data['body_material_5_extra_3_length'] = $dt->tbl_dimension_body_material_5_extra_3_length;
        $data['body_material_5_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_5_extra_3_length_allowance;
        $data['body_material_5_extra_3_length_total'] = $dt->tbl_dimension_body_material_5_extra_3_length_total;

        $data['body_material_5_extra_3_width'] = $dt->tbl_dimension_body_material_5_extra_3_length_total;
        $data['body_material_5_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_5_extra_3_width_allowance;
        $data['body_material_5_extra_3_width_total'] = $dt->tbl_dimension_body_material_5_extra_3_width_total;

        //Dimension for Body Material 6
        $data['body_material_6_front_length'] = $dt->tbl_dimension_body_material_6_front_length;
        $data['body_material_6_front_length_allowance'] = $dt->tbl_dimension_body_material_6_front_length_allowance;
        $data['body_material_6_front_length_total'] = $dt->tbl_dimension_body_material_6_front_length_total;

        $data['body_material_6_front_width'] = $dt->tbl_dimension_body_material_6_front_width;
        $data['body_material_6_front_width_allowance'] = $dt->tbl_dimension_body_material_6_front_width_allowance;
        $data['body_material_6_front_width_total'] = $dt->tbl_dimension_body_material_6_front_width_total;

        $data['body_material_6_back_length'] = $dt->tbl_dimension_body_material_6_back_length;
        $data['body_material_6_back_length_allowance'] = $dt->tbl_dimension_body_material_6_back_length_allowance;
        $data['body_material_6_back_length_total'] = $dt->tbl_dimension_body_material_6_back_length_total;

        $data['body_material_6_back_width'] = $dt->tbl_dimension_body_material_6_back_width;
        $data['body_material_6_back_width_allowance'] = $dt->tbl_dimension_body_material_6_back_width_allowance;
        $data['body_material_6_back_width_total'] = $dt->tbl_dimension_body_material_6_back_width_total;

        $data['body_material_6_top_length'] = $dt->tbl_dimension_body_material_6_top_length;
        $data['body_material_6_top_length_allowance'] = $dt->tbl_dimension_body_material_6_top_length_allowance;
        $data['body_material_6_top_length_total'] = $dt->tbl_dimension_body_material_6_top_length_total;

        $data['body_material_6_top_width'] = $dt->tbl_dimension_body_material_6_top_width;
        $data['body_material_6_top_width_allowance'] = $dt->tbl_dimension_body_material_6_top_width_allowance;
        $data['body_material_6_top_width_total'] = $dt->tbl_dimension_body_material_6_top_width_total;

        $data['body_material_6_bottom_length'] = $dt->tbl_dimension_body_material_6_bottom_length;
        $data['body_material_6_bottom_length_allowance'] = $dt->tbl_dimension_body_material_6_bottom_length_allowance;
        $data['body_material_6_bottom_length_total'] = $dt->tbl_dimension_body_material_6_bottom_length_total;

        $data['body_material_6_bottom_width'] = $dt->tbl_dimension_body_material_6_bottom_width;
        $data['body_material_6_bottom_width_allowance'] = $dt->tbl_dimension_body_material_6_bottom_width_allowance;
        $data['body_material_6_bottom_width_total'] = $dt->tbl_dimension_body_material_6_bottom_width_total;

        $data['body_material_6_left_length'] = $dt->tbl_dimension_body_material_6_left_length;
        $data['body_material_6_left_length_allowance'] = $dt->tbl_dimension_body_material_6_left_length_allowance;
        $data['body_material_6_left_length_total'] = $dt->tbl_dimension_body_material_6_left_length_total;

        $data['body_material_6_left_width'] = $dt->tbl_dimension_body_material_6_left_width;
        $data['body_material_6_left_width_allowance'] = $dt->tbl_dimension_body_material_6_left_width_allowance;
        $data['body_material_6_left_width_total'] = $dt->tbl_dimension_body_material_6_left_width_total;

        $data['body_material_6_right_length'] = $dt->tbl_dimension_body_material_6_right_length;
        $data['body_material_6_right_length_allowance'] = $dt->tbl_dimension_body_material_6_right_length_allowance;
        $data['body_material_6_right_length_total'] = $dt->tbl_dimension_body_material_6_right_length_total;

        $data['body_material_6_right_width'] = $dt->tbl_dimension_body_material_6_right_width;
        $data['body_material_6_right_width_allowance'] = $dt->tbl_dimension_body_material_6_right_width_allowance;
        $data['body_material_6_right_width_total'] = $dt->tbl_dimension_body_material_6_right_width_total;

        $data['body_material_6_pocket_length'] = $dt->tbl_dimension_body_material_6_pocket_length;
        $data['body_material_6_pocket_length_allowance'] = $dt->tbl_dimension_body_material_6_pocket_length_allowance;
        $data['body_material_6_pocket_length_total'] = $dt->tbl_dimension_body_material_6_pocket_length_total;

        $data['body_material_6_pocket_width'] = $dt->tbl_dimension_body_material_6_pocket_width;
        $data['body_material_6_pocket_width_allowance'] = $dt->tbl_dimension_body_material_6_pocket_width_allowance;
        $data['body_material_6_pocket_width_total'] = $dt->tbl_dimension_body_material_6_pocket_width_total;

        $data['body_material_6_extra_1_length'] = $dt->tbl_dimension_body_material_6_extra_1_length;
        $data['body_material_6_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_6_extra_1_length_allowance;
        $data['body_material_6_extra_1_length_total'] = $dt->tbl_dimension_body_material_6_extra_1_length_total;

        $data['body_material_6_extra_1_width'] = $dt->tbl_dimension_body_material_6_extra_1_width;
        $data['body_material_6_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_6_extra_1_width_allowance;
        $data['body_material_6_extra_1_width_total'] = $dt->tbl_dimension_body_material_6_extra_1_width_total;

        $data['body_material_6_extra_2_length'] = $dt->tbl_dimension_body_material_6_extra_2_length;
        $data['body_material_6_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_6_extra_2_length_allowance;
        $data['body_material_6_extra_2_length_total'] = $dt->tbl_dimension_body_material_6_extra_2_length_total;

        $data['body_material_6_extra_2_width'] = $dt->tbl_dimension_body_material_6_extra_2_width;
        $data['body_material_6_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_6_extra_2_width_allowance;
        $data['body_material_6_extra_2_width_total'] = $dt->tbl_dimension_body_material_6_extra_2_width_total;

        $data['body_material_6_extra_3_length'] = $dt->tbl_dimension_body_material_6_extra_3_length;
        $data['body_material_6_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_6_extra_3_length_allowance;
        $data['body_material_6_extra_3_length_total'] = $dt->tbl_dimension_body_material_6_extra_3_length_total;

        $data['body_material_6_extra_3_width'] = $dt->tbl_dimension_body_material_6_extra_3_length_total;
        $data['body_material_6_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_6_extra_3_width_allowance;
        $data['body_material_6_extra_3_width_total'] = $dt->tbl_dimension_body_material_6_extra_3_width_total;

        $this->load->view('admin/admin_header_view', $this->data);
        $this->load->view('admin/admin_home_woven_edit', $data);
        $this->load->view('admin/admin_footer_view', $data);
    }


    /**
     *Single Revision View
     */
    public function single_woven_revision_view(){
        $woven_costing_id = $this->uri->segment(3);
        if ($woven_costing_id == NULL) {
            redirect('woven/woven_all');
        }

        $dt = $this->woven_model->edit_woven_costing($woven_costing_id);
        //var_dump($dt);
        $data['woven_order_id'] = $dt->tbl_woven_order_id;
        $data['woven_id_name'] = $dt->tbl_woven_id_name;
        $data['woven_company_name'] = $dt->tbl_woven_company_name;
        $data['woven_order_date'] = $dt->tbl_woven_order_date;
        $data['woven_item_name'] = $dt->tbl_woven_item_name;
        $data['woven_ref_name'] = $dt->tbl_woven_ref_name;

        $data['woven_order_gsm'] = $dt->tbl_woven_order_gsm;
        $data['woven_order_color'] = $dt->tbl_woven_order_color;
        $data['woven_order_usd'] = $dt->tbl_woven_order_usd;

        $data['woven_order_wastage'] = $dt->tbl_woven_order_wastage;
        $data['woven_order_margin'] = $dt->tbl_woven_order_margin;

        $data['woven_order_quantity'] = $dt->tbl_woven_order_quantity;
        $data['woven_order_transport'] = $dt->tbl_woven_order_transport;
        $data['woven_order_bank_doc_charge'] = $dt->tbl_woven_order_bank_doc_charge;
        $data['woven_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;

        $data['woven_order_sewing'] = $dt->tbl_order_sewing;
        $data['woven_order_overheads'] = $dt->tbl_order_overheads;

        $data['woven_order_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;
        $data['woven_order_total_overhead_and_other_cost'] = $dt->tbl_order_total_overhead_and_other_cost;
        $data['woven_total_cost'] = $dt->tbl_total_cost;
        $data['woven_total_price'] = $dt->tbl_total_price;

        //Body Material Name
        $data['woven_body_material_1_name'] = $dt->tbl_woven_body_material_1_name;
        $data['woven_body_material_2_name'] = $dt->tbl_woven_body_material_2_name;
        $data['woven_body_material_3_name'] = $dt->tbl_woven_body_material_3_name;
        $data['woven_body_material_4_name'] = $dt->tbl_woven_body_material_4_name;
        $data['woven_body_material_5_name'] = $dt->tbl_woven_body_material_5_name;
        $data['woven_body_material_6_name'] = $dt->tbl_woven_body_material_6_name;

        //Body Material Roll Width
        $data['woven_body_material_1_roll_width'] = $dt->tbl_woven_body_material_1_roll_width;
        $data['woven_body_material_2_roll_width'] = $dt->tbl_woven_body_material_2_roll_width;
        $data['woven_body_material_3_roll_width'] = $dt->tbl_woven_body_material_3_roll_width;
        $data['woven_body_material_4_roll_width'] = $dt->tbl_woven_body_material_4_roll_width;
        $data['woven_body_material_5_roll_width'] = $dt->tbl_woven_body_material_5_roll_width;
        $data['woven_body_material_6_roll_width'] = $dt->tbl_woven_body_material_6_roll_width;

        //Body Material 1 consumption cost
        $data['woven_body_material_1_cost'] = $dt->tbl_woven_body_material_1_cost;
        $data['woven_body_material_1_consumption'] = $dt->tbl_woven_body_material_1_consumption;
        $data['woven_body_material_1_rate'] = $dt->tbl_woven_body_material_1_rate;
        $data['woven_body_material_1_total_cost'] = $dt->tbl_woven_body_material_1_total_cost;

        //Body Material 2 consumption cost
        $data['woven_body_material_2_cost'] = $dt->tbl_woven_body_material_2_cost;
        $data['woven_body_material_2_consumption'] = $dt->tbl_woven_body_material_2_consumption;
        $data['woven_body_material_2_rate'] = $dt->tbl_woven_body_material_2_rate;
        $data['woven_body_material_2_total_cost'] = $dt->tbl_woven_body_material_2_total_cost;

        //Body Material 3 consumption cost
        $data['woven_body_material_3_cost'] = $dt->tbl_woven_body_material_3_cost;
        $data['woven_body_material_3_consumption'] = $dt->tbl_woven_body_material_3_consumption;
        $data['woven_body_material_3_rate'] = $dt->tbl_woven_body_material_3_rate;
        $data['woven_body_material_3_total_cost'] = $dt->tbl_woven_body_material_3_total_cost;

        //Body Material 4 consumption cost
        $data['woven_body_material_4_cost'] = $dt->tbl_woven_body_material_4_cost;
        $data['woven_body_material_4_consumption'] = $dt->tbl_woven_body_material_4_consumption;
        $data['woven_body_material_4_rate'] = $dt->tbl_woven_body_material_4_rate;
        $data['woven_body_material_4_total_cost'] = $dt->tbl_woven_body_material_4_total_cost;

        //Body Material 5 consumption cost
        $data['woven_body_material_5_cost'] = $dt->tbl_woven_body_material_5_cost;
        $data['woven_body_material_5_consumption'] = $dt->tbl_woven_body_material_5_consumption;
        $data['woven_body_material_5_rate'] = $dt->tbl_woven_body_material_5_rate;
        $data['woven_body_material_5_total_cost'] = $dt->tbl_woven_body_material_5_total_cost;

        //Body Material 6 consumption cost
        $data['woven_body_material_6_cost'] = $dt->tbl_woven_body_material_6_cost;
        $data['woven_body_material_6_consumption'] = $dt->tbl_woven_body_material_6_consumption;
        $data['woven_body_material_6_rate'] = $dt->tbl_woven_body_material_6_rate;
        $data['woven_body_material_6_total_cost'] = $dt->tbl_woven_body_material_6_total_cost;


        $data['zipper_cost'] = $dt->tbl_woven_trims_yard_zipper_item_cost;
        $data['zipper_consumption'] = $dt->tbl_woven_trims_yard_zipper_item_consumption;
        $data['zipper_consumption_rate'] = $dt->tbl_woven_trims_yard_zipper_item_rate;
        $data['zipper_consumption_cost'] = $dt->tbl_woven_trims_yard_zipper_item_total_cost;


        $data['woven_trims_yard_two_inch_webbing_item_cost'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_cost;
        $data['woven_trims_yard_two_inch_webbing_item_consumption'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_consumption;
        $data['woven_trims_yard_two_inch_webbing_item_rate'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_rate;
        $data['woven_trims_yard_two_inch_webbing_item_total_cost'] = $dt->tbl_woven_trims_yard_two_inch_webbing_item_total_cost;

        $data['woven_trims_yard_one_and_half_inch_webbing_item_cost'] = $dt->tbl_woven_trims_yard_one_and_half_inch_webbing_item_cost;
        $data['woven_trims_yard_one_and_half_webbing_item_consumption'] = $dt->tbl_woven_trims_yard_one_and_half_webbing_item_consumption;
        $data['woven_trims_yard_one_and_half_webbing_item_rate'] = $dt->tbl_woven_trims_yard_one_and_half_webbing_item_rate;
        $data['woven_trims_yard_one_and_half_webbing_item_total_cost'] = $dt->tbl_woven_trims_yard_one_and_half_webbing_item_total_cost;

        $data['woven_trims_yard_velcro_item_cost'] = $dt->tbl_woven_trims_yard_velcro_item_cost;
        $data['woven_trims_yard_velcro_item_consumption'] = $dt->tbl_woven_trims_yard_velcro_item_consumption;
        $data['woven_trims_yard_velcro_item_rate'] = $dt->tbl_woven_trims_yard_velcro_item_rate;
        $data['woven_trims_yard_velcro_item_total_cost'] = $dt->tbl_woven_trims_yard_velcro_item_total_cost;


        $data['extra_trim_yard_extra_1_name'] = $dt->tbl_woven_trims_yard_extra_1_name;
        $data['extra_trim_yard_extra_2_name'] = $dt->tbl_woven_trims_yard_extra_2_name;
        $data['extra_trim_yard_extra_3_name'] = $dt->tbl_woven_trims_yard_extra_3_name;


        $data['woven_trims_yard_extra_1_item_cost'] = $dt->tbl_woven_trims_yard_extra_1_item_cost;
        $data['woven_trims_yard_extra_1_item_consumption'] = $dt->tbl_woven_trims_yard_extra_1_item_consumption;
        $data['woven_trims_yard_extra_1_item_rate'] = $dt->tbl_woven_trims_yard_extra_1_item_rate;
        $data['woven_trims_yard_extra_1_item_total_cost'] = $dt->tbl_woven_trims_yard_extra_1_item_total_cost;

        $data['woven_trims_yard_extra_2_item_cost'] = $dt->tbl_woven_trims_yard_extra_2_item_cost;
        $data['woven_trims_yard_extra_2_item_consumption'] = $dt->tbl_woven_trims_yard_extra_2_item_consumption;
        $data['woven_trims_yard_extra_2_item_rate'] = $dt->tbl_woven_trims_yard_extra_2_item_rate;
        $data['woven_trims_yard_extra_2_item_total_cost'] = $dt->tbl_woven_trims_yard_extra_2_item_total_cost;

        $data['woven_trims_yard_extra_3_item_cost'] = $dt->tbl_woven_trims_yard_extra_3_item_cost;
        $data['woven_trims_yard_extra_3_item_consumption'] = $dt->tbl_woven_trims_yard_extra_3_item_consumption;
        $data['woven_trims_yard_extra_3_item_rate'] = $dt->tbl_woven_trims_yard_extra_3_item_rate;
        $data['woven_trims_yard_extra_3_item_total_cost'] = $dt->tbl_woven_trims_yard_extra_3_item_total_cost;


        $data['woven_trims_piece_puller_item_cost'] = $dt->tbl_woven_trims_piece_puller_item_cost;
        $data['woven_trims_piece_puller_item_consumption'] = $dt->tbl_woven_trims_piece_puller_item_consumption;
        $data['woven_trims_piece_puller_item_rate'] = $dt->tbl_woven_trims_piece_puller_item_rate;
        $data['woven_trims_piece_puller_item_total_cost'] = $dt->tbl_woven_trims_piece_puller_item_total_cost;


        $data['woven_trims_piece_print_item_cost'] = $dt->tbl_woven_trims_piece_print_item_cost;
        $data['woven_trims_piece_print_item_consumption'] = $dt->tbl_woven_trims_piece_print_item_consumption;
        $data['woven_trims_piece_print_item_rate'] = $dt->tbl_woven_trims_piece_print_item_rate;
        $data['woven_trims_piece_print_item_total_cost'] = $dt->tbl_woven_trims_piece_print_item_total_cost;

        $data['woven_trims_piece_d_buckle_item_cost'] = $dt->tbl_woven_trims_piece_d_buckle_item_cost;
        $data['woven_trims_piece_d_buckle_item_consumption'] = $dt->tbl_woven_trims_piece_d_buckle_item_consumption;
        $data['woven_trims_piece_d_buckle_item_rate'] = $dt->tbl_woven_trims_piece_d_buckle_item_rate;
        $data['woven_trims_piece_d_buckle_item_total_cost'] = $dt->tbl_woven_trims_piece_d_buckle_item_total_cost;

        $data['woven_trims_piece_swivel_hook_item_cost'] = $dt->tbl_woven_trims_piece_swivel_hook_item_cost;
        $data['woven_trims_piece_swivel_hook_item_consumption'] = $dt->tbl_woven_trims_piece_swivel_hook_item_consumption;
        $data['woven_trims_piece_swivel_hook_item_rate'] = $dt->tbl_woven_trims_piece_swivel_hook_item_rate;
        $data['woven_trims_piece_swivel_hook_item_total_cost'] = $dt->tbl_woven_trims_piece_swivel_hook_item_total_cost;

        $data['woven_trims_piece_adjustable_bukle_item_cost'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_cost;
        $data['woven_trims_piece_adjustable_bukle_item_consumption'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_consumption;
        $data['woven_trims_piece_adjustable_bukle_item_rate'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_rate;
        $data['woven_trims_piece_adjustable_bukle_item_total_cost'] = $dt->tbl_woven_trims_piece_adjustable_bukle_item_total_cost;


        $data['woven_trims_piece_magnetic_button_item_cost'] = $dt->tbl_woven_trims_piece_magnetic_button_item_cost;
        $data['woven_trims_piece_magnetic_button_item_consumption'] = $dt->tbl_woven_trims_piece_magnetic_button_item_consumption;
        $data['woven_trims_piece_magnetic_button_item_rate'] = $dt->tbl_woven_trims_piece_magnetic_button_item_rate;
        $data['woven_trims_piece_magnetic_button_item_total_cost'] = $dt->tbl_woven_trims_piece_magnetic_button_item_total_cost;

        $data['woven_trims_piece_snap_button_item_cost'] = $dt->tbl_woven_trims_piece_snap_button_item_cost;
        $data['woven_trims_piece_snap_button_item_consumption'] = $dt->tbl_woven_trims_piece_snap_button_item_consumption;
        $data['woven_trims_piece_snap_button_item_rate'] = $dt->tbl_woven_trims_piece_snap_button_item_rate;
        $data['woven_trims_piece_snap_button_item_total_cost'] = $dt->tbl_woven_trims_piece_snap_button_item_total_cost;

        $data['woven_trims_piece_rivet_item_cost'] = $dt->tbl_woven_trims_piece_rivet_item_cost;
        $data['woven_trims_piece_rivet_item_consumption'] = $dt->tbl_woven_trims_piece_rivet_item_consumption;
        $data['woven_trims_piece_rivet_item_rate'] = $dt->tbl_woven_trims_piece_rivet_item_rate;
        $data['woven_trims_piece_rivet_item_total_cost'] = $dt->tbl_woven_trims_piece_rivet_item_total_cost;

        $data['woven_trims_piece_bottom_base_item_cost'] = $dt->tbl_woven_trims_piece_bottom_base_item_cost;
        $data['woven_trims_piece_bottom_base_item_consumption'] = $dt->tbl_woven_trims_piece_bottom_base_item_consumption;
        $data['woven_trims_piece_bottom_base_item_rate'] = $dt->tbl_woven_trims_piece_bottom_base_item_rate;
        $data['woven_trims_piece_bottom_base_item_total_cost'] = $dt->tbl_woven_trims_piece_bottom_base_item_total_cost;

        $data['woven_trims_piece_thread_item_cost'] = $dt->tbl_woven_trims_piece_thread_item_cost;
        $data['woven_trims_piece_thread_item_consumption'] = $dt->tbl_woven_trims_piece_thread_item_consumption;
        $data['woven_trims_piece_thread_item_rate'] = $dt->tbl_woven_trims_piece_thread_item_rate;
        $data['woven_trims_piece_thread_item_total_cost'] = $dt->tbl_woven_trims_piece_thread_item_total_cost;

        $data['woven_trims_piece_tag_item_cost'] = $dt->tbl_woven_trims_piece_tag_item_cost;
        $data['woven_trims_piece_tag_item_consumption'] = $dt->tbl_woven_trims_piece_tag_item_consumption;
        $data['woven_trims_piece_tag_item_rate'] = $dt->tbl_woven_trims_piece_tag_item_rate;
        $data['woven_trims_piece_tag_item_total_cost'] = $dt->tbl_woven_trims_piece_tag_item_total_cost;

        $data['woven_trims_piece_label_item_cost'] = $dt->tbl_woven_trims_piece_label_item_cost;
        $data['woven_trims_piece_label_item_consumption'] = $dt->tbl_woven_trims_piece_label_item_consumption;
        $data['woven_trims_piece_label_item_rate'] = $dt->tbl_woven_trims_piece_label_item_rate;
        $data['woven_trims_piece_label_item_total_cost'] = $dt->tbl_woven_trims_piece_label_item_total_cost;

        $data['woven_trims_piece_packing_item_cost'] = $dt->tbl_woven_trims_piece_packing_item_cost;
        $data['woven_trims_piece_packing_item_consumption'] = $dt->tbl_woven_trims_piece_packing_item_consumption;
        $data['woven_trims_piece_packing_item_rate'] = $dt->tbl_woven_trims_piece_packing_item_rate;
        $data['woven_trims_piece_packing_item_total_cost'] = $dt->tbl_woven_trims_piece_packing_item_total_cost;

        $data['woven_trims_piece_bottom_shoe_item_cost'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_cost;
        $data['woven_trims_piece_bottom_shoe_item_consumption'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_consumption;
        $data['woven_trims_piece_bottom_shoe_item_rate'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_rate;
        $data['woven_trims_piece_bottom_shoe_item_total_cost'] = $dt->tbl_woven_trims_piece_bottom_shoe_item_total_cost;

        $data['woven_trims_piece_extra_1_name'] = $dt->tbl_woven_trims_piece_extra_1_name;
        $data['woven_trims_piece_extra_1_item_cost'] = $dt->tbl_woven_trims_piece_extra_1_item_cost;
        $data['woven_trims_piece_extra_1_item_consumption'] = $dt->tbl_woven_trims_piece_extra_1_item_consumption;
        $data['woven_trims_piece_extra_1_item_rate'] = $dt->tbl_woven_trims_piece_extra_1_item_rate;
        $data['woven_trims_piece_extra_1_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_1_item_total_cost;

        $data['woven_trims_piece_extra_2_name'] = $dt->tbl_woven_trims_piece_extra_2_name;
        $data['woven_trims_piece_extra_2_item_cost'] = $dt->tbl_woven_trims_piece_extra_2_item_cost;
        $data['woven_trims_piece_extra_2_item_consumption'] = $dt->tbl_woven_trims_piece_extra_2_item_consumption;
        $data['woven_trims_piece_extra_2_item_rate'] = $dt->tbl_woven_trims_piece_extra_2_item_rate;
        $data['woven_trims_piece_extra_2_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_2_item_total_cost;

        $data['woven_trims_piece_extra_3_name'] = $dt->tbl_woven_trims_piece_extra_3_name;
        $data['woven_trims_piece_extra_3_item_cost'] = $dt->tbl_woven_trims_piece_extra_3_item_cost;
        $data['woven_trims_piece_extra_3_item_consumption'] = $dt->tbl_woven_trims_piece_extra_3_item_consumption;
        $data['woven_trims_piece_extra_3_item_rate'] = $dt->tbl_woven_trims_piece_extra_3_item_rate;
        $data['woven_trims_piece_extra_3_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_3_item_total_cost;

        $data['woven_trims_piece_extra_4_name'] = $dt->tbl_woven_trims_piece_extra_4_name;
        $data['woven_trims_piece_extra_4_item_cost'] = $dt->tbl_woven_trims_piece_extra_4_item_cost;
        $data['woven_trims_piece_extra_4_item_consumption'] = $dt->tbl_woven_trims_piece_extra_4_item_consumption;
        $data['woven_trims_piece_extra_4_item_rate'] = $dt->tbl_woven_trims_piece_extra_4_item_rate;
        $data['woven_trims_piece_extra_4_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_4_item_total_cost;

        $data['woven_trims_piece_extra_5_name'] = $dt->tbl_woven_trims_piece_extra_5_name;
        $data['woven_trims_piece_extra_5_item_cost'] = $dt->tbl_woven_trims_piece_extra_5_item_cost;
        $data['woven_trims_piece_extra_5_item_consumption'] = $dt->tbl_woven_trims_piece_extra_5_item_consumption;
        $data['woven_trims_piece_extra_5_item_rate'] = $dt->tbl_woven_trims_piece_extra_5_item_rate;
        $data['woven_trims_piece_extra_5_item_total_cost'] = $dt->tbl_woven_trims_piece_extra_5_item_total_cost;


        //Dimension for Body Material 1
        $data['dimension_id'] = $dt->tbl_dimension_id;


        $data['body_material_first_extra_1'] = $dt->tbl_dimnesion_body_material_first_extra_1;
        $data['body_material_first_extra_2'] = $dt->tbl_dimnesion_body_material_first_extra_2;
        $data['body_material_first_extra_3'] = $dt->tbl_dimnesion_body_material_first_extra_3;
        $data['body_material_second_extra_1'] = $dt->tbl_dimnesion_body_material_second_extra_1;
        $data['body_material_second_extra_2'] = $dt->tbl_dimnesion_body_material_second_extra_2;
        $data['body_material_second_extra_3'] = $dt->tbl_dimnesion_body_material_second_extra_3;



        $data['body_material_1_front_length'] = $dt->tbl_dimension_body_material_1_front_length;
        $data['body_material_1_front_length_allowance'] = $dt->tbl_dimension_body_material_1_front_length_allowance;
        $data['body_material_1_front_length_total'] = $dt->tbl_dimension_body_material_1_front_length_total;

        $data['body_material_1_front_width'] = $dt->tbl_dimension_body_material_1_front_width;
        $data['body_material_1_front_width_allowance'] = $dt->tbl_dimension_body_material_1_front_width_allowance;
        $data['body_material_1_front_width_total'] = $dt->tbl_dimension_body_material_1_front_width_total;

        $data['body_material_1_back_length'] = $dt->tbl_dimension_body_material_1_back_length;
        $data['body_material_1_back_length_allowance'] = $dt->tbl_dimension_body_material_1_back_length_allowance;
        $data['body_material_1_back_length_total'] = $dt->tbl_dimension_body_material_1_back_length_total;

        $data['body_material_1_back_width'] = $dt->tbl_dimension_body_material_1_back_width;
        $data['body_material_1_back_width_allowance'] = $dt->tbl_dimension_body_material_1_back_width_allowance;
        $data['body_material_1_back_width_total'] = $dt->tbl_dimension_body_material_1_back_width_total;

        $data['body_material_1_top_length'] = $dt->tbl_dimension_body_material_1_top_length;
        $data['body_material_1_top_length_allowance'] = $dt->tbl_dimension_body_material_1_top_length_allowance;
        $data['body_material_1_top_length_total'] = $dt->tbl_dimension_body_material_1_top_length_total;

        $data['body_material_1_top_width'] = $dt->tbl_dimension_body_material_1_top_width;
        $data['body_material_1_top_width_allowance'] = $dt->tbl_dimension_body_material_1_top_width_allowance;
        $data['body_material_1_top_width_total'] = $dt->tbl_dimension_body_material_1_top_width_total;

        $data['body_material_1_bottom_length'] = $dt->tbl_dimension_body_material_1_bottom_length;
        $data['body_material_1_bottom_length_allowance'] = $dt->tbl_dimension_body_material_1_bottom_length_allowance;
        $data['body_material_1_bottom_length_total'] = $dt->tbl_dimension_body_material_1_bottom_length_total;

        $data['body_material_1_bottom_width'] = $dt->tbl_dimension_body_material_1_bottom_width;
        $data['body_material_1_bottom_width_allowance'] = $dt->tbl_dimension_body_material_1_bottom_width_allowance;
        $data['body_material_1_bottom_width_total'] = $dt->tbl_dimension_body_material_1_bottom_width_total;

        $data['body_material_1_left_length'] = $dt->tbl_dimension_body_material_1_left_length;
        $data['body_material_1_left_length_allowance'] = $dt->tbl_dimension_body_material_1_left_length_allowance;
        $data['body_material_1_left_length_total'] = $dt->tbl_dimension_body_material_1_left_length_total;

        $data['body_material_1_left_width'] = $dt->tbl_dimension_body_material_1_left_width;
        $data['body_material_1_left_width_allowance'] = $dt->tbl_dimension_body_material_1_left_width_allowance;
        $data['body_material_1_left_width_total'] = $dt->tbl_dimension_body_material_1_left_width_total;

        $data['body_material_1_right_length'] = $dt->tbl_dimension_body_material_1_right_length;
        $data['body_material_1_right_length_allowance'] = $dt->tbl_dimension_body_material_1_right_length_allowance;
        $data['body_material_1_right_length_total'] = $dt->tbl_dimension_body_material_1_right_length_total;

        $data['body_material_1_right_width'] = $dt->tbl_dimension_body_material_1_right_width;
        $data['body_material_1_right_width_allowance'] = $dt->tbl_dimension_body_material_1_right_width_allowance;
        $data['body_material_1_right_width_total'] = $dt->tbl_dimension_body_material_1_right_width_total;

        $data['body_material_1_pocket_length'] = $dt->tbl_dimension_body_material_1_pocket_length;
        $data['body_material_1_pocket_length_allowance'] = $dt->tbl_dimension_body_material_1_pocket_length_allowance;
        $data['body_material_1_pocket_length_total'] = $dt->tbl_dimension_body_material_1_pocket_length_total;

        $data['body_material_1_pocket_width'] = $dt->tbl_dimension_body_material_1_pocket_width;
        $data['body_material_1_pocket_width_allowance'] = $dt->tbl_dimension_body_material_1_pocket_width_allowance;
        $data['body_material_1_pocket_width_total'] = $dt->tbl_dimension_body_material_1_pocket_width_total;

        $data['body_material_1_extra_1_length'] = $dt->tbl_dimension_body_material_1_extra_1_length;
        $data['body_material_1_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_1_extra_1_length_allowance;
        $data['body_material_1_extra_1_length_total'] = $dt->tbl_dimension_body_material_1_extra_1_length_total;

        $data['body_material_1_extra_1_width'] = $dt->tbl_dimension_body_material_1_extra_1_width;
        $data['body_material_1_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_1_extra_1_width_allowance;
        $data['body_material_1_extra_1_width_total'] = $dt->tbl_dimension_body_material_1_extra_1_width_total;

        $data['body_material_1_extra_2_length'] = $dt->tbl_dimension_body_material_1_extra_2_length;
        $data['body_material_1_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_1_extra_2_length_allowance;
        $data['body_material_1_extra_2_length_total'] = $dt->tbl_dimension_body_material_1_extra_2_length_total;

        $data['body_material_1_extra_2_width'] = $dt->tbl_dimension_body_material_1_extra_2_width;
        $data['body_material_1_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_1_extra_2_width_allowance;
        $data['body_material_1_extra_2_width_total'] = $dt->tbl_dimension_body_material_1_extra_2_width_total;

        $data['body_material_1_extra_3_length'] = $dt->tbl_dimension_body_material_1_extra_3_length;
        $data['body_material_1_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_1_extra_3_length_allowance;
        $data['body_material_1_extra_3_length_total'] = $dt->tbl_dimension_body_material_1_extra_3_length_total;

        $data['body_material_1_extra_3_width'] = $dt->tbl_dimension_body_material_1_extra_3_width;
        $data['body_material_1_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_1_extra_3_width_allowance;
        $data['body_material_1_extra_3_width_total'] = $dt->tbl_dimension_body_material_1_extra_3_width_total;

        //Dimension for Body Material 2
        $data['body_material_2_front_length'] = $dt->tbl_dimension_body_material_2_front_length;
        $data['body_material_2_front_length_allowance'] = $dt->tbl_dimension_body_material_2_front_length_allowance;
        $data['body_material_2_front_length_total'] = $dt->tbl_dimension_body_material_2_front_length_total;

        $data['body_material_2_front_width'] = $dt->tbl_dimension_body_material_2_front_width;
        $data['body_material_2_front_width_allowance'] = $dt->tbl_dimension_body_material_2_front_width_allowance;
        $data['body_material_2_front_width_total'] = $dt->tbl_dimension_body_material_2_front_width_total;

        $data['body_material_2_back_length'] = $dt->tbl_dimension_body_material_2_back_length;
        $data['body_material_2_back_length_allowance'] = $dt->tbl_dimension_body_material_2_back_length_allowance;
        $data['body_material_2_back_length_total'] = $dt->tbl_dimension_body_material_2_back_length_total;

        $data['body_material_2_back_width'] = $dt->tbl_dimension_body_material_2_back_width;
        $data['body_material_2_back_width_allowance'] = $dt->tbl_dimension_body_material_2_back_width_allowance;
        $data['body_material_2_back_width_total'] = $dt->tbl_dimension_body_material_2_back_width_total;

        $data['body_material_2_top_length'] = $dt->tbl_dimension_body_material_2_top_length;
        $data['body_material_2_top_length_allowance'] = $dt->tbl_dimension_body_material_2_top_length_allowance;
        $data['body_material_2_top_length_total'] = $dt->tbl_dimension_body_material_2_top_length_total;

        $data['body_material_2_top_width'] = $dt->tbl_dimension_body_material_2_top_width;
        $data['body_material_2_top_width_allowance'] = $dt->tbl_dimension_body_material_2_top_width_allowance;
        $data['body_material_2_top_width_total'] = $dt->tbl_dimension_body_material_2_top_width_total;

        $data['body_material_2_bottom_length'] = $dt->tbl_dimension_body_material_2_bottom_length;
        $data['body_material_2_bottom_length_allowance'] = $dt->tbl_dimension_body_material_2_bottom_length_allowance;
        $data['body_material_2_bottom_length_total'] = $dt->tbl_dimension_body_material_2_bottom_length_total;

        $data['body_material_2_bottom_width'] = $dt->tbl_dimension_body_material_2_bottom_width;
        $data['body_material_2_bottom_width_allowance'] = $dt->tbl_dimension_body_material_2_bottom_width_allowance;
        $data['body_material_2_bottom_width_total'] = $dt->tbl_dimension_body_material_2_bottom_width_total;

        $data['body_material_2_left_length'] = $dt->tbl_dimension_body_material_2_left_length;
        $data['body_material_2_left_length_allowance'] = $dt->tbl_dimension_body_material_2_left_length_allowance;
        $data['body_material_2_left_length_total'] = $dt->tbl_dimension_body_material_2_left_length_total;

        $data['body_material_2_left_width'] = $dt->tbl_dimension_body_material_2_left_width;
        $data['body_material_2_left_width_allowance'] = $dt->tbl_dimension_body_material_2_left_width_allowance;
        $data['body_material_2_left_width_total'] = $dt->tbl_dimension_body_material_2_left_width_total;

        $data['body_material_2_right_length'] = $dt->tbl_dimension_body_material_2_right_length;
        $data['body_material_2_right_length_allowance'] = $dt->tbl_dimension_body_material_2_right_length_allowance;
        $data['body_material_2_right_length_total'] = $dt->tbl_dimension_body_material_2_right_length_total;

        $data['body_material_2_right_width'] = $dt->tbl_dimension_body_material_2_right_width;
        $data['body_material_2_right_width_allowance'] = $dt->tbl_dimension_body_material_2_right_width_allowance;
        $data['body_material_2_right_width_total'] = $dt->tbl_dimension_body_material_2_right_width_total;

        $data['body_material_2_pocket_length'] = $dt->tbl_dimension_body_material_2_pocket_length;
        $data['body_material_2_pocket_length_allowance'] = $dt->tbl_dimension_body_material_2_pocket_length_allowance;
        $data['body_material_2_pocket_length_total'] = $dt->tbl_dimension_body_material_2_pocket_length_total;

        $data['body_material_2_pocket_width'] = $dt->tbl_dimension_body_material_2_pocket_width;
        $data['body_material_2_pocket_width_allowance'] = $dt->tbl_dimension_body_material_2_pocket_width_allowance;
        $data['body_material_2_pocket_width_total'] = $dt->tbl_dimension_body_material_2_pocket_width_total;

        $data['body_material_2_extra_1_length'] = $dt->tbl_dimension_body_material_2_extra_1_length;
        $data['body_material_2_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_2_extra_1_length_allowance;
        $data['body_material_2_extra_1_length_total'] = $dt->tbl_dimension_body_material_2_extra_1_length_total;

        $data['body_material_2_extra_1_width'] = $dt->tbl_dimension_body_material_2_extra_1_width;
        $data['body_material_2_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_2_extra_1_width_allowance;
        $data['body_material_2_extra_1_width_total'] = $dt->tbl_dimension_body_material_2_extra_1_width_total;

        $data['body_material_2_extra_2_length'] = $dt->tbl_dimension_body_material_2_extra_2_length;
        $data['body_material_2_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_2_extra_2_length_allowance;
        $data['body_material_2_extra_2_length_total'] = $dt->tbl_dimension_body_material_2_extra_2_length_total;

        $data['body_material_2_extra_2_width'] = $dt->tbl_dimension_body_material_2_extra_2_width;
        $data['body_material_2_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_2_extra_2_width_allowance;
        $data['body_material_2_extra_2_width_total'] = $dt->tbl_dimension_body_material_2_extra_2_width_total;

        $data['body_material_2_extra_3_length'] = $dt->tbl_dimension_body_material_2_extra_3_length;
        $data['body_material_2_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_2_extra_3_length_allowance;
        $data['body_material_2_extra_3_length_total'] = $dt->tbl_dimension_body_material_2_extra_3_length_total;

        $data['body_material_2_extra_3_width'] = $dt->tbl_dimension_body_material_2_extra_3_length_total;
        $data['body_material_2_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_2_extra_3_width_allowance;
        $data['body_material_2_extra_3_width_total'] = $dt->tbl_dimension_body_material_2_extra_3_width_total;

        //Dimension for Body Material 3
        $data['body_material_3_front_length'] = $dt->tbl_dimension_body_material_3_front_length;
        $data['body_material_3_front_length_allowance'] = $dt->tbl_dimension_body_material_3_front_length_allowance;
        $data['body_material_3_front_length_total'] = $dt->tbl_dimension_body_material_3_front_length_total;

        $data['body_material_3_front_width'] = $dt->tbl_dimension_body_material_3_front_width;
        $data['body_material_3_front_width_allowance'] = $dt->tbl_dimension_body_material_3_front_width_allowance;
        $data['body_material_3_front_width_total'] = $dt->tbl_dimension_body_material_3_front_width_total;

        $data['body_material_3_back_length'] = $dt->tbl_dimension_body_material_3_back_length;
        $data['body_material_3_back_length_allowance'] = $dt->tbl_dimension_body_material_3_back_length_allowance;
        $data['body_material_3_back_length_total'] = $dt->tbl_dimension_body_material_3_back_length_total;

        $data['body_material_3_back_width'] = $dt->tbl_dimension_body_material_3_back_width;
        $data['body_material_3_back_width_allowance'] = $dt->tbl_dimension_body_material_3_back_width_allowance;
        $data['body_material_3_back_width_total'] = $dt->tbl_dimension_body_material_3_back_width_total;

        $data['body_material_3_top_length'] = $dt->tbl_dimension_body_material_3_top_length;
        $data['body_material_3_top_length_allowance'] = $dt->tbl_dimension_body_material_3_top_length_allowance;
        $data['body_material_3_top_length_total'] = $dt->tbl_dimension_body_material_3_top_length_total;

        $data['body_material_3_top_width'] = $dt->tbl_dimension_body_material_3_top_width;
        $data['body_material_3_top_width_allowance'] = $dt->tbl_dimension_body_material_3_top_width_allowance;
        $data['body_material_3_top_width_total'] = $dt->tbl_dimension_body_material_3_top_width_total;

        $data['body_material_3_bottom_length'] = $dt->tbl_dimension_body_material_3_bottom_length;
        $data['body_material_3_bottom_length_allowance'] = $dt->tbl_dimension_body_material_3_bottom_length_allowance;
        $data['body_material_3_bottom_length_total'] = $dt->tbl_dimension_body_material_3_bottom_length_total;

        $data['body_material_3_bottom_width'] = $dt->tbl_dimension_body_material_3_bottom_width;
        $data['body_material_3_bottom_width_allowance'] = $dt->tbl_dimension_body_material_3_bottom_width_allowance;
        $data['body_material_3_bottom_width_total'] = $dt->tbl_dimension_body_material_3_bottom_width_total;

        $data['body_material_3_left_length'] = $dt->tbl_dimension_body_material_3_left_length;
        $data['body_material_3_left_length_allowance'] = $dt->tbl_dimension_body_material_3_left_length_allowance;
        $data['body_material_3_left_length_total'] = $dt->tbl_dimension_body_material_3_left_length_total;

        $data['body_material_3_left_width'] = $dt->tbl_dimension_body_material_3_left_width;
        $data['body_material_3_left_width_allowance'] = $dt->tbl_dimension_body_material_3_left_width_allowance;
        $data['body_material_3_left_width_total'] = $dt->tbl_dimension_body_material_3_left_width_total;

        $data['body_material_3_right_length'] = $dt->tbl_dimension_body_material_3_right_length;
        $data['body_material_3_right_length_allowance'] = $dt->tbl_dimension_body_material_3_right_length_allowance;
        $data['body_material_3_right_length_total'] = $dt->tbl_dimension_body_material_3_right_length_total;

        $data['body_material_3_right_width'] = $dt->tbl_dimension_body_material_3_right_width;
        $data['body_material_3_right_width_allowance'] = $dt->tbl_dimension_body_material_3_right_width_allowance;
        $data['body_material_3_right_width_total'] = $dt->tbl_dimension_body_material_3_right_width_total;

        $data['body_material_3_pocket_length'] = $dt->tbl_dimension_body_material_3_pocket_length;
        $data['body_material_3_pocket_length_allowance'] = $dt->tbl_dimension_body_material_3_pocket_length_allowance;
        $data['body_material_3_pocket_length_total'] = $dt->tbl_dimension_body_material_3_pocket_length_total;

        $data['body_material_3_pocket_width'] = $dt->tbl_dimension_body_material_3_pocket_width;
        $data['body_material_3_pocket_width_allowance'] = $dt->tbl_dimension_body_material_3_pocket_width_allowance;
        $data['body_material_3_pocket_width_total'] = $dt->tbl_dimension_body_material_3_pocket_width_total;

        $data['body_material_3_extra_1_length'] = $dt->tbl_dimension_body_material_3_extra_1_length;
        $data['body_material_3_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_3_extra_1_length_allowance;
        $data['body_material_3_extra_1_length_total'] = $dt->tbl_dimension_body_material_3_extra_1_length_total;

        $data['body_material_3_extra_1_width'] = $dt->tbl_dimension_body_material_3_extra_1_width;
        $data['body_material_3_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_3_extra_1_width_allowance;
        $data['body_material_3_extra_1_width_total'] = $dt->tbl_dimension_body_material_3_extra_1_width_total;

        $data['body_material_3_extra_2_length'] = $dt->tbl_dimension_body_material_3_extra_2_length;
        $data['body_material_3_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_3_extra_2_length_allowance;
        $data['body_material_3_extra_2_length_total'] = $dt->tbl_dimension_body_material_3_extra_2_length_total;

        $data['body_material_3_extra_2_width'] = $dt->tbl_dimension_body_material_3_extra_2_width;
        $data['body_material_3_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_3_extra_2_width_allowance;
        $data['body_material_3_extra_2_width_total'] = $dt->tbl_dimension_body_material_3_extra_2_width_total;

        $data['body_material_3_extra_3_length'] = $dt->tbl_dimension_body_material_3_extra_3_length;
        $data['body_material_3_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_3_extra_3_length_allowance;
        $data['body_material_3_extra_3_length_total'] = $dt->tbl_dimension_body_material_3_extra_3_length_total;

        $data['body_material_3_extra_3_width'] = $dt->tbl_dimension_body_material_3_extra_3_length_total;
        $data['body_material_3_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_3_extra_3_width_allowance;
        $data['body_material_3_extra_3_width_total'] = $dt->tbl_dimension_body_material_3_extra_3_width_total;


        //Dimension for Body Material 4
        $data['body_material_4_front_length'] = $dt->tbl_dimension_body_material_4_front_length;
        $data['body_material_4_front_length_allowance'] = $dt->tbl_dimension_body_material_4_front_length_allowance;
        $data['body_material_4_front_length_total'] = $dt->tbl_dimension_body_material_4_front_length_total;

        $data['body_material_4_front_width'] = $dt->tbl_dimension_body_material_4_front_width;
        $data['body_material_4_front_width_allowance'] = $dt->tbl_dimension_body_material_4_front_width_allowance;
        $data['body_material_4_front_width_total'] = $dt->tbl_dimension_body_material_4_front_width_total;

        $data['body_material_4_back_length'] = $dt->tbl_dimension_body_material_4_back_length;
        $data['body_material_4_back_length_allowance'] = $dt->tbl_dimension_body_material_4_back_length_allowance;
        $data['body_material_4_back_length_total'] = $dt->tbl_dimension_body_material_4_back_length_total;

        $data['body_material_4_back_width'] = $dt->tbl_dimension_body_material_4_back_width;
        $data['body_material_4_back_width_allowance'] = $dt->tbl_dimension_body_material_4_back_width_allowance;
        $data['body_material_4_back_width_total'] = $dt->tbl_dimension_body_material_4_back_width_total;

        $data['body_material_4_top_length'] = $dt->tbl_dimension_body_material_4_top_length;
        $data['body_material_4_top_length_allowance'] = $dt->tbl_dimension_body_material_4_top_length_allowance;
        $data['body_material_4_top_length_total'] = $dt->tbl_dimension_body_material_4_top_length_total;

        $data['body_material_4_top_width'] = $dt->tbl_dimension_body_material_4_top_width;
        $data['body_material_4_top_width_allowance'] = $dt->tbl_dimension_body_material_4_top_width_allowance;
        $data['body_material_4_top_width_total'] = $dt->tbl_dimension_body_material_4_top_width_total;

        $data['body_material_4_bottom_length'] = $dt->tbl_dimension_body_material_4_bottom_length;
        $data['body_material_4_bottom_length_allowance'] = $dt->tbl_dimension_body_material_4_bottom_length_allowance;
        $data['body_material_4_bottom_length_total'] = $dt->tbl_dimension_body_material_4_bottom_length_total;

        $data['body_material_4_bottom_width'] = $dt->tbl_dimension_body_material_4_bottom_width;
        $data['body_material_4_bottom_width_allowance'] = $dt->tbl_dimension_body_material_4_bottom_width_allowance;
        $data['body_material_4_bottom_width_total'] = $dt->tbl_dimension_body_material_4_bottom_width_total;

        $data['body_material_4_left_length'] = $dt->tbl_dimension_body_material_4_left_length;
        $data['body_material_4_left_length_allowance'] = $dt->tbl_dimension_body_material_4_left_length_allowance;
        $data['body_material_4_left_length_total'] = $dt->tbl_dimension_body_material_4_left_length_total;

        $data['body_material_4_left_width'] = $dt->tbl_dimension_body_material_4_left_width;
        $data['body_material_4_left_width_allowance'] = $dt->tbl_dimension_body_material_4_left_width_allowance;
        $data['body_material_4_left_width_total'] = $dt->tbl_dimension_body_material_4_left_width_total;

        $data['body_material_4_right_length'] = $dt->tbl_dimension_body_material_4_right_length;
        $data['body_material_4_right_length_allowance'] = $dt->tbl_dimension_body_material_4_right_length_allowance;
        $data['body_material_4_right_length_total'] = $dt->tbl_dimension_body_material_4_right_length_total;

        $data['body_material_4_right_width'] = $dt->tbl_dimension_body_material_4_right_width;
        $data['body_material_4_right_width_allowance'] = $dt->tbl_dimension_body_material_4_right_width_allowance;
        $data['body_material_4_right_width_total'] = $dt->tbl_dimension_body_material_4_right_width_total;

        $data['body_material_4_pocket_length'] = $dt->tbl_dimension_body_material_4_pocket_length;
        $data['body_material_4_pocket_length_allowance'] = $dt->tbl_dimension_body_material_4_pocket_length_allowance;
        $data['body_material_4_pocket_length_total'] = $dt->tbl_dimension_body_material_4_pocket_length_total;

        $data['body_material_4_pocket_width'] = $dt->tbl_dimension_body_material_4_pocket_width;
        $data['body_material_4_pocket_width_allowance'] = $dt->tbl_dimension_body_material_4_pocket_width_allowance;
        $data['body_material_4_pocket_width_total'] = $dt->tbl_dimension_body_material_4_pocket_width_total;

        $data['body_material_4_extra_1_length'] = $dt->tbl_dimension_body_material_4_extra_1_length;
        $data['body_material_4_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_4_extra_1_length_allowance;
        $data['body_material_4_extra_1_length_total'] = $dt->tbl_dimension_body_material_4_extra_1_length_total;

        $data['body_material_4_extra_1_width'] = $dt->tbl_dimension_body_material_4_extra_1_width;
        $data['body_material_4_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_4_extra_1_width_allowance;
        $data['body_material_4_extra_1_width_total'] = $dt->tbl_dimension_body_material_4_extra_1_width_total;

        $data['body_material_4_extra_2_length'] = $dt->tbl_dimension_body_material_4_extra_2_length;
        $data['body_material_4_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_4_extra_2_length_allowance;
        $data['body_material_4_extra_2_length_total'] = $dt->tbl_dimension_body_material_4_extra_2_length_total;

        $data['body_material_4_extra_2_width'] = $dt->tbl_dimension_body_material_4_extra_2_width;
        $data['body_material_4_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_4_extra_2_width_allowance;
        $data['body_material_4_extra_2_width_total'] = $dt->tbl_dimension_body_material_4_extra_2_width_total;

        $data['body_material_4_extra_3_length'] = $dt->tbl_dimension_body_material_4_extra_3_length;
        $data['body_material_4_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_4_extra_3_length_allowance;
        $data['body_material_4_extra_3_length_total'] = $dt->tbl_dimension_body_material_4_extra_3_length_total;

        $data['body_material_4_extra_3_width'] = $dt->tbl_dimension_body_material_4_extra_3_length_total;
        $data['body_material_4_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_4_extra_3_width_allowance;
        $data['body_material_4_extra_3_width_total'] = $dt->tbl_dimension_body_material_4_extra_3_width_total;

        //Dimension for Body Material 5
        $data['body_material_5_front_length'] = $dt->tbl_dimension_body_material_5_front_length;
        $data['body_material_5_front_length_allowance'] = $dt->tbl_dimension_body_material_5_front_length_allowance;
        $data['body_material_5_front_length_total'] = $dt->tbl_dimension_body_material_5_front_length_total;

        $data['body_material_5_front_width'] = $dt->tbl_dimension_body_material_5_front_width;
        $data['body_material_5_front_width_allowance'] = $dt->tbl_dimension_body_material_5_front_width_allowance;
        $data['body_material_5_front_width_total'] = $dt->tbl_dimension_body_material_5_front_width_total;

        $data['body_material_5_back_length'] = $dt->tbl_dimension_body_material_5_back_length;
        $data['body_material_5_back_length_allowance'] = $dt->tbl_dimension_body_material_5_back_length_allowance;
        $data['body_material_5_back_length_total'] = $dt->tbl_dimension_body_material_5_back_length_total;

        $data['body_material_5_back_width'] = $dt->tbl_dimension_body_material_5_back_width;
        $data['body_material_5_back_width_allowance'] = $dt->tbl_dimension_body_material_5_back_width_allowance;
        $data['body_material_5_back_width_total'] = $dt->tbl_dimension_body_material_5_back_width_total;

        $data['body_material_5_top_length'] = $dt->tbl_dimension_body_material_5_top_length;
        $data['body_material_5_top_length_allowance'] = $dt->tbl_dimension_body_material_5_top_length_allowance;
        $data['body_material_5_top_length_total'] = $dt->tbl_dimension_body_material_5_top_length_total;

        $data['body_material_5_top_width'] = $dt->tbl_dimension_body_material_5_top_width;
        $data['body_material_5_top_width_allowance'] = $dt->tbl_dimension_body_material_5_top_width_allowance;
        $data['body_material_5_top_width_total'] = $dt->tbl_dimension_body_material_5_top_width_total;

        $data['body_material_5_bottom_length'] = $dt->tbl_dimension_body_material_5_bottom_length;
        $data['body_material_5_bottom_length_allowance'] = $dt->tbl_dimension_body_material_5_bottom_length_allowance;
        $data['body_material_5_bottom_length_total'] = $dt->tbl_dimension_body_material_5_bottom_length_total;

        $data['body_material_5_bottom_width'] = $dt->tbl_dimension_body_material_5_bottom_width;
        $data['body_material_5_bottom_width_allowance'] = $dt->tbl_dimension_body_material_5_bottom_width_allowance;
        $data['body_material_5_bottom_width_total'] = $dt->tbl_dimension_body_material_5_bottom_width_total;

        $data['body_material_5_left_length'] = $dt->tbl_dimension_body_material_5_left_length;
        $data['body_material_5_left_length_allowance'] = $dt->tbl_dimension_body_material_5_left_length_allowance;
        $data['body_material_5_left_length_total'] = $dt->tbl_dimension_body_material_5_left_length_total;

        $data['body_material_5_left_width'] = $dt->tbl_dimension_body_material_5_left_width;
        $data['body_material_5_left_width_allowance'] = $dt->tbl_dimension_body_material_5_left_width_allowance;
        $data['body_material_5_left_width_total'] = $dt->tbl_dimension_body_material_5_left_width_total;

        $data['body_material_5_right_length'] = $dt->tbl_dimension_body_material_5_right_length;
        $data['body_material_5_right_length_allowance'] = $dt->tbl_dimension_body_material_5_right_length_allowance;
        $data['body_material_5_right_length_total'] = $dt->tbl_dimension_body_material_5_right_length_total;

        $data['body_material_5_right_width'] = $dt->tbl_dimension_body_material_5_right_width;
        $data['body_material_5_right_width_allowance'] = $dt->tbl_dimension_body_material_5_right_width_allowance;
        $data['body_material_5_right_width_total'] = $dt->tbl_dimension_body_material_5_right_width_total;

        $data['body_material_5_pocket_length'] = $dt->tbl_dimension_body_material_5_pocket_length;
        $data['body_material_5_pocket_length_allowance'] = $dt->tbl_dimension_body_material_5_pocket_length_allowance;
        $data['body_material_5_pocket_length_total'] = $dt->tbl_dimension_body_material_5_pocket_length_total;

        $data['body_material_5_pocket_width'] = $dt->tbl_dimension_body_material_5_pocket_width;
        $data['body_material_5_pocket_width_allowance'] = $dt->tbl_dimension_body_material_5_pocket_width_allowance;
        $data['body_material_5_pocket_width_total'] = $dt->tbl_dimension_body_material_5_pocket_width_total;

        $data['body_material_5_extra_1_length'] = $dt->tbl_dimension_body_material_5_extra_1_length;
        $data['body_material_5_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_5_extra_1_length_allowance;
        $data['body_material_5_extra_1_length_total'] = $dt->tbl_dimension_body_material_5_extra_1_length_total;

        $data['body_material_5_extra_1_width'] = $dt->tbl_dimension_body_material_5_extra_1_width;
        $data['body_material_5_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_5_extra_1_width_allowance;
        $data['body_material_5_extra_1_width_total'] = $dt->tbl_dimension_body_material_5_extra_1_width_total;

        $data['body_material_5_extra_2_length'] = $dt->tbl_dimension_body_material_5_extra_2_length;
        $data['body_material_5_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_5_extra_2_length_allowance;
        $data['body_material_5_extra_2_length_total'] = $dt->tbl_dimension_body_material_5_extra_2_length_total;

        $data['body_material_5_extra_2_width'] = $dt->tbl_dimension_body_material_5_extra_2_width;
        $data['body_material_5_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_5_extra_2_width_allowance;
        $data['body_material_5_extra_2_width_total'] = $dt->tbl_dimension_body_material_5_extra_2_width_total;

        $data['body_material_5_extra_3_length'] = $dt->tbl_dimension_body_material_5_extra_3_length;
        $data['body_material_5_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_5_extra_3_length_allowance;
        $data['body_material_5_extra_3_length_total'] = $dt->tbl_dimension_body_material_5_extra_3_length_total;

        $data['body_material_5_extra_3_width'] = $dt->tbl_dimension_body_material_5_extra_3_length_total;
        $data['body_material_5_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_5_extra_3_width_allowance;
        $data['body_material_5_extra_3_width_total'] = $dt->tbl_dimension_body_material_5_extra_3_width_total;

        //Dimension for Body Material 6
        $data['body_material_6_front_length'] = $dt->tbl_dimension_body_material_6_front_length;
        $data['body_material_6_front_length_allowance'] = $dt->tbl_dimension_body_material_6_front_length_allowance;
        $data['body_material_6_front_length_total'] = $dt->tbl_dimension_body_material_6_front_length_total;

        $data['body_material_6_front_width'] = $dt->tbl_dimension_body_material_6_front_width;
        $data['body_material_6_front_width_allowance'] = $dt->tbl_dimension_body_material_6_front_width_allowance;
        $data['body_material_6_front_width_total'] = $dt->tbl_dimension_body_material_6_front_width_total;

        $data['body_material_6_back_length'] = $dt->tbl_dimension_body_material_6_back_length;
        $data['body_material_6_back_length_allowance'] = $dt->tbl_dimension_body_material_6_back_length_allowance;
        $data['body_material_6_back_length_total'] = $dt->tbl_dimension_body_material_6_back_length_total;

        $data['body_material_6_back_width'] = $dt->tbl_dimension_body_material_6_back_width;
        $data['body_material_6_back_width_allowance'] = $dt->tbl_dimension_body_material_6_back_width_allowance;
        $data['body_material_6_back_width_total'] = $dt->tbl_dimension_body_material_6_back_width_total;

        $data['body_material_6_top_length'] = $dt->tbl_dimension_body_material_6_top_length;
        $data['body_material_6_top_length_allowance'] = $dt->tbl_dimension_body_material_6_top_length_allowance;
        $data['body_material_6_top_length_total'] = $dt->tbl_dimension_body_material_6_top_length_total;

        $data['body_material_6_top_width'] = $dt->tbl_dimension_body_material_6_top_width;
        $data['body_material_6_top_width_allowance'] = $dt->tbl_dimension_body_material_6_top_width_allowance;
        $data['body_material_6_top_width_total'] = $dt->tbl_dimension_body_material_6_top_width_total;

        $data['body_material_6_bottom_length'] = $dt->tbl_dimension_body_material_6_bottom_length;
        $data['body_material_6_bottom_length_allowance'] = $dt->tbl_dimension_body_material_6_bottom_length_allowance;
        $data['body_material_6_bottom_length_total'] = $dt->tbl_dimension_body_material_6_bottom_length_total;

        $data['body_material_6_bottom_width'] = $dt->tbl_dimension_body_material_6_bottom_width;
        $data['body_material_6_bottom_width_allowance'] = $dt->tbl_dimension_body_material_6_bottom_width_allowance;
        $data['body_material_6_bottom_width_total'] = $dt->tbl_dimension_body_material_6_bottom_width_total;

        $data['body_material_6_left_length'] = $dt->tbl_dimension_body_material_6_left_length;
        $data['body_material_6_left_length_allowance'] = $dt->tbl_dimension_body_material_6_left_length_allowance;
        $data['body_material_6_left_length_total'] = $dt->tbl_dimension_body_material_6_left_length_total;

        $data['body_material_6_left_width'] = $dt->tbl_dimension_body_material_6_left_width;
        $data['body_material_6_left_width_allowance'] = $dt->tbl_dimension_body_material_6_left_width_allowance;
        $data['body_material_6_left_width_total'] = $dt->tbl_dimension_body_material_6_left_width_total;

        $data['body_material_6_right_length'] = $dt->tbl_dimension_body_material_6_right_length;
        $data['body_material_6_right_length_allowance'] = $dt->tbl_dimension_body_material_6_right_length_allowance;
        $data['body_material_6_right_length_total'] = $dt->tbl_dimension_body_material_6_right_length_total;

        $data['body_material_6_right_width'] = $dt->tbl_dimension_body_material_6_right_width;
        $data['body_material_6_right_width_allowance'] = $dt->tbl_dimension_body_material_6_right_width_allowance;
        $data['body_material_6_right_width_total'] = $dt->tbl_dimension_body_material_6_right_width_total;

        $data['body_material_6_pocket_length'] = $dt->tbl_dimension_body_material_6_pocket_length;
        $data['body_material_6_pocket_length_allowance'] = $dt->tbl_dimension_body_material_6_pocket_length_allowance;
        $data['body_material_6_pocket_length_total'] = $dt->tbl_dimension_body_material_6_pocket_length_total;

        $data['body_material_6_pocket_width'] = $dt->tbl_dimension_body_material_6_pocket_width;
        $data['body_material_6_pocket_width_allowance'] = $dt->tbl_dimension_body_material_6_pocket_width_allowance;
        $data['body_material_6_pocket_width_total'] = $dt->tbl_dimension_body_material_6_pocket_width_total;

        $data['body_material_6_extra_1_length'] = $dt->tbl_dimension_body_material_6_extra_1_length;
        $data['body_material_6_extra_1_length_allowance'] = $dt->tbl_dimension_body_material_6_extra_1_length_allowance;
        $data['body_material_6_extra_1_length_total'] = $dt->tbl_dimension_body_material_6_extra_1_length_total;

        $data['body_material_6_extra_1_width'] = $dt->tbl_dimension_body_material_6_extra_1_width;
        $data['body_material_6_extra_1_width_allowance'] = $dt->tbl_dimension_body_material_6_extra_1_width_allowance;
        $data['body_material_6_extra_1_width_total'] = $dt->tbl_dimension_body_material_6_extra_1_width_total;

        $data['body_material_6_extra_2_length'] = $dt->tbl_dimension_body_material_6_extra_2_length;
        $data['body_material_6_extra_2_length_allowance'] = $dt->tbl_dimension_body_material_6_extra_2_length_allowance;
        $data['body_material_6_extra_2_length_total'] = $dt->tbl_dimension_body_material_6_extra_2_length_total;

        $data['body_material_6_extra_2_width'] = $dt->tbl_dimension_body_material_6_extra_2_width;
        $data['body_material_6_extra_2_width_allowance'] = $dt->tbl_dimension_body_material_6_extra_2_width_allowance;
        $data['body_material_6_extra_2_width_total'] = $dt->tbl_dimension_body_material_6_extra_2_width_total;

        $data['body_material_6_extra_3_length'] = $dt->tbl_dimension_body_material_6_extra_3_length;
        $data['body_material_6_extra_3_length_allowance'] = $dt->tbl_dimension_body_material_6_extra_3_length_allowance;
        $data['body_material_6_extra_3_length_total'] = $dt->tbl_dimension_body_material_6_extra_3_length_total;

        $data['body_material_6_extra_3_width'] = $dt->tbl_dimension_body_material_6_extra_3_length_total;
        $data['body_material_6_extra_3_width_allowance'] = $dt->tbl_dimension_body_material_6_extra_3_width_allowance;
        $data['body_material_6_extra_3_width_total'] = $dt->tbl_dimension_body_material_6_extra_3_width_total;

        $this->load->view('admin/admin_header_view', $this->data);
        $this->load->view('admin/admin_home_woven_edit', $data);
        $this->load->view('admin/admin_footer_view', $data);
    }

    /**
     * @param null $id
     */
    public function update_woven_costing()
    {
        if ($this->input->post('updatewoven')) {
            $wovenId = $this->input->post('woven-id');
            $this->woven_model->update_woven_costing($wovenId);
            redirect('woven/woven_all');
        } else{
            $id = $this->input->post('woven-id');
            redirect('woven/edit_woven_costing/'. $id);
        }
    }


    /**
     * @param $ppnw_costing_id
     */

    public function delete_ppnw_costing($ppnw_costing_id){
            $this->ppnw_model->delete_ppnw_costing($ppnw_costing_id);
            redirect(base_url('ppnw/ppnw_all'));
    }

}