<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');  // Muat URL helper
    }

    public function index() {
        // Load the view
        $this->load->view('welcome_message');
    }
}
