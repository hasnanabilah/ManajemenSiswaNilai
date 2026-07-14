<?php $this->load->view('templates/header'); ?>

<div class="mb-4">
    <h3 class="page-heading mb-1">Edit Siswa</h3>
    <p class="page-subtitle mb-0">Perbarui data: <strong><?= $siswa->nama_siswa ?></strong></p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-soft">
            <div class="card-header card-header-grad">
                <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Form Edit Siswa</h5>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= base_url('siswa/edit/' . $siswa->id_siswa) ?>">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="bi bi-hash"></i> NIS</label>
                            <input type="text" name="nis" class="form-control" value="<?= $siswa->nis ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="bi bi-person"></i> Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" value="<?= $siswa->nama_siswa ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="bi bi-gender-ambiguous"></i> Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="L" <?= ($siswa->jenis_kelamin == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="P" <?= ($siswa->jenis_kelamin == 'P') ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="bi bi-door-open"></i> Kelas</label>
                            <input type="text" name="kelas" class="form-control" value="<?= $siswa->kelas ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="bi bi-mortarboard"></i> Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" value="<?= $siswa->jurusan ?>" required>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-2">
                        <button type="submit" name="submit" value="1" class="btn btn-brand px-4">
                            <i class="bi bi-check-circle"></i> Simpan Perubahan
                        </button>
                        <a href="<?= base_url('siswa') ?>" class="btn btn-outline-secondary px-4">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
