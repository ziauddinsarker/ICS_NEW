<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiltandsuit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('ppnw_model');
        $this->load->model('woven_model');
        $this->load->model('quilt_and_suit_model');

        $username = $this->session->userdata('username');
        $this->data['employee'] = $this->admin_model->get_user_employee($username);

        //$this->data['ppnw_all_costing'] = $this->ppnw_model->gel_all_ppnw_costing();
        $this->data['quilt_and_suit_all_costing'] = $this->quilt_and_suit_model->gel_all_quilt_and_suit_costing($username);
        $this->data['quilt_and_suit_all_count'] = $this->quilt_and_suit_model->quilt_and_suit_total_count_by_user($username);
    }


    /************************************************/
    /*****************quilt_and_suit***************************/
    /************************************************/
    /**
     * Show All quilt_and_suit Costing in a page of a Particular user
     */

    public function quilt_and_suit_all(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('login/index', 'refresh');
        } else {
            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_quilt_and_suit_all_view', $this->data);
            $this->load->view('admin/admin_footer_view');
        }
    }


    public function revision_quilt_and_suit_costing($id){

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('login/index', 'refresh');
        } else {
            $this->data['revision_single_quilt_and_suit_costing'] = $this->quilt_and_suit_model->all_revisions_single_quilt_and_suit_costing($id);
            //var_dump($this->data['revision_single_quilt_and_suit_costing']);
            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_quilt_and_suit_single_user_rev_view', $this->data);
            $this->load->view('admin/admin_footer_view');
        }
    }

    /**
     *Edit the PPNw Costing
     */
    public function single_revision_quilt_and_suit_costing($id){
        $quilt_and_suit_costing_id = $this->uri->segment(3);
        if ($quilt_and_suit_costing_id == NULL) {
            redirect('quiltandsuit/quilt_and_suit_all');
        }

        //$dt = $this->ppnw_model->single_revisions_single_ppnw_costing();
        $dt = $this->quilt_and_suit_model->single_revision_quilt_and_suit_costing($quilt_and_suit_costing_id);
        //var_dump($dt);
        $data['quilt_and_suit_order_id'] = $dt->tbl_quilt_and_suit_order_id;
        $data['quilt_and_suit_id_name'] = $dt->tbl_quilt_and_suit_id_name;
        $data['quilt_and_suit_company_name'] = $dt->tbl_quilt_and_suit_company_name;
        $data['quilt_and_suit_order_date'] = $dt->tbl_quilt_and_suit_order_date;
        $data['quilt_and_suit_item_name'] = $dt->tbl_quilt_and_suit_item_name;
        $data['quilt_and_suit_ref_name'] = $dt->tbl_quilt_and_suit_ref_name;

        //$data['quilt_and_suit_order_gsm'] = $dt->tbl_quilt_and_suit_order_gsm;
       // $data['quilt_and_suit_order_color'] = $dt->tbl_quilt_and_suit_order_color;
        $data['quilt_and_suit_order_usd'] = $dt->tbl_quilt_and_suit_order_usd;

        $data['quilt_and_suit_order_wastage'] = $dt->tbl_quilt_and_suit_order_wastage;
        $data['quilt_and_suit_order_margin'] = $dt->tbl_quilt_and_suit_order_margin;

        $data['quilt_and_suit_order_quantity'] = $dt->tbl_quilt_and_suit_order_quantity;
        $data['quilt_and_suit_order_transport'] = $dt->tbl_quilt_and_suit_order_transport;
        $data['quilt_and_suit_order_bank_doc_charge'] = $dt->tbl_quilt_and_suit_order_bank_doc_charge;
        $data['quilt_and_suit_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;

        $data['quilt_and_suit_order_sewing'] = $dt->tbl_order_sewing;
        $data['quilt_and_suit_order_overheads'] = $dt->tbl_order_overheads;

        $data['quilt_and_suit_order_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;
        $data['quilt_and_suit_order_total_overhead_and_other_cost'] = $dt->tbl_order_total_overhead_and_other_cost;
        $data['quilt_and_suit_total_cost'] = $dt->tbl_total_cost;
        $data['quilt_and_suit_total_price'] = $dt->tbl_total_price;


        //Body Material Roll Width
        $data['quilt_and_suit_body_material_1_roll_width'] = $dt->tbl_quilt_and_suit_body_material_1_roll_width;
        $data['quilt_and_suit_body_material_2_roll_width'] = $dt->tbl_quilt_and_suit_body_material_2_roll_width;
        $data['quilt_and_suit_body_material_3_roll_width'] = $dt->tbl_quilt_and_suit_body_material_3_roll_width;

        //Body Material 1 consumption cost
        $data['quilt_and_suit_body_material_1_cost'] = $dt->tbl_quilt_and_suit_body_material_1_cost;
        $data['quilt_and_suit_body_material_1_consumption'] = $dt->tbl_quilt_and_suit_body_material_1_consumption;
        $data['quilt_and_suit_body_material_1_rate'] = $dt->tbl_quilt_and_suit_body_material_1_rate;
        $data['quilt_and_suit_body_material_1_total_cost'] = $dt->tbl_quilt_and_suit_body_material_1_total_cost;

        //Body Material 2 consumption cost
        $data['quilt_and_suit_body_material_2_cost'] = $dt->tbl_quilt_and_suit_body_material_2_cost;
        $data['quilt_and_suit_body_material_2_consumption'] = $dt->tbl_quilt_and_suit_body_material_2_consumption;
        $data['quilt_and_suit_body_material_2_rate'] = $dt->tbl_quilt_and_suit_body_material_2_rate;
        $data['quilt_and_suit_body_material_2_total_cost'] = $dt->tbl_quilt_and_suit_body_material_2_total_cost;

        //Body Material 3 consumption cost
        $data['quilt_and_suit_body_material_3_cost'] = $dt->tbl_quilt_and_suit_body_material_3_cost;
        $data['quilt_and_suit_body_material_3_consumption'] = $dt->tbl_quilt_and_suit_body_material_3_consumption;
        $data['quilt_and_suit_body_material_3_rate'] = $dt->tbl_quilt_and_suit_body_material_3_rate;
        $data['quilt_and_suit_body_material_3_total_cost'] = $dt->tbl_quilt_and_suit_body_material_3_total_cost;


        $data['zipper_cost'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_cost;
        $data['zipper_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_consumption;
        $data['zipper_consumption_rate'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_rate;
        $data['zipper_consumption_cost'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_total_cost;


        $data['quilt_and_suit_trims_yard_webbing_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_webbing_item_cost;
        $data['quilt_and_suit_trims_yard_webbing_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_webbing_item_consumption;
        $data['quilt_and_suit_trims_yard_webbing_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_webbing_item_rate;
        $data['quilt_and_suit_trims_yard_webbing_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_webbing_item_total_cost;

        $data['quilt_and_suit_trims_yard_velcro_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_cost;
        $data['quilt_and_suit_trims_yard_velcro_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_consumption;
        $data['quilt_and_suit_trims_yard_velcro_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_rate;
        $data['quilt_and_suit_trims_yard_velcro_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_total_cost;

        $data['draw_string_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_draw_string_item_cost;
        $data['draw_string_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_draw_string_item_consumption;
        $data['draw_string_item_consumption_rate'] = $dt->tbl_quilt_and_suit_trims_yard_draw_string_item_rate;
        $data['draw_string_item_consumption_cost'] = $dt->tbl_quilt_and_suit_trims_yard_draw_string_item_total_cost;


        $data['extra_trim_yard_extra_1_name'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_name;
        $data['extra_trim_yard_extra_2_name'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_name;
        $data['extra_trim_yard_extra_3_name'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_name;


        $data['quilt_and_suit_trims_yard_extra_1_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_cost;
        $data['quilt_and_suit_trims_yard_extra_1_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_consumption;
        $data['quilt_and_suit_trims_yard_extra_1_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_rate;
        $data['quilt_and_suit_trims_yard_extra_1_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_total_cost;

        $data['quilt_and_suit_trims_yard_extra_2_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_cost;
        $data['quilt_and_suit_trims_yard_extra_2_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_consumption;
        $data['quilt_and_suit_trims_yard_extra_2_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_rate;
        $data['quilt_and_suit_trims_yard_extra_2_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_total_cost;

        $data['quilt_and_suit_trims_yard_extra_3_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_cost;
        $data['quilt_and_suit_trims_yard_extra_3_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_consumption;
        $data['quilt_and_suit_trims_yard_extra_3_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_rate;
        $data['quilt_and_suit_trims_yard_extra_3_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_total_cost;


        $data['quilt_and_suit_trims_piece_puller_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_cost;
        $data['quilt_and_suit_trims_piece_puller_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_consumption;
        $data['quilt_and_suit_trims_piece_puller_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_rate;
        $data['quilt_and_suit_trims_piece_puller_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_total_cost;


        $data['quilt_and_suit_trims_piece_print_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_cost;
        $data['quilt_and_suit_trims_piece_print_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_consumption;
        $data['quilt_and_suit_trims_piece_print_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_rate;
        $data['quilt_and_suit_trims_piece_print_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_total_cost;

        $data['eyelet_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_eyelet_item_cost;
        $data['eyelet_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_eyelet_item_consumption;
        $data['eyelet_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_eyelet_item_rate;
        $data['eyelet_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_eyelet_item_total_cost;

        $data['quilt_and_suit_trims_piece_buckle_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_buckle_item_cost;
        $data['quilt_and_suit_trims_piece_buckle_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_buckle_item_consumption;
        $data['quilt_and_suit_trims_piece_buckle_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_buckle_item_rate;
        $data['quilt_and_suit_trims_piece_buckle_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_buckle_item_total_cost;

        $data['quilt_and_suit_trims_piece_magnetic_button_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_cost;
        $data['quilt_and_suit_trims_piece_magnetic_button_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_consumption;
        $data['quilt_and_suit_trims_piece_magnetic_button_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_rate;
        $data['quilt_and_suit_trims_piece_magnetic_button_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_total_cost;

        $data['quilt_and_suit_trims_piece_snap_button_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_cost;
        $data['quilt_and_suit_trims_piece_snap_button_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_consumption;
        $data['quilt_and_suit_trims_piece_snap_button_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_rate;
        $data['quilt_and_suit_trims_piece_snap_button_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_total_cost;

        $data['quilt_and_suit_trims_piece_bottom_base_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_cost;
        $data['quilt_and_suit_trims_piece_bottom_base_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_consumption;
        $data['quilt_and_suit_trims_piece_bottom_base_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_rate;
        $data['quilt_and_suit_trims_piece_bottom_base_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_total_cost;

        $data['quilt_and_suit_trims_piece_thread_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_cost;
        $data['quilt_and_suit_trims_piece_thread_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_consumption;
        $data['quilt_and_suit_trims_piece_thread_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_rate;
        $data['quilt_and_suit_trims_piece_thread_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_total_cost;

        $data['quilt_and_suit_trims_piece_tag_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_cost;
        $data['quilt_and_suit_trims_piece_tag_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_consumption;
        $data['quilt_and_suit_trims_piece_tag_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_rate;
        $data['quilt_and_suit_trims_piece_tag_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_total_cost;

        $data['quilt_and_suit_trims_piece_label_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_cost;
        $data['quilt_and_suit_trims_piece_label_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_consumption;
        $data['quilt_and_suit_trims_piece_label_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_rate;
        $data['quilt_and_suit_trims_piece_label_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_total_cost;

        $data['quilt_and_suit_trims_piece_packing_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_cost;
        $data['quilt_and_suit_trims_piece_packing_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_consumption;
        $data['quilt_and_suit_trims_piece_packing_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_rate;
        $data['quilt_and_suit_trims_piece_packing_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_total_cost;

        $data['quilt_and_suit_trims_piece_extra_1_name'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_name;
        $data['quilt_and_suit_trims_piece_extra_1_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_cost;
        $data['quilt_and_suit_trims_piece_extra_1_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_consumption;
        $data['quilt_and_suit_trims_piece_extra_1_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_rate;
        $data['quilt_and_suit_trims_piece_extra_1_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_total_cost;

        $data['quilt_and_suit_trims_piece_extra_2_name'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_name;
        $data['quilt_and_suit_trims_piece_extra_2_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_cost;
        $data['quilt_and_suit_trims_piece_extra_2_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_consumption;
        $data['quilt_and_suit_trims_piece_extra_2_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_rate;
        $data['quilt_and_suit_trims_piece_extra_2_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_total_cost;

        $data['quilt_and_suit_trims_piece_extra_3_name'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_name;
        $data['quilt_and_suit_trims_piece_extra_3_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_cost;
        $data['quilt_and_suit_trims_piece_extra_3_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_consumption;
        $data['quilt_and_suit_trims_piece_extra_3_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_rate;
        $data['quilt_and_suit_trims_piece_extra_3_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_total_cost;


        //Dimension for Body Material 1
        $data['dimension_id'] = $dt->tbl_dimension_id;

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

        $data['body_material_1_handle_length'] = $dt->tbl_dimension_body_material_1_handle_length;
        $data['body_material_1_handle_length_allowance'] = $dt->tbl_dimension_body_material_1_handle_length_allowance;
        $data['body_material_1_handle_length_total'] = $dt->tbl_dimension_body_material_1_handle_length_total;

        $data['body_material_1_handle_width'] = $dt->tbl_dimension_body_material_1_handle_width;
        $data['body_material_1_handle_width_allowance'] = $dt->tbl_dimension_body_material_1_handle_width_allowance;
        $data['body_material_1_handle_width_total'] = $dt->tbl_dimension_body_material_1_handle_width_total;

        $data['body_material_1_pocket_length'] = $dt->tbl_dimension_body_material_1_pocket_length;
        $data['body_material_1_pocket_length_allowance'] = $dt->tbl_dimension_body_material_1_pocket_length_allowance;
        $data['body_material_1_pocket_length_total'] = $dt->tbl_dimension_body_material_1_pocket_length_total;

        $data['body_material_1_pocket_width'] = $dt->tbl_dimension_body_material_1_pocket_width;
        $data['body_material_1_pocket_width_allowance'] = $dt->tbl_dimension_body_material_1_pocket_width_allowance;
        $data['body_material_1_pocket_width_total'] = $dt->tbl_dimension_body_material_1_pocket_width_total;

        $data['body_material_1_piping_length'] = $dt->tbl_dimension_body_material_1_piping_length;
        $data['body_material_1_piping_length_allowance'] = $dt->tbl_dimension_body_material_1_piping_length_allowance;
        $data['body_material_1_piping_length_total'] = $dt->tbl_dimension_body_material_1_piping_length_total;

        $data['body_material_1_piping_width'] = $dt->tbl_dimension_body_material_1_piping_width;
        $data['body_material_1_piping_width_allowance'] = $dt->tbl_dimension_body_material_1_piping_width_allowance;
        $data['body_material_1_piping_width_total'] = $dt->tbl_dimension_body_material_1_piping_width_total;

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

        $data['body_material_2_handle_length'] = $dt->tbl_dimension_body_material_2_handle_length;
        $data['body_material_2_handle_length_allowance'] = $dt->tbl_dimension_body_material_2_handle_length_allowance;
        $data['body_material_2_handle_length_total'] = $dt->tbl_dimension_body_material_2_handle_length_total;

        $data['body_material_2_handle_width'] = $dt->tbl_dimension_body_material_2_handle_width;
        $data['body_material_2_handle_width_allowance'] = $dt->tbl_dimension_body_material_2_handle_width_allowance;
        $data['body_material_2_handle_width_total'] = $dt->tbl_dimension_body_material_2_handle_width_total;

        $data['body_material_2_pocket_length'] = $dt->tbl_dimension_body_material_2_pocket_length;
        $data['body_material_2_pocket_length_allowance'] = $dt->tbl_dimension_body_material_2_pocket_length_allowance;
        $data['body_material_2_pocket_length_total'] = $dt->tbl_dimension_body_material_2_pocket_length_total;

        $data['body_material_2_pocket_width'] = $dt->tbl_dimension_body_material_2_pocket_width;
        $data['body_material_2_pocket_width_allowance'] = $dt->tbl_dimension_body_material_2_pocket_width_allowance;
        $data['body_material_2_pocket_width_total'] = $dt->tbl_dimension_body_material_2_pocket_width_total;

        $data['body_material_2_piping_length'] = $dt->tbl_dimension_body_material_2_piping_length;
        $data['body_material_2_piping_length_allowance'] = $dt->tbl_dimension_body_material_2_piping_length_allowance;
        $data['body_material_2_piping_length_total'] = $dt->tbl_dimension_body_material_2_piping_length_total;

        $data['body_material_2_piping_width'] = $dt->tbl_dimension_body_material_2_piping_width;
        $data['body_material_2_piping_width_allowance'] = $dt->tbl_dimension_body_material_2_piping_width_allowance;
        $data['body_material_2_piping_width_total'] = $dt->tbl_dimension_body_material_2_piping_width_total;

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

        $data['body_material_3_handle_length'] = $dt->tbl_dimension_body_material_3_handle_length;
        $data['body_material_3_handle_length_allowance'] = $dt->tbl_dimension_body_material_3_handle_length_allowance;
        $data['body_material_3_handle_length_total'] = $dt->tbl_dimension_body_material_3_handle_length_total;

        $data['body_material_3_handle_width'] = $dt->tbl_dimension_body_material_3_handle_width;
        $data['body_material_3_handle_width_allowance'] = $dt->tbl_dimension_body_material_3_handle_width_allowance;
        $data['body_material_3_handle_width_total'] = $dt->tbl_dimension_body_material_3_handle_width_total;

        $data['body_material_3_pocket_length'] = $dt->tbl_dimension_body_material_3_pocket_length;
        $data['body_material_3_pocket_length_allowance'] = $dt->tbl_dimension_body_material_3_pocket_length_allowance;
        $data['body_material_3_pocket_length_total'] = $dt->tbl_dimension_body_material_3_pocket_length_total;

        $data['body_material_3_pocket_width'] = $dt->tbl_dimension_body_material_3_pocket_width;
        $data['body_material_3_pocket_width_allowance'] = $dt->tbl_dimension_body_material_3_pocket_width_allowance;
        $data['body_material_3_pocket_width_total'] = $dt->tbl_dimension_body_material_3_pocket_width_total;

        $data['body_material_3_piping_length'] = $dt->tbl_dimension_body_material_3_piping_length;
        $data['body_material_3_piping_length_allowance'] = $dt->tbl_dimension_body_material_3_piping_length_allowance;
        $data['body_material_3_piping_length_total'] = $dt->tbl_dimension_body_material_3_piping_length_total;

        $data['body_material_3_piping_width'] = $dt->tbl_dimension_body_material_3_piping_width;
        $data['body_material_3_piping_width_allowance'] = $dt->tbl_dimension_body_material_3_piping_width_allowance;
        $data['body_material_3_piping_width_total'] = $dt->tbl_dimension_body_material_3_piping_width_total;

        $this->load->view('admin/admin_header_view',$this->data);
        $this->load->view('admin/admin_home_rev_quilt_and_suit_costing_view', $data);
        $this->load->view('admin/admin_footer_view');
    }


    /**
     * quilt_and_suit_costing
     *
     * This is for Single quilt_and_suit Costing in the admin panel.
     */
    public function quilt_and_suit_costing()
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

        $this->form_validation->set_rules('body_material_1_handle_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_handle_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_handle_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_handle_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_handle_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_handle_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_pocket_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_pocket_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_pocket_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_pocket_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_pocket_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_pocket_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_piping_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_piping_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_piping_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_1_piping_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_piping_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_1_piping_width_total', 'Order Bank Document', 'trim|xss_clean');

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

        $this->form_validation->set_rules('body_material_2_handle_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_handle_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_handle_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_handle_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_handle_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_handle_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_pocket_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_pocket_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_pocket_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_pocket_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_pocket_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_pocket_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_piping_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_piping_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_piping_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_2_piping_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_piping_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_2_piping_width_total', 'Order Bank Document', 'trim|xss_clean');

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

        $this->form_validation->set_rules('body_material_3_handle_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_handle_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_handle_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_handle_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_handle_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_handle_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_pocket_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_pocket_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_pocket_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_pocket_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_pocket_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_pocket_width_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_piping_length', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_piping_length_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_piping_length_total', 'Order Bank Document', 'trim|xss_clean');

        $this->form_validation->set_rules('body_material_3_piping_width', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_piping_width_allowance', 'Order Bank Document', 'trim|xss_clean');
        $this->form_validation->set_rules('body_material_3_piping_width_total', 'Order Bank Document', 'trim|xss_clean');

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

        //All Trims In Yards
        $this->form_validation->set_rules('zipper_cost', 'Zipper Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('zipper_consumption', 'Zipper Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('zipper_consumption_rate', 'Zipper Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('zipper_consumption_cost', 'Zipper Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('webbing_cost', 'Velcro Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('webbing_consumption', 'Velcro Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('webbing_consumption_rate', 'Velcro Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('webbing_consumption_cost', 'Velcro Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('draw_string_cost', 'Velcro Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('draw_string_consumption', 'Velcro Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('draw_string_consumption_rate', 'Velcro Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('draw_string_consumption_cost', 'Velcro Consumption Cost', 'trim|xss_clean');

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

        $this->form_validation->set_rules('eyelet_cost', 'Buckle Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('eyelet_consumption', 'Buckle Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('eyelet_consumption_rate', 'Buckle Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('eyelet_consumption_cost', 'Buckle Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('buckle_cost', 'Buckle Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('buckle_consumption', 'Buckle Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('buckle_consumption_rate', 'Buckle Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('buckle_consumption_cost', 'Buckle Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('snap_button_cost', 'Snap Button Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('snap_button_consumption', 'Snap Button Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('snap_button_consumption_rate', 'Snap Button Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('snap_button_consumption_cost', 'Snap Button Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('magnetic_button_cost', 'Magnetic Button Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('magnetic_button_consumption', 'Magnetic Button Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('magnetic_button_consumption_rate', 'Magnetic Button Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('magnetic_button_consumption_cost', 'Magnetic Button Consumption Cost', 'trim|xss_clean');

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

        $this->form_validation->set_rules('order_total_material_inc_wastage', 'Total Material Including Wastage', 'trim|xss_clean');
        $this->form_validation->set_rules('order_sewing', 'Sewing Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('order_overheads', 'Overhead', 'trim|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $data['error'] = validation_errors();
            //fail validation
            $this->load->view('admin_header_view');
            $this->load->view('admin_home_quilt_and_suit_view', $data);
            $this->load->view('admin_footer_view');
        } else {
            $quilt_and_suit_dimension_data = array(

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


            $this->db->insert('quilt_and_suit_dimension', $quilt_and_suit_dimension_data);
            $inserted_dimension_id = $this->db->insert_id();

            $quilt_and_suit_costing_data = array(

                'tbl_quilt_and_suit_dimension_id' => $inserted_dimension_id,
                'tbl_quilt_and_suit_id_name' => $this->input->post('order_id'),
                'tbl_quilt_and_suit_company_name' => $this->input->post('order_company'),
                'tbl_quilt_and_suit_order_date' => $this->input->post('order_date'),
                'tbl_quilt_and_suit_item_name' => $this->input->post('order_item_name'),
                'tbl_quilt_and_suit_ref_name' => $this->input->post('order_ref_no'),

                'tbl_quilt_and_suit_order_usd' => $this->input->post('order_usd'),
                'tbl_quilt_and_suit_order_wastage' => $this->input->post('order_wastage'),
                'tbl_quilt_and_suit_order_margin' => $this->input->post('order_margin'),
                'tbl_quilt_and_suit_order_quantity' => $this->input->post('order_quantity'),
                'tbl_quilt_and_suit_order_transport' => $this->input->post('order_transport'),
                'tbl_quilt_and_suit_order_bank_doc_charge' => $this->input->post('order_bank_document'),

                //Body Material Roll Width
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

                // All Trims in
                'tbl_quilt_and_suit_trims_yard_extra_1_name' => $this->input->post('extra_trim_yard_extra_1_name'),
                'tbl_quilt_and_suit_trims_yard_extra_2_name' => $this->input->post('extra_trim_yard_extra_2_name'),
                'tbl_quilt_and_suit_trims_yard_extra_3_name' => $this->input->post('extra_trim_yard_extra_3_name'),

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


                //All Trims In Piece
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

                'tbl_order_sewing' => $this->input->post('order_sewing'),
                'tbl_order_overheads' => $this->input->post('order_overheads'),

                'tbl_order_total_material_inc_wastage' => $this->input->post('order_total_material_inc_wastage'),
                'tbl_order_total_overhead_and_other_cost' => $this->input->post('total_overhead_and_other_hidden'),
                'tbl_total_cost' => $this->input->post('total_cost_hidden'),
                'tbl_total_price' => $this->input->post('final_price_hidden'),
            );


            $this->db->insert('quilt_and_suit_costing', $quilt_and_suit_costing_data);

            $inserted_id = $this->db->insert_id();
            $user_id = $this->session->userdata('user_id');

            $data = array(
                'costing_user_id' => $user_id ,
                'costing_user_quilt_and_suit' => $inserted_id
            );
            $this->quilt_and_suit_model->add_costing_by_user($data);
            $insert_id = $this->db->insert_id();


            /*********Add costing to revision***********/
            $this->db->insert('quilt_and_suit_dimension_rev', $quilt_and_suit_dimension_data);
            $dimension_id = $this->db->insert_id();
            $quilt_and_suit_data_rev = array(
                'tbl_quilt_and_suit_order_id' => $inserted_id,
                'tbl_quilt_and_suit_dimension_id' => $dimension_id,
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






            redirect(base_url('admin'));
        }
    }

    /**
     *+Edit the PPNw Costing
     */
    public function edit_quilt_and_suit_costing(){
        $quilt_and_suit_costing_id = $this->uri->segment(3);
        if ($quilt_and_suit_costing_id == NULL) {
            redirect('quiltandsuit/quilt_and_suit_all');
        }

        $dt = $this->quilt_and_suit_model->edit_quilt_and_suit_costing($quilt_and_suit_costing_id);
        //var_dump($dt);
        $data['quilt_and_suit_order_id'] = $dt->tbl_quilt_and_suit_order_id;
        $data['quilt_and_suit_id_name'] = $dt->tbl_quilt_and_suit_id_name;
        $data['quilt_and_suit_company_name'] = $dt->tbl_quilt_and_suit_company_name;
        $data['quilt_and_suit_order_date'] = $dt->tbl_quilt_and_suit_order_date;
        $data['quilt_and_suit_item_name'] = $dt->tbl_quilt_and_suit_item_name;
        $data['quilt_and_suit_ref_name'] = $dt->tbl_quilt_and_suit_ref_name;

        $data['quilt_and_suit_order_usd'] = $dt->tbl_quilt_and_suit_order_usd;
        $data['quilt_and_suit_order_wastage'] = $dt->tbl_quilt_and_suit_order_wastage;
        $data['quilt_and_suit_order_margin'] = $dt->tbl_quilt_and_suit_order_margin;

        $data['quilt_and_suit_order_quantity'] = $dt->tbl_quilt_and_suit_order_quantity;
        $data['quilt_and_suit_order_transport'] = $dt->tbl_quilt_and_suit_order_transport;
        $data['quilt_and_suit_order_bank_doc_charge'] = $dt->tbl_quilt_and_suit_order_bank_doc_charge;
        $data['quilt_and_suit_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;

        $data['quilt_and_suit_order_sewing'] = $dt->tbl_order_sewing;
        $data['quilt_and_suit_order_overheads'] = $dt->tbl_order_overheads;

        $data['quilt_and_suit_order_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;
        $data['quilt_and_suit_order_total_overhead_and_other_cost'] = $dt->tbl_order_total_overhead_and_other_cost;
        $data['quilt_and_suit_total_cost'] = $dt->tbl_total_cost;
        $data['quilt_and_suit_total_price'] = $dt->tbl_total_price;

        //Body Material Roll Width
        $data['quilt_and_suit_body_material_1_roll_width'] = $dt->tbl_quilt_and_suit_body_material_1_roll_width;
        $data['quilt_and_suit_body_material_2_roll_width'] = $dt->tbl_quilt_and_suit_body_material_2_roll_width;
        $data['quilt_and_suit_body_material_3_roll_width'] = $dt->tbl_quilt_and_suit_body_material_3_roll_width;

        //Body Material 1 consumption cost
        $data['quilt_and_suit_body_material_1_cost'] = $dt->tbl_quilt_and_suit_body_material_1_cost;
        $data['quilt_and_suit_body_material_1_consumption'] = $dt->tbl_quilt_and_suit_body_material_1_consumption;
        $data['quilt_and_suit_body_material_1_rate'] = $dt->tbl_quilt_and_suit_body_material_1_rate;
        $data['quilt_and_suit_body_material_1_total_cost'] = $dt->tbl_quilt_and_suit_body_material_1_total_cost;

        //Body Material 2 consumption cost
        $data['quilt_and_suit_body_material_2_cost'] = $dt->tbl_quilt_and_suit_body_material_2_cost;
        $data['quilt_and_suit_body_material_2_consumption'] = $dt->tbl_quilt_and_suit_body_material_2_consumption;
        $data['quilt_and_suit_body_material_2_rate'] = $dt->tbl_quilt_and_suit_body_material_2_rate;
        $data['quilt_and_suit_body_material_2_total_cost'] = $dt->tbl_quilt_and_suit_body_material_2_total_cost;

        //Body Material 3 consumption cost
        $data['quilt_and_suit_body_material_3_cost'] = $dt->tbl_quilt_and_suit_body_material_3_cost;
        $data['quilt_and_suit_body_material_3_consumption'] = $dt->tbl_quilt_and_suit_body_material_3_consumption;
        $data['quilt_and_suit_body_material_3_rate'] = $dt->tbl_quilt_and_suit_body_material_3_rate;
        $data['quilt_and_suit_body_material_3_total_cost'] = $dt->tbl_quilt_and_suit_body_material_3_total_cost;

        $data['zipper_cost'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_cost;
        $data['zipper_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_consumption;
        $data['zipper_consumption_rate'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_rate;
        $data['zipper_consumption_cost'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_total_cost;

        $data['webbing_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_webbing_item_cost;
        $data['webbing_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_webbing_item_consumption;
        $data['webbing_item_consumption_rate'] = $dt->tbl_quilt_and_suit_trims_yard_webbing_item_rate;
        $data['webbing_item_consumption_cost'] = $dt->tbl_quilt_and_suit_trims_yard_webbing_item_total_cost;

        $data['draw_string_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_draw_string_item_cost;
        $data['draw_string_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_draw_string_item_consumption;
        $data['draw_string_item_consumption_rate'] = $dt->tbl_quilt_and_suit_trims_yard_draw_string_item_rate;
        $data['draw_string_item_consumption_cost'] = $dt->tbl_quilt_and_suit_trims_yard_draw_string_item_total_cost;

        $data['velcro_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_cost;
        $data['velcro_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_consumption;
        $data['velcro_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_rate;
        $data['velcro_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_total_cost;

        $data['trim_yard_extra_1_name'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_name;
        $data['trim_yard_extra_2_name'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_name;
        $data['trim_yard_extra_3_name'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_name;

        $data['trim_yard_extra_1_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_cost;
        $data['trim_yard_extra_1_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_consumption;
        $data['trim_yard_extra_1_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_rate;
        $data['trim_yard_extra_1_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_total_cost;

        $data['trim_yard_extra_2_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_cost;
        $data['trim_yard_extra_2_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_consumption;
        $data['trim_yard_extra_2_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_rate;
        $data['trim_yard_extra_2_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_total_cost;

        $data['trim_yard_extra_3_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_cost;
        $data['trim_yard_extra_3_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_consumption;
        $data['trim_yard_extra_3_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_rate;
        $data['trim_yard_extra_3_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_total_cost;

        $data['puller_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_cost;
        $data['puller_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_consumption;
        $data['puller_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_rate;
        $data['puller_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_total_cost;

        $data['print_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_cost;
        $data['print_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_consumption;
        $data['print_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_rate;
        $data['print_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_total_cost;

        $data['eyelet_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_eyelet_item_cost;
        $data['eyelet_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_eyelet_item_consumption;
        $data['eyelet_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_eyelet_item_rate;
        $data['eyelet_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_eyelet_item_total_cost;

        $data['buckle_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_buckle_item_cost;
        $data['buckle_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_buckle_item_consumption;
        $data['buckle_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_buckle_item_rate;
        $data['buckle_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_buckle_item_total_cost;

        $data['magnetic_button_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_cost;
        $data['magnetic_button_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_consumption;
        $data['magnetic_button_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_rate;
        $data['magnetic_button_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_total_cost;

        $data['snap_button_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_cost;
        $data['snap_button_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_consumption;
        $data['snap_button_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_rate;
        $data['snap_button_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_total_cost;

        $data['bottom_base_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_cost;
        $data['bottom_base_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_consumption;
        $data['bottom_base_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_rate;
        $data['bottom_base_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_total_cost;

        $data['thread_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_cost;
        $data['thread_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_consumption;
        $data['thread_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_rate;
        $data['thread_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_total_cost;

        $data['tag_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_cost;
        $data['tag_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_consumption;
        $data['tag_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_rate;
        $data['tag_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_total_cost;

        $data['label_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_cost;
        $data['label_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_consumption;
        $data['label_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_rate;
        $data['label_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_total_cost;

        $data['packing_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_cost;
        $data['packing_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_consumption;
        $data['packing_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_rate;
        $data['packing_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_total_cost;

        $data['extra_1_name'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_name;
        $data['extra_1_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_cost;
        $data['extra_1_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_consumption;
        $data['extra_1_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_rate;
        $data['extra_1_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_total_cost;

        $data['extra_2_name'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_name;
        $data['extra_2_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_cost;
        $data['extra_2_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_consumption;
        $data['extra_2_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_rate;
        $data['extra_2_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_total_cost;

        $data['extra_3_name'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_name;
        $data['extra_3_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_cost;
        $data['extra_3_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_consumption;
        $data['extra_3_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_rate;
        $data['extra_3_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_total_cost;


        //Dimension for Body Material 1
        $data['dimension_id'] = $dt->tbl_dimension_id;

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

        $data['body_material_1_handle_length'] = $dt->tbl_dimension_body_material_1_handle_length;
        $data['body_material_1_handle_length_allowance'] = $dt->tbl_dimension_body_material_1_handle_length_allowance;
        $data['body_material_1_handle_length_total'] = $dt->tbl_dimension_body_material_1_handle_length_total;

        $data['body_material_1_handle_width'] = $dt->tbl_dimension_body_material_1_handle_width;
        $data['body_material_1_handle_width_allowance'] = $dt->tbl_dimension_body_material_1_handle_width_allowance;
        $data['body_material_1_handle_width_total'] = $dt->tbl_dimension_body_material_1_handle_width_total;

        $data['body_material_1_pocket_length'] = $dt->tbl_dimension_body_material_1_pocket_length;
        $data['body_material_1_pocket_length_allowance'] = $dt->tbl_dimension_body_material_1_pocket_length_allowance;
        $data['body_material_1_pocket_length_total'] = $dt->tbl_dimension_body_material_1_pocket_length_total;

        $data['body_material_1_pocket_width'] = $dt->tbl_dimension_body_material_1_pocket_width;
        $data['body_material_1_pocket_width_allowance'] = $dt->tbl_dimension_body_material_1_pocket_width_allowance;
        $data['body_material_1_pocket_width_total'] = $dt->tbl_dimension_body_material_1_pocket_width_total;

        $data['body_material_1_piping_length'] = $dt->tbl_dimension_body_material_1_piping_length;
        $data['body_material_1_piping_length_allowance'] = $dt->tbl_dimension_body_material_1_piping_length_allowance;
        $data['body_material_1_piping_length_total'] = $dt->tbl_dimension_body_material_1_piping_length_total;

        $data['body_material_1_piping_width'] = $dt->tbl_dimension_body_material_1_piping_width;
        $data['body_material_1_piping_width_allowance'] = $dt->tbl_dimension_body_material_1_piping_width_allowance;
        $data['body_material_1_piping_width_total'] = $dt->tbl_dimension_body_material_1_piping_width_total;

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

        $data['body_material_2_handle_length'] = $dt->tbl_dimension_body_material_2_handle_length;
        $data['body_material_2_handle_length_allowance'] = $dt->tbl_dimension_body_material_2_handle_length_allowance;
        $data['body_material_2_handle_length_total'] = $dt->tbl_dimension_body_material_2_handle_length_total;

        $data['body_material_2_handle_width'] = $dt->tbl_dimension_body_material_2_handle_width;
        $data['body_material_2_handle_width_allowance'] = $dt->tbl_dimension_body_material_2_handle_width_allowance;
        $data['body_material_2_handle_width_total'] = $dt->tbl_dimension_body_material_2_handle_width_total;

        $data['body_material_2_pocket_length'] = $dt->tbl_dimension_body_material_2_pocket_length;
        $data['body_material_2_pocket_length_allowance'] = $dt->tbl_dimension_body_material_2_pocket_length_allowance;
        $data['body_material_2_pocket_length_total'] = $dt->tbl_dimension_body_material_2_pocket_length_total;

        $data['body_material_2_pocket_width'] = $dt->tbl_dimension_body_material_2_pocket_width;
        $data['body_material_2_pocket_width_allowance'] = $dt->tbl_dimension_body_material_2_pocket_width_allowance;
        $data['body_material_2_pocket_width_total'] = $dt->tbl_dimension_body_material_2_pocket_width_total;

        $data['body_material_2_piping_length'] = $dt->tbl_dimension_body_material_2_piping_length;
        $data['body_material_2_piping_length_allowance'] = $dt->tbl_dimension_body_material_2_piping_length_allowance;
        $data['body_material_2_piping_length_total'] = $dt->tbl_dimension_body_material_2_piping_length_total;

        $data['body_material_2_piping_width'] = $dt->tbl_dimension_body_material_2_piping_width;
        $data['body_material_2_piping_width_allowance'] = $dt->tbl_dimension_body_material_2_piping_width_allowance;
        $data['body_material_2_piping_width_total'] = $dt->tbl_dimension_body_material_2_piping_width_total;

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

        $data['body_material_3_handle_length'] = $dt->tbl_dimension_body_material_3_handle_length;
        $data['body_material_3_handle_length_allowance'] = $dt->tbl_dimension_body_material_3_handle_length_allowance;
        $data['body_material_3_handle_length_total'] = $dt->tbl_dimension_body_material_3_handle_length_total;

        $data['body_material_3_handle_width'] = $dt->tbl_dimension_body_material_3_handle_width;
        $data['body_material_3_handle_width_allowance'] = $dt->tbl_dimension_body_material_3_handle_width_allowance;
        $data['body_material_3_handle_width_total'] = $dt->tbl_dimension_body_material_3_handle_width_total;

        $data['body_material_3_pocket_length'] = $dt->tbl_dimension_body_material_3_pocket_length;
        $data['body_material_3_pocket_length_allowance'] = $dt->tbl_dimension_body_material_3_pocket_length_allowance;
        $data['body_material_3_pocket_length_total'] = $dt->tbl_dimension_body_material_3_pocket_length_total;

        $data['body_material_3_pocket_width'] = $dt->tbl_dimension_body_material_3_pocket_width;
        $data['body_material_3_pocket_width_allowance'] = $dt->tbl_dimension_body_material_3_pocket_width_allowance;
        $data['body_material_3_pocket_width_total'] = $dt->tbl_dimension_body_material_3_pocket_width_total;

        $data['body_material_3_piping_length'] = $dt->tbl_dimension_body_material_3_piping_length;
        $data['body_material_3_piping_length_allowance'] = $dt->tbl_dimension_body_material_3_piping_length_allowance;
        $data['body_material_3_piping_length_total'] = $dt->tbl_dimension_body_material_3_piping_length_total;

        $data['body_material_3_piping_width'] = $dt->tbl_dimension_body_material_3_piping_width;
        $data['body_material_3_piping_width_allowance'] = $dt->tbl_dimension_body_material_3_piping_width_allowance;
        $data['body_material_3_piping_width_total'] = $dt->tbl_dimension_body_material_3_piping_width_total;


        $this->load->view('admin/admin_header_view', $this->data);
        $this->load->view('admin/admin_home_quilt_and_suit_edit', $data);
        $this->load->view('admin/admin_footer_view', $data);
    }


    /**
     *Single Revision View
     */
    public function single_quilt_and_suit_revision_view(){
        $quilt_and_suit_costing_id = $this->uri->segment(3);
        if ($quilt_and_suit_costing_id == NULL) {
            redirect('quiltandsuit/quilt_and_suit_all');
        }

        $dt = $this->quilt_and_suit_model->edit_quilt_and_suit_costing($quilt_and_suit_costing_id);
        //var_dump($dt);
        $data['quilt_and_suit_order_id'] = $dt->tbl_quilt_and_suit_order_id;
        $data['quilt_and_suit_id_name'] = $dt->tbl_quilt_and_suit_id_name;
        $data['quilt_and_suit_company_name'] = $dt->tbl_quilt_and_suit_company_name;
        $data['quilt_and_suit_order_date'] = $dt->tbl_quilt_and_suit_order_date;
        $data['quilt_and_suit_item_name'] = $dt->tbl_quilt_and_suit_item_name;
        $data['quilt_and_suit_ref_name'] = $dt->tbl_quilt_and_suit_ref_name;

        $data['quilt_and_suit_order_gsm'] = $dt->tbl_quilt_and_suit_order_gsm;
        $data['quilt_and_suit_order_color'] = $dt->tbl_quilt_and_suit_order_color;
        $data['quilt_and_suit_order_usd'] = $dt->tbl_quilt_and_suit_order_usd;

        $data['quilt_and_suit_order_wastage'] = $dt->tbl_quilt_and_suit_order_wastage;
        $data['quilt_and_suit_order_margin'] = $dt->tbl_quilt_and_suit_order_margin;

        $data['quilt_and_suit_order_quantity'] = $dt->tbl_quilt_and_suit_order_quantity;
        $data['quilt_and_suit_order_transport'] = $dt->tbl_quilt_and_suit_order_transport;
        $data['quilt_and_suit_order_bank_doc_charge'] = $dt->tbl_quilt_and_suit_order_bank_doc_charge;
        $data['quilt_and_suit_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;

        $data['quilt_and_suit_order_sewing'] = $dt->tbl_order_sewing;
        $data['quilt_and_suit_order_overheads'] = $dt->tbl_order_overheads;

        $data['quilt_and_suit_order_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;
        $data['quilt_and_suit_order_total_overhead_and_other_cost'] = $dt->tbl_order_total_overhead_and_other_cost;
        $data['quilt_and_suit_total_cost'] = $dt->tbl_total_cost;
        $data['quilt_and_suit_total_price'] = $dt->tbl_total_price;

        //Body Material Name
        $data['quilt_and_suit_body_material_1_name'] = $dt->tbl_quilt_and_suit_body_material_1_name;
        $data['quilt_and_suit_body_material_2_name'] = $dt->tbl_quilt_and_suit_body_material_2_name;
        $data['quilt_and_suit_body_material_3_name'] = $dt->tbl_quilt_and_suit_body_material_3_name;
        $data['quilt_and_suit_body_material_4_name'] = $dt->tbl_quilt_and_suit_body_material_4_name;
        $data['quilt_and_suit_body_material_5_name'] = $dt->tbl_quilt_and_suit_body_material_5_name;
        $data['quilt_and_suit_body_material_6_name'] = $dt->tbl_quilt_and_suit_body_material_6_name;

        //Body Material Roll Width
        $data['quilt_and_suit_body_material_1_roll_width'] = $dt->tbl_quilt_and_suit_body_material_1_roll_width;
        $data['quilt_and_suit_body_material_2_roll_width'] = $dt->tbl_quilt_and_suit_body_material_2_roll_width;
        $data['quilt_and_suit_body_material_3_roll_width'] = $dt->tbl_quilt_and_suit_body_material_3_roll_width;
        $data['quilt_and_suit_body_material_4_roll_width'] = $dt->tbl_quilt_and_suit_body_material_4_roll_width;
        $data['quilt_and_suit_body_material_5_roll_width'] = $dt->tbl_quilt_and_suit_body_material_5_roll_width;
        $data['quilt_and_suit_body_material_6_roll_width'] = $dt->tbl_quilt_and_suit_body_material_6_roll_width;

        //Body Material 1 consumption cost
        $data['quilt_and_suit_body_material_1_cost'] = $dt->tbl_quilt_and_suit_body_material_1_cost;
        $data['quilt_and_suit_body_material_1_consumption'] = $dt->tbl_quilt_and_suit_body_material_1_consumption;
        $data['quilt_and_suit_body_material_1_rate'] = $dt->tbl_quilt_and_suit_body_material_1_rate;
        $data['quilt_and_suit_body_material_1_total_cost'] = $dt->tbl_quilt_and_suit_body_material_1_total_cost;

        //Body Material 2 consumption cost
        $data['quilt_and_suit_body_material_2_cost'] = $dt->tbl_quilt_and_suit_body_material_2_cost;
        $data['quilt_and_suit_body_material_2_consumption'] = $dt->tbl_quilt_and_suit_body_material_2_consumption;
        $data['quilt_and_suit_body_material_2_rate'] = $dt->tbl_quilt_and_suit_body_material_2_rate;
        $data['quilt_and_suit_body_material_2_total_cost'] = $dt->tbl_quilt_and_suit_body_material_2_total_cost;

        //Body Material 3 consumption cost
        $data['quilt_and_suit_body_material_3_cost'] = $dt->tbl_quilt_and_suit_body_material_3_cost;
        $data['quilt_and_suit_body_material_3_consumption'] = $dt->tbl_quilt_and_suit_body_material_3_consumption;
        $data['quilt_and_suit_body_material_3_rate'] = $dt->tbl_quilt_and_suit_body_material_3_rate;
        $data['quilt_and_suit_body_material_3_total_cost'] = $dt->tbl_quilt_and_suit_body_material_3_total_cost;

        //Body Material 4 consumption cost
        $data['quilt_and_suit_body_material_4_cost'] = $dt->tbl_quilt_and_suit_body_material_4_cost;
        $data['quilt_and_suit_body_material_4_consumption'] = $dt->tbl_quilt_and_suit_body_material_4_consumption;
        $data['quilt_and_suit_body_material_4_rate'] = $dt->tbl_quilt_and_suit_body_material_4_rate;
        $data['quilt_and_suit_body_material_4_total_cost'] = $dt->tbl_quilt_and_suit_body_material_4_total_cost;

        //Body Material 5 consumption cost
        $data['quilt_and_suit_body_material_5_cost'] = $dt->tbl_quilt_and_suit_body_material_5_cost;
        $data['quilt_and_suit_body_material_5_consumption'] = $dt->tbl_quilt_and_suit_body_material_5_consumption;
        $data['quilt_and_suit_body_material_5_rate'] = $dt->tbl_quilt_and_suit_body_material_5_rate;
        $data['quilt_and_suit_body_material_5_total_cost'] = $dt->tbl_quilt_and_suit_body_material_5_total_cost;

        //Body Material 6 consumption cost
        $data['quilt_and_suit_body_material_6_cost'] = $dt->tbl_quilt_and_suit_body_material_6_cost;
        $data['quilt_and_suit_body_material_6_consumption'] = $dt->tbl_quilt_and_suit_body_material_6_consumption;
        $data['quilt_and_suit_body_material_6_rate'] = $dt->tbl_quilt_and_suit_body_material_6_rate;
        $data['quilt_and_suit_body_material_6_total_cost'] = $dt->tbl_quilt_and_suit_body_material_6_total_cost;

        //Zipper
        $data['zipper_cost'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_cost;
        $data['zipper_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_consumption;
        $data['zipper_consumption_rate'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_rate;
        $data['zipper_consumption_cost'] = $dt->tbl_quilt_and_suit_trims_yard_zipper_item_total_cost;

        $data['velcro_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_cost;
        $data['velcro_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_consumption;
        $data['velcro_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_rate;
        $data['velcro_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_velcro_item_total_cost;

        $data['extra_trim_yard_extra_1_name'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_name;
        $data['extra_trim_yard_extra_2_name'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_name;
        $data['extra_trim_yard_extra_3_name'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_name;

        $data['quilt_and_suit_trims_yard_extra_1_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_cost;
        $data['quilt_and_suit_trims_yard_extra_1_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_consumption;
        $data['quilt_and_suit_trims_yard_extra_1_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_rate;
        $data['quilt_and_suit_trims_yard_extra_1_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_1_item_total_cost;

        $data['quilt_and_suit_trims_yard_extra_2_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_cost;
        $data['quilt_and_suit_trims_yard_extra_2_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_consumption;
        $data['quilt_and_suit_trims_yard_extra_2_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_rate;
        $data['quilt_and_suit_trims_yard_extra_2_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_2_item_total_cost;

        $data['quilt_and_suit_trims_yard_extra_3_item_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_cost;
        $data['quilt_and_suit_trims_yard_extra_3_item_consumption'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_consumption;
        $data['quilt_and_suit_trims_yard_extra_3_item_rate'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_rate;
        $data['quilt_and_suit_trims_yard_extra_3_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_yard_extra_3_item_total_cost;


        $data['quilt_and_suit_trims_piece_puller_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_cost;
        $data['quilt_and_suit_trims_piece_puller_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_consumption;
        $data['quilt_and_suit_trims_piece_puller_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_rate;
        $data['quilt_and_suit_trims_piece_puller_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_puller_item_total_cost;


        $data['quilt_and_suit_trims_piece_print_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_cost;
        $data['quilt_and_suit_trims_piece_print_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_consumption;
        $data['quilt_and_suit_trims_piece_print_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_rate;
        $data['quilt_and_suit_trims_piece_print_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_print_item_total_cost;

        $data['quilt_and_suit_trims_piece_d_buckle_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_d_buckle_item_cost;
        $data['quilt_and_suit_trims_piece_d_buckle_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_d_buckle_item_consumption;
        $data['quilt_and_suit_trims_piece_d_buckle_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_d_buckle_item_rate;
        $data['quilt_and_suit_trims_piece_d_buckle_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_d_buckle_item_total_cost;

        $data['quilt_and_suit_trims_piece_swivel_hook_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_swivel_hook_item_cost;
        $data['quilt_and_suit_trims_piece_swivel_hook_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_swivel_hook_item_consumption;
        $data['quilt_and_suit_trims_piece_swivel_hook_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_swivel_hook_item_rate;
        $data['quilt_and_suit_trims_piece_swivel_hook_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_swivel_hook_item_total_cost;

        $data['quilt_and_suit_trims_piece_adjustable_bukle_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_adjustable_bukle_item_cost;
        $data['quilt_and_suit_trims_piece_adjustable_bukle_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_adjustable_bukle_item_consumption;
        $data['quilt_and_suit_trims_piece_adjustable_bukle_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_adjustable_bukle_item_rate;
        $data['quilt_and_suit_trims_piece_adjustable_bukle_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_adjustable_bukle_item_total_cost;


        $data['quilt_and_suit_trims_piece_magnetic_button_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_cost;
        $data['quilt_and_suit_trims_piece_magnetic_button_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_consumption;
        $data['quilt_and_suit_trims_piece_magnetic_button_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_rate;
        $data['quilt_and_suit_trims_piece_magnetic_button_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_magnetic_button_item_total_cost;

        $data['quilt_and_suit_trims_piece_snap_button_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_cost;
        $data['quilt_and_suit_trims_piece_snap_button_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_consumption;
        $data['quilt_and_suit_trims_piece_snap_button_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_rate;
        $data['quilt_and_suit_trims_piece_snap_button_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_snap_button_item_total_cost;

        $data['quilt_and_suit_trims_piece_rivet_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_rivet_item_cost;
        $data['quilt_and_suit_trims_piece_rivet_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_rivet_item_consumption;
        $data['quilt_and_suit_trims_piece_rivet_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_rivet_item_rate;
        $data['quilt_and_suit_trims_piece_rivet_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_rivet_item_total_cost;

        $data['quilt_and_suit_trims_piece_bottom_base_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_cost;
        $data['quilt_and_suit_trims_piece_bottom_base_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_consumption;
        $data['quilt_and_suit_trims_piece_bottom_base_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_rate;
        $data['quilt_and_suit_trims_piece_bottom_base_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_base_item_total_cost;

        $data['quilt_and_suit_trims_piece_thread_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_cost;
        $data['quilt_and_suit_trims_piece_thread_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_consumption;
        $data['quilt_and_suit_trims_piece_thread_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_rate;
        $data['quilt_and_suit_trims_piece_thread_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_thread_item_total_cost;

        $data['quilt_and_suit_trims_piece_tag_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_cost;
        $data['quilt_and_suit_trims_piece_tag_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_consumption;
        $data['quilt_and_suit_trims_piece_tag_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_rate;
        $data['quilt_and_suit_trims_piece_tag_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_tag_item_total_cost;

        $data['quilt_and_suit_trims_piece_label_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_cost;
        $data['quilt_and_suit_trims_piece_label_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_consumption;
        $data['quilt_and_suit_trims_piece_label_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_rate;
        $data['quilt_and_suit_trims_piece_label_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_label_item_total_cost;

        $data['quilt_and_suit_trims_piece_packing_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_cost;
        $data['quilt_and_suit_trims_piece_packing_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_consumption;
        $data['quilt_and_suit_trims_piece_packing_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_rate;
        $data['quilt_and_suit_trims_piece_packing_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_packing_item_total_cost;

        $data['quilt_and_suit_trims_piece_bottom_shoe_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_shoe_item_cost;
        $data['quilt_and_suit_trims_piece_bottom_shoe_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_shoe_item_consumption;
        $data['quilt_and_suit_trims_piece_bottom_shoe_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_shoe_item_rate;
        $data['quilt_and_suit_trims_piece_bottom_shoe_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_bottom_shoe_item_total_cost;

        $data['quilt_and_suit_trims_piece_extra_1_name'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_name;
        $data['quilt_and_suit_trims_piece_extra_1_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_cost;
        $data['quilt_and_suit_trims_piece_extra_1_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_consumption;
        $data['quilt_and_suit_trims_piece_extra_1_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_rate;
        $data['quilt_and_suit_trims_piece_extra_1_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_1_item_total_cost;

        $data['quilt_and_suit_trims_piece_extra_2_name'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_name;
        $data['quilt_and_suit_trims_piece_extra_2_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_cost;
        $data['quilt_and_suit_trims_piece_extra_2_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_consumption;
        $data['quilt_and_suit_trims_piece_extra_2_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_rate;
        $data['quilt_and_suit_trims_piece_extra_2_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_2_item_total_cost;

        $data['quilt_and_suit_trims_piece_extra_3_name'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_name;
        $data['quilt_and_suit_trims_piece_extra_3_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_cost;
        $data['quilt_and_suit_trims_piece_extra_3_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_consumption;
        $data['quilt_and_suit_trims_piece_extra_3_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_rate;
        $data['quilt_and_suit_trims_piece_extra_3_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_3_item_total_cost;

        $data['quilt_and_suit_trims_piece_extra_4_name'] = $dt->tbl_quilt_and_suit_trims_piece_extra_4_name;
        $data['quilt_and_suit_trims_piece_extra_4_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_4_item_cost;
        $data['quilt_and_suit_trims_piece_extra_4_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_extra_4_item_consumption;
        $data['quilt_and_suit_trims_piece_extra_4_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_extra_4_item_rate;
        $data['quilt_and_suit_trims_piece_extra_4_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_4_item_total_cost;

        $data['quilt_and_suit_trims_piece_extra_5_name'] = $dt->tbl_quilt_and_suit_trims_piece_extra_5_name;
        $data['quilt_and_suit_trims_piece_extra_5_item_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_5_item_cost;
        $data['quilt_and_suit_trims_piece_extra_5_item_consumption'] = $dt->tbl_quilt_and_suit_trims_piece_extra_5_item_consumption;
        $data['quilt_and_suit_trims_piece_extra_5_item_rate'] = $dt->tbl_quilt_and_suit_trims_piece_extra_5_item_rate;
        $data['quilt_and_suit_trims_piece_extra_5_item_total_cost'] = $dt->tbl_quilt_and_suit_trims_piece_extra_5_item_total_cost;


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

        $data['body_material_1_handle_length'] = $dt->tbl_dimension_body_material_1_handle_length;
        $data['body_material_1_handle_length_allowance'] = $dt->tbl_dimension_body_material_1_handle_length_allowance;
        $data['body_material_1_handle_length_total'] = $dt->tbl_dimension_body_material_1_handle_length_total;

        $data['body_material_1_handle_width'] = $dt->tbl_dimension_body_material_1_handle_width;
        $data['body_material_1_handle_width_allowance'] = $dt->tbl_dimension_body_material_1_handle_width_allowance;
        $data['body_material_1_handle_width_total'] = $dt->tbl_dimension_body_material_1_handle_width_total;

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

        $data['body_material_2_handle_length'] = $dt->tbl_dimension_body_material_2_handle_length;
        $data['body_material_2_handle_length_allowance'] = $dt->tbl_dimension_body_material_2_handle_length_allowance;
        $data['body_material_2_handle_length_total'] = $dt->tbl_dimension_body_material_2_handle_length_total;

        $data['body_material_2_handle_width'] = $dt->tbl_dimension_body_material_2_handle_width;
        $data['body_material_2_handle_width_allowance'] = $dt->tbl_dimension_body_material_2_handle_width_allowance;
        $data['body_material_2_handle_width_total'] = $dt->tbl_dimension_body_material_2_handle_width_total;

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

        $data['body_material_3_handle_length'] = $dt->tbl_dimension_body_material_3_handle_length;
        $data['body_material_3_handle_length_allowance'] = $dt->tbl_dimension_body_material_3_handle_length_allowance;
        $data['body_material_3_handle_length_total'] = $dt->tbl_dimension_body_material_3_handle_length_total;

        $data['body_material_3_handle_width'] = $dt->tbl_dimension_body_material_3_handle_width;
        $data['body_material_3_handle_width_allowance'] = $dt->tbl_dimension_body_material_3_handle_width_allowance;
        $data['body_material_3_handle_width_total'] = $dt->tbl_dimension_body_material_3_handle_width_total;

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

        $this->load->view('admin/admin_header_view', $this->data);
        $this->load->view('admin/admin_home_quilt_and_suit_edit', $data);
        $this->load->view('admin/admin_footer_view', $data);
    }

    /**
     * @param null $id
     */
    public function update_quilt_and_suit_costing()
    {
        if ($this->input->post('updatequiltandsuit')) {
            $quiltandsuitId = $this->input->post('quilt-and-suit-id');
            $this->quilt_and_suit_model->update_quilt_and_suit_costing($quiltandsuitId);
            redirect('quiltandsuit/quilt_and_suit_all');
        } else{
            $id = $this->input->post('quilt-and-suit-id');
            redirect('quiltandsuit/edit_quilt_and_suit_costing/'. $id);
        }
    }


    /**
     * @param $ppnw_costing_id
     */

    public function delete_quilt_and_suit_costing($quilt_and_suit_costing_id){
            $this->quilt_and_suit_model->delete_quilt_and_suit_costing($quilt_and_suit_costing_id);
            redirect(base_url('quiltandsuit/quilt_and_suit_all'));
    }

}