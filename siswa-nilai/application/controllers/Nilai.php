<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_nilai');
        $this->load->model('model_siswa');
        $this->load->library('session');
    }

    // Form tambah + proses simpan nilai baru untuk seorang siswa (Create)
    public function tambah($id_siswa = null)
    {
        $siswa = $this->model_siswa->get_by_id($id_siswa);

        if ($id_siswa === null || $siswa === null) {
            show_404();
            return;
        }

        if ($this->input->post('submit')) {

            $data = array(
                'id_siswa'       => $id_siswa,
                'mata_pelajaran' => $this->input->post('mata_pelajaran', TRUE),
                'semester'       => $this->input->post('semester', TRUE),
                'nilai'          => $this->input->post('nilai', TRUE),
            );

            $this->model_nilai->tambah_data($data);

            $this->session->set_flashdata('sukses', 'Nilai baru berhasil ditambahkan untuk ' . $siswa->nama_siswa . '.');

            redirect('siswa/detail/' . $id_siswa);

        } else {
            $data['title']  = 'Tambah Nilai - ' . $siswa->nama_siswa;
            $data['active'] = 'siswa';
            $data['siswa']  = $siswa;
            $this->load->view('nilai/tambah', $data);
        }
    }

    // Form edit + proses update nilai (Update)
    public function edit($id_nilai = null)
    {
        $nilai = $this->model_nilai->get_by_id($id_nilai);

        if ($id_nilai === null || $nilai === null) {
            show_404();
            return;
        }

        $siswa = $this->model_siswa->get_by_id($nilai->id_siswa);

        if ($this->input->post('submit')) {

            $data = array(
                'mata_pelajaran' => $this->input->post('mata_pelajaran', TRUE),
                'semester'       => $this->input->post('semester', TRUE),
                'nilai'          => $this->input->post('nilai', TRUE),
            );

            $this->model_nilai->update_data($id_nilai, $data);

            $this->session->set_flashdata('sukses', 'Nilai berhasil diperbarui.');

            redirect('siswa/detail/' . $nilai->id_siswa);

        } else {
            $data['title']  = 'Edit Nilai - ' . $siswa->nama_siswa;
            $data['active'] = 'siswa';
            $data['siswa']  = $siswa;
            $data['nilai']  = $nilai;
            $this->load->view('nilai/edit', $data);
        }
    }

    // Hapus satu data nilai (Delete)
    public function hapus($id_nilai = null)
    {
        $nilai = $this->model_nilai->get_by_id($id_nilai);

        if ($id_nilai === null || $nilai === null) {
            show_404();
            return;
        }

        $id_siswa = $nilai->id_siswa;
        $this->model_nilai->hapus_data($id_nilai);

        $this->session->set_flashdata('sukses', 'Data nilai berhasil dihapus.');

        redirect('siswa/detail/' . $id_siswa);
    }
}
