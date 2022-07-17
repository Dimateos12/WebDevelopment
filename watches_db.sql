-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 23, 2022 alle 16:18
-- Versione del server: 10.4.19-MariaDB
-- Versione PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watches_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `address`
--

CREATE TABLE `address` (
  `ID` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `anagraphic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `anagraphic`
--

CREATE TABLE `anagraphic` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `buy`
--

CREATE TABLE `buy` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `watches_ID` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`watches_ID`)),
  `tot_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `company`
--

CREATE TABLE `company` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `logo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `credit_card`
--

CREATE TABLE `credit_card` (
  `ID` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `number` varchar(50) NOT NULL,
  `security_code` varchar(3) NOT NULL,
  `expiry_date` date NOT NULL,
  `anagraphic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `image`
--

CREATE TABLE `image` (
  `ID` int(11) NOT NULL,
  `image` blob NOT NULL,
  `type` varchar(10) NOT NULL,
  `watch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `order`
--

CREATE TABLE `order` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `watches_ID` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`watches_ID`)),
  `tot_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `role_service`
--

CREATE TABLE `role_service` (
  `ID` int(11) NOT NULL,
  `role_ID` int(11) NOT NULL,
  `service_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `service`
--

CREATE TABLE `service` (
  `ID` int(11) NOT NULL,
  `script` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `shipping`
--

CREATE TABLE `shipping` (
  `ID` int(11) NOT NULL,
  `buy_ID` int(11) NOT NULL,
  `arrival_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `anagraphic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `user_raating`
--

CREATE TABLE `user_raating` (
  `ID` int(11) NOT NULL,
  `vote` tinyint(4) NOT NULL,
  `comment` tinytext NOT NULL,
  `user_ID` int(11) NOT NULL,
  `watch_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `user_role`
--

CREATE TABLE `user_role` (
  `ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `role_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `watch`
--

CREATE TABLE `watch` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `color` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `watch_category`
--

CREATE TABLE `watch_category` (
  `ID` int(11) NOT NULL,
  `watch_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `anagraphic_id` (`anagraphic_id`);

--
-- Indici per le tabelle `anagraphic`
--
ALTER TABLE `anagraphic`
  ADD KEY `ID` (`ID`);

--
-- Indici per le tabelle `buy`
--
ALTER TABLE `buy`
  ADD KEY `ID` (`ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD KEY `ID` (`ID`);

--
-- Indici per le tabelle `company`
--
ALTER TABLE `company`
  ADD KEY `ID` (`ID`);

--
-- Indici per le tabelle `credit_card`
--
ALTER TABLE `credit_card`
  ADD KEY `ID` (`ID`),
  ADD KEY `anagraphic_id` (`anagraphic_id`);

--
-- Indici per le tabelle `image`
--
ALTER TABLE `image`
  ADD KEY `ID` (`ID`),
  ADD KEY `watch_id` (`watch_id`);

--
-- Indici per le tabelle `order`
--
ALTER TABLE `order`
  ADD KEY `ID` (`ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indici per le tabelle `role`
--
ALTER TABLE `role`
  ADD KEY `ID` (`ID`);

--
-- Indici per le tabelle `role_service`
--
ALTER TABLE `role_service`
  ADD KEY `ID` (`ID`),
  ADD KEY `role_ID` (`role_ID`),
  ADD KEY `service_ID` (`service_ID`);

--
-- Indici per le tabelle `service`
--
ALTER TABLE `service`
  ADD KEY `ID` (`ID`);

--
-- Indici per le tabelle `shipping`
--
ALTER TABLE `shipping`
  ADD KEY `ID` (`ID`),
  ADD KEY `buy_ID` (`buy_ID`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `anagraphic_id` (`anagraphic_id`);

--
-- Indici per le tabelle `user_raating`
--
ALTER TABLE `user_raating`
  ADD KEY `ID` (`ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `watch_ID` (`watch_ID`);

--
-- Indici per le tabelle `user_role`
--
ALTER TABLE `user_role`
  ADD KEY `ID` (`ID`),
  ADD KEY `role_ID` (`role_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indici per le tabelle `watch`
--
ALTER TABLE `watch`
  ADD KEY `ID` (`ID`),
  ADD KEY `company_id` (`company_id`);

--
-- Indici per le tabelle `watch_category`
--
ALTER TABLE `watch_category`
  ADD KEY `ID` (`ID`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `watch_id` (`watch_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `address`
--
ALTER TABLE `address`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `buy`
--
ALTER TABLE `buy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `company`
--
ALTER TABLE `company`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `image`
--
ALTER TABLE `image`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `role_service`
--
ALTER TABLE `role_service`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `service`
--
ALTER TABLE `service`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `user_raating`
--
ALTER TABLE `user_raating`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `user_role`
--
ALTER TABLE `user_role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `watch`
--
ALTER TABLE `watch`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `watch_category`
--
ALTER TABLE `watch_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`anagraphic_id`) REFERENCES `anagraphic` (`ID`);

--
-- Limiti per la tabella `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`);

--
-- Limiti per la tabella `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `credit_card_ibfk_1` FOREIGN KEY (`anagraphic_id`) REFERENCES `anagraphic` (`ID`);

--
-- Limiti per la tabella `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`watch_id`) REFERENCES `watch` (`ID`);

--
-- Limiti per la tabella `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`);

--
-- Limiti per la tabella `role_service`
--
ALTER TABLE `role_service`
  ADD CONSTRAINT `role_service_ibfk_1` FOREIGN KEY (`role_ID`) REFERENCES `role` (`ID`),
  ADD CONSTRAINT `role_service_ibfk_2` FOREIGN KEY (`service_ID`) REFERENCES `service` (`ID`);

--
-- Limiti per la tabella `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`buy_ID`) REFERENCES `buy` (`ID`);

--
-- Limiti per la tabella `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`anagraphic_id`) REFERENCES `anagraphic` (`ID`);

--
-- Limiti per la tabella `user_raating`
--
ALTER TABLE `user_raating`
  ADD CONSTRAINT `user_raating_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `user_raating_ibfk_2` FOREIGN KEY (`watch_ID`) REFERENCES `watch` (`ID`);

--
-- Limiti per la tabella `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`role_ID`) REFERENCES `role` (`ID`),
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`user_ID`) REFERENCES `user` (`ID`);

--
-- Limiti per la tabella `watch`
--
ALTER TABLE `watch`
  ADD CONSTRAINT `watch_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`ID`);

--
-- Limiti per la tabella `watch_category`
--
ALTER TABLE `watch_category`
  ADD CONSTRAINT `watch_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`ID`),
  ADD CONSTRAINT `watch_category_ibfk_2` FOREIGN KEY (`watch_id`) REFERENCES `watch` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
