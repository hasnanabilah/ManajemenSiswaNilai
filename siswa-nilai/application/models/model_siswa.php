<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siswa extends CI_Model
{
    // Hitung total seluruh siswa (untuk dashboard)
    public function hitung_total()
    {
        return $this->db->count_all('siswa');
    }

    // Ambil semua data siswa beserta rata-rata nilainya (untuk halaman tampil data)
    public function tampil_data()
    {
        return $this->db
            ->select('siswa.*, AVG(nilai.nilai) AS rata_rata, COUNT(nilai.id_nilai) AS jumlah_nilai')
            ->from('siswa')
            ->join('nilai', 'nilai.id_siswa = siswa.id_siswa', 'left')
            ->group_by('siswa.id_siswa')
            ->order_by('siswa.nama_siswa', 'ASC')
            ->get()
            ->result();
    }

    // Simpan data siswa baru (untuk form tambah)
    public function tambah_data($data)
    {
        return $this->db->insert('siswa', $data);
    }

    // Ambil satu data siswa berdasarkan id (untuk form edit / detail)
    public function get_by_id($id)
    {
        return $this->db->get_where('siswa', array('id_siswa' => $id))->row();
    }

    // Update data siswa berdasarkan id (untuk proses edit)
    public function update_data($id, $data)
    {
        $this->db->where('id_siswa', $id);
        return $this->db->update('siswa', $data);
    }

    // Hapus data siswa berdasarkan id (nilai ikut terhapus otomatis via ON DELETE CASCADE)
    public function hapus_data($id)
    {
        return $this->db->delete('siswa', array('id_siswa' => $id));
    }

    // Jumlah siswa per kelas (untuk grafik distribusi kelas di dashboard)
    public function kelas_summary()
    {
        return $this->db
            ->select('kelas, COUNT(*) AS jumlah')
            ->group_by('kelas')
            ->order_by('kelas', 'ASC')
            ->get('siswa')
            ->result();
    }

    // Rata-rata nilai seluruh siswa (untuk dashboard)
    public function rata_rata_keseluruhan()
    {
        $query = $this->db->select_avg('nilai')->get('nilai');
        $row = $query->row();
        return $row->nilai ? (float) $row->nilai : 0;
    }

    // Ranking siswa dengan rata-rata nilai tertinggi (untuk dashboard)
    public function top_siswa($limit = 5)
    {
        return $this->db
            ->select('siswa.id_siswa, siswa.nama_siswa, siswa.kelas, AVG(nilai.nilai) AS rata_rata')
            ->from('siswa')
            ->join('nilai', 'nilai.id_siswa = siswa.id_siswa', 'inner')
            ->group_by('siswa.id_siswa')
            ->order_by('rata_rata', 'DESC')
            ->limit($limit)
            ->get()
            ->result();
    }

    // Siswa yang perlu perhatian karena rata-rata nilainya rendah (untuk dashboard)
    public function siswa_perlu_perhatian($ambang_batas = 75, $limit = 5)
    {
        return $this->db
            ->select('siswa.id_siswa, siswa.nama_siswa, siswa.kelas, AVG(nilai.nilai) AS rata_rata')
            ->from('siswa')
            ->join('nilai', 'nilai.id_siswa = siswa.id_siswa', 'inner')
            ->group_by('siswa.id_siswa')
            ->having('rata_rata <', $ambang_batas)
            ->order_by('rata_rata', 'ASC')
            ->limit($limit)
            ->get()
            ->result();
    }
}
