-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2018 at 01:34 PM
-- Server version: 5.6.40-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazine`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `story` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(100) NOT NULL,
  `sub` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `story`, `email`, `date`, `category`, `sub`, `status`) VALUES
(2, 'Database Connectivity', 'http://sci-hub.tw/', 'grd_5353@yahoo.com', '2019-01-02', 'Database', 'MYSQL', 'Approved'),
(1, 'How to Set the Opacity of a DIV Background Using CSS', 'Hello everyone!<br><br>\r\n\r\nSome people call it the smoked or glass effect -- it''s the ability to set the opacity or transparency of a background of an overlaying div using CSS. You might want to use this technique to ensure text is clearly legible when it overlays an image or even other text without blocking it completely.<br><br>\r\n\r\nWhile you could use <b>opacity:0.5</b> to make it 50% transparent, this has the side effect of making everything in the DIV semi-transparent, not just the background. If this isn''t your intention, save that one for another time.<br><br>\r\n\r\nA better solution is to use <b>rgba()</b> which controls not only the color but the alpha transparency as well. Unfortunately it doesn''t work with some older browsers so it is a good idea to also include a fallback by solid background color.', 'riyazahmad5353@gmail.com', '2018-03-10', 'Web Design', 'CSS', 'Approved'),
(3, 'Importance of CIA triad', 'https://whatis.techtarget.com/definition/Confidentiality-integrity-and-availability-CIA', 'grd_5353@yahoo.com', '2018-11-19', 'Web Security', 'MYSQLI', 'Approved'),
(48, 'JavaScript and jQuery? The truth about the difference', 'Have you ever walked down a hallway in the dark and found yourself lost? JavaScript and JQuery create the same sense of loss and confusion. When discussing JavaScript and JQuery people will say the funniest things about the two, one quote I heard a long time ago on the subject:<br><br>\r\n\r\n<i>JavaScript I hate, what we should do is get rid of it. But JQuery I love!</i><br><br><br>\r\n\r\nWhat is so funny about the above statement is without JavaScript there would be no JQuery. All good tools have a foundation and without a doubt JavaScript has created a lot of modern day tools that assist in building features into our website and online application experience. Why the confusion around this subject of JavaScript?, that is what is being discussed in this article.<br><br>\r\n\r\n<b>What is JavaScript?</b><br>\r\nJavaScript is a computer language that is used inside your web browser. It is dominantly used for interface interactions (meaning the flashy moving parts inside your  website). If you have every seen a slide show on the internet like the image below it is more likely to be JavaScript Scripting that will be doing the hard work behind the scenes. But JavaScript can do much more if you have a Gmail account with Google the email client uses JavaScript to create the features and functionality creating a rich user experience. Being a very powerful computer language it has the advantage of being easy to learn so a new developer can pick it up in a very short amount of time. It was created to be very readable and flexible, Wikipedia have a great description of JavaScript. In the past, JavaScript had issues with each web browser having its own way of implementing it, this created bugs and developers would spend more time fixing the bugs. This made it hard to work with. Today that is not so much of an issue as all the major web browsers conform to a standard meaning that these bugs are not great issues anymore.<br><br><br>\r\n\r\n<b>What is JQuery?</b><br>\r\nBefore JQuery, developers would create their own small frameworks (group of code) this would allow all the developers to work around all the bugs and give them more time to work on features, so the JavaScript frameworks were born. Then came the collaboration stage, groups of developers instead of writing their own code would give it away for free and creating JavaScript code sets that everyone could use. That is what JQuery is, a library of JavaScript code. The best way to explain JQuery and its mission is well stated on the front page of the JQuery website which says:<br><br>\r\n\r\n<i>JQuery is a fast and concise JavaScript Library that simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development.</i><br><br>\r\n\r\nAs you can see all JQuery is, is JavaScript. There is more than one type of JavaScript set of code sets like MooTools it is just that JQuery is the most popular. Which is better to use JavaScript or JQuery? This is a question that is constantly asked.', 'grd_5353@yahoo.com', '2018-11-19', 'Web Interactivity', 'JavaScript', 'Approved'),
(50, 'Importance of OOP in PHP', '<p>Greetings everyone!<br /><br />As many of you know, PHP is a server-side scripting language used for the development of web applications which can be embedded into the HTML language. However, many people who have coded in PHP without knowing the real importance of having classes in PHP. Thus, I am going to explain the importance of having Object Oriented Programming (OOP) in PHP which can be seen below:-<br /><br />&nbsp;&nbsp;&nbsp; a) If well designed increase the order inside your projects that means much more code re-usability, reduce the written code, less time spent in troubleshooting.<br />&nbsp;&nbsp;&nbsp; b) Collaboration<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - if you have to work with many other peoples it is much more simple to maintain the code<br />&nbsp;&nbsp;&nbsp; c) Modularity<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - it will give you a very good project organization<br />&nbsp;&nbsp;&nbsp; d) Encapsulation<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - By implementing classes you can hide the code complexity inside the objects and keep only the logic part in the main code.<br /><br />This is not to say that OOP is the One True Way. However, the advantages of object-oriented programming are many. When you need to solve complex programming challenges and want to add code tools to your skill set, OOP is your friend &mdash; and has much greater longevity and utility than Pac-Man or parachute pants.</p>', '0197283@student.kdupg.edu.my', '2018-12-08', 'Server-side Scripting', 'PHP', 'Approved'),
(52, 'PHP isset() vs empty() vs is_null()', 'https://www.virendrachandak.com/techtalk/php-isset-vs-empty-vs-is_null/', '0197283@student.kdupg.edu.my', '2018-12-09', 'Server-side Scripting', 'PHP', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blogid`, `username`, `comment`, `date`) VALUES
(27, 48, 'Naz', 'Should I use JavaScript or JQuery during web development?', '2018-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `blogid`, `username`) VALUES
(1, 1, '1'),
(2, 1, '1'),
(3, 10, 'Riyaz Ahmad'),
(4, 37, 'Riyaz Ahmad'),
(5, 36, 'Riyaz Ahmad'),
(6, 10, 'Ghani Bhaiss'),
(7, 44, 'Riyaz Ahmad'),
(8, 42, 'Riyaz Ahmad'),
(9, 1, 'Naz'),
(10, 1, 'Naz'),
(11, 1, 'Naz');

-- --------------------------------------------------------

--
-- Table structure for table `meetup`
--

CREATE TABLE IF NOT EXISTS `meetup` (
  `id` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `dates` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `participant` int(11) NOT NULL,
  `organiser` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetup`
--

INSERT INTO `meetup` (`id`, `program`, `venue`, `dates`, `starttime`, `endtime`, `participant`, `organiser`) VALUES
(6, 'PHP Programming in 3 Hours', 'Games Lab, KDU College Penang', '2019-01-08', '09:30:00', '12:30:00', 25, 'Naz'),
(1, 'Discussion about HTML DOM and its relation to JavaScript', 'Auditorium, SENTRAL College Penang', '2019-02-01', '12:00:00', '15:00:00', 20, 'John Doe');

-- --------------------------------------------------------

--
-- Table structure for table `meetup_members`
--

CREATE TABLE IF NOT EXISTS `meetup_members` (
  `id` int(11) NOT NULL,
  `meetupid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetup_members`
--

INSERT INTO `meetup_members` (`id`, `meetupid`, `name`) VALUES
(33, 6, 'John Doe'),
(32, 6, 'M. Ghani '),
(31, 6, 'Riyaz Ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `non_members`
--

CREATE TABLE IF NOT EXISTS `non_members` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reasons` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `parent`) VALUES
(1, 'HTML', 'Markup Language'),
(2, 'CSS', 'Web Design'),
(3, 'PHP', 'Server-side Scripting'),
(4, 'ASP.net', 'Server-side Scripting'),
(5, 'XML', 'Markup Language'),
(6, 'JavaScript', 'Web Interactivity'),
(7, 'Information Security ', 'Web Security'),
(8, 'MYSQL', 'Database'),
(9, 'AJAX', 'Server-side Scripting'),
(10, 'phpmyadmin', 'Database');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `details` varchar(100) NOT NULL,
  `sub` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `details`, `sub`, `level`) VALUES
