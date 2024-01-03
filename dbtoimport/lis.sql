-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 08:25 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lismw`
--

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discid` int(6) UNSIGNED NOT NULL,
  `discname` varchar(30) NOT NULL,
  `discpercent` float NOT NULL,
  `enabled` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discid`, `discname`, `discpercent`, `enabled`) VALUES
(1, 'Regular', 0, 'YES'),
(2, 'Senior Citizen', 20, 'YES'),
(3, 'Co-op', 15, ''),
(4, 'Government', 12, 'YES'),
(10, 'PWD', 20, 'YES'),
(11, 'STUDENT', 20, 'YES'),
(12, 'VIP', 100, ''),
(14, 'SPECIAL DISCOUNT', 5, 'YES'),
(15, 'Staff', 50, 'YES'),
(16, 'Sen. Citizen', 20, 'YES'),
(17, 'Family Member', 25, 'YES'),
(18, 'Discretionary Discount', 10, 'YES'),
(19, 'Religious Order', 20, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `groupperm`
--

CREATE TABLE `groupperm` (
  `grouppermid` int(6) NOT NULL,
  `grouppermname` varchar(30) NOT NULL,
  `groupdesc` varchar(50) NOT NULL,
  `groupmembers` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupperm`
--

INSERT INTO `groupperm` (`grouppermid`, `grouppermname`, `groupdesc`, `groupmembers`) VALUES
(1, 'addtest', 'Add Test', 'Admin'),
(2, 'adduser', 'Add User', 'Admin'),
(3, 'index', 'Index', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `labtest`
--

CREATE TABLE `labtest` (
  `labid` int(11) NOT NULL,
  `test` varchar(50) NOT NULL,
  `typeoftest` varchar(100) NOT NULL,
  `subtype` varchar(100) NOT NULL,
  `normalmin` varchar(30) NOT NULL,
  `normalmax` varchar(30) NOT NULL,
  `flag` varchar(3) NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labtest`
--

INSERT INTO `labtest` (`labid`, `test`, `typeoftest`, `subtype`, `normalmin`, `normalmax`, `flag`, `price`) VALUES
(25, 'Laboratory', 'Urinalysis', 'All Tests', 'NA', '', '', 50),
(277, 'Laboratory', 'Semen Analysis', ' ', 'NA', 'NA', '', 250),
(283, 'Laboratory', 'Hematology', 'CBC', 'NA', 'NA', '', 120),
(278, 'Laboratory', 'Special Tests', 'Anti HAV IgM (Qualitative)', 'NA', 'NA', '', 600),
(279, 'Laboratory', 'Special Tests', 'ASOT (Quantitative)', 'Less than 200 IU/ml', '', '', 200),
(280, 'Laboratory', 'Special Tests', 'Blood Typing', 'NA', 'NA', '', 150),
(50, 'Laboratory', 'Fecalysis', 'All Tests', 'NA', '', '', 50),
(95, 'Laboratory', 'Hematology', 'All Tests', 'NA', 'NA', '', 112),
(120, 'Ultrasound', 'CHEST', ' ', 'NA', '', '', 1120),
(121, 'Ultrasound', 'CHEST (WITH MAKER)', ' ', 'NA', '', '', 1520),
(122, 'Ultrasound', 'FETAL AGING', ' ', 'NA', '', '', 675),
(123, 'Ultrasound', 'FETAL AGING (TWINS)', ' ', 'NA', '', '', 896),
(124, 'Ultrasound', 'FETAL AGING WITH BIOPHYSICAL PROFILE (BPP)', ' ', 'NA', '', '', 1000),
(125, 'Ultrasound', 'FETAL AGING WITH BIOPHYSICAL PROFILE (BPP) (TWINS)', ' ', 'NA', '', '', 1568),
(126, 'Ultrasound', 'PELVIS', ' ', 'NA', '', '', 672),
(127, 'Ultrasound', 'HBT', ' ', 'NA', '', '', 1344),
(128, 'Ultrasound', 'HBT/PANCREAS', ' ', 'NA', '', '', 1456),
(129, 'Ultrasound', 'TRANSVAGINAL', ' ', 'NA', '', '', 896),
(130, 'Ultrasound', 'TRANSRECTAL', ' ', 'NA', '', '', 896),
(131, 'Ultrasound', 'WHOLE ABDOMEN', ' ', 'NA', '', '', 2000),
(132, 'Ultrasound', 'UPPER ABDOMEN ', ' ', 'NA', '', '', 1500),
(133, 'Ultrasound', 'LOWER ABDOMEN ', ' ', 'NA', '', '', 1568),
(134, 'Ultrasound', 'KIDNEY URINARY BLADDER (KUB)', ' ', 'NA', '', '', 1345),
(135, 'Ultrasound', 'THYROID', ' ', 'NA', '', '', 1344),
(136, 'Ultrasound', 'PROSTATE', ' ', 'NA', '', '', 895),
(137, 'Ultrasound', 'SCROTAL', ' ', 'NA', '', '', 1344),
(138, 'Ultrasound', 'BREAST', ' ', 'NA', '', '', 1478),
(139, 'Ultrasound', 'MASS EVALUATION', ' ', 'NA', '', '', 1344),
(140, 'Ultrasound', 'HBT WITH KIDNEYS', ' ', 'NA', '', '', 1792),
(141, 'Ultrasound', 'LIVER', ' ', 'NA', '', '', 1008),
(142, 'Ultrasound', 'KIDNEYS', ' ', 'NA', '', '', 1120),
(143, 'Ultrasound', 'GALLBLADER', ' ', 'NA', '', '', 672),
(144, 'Ultrasound', 'CRANIAL', ' ', 'NA', '', '', 1344),
(150, 'Roentgenological', 'KUB', ' ', 'NA', '', '', 448),
(151, 'Roentgenological', 'PELVIS ', 'AP', 'NA', '', '', 280),
(152, 'Roentgenological', 'PELVIS ', ' APL', 'NA', '', '', 560),
(153, 'Roentgenological', 'SPINE', 'LS Right and Left Oblique', 'NA', '', '', 549),
(154, 'Roentgenological', 'SPINE', 'Lumbosacral APL', 'NA', '', '', 840),
(155, 'Roentgenological', 'SPINE', 'Thoracolumbar APL', 'NA', '', '', 840),
(156, 'Roentgenological', 'SPINE', 'Thoracolumbar AP', 'NA', '', '', 420),
(157, 'Roentgenological', 'SPINE', 'Cervical APL with Right and Left Oblique', 'NA', '', '', 1098),
(158, 'Roentgenological', 'SPINE', 'Cervical APL', 'NA', '', '', 549),
(159, 'Roentgenological', 'SPINE', 'Cervical AP', 'NA', '', '', 280),
(160, 'Roentgenological', 'Air Cells', 'Mastoid Series', 'NA', '', '', 1120),
(161, 'Roentgenological', 'PNS', 'Waters View', 'NA', '', '', 280),
(162, 'Roentgenological', 'SKULL', 'Mandible APO', 'NA', '', '', 504),
(163, 'Roentgenological', 'PNS', 'Paranasal Sinuses (PNS)', 'NA', '', '', 896),
(164, 'Roentgenological', 'SKULL', 'Soft Tissue', 'NA', '', '', 280),
(165, 'Roentgenological', 'SKULL', 'Towns View', 'NA', '', '', 280),
(369, 'Roentgenological', 'Upper Extremities', 'OBL', 'NA', 'NA', '', 650),
(167, 'Roentgenological', 'Chest', 'LATERAL DECUBITUS', 'NA', '', '', 302),
(168, 'Roentgenological', 'SKULL', 'AP', 'NA', '', '', 269),
(169, 'Roentgenological', 'Chest', 'APICOLORDOTIC VIEW', 'NA', '', '', 250),
(170, 'Roentgenological', 'Chest', 'PAL', 'NA', '', '', 526),
(171, 'Roentgenological', 'Chest', 'Bucky', 'NA', '', '', 380),
(172, 'Roentgenological', 'Chest', 'PA', 'NA', '', '', 269),
(173, 'Roentgenological', 'Lower Extremities', ' APL', 'NA', '', '', 437),
(174, 'Roentgenological', 'Lower Extremities', 'PA', 'NA', '', '', 258),
(175, 'Roentgenological', 'Upper Extremities', 'PAL', 'NA', '', '', 392),
(176, 'Roentgenological', 'Upper Extremities', 'APL', 'NA', '', '', 650),
(177, 'Roentgenological', 'Upper Extremities', 'PA', 'NA', '', '', 258),
(178, 'Roentgenological', 'Upper Extremities', 'SHOULDER APO', 'NA', '', '', 448),
(179, 'Roentgenological', 'Upper Extremities', 'CLAVICLE APL', 'NA', '', '', 448),
(355, 'Laboratory', 'URINALYSIS', 'KOH', 'NA', 'NA', '', 78),
(231, 'Laboratory', 'Special Tests', 'TPSA (Quanti)', '0', '4 ng/ml', '', 1400),
(346, 'Laboratory', 'Hematology', 'HGB / HTC', 'NA', 'NA', '', 70),
(285, 'Laboratory', 'Hematology', 'CT BT', 'NA', 'NA', '', 50),
(286, 'Laboratory', 'Blood Chemistry', 'Lipid Profile Test', 'NA', 'NA', '', 500),
(287, 'Laboratory', 'Blood Chemistry', 'Cholesterol', 'NA', 'NA', '', 160),
(288, 'Laboratory', 'Blood Chemistry', 'Triglycerides', 'NA', 'NA', '', 170),
(289, 'Laboratory', 'Blood Chemistry', 'HDL LDL', 'NA', '', '', 300),
(290, 'Laboratory', 'Blood Chemistry', 'SGOT', 'NA', '', '', 200),
(291, 'Laboratory', 'Blood Chemistry', 'SGPT', 'NA', 'NA', '', 200),
(292, 'Laboratory', 'Blood Chemistry', 'Total Protein', 'NA', 'NA', '', 280),
(294, 'Laboratory', 'Blood Chemistry', 'Globulin', 'NA', 'NA', '', 336),
(295, 'Laboratory', 'Blood Chemistry', 'Alkaline Phosphatase', 'NA', 'NA', '', 250),
(296, 'Laboratory', 'Blood Chemistry', 'Amylase', 'NA', 'NA', '', 392),
(297, 'ECG', 'ECG 12 Leads', ' ', 'NA', 'NA', '', 340),
(298, 'ECG', 'ECG 15 Leads', ' ', 'NA', 'NA', '', 392),
(307, 'Laboratory', 'OGTT', 'Oral Glucose Tolerance Test (100g)', 'NA', 'NA', '', 650),
(299, 'ECG', 'ECG LL II', ' ', 'NA', 'NA', '', 440),
(300, 'ECG', 'ECG 15 leads + LL II', ' ', 'NA', 'NA', '', 448),
(301, 'Laboratory', 'Hematology', 'CBC (Man)', 'NA', 'NA', '', 90),
(308, 'Laboratory', 'OGTT', 'Oral Glucose Tolerance Test (75g)', 'NA', 'NA', '', 500),
(302, 'Laboratory', 'Hematology', 'Platelet Count', 'NA', 'NA', '', 70),
(303, 'Laboratory', 'Hematology', 'ESR', 'NA', 'NA', '', 150),
(304, 'Laboratory', 'Fecalysis', 'Occult Blood', 'NA', 'NA', '', 400),
(181, 'Laboratory', 'Blood Chemistry', 'FBS', 'NA', 'NA', '', 80),
(233, 'Laboratory', 'Special Tests', 'RPR', 'NA', 'NA', '', 250),
(332, 'Laboratory', 'Blood Chemistry', 'All Tests', 'NA', 'NA', '', 112),
(234, 'Laboratory', 'Special Tests', 'Reticulocyte Count', '0.5%', '1.5%', '', 120),
(235, 'Laboratory', 'Special Tests', 'C3', '90', '180mg/dL', '', 750),
(243, 'Laboratory', 'Special Tests', 'Chloride', '90.0', '107.0 mmol/L', '', 250),
(335, 'Laboratory', 'Electrolytes', 'Sodium, Potassium & Chloride', 'NA', 'NA', '', 750),
(310, 'Laboratory', 'Dengue Duo', 'All Tests', 'NA', 'NA', '', 1000),
(311, 'Laboratory', 'Special Tests', 'Oral Glucose Challenge Test (50g)', '7.15', '7.7 mmol/L', '', 308),
(259, 'Laboratory', 'Special Tests', 'HBA1c', '4.0', '5.7%', '', 900),
(305, 'Laboratory', 'PROTIME', 'All Test', '', '', '', 290),
(306, 'Laboratory', 'Differential Count', 'All Tests', '', '', '', 112),
(263, 'Laboratory', 'Special Tests', 'Gram Stain', 'NA', 'NA', '', 110),
(264, 'Laboratory', 'Special Tests', 'KOH', '', '', '', 130),
(375, 'Laboratory', 'Electrolytes', 'Sodium, Potassium, iCalcium & Chloride', 'NA', '', '', 1000),
(266, 'Laboratory', 'Special Tests', 'CRP', 'Less than 6 mg/L', '', '', 600),
(315, 'Laboratory', 'Blood Chemistry', 'Others', '6', '10', '', 112),
(293, 'Laboratory', 'Blood Chemistry', 'Albumin', 'NA', 'NA', '', 280),
(312, 'Laboratory', 'Blood Chemistry', 'Uric Acid', 'NA', 'NA', '', 140),
(313, 'Laboratory', 'Blood Chemistry', 'BUN (Blood Urea Nitrogen)', 'NA', 'NA', '', 120),
(314, 'Laboratory', 'Blood Chemistry', 'Creatinine', 'NA', 'NA', '', 110),
(316, 'Laboratory', 'Special Tests', 'Troponin I', 'NA', 'NA', '', 680),
(317, 'Laboratory', 'Hematology', 'CBC/PLATELET', 'NA', 'NA', '', 160),
(318, 'Laboratory', 'Special Tests', 'HBsAg (Qualitative)', 'NA', 'NA', '', 280),
(319, 'Laboratory', 'Special Tests', 'HBsAb (Qualitative)', 'NA', 'NA', '', 330),
(320, 'Laboratory', 'Special Tests', 'PBS', 'NA', 'NA', '', 350),
(321, 'Laboratory', 'Hematology', 'RETICULOCYTE CT', 'NA', 'NA', '', 120),
(322, 'Laboratory', 'Blood Chemistry', 'RBS', 'NA', 'NA', '', 90),
(323, 'Laboratory', 'Special Tests', 'PREGNANCY TEST', 'NA', 'NA', '', 220),
(324, 'Roentgenological', 'CHEST', 'SEMILORDOTIC', 'NA', 'NA', '', 280),
(325, 'Roentgenological', 'CHEST', 'RIGHT LATERAL', 'NA', 'NA', '', 269),
(326, 'Laboratory', 'Blood Chemistry', 'TPAG', 'NA', 'NA', '', 750),
(327, 'Laboratory', 'Electrolytes', 'All Tests', 'NA', 'NA', '', 100),
(328, 'Laboratory', 'Salmonella Typhi IgG and IgM', 'IgG and IgM Antibodies', 'NA', 'NA', '', 1000),
(329, 'Laboratory', 'T3, T4 and TSH', 'T3', '0.92', '2.33 nmol/L', '', 770),
(330, 'Laboratory', 'T3, T4 and TSH', 'T4', '60', '120 nmol/L', '', 770),
(331, 'Laboratory', 'T3, T4 and TSH', 'TSH', '0.5', '5.0 ulU/ml', '', 900),
(334, 'Roentgenological', 'Pelvimetry', ' ', 'NA', 'NA', '', 1064),
(336, 'Laboratory', 'Electrolytes', 'Sodium, Potassium & iCalcium', 'NA', 'NA', '', 750),
(337, 'Laboratory', 'Electrolytes', 'Sodium & Potassium', 'NA', 'NA', '', 500),
(338, 'Laboratory', 'Electrolytes', 'Sodium & iCalcium', 'NA', 'NA', '', 500),
(339, 'Laboratory', 'Electrolytes', 'Sodium & Chloride', 'NA', 'NA', '', 500),
(340, 'Laboratory', 'Electrolytes', 'Potassium & Chloride', 'NA', '', '', 500),
(341, 'Laboratory', 'Electrolytes', 'iCalcium', '', '', '', 250),
(357, 'Roentgenological', 'CHEST', 'AP', 'NA', 'NA', '', 250),
(343, 'Roentgenological', 'CHEST', 'PA', 'NA', 'NA', '', 400),
(344, 'Laboratory', 'Blood Chemistry', '2 Hour Postprandial Blood Sugar', '3.6', '6.6', '', 100),
(349, 'Laboratory', 'T3, T4 and TSH', 'T3 and T4', '', '', '', 1540),
(348, 'Laboratory', 'T3, T4 and TSH', 'T3, T4 and TSH', '', '', '', 2440),
(350, 'Laboratory', 'T3, T4 and TSH', 'T4 and TSH', '', '', '', 1670),
(351, 'Laboratory', 'T3, T4 and TSH', 'T3 AND TSH', '', '', '', 1670),
(352, 'Roentgenological', 'CHEST', 'PAL', 'NA', 'NA', '', 448),
(353, 'Laboratory', 'Electrolytes', 'Potassium & iCalcium', 'NA', 'NA', '', 500),
(358, 'Roentgenological', 'CHEST', 'AP', 'NA', 'NA', '', 258),
(359, 'Roentgenological', 'CHEST', 'APL', 'NA', 'NA', '', 526),
(360, 'Roentgenological', 'CHEST', 'APL', 'NA', 'NA', '', 450),
(361, 'Roentgenological', 'Lower Extremities', 'APO', 'NA', 'NA', '', 437),
(362, 'Roentgenological', 'UPPER EXTREMITIES', ' AP', 'NA', 'NA', '', 258),
(363, 'Roentgenological', 'UPPER EXTREMITIES', 'LAT', 'NA', 'NA', '', 280),
(364, 'Roentgenological', 'UPPER EXTREMITIES', 'OBLIQUE', 'NA', 'NA', '', 258),
(365, 'Roentgenological', 'Lower Extremities', 'AP', 'NA', 'NA', '', 280),
(366, 'Roentgenological', 'Lower Extremities', 'LAT', 'NA', 'NA', '', 258),
(367, 'Roentgenological', 'Lower Extremities', 'OBLIQUE', 'NA', 'NA', '', 258),
(368, 'Roentgenological', 'Skull', 'APL', 'NA', 'NA', '', 538),
(370, 'Roentgenological', 'Upper Extremities', 'APL', 'NA', 'NA', '', 392),
(371, 'Roentgenological', 'Upper Extremities', 'APO', 'NA', 'NA', '', 392),
(373, 'Laboratory', 'Special Tests', '1 Hour Postprandial Blood Sugar', '7.8', '', '', 100),
(377, 'Laboratory', 'FT3 and FT4', 'FT3', '', '', '', 810),
(378, 'Laboratory', 'FT3 and FT4', 'FT4', '', '', '', 810),
(379, 'Laboratory', 'FT3 and FT4', 'FT3 and FT4', '', '', '', 1620),
(381, 'Laboratory', 'Special Tests', 'H. Pylori', 'NA', 'NA', '', 400),
(386, 'Laboratory', 'Special Test', 'FT3 FT4', '', '', '', 1620),
(383, 'Laboratory', 'Electrolytes', 'Serum Sodium', '', '', '', 250),
(384, 'Laboratory', 'Electrolytes', 'Serum Potassium', '', '', '', 250),
(385, 'Laboratory', 'Special Test', 'RPR', '', '', '', 200),
(387, 'Laboratory', 'APTT', 'All Test', 'NA', 'NA', '', 1000),
(388, 'Laboratory', 'Special Test', 'Anti-HBsAg (Quantitative)', '', '', '', 330),
(389, 'Laboratory', 'Electrolytes', 'Total Calcium', '', '', '', 250),
(390, 'Roentgenological', 'chest PA', 'upright', '', '', '', 250);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientid` int(11) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `mi` varchar(3) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `bday` varchar(25) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `civil_status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientid`, `lastname`, `firstname`, `mi`, `address`, `mobile`, `bday`, `sex`, `civil_status`) VALUES
(1, 'Sample', 'Test', 'L', 'NYC, NYC', '09184561234', '1980-04-14', 'Male', 'Single'),
(2, 'Test', 'Sample', 'D', 'LA, California', '09952502119', '2000-05-16', 'Male', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `resulttemps`
--

CREATE TABLE `resulttemps` (
  `tempid` int(4) NOT NULL,
  `temptype` text NOT NULL,
  `tempname` text NOT NULL,
  `tempresult` varchar(2000) NOT NULL,
  `tempimpression` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `patient` varchar(48) NOT NULL,
  `particular` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `rem` varchar(10) NOT NULL,
  `patientid` int(11) NOT NULL,
  `month` int(2) NOT NULL,
  `day` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `sdiscid` int(6) NOT NULL,
  `sdiscname` varchar(20) NOT NULL,
  `sdiscpercent` float NOT NULL,
  `otherdiscount` float NOT NULL,
  `discount` float NOT NULL,
  `patientinout` varchar(15) NOT NULL,
  `payment` double NOT NULL,
  `balance` float NOT NULL,
  `gross` float NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `patient`, `particular`, `amount`, `rem`, `patientid`, `month`, `day`, `year`, `sdiscid`, `sdiscname`, `sdiscpercent`, `otherdiscount`, `discount`, `patientinout`, `payment`, `balance`, `gross`, `cdate`) VALUES
(1, 'Sample, Test L', 'Laboratory', 150, 'Paid', 1, 5, 15, 2019, 0, '', 0, 0, 0, 'Out Patient', 150, 0, 150, '2019-05-15'),
(2, 'Test, Sample L', 'Laboratory', 120, 'Paid', 1, 5, 15, 2019, 0, '', 0, 0, 0, 'Out Patient', 120, 0, 120, '2019-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `testid` int(11) NOT NULL,
  `patientid` varchar(12) NOT NULL,
  `labtestid` varchar(12) NOT NULL,
  `specimen` varchar(2000) NOT NULL,
  `result` varchar(2000) NOT NULL,
  `note` varchar(2000) NOT NULL,
  `dateordered` varchar(25) NOT NULL,
  `datereceived` varchar(25) NOT NULL,
  `daterelease` varchar(25) NOT NULL,
  `price` double NOT NULL,
  `requestingphysician` varchar(30) NOT NULL,
  `medtech` varchar(80) NOT NULL,
  `pathologist` varchar(80) NOT NULL,
  `salesid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`testid`, `patientid`, `labtestid`, `specimen`, `result`, `note`, `dateordered`, `datereceived`, `daterelease`, `price`, `requestingphysician`, `medtech`, `pathologist`, `salesid`) VALUES
(1, '1', '314', '1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;16;17;18;19;20;21;;;;;;;;', '-', '', '2019-05-15', '2019-05-15', '2019-05-15', 150, 'NA', 'June I. Test - RMT: Lic# 002849', 'Dr. Ana Maria C. Loso M,D.: Lic# 1595972', 1),
(2, '1', '283', '1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;;;;;;;;', '-', '', '2019-05-15', '2019-05-15', '2019-05-15', 120, 'NA', 'Test K. Cases - RMT: Lic# 002849', 'Dr. Ana Maria C. Loso M,D.: Lic# 1595972', 2),;
INSERT INTO `test` (`testid`, `patientid`, `labtestid`, `specimen`, `result`, `note`, `dateordered`, `datereceived`, `daterelease`, `price`, `requestingphysician`, `medtech`, `pathologist`, `salesid`) VALUES
(310, '97', '25', 'yellow;clear;5.0;1.025;Negative;Negative;5-10;0-2;;;;none;none;none;none;none;few;none;none;few;few;few;none;;;', 'N/A', '', '2019-06-06', '2019-06-06', '2019-06-06', 50, 'N/A', 'Therese Marie D. Singabol - RMT: Lic# 0032578', '', 122),
(311, '97', '357', '', '', '', '2019-06-06', '2019-06-06', '', 250, 'N/A', '', '', 123);

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `groupid` int(11) NOT NULL,
  `groupname` varchar(20) NOT NULL,
  `group_perm` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`groupid`, `groupname`, `group_perm`) VALUES
(1, 'admin', 'Admin'),
(2, 'medtech', 'Med Tech'),
(3, 'frontdesk', 'Front Desk'),
(4, 'cashier', 'Cashier'),
(5, 'pathologist', 'Pathologist'),
(6, 'sonologist', 'Sonologist'),
(7, 'radiologist', 'Radiologist');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(64) NOT NULL,
  `prev` varchar(35) NOT NULL,
  `lastlogin` varchar(30) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `title` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `prev`, `lastlogin`, `fullname`, `title`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '2019-06-06 08:13:21', 'admin default', 'Admin'),
(2, 'front', 'e6ec529ba185279aa0adcf93e645c7cd', 'Front Desk', '2019-03-06 09:40:40', 'Front Desk', 'Front Desk'),
(3, 'medtech', 'da2550f00907e1601628524200439e35', 'Med Tech', '2019-17-05 14:49:43', 'Med Tech', 'Med Tech'),
(9, 'cashier', '6ac2470ed8ccf204fd5ff89b32a355cf', 'Cashier', '2019-03-06 09:45:47', 'Cashier', 'Cashier'),
(10, 'pathologist', '81dc9bdb52d04dc20036dbd8313ed055', 'Pathologist', '2017-17-06 14:35:48', 'Pathologist', 'Pathologist'),
(11, 'sonologist', '81dc9bdb52d04dc20036dbd8313ed055', 'Sonologist', '2018-11-07 05:38:47', 'Sonologist', 'Sonologist'),
(12, 'radiologist', '81dc9bdb52d04dc20036dbd8313ed055', 'Radiologist', '2017-14-06 16:03:18', 'Radiologist', 'Radiologist'),
(16, 'eina', '775727b4b4e8354792e8df88c767574c', 'Front Desk', '2019-22-05 15:08:03', 'Eina Jannica', 'Pharmacist'),
(17, 'Paul', '9a4e4d238ed53a04b295a92ce6a17abb', 'Admin', '2019-06-06 07:58:01', 'Admin Personnel', 'Authorized Personnel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discid`);

--
-- Indexes for table `groupperm`
--
ALTER TABLE `groupperm`
  ADD PRIMARY KEY (`grouppermid`);

--
-- Indexes for table `labtest`
--
ALTER TABLE `labtest`
  ADD PRIMARY KEY (`labid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientid`),
  ADD KEY `lastname` (`lastname`);

--
-- Indexes for table `resulttemps`
--
ALTER TABLE `resulttemps`
  ADD PRIMARY KEY (`tempid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patientid` (`patientid`),
  ADD KEY `sdiscid` (`sdiscid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testid`),
  ADD KEY `patientid` (`patientid`),
  ADD KEY `labtest` (`labtestid`),
  ADD KEY `salesid` (`salesid`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`groupid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `groupperm`
--
ALTER TABLE `groupperm`
  MODIFY `grouppermid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `labtest`
--
ALTER TABLE `labtest`
  MODIFY `labid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `resulttemps`
--
ALTER TABLE `resulttemps`
  MODIFY `tempid` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=603;
--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
