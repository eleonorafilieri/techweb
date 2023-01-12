-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 13, 2022 alle 00:36
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progettobaglivo`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `mobili`
--

CREATE TABLE `mobili` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `mobili`
--

INSERT INTO `mobili` (`id`, `name`, `price`, `type`) VALUES
(2, 'Xerjoff', '33.99', 'cucina'),
(3, 'Killian', '150.00', 'cucina'),
(4, 'Ex Nihilo Paris', '49.99', 'camera'),
(5, 'Paris', '120.00', 'camera'),
(6, 'Paisley Etro', '32.99', 'camera'),
(7, 'Rheyms', '42.50', 'camera'),
(8, 'Samahran', '22.22', 'cucina'),
(10, 'Paramour', '32.99', 'cucina');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `administrator` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `administrator`) VALUES
(2, 'Ale', 'ale.bag@yahoo.it', 'bc5393e6b96928ddd4ccbddbf0a007d2', 0),
(3, 'Artifex', 'artifexlatino@yahoo.it', '91eae6cc277d2c866766a0711a41ae05', 0),
(4, 'Rikin', 'riccardogiarrata3@gmail.com', '505882e3d81d78251f7aaf88f51f5d80', 0),
(11, 'prova', 'prova@unito.it', 'bc5393e6b96928ddd4ccbddbf0a007d2', 0),
(15, 'prova2', 'prova2@unito.it', '3bb6428fc9a172c7adbb803ae5de919c', 0),
(16, 'admin', 'admin@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 1),
(17, 'MarcoGreco', 'marco.greco@gmail.com', '6bd8bfea809334595e7a2c480ee91530', 0),
(18, 'prova3', 'prova3@unito.it', '84bd7710dfadc4e098a10172945ef226', 0),
(19, 'prova4', 'prova4@unito.it', 'd8aeebbf4ee268648c90e30e537e347a', 0),
(20, 'cipollino', 'cipollino@pino.it', '7508e5ccb8260508da5f6a7a2a8cd717', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `mobili`
--
ALTER TABLE `mobili`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `indice_email` (`email`),
  ADD UNIQUE KEY `indice_username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `mobili`
--
ALTER TABLE `mobili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
