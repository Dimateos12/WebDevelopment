-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Lug 24, 2022 alle 16:34
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
-- Database: `web_development`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT '0',
  `status` tinyint(191) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_tittle` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_tittle`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 'Zmiana danych w zegarku ', 'asdasd', '', 1, 0, '2.jpg', 'asdad', '', '', '2022-07-17 18:20:06'),
(2, 'fffff', 'fff', 'Ada ma kota', 0, 0, 'Screenshot from 2022-07-14 15-43-40.png', 'fff', '', '', '2022-07-17 18:48:58'),
(3, 'Watche of Laquila ', 'Laquila', '', 0, 0, '1658138322.jpg', 'test', '', '', '2022-07-17 18:50:03'),
(4, 'Zegarki Drewniane  SUPER OFERTA  TYLKO DZISIAJ ', 'Drewno', 'DREWNO', 1, 1, 'woodwatch.jpg', 'Drewno', '', '', '2022-07-17 18:51:51'),
(5, 'asdasd', 'adsasd', '', 0, 0, 'woodwatch.jpg', 'asdasas', '', '', '2022-07-17 18:52:17'),
(6, '66666', '6666', '', 0, 0, 'woodwatch.jpg', '6666', '', '', '2022-07-17 18:53:09'),
(10, 'kjhlkj', ';jlkkl', 'jjjjj', 0, 0, 'Screenshot from 2022-07-16 17-09-52.png', 'nnnn', 'jmmmmm', 'nnnnn', '2022-07-18 14:08:46'),
(11, 'Kotowicz kurwa jest ', 'kotowicz smiec ', 'Jebac kotowicza', 0, 0, '3.jpg', 'Kotowicz pizda', 'kotowicz chuj', 'kotowicz smiec', '2022-07-18 15:04:56');

-- --------------------------------------------------------

--
-- Struttura della tabella `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `from_name` varchar(50) NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `from_phone` int(20) NOT NULL,
  `text` text NOT NULL,
  `send_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_as` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`, `role_as`) VALUES
(1, 'mateusz', 'mateusz@mateusz', 123332, '123', '2022-07-16 17:45:32', 1),
(2, 'mateusz', 'researcher@si.com', 123, '123', '2022-07-16 17:49:42', 0),
(3, 'mateusz', 'manager@si.com', 123, '123', '2022-07-16 17:50:22', 0),
(4, 'burak', 'burak@burak', 1234, 'burak', '2022-07-16 20:53:31', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indici per le tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
