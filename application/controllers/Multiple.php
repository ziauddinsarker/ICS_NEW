<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiple extends CI_Controller {

	public function __construct()
    {
        parent::__construct(); 
	}

	/**
	 *
	 */
	public function index(){
		$this->load->model('admin_model');
		
		$this->data['picture'] = $this->admin_model->get_picture();
		
		$getdata = $this->db->query('SELECT
										p.id,
										p.product_description,
										pd.product_name
										FROM
										product AS p
										INNER JOIN product_details AS pd ON p.id = pd.product_id
										GROUP BY p.id
										ORDER BY p.id ASC');
					//var_dump($getdata);
					
					//var_dump($this->data['picture']);
					
		$this->load->view('multiple/index',array('data' => $getdata));
		//$this->load->view('multiple/index', $this->data);
		
	
	}

	/**
	 *
	 */
	public function form(){
		$this->load->view('multiple/form', array('error' => ''));
	}


	/**
	 * @return array
	 */
	private function setup_upload_option(){
		$config = array();
		$config['upload_path'] 	= './assets/images/gallery';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['encrypt_name'] = TRUE;
		$config['overwrite']	= false;
		return $config;
	}

	/**
	 * @param $id
	 */
	public function edit_product_image($id){
		$getrow = $this->db->query("SELECT * FROM product WHERE id=".$id."");
		$row = $getrow->row();
		$this->load->view('multiple/edit', array('row'=> $row));
	}

	/**
	 *
	 */
	public function do_upload(){
		$this->load->library('upload');
		$files = $_FILES;
		
		
		$data = array(
			'product_description' => $this->input->post('product_description')
		);
		
		$ch = $this->db->insert('product', $data);		
		$id = $this->db->insert_id();
		
		if($ch > 0){
		
		
		$count = count($_FILES['userfile']['name']);
		
		for($i=0; $i<$count; $i++){
			$_FILES['userfile']['name'] 	= $files['userfile']['name'][$i];
			$_FILES['userfile']['type'] 	= $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['size'] 	= $files['userfile']['size'][$i];
			$_FILES['userfile']['error'] 	= $files['userfile']['error'][$i];
			
			$this->upload->initialize($this->setup_upload_option());
			
			if($this->upload->do_upload() == false)
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('multiple/form',$error);
			}else{
				$data = $this->upload->data();
				$dataarray = array(
					'product_id' => $id,
					'product_name' => $data['file_name'],
					'product_size' => $data['file_size'],
					'product_ext' => $data['file_ext'],
					'full_path' => $data['full_path']					
				);
				
				$this->db->insert('product_details', $dataarray);
			}
		}
		
		redirect('Multiple/index');
		}	
	}
	
}

