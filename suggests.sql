-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 06:53 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suggests`
--
CREATE DATABASE IF NOT EXISTS `suggests` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `suggests`;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `year` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `year`, `created_at`, `updated_at`) VALUES
(1, 'The Lord Of The Rings: The Fellowship Of The Ring', '2001', '2021-01-01 15:41:57', '2021-04-25 04:44:22'),
(2, 'Star Wars: Episode IV - A New Hope', '1977', '2021-01-01 15:45:47', '2021-01-05 07:35:19'),
(3, 'The Lord Of The Rings: The Return Of The King', '2003', '2021-01-01 15:46:36', '2021-01-05 07:46:57'),
(4, 'The Lord Of The Rings: The Two Towers', '2002', '2021-01-01 15:47:32', '2021-01-05 07:46:03'),
(5, 'Batman Begins', '2005', '2021-01-02 07:34:12', NULL),
(6, 'The Dark Knight', '2008', '2021-01-02 08:08:47', NULL),
(7, 'The Dark Knight Rises', '2012', '2021-01-02 08:24:43', NULL),
(8, 'Avatar', '2009', '2021-01-02 08:34:17', NULL),
(9, 'Battleship', '2012', '2021-01-02 08:35:15', NULL),
(10, 'Cars', '2006', '2021-01-02 08:37:32', NULL),
(11, 'Cars 2', '2011', '2021-01-02 08:38:29', NULL),
(12, 'Cars 3', '2017', '2021-01-02 08:39:59', NULL),
(13, 'Charlie And The Chocolate Factory', '2005', '2021-01-02 08:41:10', NULL),
(14, 'Cloudy With A Chance Of Meatballs', '2009', '2021-01-02 08:42:15', NULL),
(15, 'Cloudy With A Chance Of Meatballs 2', '2013', '2021-01-02 08:43:22', NULL),
(16, 'Despicable Me', '2010', '2021-01-02 08:44:52', NULL),
(17, 'Despicable Me 2', '2013', '2021-01-02 08:45:37', NULL),
(18, 'Despicable Me 3', '2017', '2021-01-02 08:46:34', NULL),
(19, 'Diary Of A Wimpy Kid', '2010', '2021-01-02 08:48:01', NULL),
(20, 'Diary Of A Wimpy Kid: Dog Days', '2012', '2021-01-02 08:48:47', NULL),
(21, 'Diary Of A Wimpy Kid: Rodrick Rules', '2011', '2021-01-02 08:49:42', NULL),
(22, 'Jurassic World', '2015', '2021-01-02 08:50:38', NULL),
(23, 'Kung Fu Panda', '2008', '2021-01-02 08:51:33', NULL),
(24, 'Kung Fu Panda 2', '2011', '2021-01-02 08:52:14', NULL),
(25, 'Kung Fu Panda 3', '2016', '2021-01-02 08:52:53', NULL),
(26, 'Madagascar', '2005', '2021-01-02 08:53:48', NULL),
(27, 'Madagascar: Escape 2 Africa', '2008', '2021-01-02 08:54:47', NULL),
(28, 'Madagascar 3: Europe\'s Most Wanted', '2012', '2021-01-02 08:55:48', NULL),
(29, 'Mr. Bean\'s Holiday', '2007', '2021-01-02 09:07:35', NULL),
(30, 'Mr. Peabody & Sherman', '2014', '2021-01-02 09:12:10', NULL),
(31, 'Night At The Museum', '2006', '2021-01-02 09:13:00', NULL),
(32, 'Night At The Museum: Battle Of The Smithsonian', '2009', '2021-01-02 09:14:03', NULL),
(33, 'Night At The Museum: Secret Of The Tomb', '2014', '2021-01-02 09:17:27', NULL),
(34, 'Penguins Of Madagascar', '2014', '2021-01-02 09:18:23', NULL),
(35, 'Ratatouille', '2007', '2021-01-02 09:19:19', NULL),
(36, 'The Adventures Of Tintin', '2011', '2021-01-02 09:20:16', NULL),
(37, 'The Hobbit: An Unexpected Journey', '2012', '2021-01-02 09:20:55', '2021-01-05 07:48:10'),
(38, 'The Hobbit: The Desolation Of Smaug', '2013', '2021-01-02 09:21:33', '2021-01-05 07:49:33'),
(39, 'The Hobbit: The Battle Of The Five Armies', '2014', '2021-01-02 09:22:37', '2021-01-05 07:50:21'),
(40, 'Zootopia', '2016', '2021-01-02 09:23:32', NULL),
(41, 'Harry Potter And The Sorcerer\'s Stone', '2001', '2021-01-02 09:24:40', '2021-02-01 11:45:24'),
(42, 'Harry Potter And The Chamber Of Secrets', '2002', '2021-01-02 09:25:42', NULL),
(43, 'Harry Potter And The Prisoner Of Azkaban', '2004', '2021-01-02 09:26:31', NULL),
(44, 'Harry Potter And The Goblet Of Fire', '2005', '2021-01-02 09:27:32', NULL),
(45, 'Harry Potter And The Order Of The Phoenix', '2007', '2021-01-02 09:29:07', NULL),
(46, 'Harry Potter And The Half-Blood Prince', '2009', '2021-01-02 09:30:17', NULL),
(47, 'Harry Potter And The Deathly Hallows: Part 1', '2010', '2021-01-02 09:31:32', NULL),
(48, 'Harry Potter And The Deathly Hallows: Part 2', '2011', '2021-01-02 09:32:18', NULL),
(49, 'Jumanji: Welcome To The Jungle', '2017', '2021-01-02 09:37:11', NULL),
(50, 'Jumanji', '1995', '2021-01-02 09:38:09', NULL),
(51, 'Big Hero 6', '2014', '2021-01-02 09:38:53', NULL),
(52, 'Interstellar', '2014', '2021-01-02 09:39:30', NULL),
(53, 'Sherlock Holmes', '2009', '2021-01-02 09:40:15', NULL),
(54, 'Sherlock Holmes: A Game Of Shadows', '2011', '2021-01-02 09:41:46', NULL),
(55, 'Inception', '2010', '2021-01-02 09:42:35', NULL),
(56, 'Rampage', '2018', '2021-01-02 09:43:13', NULL),
(57, 'Ready Player One', '2018', '2021-01-02 09:46:27', NULL),
(58, 'Iron Man', '2008', '2021-01-02 09:47:05', NULL),
(59, 'The Incredible Hulk', '2008', '2021-01-02 09:48:05', NULL),
(60, 'Iron Man 2', '2010', '2021-01-02 09:48:40', NULL),
(61, 'Thor', '2011', '2021-01-02 09:49:23', NULL),
(62, 'Captain America: The First Avenger', '2011', '2021-01-02 09:50:25', NULL),
(63, 'The Avengers', '2012', '2021-01-02 09:51:33', NULL),
(64, 'Iron Man 3', '2013', '2021-01-02 09:52:18', NULL),
(65, 'Thor: The Dark World', '2013', '2021-01-02 09:52:53', NULL),
(66, 'Captain America: The Winter Soldier', '2014', '2021-01-02 09:53:52', NULL),
(67, 'Guardians Of The Galaxy', '2014', '2021-01-02 09:55:39', NULL),
(68, 'Avengers: Age Of Ultron', '2015', '2021-01-02 09:56:24', NULL),
(69, 'Ant-Man', '2015', '2021-01-02 09:58:38', NULL),
(70, 'Captain America: Civil War', '2016', '2021-01-02 09:59:46', NULL),
(71, 'Doctor Strange', '2016', '2021-01-02 10:00:24', NULL),
(72, 'Guardians Of The Galaxy Vol. 2', '2017', '2021-01-02 10:01:11', NULL),
(73, 'Spider-Man: Homecoming', '2017', '2021-01-02 10:01:48', NULL),
(74, 'Thor: Ragnarok', '2017', '2021-01-02 10:02:24', NULL),
(75, 'Black Panther', '2018', '2021-01-02 10:03:24', NULL),
(76, 'Avengers: Infinity War', '2018', '2021-01-02 10:03:59', NULL),
(77, 'Man Of Steel', '2013', '2021-01-02 10:04:33', NULL),
(78, 'Batman V Superman: Dawn Of Justice', '2016', '2021-01-02 10:05:10', NULL),
(79, 'Suicide Squad', '2016', '2021-01-02 10:05:42', NULL),
(80, 'Wonder Woman', '2017', '2021-01-02 10:07:02', NULL),
(81, 'Justice League', '2017', '2021-01-02 10:07:39', NULL),
(82, 'Jurassic World: Fallen Kingdom', '2018', '2021-01-02 10:08:13', NULL),
(83, 'Shutter Island', '2010', '2021-01-02 10:24:57', NULL),
(84, 'The Commuter', '2018', '2021-01-02 10:25:45', NULL),
(85, 'The Imitation Game', '2014', '2021-01-02 10:26:17', NULL),
(86, 'The Martian', '2015', '2021-01-02 10:26:59', NULL),
(87, 'The Prestige', '2006', '2021-01-02 10:27:43', NULL),
(88, 'Pirates Of The Caribbean: The Curse Of The Black Pearl', '2003', '2021-01-02 10:28:17', NULL),
(89, 'Pirates Of The Caribbean: Dead Man\'s Chest', '2006', '2021-01-02 10:28:53', NULL),
(90, 'Pirates Of The Caribbean: At World\'s End', '2007', '2021-01-02 10:29:35', NULL),
(91, 'Pirates Of The Caribbean: On Stranger Tides', '2011', '2021-01-02 10:30:21', NULL),
(92, 'Pirates Of The Caribbean: Dead Men Tell No Tales', '2017', '2021-01-02 10:31:05', NULL),
(93, 'Skyscraper', '2018', '2021-01-02 10:31:37', NULL),
(94, 'Spirit: Stallion Of The Cimarron', '2002', '2021-01-02 10:32:12', NULL),
(95, 'Ant-Man And The Wasp', '2018', '2021-01-02 10:32:49', NULL),
(96, 'The Fast And The Furious', '2001', '2021-01-02 10:33:27', NULL),
(97, '2 Fast 2 Furious', '2003', '2021-01-02 10:34:06', NULL),
(98, 'The Fast And The Furious: Tokyo Drift', '2006', '2021-01-02 10:34:41', NULL),
(99, 'Fast & Furious', '2009', '2021-01-02 10:35:30', NULL),
(100, 'Fast Five', '2011', '2021-01-02 10:35:59', NULL),
(101, 'Fast & Furious 6', '2013', '2021-01-02 10:36:39', NULL),
(102, 'Furious 7', '2015', '2021-01-02 10:37:17', NULL),
(103, 'The Fate Of The Furious', '2017', '2021-01-02 10:38:24', NULL),
(104, 'Fast & Furious Presents: Hobbs & Shaw', '2019', '2021-01-02 10:39:12', NULL),
(105, 'Dunkirk', '2017', '2021-01-02 10:39:47', NULL),
(106, 'In Time', '2011', '2021-01-02 10:40:15', NULL),
(107, 'Venom', '2018', '2021-01-02 10:43:01', NULL),
(108, 'Fantastic Beasts And Where To Find Them', '2016', '2021-01-02 10:43:42', NULL),
(109, 'Fantastic Beasts: The Crimes Of Grindelwald', '2018', '2021-01-02 10:44:31', NULL),
(110, 'Aquaman', '2018', '2021-01-02 10:45:06', NULL),
(111, 'Spider-Man: Into The Spider-Verse', '2018', '2021-01-02 10:45:41', NULL),
(112, 'Up', '2009', '2021-01-02 10:46:13', NULL),
(113, 'It', '2017', '2021-01-02 10:50:27', NULL),
(114, 'La La Land', '2016', '2021-01-02 10:51:02', NULL),
(115, 'Kong: Skull Island', '2017', '2021-01-02 10:51:36', NULL),
(116, 'The Conjuring', '2013', '2021-01-02 10:52:06', NULL),
(117, 'Annabelle', '2014', '2021-01-02 10:52:40', NULL),
(118, 'The Conjuring 2', '2016', '2021-01-02 10:53:18', NULL),
(119, 'Annabelle: Creation', '2017', '2021-01-02 10:53:54', NULL),
(120, 'The Nun', '2018', '2021-01-02 10:54:21', NULL),
(121, 'Captain Marvel', '2019', '2021-01-02 10:54:53', NULL),
(122, 'Shazam!', '2019', '2021-01-02 10:55:30', NULL),
(123, 'Escape Room', '2019', '2021-01-02 10:56:06', NULL),
(124, 'Glass', '2019', '2021-01-02 10:56:31', NULL),
(125, 'Godzilla', '2014', '2021-01-02 10:57:08', NULL),
(126, 'Godzilla: King Of The Monsters', '2019', '2021-01-02 10:57:41', NULL),
(127, 'Source Code', '2011', '2021-01-02 10:58:14', NULL),
(128, 'The Equalizer', '2014', '2021-01-02 10:58:56', NULL),
(129, 'The Equalizer 2', '2018', '2021-01-02 10:59:30', NULL),
(130, 'The Happening', '2008', '2021-01-02 11:00:11', NULL),
(131, 'The Invisible Guest', '2016', '2021-01-02 11:00:44', NULL),
(132, 'Triangle', '2009', '2021-01-02 11:01:14', NULL),
(133, 'Us', '2019', '2021-01-02 11:01:43', NULL),
(134, 'What Happened To Monday', '2017', '2021-01-02 11:02:22', NULL),
(135, 'Avengers: Endgame', '2019', '2021-01-02 11:03:15', NULL),
(136, 'Spider-Man: Far From Home', '2019', '2021-01-02 11:04:29', NULL),
(137, 'It Chapter Two', '2019', '2021-01-02 11:05:23', NULL),
(138, 'Joker', '2019', '2021-01-02 11:05:56', NULL),
(139, 'Jumanji: The Next Level', '2019', '2021-01-02 11:07:20', NULL),
(140, 'Ford V Ferrari', '2019', '2021-01-02 11:07:52', NULL),
(141, 'Sonic The Hedgehog', '2020', '2021-01-02 11:08:24', NULL),
(142, 'Onward', '2020', '2021-01-02 11:09:40', NULL),
(143, 'Dolittle', '2020', '2021-01-02 11:10:18', NULL),
(144, 'Scoob!', '2020', '2021-01-02 11:10:49', NULL),
(145, 'Soul', '2020', '2021-01-02 11:11:25', NULL),
(146, 'Spies In Disguise', '2019', '2021-01-02 11:12:23', NULL),
(147, 'Tenet', '2020', '2021-01-02 11:12:50', NULL),
(148, 'Wonder Woman 1984', '2020', '2021-01-02 11:13:29', NULL),
(149, 'Birds Of Prey', '2020', '2021-01-02 11:14:20', NULL),
(150, '1917', '2019', '2021-01-02 11:16:03', NULL),
(151, 'Star Wars: Episode V - The Empire Strikes Back', '1980', '2021-01-02 12:01:29', '2021-01-05 07:55:27'),
(152, 'Star Wars: Episode VI - Return Of The Jedi', '1983', '2021-01-02 12:02:52', '2021-01-05 07:59:16'),
(153, 'Star Wars: Episode I - The Phantom Menace', '1999', '2021-01-02 12:03:49', '2021-01-05 08:03:11'),
(154, 'Star Wars: Episode II - Attack Of The Clones', '2002', '2021-01-02 12:04:45', '2021-01-10 04:39:18'),
(155, 'Star Wars: Episode III - Revenge Of The Sith', '2005', '2021-01-02 12:05:49', '2021-01-10 04:42:37'),
(156, 'Star Wars: Episode VII - The Force Awakens', '2015', '2021-01-02 12:06:56', '2021-01-10 05:23:11'),
(157, 'Star Wars: Episode VIII - The Last Jedi', '2017', '2021-01-02 12:09:38', '2021-01-10 05:30:14'),
(158, 'Star Wars: Episode IX - The Rise Of Skywalker', '2019', '2021-01-02 12:10:53', '2021-01-10 05:35:27'),
(159, 'Rogue One: A Star Wars Story', '2016', '2021-01-02 12:12:05', '2021-01-10 05:33:15'),
(160, 'Solo: A Star Wars Story', '2018', '2021-01-02 12:13:01', '2021-01-10 05:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `movie_id` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`movie_id`, `genre`) VALUES
(5, 'Action'),
(5, 'Crime'),
(5, 'Drama'),
(6, 'Action'),
(6, 'Crime'),
(6, 'Drama'),
(7, 'Adventure'),
(7, 'Sci-Fi'),
(7, 'Thriller'),
(8, 'Action'),
(8, 'Adventure'),
(8, 'Fantasy'),
(9, 'Action'),
(9, 'Adventure'),
(9, 'Sci-Fi'),
(10, 'Animation'),
(10, 'Comedy'),
(10, 'Family'),
(11, 'Adventure'),
(11, 'Animation'),
(11, 'Comedy'),
(12, 'Adventure'),
(12, 'Animation'),
(12, 'Comedy'),
(13, 'Adventure'),
(13, 'Comedy'),
(13, 'Family'),
(14, 'Adventure'),
(14, 'Animation'),
(14, 'Comedy'),
(15, 'Adventure'),
(15, 'Animation'),
(15, 'Comedy'),
(16, 'Animation'),
(16, 'Comedy'),
(16, 'Crime'),
(17, 'Adventure'),
(17, 'Animation'),
(17, 'Comedy'),
(18, 'Adventure'),
(18, 'Animation'),
(18, 'Comedy'),
(19, 'Comedy'),
(19, 'Drama'),
(19, 'Family'),
(20, 'Comedy'),
(20, 'Family'),
(21, 'Comedy'),
(21, 'Family'),
(22, 'Action'),
(22, 'Adventure'),
(22, 'Sci-Fi'),
(23, 'Action'),
(23, 'Adventure'),
(23, 'Animation'),
(24, 'Action'),
(24, 'Adventure'),
(24, 'Animation'),
(25, 'Action'),
(25, 'Adventure'),
(25, 'Animation'),
(26, 'Adventure'),
(26, 'Animation'),
(26, 'Comedy'),
(27, 'Adventure'),
(27, 'Animation'),
(27, 'Comedy'),
(28, 'Action'),
(28, 'Adventure'),
(28, 'Comedy'),
(29, 'Comedy'),
(29, 'Family'),
(30, 'Adventure'),
(30, 'Animation'),
(30, 'Comedy'),
(31, 'Adventure'),
(31, 'Comedy'),
(31, 'Family'),
(32, 'Adventure'),
(32, 'Comedy'),
(32, 'Family'),
(33, 'Adventure'),
(33, 'Comedy'),
(33, 'Family'),
(34, 'Adventure'),
(34, 'Animation'),
(34, 'Comedy'),
(35, 'Adventure'),
(35, 'Animation'),
(35, 'Comedy'),
(36, 'Action'),
(36, 'Adventure'),
(36, 'Animation'),
(40, 'Adventure'),
(40, 'Animation'),
(40, 'Comedy'),
(42, 'Adventure'),
(42, 'Family'),
(42, 'Fantasy'),
(43, 'Adventure'),
(43, 'Family'),
(43, 'Fantasy'),
(44, 'Adventure'),
(44, 'Family'),
(44, 'Fantasy'),
(45, 'Action'),
(45, 'Adventure'),
(45, 'Family'),
(46, 'Action'),
(46, 'Adventure'),
(46, 'Family'),
(47, 'Adventure'),
(47, 'Family'),
(47, 'Fantasy'),
(48, 'Adventure'),
(48, 'Drama'),
(48, 'Fantasy'),
(49, 'Action'),
(49, 'Adventure'),
(49, 'Comedy'),
(50, 'Adventure'),
(50, 'Comedy'),
(50, 'Family'),
(51, 'Action'),
(51, 'Adventure'),
(51, 'Animation'),
(52, 'Adventure'),
(52, 'Drama'),
(52, 'Sci-Fi'),
(53, 'Action'),
(53, 'Adventure'),
(53, 'Mystery'),
(54, 'Action'),
(54, 'Adventure'),
(54, 'Mystery'),
(55, 'Action'),
(55, 'Adventure'),
(55, 'Sci-Fi'),
(56, 'Action'),
(56, 'Adventure'),
(56, 'Sci-Fi'),
(57, 'Action'),
(57, 'Adventure'),
(57, 'Sci-Fi'),
(58, 'Action'),
(58, 'Adventure'),
(58, 'Sci-Fi'),
(59, 'Action'),
(59, 'Adventure'),
(59, 'Sci-Fi'),
(60, 'Action'),
(60, 'Adventure'),
(60, 'Sci-Fi'),
(61, 'Action'),
(61, 'Adventure'),
(61, 'Fantasy'),
(62, 'Action'),
(62, 'Adventure'),
(62, 'Sci-Fi'),
(63, 'Action'),
(63, 'Adventure'),
(63, 'Sci-Fi'),
(64, 'Action'),
(64, 'Adventure'),
(64, 'Sci-Fi'),
(65, 'Action'),
(65, 'Adventure'),
(65, 'Fantasy'),
(66, 'Action'),
(66, 'Adventure'),
(66, 'Sci-Fi'),
(67, 'Action'),
(67, 'Adventure'),
(67, 'Comedy'),
(68, 'Action'),
(68, 'Adventure'),
(68, 'Sci-Fi'),
(69, 'Action'),
(69, 'Adventure'),
(69, 'Comedy'),
(70, 'Action'),
(70, 'Adventure'),
(70, 'Sci-Fi'),
(71, 'Action'),
(71, 'Adventure'),
(71, 'Fantasy'),
(72, 'Action'),
(72, 'Adventure'),
(72, 'Comedy'),
(73, 'Action'),
(73, 'Adventure'),
(73, 'Sci-Fi'),
(74, 'Action'),
(74, 'Adventure'),
(74, 'Comedy'),
(75, 'Action'),
(75, 'Adventure'),
(75, 'Sci-Fi'),
(76, 'Action'),
(76, 'Adventure'),
(76, 'Sci-Fi'),
(77, 'Action'),
(77, 'Adventure'),
(77, 'Sci-Fi'),
(78, 'Action'),
(78, 'Adventure'),
(78, 'Sci-Fi'),
(79, 'Action'),
(79, 'Adventure'),
(79, 'Fantasy'),
(80, 'Action'),
(80, 'Adventure'),
(80, 'Fantasy'),
(81, 'Action'),
(81, 'Adventure'),
(81, 'Fantasy'),
(82, 'Action'),
(82, 'Adventure'),
(82, 'Sci-Fi'),
(83, 'Mystery'),
(83, 'Thriller'),
(84, 'Action'),
(84, 'Mystery'),
(84, 'Thriller'),
(85, 'Biography'),
(85, 'Drama'),
(85, 'Thriller'),
(86, 'Adventure'),
(86, 'Drama'),
(86, 'Sci-Fi'),
(87, 'Drama'),
(87, 'Mystery'),
(87, 'Sci-Fi'),
(88, 'Action'),
(88, 'Adventure'),
(88, 'Fantasy'),
(89, 'Action'),
(89, 'Adventure'),
(89, 'Fantasy'),
(90, 'Action'),
(90, 'Adventure'),
(90, 'Fantasy'),
(91, 'Action'),
(91, 'Adventure'),
(91, 'Fantasy'),
(92, 'Action'),
(92, 'Adventure'),
(92, 'Fantasy'),
(93, 'Action'),
(93, 'Adventure'),
(93, 'Thriller'),
(94, 'Adventure'),
(94, 'Animation'),
(94, 'Drama'),
(95, 'Action'),
(95, 'Adventure'),
(95, 'Comedy'),
(96, 'Action'),
(96, 'Crime'),
(96, 'Thriller'),
(97, 'Action'),
(97, 'Crime'),
(97, 'Thriller'),
(98, 'Action'),
(98, 'Crime'),
(98, 'Thriller'),
(99, 'Action'),
(99, 'Thriller'),
(100, 'Action'),
(100, 'Adventure'),
(100, 'Crime'),
(101, 'Action'),
(101, 'Adventure'),
(101, 'Thriller'),
(102, 'Action'),
(102, 'Adventure'),
(102, 'Thriller'),
(103, 'Action'),
(103, 'Adventure'),
(103, 'Crime'),
(104, 'Action'),
(104, 'Adventure'),
(104, 'Thriller'),
(105, 'Action'),
(105, 'Drama'),
(105, 'History'),
(106, 'Action'),
(106, 'Sci-Fi'),
(106, 'Thriller'),
(107, 'Action'),
(107, 'Adventure'),
(107, 'Sci-Fi'),
(108, 'Adventure'),
(108, 'Family'),
(108, 'Fantasy'),
(109, 'Adventure'),
(109, 'Family'),
(109, 'Fantasy'),
(110, 'Action'),
(110, 'Adventure'),
(110, 'Fantasy'),
(111, 'Action'),
(111, 'Adventure'),
(111, 'Animation'),
(112, 'Adventure'),
(112, 'Animation'),
(112, 'Comedy'),
(113, 'Horror'),
(114, 'Comedy'),
(114, 'Drama'),
(114, 'Music'),
(115, 'Action'),
(115, 'Adventure'),
(115, 'Fantasy'),
(116, 'Horror'),
(116, 'Mystery'),
(116, 'Thriller'),
(117, 'Horror'),
(117, 'Mystery'),
(117, 'Thriller'),
(118, 'Horror'),
(118, 'Mystery'),
(118, 'Thriller'),
(119, 'Horror'),
(119, 'Mystery'),
(119, 'Thriller'),
(120, 'Horror'),
(120, 'Mystery'),
(120, 'Thriller'),
(121, 'Action'),
(121, 'Adventure'),
(121, 'Sci-Fi'),
(122, 'Action'),
(122, 'Adventure'),
(122, 'Comedy'),
(123, 'Action'),
(123, 'Adventure'),
(123, 'Horror'),
(124, 'Drama'),
(124, 'Sci-Fi'),
(124, 'Thriller'),
(125, 'Action'),
(125, 'Adventure'),
(125, 'Sci-Fi'),
(126, 'Action'),
(126, 'Adventure'),
(126, 'Fantasy'),
(127, 'Action'),
(127, 'Drama'),
(127, 'Mystery'),
(128, 'Action'),
(128, 'Crime'),
(128, 'Thriller'),
(129, 'Action'),
(129, 'Crime'),
(129, 'Thriller'),
(130, 'Drama'),
(130, 'Mystery'),
(130, 'Sci-Fi'),
(131, 'Crime'),
(131, 'Drama'),
(131, 'Mystery'),
(132, 'Fantasy'),
(132, 'Mystery'),
(132, 'Thriller'),
(133, 'Horror'),
(133, 'Mystery'),
(133, 'Thriller'),
(134, 'Action'),
(134, 'Adventure'),
(134, 'Crime'),
(135, 'Action'),
(135, 'Adventure'),
(135, 'Drama'),
(136, 'Action'),
(136, 'Adventure'),
(136, 'Sci-Fi'),
(137, 'Drama'),
(137, 'Fantasy'),
(137, 'Horror'),
(138, 'Crime'),
(138, 'Drama'),
(138, 'Thriller'),
(139, 'Action'),
(139, 'Adventure'),
(139, 'Comedy'),
(140, 'Action'),
(140, 'Biography'),
(140, 'Drama'),
(141, 'Action'),
(141, 'Adventure'),
(141, 'Comedy'),
(142, 'Adventure'),
(142, 'Animation'),
(142, 'Comedy'),
(143, 'Adventure'),
(143, 'Comedy'),
(143, 'Family'),
(144, 'Adventure'),
(144, 'Animation'),
(144, 'Comedy'),
(145, 'Adventure'),
(145, 'Animation'),
(145, 'Comedy'),
(146, 'Action'),
(146, 'Adventure'),
(146, 'Animation'),
(147, 'Action'),
(147, 'Sci-Fi'),
(148, 'Action'),
(148, 'Adventure'),
(148, 'Fantasy'),
(149, 'Action'),
(149, 'Adventure'),
(149, 'Comedy'),
(150, 'Drama'),
(150, 'Thriller'),
(150, 'War'),
(2, 'Action'),
(2, 'Adventure'),
(4, 'Action'),
(4, 'Adventure'),
(4, 'Drama'),
(3, 'Action'),
(3, 'Adventure'),
(3, 'Drama'),
(37, 'Adventure'),
(37, 'Fantasy'),
(38, 'Adventure'),
(38, 'Fantasy'),
(39, 'Adventure'),
(39, 'Fantasy'),
(151, 'Action'),
(151, 'Adventure'),
(151, 'Fantasy'),
(152, 'Action'),
(152, 'Adventure'),
(152, 'Fantasy'),
(153, 'Action'),
(153, 'Adventure'),
(153, 'Fantasy'),
(154, 'Action'),
(154, 'Adventure'),
(154, 'Fantasy'),
(155, 'Action'),
(155, 'Adventure'),
(155, 'Fantasy'),
(156, 'Action'),
(156, 'Adventure'),
(156, 'Sci-Fi'),
(157, 'Action'),
(157, 'Adventure'),
(157, 'Fantasy'),
(159, 'Action'),
(159, 'Adventure'),
(159, 'Sci-Fi'),
(158, 'Action'),
(158, 'Adventure'),
(158, 'Fantasy'),
(160, 'Action'),
(160, 'Adventure'),
(160, 'Sci-Fi'),
(41, 'Adventure'),
(41, 'Family'),
(41, 'Fantasy'),
(1, 'Adventure'),
(1, 'Drama'),
(1, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `movie_related_movies`
--

CREATE TABLE `movie_related_movies` (
  `movie_id` int(11) NOT NULL,
  `related_movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_related_movies`
--

INSERT INTO `movie_related_movies` (`movie_id`, `related_movie_id`) VALUES
(2, 151),
(2, 152),
(2, 153),
(2, 154),
(2, 155),
(2, 156),
(2, 157),
(2, 159),
(2, 158),
(2, 160),
(4, 1),
(4, 3),
(4, 37),
(4, 38),
(4, 39),
(3, 1),
(3, 4),
(3, 37),
(3, 38),
(3, 39),
(37, 1),
(37, 4),
(37, 3),
(37, 38),
(37, 39),
(38, 1),
(38, 4),
(38, 3),
(38, 37),
(38, 39),
(39, 1),
(39, 4),
(39, 3),
(39, 37),
(39, 38),
(151, 2),
(151, 152),
(151, 153),
(151, 154),
(151, 155),
(151, 156),
(151, 157),
(151, 159),
(151, 158),
(151, 160),
(152, 2),
(152, 151),
(152, 153),
(152, 154),
(152, 155),
(152, 156),
(152, 157),
(152, 159),
(152, 158),
(152, 160),
(153, 2),
(153, 151),
(153, 152),
(153, 154),
(153, 155),
(153, 156),
(153, 157),
(153, 159),
(153, 158),
(153, 160),
(154, 2),
(154, 151),
(154, 152),
(154, 153),
(154, 155),
(154, 156),
(154, 157),
(154, 159),
(154, 158),
(154, 160),
(155, 2),
(155, 151),
(155, 152),
(155, 153),
(155, 154),
(155, 156),
(155, 157),
(155, 159),
(155, 158),
(155, 160),
(156, 160),
(156, 158),
(156, 159),
(156, 157),
(156, 155),
(156, 154),
(156, 153),
(156, 152),
(156, 151),
(156, 2),
(157, 160),
(157, 158),
(157, 159),
(157, 156),
(157, 155),
(157, 154),
(157, 153),
(157, 152),
(157, 151),
(157, 2),
(159, 160),
(159, 158),
(159, 157),
(159, 156),
(159, 155),
(159, 154),
(159, 153),
(159, 152),
(159, 151),
(159, 2),
(158, 160),
(158, 159),
(158, 157),
(158, 156),
(158, 155),
(158, 154),
(158, 153),
(158, 152),
(158, 151),
(158, 2),
(160, 158),
(160, 159),
(160, 157),
(160, 156),
(160, 155),
(160, 154),
(160, 153),
(160, 152),
(160, 151),
(160, 2),
(58, 136),
(58, 135),
(58, 121),
(58, 95),
(58, 76),
(58, 75),
(58, 74),
(58, 73),
(58, 72),
(58, 71),
(58, 70),
(58, 69),
(58, 68),
(58, 67),
(58, 66),
(58, 65),
(58, 64),
(58, 63),
(58, 62),
(58, 61),
(58, 60),
(58, 59),
(59, 136),
(59, 135),
(59, 121),
(59, 95),
(59, 76),
(59, 75),
(59, 74),
(59, 73),
(59, 72),
(59, 71),
(59, 70),
(59, 69),
(59, 68),
(59, 67),
(59, 66),
(59, 65),
(59, 64),
(59, 63),
(59, 62),
(59, 61),
(59, 60),
(59, 58),
(60, 136),
(60, 135),
(60, 121),
(60, 95),
(60, 76),
(60, 75),
(60, 74),
(60, 73),
(60, 72),
(60, 71),
(60, 70),
(60, 69),
(60, 68),
(60, 67),
(60, 66),
(60, 65),
(60, 64),
(60, 63),
(60, 62),
(60, 61),
(60, 59),
(60, 58),
(61, 136),
(61, 135),
(61, 121),
(61, 95),
(61, 76),
(61, 75),
(61, 74),
(61, 73),
(61, 72),
(61, 71),
(61, 70),
(61, 69),
(61, 68),
(61, 67),
(61, 66),
(61, 65),
(61, 64),
(61, 63),
(61, 62),
(61, 60),
(61, 59),
(61, 58),
(62, 136),
(62, 135),
(62, 121),
(62, 95),
(62, 76),
(62, 75),
(62, 74),
(62, 73),
(62, 72),
(62, 71),
(62, 70),
(62, 69),
(62, 68),
(62, 67),
(62, 66),
(62, 65),
(62, 64),
(62, 63),
(62, 61),
(62, 60),
(62, 59),
(62, 58),
(63, 136),
(63, 135),
(63, 121),
(63, 95),
(63, 76),
(63, 75),
(63, 74),
(63, 73),
(63, 72),
(63, 71),
(63, 70),
(63, 69),
(63, 68),
(63, 67),
(63, 66),
(63, 65),
(63, 64),
(63, 62),
(63, 61),
(63, 60),
(63, 59),
(63, 58),
(64, 136),
(64, 135),
(64, 121),
(64, 95),
(64, 76),
(64, 75),
(64, 74),
(64, 73),
(64, 72),
(64, 71),
(64, 70),
(64, 69),
(64, 68),
(64, 67),
(64, 66),
(64, 65),
(64, 63),
(64, 62),
(64, 61),
(64, 60),
(64, 59),
(64, 58),
(65, 136),
(65, 135),
(65, 121),
(65, 95),
(65, 76),
(65, 75),
(65, 74),
(65, 73),
(65, 72),
(65, 71),
(65, 70),
(65, 69),
(65, 68),
(65, 67),
(65, 66),
(65, 64),
(65, 63),
(65, 62),
(65, 61),
(65, 60),
(65, 59),
(65, 58),
(66, 136),
(66, 135),
(66, 121),
(66, 95),
(66, 76),
(66, 75),
(66, 74),
(66, 73),
(66, 72),
(66, 71),
(66, 70),
(66, 69),
(66, 68),
(66, 67),
(66, 65),
(66, 64),
(66, 63),
(66, 62),
(66, 61),
(66, 60),
(66, 59),
(66, 58),
(67, 136),
(67, 135),
(67, 121),
(67, 95),
(67, 76),
(67, 75),
(67, 74),
(67, 73),
(67, 72),
(67, 71),
(67, 70),
(67, 69),
(67, 68),
(67, 66),
(67, 65),
(67, 64),
(67, 63),
(67, 62),
(67, 61),
(67, 60),
(67, 59),
(67, 58),
(68, 136),
(68, 135),
(68, 121),
(68, 95),
(68, 76),
(68, 75),
(68, 74),
(68, 73),
(68, 72),
(68, 71),
(68, 70),
(68, 69),
(68, 67),
(68, 66),
(68, 65),
(68, 64),
(68, 63),
(68, 62),
(68, 61),
(68, 60),
(68, 59),
(68, 58),
(69, 136),
(69, 135),
(69, 121),
(69, 95),
(69, 76),
(69, 75),
(69, 74),
(69, 73),
(69, 72),
(69, 71),
(69, 70),
(69, 68),
(69, 67),
(69, 66),
(69, 65),
(69, 64),
(69, 63),
(69, 62),
(69, 61),
(69, 60),
(69, 59),
(69, 58),
(70, 136),
(70, 135),
(70, 121),
(70, 95),
(70, 76),
(70, 75),
(70, 74),
(70, 73),
(70, 72),
(70, 71),
(70, 69),
(70, 68),
(70, 67),
(70, 66),
(70, 65),
(70, 64),
(70, 63),
(70, 62),
(70, 61),
(70, 60),
(70, 59),
(70, 58),
(71, 136),
(71, 135),
(71, 121),
(71, 95),
(71, 76),
(71, 75),
(71, 74),
(71, 73),
(71, 72),
(71, 70),
(71, 69),
(71, 68),
(71, 67),
(71, 66),
(71, 65),
(71, 64),
(71, 63),
(71, 62),
(71, 61),
(71, 60),
(71, 59),
(71, 58),
(72, 136),
(72, 135),
(72, 121),
(72, 95),
(72, 76),
(72, 75),
(72, 74),
(72, 73),
(72, 71),
(72, 70),
(72, 69),
(72, 68),
(72, 67),
(72, 66),
(72, 65),
(72, 64),
(72, 63),
(72, 62),
(72, 61),
(72, 60),
(72, 59),
(72, 58),
(73, 136),
(73, 135),
(73, 121),
(73, 95),
(73, 76),
(73, 75),
(73, 74),
(73, 72),
(73, 71),
(73, 70),
(73, 69),
(73, 68),
(73, 67),
(73, 66),
(73, 65),
(73, 64),
(73, 63),
(73, 62),
(73, 61),
(73, 60),
(73, 59),
(73, 58),
(74, 136),
(74, 135),
(74, 121),
(74, 95),
(74, 76),
(74, 75),
(74, 73),
(74, 72),
(74, 71),
(74, 70),
(74, 69),
(74, 68),
(74, 67),
(74, 66),
(74, 65),
(74, 64),
(74, 63),
(74, 62),
(74, 61),
(74, 60),
(74, 59),
(74, 58),
(75, 136),
(75, 135),
(75, 121),
(75, 95),
(75, 76),
(75, 74),
(75, 73),
(75, 72),
(75, 71),
(75, 70),
(75, 69),
(75, 68),
(75, 67),
(75, 66),
(75, 65),
(75, 64),
(75, 63),
(75, 62),
(75, 61),
(75, 60),
(75, 59),
(75, 58),
(76, 136),
(76, 135),
(76, 121),
(76, 95),
(76, 75),
(76, 74),
(76, 73),
(76, 72),
(76, 71),
(76, 70),
(76, 69),
(76, 68),
(76, 67),
(76, 66),
(76, 65),
(76, 64),
(76, 63),
(76, 62),
(76, 61),
(76, 60),
(76, 59),
(76, 58),
(95, 136),
(95, 135),
(95, 121),
(95, 76),
(95, 75),
(95, 74),
(95, 73),
(95, 72),
(95, 71),
(95, 70),
(95, 69),
(95, 68),
(95, 67),
(95, 66),
(95, 65),
(95, 64),
(95, 63),
(95, 62),
(95, 61),
(95, 60),
(95, 59),
(95, 58),
(121, 136),
(121, 135),
(121, 95),
(121, 76),
(121, 75),
(121, 74),
(121, 73),
(121, 72),
(121, 71),
(121, 70),
(121, 69),
(121, 68),
(121, 67),
(121, 66),
(121, 65),
(121, 64),
(121, 63),
(121, 62),
(121, 61),
(121, 60),
(121, 59),
(121, 58),
(135, 136),
(135, 121),
(135, 95),
(135, 76),
(135, 75),
(135, 74),
(135, 73),
(135, 72),
(135, 71),
(135, 70),
(135, 69),
(135, 68),
(135, 67),
(135, 66),
(135, 65),
(135, 64),
(135, 63),
(135, 62),
(135, 61),
(135, 60),
(135, 59),
(135, 58),
(136, 135),
(136, 121),
(136, 95),
(136, 76),
(136, 75),
(136, 74),
(136, 73),
(136, 72),
(136, 71),
(136, 70),
(136, 69),
(136, 68),
(136, 67),
(136, 66),
(136, 65),
(136, 64),
(136, 63),
(136, 62),
(136, 61),
(136, 60),
(136, 59),
(136, 58),
(1, 4),
(1, 3),
(1, 37),
(1, 38),
(1, 39);

-- --------------------------------------------------------

--
-- Table structure for table `movie_related_tv_series`
--

CREATE TABLE `movie_related_tv_series` (
  `movie_id` int(11) NOT NULL,
  `related_tv_series_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_related_tv_series`
--

INSERT INTO `movie_related_tv_series` (`movie_id`, `related_tv_series_id`) VALUES
(2, 2),
(2, 9),
(151, 2),
(151, 9),
(152, 2),
(152, 9),
(153, 9),
(153, 2),
(154, 9),
(154, 2),
(155, 9),
(155, 2),
(156, 2),
(156, 9),
(157, 2),
(157, 9),
(159, 9),
(159, 2),
(158, 9),
(158, 2),
(160, 9),
(160, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tv_series`
--

