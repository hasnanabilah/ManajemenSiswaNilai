<?php $this->load->view('templates/header'); ?>

<div class="mb-4">
    <a href="<?= base_url('siswa/detail/' . $siswa->id_siswa) ?>" class="text-decoration-none small text-muted"><i class="bi bi-arrow-left"></i> Kembali ke Detail Siswa</a>
    <h3 class="page-heading mb-1 mt-1">Edit Nilai</h3>
    <p class="page-subtitle mb-0">Untuk siswa: <strong><?= $siswa->nama_siswa ?></strong> (Kelas <?= $siswa->kelas ?>)</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-soft">
            <div class="card-header card-header-grad">
                <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Form Edit Nilai</h5>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= base_url('nilai/edit/' . $nilai->id_nilai) ?>">

                    <div class="mb-3">
                        <label class="form-label"><i class="bi bi-book"></i> Mata Pelajaran</label>
                        <input type="text" name="mata_pelajaran" class="form-control" value="<?= $nilai->mata_pelajaran ?>" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="bi bi-calendar3"></i> Semester</label>
                            <input type="text" name="semester" class="form-control" value="<?= $nilai->semester ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="bi bi-123"></i> Nilai</label>
                            <input type="number" step="0.01" name="nilai" class="form-control" min="0" max="100" value="<?= $nilai->nilai ?>" required>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-2">
                        <button type="submit" name="submit" value="1" class="btn btn-brand px-4">
                            <i class="bi bi-check-circle"></i> Simpan Perubahan
                        </button>
                        <a href="<?= base_url('siswa/detail/' . $siswa->id_siswa) ?>" class="btn btn-outline-secondary px-4">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
