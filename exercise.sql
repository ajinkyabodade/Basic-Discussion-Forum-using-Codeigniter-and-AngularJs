-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 03:11 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exercise`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cid` int(11) NOT NULL,
  `toid` int(100) NOT NULL,
  `fromid` int(100) NOT NULL,
  `comnt` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cid`, `toid`, `fromid`, `comnt`) VALUES
(26, 40, 17, 'sample comment'),
(76, 40, 17, 'hiiiiiiii'),
(77, 55, 17, 'Sample Comment'),
(88, 54, 38, 'aaaaaaaaaaaa'),
(89, 54, 17, 'Samople'),
(90, 40, 17, 'aaaaaaaaaa'),
(91, 54, 17, '00000000000'),
(92, 40, 17, 'asd'),
(93, 40, 17, 'asd'),
(94, 40, 17, 'asd'),
(95, 40, 17, 'wer'),
(96, 54, 17, 'ssssssss'),
(97, 54, 17, 'ssssssss'),
(98, 54, 17, 'ssssssss'),
(99, 54, 17, 'ssssssss'),
(100, 54, 17, 'ssssssss'),
(101, 54, 17, 'ssssssss'),
(102, 54, 17, 'ssssssss'),
(103, 54, 0, 'ssssssss'),
(104, 56, 17, 'asd'),
(105, 56, 0, 'asd'),
(106, 58, 17, 'asd'),
(107, 57, 17, 'abbbbbbbbbb'),
(108, 62, 0, 'sdadasd'),
(109, 62, 0, 'sdadasd'),
(110, 62, 0, 'sdadasd'),
(111, 62, 0, 'sdadasd'),
(112, 63, 17, 'aaaaaaaaaaaaaa'),
(113, 66, 17, 'aaaaaaaaaaaaa'),
(114, 56, 17, 'zx'),
(115, 55, 0, '0'),
(116, 55, 0, '0'),
(117, 55, 0, '0'),
(118, 55, 0, '0'),
(119, 55, 0, 'gh'),
(120, 55, 0, 'gh'),
(121, 55, 0, 'gh'),
(122, 55, 0, 'gh'),
(123, 55, 0, 'gh'),
(124, 55, 0, 'gh'),
(125, 55, 0, 'gh'),
(126, 55, 0, 'gh'),
(127, 55, 17, 'wwwwww');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `lid` int(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `descn` varchar(200) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`lid`, `subject`, `descn`, `uid`, `date`) VALUES
(40, 'ccccccccc', 'ccccccccccccccc', 14, '14/01/2019'),
(54, 'alumni', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 14, '15/01/2019'),
(55, 'ssss', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a', 17, '21/01/2019'),
(56, 'Sample Subject', 'Lorem Ipsum is ssimmply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type', 17, '22/01/2019'),
(57, 'alumni', 'Hi this is Sample', 17, '22/01/2019'),
(58, '%%%%%%', '%%%%%%', 17, '22/01/2019'),
(59, 'bbbbbbbbb', 'bbbbbbbb', 0, '22/01/2019'),
(60, 'vvvvvvv', 'vvvvvvvv', 0, '22/01/2019'),
(61, 'gggggggg', 'Sample', 17, '22/01/2019'),
(62, 'ssssssssss', 'ffffffffff', 17, '22/01/2019'),
(63, 'sssssss', 'ffffffffff', 17, '22/01/2019'),
(64, 'sssssssss', 'sssssssss', 17, '22/01/2019'),
(65, 'nnnnnnnn', 'nnnnnnnnnn', 17, '22/01/2019'),
(66, 'ddddddddddddddddddd', 'ddddddddddddd', 17, '22/01/2019'),
(67, 'eeeeeeeeeeeee', 'eeeeeee', 17, '22/01/2019'),
(68, 'aaaaaaaaaaaaa', 'aaaaaaaaaaaa', 17, '22/01/2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `fname`, `password`) VALUES
(2, 'xyz@gmail.com', 'XYZ', 'xyz'),
(3, 'mno@gmail.com', 'mno', 'mno'),
(5, 'qwe@gmail.com', 'qwe', 'qwe'),
(6, 'asd@gmail.com', 'asd', 'asd'),
(7, 'zxc@gmail.com', 'zxc', 'zxc'),
(8, 'poi@gmail.com', 'poi', 'poi'),
(9, 'lkj@gmail.com', 'lkj', 'lkj'),
(10, 'dfg@gmail.com', 'dfg', 'dfg'),
(11, 'rty@gmail.com', 'rty', 'rty'),
(14, 'ajinkyabo', 'asdasd', '12346578'),
(17, 'abc@gmail.com', 'abc', 'abc'),
(18, 'asdfghjkl@gmail.com', 'asdfghjkl@gmail.com', '123456'),
(19, 'asdasdasda@gmail.com', 'asdasdasda@gmail.com', 'aaaaaaaaaaaa'),
(20, 'sadsdfsdfsdf@gmail.com', 'sadsdfsdfsdf@gmail.com', '2222222222222222'),
(21, 'ajinkya@gmail.com', 'ajinkya@gmail.com', 'ajinkya'),
(22, '112@gmail.com', '00000', '0000'),
(23, 'qqqqqqq@gmail.com', 'aaaaaaaaa', 'qqqqqqq'),
(24, 'ggg@gmail.com', 'asd', 'asd'),
(25, 'hhh@gmail.com', 'hhh', 'hhh'),
(26, 'eee@gmail.com', 'eee', 'eee'),
(27, 'ttt@gmail.com', 'ttt', 'ttt'),
(28, 'uuu@gmail.com', 'uuu', 'uuu'),
(29, 'iii@gmail.com', 'iii', 'iii'),
(30, 'ooo@gmail.com', 'ooo', 'ooo'),
(31, 'kkk@gmail', 'kkk', 'kkk'),
(32, 'kkk@gmail', 'kkk', 'kkk'),
(33, 'kkk@gmail', 'kkk', 'kkk'),
(34, 'jjj@gmail', 'jjj', 'jjj'),
(35, 'jjj@gmail', 'jjj', 'jjj'),
(36, 'jjj@gmail', 'jjj', 'jjj'),
(37, 'ccc@gmail.com', 'ccc', 'ccc'),
(38, 'vvv@gmail.com', 'vvv', 'vvv');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `lid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
