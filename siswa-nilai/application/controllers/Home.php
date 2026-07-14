<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_siswa');
    }

    public function index()
    {
        // Ambil data ringkasan untuk ditampilkan di dashboard
        $data['title']            = 'Dashboard - Manajemen Siswa & Nilai';
        $data['active']           = 'dashboard';
        $data['total_siswa']      = $this->model_siswa->hitung_total();
        $data['rata_rata']        = $this->model_siswa->rata_rata_keseluruhan();
        $data['kelas']            = $this->model_siswa->kelas_summary();
        $data['top_siswa']        = $this->model_siswa->top_siswa(5);
        $data['perlu_perhatian']  = $this->model_siswa->siswa_perlu_perhatian(75, 5);

        // Kirim data ke view dashboard
        $this->load->view('dashboard', $data);
    }
}
