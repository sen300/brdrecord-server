-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 05:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brd_log`
--

-- --------------------------------------------------------

--
-- Table structure for table `brd_audio`
--

CREATE TABLE `brd_audio` (
  `id` int(11) NOT NULL,
  `nama_br` varchar(50) NOT NULL,
  `nama_audio` varchar(50) NOT NULL,
  `tipe_audio` varchar(50) NOT NULL,
  `size_audio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brd_audio`
--

INSERT INTO `brd_audio` (`id`, `nama_br`, `nama_audio`, `tipe_audio`, `size_audio`) VALUES
(1, 'Broadcast  Corona 3M', 'br-corona3M.mp3', 'audio/mpeg', 131076),
(2, 'Broadcast Banjir', 'br-banjir.mp3', 'audio/mpeg', 29102),
(3, 'Broadcast Peringatan 1', 'br-peringatan1.mp3', 'audio/mpeg', 24882),
(4, 'Broadcast Peringatan 2', 'br-peringatan2.mp3', 'audio/mpeg', 17107);

-- --------------------------------------------------------

--
-- Table structure for table `brd_daerah`
--

CREATE TABLE `brd_daerah` (
  `id` int(11) NOT NULL,
  `daerah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brd_daerah`
--

INSERT INTO `brd_daerah` (`id`, `daerah`) VALUES
(1, 'Rawa Buaya'),
(2, 'Ulujami'),
(3, 'Petogogan'),
(4, 'Bidara Cina'),
(5, 'Kampung Melayu'),
(6, 'Kapuk'),
(7, 'Kembangan Utara'),
(8, 'Cipulir'),
(9, 'Cilandak Timur'),
(10, 'Pejaten Timur'),
(11, 'Cawang'),
(12, 'Pengadegan'),
(13, 'Kebon Pala'),
(14, 'Cipinang Melayu');

-- --------------------------------------------------------

--
-- Table structure for table `brd_log`
--

CREATE TABLE `brd_log` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `audio` varchar(30) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brd_log`
--

INSERT INTO `brd_log` (`id`, `timestamp`, `audio`, `location`) VALUES
(1, '2020-09-07 02:55:38', 'chime.mp3', ''),
(2, '2020-09-07 02:55:54', 'br-banjir.mp3', ''),
(3, '2020-09-07 02:56:00', 'chime.mp3', ''),
(4, '2020-09-07 02:56:05', 'siren.mp3', ''),
(5, '2020-09-07 03:47:13', 'chime.mp3', ''),
(6, '2020-09-07 04:12:49', 'siren.mp3', ''),
(7, '2020-09-07 04:12:56', 'br-peringatan1.mp3', ''),
(8, '2020-09-07 04:13:26', 'chime.mp3', ''),
(9, '2020-09-07 04:13:34', 'chime.mp3', ''),
(10, '2020-09-07 04:13:40', 'siren.mp3', ''),
(11, '2020-09-07 04:13:44', 'br-peringatan2.mp3', ''),
(12, '2020-09-07 04:13:52', 'chime.mp3', ''),
(13, '2020-09-07 04:42:36', 'chime.mp3', '10.15.92.142'),
(14, '2020-09-07 06:21:19', 'chime.mp3', 'BPBD'),
(15, '2020-09-07 06:26:08', 'br-banjir.mp3', 'BPBD'),
(16, '2020-09-07 06:26:21', 'br-banjir.mp3', 'BPBD'),
(17, '2020-09-07 06:26:27', 'chime.mp3', 'BPBD'),
(18, '2020-09-07 06:27:35', 'br-corona3M.mp3', 'BPBD'),
(19, '2020-09-07 07:07:52', 'chime.mp3', 'BPBD'),
(20, '2020-09-07 07:08:21', 'br-banjir.mp3', 'BPBD'),
(21, '2020-09-11 03:06:02', 'br-corona3M.mp3.mp3', 'BPBD'),
(22, '2020-09-11 03:06:05', 'br-banjir.mp3.mp3', 'BPBD'),
(23, '2020-09-11 03:06:16', 'br-corona3M.mp3.mp3', 'BPBD'),
(24, '2020-09-11 03:07:51', 'br-corona3M.mp3', 'BPBD'),
(25, '2020-09-11 03:08:55', 'br-peringatan1.mp3', 'BPBD'),
(26, '2020-09-11 03:09:16', 'br-peringatan1.mp3', 'BPBD');

-- --------------------------------------------------------

--
-- Table structure for table `brd_lokasi`
--

CREATE TABLE `brd_lokasi` (
  `id` int(11) NOT NULL,
  `id_daerah` int(11) NOT NULL,
  `nama_lokasi` varchar(30) NOT NULL,
  `ip_lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brd_lokasi`
--

INSERT INTO `brd_lokasi` (`id`, `id_daerah`, `nama_lokasi`, `ip_lokasi`) VALUES
(1, 1, 'RW 1', '10.15.92.142'),
(2, 1, 'RW 4', '10.15.92.142'),
(3, 1, 'RW 11', '10.15.92.142'),
(4, 2, 'RW 3', '10.15.92.142'),
(5, 2, 'RW 5', '10.15.92.142'),
(6, 2, 'RW 7', '10.15.92.142'),
(7, 3, 'RW 1', '10.15.92.142'),
(8, 3, 'RW 2', '10.15.92.142'),
(9, 3, 'RW 3', '10.15.92.142'),
(10, 4, 'RW 7', '10.15.92.142'),
(11, 4, 'RW 11', '10.15.92.142'),
(12, 4, 'RW 14', '10.15.92.142'),
(13, 5, 'RW 1', '10.15.92.142'),
(14, 5, 'RW 3', '10.15.92.142'),
(15, 5, 'RW 7', '10.15.92.142'),
(16, 6, 'RW 1', '10.15.92.142'),
(17, 7, 'RW 10', '10.15.92.142'),
(18, 8, 'RW 10', '10.15.92.142'),
(19, 9, 'RW 3', '10.15.92.142'),
(20, 10, 'RW 8', '10.15.92.142'),
(21, 11, 'RW 2', '10.15.92.142'),
(22, 12, 'RW 1', '10.15.92.142'),
(23, 13, 'RW 10', '10.15.92.142'),
(24, 14, 'RW 4', '10.15.92.142');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brd_audio`
--
ALTER TABLE `brd_audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brd_daerah`
--
ALTER TABLE `brd_daerah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brd_log`
--
ALTER TABLE `brd_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brd_lokasi`
--
ALTER TABLE `brd_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brd_audio`
--
ALTER TABLE `brd_audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brd_daerah`
--
ALTER TABLE `brd_daerah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `brd_log`
--
ALTER TABLE `brd_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `brd_lokasi`
--
ALTER TABLE `brd_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
