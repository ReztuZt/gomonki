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
    // Model Peserta_model.php
    public function get_peserta_by_id($id_magang)
    {
        $this->db->where('id_magang', $id_magang);
        return $this->db->get('tb_magang')->row();
    }
    public function get_invoice_by_id($id_magang)
    {
        $this->db->where('id_magang', $id_magang);
        return $this->db->get('tb_magang')->row();
    }

    public function get_peserta_pdf($id_magang)
    {
        $this->db->where('id_magang', $id_magang);
        return $this->db->get('tb_magang')->row();
    }

    // Peserta_model.php

    public function update_bulan($id_magang, $bulan)
    {
        // Perbarui nilai kolom bulan dalam database berdasarkan id_magang
        $data = array(
            'bulan' => $bulan
        );
        $this->db->where('id_magang', $id_magang);
        $this->db->update('tb_magang', $data); // Ganti 'nama_tabel' dengan nama tabel yang sesuai
    }

    // Metode lain dalam model
    // ...
    function get_nama_bulan($bulan)
    {
        $nama_bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];

        return $nama_bulan[$bulan];
    }
}
