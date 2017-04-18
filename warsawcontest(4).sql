-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Kwi 2017, 11:14
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `warsawcontest`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` text COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(8) COLLATE utf8_polish_ci NOT NULL,
  `secretKey` varchar(8) COLLATE utf8_polish_ci NOT NULL,
  `security` varchar(40) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `secretKey`, `security`) VALUES
(1, 'pwlodkow', 'Trudne1!', '11111111', ''),
(2, 'mkozlow', 'Trudne2@', '22222222', ''),
(3, 'atracz', 'Trudne3#', '33333333', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `codes`
--

CREATE TABLE `codes` (
  `id_code` int(3) NOT NULL,
  `code` varchar(12) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `codes`
--

INSERT INTO `codes` (`id_code`, `code`, `active`) VALUES
(1, 'abcdefgh1234', 0),
(2, 'abcdefg12345', 0),
(3, 'abcdef123456', 0),
(4, 'abcde1234567', 0),
(5, 'abcd12345678', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `birthDate` date NOT NULL,
  `sex` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `street` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `buildingNr` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `flatNr` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `postCode` varchar(6) COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(70) COLLATE utf8_polish_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `answerFirst` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `answerSecond` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `answerThird` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `answerFourth` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `code` varchar(12) COLLATE utf8_polish_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `name`, `surname`, `birthDate`, `sex`, `email`, `phone`, `street`, `buildingNr`, `flatNr`, `postCode`, `city`, `country`, `answerFirst`, `answerSecond`, `answerThird`, `answerFourth`, `code`, `date`) VALUES
(1, 'Artur', 'Dab', '1981-03-01', 'Male', 'A@a.pl', '+48 12345678', 'aasd', 'asd', 'asd', '11-111', 'asda', 'asd', '931,321', '3', '', '', '0', '2017-04-13'),
(2, 'asdasd', 'asdasd', '1981-02-01', 'Male', 'A@a.pl', '+48 12345678', 'asd', 'asd', 'asd', '11-111', 'asd', 'asd', '931,321', '3', '', '', '0', '2017-04-13'),
(3, 'artur', 'dabrowsiikk', '1983-04-04', 'Male', 'art_dabrowski@yahoo.pl', '+47 123', 'asd', 'asd', 'asd', '11-111', 'asd', 'asd', '931,321', '3', 'Ignacy Wyssogota Zakrzewski', 'Ryszard Petru', '3', '2017-04-13'),
(4, 'asd', 'asd', '1989-07-05', 'Male', 'A@a.pl', '+47 111', 'asd', 'asd', 'asd', '11-111', 'asda', 'asd', '931,321', '3', 'Ignacy Wyssogota Zakrzewski', 'JarosÅ‚aw KaczyÅ„ski', '4', '2017-04-13'),
(5, 'hehka', 'asdas', '1980-02-03', 'Male', 'A@a.pl', '+48 1111', 'AS', 'ASD', 'asd', '11-111', 'asd', 'asdasd', '931,321', '5', 'Stefan StarzyÅ„ski', 'JarosÅ‚aw KaczyÅ„ski', '', '2017-04-13'),
(6, 'siema', 'asd', '1980-01-01', 'Male', 'art_dabrowski@yahoo.pl', '+48 111', 'asd', 'asd', 'asd', '11-111', 'asd', 'asd', '931,321', '3', 'Stefan StarzyÅ„ski', 'JarosÅ‚aw KaczyÅ„ski', '', '2017-04-13'),
(8, 'ale jaja', 'asd', '1980-01-01', 'Male', 'A@a.pl', '+48 12345678', 'asd', 'asd', 'asd', '11-111', 'asd', 'asd', '1,748,916', '7', 'Ignacy Wyssogota Zakrzewski', 'Hanna Gronkiewicz Waltz', 'abcdefg12345', '2017-04-13'),
(9, 'artut', 'asdsa', '1981-02-01', 'Male', 'A@a.pl', '+48 12345678', 'asdasd', 'asd', 'asd', '11-111', 'sad', 'asd', '931,321', '3', 'Stefan StarzyÅ„ski', 'JarosÅ‚aw KaczyÅ„ski', 'abcdef123456', '2017-04-13'),
(10, 'artur', 'asasd', '1980-02-01', 'Male', 'A@a.pl', '+48 12345678', 'asdasd', 'asd', 'asd', '11-111', 'sd', 'asd', '931,321', '5', 'Ignacy Wyssogota Zakrzewski', 'Ryszard Petru', 'abcd12345678', '2017-04-13');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `codes`
--
ALTER TABLE `codes`
  MODIFY `id_code` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
