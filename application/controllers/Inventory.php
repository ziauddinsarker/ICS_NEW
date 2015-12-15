<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->library('ion_auth');
		
		$this->load->model('inventory_model');
		$data['product'] = $this->inventory_model->get_product();
		$this->data['inventorys'] = $this->inventory_model->get_inventory();

		$username = $this->session->userdata('username');
		$this->data['employee'] = $this->admin_model->get_user_employee($username);
	}


	/**
	 * Inventory Index
	 */
	public function index()
	{
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('inventory/view_inventory',$this->data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}


	public function email_check()
	{
		// allow only Ajax request
		if ($this->input->is_ajax_request()) {
			// grab the email value from the post variable.
			$email = $this->input->post('email');
			// check in database - table name : tbl_users  , Field name in the table : email
			if (!$this->form_validation->is_unique($email, 'tbl_users.email')) {
				// set the json object as output
				$this->output->set_content_type('application/json')->set_output(json_encode(array('message' => 'The email is already taken, choose another one')));
			}
		}
	}

	/****************Product**********************/
	/**
	 * Get all Products from Database
	 */
	function all_products(){
		$this->data['products'] = $this->inventory_model->all_products();
		//var_dump($this->data['products']);
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_all_products',$this->data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	/**
	 * Show  Add New Product Page
	 */
	function add_product(){
		$data['name'] = $this->inventory_model->get_product_name();
		//$data['code'] = $this->inventory_model->get_product_code();
		$data['color'] = $this->inventory_model->get_product_color();
		$data['fabric'] = $this->inventory_model->get_product_fabric();
		$data['category'] = $this->inventory_model->get_product_category();
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_add_product',$data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	/**
	 * Save Product from Add New Product Page
	 */
	function save_to_products(){
		$this->form_validation->set_rules('name', 'Product Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('code', 'Product SKU', 'trim|required|xss_clean');
		$this->form_validation->set_rules('fabric', 'Product Fabric', 'trim|required|xss_clean');
		$this->form_validation->set_rules('color', 'Fabric Color', 'trim|required|xss_clean');
		$this->form_validation->set_rules('price', 'Product Price', 'trim|required|xss_clean');
		$this->form_validation->set_rules('category', 'Product Category', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$data['error'] = validation_errors();
			//fail validation
			$this->load->view('admin/admin_header_view',$this->data);
			$this->load->view('variations/view_add_product');
			$this->load->view('admin/admin_footer_view',$this->data);
		}
		else
		{
			$product_name = $this->input->post('name');
			$product_code = $this->input->post('code');
			$product_fabric = $this->input->post('fabric');
			$product_color = $this->input->post('color');
			$product_price= $this->input->post('price');
			$product_category = $this->input->post('category');
			$product_data = array(
				'product_name' => $product_name,
				'product_code' => $product_code,
				'product_fabric' => $product_fabric,
				'product_color' => $product_color,
				'product_price' => $product_price,
				'product_category' => $product_category,
			);
			$this->db->insert('tbl_product', $product_data);
			redirect('inventory/all_products');
		}
	}

	/**
	 * Edit product from a product List
	 */
	function edit_product(){
		$data['name'] = $this->inventory_model->get_product_name();
		$data['code'] = $this->inventory_model->get_product_code();
		$data['color'] = $this->inventory_model->get_product_color();
		$data['fabric'] = $this->inventory_model->get_product_fabric();
		$data['category'] = $this->inventory_model->get_product_category();

		$product_id = $this->uri->segment(3);
		if ($product_id == NULL) {
			redirect('inventory/all_products');
		}

		$dt = $this->inventory_model->edit_product($product_id);
		//var_dump($dt);
		$data['product_id'] = $dt->id;
		$data['product_name'] = $dt->product_name;
		$data['product_code'] = $dt->product_code;
		$data['product_fabric'] = $dt->product_fabric;
		$data['product_color'] = $dt->product_color;
		$data['product_price'] = $dt->product_price;
		$data['product_category'] = $dt->product_category;

		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_edit_product',$data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	/**
	 *Update a product from product list
	 */
	function update_product(){
		if ($this->input->post('update')) {
			$productId = $this->input->post('product-id');
			$this->inventory_model->update_product($productId);
			redirect('inventory/all_products');
		} else{
			$id = $this->input->post('product-id');
			redirect('inventory/edit_product/'. $id);
		}
	}

	/**+
	 * @param $product_id
	 * Delete a product from a product List
	 */
	public function delete_product($product_id){
		$this->inventory_model->delete_product($product_id);
		redirect(base_url('inventory/all_products'));
	}

	/**************** Product Category**********************/

	function add_product_category(){
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_add_category');
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	function save_to_product_category(){
		$this->form_validation->set_rules('category', 'Product Category', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$data['error'] = validation_errors();
			//fail validation
			$this->load->view('admin/admin_header_view',$this->data);
			$this->load->view('inventory/view_add_category');
			$this->load->view('admin/admin_footer_view',$this->data);
		}
		else
		{
			$product_category = $this->input->post('category');
			$product_data = array(
				'product_category_name' => $product_category,
			);
			$this->db->insert('tbl_product_category', $product_data);
			redirect('inventory/all_categories');
		}
	}

	function all_categories(){
		$this->data['categories'] = $this->inventory_model->get_all_categories();
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_all_categories',$this->data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}


	function edit_product_category(){

		$category_id = $this->uri->segment(3);
		if ($category_id == NULL) {
			redirect('inventory/all_categories');
		}

		$dt = $this->inventory_model->edit_category($category_id);
		$data['product_category_name'] = $dt->product_category_name;
		$data['category_id'] = $dt->id;

		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_edit_category',$data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}


	function update_product_category(){
		if ($this->input->post('update')) {
			$catId = $this->input->post('category-id');
			$this->inventory_model->update_category($catId);
			redirect('inventory/all_categories');
		} else{
			$id = $this->input->post('category-id');
			redirect('inventory/edit_product_category/'. $id);
		}
	}


	public function delete_product_category($category_id){
		$this->inventory_model->delete_category($category_id);
		redirect(base_url('inventory/all_categories'));
	}

	/**************** Product Name Start**********************/

	function all_product_name(){
		$this->data['product_name'] = $this->inventory_model->get_all_product_name();
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_all_product_name',$this->data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	function add_product_name(){
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_add_product_name');
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	function save_to_product_name(){
		$this->form_validation->set_rules('product-name', 'Product Name', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$data['error'] = validation_errors();
			//fail validation
			$this->load->view('admin/admin_header_view',$this->data);
			$this->load->view('variations/view_add_product_name');
			$this->load->view('admin/admin_footer_view',$this->data);
		}
		else
		{
			$product_name = $this->input->post('product-name');
			$product_data = array(
				'product_name' => $product_name,
			);
			$this->db->insert('tbl_product_name', $product_data);
			redirect('inventory/all_product_name');
		}
	}

	function edit_product_name(){

		$product_name_id = $this->uri->segment(3);
		if ($product_name_id == NULL) {
			redirect('variations/get_all_product_name');
		}

		$dt = $this->inventory_model->edit_product_name($product_name_id);
		$data['product_name'] = $dt->product_name;
		$data['product_name_id'] = $dt->id;

		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_edit_product_name',$data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	function update_product_name(){
		if ($this->input->post('update')) {
			$productNameId = $this->input->post('product-name-id');
			$this->inventory_model->update_product_name($productNameId);
			redirect('inventory/all_product_name');
		} else{
			$id = $this->input->post('product-name-id');
			redirect('inventory/edit_product_name/'. $id);
		}
	}

	public function delete_product_name($product_name_id){
		$this->inventory_model->delete_product_name($product_name_id);
		redirect('inventory/all_product_name');
	}
	/********************Product Name End***************************/

	/********************* Product Code Start***********************/
	function all_product_code(){
		$this->data['product_code'] = $this->inventory_model->get_all_product_code();
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_all_product_code',$this->data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	function add_product_code(){
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_add_product_code');
		$this->load->view('admin/admin_footer_view',$this->data);
	}


	function save_to_product_code(){
		$this->form_validation->set_rules('product-code', 'Product Code', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$data['error'] = validation_errors();
			//fail validation
			$this->load->view('admin/admin_header_view',$this->data);
			$this->load->view('variations/view_add_product_code');
			$this->load->view('admin/admin_footer_view',$this->data);
		}
		else
		{
			$product_code = $this->input->post('product-code');
			$product_data = array(
				'product_code' => $product_code,
			);
			$this->db->insert('tbl_product_code', $product_data);
			redirect('inventory/all_product_code');
		}
	}

	function edit_product_code(){

		$product_code_id = $this->uri->segment(3);
		if ($product_code_id == NULL) {
			redirect('inventory/all_product_code');
		}

		$dt = $this->inventory_model->edit_product_code($product_code_id);
		$data['product_code'] = $dt->product_code;
		$data['product_code_id'] = $dt->id;

		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_edit_product_code',$data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}


	function update_product_code(){
		if ($this->input->post('update')) {
			$productCodeId = $this->input->post('product-code-id');
			$this->inventory_model->update_product_code($productCodeId);
			redirect('inventory/all_product_code');
		} else{
			$id = $this->input->post('product-code-id');
			redirect('inventory/edit_product_code/'. $id);
		}
	}


	public function delete_product_code($product_code_id){
		$this->inventory_model->delete_product_code($product_code_id);
		redirect('inventory/all_product_code');
	}
	/********************Product Code End***************************/

	/********************* Product Color Start***********************/
	function all_product_color(){
		$this->data['product_color'] = $this->inventory_model->get_all_product_color();
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_all_product_color',$this->data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	function add_product_color(){
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_add_product_color');
		$this->load->view('admin/admin_footer_view',$this->data);
	}


	function save_to_product_color(){
		$this->form_validation->set_rules('product-color', 'Product Color', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$data['error'] = validation_errors();
			//fail validation
			$this->load->view('admin/admin_header_view',$this->data);
			$this->load->view('variations/view_add_product_color');
			$this->load->view('admin/admin_footer_view',$this->data);
		}
		else
		{
			$product_color = $this->input->post('product-color');
			$product_data = array(
				'product_color' => $product_color,
			);
			$this->db->insert('tbl_product_color', $product_data);
			redirect('inventory/all_product_color');
		}
	}

	function edit_product_color(){

		$product_code_id = $this->uri->segment(3);
		if ($product_code_id == NULL) {
			redirect('inventory/all_product_color');
		}

		$dt = $this->inventory_model->edit_product_color($product_code_id);
		$data['product_color'] = $dt->product_color;
		$data['product_color_id'] = $dt->id;

		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_edit_product_color',$data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}


	function update_product_color(){
		if ($this->input->post('update')) {
			$productCodeId = $this->input->post('product-color-id');
			$this->inventory_model->update_product_color($productCodeId);
			redirect('inventory/all_product_color');
		} else{
			$id = $this->input->post('product-color-id');
			redirect('inventory/edit_product_color/'. $id);
		}
	}


	public function delete_product_color($product_color_id){
		$this->inventory_model->delete_product_color($product_color_id);
		redirect('inventory/all_product_color');
	}
	/********************Product Color End***************************/

	/********************* Product Fabric Start***********************/
	function all_product_fabric(){
		$this->data['product_fabric'] = $this->inventory_model->get_all_product_fabric();
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_all_product_fabric',$this->data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	function add_product_fabric(){
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_add_product_fabric');
		$this->load->view('admin/admin_footer_view',$this->data);
	}


	function save_to_product_fabric(){
		$this->form_validation->set_rules('product-fabric', 'Product Fabric', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$data['error'] = validation_errors();
			//fail validation
			$this->load->view('admin/admin_header_view',$this->data);
			$this->load->view('variations/view_add_product_fabric');
			$this->load->view('admin/admin_footer_view',$this->data);
		}
		else
		{
			$product_fabric = $this->input->post('product-fabric');
			$product_data = array(
				'product_fabric_name' => $product_fabric,
			);
			$this->db->insert('tbl_product_fabric', $product_data);
			redirect('inventory/all_product_fabric');
		}
	}

	function edit_product_fabric(){

		$product_fabric_id = $this->uri->segment(3);
		if ($product_fabric_id == NULL) {
			redirect('inventory/all_product_fabric');
		}

		$dt = $this->inventory_model->edit_product_fabric($product_fabric_id);
		$data['product_fabric'] = $dt->product_fabric_name;
		$data['product_fabric_id'] = $dt->id;

		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('variations/view_edit_product_fabric',$data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}


	function update_product_fabric(){
		if ($this->input->post('update')) {
			$productFabricId = $this->input->post('product-fabric-id');
			$this->inventory_model->update_product_fabric($productFabricId);
			redirect('inventory/all_product_fabric');
		} else{
			$id = $this->input->post('product-fabric-id');
			redirect('inventory/edit_product_fabric/'. $id);
		}
	}


	public function delete_product_fabric($product_fabric_id){
		$this->inventory_model->delete_product_fabric($product_fabric_id);
		redirect('inventory/all_product_fabric');
	}
	/********************Product Color End***************************/

	/****************Inventory*******************/
	/**
	 * Get All Inventory Data
	 */
	function add_to_inventory(){
		$data['product'] = $this->inventory_model->get_product();
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('inventory/view_add_product_to_inventory',$data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	/**
	 * Save New product to inventory
	 */
	function save_products_to_inventory(){
		$this->form_validation->set_rules('product', 'Product Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('quantity', 'Product Quantity', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$data['error'] = validation_errors();
			//fail validation
			$this->load->view('admin/admin_header_view',$this->data);
			$this->load->view('inventory/view_add_product_to_inventory',$data);
			$this->load->view('admin/admin_footer_view',$this->data);
		}
		else
		{
			if ($this->input->post('save')) {
				$product_id = $this->input->post('product');

				$this->db->select('product_id');
				$this->db->from('tbl_inventory');
				$this->db->where('product_id', $product_id);
				$num_rows = $this->db->count_all_results();

				//Get number of rows from database
				/*
				 * $this->db->select('product_id');
					$this->db->from('tbl_inventory');
					$this->db->where('product_id', $product_id);
					$query = $this->db->get();
					//Number of rows
					$num_rows = $query->num_rows();
					//var_dump($num_rows);
				*/

				//If row number is zero then save data to new row
				if($num_rows == NULL || $num_rows == '' ||$num_rows == 0  ) {
					$product_id = $this->input->post('product');
					$product_quantity = $this->input->post('quantity');

					$product_data = array(
						'tbl_inventory.product_id' => $product_id,
						'tbl_inventory.product_left' => $product_quantity,
					);
					$this->db->insert('tbl_inventory', $product_data);

				// If row exist then update data
				}

				if($num_rows == 1){
					$product_id = $this->input->post('product');
					$product_quantity = $this->input->post('quantity');

					//$this->db->select('product_id,product_left');
					//$this->db->where('product_id', $product_id);
					//$q = $this->db->get('tbl_inventory');
					//if id is unique we want just one row to be returned
					//$data = array_shift($q->result_array());

					//$product_left = $data['product_left'];
					//Get Existing Left Products
					$product_left = $this->db->select('product_id,product_left')->get_where('tbl_inventory', array('product_id' => $product_id))->row()->product_left;
					$product_left = $product_left + $product_quantity;



					$update_data = array(
						'product_left' => $product_left,
					);
					$this->db->where('product_id', $product_id);
					$this->db->update('tbl_inventory', $update_data);

				}
				redirect(base_url('inventory'));


			}


		}
	}
	
	
	/****************Invoice***************/
	public function invoice(){
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('inventory/view_invoice');
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	function save_invoice(){

			$order_data = array(
				'name' => $this->input->post('name'),
				'location' => $this->input->post('location'),
			);
			$this->db->insert('tbl_order', $order_data);
			$order_id = $this->db->insert_id();

		//var_dump('Order Id' . $order_id);
		//$count = count($this->input->post('productname'));
				//var_dump('Product :' . $count);


			for ($i = 0; $i < count($this->input->post('productname')); $i++){
				$order_detail = array(
					'order_id' => $order_id,
					'product_name' => $this->input->post('productname')[$i],
					'quantity' => $this->input->post('quantity')[$i],
					'price' => $this->input->post('price')[$i],
					'discount' => $this->input->post('discount')[$i],
					'amount' => $this->input->post('amount')[$i],
				);

				$this->db->insert('tbl_orderdetail', $order_detail);
			}

		//PDF output
		$this->fpdf->SetTitle("ICS - PDF Output");
		//Set Font for Header
		$this->fpdf->Ln(12);
		$this->fpdf->setFont('Arial','',30);
		$this->fpdf->setFillColor(255,255,255);
		$this->fpdf->cell(200,0,"SIMURA",0,0,'C',1);
		$this->fpdf->cell(100,6,' ',0,1,'C',1);

		$this->fpdf->cell(100,5,' ',0,1,'C',1);
		$this->fpdf->SetFontSize(15);
		$this->fpdf->SetFillColor(200,220,255);
		$this->fpdf->cell(95,6,"Invoice",0,0,'R',1);

		$this->fpdf->cell(100,6,' ',0,1,'L',1);
		$this->fpdf->setFont('Arial','',10);
		$this->fpdf->setFillColor(255,255,255);
		$this->fpdf->cell(50,6,"Customer Name:",0,0,'L',1);
		$this->fpdf->cell(116,6,"Date : " . date('d/m/Y'),0,1,'R',1);

		$this->fpdf->cell(50,6,"Phone:",0,0,'L',1);
		$this->fpdf->cell(125,6,"Invoice No. : Inv-00000",0,1,'R',1);

		$this->fpdf->cell(100,6,"Email :",0,0,'L',1);

		$this->fpdf->Ln(12);
		$this->fpdf->setFont('Arial','',14);
		$this->fpdf->setFillColor(255,255,255);
		$this->fpdf->cell(25,6,'',0,0,'C',0);

		$this->fpdf->Ln(5);
		$this->fpdf->setFont('Arial','',10);
		$this->fpdf->SetFillColor(200,220,255);

		/**
		 * Content
		 *
		 */
		$this->fpdf->cell(10,6,'#',1,0,'C',1);
		$this->fpdf->cell(45,6,'Product ID',1,0,'C',1);
		$this->fpdf->cell(15,6,'Quantity',1,0,'C',1);
		$this->fpdf->cell(25,6,'Unit Price',1,0,'C',1);
		$this->fpdf->cell(25,6,'Discount (%)',1,0,'C',1);
		$this->fpdf->cell(35,6,'Discount (BDT)',1,0,'C',1);
		$this->fpdf->cell(40,6,'Total',1,0,'C',1);


		/**
		 * SQL
		 */
		$this->db->select('*');
		$this->db->from('tbl_order');
		$this->db->join('tbl_orderdetail','tbl_order.id = tbl_orderdetail.order_id');
		$this->db->where('tbl_order.id',$order_id);
		$query = $this->db->get('');
		$result = $query->result();
		//var_dump($result);
		//
		$id = 0;
		foreach($result as $row) {

			$id++;
			$this->fpdf->Ln(6);
			$this->fpdf->cell(10,6,$id,1,0,1);
			$this->fpdf->cell(45,6,$row->product_name,1,0,1);
			$this->fpdf->cell(15,6,$row->quantity,1,0,1);
			$this->fpdf->cell(25,6,$row->price,1,0,1);
			$this->fpdf->cell(25,6,$row->discount.'%',1,0,1);
			$this->fpdf->cell(35,6,$row->discount_amount,1,0,1);
			$this->fpdf->cell(40,6,$row->amount,1,0,1);
		}

		$this->db->select('*');
		$this->db->select('SUM(price) AS subtotal, SUM(discount) AS totaldiscount');
		$this->db->from('tbl_order');
		$this->db->join('tbl_orderdetail','tbl_order.id = tbl_orderdetail.order_id');
		$this->db->where('tbl_order.id',15);
		$query = $this->db->get('');
		$result = $query->result();
		foreach($result as $row) {

			$this->fpdf->Ln(6);
			$this->fpdf->Cell(120);
			$this->fpdf->cell(35, 6, 'Subtotal', 1, 0, 1);
			$this->fpdf->cell(40, 6, $row->subtotal.'.00', 1, 0, 1);
			$this->fpdf->Ln(6);
			$this->fpdf->Cell(120);
			$this->fpdf->cell(35, 6, 'Discount', 1, 0, 1);
			$this->fpdf->cell(40, 6, $row->totaldiscount.'.00', 1, 0, 1);
			$this->fpdf->Ln(6);
			$this->fpdf->Cell(120);
			$this->fpdf->cell(35, 6, 'Grand Total', 1, 0, 1);
			$this->fpdf->cell(40, 6, ($row->subtotal - $row->totaldiscount).'.00', 1, 0, 1);


		}

// Position at 1.5 cm from bottom
		$this->fpdf->SetY(-35);
		// Arial italic 8
		$this->fpdf->SetFont('Arial','I',8);
		// Page number
		$this->fpdf->Cell(0,10,'Thank You For Our Business',0,0,'C');

		/**
		 * Footer
		 */
		$this->fpdf->AliasNbPages();
		$this->fpdf->SetFont('Times','',12);

		//Open PDF on same page
		//$this->fpdf->Output("Invoice.pdf", "I");


		$this->fpdf->Output("Invoice.pdf",'F');

		//Save Invoice to Local Computer
		//$this->fpdf->Output("Invoice.pdf",'D');

		//$this->fpdf->Output("Invoice.pdf",'S');

		//echo $this->fpdf->Output('ics.pdf','D');


		redirect('home/invoice', 'refresh');
	}




}
