<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Order_model');
        
        // Ensure the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index() {
        $data['services'] = $this->Order_model->get_services();
        $this->load->view('order', $data);
    }

    public function place_order() {
        $this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'required');
        $this->form_validation->set_rules('service_id', 'Service Type', 'required');
        $this->form_validation->set_rules('weight', 'Weight', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['services'] = $this->Order_model->get_services();
            $this->load->view('order', $data);
        } else {
            $service_id = $this->input->post('service_id');
            $service = $this->Order_model->get_service_by_id($service_id);
            if ($service) {
                $user_id = $this->session->userdata('user_id');
                $weight = $this->input->post('weight');
                $total_price = $weight * $service['price_per_kg'];

                $order_data = array(
                    'user_id' => $user_id,
                    'service_id' => $service_id,
                    'weight' => $weight,
                    'total_price' => $total_price,
                    'status' => 'Pending',
                    'customer_name' => $this->input->post('customer_name'),
                    'customer_phone' => $this->input->post('customer_phone')
                );

                if ($this->Order_model->place_order($order_data)) {
                    $data['success'] = "Order placed successfully!";
                } else {
                    $data['error'] = "Error placing order!";
                }
                $data['services'] = $this->Order_model->get_services();
                $this->load->view('order', $data);
            } else {
                $data['error'] = "Invalid service selected!";
                $data['services'] = $this->Order_model->get_services();
                $this->load->view('order', $data);
            }
        }
    }
}
?>