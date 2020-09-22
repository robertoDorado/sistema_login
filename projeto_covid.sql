-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Jun-2020 às 23:19
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projeto_covid`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leitos` varchar(100) NOT NULL,
  `pacientes` varchar(100) NOT NULL,
  `lista` varchar(2000) NOT NULL,
  `situacao` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `responsavel` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `leitos`, `pacientes`, `lista`, `situacao`, `hospital`, `responsavel`) VALUES
(36, '300', '25', 'Leitos, instrumentos, bisturi, cama.', 'ruim', 'SÃ£o Caetano', 'Cindy Dorado'),
(38, '150', '150', 'leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas,leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas,leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas, leitos, equipamentos, mÃ¡quinas,', 'ruim', 'SÃ£o Fernando', 'Percy Dorado'),
(39, '200', '100', 'Leitos, mesa, bisturi, leitos, mesa, bisturi, leitos, mesa, bisturi, leitos, mesa, bisturi, leitos, mesa, bisturi, leitos, mesa, bisturi, leitos, mesa, bisturi, leitos, mesa, bisturi, leitos, mesa, bisturi, leitos, mesa, bisturi, leitos, mesa, bisturi, , leitos, mesa, bisturi.', 'boa', 'Cachoeirinha', 'Roberto Dorado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `cargo`, `nome`, `senha`, `ip`, `matricula`, `usuario`, `hospital`) VALUES
(1, 'Diretor', 'Roberto Dorado', '81dc9bdb52d04dc20036dbd8313ed055', '::1', 'B340649', 'robertodorado', 'Cachoeirinha'),
(5, 'Enfermeira 1', 'Renata Souza Fernandes', '81dc9bdb52d04dc20036dbd8313ed055', '::1', 'B452587', 'renatasouza', 'Albert Eintein'),
(16, 'Enfermeiro 2', 'Fernando Pessoa', '81dc9bdb52d04dc20036dbd8313ed055', '::1', 'B985647', 'fernandopessoa', 'SÃ£o Camilo'),
(18, 'Diretor', 'Diego Dorado', '81dc9bdb52d04dc20036dbd8313ed055', '::1', 'B962325', 'diegodorado', 'Samaritano'),
(20, 'Diretor', 'Percy Dorado', '81dc9bdb52d04dc20036dbd8313ed055', '::1', 'B632566', 'percydorado', 'SÃ£o Fernando'),
(21, 'MÃ©dica', 'Cindy Dorado', '81dc9bdb52d04dc20036dbd8313ed055', '::1', 'B555555', 'cindydorado', 'SÃ£o Caetano');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
