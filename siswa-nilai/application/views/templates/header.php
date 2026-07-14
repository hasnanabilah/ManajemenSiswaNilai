<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($title) ? $title : 'Manajemen Siswa & Nilai' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-brand-custom shadow-soft">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="<?= base_url() ?>">
            <i class="bi bi-mortarboard-fill"></i> Manajemen Siswa & Nilai
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <div class="navbar-nav ms-auto">
                <a class="nav-link <?= (isset($active) && $active == 'dashboard') ? 'active' : '' ?>" href="<?= base_url('home') ?>">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
                <a class="nav-link <?= (isset($active) && $active == 'siswa') ? 'active' : '' ?>" href="<?= base_url('siswa') ?>">
                    <i class="bi bi-people"></i> Data Siswa
                </a>
                <a class="nav-link <?= (isset($active) && $active == 'tambah') ? 'active' : '' ?>" href="<?= base_url('siswa/tambah') ?>">
                    <i class="bi bi-person-plus"></i> Tambah Siswa
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-4 mb-5">
    <?php if ($this->session->flashdata('sukses')) : ?>
    <div class="alert alert-success alert-dismissible fade show shadow-soft" role="alert">
        <i class="bi bi-check-circle-fill"></i> <?= $this->session->flashdata('sukses') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>
