<?php $this->load->view('templates/header'); ?>

<div class="mb-4">
    <h3 class="page-heading mb-1">Tambah Siswa</h3>
    <p class="page-subtitle mb-0">Daftarkan siswa baru ke dalam sistem</p>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-soft">
            <div class="card-header card-header-grad">
                <h5 class="mb-0"><i class="bi bi-person-plus"></i> Form Tambah Siswa</h5>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= base_url('siswa/tambah') ?>">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="bi bi-hash"></i> NIS</label>
                            <input type="text" name="nis" class="form-control" placeholder="Contoh: 2024004" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label"><i class="bi bi-person"></i> Nama Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control" placeholder="Contoh: Dewi Anggraini" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="bi bi-gender-ambiguous"></i> Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="">-- Pilih --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="bi bi-door-open"></i> Kelas</label>
                            <input type="text" name="kelas" class="form-control" placeholder="Contoh: XII" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><i class="bi bi-mortarboard"></i> Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-2">
                        <button type="submit" name="submit" value="1" class="btn btn-brand px-4">
                            <i class="bi bi-check-circle"></i> Simpan
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
