<?php $this->load->view('templates/header'); ?>

<div class="mb-4">
    <h3 class="page-heading mb-1">Dashboard</h3>
    <p class="page-subtitle mb-0">Ringkasan data siswa dan capaian nilai secara keseluruhan</p>
</div>

<!-- Kartu Statistik -->
<div class="row g-3">
    <div class="col-md-4">
        <div class="card stat-card bg-grad-1 shadow-soft h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon"><i class="bi bi-people"></i></div>
                <div>
                    <div class="stat-value"><?= $total_siswa ?></div>
                    <div class="stat-label">Siswa Terdaftar</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card bg-grad-2 shadow-soft h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon"><i class="bi bi-graph-up"></i></div>
                <div>
                    <div class="stat-value"><?= number_format($rata_rata, 1, ',', '.') ?></div>
                    <div class="stat-label">Rata-rata Nilai Sekolah</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card bg-grad-3 shadow-soft h-100">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon"><i class="bi bi-diagram-3"></i></div>
                <div>
                    <div class="stat-value"><?= count($kelas) ?></div>
                    <div class="stat-label">Jumlah Kelas Aktif</div>
                </div>
            </div>
        </div>
    </div>
</div>
<p class="text-muted small mt-2 mb-4">
    <i class="bi bi-info-circle"></i>
    "Rata-rata Nilai Sekolah" dihitung dari <strong>seluruh nilai mata pelajaran</strong> yang sudah diinput untuk semua siswa.
    Angka ini akan berubah setiap kali ada nilai baru yang ditambahkan.
</p>

<div class="row g-3">
    <!-- Grafik distribusi kelas -->
    <div class="col-lg-5">
        <div class="card shadow-soft h-100">
            <div class="card-body">
                <h6 class="fw-bold mb-3"><i class="bi bi-bar-chart"></i> Distribusi Siswa per Kelas</h6>
                <?php if (!empty($kelas)) : ?>
                <canvas id="chartKelas" height="220"></canvas>
                <?php else : ?>
                <div class="empty-state text-center">
                    <i class="bi bi-bar-chart d-block mb-2"></i>
                    Belum ada data untuk ditampilkan.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Siswa berprestasi -->
    <div class="col-lg-7">
        <div class="card shadow-soft h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold mb-0"><i class="bi bi-trophy text-warning"></i> Siswa dengan Nilai Tertinggi</h6>
                    <a href="<?= base_url('siswa') ?>" class="small text-decoration-none">Lihat semua &rarr;</a>
                </div>

                <?php if (!empty($top_siswa)) : ?>
                <div class="list-group list-group-flush">
                    <?php foreach ($top_siswa as $s) : ?>
                    <a href="<?= base_url('siswa/detail/' . $s->id_siswa) ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar-circle"><?= strtoupper(substr($s->nama_siswa, 0, 1)) ?></div>
                            <div>
                                <div class="fw-semibold"><?= $s->nama_siswa ?></div>
                                <div class="small text-muted">Kelas <?= $s->kelas ?></div>
                            </div>
                        </div>
                        <span class="badge badge-nilai-baik">
                            <?= number_format($s->rata_rata, 1, ',', '.') ?>
                        </span>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php else : ?>
                <div class="empty-state text-center py-4">
                    <i class="bi bi-journal-x d-block mb-2"></i>
                    Belum ada nilai yang diinput.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Siswa perlu perhatian -->
<div class="card shadow-soft mt-3">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="fw-bold mb-0"><i class="bi bi-exclamation-triangle text-danger"></i> Siswa Perlu Perhatian (Rata-rata &lt; 75)</h6>
            <a href="<?= base_url('siswa/tambah') ?>" class="btn btn-brand btn-sm">
                <i class="bi bi-person-plus"></i> Tambah Siswa
            </a>
        </div>

        <?php if (!empty($perlu_perhatian)) : ?>
        <div class="table-responsive">
            <table class="table card-table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Rata-rata Nilai</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($perlu_perhatian as $s) : ?>
                    <tr>
                        <td class="fw-semibold"><?= $s->nama_siswa ?></td>
                        <td><?= $s->kelas ?></td>
                        <td><span class="badge badge-nilai-kurang"><?= number_format($s->rata_rata, 1, ',', '.') ?></span></td>
                        <td class="text-end">
                            <a href="<?= base_url('siswa/detail/' . $s->id_siswa) ?>" class="btn btn-sm btn-outline-primary">
                                Lihat Detail <i class="bi bi-arrow-right"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else : ?>
        <div class="empty-state text-center">
            <i class="bi bi-emoji-smile d-block mb-2"></i>
            Semua siswa yang sudah punya nilai berada di atas standar. Mantap!
        </div>
        <?php endif; ?>
    </div>
</div>

<?php if (!empty($kelas)) : ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
    const ctx = document.getElementById('chartKelas');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($kelas as $k) { echo "'" . addslashes($k->kelas) . "',"; } ?>],
            datasets: [{
                label: 'Jumlah Siswa',
                data: [<?php foreach ($kelas as $k) { echo (int) $k->jumlah . ","; } ?>],
                backgroundColor: '#0d6efd',
                borderRadius: 8,
                maxBarThickness: 45
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });
</script>
<?php endif; ?>

<?php $this->load->view('templates/footer'); ?>
