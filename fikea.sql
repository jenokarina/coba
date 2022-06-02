-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2020 pada 14.47
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fikea`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `id_user`, `nama_penerima`, `no_tlp`, `kota`, `kode_pos`, `alamat`) VALUES
(1, 4, 'Muhammad Fiqih', '085155411077', 'Depok', '16452', 'Gg. H. Rasim Rt 05 Rw 005 No. 12 Kel. Cisalak Pasar Kec. CImanggis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `kurir` varchar(255) NOT NULL,
  `harga_ongkos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kurir`, `harga_ongkos`) VALUES
(1, '3 Jam', 30000),
(2, '6 Jam', 20000),
(3, '1 hari', 15000),
(4, '1-2 hari', 13000),
(5, '2-3 hari', 12000),
(6, '3-6 hari', 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_produk`
--

CREATE TABLE `penjualan_produk` (
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan_produk`
--

INSERT INTO `penjualan_produk` (`id_penjualan`, `id_produk`, `id_transaksi`, `jumlah`, `sub_total`) VALUES
(1, 1, 1, 1, 3500000),
(2, 4, 1, 1, 200000);

--
-- Trigger `penjualan_produk`
--
DELIMITER $$
CREATE TRIGGER `pengurangan_stok` AFTER INSERT ON `penjualan_produk` FOR EACH ROW BEGIN
	UPDATE produk SET stok=stok-NEW.jumlah
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `deskripsi`, `foto`, `stok`) VALUES
(1, 'Sofa Master Navy', '3500000', 'Bangku ini sangat estetik bila di taruh di ruang tamu ataupun di ruang keluarga. Warna biru navy', 'unnamed_(1).png', 99),
(2, 'Keranjang Greenpeel', '50000', 'Keranjang serba guna. Murah meriah :)', 'keranjang.png', 496),
(3, 'Kursi Atalaia Pouf', '1000000', 'Bangku estetik murah meriah bund :)', 'kursi.png', 200),
(4, 'Lampu Gantung Murce', '200000', 'Lampu gantung hias estetiknya bund :)', 'lampu.png', 999),
(5, 'Gaston Wall Desk', '1000000', 'Meja sekaligus laci ini dapat di tempel di dinding loh. Jadi dapat menghemat ruangan. Ayo buruan beli keburu kehabisan ', 'meja2.png', 500),
(6, 'Meja Tiga Kaki', '200000', 'Mejanya bund murah meriah :)', 'pngtree-round-table-triangle-table-home-decoration-section-png-picture-material-image_1443286.jpg', 100),
(7, 'Lemari Dua Pintu', '500000', 'Lemari 2 pintunya bund. Murah sekali :)', 'armoire-575821_1280.png', 195),
(8, 'Kursi Raja', '5000000', 'Kursi rajanya bund, biar bisa kayak raja gituu', 'unnamed1.png', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `sub_total` int(255) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_alamat`, `id_ongkir`, `tanggal`, `sub_total`, `total_harga`, `status`) VALUES
(1, 4, 1, 1, '2020-11-24', 3700000, 3730000, 'S');

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `pembayaran` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE user SET saldo=saldo-NEW.total_harga
    WHERE id_user = NEW.id_user;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `saldo` int(100) NOT NULL,
  `akses` enum('user','penjual') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `email`, `saldo`, `akses`) VALUES
(2, 'Pennjual Fiqih', 'mfiqih', '$2y$10$bxhxvVx2ahxsJQnywOAkKeUuFqDtTu6I3lBQcrEimp1NvUI1N0HRu', 'muhammadfiqih610@gmail.com', 0, 'penjual'),
(4, 'Muhammad Fiqih', '_fiqhhh', '$2y$10$AT91ItJhYZqmkmGs2OuwOOm/zpVm3LCnKhVXGY1vShqmy4Irjf/GO', 'muhammadfiqih953@gmail.com', 15408000, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
