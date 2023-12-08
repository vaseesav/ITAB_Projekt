-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Dez 2023 um 13:55
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mieteinander`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `anzeige`
--

CREATE TABLE `anzeige` (
  `AnzeigenID` int(11) NOT NULL,
  `NutzerID` int(11) DEFAULT NULL,
  `AnzeigenName` varchar(255) DEFAULT NULL,
  `Veranstaltungstyp` varchar(255) DEFAULT NULL,
  `Beschreibung` text DEFAULT NULL,
  `anzahlGaeste` int(11) DEFAULT NULL,
  `Plz` int(11) DEFAULT NULL,
  `Stadt` varchar(255) DEFAULT NULL,
  `Bundesland` varchar(255) DEFAULT NULL,
  `preis` float DEFAULT NULL,
  `istAnzeige` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `anzeige`
--


--
-- Tabellenstruktur für Tabelle `buchungszeitraum`
--

CREATE TABLE `buchungszeitraum` (
  `BuchungszeitraumID` int(11) NOT NULL,
  `AnzeigenID` int(11) DEFAULT NULL,
  `Startdatum` date DEFAULT NULL,
  `Enddatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Tabellenstruktur für Tabelle `foto`
--

CREATE TABLE `foto` (
  `FotoID` int(11) NOT NULL,
  `AnzeigenID` int(11) DEFAULT NULL,
  `Pfad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Tabellenstruktur für Tabelle `gebuchter_zeitraum`
--

CREATE TABLE `gebuchter_zeitraum` (
  `GebuchterZeitraumID` int(11) NOT NULL,
  `AnzeigenID` int(11) NOT NULL,
  `NutzerID` int(11) DEFAULT NULL,
  `Startdatum` date DEFAULT NULL,
  `Enddatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `NutzerID` int(11) NOT NULL,
  `UName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Passworthash` varchar(255) NOT NULL,
  `Zeitstempel` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `anzeige`
--
ALTER TABLE `anzeige`
  ADD PRIMARY KEY (`AnzeigenID`),
  ADD KEY `NutzerID` (`NutzerID`);

--
-- Indizes für die Tabelle `buchungszeitraum`
--
ALTER TABLE `buchungszeitraum`
  ADD PRIMARY KEY (`BuchungszeitraumID`),
  ADD KEY `AnzeigenID` (`AnzeigenID`);

--
-- Indizes für die Tabelle `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`FotoID`),
  ADD KEY `AnzeigenID` (`AnzeigenID`);

--
-- Indizes für die Tabelle `gebuchter_zeitraum`
--
ALTER TABLE `gebuchter_zeitraum`
  ADD PRIMARY KEY (`GebuchterZeitraumID`),
  ADD KEY `BuchungszeitraumID` (`AnzeigenID`),
  ADD KEY `NutzerID` (`NutzerID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NutzerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `anzeige`
--
ALTER TABLE `anzeige`
  MODIFY `AnzeigenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT für Tabelle `buchungszeitraum`
--
ALTER TABLE `buchungszeitraum`
  MODIFY `BuchungszeitraumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT für Tabelle `foto`
--
ALTER TABLE `foto`
  MODIFY `FotoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT für Tabelle `gebuchter_zeitraum`
--
ALTER TABLE `gebuchter_zeitraum`
  MODIFY `GebuchterZeitraumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `NutzerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `anzeige`
--
ALTER TABLE `anzeige`
  ADD CONSTRAINT `anzeige_ibfk_1` FOREIGN KEY (`NutzerID`) REFERENCES `user` (`NutzerID`);

--
-- Constraints der Tabelle `buchungszeitraum`
--
ALTER TABLE `buchungszeitraum`
  ADD CONSTRAINT `buchungszeitraum_ibfk_1` FOREIGN KEY (`AnzeigenID`) REFERENCES `anzeige` (`AnzeigenID`);

--
-- Constraints der Tabelle `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`AnzeigenID`) REFERENCES `anzeige` (`AnzeigenID`);

--
-- Constraints der Tabelle `gebuchter_zeitraum`
--
ALTER TABLE `gebuchter_zeitraum`
  ADD CONSTRAINT `gebuchter_zeitraum_ibfk_2` FOREIGN KEY (`NutzerID`) REFERENCES `user` (`NutzerID`),
  ADD CONSTRAINT `gebuchter_zeitraum_ibfk_3` FOREIGN KEY (`AnzeigenID`) REFERENCES `anzeige` (`AnzeigenID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
