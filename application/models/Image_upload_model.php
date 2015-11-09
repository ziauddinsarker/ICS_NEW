<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image_upload_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function save($url, $title){
        $this->db->set("image_url",$url);
        $this->db->set("image_title",$title);
        $this->db->insert("image_upload");

        return $this->db->insert_id();
    }


}