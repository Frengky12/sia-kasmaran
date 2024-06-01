-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 05:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5
=======
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 04:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0
>>>>>>> origin/master

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
<<<<<<< HEAD
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(10000) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `createdAt` datetime NOT NULL,
  `createdBy` int(11) NOT NULL,
  `deletedAt` datetime NOT NULL,
  `deletedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `judul`, `isi`, `picture`, `createdAt`, `createdBy`, `deletedAt`, `deletedBy`) VALUES
(1, 'LOREM IPSUM DOLOR', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'picture.png', '2024-04-11 06:58:58', 0, '2024-04-11 06:58:58', 0);

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
  `updatedBy` bigint(10) NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `email`, `wa`, `alamat`, `fb`, `ig`, `updatedBy`, `updatedAt`) VALUES
(1, 'frengkysky645@gmail.com', '081258401008', 'Dsn Kasmaran Dumah Ayang                                                ', 'https://www.facebook.com/Frengky Saziero', 'https://www.instagram.com/anggrainiagustin_/', 1, '2024-04-11 12:31:02');

-- --------------------------------------------------------

--
=======
>>>>>>> origin/master
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
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
>>>>>>> origin/master

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `level`, `foto`, `createdAt`, `lastLogin`, `deletedAt`) VALUES
<<<<<<< HEAD
(1, 'Frengky', 'frengkysky645@gmail.com', 'frengky', '$2y$10$QjmpG07nIUgBQ9J/sluRCO/6kGigdnDfhYbjKqW.rpCKCGiKgnMv.', 1, '66091c1b53ab9.jpg', '2024-03-30 12:07:33', '2024-04-12 07:28:41', NULL),
=======
(1, 'Frengky', 'frengkysky645@gmail.com', 'frengky', '$2y$10$QjmpG07nIUgBQ9J/sluRCO/6kGigdnDfhYbjKqW.rpCKCGiKgnMv.', 1, '66091c1b53ab9.jpg', '2024-03-30 12:07:33', '2024-04-02 20:04:09', NULL),
>>>>>>> origin/master
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
<<<<<<< HEAD
(16, 'Sifulan', 'sifulan@gmail.com', 'operator', '$2y$10$TbJktTrVsi9Xv7mAlYnd3OqV0BlTDALoM1eNJ7cWDkKnQb0yjDrk2', 1, '66091bafcc01e.png', '2024-03-31 15:15:43', NULL, '2024-04-09 11:33:30'),
=======
(16, 'Sifulan', 'sifulan@gmail.com', 'operator', '$2y$10$TbJktTrVsi9Xv7mAlYnd3OqV0BlTDALoM1eNJ7cWDkKnQb0yjDrk2', 1, '66091bafcc01e.png', '2024-03-31 15:15:43', NULL, NULL),
>>>>>>> origin/master
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
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
>>>>>>> origin/master

--
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `visi`, `misi`, `updatedAt`, `updatedBy`) VALUES
<<<<<<< HEAD
(1, 'Debug Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-04-09 12:05:05', 1);
=======
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-04-01 21:34:25', 1);
>>>>>>> origin/master

--
-- Indexes for dumped tables
--

--
<<<<<<< HEAD
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
=======
>>>>>>> origin/master
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
<<<<<<< HEAD
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
=======
>>>>>>> origin/master
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
