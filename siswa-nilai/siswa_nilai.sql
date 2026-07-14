-- =====================================================
-- Database : siswa_nilai
-- Project   : UTS Pemrograman Web III - Manajemen Siswa & Nilai
-- =====================================================

CREATE DATABASE IF NOT EXISTS siswa_nilai;
USE siswa_nilai;

-- Struktur tabel siswa
CREATE TABLE siswa (
  id_siswa INT(11) NOT NULL AUTO_INCREMENT,
  nis VARCHAR(20) NOT NULL,
  nama_siswa VARCHAR(100) NOT NULL,
  jenis_kelamin ENUM('L','P') NOT NULL,
  kelas VARCHAR(20) NOT NULL,
  jurusan VARCHAR(50) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_siswa),
  UNIQUE KEY (nis)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Struktur tabel nilai (berelasi ke siswa)
CREATE TABLE nilai (
  id_nilai INT(11) NOT NULL AUTO_INCREMENT,
  id_siswa INT(11) NOT NULL,
  mata_pelajaran VARCHAR(50) NOT NULL,
  semester VARCHAR(20) NOT NULL,
  nilai DECIMAL(5,2) NOT NULL DEFAULT 0,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_nilai),
  KEY id_siswa (id_siswa),
  CONSTRAINT fk_nilai_siswa FOREIGN KEY (id_siswa) REFERENCES siswa (id_siswa) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data contoh siswa (opsional, boleh dihapus)
INSERT INTO siswa (nis, nama_siswa, jenis_kelamin, kelas, jurusan) VALUES
('2024001', 'Andi Saputra', 'L', 'XII', 'Rekayasa Perangkat Lunak'),
('2024002', 'Bunga Lestari', 'P', 'XII', 'Rekayasa Perangkat Lunak'),
('2024003', 'Citra Ramadhani', 'P', 'XI', 'Teknik Komputer Jaringan');

-- Data contoh nilai (opsional, boleh dihapus)
INSERT INTO nilai (id_siswa, mata_pelajaran, semester, nilai) VALUES
(1, 'Pemrograman Web', 'Ganjil 2025', 88),
(1, 'Basis Data', 'Ganjil 2025', 76),
(2, 'Pemrograman Web', 'Ganjil 2025', 92),
(2, 'Basis Data', 'Ganjil 2025', 85),
(3, 'Jaringan Komputer', 'Ganjil 2025', 65);
