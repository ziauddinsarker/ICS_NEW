<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Just_post_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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
        $data = array(
            'just_post_title' => $title,
            'just_post_description' => $description
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
        $data = array(
            'just_post_title' => $title,
            'just_post_description' => $description
        );
        $this->db->where('just_id', $id);
        $this->db->update('just_post', $data);
    }

}
