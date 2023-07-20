-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Lug 20, 2023 alle 11:54
-- Versione del server: 5.7.21-0ubuntu0.16.04.1
-- Versione PHP: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iykqltua_testing`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `accettatore`
--

CREATE TABLE `accettatore` (
  `id_accettatore` int(11) NOT NULL,
  `n_accettatore` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `allegati_c`
--

CREATE TABLE `allegati_c` (
  `id_all` int(11) NOT NULL,
  `id_com` int(11) NOT NULL,
  `url_file1` varchar(100) NOT NULL,
  `url_file2` varchar(100) NOT NULL,
  `url_file3` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `allegati_p`
--

CREATE TABLE `allegati_p` (
  `id` int(11) NOT NULL,
  `id_preventivo` int(11) NOT NULL,
  `url_file1` varchar(100) NOT NULL,
  `url_file2` varchar(100) NOT NULL,
  `url_file3` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `allegato`
--

CREATE TABLE `allegato` (
  `id_all` int(11) NOT NULL,
  `allegato` varchar(15) NOT NULL,
  `mod_date_allegato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `appuntamenti`
--

CREATE TABLE `appuntamenti` (
  `id_app` int(11) NOT NULL,
  `cliente` varchar(50) DEFAULT NULL,
  `gestore` varchar(50) DEFAULT NULL,
  `veicolo` varchar(40) DEFAULT NULL,
  `targa` varchar(10) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `ora` varchar(10) DEFAULT NULL,
  `tlav` int(11) NOT NULL,
  `stato_pren` varchar(50) DEFAULT NULL,
  `tipo_pren` varchar(50) NOT NULL,
  `tipo_lavorazione` varchar(30) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `note` longtext,
  `email` varchar(50) NOT NULL,
  `data_ins` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ipadd` varchar(15) NOT NULL,
  `ipadd_mod` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `commesse`
--

CREATE TABLE `commesse` (
  `id_com` int(11) NOT NULL,
  `veicolo` varchar(30) DEFAULT NULL,
  `targa` varchar(10) DEFAULT NULL,
  `km` varchar(50) DEFAULT NULL,
  `telaio` varchar(30) DEFAULT NULL,
  `cliente` varchar(50) DEFAULT NULL,
  `indirizzo` varchar(50) DEFAULT NULL,
  `piva` varchar(12) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `itr1` varchar(70) DEFAULT NULL,
  `itr2` varchar(70) DEFAULT NULL,
  `itr3` varchar(70) DEFAULT NULL,
  `itr4` varchar(70) DEFAULT NULL,
  `itr5` varchar(70) DEFAULT NULL,
  `itr6` varchar(70) DEFAULT NULL,
  `itr7` varchar(70) DEFAULT NULL,
  `itr8` varchar(70) DEFAULT NULL,
  `itr9` varchar(70) DEFAULT NULL,
  `itr10` varchar(70) DEFAULT NULL,
  `itr11` varchar(70) DEFAULT NULL,
  `itr12` varchar(70) DEFAULT NULL,
  `itr13` varchar(70) DEFAULT NULL,
  `itr14` varchar(70) DEFAULT NULL,
  `itr15` varchar(70) DEFAULT NULL,
  `for1` varchar(70) DEFAULT NULL,
  `for2` varchar(70) DEFAULT NULL,
  `for3` varchar(70) DEFAULT NULL,
  `for4` varchar(70) DEFAULT NULL,
  `for5` varchar(70) DEFAULT NULL,
  `for6` varchar(70) DEFAULT NULL,
  `for7` varchar(70) DEFAULT NULL,
  `for8` varchar(70) DEFAULT NULL,
  `for9` varchar(70) DEFAULT NULL,
  `for10` varchar(70) DEFAULT NULL,
  `for11` varchar(70) DEFAULT NULL,
  `for12` varchar(70) DEFAULT NULL,
  `for13` varchar(70) DEFAULT NULL,
  `for14` varchar(70) DEFAULT NULL,
  `for15` varchar(70) DEFAULT NULL,
  `q1` decimal(5,1) DEFAULT '0.0',
  `q2` decimal(5,1) DEFAULT '0.0',
  `q3` decimal(5,1) DEFAULT '0.0',
  `q4` decimal(5,1) DEFAULT '0.0',
  `q5` decimal(5,1) DEFAULT '0.0',
  `q6` decimal(5,1) DEFAULT '0.0',
  `q7` decimal(5,1) DEFAULT '0.0',
  `q8` decimal(5,1) DEFAULT '0.0',
  `q9` decimal(5,1) DEFAULT '0.0',
  `q10` decimal(5,1) DEFAULT '0.0',
  `q11` decimal(5,1) DEFAULT '0.0',
  `q12` decimal(5,1) DEFAULT '0.0',
  `q13` decimal(5,1) DEFAULT '0.0',
  `q14` decimal(5,1) DEFAULT '0.0',
  `q15` decimal(5,1) DEFAULT '0.0',
  `iu1` decimal(10,2) DEFAULT '0.00',
  `iu2` decimal(10,2) DEFAULT '0.00',
  `iu3` decimal(10,2) DEFAULT '0.00',
  `iu4` decimal(10,2) DEFAULT '0.00',
  `iu5` decimal(10,2) DEFAULT '0.00',
  `iu6` decimal(10,2) DEFAULT '0.00',
  `iu7` decimal(10,2) DEFAULT '0.00',
  `iu8` decimal(10,2) DEFAULT '0.00',
  `iu9` decimal(10,2) DEFAULT '0.00',
  `iu10` decimal(10,2) DEFAULT '0.00',
  `iu11` decimal(10,2) DEFAULT '0.00',
  `iu12` decimal(10,2) DEFAULT '0.00',
  `iu13` decimal(10,2) DEFAULT '0.00',
  `iu14` decimal(10,2) DEFAULT '0.00',
  `iu15` decimal(10,2) DEFAULT '0.00',
  `sc1` int(3) DEFAULT NULL,
  `sc2` int(3) DEFAULT NULL,
  `sc3` int(3) DEFAULT NULL,
  `sc4` int(3) DEFAULT NULL,
  `sc5` int(3) DEFAULT NULL,
  `sc6` int(3) DEFAULT NULL,
  `sc7` int(3) DEFAULT NULL,
  `sc8` int(3) DEFAULT NULL,
  `sc9` int(3) DEFAULT NULL,
  `sc10` int(3) DEFAULT NULL,
  `sc11` int(3) DEFAULT NULL,
  `sc12` int(3) DEFAULT NULL,
  `sc13` int(3) DEFAULT NULL,
  `sc14` int(3) DEFAULT NULL,
  `sc15` int(3) DEFAULT NULL,
  `imp_1` decimal(10,2) DEFAULT '0.00',
  `imp_2` decimal(10,2) DEFAULT '0.00',
  `imp_3` decimal(10,2) DEFAULT '0.00',
  `imp_4` decimal(10,2) DEFAULT '0.00',
  `imp_5` decimal(10,2) DEFAULT '0.00',
  `imp_6` decimal(10,2) DEFAULT '0.00',
  `imp_7` decimal(10,2) DEFAULT '0.00',
  `imp_8` decimal(10,2) DEFAULT '0.00',
  `imp_9` decimal(10,2) DEFAULT '0.00',
  `imp_10` decimal(10,2) DEFAULT '0.00',
  `imp_11` decimal(10,2) DEFAULT '0.00',
  `imp_12` decimal(10,2) DEFAULT '0.00',
  `imp_13` decimal(10,2) DEFAULT '0.00',
  `imp_14` decimal(10,2) DEFAULT '0.00',
  `imp_15` decimal(10,2) DEFAULT '0.00',
  `totale` decimal(10,2) DEFAULT '0.00',
  `n_tecnico` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `dtscrev` date DEFAULT NULL,
  `noterev` varchar(200) DEFAULT NULL,
  `pagamento` varchar(50) NOT NULL,
  `ultimamod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `allegato` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `gestore`
--

CREATE TABLE `gestore` (
  `id_gest` int(11) NOT NULL,
  `gestore` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `preventivi`
--

CREATE TABLE `preventivi` (
  `id_preventivo` int(11) NOT NULL,
  `veicolo` varchar(30) DEFAULT NULL,
  `targa` varchar(10) DEFAULT NULL,
  `km` varchar(50) DEFAULT NULL,
  `cliente` varchar(50) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `itr1` varchar(70) DEFAULT NULL,
  `itr2` varchar(70) DEFAULT NULL,
  `itr3` varchar(70) DEFAULT NULL,
  `itr4` varchar(70) DEFAULT NULL,
  `itr5` varchar(70) DEFAULT NULL,
  `itr6` varchar(70) DEFAULT NULL,
  `itr7` varchar(70) DEFAULT NULL,
  `itr8` varchar(70) DEFAULT NULL,
  `itr9` varchar(70) DEFAULT NULL,
  `itr10` varchar(70) DEFAULT NULL,
  `itr11` varchar(70) DEFAULT NULL,
  `itr12` varchar(70) DEFAULT NULL,
  `itr13` varchar(70) DEFAULT NULL,
  `itr14` varchar(70) DEFAULT NULL,
  `itr15` varchar(70) DEFAULT NULL,
  `for1` varchar(70) DEFAULT NULL,
  `for2` varchar(70) DEFAULT NULL,
  `for3` varchar(70) DEFAULT NULL,
  `for4` varchar(70) DEFAULT NULL,
  `for5` varchar(70) DEFAULT NULL,
  `for6` varchar(70) DEFAULT NULL,
  `for7` varchar(70) DEFAULT NULL,
  `for8` varchar(70) DEFAULT NULL,
  `for9` varchar(70) DEFAULT NULL,
  `for10` varchar(70) DEFAULT NULL,
  `for11` varchar(70) DEFAULT NULL,
  `for12` varchar(70) DEFAULT NULL,
  `for13` varchar(70) DEFAULT NULL,
  `for14` varchar(70) DEFAULT NULL,
  `for15` varchar(70) DEFAULT NULL,
  `q1` decimal(5,1) DEFAULT '0.0',
  `q2` decimal(5,1) DEFAULT '0.0',
  `q3` decimal(5,1) DEFAULT '0.0',
  `q4` decimal(5,1) DEFAULT '0.0',
  `q5` decimal(5,1) DEFAULT '0.0',
  `q6` decimal(5,1) DEFAULT '0.0',
  `q7` decimal(5,1) DEFAULT '0.0',
  `q8` decimal(5,1) DEFAULT '0.0',
  `q9` decimal(5,1) DEFAULT '0.0',
  `q10` decimal(5,1) DEFAULT '0.0',
  `q11` decimal(5,1) DEFAULT '0.0',
  `q12` decimal(5,1) DEFAULT '0.0',
  `q13` decimal(5,1) DEFAULT '0.0',
  `q14` decimal(5,1) DEFAULT '0.0',
  `q15` decimal(5,1) DEFAULT '0.0',
  `iu1` decimal(10,2) DEFAULT '0.00',
  `iu2` decimal(10,2) DEFAULT '0.00',
  `iu3` decimal(10,2) DEFAULT '0.00',
  `iu4` decimal(10,2) DEFAULT '0.00',
  `iu5` decimal(10,2) DEFAULT '0.00',
  `iu6` decimal(10,2) DEFAULT '0.00',
  `iu7` decimal(10,2) DEFAULT '0.00',
  `iu8` decimal(10,2) DEFAULT '0.00',
  `iu9` decimal(10,2) DEFAULT '0.00',
  `iu10` decimal(10,2) DEFAULT '0.00',
  `iu11` decimal(10,2) DEFAULT '0.00',
  `iu12` decimal(10,2) DEFAULT '0.00',
  `iu13` decimal(10,2) DEFAULT '0.00',
  `iu14` decimal(10,2) DEFAULT '0.00',
  `iu15` decimal(10,2) DEFAULT '0.00',
  `sc1` int(3) DEFAULT NULL,
  `sc2` int(3) DEFAULT NULL,
  `sc3` int(3) DEFAULT NULL,
  `sc4` int(3) DEFAULT NULL,
  `sc5` int(3) DEFAULT NULL,
  `sc6` int(3) DEFAULT NULL,
  `sc7` int(3) DEFAULT NULL,
  `sc8` int(3) DEFAULT NULL,
  `sc9` int(3) DEFAULT NULL,
  `sc10` int(3) DEFAULT NULL,
  `sc11` int(3) DEFAULT NULL,
  `sc12` int(3) DEFAULT NULL,
  `sc13` int(3) DEFAULT NULL,
  `sc14` int(3) DEFAULT NULL,
  `sc15` int(3) DEFAULT NULL,
  `imp_1` decimal(10,2) DEFAULT '0.00',
  `imp_2` decimal(10,2) DEFAULT '0.00',
  `imp_3` decimal(10,2) DEFAULT '0.00',
  `imp_4` decimal(10,2) DEFAULT '0.00',
  `imp_5` decimal(10,2) DEFAULT '0.00',
  `imp_6` decimal(10,2) DEFAULT '0.00',
  `imp_7` decimal(10,2) DEFAULT '0.00',
  `imp_8` decimal(10,2) DEFAULT '0.00',
  `imp_9` decimal(10,2) DEFAULT '0.00',
  `imp_10` decimal(10,2) DEFAULT '0.00',
  `imp_11` decimal(10,2) DEFAULT '0.00',
  `imp_12` decimal(10,2) DEFAULT '0.00',
  `imp_13` decimal(10,2) DEFAULT '0.00',
  `imp_14` decimal(10,2) DEFAULT '0.00',
  `imp_15` decimal(10,2) DEFAULT '0.00',
  `totale` decimal(10,2) DEFAULT '0.00',
  `n_accettatore` varchar(50) DEFAULT NULL,
  `n_tecnico` varchar(50) NOT NULL,
  `pagamento` varchar(50) NOT NULL,
  `data` date DEFAULT NULL,
  `ultimamod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `allegato` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `scnoleggio`
--

CREATE TABLE `scnoleggio` (
  `id_noleggio` int(11) NOT NULL,
  `societacliente` varchar(30) DEFAULT NULL,
  `targa` varchar(10) DEFAULT NULL,
  `modelloauto` varchar(50) DEFAULT NULL,
  `utilizzatore` varchar(50) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `note` varchar(90) DEFAULT NULL,
  `datainiziocontratto` date DEFAULT NULL,
  `datafinecontratto` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `stato_prenotazione`
--

CREATE TABLE `stato_prenotazione` (
  `id_sta` int(11) NOT NULL,
  `stato_pren` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `tecnico`
--

CREATE TABLE `tecnico` (
  `id_tec` int(6) UNSIGNED NOT NULL,
  `n_tecnico` varchar(30) NOT NULL,
  `mod_date_tecnico` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_lavorazione`
--

CREATE TABLE `tipo_lavorazione` (
  `id_lav` int(11) NOT NULL,
  `tipo_lav` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_pagamento`
--

CREATE TABLE `tipo_pagamento` (
  `id_pag` int(11) NOT NULL,
  `stato_pag` varchar(50) NOT NULL,
  `mod_date_pagamento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo_prenotazione`
--

CREATE TABLE `tipo_prenotazione` (
  `id_pre` int(11) NOT NULL,
  `tipo_pren` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id_usr` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `accettatore`
--
ALTER TABLE `accettatore`
  ADD PRIMARY KEY (`id_accettatore`);

--
-- Indici per le tabelle `allegati_c`
--
ALTER TABLE `allegati_c`
  ADD PRIMARY KEY (`id_all`);

--
-- Indici per le tabelle `allegati_p`
--
ALTER TABLE `allegati_p`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `allegato`
--
ALTER TABLE `allegato`
  ADD PRIMARY KEY (`id_all`);

--
-- Indici per le tabelle `appuntamenti`
--
ALTER TABLE `appuntamenti`
  ADD PRIMARY KEY (`id_app`);

--
-- Indici per le tabelle `commesse`
--
ALTER TABLE `commesse`
  ADD PRIMARY KEY (`id_com`);

--
-- Indici per le tabelle `gestore`
--
ALTER TABLE `gestore`
  ADD PRIMARY KEY (`id_gest`);

--
-- Indici per le tabelle `preventivi`
--
ALTER TABLE `preventivi`
  ADD PRIMARY KEY (`id_preventivo`);

--
-- Indici per le tabelle `scnoleggio`
--
ALTER TABLE `scnoleggio`
  ADD PRIMARY KEY (`id_noleggio`);

--
-- Indici per le tabelle `stato_prenotazione`
--
ALTER TABLE `stato_prenotazione`
  ADD PRIMARY KEY (`id_sta`);

--
-- Indici per le tabelle `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`id_tec`);

--
-- Indici per le tabelle `tipo_lavorazione`
--
ALTER TABLE `tipo_lavorazione`
  ADD PRIMARY KEY (`id_lav`);

--
-- Indici per le tabelle `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  ADD PRIMARY KEY (`id_pag`);

--
-- Indici per le tabelle `tipo_prenotazione`
--
ALTER TABLE `tipo_prenotazione`
  ADD PRIMARY KEY (`id_pre`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id_usr`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `accettatore`
--
ALTER TABLE `accettatore`
  MODIFY `id_accettatore` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `allegati_c`
--
ALTER TABLE `allegati_c`
  MODIFY `id_all` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `allegati_p`
--
ALTER TABLE `allegati_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `allegato`
--
ALTER TABLE `allegato`
  MODIFY `id_all` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `appuntamenti`
--
ALTER TABLE `appuntamenti`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `commesse`
--
ALTER TABLE `commesse`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `gestore`
--
ALTER TABLE `gestore`
  MODIFY `id_gest` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `preventivi`
--
ALTER TABLE `preventivi`
  MODIFY `id_preventivo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `scnoleggio`
--
ALTER TABLE `scnoleggio`
  MODIFY `id_noleggio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `stato_prenotazione`
--
ALTER TABLE `stato_prenotazione`
  MODIFY `id_sta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id_tec` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tipo_lavorazione`
--
ALTER TABLE `tipo_lavorazione`
  MODIFY `id_lav` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tipo_pagamento`
--
ALTER TABLE `tipo_pagamento`
  MODIFY `id_pag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tipo_prenotazione`
--
ALTER TABLE `tipo_prenotazione`
  MODIFY `id_pre` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
