<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta_model extends CI_Model
{

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function getDataPeserta()
    {
        $query = $this->db->get('tb_magang');
        return $query->result();
    }

    public function getStatusNama()
    {
        $query = $this->db->get('tb_status');
        return $query->result();
    }

    public function getCourseNama()
    {
        $query = $this->db->get('tb_course');
        return $query->result();
    }

    public function getKelasNama()
    {
        $query = $this->db->get('tb_kelas');
        return $query->result();
    }

    public function getInvoiceId()
    {
        $query = $this->db->get('tb_invoice');
        return $query->result();
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($data, $table)
    {
        $this->db->where('id_magang', $data['id_magang']);
        $this->db->update($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_detail($id_magang)
    {
        $this->db->where('id_magang', $id_magang);
        return $this->db->get('tb_magang')->row();
    }

    public function getId($invoice_id)
    {
        $this->db->where('invoice_id', $invoice_id);
        return $this->db->get('tb_invoice')->row();
    }
    // Model Peserta_model.php
    public function get_peserta_by_id($id_magang)
    {
        $this->db->where('id_magang', $id_magang);
        return $this->db->get('tb_magang')->row(); // Mengembalikan satu baris data
    }
    public function get_invoice_by_id2($invoice_id)
    {
        $this->db->where('invoice_id', $invoice_id);
        return $this->db->get('tb_invoice')->row(); // Mengembalikan satu baris data
    }
    public function get_invoice_by_id($id_magang)
    {
        $this->db->where('id_magang', $id_magang);
        return $this->db->get('tb_magang')->row();
    }
    public function get_invoice($id_magang)
    {
        $this->db->where('id_magang', $id_magang);
        return $this->db->get('tb_invoice')->row();
    }
    public function get_invoiceid($invoice_id)
    {
        $this->db->where('invoiceid', $invoice_id);
        return $this->db->get('tb_invoice')->row(); // Mengembalikan satu baris data
    }
}
