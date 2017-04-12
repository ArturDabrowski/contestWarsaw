-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Kwi 2017, 13:37
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
-- Struktura tabeli dla tabeli `codes`
--

CREATE TABLE `codes` (
  `id_code` int(3) NOT NULL,
  `id_user` int(11) NOT NULL,
  `code` varchar(12) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `codes`
--

INSERT INTO `codes` (`id_code`, `id_user`, `code`, `active`) VALUES
(1, 0, 'abcdefgh1234', 0),
(2, 0, 'abcdefg12345', 0),
(3, 0, 'abcdef123456', 0),
(4, 0, 'abcde1234567', 0),
(5, 0, 'abcd12345678', 0);

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
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id_user`, `name`, `surname`, `birthDate`, `sex`, `email`, `phone`, `street`, `buildingNr`, `flatNr`, `postCode`, `city`, `country`, `answerFirst`, `answerSecond`, `answerThird`, `answerFourth`, `date`) VALUES
(1, 'Artur', 'Dabek', '1983-02-01', 'Male', 'A@a.pl', '+48 123123', 'Knur', '', '', '0', 'Siema', 'panama', '931,321', '7', '', '', '2017-04-11'),
(2, 'Jasio', 'Jasiowski', '1983-02-01', 'Female', 'A@a.pl', '+48 123123', 'Knur', '', '', '0', 'Knurow', '', '1,748,916', '7', '', '', '2017-04-11'),
(3, 'Jasio', 'Jasiowski', '1983-02-01', 'Female', 'A@a.pl', '+48 123123', 'Knur', '', '', '0', 'Gliwice', '', '1,748,916', '7', '', '', '2017-04-11'),
(4, 'asd', 'as', '1981-02-02', 'Male', 'A@a.pl', '+47 12345678', 'asd', '', '', '0', 'Gliwice', '', '931,321', '5', '', '', '2017-04-11'),
(5, 'Artur', 'Dabrk', '1985-01-02', 'Male', 'A@a.pl', '+48 111', 'asa', '', '', '0', '', '', '931,321', '5', '', '', '2017-04-11'),
(6, 'Janusz', 'Du&Aring;&frac14;y', '1981-03-02', 'Male', 'geniawasilewska2017@gmail.com', '+48 333444777', 'B&Aring;&ordm;dziochy G&Atilde;&sup3;rne', '', '', '0', '', '', '931,321', '5', '', '', '2017-04-11'),
(7, 'Bartosz', 'Klocek', '1987-12-20', 'Male', 'kloc@klocek.gov', '+48 555 666 777', 'B&Aring;&ordm;dziochy G&Atilde;&sup3;rne', '', '', '0', '', 'panama', '931,321', '11', '', '', '2017-04-11');

--
-- Indeksy dla zrzutów tabel
--

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
-- AUTO_INCREMENT dla tabeli `codes`
--
ALTER TABLE `codes`
  MODIFY `id_code` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
