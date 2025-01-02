<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('register');
    }

    public function submit() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');

            if ($this->User_model->register($username, $password, $email)) {
                $data['success'] = "User registered successfully!";
            } else {
                $data['error'] = "User registration failed!";
            }

            $this->load->view('register', $data);
        }
    }
}
?>