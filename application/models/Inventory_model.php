<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_model extends CI_Model
{
        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
            $this->load->library('fpdf_gen');
        }


    /*******************Products*********************/
         function all_products()
        {
            $this->db->select('*');
            $this->db->select('tbl_product.id as product_id');
            $this->db->from('tbl_product');
            $this->db->join('tbl_product_category','tbl_product.product_category = tbl_product_category.id');
            $query = $this->db->get();
            return $query->result();
        }


        function edit_product($product_id) {
            $this->db->join('tbl_product_category','tbl_product.product_category = tbl_product_category.id');
            $data = $this->db->get_where('tbl_product', array('tbl_product.id' => $product_id))->row();
            return $data;
        }


        function update_product($product_id) {
            $product_update_data = array(
                'product_name' => $this->input->post('name'),
                'product_sku' => $this->input->post('sku'),
                'product_price' => $this->input->post('price'),
                'product_category' => $this->input->post('category'),
            );
            $this->db->where('tbl_product.id', $product_id);
            $this->db->update('tbl_product', $product_update_data);

        }

        function delete_product($product_id)
        {
            $this->db->where('id',$product_id);
            $this->db->delete('tbl_product_category');
        }

        function get_product_category()
        {
            $this->db->select('id,category_name');
            $this->db->from('tbl_product_category');
            $this->db->order_by('category_name', 'ASC');
            $query = $this->db->get();
            $result = $query->result();

            //array to store department id & department name
            $category_id = array('-SELECT-');
            $category_name = array('-SELECT Category-');

            for ($i = 0; $i < count($result); $i++) {
                array_push($category_id, $result[$i]->id);
                array_push($category_name, $result[$i]->category_name);
            }
            return $doc_specility_result = array_combine($category_id, $category_name);
        }
    /*******************Category*********************/
         function get_categories()
        {
            $this->db->select('*');
            $this->db->from('tbl_product_category');
            $query = $this->db->get();
            return $query->result();
        }


        function edit_category($category_id) {
            $data = $this->db->get_where('tbl_product_category', array('id' => $category_id))->row();
            return $data;
        }


        function update_category($category_id) {
            $category_update_data = array(
                'category_name' => $this->input->post('category'),
            );
            $this->db->where('id', $category_id);
            $this->db->update('tbl_product_category', $category_update_data);
        }

        function delete_category($category_id)
        {
            $this->db->where('id',$category_id);
            $this->db->delete('tbl_product_category');
        }


        /***************Inventory**************************/
        /**
         * @return mixed
         */
        function get_inventory()
        {
            $this->db->select('*');
            $this->db->from('tbl_inventory');
            $this->db->join('tbl_product','tbl_inventory.product_id = tbl_product.id');
            $query = $this->db->get();
            return $query->result();
        }

        function product_left($product_id)
        {
            $this->db->select('product_id');
            $data =  $this->db->get_where('tbl_inventory',array('product_id' => $product_id))->row();
            return $data;

        }

        /**
         * @return array|bool
         */

        function get_product()
        {
            $this->db->select('id,product_name');
            $this->db->from('tbl_product');
            $this->db->order_by('product_name', 'ASC');
            $query = $this->db->get();
            $result = $query->result();

            //array to store department id & department name
            $product_id = array('-SELECT-');
            $product_name = array('-SELECT PRODUCT-');

            for ($i = 0; $i < count($result); $i++) {
                array_push($product_id, $result[$i]->id);
                array_push($product_name, $result[$i]->product_name);
            }
            return $doc_specility_result = array_combine($product_id, $product_name);
        }




    }
