<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {
  
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    // Get a single item by ID
    public function get_item($id) {
        $query = $this->db->get_where('items', array('id' => $id));
        return $query->row();
    }
    
    // Update an item
    public function update_item($id, $filename = NULL) {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
        );
        
        // Only update filename if a new one was uploaded
        if($filename) {
            $data['filename'] = $filename;
        }
        
        $this->db->where('id', $id);
        return $this->db->update('items', $data);
    }
}