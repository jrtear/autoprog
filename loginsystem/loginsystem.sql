-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Loomise aeg: Jaan 19, 2021 kell 01:00 PL
-- Serveri versioon: 5.7.24
-- PHP versioon: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `loginsystem`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Andmete tõmmistamine tabelile `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(2, 'admin2', 'test12');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `car_type` varchar(60) NOT NULL,
  `bodytype` varchar(60) NOT NULL,
  `motor` varchar(70) NOT NULL,
  `fuel` varchar(60) NOT NULL,
  `gearbox` varchar(60) NOT NULL,
  `image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Andmete tõmmistamine tabelile `car`
--

INSERT INTO `car` (`id`, `name`, `car_type`, `bodytype`, `motor`, `fuel`, `gearbox`, `image`) VALUES
(2, 'mercedes', 'sedaan', 'universaal', '220 kw', 'diisel', 'poolautomaat', 'mercedes.jpg'),
(5, 'volvo', 's&otilde;iduauto', 'sedaan', '2.0 MY2019 (140 kW)', 'bensiin', 'automaat (Geartronic 8k)', 'volvo.jpg'),
(6, 'Audi A6', 's&otilde;iduauto', 'universaal', '3.0 TDI (150 kW)', 'diisel', 'automaat', 'audia6.jpg'),
(7, 'Subaru Forester', 'maastur', 'universaal', '2.0 (116 kW)', 'bensiin', 'automaat', 'subaru.jpg');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Andmete tõmmistamine tabelile `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `contactno`, `posting_date`) VALUES
(13, 'Johan-Rasmus', 'TeÃ¤r', 'johanrasmustear97@gmail.com', 'qwerty', '564691354', '2021-01-15 01:03:19');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeksid tabelile `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indeksid tabelile `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT tabelile `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT tabelile `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
