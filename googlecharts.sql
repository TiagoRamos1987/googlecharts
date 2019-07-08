-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Mar-2019 às 20:08
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `googlecharts`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `charts`
--

CREATE TABLE `charts` (
  `id` int(11) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `vdate` date NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `charts`
--

INSERT INTO `charts` (`id`, `browser`, `country`, `vdate`, `ip`) VALUES
(1, 'Chrome', 'India', '2015-09-01', '198.0.0.7'),
(2, 'Firefox', 'US', '2015-09-01', '198.0.0.7'),
(3, 'Safari', 'UK', '2015-09-02', '198.0.0.7'),
(4, 'Safari', 'India', '2015-09-03', '198.0.0.7'),
(5, 'Chrome', 'India', '2015-09-03', '198.0.0.7'),
(6, 'Chrome', 'US', '2015-09-03', '198.0.0.7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charts`
--
ALTER TABLE `charts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charts`
--
ALTER TABLE `charts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
