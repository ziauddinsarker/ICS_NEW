<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class woven_simple extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->model('woven_simple_model');

        $username = $this->session->userdata('username');

        $this->data['employee'] = $this->admin_model->get_user_employee($username);
        $this->data['woven_simple_all_costing'] = $this->woven_simple_model->gel_all_woven_simple_costing($username);
        $this->data['woven_simple_all_count'] = $this->woven_simple_model->woven_simple_total_count_by_user($username);
    }

    /************************************************/
    /*****************Woven Simple***************************/
    /************************************************/
    /**
     * Show All Woven Simple Costing in a page of a Particular user
     */

    public function woven_simple_all(){
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('login/index', 'refresh');
        } else {
            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_woven_simple_all_view', $this->data);
            $this->load->view('admin/admin_footer_view');
        }
    }

    /**
     * @param $id
     *
     * Revisions of single Woven Simple costing
     */
    public function revision_woven_simple_costing($id){

        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('login/index', 'refresh');
        } else {
            $this->data['revision_single_woven_simple_costing'] = $this->woven_simple_model->all_revisions_single_woven_simple_costing($id);
            //var_dump($this->data['revision_single_ppnw_costing']);
            $this->load->view('admin/admin_header_view', $this->data);
            $this->load->view('admin/admin_home_woven_simple_single_user_rev_view', $this->data);
            $this->load->view('admin/admin_footer_view');
        }
    }



    /**
     *Single revision from all revisions of particular woven simple costing
     */
    public function single_revision_woven_simple_costing($id){
        $this->data['single_rev'] = $this->woven_simple_model->single_revisions_single_woven_simple_costing();
        $this->load->view('admin/admin_header_view', $this->data);
        $this->load->view('admin/admin_home_rev_woven_simple_costing_view', $this->data);
        $this->load->view('admin/admin_footer_view');
    }



    /**
     * Woven Simple Costing
     *
     * This is for Single Woven Simple Costing in the admin panel.
     */
    public function woven_simple_costing()
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

        $this->form_validation->set_rules('order_body_h', 'Body Height', 'trim|xss_clean');
        $this->form_validation->set_rules('order_body_h_allowance', 'Body Height Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_body_h_total', 'Body Height Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_body_w', 'Body Width', 'trim|xss_clean');
        $this->form_validation->set_rules('order_body_w_allowance', 'Body Width Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_body_w_total', 'Body Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_body_panel', 'Body Panel', 'trim|xss_clean');
        $this->form_validation->set_rules('order_body_panel_allowance', 'Body Panel Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_body_panel_total', 'Body Panel Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_handle_l', 'Double Handle Length', 'trim|xss_clean');
        $this->form_validation->set_rules('order_handle_l_allowance', 'Double Handle Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_handle_l_total', 'Double Handle Length Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_handle_w', 'Double Handle Width', 'trim|xss_clean');
        $this->form_validation->set_rules('order_handle_w_allowance', 'Double Handle Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_handle_w_total', 'Double Handle Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_pocket_l', 'Pocket Length', 'trim|xss_clean');
        $this->form_validation->set_rules('order_pocket_l_allowance', 'Pocket Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_pocket_l_total', 'Pocket Length Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_pocket_w', 'Pocket Width', 'trim|xss_clean');
        $this->form_validation->set_rules('order_pocket_w_allowance', 'Pocket Width Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_pocket_w_total', 'Pocket Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_extra_1_l', 'Extra 1 Length', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_1_l_allowance', 'Extra 1 Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_1_l_total', 'Extra 1 Length Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_extra_1_w', 'Extra 1 Width', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_1_w_allowance', 'Extra 1 Width Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_1_w_total', 'Extra 1 Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_extra_2_l', 'Extra 2 Length', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_2_l_allowance', 'Extra 2 Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_2_l_total', 'Extra 2 Length Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_extra_2_w', 'Extra 2 Width', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_2_w_allowance', 'Extra 2 Width Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_2_w_total', 'Extra 2 Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_extra_3_l', 'Extra 3 Length', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_3_l_allowance', 'Extra 3 Length Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_3_l_total', 'Extra 3 Length Total', 'trim|xss_clean');

        $this->form_validation->set_rules('order_extra_3_w', 'Extra 3 Width', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_3_w_allowance', 'Extra 3 Width Allowance', 'trim|xss_clean');
        $this->form_validation->set_rules('order_extra_3_w_total', 'Extra 3 Width Total', 'trim|xss_clean');

        $this->form_validation->set_rules('ppnw_cost', 'PP-Nonwovnes Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('ppnw_consumption', 'PP-Nonwovnes Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('ppnw_consumption_rate', 'PP-Nonwovnes Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('ppnw_consumption_cost', 'PP-Nonwovnes Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('zipper_cost', 'Zipper Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('zipper_consumption', 'Zipper Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('zipper_consumption_rate', 'Zipper Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('zipper_consumption_cost', 'Zipper Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('webbing_cost', 'Webbing Cost Width', 'trim|xss_clean');
        $this->form_validation->set_rules('webbing_consumption', 'Webbing Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('webbing_consumption_rate', 'Webbing Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('webbing_consumption_cost', 'Webbing Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('draw_string_cost', 'Draw String Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('draw_string_consumption', 'Draw String Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('draw_string_consumption_rate', 'Draw String Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('draw_string_consumption_cost', 'Draw String Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('velcro_cost', 'Velcro Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('velcro_consumption', 'Velcro Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('velcro_consumption_rate', 'Velcro Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('velcro_consumption_cost', 'Velcro Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('tape_cost', 'Tape Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('tape_consumption', 'Tape Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('tape_consumption_rate', 'Tape Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('tape_consumption_cost', 'Tape Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('extra_trim_yard_1_cost', 'Extra Trim Yard 1 Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_1_consumption', 'Extra Trim Yard 1 Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_1_consumption_rate', 'Extra Trim Yard 1 Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_1_consumption_cost', 'Extra Trim Yard 1 Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('extra_trim_yard_2_cost', 'Extra Trim Yard 2 Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_2_consumption', 'Extra Trim Yard 2 Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_2_consumption_rate', 'Extra Trim Yard 2 Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('extra_trim_yard_2_consumption_cost', 'Extra Trim Yard 2 Consumption Cost', 'trim|xss_clean');


        /*********Trims in Pices***********/
        $this->form_validation->set_rules('puller_cost', 'Puller Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('puller_consumption', 'Puller Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('puller_consumption_rate', 'Puller Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('puller_consumption_cost', 'Puller Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('print_cost', 'Print Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('print_consumption', 'Print Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('print_consumption_rate', 'Print Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('print_consumption_cost', 'Print Consumption Cost', 'trim|xss_clean');

        $this->form_validation->set_rules('eyelet_cost', 'Eyelet Cost', 'trim|xss_clean');
        $this->form_validation->set_rules('eyelet_consumption', 'Eyelet Consumption', 'trim|xss_clean');
        $this->form_validation->set_rules('eyelet_consumption_rate', 'Eyelet Consumption Rate', 'trim|xss_clean');
        $this->form_validation->set_rules('eyelet_consumption_cost', 'Eyelet Consumption Cost', 'trim|xss_clean');

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
            $this->load->view('admin_home_woven_simple_view', $data);
            $this->load->view('admin_footer_view');
        } else {

            $order_data = array(
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
                'tbl_order_sewing' => $this->input->post('order_sewing'),
                'tbl_order_overheads' => $this->input->post('order_overheads'),

                'tbl_order_total_material_inc_wastage' => $this->input->post('order_total_material_inc_wastage'),
                'tbl_order_total_overhead_and_other_cost' => $this->input->post('total_overhead_and_other_hidden'),
                'tbl_total_cost' => $this->input->post('total_cost_hidden'),
                'tbl_total_price' => $this->input->post('final_price_hidden'),

            );

            $this->db->insert('woven_simple_costing', $order_data);

            $insert_id = $this->db->insert_id();
            $user_id = $this->session->userdata('user_id');

            $data = array(
                'costing_user_id' => $user_id ,
                'costing_user_woven_simple' => $insert_id
            );
            $this->woven_simple_model->add_costing_by_user($data);


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
                'tbl_ics_order_id' => $insert_id,
            );

            $this->db->insert('woven_simple_costing_rev',$ppnw_update_rev_data);

            redirect(base_url('admin'));
        }
    }

    /**
     *+Edit the PPNw Costing
     */
    public function edit_woven_simple_costing(){
        $ppnw_costing_id = $this->uri->segment(3);
        if ($ppnw_costing_id == NULL) {
            redirect('woven_simple/woven_simple_all');
        }

        $dt = $this->woven_simple_model->edit_woven_simple_costing($ppnw_costing_id);


        $data['ics_order_id'] = $dt->ics_order_id;
        $data['order_id'] = $dt->tbl_order_id_name;
        $data['order_company'] = $dt->tbl_company_id;
        $data['order_date'] = $dt->tbl_order_date;
        $data['order_item_name'] = $dt->tbl_item_name;
        $data['order_ref_no'] = $dt->tbl_ref_name;

        $data['order_gsm'] = $dt->tbl_order_gsm;
        $data['order_colour'] = $dt->tbl_order_color;
        $data['order_usd'] = $dt->tbl_order_usd;
        $data['order_wastage'] = $dt->tbl_order_wastage;
        $data['order_margin'] = $dt->tbl_order_margin;

        $data['order_quantity'] = $dt->tbl_order_quantity;
        $data['order_transport'] = $dt->tbl_order_transport;
        $data['order_bank_document'] = $dt->tbl_order_bank_doc_charge;

        $data['order_body_h'] = $dt->tbl_dimension_body_height;
        $data['order_body_h_allowance'] = $dt->tbl_dimension_body_height_allowance;
        $data['order_body_h_total'] = $dt->tbl_dimension_body_height_total;

        $data['order_body_w'] = $dt->tbl_dimension_body_width;
        $data['order_body_w_allowance'] = $dt->tbl_dimension_body_width_allowance;
        $data['order_body_w_total'] = $dt->tbl_dimension_body_width_total;

        $data['order_body_panel'] = $dt->tbl_dimension_body_panel;
        $data['order_body_panel_allowance'] = $dt->tbl_dimension_body_panel_allowance;
        $data['order_body_panel_total'] = $dt->tbl_dimension_body_panel_total;

        $data['order_handle_l'] = $dt->tbl_dimension_handle_length;
        $data['order_handle_l_allowance'] = $dt->tbl_dimension_handle_length_allowance;
        $data['order_handle_l_total'] = $dt->tbl_dimension_handle_length_total;

        $data['order_handle_w'] = $dt->tbl_dimension_handle_width;
        $data['order_handle_w_allowance'] = $dt->tbl_dimension_handle_width_allowance;
        $data['order_handle_w_total'] = $dt->tbl_dimension_handle_width_total;

        $data['order_pocket_l'] = $dt->tbl_dimension_pocket_length;
        $data['order_pocket_l_allowance'] = $dt->tbl_dimension_pocket_length_allowance;
        $data['order_pocket_l_total'] = $dt->tbl_dimension_pocket_length_total;

        $data['order_pocket_w'] = $dt->tbl_dimension_pocket_width;
        $data['order_pocket_w_allowance'] = $dt->tbl_dimension_pocket_width_allowance;
        $data['order_pocket_w_total'] = $dt->tbl_dimension_pocket_width_total;

        $data['order_extra_1_l'] = $dt->tbl_dimension_extra_1_length;
        $data['order_extra_1_l_allowance'] = $dt->tbl_dimension_extra_1_length_allowance;
        $data['order_extra_1_l_total'] = $dt->tbl_dimension_extra_1_length_total;

        $data['order_extra_1_w'] = $dt->tbl_dimension_extra_1_width;
        $data['order_extra_1_w_allowance'] = $dt->tbl_dimension_extra_1_width_allowance;
        $data['order_extra_1_w_total'] = $dt->tbl_dimension_extra_1_width_total;

        $data['order_extra_2_l'] = $dt->tbl_dimension_extra_2_length;
        $data['order_extra_2_l_allowance'] = $dt->tbl_dimension_extra_2_length_allowance;
        $data['order_extra_2_l_total'] = $dt->tbl_dimension_extra_2_length_total;

        $data['order_extra_2_w'] = $dt->tbl_dimension_extra_2_width;
        $data['order_extra_2_w_allowance'] = $dt->tbl_dimension_extra_2_width_allowance;
        $data['order_extra_2_w_total'] = $dt->tbl_dimension_extra_2_width_total;

        $data['order_extra_3_l'] = $dt->tbl_dimension_extra_3_length;
        $data['order_extra_3_l_allowance'] = $dt->tbl_dimension_extra_3_length_allowance;
        $data['order_extra_3_l_total'] = $dt->tbl_dimension_extra_3_length_total;

        $data['order_extra_3_w'] = $dt->tbl_dimension_extra_3_width;
        $data['order_extra_3_w_allowance'] = $dt->tbl_dimension_extra_3_width_allowance;
        $data['order_extra_3_w_total'] = $dt->tbl_dimension_extra_3_width_total;

        $data['ppnw_cost'] = $dt->tbl_order_ppnw_item_cost;
        $data['ppnw_consumption'] = $dt->tbl_order_ppnw_item_consumption;
        $data['ppnw_consumption_rate'] = $dt->tbl_order_ppnw_rate;
        $data['ppnw_consumption_cost'] = $dt->tbl_order_ppnw_total_item_cost;

        $data['zipper_cost'] = $dt->tbl_trims_yard_zipper_item_cost;
        $data['zipper_consumption'] = $dt->tbl_trims_yard_zipper_item_consumption;
        $data['zipper_consumption_rate'] = $dt->tbl_trims_yard_zipper_item_rate;
        $data['zipper_consumption_cost'] = $dt->tbl_trims_yard_zipper_item_total_cost;

        $data['webbing_cost'] = $dt->tbl_trims_yard_webbing_item_cost;
        $data['webbing_consumption'] = $dt->tbl_trims_yard_webbing_item_consumption;
        $data['webbing_consumption_rate'] = $dt->tbl_trims_yard_webbing_item_rate;
        $data['webbing_consumption_cost'] = $dt->tbl_trims_yard_webbing_item_total_cost;


        $data['draw_string_cost'] = $dt->tbl_trims_yard_draw_string_item_cost;
        $data['draw_string_consumption'] = $dt->tbl_trims_yard_draw_string_item_consumption;
        $data['draw_string_consumption_rate'] = $dt->tbl_trims_yard_draw_string_item_rate;
        $data['draw_string_consumption_cost'] = $dt->tbl_trims_yard_draw_string_item_total_cost;

        $data['velcro_cost'] = $dt->tbl_trims_yard_velcro_item_cost;
        $data['velcro_consumption'] = $dt->tbl_trims_yard_velcro_item_consumption;
        $data['velcro_consumption_rate'] = $dt->tbl_trims_yard_velcro_item_rate;
        $data['velcro_consumption_cost'] = $dt->tbl_trims_yard_velcro_item_total_cost;

        $data['tape_cost'] = $dt->tbl_trims_yard_tape_item_cost;
        $data['tape_consumption'] = $dt->tbl_trims_yard_tape_item_consumption;
        $data['tape_consumption_rate'] = $dt->tbl_trims_yard_tape_item_rate;
        $data['tape_consumption_cost'] = $dt->tbl_trims_yard_tape_item_total_cost;

        $data['extra_trim_yard_1_cost'] = $dt->tbl_trims_yard_extra_1_item_cost;
        $data['extra_trim_yard_1_consumption'] = $dt->tbl_trims_yard_extra_1_item_consumption;
        $data['extra_trim_yard_1_consumption_rate'] = $dt->tbl_trims_yard_extra_1_item_rate;
        $data['extra_trim_yard_1_consumption_cost'] = $dt->tbl_trims_yard_extra_1_item_total_cost;

        $data['extra_trim_yard_2_cost'] = $dt->tbl_trims_yard_extra_2_item_cost;
        $data['extra_trim_yard_2_consumption'] = $dt->tbl_trims_yard_extra_2_item_consumption;
        $data['extra_trim_yard_2_consumption_rate'] = $dt->tbl_trims_yard_extra_2_item_consumption;
        $data['extra_trim_yard_2_consumption_cost'] = $dt->tbl_trims_yard_extra_2_item_total_cost;

        $data['puller_cost'] = $dt->tbl_trims_piece_puller_item_cost;
        $data['puller_consumption'] = $dt->tbl_trims_piece_puller_item_consumption;
        $data['puller_consumption_rate'] = $dt->tbl_trims_piece_puller_item_rate;
        $data['puller_consumption_cost'] = $dt->tbl_trims_piece_puller_item_total_cost;


        $data['print_cost'] = $dt->tbl_trims_piece_print_item_cost;
        $data['print_consumption'] = $dt->tbl_trims_piece_print_item_consumption;
        $data['print_consumption_rate'] = $dt->tbl_trims_piece_print_item_rate;
        $data['print_consumption_cost'] = $dt->tbl_trims_piece_print_item_total_cost;

        $data['eyelet_cost'] = $dt->tbl_trims_piece_eyelet_item_cost;
        $data['eyelet_consumption'] = $dt->tbl_trims_piece_eyelet_item_consumption;
        $data['eyelet_consumption_rate'] = $dt->tbl_trims_piece_eyelet_item_rate;
        $data['eyelet_consumption_cost'] = $dt->tbl_trims_piece_eyelet_item_total_cost;

        $data['buckle_cost'] = $dt->tbl_trims_piece_buckle_item_cost;
        $data['buckle_consumption'] = $dt->tbl_trims_piece_buckle_item_consumption;
        $data['buckle_consumption_rate'] = $dt->tbl_trims_piece_buckle_item_rate;
        $data['buckle_consumption_cost'] = $dt->tbl_trims_piece_buckle_item_total_cost;

        $data['snap_button_cost'] = $dt->tbl_trims_piece_snap_button_item_cost;
        $data['snap_button_consumption'] = $dt->tbl_trims_piece_snap_button_item_consumption;
        $data['snap_button_consumption_rate'] = $dt->tbl_trims_piece_snap_button_item_rate;
        $data['snap_button_consumption_cost'] = $dt->tbl_trims_piece_snap_button_item_total_cost;

        $data['magnetic_button_cost'] = $dt->tbl_trims_piece_magnetic_button_item_cost;
        $data['magnetic_button_consumption'] = $dt->tbl_trims_piece_magnetic_button_item_consumption;
        $data['magnetic_button_consumption_rate'] = $dt->tbl_trims_piece_magnetic_button_item_rate;
        $data['magnetic_button_consumption_cost'] = $dt->tbl_trims_piece_magnetic_button_item_total_cost;

        $data['bottom_base_cost'] = $dt->tbl_trims_piece_bottom_base_item_cost;
        $data['bottom_base_consumption'] = $dt->tbl_trims_piece_bottom_base_item_consumption;
        $data['bottom_base_consumption_rate'] = $dt->tbl_trims_piece_bottom_base_item_rate;
        $data['bottom_base_consumption_cost'] = $dt->tbl_trims_piece_bottom_base_item_total_cost;

        $data['thread_cost'] = $dt->tbl_trims_piece_thread_item_cost;
        $data['thread_consumption'] = $dt->tbl_trims_piece_thread_item_consumption;
        $data['thread_consumption_rate'] = $dt->tbl_trims_piece_thread_item_rate;
        $data['thread_consumption_cost'] = $dt->tbl_trims_piece_thread_item_total_cost;

        $data['tag_cost'] = $dt->tbl_trims_piece_tag_item_cost;
        $data['tag_consumption'] = $dt->tbl_trims_piece_tag_item_consumption;
        $data['tag_consumption_rate'] = $dt->tbl_trims_piece_tag_item_rate;
        $data['tag_consumption_cost'] = $dt->tbl_trims_piece_tag_item_total_cost;

        $data['label_cost'] = $dt->tbl_trims_piece_label_item_cost;
        $data['label_consumption'] = $dt->tbl_trims_piece_label_item_consumption;
        $data['label_consumption_rate'] = $dt->tbl_trims_piece_label_item_rate;
        $data['label_consumption_cost'] = $dt->tbl_trims_piece_label_item_total_cost;

        $data['packing_cost'] = $dt->tbl_trims_piece_packing_item_cost;
        $data['packing_consumption'] = $dt->tbl_trims_piece_packing_item_consumption;
        $data['packing_consumption_rate'] = $dt->tbl_trims_piece_packing_item_rate;
        $data['packing_consumption_cost'] = $dt->tbl_trims_piece_packing_item_total_cost;

        $data['extra_1_piece_cost'] = $dt->tbl_trims_piece_extra_1_item_cost;
        $data['extra_1_piece_consumption'] = $dt->tbl_trims_piece_extra_1_item_consumption;
        $data['extra_1_piece_consumption_rate'] = $dt->tbl_trims_piece_extra_1_item_rate;
        $data['extra_1_piece_consumption_cost'] = $dt->tbl_trims_piece_extra_1_item_total_cost;

        $data['extra_2_piece_cost'] = $dt->tbl_trims_piece_extra_2_item_cost;
        $data['extra_2_piece_consumption'] = $dt->tbl_trims_piece_extra_2_item_consumption;
        $data['extra_2_piece_consumption_rate'] = $dt->tbl_trims_piece_extra_2_item_rate;
        $data['extra_2_piece_consumption_cost'] = $dt->tbl_trims_piece_extra_2_item_total_cost;

        $data['extra_3_piece_cost'] = $dt->tbl_trims_piece_extra_3_item_cost;
        $data['extra_3_piece_consumption'] = $dt->tbl_trims_piece_extra_3_item_consumption;
        $data['extra_3_piece_consumption_rate'] = $dt->tbl_trims_piece_extra_3_item_rate;
        $data['extra_3_piece_consumption_cost'] = $dt->tbl_trims_piece_extra_3_item_total_cost;


        $data['order_sewing'] = $dt->tbl_order_sewing;
        $data['order_overheads'] = $dt->tbl_order_overheads;

        $data['order_total_material_inc_wastage'] = $dt->tbl_order_total_material_inc_wastage;
        $data['order_total_overhead_and_other_cost'] = $dt->tbl_order_total_overhead_and_other_cost;
        $data['total_cost'] = $dt->tbl_total_cost;
        $data['total_price'] = $dt->tbl_total_price;

        $this->load->view('admin/admin_header_view', $this->data);
        $this->load->view('admin/admin_home_woven_simple_edit', $data);
        $this->load->view('admin/admin_footer_view', $data);
    }

    /**
     * @param null $id
     */
    public function update_woven_simple_costing()
    {
        if ($this->input->post('updateppnw')) {
            $ppnwId = $this->input->post('ppnw-id');
            $this->woven_simple_model->update_woven_simple_costing($ppnwId);
            redirect('woven_simple/woven_simple_all');
        } else{
            $id = $this->input->post('ppnw-id');
            redirect('woven_simple/edit_woven_simple_costing/'. $id);
        }
    }


    /**
     * @param $woven_simple_costing_id
     */

    public function delete_woven_simple_costing($woven_simple_costing_id){
            $this->woven_simple_model->delete_woven_simple_costing($woven_simple_costing_id);
            redirect(base_url('woven_simple/woven_simple_all'));
    }

}