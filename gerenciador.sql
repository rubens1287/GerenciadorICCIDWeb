-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Out-2016 às 16:57
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerenciador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `hist_iccid`
--

CREATE TABLE `hist_iccid` (
  `id_iccid` int(11) NOT NULL,
  `iccid_num` varchar(250) COLLATE utf8_bin NOT NULL,
  `imsi` varchar(250) COLLATE utf8_bin NOT NULL,
  `regional` varchar(45) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(45) COLLATE utf8_bin NOT NULL,
  `cartao_sim` varchar(45) COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL COMMENT 'se for 0 = nao usado se for 1 usado',
  `usuario` varchar(220) COLLATE utf8_bin NOT NULL,
  `nome_maquina` varchar(100) COLLATE utf8_bin NOT NULL,
  `data_hora` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `iccid`
--

CREATE TABLE `iccid` (
  `id_iccid` int(11) NOT NULL,
  `iccid_num` varchar(250) COLLATE utf8_bin NOT NULL,
  `imsi` varchar(250) COLLATE utf8_bin NOT NULL,
  `regional` varchar(45) COLLATE utf8_bin NOT NULL,
  `tipo` varchar(45) COLLATE utf8_bin NOT NULL,
  `cartao_sim` varchar(45) COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL COMMENT 'se for 0 = nao usado se for 1 usado',
  `usuario` varchar(220) COLLATE utf8_bin NOT NULL,
  `nome_maquina` varchar(100) COLLATE utf8_bin NOT NULL,
  `data_hora` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `lg_id` int(11) NOT NULL,
  `lg_nome` varchar(220) COLLATE utf8_bin NOT NULL,
  `lg_email` varchar(220) COLLATE utf8_bin NOT NULL,
  `lg_senha` varchar(220) COLLATE utf8_bin NOT NULL,
  `lg_nivel_de_acesso` int(11) NOT NULL COMMENT 'Se nivel = 1 usuario se for 2 = administrador ',
  `lg_criado` datetime NOT NULL,
  `lg_modificada` datetime NOT NULL,
  `lg_status` int(11) NOT NULL COMMENT 'Ser for 1 o usuario esta inativo e se for 2 o usuario esta ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`lg_id`, `lg_nome`, `lg_email`, `lg_senha`, `lg_nivel_de_acesso`, `lg_criado`, `lg_modificada`, `lg_status`) VALUES
(1, 'Rubens de Medeiros Lobo', 'rubens.lobo1287@yahoo.com.br', 'MTIzNDU2', 1, '2016-09-29 00:00:00', '2016-10-02 19:42:36', 2),
(2, 'Felipe Rodrigues', 'felipe.rodrigues1@techmahindra.com', 'MTIzNDU2', 1, '2016-09-29 01:29:39', '2016-10-03 22:03:37', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hist_iccid`
--
ALTER TABLE `hist_iccid`
  ADD PRIMARY KEY (`id_iccid`);

--
-- Indexes for table `iccid`
--
ALTER TABLE `iccid`
  ADD PRIMARY KEY (`id_iccid`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`lg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hist_iccid`
--
ALTER TABLE `hist_iccid`
  MODIFY `id_iccid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `iccid`
--
ALTER TABLE `iccid`
  MODIFY `id_iccid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `lg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
