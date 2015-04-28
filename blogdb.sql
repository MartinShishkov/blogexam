-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2015 at 03:43 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogdb`
--
CREATE DATABASE IF NOT EXISTS `blogdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `blogdb`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `author_email` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `visits` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `date_created`, `visits`) VALUES
(22, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, quas tempor sea ex. Sed ne meis soluta vivendo. Nec te nulla tantas debitis, te aliquam bonorum complectitur nam. Quo cu ferri veritus. Ut omittantur disputationi ius, ei mea quidam malorum. Te vel vocibus euripidis. Sit ne erant cetero, ei wisi epicuri eam, est integre nonumes cu.\r\n\r\nScripta appetere incorrupte eu est. Vix cibo quando perpetua an. No his solet accusamus argumentum. Mel te suas debitis platonem. Sed aeque voluptua ad, no his melius diceret minimum, ea eam apeirian aliquando.\r\n\r\nSea in adhuc omnesque. Choro theophrastus vim te, eu assum falli dolor nec. Nisl legimus vituperata mel et, diam dolore tempor qui ei. Clita graeco per et, ea quo audire maiorum signiferumque, te per simul aperiri. Prompta civibus dissentiet ne nec, quidam denique delicatissimi an nec.\r\n\r\nHinc interesset mei cu, ex duo affert offendit. Altera rationibus comprehensam qui te, alii labitur repudiandae ne mel, eu probo mazim molestiae vis. Te maiorum nominavi intellegat his. Mea lorem quaestio accommodare eu, assentior dissentias an has, ei noster causae mel. No mea congue hendrerit concludaturque. Eu animal iracundia rationibus eam, ea offendit corrumpit vis, et mel harum quaeque iudicabit.', 5, '2015-04-28 16:11:38', 6),
(23, ' interesset mei cu, ex duo affert offendit. Altera', 'Lorem ipsum dolor sit amet, quas tempor sea ex. Sed ne meis soluta vivendo. Nec te nulla tantas debitis, te aliquam bonorum complectitur nam. Quo cu ferri veritus. Ut omittantur disputationi ius, ei mea quidam malorum. Te vel vocibus euripidis. Sit ne erant cetero, ei wisi epicuri eam, est integre nonumes cu.\r\n\r\nScripta appetere incorrupte eu est. Vix cibo quando perpetua an. No his solet accusamus argumentum. Mel te suas debitis platonem. Sed aeque voluptua ad, no his melius diceret minimum, ea eam apeirian aliquando.\r\n\r\nSea in adhuc omnesque. Choro theophrastus vim te, eu assum falli dolor nec. Nisl legimus vituperata mel et, diam dolore tempor qui ei. Clita graeco per et, ea quo audire maiorum signiferumque, te per simul aperiri. Prompta civibus dissentiet ne nec, quidam denique delicatissimi an nec.\r\n\r\nHinc interesset mei cu, ex duo affert offendit. Altera rationibus comprehensam qui te, alii labitur repudiandae ne mel, eu probo mazim molestiae vis. Te maiorum nominavi intellegat his. Mea lorem quaestio accommodare eu, assentior dissentias an has, ei noster causae mel. No mea congue hendrerit concludaturque. Eu animal iracundia rationibus eam, ea offendit corrumpit vis, et mel harum quaeque iudicabit.\r\n\r\nDicunt definitiones ex est, ne commune delicatissimi quo. Sed te elit graeci, primis deserunt ea sit. Ne labitur eripuit mei, ius dicam scaevola hendrerit ne. Id vidisse adversarium has, vis no lorem dicta scaevola, dicunt omnesque prodesset qui ne. Tollit decore ponderum ex eum, ex has semper aeterno intellegam, ea clita insolens est. Cum tation eloquentiam at, te sit principes deseruisse. Ius cu dicta nullam honestatis, et solum oporteat mel.', 6, '2015-04-28 16:15:28', 2),
(24, 'Scripta appetere incorrupte eu est', 'Lorem ipsum dolor sit amet, quas tempor sea ex. Sed ne meis soluta vivendo. Nec te nulla tantas debitis, te aliquam bonorum complectitur nam. Quo cu ferri veritus. Ut omittantur disputationi ius, ei mea quidam malorum. Te vel vocibus euripidis. Sit ne erant cetero, ei wisi epicuri eam, est integre nonumes cu.\r\n\r\nScripta appetere incorrupte eu est. Vix cibo quando perpetua an. No his solet accusamus argumentum. Mel te suas debitis platonem. Sed aeque voluptua ad, no his melius diceret minimum, ea eam apeirian aliquando.\r\n\r\nSea in adhuc omnesque. Choro theophrastus vim te, eu assum falli dolor nec. Nisl legimus vituperata mel et, diam dolore tempor qui ei. Clita graeco per et, ea quo audire maiorum signiferumque, te per simul aperiri. Prompta civibus dissentiet ne nec, quidam denique delicatissimi an nec.\r\n\r\nHinc interesset mei cu, ex duo affert offendit. Altera rationibus comprehensam qui te, alii labitur repudiandae ne mel, eu probo mazim molestiae vis. Te maiorum nominavi intellegat his. Mea lorem quaestio accommodare eu, assentior dissentias an has, ei noster causae mel. No mea congue hendrerit concludaturque. Eu animal iracundia rationibus eam, ea offendit corrumpit vis, et mel harum quaeque iudicabit.\r\n\r\nDicunt definitiones ex est, ne commune delicatissimi quo. Sed te elit graeci, primis deserunt ea sit. Ne labitur eripuit mei, ius dicam scaevola hendrerit ne. Id vidisse adversarium has, vis no lorem dicta scaevola, dicunt omnesque prodesset qui ne. Tollit decore ponderum ex eum, ex has semper aeterno intellegam, ea clita insolens est. Cum tation eloquentiam at, te sit principes deseruisse. Ius cu dicta nullam honestatis, et solum oporteat mel.Lorem ipsum dolor sit amet, quas tempor sea ex. Sed ne meis soluta vivendo. Nec te nulla tantas debitis, te aliquam bonorum complectitur nam. Quo cu ferri veritus. Ut omittantur disputationi ius, ei mea quidam malorum. Te vel vocibus euripidis. Sit ne erant cetero, ei wisi epicuri eam, est integre nonumes cu.\r\n\r\nScripta appetere incorrupte eu est. Vix cibo quando perpetua an. No his solet accusamus argumentum. Mel te suas debitis platonem. Sed aeque voluptua ad, no his melius diceret minimum, ea eam apeirian aliquando.\r\n\r\nSea in adhuc omnesque. Choro theophrastus vim te, eu assum falli dolor nec. Nisl legimus vituperata mel et, diam dolore tempor qui ei. Clita graeco per et, ea quo audire maiorum signiferumque, te per simul aperiri. Prompta civibus dissentiet ne nec, quidam denique delicatissimi an nec.\r\n\r\nHinc interesset mei cu, ex duo affert offendit. Altera rationibus comprehensam qui te, alii labitur repudiandae ne mel, eu probo mazim molestiae vis. Te maiorum nominavi intellegat his. Mea lorem quaestio accommodare eu, assentior dissentias an has, ei noster causae mel. No mea congue hendrerit concludaturque. Eu animal iracundia rationibus eam, ea offendit corrumpit vis, et mel harum quaeque iudicabit.\r\n\r\nDicunt definitiones ex est, ne commune delicatissimi quo. Sed te elit graeci, primis deserunt ea sit. Ne labitur eripuit mei, ius dicam scaevola hendrerit ne. Id vidisse adversarium has, vis no lorem dicta scaevola, dicunt omnesque prodesset qui ne. Tollit decore ponderum ex eum, ex has semper aeterno intellegam, ea clita insolens est. Cum tation eloquentiam at, te sit principes deseruisse. Ius cu dicta nullam honestatis, et solum oporteat mel.Lorem ipsum dolor sit amet, quas tempor sea ex. Sed ne meis soluta vivendo. Nec te nulla tantas debitis, te aliquam bonorum complectitur nam. Quo cu ferri veritus. Ut omittantur disputationi ius, ei mea quidam malorum. Te vel vocibus euripidis. Sit ne erant cetero, ei wisi epicuri eam, est integre nonumes cu.\r\n\r\nScripta appetere incorrupte eu est. Vix cibo quando perpetua an. No his solet accusamus argumentum. Mel te suas debitis platonem. Sed aeque voluptua ad, no his melius diceret minimum, ea eam apeirian aliquando.\r\n\r\nSea in adhuc omnesque. Choro theophrastus vim te, eu assum falli dolor nec. Nisl legimus vituperata mel et, diam dolore tempor qui ei. Clita graeco per et, ea quo audire maiorum signiferumque, te per simul aperiri. Prompta civibus dissentiet ne nec, quidam denique delicatissimi an nec.\r\n\r\nHinc interesset mei cu, ex duo affert offendit. Altera rationibus comprehensam qui te, alii labitur repudiandae ne mel, eu probo mazim molestiae vis. Te maiorum nominavi intellegat his. Mea lorem quaestio accommodare eu, assentior dissentias an has, ei noster causae mel. No mea congue hendrerit concludaturque. Eu animal iracundia rationibus eam, ea offendit corrumpit vis, et mel harum quaeque iudicabit.\r\n\r\nDicunt definitiones ex est, ne commune delicatissimi quo. Sed te elit graeci, primis deserunt ea sit. Ne labitur eripuit mei, ius dicam scaevola hendrerit ne. Id vidisse adversarium has, vis no lorem dicta scaevola, dicunt omnesque prodesset qui ne. Tollit decore ponderum ex eum, ex has semper aeterno intellegam, ea clita insolens est. Cum tation eloquentiam at, te sit principes deseruisse. Ius cu dicta nullam honestatis, et solum oporteat mel.', 6, '2015-04-28 16:15:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

DROP TABLE IF EXISTS `posts_tags`;
CREATE TABLE IF NOT EXISTS `posts_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
`id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `passwordHash` varchar(1024) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwordHash`) VALUES
(5, 'batko', '$2y$10$UD.pmAA/H6SqSSlhIKpw9.3qfmbh8nlDytHh7YvARIJnNGpv9gzzO'),
(6, 'novuser', '$2y$10$35YsD.xj0.Tw84goPR/gwOKa36otxC8hS3eMVNsAelNMJqRL8JbwO'),
(7, 'user3', '$2y$10$hFg5A2b3cNb/FwGS380xGeiKVe5fgmSDv5GYIqsWLZnNuhhHITx8S'),
(8, 'user4', '$2y$10$k.tbq1eik0BZmalU1uebxeK2dB3iBOdVw646QeigdCF4W6hWMEsOS'),
(10, 'user5', '$2y$10$XjH/VuDXOReQKOsJ1vWT6u7V3l64foSLkLKNByRrgbOW/UH7Eaq0m');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_comments_posts1_idx` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_posts_users_idx` (`user_id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
 ADD KEY `fk_posts_tags_posts1_idx` (`post_id`), ADD KEY `fk_posts_tags_tags1_idx` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `fk_comments_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `fk_posts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts_tags`
--
ALTER TABLE `posts_tags`
ADD CONSTRAINT `fk_posts_tags_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_posts_tags_tags1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
