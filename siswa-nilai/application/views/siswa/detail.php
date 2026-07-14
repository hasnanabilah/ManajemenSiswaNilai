<?php $this->load->view('templates/header'); ?>

<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
    <div>
        <a href="<?= base_url('siswa') ?>" class="text-decoration-none small text-muted"><i class="bi bi-arrow-left"></i> Kembali ke Data Siswa</a>
        <h3 class="page-heading mb-1 mt-1">Detail Siswa</h3>
    </div>
    <a href="<?= base_url('nilai/tambah/' . $siswa->id_siswa) ?>" class="btn btn-brand">
        <i class="bi bi-plus-circle"></i> Tambah Nilai
    </a>
</div>

<!-- Profil siswa -->
<div class="card shadow-soft mb-3">
    <div class="card-body d-flex align-items-center gap-3">
        <div class="avatar-circle" style="width:64px;height:64px;font-size:1.5rem;"><?= strtoupper(substr($siswa->nama_siswa, 0, 1)) ?></div>
        <div>
            <h5 class="mb-1 fw-bold"><?= $siswa->nama_siswa ?></h5>
            <div class="text-muted small">
                NIS <?= $siswa->nis ?> &bull;
                Kelas <?= $siswa->kelas ?> &bull;
                <?= $siswa->jurusan ?> &bull;
                <?= $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?>
            </div>
        </div>
    </div>
</div>

<!-- Daftar nilai -->
<div class="card shadow-soft">
    <div class="card-body p-0">
        <div class="d-flex justify-content-between align-items-center p-3">
            <h6 class="fw-bold mb-0"><i class="bi bi-journal-text"></i> Riwayat Nilai</h6>
        </div>
        <div class="table-responsive">
            <table class="table card-table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Mata Pelajaran</th>
                        <th>Semester</th>
                        <th>Nilai</th>
                        <th class="pe-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($nilai as $n) : ?>
                    <?php
                        if ($n->nilai >= 85) {
                            $badge = 'badge-nilai-baik';
                        } elseif ($n->nilai >= 75) {
                            $badge = 'badge-nilai-cukup';
                        } else {
                            $badge = 'badge-nilai-kurang';
                        }
                    ?>
                    <tr>
                        <td class="ps-4 fw-semibold"><?= $n->mata_pelajaran ?></td>
                        <td><?= $n->semester ?></td>
                        <td><span class="badge <?= $badge ?>"><?= number_format($n->nilai, 1, ',', '.') ?></span></td>
                        <td class="pe-4 text-center">
                            <a href="<?= base_url('nilai/edit/' . $n->id_nilai) ?>" class="btn btn-sm btn-outline-primary" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="<?= base_url('nilai/hapus/' . $n->id_nilai) ?>"
                               class="btn btn-sm btn-outline-danger"
                               title="Hapus"
                               onclick="return confirm('Yakin ingin menghapus nilai \'<?= $n->mata_pelajaran ?>\' ini?');">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <?php if (empty($nilai)) : ?>
                    <tr>
                        <td colspan="4">
                            <div class="empty-state text-center">
                                <i class="bi bi-journal-x d-block mb-2"></i>
                                Belum ada nilai untuk siswa ini.<br>
                                <a href="<?= base_url('nilai/tambah/' . $siswa->id_siswa) ?>" class="btn btn-brand btn-sm mt-3">
                                    <i class="bi bi-plus-circle"></i> Tambah Nilai Pertama
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
