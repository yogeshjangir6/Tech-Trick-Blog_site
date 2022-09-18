-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 07:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `postID` int(11) NOT NULL,
  `commentID` int(11) NOT NULL,
  `commentDesc` varchar(500) NOT NULL,
  `commentAuthor` varchar(500) NOT NULL,
  `commentTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`postID`, `commentID`, `commentDesc`, `commentAuthor`, `commentTime`) VALUES
(1, 1, '         hello', 'abc', '2022-09-18 03:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `postTitle` varchar(200) NOT NULL,
  `postDesc` varchar(10000) NOT NULL,
  `postTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `postTag` varchar(40) NOT NULL,
  `postAuthor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `postTitle`, `postDesc`, `postTime`, `postTag`, `postAuthor`) VALUES
(1, 'Tech Tricks blog', '<p>This is tech tricks technical blog</p>\r\n\r\n<p>where users can read blogs about&nbsp;</p>\r\n\r\n<p>programming languages and tech fields&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://images.pexels.com/photos/699459/pexels-photo-699459.jpeg?cs=srgb&amp;dl=pexels-flo-dahm-699459.jpg&amp;fm=jpg\" style=\"height:333px; width:250px\" /></p>\r\n', '2022-09-18 01:41:06', '', 'yogesh'),
(3, 'new post', '<p>this is some post</p>\r\n', '2022-09-18 05:38:06', '', 'abc'),
(4, 'this is post title', '<p>This is post</p>\r\n', '2022-09-18 05:38:08', '', 'abc'),
(5, 'This is new post', '<p>This is post</p>\r\n\r\n<p><img alt=\"\" src=\"https://images.pexels.com/photos/699459/pexels-photo-699459.jpeg?cs=srgb&amp;dl=pexels-flo-dahm-699459.jpg&amp;fm=jpg\" style=\"height:200px; width:150px\" /></p>\r\n', '2022-09-18 05:38:09', '', 'abc'),
(6, 'PHp tutorial ', '<p>this is programming</p>\r\n\r\n<p>php</p>\r\n\r\n<p>tutorial</p>\r\n\r\n<p><img alt=\"\" src=\"https://images.pexels.com/photos/2582937/pexels-photo-2582937.jpeg?cs=srgb&amp;dl=pexels-athena-2582937.jpg&amp;fm=jpg\" style=\"height:225px; width:150px\" /></p>\r\n', '2022-09-18 05:48:42', 'php, tech', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `posts_buffer`
--

CREATE TABLE `posts_buffer` (
  `postID` int(11) NOT NULL,
  `postTitle` varchar(100) NOT NULL,
  `postDesc` varchar(5000) NOT NULL,
  `postTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `postTag` varchar(20) NOT NULL,
  `postAuthor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `emailid` varchar(40) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usertype` varchar(50) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `password`, `emailid`, `createdon`, `usertype`) VALUES
(1, 'yogesh', 'yogesh', 'yogesh', 'yogeshjangir2001@gmail.com', '2022-09-18 01:36:50', 'admin'),
(2, 'abc', 'abc', 'abc', 'abc@gmail.com', '2022-09-18 02:48:27', 'normal'),
(3, 'sikar ', 'sikar', 'sikar', 'sikar@gmail.com', '2022-09-18 05:43:23', 'normal'),
(4, 'xyz', 'xyz', 'xyz', 'xyz@gmail.com', '2022-09-18 05:46:58', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `users_buffer`
--

CREATE TABLE `users_buffer` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `emailid` varchar(40) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT current_timestamp(),
  `usertype` varchar(20) NOT NULL DEFAULT 'nornal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `postAuthor` varchar(40) NOT NULL,
  `postID` int(11) NOT NULL,
  `postLikes` int(11) NOT NULL DEFAULT 0,
  `postDisLikes` int(11) NOT NULL,
  `postComments` int(11) NOT NULL DEFAULT 0,
  `postViews` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User and Post relation Table';

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`postAuthor`, `postID`, `postLikes`, `postDisLikes`, `postComments`, `postViews`) VALUES
('yogesh', 1, 5, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `commentID` (`commentID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`),
  ADD UNIQUE KEY `postTitle` (`postTitle`);

--
-- Indexes for table `posts_buffer`
--
ALTER TABLE `posts_buffer`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_buffer`
--
ALTER TABLE `users_buffer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`emailid`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`postID`),
  ADD UNIQUE KEY `postID` (`postID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts_buffer`
--
ALTER TABLE `posts_buffer`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_buffer`
--
ALTER TABLE `users_buffer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
