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
    
}
