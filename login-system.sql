-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2016 at 12:41 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(50) NOT NULL,
  `area_desc` varchar(200) NOT NULL,
  `categories` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `area_name`, `area_desc`, `categories`) VALUES
(1, 'RecomendaÃ§Ãµes', 'O que vocÃª aprova', '2,4,7,10'),
(2, 'AtenÃ§Ã£o!', 'O que vocÃª desaprova', '3,5,9');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_desc`) VALUES
(2, 'Hospedagem', 'tendo um teto na cabeÃ§a, tÃ¡ tudo bem....'),
(3, 'Lugares', '... perigosos ou que nÃ£o gostei'),
(4, 'AtraÃ§Ãµes', 'Lugares que amamos'),
(5, 'Costumes', 'hÃ¡bitos que podem causar estranheza'),
(6, 'third2', 'third2'),
(7, 'Restaurantes', 'comer Ã© uma necessidades, muitas vezes, um prazer'),
(8, 'cat first area2', 'cat first description'),
(9, 'LogÃ­stica', 'cuidado ao se deslocar para...'),
(10, 'Transporte', '');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(50) NOT NULL,
  `cat_name` varchar(300) NOT NULL,
  `usr_id` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `logo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `cat_id`, `cat_name`, `usr_id`, `location`, `logo`) VALUES
