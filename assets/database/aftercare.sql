-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 06:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aftercare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_list`
--

CREATE TABLE `appointment_list` (
                                    `id` int(30) NOT NULL,
                                    `doctor_id` int(30) NOT NULL,
                                    `patient_id` int(30) NOT NULL,
                                    `schedule` datetime NOT NULL,
                                    `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= for verification, 1=confirmed,2= reschedule,3=done',
                                    `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_list`
--

INSERT INTO `appointment_list` (`id`, `doctor_id`, `patient_id`, `schedule`, `status`, `date_created`) VALUES
(17, 1, 30, '2021-05-12 13:24:00', 3, '2021-05-31 18:25:04'),
(18, 1, 34, '2021-02-11 13:00:00', 1, '2021-06-09 02:10:55'),
(19, 1, 34, '2021-06-09 13:17:00', 0, '2021-06-09 14:18:04'),
(20, 1, 30, '2021-02-10 13:08:00', 0, '2021-06-11 17:15:40'),
(21, 1, 40, '2021-06-16 13:03:00', 0, '2021-06-16 00:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_list`
--

CREATE TABLE `doctors_list` (
                                `id` int(30) NOT NULL,
                                `name` text NOT NULL,
                                `name_pref` varchar(100) NOT NULL,
                                `clinic_address` text NOT NULL,
                                `contact` text NOT NULL,
                                `email` text NOT NULL,
                                `specialty_ids` text NOT NULL,
                                `img_path` text NOT NULL,
                                `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors_list`
--

INSERT INTO `doctors_list` (`id`, `name`, `name_pref`, `clinic_address`, `contact`, `email`, `specialty_ids`, `img_path`, `date_created`) VALUES
(1, 'Bryan Lee Jun Hang', 'M.D.', '81 Dunlop St, Singapore 209408', '+65 8269 9948', 'bryanlee@saca.com', '[16]', '1619772720_sg_doc_1.png', '2021-04-14 13:39:05'),
(2, 'Murali Ramaswamy', 'M.D.', '81 Dunlop St, Singapore 209408', '+65 8312 2387', 'muraliramaswamy@saca.com.sg', '[15]', '1619772720_sg_doc_2.png', '2021-04-14 13:49:20'),
(3, 'Najlaa Binti Rabi', 'M.D.', '81 Dunlop St, Singapore 209408', '+65 9180 5621', 'najlaabintirabi@saca.com.sg', '[15]', '1619772720_sg_doc_3.png', '2021-04-14 13:52:26'),
(4, 'Sarah Johnson', 'M.D.', '81 Dunlop St, Singapore 209408', '+65 9177 4689', 'SheldonCooper@gmail.com', '[13]', '1619772780_sg_doc_4.png', '2021-04-14 13:53:47'),
(9, 'Li Shufang', 'M.D.', 'My Home', '+65 1314 5278', 'testy@gmail.com', '[16]', '1619774880_smiling.jpg', '2021-04-30 17:28:42'),
(10, 'Sheldon Cooper', 'PhD', '41 LORONG 22 GEYLANG\r\nPRIME RESIDENCE #02-03\r\n', '+65 8765 1597', 'sheldonCooper@gmail.com', '[13]', '1623175140_Sheldon.jpg', '2021-06-09 01:59:50'),
(11, 'Amy Farrah Fowler', 'PhD', '41 LORONG 22 GEYLANG\r\nPRIME RESIDENCE #02-03\r\n', '+65 8280 1121', '123@gmail.com', '[14]', '1623175560_Amy.jpg', '2021-06-09 02:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_schedule`
--

CREATE TABLE `doctors_schedule` (
                                    `id` int(30) NOT NULL,
                                    `doctor_id` int(30) NOT NULL,
                                    `day` varchar(20) NOT NULL,
                                    `time_from` time NOT NULL,
                                    `time_to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors_schedule`
--

INSERT INTO `doctors_schedule` (`id`, `doctor_id`, `day`, `time_from`, `time_to`) VALUES
(3, 2, 'Monday', '10:00:00', '17:00:00'),
(4, 2, 'Wednesday', '10:00:00', '17:00:00'),
(5, 3, 'Monday', '10:00:00', '15:00:00'),
(6, 3, 'Tuesday', '10:00:00', '15:00:00'),
(7, 3, 'Wednesday', '10:00:00', '15:00:00'),
(8, 3, 'Thursday', '10:00:00', '15:00:00'),
(9, 3, 'Friday', '10:00:00', '15:00:00'),
(10, 1, 'Monday', '08:00:00', '16:00:00'),
(11, 1, 'Tuesday', '09:00:00', '16:00:00'),
(12, 1, 'Wednesday', '08:00:00', '16:00:00'),
(13, 1, 'Thursday', '08:00:00', '16:00:00'),
(14, 1, 'Friday', '08:00:00', '16:00:00'),
(15, 1, 'Saturday', '12:00:00', '15:00:00'),
(16, 1, 'Sunday', '12:00:00', '15:00:00'),
(17, 2, 'Tuesday', '10:00:00', '17:00:00'),
(18, 2, 'Thursday', '10:00:00', '17:00:00'),
(19, 2, 'Friday', '10:00:00', '17:00:00'),
(20, 4, 'Monday', '13:00:00', '21:00:00'),
(21, 4, 'Tuesday', '13:00:00', '21:00:00'),
(22, 4, 'Wednesday', '13:00:00', '21:00:00'),
(23, 4, 'Thursday', '13:00:00', '21:00:00'),
(24, 4, 'Friday', '13:00:00', '21:00:00'),
(25, 4, 'Saturday', '00:00:00', '00:00:00'),
(26, 4, 'Sunday', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `medical_specialty`
--

CREATE TABLE `medical_specialty` (
                                     `id` int(11) NOT NULL,
                                     `name` text NOT NULL,
                                     `description` text NOT NULL,
                                     `img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_specialty`
--

INSERT INTO `medical_specialty` (`id`, `name`, `description`, `img_path`) VALUES
(13, 'psychology', 'psychology', '1622460540_psychology.png'),
(14, 'Pharmacy', 'Pharmacy', '1622460540_Pharmacy.png'),
(15, 'physiotherapy', 'physiotherapy', '1622460600_physiotherapy.png'),
(16, 'Nutrition and dietetics', 'Nutrition and dietetics', '1622460600_Nutrition and dietetics.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
                            `id` int(30) NOT NULL,
                            `visitor_name` varchar(100) NOT NULL,
                            `visitor_email` varchar(255) NOT NULL,
                            `visitor_subject` varchar(255) NOT NULL,
                            `visitor_message` text NOT NULL,
                            `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `visitor_name`, `visitor_email`, `visitor_subject`, `visitor_message`, `date_created`) VALUES
(14, 'qweccc', '1999lishufang@gmail.com', '12321', 'asdsadasda', '2021-06-04 21:38:10'),
(15, 'weqwxccc', '1999lishufang@gmail.com', 'qwewqwqe', 'asdassad', '2021-06-09 14:23:30'),
(16, 'QWE', '1999lishufang@gmail.com', 'qwe', 'qweqwewqewqe', '2021-06-15 23:54:13'),
(17, 'vistor', 'vistor@gmail.com', 'test', 'test', '2021-06-16 00:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `patient_list`
--

CREATE TABLE `patient_list` (
                                `id` int(30) NOT NULL,
                                `name` text NOT NULL,
                                `address` text NOT NULL,
                                `contact_no` varchar(30) NOT NULL,
                                `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
                                   `id` int(30) NOT NULL,
                                   `name` text NOT NULL,
                                   `email` varchar(200) NOT NULL,
                                   `contact` varchar(20) NOT NULL,
                                   `cover_img` text NOT NULL,
                                   `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'AfterCarrey', 'enquiries@saca.org.sg', '+65 6294 2350', '1619611140_aftercare2.jpg', '&lt;h2 style=&quot;font-size: 28px; text-align: center; background: transparent; position: relative; --darkreader-inline-bgimage: initial; --darkreader-inline-bgcolor:transparent;&quot; data-darkreader-inline-bgimage=&quot;&quot; data-darkreader-inline-bgcolor=&quot;&quot;&gt;ABOUT US&lt;/h2&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; --darkreader-inline-bgimage: initial; --darkreader-inline-bgcolor:transparent;&quot; data-darkreader-inline-bgimage=&quot;&quot; data-darkreader-inline-bgcolor=&quot;&quot;&gt;&lt;span style=&quot;font-size: 16px; letter-spacing: 0.32px;&quot;&gt;The Singapore Aftercare Association (SACA) is a crucial aftercare agency providing welfare and rehabilitation services for discharged offenders and their families. The Association recognises that, upon release, the discharged offender (after that referred to as the client) would face challenges related to employment, stigmatisation, and acceptance by the family and others. It also recognises that, during a client&rsquo;s imprisonment, the family may face several emotional and financial problems.&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 16px; margin-bottom: 16px; line-height: 30px; text-align: justify;&quot;&gt;&lt;font face=&quot;Open Sans, Tahoma, Arial, Helvetica, sans-serif&quot;&gt;&lt;span style=&quot;font-size: 16px; letter-spacing: 0.32px;&quot;&gt;SACA aims to assist clients and their families in coping with problems arising from the offending behaviour and the consequent incarceration. This is done with the belief that such assistance would give clients the chance to reintegrate into society successfully, thereby reducing recidivism chances.&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 16px; margin-bottom: 16px; line-height: 30px; text-align: justify;&quot;&gt;&lt;font face=&quot;Open Sans, Tahoma, Arial, Helvetica, sans-serif&quot;&gt;&lt;span style=&quot;font-size: 16px; letter-spacing: 0.32px;&quot;&gt;SACA was formed in 1956 and was registered as a charity, and attained IPC status in 1984. The Association is a voluntary welfare organisation affiliated with the National Council of Social Service (NCSS). It is also a member of the Community Action for the Rehabilitation of Ex-offenders (CARE) Network.&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 16px; margin-bottom: 16px; line-height: 30px; text-align: justify;&quot;&gt;&lt;font face=&quot;Open Sans, Tahoma, Arial, Helvetica, sans-serif&quot;&gt;&lt;span style=&quot;font-size: 16px; letter-spacing: 0.32px;&quot;&gt;SACA is governed by a Constitution. The Association is managed by an Executive Committee, which comprises volunteers from the public with the Prisons Department representatives. The Committee is elected into office annually during the Annual General Meeting.&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 16px; margin-bottom: 16px; line-height: 30px; text-align: justify;&quot;&gt;&lt;font face=&quot;Open Sans, Tahoma, Arial, Helvetica, sans-serif&quot;&gt;&lt;span style=&quot;font-size: 16px; letter-spacing: 0.32px;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative; --darkreader-inline-bgimage: initial; --darkreader-inline-bgcolor:transparent;&quot; data-darkreader-inline-bgimage=&quot;&quot; data-darkreader-inline-bgcolor=&quot;&quot;&gt;&lt;/p&gt;&lt;h2 style=&quot;text-align: center; font-size: 28px; background: transparent; position: relative; --darkreader-inline-bgimage: initial; --darkreader-inline-bgcolor:transparent;&quot; data-darkreader-inline-bgimage=&quot;&quot; data-darkreader-inline-bgcolor=&quot;&quot;&gt;OUR VISION &amp;amp; MISSION&lt;/h2&gt;&lt;h4 style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Tahoma, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.6; margin-top: 20px; margin-bottom: 10px; font-size: 18px; text-transform: uppercase; text-decoration-line: underline; letter-spacing: 0.32px; color: rgb(10, 71, 151); --darkreader-inline-color:#c7ffff;&quot; data-darkreader-inline-color=&quot;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Tahoma, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.6; margin-top: 20px; margin-bottom: 10px; font-size: 18px; text-transform: uppercase; text-decoration-line: underline; letter-spacing: 0.32px; --darkreader-inline-color:#ffffff;&quot; data-darkreader-inline-color=&quot;&quot;&gt;OUR VISION&lt;/span&gt;&lt;/h4&gt;&lt;p style=&quot;margin-top: 16px; margin-bottom: 16px; font-size: 16px; line-height: 30px; text-align: justify; font-family: &amp;quot;Open Sans&amp;quot;, Tahoma, Arial, Helvetica, sans-serif; letter-spacing: 0.32px;&quot;&gt;Well-integrated ex-offenders contributing to a caring society that embodies the spirit of second chances&lt;/p&gt;&lt;h4 style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Tahoma, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.6; margin-top: 20px; margin-bottom: 10px; font-size: 18px; text-transform: uppercase; text-decoration-line: underline; letter-spacing: 0.32px; color: rgb(10, 71, 151); --darkreader-inline-color:#c7ffff;&quot; data-darkreader-inline-color=&quot;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Tahoma, Arial, Helvetica, sans-serif; font-weight: 700; line-height: 1.6; margin-top: 20px; margin-bottom: 10px; font-size: 18px; text-transform: uppercase; text-decoration-line: underline; letter-spacing: 0.32px; --darkreader-inline-color:#ffffff;&quot; data-darkreader-inline-color=&quot;&quot;&gt;OUR MISSION&lt;/span&gt;&lt;/h4&gt;&lt;p style=&quot;margin-top: 16px; margin-bottom: 16px; font-size: 16px; line-height: 30px; text-align: justify; font-family: &amp;quot;Open Sans&amp;quot;, Tahoma, Arial, Helvetica, sans-serif; letter-spacing: 0.32px;&quot;&gt;As an exemplary organisation in the aftercare sector, SACA is committed to:&lt;/p&gt;&lt;span style=&quot;background-color: transparent; color: rgb(14, 16, 26); --darkreader-inline-bgcolor:transparent; --darkreader-inline-color:#ffffff;&quot; data-darkreader-inline-bgcolor=&quot;&quot; data-darkreader-inline-color=&quot;&quot;&gt;Empowering ex-offenders to take ownership of their own transformation and facilitating their reintegration into society by mobilising them, their families and the public&lt;/span&gt;&lt;br&gt;&lt;span style=&quot;background-color: transparent; color: rgb(14, 16, 26); --darkreader-inline-bgcolor:transparent; --darkreader-inline-color:#ffffff;&quot; data-darkreader-inline-bgcolor=&quot;&quot; data-darkreader-inline-color=&quot;&quot;&gt;Fostering a change in the mindset of both ex-offenders and society to enable ex-offenders to achieve their fundamental life goals and needs&lt;/span&gt;&lt;br&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `id` int(30) NOT NULL,
                         `doctor_id` int(30) NOT NULL,
                         `name` varchar(200) NOT NULL,
                         `address` text NOT NULL,
                         `contact` text NOT NULL,
                         `username` varchar(100) NOT NULL,
                         `password` varchar(200) NOT NULL,
                         `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = doctor,3=patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `doctor_id`, `name`, `address`, `contact`, `username`, `password`, `type`) VALUES
(1, 0, 'LI SHUFANG', 'nil', 'nil', 'admin', 'admin123', 1),
(13, 4, 'Dr.Sarah Johnson, M.D.', '81 Dunlop St, Singapore 209408', '+65 9177 4689', 'SheldonCooper@gmail.com', 'abc123', 2),
(14, 5, 'Dr.Murali Ramaswamy, M.D.', '81 Dunlop St, Singapore 209408', '+65 8312 2387', 'muraliramaswamy@saca.com.sg', 'abc123', 2),
(15, 6, 'Dr.Najlaa Binti Rabi, M.D.', '81 Dunlop St, Singapore 209408', '+65 9180 5621', 'najlaabintirabi@saca.com.sg', 'abc123', 2),
(16, 7, 'Dr.Sarah Johnson, M.D.', '81 Dunlop St, Singapore 209408', '+65 9177 4689', 'sarahjohnson@saca.com.sg', 'abc123', 2),
(30, 0, 'Abby Lee', '41 LORONG 22 GEYLANG\r\nPRIME RESIDENCE #02-03\r\n', '81701017', 'abby@gmail.com', 'abc123', 3),
(31, 1, 'Dr.Bryan Lee Jun Hang, M.D.', '81 Dunlop St, Singapore 209408', '+65 8269 9948', 'bryanlee@saca.com', 'abc123', 2),
(32, 9, 'Dr.Li Shufang, M.D.', 'My Home', '+65 1314 5278', 'testy@gmail.com', 'abc123', 2),
(36, 0, 'aacccdddd', '', '', 'aacfkkkkk', 'abc123', 1),
(37, 10, 'Dr.Sheldon Cooper, PhD', '41 LORONG 22 GEYLANG\r\nPRIME RESIDENCE #02-03\r\n', '+65 8765 1597', 'sheldonCooper@gmail.com', 'abc123', 2),
(38, 11, 'Dr.Amy Farrah Fowler, PhD', '41 LORONG 22 GEYLANG\r\nPRIME RESIDENCE #02-03\r\n', '+65 8280 1121', '123@gmail.com', 'abc123', 2),
(39, 0, 'LI SHUFANG xxx ', '41 LORONG 22 GEYLANG\r\nPRIME RESIDENCE #02-03\r\n', '81701017', 'LISHUFANGxxx@gmail.com', 'abc123', 3),
(40, 0, 'test', 'test', '12345678', 'testtest@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_list`
--
ALTER TABLE `appointment_list`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_list`
--
ALTER TABLE `doctors_list`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_specialty`
--
ALTER TABLE `medical_specialty`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_list`
--
ALTER TABLE `patient_list`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `appointment_list`
--
ALTER TABLE `appointment_list`
    MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctors_list`
--
ALTER TABLE `doctors_list`
    MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctors_schedule`
--
ALTER TABLE `doctors_schedule`
    MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `medical_specialty`
--
ALTER TABLE `medical_specialty`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
    MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patient_list`
--
ALTER TABLE `patient_list`
    MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
    MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
