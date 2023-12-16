-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: monorail.proxy.rlwy.net:46184
-- Generation Time: Dec 16, 2023 at 01:49 AM
-- Server version: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `#mysql50#lost+found`
--
CREATE DATABASE IF NOT EXISTS `#mysql50#lost+found` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `#mysql50#lost+found`;
--
-- Database: `railway`
--
CREATE DATABASE IF NOT EXISTS `railway` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `railway`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `email` varchar(255) NOT NULL COMMENT 'Email',
  `password` varchar(255) NOT NULL COMMENT 'Password'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='OnlyTrade Single Service''s Admin';

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
('3a7de931-1223-42ff-9427-f7058ea61f23', 'Admin Dizi Ganteng Banget', 'dizi@gmail.com', '465e6cc7500fe2e8da9410f1ef720ee3'),
('44b9f0ce-99e4-11ee-abae-0242ac1e0002', 'Admin Reyhan', 'reyhan@gmail.com', 'be332729aaa61bc24eb517f793473fcd'),
('532816dc-99d0-11ee-9773-0242ac1e0002', 'Admin', 'adminadmin@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72'),
('93cf6cba-99e5-11ee-abae-0242ac1e0002', 'Admin Nelis', 'nelis@gmail.com', '9dbbfae0639625a5e4f942820407b200'),
('a6d414ed-99fe-11ee-abae-0242ac1e0002', 'Admin Ayam', 'ayam2asdjkajskd@gmail.com', '5deab87fb20beda8e98e570b72a5310c'),
('aaaa2b5a-99fa-11ee-abae-0242ac1e0002', 'Admin Ayam', 'ayam@gmail.com', '5deab87fb20beda8e98e570b72a5310c');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `name` varchar(255) NOT NULL COMMENT 'Name',
  `stock` int(11) NOT NULL COMMENT 'Stock',
  `price` int(11) NOT NULL COMMENT 'Price',
  `perusahaan_id` varchar(36) NOT NULL COMMENT 'Foreign Key to perusahaan table'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='datatable demo table';

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `name`, `stock`, `price`, `perusahaan_id`) VALUES
('209f009e-480b-4d29-8167-5b878ba1cc28', 'Sapi Patah Hati', 20, 80000, '6e25ba8b-99d2-11ee-9773-0242ac1e0002'),
('5dabf112-deea-4060-9b7c-1cfb62e37d5e', 'Laptop Lenovo', 23, 20000, '228ea49d-fdc9-44e4-95f4-6ac6b290d9f4'),
('74778dfc-317c-4c16-95ac-8c3f249b8e36', 'Kaset Hilmi', 20, 80000, '228ea49d-fdc9-44e4-95f4-6ac6b290d9f4'),
('7f9370db-99d3-11ee-9773-0242ac1e0002', 'Coklat Patah Hati', 20, 20000, '6e25ba8b-99d2-11ee-9773-0242ac1e0002'),
('7f93a281-99d3-11ee-9773-0242ac1e0002', 'Ayam Patah Hati', 20, 60000, '6e25ba8b-99d2-11ee-9773-0242ac1e0002');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` varchar(36) NOT NULL DEFAULT uuid(),
  `nama` varchar(100) NOT NULL COMMENT 'Company Name',
  `alamat` varchar(255) NOT NULL COMMENT 'Company Address',
  `no_telp` varchar(255) NOT NULL COMMENT 'Phone Number'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='Perusahaan Table';

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `alamat`, `no_telp`) VALUES
('228ea49d-fdc9-44e4-95f4-6ac6b290d9f4', 'PT. Starboy', 'Jalan The Weeknd', '0812384783401'),
('4bfc25cb-99ed-11ee-abae-0242ac1e0002', 'PT. Sawangan Sawungan', 'Jl. Sawangan No.2', '+628987654321'),
('6e25ba8b-99d2-11ee-9773-0242ac1e0002', 'PT. Patah Hati', 'Jl. Jomblo tapi gapapa No.2', '+628123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `ibfk_` (`perusahaan_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `ibfk_` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
