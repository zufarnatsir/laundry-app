<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('login');
    }

    public function submit() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->User_model->get_user($username);

            if ($user && password_verify($password, $user['password'])) {
                $this->session->set_userdata('user_id', $user['id']);
                redirect('order');
            } else {
                $data['error'] = "Invalid username or password!";
                $this->load->view('login', $data);
            }
        }
    }
}
?>