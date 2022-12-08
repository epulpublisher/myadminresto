-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 10:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydbresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `kode_pesanan` varchar(20) NOT NULL,
  `id_member` varchar(12) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `kode_pesanan`, `id_member`, `id_menu`, `nama_menu`, `image`, `harga`, `qty`, `total_harga`) VALUES
(1, 'BSRULTFM', '4', 6, 'Es Teh Manis', 'img1669441519.jpg', 5000, 1, 5000),
(2, 'BSRULTFM', '4', 8, 'Es Jeruk', 'img1669441607.jpg', 5000, 1, 5000),
(3, 'BSRFZCMJ', '2', 11, 'Cumi Goreng Tepung', 'img1669441889.jpg', 19900, 1, 19900),
(4, 'BSRFZCMJ', '2', 8, 'Es Jeruk', 'img1669441607.jpg', 5000, 1, 5000),
(5, 'LPPJKKHHH', '2', 10, 'Capcay', 'img1669441838.jpg', 19900, 2, 79600),
(6, 'BSRGOO1L', '10', 12, 'Nasi Goreng', 'img1669441940.jpg', 13600, 2, 27200),
(7, 'BSRGOO1L', '10', 6, 'Es Teh Manis', 'img1669441519.jpg', 5000, 1, 5000),
(8, 'BSRQKOUM', '4', 5, 'Cah Kangkung', 'img1669440908.jpg', 15000, 3, 45000),
(9, 'BSRIBPJM', '4', 15, 'Sop Ayam', 'img1669442044.jpg', 17000, 1, 17000),
(10, 'BSRIBPJM', '4', 7, 'Teh Manis Anget', 'img1669441545.jpg', 5000, 1, 5000),
(11, 'BSRC1FKG', '13', 8, 'Es Jeruk', 'img1669441607.jpg', 5000, 1, 5000),
(12, 'BSRC1FKG', '13', 7, 'Teh Manis Anget', 'img1669441545.jpg', 5000, 1, 5000),
(13, 'BSRC1FKG', '13', 10, 'Capcay', 'img1669441838.jpg', 19900, 1, 19900),
(14, 'BSRELZBR', '4', 18, 'Apel / 10 gram', 'img1669443182.jpg', 15000, 1, 15000),
(15, 'BSR8PAVU', '4', 14, 'Pakcoy', 'img1669442016.jpg', 17000, 1, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `tgl_keranjang` date NOT NULL DEFAULT current_timestamp(),
  `id_member` varchar(12) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tlp` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(256) NOT NULL,
  `tanggal_daftar` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `tlp`, `email`, `alamat`, `password`, `tanggal_daftar`) VALUES
(1, 'Masngud', '085921100177', 'masngud@gmail.com', 'Bekasi', '$2y$10$f6E4iLxX8S3Tf3Z7m1pazOj0acckQ.UMjboIYxtwSoIC9dmDb8XfC', '2022-11-27'),
(2, 'Edi Rusandi', '082373889216', 'edi@gmail.com', 'Cilincing, Jakarta Utara', '$2y$10$5t1fmv.YyMf0BTg/GnkXz.ItMcZrt5Evq06RVB.u3/xCaMw9cb/1K', '2022-11-27'),
(3, 'Sopyan Ansori', '085373889279', 'sopyan@gmail.com', 'Lumbung, Ciamis', '$2y$10$qnmvMtrhzGcdxnGTsybTaOkZJ5H78xCoxjcHHksoMcfedhtUL0LWS', '2022-11-27'),
(4, 'Ibu Dosen', '085323887613', 'dosen@gmail.com', 'Kramat, Jakarta ', '$2y$10$UpKSbKV2pu1PIJr1dDlSU.BImC46gV01P2sMWQ0l8JlF3Lw96YO5i', '2022-11-27'),
(6, 'rehan', '085921100178', 'mas@gmail.com', 'jakarta', '$2y$10$sSloA9svFbdrQ9T3DCvZQ.Ueamq/7JlvWx6U92dwTecvQuKVOoFpO', '2022-11-27'),
(7, 'Epul Saepuloh', '085323887614', 'epul@gmail.com', 'Kabupaten Ciamis, Jawa Barat', '$2y$10$7tMygkVazg4QeigLgS4cqu3btkieoxK57OmEXPMgJmRGki7ZWCEOK', '2022-11-30'),
(9, 'Unyil', '081227889674', 'unyil@gmail.com', 'Bogor, Jawa Barat', '$2y$10$AFCBxHzCPSimk9Tmf4Icne0LNuOWlv1AAnv/eU8yQ13P6heiO00mC', '2022-11-30'),
(10, 'Pak Dosen', '085323887616', 'dosen2@gmail.com', 'Jakarta', '$2y$10$5/p68Bl5ivVgCOlUJ8EbQOMGWkDuErE2caWAMbj./4PFuQBzdgdY.', '2022-11-30'),
(11, 'cepot', '12345', 'cepot@gmail.com', 'subang', '$2y$10$Z.AWcOAJ0s8GTk/eVAli1uAPmCzCVP8C0DdWxE5wPIFF40M5Viw8i', '2022-11-30'),
(12, 'Upin', '085323887614', 'mail@gmail.com', 'Kabupaten Ciamis, Jawa Barat', '$2y$10$kvB1gZBmxuBk0J4NLHHmYeySp3HpMTaZTt8jdf0Yw8uHIsGcLnSia', '2022-11-30'),
(13, 'Jarjit Singh', '085323887645', 'jarjit@gmail.com', 'Bandung', '$2y$10$gniQ.6XFvjbM.QPzy6gspOi78Ct.HiU2hmJjF9Ys5miJplgfyEL8C', '2022-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(128) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `promo` varchar(10) NOT NULL,
  `harga_promo` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `image` varchar(256) DEFAULT 'book-default-cover.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `kategori`, `harga`, `promo`, `harga_promo`, `status`, `image`) VALUES
(5, 'Cah Kangkung', 'Makanan', 19900, 'Ya', 15000, 'Tersedia', 'img1669440908.jpg'),
(6, 'Es Teh Manis', 'Minuman', 5000, 'Tidak', 0, 'Tersedia', 'img1670489672.jpeg'),
(7, 'Teh Manis Anget', 'Minuman', 5000, 'Tidak', 0, 'Tersedia', 'img1669441545.jpg'),
(8, 'Es Jeruk', 'Minuman', 7000, 'Ya', 5000, 'Tersedia', 'img1669441607.jpg'),
(9, 'Jeruk Anget', 'Minuman', 7000, 'Tidak', 0, 'Tersedia', 'img1669441744.jpg'),
(10, 'Capcay', 'Makanan', 19900, 'Tidak', 0, 'Tersedia', 'img1669441838.jpg'),
(11, 'Cumi Goreng Tepung', 'Makanan', 22500, 'Ya', 19900, 'Tersedia', 'img1669441889.jpg'),
(12, 'Nasi Goreng', 'Makanan', 13600, 'Tidak', 0, 'Tersedia', 'img1669441940.jpg'),
(13, 'Nasi Putih', 'Makanan', 4900, 'Tidak', 0, 'Tersedia', 'img1669441986.jpg'),
(14, 'Pakcoy', 'Makanan', 17000, 'Tidak', 0, 'Tersedia', 'img1669442016.jpg'),
(15, 'Sop Ayam', 'Makanan', 17000, 'Tidak', 0, 'Tersedia', 'img1669442044.jpg'),
(16, 'Udang Goreng Tepung', 'Makanan', 22500, 'Tidak', 0, 'Tersedia', 'img1669442093.jpg'),
(17, 'Anggur / 10 gram', 'Buah-buahan', 20000, 'Ya', 18000, 'Tersedia', 'img1669443160.jpg'),
(18, 'Apel / 10 gram', 'Buah-buahan', 15000, 'Tidak', 0, 'Tersedia', 'img1669443182.jpg'),
(19, 'Buah Naga / 10 gram', 'Buah-buahan', 20000, 'Tidak', 0, 'Tersedia', 'img1669443213.jpg'),
(20, 'Lengkeng / 10 gram', 'Buah-buahan', 10000, 'Tidak', 0, 'Tersedia', 'img1669443242.jpg'),
(21, 'Melon / 10 gram', 'Buah-buahan', 15000, 'Ya', 12000, 'Tersedia', 'img1669443268.jpg'),
(22, 'Semangka / 10 gram', 'Buah-buahan', 15000, 'Ya', 10000, 'Tersedia', 'img1669443314.jpg'),
(29, 'kentang goreng', 'Makanan', 35000, 'Ya', 20000, 'Habis', ''),
(31, 'Rendang', 'Makanan', 35000, 'Ya', 20000, 'Tersedia', NULL),
(33, 'Jujung', 'Makanan', 35000, 'Ya', 2000, 'Tersedia', 'img1670489092.jpg'),
(34, 'Jujung', 'Minuman', 35000, 'Ya', 2000, 'Tersedia', 'img1670489212.jpg'),
(35, 'Ayam Goreng', 'Makanan', 35000, 'Ya', 2000, 'Tersedia', 'img1670489293.jpg'),
(36, 'AYam', 'Makanan', 35000, 'Ya', 2000, 'Tersedia', 'img1670489453.jpg'),
(38, 'AYam', 'Minuman', 35000, 'Ya', 2000, 'Habis', 'img1670489902.jpeg'),
(39, 'lololoh', 'Makanan', 35000, 'Ya', 2000, 'Tersedia', 'img1670489988.jpeg'),
(40, 'iiiii', 'Makanan', 35000, 'Ya', 2000, 'Tersedia', 'img1670490067'),
(41, 'Ayam Gorengrger', 'Minuman', 5000, 'Ya', 2000, 'Tersedia', 'img1670490189.jpeg'),
(42, 'wrwer', 'Makanan', 35000, 'Ya', 2000, 'Tersedia', 'img1670490232.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tgl_pesanan` date NOT NULL DEFAULT current_timestamp(),
  `id_member` varchar(18) DEFAULT NULL,
  `kode_pesanan` varchar(20) DEFAULT NULL,
  `no_va` varchar(128) NOT NULL,
  `nama_member` varchar(255) NOT NULL,
  `tlp` varchar(128) NOT NULL,
  `no_meja` varchar(255) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status_bayar` varchar(255) NOT NULL DEFAULT 'Belum Bayar',
  `status_selesai` varchar(255) NOT NULL DEFAULT 'Belum Selesai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `tgl_pesanan`, `id_member`, `kode_pesanan`, `no_va`, `nama_member`, `tlp`, `no_meja`, `total_bayar`, `status_bayar`, `status_selesai`) VALUES
(1, '2022-11-30', '4', 'BSRULTFM', '698375231004', 'Ibu Dosen', '085323887613', 'A10B', 10000, 'Sudah Bayar', 'Sudah Selesai'),
(2, '2022-11-30', '2', 'BSRFZCMJ', '886332914546', 'Edi Rusandi', '082373889216', 'A10B', 24900, 'Sudah Bayar', 'Sudah Selesai'),
(3, '2022-11-30', '2', 'LPPJKKHHH', '076330221458', 'Edi Rusandi', '082373889216', 'A13B', 79600, 'Belum Bayar', 'Belum Selesai'),
(4, '2022-11-30', '10', 'BSRGOO1L', '140375541096', 'Pak Dosen', '085323887616', 'A10B', 32200, 'Belum Bayar', 'Belum Selesai'),
(5, '2022-11-30', '4', 'BSRQKOUM', '757986108532', 'Ibu Dosen', '085323887613', 'A10B', 45000, 'Belum Bayar', 'Belum Selesai'),
(6, '2022-12-01', '4', 'BSRIBPJM', '990213765513', 'Ibu Dosen', '085323887613', 'A12B', 22000, 'Sudah Bayar', 'Sudah Selesai'),
(7, '2022-12-01', '13', 'BSRC1FKG', '175699230437', 'Jarjit Singh', '085323887645', 'A10B', 29900, 'Belum Bayar', 'Belum Selesai'),
(8, '2022-12-08', '4', 'BSRELZBR', '096874825234', 'Ibu Dosen', '085323887613', 'A10B', 15000, 'Sudah Bayar', 'Sudah Selesai'),
(9, '2022-12-08', '4', 'BSR8PAVU', '081417322783', 'Ibu Dosen', '085323887613', 'A11B', 17000, 'Sudah Bayar', 'Sudah Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` int(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nip`, `email`, `image`, `password`) VALUES
(1, 'Admin', 27112022, 'admin@bsr.com', 'profil1669521197.jpg', '$2y$10$y2dL9PiICAKs.Ig5I2pexeDtB1U.EMY8ZptG7WRBa.qofmFAqSyJO'),
(2, 'Edi Rusandi', 1234567890, 'edirusandi11@gmail.com', 'default.jpg', '$2y$10$8JjPROe64YMpgqaF5CBA6urE1fsi46OjQ6JBFcqz22YW4RqZ9qNAm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
