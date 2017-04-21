-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2016 at 03:55 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swaggeru_trans`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `f_name`, `l_name`, `mail`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', 'admin', 'Administartor', '', 'admin@testmail.com', '2016-06-20 04:27:44', '2015-12-09 00:00:00', '2016-06-20 04:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `cash_vouchers`
--

CREATE TABLE IF NOT EXISTS `cash_vouchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-advance,1-full',
  `amount` float(11,2) NOT NULL,
  `received_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0' COMMENT '0 unpaid , 1 paid',
  `truck_id` int(4) NOT NULL,
  `owner_id` int(4) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cash_vouchers`
--

INSERT INTO `cash_vouchers` (`id`, `order_id`, `type`, `amount`, `received_by`, `status`, `truck_id`, `owner_id`, `created`, `modified`) VALUES
(8, 5, 0, 5500.00, '', 0, 5, 5, '2016-07-22 20:46:34', '2016-07-22 20:46:34'),
(9, 8, 0, 2000.00, '', 0, 8, 8, '2016-08-07 19:18:29', '2016-08-07 19:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cityname` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=224 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `cityname`, `created`, `modified`) VALUES
(1, 'ANKHOL', NULL, NULL),
(2, 'KARANNAGAR', NULL, NULL),
(3, 'CHHATRAL', NULL, NULL),
(4, 'KADI', NULL, NULL),
(5, 'NANADASAN', NULL, NULL),
(6, 'DHANALI', NULL, NULL),
(7, 'BALIYASAN', NULL, NULL),
(8, 'JAGUDAN ', NULL, NULL),
(9, 'MEHSANA', NULL, NULL),
(10, 'KALOL', NULL, NULL),
(11, 'LANGHNAJ', NULL, NULL),
(12, 'KAIYAL', NULL, NULL),
(13, 'KHOTHA', NULL, NULL),
(14, 'CHANGODAR', NULL, NULL),
(15, 'BAVLA', NULL, NULL),
(16, 'SARKHEJ', NULL, NULL),
(17, 'ASHOKNAGAR', NULL, NULL),
(18, 'PALAVASANA', NULL, NULL),
(19, 'VAMAJ', NULL, NULL),
(20, 'THOL', NULL, NULL),
(21, 'VADAVI', NULL, NULL),
(22, 'MERDA ADRAJ', NULL, NULL),
(23, 'RAJKOT ', NULL, NULL),
(25, 'GONDAL', NULL, NULL),
(26, 'SURENDRANAGAR', NULL, NULL),
(27, 'VADHVAN', NULL, NULL),
(28, 'LAKHTAR ', NULL, NULL),
(29, 'VIRAMGAM', NULL, NULL),
(30, 'PATDI', NULL, NULL),
(31, 'ANAND', NULL, NULL),
(32, 'DAHOD', NULL, NULL),
(33, 'GODHARA', NULL, NULL),
(34, 'JETPURA', NULL, NULL),
(35, 'SAPAR', NULL, NULL),
(36, 'METODA', NULL, NULL),
(37, 'HALAMTALA', NULL, NULL),
(38, 'JETPUR', NULL, NULL),
(39, 'JUNAGADH', NULL, NULL),
(40, 'KESHOD', NULL, NULL),
(41, 'DHORAJI', NULL, NULL),
(42, 'UNA', NULL, NULL),
(43, 'VERAVAL', NULL, NULL),
(44, 'KODINAR', NULL, NULL),
(45, 'MAHUVA', NULL, NULL),
(46, 'BHAVNAGAR', NULL, NULL),
(47, 'TALAJA', NULL, NULL),
(48, 'BOTAD', NULL, NULL),
(49, 'DHANDHUKA', NULL, NULL),
(50, 'CHOTILA', NULL, NULL),
(51, 'MORBI', NULL, NULL),
(52, 'RAJPUR', NULL, NULL),
(53, 'JASDAN', NULL, NULL),
(54, 'AJKOT', NULL, NULL),
(55, 'SAYLA', NULL, NULL),
(56, 'SUTRAPADA', NULL, NULL),
(57, 'SAWARKUNDLA', NULL, NULL),
(58, 'AMRELI', NULL, NULL),
(59, 'DHASA', NULL, NULL),
(60, 'GHARIYADHAR', NULL, NULL),
(61, 'PALITANA', NULL, NULL),
(62, 'VALLBHIPUR', NULL, NULL),
(63, 'DHOLA', NULL, NULL),
(64, 'NADIYAD', NULL, NULL),
(65, 'BARODA', NULL, NULL),
(66, 'PALANPUR', NULL, NULL),
(67, 'HIMMATNAGAR', NULL, NULL),
(68, 'AHMEDABAD', NULL, NULL),
(69, 'SONIKICHAL', NULL, NULL),
(70, 'VAISHNDEVI', NULL, NULL),
(71, 'SUGHAD', NULL, NULL),
(72, 'HATHIJAN', NULL, NULL),
(73, 'WIDE ANGLE', NULL, NULL),
(74, 'THALTEJ', NULL, NULL),
(75, 'S G ROAD', NULL, NULL),
(76, 'C G ROAD', NULL, NULL),
(77, 'DERDI', NULL, NULL),
(78, 'BALASINOR', NULL, NULL),
(79, 'DAKOR', NULL, NULL),
(80, 'CHANDHKHEDA', NULL, NULL),
(81, 'NAROL', NULL, NULL),
(82, 'NARODA ', NULL, NULL),
(83, 'GOTA', NULL, NULL),
(84, 'VAGHODIYA', NULL, NULL),
(85, 'SAVLI', NULL, NULL),
(86, 'VATVA', NULL, NULL),
(87, 'ZAGHDIYA', NULL, NULL),
(88, 'ANKLESHVAR', NULL, NULL),
(89, 'SURAT', NULL, NULL),
(90, 'NAVSARI', NULL, NULL),
(91, 'BHARUCH', NULL, NULL),
(92, 'PALEJ', NULL, NULL),
(93, 'BILIMORA', NULL, NULL),
(94, 'VAPI', NULL, NULL),
(95, 'PANOLI', NULL, NULL),
(96, 'MANAVADAR', NULL, NULL),
(97, 'VISAVADAR', NULL, NULL),
(98, 'BHESAN', NULL, NULL),
(99, 'TIMBI', NULL, NULL),
(100, 'GIRGADADA', NULL, NULL),
(101, 'DIV', NULL, NULL),
(102, 'SARDHAR', NULL, NULL),
(103, 'KUVADVA', NULL, NULL),
(104, 'BHUJ', NULL, NULL),
(105, 'NAKHTRANA', NULL, NULL),
(106, 'MUNDRA', NULL, NULL),
(107, 'MANDVI', NULL, NULL),
(108, 'ANJAR', NULL, NULL),
(109, 'MADHAPAR(KUTCH)', NULL, NULL),
(110, 'NALIYA', NULL, NULL),
(111, 'GANDHIDHAM', NULL, NULL),
(112, 'ZALOD', NULL, NULL),
(113, 'BORSAD', NULL, NULL),
(114, 'KHAMBHAT', NULL, NULL),
(115, 'TARAPUR', NULL, NULL),
(116, 'KHEDA', NULL, NULL),
(117, 'MEMDABAD', NULL, NULL),
(118, 'SANDHANA', NULL, NULL),
(119, 'SANAND', NULL, NULL),
(120, 'PETLAD', NULL, NULL),
(121, 'VALETVA', NULL, NULL),
(122, 'ANAS', NULL, NULL),
(123, 'PIPLOD', NULL, NULL),
(124, 'FATEPURA', NULL, NULL),
(125, 'SANTRAMPUR', NULL, NULL),
(126, 'BAKROL', NULL, NULL),
(127, 'PATAN', NULL, NULL),
(128, 'SIDHHPUR', NULL, NULL),
(129, 'UNJA', NULL, NULL),
(130, 'MODASA', NULL, NULL),
(131, 'SACHIN', NULL, NULL),
(132, 'PADRA', NULL, NULL),
(133, 'HALOL', NULL, NULL),
(134, 'LUNAVADA', NULL, NULL),
(135, 'SEHRA', NULL, NULL),
(136, 'JAMBUSAR', NULL, NULL),
(137, 'HALVAD', NULL, NULL),
(138, 'VADIYA', NULL, NULL),
(139, 'KUKAVAV', NULL, NULL),
(140, 'BAGSARA', NULL, NULL),
(141, 'VANKANER', NULL, NULL),
(142, 'LIMBDI', NULL, NULL),
(143, 'RAJULA', NULL, NULL),
(144, 'PIPAVAV', NULL, NULL),
(145, 'JAMJODHPUR', NULL, NULL),
(146, 'SIKKA', NULL, NULL),
(147, 'RELIENCE(JAMNAGAR0', NULL, NULL),
(148, 'ESSAR(JAMNAGAR)', NULL, NULL),
(149, 'MITANA', NULL, NULL),
(150, 'DHAVRKA', NULL, NULL),
(151, 'JAMKHAMBHALIYA', NULL, NULL),
(152, 'PORBANDAR', NULL, NULL),
(153, 'BHATIYA', NULL, NULL),
(154, 'LATHI', NULL, NULL),
(155, 'VASAI(JAMNAGAR)', NULL, NULL),
(156, 'SONGAD(BHAVNAGAR)', NULL, NULL),
(157, 'SONGAD(SURAT)', NULL, NULL),
(158, 'VYARA', NULL, NULL),
(159, 'CHIKHLI', NULL, NULL),
(160, 'VALSAD', NULL, NULL),
(161, 'DHARMPUR', NULL, NULL),
(162, 'NANAPAUNDA', NULL, NULL),
(163, 'VANSADA', NULL, NULL),
(164, 'BABRA', NULL, NULL),
(165, 'MENDARADA', NULL, NULL),
(166, 'LALPUR', NULL, NULL),
(167, 'PAVIJETPUR', NULL, NULL),
(168, 'CHHOTA UDAIPUR', NULL, NULL),
(169, 'BODELI', NULL, NULL),
(170, 'NASVADI', NULL, NULL),
(171, 'DHABHOI', NULL, NULL),
(172, 'DAMNAGAR', NULL, NULL),
(173, 'CHARADVA(MORBI)', NULL, NULL),
(174, 'TANKARA', NULL, NULL),
(175, 'MALIYA', NULL, NULL),
(176, 'SAMKHYARI', NULL, NULL),
(177, 'AMBALIYASAN', NULL, NULL),
(178, 'VIJAPUR', NULL, NULL),
(179, 'VISNAGAR', NULL, NULL),
(180, 'BALOL', NULL, NULL),
(181, 'PALEJ(MEHSANA)', NULL, NULL),
(182, 'KHATRAJ', NULL, NULL),
(183, 'SANTEJ', NULL, NULL),
(184, 'ODHAV', NULL, NULL),
(185, 'CHANDARADA', NULL, NULL),
(186, 'BUDASAN', NULL, NULL),
(187, 'GANDHINAGAR', NULL, NULL),
(188, 'ADALAJ', NULL, NULL),
(189, 'DISA', NULL, NULL),
(190, 'DHANERA', NULL, NULL),
(191, 'RADHANPUR', NULL, NULL),
(192, 'SAMI', NULL, NULL),
(193, 'HARIJ', NULL, NULL),
(194, 'BECHARAJI', NULL, NULL),
(195, 'THARAD', NULL, NULL),
(196, 'THARA', NULL, NULL),
(197, 'UNAVA', NULL, NULL),
(198, 'MANSA', NULL, NULL),
(199, 'GOZARIYA', NULL, NULL),
(200, 'THAN', NULL, NULL),
(201, 'MULI', NULL, NULL),
(202, 'RANPUR', NULL, NULL),
(203, 'CHUDA', NULL, NULL),
(204, 'RAJPIPLA', NULL, NULL),
(205, 'PAVAGADH', NULL, NULL),
(206, 'KARJAN', NULL, NULL),
(207, 'PALEJ(BHARUCH)', NULL, NULL),
(208, 'PALIYAD', NULL, NULL),
(209, 'BARVADA', NULL, NULL),
(210, 'GADHADA', NULL, NULL),
(211, 'VINCHIYA', NULL, NULL),
(212, 'PRANCHI', NULL, NULL),
(213, 'MALIYA HATINA', NULL, NULL),
(214, 'MANDALI', NULL, NULL),
(215, 'KHAVDI(JAMNAGAR)', NULL, NULL),
(216, 'KOTHA', NULL, NULL),
(217, 'kathlal', NULL, NULL),
(218, 'Bandish', '2016-08-07 00:00:00', NULL),
(219, 'bandish', '2016-08-07 00:00:00', NULL),
(220, '123', '2016-08-07 00:00:00', NULL),
(221, 'jamnapur', '2016-08-07 00:00:00', NULL),
(222, 'bandish', '2016-08-07 00:00:00', NULL),
(223, 'elice bridge', '2016-08-07 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `client_address` longtext NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `client_place` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client_name`, `client_address`, `contact_person`, `contact_no`, `email_address`, `client_place`, `reg_date`, `created`, `modified`) VALUES
(3, 'British super alloys ', 'Opp.jalaram temple ,village: ankhol, kadi-chhtral road,kadi', 'Nandlal', '9375797143', '', 3, '0000-00-00', NULL, NULL),
(4, 'Shree balram rolling mill pvt ltd', 'Opp.Surya cot paper mill , village:vamaj , kalol road', 'kaushalbhai', '9825413342', '', 0, '0000-00-00', NULL, NULL),
(5, 'Vimal oil & foods ltd', 'Near railway crossing,palavasna,mehsana', 'Asvinbhai patel', '9925205142', '', 0, '0000-00-00', NULL, NULL),
(6, 'Gresh casting ltd', 'Opp.ramdevpir mandir , karannagar ,kadi - chhtral road .', 'Mohitbhai', '9898107101', '', 0, '0000-00-00', NULL, NULL),
(7, 'Someshvar ispat pvt ltd', 'Opp.Sanku water park , village : Baliyasan,ahmedabad-mehsana highway.', 'Chandresh', '9099006252', '', 0, '0000-00-00', NULL, NULL),
(8, 'Vivek steel ', 'Opp.Bhagyoday hotel , chongodar,sarkhej-bavla highway.', 'Darshanbhai', '9879750883', '', 0, '0000-00-00', NULL, NULL),
(9, 'Adani indusries', 'Near,Tulsi petrol pump,karannagar,kadi-chhtral road.', 'Dilipbhai', '9825446976', '', 0, '0000-00-00', NULL, NULL),
(10, 'Asian tubes ltd', 'CR Devision , chhtral,Ahmedabad-mehsana highway.', 'Tiwari sir', '9978900683', '', 0, '0000-00-00', NULL, NULL),
(11, 'vivan steel', 'opp.sahyog hotel,bavla,bavla-bagodara highway.', 'patel sir', '9909006967', '', 0, '0000-00-00', NULL, NULL),
(12, 'Madhusudan steel', 'Near:railway crossing,bavla', 'santrambhai', '8469300001', '', 0, '0000-00-00', NULL, NULL),
(13, 'Shree rangam packing', 'ashoknagar', 'jugalbhai', '9712916648', '', 0, '0000-00-00', NULL, NULL),
(14, 'hi-tech pipe', 'behind:neno company,village:borgam', 'patel', '9925008798', '', 0, '0000-00-00', NULL, NULL),
(15, 'N K Protins', 'village: thol , kadi-sanand road,', 'vagela sir', '9825957049', '', 0, '0000-00-00', NULL, NULL),
(16, 'crystal ceramics', 'village:kaiyal,ta-kadi,dist-mehsana', 'joshibhai', '9377068501', '', 0, '0000-00-00', NULL, NULL),
(17, 'marbolite ceramics', 'village; palej,bechraji-mehsana highway', 'Hemantbhai ', '9825043904', '', 0, '0000-00-00', NULL, NULL),
(18, 'steel house', 'V S P godown,sarkhej,ahmedabad', '', '9825804795', '', 0, '0000-00-00', NULL, NULL),
(19, 'Gujrat ambuja export ltd', 'kadi-thol road,kadi', 'Rakeshbhai', '9825804302', '', 0, '0000-00-00', NULL, NULL),
(20, 'GROMER FEET', '', 'XXX', '8888888888', 'ABC@123.AC', 0, '0000-00-00', '2016-02-05 07:13:21', '2016-02-05 07:13:21'),
(21, '', '', '', '', '', 0, '0000-00-00', '2016-02-23 10:10:03', '2016-02-23 10:10:03'),
(30, 'TEST', 'Viramgam', 'BRIJESH', '9974053909', 'BRIJ_SHIVAM1987@YAHOO.COM', 29, '0000-00-00', '2016-04-05 13:12:51', '2016-04-05 13:12:51'),
(31, 'TEST', 'test address', 'BRIJESH', '9974053909', 'BRIJ@YAHOO.COM', 29, '0000-00-00', '2016-04-05 13:19:25', '2016-04-05 13:19:25'),
(32, 'Shree balram rolling mill pvt ltd', 'Opp.Surya cot paper mill , village:vamaj , kalol road', 'kaushalbhai', '9825413342', 'TEST@XYZ.COM', 20, '0000-00-00', '2016-04-05 13:35:17', '2016-04-05 13:35:17'),
(33, 'Gujrat ambuja export ltd', 'kadi-thol road,kadi', 'Rakeshbhai', '9825804302', 'TEST@XYZ.COM', 20, '0000-00-00', '2016-04-05 13:35:50', '2016-04-05 13:35:50'),
(34, 'Gujrat ambuja export ltd', 'kadi-thol road,kadi', 'Rakeshbhai', '9825804302', 'TEST@XYZ.COM', 15, '0000-00-00', '2016-04-05 13:36:20', '2016-04-05 13:36:20'),
(35, 'Shree balram rolling mill pvt ltd', 'Opp.Surya cot paper mill , village:vamaj , kalol road', 'kaushalbhai', '9825413342', '', 19, '0000-00-00', '2016-05-30 16:45:01', '2016-05-30 16:45:01'),
(36, 'Vimal oil & foods ltd', 'Near railway crossing,palavasna,mehsana', 'Asvinbhai patel', '9925205142', '', 9, '0000-00-00', '2016-05-30 16:45:38', '2016-05-30 16:45:38'),
(37, 'Vimal oil & foods ltd', 'Near railway crossing,palavasna,mehsana', 'Asvinbhai patel', '9925205142', '', 15, '0000-00-00', '2016-05-30 16:47:25', '2016-05-30 16:47:25'),
(40, 'Manoj& company', '', '', '', '', 68, '2016-07-01', NULL, NULL),
(41, 'bandish', '', '', '', '', 3, '2016-07-07', NULL, NULL),
(42, 'bandish', '', '', '', '', 3, '2016-07-07', NULL, NULL),
(43, 'bandish', '', '', '', '', 3, '2016-07-07', NULL, NULL),
(44, 'bandish', '', '', '', '', 3, '2016-07-07', NULL, NULL),
(45, 'bandish', '', '', '', '', 3, '2016-07-07', NULL, NULL),
(46, 'bandish', '', '', '', '', 3, '2016-07-07', NULL, NULL),
(47, 'bandish', '', '', '', '', 3, '2016-07-07', NULL, NULL),
(48, 'bandsih', 'ashram road', 'bandsih', '9924234', 'bands@asd.as', 4, '2016-07-08', '2016-07-08 00:00:00', NULL),
(49, '', '', '', '', '', 0, '2016-07-08', '2016-07-08 00:00:00', NULL),
(50, '', '', '', '', '', 0, '2016-07-08', '2016-07-08 00:00:00', NULL),
(51, '', '', '', '', '', 0, '2016-07-08', '2016-07-08 00:00:00', NULL),
(52, 'SwaggerUnit', 'Ashram Road', 'Bandsih', '9913176151', 'bandish@swaggerunit.com', 68, '2016-07-08', '2016-07-08 00:00:00', NULL),
(53, 'SwaggerUnit', 'Ashram Road', 'Bandsih', '9913176151', 'bandish@swaggerunit.com', 68, '2016-07-08', '2016-07-08 00:00:00', NULL),
(54, 'SwaggerUnit', 'Ashram Road', 'Bandsih', '9913176151', 'bandish@swaggerunit.com', 68, '2016-07-08', '2016-07-08 00:00:00', NULL),
(55, 'SwaggerUnit', 'Ashram Road', 'Bandsih', '9913176151', 'bandish@swaggerunit.com', 68, '2016-07-08', '2016-07-08 00:00:00', NULL),
(56, 'SwaggerUnit', 'Ashram Road', 'Bandsih', '9913176151', 'bandish@swaggerunit.com', 68, '2016-07-08', '2016-07-08 00:00:00', NULL),
(57, 'Bandish', 'Bandish', 'Bandsih', '99999999', 'bandish@swaggerunit.com', 1, '2016-07-09', '2016-07-09 00:00:00', NULL),
(58, 'Advotek Ceramic', '', '', '', '', 126, '2016-07-09', NULL, NULL),
(59, 'golf ceramics', '', '', '', '', 180, '2016-07-10', NULL, NULL),
(60, 'polo ceramic', '', '', '', '', 4, '2016-07-10', NULL, NULL),
(61, 'akik ciramic', '', '', '', '', 5, '2016-07-23', NULL, NULL),
(62, 'somani ciramic', '', '', '', '', 4, '2016-07-23', NULL, NULL),
(63, 'Brixo industries', '', '', '', '', 2, '2016-08-07', NULL, NULL),
(64, 'maruti protins', '', '', '', '', 2, '2016-08-07', NULL, NULL),
(65, 'Gomar fit', '', '', '', '', 216, '2016-08-07', NULL, NULL),
(66, 'Balaram rolling mill', '', '', '', '', 19, '2016-08-07', NULL, NULL),
(67, 'Aspl Ind', '', '', '', '', 182, '2016-08-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_register`
--

CREATE TABLE IF NOT EXISTS `driver_register` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `licenseno` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `driver_register`
--

INSERT INTO `driver_register` (`id`, `driver_name`, `mobileno`, `licenseno`, `image`, `document`, `created`, `modified`) VALUES
(1, '', '', '', '', '', NULL, NULL),
(2, '', '9601688561', '', '', '', NULL, NULL),
(3, '', '', '', '', '', NULL, NULL),
(4, '', '', '', '', '', NULL, NULL),
(5, 'Dinesh', '8530906104', '', '', '', NULL, NULL),
(6, 'NITIN', '7600215120', '', '', '', NULL, '2016-07-23 15:04:01'),
(7, '', '', '', '', '', NULL, NULL),
(8, 'chirag', '9979899901', '', '', '', NULL, NULL),
(9, '', '', '', '', '', NULL, NULL),
(10, '', '', '', '', '', NULL, NULL),
(11, '', '', '', '', '', NULL, NULL),
(12, '', '', '', '', '', NULL, NULL),
(13, '', '', '', '', '', NULL, NULL),
(14, '', '9601990428', '', '', '', NULL, NULL),
(15, '', '9909552071', '', '', '', NULL, NULL),
(16, '', '8980084212', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_transactions`
--

CREATE TABLE IF NOT EXISTS `driver_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_amount` float(11,2) NOT NULL,
  `payable_amount` float(11,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-Unpaid,1-Paid',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lr_no` varchar(50) NOT NULL,
  `order_generation_date` date NOT NULL,
  `order_type` tinyint(1) NOT NULL,
  `payment_by` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 For Client / 1 for Party',
  `client_id` int(11) NOT NULL,
  `order_city` int(11) NOT NULL,
  `from_city` int(11) NOT NULL,
  `to_city` int(11) NOT NULL,
  `meterial` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `actual_qty` varchar(255) DEFAULT NULL,
  `truck_fright` varchar(255) NOT NULL,
  `truck_owner_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `truck_id` int(11) DEFAULT NULL,
  `commision` varchar(255) NOT NULL,
  `advance_pay` varchar(255) NOT NULL,
  `order_completion_date` datetime DEFAULT NULL,
  `completed_by` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `lr_no`, `order_generation_date`, `order_type`, `payment_by`, `client_id`, `order_city`, `from_city`, `to_city`, `meterial`, `qty`, `actual_qty`, `truck_fright`, `truck_owner_id`, `driver_id`, `truck_id`, `commision`, `advance_pay`, `order_completion_date`, `completed_by`, `note`, `status`, `created`, `modified`) VALUES
(1, '4602', '2016-07-03', 0, 0, 58, 126, 0, 46, 'Cilicate', '20', 'NULL', '300', 1, 1, 1, '200', '', NULL, '', '', 1, '2016-07-09 00:00:00', NULL),
(3, '4786', '2016-07-09', 1, 0, 60, 4, 0, 89, 'staels', '12', 'NULL', '800/-', 3, 3, 3, '300', '', NULL, '', '', 1, NULL, NULL),
(5, '5225', '2016-07-18', 0, 0, 7, 7, 7, 29, '', '30', 'NULL', '450', 5, 5, 5, '300', '4500', NULL, '', '', 1, '2016-07-22 00:00:00', '2016-07-22 21:03:50'),
(6, '5201', '2016-07-18', 0, 0, 61, 5, 5, 21, 'tiles', '12', 'NULL', '300', 6, 6, 6, '200', '', NULL, '', '', 1, '2016-07-23 00:00:00', '2016-07-23 15:04:01'),
(7, '5202', '2016-07-18', 1, 1, 62, 4, 0, 152, 'tiles', '14', 'NULL', '715', 7, 7, 7, '300', '', NULL, '', '', 1, NULL, NULL),
(8, '5401', '2016-07-24', 0, 0, 63, 2, 0, 223, 'blok', '16', 'NULL', '280', 8, 8, 8, '300', '2000', NULL, '', '', 1, '2016-08-07 00:00:00', NULL),
(9, '5402', '2016-07-24', 1, 0, 64, 2, 0, 54, 'oil', '10', 'NULL', '500', 9, 9, 9, '200', '', NULL, '', '', 1, NULL, NULL),
(10, '5403', '2016-07-24', 1, 0, 65, 216, 216, 51, 'fit', '24', 'NULL', '370', 10, 10, 10, '300', '', NULL, '', '', 1, NULL, '2016-08-07 19:42:24'),
(11, '5404', '2016-07-24', 1, 0, 65, 216, 0, 51, 'fit', '20', 'NULL', '370', 11, 11, 11, '300', '', NULL, '', '', 1, NULL, NULL),
(12, '5405', '2016-07-24', 0, 0, 58, 126, 0, 46, 'fit', '20', 'NULL', '300', 12, 12, 12, '200', '', NULL, '', '', 1, '2016-08-07 00:00:00', NULL),
(13, '5406', '2016-07-24', 0, 0, 58, 126, 0, 46, 'fit', '20', 'NULL', '300', 13, 13, 13, '200', '', NULL, '', '', 1, '2016-08-07 00:00:00', NULL),
(14, '5407', '2016-07-24', 1, 0, 66, 19, 0, 26, 'iron', '16', 'NULL', '300', 14, 14, 14, '300', '', NULL, '', '', 1, NULL, NULL),
(15, '5408', '2016-07-24', 0, 0, 67, 182, 182, 23, 'koyal', '16', 'NULL', '370', 15, 15, 15, '300', '', NULL, '', '', 1, '2016-08-07 00:00:00', '2016-08-07 20:28:33'),
(16, '5409', '2016-07-24', 0, 0, 67, 182, 0, 35, 'koyal', '16', 'NULL', '370', 16, 16, 16, '300', '', NULL, '', '', 1, '2016-08-07 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_transactions`
--

CREATE TABLE IF NOT EXISTS `order_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `total_amount` float(11,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-Unpaid,1-Paid',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_transport_freight`
--

CREATE TABLE IF NOT EXISTS `order_transport_freight` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `order_id` int(5) NOT NULL,
  `party_id` int(5) NOT NULL,
  `transport_freight` varchar(255) NOT NULL,
  `weight` int(4) NOT NULL,
  `actual_weight` int(4) NOT NULL,
  `note` varchar(25) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `order_transport_freight`
--

INSERT INTO `order_transport_freight` (`id`, `order_id`, `party_id`, `transport_freight`, `weight`, `actual_weight`, `note`, `created`, `modified`) VALUES
(1, 1, 1, '370', 20, 0, '', '2016-07-09 00:00:00', '2016-07-09 00:00:00'),
(2, 2, 2, '600/-', 10, 0, '', '2016-07-10 00:00:00', '2016-07-10 00:00:00'),
(3, 3, 3, '850', 12, 0, '', '2016-07-10 00:00:00', '2016-07-10 00:00:00'),
(4, 3, 4, '', 0, 0, '', '2016-07-10 00:00:00', '2016-07-10 00:00:00'),
(5, 4, 1, '20', 370, 0, '', '2016-07-10 00:00:00', '2016-07-10 00:00:00'),
(6, 9, 5, '550', 10, 0, '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(7, 10, 6, '475', 24, 0, '', '2016-08-07 00:00:00', '2016-08-07 19:42:52'),
(8, 10, 0, '475', 0, 0, '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(9, 11, 7, '475', 20, 0, '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(10, 12, 8, '370', 20, 0, '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(11, 13, 9, '370', 20, 0, '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(12, 14, 10, '425', 16, 0, '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(13, 15, 11, '450', 0, 0, '', '2016-08-07 00:00:00', '2016-08-07 20:29:11'),
(14, 15, 12, '450', 0, 0, '', '2016-08-07 00:00:00', '2016-08-07 20:28:33'),
(15, 15, 0, '450', 0, 0, '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(16, 16, 13, '450', 16, 0, '', '2016-08-07 00:00:00', '2016-08-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE IF NOT EXISTS `party` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `party_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `party_place` int(11) NOT NULL,
  `client_id` int(5) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `party_name`, `address`, `contact_person`, `contact_no`, `email_address`, `party_place`, `client_id`, `created`, `modified`) VALUES
(1, 'Madhu Cilika', '', '', '', '', 46, 0, NULL, NULL),
(2, 'jonson', '', '', '', '', 51, 0, NULL, NULL),
(3, 'anmol ceramic', '', '', '', '', 89, 0, NULL, NULL),
(4, '', '', '', '', '', 0, 0, NULL, NULL),
(5, '', '', '', '', '', 54, 0, NULL, NULL),
(6, '', '', '', '', '', 51, 0, NULL, NULL),
(7, '', '', '', '', '', 51, 0, NULL, NULL),
(8, 'madhu silika', '', '', '', '', 46, 0, NULL, NULL),
(9, 'madhu silika', '', '', '', '', 46, 0, NULL, NULL),
(10, 'mahesvari steel', '', '', '', '', 26, 0, NULL, NULL),
(11, '', '', '', '', '', 23, 0, NULL, NULL),
(12, '', '', '', '', '', 35, 0, NULL, NULL),
(13, '', '', '', '', '', 35, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `pair` text NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `pair`, `description`, `created`, `modified`) VALUES
(1, 'SHOW_ROWS_PER_PAGE', '10', '', '2015-12-05 00:00:00', '2015-12-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `truck`
--

CREATE TABLE IF NOT EXISTS `truck` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `truck_number` varchar(255) NOT NULL,
  `chassis_no` varchar(255) NOT NULL,
  `engine_no` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `truck_owner_id` int(5) NOT NULL,
  `rcbook` longtext NOT NULL,
  `permit` longtext NOT NULL,
  `insurance` longtext NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `truck`
--

INSERT INTO `truck` (`id`, `truck_number`, `chassis_no`, `engine_no`, `note`, `truck_owner_id`, `rcbook`, `permit`, `insurance`, `created`, `modified`) VALUES
(1, 'GJ.BT.8947', '', '', '', 0, '', '', '', NULL, NULL),
(2, 'Gj.13.at.7217', '', '', '', 0, '', '', '', NULL, NULL),
(3, 'gj.18.ax.2408', '', '', '', 0, '', '', '', NULL, NULL),
(4, 'gj.4x.6402', '', '', '', 0, '', '', '', NULL, NULL),
(5, 'gj.01.dx.6193', '', '', '', 0, '', '', '', NULL, NULL),
(6, 'GJ1AY4721', '', '', '', 0, '', '', '', NULL, NULL),
(7, 'GJ25T9779', '', '', '', 0, '', '', '', NULL, NULL),
(8, 'gj.4v.7180', '', '', '', 0, '', '', '', NULL, NULL),
(9, 'gj.13w.8522', '', '', '', 0, '', '', '', NULL, NULL),
(10, 'Gj.36t.2011', '', '', '', 0, '', '', '', NULL, NULL),
(11, 'Gj.1cz.6556', '', '', '', 0, '', '', '', NULL, NULL),
(12, 'Gj.4x.7102', '', '', '', 0, '', '', '', NULL, NULL),
(13, 'gj.3v.1786', '', '', '', 0, '', '', '', NULL, NULL),
(14, 'gj.3w.7921', '', '', '', 0, '', '', '', NULL, NULL),
(15, 'gj.3at.1963', '', '', '', 0, '', '', '', NULL, NULL),
(16, 'gj.12x.1560', '', '', '', 0, '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `truck_owner`
--

CREATE TABLE IF NOT EXISTS `truck_owner` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `owner_name` varchar(255) NOT NULL,
  `city_id` int(5) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `truck_owner`
--

INSERT INTO `truck_owner` (`id`, `owner_name`, `city_id`, `contact_no`, `address`, `created`, `modified`) VALUES
(1, '', 0, '', '', '2016-07-09 00:00:00', '2016-07-09 00:00:00'),
(2, 'alpeshbhai', 51, '9925954655', '', '2016-07-10 00:00:00', '2016-07-10 00:00:00'),
(3, '', 0, '', '', '2016-07-10 00:00:00', '2016-07-10 00:00:00'),
(4, '', 0, '', '', '2016-07-10 00:00:00', '2016-07-10 00:00:00'),
(5, '', 68, '', '', '2016-07-22 00:00:00', '2016-07-22 21:03:51'),
(6, 'NITIN', 4, '7600215120', '', '2016-07-23 00:00:00', '2016-07-23 15:04:01'),
(7, 'Bhurakaka', 152, '9099171190', '', '2016-07-23 00:00:00', '2016-07-23 00:00:00'),
(8, 'sankar', 4, '9879763244', '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(9, '', 0, '', '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(10, '', 0, '', '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(11, '', 0, '', '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(12, '', 0, '', '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(13, '', 0, '', '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(14, '', 0, '', '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(15, '', 0, '', '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(16, '', 0, '', '', '2016-08-07 00:00:00', '2016-08-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `uc_configuration`
--

CREATE TABLE IF NOT EXISTS `uc_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `uc_configuration`
--

INSERT INTO `uc_configuration` (`id`, `name`, `value`) VALUES
(1, 'website_name', 'Transport Syatem'),
(2, 'website_url', 'localhost/'),
(3, 'email', 'noreply@ILoveUserCake.com'),
(4, 'activation', 'false'),
(5, 'resend_activation_threshold', '0'),
(6, 'language', 'models/languages/en.php'),
(7, 'template', 'models/site-templates/default.css');

-- --------------------------------------------------------

--
-- Table structure for table `uc_pages`
--

CREATE TABLE IF NOT EXISTS `uc_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(150) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `uc_pages`
--

INSERT INTO `uc_pages` (`id`, `page`, `private`) VALUES
(1, 'account.php', 1),
(2, 'activate-account.php', 0),
(3, 'admin_configuration.php', 1),
(4, 'admin_page.php', 1),
(5, 'admin_pages.php', 1),
(6, 'admin_permission.php', 1),
(7, 'admin_permissions.php', 1),
(8, 'admin_user.php', 1),
(9, 'admin_users.php', 1),
(10, 'forgot-password.php', 0),
(11, 'index.php', 0),
(12, 'left-nav.php', 0),
(13, 'login.php', 0),
(14, 'logout.php', 1),
(15, 'register.php', 0),
(16, 'resend-activation.php', 0),
(17, 'user_settings.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uc_permissions`
--

CREATE TABLE IF NOT EXISTS `uc_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uc_permissions`
--

INSERT INTO `uc_permissions` (`id`, `name`) VALUES
(1, 'New Member'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `uc_permission_page_matches`
--

CREATE TABLE IF NOT EXISTS `uc_permission_page_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `uc_permission_page_matches`
--

INSERT INTO `uc_permission_page_matches` (`id`, `permission_id`, `page_id`) VALUES
(1, 1, 1),
(2, 1, 14),
(3, 1, 17),
(4, 2, 1),
(5, 2, 3),
(6, 2, 4),
(7, 2, 5),
(8, 2, 6),
(9, 2, 7),
(10, 2, 8),
(11, 2, 9),
(12, 2, 14),
(13, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `uc_users`
--

CREATE TABLE IF NOT EXISTS `uc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(150) NOT NULL,
  `activation_token` varchar(225) NOT NULL,
  `last_activation_request` int(11) NOT NULL,
  `lost_password_request` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(150) NOT NULL,
  `sign_up_stamp` int(11) NOT NULL,
  `last_sign_in_stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `uc_users`
--

INSERT INTO `uc_users` (`id`, `user_name`, `display_name`, `password`, `email`, `activation_token`, `last_activation_request`, `lost_password_request`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp`) VALUES
(1, 'admin', 'admin', '143f598a045e56757d810c005670e8db1a65155406daa45688cca0326a2719e44', 'admin@gmail.com', 'd2bf99fe505a2acec898468e25bedd57', 1467223497, 1, 1, 'New Member', 1467223497, 1467223511),
(2, 'janak', 'janak', 'd474e18d75bd6c63018f690656c5399faa9f2548d921a6a6b3687b48e43cdf706', 'bsnfid@klj.sd', 'd0df51b0022bf464ff113eadbd3fe829', 1468080303, 0, 1, 'New Member', 1468080303, 1470574899);

-- --------------------------------------------------------

--
-- Table structure for table `uc_user_permission_matches`
--

CREATE TABLE IF NOT EXISTS `uc_user_permission_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `uc_user_permission_matches`
--

INSERT INTO `uc_user_permission_matches` (`id`, `user_id`, `permission_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
