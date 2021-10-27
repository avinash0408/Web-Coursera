-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 05:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webcoursera`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(1, 'Ajax'),
(2, 'CSS'),
(3, 'HTML'),
(4, 'Java'),
(5, 'JavaScript'),
(6, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `image_source` text NOT NULL,
  `source` text NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `name`, `image_source`, `source`, `course_id`) VALUES
(1, 'W3Schools', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSSXLpBCao_bEFmQC28wkWJ-hgG4eB9Eiw3LG4VGCGz6ktB8yhvPq2maBEyBhoYTjmI2OQ&usqp=CAU', 'https://www.w3schools.com/xml/ajax_intro.asp', 1),
(2, 'TutorialsPoint', 'https://www.tutorialspoint.com/ajax/images/ajax-mini-logo.jpg', 'https://www.tutorialspoint.com/ajax/index.htm', 1),
(3, 'Javapoint', 'https://previews.123rf.com/images/gdainti/gdainti1509/gdainti150900005/44757132-illustration-of-blue-shield-with-programming-technology-ajax-asynchronous-javascript-isolated-web-si.jpg', 'https://www.javatpoint.com/ajax-tutorial', 1),
(4, 'Ajax and PHP', 'https://imgv2-1-f.scribdassets.com/img/word_document/253047686/original/216x287/272d14770f/1617219942?v=1', 'http://bedford-computing.co.uk/learning/wp-content/uploads/2016/09/AJAX-and-PHP-Building-Modern-Web-Applications-2nd-Edition-eBook29102012_102943.pdf', 1),
(5, 'Geeks For Geeks', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZ10qdQ21LtjzH13Mkpv8Bj7zKUY6CyZX4Lg&usqp=CAU', 'https://www.geeksforgeeks.org/ajax-introduction/', 1),
(6, 'FreeCodeCamp', 'https://image.flaticon.com/icons/png/512/1183/1183690.png', 'https://www.freecodecamp.org/news/ajax-tutorial/', 1),
(7, 'HTML and CSS', 'https://chaudharyacademy.com/wp-content/uploads/2019/08/HTML_and_CSS_Design_and_Build-website_Jon_Duckett-scaled.jpg', 'https://wtf.tw/ref/duckett.pdf', 2),
(8, 'Geeks For Geeks', 'https://media.geeksforgeeks.org/wp-content/cdn-uploads/20210203171024/CSSTutorial.png', 'https://www.geeksforgeeks.org/css-tutorials/', 2),
(9, 'W3Schools', 'https://www.oxfordwebstudio.com/user/pages/06.da-li-znate/sta-je-css/sta-je-css.png', 'https://www.w3schools.com/w3css/defaulT.asp', 2),
(10, 'TutorialsPoint', 'https://miro.medium.com/max/1400/0*0Jt6AoXxmN0n0qhN', 'https://www.tutorialspoint.com/css/index.htm', 2),
(11, 'CSS Tutorial', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvA00GaUwlwEKhXxDgarATH7yRlRh3utSexQ&usqp=CAU', 'https://www.csstutorial.net/', 2),
(12, 'Geeks For Geeks', 'https://media.geeksforgeeks.org/wp-content/cdn-uploads/20210203170945/HTML-Tutorials.png', 'https://www.geeksforgeeks.org/html-tutorials/', 3),
(13, 'W3Schools', 'https://pixelmechanics.com.sg/wp-content/uploads/2019/06/html5-logo-for-web-development.png', 'https://www.w3schools.com/html/default.asp', 3),
(14, 'HTML and CSS', 'https://chaudharyacademy.com/wp-content/uploads/2019/08/HTML_and_CSS_Design_and_Build-website_Jon_Duckett-scaled.jpg', 'https://wtf.tw/ref/duckett.pdf', 3),
(15, 'TutorialsPoint', 'http://www.technowalkers.com/wp-content/uploads/2017/10/html.jpg', 'https://www.tutorialspoint.com/html/index.htm', 3),
(16, 'HTML', 'https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2018/11/what-is-html-1.jpg', 'https://html.com/', 3),
(17, 'Programiz', 'https://www.oracle.com/a/tech/img/cb88-java-logo-001.jpg', 'https://www.programiz.com/java-programming', 4),
(18, 'Geeks For Geeks', 'https://cdn.vox-cdn.com/thumbor/_AobZZDt_RVStktVR7mUZpBkovc=/0x0:640x427/1200x800/filters:focal(0x0:640x427)/cdn.vox-cdn.com/assets/1087137/java_logo_640.jpg', 'https://www.geeksforgeeks.org/java/', 4),
(19, 'Javapoint', '../images/java.png', 'https://www.javatpoint.com/java-tutorial', 4),
(20, 'W3Schools', 'https://gteconlinelearning.com/wp-content/uploads/2020/05/java-5.jpg', 'https://www.w3schools.com/java/', 4),
(21, 'TutorialsPoint', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEupcbar7kGCemrHww63ksXu9geCpyEwNVDg&usqp=CAU', 'https://www.tutorialspoint.com/java/index.htm', 4),
(22, 'Effective Java', 'https://m.media-amazon.com/images/I/51wl8cINKYL.jpg', 'https://kea.nu/files/textbooks/new/Effective%20Java%20%282017%2C%20Addison-Wesley%29.pdf', 4),
(23, 'Eloquent JavaScript', 'https://images-na.ssl-images-amazon.com/images/I/91asIC1fRwL.jpg', 'https://eloquentjavascript.net/Eloquent_JavaScript.pdf', 5),
(24, 'JS: The Good Parts', 'https://images-na.ssl-images-amazon.com/images/I/5131OWtQRaL._SX381_BO1,204,203,200_.jpg', 'https://andersonguelphjs.github.io/OReilly_JavaScript_The_Good_Parts_May_2008.pdf', 5),
(25, 'Geeks For Geeks', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/1200px-Unofficial_JavaScript_logo_2.svg.png', 'https://www.geeksforgeeks.org/html-tutorials/', 5),
(26, 'W3Schools', '../images/javascript.jfif', 'https://www.w3schools.com/js/', 5),
(27, 'TutorialsPoint', 'https://www.tutorialspoint.com/javascript/images/javascript-mini-logo.jpg', 'https://www.tutorialspoint.com/javascript/index.htm', 5),
(28, 'JavaScript Info', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVy5CBdj9NUMIcRI7q7JafnO5zVUJl09hhrQ&usqp=CAU', 'https://javascript.info/', 5),
(29, 'The Python Tutorial', 'https://www.gom.com/-/media/gom-website/global/services/gom-training-overview/elearning/gom_elearning-python-for-beginners_teaser.jpg?as=0&dmc=0&thn=0', 'https://docs.python.org/3/tutorial/', 6),
(30, 'Learning Python', 'https://images-na.ssl-images-amazon.com/images/I/614DWyHLwWS.jpg', 'https://cfm.ehu.es/ricardo/docs/python/Learning_Python.pdf', 6),
(31, 'Programiz', 'https://www.softwaretestinghelp.com/wp-content/qa/uploads/2020/12/Python-Programming.png', 'https://www.programiz.com/python-programming', 6),
(32, 'Geeks For Geeks', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvkoMmvpkj8Wcw0bao9iU05SZLD7Z_i-Rs3Q&usqp=CAU', 'https://www.geeksforgeeks.org/python-programming-language/learn-python-tutorial/', 6),
(33, 'W3Schools', 'https://analyticsindiamag.com/wp-content/uploads/2019/10/python-1.jpg', 'https://www.w3schools.com/python/', 6),
(34, 'TutorialsPoint', 'https://www.tutorialspoint.com/python/images/python-mini.jpg', 'https://www.tutorialspoint.com/python/index.htm', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `name` varchar(70) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `enc_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `mobile`, `enc_password`) VALUES
(1, 'avinash@gmail.com', 'Samudrala Avinash', '1234567890', '$2y$10$KngvIoHtVpWIhrjCVAibNONhHp6Ssv1Q7g3y7nLMQNxD3qzCXtPJy'),
(2, 'gnanesh@gmail.com', 'Dommeti Sree Gnanesh', '1357924680', '$2y$10$KngvIoHtVpWIhrjCVAibNONhHp6Ssv1Q7g3y7nLMQNxD3qzCXtPJy'),
(3, 'rakesh@gmail.com', 'Yacha Venkata Rakesh', '7997669577', '$2y$10$KngvIoHtVpWIhrjCVAibNONhHp6Ssv1Q7g3y7nLMQNxD3qzCXtPJy'),
(7, 'venkata@gmail.com', 'Rakesh', '234', '$2y$10$wqrtMVFdKZiD5D0ERPB8/O2VtH99naBwwUuPfw3Ths2CV.xpcQGpS'),
(8, 'venkatarakesh@gmail.com', 'Venkata Rakesh', '7997669577', '$2y$10$iFN7.ZQoONo4TPVH8O7oJeG8yy4WspK5.GQ89UVEzIHfqkHEYQk2.');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_courses`
--

INSERT INTO `user_courses` (`user_id`, `course_id`) VALUES
(1, 1),
(2, 2),
(8, 1),
(8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_videos`
--

