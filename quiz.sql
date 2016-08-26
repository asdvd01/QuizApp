-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2016 at 06:27 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `usernm` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `previlege` varchar(1) NOT NULL DEFAULT 'n'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `userid`, `usernm`, `pass`, `previlege`) VALUES
(1, 'ashu', 'Ashutosh', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'a'),
(2, 'rohit', 'Rohit Sahoo', '2996e434dccac83d3194fe7f7cc85fb00b9828b0', 'n'),
(3, 'suchi', 'suchismita chinara', 'd4c8a8cbbe310f6d02888d2ea119f93373ca9c4a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `qa_1`
--

CREATE TABLE `qa_1` (
  `id` int(6) UNSIGNED NOT NULL,
  `q` varchar(200) DEFAULT NULL,
  `a` int(2) DEFAULT NULL,
  `op1` varchar(100) DEFAULT NULL,
  `op2` varchar(100) DEFAULT NULL,
  `op3` varchar(100) DEFAULT NULL,
  `op4` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qa_1`
--

INSERT INTO `qa_1` (`id`, `q`, `a`, `op1`, `op2`, `op3`, `op4`) VALUES
(1, 'What is the latest version of android ?', 2, 'Lollipop', 'Marshamallow', 'Android N', 'KitKat'),
(2, 'Which smartphone does not run on android ?', 3, ' Sprint EVO 4G', 'Samsung Galaxy', 'Motorola Droid X', 'Nokia N8'),
(3, 'Which Year did Google Purchase Android Inc. ?', 1, '2004', '2005', '2006', '2007');

-- --------------------------------------------------------

--
-- Table structure for table `qa_2`
--

CREATE TABLE `qa_2` (
  `id` int(6) UNSIGNED NOT NULL,
  `q` varchar(200) DEFAULT NULL,
  `a` int(2) DEFAULT NULL,
  `op1` varchar(100) DEFAULT NULL,
  `op2` varchar(100) DEFAULT NULL,
  `op3` varchar(100) DEFAULT NULL,
  `op4` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qa_2`
--

INSERT INTO `qa_2` (`id`, `q`, `a`, `op1`, `op2`, `op3`, `op4`) VALUES
(1, '\r\nWhat is the condition for resonant frequency ?', 0, 'Impedence should be Resistive', 'Impedence should be Inductive', 'Impedence should be Capacitive', 'None of Them'),
(2, '\r\nWhat is the voltage applied during open circuit test ?', 2, 'Percentage of rated voltage', 'Above the rated voltage', 'Rated voltage', 'None of Them');

-- --------------------------------------------------------

--
-- Table structure for table `qa_3`
--

CREATE TABLE `qa_3` (
  `id` int(6) UNSIGNED NOT NULL,
  `q` varchar(200) DEFAULT NULL,
  `a` int(2) DEFAULT NULL,
  `op1` varchar(100) DEFAULT NULL,
  `op2` varchar(100) DEFAULT NULL,
  `op3` varchar(100) DEFAULT NULL,
  `op4` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qa_3`
--

INSERT INTO `qa_3` (`id`, `q`, `a`, `op1`, `op2`, `op3`, `op4`) VALUES
(1, 'Who is the father of naruto', 3, 'kakashi', 'nagato', 'Jiraiya', 'minato'),
(2, 'Who is the founder of akatsuki', 0, 'pain', 'oruchimaru', 'itachi', 'sasuke');

-- --------------------------------------------------------

--
-- Table structure for table `qa_4`
--

CREATE TABLE `qa_4` (
  `id` int(6) UNSIGNED NOT NULL,
  `q` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `a` int(2) DEFAULT NULL,
  `op1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qa_5`
--

CREATE TABLE `qa_5` (
  `id` int(6) UNSIGNED NOT NULL,
  `q` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `a` int(2) DEFAULT NULL,
  `op1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op3` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op4` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qa_5`
--

INSERT INTO `qa_5` (`id`, `q`, `a`, `op1`, `op2`, `op3`, `op4`) VALUES
(1, 'Sine wave is an example of ', 3, 'audio signal', 'digital signal', 'oscillatory signal', 'analog signal'),
(2, 'ARQ belongs to which of the following category protocol?', 2, 'congestion control', 'flow control', 'error control', 'routing'),
(3, 'stack belongs to which kind of data structure', 2, 'tree', 'binary', 'linear', 'non-linear'),
(4, 'which of the following is not a type of moduation', 1, 'amplitude', 'voice', 'frequency', 'phase'),
(5, 'which of the following is not a network topology?', 3, 'star', 'bus', 'tree', 'cable');

-- --------------------------------------------------------

--
-- Table structure for table `qa_6`
--

CREATE TABLE `qa_6` (
  `id` int(6) UNSIGNED NOT NULL,
  `q` varchar(200) DEFAULT NULL,
  `a` int(2) DEFAULT NULL,
  `op1` varchar(100) DEFAULT NULL,
  `op2` varchar(100) DEFAULT NULL,
  `op3` varchar(100) DEFAULT NULL,
  `op4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qa_7`
--

CREATE TABLE `qa_7` (
  `id` int(6) UNSIGNED NOT NULL,
  `q` varchar(200) DEFAULT NULL,
  `a` int(2) DEFAULT NULL,
  `op1` varchar(100) DEFAULT NULL,
  `op2` varchar(100) DEFAULT NULL,
  `op3` varchar(100) DEFAULT NULL,
  `op4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `ques` int(10) NOT NULL,
  `avail` tinyint(1) NOT NULL DEFAULT '0',
  `time` int(10) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `NumUsers` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`id`, `name`, `sub`, `type`, `ques`, `avail`, `time`, `start`, `end`, `NumUsers`) VALUES
(1, 'first quiz', 'android', 't', 3, 1, 1, '2016-03-17 11:00:00', '2016-03-18 02:00:00', 0),
(2, 'Electrical', 'Electrical', 't', 2, 0, 2, '2016-03-17 12:00:00', '2016-03-31 12:00:00', 0),
(3, 'naruto', 'naruto', 't', 2, 0, 2, '2016-03-18 02:10:00', '2016-03-19 02:07:00', 0),
(4, 'test', 'SE', 't', 10, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'test', 'CS', 't', 5, 0, 10, '2016-04-14 11:00:00', '2016-04-14 12:00:00', 0),
(6, '6THQUIZ', 'SE', 't', 40, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'xyz', 'abcd', 't', 3, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roll`
--

CREATE TABLE `roll` (
  `id` int(11) NOT NULL,
  `roll` varchar(9) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roll`
--

INSERT INTO `roll` (`id`, `roll`, `name`) VALUES
(1, '111CS0116', 'Vaditya Ramesh'),
(2, '111CS0124', 'Ravi Gohel'),
(3, '112CS0049', 'Navin Modi'),
(4, '112CS0058', 'Akhil Saraswat'),
(5, '112CS0065', 'Siripurapu Sneha'),
(6, '112CS0078', 'Rasmita Hembram'),
(7, '112CS0093', 'Sambit Sahoo'),
(8, '112CS0130', 'Jumle Uday Ravi'),
(9, '112CS0131', 'Om Prakash Acharya'),
(10, '112CS0132', 'Utsav Adhikari'),
(11, '112CS0133', 'Naman Kumar Agarwal'),
(12, '112CS0134', 'Arjun Kumar Agrawal'),
(13, '112CS0135', 'Himanshu Agrawal'),
(14, '112CS0136', 'Vivek Badde'),
(15, '112CS0137', 'Biplab Barik'),
(16, '112CS0138', 'Avinash Kumar Barnwal'),
(17, '112CS0139', 'Anubhav Behera'),
(18, '112CS0140', 'Rohan Kumar Bhoi'),
(19, '112CS0144', 'Bhubanananda Chhatriya'),
(20, '112CS0145', 'Sidhanta Choudhury'),
(21, '112CS0146', 'Abhisek Das'),
(22, '112CS0147', 'Akshay Dawar'),
(23, '112CS0148', 'Ashutosh Dwivedi'),
(24, '112CS0149', 'Kumar Gaurav'),
(25, '112CS0150', 'Kunsoth Haripriya'),
(26, '112CS0151', 'Amrit Kanungo'),
(27, '112CS0152', 'Basir Khan'),
(28, '112CS0155', 'Ashish Kumar'),
(29, '112CS0156', 'Awanish Kumar'),
(30, '112CS0157', 'Kamal Kumar'),
(31, '112CS0158', 'Mayank Kumar'),
(32, '112CS0159', 'Sachidananda Maharana'),
(33, '112CS0161', 'Gopirajunaik Malavathu'),
(34, '112CS0162', 'Nalli Maneesh'),
(35, '112CS0164', 'Chandan Kumar Meher'),
(36, '112CS0165', 'Anjula Mehta'),
(37, '112CS0166', 'Rohit Rajat Mohanty'),
(38, '112CS0167', 'Anirban Nayak'),
(39, '112CS0168', 'Swetaswini Nayak'),
(40, '112CS0170', 'Ritu Panda'),
(41, '112CS0172', 'Sringarika Pandey'),
(42, '112CS0173', 'Tanmay Parasher'),
(43, '112CS0174', 'Sudhanshu Patel'),
(44, '112CS0175', 'Vikas Patidar'),
(45, '112CS0176', 'Abhilash Patro'),
(46, '112CS0178', 'Rasesh Kumar Rout'),
(47, '112CS0180', 'Rohit Kumar Sahoo'),
(48, '112CS0181', 'Sajan Kumar Sahu'),
(49, '112CS0182', 'Md Shahbaz Shafi'),
(50, '112CS0184', 'Shaheen Sultana'),
(51, '112CS0185', 'Smruti Swajalika'),
(52, '112CS0186', 'Manika Tiriya'),
(53, '112CS0187', 'Suryansh Tiwari'),
(54, '112CS0188', 'U K Vishnu'),
(55, '112CS0234', 'Singireddi Hari Krishna'),
(56, '112CS0272', 'Maradana Ravindra Babu'),
(57, '112CS0273', 'Shivanee Gupta'),
(58, '112CS0288', 'Pannala Chetan Reddy'),
(59, '112CS0454', 'Anup Das'),
(60, '112CS0502', 'Andhavaarapu Aditya'),
(61, '112CS0503', 'Abhishek Anand'),
(62, '112CS0504', 'Narendra Kumar Vankayala'),
(63, '112CS0505', 'Gaurav Raghuvanshi'),
(64, '112CS0506', 'Palle Koushik Reddy'),
(65, '112CS0529', 'Pritish Kumar Roy'),
(66, '112CS0556', 'Kamalakanta Jena'),
(67, '112CS0557', 'Swati Mishra'),
(68, '112CS0558', 'Ganesh Prasad Sahoo'),
(69, '112CS0559', 'Anirudh Erabelly'),
(70, '112CS0560', 'Chinmaya Dehury'),
(71, '112CS0561', 'Kruti Kallola Mohanta'),
(72, '112CS0565', 'Sanjay Mishra'),
(73, '112CS0566', 'Gajula Yoshitha'),
(74, '112CS0567', 'Aditya Dash'),
(75, '112CS0621', 'Aditi Dandekar'),
(76, '711CS1029', 'Siddhartha Narayana'),
(77, '712CS1002', 'Siddharth Manu'),
(78, '712CS1033', 'Rohit Baghel'),
(79, '712CS1039', 'Shweta Charchita'),
(80, '712CS1040', 'Soumya Ranjan Swain'),
(81, '712CS1123', 'Saurabh Kanhere'),
(82, '712CS1135', 'Roopsa Das'),
(83, '712CS1142', 'Kankanala Harish Reddy'),
(84, '712CS1146', 'Ramkrushna Pradhan'),
(85, '712CS1154', 'Sitansu Subudhi'),
(86, '712CS2034', 'Sushovan Das'),
(87, '712CS2043', 'Anmol Dalmia'),
(88, '712CS2045', 'Sumeet Garnaik'),
(89, '712CS2048', 'Pratyush Kumar Mohanta'),
(90, '712CS2049', 'Abhishek Patharia'),
(91, '712CS2114', 'Sunil Kumar Mahendrakar'),
(92, '712CS2143', 'Sonu Kumar Saini'),
(93, '712CS2151', 'Suman Sahu'),
(94, '712CS2161', 'Selamneni Girish Chandra');

-- --------------------------------------------------------

--
-- Table structure for table `scores_1`
--

CREATE TABLE `scores_1` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `roll` varchar(20) DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  `start` int(20) NOT NULL,
  `end` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores_1`
--

INSERT INTO `scores_1` (`id`, `name`, `roll`, `score`, `start`, `end`) VALUES
(1, 'Vikas Patidar', '112CS0175', 3, 1460987722, 1460987732);

-- --------------------------------------------------------

--
-- Table structure for table `scores_2`
--

CREATE TABLE `scores_2` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `roll` varchar(20) DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  `start` int(20) NOT NULL,
  `end` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scores_3`
--

CREATE TABLE `scores_3` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `roll` varchar(20) DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  `start` int(20) NOT NULL,
  `end` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scores_4`
--

CREATE TABLE `scores_4` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roll` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  `start` int(20) DEFAULT NULL,
  `end` int(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scores_5`
--

CREATE TABLE `scores_5` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `roll` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  `start` int(20) DEFAULT NULL,
  `end` int(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scores_5`
--

INSERT INTO `scores_5` (`id`, `name`, `roll`, `score`, `start`, `end`) VALUES
(3, 'Akhil Saraswat ', '112cs0058', 5, 1460611800, 1460611858),
(4, 'Naman Kumar Agarwal', '112CS0133', 5, 1460611804, 1460611856),
(6, 'Rohit Rajat Mohanty ', '112CS0166', 2, 1460611893, 1460611938),
(7, 'Rohan Kumar Bhoi', '112CS0140', 4, 1460611915, 1460612142),
(8, 'Rohit Sahoo', '112cs0180', 4, 1460611918, 1460611943),
(40, 'Ganesh Prasad Sahoo', '112cs0558', 5, 1460613785, 1460613817),
(9, 'Sachidananda Maharana', '112cs0159', 4, 1460612006, 1460612055),
(10, 'Anirban Nayak', '112cs0167', 5, 1460612009, 1460612255),
(11, 'Kamalakanta Jena', '112cs0556', 4, 1460612053, 1460612091),
(12, 'Akshay Dawar', '112CS0147', 5, 1460612112, 1460612164),
(13, 'kruti kallola mohanta', '112cs0561', 3, 1460612124, 1460612146),
(14, 'Chandan', '112CS0164', 5, 1460612196, 1460612220),
(18, 'Sanjay Mishra', '112cs0565', 1, 1460612401, 1460612499),
(16, 'Ashutosh Dwivedi', '112cs0148', 4, 1460612261, 1460612478),
(29, 'TANMAY PARASHER ', '112CS0173', 5, 1460612927, 1460612943),
(19, 'Anubhav Behera', '112cs0139', 5, 1460612401, 1460612626),
(22, 'Vivek Badde', '112cs0136', 4, 1460612526, 1460612551),
(21, 'Bhubanananda Chhatriya', '112CS0144', 5, 1460612442, 1460612460),
(23, 'Ashish Kumar', '112CS0155', 5, 1460612541, 1460612563),
(24, 'AVINASH KUMAR BARNWAL', '112cs0138', 5, 1460612545, 1460612570),
(28, 'Uday Jumle', '112cs0130', 3, 1460612906, 1460612951),
(30, 'Smruti Swajalika', '112CS0185', 5, 1460612941, 1460613361),
(32, 'Awanish kumar', '112cs0156', 5, 1460612947, 1460612960),
(33, 'Vikas patidar', '112cs0175', 5, 1460613093, 1460613107),
(37, 'Andhavarapu Aditya', '112CS0502', 5, 1460613548, 1460613659),
(36, 'Palle Koushik Reddy', '112CS0506', 5, 1460613413, 1460613685),
(38, 'Mayank kumar', '112cs0158', 5, 1460613675, 1460613699),
(39, 'BASIR KHAN', '112CS0152', 5, 1460613693, 1460613754),
(41, 'Sambit Sahoo', '112cs0093', 5, 1460613819, 1460613927),
(42, 'Nalli Maneesh', '112CS0162', 5, 1460613855, 1460613868),
(45, 'Amrit Kanungo', '112cs0151', 5, 1460614041, 1460614064),
(44, 'Sudhanshu Patel', '112cs0174', 5, 1460613948, 1460613972),
(46, 'Anup Das', '112CS0454', 5, 1460614248, 1460614292),
(47, 'Navin Modi', '112CS0049', 4, 1460614276, 1460614301),
(48, 'Arjun Kumar Agrawal', '112cs0134', 5, 1460614289, 1460614315),
(50, 'U K Vishnu', '112CS0188', 5, 1460614350, 1460614366),
(51, 'Anjula  Mehta', '112CS0165', 0, 1460614358, 1460614554),
(56, 'Gaurav Raghuvanshi', '112CS0505', 5, 1460615148, 1460615241),
(53, 'Abhilash Patro', '112cs0176', 5, 1460614426, 1460614468),
(54, 'Sajan Kumar Sahu', '112cs0181', 5, 1460614496, 1460614517),
(55, 'Shaheen Sultana', '112CS0184', 4, 1460614781, 1460614864),
(57, 'Biplab barik', '112cs0137', 3, 1460615168, 1460615219);

-- --------------------------------------------------------

--
-- Table structure for table `scores_6`
--

CREATE TABLE `scores_6` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `roll` varchar(20) DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  `start` int(20) DEFAULT NULL,
  `end` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scores_7`
--

CREATE TABLE `scores_7` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `roll` varchar(20) DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  `start` int(20) DEFAULT NULL,
  `end` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa_1`
--
ALTER TABLE `qa_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa_2`
--
ALTER TABLE `qa_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa_3`
--
ALTER TABLE `qa_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa_4`
--
ALTER TABLE `qa_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa_5`
--
ALTER TABLE `qa_5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa_6`
--
ALTER TABLE `qa_6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa_7`
--
ALTER TABLE `qa_7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roll`
--
ALTER TABLE `roll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores_1`
--
ALTER TABLE `scores_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores_2`
--
ALTER TABLE `scores_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores_3`
--
ALTER TABLE `scores_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores_4`
--
ALTER TABLE `scores_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores_5`
--
ALTER TABLE `scores_5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores_6`
--
ALTER TABLE `scores_6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores_7`
--
ALTER TABLE `scores_7`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `qa_1`
--
ALTER TABLE `qa_1`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `qa_2`
--
ALTER TABLE `qa_2`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qa_3`
--
ALTER TABLE `qa_3`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qa_4`
--
ALTER TABLE `qa_4`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qa_5`
--
ALTER TABLE `qa_5`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `qa_6`
--
ALTER TABLE `qa_6`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qa_7`
--
ALTER TABLE `qa_7`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roll`
--
ALTER TABLE `roll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `scores_1`
--
ALTER TABLE `scores_1`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `scores_2`
--
ALTER TABLE `scores_2`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scores_3`
--
ALTER TABLE `scores_3`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scores_4`
--
ALTER TABLE `scores_4`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scores_5`
--
ALTER TABLE `scores_5`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `scores_6`
--
ALTER TABLE `scores_6`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `scores_7`
--
ALTER TABLE `scores_7`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
