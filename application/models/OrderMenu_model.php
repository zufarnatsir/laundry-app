<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderMenu_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_all_services() {
        $query = $this->db->get('services');
        return $query->result_array();
    }

    public function add_service($name, $price_per_kg) {
        $data = [
            'name' => $name,
            'price_per_kg' => $price_per_kg
        ];
        return $this->db->insert('services', $data);
    }

    public function get_service($id) {
        $query = $this->db->get_where('services', ['id' => $id]);
        return $query->row_array();
    }

    public function update_service($id, $name, $price_per_kg) {
        $data = [
            'name' => $name,
            'price_per_kg' => $price_per_kg
        ];
        $this->db->where('id', $id);
        return $this->db->update('services', $data);
    }

    public function delete_service($id) {
        $this->db->where('id', $id);
        return $this->db->delete('services');
    }
}
