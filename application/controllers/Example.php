<?php
class Example extends CI_Controller {
    public function index() {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM some_table");
        $data['results'] = $query->result();

        $this->load->view('example_view', $data);
    }
}
?>