(1, 'Riyaz Ahmad', 'riyazahmad5353@gmail.com', '$2y$11$BbINFyv6F6txeeOgwwnyUe.c0k.yqU4lhhVQcyl6rTOt3lYEs03Ae', 'I am the author of the magazine.', 'PHP', 'admin'),
(3, 'M. Ghani ', 'm.abdulghani96@gmail.com', '$2y$11$BbINFyv6F6txeeOgwwnyUe.c0k.yqU4lhhVQcyl6rTOt3lYEs03Ae', '', '', 'member'),
(25, 'John Doe', 'grd_5353@yahoo.com', '$2y$11$BbINFyv6F6txeeOgwwnyUe.c0k.yqU4lhhVQcyl6rTOt3lYEs03Ae', '', '', 'member'),
(4, 'Naz', '0197283@student.kdupg.edu.my', '$2y$11$GgL4tLpzprIR2oGbt8vxbe61NhAptwOmiOejE8TkhRjncVDBjy.we', '', 'PHP', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetup`
--
ALTER TABLE `meetup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetup_members`
--
ALTER TABLE `meetup_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_members`
--
ALTER TABLE `non_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `meetup`
--
ALTER TABLE `meetup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `meetup_members`
--
ALTER TABLE `meetup_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `non_members`
--
ALTER TABLE `non_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
