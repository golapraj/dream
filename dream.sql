-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2015 at 06:56 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dream`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
  `donor_id` varchar(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `nickname` varchar(15) NOT NULL,
  `hall` varchar(33) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `blood_group` varchar(2) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `birth_day` date NOT NULL,
  `weight` int(3) NOT NULL,
  `join_date` date NOT NULL,
  `last_date_of_donation` date NOT NULL,
  `no_of_donation` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `tk` int(5) NOT NULL DEFAULT '0',
  `added_by` varchar(30) NOT NULL,
  `last_updated_by` varchar(30) NOT NULL,
  `home_district` varchar(20) NOT NULL,
  `current_location` varchar(20) NOT NULL,
  PRIMARY KEY (`donor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`donor_id`, `name`, `nickname`, `hall`, `dept`, `blood_group`, `mobile`, `birth_day`, `weight`, `join_date`, `last_date_of_donation`, `no_of_donation`, `email`, `role`, `password`, `tk`, `added_by`, `last_updated_by`, `home_district`, `current_location`) VALUES
('041107018', 'Emtious Md. Sazzad Hossain', 'Emtious', 'Amar Ekushy', 'CSE', 'O+', '01911200554', '1993-05-16', 58, '2015-08-05', '2015-01-01', 0, 'emtious@gmail.com', 'volunteer', '041107018', 100, '051207005', '051207005', 'Mymenshing', 'Khulna'),
('051201005', 'Apon', 'apon', 'Lalan Shah', 'CE', 'A-', '01512334444', '2015-08-11', 22, '2015-08-30', '2015-01-01', 0, 'a@h.com', 'donor', '', 0, '051207005', '051207005', 'Comilla', 'Comilla'),
('051207001', 'Abdul Aziz', 'Sorkar', 'Lalan Shah', 'CSE', 'A+', '01912345678', '2015-08-27', 66, '2015-08-20', '2015-01-01', 0, '', 'donor', '', 0, '051207005', '051207005', 'Jamalpur', 'Khulna'),
('051207003', 'Mahmudur Rahman', 'Tanim', 'Lalan Shah', 'CSE', 'B+', '01723444444', '1993-11-01', 60, '2015-08-15', '2015-01-01', 0, '', 'volunteer', '051207003', 3000, '051207005', '051207005', 'Mymenshing', 'Bagerhat'),
('051207004', 'Ashad Opu', 'Opu', 'Lalan Shah', 'CSE', 'A+', '01933951849', '0000-00-00', 65, '2015-06-29', '2014-01-01', 3, '', 'volunteer', '051207004', 0, '051207005', '', '', ''),
('051207005', 'Md. Asaf-Uddowla', 'Golap', 'Lalan Shah', 'CSE', 'A+', '01521453003', '1993-07-16', 56, '2015-08-21', '2015-01-01', 0, 'golapraj@yahoo.com', 'admin', '051207005', 1000, '051207005', '051207005', 'Bagerhat', 'Bagerhat'),
('051207011', 'Akib Shahriar', 'Sawon', 'Lalan Shah', 'CSE', 'B-', '01197343743', '1992-12-01', 88, '2015-08-27', '2015-01-01', 3, '', 'donor', '', 0, '051207005', '051207005', 'Khulna', 'Khulna'),
('051207012', 'Masum Al Masba', 'mezba', 'Lalan Shah', 'CSE', 'AB', '01712333333', '2015-08-27', 77, '2015-08-23', '2015-01-01', 0, '', 'donor', '', 0, '051207005', '', 'Rangpur', 'Khulna'),
('051207021', 'Ahmad Musa', 'Musa', 'Lalan Shah', 'CSE', 'B+', '01522832939', '0000-00-00', 0, '2015-07-10', '2015-01-01', 0, '', 'donor', '', 0, '051207005', '', '', ''),
('051207023', 'Montasir', 'Montasir', 'Lalan Shah', 'CSE', 'AB', '01735507903', '1995-04-02', 78, '2015-07-26', '2015-01-01', 0, '', 'donor', '', 0, '051207005', '', '', ''),
('051207030', 'Abu Taher', 'Asif', 'Lalan Shah', 'CSE', 'O+', '01197343743', '1993-12-31', 66, '2015-07-14', '2015-01-01', 0, '', 'donor', '', 0, '051207003', '', '', ''),
('051207033', 'Fahim Al Mahmud', 'Ashik', 'Lalan Shah', 'CSE', 'B+', '01711394908', '0000-00-00', 0, '2015-06-29', '2015-01-01', 0, '', 'donor', '', 0, '051207005', '', '', ''),
('061207010', 'Kazi Afsana', 'Mousumi', 'Begum Rokeya', 'CSE', 'O+', '01933951849', '0000-00-00', 0, '2015-07-01', '2015-01-01', 0, '', 'volunteer', '', 0, '', '', '', ''),
('061207039', 'Mashfi Sumaiya', 'Mashfi', 'Begum Rokeya', 'CSE', 'B+', '01521452967', '1993-11-11', 56, '2015-07-12', '2015-01-01', 0, '', 'donor', '', 0, '051207005', '', '', ''),
('061207048', 'Nasrin Akter Rima', 'Rima', 'Begum Rokeya', 'CSE', 'A+', '01521455796', '1993-12-12', 55, '2015-07-12', '2015-01-01', 0, '', 'donor', '', 0, '051207003', '051207005', '', ''),
('071107004', 'Rashik Hasnat', 'Rashik', 'Bangobondhu Sheikh Mujibur Rahman', 'CSE', 'O+', '01735507903', '1992-01-01', 88, '2015-08-01', '2015-01-01', 0, '', 'volunteer', '071107004', 0, '051207005', '051207005', '', ''),
('071207046', 'Saif Mahmud Parvez', 'Saif', 'Bangobondhu Sheikh Mujibur Rahman', 'CSE', 'B+', '01521452967', '0000-00-00', 0, '2015-07-01', '2015-01-01', 0, '', 'donor', '', 0, '051207005', '', '', ''),
('071207047', 'Maaheer Amieer Bin Seraj Sakib', 'Mahir', 'Bangobondhu Sheikh Mujibur Rahman', 'CSE', 'B+', '01775089298', '1993-01-11', 75, '0000-00-00', '2015-06-01', 0, '', 'volunteer', '071207047', 40, '051207005', '051207005', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `sl` int(5) NOT NULL AUTO_INCREMENT,
  `entry_date` date NOT NULL,
  `tittle` varchar(500) NOT NULL,
  `details` varchar(5000) NOT NULL,
  `last_date` date NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`sl`, `entry_date`, `tittle`, `details`, `last_date`, `type`) VALUES
