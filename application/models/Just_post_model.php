<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Just_post_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


/***************CSV Upload*********************/
    function get_just_post() {
        $query = $this->db->get('just_post');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }


    function insert_csv($data) {
        $this->db->insert('just_post', $data);
    }

/************************************************/


    function get_single_post($url_slug){
        $this->db->select('*');
        $this->db->from('just_post');
        $this->db->where('url_slug', $url_slug);
        $query = $this->db->get();
        return $query->first_row();
    }

    function get_rev_single_post($id){
        $this->db->select('*');
        $this->db->from('rev_just_post');
        $this->db->where('rev_post_id', $id);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            foreach ($result->result() as $data) {
                $result_array[] = $data;
            }
            return $result_array;
        }
    }




    /**
     * @return array
     */
    function view() {

        $result = $this->db->get('just_post');

        if ($result->num_rows() > 0) {
            foreach ($result->result() as $data) {
                $result_array[] = $data;
            }
            return $result_array;
        }
    }


    /**
     * Add Post
     */
    function add() {
        $title = $this->input->post('just_post_title');
        $description = $this->input->post('just_post_description');
        $url_slug = strtolower(url_title($title));
        $data = array(
            'just_post_title' => $title,
            'just_post_description' => $description,
            'url_slug' => $url_slug
        );
        $this->db->insert('just_post', $data);
    }


    /**
     * @param $post_id
     * @return mixed
     */
    function edit($post_id) {
        $data = $this->db->get_where('just_post', array('just_id' => $post_id))->row();
        return $data;
    }

    /**
     * @param $post_id
     */
    function delete($post_id) {
        $this->db->delete('just_post', array('just_id' => $post_id));
        return;
    }


    function update($id) {
        $title = $this->input->post('just_post_title');
        $description = $this->input->post('just_post_description');
        $url_slug = strtolower(url_title($title));
        $data = array(
            'just_post_title' => $title,
            'just_post_description' => $description,
            'url_slug' => $url_slug
        );
        $this->db->where('just_id', $id);
        $this->db->update('just_post', $data);

        $rev_data = array(
            'rev_post_id' => $id,
            'just_post_title' => $title,
            'just_post_description' => $description,
            'url_slug' => $url_slug
        );

        $this->db->insert('rev_just_post', $rev_data);


    }

}
