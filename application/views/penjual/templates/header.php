<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>style.css">
    <title><?= $title ?></title>
    <style>
        #show {
            display: none;
        }
    </style>
</head>

<body>
    <div class="sidenav shadow-sidebar">
        <img src="<?= base_url('assets/image/') ?>logo.png" alt="" class="logo ml-20 mb-20">
        <p class="text-bld" style="padding-left: 15px;"><?= $user['nama_lengkap'] ?></p>
        <div class="side-link" <?php if ($this->uri->segment(1) == "Penjual") {
                                    echo 'id="active-dash"';
                                } ?>>
            <a class="text-def" href="<?= base_url('Penjual') ?>">Dashboard</a>
        </div>
        <div class="side-link" <?php if ($this->uri->segment(1) == "Produk") {
                                    echo 'id="active-dash"';
                                } ?>>
            <a class="text-def" href="<?= base_url('Produk') ?>">Produk</a>
        </div>
        <a class="text-def text-bld" disabled>Penjualan</a>
        <hr style="width: 200px;">
        <div class="side-link" <?php if ($this->uri->segment(1) == "Semuapesanan") {
                                    echo 'id="active-dash"';
                                } ?>>
            <a class="text-def" href="<?= base_url('Semuapesanan') ?>">Semua Pesanan</a>
        </div>
        <div class="side-link" <?php if ($this->uri->segment(1) == "Pesananbaru") {
                                    echo 'id="active-dash"';
                                } ?>>
            <a class="text-def" href="<?= base_url('Pesananbaru') ?>">Pesanan Baru</a>
        </div>
        <div class="side-link" <?php if ($this->uri->segment(1) == "Siapdikirim") {
                                    echo 'id="active-dash"';
                                } ?>>
            <a class="text-def" href="<?= base_url('Siapdikirim') ?>">Siap Dikirim</a>
        </div>
        <div class="side-link" <?php if ($this->uri->segment(1) == "Dalampengiriman") {
                                    echo 'id="active-dash"';
                                } ?>>
            <a class="text-def" href="<?= base_url('Dalampengiriman') ?>">Dalam Pengiriman</a>
        </div>
        <div class="side-link" <?php if ($this->uri->segment(1) == "Pesananselesai") {
                                    echo 'id="active-dash"';
                                } ?>>
            <a class="text-def" href="<?= base_url('Pesananselesai') ?>">Pesanan Selesai</a>
        </div>
        <br>
        <br>
        <hr style="width: 200px;">
        <div class="side-link">
            <a class="text-def" href="<?= base_url('Login/logout') ?>" onclick="return confirm('Yakin ingin keluar?')">Logout <i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>