(2, '2015-07-13', 'welcome to Dream, Voluntary Blood Donation Society', 'welcome to dream \nhello dream\nhello dream\nhello dream                        dream', '2016-01-01', 'news'),
(3, '2015-07-13', 'hello dream hello dream hello dream hello dream hello dream hello dream ', 'hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream hello dream ', '2015-07-11', 'event'),
(4, '2015-07-15', 'tittle', 'fsdfsdfdsxvx cvxcvxcgdsfcvcxvxc\r\nbvcxvbcxvbxcx', '2015-07-17', 'news'),
(5, '2015-07-15', 'notice 2', 'sfdasdjasd AHDGSAJD\r\nAHGSDAHD\r\n ADHDGja\r\ndggsajdhghuas\r\nshdgsh\r\nshdgjs                        cfhhgfkj\r\n', '2015-07-31', 'event'),
(6, '2015-07-15', 'notice 3', 'demo notice \r\ndemo notice \r\ndemo notice \r\ndemo notice \r\n                                 demo notice \r\n', '2015-07-24', 'news'),
(7, '2015-07-15', 'notice 4', 'demo tice                                        demp', '2015-07-25', 'event'),
(8, '2015-07-15', 'demo notice', 'details:\r\n1. ek\r\n2. dui\r\n3. tin                                                       char\r\n\r\n\r\n\r\n\r\n\r\n\r\n                          fach', '2015-07-18', 'event'),
(9, '2015-07-15', 'demo notice 3', '1. we                                         th\r\n2.hi ', '2015-07-16', 'news'),
(10, '0000-00-00', '', '', '0000-00-00', 'news');

-- --------------------------------------------------------

--
-- Table structure for table `noticefile`
--

