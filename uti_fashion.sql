-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2022 pada 03.27
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uti_fashion`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(125) DEFAULT NULL,
  `username` varchar(125) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(3, 'Intan Nurindahsari', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_pengiriman`
--

CREATE TABLE `alamat_pengiriman` (
  `id_alamat_pengiriman` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_kota` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alamat_pengiriman`
--

INSERT INTO `alamat_pengiriman` (`id_alamat_pengiriman`, `id_pelanggan`, `provinsi`, `kota`, `kode_kota`, `alamat`) VALUES
(7, 5, 'Bangka Belitung', 'Bangka', 27, 'sdasda'),
(8, 5, 'Jawa Barat', 'Kuningan', 211, 'jln ramajaksa rt.07/03 winduherang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(15) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_admin` int(2) NOT NULL DEFAULT 3,
  `nama_barang` varchar(125) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_admin`, `nama_barang`, `deskripsi`, `gambar`, `berat`, `diskon`) VALUES
('UF0C5NT', 1, 3, 'Dress Flower', 'Bahan Woll', 'aw.jpg', 100, 6),
('UF0R3O5', 2, 3, 'Overall Jeans', 'Jeans Blue', 'operall.jpg', 250, 0),
('UF7KRVY', 1, 3, 'kemeja Ungu', 'sdsdsf', 'sdsds.jpg', 100, 0),
('UF81MX6', 1, 3, 'Kemeja Putih', 'asasa', 'kemeja.jpg', 100, 0),
('UFALZQC', 1, 3, 'asasa', 'sdsds', 'download_(1).jpg', 232, 0),
('UFBLYMH', 2, 3, 'Kemeja Laki-Laki', 'Catton ', 'asas.jpg', 150, 5),
('UFGMFWH', 1, 3, 'Coqueta Brown ', 'Cotton', 'Coqueta.jpg', 100, 12),
('UFGVZWG', 1, 3, 'bayi', 'sdsds', 'coton.jpg', 100, 0),
('UFLGNUF', 2, 3, 'Brown Pinguin', 'Cotton', 'ytyt.jpg', 100, 50),
('UFNSR8P', 1, 3, 'Baju', 'sdsds', 'img1.jpg', 100, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chatting`
--

CREATE TABLE `chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `admin_send` varchar(255) DEFAULT NULL,
  `pelanggan_send` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chatting`
--

INSERT INTO `chatting` (`id_chatting`, `id_pelanggan`, `admin_send`, `pelanggan_send`, `time`) VALUES
(1, 7, 'hai pelanggan', '0', '2021-10-05 01:10:48'),
(2, 7, '0', 'hasi admin', '2021-10-05 01:10:48'),
(5, 7, 'ada apa?', '0', '2021-10-05 02:30:16'),
(7, 7, '0', 'mau tanya', '2021-10-05 03:09:43'),
(8, 7, 'boleh kak, tanya apa?', '0', '2021-10-05 03:22:21'),
(11, 8, '0', 'hai', '2021-10-05 03:36:16'),
(12, 8, '0', 'hai tes', '2021-10-05 03:46:12'),
(13, 6, '0', 'hai ini dani', '2021-10-05 03:53:35'),
(14, 7, '0', 'coba coba', '2021-10-05 04:01:41'),
(15, 7, '0', 'coba coba', '2021-10-05 04:02:07'),
(16, 5, '0', 'hgg', '2021-11-10 00:39:20'),
(17, 5, '0', 'jika ada yang ditanyakan o=boleh tida?\r\n', '2021-11-10 00:39:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_detail`, `id_transaksi`, `id_produk`, `jumlah`) VALUES
(1, '20210924RLXEP9GZ', 20, 1),
(3, '20210924UIFFMI4Q', 15, 1),
(4, '20210924UIFFMI4Q', 13, 3),
(5, '20211004BF2PMWSE', 20, 2),
(7, '20211005JMTCOPV9', 17, 3),
(8, '20211005JMTCOPV9', 0, 2),
(9, '20211005ACTLBNVX', 14, 1),
(10, '20211005G3BUDCRL', 20, 3),
(11, '202110057CIHTRPS', 20, 3),
(12, '20211005RPPHEFYV', 20, 5),
(13, '20211005XRYK8L4C', 20, 1),
(14, '20211008FPRBZOKI', 14, 1),
(15, '20211026UVNA34ER', 15, 1),
(16, '20211026UVNA34ER', 13, 1),
(17, '20211101YLGMTNPJ', 13, 1),
(18, '20211102SH4UWKOY', 17, 1),
(19, '202111099KEJFOCI', 15, 3),
(20, '20211111M2BPBYFQ', 15, 1),
(21, '20211111M2BPBYFQ', 13, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pakaian Dewasa'),
(2, 'Celana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `no_tlpn` varchar(13) DEFAULT NULL,
  `jenis_kel` varchar(1) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `username`, `password`, `no_tlpn`, `jenis_kel`, `alamat`) VALUES
(1, 'Upi Mariani', 'username', 'jne', '2147483647', 'P', 'sdasda'),
(2, 'Baju', 'tika', 'tiki', '2147483647', 'P', 'asasasasa'),
(3, 'Upi Mariani', 'upmar', 'pos', '2147483647', 'P', 'ramajaksa'),
(4, 'Upi Mariani', 'upimariani', 'karenadia', '588532', 'P', 'ramajaksa'),
(5, 'Intan edit', 'intan', 'intan', '85156727368', NULL, NULL),
(6, 'Dani', 'dani', 'user', '85156727368', 'L', 'Kuningan'),
(7, 'Muhammad Rizki Nurhamdani edit', 'rizki', 'rizki12345', '85156727368', 'P', 'Ciawigebang'),
(8, 'Salsabila', 'salsa', 'salsabila', '858963258748', 'P', 'Jakarta'),
(9, 'coba', 'username', 'password', '085156727368', 'L', 'coba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_setting`, `lokasi`, `alamat`) VALUES
(1, 211, 'ramajaksa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `size` varchar(15) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `size`
--

INSERT INTO `size` (`id_size`, `id_barang`, `size`, `harga`, `stok`) VALUES
(4, 'UFLGQCV', '45', 50000, 121),
(7, 'UFLGQCV', 'XL', 50000, 100),
(9, 'UFMV6PK', '1212', 12222, 1),
(10, 'UFPOUNH', 'XL', 100000, 121),
(11, 'UFC9ZRQ', 'XL', 50000, 100),
(12, 'UFC9ZRQ', 'L', 10000, 121),
(13, 'UFBLYMH', 'S', 50000, 47),
(14, 'UFBLYMH', 'L', 60000, -1),
(15, 'UF0R3O5', 'L', 150000, 25),
(16, 'UF0R3O5', 'XL', 200000, 15),
(17, 'UFLGNUF', 'L', 120000, 49),
(19, 'UFGMFWH', 'L', 100000, 0),
(20, 'UF0C5NT', 'S', 250000, 0),
(21, 'UF0C5NT', 'L', 250000, 20),
(22, 'UFIPBOW', 'S', 50000, 30),
(23, 'UF81MX6', 'XL', 100000, 100),
(24, 'UF7KRVY', 'XL', 100000, 100),
(25, 'UFKU4ZY', 'XL', 100000, 30),
(26, 'UFNSR8P', 'L', 25000, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `id_pelanggan`, `isi`) VALUES
(1, NULL, 'hai'),
(2, 8, 'juga'),
(3, 8, 'baju nya sangat berkualitas'),
(4, 8, 'recomededdd bangett'),
(5, 8, 'hayuuu'),
(6, 5, 'saya tegas kan bahwa produk yang dijual ahrus berkualitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(30) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_setting` int(1) NOT NULL DEFAULT 1,
  `atas_nama` varchar(125) NOT NULL,
  `bukti_bayar` varchar(50) NOT NULL,
  `status_order` varchar(2) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `expedisi` varchar(30) NOT NULL,
  `paket` varchar(30) NOT NULL,
  `estimasi` varchar(30) NOT NULL,
  `ongkir` varchar(30) NOT NULL,
  `berat` varchar(30) NOT NULL,
  `subtotal` varchar(30) NOT NULL,
  `total_bayar` varchar(30) NOT NULL,
  `tgl_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_resi` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_setting`, `atas_nama`, `bukti_bayar`, `status_order`, `provinsi`, `kota`, `alamat`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `subtotal`, `total_bayar`, `tgl_order`, `no_resi`) VALUES
('20210924RLXEP9GZ', 5, 1, 'Intan Nurindahsari', 'new-php-logo4.png', '3', 'Banten', 'Pandeglang', 'Pandeglang', 'jne', 'OKE', '3-6 Hari', '18000', '350', '450000', '468000', '2021-09-23 23:39:30', '123456789'),
('20210924UIFFMI4Q', 5, 1, 'Ahmad', 'logo12.png', '4', 'Kalimantan Timur', 'Bontang', 'sassas', 'jne', 'OKE', '3-5 Hari', '63000', '700', '292500', '355500', '2021-09-23 23:54:30', '899654711254'),
('20211004BF2PMWSE', 7, 1, 'asa', '0', '4', 'Maluku', 'Buru', 'Kuningan', 'tiki', 'REG', '5 Hari', '163000', '200', '470000', '633000', '2021-10-04 04:16:25', '124'),
('202110057CIHTRPS', 8, 1, 'upi mariani', '0', '0', 'Kalimantan Selatan', 'Banjarbaru', 'asasasasa', 'jne', 'OKE', '3-5 Hari', '45000', '300', '705000', '750000', '2021-10-04 22:34:27', NULL),
('20211005ACTLBNVX', 8, 1, 'ahmad', '0', '0', 'Kalimantan Timur', 'Berau', 'asasasasa', 'jne', 'OKE', '5-7 Hari', '57000', '150', '57000', '114000', '2021-10-04 22:21:50', NULL),
('20211005G3BUDCRL', 8, 1, 'ahmad', '0', '0', 'Kalimantan Timur', 'Bontang', 'asasasasa', 'jne', 'OKE', '3-5 Hari', '63000', '300', '705000', '768000', '2021-10-04 22:31:58', NULL),
('20211005JMTCOPV9', 8, 1, 'Salsa', 'img1151.jpg', '4', 'Bengkulu', 'Bengkulu Tengah', 'Jln.Raya Bengkulu', 'pos', 'Paket Kilat Khusus', '7 HARI Hari', '46000', '600', '294000', '340000', '2021-10-04 22:12:08', '5633321145987'),
('20211005RPPHEFYV', 8, 1, 'ada', '0', '0', 'Kepulauan Riau', 'Bintan', 'asasasasa', 'jne', 'REG', '5-7 Hari', '60000', '500', '1175000', '1235000', '2021-10-04 22:36:16', NULL),
('20211005XRYK8L4C', 8, 1, 'sdhuy', '0', '0', 'Kalimantan Utara', 'Malinau', 'asasasasa', 'jne', 'REG', '3-5 Hari', '84000', '100', '235000', '319000', '2021-10-04 22:40:55', NULL),
('20211008FPRBZOKI', 5, 1, 'ahmad', 'img1101.jpg', '1', 'Banten', 'Lebak', 'asasasasa', 'jne', 'OKE', '3-6 Hari', '18000', '150', '57000', '75000', '2021-10-08 01:36:38', NULL),
('20211026UVNA34ER', 5, 1, 'upi mariani', 'img110.jpg', '4', 'Jambi', 'Muaro Jambi', 'Kuningan', 'jne', 'OKE', '3-6 Hari', '37000', '400', '197500', '234500', '2021-10-25 22:27:05', '778966542'),
('20211101YLGMTNPJ', 5, 1, 'Intan', '0', '0', 'Jambi', 'Muaro Jambi', 'Kuningan', 'tiki', 'REG', '4 Hari', '47000', '150', '47500', '94500', '2021-11-01 12:52:30', NULL),
('20211102SH4UWKOY', 5, 1, 'Intan', '0', '0', 'DI Yogyakarta', 'Gunung Kidul', 'asasasa', 'tiki', 'ECO', '4 Hari', '14000', '100', '60000', '74000', '2021-11-02 01:27:36', NULL),
('202111099KEJFOCI', 5, 1, 'Intan', '0', '0', 'DI Yogyakarta', 'Gunung Kidul', 'asasasa', 'jne', 'OKE', '3-6 Hari', '19000', '750', '450000', '469000', '2021-11-09 22:14:45', NULL),
('20211111M2BPBYFQ', 5, 1, 'Intan edit', '0', '0', 'Jawa Barat', 'Kuningan', 'jln ramajaksa rt.07/03 winduherang', 'jne', 'CTC', '1-2 Hari', '7000', '400', '197500', '204500', '2021-11-11 08:58:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  ADD PRIMARY KEY (`id_alamat_pengiriman`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `alamat_pengiriman`
--
ALTER TABLE `alamat_pengiriman`
  MODIFY `id_alamat_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
