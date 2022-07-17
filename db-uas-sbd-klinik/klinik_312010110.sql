-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 09:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_312010110`
--

-- --------------------------------------------------------

--
-- Table structure for table `berobat`
--

CREATE TABLE `berobat` (
  `id_berobat` int(11) NOT NULL,
  `id_pasien` int(5) DEFAULT NULL,
  `id_dokter` int(5) DEFAULT NULL,
  `id_obat` int(5) DEFAULT NULL,
  `tgl_berobat` date DEFAULT NULL,
  `keluhan_pasien` varchar(200) DEFAULT NULL,
  `hasil_diagnosa` varchar(200) DEFAULT NULL,
  `penatalaksanaan` enum('Rawat Jalan','Rawat Inap','Rujuk','Lainnya') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berobat`
--

INSERT INTO `berobat` (`id_berobat`, `id_pasien`, `id_dokter`, `id_obat`, `tgl_berobat`, `keluhan_pasien`, `hasil_diagnosa`, `penatalaksanaan`) VALUES
(123457, 221, 382, 443, '2022-04-20', 'Telat haid', 'Test darah memperlihatkan kadar estrogen sangat rendah yang yang diakibatkan karena gangguan makan. Pasien mengalami anoreksia', 'Rawat Jalan'),
(123458, 238, 369, 444, '2022-04-15', 'Gatal-gatal', 'Pasien mengalami gatal-gatal dan ruam akibat gigitan serangga', 'Lainnya'),
(123459, 223, 357, 443, '2022-04-22', 'Berat badan turun drastis, dan ada pembengkakan pada leher', 'Pasien menjalani tes darah dan biopsi gelenjar getah bening. Hasil pemeriksaan menunjukan Limfoma stadium 1', 'Rawat Inap'),
(123460, 226, 386, 446, '2022-04-25', 'Mual dan muntah hebat', 'Infeksi bakteri', 'Lainnya'),
(123469, 222, 385, 441, '2022-07-03', 'dd', 'dddc', 'Rawat Jalan'),
(123512, 223, NULL, NULL, NULL, NULL, NULL, NULL),
(123517, NULL, NULL, NULL, '2022-07-15', 's', 's', 'Rawat Inap'),
(123519, NULL, NULL, 441, '2022-07-23', 'sekarang coba pke obat', 'obatnya manjur ga?', 'Rawat Inap'),
(123520, 245, 381, 447, '2022-08-17', 'sekarang test semuanya', 'semoga bisa semua', 'Rawat Jalan'),
(123521, 224, 386, 440, '2022-07-13', 'Bisa bisa', 'Yeyy', 'Rujuk'),
(123522, 223, 385, 440, '2022-07-07', 'm', 'mm', 'Rawat Jalan'),
(123523, 246, 386, 442, '2022-07-16', 'cjbjdfh', 'jjj', 'Rujuk');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(5) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`) VALUES
(354, 'Reza Rahardian Sutjiono'),
(357, 'Aswaja Mutaski'),
(369, 'Irma Nur S'),
(371, 'William Smith Budiman'),
(380, 'Sulaiman Elma'),
(381, 'Subagyo Hadi Sutioso'),
(382, 'Lukman Hakim'),
(383, 'Subagyo Hadi'),
(385, 'Fernando Sutioso'),
(386, 'Reza Aditya'),
(387, 'Herina Wa'),
(388, 'jpjojuo'),
(389, 'Reza Rahardian Sugiono');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`) VALUES
(440, 'Amoxicillin K24'),
(441, 'Etodolac H'),
(442, 'Caladine Lotion'),
(443, 'Epirubicin'),
(444, 'Estrogen G'),
(446, 'Vitacimin'),
(447, 'Salonpas Koyo'),
(448, 'Paracetamol');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `nama_pasien` varchar(40) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','Lain-lain') DEFAULT NULL,
  `umur` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `umur`) VALUES
(221, 'Wisnu Abiatar', 'Lain-lain', 23),
(222, 'Ajeng Swastika', 'Perempuan', 24),
(223, 'Indrianto Mahesa', 'Laki-laki', 35),
(224, 'Ageng Juliantri', 'Perempuan', 45),
(226, 'Nilamsari Candrawinata Kusuma', 'Perempuan', 24),
(238, 'Larasati', 'Perempuan', 24),
(245, 'Deswita', 'Perempuan', 46),
(246, 'Herawati Nisa', 'Perempuan', 20);

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL,
  `id_berobat` int(11) DEFAULT NULL,
  `id_obat` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep`, `id_berobat`, `id_obat`) VALUES
(11234, 123456, 441),
(11235, 123457, 444),
(11236, 123458, 442),
(11237, 123459, 443),
(11238, 123460, 440),
(11239, 123461, 440);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1236, 'nadya', '$2y$10$zchppi.2xF4ilaMYs5JKguIYwro5GO1ojoW2.NlA5T7YrnDYv3qUa'),
(1237, 'admin', '$2y$10$A6aM.YM5p4ZYOsLrGGTV1uFZp8Wqda38tyAnuz5/vgDjzKPI9zjKa'),
(1239, 'wiwi', '$2y$10$Kxywqj9fQb5bTYVLaX2TYufkCyRnmnk7QKDoLywM1/cayIADGJuZG'),
(1240, 'raihan', '$2y$10$pdKiXaEHOmyUeKXqBXTJmu9gydr5vfGFI5d/xhgXhj2y3G7el7cx2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`id_berobat`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_berobat` (`id_berobat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berobat`
--
ALTER TABLE `berobat`
  MODIFY `id_berobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123524;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=449;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1241;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berobat`
--
ALTER TABLE `berobat`
  ADD CONSTRAINT `berobat_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `berobat_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `berobat_ibfk_3` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
