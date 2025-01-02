<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Order_model');
        $this->load->library('fpdf');
        
        // Ensure the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index() {
        $data['orders'] = $this->Order_model->get_orders();
        $this->load->view('view_orders', $data);
    }

    public function update_status() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $order_id = $this->input->post('order_id');
            $new_status = 'Done'; // Set the new status to 'Done'

            if ($this->Order_model->update_status($order_id, $new_status)) {
                redirect('orders');
            } else {
                echo "Error updating order status!";
            }
        } else {
            redirect('orders');
        }
    }

    public function delete() {
        $order_id = $this->input->post('order_id');
        $this->Order_model->delete_order($order_id);
        redirect('orders');
    }

    public function generate_invoice() {
        if ($this->input->server('REQUEST_METHOD') == 'POST' && $this->input->post('order_id')) {
            $order_id = $this->input->post('order_id');
            $order = $this->Order_model->get_order_by_id($order_id);

            if ($order) {
                // Generate PDF
                $pdf = new FPDF();
                $pdf->AliasNbPages();
                $pdf->AddPage();
                
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(0, 10, 'SmartWash Invoice', 0, 1, 'C');
                $pdf->Ln(10);

                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(40, 10, 'Service Type:');
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, $order['service_name'], 0, 1);

                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(40, 10, 'Weight (kg):');
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, $order['weight'], 0, 1);

                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(40, 10, 'Total Price (Rp):');
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, $order['total_price'], 0, 1);

                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(40, 10, 'Status:');
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, $order['status'], 0, 1);

                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(40, 10, 'Customer Name:');
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, $order['customer_name'], 0, 1);

                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(40, 10, 'Customer Phone:');
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, $order['customer_phone'], 0, 1);

                $pdf->Output('I', 'invoice.pdf');
                exit();
            } else {
                echo "Order not found.";
            }
        } else {
            echo "Invalid request.";
        }
    }
}
?>