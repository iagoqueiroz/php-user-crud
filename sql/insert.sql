-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 23-Maio-2018 às 23:46
-- Versão do servidor: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-app`
--

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `data_nascimento`, `emissao`, `data_emissao`) VALUES
(1, 'Iago Queiroz', 'iago.queiroz@hotmail.com', '$2y$10$ojh/zBSjrbNazRRSKS99beOkWh6nWYKP/mKAo/IqsWl7GBKTut1Pe', '1996-01-06', NULL, NULL),
(2, 'Roberto Cláudio', 'robertinho@gmail.com', '$2y$10$FPE6esT6z/.C0iioexJpvOirz4STOsNWPw1.WZm0l/a3S6Eqz8t3u', '1985-05-12', NULL, NULL),
(3, 'Francisco Moreira', 'francisco.moreira@yahoo.com', '$2y$10$iAnCfadpT6Pt2T584WED5uDWs7FbArOtvrBCcm/MOKgYymlZe8hdS', '1990-09-27', NULL, NULL),
(4, 'Igor Pereira', 'igor.pereira@hotmail.com', '$2y$10$GaQ29Ks0l4SHcSm2W1ddQuhsMb00RN7dPmuO6frV3JVGbct9ZRxUy', '1995-02-16', NULL, NULL),
(5, 'Juliana Alves', 'jujuh.alves@hotmail.com', '$2y$10$Pn0IfzO3/i/azozyMv02/uPmCVF0vVliSUAN/ez35a/KezLsp4wDS', '1993-10-02', NULL, NULL),
(6, 'Marcos Roberto', 'marquinhos.rob@gmail.com', '$2y$10$WgaochSXRlwXEgl78zEWBe6cYu1OzBWz20Mq8V6dcy41VbO8bat3O', '1995-05-25', NULL, NULL),
(7, 'Lucas Santos', 'lucassantos@gmail.com', '$2y$10$QCzxTgiNMdDGvf7R0hefj.7PiYbXAS68cIxPtdKuwdoIJG3nFDhS2', '1998-09-27', NULL, NULL),
(8, 'Letícia Lima', 'leticialima88@gmail.com', '$2y$10$as2tvY9/ZbmiRQOXJ/EQJ.i2ROqNwrPCawsQsJF5cZkEjX7BKvTNC', '1992-08-27', NULL, NULL),
(9, 'Débora Maria', 'deby.htinha@gmail.com', '$2y$10$Nk5u7m.z1Km9F4JJa4ysMutpWkp6NEm.C6cy5wF14CAmqqc23oN7O', '1994-11-09', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
