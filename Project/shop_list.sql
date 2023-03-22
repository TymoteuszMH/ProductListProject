-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Mar 2023, 17:13
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `shop_list`
--

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `list`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `list` (
`ID` int(11)
,`SKU` varchar(50)
,`Name` text
,`PRICE` float
,`Title` tinytext
,`Atribute` varchar(40)
,`Description` varchar(40)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `SKU` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `PRICE` float NOT NULL,
  `TypeID` int(11) NOT NULL,
  `Description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producttype`
--

CREATE TABLE `producttype` (
  `IDType` int(11) NOT NULL,
  `Title` tinytext DEFAULT NULL,
  `Atribute` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `producttype`
--

INSERT INTO `producttype` (`IDType`, `Title`, `Atribute`) VALUES
(1, 'DVD', 'Size'),
(2, 'Book', 'Weight'),
(3, 'Furniture', 'H/W/L');

-- --------------------------------------------------------

--
-- Struktura widoku `list`
--
DROP TABLE IF EXISTS `list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list`  AS SELECT `product`.`ID` AS `ID`, `product`.`SKU` AS `SKU`, `product`.`Name` AS `Name`, `product`.`PRICE` AS `PRICE`, `producttype`.`Title` AS `Title`, `producttype`.`Atribute` AS `Atribute`, `product`.`Description` AS `Description` FROM (`product` join `producttype`) WHERE `product`.`TypeID` = `producttype`.`IDType` ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `SKU` (`SKU`),
  ADD KEY `TypeID` (`TypeID`);

--
-- Indeksy dla tabeli `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`IDType`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT dla tabeli `producttype`
--
ALTER TABLE `producttype`
  MODIFY `IDType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`TypeID`) REFERENCES `producttype` (`IDType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
