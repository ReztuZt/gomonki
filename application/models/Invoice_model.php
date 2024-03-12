<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice_model extends CI_Model
{

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function getDataPeserta()
    {
        $query = $this->db->get('tb_invoice');
        return $query->result();
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function get_invoices_by_id_magang($id_magang)
    {
        return $this->db->get_where('tb_invoice', array('id_magang' => $id_magang))->result();
    }

    public function get_invoice_data($id_magang)
    {
        // Query untuk mendapatkan data internship berdasarkan $id_magang
        $query = $this->db->get_where('tb_magang', array('id_magang' => $id_magang));
        return $query->row_array();
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_data($id_magang, $data, $table)
    {
        $this->db->where('id_magang', $id_magang);
        $this->db->update($table, $data);
    }
    
    public function edit_invoice($invoice_id, $data)
    {
        $this->db->where('invoice_id', $invoice_id);
        $this->db->update('tb_invoice', $data);
    }

    public function get_invoice_by_id($invoice_id)
    {
        return $this->db->get_where('tb_invoice', array('invoice_id' => $invoice_id))->row();
    }
}
