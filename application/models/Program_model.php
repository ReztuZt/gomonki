<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program_model extends CI_Model
{

    public function getAllPrograms()
    {
        return $this->db->get('tb_program')->result_array(); // Ambil semua program dari tabel tb_program
    }

    public function getDataProgram($program_nama) {
        $this->db->where('program_nama', $program_nama);
        return $this->db->get('tb_program')->row_array();
    }
    
    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function tambah_program($data)
    {
        // Insert data ke dalam tabel 'tb_program'
        $this->db->insert('tb_program', $data);
    }

    public function edit_program($program_id, $data)
    {
        $this->db->where('program_id', $program_id);
        $this->db->update('tb_program', $data);
    }
    

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getProgramById($program_id)
    {
        // Ambil data program berdasarkan id_program
        $this->db->where('program_id', $program_id);
        return $this->db->get('tb_program')->row_array();
    }
}
