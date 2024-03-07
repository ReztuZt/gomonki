<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model'); // Memuat model di dalam constructor
    }

    public function index()
    {
        $data['title'] = 'Invoice';
        $data['payment'] = $this->Invoice_model->get_data('tb_payment')->result();
        // Memuat view
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/footer');
        $this->load->view('invoice/invoice', $data);
    }

    public function cetak($payment_id)
    {
        // Mendapatkan data invoice dari model
        $invoice_data = $this->Invoice_model->get_invoice_data($payment_id); // Perubahan penamaan model

        // Menyiapkan data untuk ditampilkan di view
        $data['invoice_data'] = $invoice_data;

        // Menampilkan view untuk mencetak invoice
        $this->load->view('payment/invoice_print_view', $data);
    }

    public function generate($peserta_id)
    {
        // Load model invoice
        $this->load->model('Invoice_model');

        // Mendapatkan informasi peserta dari model
        $data['peserta'] = $this->Invoice_model->get_peserta_info($peserta_id);

        // Mendapatkan informasi harga dari model
        $data['harga'] = $this->Invoice_model->get_harga_info($peserta_id);

        // Mendapatkan informasi metode pembayaran dari model
        $data['metode_pembayaran'] = $this->Invoice_model->get_metode_pembayaran_info($peserta_id);

        // Load view invoice dengan data yang telah didapatkan
        $this->load->view('invoice_view', $data);
    }
}
