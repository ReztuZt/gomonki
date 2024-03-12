<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_model extends CI_Model
{

    public function get_invoice_history($id_magang)
    {
        // Ambil riwayat invoice berdasarkan id_magang
        $this->db->where('id_magang', $id_magang);
        $this->db->order_by('bulan', 'asc'); // Urutkan berdasarkan bulan_pembayaran secara menaik
        return $this->db->get('riwayat_invoice')->result();
    }
}