(4, 2, 'Category 1', 1, 'qwwweretvhytjukktkltuil', '0'),
(2, 5, 'second2', 1, 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '0'),
(3, 7, 'first3', 1, 'qwerty qwerty qwerty qwerty qwerty ', '0'),
(83, 2, 'Category 1', 8, 'car bira', '0'),
(84, 2, 'Category 1', 8, 'car bira', '0'),
(11, 3, 'second1', 8, 'praÃ§a do aviÃ£o', '0'),
(10, 7, 'first3', 8, 'esquina mineira', '0'),
(12, 5, 'second2', 8, 'carrefour norte - o atendimento Ã© horrÃ­vel, os caixas sÃ£o lentos', '0'),
(13, 2, 'Category 1', 7, '', '0'),
(14, 4, 'Category 2', 8, 'bar do zÃ©', '0'),
(15, 7, 'first3', 8, 'coxinhas', '0'),
(16, 2, 'Category 1', 7, '', '0'),
(17, 3, 'second1', 1, 'asdfghjkl qwewqerrty xzccvnbxcvn', '0'),
(20, 4, 'Category 2', 1, 'qwew tewsartywry', '0'),
(21, 7, 'first3', 1, 'erwcrwe rwertyvwb rr ', '0'),
(22, 2, 'Category 1', 1, 'dwaer sgsdf yhsjahvdajnswr', '0'),
(23, 3, 'second1', 1, 'aer grt hsrthjswjwwesrvss s hnsjhsgfj', '0'),
(24, 5, 'second2', 1, 'fsf gfsjhd jndghj j dgfj  ghjdgh', '0'),
(25, 2, 'Category 1', 5, 'location', '0'),
(26, 4, 'Category 2', 5, '', '0'),
(27, 4, 'Category 2', 5, 'sdfsfv fb gf', '0'),
(28, 4, 'Category 2', 5, 'sdfsaf fsdgf', '0'),
(29, 7, 'first3', 5, 'dfgsdfg fgh', '0'),
(30, 3, 'second1', 5, 'dfgdfvc bfgb', '0'),
(31, 5, 'second2', 5, 'vgdfvdf fgg', '0'),
(32, 2, 'Category 1', 5, 'vxvxcv fgdfgdfg', '0'),
(33, 2, 'Category 1', 5, 'fghfghg ghdfhfgh', '0'),
(55, 2, 'Category 1', 7, '', '0'),
(42, 2, 'Category 1', 8, 'churras', '0'),
(41, 4, 'Category 2', 8, '', '0'),
(43, 4, 'Category 2', 8, 'incentive', '0'),
(44, 4, 'Category 2', 12, '', '0'),
(45, 2, 'Category 1', 12, 'magazine', '0'),
(46, 3, 'second1', 12, 'restaurant', '0'),
(47, 2, 'Category 1', 12, 'hr 30', '0'),
(52, 4, 'Category 2', 7, '', '0'),
(53, 4, 'Category 2', 7, '', '0'),
(54, 7, 'first3', 7, '', '0'),
(80, 2, 'Category 1', 7, '', '0'),
(93, 4, 'Category 2', 7, 'pulkit', '0'),
(63, 4, 'Category 2', 13, 'chcghgg', '0'),
(62, 3, 'second1', 13, 'ccxscc', '0'),
(64, 4, 'Category 2', 13, 'sdfvdsggg', '0'),
(65, 2, 'Category 1', 13, 'fdfdff', '0'),
(68, 7, 'first3', 7, '', '0'),
(79, 7, 'first3', 7, 'rrr', '0'),
(81, 3, 'second1', 7, 'ssss', '0'),
(82, 5, 'second2', 7, 'ee', '0'),
(72, 4, 'Category 2', 1, 'srvctgvsd', '0'),
(85, 5, 'second2', 8, 'wallmart', '0'),
(86, 7, 'first3', 8, 'wallmart', '0'),
(88, 2, 'Category 1', 7, 'mario', '0'),
(89, 7, 'first3', 7, 'incentive', '0'),
(90, 7, 'first3', 7, 'ddd', '0'),
(94, 5, 'second2', 5, 'fbcbc', '0'),
(95, 5, 'second2', 5, 'tghfd', '0'),
(96, 5, 'second2', 5, '', '0'),
(97, 5, 'second2', 5, 'ghfhfgh', NULL),
(98, 5, 'second2', 5, 'fghfhf', ''),
(99, 5, 'second2', 5, 'gdfg', ''),
(100, 5, 'second2', 5, 'fhgfgh', ''),
(101, 5, 'second2', 5, 'fhgfgh', ''),
(102, 5, 'second2', 5, 'fhgfgh', ''),
(103, 5, 'second2', 5, 'fhgfgh', 'Terrible  '),
(104, 7, 'first3', 5, 'dfgdfg', ''),
(105, 5, 'second2', 5, 'dange comment', 'Danger'),
(106, 5, 'second2', 5, 'terreable', 'Terrible'),
(107, 5, 'second2', 5, 'unpleasent', 'Unpleasant'),
(108, 5, 'second2', 5, 'fgjgj', 'Terrible  '),
(112, 2, 'Hospedagem', 17, 'Hotel Brasilia - muito bom', ''),
(111, 7, 'first3', 5, 'locations ', ''),
(113, 2, 'Hospedagem', 17, 'Pousada Fernandes - Brasilia - razoÃ¡vel', ''),
(114, 7, 'Restaurantes', 17, '', ''),
(115, 3, 'Lugares', 17, 'barraca do zÃ©', 'Unpleasant'),
(116, 3, 'Lugares', 17, 'morro do vidigal - evite', 'Danger'),
(117, 5, 'Costumes', 17, 'mulheres porcas', 'Terrible');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `usrid` int(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `location`, `caption`, `usrid`) VALUES
(4, 'photos/220px-Dark_Knight.jpg', 'batman', 1),
(10, 'photos/2F826850.jpg', 'teste', 8),
(5, 'photos/DSC_0257-tile-001.jpg', 'me', 3),
(7, 'photos/Lighthouse.jpg', 'sdfsdf', 5),
(11, 'photos/16825583-style-Sexy-Patriotic-American-Girl-pin-up-retro-woman-isolated-Stock-Photo.jpg', 'teste 2', 8),
(12, 'photos/beauty.jpg', 'teste 3', 8),
(13, 'photos/Tulips.jpg', 'nfgnfgn', 5),
(15, 'photos/Penguins.jpg', 'jhghjfgjg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `DOB` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` varchar(11) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Nickname` varchar(20) DEFAULT NULL,
  `posting_date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'panding',
  `profile` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `DOB`, `email`, `password`, `usertype`, `Country`, `State`, `City`, `Nickname`, `posting_date`, `status`, `profile`) VALUES
(1, 'Pankaj', 'Adhikari', '1993-01-04', 'iampankaj04@gmail.com', 'pankaj04', '1', 'INDIA', 'Uttarakhand', 'Almora', 'pankaj', '2016-03-24', '', 'photos/WP_20140428_053-001.jpg'),
(3, 'Pankaj', 'Adhikari', '2016-03-01', 'user2@gmail.com', 'user2@', '2', '', '', '', NULL, '2016-03-24', 'approved', ''),
(4, 'user3', 'last name', '2016-04-13', 'user3@gmail.com', 'user3@', '2', '', '', '', NULL, '2016-04-03', 'approved', ''),
(5, 'sandy1', 'mandy', '10/10/2000', 'sandeepmishra000@gmail.com', 's@123456', '1', 'dfgdf', 'dfgdf', 'dfgdf', 'dfgdfg', '2016-04-03', '', 'photos/Lighthouse.jpg'),
(6, 'pulkit', 'sharma', '2016-04-04', 'pulkit.sharma76@yahoo.com', 'pulkit', '1', '', '', '', NULL, '2016-04-03', '', ''),
(7, 'pulkit', 'sharma', '22432', 'sandeepmishra000@gmail.com', 'Admin@123', '1', '', '', '', NULL, '2016-04-03', '', ''),
(8, 'agatha', 'society', '30/01/1979', 'agathasociety@aol.com', 'safira', '1', '', '', '', NULL, '2016-04-04', '', 'photos/Agata_Azul.jpg'),
(9, 'q', 's', '2016-04-13', 'q@gmail.com', 'qwerty', '1', 'INDIA', 'BC', 'gurgaon', 'sasf', '2016-04-05', '', ''),
(10, 'new', 'user', '2016-03-17', 'new@gmail.com', 'new@123', '2', '', '', '', NULL, '2016-04-05', 'panding', ''),
(11, 'test', 'user', '2016-04-04', 'test@gmail.com', 'test@123', '1', '', '', '', NULL, '2016-04-05', '', ''),
(13, 'kajal', 'verma', '1990-10-02', 'kajal@gmail.com', '123456789', '1', '', '', '', NULL, '2016-04-06', '', 'photos/1.JPG'),
(14, 'rudra', 'mishra', '2016-04-11', 'abc@gmail.com', '123456', '1', '', '', '', '', '2016-04-11', '', ''),
(15, 'rudra', 'mishra', '2016-04-11', 'abc', '123455', '2', '', '', '', NULL, '2016-04-11', 'panding', ''),
(16, 'test2', 'test', '10/10/2000', 'test2@gmail.com', 't@123', '2', '', '', '', NULL, '2016-04-11', 'approved', ''),
(17, 'paulo', 'vitor', '30/01/1979', 'paulo.vitor@live.com', 'safira', '1', 'brasil', 'distrito federal', 'goiania', 'pv', '2016-04-13', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
