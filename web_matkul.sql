-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 03:57 PM
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
-- Database: `web_matkul`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`) VALUES
('1234567890', 'Emma, M.Kom.'),
('2000154321', 'Srimulyani, M.Pd.'),
('2012398897', 'Taka, M.T.'),
('2144599111', 'Udin, M.T.'),
('2223334445', 'Ayunda, M.T.');

-- --------------------------------------------------------

--
-- Table structure for table `foto_profile`
--

CREATE TABLE `foto_profile` (
  `id` int(10) NOT NULL,
  `nim` varchar(7) NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_profile`
--

INSERT INTO `foto_profile` (`id`, `nim`, `name_file`, `size`, `path`, `type`, `date`) VALUES
(4, '2000123', '2000123_guitar.png', '15709', 'images/2000123_guitar.png', 'png', '2022-04-25 20:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak_matkul`
--

CREATE TABLE `kontrak_matkul` (
  `id` int(10) NOT NULL,
  `id_matkul` varchar(5) NOT NULL,
  `nim` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontrak_matkul`
--

INSERT INTO `kontrak_matkul` (`id`, `id_matkul`, `nim`) VALUES
(20, 'IK001', '2000123'),
(21, 'IK111', '2000456'),
(22, 'IK123', '2000456');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(7) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `angkatan`, `password`) VALUES
('2000123', 'Saya', 2020, 'hello'),
('2000456', 'Charles', 2019, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matkul` varchar(5) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `sks` int(1) NOT NULL,
  `nidn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matkul`, `nama_matkul`, `sks`, `nidn`) VALUES
('IK001', 'Algoritma I', 3, '2144599111'),
('IK002', 'Algoritma II', 3, '2144599111'),
('IK111', 'Kecerdasan Buatan', 3, '2012398897'),
('IK123', 'Machine Learning', 3, '2223334445'),
('IK201', 'Pengantar Pendidikan', 2, '2000154321'),
('IK301', 'Struktur Data', 3, '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `foto_profile`
--
ALTER TABLE `foto_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `kontrak_matkul`
--
ALTER TABLE `kontrak_matkul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `nidn` (`nidn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_profile`
--
ALTER TABLE `foto_profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontrak_matkul`
--
ALTER TABLE `kontrak_matkul`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_profile`
--
ALTER TABLE `foto_profile`
  ADD CONSTRAINT `foto_profile_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kontrak_matkul`
--
ALTER TABLE `kontrak_matkul`
  ADD CONSTRAINT `kontrak_matkul_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kontrak_matkul_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `mata_kuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
