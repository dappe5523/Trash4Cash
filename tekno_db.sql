-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 03:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tekno_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hire_driver`
--

CREATE TABLE `hire_driver` (
  `id_orderMap` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `sampah_plastik` tinyint(1) NOT NULL,
  `sampah_kertas` tinyint(1) NOT NULL,
  `asal_pengiriman` varchar(65) DEFAULT NULL,
  `lokasi_bankSampah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hire_driver`
--

INSERT INTO `hire_driver` (`id_orderMap`, `id_user`, `sampah_plastik`, `sampah_kertas`, `asal_pengiriman`, `lokasi_bankSampah`) VALUES
(1, 18, 0, 0, NULL, NULL),
(2, 18, 0, 0, NULL, NULL),
(3, 18, 0, 0, NULL, NULL),
(4, 18, 0, 0, NULL, NULL),
(5, 18, 0, 0, NULL, NULL),
(6, 18, 0, 0, NULL, NULL),
(7, 18, 0, 1, NULL, NULL),
(8, 18, 0, 1, NULL, NULL),
(9, 18, 1, 1, NULL, NULL),
(10, 18, 1, 1, NULL, NULL),
(11, 18, 0, 1, NULL, NULL),
(12, 18, 0, 1, NULL, NULL),
(13, 18, 0, 1, NULL, NULL),
(14, 18, 0, 1, NULL, NULL),
(15, 18, 1, 0, NULL, NULL),
(16, 18, 1, 1, NULL, NULL),
(17, 18, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `sampah_plastik` tinyint(1) NOT NULL DEFAULT 0,
  `sampah_kertas` tinyint(1) NOT NULL DEFAULT 0,
  `done` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `sampah_plastik`, `sampah_kertas`, `done`) VALUES
(24, 18, 0, 0, 0),
(25, 18, 0, 0, 0),
(26, 18, 0, 0, 0),
(27, 18, 0, 0, 0),
(28, 18, 0, 0, 0),
(29, 18, 0, 0, 0),
(30, 18, 0, 0, 0),
(31, 18, 0, 0, 0),
(32, 18, 0, 0, 0),
(33, 18, 0, 0, 0),
(34, 18, 0, 0, 0),
(35, 18, 0, 0, 0),
(36, 18, 0, 0, 0),
(37, 18, 0, 0, 0),
(38, 18, 0, 0, 0),
(39, 18, 0, 0, 0),
(40, 18, 0, 0, 0),
(41, 18, 0, 0, 0),
(42, 18, 0, 0, 0),
(43, 18, 0, 0, 0),
(44, 18, 0, 0, 0),
(45, 18, 1, 0, 0),
(46, 18, 0, 1, 0),
(47, 18, 1, 0, 0),
(48, 18, 1, 1, 0),
(49, 18, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `poin`
--

CREATE TABLE `poin` (
  `id_point` int(255) NOT NULL,
  `id_order` int(255) NOT NULL,
  `jumlah_poin` int(255) NOT NULL,
  `tanggal_poin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_penerimaan`
--

CREATE TABLE `tempat_penerimaan` (
  `id_tempatPenerima` int(255) NOT NULL,
  `nama_tempat` varchar(65) NOT NULL,
  `alamat_tempat` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempat_penerimaan`
--

INSERT INTO `tempat_penerimaan` (`id_tempatPenerima`, `nama_tempat`, `alamat_tempat`) VALUES
(1, 'Universitas Kristen Petra', 'Jl. Siwalankerto No.121-131, Siwalankerto, Kec. Wonocolo, Surabay');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_user` int(255) NOT NULL,
  `email_user` varchar(65) NOT NULL,
  `password_user` varchar(65) NOT NULL,
  `firstname_user` varchar(65) NOT NULL,
  `lastname_user` varchar(65) NOT NULL,
  `alamat_user` varchar(255) NOT NULL,
  `username_user` varchar(255) NOT NULL,
  `saldo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_user`, `email_user`, `password_user`, `firstname_user`, `lastname_user`, `alamat_user`, `username_user`, `saldo`) VALUES
(18, 'daffa5523@gmail.com', 'daffa1234', 'Ramadhan Daffa', 'Ferdyatma', 'Jalan Jambangan IIA No 3', 'dave', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hire_driver`
--
ALTER TABLE `hire_driver`
  ADD PRIMARY KEY (`id_orderMap`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`id_point`);

--
-- Indexes for table `tempat_penerimaan`
--
ALTER TABLE `tempat_penerimaan`
  ADD PRIMARY KEY (`id_tempatPenerima`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hire_driver`
--
ALTER TABLE `hire_driver`
  MODIFY `id_orderMap` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `poin`
--
ALTER TABLE `poin`
  MODIFY `id_point` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempat_penerimaan`
--
ALTER TABLE `tempat_penerimaan`
  MODIFY `id_tempatPenerima` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`Id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
