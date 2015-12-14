<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('user_model');
		$this->load->library('ion_auth');
		
		$this->load->model('ppnw_model');
		$this->load->model('woven_simple_model');
        $this->load->model('woven_model');
		$this->load->model('quilt_and_suit_model');
		
		$username = $this->session->userdata('username');
		
		$this->data['ppnw_all_count'] = $this->ppnw_model->ppnw_total_count_by_user($username);
		$this->data['woven_simple_all_count'] = $this->woven_simple_model->woven_simple_total_count_by_user($username);
        $this->data['woven_all_count'] = $this->woven_model->woven_total_count_by_user($username);
		
		
		$this->load->model('inventory_model');
		$data['product'] = $this->inventory_model->get_product();
		$this->data['inventorys'] = $this->inventory_model->get_inventory();

		$username = $this->session->userdata('username');
		$this->data['employee'] = $this->admin_model->get_user_employee($username);

		$user_id = $this->session->userdata('user_id');
		$this->data['todos'] = $this->admin_model->get_todo($user_id);

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

	/****************Product**********************/

	function all_products(){
		$this->data['products'] = $this->inventory_model->all_products();
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('inventory/view_all_products',$this->data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	function add_product(){
		$data['category'] = $this->inventory_model->get_product_category();
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('inventory/view_add_product',$data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}

	function save_to_products(){
		$this->form_validation->set_rules('name', 'Product Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('sku', 'Product SKU', 'trim|required|xss_clean');
		$this->form_validation->set_rules('price', 'Product Price', 'trim|required|xss_clean');
		$this->form_validation->set_rules('price', 'Product Category', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$data['error'] = validation_errors();
			//fail validation
			$this->load->view('inventory/view_header');
			$this->load->view('inventory/view_add_product');
			$this->load->view('admin/admin_footer_view',$this->data);
		}
		else
		{
			$product_name = $this->input->post('name');
			$product_sku = $this->input->post('sku');
			$product_price= $this->input->post('price');
			$product_category = $this->input->post('category');
			$product_data = array(
				'product_name' => $product_name,
				'product_sku' => $product_sku,
				'product_price' => $product_price,
				'product_category' => $product_category,
			);
			$this->db->insert('tbl_product', $product_data);
			redirect('inventory/all_products');
		}
	}


	function edit_product(){
		$data['category'] = $this->inventory_model->get_product_category();

		$product_id = $this->uri->segment(3);
		if ($product_id == NULL) {
			redirect('inventory/all_products');
		}

		$dt = $this->inventory_model->edit_product($product_id);
		//var_dump($dt);
		$data['product_id'] = $dt->id;
		$data['product_name'] = $dt->product_name;
		$data['product_sku'] = $dt->product_sku;
		$data['product_price'] = $dt->product_price;
		$data['product_category'] = $dt->product_category;

		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('inventory/view_edit_product',$data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}


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


	public function delete_product($product_id){
		$this->inventory_model->delete_category($product_id);
		redirect(base_url('inventory/get_category'));
	}

	/**************** Product Category**********************/

	function add_product_category(){
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('inventory/view_add_category');
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
				'category_name' => $product_category,
			);
			$this->db->insert('tbl_product_category', $product_data);
			redirect('inventory/get_category');
		}
	}

	function get_category(){
		$this->data['categories'] = $this->inventory_model->get_categories();
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('inventory/view_all_categories',$this->data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}


	function edit_product_category(){

		$category_id = $this->uri->segment(3);
		if ($category_id == NULL) {
			redirect('inventory/get_category');
		}

		$dt = $this->inventory_model->edit_category($category_id);
		$data['category_name'] = $dt->category_name;
		$data['category_id'] = $dt->id;

		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('inventory/view_edit_category',$data);
		$this->load->view('admin/admin_footer_view',$this->data);
	}


	function update_product_category(){
		if ($this->input->post('update')) {
			$catId = $this->input->post('category-id');
			$this->inventory_model->update_category($catId);
			redirect('inventory/get_category');
		} else{
			$id = $this->input->post('category-id');
			redirect('inventory/edit_product_category/'. $id);
		}
	}


	public function delete_product_category($category_id){
		$this->inventory_model->delete_category($category_id);
		redirect(base_url('inventory/get_category'));
	}


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
		$data['product'] = $this->inventory_model->get_product();
		$this->load->view('admin/admin_header_view',$this->data);
		$this->load->view('inventory/view_invoice',$data);
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
