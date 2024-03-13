<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Program_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['title'] = 'Data Program';
        $data['program'] = $this->Program_model->get_data('tb_program')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('program/program', $data); // Pass $data to the 'course' view
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        // Validasi form
        $this->form_validation->set_rules('program_nama', 'Nama Program', 'required');
        $this->form_validation->set_rules('program_harga', 'Harga Program', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form tambah program dengan pesan error
            $this->load->view('program/program');
        } else {
            // Jika validasi berhasil, ambil data dari form
            $data = array(
                'program_nama' => $this->input->post('program_nama'),
                'program_harga' => $this->input->post('program_harga')
            );

            // Simpan data ke dalam database menggunakan model
            $this->Program_model->tambah_program($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Data berhasil ditambah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');


            // Redirect ke halaman program setelah data berhasil disimpan
            redirect('program');
        }
    }

    public function delete($id)
    {
        $where = array('program_id' => $id);

        $this->Program_model->delete($where, 'tb_program');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Data berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect('program');
    }

    public function edit_aksi($program_id)
    {
        // Validasi form
        $this->form_validation->set_rules('program_nama', 'Nama Program', 'required');
        $this->form_validation->set_rules('program_harga', 'Harga Program', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form edit program dengan pesan error
            $this->load->view('program/program');
        } else {
            // Jika validasi berhasil, ambil data dari form
            $data = array(
                'program_nama' => $this->input->post('program_nama'),
                'program_harga' => $this->input->post('program_harga')
            );

            // Simpan perubahan data ke dalam database menggunakan model
            $this->Program_model->edit_program($program_id, $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Data berhasil diubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');

            // Redirect ke halaman program setelah data berhasil disimpan
            redirect('program');
        }
    }
}
