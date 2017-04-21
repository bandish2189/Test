-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2016 at 08:18 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swaggeru_trans2`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `cash_vouchers`
--

INSERT INTO `cash_vouchers` (`id`, `order_id`, `type`, `amount`, `received_by`, `status`, `truck_id`, `owner_id`, `created`, `modified`) VALUES
(8, 5, 0, 5500.00, '', 0, 5, 5, '2016-07-22 20:46:34', '2016-07-22 20:46:34'),
(9, 8, 0, 2000.00, '', 0, 8, 8, '2016-08-07 19:18:29', '2016-08-07 19:18:29'),
(10, 109, 0, 4500.00, '', 0, 109, 109, '2016-08-11 19:38:21', '2016-08-11 19:38:21');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=237 ;

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
(223, 'elice bridge', '2016-08-07 00:00:00', NULL),
(224, 'Sahibag', '2016-08-10 00:00:00', NULL),
(225, 'KOSAMBA', '2016-08-10 00:00:00', NULL),
(226, 'JAMNAGRER', '2016-08-10 00:00:00', NULL),
(227, 'JAMNAGER', '2016-08-10 00:00:00', NULL),
(228, 'SANJELI', '2016-08-11 00:00:00', NULL),
(229, 'gred bagasara', '2016-08-11 00:00:00', NULL),
(230, 'TRABA', '2016-08-11 00:00:00', NULL),
(231, 'DEVGHADH BARIYA', '2016-08-11 00:00:00', NULL),
(232, 'DHAGADRA', '2016-08-11 00:00:00', NULL),
(233, 'JALOD', '2016-08-11 00:00:00', NULL),
(234, 'LAL DARVAJA', '2016-08-11 00:00:00', NULL),
(235, 'NIKOL', '2016-08-11 00:00:00', NULL),
(236, 'aaa', '2016-10-24 00:00:00', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

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
(67, 'Aspl Ind', '', '', '', '', 182, '2016-08-07', NULL, NULL),
(68, 'Shree Nath Ciramic', '', '', '', '', 11, '2016-08-10', NULL, NULL),
(69, 'shelali pepar mil', '', '', '', '', 1, '2016-08-10', NULL, NULL),
(70, 'HAITEM CRIMICE', '', '', '', '', 4, '2016-08-10', NULL, NULL),
(71, 'VANARAJ BHAI', '', '', '', '', 4, '2016-08-10', NULL, NULL),
(72, 'PESEFIK CREMICE', '', '', '', '', 182, '2016-08-10', NULL, NULL),
(73, 'RANI IND', '', '', '', '', 38, '2016-08-10', NULL, NULL),
(74, 'TEJAS PAPER MILL', '', '', '', '', 10, '2016-08-10', NULL, NULL),
(75, 'SENAGRES CERAMICE', '', '', '', '', 5, '2016-08-11', NULL, NULL),
(76, 'JALARAM CIRAMIK', '', '', '', '', 182, '2016-08-11', NULL, NULL),
(77, 'Jivan aegro', '', '', '', '', 1, '2016-08-11', NULL, NULL),
(78, 'Mep Oil Mill', '', '', '', '', 4, '2016-08-11', NULL, NULL),
(79, 'KRISTAL Ceramic', '', '', '', '', 12, '2016-08-11', NULL, NULL),
(80, 'Jay Tripadhi ltd', '', '', '', '', 183, '2016-08-11', NULL, NULL),
(81, 'Agraval Rolling mill', '', '', '', '', 15, '2016-08-11', NULL, NULL),
(82, ' Ambuja Protins ltd', '', '', '', '', 4, '2016-08-11', NULL, NULL),
(83, 'Ajita Ceramic', '', '', '', '', 6, '2016-08-11', NULL, NULL),
(84, 'SREE NATHA CERAMIC', '', '', '', '', 11, '2016-08-11', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

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
(16, '', '8980084212', '', '', '', NULL, NULL),
(17, '', '', '', '', '', NULL, NULL),
(18, '', '9558921946', '', '', '', NULL, NULL),
(19, '', '8347014181', '', '', '', NULL, NULL),
(20, '', '9687424213', '', '', '', NULL, NULL),
(21, '', '8980534307', '', '', '', NULL, NULL),
(22, '', '', '', '', '', NULL, NULL),
(23, '', '8128483905', '', '', '', NULL, NULL),
(24, '', '', '', '', '', NULL, NULL),
(25, '', '', '', '', '', NULL, NULL),
(26, '', '9558564732', '', '', '', NULL, NULL),
(27, '', '9558564732', '', '', '', NULL, NULL),
(28, '', '8128447263', '', '', '', NULL, NULL),
(29, '', '', '', '', '', NULL, NULL),
(30, '', '', '', '', '', NULL, NULL),
(31, '', '', '', '', '', NULL, NULL),
(32, '', '', '', '', '', NULL, NULL),
(33, '', '', '', '', '', NULL, NULL),
(34, '', '', '', '', '', NULL, NULL),
(35, '', '', '', '', '', NULL, NULL),
(36, '', '', '', '', '', NULL, NULL),
(37, '', '', '', '', '', NULL, NULL),
(38, '', '', '', '', '', NULL, NULL),
(39, '', '9825091055', '', '', '', NULL, NULL),
(40, '', '906786160', '', '', '', NULL, NULL),
(41, '', '', '', '', '', NULL, NULL),
(42, '', '', '', '', '', NULL, NULL),
(43, '', '9099171190', '', '', '', NULL, NULL),
(44, '', '9574992816', '', '', '', NULL, NULL),
(45, '', '9227702140', '', '', '', NULL, NULL),
(46, '', '9427792217', '', '', '', NULL, NULL),
(47, '', '8511688826', '', '', '', NULL, NULL),
(48, '', '', '', '', '', NULL, NULL),
(49, '', '9737948390', '', '', '', NULL, NULL),
(50, '', '9601743564', '', '', '', NULL, NULL),
(51, '', '9726915341', '', '', '', NULL, NULL),
(52, '', '9726723968', '', '', '', NULL, NULL),
(53, '', '9825932001', '', '', '', NULL, NULL),
(54, '', '', '', '', '', NULL, NULL),
(55, '', '', '', '', '', NULL, NULL),
(56, '', '', '', '', '', NULL, NULL),
(57, '', '', '', '', '', NULL, NULL),
(58, '', '', '', '', '', NULL, NULL),
(59, '', '', '', '', '', NULL, NULL),
(60, '', '', '', '', '', NULL, NULL),
(61, '', '', '', '', '', NULL, NULL),
(62, '', '', '', '', '', NULL, NULL),
(63, '', '', '', '', '', NULL, NULL),
(64, '', '', '', '', '', NULL, NULL),
(65, '', '', '', '', '', NULL, NULL),
(66, '', '', '', '', '', NULL, NULL),
(67, '', '', '', '', '', NULL, NULL),
(68, '', '9979381915', '', '', '', NULL, NULL),
(69, '', '9909582042', '', '', '', NULL, NULL),
(70, '', '9723383333', '', '', '', NULL, NULL),
(71, '', '', '', '', '', NULL, NULL),
(72, '', '', '', '', '', NULL, NULL),
(73, '', '', '', '', '', NULL, NULL),
(74, '', '', '', '', '', NULL, NULL),
(75, '', '', '', '', '', NULL, NULL),
(76, '', '', '', '', '', NULL, NULL),
(77, '', '', '', '', '', NULL, NULL),
(78, '', '', '', '', '', NULL, NULL),
(79, '', '9173284056', '', '', '', NULL, NULL),
(80, '', '9726959497', '', '', '', NULL, NULL),
(81, '', '9925974001', '', '', '', NULL, NULL),
(82, '', '', '', '', '', NULL, NULL),
(83, '', '', '', '', '', NULL, NULL),
(84, '', '', '', '', '', NULL, NULL),
(85, '', '9099482647', '', '', '', NULL, NULL),
(86, '', '9725528756', '', '', '', NULL, NULL),
(87, '', '', '', '', '', NULL, NULL),
(88, '', '9879650166', '', '', '', NULL, NULL),
(89, '', '', '', '', '', NULL, NULL),
(90, '', '', '', '', '', NULL, NULL),
(91, '', '9909894323', '', '', '', NULL, NULL),
(92, '', '9662909754', '', '', '', NULL, NULL),
(93, '', '9712417521', '', '', '', NULL, NULL),
(94, '', '9594218614', '', '', '', NULL, NULL),
(95, '', '9624815002', '', '', '', NULL, NULL),
(96, '', '', '', '', '', NULL, NULL),
(97, '', '', '', '', '', NULL, NULL),
(98, '', '', '', '', '', NULL, NULL),
(99, '', '', '', '', '', NULL, NULL),
(100, '', '', '', '', '', NULL, NULL),
(101, '', '', '', '', '', NULL, NULL),
(102, '', '9714936009', '', '', '', NULL, NULL),
(103, '', '', '', '', '', NULL, NULL),
(104, '', '', '', '', '', NULL, NULL),
(105, '', '', '', '', '', NULL, NULL),
(106, '', '', '', '', '', NULL, NULL),
(107, '', '', '', '', '', NULL, NULL),
(108, '', '', '', '', '', NULL, NULL),
(109, '', '', '', '', '', NULL, NULL),
(110, '', '9825525523', '', '', '', NULL, NULL),
(111, '', '', '', '', '', NULL, NULL),
(112, '', '9978416046', '', '', '', NULL, NULL),
(113, '', '9408479093', '', '', '', NULL, NULL),
(114, '', '9712347775', '', '', '', NULL, NULL),
(115, '', '9904331715', '', '', '', NULL, NULL),
(116, '', '', '', '', '', NULL, NULL),
(117, '', '', '', '', '', NULL, NULL),
(118, '', '', '', '', '', NULL, NULL),
(119, '', '', '', '', '', NULL, NULL),
(120, '', '', '', '', '', NULL, NULL),
(121, '', '', '', '', '', NULL, NULL),
(122, '', '', '', '', '', NULL, NULL),
(123, '', '', '', '', '', NULL, NULL),
(124, '', '', '', '', '', NULL, NULL),
(125, 'dinesh', '', '', '', '', NULL, NULL),
(126, '', '', '', '', '', NULL, NULL),
(127, '', '', '', '', '', NULL, NULL),
(128, '', '', '', '', '', NULL, NULL),
(129, '', '', '', '', '', NULL, NULL),
(130, '', '', '', '', '', NULL, NULL),
(131, '', '', '', '', '', NULL, NULL),
(132, '', '', '', '', '', NULL, NULL),
(133, '', '', '', '', '', NULL, NULL),
(134, '', '', '', '', '', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

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
(16, '5409', '2016-07-24', 0, 0, 67, 182, 0, 35, 'koyal', '16', 'NULL', '370', 16, 16, 16, '300', '', NULL, '', '', 1, '2016-08-07 00:00:00', NULL),
(17, '5410', '2016-07-25', 1, 0, 6, 2, 0, 23, 'raundbar', '10', 'NULL', '475', 17, 17, 17, '200', '', NULL, '', '', 1, NULL, NULL),
(18, '5411', '2016-07-25', 1, 0, 15, 20, 0, 58, 'OIL', '', 'NULL', '450', 18, 18, 18, '300', '', NULL, '', '', 1, NULL, NULL),
(19, '5412', '2016-07-25', 0, 0, 68, 11, 0, 46, 'fit', '20', 'NULL', '320', 19, 19, 19, '200', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(20, '5411', '2016-07-25', 1, 0, 69, 1, 0, 26, 'pepar roll', '12', 'NULL', '330', 20, 20, 20, '200', '', NULL, '', '', 1, NULL, NULL),
(21, '5414', '2016-07-25', 0, 0, 6, 2, 0, 124, 'raundbar', '12', 'NULL', '800', 21, 21, 21, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(22, '5415', '2016-07-25', 0, 0, 67, 182, 0, 35, 'Koyal', '14', 'NULL', '392', 22, 22, 22, '200', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(23, '5416', '2016-07-25', 1, 0, 19, 4, 0, 51, 'khol', '20', 'NULL', '370', 23, 23, 23, '300', '', NULL, '', '', 1, NULL, NULL),
(24, '5417', '2016-07-25', 0, 0, 7, 7, 0, 32, 'TMT', '16', 'NULL', '700', 24, 24, 24, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(25, '5418', '2016-07-25', 0, 0, 58, 126, 0, 46, 'fit', '20', 'NULL', '300', 25, 25, 25, '200', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(26, '5419', '2016-07-25', 0, 0, 6, 2, 0, 36, 'raundbar', '11', 'NULL', '500', 26, 26, 26, '150', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(27, '5419/1', '2016-07-25', 0, 0, 66, 19, 0, 36, 'raundbar', '10', 'NULL', '500', 27, 27, 27, '150', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(28, '5420', '2016-07-25', 0, 0, 7, 7, 0, 114, 'TMT', '12', 'NULL', '500', 28, 28, 28, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(29, '5421', '2016-08-10', 0, 0, 7, 7, 7, 51, 'TMT', '18', 'NULL', '370', 29, 29, 29, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', '2016-09-17 16:36:11'),
(30, '5422', '2016-08-10', 0, 0, 7, 7, 7, 211, 'TMT', '18', 'NULL', '425', 30, 30, 30, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', '2016-09-17 16:35:39'),
(31, '5423', '2016-08-10', 0, 0, 7, 7, 7, 23, 'TMT', '17', 'NULL', '400', 31, 31, 31, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', '2016-09-17 16:33:04'),
(32, '5424', '2016-08-10', 0, 0, 7, 7, 7, 78, 'TMT', '15', 'NULL', '500', 32, 32, 32, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', '2016-09-14 20:12:18'),
(33, '5425', '2016-08-10', 0, 0, 7, 7, 7, 217, 'TMT', '12', 'NULL', '500', 33, 33, 33, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', '2016-09-14 20:11:32'),
(34, '5426', '2016-07-25', 0, 0, 63, 224, 0, 224, 'blok', '16', 'NULL', '16', 34, 34, 34, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(35, '5426', '2016-07-25', 0, 0, 63, 2, 0, 224, 'BLOK', '16', 'NULL', '280', 35, 35, 35, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(36, '5427', '2016-07-26', 0, 0, 70, 4, 0, 225, 'WHITE ITO', '20', 'NULL', '700', 36, 36, 36, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(37, '5428', '2016-07-26', 1, 0, 19, 4, 4, 46, 'KHAL', '20', 'NULL', '310', 37, 37, 37, '300', '', NULL, '', '', 1, NULL, '2016-09-17 17:31:58'),
(38, '5429', '2016-07-26', 0, 0, 70, 4, 4, 225, 'WHITE ITO', '10', 'NULL', '800', 38, 38, 38, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', '2016-09-17 17:08:43'),
(39, '5430', '2016-07-26', 1, 0, 71, 4, 0, 141, 'PANHA', '20', 'NULL', '370', 39, 39, 39, '200', '', NULL, '', '', 1, NULL, NULL),
(40, '5131', '2016-07-26', 0, 1, 61, 227, 0, 227, 'tiles', '16', 'NULL', '450', 40, 40, 40, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', NULL),
(41, '5432', '2016-07-26', 0, 0, 10, 3, 3, 23, 'Koyal', '10', 'NULL', '450', 41, 41, 41, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', '2016-09-17 17:08:02'),
(42, '5433', '2016-07-26', 1, 0, 3, 3, 3, 26, 'RA', '16', 'NULL', '300', 42, 42, 42, '300', '', NULL, '', '', 1, NULL, '2016-09-17 17:07:04'),
(43, '5434', '2016-07-26', 1, 0, 72, 182, 0, 39, 'tiles', '13', 'NULL', '600', 43, 43, 43, '300', '', NULL, '', '', 1, NULL, NULL),
(44, '5435', '2016-07-26', 1, 0, 62, 4, 4, 23, 'tiles', '30', 'NULL', '370', 44, 44, 44, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:58:58'),
(45, '5436', '2016-07-26', 1, 0, 73, 8, 0, 33, 'OIL', '10', 'NULL', '600', 45, 45, 45, '300', '', NULL, '', '', 1, NULL, NULL),
(46, '5437', '2016-07-26', 1, 0, 15, 20, 0, 41, 'OIL', '10', 'NULL', '600', 46, 46, 46, '200', '', NULL, '', '', 1, NULL, NULL),
(47, '5438', '2016-07-26', 0, 0, 63, 2, 2, 69, 'BLOK', '16', 'NULL', '280', 47, 47, 47, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', '2016-09-17 17:05:03'),
(48, '5439', '2016-07-26', 0, 0, 58, 126, 126, 46, 'fit', '20', 'NULL', '300', 48, 48, 48, '300', '', NULL, '', '', 1, '2016-08-10 00:00:00', '2016-09-17 17:00:29'),
(49, '5440', '2016-07-26', 1, 0, 74, 10, 0, 43, 'pepar roll', '16', 'NULL', '600', 49, 49, 49, '300', '', NULL, '', '', 1, NULL, NULL),
(50, '5441', '2016-07-26', 1, 0, 6, 2, 2, 35, 'raundbar', '16', 'NULL', '370', 50, 50, 50, '300', '', NULL, '', '', 1, NULL, '2016-09-17 17:06:02'),
(51, '5442', '2016-07-26', 1, 0, 65, 216, 216, 51, 'fit', '25', 'NULL', '370', 51, 51, 51, '300', '', NULL, '', '', 1, NULL, '2016-09-17 17:04:41'),
(52, '5443', '2016-07-26', 1, 0, 19, 4, 0, 33, 'OIL', '10', 'NULL', '600', 52, 52, 52, '300', '', NULL, '', '', 1, NULL, NULL),
(53, '5444', '2016-07-26', 1, 0, 15, 20, 0, 23, 'OIL', '16', 'NULL', '400', 53, 53, 53, '300', '', NULL, '', '', 1, NULL, NULL),
(54, '5445', '2016-07-26', 1, 0, 73, 38, 0, 33, 'OIL', '10', 'NULL', '600', 54, 54, 54, '300', '', NULL, '', '', 1, NULL, NULL),
(55, '5446', '2016-07-26', 1, 0, 65, 216, 216, 51, 'FIT', '20', 'NULL', '370', 55, 55, 55, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:57:51'),
(56, '5447', '2016-07-26', 1, 0, 65, 216, 216, 51, 'FIT', '20', 'NULL', '20', 56, 56, 56, '300', '', NULL, '', '', 1, NULL, '2016-09-17 17:06:31'),
(57, '5448', '2016-07-26', 0, 0, 4, 19, 19, 23, 'raundbar', '20', 'NULL', '370', 57, 57, 57, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 17:04:21'),
(58, '5449', '2016-07-26', 0, 0, 4, 19, 19, 23, 'raundbar', '20', 'NULL', '370', 58, 58, 58, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 17:03:34'),
(59, '5450', '2016-07-26', 0, 0, 4, 19, 19, 23, 'raundbar', '20', 'NULL', '370', 59, 59, 59, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 17:01:27'),
(60, '5451', '2016-07-26', 1, 0, 75, 5, 5, 46, 'tiles', '30', 'NULL', '310', 60, 60, 60, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:59:21'),
(61, '5452', '2016-07-26', 0, 0, 63, 2, 2, 224, 'BLOK', '16', 'NULL', '16', 61, 61, 61, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 17:00:03'),
(62, '5453', '2016-07-26', 0, 0, 7, 7, 7, 165, 'TMT', '20', 'NULL', '575', 62, 62, 62, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 17:02:42'),
(63, '5454', '2016-07-26', 0, 0, 7, 7, 7, 130, 'TMT', '24', 'NULL', '500', 63, 63, 63, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 17:02:10'),
(64, '5455', '2016-07-26', 0, 0, 7, 7, 180, 26, 'TMT', '18', 'NULL', '300', 64, 64, 64, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:59:43'),
(65, '5456', '2016-07-26', 0, 0, 7, 7, 7, 35, 'TMT', '18', 'NULL', '400', 65, 65, 65, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:58:36'),
(66, '5457', '2016-07-26', 0, 0, 7, 7, 7, 61, 'TMT', '25', 'NULL', '475', 66, 66, 66, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:58:12'),
(67, '5458', '2016-07-26', 0, 0, 7, 7, 78, 51, 'TMT', '35', 'NULL', '675', 67, 67, 67, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:57:32'),
(68, '5459', '2016-07-26', 0, 0, 7, 7, 0, 142, 'TMT', '22', 'NULL', '300', 68, 68, 68, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', NULL),
(69, '5460', '2016-07-27', 1, 0, 7, 78, 7, 51, 'raundbar', '25', 'NULL', '370', 69, 69, 69, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:56:58'),
(70, '5461', '2016-07-27', 1, 0, 59, 180, 0, 51, 'fit', '10', 'NULL', '450', 70, 70, 70, '200', '', NULL, '', '', 1, NULL, NULL),
(71, '5462', '2016-07-27', 0, 0, 74, 10, 10, 43, 'pepar roll', '16', 'NULL', '110000', 71, 71, 71, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:56:03'),
(72, '5463', '2016-07-27', 1, 0, 76, 182, 182, 65, 'tiles', '12', 'NULL', '650', 72, 72, 72, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:52:43'),
(73, '5464', '2016-07-27', 0, 0, 36, 9, 9, 23, 'OIL', '19', 'NULL', '400', 73, 73, 73, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:55:26'),
(74, '5668', '2016-08-11', 1, 0, 59, 180, 180, 200, 'SENETARI', '10', 'NULL', '700', 74, 74, 74, '300', '', NULL, '', '', 1, NULL, '2016-09-14 20:09:50'),
(75, '5466', '2016-07-27', 0, 0, 68, 11, 11, 46, 'FIT', '20', 'NULL', '320', 75, 75, 75, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:56:28'),
(76, '5467', '2016-07-27', 0, 0, 68, 11, 11, 46, 'FIT', '20', 'NULL', '320', 76, 76, 76, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:53:00'),
(77, '5468', '2016-07-27', 0, 0, 67, 182, 182, 23, 'Koyal', '18', 'NULL', '18', 77, 77, 77, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:55:45'),
(78, '5469', '2016-07-27', 0, 0, 67, 182, 182, 36, 'Koyal', '13', 'NULL', '450', 78, 78, 78, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:55:06'),
(79, '5470', '2016-07-27', 1, 0, 15, 20, 0, 23, 'OIL', '10', 'NULL', '500', 79, 79, 79, '200', '', NULL, '', '', 1, NULL, NULL),
(80, '5471', '2016-07-27', 0, 0, 7, 7, 7, 228, 'TMT', '12', 'NULL', '700', 80, 80, 80, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:54:46'),
(81, '5472', '2016-07-27', 1, 0, 6, 2, 2, 51, 'raundbar', '25', 'NULL', '370', 81, 81, 81, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:54:10'),
(82, '5473', '2016-07-27', 1, 0, 3, 3, 3, 23, 'raundbar', '14', 'NULL', '450', 82, 82, 82, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:53:18'),
(83, '5474', '2016-07-27', 1, 0, 3, 3, 3, 36, 'raundbar', '20', 'NULL', '400', 83, 83, 83, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:52:27'),
(84, '5475', '2016-07-27', 1, 0, 3, 3, 3, 23, 'raundbar', '18', 'NULL', '475', 84, 84, 84, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:52:04'),
(85, '5476', '2016-07-27', 0, 0, 17, 180, 180, 229, 'tiles', '28', 'NULL', '600', 85, 85, 85, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:51:41'),
(86, '5477', '2016-07-27', 0, 0, 3, 3, 0, 23, 'raundbar', '19', 'NULL', '370', 86, 86, 86, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', NULL),
(87, '5478', '2016-07-27', 1, 0, 77, 1, 0, 33, 'OIL', '10', 'NULL', '600', 87, 87, 87, '300', '', NULL, '', '', 1, NULL, NULL),
(88, '5479', '2016-07-27', 1, 0, 6, 2, 2, 51, 'raundbar', '25', 'NULL', '370', 88, 88, 88, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:50:19'),
(89, '5480', '2016-07-27', 0, 0, 4, 19, 19, 35, 'raundbar', '35', 'NULL', '380', 89, 89, 89, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:49:34'),
(90, '5481', '2016-07-27', 1, 0, 76, 182, 182, 89, 'tiles', '33', 'NULL', '750', 90, 90, 90, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:48:23'),
(91, '5482', '2016-07-27', 1, 0, 78, 4, 0, 58, 'OIL', '10', 'NULL', '800', 91, 91, 91, '300', '', NULL, '', '', 1, NULL, NULL),
(92, '5483', '2016-07-27', 1, 0, 6, 2, 0, 23, 'raundbar', '11', 'NULL', '450', 92, 92, 92, '200', '', NULL, '', '', 1, NULL, NULL),
(93, '5484', '2016-07-27', 0, 0, 67, 182, 0, 35, 'Koyal', '16', 'NULL', '370', 93, 93, 93, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', NULL),
(94, '5485', '2016-07-27', 1, 0, 15, 230, 0, 230, 'OIL', '17', 'NULL', '450', 94, 94, 94, '200', '', NULL, '', '', 1, NULL, NULL),
(95, '5486', '2016-07-27', 0, 0, 7, 7, 0, 146, 'TMT', '18', 'NULL', '500', 95, 95, 95, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', NULL),
(96, '5487', '2016-07-27', 1, 0, 65, 216, 216, 51, 'FIT', '20', 'NULL', '370', 96, 96, 96, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:48:04'),
(97, '5488', '2016-07-27', 1, 0, 15, 20, 0, 33, 'OIL', '10', 'NULL', '600', 97, 97, 97, '300', '', NULL, '', '', 1, NULL, NULL),
(98, '5489', '2016-07-27', 0, 0, 58, 126, 126, 46, 'FIT', '20', 'NULL', '300', 98, 98, 98, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:47:47'),
(99, '5490', '2016-07-27', 0, 0, 58, 126, 126, 46, 'FIT', '20', 'NULL', '300', 99, 99, 99, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:47:29'),
(100, '5491', '2016-07-27', 1, 0, 79, 12, 12, 89, 'tiles', '25', 'NULL', '750', 100, 100, 100, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:47:13'),
(101, '5492', '2016-07-27', 1, 0, 80, 183, 183, 39, 'Koyal', '19', 'NULL', '525', 101, 101, 101, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:46:56'),
(102, '5493', '2016-07-27', 0, 0, 81, 15, 0, 48, 'TMT', '19', 'NULL', '400', 102, 102, 102, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', NULL),
(103, '5494', '2016-07-27', 0, 0, 7, 7, 7, 51, 'TMT', '20', 'NULL', '370', 103, 103, 103, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:46:30'),
(104, '5495', '2016-07-27', 0, 0, 7, 7, 7, 231, 'TMT', '16', 'NULL', '750', 104, 104, 104, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:45:42'),
(105, '5496', '2016-07-27', 0, 0, 7, 7, 7, 120, 'TMT', '13', 'NULL', '550', 105, 105, 105, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:45:02'),
(106, '5497', '2016-07-27', 0, 0, 7, 7, 7, 26, 'TMT', '20', 'NULL', '300', 106, 106, 106, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:44:34'),
(107, '5498', '2016-07-27', 0, 0, 7, 7, 7, 232, 'TMT', '20', 'NULL', '325', 107, 107, 107, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:43:52'),
(108, '5499', '2016-07-27', 0, 0, 7, 7, 7, 124, 'TMT', '12', 'NULL', '700', 108, 108, 108, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:43:20'),
(109, '5500', '2016-07-27', 0, 0, 7, 7, 7, 233, 'TMT', '16', 'NULL', '750', 109, 109, 109, '300', '4500', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:42:51'),
(110, '5502', '2016-07-28', 1, 0, 6, 2, 2, 51, 'raundbar', '25', 'NULL', '370', 110, 110, 110, '300', '', NULL, '', '', 1, NULL, '2016-09-17 16:42:16'),
(111, '5503', '2016-07-28', 0, 0, 82, 4, 0, 33, 'OIL', '10', 'NULL', '600', 111, 111, 111, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', NULL),
(112, '5504', '2016-07-28', 0, 0, 19, 4, 0, 53, 'khol', '20', 'NULL', '400', 112, 112, 112, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', NULL),
(113, '5505', '2016-07-28', 0, 0, 83, 6, 0, 23, 'tiles', '25', 'NULL', '380', 113, 113, 113, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', NULL),
(114, '5506', '2016-07-28', 1, 0, 72, 182, 0, 23, 'tiles', '14', 'NULL', '450', 114, 114, 114, '300', '', NULL, '', '', 1, NULL, NULL),
(115, '5507', '2016-07-28', 0, 0, 17, 180, 180, 234, 'tiles', '10', 'NULL', '300', 115, 115, 115, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:41:33'),
(116, '5508', '2016-07-28', 0, 0, 17, 180, 180, 235, 'TMT', '16', 'NULL', '300', 116, 116, 116, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:41:03'),
(117, '5509', '2016-07-28', 0, 0, 17, 180, 180, 44, 'TMT', '28', 'NULL', '600', 117, 117, 117, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:40:33'),
(118, '5510', '2016-07-28', 0, 0, 58, 126, 126, 46, 'FIT', '20', 'NULL', '300', 118, 118, 118, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:39:51'),
(119, '5511', '2016-07-28', 0, 0, 58, 126, 126, 46, 'FIT', '20', 'NULL', '300', 119, 119, 119, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:39:28'),
(120, '5512', '2016-07-28', 0, 0, 58, 126, 126, 46, 'FIT', '20', 'NULL', '300', 120, 120, 120, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:38:54'),
(121, '5513', '2016-07-29', 0, 0, 58, 126, 126, 46, 'FIT', '20', 'NULL', '300', 121, 121, 121, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:36:40'),
(122, '5514', '2016-07-28', 0, 0, 58, 126, 126, 46, 'FIT', '20', 'NULL', '300', 122, 122, 122, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:38:03'),
(123, '5515', '2016-07-28', 0, 0, 58, 126, 126, 46, 'FIT', '20', 'NULL', '300', 123, 123, 123, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:37:47'),
(124, '5516', '2016-07-28', 0, 0, 84, 11, 11, 46, 'FIT', '20', 'NULL', '320', 124, 124, 124, '300', '', NULL, '', '', 1, '2016-08-11 00:00:00', '2016-09-17 16:37:30');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

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
(16, 16, 13, '450', 16, 0, '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(17, 17, 14, '475', 5, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(18, 17, 15, '475', 5, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(19, 18, 16, '', 0, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(20, 18, 17, '', 0, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(21, 19, 18, '415', 20, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(22, 20, 19, '330', 12, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(23, 21, 20, '900', 12, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(24, 22, 21, '550', 14, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(25, 23, 22, '415', 20, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(26, 24, 23, '', 0, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(27, 25, 24, '370', 20, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(28, 26, 25, '550', 11, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(29, 27, 26, '550', 10, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(30, 37, 27, '350', 20, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(31, 40, 28, '', 0, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(32, 40, 29, '', 0, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(33, 42, 30, '425', 16, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(34, 43, 31, '650', 13, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(35, 46, 32, '680', 0, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(36, 46, 33, '680', 0, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(37, 48, 34, '370', 20, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(38, 50, 35, '475', 16, 0, '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(39, 51, 36, '475', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(40, 52, 37, '600', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(41, 53, 38, '500', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(42, 54, 39, '600', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(43, 55, 40, '475', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(44, 56, 41, '475', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(45, 57, 42, '450', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(46, 58, 43, '450', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(47, 58, 0, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(48, 59, 44, '450', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(49, 60, 45, '350', 30, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(50, 61, 46, '390', 16, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(51, 62, 47, '', 10, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(52, 62, 48, '', 10, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(53, 63, 49, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(54, 69, 50, '500', 25, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(55, 73, 51, '500', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(56, 75, 52, '415', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(57, 76, 53, '415', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(58, 79, 54, '585', 10, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(59, 81, 55, '475', 25, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(60, 82, 56, '475', 14, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(61, 83, 57, '475', 15, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(62, 83, 58, '475', 4, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(63, 83, 59, '475', 2, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(64, 84, 60, '475', 18, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(65, 85, 61, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(66, 85, 62, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(67, 86, 63, '475', 7, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(68, 86, 64, '475', 12, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(69, 87, 65, '600', 10, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(70, 88, 66, '475', 25, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(71, 89, 67, '475', 30, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(72, 89, 68, '475', 5, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(73, 91, 69, '800', 10, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(74, 92, 70, '475', 10, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(75, 93, 71, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(76, 93, 72, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(77, 94, 73, '500', 17, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(78, 95, 74, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(79, 95, 75, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(80, 96, 76, '475', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(81, 97, 77, '600', 10, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(82, 98, 78, '370', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(83, 99, 79, '370', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(84, 101, 80, '600', 19, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(85, 104, 81, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(86, 105, 82, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(87, 105, 83, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(88, 106, 84, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(89, 106, 85, '', 0, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(90, 110, 86, '475', 25, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(91, 111, 87, '600', 10, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(92, 112, 88, '450', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(93, 114, 89, '480', 14, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(94, 118, 90, '370', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(95, 119, 91, '370', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(96, 121, 92, '370', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(97, 122, 93, '370', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(98, 123, 94, '370', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(99, 124, 95, '415', 20, 0, '', '2016-08-11 00:00:00', '2016-08-11 00:00:00'),
(100, 89, 0, '', 0, 300, '', '2016-09-17 00:00:00', '2016-09-17 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

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
(13, '', '', '', '', '', 35, 0, NULL, NULL),
(14, 'krisna stel', '', '', '', '', 23, 0, NULL, NULL),
(15, 'Radhamira stel', '', '', '', '', 23, 0, NULL, NULL),
(16, 'Mehul Trading ', '', '', '', '', 58, 0, NULL, NULL),
(17, 'Dabal Enterprise', '', '', '', '', 58, 0, NULL, NULL),
(18, 'Madhu Cirika', '', '', '', '', 46, 0, NULL, NULL),
(19, '', '', '', '', '', 26, 0, NULL, NULL),
(20, 'Ravibhai ', '', '', '', '', 68, 0, NULL, NULL),
(21, '', '', '', '', '', 0, 0, NULL, NULL),
(22, '', '', '', '', '', 51, 0, NULL, NULL),
(23, '', '', '', '', '', 0, 0, NULL, NULL),
(24, 'Madhu Cilika', '', '', '', '', 46, 0, NULL, NULL),
(25, 'Telta stel', '', '', '', '', 36, 0, NULL, NULL),
(26, 'Balaji Stel', '', '', '', '', 36, 0, NULL, NULL),
(27, '', '', '', '', '', 46, 0, NULL, NULL),
(28, '', '', '', '', '', 23, 0, NULL, NULL),
(29, '', '', '', '', '', 227, 0, NULL, NULL),
(30, 'MAHESVRY STEL', '', '', '', '', 26, 0, NULL, NULL),
(31, '', '', '', '', '', 39, 0, NULL, NULL),
(32, '', '', '', '', '', 25, 0, NULL, NULL),
(33, '', '', '', '', '', 41, 0, NULL, NULL),
(34, 'MADHUSILIKA', '', '', '', '', 46, 0, NULL, NULL),
(35, 'VIPUL STEL', '', '', '', '', 35, 0, NULL, NULL),
(36, '', '', '', '', '', 51, 0, NULL, NULL),
(37, 'KAILASH', '', '', '', '', 33, 0, NULL, NULL),
(38, 'KESHARI NANDAN', '', '', '', '', 23, 0, NULL, NULL),
(39, 'HAREKUSNA', '', '', '', '', 33, 0, NULL, NULL),
(40, '', '', '', '', '', 51, 0, NULL, NULL),
(41, '', '', '', '', '', 51, 0, NULL, NULL),
(42, 'SAYALENT FROJRA', '', '', '', '', 23, 0, NULL, NULL),
(43, 'SAYALENT FRORJA', '', '', '', '', 19, 0, NULL, NULL),
(44, 'SAYALENT FORJA', '', '', '', '', 23, 0, NULL, NULL),
(45, '', '', '', '', '', 46, 0, NULL, NULL),
(46, '', '', '', '', '', 224, 0, NULL, NULL),
(47, '', '', '', '', '', 97, 0, NULL, NULL),
(48, '', '', '', '', '', 165, 0, NULL, NULL),
(49, '', '', '', '', '', 0, 0, NULL, NULL),
(50, 'JOSHI Stel', '', '', '', '', 130, 0, NULL, NULL),
(51, 'VIMAL DEDPO', '', '', '', '', 23, 0, NULL, NULL),
(52, 'MADHU CERIKA', '', '', '', '', 46, 0, NULL, NULL),
(53, 'MADHU CIRIKA', '', '', '', '', 46, 0, NULL, NULL),
(54, '', '', '', '', '', 23, 0, NULL, NULL),
(55, 'SIVSAKTI Stel', '', '', '', '', 51, 0, NULL, NULL),
(56, 'San Stel', '', '', '', '', 23, 0, NULL, NULL),
(57, 'SAKTI STEL', '', '', '', '', 130, 0, NULL, NULL),
(58, 'VASA STEL', '', '', '', '', 36, 0, NULL, NULL),
(59, 'J.JALARAM STEL', '', '', '', '', 130, 0, NULL, NULL),
(60, 'PASVA NATH STEL', '', '', '', '', 23, 0, NULL, NULL),
(61, '', '', '', '', '', 39, 0, NULL, NULL),
(62, '', '', '', '', '', 229, 0, NULL, NULL),
(63, 'K.P.ENG', '', '', '', '', 23, 0, NULL, NULL),
(64, 'VASA STEL', '', '', '', '', 23, 0, NULL, NULL),
(65, 'kailash treding', '', '', '', '', 33, 0, NULL, NULL),
(66, 'SIVSAKTI STEL', '', '', '', '', 51, 0, NULL, NULL),
(67, 'GANGA FROJ', '', '', '', '', 35, 0, NULL, NULL),
(68, 'GLOBAL STEL', '', '', '', '', 35, 0, NULL, NULL),
(69, 'amrut aejanshi', '', '', '', '', 58, 0, NULL, NULL),
(70, 'GIRIRAJ STEL', '', '', '', '', 23, 0, NULL, NULL),
(71, '', '', '', '', '', 23, 0, NULL, NULL),
(72, '', '', '', '', '', 35, 0, NULL, NULL),
(73, '', '', '', '', '', 230, 0, NULL, NULL),
(74, '', '', '', '', '', 146, 0, NULL, NULL),
(75, '', '', '', '', '', 226, 0, NULL, NULL),
(76, '', '', '', '', '', 51, 0, NULL, NULL),
(77, 'KRISNA ENTER', '', '', '', '', 33, 0, NULL, NULL),
(78, 'MADHU SILIKA', '', '', '', '', 46, 0, NULL, NULL),
(79, 'MADHU SILIKA', '', '', '', '', 46, 0, NULL, NULL),
(80, '', '', '', '', '', 39, 0, NULL, NULL),
(81, '', '', '', '', '', 32, 0, NULL, NULL),
(82, '', '', '', '', '', 120, 0, NULL, NULL),
(83, '', '', '', '', '', 121, 0, NULL, NULL),
(84, '', '', '', '', '', 26, 0, NULL, NULL),
(85, '', '', '', '', '', 27, 0, NULL, NULL),
(86, 'JOSHI STEL', '', '', '', '', 51, 0, NULL, NULL),
(87, 'Hitesh Treding', '', '', '', '', 33, 0, NULL, NULL),
(88, '', '', '', '', '', 53, 0, NULL, NULL),
(89, '', '', '', '', '', 23, 0, NULL, NULL),
(90, 'MADHU SILIKA', '', '', '', '', 46, 0, NULL, NULL),
(91, 'MADHU SILIKA', '', '', '', '', 46, 0, NULL, NULL),
(92, '', '', '', '', '', 46, 0, NULL, NULL),
(93, '', '', '', '', '', 46, 0, NULL, NULL),
(94, '', '', '', '', '', 46, 0, NULL, NULL),
(95, '', '', '', '', '', 46, 0, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `truck`
--

INSERT INTO `truck` (`id`, `truck_number`, `chassis_no`, `engine_no`, `note`, `truck_owner_id`, `rcbook`, `permit`, `insurance`, `created`, `modified`) VALUES
(1, 'GJ.BT.8947', '', '', '', 0, '', '', '', NULL, NULL),
(2, 'Gj.13.at.7217', '', '', '', 2, '', '', '', NULL, '0000-00-00 00:00:00'),
(3, 'gj.18.ax.2408', '', '', '', 125, '', '', '', NULL, '0000-00-00 00:00:00'),
(4, 'gj.4x.6402', '', '', '', 126, '', '', '', NULL, '0000-00-00 00:00:00'),
(5, 'gj.01.dx.6193', '', '', '', 127, '', '', '', NULL, '0000-00-00 00:00:00'),
(6, 'GJ1AY4721', '', '', '', 128, '', '', '', NULL, '0000-00-00 00:00:00'),
(7, 'GJ25T9779', '', '', '', 129, '', '', '', NULL, '0000-00-00 00:00:00'),
(8, 'gj.4v.7180', '', '', '', 130, '', '', '', NULL, '0000-00-00 00:00:00'),
(9, 'gj.13w.8522', '', '', '', 131, '', '', '', NULL, '0000-00-00 00:00:00'),
(10, 'Gj.36t.2011', '', '', '', 132, '', '', '', NULL, '0000-00-00 00:00:00'),
(11, 'Gj.1cz.6556', '', '', '', 133, '', '', '', NULL, '0000-00-00 00:00:00'),
(12, 'Gj.4x.7102', '', '', '', 134, '', '', '', NULL, '0000-00-00 00:00:00'),
(13, 'gj.3v.1786', '', '', '', 135, '', '', '', NULL, '0000-00-00 00:00:00'),
(14, 'gj.3w.7921', '', '', '', 136, '', '', '', NULL, '0000-00-00 00:00:00'),
(15, 'gj.3at.1963', '', '', '', 137, '', '', '', NULL, '0000-00-00 00:00:00'),
(16, 'gj.12x.1560', '', '', '', 138, '', '', '', NULL, '0000-00-00 00:00:00'),
(17, 'GJ3AT-2417', '', '', '', 139, '', '', '', NULL, '0000-00-00 00:00:00'),
(18, 'GJ3AT-4276', '', '', '', 163, '', '', '', NULL, '0000-00-00 00:00:00'),
(19, 'GJ11Z-8181', '', '', '', 140, '', '', '', NULL, '0000-00-00 00:00:00'),
(20, 'GJ3AT-4525', '', '', '', 144, '', '', '', NULL, '0000-00-00 00:00:00'),
(21, 'GJ20T-5418', '', '', '', 141, '', '', '', NULL, '0000-00-00 00:00:00'),
(22, 'GJ3W-7916', '', '', '', 142, '', '', '', NULL, '0000-00-00 00:00:00'),
(23, 'GJ3BV-403', '', '', '', 145, '', '', '', NULL, '0000-00-00 00:00:00'),
(24, 'GJ6YY-6710', '', '', '', 143, '', '', '', NULL, '0000-00-00 00:00:00'),
(25, 'GJ4AT-6197', '', '', '', 0, '', '', '', NULL, NULL),
(26, 'GJ3AT-4764', '', '', '', 146, '', '', '', NULL, '0000-00-00 00:00:00'),
(27, 'GJ3AT-4764', '', '', '', 146, '', '', '', NULL, '0000-00-00 00:00:00'),
(28, 'GJ.9Y-9984', '', '', '', 195, '', '', '', NULL, '0000-00-00 00:00:00'),
(29, 'GJ.11.Z.9747', '', '', '', 147, '', '', '', NULL, '0000-00-00 00:00:00'),
(30, 'GJ.3.AT.3124', '', '', '', 183, '', '', '', NULL, '0000-00-00 00:00:00'),
(31, 'GJ.3.AT.2953', '', '', '', 196, '', '', '', NULL, '0000-00-00 00:00:00'),
(32, 'GJ.6.YY.9137', '', '', '', 148, '', '', '', NULL, '0000-00-00 00:00:00'),
(33, 'GJ.6.X.8596', '', '', '', 198, '', '', '', NULL, '0000-00-00 00:00:00'),
(34, 'gj16v-4336', '', '', '', 149, '', '', '', NULL, '0000-00-00 00:00:00'),
(35, 'GJ16V-4336', '', '', '', 149, '', '', '', NULL, '0000-00-00 00:00:00'),
(36, 'GJ.24V-6606', '', '', '', 150, '', '', '', NULL, '0000-00-00 00:00:00'),
(37, 'GJ.4X-7773', '', '', '', 151, '', '', '', NULL, '0000-00-00 00:00:00'),
(38, 'GJ.5AT-2050', '', '', '', 125, '', '', '', NULL, '0000-00-00 00:00:00'),
(39, 'GJ.12Y-5020', '', '', '', 152, '', '', '', NULL, '0000-00-00 00:00:00'),
(40, 'GJ.10X-8080', '', '', '', 197, '', '', '', NULL, '0000-00-00 00:00:00'),
(41, 'GJ.11Y-9386', '', '', '', 156, '', '', '', NULL, '0000-00-00 00:00:00'),
(42, 'GJ.1AU-3311', '', '', '', 153, '', '', '', NULL, '0000-00-00 00:00:00'),
(43, 'GJ.25T-9779', '', '', '', 155, '', '', '', NULL, '0000-00-00 00:00:00'),
(44, 'GJ.3AX-5418', '', '', '', 157, '', '', '', NULL, '0000-00-00 00:00:00'),
(45, 'GJ.1AT-7904', '', '', '', 0, '', '', '', NULL, NULL),
(46, 'GJ.10U-6719', '', '', '', 199, '', '', '', NULL, '0000-00-00 00:00:00'),
(47, 'GL.11W-4212', '', '', '', 159, '', '', '', NULL, '0000-00-00 00:00:00'),
(48, 'GJ.4X-9493', '', '', '', 158, '', '', '', NULL, '0000-00-00 00:00:00'),
(49, 'GJ.18AU-6658', '', '', '', 160, '', '', '', NULL, '0000-00-00 00:00:00'),
(50, 'GJ.3Y-9553', '', '', '', 161, '', '', '', NULL, '0000-00-00 00:00:00'),
(51, 'GJ.10Z-8695', '', '', '', 204, '', '', '', NULL, '0000-00-00 00:00:00'),
(52, 'GJ.17X-7986', '', '', '', 162, '', '', '', NULL, '0000-00-00 00:00:00'),
(53, 'GJ.12Y-5334', '', '', '', 200, '', '', '', NULL, '0000-00-00 00:00:00'),
(54, 'GJ.17Y-9958', '', '', '', 201, '', '', '', NULL, '0000-00-00 00:00:00'),
(55, 'GJ.11TT-9972', '', '', '', 180, '', '', '', NULL, '0000-00-00 00:00:00'),
(56, 'GJ.25T-5592', '', '', '', 181, '', '', '', NULL, '0000-00-00 00:00:00'),
(57, 'GJ.3W-8707', '', '', '', 182, '', '', '', NULL, '0000-00-00 00:00:00'),
(58, 'GJ.3AT-2764', '', '', '', 146, '', '', '', NULL, '0000-00-00 00:00:00'),
(59, 'GJ.10X-6827', '', '', '', 192, '', '', '', NULL, '0000-00-00 00:00:00'),
(60, 'GJ.4AT-8998', '', '', '', 164, '', '', '', NULL, '0000-00-00 00:00:00'),
(61, 'GJ2Y-7627', '', '', '', 212, '', '', '', NULL, '0000-00-00 00:00:00'),
(62, 'GJ.11Z-8399', '', '', '', 168, '', '', '', NULL, '0000-00-00 00:00:00'),
(63, 'GJ.6XX-6645', '', '', '', 205, '', '', '', NULL, '0000-00-00 00:00:00'),
(64, 'GJ.13V-3807', '', '', '', 177, '', 'chotila', '', NULL, '0000-00-00 00:00:00'),
(65, 'GJ.11W-4769', '', '', '', 202, '', '', '', NULL, '0000-00-00 00:00:00'),
(66, 'GJ.1AU-3669', '', '', '', 203, '', '', '', NULL, '0000-00-00 00:00:00'),
(67, 'GJ.12QAT-8688', '', '', '', 206, '', '', '', NULL, '0000-00-00 00:00:00'),
(68, 'GJ.13V-5092', '', '', '', 188, '', '', '', NULL, '0000-00-00 00:00:00'),
(69, 'GJ.12AU-8193', '', '', '', 211, '', '', '', NULL, '0000-00-00 00:00:00'),
(70, 'GJ3W7109', '', '', '', 190, '', '', '', NULL, '0000-00-00 00:00:00'),
(71, 'GJ18X9987', '', '', '', 194, '', '', '', NULL, '0000-00-00 00:00:00'),
(72, 'GJ18AV8341', '', '', '', 169, '', '', '', NULL, '0000-00-00 00:00:00'),
(73, 'GJ3AT4424', '', '', '', 215, '', '', '', NULL, '0000-00-00 00:00:00'),
(74, 'GJ2Z-4305', '', '', '', 0, '', '', '', NULL, NULL),
(75, 'GJ4Y-7278', '', '', '', 245, '', '', '', NULL, '0000-00-00 00:00:00'),
(76, 'GJ4V-6265', '', '', '', 170, '', '', '', NULL, '0000-00-00 00:00:00'),
(77, 'GJ.1AU.4045', '', '', '', 209, '', '', '', NULL, '0000-00-00 00:00:00'),
(78, 'GJ.1BV.1216', '', '', '', 224, '', '', '', NULL, '0000-00-00 00:00:00'),
(79, 'GJ.3AT-4056', '', '', '', 216, '', '', '', NULL, '0000-00-00 00:00:00'),
(80, 'GJ.15X-4559', '', '', '', 210, '', '', '', NULL, '0000-00-00 00:00:00'),
(81, 'gj.11z-7587', '', '', '', 167, '', '', '', NULL, '0000-00-00 00:00:00'),
(82, 'GJ.18AT-9427', '', '', '', 189, '', '', '', NULL, '0000-00-00 00:00:00'),
(83, 'GJ.1DU-9797', '', '', '', 214, '', '', '', NULL, '0000-00-00 00:00:00'),
(84, 'GJ.2Z-2844', '', '', '', 171, '', '', '', NULL, '0000-00-00 00:00:00'),
(85, 'GJ.18AU-8701', '', '', '', 207, '', '', '', NULL, '0000-00-00 00:00:00'),
(86, 'GJ.13AT-9238', '', '', '', 0, '', '', '', NULL, NULL),
(87, 'GJ.1AX.3354', '', '', '', 172, '', '', '', NULL, '0000-00-00 00:00:00'),
(88, 'GJ.10V.8936', '', '', '', 218, '', '', '', NULL, '0000-00-00 00:00:00'),
(89, 'GJ.10Z-9845', '', '', '', 0, '', '', '', NULL, NULL),
(90, 'GJ.18AU-7934', '', '', '', 208, '', '', '', NULL, '0000-00-00 00:00:00'),
(91, 'GJ.3U-4716', '', '', '', 219, '', '', '', NULL, '0000-00-00 00:00:00'),
(92, 'GJ.10TT-5405', '', '', '', 221, '', '', '', NULL, '0000-00-00 00:00:00'),
(93, 'GJ.2Z-4724', '', '', '', 213, '', '', '', NULL, '0000-00-00 00:00:00'),
(94, 'MH.48T-8113', '', '', '', 222, '', '', '', NULL, '0000-00-00 00:00:00'),
(95, 'GJ.10W-5545', '', '', '', 223, '', '', '', NULL, '0000-00-00 00:00:00'),
(96, 'GJ.3AT-2999', '', '', '', 225, '', '', '', NULL, '0000-00-00 00:00:00'),
(97, 'GJ.9V-4639', '', '', '', 239, '', '', '', NULL, '0000-00-00 00:00:00'),
(98, 'GJ.4AT-6335', '', '', '', 165, '', '', '', NULL, '0000-00-00 00:00:00'),
(99, 'GJ.12Y-5286', '', '', '', 238, '', '', '', NULL, '0000-00-00 00:00:00'),
(100, 'GJ.24U-2564', '', '', '', 226, '', '', '', NULL, '0000-00-00 00:00:00'),
(101, 'GJ.11Z-6777', '', '', '', 229, '', '', '', NULL, '0000-00-00 00:00:00'),
(102, 'GJ.13W-2838', '', '', '', 227, '', '', '', NULL, '0000-00-00 00:00:00'),
(103, 'GJ.7TT-9141', '', '', '', 166, '', '', '', NULL, '0000-00-00 00:00:00'),
(104, 'GJ.9Y-6727', '', '', '', 173, '', '', '', NULL, '0000-00-00 00:00:00'),
(105, 'GJ.1X-4464', '', '', '', 232, '', '', '', NULL, '0000-00-00 00:00:00'),
(106, 'GJ.18AT-9100', '', '', '', 240, '', '', '', NULL, '0000-00-00 00:00:00'),
(107, 'GJ.3AT-3751', '', '', '', 230, '', '', '', NULL, '0000-00-00 00:00:00'),
(108, 'GJ.9V-4171', '', '', '', 187, '', '', '', NULL, '0000-00-00 00:00:00'),
(109, 'GJ.18AT-9293', '', '', '', 186, '', '', '', NULL, '0000-00-00 00:00:00'),
(110, 'GJ.1BT-8757', '', '', '', 236, '', '', '', NULL, '0000-00-00 00:00:00'),
(111, 'GJ.17X-7986', '', '', '', 228, '', '', '', NULL, '0000-00-00 00:00:00'),
(112, 'GJ.3W-7246', '', '', '', 242, '', '', '', NULL, '0000-00-00 00:00:00'),
(113, 'gj.3ax-9909', '', '', '', 246, '', '', '', NULL, '0000-00-00 00:00:00'),
(114, 'gj.7y-2181', '', '', '', 241, '', '', '', NULL, '0000-00-00 00:00:00'),
(115, 'GJ.2Z-1609', '', '', '', 234, '', '', '', NULL, '0000-00-00 00:00:00'),
(116, 'GJ.18U-7218', '', '', '', 237, '', '', '', NULL, '0000-00-00 00:00:00'),
(117, 'GJ.18AZ-4354', '', '', '', 233, '', '', '', NULL, '0000-00-00 00:00:00'),
(118, 'GJ.4X-6920', '', '', '', 247, '', '', '', NULL, '0000-00-00 00:00:00'),
(119, 'GJ.18U-7561', '', '', '', 0, '', '', '', NULL, NULL),
(120, 'GJ.4V5677', '', '', '', 0, '', '', '', NULL, NULL),
(121, 'GJ.12W-5716', '', '', '', 0, '', '', '', NULL, NULL),
(122, 'GJ.10W-6299', '', '', '', 174, '', '', '', NULL, '0000-00-00 00:00:00'),
(123, 'GJ.12Z-0721', '', '', '', 243, '', '', '', NULL, '0000-00-00 00:00:00'),
(124, 'GJ.4X-8778', '', '', '', 185, '', '', '', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `truck_commission`
--

CREATE TABLE IF NOT EXISTS `truck_commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(5) NOT NULL,
  `truck_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `commission` float NOT NULL,
  `payable_amount` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-Unpaid,1-Paid',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=254 ;

--
-- Dumping data for table `truck_commission`
--

INSERT INTO `truck_commission` (`id`, `order_id`, `truck_id`, `driver_id`, `commission`, `payable_amount`, `status`, `created`, `modified`) VALUES
(4, 74, 74, 74, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(5, 33, 33, 33, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(6, 32, 32, 32, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(7, 31, 31, 31, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(8, 30, 30, 30, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(9, 29, 29, 29, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(10, 121, 121, 121, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(11, 124, 124, 124, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(12, 123, 123, 123, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(13, 122, 122, 122, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(14, 120, 120, 120, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(15, 119, 119, 119, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(16, 118, 118, 118, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(17, 117, 117, 117, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(18, 116, 116, 116, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(19, 115, 115, 115, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(20, 114, 114, 114, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(21, 113, 113, 113, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(22, 112, 112, 112, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(23, 111, 111, 111, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(24, 110, 110, 110, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(25, 109, 109, 109, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(26, 108, 108, 108, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(27, 107, 107, 107, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(28, 106, 106, 106, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(29, 105, 105, 105, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(30, 104, 104, 104, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(31, 103, 103, 103, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(32, 102, 102, 102, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(33, 101, 101, 101, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(34, 100, 100, 100, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(35, 99, 99, 99, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(36, 98, 98, 98, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(37, 97, 97, 97, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(38, 96, 96, 96, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(39, 95, 95, 95, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(40, 94, 94, 94, 200, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(41, 93, 93, 93, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(42, 92, 92, 92, 200, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(43, 91, 91, 91, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(44, 90, 90, 90, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(45, 89, 89, 89, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(46, 88, 88, 88, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(47, 87, 87, 87, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(48, 86, 86, 86, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(49, 85, 85, 85, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(50, 84, 84, 84, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(51, 83, 83, 83, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(52, 82, 82, 82, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(53, 81, 81, 81, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(54, 80, 80, 80, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(55, 79, 79, 79, 200, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(56, 78, 78, 78, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(57, 77, 77, 77, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(58, 76, 76, 76, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(59, 75, 75, 75, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(60, 73, 73, 73, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(61, 72, 72, 72, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(62, 71, 71, 71, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(63, 70, 70, 70, 200, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(64, 69, 69, 69, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(65, 68, 68, 68, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(66, 67, 67, 67, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(67, 66, 66, 66, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(68, 65, 65, 65, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(69, 64, 64, 64, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(70, 63, 63, 63, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(71, 62, 62, 62, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(72, 61, 61, 61, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(73, 60, 60, 60, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(74, 59, 59, 59, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(75, 58, 58, 58, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(76, 57, 57, 57, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(77, 56, 56, 56, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(78, 55, 55, 55, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(79, 54, 54, 54, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(80, 53, 53, 53, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(81, 52, 52, 52, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(82, 51, 51, 51, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(83, 50, 50, 50, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(84, 49, 49, 49, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(85, 48, 48, 48, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(86, 47, 47, 47, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(87, 46, 46, 46, 200, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(88, 45, 45, 45, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(89, 44, 44, 44, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(90, 43, 43, 43, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(91, 42, 42, 42, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(92, 41, 41, 41, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(93, 40, 40, 40, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(94, 39, 39, 39, 200, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(95, 38, 38, 38, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(96, 37, 37, 37, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(97, 36, 36, 36, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(98, 35, 35, 35, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(99, 34, 34, 34, 300, 0, 0, '2016-09-30 18:17:16', '2016-09-30 18:17:16'),
(100, 28, 28, 28, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(101, 27, 27, 27, 150, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(102, 26, 26, 26, 150, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(103, 25, 25, 25, 200, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(104, 24, 24, 24, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(105, 23, 23, 23, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(106, 22, 22, 22, 200, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(107, 21, 21, 21, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(108, 20, 20, 20, 200, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(109, 19, 19, 19, 200, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(110, 18, 18, 18, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(111, 17, 17, 17, 200, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(112, 16, 16, 16, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(113, 15, 15, 15, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(114, 14, 14, 14, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(115, 13, 13, 13, 200, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(116, 12, 12, 12, 200, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(117, 11, 11, 11, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(118, 10, 10, 10, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(119, 9, 9, 9, 200, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(120, 8, 8, 8, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(121, 7, 7, 7, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(122, 6, 6, 6, 200, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(123, 5, 5, 5, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(124, 3, 3, 3, 300, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(125, 1, 1, 1, 200, 0, 0, '2016-09-30 18:17:17', '2016-09-30 18:17:17'),
(248, 20, 20, 10, 300, 0, 0, '2016-10-04 18:24:11', '2016-10-04 18:24:11'),
(249, 20, 20, 10, 300, 0, 0, '2016-10-04 18:24:33', '2016-10-04 18:24:33'),
(250, 108, 2, 131, 300, 0, 0, '2016-10-04 18:39:19', '2016-10-04 18:39:19'),
(251, 109, 7, 132, 300, 0, 0, '2016-10-04 18:41:07', '2016-10-04 18:41:07'),
(252, 110, 7, 133, 300, 0, 0, '2016-10-04 18:41:41', '2016-10-04 18:41:41'),
(253, 111, 7, 134, 300, 0, 0, '2016-10-04 18:42:52', '2016-10-04 18:42:52');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=248 ;

--
-- Dumping data for table `truck_owner`
--

INSERT INTO `truck_owner` (`id`, `owner_name`, `city_id`, `contact_no`, `address`, `created`, `modified`) VALUES
(2, 'alpeshbhai', 51, '9925954655', '', '2016-07-10 00:00:00', '2016-07-10 00:00:00'),
(6, 'NITIN', 4, '7600215120', '', '2016-07-23 00:00:00', '2016-07-23 15:04:01'),
(7, 'Bhurakaka', 152, '9099171190', '', '2016-07-23 00:00:00', '2016-07-23 00:00:00'),
(8, 'sankar', 4, '9879763244', '', '2016-08-07 00:00:00', '2016-08-07 00:00:00'),
(29, 'ARJAN BHAI', 43, '9825061075', '', '2016-08-10 00:00:00', '2016-09-17 16:36:11'),
(34, 'KISHAN', 68, '', '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(35, 'KISHAN', 68, '', '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(36, 'JAGAKAKA', 128, '8511435992', '', '2016-08-10 00:00:00', '2016-08-10 00:00:00'),
(37, 'KIRITSINH', 46, '9426918291', '', '2016-08-10 00:00:00', '2016-09-17 17:31:59'),
(41, 'MATRABHAI', 23, '8690037416', '', '2016-08-10 00:00:00', '2016-09-17 17:08:02'),
(125, 'RAJUDESAI', 0, '9898608032', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(126, 'Ajitsinh', 0, '9824967871', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(127, 'RK TRAILOR', 0, '8980015595', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(128, 'NITINBHAI', 0, '7600215120', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(129, 'BHURA BHAI', 0, '9427734213', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(130, 'ISMAIL BHAI', 0, '9825205068', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(131, 'MUNNABHAI', 0, '7777808522', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(132, 'SAMAY TRANSPORT', 0, '9879509999', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(133, 'ROYAL TRANSPORT', 0, '9979861378', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(134, 'GAUTAM BHAI', 0, '9558266632', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(135, 'JORUBHA', 0, '9824209036', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(136, 'PRAVINBHAI THAN', 0, '9825056515', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(137, 'MAULIK TRANSPORT', 0, '9374114068', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(138, 'LAKDHIR BHAI', 0, '8758906090', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(139, 'KALU BHAI', 0, '7041915167', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(140, 'TARAJAN', 0, '93771125', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(141, 'PUNJEL YAMI', 33, '9824484527', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(142, 'ROMAR ROADWAYS', 23, '9033315550', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(143, 'MUKESH BHAI', 168, '9426599120', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(144, 'RANCHOD BHAI', 26, '9824820931', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(145, 'NILESH BHAI', 0, '9096128682', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(146, 'VANRAJ BHAI', 23, '9727758764', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(147, 'ARJAN BHAI', 43, '9825061075', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(148, 'HANIF BHAI', 33, '9924879079', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(149, 'kishan BHAI', 68, '8401671512', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(150, 'JAGDISH BHAI', 128, '9426643820', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(151, 'KIRITSINH', 46, '9426918291', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(152, 'VELSINH BHAI', 50, '9825091055', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(153, 'RANCHOD BHAI', 50, '8690905686', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(154, 'BHURA BHAI', 152, '9427734213', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(155, 'BHURA BHAI', 152, '9427734213', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(156, 'MATRABHAI', 23, '8690037416', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(157, 'MERAMANBHAI', 23, '9825362296', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(158, 'DASHARATHBHAI', 46, '9427503009', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(159, 'DINESHBHAI', 68, '8401966545', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(160, 'RAMBHAI', 43, '9714293255', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(161, 'VANRAJ BHAI', 23, '9879155053', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(162, 'VASHIMBHAI', 33, '8732902062', '', '2016-09-14 00:00:00', '2016-09-14 00:00:00'),
(163, 'lalabhai', 58, '9409410453', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(164, 'sanjaysinh', 46, '9913729999', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(165, 'rafikbhai', 46, '9825276814', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(166, 'javid', 0, '8487038300', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(167, 'kamleshbhai', 43, '9979892187', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(168, 'ranabhai', 43, '9824443442', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(169, 'chintanbhai', 10, '9724419733', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(170, 'narubhai', 46, '8490807807', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(171, 'dushyant', 4, '9924372036', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(172, 'VASHIMBHAI', 33, '8732902062', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(173, 'zakirbhai', 33, '9904433000', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(174, 'sursingh', 46, '9824283220', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(175, 'rajubhai', 0, 'sadala', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(176, 'rajubhai', 0, '9924403807', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(177, 'rajubhai', 55, '9924403807', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(178, 'rameshbhai', 0, '9173396650', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(179, 'rameshbhai', 50, '9173396650', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(180, 'bharatbhai', 152, '9427424741', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(181, 'parabatbhai', 152, '9737347292', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(182, 'chafarbhai', 50, '9879071110', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(183, 'saileshbhai', 23, '9898318622', '', '2016-09-15 00:00:00', '2016-09-15 00:00:00'),
(184, 'kamleshbhai', 0, '9979892187', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(185, 'rajendrabhai', 46, '9825231106', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(186, 'mayurbhai ', 68, '9825803929', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(187, 'HANIF BHAI', 33, '9924879079', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(188, 'rajubhai', 50, '9173396650', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(189, 'ranabhai', 50, '9979914357', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(190, 'mahebubbhai', 51, '9723383333', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(191, 'purusharth transport', 23, '9173315960', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(192, 'purusharth transport', 23, '9173315960', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(193, 'kamleshbhai', 0, '9979892187', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(194, 'kamleshbhai', 43, '9979892187', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(195, 'rafikbhai', 33, '9737078278', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(196, 'vipulbhai', 23, '7574899311', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(197, 'jafarbhai', 227, '9067861601', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(198, 'ISMAIL BHAI', 33, '9737395795', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(199, 'kanjibhai', 152, '9427792217', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(200, 'imranbhai', 23, '9099347803', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(201, 'zuberbhai', 33, '9722802373', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(202, 'amadbhai', 152, '7567131055', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(203, 'ashoka trailor', 68, '9638857368', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(204, 'asambhai', 51, '9998118219', '', '2016-09-17 00:00:00', '2016-09-17 00:00:00'),
(205, 'ashoka trailor', 68, '9638857368', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(206, 'Gujarat logistic', 111, '9824962888', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(207, 'Gunvantbhai', 4, '9925042179', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(208, 'Jayantikak', 68, '9825803929', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(209, 'Alabhai', 50, '9712294540', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(210, 'Kashim', 33, '9898104599', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(211, 'Mangalbhai', 105, '9974183193', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(212, 'Rajanbhai', 68, '9904103609', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(213, 'Motibhai', 50, '8000452999', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(214, 'Chiragbhai', 68, '9924888116', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(215, 'Ashishbhai', 25, '9979998535', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(216, 'Arifbhai', 142, '9173284056', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(217, 'lalabhai', 152, '9427734282', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(218, 'lalabhai', 152, '9427734282', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(219, 'Arvindbhai', 58, '9429186189', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(220, 'Jigneshbhai', 227, '9662909754', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(221, 'Jigneshbhai', 227, '9662909754', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(222, 'Abdulbhai', 141, '9594218614', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(223, 'Soyabbhai', 227, '9574737639', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(224, 'Dighubhai', 201, '9099058146', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(225, 'Makshudbhai', 50, '9879272786', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(226, 'JAGDISH BHAI', 128, '9426643820', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(227, 'Gafrubhaui', 50, '8128930929', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(228, 'VASHIMBHAI', 33, '8732902062', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(229, 'Amin Transpot', 39, '9913465650', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(230, 'Vijabhai', 200, '9925982443', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(231, 'Jakirbhai', 33, '9904433000', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(232, 'Jakirbhai', 33, '9904433000', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(233, 'Jashubhai', 43, '9909542074', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(234, 'jishanbhai', 4, '9898726167', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(235, 'islambhai', 30, '8732902803', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(236, 'islambhai', 30, '8732902803', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(237, 'shambhubhai', 68, '9727372615', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(238, 'jayrajbhai', 46, '9376764560', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(239, 'zuberbhai', 33, '9722802373', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(240, 'Nayanbhai', 26, '9909013123', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(241, 'Ghanshyamsinh', 201, '9712347775', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(242, 'Lalbhai', 53, '9925641717', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(243, 'Raghuvirsinh', 46, '8487990013', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(244, 'rajendrabhai', 46, '9825231106', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(245, 'rajendrabhai', 46, '9825231106', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(246, 'Shivkrupa transport', 4, '7405043108', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00'),
(247, 'Nandkishorbhai', 46, '9879204757', '', '2016-09-18 00:00:00', '2016-09-18 00:00:00');

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
(1, 'website_name', 'Transport System'),
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
(2, 'janak', 'janak', 'd474e18d75bd6c63018f690656c5399faa9f2548d921a6a6b3687b48e43cdf706', 'bsnfid@klj.sd', 'd0df51b0022bf464ff113eadbd3fe829', 1468080303, 0, 1, 'New Member', 1468080303, 1476952101);

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
