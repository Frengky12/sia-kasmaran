-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 04:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia-kasmaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(10000) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `createdAt` datetime NOT NULL,
  `createdBy` int(11) NOT NULL,
  `deletedAt` datetime DEFAULT NULL,
  `deletedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `judul`, `isi`, `picture`, `createdAt`, `createdBy`, `deletedAt`, `deletedBy`) VALUES
(1, 'LOREM IPSUM DOLOR', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'picture.png', '2024-04-11 06:58:58', 1, NULL, NULL),
(2, 'INI BERITA 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'picture.png', '2024-04-11 06:58:58', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` bigint(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `wa` varchar(15) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `ig` varchar(100) NOT NULL,
  `map` varchar(500) NOT NULL,
  `updatedBy` bigint(10) NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `email`, `wa`, `alamat`, `fb`, `ig`, `map`, `updatedBy`, `updatedAt`) VALUES
(1, 'frengkysky645@gmail.com', '081258401008', 'Dsn Kasmaran Dumah Ayang                                                ', 'https://www.facebook.com/Frengky Saziero', 'https://www.instagram.com/anggrainiagustin_/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.1870158711417!2d103.65662508462088!3d-2.7609259318210864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3a9922febc49bf%3A0x14de773a4dada738!2sKantor%20Kades%20KASMARAN!5e0!3m2!1sid!2sid!4v1717418666019!5m2!1sid!2sid', 1, '2024-04-11 12:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `ms_surat`
--

CREATE TABLE `ms_surat` (
  `id` int(11) NOT NULL,
  `nama_surat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ms_surat`
--

INSERT INTO `ms_surat` (`id`, `nama_surat`) VALUES
(1, 'Surat Keterangan Tidak Mampu'),
(2, 'Surat Keterangan Berdomisili'),
(3, 'Surat Keterangan Usaha'),
(4, 'Surat Keterangan Kematian'),
(5, 'Surat Pengantar Nikah');

-- --------------------------------------------------------

--
-- Table structure for table `sejarah`
--

CREATE TABLE `sejarah` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `picture` varchar(100) NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedBy` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sejarah`
--

INSERT INTO `sejarah` (`id`, `judul`, `isi`, `picture`, `updatedAt`, `updatedBy`) VALUES
(1, 'INI JUDUL SEJARAH', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', 'poltek.jpg', '2024-06-03 19:48:56', '1');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `jenKel` varchar(2) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `keperluan_surat` varchar(200) DEFAULT NULL,
  `nama_usaha` varchar(100) DEFAULT NULL,
  `alamat_usaha` varchar(200) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `penyebab_kematian` varchar(150) DEFAULT NULL,
  `tanggal_kematian` varchar(20) DEFAULT NULL,
  `lokasi_kematian` varchar(200) DEFAULT NULL,
  `nama_ortu_lk` varchar(100) DEFAULT NULL,
  `nama_ortu_pr` varchar(100) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `validatedAt` datetime DEFAULT NULL,
  `validatedBy` int(11) DEFAULT NULL,
  `approvedAt` datetime DEFAULT NULL,
  `approvedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `id_jenis`, `nama`, `email`, `file`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `agama`, `jenKel`, `alamat`, `keperluan_surat`, `nama_usaha`, `alamat_usaha`, `status`, `penyebab_kematian`, `tanggal_kematian`, `lokasi_kematian`, `nama_ortu_lk`, `nama_ortu_pr`, `createdAt`, `validatedAt`, `validatedBy`, `approvedAt`, `approvedBy`) VALUES
(1, 1, 'Frengky', 'frengkysky645@gmail.com', 'sktm-6661d43031fa0.pdf', '1212', 'Rantau Panjang', '2024-06-06', '1212', '1212', 'L', 'asda', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '2024-06-06 22:22:24', NULL, NULL, NULL, NULL),
(2, 2, 'Frengky 2', 'frengkysky645@gmail.com', 'skd-66630d4c361a4.pdf', '1212', 'Rantau Panjang', '2024-06-07', 'asdasd', 'Islam', 'P', 'Rantau Panjang', NULL, NULL, NULL, 'BN', NULL, NULL, NULL, NULL, NULL, '2024-06-07 20:38:20', NULL, NULL, NULL, NULL),
(3, 3, 'Frengky 3', 'frengkysky645@gmail.com', 'sku-66631080efa7a.png', '1212', 'Rantau Panjang', '2024-06-07', 'asdasd', 'Islam', 'L', 'Kasmaran', 'Minjam Bank', 'Cucian Uang', 'Rantau Panjang', 'N', NULL, NULL, NULL, NULL, NULL, '2024-06-07 20:52:00', NULL, NULL, NULL, NULL),
(4, 4, 'Sifulani', 'Kona@gmail.com', 'skk-6663131066a8f.png', '1212', 'Talang', '2024-06-07', 'Petani', 'Islam', 'P', 'Talang', NULL, NULL, NULL, 'N', '', '2024-06-07T21:02', 'Talang ubi', NULL, NULL, '2024-06-07 21:02:56', NULL, NULL, NULL, NULL),
(5, 5, 'Frengky 5', 'frengkysky645@gmail.com', 'spn-666315ea6d42f.pdf', '081258401008', 'Rantau Panjang', '2024-06-07', 'Web Developer', 'Islam', 'L', 'Rantau Panjang', NULL, NULL, NULL, 'BN', NULL, NULL, NULL, 'Saian', 'Huzami', '2024-06-07 21:15:06', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` int(11) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `lastLogin` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `level`, `foto`, `createdAt`, `lastLogin`, `deletedAt`) VALUES
(1, 'Frengky', 'frengkysky645@gmail.com', 'frengky', '$2y$10$QjmpG07nIUgBQ9J/sluRCO/6kGigdnDfhYbjKqW.rpCKCGiKgnMv.', 1, '66091c1b53ab9.jpg', '2024-03-30 12:07:33', '2024-06-05 21:22:59', NULL),
(2, 'Anggraini Agustin Saputri', 'anggraini@gmail.com', 'anggraini', '$2y$10$qe36y7b7UDh3vQKUB1W8PungWP.pAluE7E0N8M7Hb.rculapCS41e', 2, '6607f01510382.jpg', '2024-03-30 17:57:25', NULL, NULL),
(3, 'Kades', 'Rozy@gmail.com', 'Rozy', '$2y$10$rnZdR/9/VVyNPjopjLNAu.AxpZ4GKCO4EGQJnentTx7E5X7bjvvuS', 1, '6608db02c90dd.jpg', '2024-03-31 10:39:46', NULL, '2024-03-31 11:21:47'),
(4, 'Kades', 'adada@gmail.com', 'adada', '$2y$10$YQAoqZdvmUlo4t2FOLWjSe4PQm9pe0ECAL5yinKVvnvXCC1SosEJm', 2, '6608dc2d50228.jpg', '2024-03-31 10:44:45', NULL, '2024-03-31 11:20:42'),
(5, 'asd', 'adada@gmail.com', 'asd', '$2y$10$MuKCiS../cqDDe9PYDTr9OhTET5mGjtgZKsiqI/jSv1gW5uuV4KLW', 2, '6608e59fac1bd.jpg', '2024-03-31 11:25:03', NULL, NULL),
(6, 'asd', 'adada@gmail.com', 'asd', '$2y$10$CZbhMHQ5xErcdI8zuKh1b..Xf/MpKHykohSX1l6CNhQ/TZjimfb6.', 2, '6608e5ef21fd1.jpg', '2024-03-31 11:26:23', NULL, NULL),
(7, 'asd', 'asd@gmail.com', 'asd', '$2y$10$JgvTODxOU3NycH8.3L6n8eQGx6G69iwIBlJUdgDjFUga535umoIRG', 2, '6608e7fb5c32f.jpg', '2024-03-31 11:35:07', NULL, '2024-03-31 11:38:39'),
(8, 'asd', 'asd@gmail.com', 'asd', '$2y$10$cl.osDjCO3821707GubakuH0b/hG5.CFXA4Dg89FOd.RDHCPoqpgu', 2, '6608e885d8370.jpg', '2024-03-31 11:37:25', NULL, '2024-03-31 11:38:26'),
(9, 'asd', 'adada@gmail.com', 'asd', '$2y$10$IYYpeKrpfGmgFU9WXMeH3eUmrIjlojdDq4SHY.oJt/ICG7leHcT7G', 1, '6608e98b717e2.jpg', '2024-03-31 11:41:47', NULL, NULL),
(10, 'asd', 'asd@gmail.com', 'asd', '$2y$10$qhheWVSFVnmVBfdWFs2LxeEMeQBTcSciBlHhw.qmlJGbLZKEkHM.W', 1, '6608eaa753037.jpg', '2024-03-31 11:46:31', NULL, NULL),
(11, 'asd', 'asd@gmail.com', 'asd', '$2y$10$mcebxFUvwwkG4RnRc8ifbOUCNIYXXC5Np7CGgulObUDfa.tlnLIBu', 1, '6608f3cf8b088.jpg', '2024-03-31 12:25:35', NULL, '2024-03-31 14:17:46'),
(12, 'asd', 'asd@gmail.com', 'asd', '$2y$10$9cnnzDdNGw35e7.slDa/iuCSPI9Jx2Tek5b3dJOS19Hx64Fuhojtq', 1, '66090a143c3c4.jpg', '2024-03-31 14:00:36', NULL, '2024-03-31 14:14:40'),
(13, 'asd', 'asd@gmail.com', 'asasd', '$2y$10$hgXLzlk5UUfLFrBYOlV1Uu9qZ.zLwmVzCtYLd/kHfUeWgVJMLS3p2', 1, '66090b00db67a.jpg', '2024-03-31 14:04:32', NULL, '2024-03-31 14:12:49'),
(14, 'asd', 'asd@gmail.com', 'asd', '$2y$10$sTa5hlsCY8pyia3QtIgq9.L2QRsHTJW3EVL3Yf19sBMrib4WcT4ke', 1, '660912a1b143f.jpg', '2024-03-31 14:37:05', NULL, NULL),
(15, 'Sifulan', 'sifulan@gmail.com', 'operator', '$2y$10$kV/UVtGvP883eV4XZ80MaO3LSs6BM.Ha5YrgohFp8C9VcfQKcuUkm', 1, '66091abff0de8.png', '2024-03-31 15:11:43', NULL, NULL),
(16, 'Sifulan', 'sifulan@gmail.com', 'operator', '$2y$10$TbJktTrVsi9Xv7mAlYnd3OqV0BlTDALoM1eNJ7cWDkKnQb0yjDrk2', 1, '66091bafcc01e.png', '2024-03-31 15:15:43', NULL, '2024-04-09 11:33:30'),
(17, 'asd', 'asd@gmail.com', 'asd', '$2y$10$wggMSWhaHhzxG.NtdOCa5uccy1A8lTKhVGKIiw2l62YGUIxbfK1bq', 1, '66091c1b53ab9.jpg', '2024-03-31 15:17:31', NULL, '2024-03-31 20:19:50'),
(18, 'Frengky', 'frengkysky645@gmail.com', 'frengky', '$2y$10$QjmpG07nIUgBQ9J/sluRCO/6kGigdnDfhYbjKqW.rpCKCGiKgnMv.', 1, '660921adb12f2.jpg', '2024-03-31 15:41:17', NULL, '2024-03-31 20:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` int(11) NOT NULL,
  `visi` varchar(500) NOT NULL,
  `misi` varchar(2500) NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `visi`, `misi`, `updatedAt`, `updatedBy`) VALUES
(1, 'Debug Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-04-09 12:05:05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_surat`
--
ALTER TABLE `ms_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ms_surat`
--
ALTER TABLE `ms_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
