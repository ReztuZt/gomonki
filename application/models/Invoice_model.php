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
}