CREATE TABLE `tv_series` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tv_series`
--

INSERT INTO `tv_series` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sherlock', '2021-01-02 07:28:16', NULL),
(2, 'The Mandalorian', '2021-01-02 07:30:53', '2021-01-05 07:38:31'),
(3, 'Breaking Bad', '2021-01-02 08:24:00', NULL),
(4, 'Dark', '2021-01-02 11:42:42', NULL),
(5, 'Game Of Thrones', '2021-01-02 11:43:21', NULL),
(6, 'Westworld', '2021-01-02 11:44:03', NULL),
(7, 'Rick And Morty', '2021-01-02 11:45:19', NULL),
(8, 'The Batman', '2021-01-02 11:46:45', NULL),
(9, 'Star Wars: The Clone Wars', '2021-01-02 11:48:36', '2021-01-10 06:21:04'),
(10, 'Avatar: The Last Airbender', '2021-01-02 11:49:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tv_series_genre`
--

CREATE TABLE `tv_series_genre` (
  `tv_series_id` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tv_series_genre`
--

INSERT INTO `tv_series_genre` (`tv_series_id`, `genre`) VALUES
(1, 'Mystery'),
(1, 'Thriller'),
(3, 'Crime'),
(3, 'Sci-Fi'),
(3, 'Thriller'),
(4, 'Crime'),
(4, 'Drama'),
(4, 'Mystery'),
(5, 'Action'),
(5, 'Adventure'),
(5, 'Drama'),
(6, 'Drama'),
(6, 'Mystery'),
(6, 'Sci-Fi'),
(7, 'Adventure'),
(7, 'Animation'),
(7, 'Comedy'),
(8, 'Action'),
(8, 'Adventure'),
(8, 'Animation'),
(10, 'Action'),
(10, 'Adventure'),
(10, 'Animation'),
(2, 'Adventure'),
(2, 'Fantasy'),
(2, 'Sci-Fi'),
(9, 'Action'),
(9, 'Adventure'),
(9, 'Animation');

-- --------------------------------------------------------

--
-- Table structure for table `tv_series_related_movies`
--

CREATE TABLE `tv_series_related_movies` (
  `tv_series_id` int(11) NOT NULL,
  `related_movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tv_series_related_movies`
--

INSERT INTO `tv_series_related_movies` (`tv_series_id`, `related_movie_id`) VALUES
(2, 2),
(2, 151),
(2, 152),
(2, 153),
(2, 154),
(2, 155),
(2, 156),
(2, 157),
(2, 159),
(2, 158),
(2, 160),
(9, 160),
(9, 158),
(9, 159),
(9, 157),
(9, 156),
(9, 155),
(9, 154),
(9, 153),
(9, 152),
(9, 151),
(9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tv_series_related_tv_series`
--

CREATE TABLE `tv_series_related_tv_series` (
  `tv_series_id` int(11) NOT NULL,
  `related_tv_series_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tv_series_related_tv_series`
--

INSERT INTO `tv_series_related_tv_series` (`tv_series_id`, `related_tv_series_id`) VALUES
(2, 9),
(9, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD KEY `movie_genre` (`movie_id`);

--
-- Indexes for table `movie_related_movies`
--
ALTER TABLE `movie_related_movies`
  ADD KEY `movie_related_movies` (`movie_id`);

--
-- Indexes for table `movie_related_tv_series`
--
ALTER TABLE `movie_related_tv_series`
  ADD KEY `movie_related_tv_series` (`movie_id`);

--
-- Indexes for table `tv_series`
--
ALTER TABLE `tv_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_series_genre`
--
ALTER TABLE `tv_series_genre`
  ADD KEY `tv_series_genre` (`tv_series_id`);

--
-- Indexes for table `tv_series_related_movies`
--
ALTER TABLE `tv_series_related_movies`
  ADD KEY `tv_series_related_movies` (`tv_series_id`);

--
-- Indexes for table `tv_series_related_tv_series`
--
ALTER TABLE `tv_series_related_tv_series`
  ADD KEY `tv_series_related_tv_series` (`tv_series_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `tv_series`
--
ALTER TABLE `tv_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);

--
-- Constraints for table `movie_related_movies`
--
ALTER TABLE `movie_related_movies`
  ADD CONSTRAINT `movie_related_movies` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);

--
-- Constraints for table `movie_related_tv_series`
--
ALTER TABLE `movie_related_tv_series`
  ADD CONSTRAINT `movie_related_tv_series` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);

--
-- Constraints for table `tv_series_genre`
--
ALTER TABLE `tv_series_genre`
  ADD CONSTRAINT `tv_series_genre` FOREIGN KEY (`tv_series_id`) REFERENCES `tv_series` (`id`);

--
-- Constraints for table `tv_series_related_movies`
--
ALTER TABLE `tv_series_related_movies`
  ADD CONSTRAINT `tv_series_related_movies` FOREIGN KEY (`tv_series_id`) REFERENCES `tv_series` (`id`);

--
-- Constraints for table `tv_series_related_tv_series`
--
ALTER TABLE `tv_series_related_tv_series`
  ADD CONSTRAINT `tv_series_related_tv_series` FOREIGN KEY (`tv_series_id`) REFERENCES `tv_series` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;