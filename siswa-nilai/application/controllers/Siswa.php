<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_siswa');
        $this->load->model('model_nilai');
        $this->load->library('session');
    }

    // Tampil seluruh data siswa beserta rata-rata nilainya (Read)
    public function index()
    {
        $data['title']  = 'Data Siswa - Manajemen Siswa & Nilai';
        $data['active'] = 'siswa';
        $data['siswa']  = $this->model_siswa->tampil_data();
        $this->load->view('siswa/tampil', $data);
    }

    // Form tambah + proses simpan siswa baru (Create)
    public function tambah()
    {
        if ($this->input->post('submit')) {

            $data = array(
                'nis'           => $this->input->post('nis', TRUE),
                'nama_siswa'    => $this->input->post('nama_siswa', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'kelas'         => $this->input->post('kelas', TRUE),
                'jurusan'       => $this->input->post('jurusan', TRUE),
            );

            $this->model_siswa->tambah_data($data);

            $this->session->set_flashdata('sukses', 'Data siswa baru berhasil ditambahkan.');

            redirect('siswa');

        } else {
            $data['title']  = 'Tambah Siswa - Manajemen Siswa & Nilai';
            $data['active'] = 'tambah';
            $this->load->view('siswa/tambah', $data);
        }
    }

    // Form edit + proses update data siswa (Update)
    public function edit($id = null)
    {
        $siswa = $this->model_siswa->get_by_id($id);

        if ($id === null || $siswa === null) {
            show_404();
            return;
        }

        if ($this->input->post('submit')) {

            $data = array(
                'nis'           => $this->input->post('nis', TRUE),
                'nama_siswa'    => $this->input->post('nama_siswa', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
                'kelas'         => $this->input->post('kelas', TRUE),
                'jurusan'       => $this->input->post('jurusan', TRUE),
            );

            $this->model_siswa->update_data($id, $data);

            $this->session->set_flashdata('sukses', 'Data siswa berhasil diperbarui.');

            redirect('siswa');

        } else {
            $data['title']  = 'Edit Siswa - Manajemen Siswa & Nilai';
            $data['active'] = 'siswa';
            $data['siswa']  = $siswa;
            $this->load->view('siswa/edit', $data);
        }
    }

    // Hapus data siswa (nilai yang terkait ikut terhapus otomatis) (Delete)
    public function hapus($id = null)
    {
        $siswa = $this->model_siswa->get_by_id($id);

        if ($id === null || $siswa === null) {
            show_404();
            return;
        }

        $this->model_siswa->hapus_data($id);

        $this->session->set_flashdata('sukses', 'Data siswa "' . $siswa->nama_siswa . '" berhasil dihapus.');

        redirect('siswa');
    }

    // Halaman detail siswa: profil singkat + daftar nilai yang dimiliki
    public function detail($id = null)
    {
        $siswa = $this->model_siswa->get_by_id($id);

        if ($id === null || $siswa === null) {
            show_404();
            return;
        }

        $data['title']  = 'Detail Siswa - Manajemen Siswa & Nilai';
        $data['active'] = 'siswa';
        $data['siswa']  = $siswa;
        $data['nilai']  = $this->model_nilai->tampil_by_siswa($id);

        $this->load->view('siswa/detail', $data);
    }
}