CREATE TABLE `user_videos` (
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT 0,
  `checkbox` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_videos`
--

INSERT INTO `user_videos` (`user_id`, `video_id`, `watch_duration`, `checkbox`) VALUES
(1, 1, 0, b'0'),
(1, 2, 0, b'0'),
(1, 3, 0, b'0'),
(8, 1, 0, b'0'),
(8, 2, 0, b'0'),
(8, 3, 0, b'0'),
(8, 29, 356, b'1'),
(8, 30, 0, b'0'),
(8, 31, 0, b'0'),
(8, 32, 0, b'0'),
(8, 33, 0, b'0'),
(8, 34, 0, b'0'),
(8, 35, 12, b'0'),
(8, 36, 0, b'0'),
(8, 37, 17, b'0'),
(8, 45, 0, b'0'),
(8, 46, 0, b'0'),
(8, 47, 0, b'0'),
(8, 48, 0, b'0'),
(8, 49, 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `source` text NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `source`, `course_id`) VALUES
(1, '82hnvUYY6QA', 1),
(2, '3l13qGLTgNw', 1),
(3, '5MmEUWfuZFk', 1),
(4, '1PnVor36_40', 2),
(5, '3sKOM9_qy2U', 2),
(6, '3_9znKVNe5g', 2),
(7, '1Rs2ND1ryYc', 2),
(8, 'yfoY53QXEnI', 2),
(9, 'QMnv3QrjZoU', 2),
(10, 'KN6oBEOz2ZI', 2),
(11, 'TdqQqyc7pfU', 2),
(12, 'mU6anWqZJcc', 2),
(13, 'UB1O30fR-EE', 3),
(14, 'qz0aGYrrlhU', 3),
(15, 'pQN-pnXPaVg', 3),
(16, 'DPnqb74Smug', 3),
(17, 'bWPMSSsVdPk', 3),
(18, 'QMnv3QrjZoU', 3),
(19, 'TdqQqyc7pfU', 3),
(20, 'mU6anWqZJcc', 3),
(21, 'cyuzt1Dp8X8', 3),
(22, 'rV_3Lewxx6o', 4),
(23, 'UmnCZ7-9yDY', 4),
(24, 'RRubcjpTkks', 4),
(25, 'grEKMHGYyns', 4),
(26, '8cm1x4bC610', 4),
(27, 'eIrMbAQSU34', 4),
(28, 'xk4_1vDrzzo', 4),
(29, 'PkZNo7MFNFg', 5),
(30, 'W6NZfCO5SIk', 5),
(31, 't9dEgHpCNJE', 5),
(32, 'hdI2bqOjy3c', 5),
(33, 'jS4aFq5-91M', 5),
(34, 'DFs-du7Uc2w', 5),
(35, 'TdqQqyc7pfU', 5),
(36, 'g7T23Xzys-A', 5),
(37, 'Ia0FSogTRaw', 5),
(38, 'XKHEtdqhLK8', 6),
(39, '_uQrJ0TkZlc', 6),
(40, 'rfscVS0vtbw', 6),
(41, 'WvhQhj4n6b8', 6),
(42, 'woVJ4N5nl_s', 6),
(43, 'b093aqAZiPU', 6),
(44, '27u8xHqLMZE', 6),
(45, 'fLJItEI7TE0', 1),
(46, 'BpjRRz2NW5Q', 1),
(47, '4bMQjDrsMwE', 1),
(48, 'FJZEVmF3eDg', 1),
(49, '72ki4oAah8g', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`user_id`,`course_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `user_videos`
--
ALTER TABLE `user_videos`
  ADD PRIMARY KEY (`user_id`,`video_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `reference_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD CONSTRAINT `user_courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_videos`
--
ALTER TABLE `user_videos`
  ADD CONSTRAINT `user_videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_videos_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
