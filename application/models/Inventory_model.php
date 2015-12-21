<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_model extends CI_Model
{
        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
            $this->load->library('fpdf_gen');
        }

    function get_all_products(){
        $this->db->select('tbl_product.id,tbl_product_name.product_name,tbl_product.product_code,tbl_product_color.product_color,tbl_product_fabric.product_fabric_name,tbl_product.product_price,tbl_product_category.product_category_name');
        $this->db->select('tbl_product.id as product_id');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_name','tbl_product.product_name = tbl_product_name.id');
        $this->db->join('tbl_product_color','tbl_product.product_color = tbl_product_color.id');
        $this->db->join('tbl_product_fabric','tbl_product.product_fabric = tbl_product_fabric.id');
        $this->db->join('tbl_product_category','tbl_product.product_category = tbl_product_category.id');
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_p(){
        $this->db->select('tbl_product.id,tbl_product_name.product_name,tbl_product.product_code,tbl_product.product_price');
        $this->db->select('tbl_product.id as product_id');
        $this->db->from('tbl_product');
        $this->db->join('tbl_product_name','tbl_product.product_name = tbl_product_name.id');
        $this->db->join('tbl_product_color','tbl_product.product_color = tbl_product_color.id');
        $this->db->join('tbl_product_fabric','tbl_product.product_fabric = tbl_product_fabric.id');
        $this->db->join('tbl_product_category','tbl_product.product_category = tbl_product_category.id');
        $query = $this->db->get();
        return $query->result();
    }

    /*******************Products*********************/
         function all_products()
        {
            $this->db->select('tbl_product.id as product_id,tbl_product_name.product_name,tbl_product.product_code,tbl_product_color.product_color,tbl_product_fabric.product_fabric_name,tbl_product.product_price,tbl_product_category.product_category_name');
            $this->db->from('tbl_product');
            $this->db->join('tbl_product_name','tbl_product.product_name = tbl_product_name.id');
            $this->db->join('tbl_product_color','tbl_product.product_color = tbl_product_color.id');
            $this->db->join('tbl_product_fabric','tbl_product.product_fabric = tbl_product_fabric.id');
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
                'product_code' => $this->input->post('code'),
                'product_fabric' => $this->input->post('fabric'),
                'product_color' => $this->input->post('color'),
                'product_price' => $this->input->post('price'),
                'product_category' => $this->input->post('category'),
            );

            $this->db->where('id', $product_id);
            $this->db->update('tbl_product', $product_update_data);

        }

        function delete_product($product_id)
        {
            $this->db->where('id',$product_id);
            $this->db->delete('tbl_product');
        }

        /**
         * @return array
         */
        function get_product_name()
        {
            $this->db->select('id,product_name');
            $this->db->from('tbl_product_name');
            $this->db->order_by('product_name', 'ASC');
            $query = $this->db->get();
            $result = $query->result();

            //array to store department id & department name
            $product_name_id = array('');
            $product_name = array('-SELECT-');

            for ($i = 0; $i < count($result); $i++) {
                array_push($product_name_id, $result[$i]->id);
                array_push($product_name, $result[$i]->product_name);
            }
            return $doc_specility_result = array_combine($product_name_id, $product_name);
        }

        /**
         * @return array
         */
        function get_product_code()
        {
            $this->db->select('id,product_code');
            $this->db->from('tbl_product_code');
            $this->db->order_by('product_code', 'ASC');
            $query = $this->db->get();
            $result = $query->result();

            //array to store department id & department name
            $code_id = array('');
            $code_name = array('-SELECT-');

            for ($i = 0; $i < count($result); $i++) {
                array_push($code_id, $result[$i]->id);
                array_push($code_name, $result[$i]->product_code);
            }
            return $doc_specility_result = array_combine($code_id, $code_name);
        }

        /**
         * @return array
         */
        function get_product_color()
        {
            $this->db->select('id,product_color');
            $this->db->from('tbl_product_color');
            $this->db->order_by('product_color', 'ASC');
            $query = $this->db->get();
            $result = $query->result();

            //array to store department id & department name
            $color_id = array('');
            $color_name = array('-SELECT-');

            for ($i = 0; $i < count($result); $i++) {
                array_push($color_id, $result[$i]->id);
                array_push($color_name, $result[$i]->product_color);
            }
            return $doc_specility_result = array_combine($color_id, $color_name);
        }

        function get_product_fabric()
        {
            $this->db->select('id,product_fabric_name');
            $this->db->from('tbl_product_fabric');
            $this->db->order_by('product_fabric_name', 'ASC');
            $query = $this->db->get();
            $result = $query->result();

            //array to store department id & department name
            $fabric_id = array('');
            $fabric_name = array('-SELECT-');

            for ($i = 0; $i < count($result); $i++) {
                array_push($fabric_id, $result[$i]->id);
                array_push($fabric_name, $result[$i]->product_fabric_name);
            }
            return $doc_specility_result = array_combine($fabric_id, $fabric_name);
        }

        function get_product_category()
        {
            $this->db->select('id,product_category_name');
            $this->db->from('tbl_product_category');
            $this->db->order_by('product_category_name', 'ASC');
            $query = $this->db->get();
            $result = $query->result();

            //array to store department id & department name
            $category_id = array('');
            $category_name = array('-SELECT-');

            for ($i = 0; $i < count($result); $i++) {
                array_push($category_id, $result[$i]->id);
                array_push($category_name, $result[$i]->product_category_name);
            }
            return $doc_specility_result = array_combine($category_id, $category_name);
        }
    /*******************Category*********************/
         function get_all_categories()
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
                'product_category_name' => $this->input->post('category'),
            );
            $this->db->where('id', $category_id);
            $this->db->update('tbl_product_category', $category_update_data);
        }

        function delete_category($category_id)
        {
            $this->db->where('id',$category_id);
            $this->db->delete('tbl_product_category');
        }


    /*******************Product Name*********************/
         function get_all_product_name()
        {
            $this->db->select('*');
            $this->db->from('tbl_product_name');
            $query = $this->db->get();
            return $query->result();
        }


        function edit_product_name($product_name_id) {
            $data = $this->db->get_where('tbl_product_name', array('id' => $product_name_id))->row();
            return $data;
        }


        function update_product_name($product_name_id) {
            $category_update_data = array(
                'product_name' => $this->input->post('product-name'),
            );
            $this->db->where('id', $product_name_id);
            $this->db->update('tbl_product_name', $category_update_data);
        }

        function delete_product_name($product_name_id)
        {
            $this->db->where('id',$product_name_id);
            $this->db->delete('tbl_product_name');
        }

    /*******************Product Code*********************/
         function get_all_product_code()
        {
            $this->db->select('*');
            $this->db->from('tbl_product_code');
            $query = $this->db->get();
            return $query->result();
        }


        function edit_product_code($product_code_id) {
            $data = $this->db->get_where('tbl_product_code', array('id' => $product_code_id))->row();
            return $data;
        }


        function update_product_code($product_code_id) {
            $category_update_data = array(
                'product_code' => $this->input->post('product-code'),
            );
            $this->db->where('id', $product_code_id);
            $this->db->update('tbl_product_code', $category_update_data);
        }

        function delete_product_code($product_code_id)
        {
            $this->db->where('id',$product_code_id);
            $this->db->delete('tbl_product_code');
        }

    /*******************Product Color*********************/
         function get_all_product_color()
        {
            $this->db->select('*');
            $this->db->from('tbl_product_color');
            $query = $this->db->get();
            return $query->result();
        }


        function edit_product_color($product_color_id) {
            $data = $this->db->get_where('tbl_product_color', array('id' => $product_color_id))->row();
            return $data;
        }


        function update_product_color($product_color_id) {
            $category_update_data = array(
                'product_color' => $this->input->post('product-color'),
            );
            $this->db->where('id', $product_color_id);
            $this->db->update('tbl_product_color', $category_update_data);
        }

        function delete_product_color($product_color_id)
        {
            $this->db->where('id',$product_color_id);
            $this->db->delete('tbl_product_color');
        }

    /*******************Product Fabric*********************/
         function get_all_product_fabric()
        {
            $this->db->select('*');
            $this->db->from('tbl_product_fabric');
            $query = $this->db->get();
            return $query->result();
        }


        function edit_product_fabric($product_fabric_id) {
            $data = $this->db->get_where('tbl_product_fabric', array('id' => $product_fabric_id))->row();
            return $data;
        }


        function update_product_fabric($product_fabric_id) {
            $category_update_data = array(
                'product_fabric_name' => $this->input->post('product-fabric'),
            );
            $this->db->where('id', $product_fabric_id);
            $this->db->update('tbl_product_fabric', $category_update_data);
        }

        function delete_product_fabric($product_fabric_id)
        {
            $this->db->where('id',$product_fabric_id);
            $this->db->delete('tbl_product_fabric');
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
            $this->db->join('tbl_product_name','tbl_product.product_name = tbl_product_name.id');
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
            $this->db->select('tbl_product.id,tbl_product_name.product_name');
            $this->db->from('tbl_product');
            $this->db->join('tbl_product_name','tbl_product.product_name = tbl_product_name.id');
            $this->db->join('tbl_product_color','tbl_product.product_color = tbl_product_color.id');
            $this->db->join('tbl_product_fabric','tbl_product.product_fabric = tbl_product_fabric.id');
            $this->db->join('tbl_product_category','tbl_product.product_category = tbl_product_category.id');
            $this->db->order_by('product_name', 'ASC');
            $query = $this->db->get();
            $result = $query->result();

            //array to store department id & department name
            $product_id = array('');
            $product_name = array('-SELECT-');

            for ($i = 0; $i < count($result); $i++) {
                array_push($product_id, $result[$i]->id);
                array_push($product_name, $result[$i]->product_name);
            }
            return $doc_specility_result = array_combine($product_id, $product_name);
        }



    }
