<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice_model extends CI_Model
{

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_invoice_data($payment_id)
    {
        // Di sini Anda dapat mengambil data invoice dari database sesuai kebutuhan
        // Misalnya, informasi pembayaran dan informasi peserta berdasarkan ID pembayaran
        // Contoh sederhana, hanya mengembalikan ID pembayaran
        return $payment_id;
    }
    public function get_peserta_info($peserta_id) {
        // Ambil informasi peserta dari database berdasarkan ID
        $query = $this->db->get_where('peserta', array('id' => $peserta_id));
        return $query->row_array();
    }

    public function get_harga_info($peserta_id) {
        // Ambil informasi harga dari database berdasarkan ID peserta
        // Anda dapat menyesuaikan logika ini sesuai dengan struktur database Anda
        return "Rp100.000"; // Contoh nilai harga statis
    }

    public function get_metode_pembayaran_info($peserta_id) {
        // Ambil informasi metode pembayaran dari database berdasarkan ID peserta
        // Anda dapat menyesuaikan logika ini sesuai dengan struktur database Anda
        return "BCA"; // Contoh nilai metode pembayaran statis
    }
}
