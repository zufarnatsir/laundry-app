<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderMenu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        $this->load->model('OrderMenu_model');
        
        // Ensure the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index() {
        $data['services'] = $this->OrderMenu_model->get_all_services();
        $this->load->view('order_menu', $data);
    }

    public function add() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $name = $this->input->post('name');
            $price_per_kg = $this->input->post('price_per_kg');

            $this->OrderMenu_model->add_service($name, $price_per_kg);
            redirect('OrderMenu');
        }
    }

    public function edit($id) {
        $data['service'] = $this->OrderMenu_model->get_service($id);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $name = $this->input->post('name');
            $price_per_kg = $this->input->post('price_per_kg');

            $this->OrderMenu_model->update_service($id, $name, $price_per_kg);
            redirect('OrderMenu');
        }

        $this->load->view('edit_order_menu', $data);
    }

    public function delete($id) {
        $this->OrderMenu_model->delete_service($id);
        redirect('OrderMenu');
    }
}
