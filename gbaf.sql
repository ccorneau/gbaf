-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 21, 2020 at 09:30 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gbaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `date_add` datetime(6) NOT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `id_user`, `id_acteur`, `date_add`, `post`) VALUES
(19, 4, 3, '2020-04-02 17:28:02.000000', 'Merci de votre accompagnement dans mes démarches'),
(20, 4, 4, '2020-04-09 16:53:38.000000', 'Merci de votre accompagnement dans mes démarches'),
(21, 11, 3, '2020-04-20 13:10:38.000000', 'Nouveau commentaire'),
(22, 11, 1, '2020-04-20 13:11:31.000000', 'Deuxieme commentaire'),
(23, 11, 2, '2020-04-20 13:13:16.000000', 'commentaire'),
(24, 10, 1, '2020-04-20 16:55:34.000000', 'Tres content de ce prestataire'),
(25, 1, 2, '2020-04-20 18:43:10.000000', 'J\'attends la réponse du prestataire '),
(26, 1, 4, '2020-04-20 19:15:23.000000', 'Une réponse rapide et de bon conseils'),
(27, 1, 3, '2020-04-21 09:27:23.000000', 'commentaire test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
