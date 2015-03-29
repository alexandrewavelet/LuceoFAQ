-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 29 Mars 2015 à 03:56
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `luceofaq`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `pkQuestion` int(11) NOT NULL AUTO_INCREMENT,
  `question_en` varchar(255) NOT NULL,
  `question_fr` varchar(255) NOT NULL,
  `answer_en` text NOT NULL,
  `answer_fr` text NOT NULL,
  `wiki_url` varchar(255) NOT NULL,
  PRIMARY KEY (`pkQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `questions_tags`
--

CREATE TABLE IF NOT EXISTS `questions_tags` (
  `pkQuestion` int(11) NOT NULL,
  `pkTag` int(11) NOT NULL,
  PRIMARY KEY (`pkQuestion`,`pkTag`),
  KEY `fk_tag_questions` (`pkTag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `pkTag` int(11) NOT NULL AUTO_INCREMENT,
  `tag_en` varchar(30) NOT NULL,
  `tag_fr` varchar(30) NOT NULL,
  PRIMARY KEY (`pkTag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `questions_tags`
--
ALTER TABLE `questions_tags`
  ADD CONSTRAINT `fk_tag_questions` FOREIGN KEY (`pkTag`) REFERENCES `tags` (`pkTag`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_question_tags` FOREIGN KEY (`pkQuestion`) REFERENCES `questions` (`pkQuestion`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
