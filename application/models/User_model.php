<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function register($username, $password, $email) {
        $data = array(
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'email' => $email
        );

        return $this->db->insert('users', $data);
    }

    public function get_user($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row_array();
    }
}
?>