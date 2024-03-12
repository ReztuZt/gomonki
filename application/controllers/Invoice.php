<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model');
        $this->load->model('Peserta_model'); // Memuat model di dalam constructor
        $this->load->model('Program_model'); // Memuat model di dalam constructor
    }

    public function peserta_invoice($id_magang)
    {
        $data['title'] = 'Riwayat Pembayaran';
        $data['peserta'] = $this->Peserta_model->get_peserta_by_id($id_magang);
        $data['invoice'] = $this->Peserta_model->get_invoice_by_id($id_magang);
        $data['invoices'] = $this->Invoice_model->get_invoices_by_id_magang($id_magang);
        // $data['invoices'] = $this->Invoice_model->get_data('tb_invoice')->result();
        $data['id_magang'] = $id_magang; // Meneruskan $id_magang ke view

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('peserta/invoice', $data);
        $this->load->view('templates/footer');
    }



    public function tambah_invoice($id_magang)
    {
        $data['title'] = 'Tambah Invoice';
        $data['peserta'] = $this->Peserta_model->get_peserta_by_id($id_magang);
        $data['programs'] = $this->Program_model->getAllPrograms();

        if (!$data['peserta']) {
            // Handle jika data peserta tidak ditemukan
            // Contoh: redirect ke halaman error atau menampilkan pesan error
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('peserta/tambah_invoice', $data); // Menyertakan data peserta magang ke view
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->form_validation->set_rules('id_magang', 'ID Magang', 'required');
        $this->form_validation->set_rules('magang_nip', 'NIP', 'required');
        $this->form_validation->set_rules('magang_nama', 'Nama', 'required');
        $this->form_validation->set_rules('magang_alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('magang_telp', 'Telepon', 'required');
        $this->form_validation->set_rules('magang_email', 'Email', 'required');
        $this->form_validation->set_rules('program_nama', 'Nama Program', 'required');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman tambah_invoice dengan menampilkan pesan error
            $this->tambah_invoice($this->input->post('id_magang'));
        } else {
            // Jika validasi berhasil, tambahkan data ke database
            $data = array(
                'id_magang'     => $this->input->post('id_magang'),
                'magang_nip'    => $this->input->post('magang_nip'),
                'magang_nama'   => $this->input->post('magang_nama'),
                'magang_alamat' => $this->input->post('magang_alamat'),
                'magang_telp'   => $this->input->post('magang_telp'),
                'magang_email'  => $this->input->post('magang_email'),
                'program_nama'  => $this->input->post('program_nama'),
                'program_harga' => $this->input->post('program_harga'), // Sesuaikan dengan nama input yang digunakan di form HTML
            );

            // Panggil model untuk menyimpan data
            $this->Invoice_model->insert_data($data, 'tb_invoice');

            // Set pesan sukses menggunakan session
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Sukses!</strong> Data berhasil ditambahkan.
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');

            // Redirect ke halaman invoice setelah menambahkan data
            redirect('peserta/invoice/' . $this->input->post('id_magang'));
        }
    }

    public function fungsi_get_data_program()
    {
        $program_nama = $this->input->post('program_nama');
        $data = $this->Program_model->getDataProgram($program_nama);
        echo json_encode($data);
    }
}