CREATE TABLE IF NOT EXISTS `noticefile` (
  `sl` int(4) NOT NULL AUTO_INCREMENT,
  `tittle` varchar(1000) NOT NULL,
  `entry_date` date NOT NULL,
  `last_date` date NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `noticefile`
--

INSERT INTO `noticefile` (`sl`, `tittle`, `entry_date`, `last_date`, `link`) VALUES
(3, 'hello', '2015-07-18', '2015-07-17', 'notice/ReadMe.txt'),
(4, 'Ahmad Musa', '2015-07-15', '2015-07-26', 'notice/LICENSE.txt'),
(5, 'Mahmudur Rahman', '2015-07-18', '2015-07-03', 'notice/ReadMe.txt'),
(6, 'new', '2015-07-11', '2015-02-01', 'notice/New Microsoft Word Document.pdf'),
(7, 'pdf', '2015-08-31', '2015-08-29', 'notice/OVERVIEW.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `transection`
--

CREATE TABLE IF NOT EXISTS `transection` (
  `form_no` int(15) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `donor_id` varchar(9) NOT NULL,
  `donor_name` varchar(30) NOT NULL,
  `donor_age` int(3) NOT NULL,
  `donor_weight` int(3) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_hospital` varchar(50) NOT NULL,
  `patient_age` int(3) NOT NULL,
  `patient_disease` varchar(50) NOT NULL,
  `patient_address` varchar(100) NOT NULL,
  `patient_mobile` varchar(11) NOT NULL,
  `receiver_name` varchar(30) NOT NULL,
  `receiver_address` varchar(100) NOT NULL,
  `receiver_national_id` varchar(25) NOT NULL,
  `receiver_mobile` varchar(11) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `volunteer1_tk_collector` varchar(30) NOT NULL,
  `volunteer2` varchar(30) NOT NULL,
  `volunteer3` varchar(30) NOT NULL,
  `volunteer4` varchar(30) NOT NULL,
  `volunteer5` varchar(30) NOT NULL,
  `medical_officer` varchar(30) NOT NULL,
  PRIMARY KEY (`form_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transection`
--

INSERT INTO `transection` (`form_no`, `date`, `time`, `donor_id`, `donor_name`, `donor_age`, `donor_weight`, `patient_name`, `patient_hospital`, `patient_age`, `patient_disease`, `patient_address`, `patient_mobile`, `receiver_name`, `receiver_address`, `receiver_national_id`, `receiver_mobile`, `relation`, `volunteer1_tk_collector`, `volunteer2`, `volunteer3`, `volunteer4`, `volunteer5`, `medical_officer`) VALUES
(1, '2015-07-14', '22:45:00.000000', '051207011', 'Akib Shahriar', 45, 88, 'opu', 'KMC', 22, 'Leukemia', 'Teligati,KUET,Khulna', '01912345678', 'Tanim', 'Shibbari,Khulna 9000', '123456789056784567', '01812345678', 'Brother', '051207003', '051207004', '061207010', '071107004', '071207047', 'Mijan'),
(2, '2015-07-14', '12:59:00.000000', '051207004', '', 45, 44, 'Musa', 'KMC', 25, 'lukemia', 'Teligati,KUET,Khulna', '01912345679', 'Maaheer', 'khulna', '4634634634634634634', '01812345678', 'Sister', '051207003', '051207004', '061207010', '071207047', '071107004', 'Mijan'),
(3, '2015-07-16', '13:59:00.000000', '051207011', '', 45, 88, 'Masum', 'KMC', 33, 'Leukemia', 'Teligati,KUET,Khulna', '01912345679', 'Tanim', 'Shibbari,Khulna 9000', '123456789056784567', '01735507950', 'Brother', '071207047', '051207003', 'null', 'null', 'null', 'Istiak'),
(4, '2015-07-17', '11:59:00.000000', '051207004', '', 45, 65, 'Musa', 'mamota clinic', 33, 'Leukemia', 'Teligati,KUET,Khulna', '01912345679', 'Maaheer', 'Shibbari,Khulna 9000', '4634634634634634634', '01812345678', 'Sister', 'null', '051207003', 'null', 'null', '071107004', 'Istiak'),
(5, '2015-07-17', '08:59:00.000000', '051207011', '', 45, 88, 'Masum', 'mamota clinic', 343, 'Leukemia', 'Teligati,KUET,Khulna', '01912345679', 'Tanim', 'khulna', '123456789056784567', '01735507950', 'Sister', '051207003', 'null', '051207004', 'null', '071107004', 'Mijan'),
(6, '2015-07-17', '12:59:00.000000', '051207004', '', 45, 65, 'Musa', 'Mamota Clinic', 25, 'Leukemia', 'Kuet', '01735507950', 'Tanim', 'Shibbari,Khulna 9000', '4634634634634634634', '01812345678', 'Sister', '071207047', '051207003', '051207004', '061207010', '061207010', 'Mijan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
