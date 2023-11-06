-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 06:24 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skill2`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `riasec` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `riasec`, `image`) VALUES
(35, 'Associate in Computer Technology', 'REALISTIC', '1.jpg'),
(36, 'Bachelor of Science in Computer Science', 'INVESTIGATIVE', '36.jpg'),
(37, 'Bachelor of Science in Entrepreneurship', 'ENTERPRISING', '37.jpg'),
(38, 'Bachelor of Science in Accounting Information System', 'CONVENTIONAL', '38.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exam_child`
--

CREATE TABLE `exam_child` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `riasec` text NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `exam_child`
--

INSERT INTO `exam_child` (`answer_id`, `question_id`, `exam_id`, `riasec`, `score`) VALUES
(1543, 91, 25, 'REALISTIC', 4),
(1544, 130, 25, 'INVESTIGATIVE', 3),
(1545, 131, 25, 'INVESTIGATIVE', 3),
(1546, 127, 25, 'INVESTIGATIVE', 2),
(1547, 210, 25, 'CONVENTIONAL', 3),
(1548, 173, 25, 'ENTERPRISING', 2),
(1549, 165, 25, 'ENTERPRISING', 3),
(1550, 209, 25, 'CONVENTIONAL', 4),
(1551, 125, 25, 'INVESTIGATIVE', 3),
(1552, 166, 25, 'ENTERPRISING', 2),
(1553, 215, 25, 'CONVENTIONAL', 3),
(1554, 143, 25, 'INVESTIGATIVE', 4),
(1555, 219, 25, 'CONVENTIONAL', 2),
(1556, 135, 25, 'INVESTIGATIVE', 3),
(1557, 103, 25, 'REALISTIC', 2),
(1558, 141, 25, 'INVESTIGATIVE', 3),
(1559, 222, 25, 'CONVENTIONAL', 4),
(1560, 182, 25, 'ENTERPRISING', 1),
(1561, 95, 25, 'REALISTIC', 2),
(1562, 178, 25, 'ENTERPRISING', 3),
(1563, 232, 25, 'CONVENTIONAL', 4),
(1564, 148, 25, 'INVESTIGATIVE', 3),
(1565, 224, 25, 'CONVENTIONAL', 2),
(1566, 105, 25, 'REALISTIC', 1),
(1567, 111, 25, 'REALISTIC', 2),
(1568, 228, 25, 'CONVENTIONAL', 3),
(1569, 229, 25, 'CONVENTIONAL', 4),
(1570, 193, 25, 'ENTERPRISING', 3),
(1571, 144, 25, 'INVESTIGATIVE', 2),
(1572, 104, 25, 'REALISTIC', 3),
(1573, 235, 25, 'CONVENTIONAL', 2),
(1574, 116, 25, 'REALISTIC', 3),
(1575, 202, 25, 'ENTERPRISING', 3),
(1576, 117, 25, 'REALISTIC', 2),
(1577, 234, 25, 'CONVENTIONAL', 1),
(1578, 239, 25, 'CONVENTIONAL', 2),
(1579, 159, 25, 'INVESTIGATIVE', 3),
(1580, 160, 25, 'INVESTIGATIVE', 2),
(1581, 120, 25, 'REALISTIC', 3),
(1582, 156, 25, 'INVESTIGATIVE', 3),
(1583, 206, 26, 'CONVENTIONAL', 4),
(1584, 210, 26, 'CONVENTIONAL', 3),
(1585, 91, 26, 'REALISTIC', 3),
(1586, 83, 26, 'REALISTIC', 4),
(1587, 164, 26, 'ENTERPRISING', 3),
(1588, 85, 26, 'REALISTIC', 2),
(1589, 88, 26, 'REALISTIC', 3),
(1590, 166, 26, 'ENTERPRISING', 1),
(1591, 86, 26, 'REALISTIC', 2),
(1592, 84, 26, 'REALISTIC', 3),
(1593, 218, 26, 'CONVENTIONAL', 4),
(1594, 181, 26, 'ENTERPRISING', 3),
(1595, 180, 26, 'ENTERPRISING', 2),
(1596, 174, 26, 'ENTERPRISING', 1),
(1597, 100, 26, 'REALISTIC', 3),
(1598, 102, 26, 'REALISTIC', 4),
(1599, 217, 26, 'CONVENTIONAL', 3),
(1600, 175, 26, 'ENTERPRISING', 2),
(1601, 135, 26, 'INVESTIGATIVE', 1),
(1602, 220, 26, 'CONVENTIONAL', 3),
(1603, 112, 26, 'REALISTIC', 4),
(1604, 145, 26, 'INVESTIGATIVE', 3),
(1605, 104, 26, 'REALISTIC', 2),
(1606, 231, 26, 'CONVENTIONAL', 1),
(1607, 105, 26, 'REALISTIC', 2),
(1608, 225, 26, 'CONVENTIONAL', 3),
(1609, 110, 26, 'REALISTIC', 4),
(1610, 192, 26, 'ENTERPRISING', 3),
(1611, 228, 26, 'CONVENTIONAL', 2),
(1612, 152, 26, 'INVESTIGATIVE', 3),
(1613, 235, 26, 'CONVENTIONAL', 4),
(1614, 119, 26, 'REALISTIC', 3),
(1615, 121, 26, 'REALISTIC', 2),
(1616, 196, 26, 'ENTERPRISING', 3),
(1617, 115, 26, 'REALISTIC', 1),
(1618, 156, 26, 'INVESTIGATIVE', 3),
(1619, 159, 26, 'INVESTIGATIVE', 2),
(1620, 161, 26, 'INVESTIGATIVE', 3),
(1621, 118, 26, 'REALISTIC', 2),
(1622, 241, 26, 'CONVENTIONAL', 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam_header`
--

CREATE TABLE `exam_header` (
  `exam_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `result` text NOT NULL,
  `date` datetime NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `exam_header`
--

INSERT INTO `exam_header` (`exam_id`, `user_id`, `course_name`, `result`, `date`, `feedback`) VALUES
(25, 69, 'Bachelor of Science in Computer Science', 'CONVENTIONAL,INVESTIGATIVE,', '2023-06-13 23:48:17', ''),
(26, 68, 'Associate in Computer Technology', 'REALISTIC,', '2023-06-13 23:51:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `question_id` int(11) NOT NULL,
  `category` text NOT NULL,
  `question` text NOT NULL,
  `riasec` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`question_id`, `category`, `question`, `riasec`) VALUES
(83, 'interest', 'How interested are you in algorithms and problem-solving?', 'REALISTIC'),
(84, 'interest', 'How interested are you in algorithms and problem-solving?', 'REALISTIC'),
(85, 'interest', 'How much do you enjoy working with data and databases?', 'REALISTIC'),
(86, 'interest', 'How interested are you in artificial intelligence and machine learning?', 'REALISTIC'),
(87, 'interest', 'How interested are you in computer graphics and visualization?', 'REALISTIC'),
(88, 'interest', 'How interested are you in computer architecture and systems design?', 'REALISTIC'),
(89, 'interest', 'How interested are you in computer ethics and the societal impact of technology?', 'REALISTIC'),
(90, 'interest', 'How interested are you in software engineering and software development methodologies?', 'REALISTIC'),
(91, 'interest', 'How interested are you in computer networks and network protocols?', 'REALISTIC'),
(92, 'interest', 'How interested are you in computer vision and image processing?', 'REALISTIC'),
(93, 'interest', 'How interested are you in computer systems and operating systems?', 'REALISTIC'),
(94, 'value', 'The importance of technology in promoting social change and addressing global challenges.', 'REALISTIC'),
(95, 'value', 'Importance of ethical conduct and responsibility in the field of computer science.', 'REALISTIC'),
(96, 'value', 'Your perspective on the balance between individual privacy and national security in the digital age.', 'REALISTIC'),
(97, 'value', 'The significance of diversity and inclusivity in shaping innovative and impactful technological solutions.', 'REALISTIC'),
(98, 'value', 'Your awareness of the ethical implications of artificial intelligence and machine learning.', 'REALISTIC'),
(99, 'value', 'The significance of open-source software and its impact on the field of computer science.', 'REALISTIC'),
(100, 'value', 'Your perspective on the ethical considerations of data privacy and data mining.', 'REALISTIC'),
(101, 'value', 'The importance of user experience (UX) design in software development.', 'REALISTIC'),
(102, 'value', 'Your awareness of the social and ethical implications of virtual reality and augmented reality technologies.', 'REALISTIC'),
(103, 'value', 'The significance of continuous learning and professional development in the field of computer science.', 'REALISTIC'),
(104, 'skill', 'How familiar are you with basic programming concepts and logic?', 'REALISTIC'),
(105, 'skill', 'How comfortable are you with using computers and common software applications?', 'REALISTIC'),
(106, 'skill', 'How familiar are you with computer hardware components and their functions?', 'REALISTIC'),
(107, 'skill', 'How comfortable are you with using the internet and common web applications?', 'REALISTIC'),
(108, 'skill', 'How familiar are you with basic problem-solving techniques?', 'REALISTIC'),
(109, 'skill', 'How comfortable are you with using a word processor or spreadsheet software?', 'REALISTIC'),
(110, 'skill', '.How familiar are you with basic cybersecurity practices and online safety measures?', 'REALISTIC'),
(111, 'skill', 'How comfortable are you with using social media platforms and online communication tools?', 'REALISTIC'),
(112, 'skill', 'How familiar are you with basic HTML tags and formatting?', 'REALISTIC'),
(113, 'skill', 'How comfortable are you with using a web browser and performing online searches?', 'REALISTIC'),
(114, 'observation', 'Your ability to collaborate successfully with a team to solve complex problems.', 'REALISTIC'),
(115, 'observation', 'Your ability to handle technical challenges or setbacks effectively.', 'REALISTIC'),
(116, 'observation', 'The impact of a project or initiative you undertook on your personal growth in computer science.', 'REALISTIC'),
(117, 'observation', 'Your level of understanding and awareness of recent technology-related developments or news articles.', 'REALISTIC'),
(118, 'observation', 'Your ability to navigate ethical dilemmas related to technology effectively.', 'REALISTIC'),
(119, 'observation', 'Your ability to adapt and learn new programming languages or technologies quickly.', 'REALISTIC'),
(120, 'observation', 'Your ability to analyze and solve complex problems using logical reasoning and critical thinking.', 'REALISTIC'),
(121, 'observation', 'The impact of a computer science project you completed on a real-world issue or problem.', 'REALISTIC'),
(122, 'observation', 'our level of proficiency in troubleshooting and debugging software applications.', 'REALISTIC'),
(123, 'observation', 'Your ability to communicate technical concepts effectively to non-technical audiences.', 'REALISTIC'),
(124, 'interest', 'How interested are you in learning about computers and how they work?', 'INVESTIGATIVE'),
(125, 'interest', 'Are you interested in understanding how computer networks connect devices and enable communication?', 'INVESTIGATIVE'),
(126, 'interest', 'How interested are you in creating your own programs and software applications?', 'INVESTIGATIVE'),
(127, 'interest', 'Are you interested in working with databases to store and manage information?', 'INVESTIGATIVE'),
(128, 'interest', 'How interested are you in learning about cybersecurity and protecting computers from online threats?', 'INVESTIGATIVE'),
(129, 'interest', 'Are you interested in using computer technology to solve real-world problems and improve daily life?', 'INVESTIGATIVE'),
(130, 'interest', 'How interested are you in collaborating with others to create and develop computer-based projects?', 'INVESTIGATIVE'),
(131, 'interest', 'Are you interested in exploring new and emerging technologies and their impact on society?', 'INVESTIGATIVE'),
(132, 'interest', 'How interested are you in solving puzzles and problems using logic and critical thinking skills?', 'INVESTIGATIVE'),
(133, 'interest', 'Are you excited about the potential career opportunities in the field of computer technology?', 'INVESTIGATIVE'),
(134, 'value', 'The importance of computers in our daily lives and how they enhance productivity and efficiency.', 'INVESTIGATIVE'),
(135, 'value', 'The significance of staying up-to-date with the latest advancements in computer technology.', 'INVESTIGATIVE'),
(136, 'value', 'Your perspective on how computer technology can improve communication and connect people globally.', 'INVESTIGATIVE'),
(137, 'value', 'The importance of keeping personal information and data secure in the digital age.', 'INVESTIGATIVE'),
(138, 'value', 'Your awareness of the ethical considerations and responsible use of technology.', 'INVESTIGATIVE'),
(139, 'value', 'The significance of teamwork and collaboration in developing computer-based projects.', 'INVESTIGATIVE'),
(140, 'value', 'Your perspective on the challenges and opportunities in the field of computer technology.', 'INVESTIGATIVE'),
(141, 'value', 'The importance of continuous learning and adapting to new technologies.', 'INVESTIGATIVE'),
(142, 'value', 'Your awareness of the impact of technology on society and the environment.', 'INVESTIGATIVE'),
(143, 'value', 'The significance of effective communication skills in the field of computer technology.', 'INVESTIGATIVE'),
(144, 'skill', 'How familiar are you with using computers and basic computer functions?', 'INVESTIGATIVE'),
(145, 'skill', 'How comfortable are you with using common software like Microsoft Office or Google Suite?', 'INVESTIGATIVE'),
(146, 'skill', 'How familiar are you with basic programming concepts and logical thinking?', 'INVESTIGATIVE'),
(147, 'skill', 'How comfortable are you with using online platforms and navigating the internet?', 'INVESTIGATIVE'),
(148, 'skill', 'Are you familiar with social media platforms and online communication tools?', 'INVESTIGATIVE'),
(149, 'skill', 'How familiar are you with computer hardware components (e.g., keyboard, mouse, monitor)?', 'INVESTIGATIVE'),
(150, 'skill', 'Are you comfortable with troubleshooting basic computer issues?', 'INVESTIGATIVE'),
(151, 'skill', 'How familiar are you with cybersecurity practices, such as creating strong passwords and avoiding scams?', 'INVESTIGATIVE'),
(152, 'skill', 'Are you comfortable with using search engines to find information online?', 'INVESTIGATIVE'),
(153, 'skill', 'How familiar are you with responsible internet use and online safety guidelines?', 'INVESTIGATIVE'),
(154, 'observation', 'Your ability to solve problems and think critically when faced with computer-related challenges.', 'INVESTIGATIVE'),
(155, 'observation', 'Your ability to effectively use computers and software applications to complete tasks.', 'INVESTIGATIVE'),
(156, 'observation', 'The impact of a computer-based project you worked on and how it helped solve a problem.', 'INVESTIGATIVE'),
(157, 'observation', 'Your level of awareness of current trends and developments in the field of computer technology.', 'INVESTIGATIVE'),
(158, 'observation', 'Your ability to make ethical decisions when using technology and handling personal data.', 'INVESTIGATIVE'),
(159, 'observation', 'Your ability to adapt to new technologies and learn new computer skills.', 'INVESTIGATIVE'),
(160, 'observation', 'Your ability to think creatively and find innovative solutions using computer technology.', 'INVESTIGATIVE'),
(161, 'observation', 'The impact of a specific project or assignment you completed that involved using computers.', 'INVESTIGATIVE'),
(162, 'observation', 'Your level of proficiency in using computer applications and software tools.', 'INVESTIGATIVE'),
(163, 'observation', 'Your ability to communicate computer-related concepts and ideas clearly to others.', 'INVESTIGATIVE'),
(164, 'interest', 'Are you interested in identifying and capitalizing on business opportunities?', 'ENTERPRISING'),
(165, 'interest', 'How interested are you in developing and executing marketing strategies?', 'ENTERPRISING'),
(166, 'interest', 'Are you interested in understanding financial concepts and managing business finances?', 'ENTERPRISING'),
(167, 'interest', 'How interested are you in studying consumer behavior and market trends?', 'ENTERPRISING'),
(168, 'interest', 'Are you interested  in exploring innovative business models and entrepreneurship?', 'ENTERPRISING'),
(169, 'interest', 'How interested are you in analyzing and interpreting business data for decision-making?', 'ENTERPRISING'),
(170, 'interest', 'How interested are you in building and managing teams in a business environment?', 'ENTERPRISING'),
(171, 'interest', 'Are you interested in learning about business law and regulations?', 'ENTERPRISING'),
(172, 'interest', 'How interested are you in developing negotiation and communication skills for business purposes?', 'ENTERPRISING'),
(173, 'interest', 'How interested are you in learning about social entrepreneurship and sustainable business practices?', 'ENTERPRISING'),
(174, 'value', 'The importance of ethical business practices and corporate social responsibility.', 'ENTERPRISING'),
(175, 'value', 'The significance of innovation and creativity in entrepreneurship.', 'ENTERPRISING'),
(176, 'value', 'Your perspective on the role of entrepreneurship in economic development.', 'ENTERPRISING'),
(177, 'value', 'The importance of networking and building professional relationships in the business world.', 'ENTERPRISING'),
(178, 'value', 'Your awareness of the social and environmental impacts of business activities.', 'ENTERPRISING'),
(179, 'value', 'The significance of market research and feasibility studies in business planning', 'ENTERPRISING'),
(180, 'value', 'Your perspective on the challenges and opportunities of running a family business.', 'ENTERPRISING'),
(181, 'value', 'The importance of adaptability and resilience in the face of business challenges.', 'ENTERPRISING'),
(182, 'value', 'Your awareness of the global business landscape and international trade.', 'ENTERPRISING'),
(183, 'value', 'The significance of continuous learning and self-improvement in the field of entrepreneurship.', 'ENTERPRISING'),
(184, 'skill', 'How familiar are you with basic business concepts and terminology?', 'ENTERPRISING'),
(185, 'skill', 'Are you omfortable are you with using productivity software such as spreadsheets and presentation tools?', 'ENTERPRISING'),
(186, 'skill', 'How familiar are you with financial statements and analyzing financial data?', 'ENTERPRISING'),
(187, 'skill', 'How comfortable are you with using online marketing platforms and social media for business purposes?', 'ENTERPRISING'),
(188, 'skill', 'Are you familiar are you with business research methods and data analysis techniques?', 'ENTERPRISING'),
(189, 'skill', 'How comfortable are you with using word processing software for business documentation?', 'ENTERPRISING'),
(190, 'skill', 'How familiar are you with basic principles of project management and organizational behavior?', 'ENTERPRISING'),
(191, 'skill', 'Are you comfortable are you with using online collaboration tools for team projects?', 'ENTERPRISING'),
(192, 'skill', 'How familiar are you with basic accounting principles and bookkeeping practices?', 'ENTERPRISING'),
(193, 'skill', 'Are you comfortable are you with using email and online communication tools for professional purposes?', 'ENTERPRISING'),
(194, 'observation', 'Your ability to identify and evaluate business opportunities or gaps in the market.', 'ENTERPRISING'),
(195, 'observation', 'Your ability to handle and overcome challenges or failures in a business context.', 'ENTERPRISING'),
(196, 'observation', 'The impact of a business-related project or initiative you undertook on your personal growth.', 'ENTERPRISING'),
(197, 'observation', 'Your level of understanding and awareness of recent business-related developments or news articles.', 'ENTERPRISING'),
(198, 'observation', 'Your ability to make ethical decisions in business situations.', 'ENTERPRISING'),
(199, 'observation', 'Your ability to adapt to changing market conditions and emerging business trends.', 'ENTERPRISING'),
(200, 'observation', 'Your ability to analyze and solve complex business problems using critical thinking skills.', 'ENTERPRISING'),
(201, 'observation', 'The impact of a business project you completed on addressing a real-world problem or need.', 'ENTERPRISING'),
(202, 'observation', 'Your level of proficiency in financial analysis and forecasting.', 'ENTERPRISING'),
(203, 'observation', 'Your ability to communicate business concepts and ideas effectively to various stakeholders.', 'ENTERPRISING'),
(204, 'interest', 'How interested are you in learning about the basics of accounting and how it applies to businesses?', 'CONVENTIONAL'),
(205, 'interest', 'Are you interested in understanding how technology and information systems can assist accountants in their work?', 'CONVENTIONAL'),
(206, 'interest', 'How interested are you in exploring how technology can be used to manage financial data and improve accounting processes?', 'CONVENTIONAL'),
(207, 'interest', 'Are you interested in studying how businesses operate and how accounting information systems can contribute to their success?', 'CONVENTIONAL'),
(208, 'interest', 'How interested are you in using data analysis tools to gain insights and make informed decisions in accounting?', 'CONVENTIONAL'),
(209, 'interest', 'Are you interested in understanding how technology can help ensure accuracy and security in accounting systems?', 'CONVENTIONAL'),
(210, 'interest', 'How interested are you in working with others to develop and implement accounting information systems?', 'CONVENTIONAL'),
(211, 'interest', 'Are you interested in learning about the laws and regulations that govern accounting and information systems?', 'CONVENTIONAL'),
(212, 'interest', 'How interested are you in developing communication skills that are important in the accounting field?', 'CONVENTIONAL'),
(213, 'interest', 'How interested are you in understanding how accounting information systems can support business decision-making?\r\n', 'CONVENTIONAL'),
(214, 'value', 'The importance of accurate financial information and its role in making sound business decisions.', 'CONVENTIONAL'),
(215, 'value', 'The significance of technology in simplifying accounting tasks and improving efficiency.', 'CONVENTIONAL'),
(216, 'value', 'Your perspective on the role of accounting information systems in supporting businesses and financial management.', 'CONVENTIONAL'),
(217, 'value', 'The importance of internal controls and data security in accounting information systems.', 'CONVENTIONAL'),
(218, 'value', 'Your awareness of the impact of emerging technologies on the accounting profession.', 'CONVENTIONAL'),
(219, 'value', 'The significance of ethical considerations and professional responsibilities in accounting information systems.', 'CONVENTIONAL'),
(220, 'value', 'Your perspective on the challenges and opportunities of implementing accounting information systems in organizations.', 'CONVENTIONAL'),
(221, 'value', 'The importance of continuous learning and keeping up with technological advancements in accounting information systems.', 'CONVENTIONAL'),
(222, 'value', 'Your awareness of the ethical considerations and professional responsibilities in accounting information systems.', 'CONVENTIONAL'),
(223, 'value', 'The significance of accurate financial reporting and compliance with accounting standards for organizational success.', 'CONVENTIONAL'),
(224, 'skill', 'How familiar are you with basic accounting concepts and financial statements?', 'CONVENTIONAL'),
(225, 'skill', 'How comfortable are you with using spreadsheet software like Microsoft Excel?', 'CONVENTIONAL'),
(226, 'skill', 'How familiar are you with organizing and managing data using basic database tools?', 'CONVENTIONAL'),
(227, 'skill', 'How comfortable are you with using accounting software and other computer-based tools?', 'CONVENTIONAL'),
(228, 'skill', 'Are you familiar with using data analysis tools to gain insights from financial data?', 'CONVENTIONAL'),
(229, 'skill', 'How comfortable are you with using word processing software for documenting accounting procedures and reports?', 'CONVENTIONAL'),
(230, 'skill', 'How familiar are you with the importance of internal controls in accounting?', 'CONVENTIONAL'),
(231, 'skill', 'Are you comfortable using presentation tools to communicate accounting information effectively?', 'CONVENTIONAL'),
(232, 'skill', 'How familiar are you with basic tax principles and regulations?', 'CONVENTIONAL'),
(233, 'skill', 'Are you comfortable with using email and online communication tools for professional purposes?', 'CONVENTIONAL'),
(234, 'observation', 'Your ability to analyze and interpret financial information to identify patterns and trends.', 'CONVENTIONAL'),
(235, 'observation', 'Your ability to solve problems and overcome challenges related to accounting tasks', 'CONVENTIONAL'),
(236, 'observation', 'The impact of a project or initiative you undertook that involved using accounting information systems.', 'CONVENTIONAL'),
(237, 'observation', 'Your level of awareness of recent developments in the field of accounting and information systems.', 'CONVENTIONAL'),
(238, 'observation', 'Your ability to make ethical decisions in accounting-related situations.', 'CONVENTIONAL'),
(239, 'observation', 'Your ability to adapt to new technologies and changing accounting practices.', 'CONVENTIONAL'),
(240, 'observation', 'Your ability to think critically and find solutions to accounting problems.', 'CONVENTIONAL'),
(241, 'observation', 'The impact of a specific accounting-related project you completed or were involved in.', 'CONVENTIONAL'),
(242, 'observation', 'Your level of proficiency in basic financial analysis using accounting information systems.', 'CONVENTIONAL'),
(243, 'observation', 'Your ability to effectively communicate accounting concepts and ideas to others.', 'CONVENTIONAL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `account_type` int(10) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `email_address` varchar(250) DEFAULT NULL,
  `contact_number` varchar(250) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'ACTIVE',
  `otp` int(10) DEFAULT NULL,
  `profile_picture` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `account_type`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email_address`, `contact_number`, `status`, `otp`, `profile_picture`) VALUES
(57, 1, 'admin1', '202cb962ac59075b964b07152d234b70', 'Jim', 'Rey', 'Zamora', 'jim@gmail.com', '91278378612', 'ACTIVE', NULL, ''),
(69, 3, 'rold', '202cb962ac59075b964b07152d234b70', 'harold', 'delima', 'jamisola', 'rold@gmial.com', '09477607589', 'ACTIVE', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `exam_child`
--
ALTER TABLE `exam_child`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `exam_header`
--
ALTER TABLE `exam_header`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `exam_child`
--
ALTER TABLE `exam_child`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1623;

--
-- AUTO_INCREMENT for table `exam_header`
--
ALTER TABLE `exam_header`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
