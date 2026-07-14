<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_nilai extends CI_Model
{
    // Ambil semua nilai milik satu siswa, diurutkan dari yang terbaru (untuk halaman detail siswa)
    public function tampil_by_siswa($id_siswa)
    {
        return $this->db
            ->where('id_siswa', $id_siswa)
            ->order_by('created_at', 'DESC')
            ->get('nilai')
            ->result();
    }

    // Ambil satu data nilai berdasarkan id (untuk form edit nilai)
    public function get_by_id($id_nilai)
    {
        return $this->db->get_where('nilai', array('id_nilai' => $id_nilai))->row();
    }

    // Simpan nilai baru untuk seorang siswa (untuk form tambah nilai)
    public function tambah_data($data)
    {
        return $this->db->insert('nilai', $data);
    }

    // Update data nilai berdasarkan id (untuk proses edit nilai)
    public function update_data($id_nilai, $data)
    {
        $this->db->where('id_nilai', $id_nilai);
        return $this->db->update('nilai', $data);
    }

    // Hapus satu data nilai berdasarkan id
    public function hapus_data($id_nilai)
    {
        return $this->db->delete('nilai', array('id_nilai' => $id_nilai));
    }
}
