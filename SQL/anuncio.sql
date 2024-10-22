-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sendstyle`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE IF NOT EXISTS `anuncio` (
  `idAnuncio` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAnuncio` varchar(45) DEFAULT NULL,
  `valorAnuncio` float DEFAULT NULL,
  `imagem_produto` text,
  `avaliacoesAnuncio` varchar(45) DEFAULT NULL,
  `tamanho` varchar(45) DEFAULT NULL,
  `cores` varchar(45) DEFAULT NULL,
  `descAnuncio` varchar(45) DEFAULT NULL,
  `idAvaliacao` int(11) NOT NULL DEFAULT '0',
  `idUsuario` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idAnuncio`,`idAvaliacao`,`idUsuario`),
  KEY `fk_Anuncios_Avaliacoes1_idx` (`idAvaliacao`),
  KEY `fk_Anuncios_Anunciante1_idx` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `anuncio`
--

INSERT INTO `anuncio` (`idAnuncio`, `nomeAnuncio`, `valorAnuncio`, `imagem_produto`, `avaliacoesAnuncio`, `tamanho`, `cores`, `descAnuncio`, `idAvaliacao`, `idUsuario`) VALUES
(24, 'aa', NULL, '64908853a4b3c_super2.jpg', NULL, '1', '1', 'aa', 1, 2),
(25, 'aa', NULL, '649088998f595_super2.jpg', NULL, '1', '1', 'aa', 1, 2),
(26, 'aa', NULL, '6490893990324_super2.jpg', NULL, '1', '1', 'aa', 1, 2),
(27, 'aa', NULL, '649089435308b_super2.jpg', NULL, '1', '1', 'aa', 1, 2);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `fk_Anuncios_Anunciante1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Anuncios_Avaliacoes1` FOREIGN KEY (`idAvaliacao`) REFERENCES `avaliacoes` (`idAvaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
