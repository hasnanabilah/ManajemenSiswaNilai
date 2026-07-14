<?php $this->load->view('templates/header'); ?>

<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
    <div>
        <h3 class="page-heading mb-1">Data Siswa</h3>
        <p class="page-subtitle mb-0">Daftar seluruh siswa beserta rata-rata nilainya</p>
    </div>
    <a href="<?= base_url('siswa/tambah') ?>" class="btn btn-brand">
        <i class="bi bi-person-plus"></i> Tambah Siswa
    </a>
</div>

<div class="card shadow-soft">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table card-table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Nama Siswa</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Rata-rata Nilai</th>
                        <th class="pe-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($siswa as $s) : ?>
                    <?php
                        if ($s->jumlah_nilai == 0) {
                            $badge = 'bg-secondary';
                            $label = 'Belum ada nilai';
                        } elseif ($s->rata_rata >= 85) {
                            $badge = 'badge-nilai-baik';
                            $label = number_format($s->rata_rata, 1, ',', '.');
                        } elseif ($s->rata_rata >= 75) {
                            $badge = 'badge-nilai-cukup';
                            $label = number_format($s->rata_rata, 1, ',', '.');
                        } else {
                            $badge = 'badge-nilai-kurang';
                            $label = number_format($s->rata_rata, 1, ',', '.');
                        }
                    ?>
                    <tr>
                        <td class="ps-4">
                            <a href="<?= base_url('siswa/detail/' . $s->id_siswa) ?>" class="text-decoration-none d-flex align-items-center gap-2">
                                <div class="avatar-circle"><?= strtoupper(substr($s->nama_siswa, 0, 1)) ?></div>
                                <span class="fw-semibold text-dark"><?= $s->nama_siswa ?></span>
                            </a>
                        </td>
                        <td><?= $s->nis ?></td>
                        <td><?= $s->kelas ?></td>
                        <td><span class="badge bg-secondary-subtle text-dark border"><?= $s->jurusan ?></span></td>
                        <td><span class="badge <?= $badge ?>"><?= $label ?></span></td>
                        <td class="pe-4 text-center">
                            <a href="<?= base_url('siswa/detail/' . $s->id_siswa) ?>" class="btn btn-sm btn-outline-secondary" title="Detail Nilai">
                                <i class="bi bi-journal-text"></i>
                            </a>
                            <a href="<?= base_url('siswa/edit/' . $s->id_siswa) ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="<?= base_url('siswa/hapus/' . $s->id_siswa) ?>"
                               class="btn btn-sm btn-outline-danger"
                               title="Hapus"
                               onclick="return confirm('Yakin ingin menghapus data siswa \'<?= $s->nama_siswa ?>\'? Seluruh nilai siswa ini juga akan ikut terhapus.');">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <?php if (empty($siswa)) : ?>
                    <tr>
                        <td colspan="6">
                            <div class="empty-state text-center">
                                <i class="bi bi-people d-block mb-2"></i>
                                Belum ada data siswa.<br>
                                <a href="<?= base_url('siswa/tambah') ?>" class="btn btn-brand btn-sm mt-3">
                                    <i class="bi bi-person-plus"></i> Tambah Siswa Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
