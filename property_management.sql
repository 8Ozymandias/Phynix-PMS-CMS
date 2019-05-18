-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 01:26 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_folders`
--

CREATE TABLE `admin_folders` (
  `folderID` int(11) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `last_date_modified` date NOT NULL,
  `who_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_folders`
--

INSERT INTO `admin_folders` (`folderID`, `folder_name`, `date_created`, `last_date_modified`, `who_created`) VALUES
(1, 'general file', '2018-09-26', '0000-00-00', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(3, 'kamar fisher', '2018-10-14', '0000-00-00', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc');

-- --------------------------------------------------------

--
-- Table structure for table `collect_rent`
--

CREATE TABLE `collect_rent` (
  `c_rent_id` int(11) NOT NULL,
  `rent_period` varchar(25) NOT NULL,
  `date_payed` date NOT NULL,
  `tenant_id` varchar(255) NOT NULL,
  `system_user_id` varchar(255) NOT NULL,
  `amount_payed` float NOT NULL,
  `payed_late` int(1) NOT NULL,
  `last_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_status` int(1) NOT NULL COMMENT '0-not payed, 1-payed out, 2-investigation, 3-inssuficient payment detils, 4-error'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collect_rent`
--

INSERT INTO `collect_rent` (`c_rent_id`, `rent_period`, `date_payed`, `tenant_id`, `system_user_id`, `amount_payed`, `payed_late`, `last_date_modified`, `transaction_status`) VALUES
(1, '12/10/2019', '0000-00-00', '13', '45', 34000, 1, '2018-09-19 13:20:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_balance_account`
--

CREATE TABLE `company_balance_account` (
  `caid` int(11) NOT NULL,
  `balance` float NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_collect`
--

CREATE TABLE `company_collect` (
  `comp_colc_id` int(11) NOT NULL,
  `amount_collected` float NOT NULL,
  `date_collected` date NOT NULL,
  `billing_period` varchar(100) NOT NULL,
  `last_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_upload`
--

CREATE TABLE `file_upload` (
  `fid` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` float NOT NULL,
  `date_added` date NOT NULL,
  `folderID` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_upload`
--

INSERT INTO `file_upload` (`fid`, `file_name`, `file_size`, `date_added`, `folderID`, `userID`) VALUES
(1, 'Vevo_Meets_Jamila_Woods.mp4', 14008.7, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(2, 'videoplayback.mp4', 20761.3, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(3, 'WhatsApp_Video_2018-03-03_at_4_00_44_PM.mp4', 34227.9, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(4, 'WIINSTON_-_Rosa.mp4', 12180.8, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(5, 'Example_of_a_talking_heads_for_web_project,_with_dramatic_white_background.avi', 10928.7, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(6, 'Moss_Kena_-_Square_One_(Official_Video).mp4', 16961.1, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(7, 'MyFirstVideoEdit_(1).mp4', 4305.91, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(8, 'MyFirstVideoEdit_(2).mp4', 4305.91, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(9, 'Nicki_Minaj_-_Right_Thru_Me_(Clean_Version).mp4', 15972.4, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(10, 'Snoop_Dogg_-_Words_Are_Few_(feat__B_Slade)_Official_Music_Video_ft__B_Slade.mp4', 55188.6, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(11, 'Thirdstory_-_Still_In_Love.mp4', 18125.3, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(12, 'Vevo_Meets_Jamila_Woods1.mp4', 14008.7, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(13, 'videoplayback1.mp4', 20761.3, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(14, 'WhatsApp_Video_2018-03-03_at_4_00_44_PM1.mp4', 34227.9, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(15, 'WIINSTON_-_Rosa1.mp4', 12180.8, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(16, 'Vevo_Meets_Jamila_Woods2.mp4', 14008.7, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(17, 'videoplayback2.mp4', 20761.3, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(18, 'WhatsApp_Video_2018-03-03_at_4_00_44_PM2.mp4', 34227.9, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(19, 'WIINSTON_-_Rosa2.mp4', 12180.8, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(20, 'Construction_Project_Work_Plan.docx', 36.05, '2018-05-27', '52', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(21, 'Employee_Work_Schedule.xlsx', 17.05, '2018-05-27', '52', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(22, 'employee-list.csv', 0.03, '2018-05-27', '52', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(23, 'employee-list.xlsx', 10.01, '2018-05-27', '52', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(24, 'organizational-chart.xlsx', 94.4, '2018-05-27', '52', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(25, 'Work_Plan.xlsx', 23.99, '2018-05-27', '52', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(26, 'Company_Name.docx', 16.02, '2018-05-27', '53', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(27, 'Construction_Project_Work_Plan.docx', 36.05, '2018-05-27', '53', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(28, 'Employee_Work_Schedule.xlsx', 17.05, '2018-05-27', '53', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(29, 'employee-list.csv', 0.03, '2018-05-27', '53', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(30, 'employee-list.xlsx', 10.01, '2018-05-27', '53', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(31, 'organizational-chart.xlsx', 94.4, '2018-05-27', '53', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(32, 'Work_Plan.xlsx', 23.99, '2018-05-27', '53', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(33, 'employee-list1.csv', 0.03, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(34, 'employee-list1.xlsx', 10.01, '2018-05-27', '53', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(35, 'employee-list2.csv', 0.03, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(36, 'employee-list1.xlsx', 10.01, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(37, 'organizational-chart1.xlsx', 94.4, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(38, 'Work_Plan1.xlsx', 23.99, '2018-05-27', '52', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(39, 'Query2.xlsx', 11.38, '2018-05-30', '55', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(40, 'Remax_It_Deparment_Process_Codes.xlsx', 9.33, '2018-05-30', '55', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(41, 'remaxpasswords.xlsx', 9.36, '2018-05-30', '55', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(42, 'seo_for_recoonect.xlsx', 8.67, '2018-05-30', '55', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(43, 'Company_Name.docx', 11.21, '2018-05-30', '55', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(44, 'd.docx', 11.67, '2018-05-30', '55', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(45, 'Donation_request_SBV_Labour_Day_2018.docx', 137.36, '2018-05-30', '55', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(46, 'few.docx', 103.21, '2018-05-30', '55', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(47, 'sdfsdf.docx', 782.6, '2018-05-30', '55', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(48, 'Stonebrook_Vista.docx', 11.52, '2018-05-30', '55', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(49, 'Breach_Letter_Lot_451.docx', 121.49, '2018-05-31', '56', ''),
(50, 'Breach_Letter_Lot_021.docx', 121.49, '2018-05-31', '56', ''),
(51, 'Breach_Letter_Lot_217.docx', 121.54, '2018-05-31', '56', ''),
(52, 'Breach_Letter_Lot_304.docx', 121.49, '2018-05-31', '56', ''),
(53, 'Breach_Letter_Lot_530.docx', 121.46, '2018-05-31', '56', ''),
(54, 'Breach_Letter_Lot_296.docx', 121.5, '2018-05-31', '56', ''),
(55, 'Breach_Letter_Lot_304_2.docx', 121.48, '2018-05-31', '56', ''),
(56, 'Breach_Letter_Lot_451.pdf', 355.45, '2018-05-31', '56', ''),
(57, 'Breach_Letter_Lot_021.pdf', 355.5, '2018-05-31', '56', ''),
(58, 'Breach_Letter_Lot_483.pdf', 355.55, '2018-05-31', '56', ''),
(59, 'Breach_Letter_Lot_530.pdf', 355.64, '2018-05-31', '56', ''),
(60, 'Breach_Letter_Lot_304.pdf', 355.59, '2018-05-31', '56', ''),
(61, 'Breach_Letter_Lot_296.pdf', 355.44, '2018-05-31', '56', ''),
(62, 'Breach_Letter_Lot_297.docx', 121.63, '2018-05-31', '56', ''),
(63, 'Breach_Letter_Lot_297.pdf', 355.6, '2018-05-31', '56', ''),
(64, 'Breach_Letter_Lot_217.pdf', 355.47, '2018-05-31', '56', ''),
(65, 'Breach_Letter_Lot_483.docx', 121.44, '2018-05-31', '56', ''),
(66, 'Breach_Letter_Lot_515.docx', 121.5, '2018-05-31', '56', ''),
(67, 'Breach_Letter_Lot_561.docx', 121.36, '2018-05-31', '56', ''),
(68, 'Breach_Letter_Lot_324.docx', 121.33, '2018-05-31', '56', ''),
(69, 'Breach_Letter_Lot_451.docx', 121.27, '2018-08-04', '53', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(70, 'Breach_Letter_Lot_516.docx', 118.18, '2018-08-04', '53', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(71, 'Breach_Report.pdf', 134.28, '2018-08-04', '53', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(72, 'Project64_Version_1_6_9_16_2018_2_31_15_PM.png', 8.74, '2018-09-26', '1', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(73, 'Capture.PNG', 32.58, '2018-10-14', '3', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(74, 'obsessed_chick.PNG', 215.59, '2018-10-14', '3', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(75, 'tempsnip.png', 320.56, '2018-10-14', '3', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(76, 'board-1709195_960_720.png', 124.77, '2018-10-24', '4', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc');

-- --------------------------------------------------------

--
-- Table structure for table `general_transacton`
--

CREATE TABLE `general_transacton` (
  `trans_id` int(11) NOT NULL,
  `name_of_trans` varchar(100) NOT NULL,
  `trans_hash` varchar(255) NOT NULL,
  `trans_status` int(1) NOT NULL,
  `trasn_start` date NOT NULL,
  `trans_end` date NOT NULL,
  `person_id` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `tax` float NOT NULL,
  `trans_desc` varchar(255) NOT NULL,
  `last_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `landlord_collect`
--

CREATE TABLE `landlord_collect` (
  `collect_id` int(11) NOT NULL,
  `property_id` varchar(255) NOT NULL,
  `amount_collected` float NOT NULL,
  `date_collected` date NOT NULL,
  `sys_user_id` varchar(255) NOT NULL,
  `rent_period` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `landlord_property`
--

CREATE TABLE `landlord_property` (
  `propertyID` int(11) NOT NULL,
  `propertyhash` varchar(200) NOT NULL,
  `rental_price` float NOT NULL,
  `multiple_units` int(1) NOT NULL,
  `total_units` int(11) NOT NULL,
  `furnished` int(1) NOT NULL,
  `property_management_fee_tax_percent` float NOT NULL,
  `property_street_address` varchar(255) NOT NULL,
  `property_city` varchar(255) NOT NULL,
  `property_state` varchar(255) NOT NULL,
  `property_country` varchar(255) NOT NULL,
  `property_zip` varchar(15) NOT NULL,
  `system_user` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `property_status` varchar(120) NOT NULL,
  `lease_id` varchar(255) NOT NULL,
  `landlordID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `landlord_property`
--

INSERT INTO `landlord_property` (`propertyID`, `propertyhash`, `rental_price`, `multiple_units`, `total_units`, `furnished`, `property_management_fee_tax_percent`, `property_street_address`, `property_city`, `property_state`, `property_country`, `property_zip`, `system_user`, `date_created`, `property_status`, `lease_id`, `landlordID`) VALUES
(1, '', 400000, 0, 0, 0, 0, '11 Riverside Drive', 'Montego Bay', 'StJames', 'Jamaica', '00000ll', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-04-15', 'rented', '', 1),
(2, '', 30000, 0, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-04-15', 'rented', '', 2),
(3, '', 100000, 0, 0, 0, 0, '11 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-04-15', 'rented', '', 1),
(4, '', 100000000, 0, 0, 0, 0, '116 Riverside Drive', 'Montego BAy', 'St.Jmes', 'Jamaica', '00000', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-04-15', 'rented', '', 13),
(5, '', 100000000, 0, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-04-15', 'rented', '', 3),
(6, '', 11000000000, 0, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-04-15', 'rented', '', 5),
(7, '', 800000, 0, 0, 0, 0, '11 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-04-15', 'rented', '', 1),
(8, '', -1222, 0, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-17', 'rented', '', 3),
(9, '', 30000, 0, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-17', 'rented', '', 5),
(10, '', 90000, 0, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-19', 'rented', '', 3),
(11, 'YN2hFnyQB9YciMSJOmNJi6XMJKuiYUF7G5QYxVIe1CJyagxQ7kQ6O1D4ekno9g4HYEVuOvscV0OgtuB7B2qrmgnvgQYigXumitLa', 1200000, 1, 10, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-22', 'open', '', 9),
(12, 'BJnpXEM96WC1qvcjvxog5nht4S2VZz4IdWAJIkCVoYt1C5pGaq8tGBwUc9HHtaFyXKNBkzVf1Qcf2YQfK2ZaYlaQOKeng83YndVZ', 1200000, 1, 10, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-22', 'open', '', 9),
(13, 'L6mF9aUhVLMb9Xd8BuNDb8mwKg9PFWKXz0Pusf7tZGPpQ0LsDxg6zXHYEEdgW57A9TPZbTGqA88Bjm5D2o3UKVPTbQSOpFejfWlu', 1200000, 1, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-22', 'open', '', 9),
(14, 's0bs6cwTGlqIsPLwj5Tsm82txAe3gBkw5GB9DDySPiampYC41BD8UG5OYNmvbI9Ry5rzIyp8UOb1nCc6VqsQIe4Th6w5PBpmkwOg', 1200000, 1, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-22', 'open', '', 9),
(15, 'wdncR5yDeU1wPzYgFml2l4r1J8Trd1o0VKfLbvEHSHC1A2rORGfYJiSzVMqJeK4Q0lL0gd0ppEMa7ITtlrueuj5CwuufCHkPO5f4', 1200000, 1, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-22', 'open', '', 9),
(16, 'mp8JsNLO4hA3210nZgBysrZS1Z5XL3rEDrl1NOhIzjb4uSNyfLCKs90Q0bwAezm6V7cyjnauamF9viMClt5YDFoz7QLXRD0LJB8f', 300000, 1, 0, 0, 0, '12 Chruhlane', 'montego bay', 'st.james', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-22', 'open', '', 15),
(17, '12pvs5xUYMKJBpHqqLNnJueSdWHsqzWi7JVjVaAzkKQB6rtbCpSX4sEv8vuFpzZWRHknIXYEDiL8kmApV9emNnpKYZpOzhOhLflq', 340000, 0, 0, 0, 0, '123 Stonebook Vista', 'Falmouth', 'Trelawny', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-22', 'rented', '', 12),
(18, 'JH3WsAm23psy9QIqcb6oQ5Z7zmyFWgDcN2gjNR7tAApuWnPlP4DJDI9JGQzRxi1RV6jjonvPRLK0uerKd7r1jNVx3k9uJAcm0es5', 340000, 1, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-22', 'open', '', 5),
(19, 'P2VrqO2ekrnVUaIudBLBLmSTC87od5aib0haOwKOvqjTnkwP3yRcLM6HMgShVpN4voT9fXVgFxRsg2OHqOfU7iry9SI8NeAOySZX', 1200000, 1, 0, 0, 0, '116 Riverside Drive', 'Montego BAy', 'St.Jmes', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-22', 'open', '', 13),
(20, 'Mpkgzf5Ian3YiActCIWPewLx96LuFyF8KNC8E7GbsgshCxKmtbOYt12DlOjc22kZ0A7CmbZqKzR3qkWxtz0iVLzxm62cqqVfYG5O', 340000, 1, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-22', 'open', '', 12),
(21, 'LsT9bfox4NLFVRlNcqUO7oEpQeEos7mLJoUmkaveFa2d1k7OcSrM5VrEFQmqUfXk2Amls3PfDt1K8KmrgS9kFD06kzGVa0EJlEL7', 100000000, 1, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-23', 'open', '', 2),
(22, 'sE4BMHhuqCq0gcO9D2lRNaj8PRlv8On3uNLJg471LlgmFWYsw0sw7BHMEvqWqLtDjfYyuUlnjLzQb4KUqscyVnfdIAjg9lk7d0rM', 450000000000000, 1, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-23', 'open', '', 9),
(23, 'tpzbGRMWQcmFrgI6nDgRTowhUm4mMZju5SkCQzjB8yvT9apLoMVR0Qh8xgvDaZc9XohY8SpiKpFYT5URoHMFB3mDbs64kkPuGXI1', 450000000000000, 1, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-23', 'open', '', 9),
(24, 'eQJv7Pp9KkmhLX7dvTT4mBJhS47HzQ6KIwsTex91WSKcFbZ2lxDdOariXiVt6Y93M19eEVXmwrADCz2s4d2kn09u2P5V4BvXitHb', 450000000000000, 1, 0, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-23', 'open', '', 9),
(25, 'GIQGF26aCJvwS3dN3s0oetIyPwNe1iJ8a1bRzduL9EL1JjwVk1kuRUJ179sL5cMr4hF3OIkllNjC5X0l0yx6uqXl85F7LW5FVotf', 1500000, 0, 0, 0, 0, '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-24', 'rented', '', 16),
(26, 'ZiSUqzd2j4YJR76Ylbpx5U1RJyIiS3yV8otOK0tBIo7CHNeo2jOOS3wvouiOdCxB73d8tIc684apChfhjWeuRxESDTCGG0FXm1qI', 1500000, 0, 0, 0, 0, '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-24', 'rented', '', 16),
(27, 'OZ1VFRmIChekVebnT0OkAXFwpgV4r0fRps1TEcTjqI7VfIrw2cZdIYLnHJDocl37sSxAVVkIjzvTtYpZvasAtDnPxg7uiiU7S5c8', 1500000, 0, 0, 0, 10.5, '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-24', 'rented', '', 16),
(28, 's8kHwUOcosdWewmyqA68H6LOaLOhmP3vC1FjWKMmn8XJLPQhZJRCqUbXVKGN7zEi2ulCaxrr0wBGf7lY2AeaeZFutscpRyR8bWRb', 89000, 0, 0, 0, 12.5, '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-27', 'rented', '', 17),
(29, 'H4UIq8Md5cb9Ljg9ei005Kkw4UI3oBgcj0cmfaTaOV2TevbYX5bVrOM92q35VfO3MbBcsCyswXFukRrc6OlwMzc4RIWW9sdrpvx5', 12000, 0, 0, 1, 12.5, '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-28', 'rented', '', 16),
(30, '2KlUoJ1dD5eEond5Mbtl5MHOozNm3IvQfbC9Mlugpk1ETPMEm5areC1YEYWv8bsfKnBcJg42yHLDuyVXILakV4N5hGd2sVnmcTrG', 12000, 0, 0, 0, 10.5, '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-28', 'rented', '', 17),
(31, 'KP83OYn826bUDPVSMLfyN8mBYRZSaMQBbLzpbHQN3ZLPFqbF0WZxiOvzCH4PIVReSCAKTK6k64NbaUtCE8ynzz80sQoYYSxsfyGT', 900000, 0, 0, 0, 12.5, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-28', 'rented', '', 5),
(32, '2fDuC9OqVl9MWhTTovnRwekK7TnJPTJ7fClBj99z1a0vZEiRqZU9tEBgpzY9VFQAe1Drk8CiLGwr79WAAZVW3raFjLvmp8eCJ6bs', 900000, 0, 0, 0, 12.5, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-28', 'rented', '', 5),
(33, 'Vyo6x0FfPtnLcHxm3ytmuMPj0EbsDgBOsJh08HFvsZOgFQiXmaqSgEPvwW6H8MuXJqUi885nBnDpuYeLvAsAHpLFeVooALsNszQN', 900000, 0, 0, 0, 12.5, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-28', 'rented', '', 5),
(34, 'xd0o8ulVYZUhvaJBaf7fiNgjw10IIWm4fWKwQQM81Pn2WM3u9nGtEQXMryW3MVz8qdxXY68g1hD9VTaAS4LF0fbdTimvS4PCWFfB', 9000000, 0, 0, 0, 12, '116 Riverside Drive', 'Montego BAy', 'St.Jmes', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-28', 'rented', '', 13),
(35, 'pFFyXVIUqyZboGR6KLclz4FsFrXSQa2MCf97GzUxgOEOkJIY9VYj2dpu4UP6sTrp4mx74GCAhxQ4eC34l5Q3yqRzRp1YI8am8Z0T', 9000000, 0, 0, 0, 12, '116 Riverside Drive', 'Montego BAy', 'St.Jmes', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-28', 'rented', '', 13),
(38, 'yu6FSz7B2m5kV1p5L1hG30EIshPVDglARWspQtzheTK25LHkeU8nVkUKfqBNzq7Rn1u32hDw2c5tKbtQZewq5vBSczkT4qlY6VmY', 200000000000, 1, 0, 0, 0, '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-29', 'open', '', 17),
(39, 'O0eSzjF0NU0PjLB95hqS0kgZvDoJFRsyi6AXNNmigov3oqObbCMs8JOIR7em5eymXetJJzq1mrNWuG9efgkbZlKj7ceY5yzIGUL0', 200000000000, 1, 0, 0, 0, '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-29', 'open', '', 17),
(40, 'CJBkgZoAxCgzpeCMtfcOkI4cHqyJxRTg1kifkdGRg0FBAmrEtsp6aWYBVBFdtGNZ8cjSbtZXq3UUDxwB3X8rhbpDIZZvLFRLGbAG', 120000, 0, 0, 1, 12, '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-04-30', 'rented', '', 17),
(41, 'pAVaiWHMMBcOEv6nd5PRLYDUmSPPOMLKkSdyoR2GXe7n3GtKHDiwpdyP8YWuT8nreF0bcgCHS5ZExSLn32AO2SORrznfseLdEzLn', 56000000, 1, 20, 0, 0, '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-05-08', 'open', '', 16),
(42, 'Dfk8TEKcs3T7zQ7ArlmM8R46HMhdYDfNMH7n80o3y3k4DkTu9G1JSqCnHPmoItXk01VObg2sZT712X42MDHItVFVTfOGjdY8wsaD', 120000, 0, 0, 1, 10, '11 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-05-08', 'rented', '', 1),
(43, 'lkPmZSI7jQIx6DeYgryuqJtPepPRuRN4Ttee009oG24MjjF2aaiN0I5ARs1qoiH0pybfenIvbUKBJWIly5WzJ3GQZYPf4UgHPf2A', 120000, 0, 0, 1, 10, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-05-08', 'rented', '', 2),
(44, 'dXTmhjQkngUyfvu0EnrAQrx2pw5fWML3FjhX78ZGXmxNHZXjszDOEpooBXNgp5VnGF6WFzvf7mg0skO9tLVrNwFep87Eszxx1xPF', 34555, 0, 0, 0, 12.5, '11 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-09-11', 'rented', '', 1),
(45, '7KrEq6UYSePRyHmFofafmZJGNP4kcpIDZd7kqrWRegAbWt5OXTlxVk2KLufbQqVUG9H8kzj320Hq3AiyGoz6YvzQzygE50Jqo3OA', 23111, 0, 0, 1, 15, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '2018-09-11', 'rented', '', 7),
(46, 'l4ujyTjIBJYSHIsW7idesdNmdCcBwASRWTrOk5z09L1OGC93E6WIRnGT6gomce4hJraT2bBRiRIaLVImr28wiyGPkIuAmADVxwEW', 67000000, 1, 10, 0, 0, '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-10-06', 'open', '', 3),
(47, 'p9GdkNbssGyBPG8y5a9os3Mc8axo579HUlX5k8kcfi0kGmRnGQUhY2jUzmmdHX9zM1KoE6l7AQTRIrIq1KLXrwXOS1qqqkOgHwCg', 53, 0, 0, 1, 12, 'Select TABLE_SCHEMA, Count(TABLE_NAME) as Tables_In_DB from information_schema.tables Group BY TABLE_SCHEMA\';\';Select TABLE_SCHEMA, Count(TABLE_NAME) as Tables_In_DB from information_schema.tables Group BY TABLE_SCHEMA', 'Select TABLE_SCHEMA, Count(TABLE_NAME) as Tables_In_DB from information_schema.tables Group BY TABLE_SCHEMA\';\';Select TABLE_SCHEMA, Count(TABLE_NAME) as Tables_In_DB from information_schema.tables Group BY TABLE_SCHEMA', 'Select TABLE_SCHEMA, Count(TABLE_NAME) as Tables_In_DB from information_schema.tables Group BY TABLE_SCHEMA\';\';Select TABLE_SCHEMA, Count(TABLE_NAME) as Tables_In_DB from information_schema.tables Group BY TABLE_SCHEMA', 'Select TABLE_SCHEMA, Count(TABLE_NAME) as Tables_In_DB from information_schema.tables Group BY TABLE_SCHEMA\';\';Select TABLE_SCHEMA, Count(TABLE_NAME) as Tables_In_DB from information_schema.tables Group BY TABLE_SCHEMA', 'Select TABLE_SC', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', '2018-10-11', 'open', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `line_of_charge`
--

CREATE TABLE `line_of_charge` (
  `charge_id` int(11) NOT NULL,
  `des_of_charge` varchar(255) NOT NULL,
  `date_of_charge` date NOT NULL,
  `date_charge_created` date NOT NULL,
  `charge_amount` float NOT NULL,
  `system_user` varchar(255) NOT NULL,
  `tenant_id` varchar(255) NOT NULL,
  `charge_status` int(1) NOT NULL,
  `last_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `line_of_credit`
--

CREATE TABLE `line_of_credit` (
  `credit_id` int(11) NOT NULL,
  `des_of_credit` varchar(255) NOT NULL,
  `date_of_credit` date NOT NULL,
  `date_credit_created` date NOT NULL,
  `credit_amount` float NOT NULL,
  `system_user` varchar(255) NOT NULL,
  `tenant_id` varchar(255) NOT NULL,
  `credit_status` int(1) NOT NULL,
  `last_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_bills`
--

CREATE TABLE `monthly_bills` (
  `bill_id` int(11) NOT NULL,
  `tenant_id` varchar(255) NOT NULL,
  `bill_period` varchar(100) NOT NULL,
  `due_date` date NOT NULL,
  `date_sent` date NOT NULL,
  `late_fee` float NOT NULL,
  `sent_status` int(1) NOT NULL,
  `paid_status` int(1) NOT NULL,
  `viewed` int(100) NOT NULL,
  `bill_hash` varchar(255) NOT NULL,
  `last_time_viewed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_bills`
--

INSERT INTO `monthly_bills` (`bill_id`, `tenant_id`, `bill_period`, `due_date`, `date_sent`, `late_fee`, `sent_status`, `paid_status`, `viewed`, `bill_hash`, `last_time_viewed`) VALUES
(1, '3', 'Sept 10, 2018 to Oct 10, 2018', '2018-10-12', '2018-10-07', 0, 1, 0, 0, 'aMRmGgh8P7fgmy', '2018-10-07 13:57:45'),
(2, '2', 'Sept 10, 2018 to Oct 10, 2018', '2018-10-11', '2018-10-07', 0, 1, 0, 0, 'CQwATyipD8CwwR', '2018-10-07 13:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `property_apartments`
--

CREATE TABLE `property_apartments` (
  `aid` int(11) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `aptname` varchar(255) NOT NULL,
  `apt_status` varchar(15) NOT NULL,
  `apt_hash` varchar(11) NOT NULL,
  `rental_fee` float NOT NULL,
  `furnished` int(1) NOT NULL,
  `property_management_fee_tax_percent` float NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_apartments`
--

INSERT INTO `property_apartments` (`aid`, `pid`, `aptname`, `apt_status`, `apt_hash`, `rental_fee`, `furnished`, `property_management_fee_tax_percent`, `date_added`) VALUES
(1, '39', 'unit01', 'rented', 'UOt6oxrK', 13333300000, 1, 10.5, '2018-04-29'),
(2, '39', 'unit02', 'rented', 'dEl8c2df', 13333300000, 1, 10.5, '2018-04-29'),
(3, '39', 'unit03', 'rented', 'WXmktwPG', 13333300000, 1, 10.5, '2018-04-29'),
(4, '39', 'unit04', 'rented', 'DUUZB153', 13333300000, 1, 10.5, '2018-04-29'),
(5, '39', 'unit05', 'rented', 'X8Ethx3I', 13333300000, 1, 10.5, '2018-04-29'),
(6, '39', 'unit06', 'rented', 'SKuazjhP', 13333300000, 1, 10.5, '2018-04-29'),
(7, '39', 'unit07', 'rented', 'gg8xhUgU', 13333300000, 1, 10.5, '2018-04-29'),
(8, '39', 'unit08', 'rented', '8UURzYEw', 13333300000, 1, 10.5, '2018-04-29'),
(9, '39', 'unit09', 'rented', 'pde6FNMQ', 13333300000, 1, 10.5, '2018-04-29'),
(10, '39', 'unit10', 'rented', 'm7zsw8p3', 13333300000, 1, 10.5, '2018-04-29'),
(11, '39', 'unit11', 'rented', 'xEjaWHJg', 13333300000, 1, 10.5, '2018-04-29'),
(12, '39', 'unit12', 'rented', 'PoQqPg5X', 13333300000, 1, 10.5, '2018-04-29'),
(13, '39', 'unit13', 'rented', 'rbhknh21', 13333300000, 1, 10.5, '2018-04-29'),
(14, '39', 'unit14', 'rented', 'D6biHwKF', 13333300000, 1, 10.5, '2018-04-29'),
(15, '39', 'unit15', 'rented', 'fX8Lt8lm', 13333300000, 1, 10.5, '2018-04-29'),
(16, '41', 'unit01', 'rented', 'G10zA6yC', 2800000, 1, 12, '2018-05-08'),
(17, '41', 'unit02', 'rented', 'FqABGkyM', 2800000, 1, 12, '2018-05-08'),
(18, '41', 'unit03', 'rented', 'P0M3a3L3', 2800000, 1, 12, '2018-05-08'),
(19, '41', 'unit04', 'rented', 'izmckaWo', 2800000, 1, 12, '2018-05-08'),
(20, '41', 'unit05', 'rented', 'C1eD7vWD', 2800000, 1, 12, '2018-05-08'),
(21, '41', 'unit06', 'rented', 'O4ytQ2o0', 2800000, 1, 12, '2018-05-08'),
(22, '41', 'unit07', 'rented', '9hrNXkwC', 2800000, 1, 12, '2018-05-08'),
(23, '41', 'unit08', 'rented', 'eXC8IWZl', 2800000, 1, 12, '2018-05-08'),
(24, '41', 'unit09', 'rented', 'ZyAFsyLu', 2800000, 1, 12, '2018-05-08'),
(25, '41', 'unit10', 'rented', 'kQ7pJCTc', 2800000, 1, 12, '2018-05-08'),
(26, '41', 'unit11', 'rented', 'A1weH57S', 2800000, 1, 12, '2018-05-08'),
(27, '41', 'unit12', 'rented', '620CGZ3n', 2800000, 1, 12, '2018-05-08'),
(28, '41', 'unit13', 'rented', 'A4CkLXNy', 2800000, 1, 12, '2018-05-08'),
(29, '41', 'unit14', 'rented', 'ZZvd1eLu', 2800000, 1, 12, '2018-05-08'),
(30, '41', 'unit15', 'rented', 'o4ektQcD', 2800000, 1, 12, '2018-05-08'),
(31, '41', 'unit16', 'rented', '9kDaNl5A', 2800000, 1, 12, '2018-05-08'),
(32, '41', 'unit17', 'rented', 'ytJbULFp', 2800000, 1, 12, '2018-05-08'),
(33, '41', 'unit18', 'rented', 'gqUPWL6c', 2800000, 1, 12, '2018-05-08'),
(34, '41', 'unit19', 'rented', 'TLgromCf', 2800000, 1, 12, '2018-05-08'),
(35, '41', 'unit20', 'rented', 'Xi21KrY4', 2800000, 1, 12, '2018-05-08'),
(36, '46', 'appt01', 'open', 'Oh6q68eF', 6700000, 0, 12.5, '2018-10-06'),
(37, '46', 'appt02', 'open', 'CrlgTsgi', 6700000, 0, 12.5, '2018-10-06'),
(38, '46', 'appt03', 'open', 'AiCMpoqt', 6700000, 0, 12.5, '2018-10-06'),
(39, '46', 'appt04', 'open', 'aBkzNbpa', 6700000, 0, 12.5, '2018-10-06'),
(40, '46', 'appt05', 'open', 'XtMxFsbE', 6700000, 0, 12.5, '2018-10-06'),
(41, '46', 'appt06', 'open', 'KOwjdPYv', 6700000, 0, 12.5, '2018-10-06'),
(42, '46', 'appt07', 'open', 'SE5pockD', 6700000, 0, 12.5, '2018-10-06'),
(43, '46', 'appt08', 'open', 'nEbCdvSW', 6700000, 0, 12.5, '2018-10-06'),
(44, '46', 'appt09', 'open', 'nrhK4KHO', 6700000, 0, 12.5, '2018-10-06'),
(45, '46', 'appt10', 'open', 'vzvaQKNP', 6700000, 0, 12.5, '2018-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `property_balance_account`
--

CREATE TABLE `property_balance_account` (
  `abid` int(11) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `balance` float NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_balance_account`
--

INSERT INTO `property_balance_account` (`abid`, `pid`, `balance`, `date_added`) VALUES
(2, 'tLznnLpKQGSDqo9HKMUjEaHcLumBwTSQacKQTqmEzWEvzjt7vamwJmldT3TJuOU9qeot0s', 0, '2018-04-21'),
(3, 'ZiSUqzd2j4YJR76Ylbpx5U1RJyIiS3yV8otOK0tBIo7CHNeo2jOOS3wvouiOdCxB73d8tIc684apChfhjWeuRxESDTCGG0FXm1qI', 120000, '2018-04-24'),
(4, 'OZ1VFRmIChekVebnT0OkAXFwpgV4r0fRps1TEcTjqI7VfIrw2cZdIYLnHJDocl37sSxAVVkIjzvTtYpZvasAtDnPxg7uiiU7S5c8', 120000, '2018-04-24'),
(5, 's8kHwUOcosdWewmyqA68H6LOaLOhmP3vC1FjWKMmn8XJLPQhZJRCqUbXVKGN7zEi2ulCaxrr0wBGf7lY2AeaeZFutscpRyR8bWRb', 0, '2018-04-27'),
(6, 'H4UIq8Md5cb9Ljg9ei005Kkw4UI3oBgcj0cmfaTaOV2TevbYX5bVrOM92q35VfO3MbBcsCyswXFukRrc6OlwMzc4RIWW9sdrpvx5', 3400000, '2018-04-28'),
(7, '2KlUoJ1dD5eEond5Mbtl5MHOozNm3IvQfbC9Mlugpk1ETPMEm5areC1YEYWv8bsfKnBcJg42yHLDuyVXILakV4N5hGd2sVnmcTrG', 3400000, '2018-04-28'),
(8, 'KP83OYn826bUDPVSMLfyN8mBYRZSaMQBbLzpbHQN3ZLPFqbF0WZxiOvzCH4PIVReSCAKTK6k64NbaUtCE8ynzz80sQoYYSxsfyGT', 100000, '2018-04-28'),
(9, '2fDuC9OqVl9MWhTTovnRwekK7TnJPTJ7fClBj99z1a0vZEiRqZU9tEBgpzY9VFQAe1Drk8CiLGwr79WAAZVW3raFjLvmp8eCJ6bs', 100000, '2018-04-28'),
(10, 'Vyo6x0FfPtnLcHxm3ytmuMPj0EbsDgBOsJh08HFvsZOgFQiXmaqSgEPvwW6H8MuXJqUi885nBnDpuYeLvAsAHpLFeVooALsNszQN', 100000, '2018-04-28'),
(11, 'xd0o8ulVYZUhvaJBaf7fiNgjw10IIWm4fWKwQQM81Pn2WM3u9nGtEQXMryW3MVz8qdxXY68g1hD9VTaAS4LF0fbdTimvS4PCWFfB', 0, '2018-04-28'),
(12, 'pFFyXVIUqyZboGR6KLclz4FsFrXSQa2MCf97GzUxgOEOkJIY9VYj2dpu4UP6sTrp4mx74GCAhxQ4eC34l5Q3yqRzRp1YI8am8Z0T', 0, '2018-04-28'),
(13, '2b3Cmyon8muHdR7Ivffu6eQuYnKJZbdlU7U0DiiHm1e51tDadRUZtAt0IPcCrgeRKrZRxUIizzscKATjLL5G0Kb355wWPHrtL9qF', 340000, '2018-04-29'),
(14, 'S4ojw6YKui8qsj3KwWT1FrPE2tK7woDH1YI20f1VBMfwXlz9gU2URXIAC8HIe4E2AoXlEQksYRhhEH73PUTQiSu7XsdNXH1c9MrI', 340000, '2018-04-29'),
(15, 'TeNAh4bL8zxwZ2Af5vHD6Z18nsz1hdnlmHGDqvklK6jVOTrfxRn2WQ5tiF1qV9ipbErhWDrcaZ6acSsRdsqWMifLzOnrOOLdYv5y', 340000, '2018-04-29'),
(16, 'fycJtWYQyq6agwiD9UTdl5ToR0yLP9TuxVOYSFUvFopA3R5p0G5tKeaACBxGlGIwVRGKmvSZ45Ntgy3xbQ5dXaM2Ojj39907q0vt', 340000, '2018-04-29'),
(17, 'Nqi2GY0n2XiolT8qFHAVQjNYsuq1xRYGfdDnEDigpVz9t6yjiTSt0slHqPKzejpVWNbCjhAuYFANmx6TRxNM8Jgsk92BTCvyeqGW', 340000, '2018-04-29'),
(18, 'mvn0IvZB53W43vwzLDbsRWMQ4Vqs2uYapohA1ESwbhT8IDcqJJ3Q99gj1JSGYl9KIYbUY0iIsjiu9mpF5FhJXz761CjujdOaa7VG', 340000, '2018-04-29'),
(19, 'hspqnc43U0WkLFNUCvp15uXEinFhV1P2zEVzqfGRAn2GNj5K7UyiXUvCQhFOTRG9kPDMrXhH41m1DxSg4nSJsibGdnNrQaRmVXLi', 340000, '2018-04-29'),
(20, 'WdURjJ5li3xVAMbxU6Huyd9pYcxyCLhrazs3pL6ISuKyttH9gD8jhaUy3kkzgTYUr2jW6L9IyGx8EUH87Cyhm5oBZNWh2wj6HYIA', 340000, '2018-04-29'),
(21, 'fdCqVBygdVRaxI4anUQKiRLDlyHOuk8gm7VZnypQRxXHaSIrJtqRliSLauUpJzKVbGtKPP68g60GaUkHPIqqsr2HKJ1xMIMdn6tM', 340000, '2018-04-29'),
(22, 'FOnFSKoq4F4R0DGAYa2uz2qHHomOtNcswPnElQ8beLHqEZKlxfSHlcOeacXQtXDTp8wFq56foJHI5eaVDKx2mu3csuIx2CUnADzw', 340000, '2018-04-29'),
(23, 'yGUMdSPEP8Lj9NLLbeDXEwhJvF9c7Da6hQ0Aq7ceGC1suyTmhu2cU7t2HpZKS9NZ8nkTu1RsvFXC7CcjzEpJGF0bKP1GqgNkwwUn', 340000, '2018-04-29'),
(24, 'UuDW09Ucz4OXI0mqzraJvYqgdNB7BeY8VqXG00F49VZ0JU2uz62o1lRe0HHKzbeO6foDdqYCOW7LXUNcKBm84GJ79mNQskSO3hIo', 340000, '2018-04-29'),
(25, 'jMe3pWY5iF1D7mTfr2VHfeKlTHY5DpEcbPocdhvZiHqbI7MeXMYlClvhS9IlWsoIWv4aRjwPKjSXIgJ1TpHSoHs5qdAeYgpxBubp', 340000, '2018-04-29'),
(26, 'yGvIPNswh5uKgXmaIlunXj9fmSZQBd5Wutc1DiFhp1HA6Xw8eCwZ88KR7iaO1MsH2Jbq74ZtuVcbeSV2yKURuS2LDLEZkqj2W3nu', 340000, '2018-04-29'),
(27, 'etBeIrdvaQ78g1Rhnx44rn0pwdWASa1p8NMc7pdp2rAjrYiE4xisnah2e1BGj6piG3qTMcz6If5SkOztzvtXxKGPIBwAykal7nZk', 340000, '2018-04-29'),
(28, 'CJBkgZoAxCgzpeCMtfcOkI4cHqyJxRTg1kifkdGRg0FBAmrEtsp6aWYBVBFdtGNZ8cjSbtZXq3UUDxwB3X8rhbpDIZZvLFRLGbAG', 35000000, '2018-04-30'),
(29, '8Ec5yFQxSfzI5JNqZvhAFVZakKCIdzAssxoiwipfQcSrhDS1v9FaxlMsVf1MFR9DnJ0PmsbN8JbliLCdqAQyjrYnVoIZ2R15Clyk', 450000, '2018-05-08'),
(30, 'kxTnQmEs19fwGoUlSm3ZIMxWgWbNKT7gelZDCMXVsUhuNsC5bJzojfG6tU45f1sNKtvvmEKv52LqnKb1uKSNKvswm8F5u7FGy3GW', 450000, '2018-05-08'),
(31, 'JKoPDeZY9TeRAg1tbhEHKVX2lbNlgVtVN8KDt6NYaOtcHtnQDsqKvY1BmyErCw8W4MMJi0TteuNCpirmZoRLshvNF3DnmZ4MPPma', 450000, '2018-05-08'),
(32, 'ulPsakJ7FkDm6btoeqAHAIqIicRDZvme7y9WU5nuxDGhf3wn9zCFyjvXXpjtrS4ZpT25qFM2kmn7Irh7ZGwCYZTRL86ILYcyg3yD', 450000, '2018-05-08'),
(33, 'K1m4xdjlEhAZO36Cnl40m7BhJIRnhsL5pM2qEmw6u4mHnUljiYPUeHKyULjTECnvqqQsRfgRF4t4TmhyZLkRumvuhmDxycOuQAJ2', 450000, '2018-05-08'),
(34, 'ddNrrW5u7stMqsKorFTszyH6hjBSiIOjaVVQdRzhqkMXTZKKQcguxCxLqzekWHvsx7OXV8apvPwMXgjCqB7qvfSN8VWnNm4DIfFy', 450000, '2018-05-08'),
(35, 'KOVw0GULUFKl2Ny5ySlQk3fybehgBFDhv6bCQHlPTfQDXTFRxMHLtYlnGKbUkT13b7cs4RXzcLI3AcmCRqS9wDalHSwWQPxI5K0S', 450000, '2018-05-08'),
(36, 'PeuRAVmHrJQKgXJoj1NX7qPqyfEPKuAG9PUfKBGf1RkWVNteozXIJTVeMG7txo1PPZRpl4xJAP8RehkjiGzcFBmSlwSm9i2BpAYQ', 450000, '2018-05-08'),
(37, '5ZfNYu2cZ8ZPyxXR1KMOB80yudecTFrgrUA5GQlgibIrhlKOAuJ9bCbhvJs5e2xJSjA1i2U2DwhE9J3U4RoVPNHIEjjLEeX5HTl3', 450000, '2018-05-08'),
(38, 'UxUQI6N5VdCqSlVOcl74Iujg5eXS7Qw35nGCmcrazfwWDmrcq5VNaWLIOrKHfFxQIhkfDhytx4Tv4KlbJp9f6AL9jRpuRGWQoMPC', 450000, '2018-05-08'),
(39, 'jv1hvs9sQRr1V3ZpS2imxD2SpLumIhl89DIRVmQAIETsMpzXjZlNS2aVHLxzQiqc8XUNeqLBJXftrwFmBjTvuJrdkscDXQj1hMsS', 450000, '2018-05-08'),
(40, 'uI5GZ5TcD9snAzWW5f3wqesI2oHLRVVZ5Zw49Nlo74hEtrpPca6oYZLr3e1IgQzzxRMCt2XwBXRWYETOtYfVZIbq2c1CmYs1u99K', 450000, '2018-05-08'),
(41, '3VanpHi1rNFAnAC3aXEbmQwGIVdvAfjUknyg5vTMyAUjlWPftI6G5IHlTAnhpJbdYUHtvATSzykHY9sW2caM8SyhVw0XWptP5anP', 450000, '2018-05-08'),
(42, 'phebB4CDmGbQyKM7SlucL3hga4T3PZAtJhlI0FNUbyFcfN3DvmzZuRLeTQ0tcRXJspbaE8vrxchNlsb7aFYufQV02yrfT6n3rnDK', 450000, '2018-05-08'),
(43, 'mzc66DIZYZzCZ5wND841KOTYgnW3Ro1JPLPjnpMhK0QLpF85xBRXLdmsVtXQX0hzBSz8RYx5oXOT7ABgOr5BrM08XNdYpqD66whL', 450000, '2018-05-08'),
(44, '0jhcAVZ7eOtvUz8NtraKbt7t2xlEAOpai4EkRxppxkDlfuRz6DdL02BM58qdfMbmqlyHk301Je3gQK70QpARuW9xMGbfuzutGZI9', 450000, '2018-05-08'),
(45, 'J8BD0v7moITrDi90BHUOHCYSoyEOIhmYv22Sv7Xchp8AbpMo7w3HTjB8bSaHdqamdEy0nNx8EYb9QJQagvpcdmDSxF7ysZywKgVH', 450000, '2018-05-08'),
(46, 'mSbaoEbbm2C9saw8witxGQl93BYBUOQHPYaBQwqKArLIdOrvZndpvgZ7bAvAa3H8BE7aV3DX5w2AotI9DnkZiiMNjMDG5bQmJhvQ', 450000, '2018-05-08'),
(47, 'dKZOGg2KsROW0STAYUWyz4asId3KvE8GNunvLfd5dIXJoDNj6XQRoXOIFbULDiyws8jVqQ1xKyfsKgfh3e4o8H755MO2xmK95t7i', 450000, '2018-05-08'),
(48, 'c7bV6890whDIJh1hQ9UYllWKC5E3xbS338jSiHIhE66zKuqsnD5snXdlPPYHeLyypnw4i3homP5L0RYGz3oT6GhTmeAP3akCExYM', 450000, '2018-05-08'),
(49, 'Dfk8TEKcs3T7zQ7ArlmM8R46HMhdYDfNMH7n80o3y3k4DkTu9G1JSqCnHPmoItXk01VObg2sZT712X42MDHItVFVTfOGjdY8wsaD', 4333, '2018-05-08'),
(50, 'lkPmZSI7jQIx6DeYgryuqJtPepPRuRN4Ttee009oG24MjjF2aaiN0I5ARs1qoiH0pybfenIvbUKBJWIly5WzJ3GQZYPf4UgHPf2A', 4333, '2018-05-08'),
(51, 'dXTmhjQkngUyfvu0EnrAQrx2pw5fWML3FjhX78ZGXmxNHZXjszDOEpooBXNgp5VnGF6WFzvf7mg0skO9tLVrNwFep87Eszxx1xPF', 0, '2018-09-11'),
(52, '7KrEq6UYSePRyHmFofafmZJGNP4kcpIDZd7kqrWRegAbWt5OXTlxVk2KLufbQqVUG9H8kzj320Hq3AiyGoz6YvzQzygE50Jqo3OA', 0, '2018-09-11'),
(53, 'ZQEr7MyhBfUygNYXg9zF3Gsak4LdAG4nxCgcxfesuIdobywekSLQbmbMASSaWiwtXhtY0gUAtPGHLBhs0EppCZhgAsb37KBL8Lxs', 0, '2018-10-06'),
(54, 'QmUS7Doc5AAsu0SvrH2jFvkRLarCzATTjb0Vc0RFkemQrD9aWlIbk8s1XjooQY5tqwU6MK8y2qsx7CQKRWzfTesjmocfJZkZbnBa', 0, '2018-10-06'),
(55, 'QGtGefpzCFzINXaLYQhaCatmlztAT2t7NMFmec36vj7EZ8cfmd86YwbUEAyyC49hIGSCRdGCSOxnB5wxD8EydwBJH7lY8f2n9AhP', 0, '2018-10-06'),
(56, 'Oz0qTgC32bnpH8Z06GQ6NZ1r2DUdtD4UCMPMZ6DOIhlFaFtwl63W9QWt8GN46xUFIITOTHPmeVRP7iHGVNF5owoeuBNd73TB3hgr', 0, '2018-10-06'),
(57, 'EBM4Sa2H5O17Am0rlPlLEcfuLveoiO98RnT9s55K3HTUubq8xiQ1BUFrlavNE5H7NSmBuxsktHUwYtOJFA9YYLVh8DYihg65lVYp', 0, '2018-10-06'),
(58, 'dy7fcJgfN7oQxBrl89wKz0DHrnUntCpn8RI5TYAw8H3w1sUslX6xDKT78RrxA2q5YSbau2CJATHP20Bv0IrLePOOYMzOnSOiDmiS', 0, '2018-10-06'),
(59, 'iwyoHq8tqlrDlSkUvoZ4eRBd9CMtJ0QgfHZ75IahjT1qSRq4FEYGxzoRnrqJZbYcnHxfNODtueeBPrdw103EmOEosHLex1Gyet8j', 0, '2018-10-06'),
(60, 'unNz1WY43EeJyRhxmqgp2JuLeHjAhPXUUOXoWWAuaSUw8YxSQEjDtaq769ugPy7yp8WWnraLgev4SpbOSKTA5RcUJ2C4I6YyoTiY', 0, '2018-10-06'),
(61, 'acTrXmbyAgQKzw2gxcMFmbGahTioEZ31U7KsRvZRatRzbfM0JuZw242u5L9Cu9ez3dFZTCrh9epjAer3u7aXaRxaAmdQTCSfpY5p', 0, '2018-10-06'),
(62, 'eLahd5ajMCupAgxNKfzrP6LgOdGMZa33fEWwiolYa1OcDv43zC0vM2cbgCXpfd014TlvDhZF7Hut8Ap11H871ZCJUtJZN37wCF5Q', 0, '2018-10-06'),
(63, 'p9GdkNbssGyBPG8y5a9os3Mc8axo579HUlX5k8kcfi0kGmRnGQUhY2jUzmmdHX9zM1KoE6l7AQTRIrIq1KLXrwXOS1qqqkOgHwCg', 0, '2018-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `property_deposit`
--

CREATE TABLE `property_deposit` (
  `dip` int(11) NOT NULL,
  `amount` float NOT NULL,
  `pid` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `whores` int(1) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_deposit`
--

INSERT INTO `property_deposit` (`dip`, `amount`, `pid`, `tid`, `whores`, `date_added`) VALUES
(1, 0, 'UOt6oxrK', 'ki@gmail.com', 0, '2018-04-29'),
(2, 13333300000, 'dEl8c2df', 'k78@gmail.com', 0, '2018-04-29'),
(3, 0, 'WXmktwPG', 'mb@gmail.com', 0, '2018-04-29'),
(4, 0, 'DUUZB153', 'zanx@gmail.com', 0, '2018-04-29'),
(5, 0, 'X8Ethx3I', 'ajau@gmail.com', 0, '2018-04-29'),
(8, 340000, '17', 'miol@gmail.com', 0, '2018-04-29'),
(9, 120000, '40', 'lolo@gmail.com', 0, '2018-04-30'),
(10, 8500, 'SKuazjhP', 'jreadi@gmail.com', 0, '2018-05-02'),
(11, 13333300000, 'gg8xhUgU', 'genna@gmail.com', 0, '2018-05-03'),
(12, 13333300000, '8UURzYEw', 'sea@gmail.com', 1, '2018-05-03'),
(13, 456665, 'pde6FNMQ', 'java@gmail.com', 0, '2018-05-07'),
(14, 456665, 'm7zsw8p3', 'cool@gmail.com', 0, '2018-05-07'),
(15, 12990, 'xEjaWHJg', 'we@gmail.com', 1, '2018-05-07'),
(16, 13333300000, 'PoQqPg5X', 'oiiu@gmail.com', 0, '2018-05-07'),
(17, 9938, 'rbhknh21', 'df@gmail.com', 1, '2018-05-07'),
(18, 9938, 'D6biHwKF', 'tf@gmail.com', 1, '2018-05-07'),
(19, 9938, 'fX8Lt8lm', 'iiof@gmail.com', 1, '2018-05-07'),
(20, 9938, '35', 'iigj@gmail.com', 1, '2018-05-07'),
(21, 9938, '33', 'iisdfd@gmail.com', 1, '2018-05-07'),
(22, 9938, '32', 'idqdfd@gmail.com', 1, '2018-05-07'),
(23, 9938, '34', 'ifd@gmail.com', 0, '2018-05-07'),
(24, 9938, '26', 'irfed@gmail.com', 0, '2018-05-07'),
(25, 9938, '8', 'irgiiyfd@gmail.com', 0, '2018-05-07'),
(26, 232423, '25', 'sd@gmail.com', 0, '2018-05-07'),
(27, 232423, '10', 'sui@gmail.com', 0, '2018-05-07'),
(28, 232423, '6', 's23sd@gmail.com', 0, '2018-05-07'),
(29, 232423, '9', 's2asasd@gmail.com', 0, '2018-05-07'),
(30, 0, '7', 'ewoewi@gmail.com', 0, '2018-05-07'),
(31, 0, '27', 'oewi@gmail.com', 0, '2018-05-07'),
(32, 0, '29', 'oewei@gmail.com', 0, '2018-05-07'),
(33, 4546, '31', 'tyi@gmail.com', 0, '2018-05-08'),
(34, 4546, '30', 'ti@gmail.com', 0, '2018-05-08'),
(35, 4564560, 'G10zA6yC', 'sfdsdf@fgmail.com', 0, '2018-05-08'),
(36, 4564560, 'FqABGkyM', 'sfdf@fgmail.com', 0, '2018-05-08'),
(37, 34343, 'P0M3a3L3', 'oio@hu.com', 0, '2018-05-08'),
(38, 34343, 'izmckaWo', 'dtfvh@hu.com', 0, '2018-05-08'),
(39, 34343, 'C1eD7vWD', 'dtogih@hu.com', 0, '2018-05-08'),
(40, 34343, 'O4ytQ2o0', 'werwtogih@hu.com', 0, '2018-05-08'),
(41, 3453450, '42', 'df@ymail.com', 0, '2018-05-08'),
(42, 3453450, '43', 'w34f@ymail.com', 0, '2018-05-08'),
(43, 50000, '44', 'oli@gmail.com', 0, '2018-09-11'),
(44, 400000000000, '9hrNXkwC', '4dd34i@gmail.com', 0, '2018-09-11'),
(45, 400000000000000, 'eXC8IWZl', 'ere@rmail.com', 0, '2018-09-11'),
(46, 400000000000000, 'ZyAFsyLu', 'erwdw@rmail.com', 0, '2018-09-11'),
(47, 3.33333e19, 'kQ7pJCTc', 'dsdcs@fgmail.com', 0, '2018-09-11'),
(48, 22222200000000, 'A1weH57S', 'ads@gmail.com', 0, '2018-09-11'),
(49, 34222200000000, '620CGZ3n', 'asdad@f.com', 0, '2018-09-11'),
(50, 34222200000000, 'A4CkLXNy', 'asdad@q.com', 0, '2018-09-11'),
(51, 3424320, '45', 'ds@eew.com', 0, '2018-09-11'),
(52, 1, 'ZZvd1eLu', 'fsc@hmail.com', 0, '2018-09-11'),
(53, 4000000000000, 'o4ektQcD', 'fsc@qemail.com', 0, '2018-09-11'),
(54, 2342310000000, '9kDaNl5A', 'sdsf@re.com', 1, '2018-09-11'),
(55, 23442100000000, 'ytJbULFp', 'wd@edfs.com', 1, '2018-09-11'),
(56, 0, 'gqUPWL6c', 'wd@easdfs.com', 0, '2018-09-11'),
(57, 0, 'TLgromCf', 'bullybeef@gmail.com', 0, '2018-09-11'),
(58, 200000000, 'Xi21KrY4', 'Jordainegayle444@gmail.com', 1, '2018-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `property_lanlord`
--

CREATE TABLE `property_lanlord` (
  `landlordID` int(11) NOT NULL,
  `landlord_fname` varchar(255) NOT NULL,
  `landlord_lname` varchar(255) NOT NULL,
  `landlord_email` varchar(255) NOT NULL,
  `landlord_password` varchar(255) NOT NULL,
  `system_user` varchar(255) NOT NULL,
  `landlord_session_id` varchar(255) NOT NULL,
  `gct` float NOT NULL,
  `landlord_mobile` varchar(255) NOT NULL,
  `lanlord_street_address` varchar(255) NOT NULL,
  `landlord_city` varchar(255) NOT NULL,
  `landlord_state` varchar(255) NOT NULL,
  `landloard_zip` varchar(20) NOT NULL,
  `landlord_country` varchar(255) NOT NULL,
  `secret_hash` varchar(255) NOT NULL,
  `landlord_account_status` int(1) NOT NULL,
  `date_joined` date NOT NULL,
  `online` int(1) NOT NULL,
  `managerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_lanlord`
--

INSERT INTO `property_lanlord` (`landlordID`, `landlord_fname`, `landlord_lname`, `landlord_email`, `landlord_password`, `system_user`, `landlord_session_id`, `gct`, `landlord_mobile`, `lanlord_street_address`, `landlord_city`, `landlord_state`, `landloard_zip`, `landlord_country`, `secret_hash`, `landlord_account_status`, `date_joined`, `online`, `managerID`) VALUES
(1, 'Jordaine', 'Gayle', 'freshcode9@gmail.com', '$2y$10$NwAop.QNn7ecnb6xgR5c8uheQ2nMPJIHWSDcT053a1oQo6k/fjCy.', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'AazXwqQBB44QyXDMcSikaVV5reJw17wvKxMnnpvzC1695iGih5J5yXSyjl5yor3hUVihOv', 16.5, '8765578447', '11 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(2, 'John', 'Brown', 'mazerinegayle@gmail.com', '$2y$10$AwXtooaFIHh2QQX35gNNnOXgIo6taTtVhBvzsN6JipOMA/gtLuV8m', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'hAMw3UrHgJTVThu5QHnWYa1U5PKFIve1jiO3Hmsg0zIuNbpHHINgSL1Y0YrFbZ0SvYRRIj', 16.5, '8764644567', '116 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(3, 'Knight', 'Black', 'rowemichael2000@gmail.com', '$2y$10$J36Tq.MSkTd6eNKOfBQZOeS12bYUJQFcSQaItuMIrYB/SExkTVkzS', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'cxia0MrfOc0LRDWDp8oYeO2VN2ZTThej9JTh1tQf3H15FRL4bW3sgFjZELTXVTS8SOr5ZV', 16.5, '8764472310', '116 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(4, 'Bob', 'Green', 'empirekid1@hotmail.com', '$2y$10$yGHj.unulFcREJrVKzxjR.6EITqKW/Y4Sbn4HI9hb7l8bFkSjkV76', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', '7ccnJj50YZ4DBPmQ6yThy0PMNCYelycZLhGnWI6K8d2d7qNHGEEd7I6qcLz8hfFULbU6fK', 16.5, '8763341290', '116 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(5, 'Bob', 'Green', 'emirekid1@hotmail.com', '$2y$10$iaNbdEIOHm5rpjq.nLS3TuS7P8igUcNpgEy6mAfhFB3pqNXV9sjHS', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'XH1nakmyRMeTn6krL3UOW0ehSwGwdff75MRO7eVHorrP8ilTw6wJzbZMwTzvR6lJ5rTJ7j', 16.5, '8763341290', '116 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(6, 'Bob', 'Green', 'emirekd1@hotmail.com', '$2y$10$5GDnPqCy4J6fzk2AeqOj1Ovc2msoAHBgySJRu2XvPsT9pHBKO1UOW', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'xDl7ehxRHcnUTZgOUGaEHX0HMQAM5SV7BzN0mkVMwWSiwIxHZnbzXbpoQ1e7YJzjmyPyPh', 0, '8763341290', '116 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(7, 'Bob', 'Green', 'emiekd1@hotmail.com', '$2y$10$oL9xPg8htc3iEwuKiqown.tvNvQq23/QP/DYgX9RIwrT9ffIFCZQm', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'l0oJnUGDMkXhtV5vXor5FVhaMoTPyfgOnvN8m3VKaOP0hSIuxTYjF6urjLGQPcohCoQw6O', 0, '8763341290', '116 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(8, 'Bob', 'Green', 'eiekd1@hotmail.com', '$2y$10$407d1b5GO/M21oEXbulFqeMC.hfoXXO9E/O5/P1hNZ8x7FJXA5vyu', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'zz39gL6DoGLx835MwUiu8iAWK63rzgbPtlkONF6Q6QBZ3wYOxaRJxbfRZpyv03o3fUe3Sn', 0, '8763341290', '116 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(9, 'Bob', 'Green', 'eied1@hotmail.com', '$2y$10$DwvbFdQrJR/xKBoM2ps2eOV0UsYUAghOLSESe3814D.Ki7yo63scm', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'YmY1p1snrDcs551a5a2fs1pUuRnTRJOvaFVRdlRWRJ1hPFpdIpqJB25RJRq1YSQSQ1GWh8', 0, '8763341290', '116 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(10, 'Bob', 'Green', 'ed1@hotmail.com', '$2y$10$7pYyuhhbiDwdiNTo/RPUZuyPIkELR3tLy6lluT.1DRTaC42khFaF2', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'fFN088WndMVsECEmKVjWm8rwh4rOO5TtbnI5NAnrm8HGhy2bbCQxZHghgjBAAIEPkx0lj7', 0, '8763341290', '116 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(11, 'Bob', 'Green', 'ed@hotmail.com', '$2y$10$7KU5aGDyN6u6cEej8A4GMOtwgYTtQTWv.NYw5PoYVEwuuuoHqLLeW', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'JdworuUA7ZsHnh7wm6MOFQqGq6zg3Aq5TKJqx8sr022bRi0TNxMu4gaj95lCbjGaX7a1hB', 16.5, '8763341290', '116 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(12, 'Bob', 'Green', 'e@hotmail.com', '$2y$10$.PIE/yBlIdb/Gec5tcQuQO/khYUwkUXRu1jNDbC.qiYkO2rmIxdMG', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'eYQvkKgBj2nP1uE9Ce3pMzoUkETPy4stJWypVLtdFBJZTUg5BUbG49fljHIAnu3gyWesx7', 16.5, '8763341290', '116 Riverside Drive', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(13, 'Jonk', 'Willy', 're@gmail.com', '$2y$10$8nKR98GYYD.ANPel8VWrieHhSg6F2FMlIxr8s74NDSVmDd2as5/a2', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'vEtZTRZNCwmCeA1x45A37aJZ0pd4yHApcQssVWxYOnS3rViIyXoCaoLbxVGjTFV1GboVmb', 16.5, '8765578447', '116 Riverside Drive', 'Montego BAy', 'St.Jmes', '00000', 'Jamaica', '', 1, '2018-04-14', 0, 0),
(14, 'Bill', 'Black', 'michealmiller@gmail.com', '', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 'kGZnQKXydaOzY9QGmC7viXky7pyccZ1yroOYYDac44CKBX8iFfRPCrsKUNQFiqBwkRXViV', 16.5, '8765578447', '12 Chruhlane', 'montego bay', 'st.james', '00000', 'Jamaica', 'nlDS1mLoCZpjItlu5b4zuv2N3ZSmScHCMNdaLtmKU9D6YVOHw44cmjtLV3kZOjuRhLGyOtf8DgsKSZMMGOmCzyBhyIlaZuv93CUx', 0, '2018-04-21', 0, 0),
(15, 'Bill', 'Black', 'michalmiller@gmail.com', '', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 'tLznnLpKQGSDqo9HKMUjEaHcLumBwTSQacKQTqmEzWEvzjt7vamwJmldT3TJuOU9qeot0s', 0, '8765578447', '12 Chruhlane', 'montego bay', 'st.james', '00000', 'Jamaica', 'nE7eucEG30kMJiZYjju10kd0cxZMPLQ4nmd5sUNILBFTB7f9Ww1xA9NJtZu2vfb1267191YafkRo8SEcAW6eITS11Y9XzeQeyehp', 0, '2018-04-21', 0, 0),
(16, 'rovel', 'chambers', 'rovelchambers@gmail.com', '$2y$10$nN4nMWxSrl1h5vg8yKlY3.BSRjNHF7d9Knh8DWZ7BIoAr1MeyifmS', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 'yZIR7WujR59zHeP6K5lSVMXpPWbNtjCXGRhTAWHQswbcjyPhkUUignyYCb4FOZ9aW828fN', 16.5, '8763390490', '12 Fairiew', 'Montego Bay', 'St.James', '00000', 'Jamaica', '', 1, '2018-04-24', 0, 0),
(17, 'Amanda', 'Mitchell', 'amitch@gmail.com', '', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 'EDP0docIRrVAT3tbu5VW1n3RhWd5oGQBjB0S1Ze9YwVp3jY6LZXXrNX1BogjTkVbjOh1nK', 16.5, '8762234456', '12 Canturburry dr', 'Montego Bay', 'St.James', '', 'Jamaica', 'ryZUcz7pQQIm23HnmMx3n8KH8rG9uiOVfNuJt9qwA1ULOfDWsS2DVY57GwmTUlvZqvkMIsQZzN1mjCcAn3d5RJJS3BlSInewuZpe', 0, '2018-04-24', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_lease_info`
--

CREATE TABLE `property_lease_info` (
  `lease_id` int(11) NOT NULL,
  `lease_secret_key` varchar(255) NOT NULL,
  `lease_start_date` date NOT NULL,
  `lease_end_date` date NOT NULL,
  `lease_payment_agreement` float NOT NULL,
  `tenantID` varchar(100) NOT NULL,
  `days_left_on_lease` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_lease_info`
--

INSERT INTO `property_lease_info` (`lease_id`, `lease_secret_key`, `lease_start_date`, `lease_end_date`, `lease_payment_agreement`, `tenantID`, `days_left_on_lease`) VALUES
(1, 'NBRrK', '2018-10-17', '2018-11-24', 400000, '2', 0),
(2, 'bJdG7', '2018-10-25', '2019-02-22', 2800000, '70', 0),
(3, 'T6LbW', '2019-01-04', '2020-01-04', 34000, '9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_management_general_fees`
--

CREATE TABLE `property_management_general_fees` (
  `feeID` int(11) NOT NULL,
  `management_percent` float NOT NULL,
  `management_fee_tax_percent` float NOT NULL,
  `late_payment_percent` float NOT NULL,
  `managerID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `property_manager`
--

CREATE TABLE `property_manager` (
  `property_manager_id` int(11) NOT NULL,
  `property_manager_name` varchar(255) NOT NULL,
  `management_start_fee` float NOT NULL,
  `management_end_fee` float NOT NULL,
  `management_late_fee` float NOT NULL,
  `management_gct` float NOT NULL,
  `manager_street_address` varchar(255) NOT NULL,
  `manager_city` varchar(255) NOT NULL,
  `manager_state` varchar(255) NOT NULL,
  `manager_country` varchar(255) NOT NULL,
  `manager_zip` varchar(15) NOT NULL,
  `date_added` date NOT NULL,
  `system_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_manager`
--

INSERT INTO `property_manager` (`property_manager_id`, `property_manager_name`, `management_start_fee`, `management_end_fee`, `management_late_fee`, `management_gct`, `manager_street_address`, `manager_city`, `manager_state`, `manager_country`, `manager_zip`, `date_added`, `system_user`) VALUES
(1, '', 10, 15, 10, 16.5, '', '', '', '', '', '2018-04-13', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(2, '', 10, 15, 10, 16.5, '', '', '', '', '', '2018-04-13', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(3, '', 10, 15, 10, 16.5, '', '', '', '', '', '2018-04-13', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(4, '', 23, 50, 30, 20, '', '', '', '', '', '2018-04-13', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7'),
(5, '', 30, 44, 45, 23, '', '', '', '', '', '2018-04-13', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7');

-- --------------------------------------------------------

--
-- Table structure for table `property_pending_request`
--

CREATE TABLE `property_pending_request` (
  `rid` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_pending_request`
--

INSERT INTO `property_pending_request` (`rid`, `Name`, `Title`, `email`, `status`) VALUES
(43, 'Jay Foster', 'Tenant', 't@gmail.com', 0),
(44, 'Manley Brown', 'Tenant', 'er@gmail.com', 0),
(45, 'Michael Rowe', 'Tenant', 'ser@gmail.com', 0),
(46, 'Cool Tool', 'Tenant', 'ric@gmail.com', 0),
(47, 'Bill Black', 'Landlord', 'michealmiller@gmail.com', 0),
(48, 'Bill Black', 'Landlord', 'michalmiller@gmail.com', 0),
(49, 'Micheal Bondley', 'Tenant', 'knight@gmail.com', 0),
(51, 'Johnathon Brown', 'Tenant', 'op@gmail.com', 0),
(52, 'Gaahye Brown', 'Tenant', 'uui@gmail.com', 0),
(54, 'Amanda Mitchell', 'Landlord', 'amitch@gmail.com', 0),
(55, 'Knight Line', 'Tenant', 'bo@gmail.com', 0),
(56, 'Jay Bolton', 'Tenant', 'ki@gmail.com', 0),
(57, 'Jay Bolton', 'Tenant', 'k78@gmail.com', 0),
(58, 'Montery Black', 'Tenant', 'mb@gmail.com', 0),
(59, 'Zanny Blast', 'Tenant', 'zanx@gmail.com', 0),
(60, 'Kimmy Bubba', 'Tenant', 'ajau@gmail.com', 0),
(63, 'Molly Skunk', 'Tenant', 'miol@gmail.com', 0),
(64, 'Jok Nlo', 'Tenant', 'lolo@gmail.com', 0),
(65, 'Johnathon Reid', 'Tenant', 'jreadi@gmail.com', 0),
(67, 'Genna Brown', 'Tenant', 'genna@gmail.com', 0),
(68, 'Keller Williams', 'Tenant', 'sea@gmail.com', 0),
(69, 'Ricky Tee', 'Tenant', 'java@gmail.com', 0),
(70, 'Ricky Tee', 'Tenant', 'cool@gmail.com', 0),
(71, 'Wenna Genna', 'Tenant', 'we@gmail.com', 0),
(72, 'Wenna Genna', 'Tenant', 'oiiu@gmail.com', 0),
(73, 'Knight William', 'Tenant', 'df@gmail.com', 0),
(74, 'Knight William', 'Tenant', 'tf@gmail.com', 0),
(75, 'Knight William', 'Tenant', 'iiof@gmail.com', 0),
(76, 'Knight William', 'Tenant', 'iigj@gmail.com', 0),
(77, 'Knight William', 'Tenant', 'iisdfd@gmail.com', 0),
(78, 'Knight William', 'Tenant', 'idqdfd@gmail.com', 0),
(79, 'Knight William', 'Tenant', 'ifd@gmail.com', 0),
(80, 'Knight William', 'Tenant', 'irfed@gmail.com', 0),
(81, 'Knight William', 'Tenant', 'irgiiyfd@gmail.com', 0),
(82, 'eqq scwd', 'Tenant', 'sd@gmail.com', 0),
(83, 'eqq scwd', 'Tenant', 'sui@gmail.com', 0),
(84, 'eqq scwd', 'Tenant', 's23sd@gmail.com', 0),
(85, 'eqq scwd', 'Tenant', 's2asasd@gmail.com', 0),
(86, 'Knight Lool', 'Tenant', 'ewoewi@gmail.com', 0),
(87, 'Knight Lool', 'Tenant', 'oewi@gmail.com', 0),
(88, 'Knight Lool', 'Tenant', 'oewei@gmail.com', 0),
(89, 'Knight Wonderq', 'Tenant', 'tyi@gmail.com', 0),
(90, 'Knight Wonderq', 'Tenant', 'ti@gmail.com', 0),
(91, 'Cool Bool', 'Tenant', 'sfdsdf@fgmail.com', 0),
(92, 'Cool Bool', 'Tenant', 'sfdf@fgmail.com', 0),
(93, 'Cool Bunny', 'Tenant', 'oio@hu.com', 0),
(94, 'Cool Bunny', 'Tenant', 'dtfvh@hu.com', 0),
(95, 'Cool Bunny', 'Tenant', 'dtogih@hu.com', 0),
(96, 'Cool Bunny', 'Tenant', 'werwtogih@hu.com', 0),
(97, 'Kelly Bernard', 'Tenant', 'df@ymail.com', 0),
(98, 'Kelly Bernard', 'Tenant', 'w34f@ymail.com', 0),
(99, 'Johnny Test', 'System User', 'n.w.23.aa@gmail.com', 0),
(100, 'My Genna', 'Tenant', 'oli@gmail.com', 0),
(101, 'My Genna', 'Tenant', '4dd34i@gmail.com', 0),
(102, 'knigh sds', 'Tenant', 'ere@rmail.com', 0),
(103, 'knigh sds', 'Tenant', 'erwdw@rmail.com', 0),
(104, 'scdsdca sdsds', 'Tenant', 'dsdcs@fgmail.com', 0),
(105, 'wdqwd asdasa', 'Tenant', 'ads@gmail.com', 0),
(106, 'sesdc adw', 'Tenant', 'asdad@f.com', 0),
(107, 'sesdc adw', 'Tenant', 'asdad@q.com', 0),
(108, 'sdsfw sdcss', 'Tenant', 'ds@eew.com', 0),
(110, 'wewece edfscd', 'Tenant', 'fsc@qemail.com', 0),
(111, 'fwwefwe wwrw', 'Tenant', 'sdsf@re.com', 0),
(112, 'cwcwew dwcw', 'Tenant', 'wd@edfs.com', 0),
(113, 'cwcwew dwcw', 'Tenant', 'wd@easdfs.com', 0),
(114, 'Max LordEvil', 'Tenant', 'bullybeef@gmail.com', 0),
(115, 'Love Women', 'Tenant', 'Jordainegayle444@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_tenant`
--

CREATE TABLE `property_tenant` (
  `property_tenantID` int(11) NOT NULL,
  `tenant_fname` varchar(255) NOT NULL,
  `tenent_lname` varchar(255) NOT NULL,
  `tenant_email` varchar(255) NOT NULL,
  `tenant_password` varchar(255) NOT NULL,
  `tenant_street_address` varchar(255) NOT NULL,
  `tenant_city` varchar(100) NOT NULL,
  `tenant_state` varchar(100) NOT NULL,
  `tenant_country` varchar(100) NOT NULL,
  `tenant_zip` varchar(15) NOT NULL,
  `tenant_mobile` varchar(20) NOT NULL,
  `tenant_session_id` varchar(255) NOT NULL,
  `lease_id` varchar(255) NOT NULL,
  `monthly_fee` float NOT NULL,
  `tenant_secret_hash` varchar(255) NOT NULL,
  `tenant_status` int(1) NOT NULL,
  `date_joined` date NOT NULL,
  `system_user` varchar(255) NOT NULL,
  `online` int(1) NOT NULL,
  `propertyID` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `landlordID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_tenant`
--

INSERT INTO `property_tenant` (`property_tenantID`, `tenant_fname`, `tenent_lname`, `tenant_email`, `tenant_password`, `tenant_street_address`, `tenant_city`, `tenant_state`, `tenant_country`, `tenant_zip`, `tenant_mobile`, `tenant_session_id`, `lease_id`, `monthly_fee`, `tenant_secret_hash`, `tenant_status`, `date_joined`, `system_user`, `online`, `propertyID`, `unit`, `landlordID`) VALUES
(2, 'Danny', 'Roster', 'o@gmail.com', '$2y$10$wu13JxR0YI2PjeMRxBzpLehycNrDsNSyFOeIgIAhW51Mo1aPKfHfq', '11 Riverside Drive', 'Montego Bay', 'StJames', 'Jamaica', '00000ll', '8765578447', 'G4Zott7qsqoErs10qcghUQ27XAj9PMoYhAGgxglYnDUZbuLrjDVlfE0qNZ89FkgOML3IX2nwXXCMwfP8q5kaN3FrwvzEht6jkDwn', '1', 400000, '', 1, '2018-04-15', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '1', '', 1),
(3, 'Jay', 'Foster', 't@gmail.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8764463040', '53GMyZ0BH4ZtyNFOS3CJcpKyeB4A8upTFUsKG3kJEfN2LYgmBJOqidAKQVD0jhP9vxspmGAPvgwPLMv0gI4qCk71GPv2iuIQ5Yxc', '', 30000, 'slsz4yhQsgFkxt45CW93R2cbDOUOxhMQfmeLUXdkhqGkuif882HsJRhMsB2TjeRVaKPNB9iNTJgWFQL23aNnVxjqTSDxYpMaygm7q8CFaf2H6gizmohh4tQk', 0, '2018-04-15', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '2', '', 2),
(4, 'Manley', 'Brown', 'er@gmail.com', '', '11 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8764463040', 'QmnubE2BWEMOQvGhxfhWR6PY9ch1FGXprexq3f1wrwl0vW1TfZGZOrXUJ60y5yMPAtCPeQDcq6J8JwXBmh3Qo7p5FPA7Uih0irGN', '', 100000, 'wdlgmCpZKniEf5lQMX2fxYwvfguOw69m0WzZ59X2irXqIfnmCv94xg6hZeFRU02qls4g4oTG7MgzHa7tF3z9qzHOtG7a4kmTJqbzBhssYkmBpF0ECPJQ4uuT', 0, '2018-04-15', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '3', '', 3),
(5, 'Michael', 'Rowe', 'ser@gmail.com', '', '116 Riverside Drive', 'Montego BAy', 'St.Jmes', 'Jamaica', '00000', '8764463040', 'DeAkahX0OF2QKLp4l0Uurndjw4H7pOZUrmfPD42CHDdSNVS1IAiFm2lIXpoHs6YqP22A6pUhkpjDEj5NcvIsuEII2tQmJyrD7K5s', '', 100000000, 'nBYFo26wSalNw1lrdfDGwGnhK4wm0z934V6tvUvdDGSzLifikRf0p0VnyBAOEr5lZuR459tZCiBsj07ZQWzT36sXnmnT4bZZILvlC9i9iYnFGx3dtYrikj6n', 0, '2018-04-15', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '4', '', 4),
(6, 'Cool', 'Tool', 'ric@gmail.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8764457867', 'j274RLHLlXAnfcplPWkFqWkbZ5GogA52I3fxFWavpQXlbVLeyBvShuioYXlIsG8cH1W5oNjAk0MKUMaWsVxuJ8CjqdDp7doiz54e', '', 100000000, 'GtdKejUZ0SQq7ZPtVIe9r6jWO2tLn6ZhHHubOSv52KDW82SknOsuAYpLVJjD0YFZTDQF4KC8YssaasAGsx9w2qyoVg5ZLyAf79DqtOzz3sE3iipR59bxS5Uq', 0, '2018-04-16', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '5', '', 5),
(9, 'Johnathon', 'Brown', 'op@gmail.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '3349098867', 'hgpYd7SOsN6qgIcjfQwEnP1MTGlj0EeA7IlS2iut23CamsfTiMogpxnnGELPPRCXAjrCBJ9uKIWAX041U9d7kQVCh2AKXlw8eOHi', '3', 34000, 'Y2cnMiL8EDxdhGihBoGmQ9muPZbxvuw3Qp118cHNKlQaNIriqUFfPfg3CQvLILZyBvhsjnieB7EKX7Gm3lHAFTtTfEC7M6pu6pIsk0B8V20n7vjd23nFnFOr', 0, '2018-04-23', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, '4oziRyLq', 'uni002', 12),
(11, 'Knight', 'Line', 'bo@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '', '8765578447', 'n3qvz2ANIINA2su9wYPFGUi8FBKDzysrP9aVey2LXfBCFLiP9WY7MWW1bxFDthBHrbRwxbefds5ZlAinxSh03DLL1AB5OSis7pU0', '', 89000, '8PyeW74n6pzuuWS46DOQNz5b3rP9Moe9T0sjhXJGeZC2vBPold81NxtXuH3djVqFWwKvfwE2H1ZpTXjEnicjJiCooodYXZSz5y8rprNomWb4zfpot72k4uas', 0, '2018-04-27', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, '28', '', 17),
(13, 'Jay', 'Bolton', 'ki@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '9894456783', '6qqZ91aT8flCJmgMpkSJeGDncuCsNEh2Qm8XEsUA2xeg2DQb71VBAlXP9MHAx43iB3Vd42J0KbmC7S7UeGyisbGQJ1nzy96ydnR8', '', 13333300000, '5ZabxjxTqw5t1i3g42wuT7G3MnfMsefRLNArUKksIBaWTJBps7uibOlVAcVPoZkGgDeATMVoPsIAJHVYKGXGRrDnaBFpy4AenYSkJIVJfJYQiTwrMPKaqlpc', 0, '2018-04-29', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, 'UOt6oxrK', 'unit01', 17),
(14, 'Jay', 'Bolton', 'k78@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '9894456783', 'S8FmMo5PxbTj8lDkMzPH8KgkCFMCkglyLdeXhQPq3Y0knVsZQVk6OT1sScYGToxn70cF3r6tYFfI6G1SYVftaVBTIyxxKHk6wHwZ', '', 13333300000, 'Ej62oOyNVBAg1FfIDFdT1Xs1KMR9cH0g6Z25SpndD6o5C9mbK0XAGyuQwWgIMxneaWss1yHbeVpDkEunabAnTxdzXq1aW2jS6zFivMScnQCn7p031oEcksfW', 0, '2018-04-29', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, 'dEl8c2df', 'unit02', 17),
(15, 'Montery', 'Black', 'mb@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '9895578447', 'YGTg10egv1s5S9HMc3qHliyBLuVF1HB8QzIpGmVSb86jSfmM6jgJRrdIhiUeVYIIGaEs52hZWbhvUbtNmKqzKaki1DcqCsnuTcVf', '', 13333300000, '1DGDRaXT1TYxxrY7jcBs4QfJoNF4FodRxGLDsNCmivVTcfoHMHTDynwE9zb7MFf9rqIJsN7KzehCAGPqkZCOOCvSFgCPso3f0FFUUvbCzxYnyciZ2qhV52bs', 0, '2018-04-29', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, 'WXmktwPG', 'unit03', 17),
(16, 'Zanny', 'Blast', 'zanx@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '9895578447', '9TpFQCOIDLhLfAZyEQxWi24hdTuAMwRIIxFdandKbGbhzhQN2B0Y9I7svIP60Q3yEeln3rXxfcHEnTxheuEBmW5ssZFK276nokGr', '', 13333300000, 'a4Gyq4a7JI45rUGqg2JNrITROMWMEvXl9kATDVVQ6aLXwkXIHLcCCrNfmUkhu15W1Jjd9RGLmYU6s8xlXvJ9GAvcPENEdSdYL2fSQNA6RqdcGsZDMYmHYFKz', 0, '2018-04-29', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, 'DUUZB153', 'unit04', 17),
(17, 'Kimmy', 'Bubba', 'ajau@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '9895578447', 'TZhkwb6xd51VXJaPgleIHA4OiJVQFJuiU65eRoOhpMCQK1qsd59Rt2n4JPC4ph79dbzFSKK7u2xJqeRS6xixzYuU5xrbZ35H5oA4', '', 13333300000, 'aHNEhRRTeWvek3YKsshVXjPjGFNAmukNB6YofItuJdS62roFpprwW5AhxHVv8tbckfGaPD5czGXDzqIp6zPOmQYSmUOcvvOH5cSAvSduATz69HTSKbuitbsh', 0, '2018-04-29', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, 'X8Ethx3I', 'unit05', 17),
(20, 'Molly', 'Skunk', 'miol@gmail.com', '', '123 Stonebook Vista', 'Falmouth', 'Trelawny', 'Jamaica', '00000', '9895578447', 'RtXmaDNCEhlESM1u4YVDaBkZmzCQgg8GzgpW4U6bO9pzjzQEjfTEaaihyOhrvgGbktOpT71Q145ZHxRZym04yNCd3Svj5CasWUwH', '', 340000, 'kXka342RdwdlwUiQOaxfjrwDhB7ALZCwaMxdFZaXbQCvucw2lyzFdPWV1uXhdUlOSyWXDqvBH70rUnNQ1yLCo073ABK2QPaoqLDB31d5mzDLEyVGQr8bTAe4', 0, '2018-04-29', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, '17', '', 12),
(21, 'Jok', 'Nlo', 'lolo@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '', '8765578447', 'fEPXN6jVk2KiznKC0u5DBoJurzNzdxmoAbsJffmUtrLV2WKDI7uWJgi5nOxky0dYXQVfNSsHuIdO1a1vanW8BWrVkvleE2ZIQN4H', '', 120000, 'E4XlodPXFLeLAPtRnvdJQoraqrwgpIE4sYyWwNBvxgigEMaRY4Aj53k7kPXI2axsu0p7lC6wjqJJl68pd0hZDWeE6sYbPm2M0sa14kpPRAKrrekZ7eHEDZmV', 0, '2018-04-30', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, '40', '', 17),
(22, 'Johnathon', 'Reid', 'jreadi@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'HxGuF0JuVCUPUsF1ActnKoGrCQsSHOetnPmNnokjVxVtA7nOs3E39sLu2P43kIoAjAChh7TKP01BN7oa4lmnZUE2RGkyo4EyFFyD', '', 13333300000, '4jn3skVBZFyvraashbUDP1rlkxK2AwHG2EX4mqJicnJeR29hUHWkItdF4upwl7amKVppMUqpPY2zmNoVJOBCCcMOnPtPcIoGPgCl0qGzVwJFcrVE2N4tOzWu', 0, '2018-05-02', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, 'SKuazjhP', 'unit06', 17),
(23, 'Genna', 'Brown', 'genna@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'Rm16zFYEYNjBSIUuQsJUmeMlczUbfLxLI5eTggLWv0yQhmhSf7xJUzQBvPpf4ylvMWStH8SwsbYhA0kRrmTsYmR8p8NdoCj85brk', '', 13333300000, 'Kt2Ud2pSTYBYR4PkDyBD2S2rOR2kjtmkGekmva7W2yiVEQvR6FeVr1rHrLagIJTbwF1vOROcjK90jzuEi2Z3HWyd0MtFXGN9jntoxQYKPnCcgmOtw5vUULwO', 0, '2018-05-03', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, 'gg8xhUgU', 'unit07', 17),
(24, 'Keller', 'Williams', 'sea@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'TUYcl206PDqiCRp3mot9TNT1Va85jDiVDyC17yWtjMPGkSKyquwESqsIze3vcp07qTEWKZa5HNw2xmkHL0XpwmwkItaTBtzMSqyS', '', 13333300000, '5sqpmFqClOoR1Dbza8Gs5o6eGlOaO9HLybVRCIVr3dQSDM2EnTuhauGMIJuKN6AmufoMS0V1Aglyn3ufzyfMyZWICK9V7Mx7uDwApQM8CrG5OgbknSXbFCYX', 0, '2018-05-03', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, '8UURzYEw', 'unit08', 17),
(25, 'Ricky', 'Tee', 'java@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'CDi0PvOFG2oyQpis8uPf4Hn16QMnmg32a2CYSu7KjWfWbvxeCAi3JBMreY1KSuwJTVlEW9riUnqWOI9UBndXnjtmJesBQ7ibFxik', '', 13333300000, 'p9rZ1n6SfJN1lnhj7Bj6GbhqB98cbN4FJR1RT4288Uy2sIjNphuo5AXFabifGba1zhHWhANZrfZoGqKbMMX7MF0LOzRTCYM8oCOSgmtvSEuR6EeqCwpC9ewS', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'pde6FNMQ', 'unit09', 17),
(26, 'Ricky', 'Tee', 'cool@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', '9rhdJdkEkNtsjvy8xGTkThlUvfPHpsQ2Mfvd1fCtuJE0SWKf5nchH5Bryi787OuSjLeciAjXguxUPTO5DQbfi1xoB6CYMRl8dPzx', '', 13333300000, '8a8qkKdN0uc2ePNYUIVRR7shpLDM6TOavceMmGDbmpzhQTm7zsFjBlwbW9Oz1rtB2wPgjSLq0FFsFiCuaKtBQwwopqKL4yLb0dbc6ksyephFLvKNfKYK36Eo', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'm7zsw8p3', 'unit10', 17),
(27, 'Wenna', 'Genna', 'we@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'ZHf8seLsGlI2cg4FqTzdavmd9chobjwRKsJrkuWmqLGnUr4NdwmR2gxgcMG0Mc7NLe6q59yGxNAKuIon8h5ZIaTK86bxNdztVH8w', '', 13333300000, 'bYGKTq254GxEA5eX7H6IDaJ4frHRWNkvw6EJ2RE9ZJ5ZG8XEpldvcD1xpIYKQVwU3SXnVu4WXi6rLX5kfn4IL5dnXKjzCXlasYyGESEEtMViq4gSIYxmilY2', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'xEjaWHJg', 'unit11', 17),
(28, 'Wenna', 'Genna', 'oiiu@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'AOBOFuYwvj1oxVLEiKvcXQfJIKmwHPZ7XnP8vMG0JXoFYNkRywVMTjimiXcA13X0XHpfzgyIJ7VnAB70dtHyoDSlhy6Db45MnOVi', '', 13333300000, '7hzjUFcOrovEf63Mf81F2EPCyOouKBEkL4mLmJuhIOcbDXiyScSiAv6jKZYqXFHepneEFBeg5ML1tZbu3cgVrNeEzLLY3BIZu8E4Z8tQmcOem6WAFij2hgqN', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'PoQqPg5X', 'unit12', 17),
(29, 'Knight', 'William', 'df@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'A6ssL7ASVZdHoBHMed6R9UhhMgSryCy2l2Z0SUfh61IhKKMHYpOgwh94Nx1QGxMiGVqMRKiXV1JOD2ourQaQhDswHCbgh6r7SsEL', '', 13333300000, '9zrrF3S3A1LMA0e27Adu1fyE68IoZbb1EVEfWJdFHamrBGyOLomQvDQZlubx9ET4JtQ54efuLn3AtaRBvJ6pz2QeVdHyhTTcMMDzx7Kh224cKpkMVgMpQEpF', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'rbhknh21', 'unit13', 17),
(30, 'Knight', 'William', 'tf@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'tZXvijvjNc7YN0w8xO9V2M9BDP3rZzTRiwzoOSmi6UcJDp1GIsGwSDLR0HVI4C3x1BC3fsXExBiRIMHaZNvTSvK1k6WnwaGldIui', '', 13333300000, 'IHNeo9xs7SEtp6Xk5IaRibVEzEJX0CsInvIPvayOwoNCkISWtTqiMe7V0iheyWFnOfKIDNpjlep4si1noJrH9n5K11r45ZhmVBQagdYiF0X86GkWKscVkSNn', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'D6biHwKF', 'unit14', 17),
(31, 'Knight', 'William', 'iiof@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'rJwKapcv2167TjmHXbsvorh3rEERpqZYk9V4h2JX7tNmC65mLipeAnln5tgOufSCvtBXMNQQI1bRD4QEeH7rY1vBwab46yIKDdDN', '', 13333300000, 'Q2DzYEzHi4itclaWqax20xn7ekRfUz0wlQNebYM7dN0mK3HWFnAfwqByCJJfzMzF8DHwQJwxzEfGhubmjK0ysDgHVHGbP0RRzfT4lLnyz0uuvV57mpqJADiz', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'fX8Lt8lm', 'unit15', 17),
(32, 'Knight', 'William', 'iigj@gmail.com', '', '116 Riverside Drive', 'Montego BAy', 'St.Jmes', 'Jamaica', '00000', '8765578447', 'OPP6QKedQTNhzmX4vz2wHe5kg75DZeO9QIzpGo5nlAsxi87prkeH1GYkpxiOHd9dIV05KdNbuUar9PAWr55HVVWNcVUsnOgWdoWa', '', 9000000, 'ILeaW3DwgJMew8lxC6nsEWX3oKYmtFzDiMkPh4hO1WlZdvbX6xKiLBnBKb0COVhmu7j8h62wFH2ybzBSqLmS9VPF5g3y0eBwldIOXhzJHun98kyG5MXCm5vT', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '35', '', 13),
(33, 'Knight', 'William', 'iisdfd@gmail.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'CXoW7xeX4SVbnqoo7yDwsPzFpSEWMe8M6XsfB7tav7aoOZ7LevMrMHbT7oo3K05RoyjWvG9QbQ8HvnZZGa7BaOzltdyXuYb1iFUT', '', 900000, 'AKbdzsl0LZPwZzzaosZnqfZ2RvWqYngLZf9xkIHuQOizQuLOPejU6mTebXYkw5GeS57TPRo4VEc2VDYZWMqbkRYOXXSuId6I1fXtuiAwd9xx0ArsoX8LYClj', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '33', '', 5),
(34, 'Knight', 'William', 'idqdfd@gmail.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'CCTpb96qrjK0jb2hhfjSZR25GJNkVKOpUZNpMv28XSw7H4xGrJi4EwRJpLh6hRN2oi712pzN6EGivo04KZJHAPMNH2o06PUnbb1g', '', 900000, 'YxbxphxDVPBdhfNVXExpip4IRc2lmYS4rPPjd3Wq8xO8jFkgTghhef7z2mocKKmrd46u7hpNdmamY4U67sQyOl2W7VD5dmZS4AdNAdgvAuUA0nZ27ldBWCgZ', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '32', '', 5),
(35, 'Knight', 'William', 'ifd@gmail.com', '', '116 Riverside Drive', 'Montego BAy', 'St.Jmes', 'Jamaica', '00000', '8765578447', 'rEURHL82uUfh8yEv9sDKot531Z2sWroX28C14gMfLRdLjzV2DE21kbev86xvbbkL0SpQBhUKukpsc5nUhetO5OGFGQm3nBHktqcl', '', 9000000, 'XxFPsPCIHVAFJCrA1IohFKKiAJaCiouZVgc2AW51jq5PoxheGItZ8uITF2RNMNsyknst7rXO4aWxpma4aHrwt2hBrInYcKGNiLzApTp7wCVhOuBbsw7iwAnK', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '34', '', 13),
(36, 'Knight', 'William', 'irfed@gmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'AtdhYk5ekCh04qMU44uP5RtdKQVmJpaFfptv5hUDAn1EgQKAojHx8gofMnZ9cplSlgHSfr5dXFa63FIxA532K2MsyFOgPyJpQC7h', '', 1500000, 'w4LYu3oWB47mPzoAwqAxICXPmo80E7CmJ0NhOCmKw5yl0CNvBaCSXxBuUUNRfhNanbJsdSsNO4gNTya0LVr6gkOp5SEfyGnH3rGLBCb8g3rDb51E4Gb0hrFR', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '26', '', 16),
(37, 'Knight', 'William', 'irgiiyfd@gmail.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'uNFMoJps7SezLvg611rlMSnhUaUu3ILmDl7XkarFtsg0S0LchFXAgVb3slsRM9JlNTY9LSzji6iRvcXTng1bVsVPxNHnVecJFbzV', '', -1222, 'dnRZwT1ubEvmIfKw1V2yRIMhTDj8YqCCE1OWxgOudurWF3Ucm9WSRzDV9MwZiicNwd3eD256Oq9NF6b4VHcB2TgMJLmwvf6tSoug1NNAugqNEM3B2LyGgQKX', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '8', '', 3),
(38, 'eqq', 'scwd', 'sd@gmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765547734', 'hqssgV9lfxOKVy0nNxsi5qahqdaDnki8wPwxZkw1EPGCGzobdK2nDX8v4VKhKGzCqs5YUbhHPLSDzO3s6vRqq6J715c8fHqb3MKj', '', 1500000, '99d6jpsPxGyykUN7SBzhXc7kd6Kj9Uy4khSmOWQhkCCGizV24z0eEdbtdAIopbmC2Fn1FC5lygZdnWBSlLXdBdbNaVylyb3KHe9ly0qCesfGsgdLfixXgEBI', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '25', '', 16),
(39, 'eqq', 'scwd', 'sui@gmail.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765547734', 'T4efam4jhNprhrTVdFo1GAwF3h9Mpp94wIpheBeqdW5HwlD2ZsKNm0WDqjWDtkrLHB527eQsNhTnDHVkKaLBRa1AyPC5DYLDd85p', '', 90000, 'xS2uXZ1D1ROja1rpg2X0Sm7quhLiP4zFM2jFQDuxjuUrHf9e68EDKxEBdKgyQgr6usanPFHoSiWRv6Q8yeraS8L5AxW3tU6Ugmp13GjkSaWVGp0kXE1zxlVa', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '10', '', 3),
(40, 'eqq', 'scwd', 's23sd@gmail.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765547734', 'Dd9xbPmK8KRC65D4HQLVJ3YP8ZD8BHmjDZO1RSR3FPK5sGwdDYsk8rHNj4JX5XSXr1FWKwdQ6UeevfU3o1L5RFAD8JCn88mycUXm', '', 11000000000, 'R087FvdbpnwFZWWrzn99WVXaN3GTVsz15O6QN9FOLf37FFaKT3Vtk4KeLfJIPmz34B8ZzrIBDCxolgAQGsEXF5fIAgVkxDbqG08a0GUGvtXgSNeg641CDgY1', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '6', '', 5),
(41, 'eqq', 'scwd', 's2asasd@gmail.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765547734', 'tB2zoE0k0bzLFMdCpE2OIhmDbb7a5Ie0zX7wqJm35IuSDcDDFuABa2uDjJdIFYNAVIyeCWBBVRTuPjwYVCwRPM8nFgFEEQhdVhGS', '', 30000, 'hl01EA0pg4WWitZLRC8PLXJj99in87bURmx3qjmEyng9v8INulId1rbmBakoDkSZX0gughBtJFyHx8KSD5sQmK7xV53mzK5ajrSgEVhOAELu0uz5QuZn46m7', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '9', '', 5),
(42, 'Knight', 'Lool', 'ewoewi@gmail.com', '', '11 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '34535443', 'tMCSNxGPDRD6q8H2AEkmpj3Y5d3wKYCEpylQycOrslaIxC2RnnVgcw7snV2DAvwcRDQweat70LP5iO7j8SgxSff2t0gPVs8DYioQ', '', 800000, '8W5VFhB8ZbdKJanysFs5Y4Pn0G0V8I9GclX8tKzb0YqrX224dogMRs2CLq4QYTCERWz1TtwsA1UXifWs3zlqY05SW8nnwLHShh1vToD7WQLWwgwVTsJzSlGf', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '7', '', 1),
(43, 'Knight', 'Lool', 'oewi@gmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '34535443', 'x85pQLFqFRt84Z68Uu58nEjSUuDk2imJ3ojb4RTa3O8RqcI8czqlKHoBNVGuBSeMoJXKeQN2QtMPsZ8WB7UYfKTtPA02di4IbIkm', '', 1500000, 'JyG6HOAxnOJD1HnSeva98vNtiNg6yE6zK35JLRE9qB7O4KqDqzOAtLBTVw9agJhCR3vjEoBLArYh25ZiNTkBMsbCSQuPzsRxsQkVAxqBBtlVmoOZ69ewqhUK', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '27', '', 16),
(44, 'Knight', 'Lool', 'oewei@gmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '34535443', 'Z3WQMAE4glEiixZuPPv5HRqtC4dcpXCexxR4rWgMi7miCpARRwKP6z0HpO1vGRNjRhTPlMiXPxp4KQ0hC2srP3fvfJ37zzy8fAof', '', 12000, 'Rl8Jgk6XPt75Bt7avUPxGrDUylgyvWdEFISYyNrcr0Pmuo76la1PuNU2MhEMYlu8OvYks54zEUyZiQCqxqpiHoS4riRAVgmLLE4xTwDXL8CmRmpUrpjoyEsT', 0, '2018-05-07', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '29', '', 16),
(45, 'Knight', 'Wonderq', 'tyi@gmail.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '34532342', 'FR2vhUCbedaHEMpHcxLzyKJFFzsVN9q2w38l1eO0QMe5TJUI4eHLCgOSr4tZomm2I9AKj4ZGLdAiIhb4eR2EOpzbm0XP1JM6R5jF', '', 900000, 'PcwFUzVMJWBBK9XArNAnLahbaHk9R3b93KMWWYjhFa8LnQU5q0Dl418X5JAYZo4a8bLpRYueUc9PWAtJHXoZcPZ9ExpPu3JgUe7vEPPwFZ8qQzhwZNb0GUXR', 0, '2018-05-08', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '31', '', 5),
(46, 'Knight', 'Wonderq', 'ti@gmail.com', '', '12 Canturburry dr', 'Montego Bay', 'St.James', 'Jamaica', '', '34532342', '9zklFScYUMXeUeZZ5Ki9EhorrIJsXHjfAiBRAgh1wsXHrye44rd0TTBeVbCoiluZcwbBiQN2UgGULbq6ceay7c2JYIo0wJgZNlLp', '', 12000, 'Kbs2gNYlV2h4xYwBA7MPE1puXyFxD9ES0d4Cfx8tiLKrBBImq5uHg8rDoko2wEfhrvQzkFljc2fKEuvwMggJaRFqcH8iMfWfMaSzMCzASNGlfdbvTvQKfSTr', 0, '2018-05-08', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '30', '', 17),
(47, 'Cool', 'Bool', 'sfdsdf@fgmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '345345334', 'K7uxtvHTT2yCYLPT7d77nhCjZaMpcxxeH2hRSpIvlVkz7PXXTFjtwTG9lfJyVnKe2EL8ddef5Vogt49hDre45TPLqtIytyrclzuc', '', 2800000, 'JyFoVfcqr8ZkXOHnYT6pXldvvv64JWM2mAEW6w3WtKCHHuGmkwN6L244NZ0oXJqSCGQIGRwvUVQppSFfVsZJOTq8etUS5HHvNOcj3kcckULtgJxhnEioggVy', 0, '2018-05-08', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'G10zA6yC', 'unit01', 16),
(48, 'Cool', 'Bool', 'sfdf@fgmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '345345334', 'KZIYgjDynbd5RFqRx4K0ZC4KQP8arB0cpB3isi8omY7RJ5R4omwiKbfpiDMzWLXdrwl8U4vz4ECM9GpJfyVb4trPv4XchJwEZ559', '', 2800000, '3uTLaWpYjqZHaiINEwT8W0Sx6z4ctJN7Yn0feiRRkmzd7IY0jUPY40W6aB9sh6NR0fm0oxddvy9VPley2dFmjW2SqDvqvNaqTjCgk1FG9ijn7Y0VjnLaoeHf', 0, '2018-05-08', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'FqABGkyM', 'unit02', 16),
(49, 'Cool', 'Bunny', 'oio@hu.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'xjpgPDcj84rHnfGDIFyIQvTY8YA0BdKvE8qwqRqswBmuVFVOGMoOttBcHriTK83f8oFBFUc6F5N7wocDYtWqnzkq0Oy95gtzd0t9', '', 2800000, 'AfO2EzPLgMy7lXDPH1qOk1ndBrv46j1xdDbP10nlMB7Q4f85BoVo49vuJMJOmBJLE0Ql2VLwuJ7I2VSL3VRWmeGvSnINxL5xVqCXZEZI9qf7PoTHAWeipFyA', 0, '2018-05-08', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'P0M3a3L3', 'unit03', 16),
(50, 'Cool', 'Bunny', 'dtfvh@hu.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'X5ntRoeIV34jZlHpxQJCvKLtZ2oqISTAISruH6iN3qyfflmxtUbfzPT12t9n6SLuuzsyYCp6festc3tUJB6EV3aTpJ5PDoyXqDI6', '', 2800000, 'wbi05cenqopUcEgaudEroo9GtlcJSIaX2vtOItRqjW3n1EODjtVxhs8cDXDAvN8IQcNXRcyo3fKzx7ttWj6ky1kBD4Kab183CxcWJC7Z5tobUXho8RwPY32W', 0, '2018-05-08', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'izmckaWo', 'unit04', 16),
(51, 'Cool', 'Bunny', 'dtogih@hu.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'V9C2DUnK0Aa1sLAqcT9TtOLamkhqTnvVVJ2OjhtI0B0rJRcw8FYI83ZPmjgfqmqOpFXIKSJvpXgKVxy7VfdJ014Fa7wx43fsnX0k', '', 2800000, 'gCygsuD2RmAynpifnic7V7kFgOCsQg53ArxBXkTkntph0AC3F3dwQpADJAeubCxspvh6TixX6LvUMXVav9JsjfdXOrDyycgLPPivrsv7VBsLEMmcTO9MOGRT', 0, '2018-05-08', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'C1eD7vWD', 'unit05', 16),
(52, 'Cool', 'Bunny', 'werwtogih@hu.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'GNkf3hLz7544WYKgTWALCgSmYI3hv2ljtiM8n7ug0Ih1AytBW8qEPTBM4zFCjXdkglCdZF4TcdMN5FDIOUS45Av38PlFk0gAFyfi', '', 2800000, 'jU5kkabA7R5gfhEwaULU5p4GobkWCZOFR0deg9Tp3MClTxmtKUONDEaaMk0mnrFPQXQstCcY6CIeE0ruTMGSh0wQGfTjq7wasPcusMRdfTCHQVVolHStKudV', 0, '2018-05-08', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'O4ytQ2o0', 'unit06', 16),
(53, 'Kelly', 'Bernard', 'df@ymail.com', '', '11 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '45345332', 'zJiFAOYv0OWrL5790WJuFbAVoVvAq5hMPen9lG9MgHWz3WDkJCRiZr9ksRCvyAJMKgfNgqpkkxW3Cl3Ug8MEkMKq3u3gVJ5sqxzo', '', 120000, 'zUr4qxKpA4fpYfywnDDdw7v6QEwDSxM3NezyWEPncRaxCSWCrcdMAHyWnmXKzEFV7jfby83DVDIagq9il4FNuHsKeX4W6PlyqE8qbh8X6tFehmlPPnHZXo5S', 0, '2018-05-08', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '42', '', 1),
(54, 'Kelly', 'Bernard', 'w34f@ymail.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '45345332', 'FmShqOCeHrD8O0ZGURjDEIBNkG4EWUJzV5cLxjiuOqaAEmIcsqGQ06F6VCBqEFOsh29mz1CqgrAhFYSM4MdqmM8lgiirtgGYIFlF', '', 120000, 'z2u0PiWoLRIdNHGFuTGWLpXhztGiO1Yoc8SrF27yeO0VKmVfu40JYkrPsHw9Bg7XnXKd924v8WXkeOMEkvfdxMu4vEM7puOKtl5MUkkp1UOIcs4yavHWt80e', 0, '2018-05-08', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '43', '', 2),
(55, 'My', 'Genna', 'oli@gmail.com', '', '11 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8764463342', '3eWahKCAcIgJfHVXK7hAtLRt7H60UKztHxwk0f8TELq3VYD7gZFPBxo6DYLDD82t3XCYZv2uyVvUdi76EhlcofvwpjQfT5LMRvCa', '', 34555, 'ipNfduPfcOp2yA6R1O1rhHOmCFw90W3CE5Li2x4StrfOSTW7zdzLJYKeI3bKYwIvN4ObI1rsLZ1rSh0aPtYwEGYV18C5zNbXnb89H4XEkP0EC6qxayIJIx6G', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '44', '', 1),
(56, 'My', 'Genna', '4dd34i@gmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8764463342', '7Mk1Hw7Q2DAHLibYaXFpMOnlPuSCpHAZN3pBi55AvdRgTvnl5dVxtfQOml6i2A6rxTWEGQx9BXbTKgQHe9UzL7UAr2UTmcxua7Xi', '', 2800000, 'Xh81SIYkuDG4flCnOxhWayd4LzNvAXQCUHJMiLgGmAySxKwjikoxWH6c0sP8WKKYV0SLCttDd4KZX8B09UtXbEYRQlCLaLL1n637tD2T9b63HMIDtLU0SVy3', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '9hrNXkwC', 'unit07', 16),
(57, 'knigh', 'sds', 'ere@rmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '3423242312', '2NPMilpKEcRpYyYmdQDeJvEctZkhqKBBYeDx4ZO5R5UC2p6VL6Mp610uqnqBS9JKLn09Za4G4TVyez4ULUATzuC1qW9XRgcXqkkF', '', 2800000, 'Hq6GiYruh3Vo5JSvSmJnoLCvlb5FR8uVoo7Iwb809e6DCYNQiCZseJso7CBR68fTRqshuTCMNaAAq0B88EPoVGMrLseaiJxFI5z3LmHOWJTI3UQldesyzfQW', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'eXC8IWZl', 'unit08', 16),
(58, 'knigh', 'sds', 'erwdw@rmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '3423242312', 'EQwcnjJqHRtdDaEaZvgdKSVFRwObj54LDu7WmnZU3NKHW19Rz4j1QVrsJM5CfmFjKzxTG0qYDvDDeTWLRt93UunL2icCRzXWRv46', '', 2800000, 'NA7DshKmxHbekPE1z1V5CkZfduQ8Hgpr80eMKIljuHOLRLKgKJNlTajj5XTb1W8G9F2ZI34LbthWkMp1Y7ZZrPsl8bk5PP6QcgoGQPT53xhDgCTrEu8kEoit', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'ZyAFsyLu', 'unit09', 16),
(59, 'scdsdca', 'sdsds', 'dsdcs@fgmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '232324232', 'rSeIgMfsM5QZZ6medZ2D8PTqsA8Rx0uhMOV9OsIMk9JQSjnBF5gmzDs1sDEMafCxhyPZD3NmJ1bjzoX9pLEECaEoziXsa8TiPNnC', '', 2800000, 'rqIBdCQSDMAqMyyWwYuVSl5Z8O05YUSrOp6wg3FtAgBV91qlC67RUwC0t2zUdLVBkGCdvwXciq3mlRN05JJGIKMr67VbTYOIfDkUGeJWHvwAiZ9S9IYdPuFM', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'kQ7pJCTc', 'unit10', 16),
(60, 'wdqwd', 'asdasa', 'ads@gmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '23243242', 'g32agmcWQURMFTDY2G6qmq56DO1U0Fv25VCb6itUljlYt6DDoa3hYuW9BF2wmjTdUts8iOALaO5xF6EhAI3GyEUosSAjoYtQNJid', '', 2800000, 'T3knGXcKY41pm6zJw7mpuZWjSBzZkuSd7XE02kf5Jqo0zK1nOFNzWWNj7EIxJOvDmzBJZY1oZXFUSJ0EdJkw1kgwkqbGs2rsdwFRr6vYQeyQhbsOB1ifNbZa', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'A1weH57S', 'unit11', 16),
(61, 'sesdc', 'adw', 'asdad@f.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '23423422', 'LosC82zVuq9sb16pTXC4qf1mjaPHlvVmXRJnocRpXVUmefaAzwiZiB6CjLeutLyyaVkm6p5aBqkSwFLyy7awymQHr7LnhQ2D1Ki9', '', 2800000, '92xve5c8PScdAJzdw1qZpFDg14mSBJY4jrJ93xOt09OyMNpWsosKZL86LTxPEzRMmB4bpH8kab47Rv4tkLPtE6TSdQWWxdku5XbMHsEXkBH9jjPmNN7pWxTS', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '620CGZ3n', 'unit12', 16),
(62, 'sesdc', 'adw', 'asdad@q.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '23423422', 'BtLKBQqo64GrJZdgO0bjg6j0TMK0dW7phqm6bWgfYgpEvepNjITpIQLYz70yc44fYm9YKwur2Ir73ksKTc84jyxCKjPijzWY5ZGb', '', 2800000, 'zE3I2OliOpA6ako4aODW9LvIbhMl0UvnLb0ovr2JBIvnonJR4yaIcQ1FA7q1e6KnBP267n6WEp0zWOREJaOjEJ8IFZQFNBIG6cEXCUH5ddTAtWYfcgUoqqIV', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'A4CkLXNy', 'unit13', 16),
(63, 'sdsfw', 'sdcss', 'ds@eew.com', '', '116 Riverside Drive', 'Montego Bay', 'St.James', 'Jamaica', '00000', '453234252342', 'AOdTBAp0WHMztd2ElFhduJvj07XMzenGN9mfS1fXvaQbCvpd5k4KrVDtcYf5zGJdJgBJXcRPg2c1f0TxgKKBBW0wnrMX58X6xIyQ', '', 23111, '7n1ljWwoIVHpU4uGpZgZOoa1YBbJCvZaubwb1Gn4joNS4lZECHuyAgrulUUd64nuHCxeEqQeblJWp1nl7jGS4fy3FOiZRZiHTw8x4UmB8SqZKvvoXtzAPFfs', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '45', '', 7),
(64, 'wewece', 'edfscd', 'fsc@hmail.com', '$2y$10$ioePP.UvBMX05LIKlj9NvuoSURzMjIMkJzBg1itfD28.4DmB4oClS', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '3452342', 'skU4enrqe9N0ltV5rM2qbYWGWNf0ZA4voyjIjRXEP4frxOlAF105Ka2jIZwv111Y2eDxnTXWunB4IBqgoMEhfrnAwVOkvHLjCeBv', '', 2800000, '', 1, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'ZZvd1eLu', 'unit14', 16),
(65, 'wewece', 'edfscd', 'fsc@qemail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '3452342', 'DnfJwKSm16Fx0iexw3BX80OmbPnJtQuhWVX2agQgbnhhZA1JuUWml6D9zW1TQoI1vupZwH7BC46gkpmwOa5Gece0eNeVqx0SmtrR', '', 2800000, '06OEEATXKmTyPqVgjjpFpdA3H9qDrAQfuL78GDnUkXiSSVyMfOE6QOGTU0LJy3TliV6jwFaEsUNncYhIc4tXZCqXMZACvykravCNHg4NLdghfbcO4LqgB7Lp', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'o4ektQcD', 'unit15', 16),
(66, 'fwwefwe', 'wwrw', 'sdsf@re.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '342342342', 'l4OrNZCdBa5p6zwLEiqF56bc12wrxnyqm2ZjutpJkfBh0RcZKiIiXafBU0j8S5tJrIsTyyIzjyqpsWTkpw4HlWJsUwMYfPuABf7N', '', 2800000, 'sc6vWTmLKhkxQpNG0QYiFvTLZkzxOMIviV5VcDXGr0bWLU8XgRc3QVQUKC2CUVfWr6ZgPQInKlKVwGGgv7qvIY8JXjcR8h27at2sDFT371qgIcehSqqHYCdK', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, '9kDaNl5A', 'unit16', 16),
(67, 'cwcwew', 'dwcw', 'wd@edfs.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '23423422', 'YN5AasUrLoZmxeCfH6JyDxrNVDLJTMtr1qXYLZfNtP4nYqtwN684uaGCmim8wqolxEpO7KgE22WWf5lDhtnOMT6qr1WB6nP6k7Vn', '', 2800000, 'QPz4eCIGYEMGoHIDyjF0KSx27BtW51sYjyjfy6Vfk3zWdpzoWTsBkcjzkyrZOOK0VUgLXbZEAgR4zxjSIXon3ClIFHpfQHAVKIC1WjCtJ1KZSWdUjPK2lHlI', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'ytJbULFp', 'unit17', 16),
(68, 'cwcwew', 'dwcw', 'wd@easdfs.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '23423422', '8BvKYVS4m8RJiLUyYB4YampZZBlU1lZLaUM8wblY6tSZjqc0JMVXkziSzNUDOCcbTojVbQaHHyTVMnJ66ayfuocsGNn2U11KxrjU', '', 2800000, 'EXtw8BCzmwZZ7MhggGeWf2WoZ64wk9MjmBB9KTuz3VNAhYvCxuAOZeVAhBtKp7BXUxnxhX1TqPJSBcgPNztuNx50xvxvuzZWlwhoJJtKdTSpviMdJ5GNwZdM', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'gqUPWL6c', 'unit18', 16),
(69, 'Max', 'LordEvil', 'bullybeef@gmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '990223242', 'pVDRgHIEkhhjxXWJ6z8XBTpf2vjTSCep6Sklq1tMFNNQMDut1V9k9dBLrpaWKi89wgto6N8f4jkxuCN8OmVWSH0Nan2al87a4IAF', '', 2800000, 'Pxe6veyCoDODCIVFkBlVdBNJWzKSOiicPD5ridDD61ySjLYEOzcl8hrWfXYpYACfNKKFb7CVxQKNExnbz8NB2PDkHKxjPw8XzlEW4R8N1gPyNHGGpAkqvL5C', 0, '2018-09-11', 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 0, 'TLgromCf', 'unit19', 16),
(70, 'Love', 'Women', 'Jordainegayle444@gmail.com', '', '12 Fairiew', 'Montego Bay', 'St.James', 'Jamaica', '00000', '8765578447', 'cKNZjV5KX0tEcwLHg5q75VCT0YcVat0bBmHLvV4izE73OfwGnQwa0wc0xmuiSrdPRSGbkfCkVCzPTQ3MHS88hxjjdcggBbExi0LH', '2', 2800000, 'GQPykRCsWWhYngdKua9zjcMCMjZsOEwzxIPo5KkXrFX5DArBbZmgQH2fME0zmNc5CZgGLlFTlPEd3wQ6Dpg7dA2uAnmJs2qHP7yyk0FPZljmTmNXQBfkrI4b', 0, '2018-10-06', 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 0, 'Xi21KrY4', 'unit20', 16);

-- --------------------------------------------------------

--
-- Table structure for table `property_work_order`
--

CREATE TABLE `property_work_order` (
  `work_order_id` int(11) NOT NULL,
  `person_assigned` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `amount` float NOT NULL,
  `tenantID` varchar(255) NOT NULL,
  `problem_description` varchar(255) NOT NULL,
  `work_image` varchar(255) NOT NULL,
  `work_key` varchar(255) NOT NULL,
  `date_issued` date NOT NULL,
  `date_started` date NOT NULL,
  `date_completed` date NOT NULL,
  `date_payed` date NOT NULL,
  `payed` int(1) NOT NULL,
  `system_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_work_order`
--

INSERT INTO `property_work_order` (`work_order_id`, `person_assigned`, `status`, `amount`, `tenantID`, `problem_description`, `work_image`, `work_key`, `date_issued`, `date_started`, `date_completed`, `date_payed`, `payed`, `system_user`) VALUES
(1, 'Vendetta Williams', 3, 120000, 't@gmail.com', 'water shortage in area', '', 'hoqH', '2018-04-17', '2018-04-18', '2018-04-19', '2018-04-20', 1, 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(2, 'Micheal Lee', 3, 13000, 'o@gmail.com', 'main light cord removal', '', '2tCp', '2018-04-18', '2018-05-18', '2018-05-19', '2018-08-15', 1, 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(3, 'Bobby Falcon', 3, 45000, 'ser@gmail.com', 'house top leakage', '', 'PzT6', '2018-04-18', '2018-05-15', '2018-05-15', '2018-08-26', 1, 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(4, 'John Miller', 3, 22000, 'er@gmail.com', 'toilet not flushing properly, low water levels.', '', 'x3Cl', '2018-04-18', '2018-04-19', '2018-04-25', '2018-04-27', 1, 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(5, 'Molly Brown', 3, 12000, 'er@gmail.com', 'too mush bush in front yard', '', '1kfL', '2018-04-18', '2018-05-24', '2018-08-29', '2018-10-27', 1, 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(6, 'Molly Brown', 3, 42000, 'er@gmail.com', 'too mush bush in front yard', '', 'NQ64', '2018-04-18', '2018-08-31', '2018-09-03', '2018-09-03', 1, 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(7, 'Molly Brown', 1, 499000, 'er@gmail.com', 'too mush bush in front yard', '', 'PwgK', '2018-04-18', '2018-06-01', '0000-00-00', '0000-00-00', 0, 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(8, 'Molly Brown', 2, 3399000, 'er@gmail.com', 'too mush bush in front yard', '', 'zsvR', '2018-04-18', '2018-04-19', '2018-04-21', '0000-00-00', 0, 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(9, 'Bobby Villa', 2, 2300, 'ser@gmail.com', '`dsfcsdc`sdfc`sdscdsdcscd``ddcwck`k`k`k`jn`j```l``jk` l` ` l`l `l l `l` `l ` `l `l`l `l` l` `l` `` ` ` ` ` ` ` `', '', 'XPoh', '2018-05-04', '2018-05-22', '2018-05-25', '0000-00-00', 0, 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(10, 'Green Man', 0, 1233, 't@gmail.com', ';delete from `` property_deposit`  where ` dip`  = \'12\'', '', 'q7ZH', '2018-05-04', '0000-00-00', '0000-00-00', '0000-00-00', 0, 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc'),
(11, 'Roy Benett', 0, 20000, 'o@gmail.com', 'pipe broken and needs fixing', '', 'ov4s', '2018-05-31', '0000-00-00', '0000-00-00', '0000-00-00', 0, 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `rid` int(11) NOT NULL,
  `date_of_receipt` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount_payed` float NOT NULL,
  `tenant_id` varchar(255) NOT NULL,
  `receipt_hash` varchar(255) NOT NULL,
  `last_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` int(11) NOT NULL,
  `rent_period` varchar(100) NOT NULL,
  `amount_due` float NOT NULL,
  `rent_due_date` date NOT NULL,
  `push_status` int(1) NOT NULL,
  `sent_bill` int(11) NOT NULL,
  `tenant_id` varchar(255) NOT NULL,
  `last_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `rent_period`, `amount_due`, `rent_due_date`, `push_status`, `sent_bill`, `tenant_id`, `last_date_modified`) VALUES
(1, 'Sept 10, 2018 to Oct 10, 2018', 12, '2018-10-11', 0, 1, '2', '2018-10-07 12:42:28'),
(2, 'Sept 10, 2018 to Oct 10, 2018', 15, '2018-10-12', 0, 1, '3', '2018-10-07 13:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `system_user`
--

CREATE TABLE `system_user` (
  `managerID` int(17) NOT NULL,
  `managersession` varchar(255) NOT NULL,
  `manager_fname` varchar(255) NOT NULL,
  `manager_lname` varchar(255) NOT NULL,
  `manager_email` varchar(255) NOT NULL,
  `manager_password` varchar(255) NOT NULL,
  `user_hash` varchar(255) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `online` int(1) NOT NULL,
  `manager_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_user`
--

INSERT INTO `system_user` (`managerID`, `managersession`, `manager_fname`, `manager_lname`, `manager_email`, `manager_password`, `user_hash`, `date_joined`, `online`, `manager_status`) VALUES
(1, 'Iajigp718oQHmySWPQTNCNGsyW8cv0erkmmcllc', 'John', 'Whyte', 'jordainegayle34@gmail.com', '$2y$10$tJ2LMaZAagBDtk00AjI9pOmlA4eZ0nNnqDHrMggIBYvJOauzK9QjK', '', '2018-04-06 10:55:41', 1, 1),
(3, 'Iajigp718oQHmySWPQTNCNGsyW8cv0', 'Michael', 'Manley', 'netjhay34@gmail.com', '', '', '2018-04-09 11:20:04', 0, 1),
(5, 'R2Qzn58f4C4d80snma8mWdmfcTGUaU', 'Jaden', 'Grant', 'wesleypaul984@gmail.com', '', 'bxkAHuQHGDj3oJVROVPGDUbRuqDKKAby0ZpV97x4RQC8aYzsrs', '2018-04-09 11:41:24', 0, 0),
(34, '5LuZu8eGlOdzjl78XxNfD7fTutNbbQ', 'Robert', 'Stewart', 'remaxjam@gmail.com', '', '7kyif4Qo25TdVPM3oNp4rRFDcMvEGRWACwueEyQCE3oRXiVHrB', '2018-04-10 15:58:50', 0, 0),
(35, 'TTLaIbSM4eEBDuLgncgBU8aVBgczIq', 'Kamar', 'Fisher', 'remaxrgaccts@gmail.com', '$2y$10$zHWxh2tp2BIAQYtbzLKfwefCAi4AwCq6OkOt990DqIvbLE0ZfggB2', '', '2018-04-10 16:03:22', 0, 1),
(41, 'K1tbzxZ5z1c18a4PVN3DRxu9QnSgJZ', 'Paul', 'Wesley', 'mikemyres@gmail.com', '', 'wwJi0TcSn5wzTs4L9fk9lXzD0KqQCz9hdLd1K0y3d0LbX9uxbC', '2018-04-11 03:38:45', 0, 0),
(46, 'LH9W7lVgbY5y0zH0sSF09CWL0SBHdZ', 'Garfield', 'Gourzong', 'garfeildg@mymail.com', '$2y$10$S8E.FLxpOmlXwe.9IYUorO1My7Q1US9t3CY1Jvnf3Wtlgom69TL7q', '', '2018-04-11 11:08:36', 0, 1),
(48, 'ulwv7kSMIeh4ZEDR4Bc1OlhpNryLhY', 'ii', 'ss', 'k@gmail.com', '$2y$10$hLlurG.IPNwBIg3f3chkA.RoqeCOdl7kSMvUsK1SPk0nnSODxu8rK', '', '2018-04-11 11:54:41', 0, 1),
(54, 'QEKk26wJFblsx03yD9d6Qw2ezMQ0uq', 'Cool', 'Tool', 'r@gmail.com', '$2y$10$eeE19ml2VcziUVUmf2SlC.DBmVfvnNic1Mk7dZKAFe.Qr5fqjI7gK', '', '2018-04-11 23:34:17', 0, 1),
(56, 'GtwLkIvfFOh8tEZy5gOLElAucMBTp7', 'Jordaine', 'Gayle', 'remaxtek@gmail.com', '$2y$10$rCXyfi3yztqOfsSM.6RLluBM7ajzxw.rkfFCFVXSNRcRFys7s87G2', '', '2018-04-12 05:00:15', 0, 1),
(57, 'f5uQNBj00IpJoB5KgrdwCRKUjUBiye', 'Shavel', 'Walker', 'swalker@gmail.com', '$2y$10$aPLdgTaZzfzrDDHmX9mdPuc0BFsJy9jRS/nzCNSLD2t/bfNG6zl6C', '', '2018-05-02 14:45:37', 0, 1),
(58, 'sCS508bG3g0Iw3IF5CdlErFt68zuDT', 'Johnny', 'Test', 'n.w.23.aa@gmail.com', '', '2H1IznQ57F9qko8xZqi4BFHklRrhU7FzunNMErGrCaLOAZNq1v', '2018-06-06 02:25:16', 0, 0),
(59, 'mBN9oGOxRXDpiJ5bkJzxF4o8iDZj2v', 'Johnny', 'Test', 'n.w.23.aa@facebook.com', '$2y$10$.qrD2FJopvfJbieZlKG2xOVMjcKuIRy6NlXFlmNnc0abX07izjpDe', '', '2018-06-06 02:25:44', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_balance_account`
--

CREATE TABLE `tenant_balance_account` (
  `taid` int(11) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `balance` float NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_balance_account`
--

INSERT INTO `tenant_balance_account` (`taid`, `tid`, `balance`, `date_added`) VALUES
(1, 'ki@gmail.com', 26666600000, '2018-04-29'),
(2, 'k78@gmail.com', 26666600000, '2018-04-29'),
(3, 'mb@gmail.com', 26666600000, '2018-04-29'),
(4, 'zanx@gmail.com', 26666600000, '2018-04-29'),
(5, 'ajau@gmail.com', 26666600000, '2018-04-29'),
(8, 'miol@gmail.com', 340000, '2018-04-29'),
(9, 'lolo@gmail.com', 240000, '2018-04-30'),
(10, 'jreadi@gmail.com', 0, '2018-05-02'),
(11, 'genna@gmail.com', 26666600000, '2018-05-03'),
(12, 'sea@gmail.com', 26666600000, '2018-05-03'),
(13, 'java@gmail.com', 0, '2018-05-07'),
(14, 'cool@gmail.com', 0, '2018-05-07'),
(15, 'we@gmail.com', 0, '2018-05-07'),
(16, 'oiiu@gmail.com', 26666600000, '2018-05-07'),
(17, 'df@gmail.com', 0, '2018-05-07'),
(18, 'tf@gmail.com', 0, '2018-05-07'),
(19, 'iiof@gmail.com', 0, '2018-05-07'),
(20, 'iigj@gmail.com', 0, '2018-05-07'),
(21, 'iisdfd@gmail.com', 0, '2018-05-07'),
(22, 'idqdfd@gmail.com', 0, '2018-05-07'),
(23, 'ifd@gmail.com', 0, '2018-05-07'),
(24, 'irfed@gmail.com', 0, '2018-05-07'),
(25, 'irgiiyfd@gmail.com', 0, '2018-05-07'),
(26, 'sd@gmail.com', 0, '2018-05-07'),
(27, 'sui@gmail.com', 0, '2018-05-07'),
(28, 's23sd@gmail.com', 0, '2018-05-07'),
(29, 's2asasd@gmail.com', 0, '2018-05-07'),
(30, 'ewoewi@gmail.com', 0, '2018-05-07'),
(31, 'oewi@gmail.com', 0, '2018-05-07'),
(32, 'oewei@gmail.com', 0, '2018-05-07'),
(33, 'tyi@gmail.com', 0, '2018-05-08'),
(34, 'ti@gmail.com', 0, '2018-05-08'),
(35, 'sfdsdf@fgmail.com', 0, '2018-05-08'),
(36, 'sfdf@fgmail.com', 0, '2018-05-08'),
(37, 'oio@hu.com', 0, '2018-05-08'),
(38, 'dtfvh@hu.com', 0, '2018-05-08'),
(39, 'dtogih@hu.com', 0, '2018-05-08'),
(40, 'werwtogih@hu.com', 0, '2018-05-08'),
(41, 'df@ymail.com', 0, '2018-05-08'),
(42, 'w34f@ymail.com', 0, '2018-05-08'),
(43, 'oli@gmail.com', 34555, '2018-09-11'),
(44, '4dd34i@gmail.com', 5600000, '2018-09-11'),
(45, 'ere@rmail.com', 5600000, '2018-09-11'),
(46, 'erwdw@rmail.com', 5600000, '2018-09-11'),
(47, 'dsdcs@fgmail.com', 5600000, '2018-09-11'),
(48, 'ads@gmail.com', 5600000, '2018-09-11'),
(49, 'asdad@f.com', 5600000, '2018-09-11'),
(50, 'asdad@q.com', 0, '2018-09-11'),
(51, 'ds@eew.com', 46222, '2018-09-11'),
(52, 'fsc@hmail.com', 0, '2018-09-11'),
(53, 'fsc@qemail.com', 5600000, '2018-09-11'),
(54, 'sdsf@re.com', 5600000, '2018-09-11'),
(55, 'wd@edfs.com', 5600000, '2018-09-11'),
(56, 'wd@easdfs.com', 0, '2018-09-11'),
(57, 'bullybeef@gmail.com', 0, '2018-09-11'),
(58, 'Jordainegayle444@gmail.com', 5600000, '2018-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_past_due`
--

CREATE TABLE `tenant_past_due` (
  `PD_ID` int(11) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `past_due_amt` float NOT NULL,
  `date` date NOT NULL,
  `payed_status` int(1) NOT NULL,
  `date_payed` date NOT NULL,
  `last_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_past_due`
--

INSERT INTO `tenant_past_due` (`PD_ID`, `tid`, `past_due_amt`, `date`, `payed_status`, `date_payed`, `last_date_modified`) VALUES
(122, 'V9C2DUnK0Aa1sLAqcT9TtOLamkhqTnvVVJ2OjhtI0B0rJRcw8FYI83ZPmjgfqmqOpFXIKSJvpXgKVxy7VfdJ014Fa7wx43fsnX0k', 2232, '2018-05-15', 0, '0000-00-00', '2018-09-19 12:56:52'),
(123, 'GNkf3hLz7544WYKgTWALCgSmYI3hv2ljtiM8n7ug0Ih1AytBW8qEPTBM4zFCjXdkglCdZF4TcdMN5FDIOUS45Av38PlFk0gAFyfi', 2232, '2018-05-15', 0, '0000-00-00', '2018-09-19 12:56:52'),
(124, 'GNkf3hLz7544WYKgTWALCgSmYI3hv2ljtiM8n7ug0Ih1AytBW8qEPTBM4zFCjXdkglCdZF4TcdMN5FDIOUS45Av38PlFk0gAFyfi', 34345, '2022-07-19', 0, '0000-00-00', '2018-09-19 12:56:52'),
(125, 'zJiFAOYv0OWrL5790WJuFbAVoVvAq5hMPen9lG9MgHWz3WDkJCRiZr9ksRCvyAJMKgfNgqpkkxW3Cl3Ug8MEkMKq3u3gVJ5sqxzo', 4353, '2018-05-17', 0, '0000-00-00', '2018-09-19 12:56:52'),
(126, 'FmShqOCeHrD8O0ZGURjDEIBNkG4EWUJzV5cLxjiuOqaAEmIcsqGQ06F6VCBqEFOsh29mz1CqgrAhFYSM4MdqmM8lgiirtgGYIFlF', 4353, '2018-05-17', 0, '0000-00-00', '2018-09-19 12:56:52'),
(127, 'FmShqOCeHrD8O0ZGURjDEIBNkG4EWUJzV5cLxjiuOqaAEmIcsqGQ06F6VCBqEFOsh29mz1CqgrAhFYSM4MdqmM8lgiirtgGYIFlF', 343343, '2018-05-14', 0, '0000-00-00', '2018-09-19 12:56:52'),
(128, 'rSeIgMfsM5QZZ6medZ2D8PTqsA8Rx0uhMOV9OsIMk9JQSjnBF5gmzDs1sDEMafCxhyPZD3NmJ1bjzoX9pLEECaEoziXsa8TiPNnC', 0, '0000-00-00', 0, '0000-00-00', '2018-09-19 12:56:52'),
(129, '8BvKYVS4m8RJiLUyYB4YampZZBlU1lZLaUM8wblY6tSZjqc0JMVXkziSzNUDOCcbTojVbQaHHyTVMnJ66ayfuocsGNn2U11KxrjU', 232423, '2018-09-19', 0, '0000-00-00', '2018-09-19 12:56:52'),
(130, 'pVDRgHIEkhhjxXWJ6z8XBTpf2vjTSCep6Sklq1tMFNNQMDut1V9k9dBLrpaWKi89wgto6N8f4jkxuCN8OmVWSH0Nan2al87a4IAF', 12000, '2018-09-11', 0, '0000-00-00', '2018-09-19 12:56:52'),
(131, 'pVDRgHIEkhhjxXWJ6z8XBTpf2vjTSCep6Sklq1tMFNNQMDut1V9k9dBLrpaWKi89wgto6N8f4jkxuCN8OmVWSH0Nan2al87a4IAF', 345555, '2018-09-12', 0, '0000-00-00', '2018-09-19 12:56:52'),
(132, 'pVDRgHIEkhhjxXWJ6z8XBTpf2vjTSCep6Sklq1tMFNNQMDut1V9k9dBLrpaWKi89wgto6N8f4jkxuCN8OmVWSH0Nan2al87a4IAF', 1203330, '2018-09-13', 0, '0000-00-00', '2018-09-19 12:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `_invoice_`
--

CREATE TABLE `_invoice_` (
  `inv_id` int(11) NOT NULL,
  `inv_date` date NOT NULL,
  `inv_des` varchar(255) NOT NULL,
  `inv_amt` float NOT NULL,
  `inv_add_charge` float NOT NULL,
  `inv_add_credit` float NOT NULL,
  `inv_status` int(1) NOT NULL,
  `pay_period` varchar(100) NOT NULL,
  `trans_hash` varchar(255) NOT NULL,
  `last_date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_folders`
--
ALTER TABLE `admin_folders`
  ADD PRIMARY KEY (`folderID`);

--
-- Indexes for table `collect_rent`
--
ALTER TABLE `collect_rent`
  ADD PRIMARY KEY (`c_rent_id`);

--
-- Indexes for table `company_balance_account`
--
ALTER TABLE `company_balance_account`
  ADD PRIMARY KEY (`caid`);

--
-- Indexes for table `company_collect`
--
ALTER TABLE `company_collect`
  ADD PRIMARY KEY (`comp_colc_id`);

--
-- Indexes for table `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `general_transacton`
--
ALTER TABLE `general_transacton`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `landlord_collect`
--
ALTER TABLE `landlord_collect`
  ADD PRIMARY KEY (`collect_id`);

--
-- Indexes for table `landlord_property`
--
ALTER TABLE `landlord_property`
  ADD PRIMARY KEY (`propertyID`);

--
-- Indexes for table `line_of_charge`
--
ALTER TABLE `line_of_charge`
  ADD PRIMARY KEY (`charge_id`);

--
-- Indexes for table `line_of_credit`
--
ALTER TABLE `line_of_credit`
  ADD PRIMARY KEY (`credit_id`);

--
-- Indexes for table `monthly_bills`
--
ALTER TABLE `monthly_bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `property_apartments`
--
ALTER TABLE `property_apartments`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `property_balance_account`
--
ALTER TABLE `property_balance_account`
  ADD PRIMARY KEY (`abid`);

--
-- Indexes for table `property_deposit`
--
ALTER TABLE `property_deposit`
  ADD PRIMARY KEY (`dip`);

--
-- Indexes for table `property_lanlord`
--
ALTER TABLE `property_lanlord`
  ADD PRIMARY KEY (`landlordID`);

--
-- Indexes for table `property_lease_info`
--
ALTER TABLE `property_lease_info`
  ADD PRIMARY KEY (`lease_id`);

--
-- Indexes for table `property_management_general_fees`
--
ALTER TABLE `property_management_general_fees`
  ADD PRIMARY KEY (`feeID`);

--
-- Indexes for table `property_manager`
--
ALTER TABLE `property_manager`
  ADD PRIMARY KEY (`property_manager_id`);

--
-- Indexes for table `property_pending_request`
--
ALTER TABLE `property_pending_request`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `property_tenant`
--
ALTER TABLE `property_tenant`
  ADD PRIMARY KEY (`property_tenantID`);

--
-- Indexes for table `property_work_order`
--
ALTER TABLE `property_work_order`
  ADD PRIMARY KEY (`work_order_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `system_user`
--
ALTER TABLE `system_user`
  ADD PRIMARY KEY (`managerID`);

--
-- Indexes for table `tenant_balance_account`
--
ALTER TABLE `tenant_balance_account`
  ADD PRIMARY KEY (`taid`);

--
-- Indexes for table `tenant_past_due`
--
ALTER TABLE `tenant_past_due`
  ADD PRIMARY KEY (`PD_ID`);

--
-- Indexes for table `_invoice_`
--
ALTER TABLE `_invoice_`
  ADD PRIMARY KEY (`inv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_folders`
--
ALTER TABLE `admin_folders`
  MODIFY `folderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collect_rent`
--
ALTER TABLE `collect_rent`
  MODIFY `c_rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_balance_account`
--
ALTER TABLE `company_balance_account`
  MODIFY `caid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_collect`
--
ALTER TABLE `company_collect`
  MODIFY `comp_colc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `general_transacton`
--
ALTER TABLE `general_transacton`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landlord_collect`
--
ALTER TABLE `landlord_collect`
  MODIFY `collect_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landlord_property`
--
ALTER TABLE `landlord_property`
  MODIFY `propertyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `line_of_charge`
--
ALTER TABLE `line_of_charge`
  MODIFY `charge_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `line_of_credit`
--
ALTER TABLE `line_of_credit`
  MODIFY `credit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monthly_bills`
--
ALTER TABLE `monthly_bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property_apartments`
--
ALTER TABLE `property_apartments`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `property_balance_account`
--
ALTER TABLE `property_balance_account`
  MODIFY `abid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `property_deposit`
--
ALTER TABLE `property_deposit`
  MODIFY `dip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `property_lanlord`
--
ALTER TABLE `property_lanlord`
  MODIFY `landlordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_lease_info`
--
ALTER TABLE `property_lease_info`
  MODIFY `lease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_management_general_fees`
--
ALTER TABLE `property_management_general_fees`
  MODIFY `feeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_manager`
--
ALTER TABLE `property_manager`
  MODIFY `property_manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_pending_request`
--
ALTER TABLE `property_pending_request`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `property_tenant`
--
ALTER TABLE `property_tenant`
  MODIFY `property_tenantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `property_work_order`
--
ALTER TABLE `property_work_order`
  MODIFY `work_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_user`
--
ALTER TABLE `system_user`
  MODIFY `managerID` int(17) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tenant_balance_account`
--
ALTER TABLE `tenant_balance_account`
  MODIFY `taid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tenant_past_due`
--
ALTER TABLE `tenant_past_due`
  MODIFY `PD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `_invoice_`
--
ALTER TABLE `_invoice_`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
