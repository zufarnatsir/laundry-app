<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_services() {
        $query = $this->db->get('services');
        return $query->result_array();
    }

    public function place_order($data) {
        return $this->db->insert('orders', $data);
    }

    public function get_service_by_id($service_id) {
        $this->db->where('id', $service_id);
        $query = $this->db->get('services');
        return $query->row_array();
    }

    public function get_orders() {
        $this->db->select('orders.id, orders.weight, orders.total_price, orders.status, orders.customer_name, orders.customer_phone, services.name AS service_name');
        $this->db->from('orders');
        $this->db->join('services', 'orders.service_id = services.id');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_order_by_id($order_id) {
        $this->db->select('orders.id, orders.weight, orders.total_price, orders.status, orders.customer_name, orders.customer_phone, services.name AS service_name');
        $this->db->from('orders');
        $this->db->join('services', 'orders.service_id = services.id');
        $this->db->where('orders.id', $order_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delete_order($order_id) {
        $this->db->where('id', $order_id);
        return $this->db->delete('orders');
    }

    public function update_order_status($order_id, $status) {
        $this->db->where('id', $order_id);
        return $this->db->update('orders', array('status' => $status));
    }

    public function update_status($order_id, $new_status) {
        $this->db->set('status', $new_status);
        $this->db->where('id', $order_id);
        return $this->db->update('orders');
    }
}
?>