<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>style.css">
    <script src="<?= base_url('assets/js/') ?>jquery-3.4.1.js"></script>
    <script src="<?= base_url('assets/js/') ?>jquery-3.4.1.min.js"></script>
    <title><?= $title ?></title>
</head>

<body>
    <header class="shadow-navbar">
        <img class="logo" src="<?= base_url('assets/image/') ?>logo.png" alt="logo">
        <div class="search-container">
            <?= form_open_multipart('Home/search') ?>
            <input class="inpsearch" type="text" placeholder="Cari barang..." name="keyword">
            <button class="searchbtn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <nav>
            <ul class="nav-link">
                <li><a class="text-secondary navbar-link" href="<?= base_url('') ?>" <?php if ($this->uri->segment(1) == "") {
                                                                                            echo 'id="active"';
                                                                                        } ?>><i class="fas fa-home"></i> Home</a></li>
                <?php
                if ($this->session->userdata('status') == 'login') : ?>
                    <li><a class="text-secondary navbar-link" href="<?= base_url('Keranjang') ?>" <?php if ($this->uri->segment(1) == "Keranjang") {
                                                                                                        echo 'id="active"';
                                                                                                    } ?>><i class="fas fa-shopping-cart"></i> Keranjang</a></li>
                    <li><a class="text-secondary navbar-link" href="<?= base_url('Status') ?>" <?php if ($this->uri->segment(1) == "Status") {
                                                                                                    echo 'id="active"';
                                                                                                } ?>><i class="fas fa-shopping-bag"></i> Pesanan</a></li>
                    <li><a class="text-secondary navbar-link" href="<?= base_url('Riwayat') ?>" <?php if ($this->uri->segment(1) == "Riwayat") {
                                                                                                    echo 'id="active"';
                                                                                                } ?>><i class="fas fa-history"></i> Riwayat</a></li>
                <?php endif ?>
            </ul>
        </nav>
        <?php
        if ($this->session->userdata('status') == 'login') : ?>
            <div class="nav_right">
                <ul>
                    <li class="nr_li dd_main">
                        <img src="<?= base_url('assets/image/') ?>default.jpg" alt="profile_img" style="border-radius: 20px; border:2px solid grey;">
                        <div class="dd_menu">
                            <div class="dd_right">
                                <ul>
                                    <li><?= $user['nama_lengkap'] ?></li>
                                    <li>Saldo Rp. <?= number_format($user['saldo']) ?></li>
                                    <li><a href="<?= base_url('Login/logout') ?>" onclick="return confirm('Yakin ingin keluar?')"><button class="btn">Logout</button></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        <?php else : ?>
            <a href="<?= base_url('Login') ?>"><button class="btnnav ml-20">Login</button></a>
        <?php endif ?>
    </header>