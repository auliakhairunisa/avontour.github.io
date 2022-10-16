-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 03:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`id`, `nama`, `jenis`, `alamat`) VALUES
(1, 'Pulau Pari', 'Pantai', 'Kepulauan Seribu, DKI Jakarta'),
(2, 'Curug Cikanteh', 'Air Terjun', 'Kabupaten Sukabumi, Jawa Barat'),
(3, 'Punthuk Setumbu', 'Pergunungan', 'Kab. Magelang, Jawa Tengah'),
(4, 'Bukit Jaddih', 'Perbukitan', 'Kab. Bangkalan, Jawa Timur'),
(5, 'Air Terjun Kiti-Kiti', 'Air Terjun', 'Kab. Fakfak, Papua Barat'),
(6, 'Bukit Pergasingan', 'Perbukitan', 'Kab. Lombok Timur, Nusa Tenggara Barat'),
(7, 'Pantai Pulau Merah', 'Pantai', 'Kab. Banyuwangi, Jawa Timur'),
(8, 'Pantai Ora', 'Pantai', 'Kepulauan Maluku'),
(9, 'Teluk Kiluan', 'Pantai', 'Kab. Tanggamus, Lampung'),
(10, 'Krumutan', 'Hutan', 'Kab. Pelalawan, Riau'),
(11, 'Danau Kaco', 'Danau', 'Kab. Kerinci, Jambi'),
(12, 'Pulau Labengki', 'Pantai', 'Kab. Konawe Utara, Sulawesi Tenggara');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'auliakhairunisa', 'auliakhai02@gmail.com', '64dd1fb04e1f9719314ebd85ec1d77e0'),
(3, 'admin', 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
