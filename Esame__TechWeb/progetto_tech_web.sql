-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 21, 2023 alle 16:20
-- Versione del server: 10.4.8-MariaDB
-- Versione PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progetto_tech_web`
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
(0, 'Lili', '33.99', 'cucina'),
(1, 'Cameron', '50.00', 'camera'),
(2, 'Nikita', '490.99', 'bagno'),
(3, 'Polly', '120.00', 'cucina'),
(4, 'Karen', '999.00', 'cucina'),
(5, 'Kiki', '420.50', 'camera'),
(6, 'Lulu', '220.22', 'bagno'),
(7, 'Daisy', '320.99', 'bagno'),
(8, 'Laila', '220.99', 'camera'),
(9, 'Freddy', '321.00', 'cucina'),
(12, 'Pepper', '230.00', 'bagno');

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
(3, 'Artifex', 'artifexlatino@yahoo.it', '91eae6cc277d2c866766a0711a41ae05', 0),
(4, 'Rikin', 'riccardogiarrata3@gmail.com', '505882e3d81d78251f7aaf88f51f5d80', 0),
(11, 'prova', 'prova@unito.it', 'bc5393e6b96928ddd4ccbddbf0a007d2', 0),
(15, 'prova2', 'prova2@unito.it', '3bb6428fc9a172c7adbb803ae5de919c', 0),
(18, 'prova3', 'prova3@unito.it', '84bd7710dfadc4e098a10172945ef226', 0),
(19, 'prova4', 'prova4@unito.it', 'd8aeebbf4ee268648c90e30e537e347a', 0),
(20, 'cipollino', 'cipollino@pino.it', '7508e5ccb8260508da5f6a7a2a8cd717', 0),
(22, 'eleonora.filieri', 'eleonorafil21@gmail.com', '34dcc95d1be4fefbeaba8fe2d8d0a4bd', 1),
(23, 'ele93', 'eleonora.filieri@edu.unito.it', '34dcc95d1be4fefbeaba8fe2d8d0a4bd', 0),
(24, 'ele', 'ciao@ciao.it', '1f648204cf4af71803d8147fd5e9d812', 0),
(25, 'ciao', 'ciao@cio.it', 'ec49340def4639c754fa729e0e6d403c', 0),
(26, 'thomas', 'thomas@gmail.com', '955503b747b57d7897c9f6715be95c65', 0),
(27, 'carlo', 'carlo@gmail.com', '28de0a173441222108bba883399ee887', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
