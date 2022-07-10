-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2022 at 12:55 PM
-- Server version: 10.4.22-MariaDB-log
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delish2go`
--
CREATE DATABASE IF NOT EXISTS `delish2go` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `delish2go`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  `korisnickoIme` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ime`, `prezime`, `korisnickoIme`, `password`) VALUES
(14, 'Jovana', 'Jovceska', 'jovanajovceska', '21232f297a57a5a743894a0e4a801fc3'),
(15, 'Bisera', 'Runceva', 'biserarunceva', '21232f297a57a5a743894a0e4a801fc3'),
(17, 'Sandra', 'Petrusevska', 'sandrapetrusevska', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id` int(10) UNSIGNED NOT NULL,
  `ime` varchar(100) NOT NULL,
  `slika` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id`, `ime`, `slika`, `active`) VALUES
(4, 'Пици', 'Food_Category_950.jpg', 'Да'),
(7, 'Врапови', 'Food_Category_569.jpg', 'Да'),
(8, 'Тестенини', 'Food_Category_598.jpg', 'Да'),
(13, 'Бургери', 'Food_Category_805.jpg', 'Да');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `KorisnikID` int(10) UNSIGNED NOT NULL,
  `Adresa` varchar(45) DEFAULT NULL,
  `Ime` varchar(45) DEFAULT NULL,
  `Prezime` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Telefon` varchar(45) DEFAULT NULL,
  `kosnickaID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`KorisnikID`, `Adresa`, `Ime`, `Prezime`, `Email`, `Password`, `Telefon`, `kosnickaID`) VALUES
(1, 'Kumanovo', 'Sandra', 'Petrusevska', 'email1@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '070111000', 1),
(2, 'Skopje', 'Bisera', 'Runceva', 'email2@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '078888222', 2),
(5, 'Skopje', 'Jovana', 'Jovceska', 'email3@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '079999999', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kosnicka`
--

CREATE TABLE `kosnicka` (
  `id` int(10) UNSIGNED NOT NULL,
  `korisnikID` int(10) UNSIGNED NOT NULL,
  `proizvodID` int(10) UNSIGNED NOT NULL,
  `isporacano` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kosnicka`
--

INSERT INTO `kosnicka` (`id`, `korisnikID`, `proizvodID`, `isporacano`) VALUES
(37, 2, 37, 'да'),
(38, 2, 35, 'да'),
(44, 1, 36, 'да'),
(45, 1, 35, 'да'),
(46, 1, 36, 'не'),
(47, 1, 43, 'не'),
(49, 1, 46, 'не');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `ProizvodID` int(10) UNSIGNED NOT NULL,
  `Ime` varchar(100) NOT NULL,
  `Cena` int(11) NOT NULL,
  `slika` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `KategorijaID` int(10) UNSIGNED NOT NULL,
  `RestoranID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`ProizvodID`, `Ime`, `Cena`, `slika`, `active`, `featured`, `KategorijaID`, `RestoranID`) VALUES
(13, 'Класик бургер', 250, 'Food-Name-1549.jpg', 'Да', 'Да', 13, 4),
(35, 'Чизбургер', 120, 'Food-Name-8989.jpg', 'Да', 'Да', 13, 3),
(36, 'Капричиоза', 260, 'Food-Name-6272.jpg', 'Да', 'Да', 4, 4),
(37, 'Маргарита', 300, 'Food-Name-1212.jpg', 'Да', 'Да', 4, 3),
(38, 'Пилешки врап', 280, 'Food-Name-1429.jpg', 'Да', 'Да', 7, 4),
(39, 'Цезар врап', 240, 'Food-Name-4377.jpg', 'Да', 'Не', 7, 3),
(40, 'Болоњезе', 310, 'Food-Name-4174.jpg', 'Да', 'Не', 8, 3),
(41, 'Алфредо', 180, 'Food-Name-2596.jpg', 'Да', 'Не', 8, 4),
(43, 'Beef врап', 230, 'Food-Name-1811.jpg', 'Да', 'Не', 7, 7),
(44, 'Авокадо бургер', 380, 'Food-Name-3059.jpg', 'Да', 'Не', 13, 7),
(45, 'FH бургер', 300, 'Food-Name-9228.jpg', 'Да', 'Не', 13, 7),
(46, 'Beefsteak тестенини', 350, 'Food-Name-4125.jpg', 'Да', 'Не', 8, 7),
(47, 'Muscle пица', 410, 'Food-Name-3293.jpg', 'Да', 'Не', 4, 7),
(49, 'Salmon тестенини', 350, 'Food-Name-3264.jpg', 'Да', 'Не', 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `ID` int(11) NOT NULL,
  `Ime` varchar(45) DEFAULT NULL,
  `Adresa` varchar(45) DEFAULT NULL,
  `RabotnoVreme` varchar(45) DEFAULT NULL,
  `slika` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`ID`, `Ime`, `Adresa`, `RabotnoVreme`, `slika`, `active`) VALUES
(3, 'Мартини', ' бул. Партизански Одреди б.б., ТЦ Лептокарија', '09:00-23:00', 'Restaurant_741.jpg', 'Да'),
(4, 'Дион', 'Кеј 13-ти Ноември, Центар', '09:00-23:00', 'Restaurant_836.jpg', 'Да'),
(7, 'Fitness House', 'бул. Партизански Одреди 40', '08:00-00:00', 'Restaurant_760.jpg', 'Да');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`KorisnikID`);

--
-- Indexes for table `kosnicka`
--
ALTER TABLE `kosnicka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`ProizvodID`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `KorisnikID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `kosnicka`
--
ALTER TABLE `kosnicka`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `ProizvodID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `restoran`
--
ALTER TABLE `restoran`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
