-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Mar-2021 às 18:35
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agendap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
`id` int(11) NOT NULL,
  `nome` varchar(40) CHARACTER SET latin1 NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 NOT NULL,
  `cargo` varchar(40) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `email`, `cargo`) VALUES
(1, 'José', 'josedoegito@gmail.com', 'analista de sistemas'),
(2, 'Maria', 'mariamaedejesus@gmail.com', 'DBA do Oracle'),
(3, 'Ken Masters', 'shouryuureppa@gmail.com', 'Lutador profissional de Karatê'),
(4, 'Artorias', 'cavaleirodoabismo@gmail.com', 'Jogador profissional de Futebol'),
(5, 'Letícia Martins', 'leticiamartins@gmail.com', 'Programadora plena'),
(22, 'Lilica', 'lilica@gmail.com', 'cadela de estimaÃ§Ã£o'),
(23, 'Lilica', 'lilica@gmail.com', 'cadela de estimaÃ§Ã£o'),
(24, 'Lilica', 'lilica@gmail.com', 'cadela de estimaÃ§Ã£o'),
(25, 'JOAQUINA', 'JOA@QUINA.com', 'ESTUDANTE'),
(26, 'JOAQUINA', 'JOA@QUINA.com', 'ESTUDANTE'),
(27, 'JOAQUINA', 'JOA@QUINA.com', 'ESTUDANTE'),
(28, 'Sergio Hollow', 'rottenundead@gmail.com', 'Undead'),
(29, 'Burning Jesus', 'firecrown@hotmail.com', 'Pyromancer Cleric'),
(30, 'Alison', 'alison@gmail.com', 'VASP'),
(31, 'Alison', 'alison@gmail.com', 'VASP'),
(32, 'Hey', 'test@test.com', 'LOL'),
(33, 'Sergio', 'sergedemonk@gmail.com', 'aluno'),
(34, 'as', 'sasa', 'sa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
