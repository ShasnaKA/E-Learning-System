-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2020 at 08:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblearn`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `FILES`
-- (See below for the actual view)
--
CREATE TABLE `FILES` (
`testname` varchar(50)
,`testdesc` varchar(200)
,`test_answr` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `tblAssignmark`
--

CREATE TABLE `tblAssignmark` (
  `assignmrkgid` int(11) NOT NULL,
  `assignmrkassignid` int(11) NOT NULL,
  `assignmrkgstudid` int(11) NOT NULL,
  `assignmrkid` int(11) NOT NULL,
  `assignmrk` int(11) NOT NULL,
  `assignmrkstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblAssignmark`
--

INSERT INTO `tblAssignmark` (`assignmrkgid`, `assignmrkassignid`, `assignmrkgstudid`, `assignmrkid`, `assignmrk`, `assignmrkstatus`) VALUES
(1, 1, 2, 1, 10, 1),
(1, 4, 1, 2, 0, 1),
(1, 4, 2, 3, 10, 1),
(1, 1, 1, 4, 0, 1),
(11, 6, 10, 5, 0, 1),
(11, 6, 6, 6, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblAssignment`
--

CREATE TABLE `tblAssignment` (
  `assigngid` int(11) NOT NULL,
  `assignid` int(11) NOT NULL,
  `assignname` varchar(50) NOT NULL,
  `assigndesc` varchar(200) NOT NULL,
  `assignmax` int(11) NOT NULL,
  `assigndate` date NOT NULL,
  `assigntime` time NOT NULL,
  `assignattach` varchar(200) DEFAULT NULL,
  `assignattachpath` varchar(200) DEFAULT NULL,
  `assignstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblAssignment`
--

INSERT INTO `tblAssignment` (`assigngid`, `assignid`, `assignname`, `assigndesc`, `assignmax`, `assigndate`, `assigntime`, `assignattach`, `assignattachpath`, `assignstatus`) VALUES
(1, 1, 'Banking Program', ' Submit Program on Bank Transactions and upload in pdf', 10, '2020-10-29', '16:00:00', NULL, NULL, 1),
(1, 2, 'Factorial Program', ' Do a Program to find Factorial of a number', 10, '2020-10-24', '22:00:00', 'FactorialDemo.docx', 'assignments/FactorialDemo.docx', -1),
(1, 4, 'Applet Program', 'Do Applet Program attached here and upload its outputs', 10, '2020-11-14', '11:00:00', 'assign.pdf', 'assignments/assign.pdf', 1),
(11, 6, 'Networks2', 'jhkjk', 10, '2020-11-01', '09:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblContactus`
--

CREATE TABLE `tblContactus` (
  `cemail` varchar(50) NOT NULL,
  `msg` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblContactus`
--

INSERT INTO `tblContactus` (`cemail`, `msg`) VALUES
('my@gmail.com', 'Need Some Technical Assistance');

-- --------------------------------------------------------

--
-- Table structure for table `tblCourse`
--

CREATE TABLE `tblCourse` (
  `instemail` varchar(50) NOT NULL,
  `depid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `coursestatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblCourse`
--

INSERT INTO `tblCourse` (`instemail`, `depid`, `cid`, `cname`, `coursestatus`) VALUES
('mes@gmail.com', 3, 1, 'BCA', 1),
('mes@gmail.com', 5, 2, 'Bcom CA', 1),
('mes@gmail.com', 3, 3, 'Bsc IT', 1),
('depaul@gmail.com', 4, 4, 'BA English', 1),
('depaul@gmail.com', 4, 5, 'BA Literature', 1),
('mes@gmail.com', 5, 8, 'Bcom Marketing', -1),
('mes@gmail.com', 5, 11, 'Bcom Taxation', -1),
('depaul@gmail.com', 3, 12, 'BCA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblDepartment`
--

CREATE TABLE `tblDepartment` (
  `depid` int(11) NOT NULL,
  `depname` varchar(50) NOT NULL,
  `depstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblDepartment`
--

INSERT INTO `tblDepartment` (`depid`, `depname`, `depstatus`) VALUES
(2, 'Management Dept', -1),
(3, 'Computer Science Dept', 1),
(4, 'English Dept', 1),
(5, 'Commerce Dept', 1),
(10, 'Biology Dept', 1),
(14, 'Electronics Dept', -1),
(25, 'Psychology Dept', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblFeedback`
--

CREATE TABLE `tblFeedback` (
  `feedbackemail` varchar(50) NOT NULL,
  `feedbackid` int(11) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblFeedback`
--

INSERT INTO `tblFeedback` (`feedbackemail`, `feedbackid`, `feedback`) VALUES
('shasna@gmail.com', 16, 'Good'),
('sam@gmail.com', 17, 'Very Helpful for academics');

-- --------------------------------------------------------

--
-- Table structure for table `tblGroup`
--

CREATE TABLE `tblGroup` (
  `ginstemail` varchar(50) NOT NULL,
  `gsubjid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `g_host_email` varchar(50) NOT NULL,
  `gstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblGroup`
--

INSERT INTO `tblGroup` (`ginstemail`, `gsubjid`, `gid`, `gname`, `g_host_email`, `gstatus`) VALUES
('mes@gmail.com', 1, 1, 'S-5 Java', 'roshna@gmail.com', 1),
('mes@gmail.com', 14, 6, 'Graphics', 'roshna@gmail.com', 1),
('mes@gmail.com', 2, 11, 'C.Ntwrk', 'shifaz@gmail.com', 1),
('mes@gmail.com', 4, 12, 'S3-DS', 'sadiya@gmail.com', 1),
('mes@gmail.com', 6, 13, 'S4 Linx', 'sadiya@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblGroupstud`
--

CREATE TABLE `tblGroupstud` (
  `sgid` int(11) NOT NULL,
  `gstudid` int(11) NOT NULL,
  `gstudemail` varchar(50) NOT NULL,
  `gstudstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblGroupstud`
--

INSERT INTO `tblGroupstud` (`sgid`, `gstudid`, `gstudemail`, `gstudstatus`) VALUES
(1, 1, 'anu@gmail.com', 1),
(1, 2, 'sneha@gmail.com', 1),
(11, 6, 'sneha@gmail.com', 1),
(12, 7, 'ben@gmail.com', 1),
(11, 10, 'anu@gmail.com', 1),
(6, 12, 'ben@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblHOD`
--

CREATE TABLE `tblHOD` (
  `HODinstemail` varchar(50) NOT NULL,
  `HODdepid` int(11) NOT NULL,
  `HODemail` varchar(50) NOT NULL,
  `HODname` varchar(50) NOT NULL,
  `HODqualf` varchar(50) NOT NULL,
  `HODcontact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblHOD`
--

INSERT INTO `tblHOD` (`HODinstemail`, `HODdepid`, `HODemail`, `HODname`, `HODqualf`, `HODcontact`) VALUES
('mes@gmail.com', 5, 'deepa@gmail.com', 'Deepa', 'PG', 9865785478),
('mes@gmail.com', 10, 'kavitha@gmail.com', 'Kavitha Alexander', 'PG', 7689678769),
('mes@gmail.com', 3, 'reseena@gmail.com', 'Reseena', 'PG', 7989678768),
('depaul@gmail.com', 4, 'shali@gmail.com', 'Shali Joseph', 'Others', 9889678769),
('mes@gmail.com', 5, 'shiny@gmail.com', 'Shiny Thomas', 'Degree', 9289678769);

-- --------------------------------------------------------

--
-- Table structure for table `tblInstitution`
--

CREATE TABLE `tblInstitution` (
  `instemail` varchar(50) NOT NULL,
  `instname` varchar(50) NOT NULL,
  `instaddress` varchar(50) NOT NULL,
  `instprinc` varchar(50) NOT NULL,
  `instcontact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblInstitution`
--

INSERT INTO `tblInstitution` (`instemail`, `instname`, `instaddress`, `instprinc`, `instcontact`) VALUES
('bharathmatha@gmail.com', 'Bharathmatha', 'Thrikkakara', 'Xavier Jacob', 9889766544),
('depaul@gmail.com', 'Depaul', 'Angamaly', 'Joseph Mathew', 9876987665),
('jaibharath@gmail.com', 'Jai Bharath', 'Ernakulam', 'Rajesh ', 9847632178),
('kmm@gmail.com', 'KMM', 'Thrikkakara', 'Jason ', 9879765897),
('maharajas@gmail.com', 'Maharajas', 'Ernakulam', 'Gokul ', 9847632178),
('mes@gmail.com', 'Mes', 'Kunnukara Paravur', 'Ahmed Khan', 9746234137),
('rajagiri@gmail.com', 'Rajagiri', 'Kakkanad', 'John Xavier', 9876543211),
('sngist@gmail.com', 'SNGIST', 'Paravur', 'Jaison', 9876987665);

-- --------------------------------------------------------

--
-- Table structure for table `tblLogin`
--

CREATE TABLE `tblLogin` (
  `uname` varchar(50) NOT NULL,
  `pswd` varchar(20) NOT NULL,
  `utype` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblLogin`
--

INSERT INTO `tblLogin` (`uname`, `pswd`, `utype`, `status`) VALUES
('mes@gmail.com', 'mes123', 'institution', 1),
('depaul@gmail.com', 'depaul123', 'institution', 1),
('roshan@gmail.com', 'roshan123', 'xstudent', 1),
('rajagiri@gmail.com', 'rajagiri123', 'institution', 1),
('sngist@gmail.com', 'sngist123', 'institution', 0),
('sneha@gmail.com', 'sneha123', 'student', 1),
('anu@gmail.com', 'anu123', 'student', 1),
('admin@gmail.com', 'admin123', 'admin', 1),
('sreya@gmail.com', 'sreya123', 'xtutor', 1),
('merlin@gmail.com', 'merlin123', 'xtutor', 1),
('sumayya@gmail.com', 'sumayya123', 'xtutor', 1),
('rahul@gmail.com', 'rahul123', 'xstudent', 1),
('rohit@gmail.com', 'rohit123', 'xstudent', -1),
('roshna@gmail.com', 'roshna123', 'teacher', 1),
('reseena@gmail.com', 'reseena123', 'HOD', 1),
('shali@gmail.com', 'shali123', 'HOD', 1),
('shiny@gmail.com', 'shiny123', 'HOD', -1),
('deepa@gmail.com', 'deepa123', 'HOD', 1),
('gilsy@gmail.com', 'gilsy123', 'teacher', 0),
('jaibharath@gmail.com', 'jaibharath123', 'institution', 0),
('bharathmatha@gmail.com', 'bharathmatha123', 'institution', 1),
('maharajas@gmail.com', 'maharajas123', 'institution', -1),
('rodwin@gmail.com', 'rodwin123', 'xtutor', 0),
('anfuz@gmail.com', 'anfuz123', 'xstudent', 1),
('anju@gmail.com', 'anju123', 'student', 1),
('rithika@gmail.com', 'rithika123', 'xtutor', -1),
('raj@gmail.com', 'raj123', 'xstudent', 0),
('swapna@gmail.com', 'swapna123', 'teacher', 1),
('kavitha@gmail.com', 'kavitha123', 'HOD', 0),
('balu@gmail.com', 'balu123', 'student', 1),
('aarya@gmail.com', 'aarya123', 'student', 1),
('sadiya@gmail.com', 'sadiya123', 'teacher', 1),
('shifaz@gmail.com', 'shifaz123', 'teacher', 1),
('ben@gmail.com', 'ben123', 'student', 1),
('shasna@gmail.com', 'shasna123', 'xtutor', 0),
('$xtutoremail', '$xtutorpswd', 'xtutor', 0),
('xt@gmail.com', 'xt123', 'xtutor', 0),
('xtt@gmail.com', 'xtt123', 'xtutor', 0),
('xt@gmail.com', 'xt123', 'xtutor', 0),
('xt@gmail.com', 'xt123', 'xtutor', 0),
('kmm@gmail.com', 'kmm123', 'institution', -1);

-- --------------------------------------------------------

--
-- Table structure for table `tblMaterial`
--

CREATE TABLE `tblMaterial` (
  `mtrlgid` int(11) NOT NULL,
  `mtrlid` int(11) NOT NULL,
  `mtrlname` varchar(50) NOT NULL,
  `mtrldate` date NOT NULL,
  `attchmtrl` varchar(50) NOT NULL,
  `attchmtrlpath` varchar(200) NOT NULL,
  `mtrlstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblMaterial`
--

INSERT INTO `tblMaterial` (`mtrlgid`, `mtrlid`, `mtrlname`, `mtrldate`, `attchmtrl`, `attchmtrlpath`, `mtrlstatus`) VALUES
(1, 1, 'Java Threads', '2020-09-22', 'project.txt', 'materials/project.txt', 1),
(1, 2, 'adi', '2020-09-28', '18.e-certificate(nss).pdf', 'materials/18.e-certificate(nss).pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblRating`
--

CREATE TABLE `tblRating` (
  `ratingemail` varchar(50) NOT NULL,
  `ratingid` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblRating`
--

INSERT INTO `tblRating` (`ratingemail`, `ratingid`, `rating`) VALUES
('shasna@gmail.com', 1, 3),
('sam@gmail.com', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblReportstatus`
--

CREATE TABLE `tblReportstatus` (
  `rprtinst` varchar(50) NOT NULL,
  `rprtcid` int(11) NOT NULL,
  `rprtsem` varchar(50) NOT NULL,
  `rprtsubjid` int(11) NOT NULL,
  `rprtgid` int(11) NOT NULL,
  `rprtid` int(11) NOT NULL,
  `teach_rprtstatus` int(11) NOT NULL,
  `HOD_rprtstatus` int(11) NOT NULL,
  `rowstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblReportstatus`
--

INSERT INTO `tblReportstatus` (`rprtinst`, `rprtcid`, `rprtsem`, `rprtsubjid`, `rprtgid`, `rprtid`, `teach_rprtstatus`, `HOD_rprtstatus`, `rowstatus`) VALUES
('mes@gmail.com', 1, 'Semester 5', 1, 1, 6, 1, 0, 1),
('mes@gmail.com', 1, 'Semester 5', 2, 11, 7, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblResult`
--

CREATE TABLE `tblResult` (
  `rsltinst` varchar(50) NOT NULL,
  `rsltcid` int(11) NOT NULL,
  `rsltsem` varchar(50) NOT NULL,
  `rsltsubjid` int(11) NOT NULL,
  `rsltgid` int(11) NOT NULL,
  `rsltgstudid` int(11) NOT NULL,
  `rsltid` int(11) NOT NULL,
  `testconv` int(11) NOT NULL,
  `assignconv` int(11) NOT NULL,
  `totalconv` int(11) NOT NULL,
  `rsltstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblResult`
--

INSERT INTO `tblResult` (`rsltinst`, `rsltcid`, `rsltsem`, `rsltsubjid`, `rsltgid`, `rsltgstudid`, `rsltid`, `testconv`, `assignconv`, `totalconv`, `rsltstatus`) VALUES
('mes@gmail.com', 1, 'Semester 5', 1, 1, 1, 9, 6, 0, 6, 'FAILED'),
('mes@gmail.com', 1, 'Semester 5', 1, 1, 2, 10, 10, 10, 20, 'PASSED'),
('mes@gmail.com', 1, 'Semester 5', 2, 11, 1, 11, 0, 0, 0, 'FAILED'),
('mes@gmail.com', 1, 'Semester 5', 2, 11, 2, 12, 0, 0, 0, 'FAILED');

-- --------------------------------------------------------

--
-- Table structure for table `tblStudent`
--

CREATE TABLE `tblStudent` (
  `studinstemail` varchar(50) NOT NULL,
  `studcid` int(11) NOT NULL,
  `studsem` varchar(50) NOT NULL,
  `studemail` varchar(50) NOT NULL,
  `studreg` bigint(20) NOT NULL,
  `studname` varchar(50) NOT NULL,
  `studcontact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblStudent`
--

INSERT INTO `tblStudent` (`studinstemail`, `studcid`, `studsem`, `studemail`, `studreg`, `studname`, `studcontact`) VALUES
('depaul@gmail.com', 4, 'Semester 5', 'aarya@gmail.com', 180021094124, 'Aarya', 9872378798),
('depaul@gmail.com', 5, 'Semester 3', 'anju@gmail.com', 180021067343, 'Anju', 9876878798),
('mes@gmail.com', 1, 'Semester 5', 'anu@gmail.com', 180021094552, 'Anu', 9876878798),
('mes@gmail.com', 2, 'Semester 3', 'aslam@gmail.com', 180021095632, 'Aslam', 9898676892),
('mes@gmail.com', 3, 'Semester 5', 'balu@gmail.com', 180021094565, 'Balu', 9876878798),
('mes@gmail.com', 1, 'Semester 3', 'ben@gmail.com', 180042093403, 'Ben', 9972378797),
('mes@gmail.com', 1, 'Semester 5', 'sneha@gmail.com', 180021094567, 'Sneha', 9876878799);

-- --------------------------------------------------------

--
-- Table structure for table `tblSubject`
--

CREATE TABLE `tblSubject` (
  `subjinstemail` varchar(50) NOT NULL,
  `subjcid` int(11) NOT NULL,
  `subjsem` varchar(50) NOT NULL,
  `subjid` int(11) NOT NULL,
  `subjname` varchar(50) NOT NULL,
  `subjstatus` int(11) NOT NULL,
  `subjteachemail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblSubject`
--

INSERT INTO `tblSubject` (`subjinstemail`, `subjcid`, `subjsem`, `subjid`, `subjname`, `subjstatus`, `subjteachemail`) VALUES
('mes@gmail.com', 1, 'Semester 5', 1, 'Java Using Linux', 1, 'roshna@gmail.com'),
('mes@gmail.com', 1, 'Semester 5', 2, 'Computer Networks', 1, 'shifaz@gmail.com'),
('mes@gmail.com', 1, 'Semester 5', 3, 'Accountancy', -1, NULL),
('mes@gmail.com', 1, 'Semester 3', 4, 'Data Structures', 1, 'sadiya@gmail.com'),
('mes@gmail.com', 1, 'Semester 3', 5, 'Operating System', 1, NULL),
('mes@gmail.com', 1, 'Semester 4', 6, 'Linux Administration', 1, 'sadiya@gmail.com'),
('depaul@gmail.com', 4, 'Semester 5', 7, 'Main Course', 1, NULL),
('depaul@gmail.com', 12, 'Semester 1', 8, 'C Programming', 1, NULL),
('depaul@gmail.com', 4, 'Semester 5', 9, 'Snapshot(Drama)', 1, NULL),
('mes@gmail.com', 1, 'Semester 3', 13, 'Microprocessor', -1, NULL),
('mes@gmail.com', 1, 'Semester 3', 14, 'Computer Graphics', 1, 'roshna@gmail.com'),
('mes@gmail.com', 2, 'Semester 3', 15, 'Information Technology', 1, 'roshna@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblSubmassign`
--

CREATE TABLE `tblSubmassign` (
  `submassign_gid` int(11) NOT NULL,
  `submassign_gstudid` int(11) NOT NULL,
  `subm_assignid` int(11) NOT NULL,
  `assign_answr_id` int(11) NOT NULL,
  `assign_answr` varchar(200) NOT NULL,
  `assign_answr_path` varchar(200) NOT NULL,
  `assign_answr_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblSubmassign`
--

INSERT INTO `tblSubmassign` (`submassign_gid`, `submassign_gstudid`, `subm_assignid`, `assign_answr_id`, `assign_answr`, `assign_answr_path`, `assign_answr_status`) VALUES
(1, 2, 1, 2, '1543380.jpg', 'submassign/1543380.jpg', 1),
(1, 2, 4, 3, 'Java static quest.pdf', 'submassign/Java static quest.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblSubmtest`
--

CREATE TABLE `tblSubmtest` (
  `submtest_gid` int(11) NOT NULL,
  `submtest_gstudid` int(11) NOT NULL,
  `subm_testid` int(11) NOT NULL,
  `test_answr_id` int(11) NOT NULL,
  `test_answr` varchar(200) NOT NULL,
  `test_answr_path` varchar(200) NOT NULL,
  `test_answr_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblSubmtest`
--

INSERT INTO `tblSubmtest` (`submtest_gid`, `submtest_gstudid`, `subm_testid`, `test_answr_id`, `test_answr`, `test_answr_path`, `test_answr_status`) VALUES
(11, 6, 7, 7, 'ITx.pdf', 'submtest/ITx.pdf', 1),
(1, 2, 6, 8, 'ans1java.pdf', 'submtest/ans1java.pdf', 1),
(1, 1, 4, 9, 'Java static quest.pdf', 'submtest/Java static quest.pdf', 1),
(1, 2, 4, 11, 'ITx2.pdf', 'submtest/ITx2.pdf', 1),
(1, 1, 11, 13, 'project.txt', 'submtest/project.txt', 1),
(1, 2, 11, 14, 'ITx.pdf', 'submtest/ITx.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblTeacher`
--

CREATE TABLE `tblTeacher` (
  `teachinstemail` varchar(50) NOT NULL,
  `teachdepid` int(11) NOT NULL,
  `teachemail` varchar(50) NOT NULL,
  `teachname` varchar(50) NOT NULL,
  `teachqualf` varchar(50) NOT NULL,
  `teachcontact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblTeacher`
--

INSERT INTO `tblTeacher` (`teachinstemail`, `teachdepid`, `teachemail`, `teachname`, `teachqualf`, `teachcontact`) VALUES
('mes@gmail.com', 3, 'gilsy@gmail.com', 'Gilsy', 'PG', 9988656540),
('mes@gmail.com', 3, 'roshna@gmail.com', 'Roshna', 'PG', 9988656541),
('mes@gmail.com', 3, 'sadiya@gmail.com', 'Sadiya', 'PG', 9988656532),
('mes@gmail.com', 3, 'shifaz@gmail.com', 'Shifaz', 'B-Tech', 9988656765),
('mes@gmail.com', 5, 'swapna@gmail.com', 'Swapna', 'PG', 9988656640);

-- --------------------------------------------------------

--
-- Table structure for table `tblTest`
--

CREATE TABLE `tblTest` (
  `testgid` int(11) NOT NULL,
  `testid` int(11) NOT NULL,
  `testname` varchar(50) NOT NULL,
  `testdesc` varchar(200) NOT NULL,
  `testdate` date NOT NULL,
  `teststarttime` time NOT NULL,
  `testendtime` time NOT NULL,
  `testmax` int(11) NOT NULL,
  `qpaper` varchar(50) DEFAULT NULL,
  `qpaperpath` varchar(100) DEFAULT NULL,
  `teststatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblTest`
--

INSERT INTO `tblTest` (`testgid`, `testid`, `testname`, `testdesc`, `testdate`, `teststarttime`, `testendtime`, `testmax`, `qpaper`, `qpaperpath`, `teststatus`) VALUES
(1, 4, 'Java Packages', 'Learn Package creation and Access Controls', '2020-10-30', '13:00:00', '23:30:00', 40, NULL, NULL, 1),
(1, 6, 'Static Keyword', 'Learn Static variables,methods', '2020-10-20', '21:00:00', '23:49:00', 30, 'Java static quest.pdf', 'tests/Java static quest.pdf', 1),
(11, 7, 'OSI Model', 'OSI Reference Model Layer Structure', '2020-10-18', '12:08:00', '13:30:00', 20, 'Questions.pdf', 'tests/Questions.pdf', 1),
(11, 9, 'Transmission Impairment', 'Learn Transmission Impairment', '2020-10-01', '09:00:00', '10:00:00', 10, NULL, NULL, 1),
(1, 11, 'Check', 'abcd', '2020-11-14', '09:30:00', '11:30:00', 10, 'ans1java.pdf', 'tests/ans1java.pdf', 1),
(6, 13, 'grphics', 'jghjghj', '2020-12-24', '09:00:00', '10:00:00', 20, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblTestmark`
--

CREATE TABLE `tblTestmark` (
  `testmrkgid` int(11) NOT NULL,
  `testmrktestid` int(11) NOT NULL,
  `testmrkgstudid` int(11) NOT NULL,
  `testmrkid` int(11) NOT NULL,
  `testmrk` int(11) NOT NULL,
  `testmrkstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblTestmark`
--

INSERT INTO `tblTestmark` (`testmrkgid`, `testmrktestid`, `testmrkgstudid`, `testmrkid`, `testmrk`, `testmrkstatus`) VALUES
(1, 4, 1, 1, 40, 1),
(1, 4, 2, 4, 40, 1),
(1, 11, 2, 14, 10, 1),
(1, 6, 1, 15, 0, 1),
(1, 6, 2, 17, 29, 1),
(1, 11, 1, 18, 10, 1),
(11, 7, 6, 19, 18, 1),
(11, 7, 10, 20, 0, 1),
(11, 9, 10, 21, 0, 1),
(11, 9, 6, 22, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblXAssignmark`
--

CREATE TABLE `tblXAssignmark` (
  `xassignmrkgid` int(11) NOT NULL,
  `xassignmrkassignid` int(11) NOT NULL,
  `xassignmrkgstudid` int(11) NOT NULL,
  `xassignmrkid` int(11) NOT NULL,
  `xassignmrk` int(11) NOT NULL,
  `xassignmrkstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblXAssignmark`
--

INSERT INTO `tblXAssignmark` (`xassignmrkgid`, `xassignmrkassignid`, `xassignmrkgstudid`, `xassignmrkid`, `xassignmrk`, `xassignmrkstatus`) VALUES
(1, 2, 1, 1, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblXAssignment`
--

CREATE TABLE `tblXAssignment` (
  `xassigngid` int(11) NOT NULL,
  `xassignid` int(11) NOT NULL,
  `xassignname` varchar(50) NOT NULL,
  `xassigndesc` varchar(200) NOT NULL,
  `xassignmax` int(11) NOT NULL,
  `xassigndate` date NOT NULL,
  `xassigntime` time NOT NULL,
  `xassignattach` varchar(200) DEFAULT NULL,
  `xassignattachpath` varchar(200) DEFAULT NULL,
  `xassignstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblXAssignment`
--

INSERT INTO `tblXAssignment` (`xassigngid`, `xassignid`, `xassignname`, `xassigndesc`, `xassignmax`, `xassigndate`, `xassigntime`, `xassignattach`, `xassignattachpath`, `xassignstatus`) VALUES
(1, 1, 'CodeAssign1', 'Desc', 10, '2020-10-26', '14:00:00', NULL, NULL, 1),
(1, 2, 'CodeAssign2', 'dfdfdf', 25, '2020-08-26', '16:00:00', 'Java static quest.pdf', 'xassignments/Java static quest.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblXGroup`
--

CREATE TABLE `tblXGroup` (
  `xgid` int(11) NOT NULL,
  `xgname` varchar(50) NOT NULL,
  `xgdesc` varchar(200) NOT NULL,
  `xtutorhostemail` varchar(200) NOT NULL,
  `xgstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblXGroup`
--

INSERT INTO `tblXGroup` (`xgid`, `xgname`, `xgdesc`, `xtutorhostemail`, `xgstatus`) VALUES
(1, 'Coding', 'c++ Programming Advanced                 ', 'sumayya@gmail.com', 1),
(2, 'Python', 'Python Programming For Beginners      ', 'sumayya@gmail.com', 1),
(3, 'Maths', 'Mathematical Reosoning And Logical Calculations     ', 'sreya@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblXGroupstud`
--

CREATE TABLE `tblXGroupstud` (
  `xsgid` int(11) NOT NULL,
  `xgstudid` int(11) NOT NULL,
  `xgstudemail` varchar(50) NOT NULL,
  `xgstudstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblXGroupstud`
--

INSERT INTO `tblXGroupstud` (`xsgid`, `xgstudid`, `xgstudemail`, `xgstudstatus`) VALUES
(1, 1, 'rahul@gmail.com', 1),
(3, 2, 'rahul@gmail.com', 1),
(2, 3, 'anfuz@gmail.com', 0),
(3, 4, 'anfuz@gmail.com', 1),
(1, 5, 'roshan@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblXMaterial`
--

CREATE TABLE `tblXMaterial` (
  `xmtrlgid` int(11) NOT NULL,
  `xmtrlid` int(11) NOT NULL,
  `xmtrlname` varchar(200) NOT NULL,
  `xmtrldate` date NOT NULL,
  `xattchmtrl` varchar(200) NOT NULL,
  `xmtrlpath` varchar(200) NOT NULL,
  `xmtrlstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblXMaterial`
--

INSERT INTO `tblXMaterial` (`xmtrlgid`, `xmtrlid`, `xmtrlname`, `xmtrldate`, `xattchmtrl`, `xmtrlpath`, `xmtrlstatus`) VALUES
(1, 1, 'Matrl1', '2020-10-27', 'assign.pdf', 'xmaterials/assign.pdf', 1),
(1, 3, 'Matrl2', '2020-10-27', 'project.txt', 'xmaterials/project.txt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblXStudent`
--

CREATE TABLE `tblXStudent` (
  `xstudemail` varchar(50) NOT NULL,
  `xstudname` varchar(50) NOT NULL,
  `xstudage` int(11) NOT NULL,
  `xstudcontact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblXStudent`
--

INSERT INTO `tblXStudent` (`xstudemail`, `xstudname`, `xstudage`, `xstudcontact`) VALUES
('anfuz@gmail.com', 'Anfuz', 17, 8989877658),
('rahul@gmail.com', 'Rahul', 25, 9895231629),
('raj@gmail.com', 'Raj', 24, 8767654989),
('rohit@gmail.com', 'Rohit', 20, 8767654989),
('roshan@gmail.com', 'Roshan', 20, 9876546789);

-- --------------------------------------------------------

--
-- Table structure for table `tblXSubmassign`
--

CREATE TABLE `tblXSubmassign` (
  `xsubmassign_gid` int(11) NOT NULL,
  `xsubmassign_gstudid` int(11) NOT NULL,
  `xsubm_assignid` int(11) NOT NULL,
  `xassign_answr_id` int(11) NOT NULL,
  `xassign_answr` varchar(200) NOT NULL,
  `xassign_answr_path` varchar(200) NOT NULL,
  `xassign_answr_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblXSubmassign`
--

INSERT INTO `tblXSubmassign` (`xsubmassign_gid`, `xsubmassign_gstudid`, `xsubm_assignid`, `xassign_answr_id`, `xassign_answr`, `xassign_answr_path`, `xassign_answr_status`) VALUES
(1, 1, 2, 1, 'ITx.pdf', 'xsubmassign/ITx.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblXSubmtest`
--

CREATE TABLE `tblXSubmtest` (
  `xsubmtest_gid` int(11) NOT NULL,
  `xsubmtest_gstudid` int(11) NOT NULL,
  `xsubm_testid` int(11) NOT NULL,
  `xtest_answr_id` int(11) NOT NULL,
  `xtest_answr` varchar(200) NOT NULL,
  `xtest_answr_path` varchar(200) NOT NULL,
  `xtest_answr_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblXSubmtest`
--

INSERT INTO `tblXSubmtest` (`xsubmtest_gid`, `xsubmtest_gstudid`, `xsubm_testid`, `xtest_answr_id`, `xtest_answr`, `xtest_answr_path`, `xtest_answr_status`) VALUES
(1, 1, 3, 1, 'ans1java.pdf', 'xsubmtest/ans1java.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblXTest`
--

CREATE TABLE `tblXTest` (
  `xtestgid` int(11) NOT NULL,
  `xtestid` int(11) NOT NULL,
  `xtestname` varchar(50) NOT NULL,
  `xtestdesc` varchar(200) NOT NULL,
  `xtestmax` int(11) NOT NULL,
  `xtestdate` date NOT NULL,
  `xteststarttime` time NOT NULL,
  `xtestendtime` time NOT NULL,
  `xqpaper` varchar(200) DEFAULT NULL,
  `xqpaperpath` varchar(200) DEFAULT NULL,
  `xteststatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblXTest`
--

INSERT INTO `tblXTest` (`xtestgid`, `xtestid`, `xtestname`, `xtestdesc`, `xtestmax`, `xtestdate`, `xteststarttime`, `xtestendtime`, `xqpaper`, `xqpaperpath`, `xteststatus`) VALUES
(1, 1, 'Code Tst1', 'SD Test', 10, '2020-12-24', '09:00:00', '10:00:00', 'assign.pdf', 'tests/assign.pdf', 1),
(1, 3, 'Code Test2 with File', 'My Description', 20, '2020-10-31', '18:00:00', '23:59:00', 'Java static quest.pdf', 'xtests/Java static quest.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblXTestmark`
--

CREATE TABLE `tblXTestmark` (
  `xtestmrkgid` int(11) NOT NULL,
  `xtestmrktestid` int(11) NOT NULL,
  `xtestmrkgstudid` int(11) NOT NULL,
  `xtestmrkid` int(11) NOT NULL,
  `xtestmrk` int(11) NOT NULL,
  `xtestmrkstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblXTestmark`
--

INSERT INTO `tblXTestmark` (`xtestmrkgid`, `xtestmrktestid`, `xtestmrkgstudid`, `xtestmrkid`, `xtestmrk`, `xtestmrkstatus`) VALUES
(1, 3, 1, 1, 18, 1),
(1, 3, 5, 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblXTutor`
--

CREATE TABLE `tblXTutor` (
  `xtutoremail` varchar(50) NOT NULL,
  `xtutorname` varchar(50) NOT NULL,
  `xtutorqualf` varchar(50) NOT NULL,
  `xtutorcontact` bigint(20) NOT NULL,
  `xtutorpic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblXTutor`
--

INSERT INTO `tblXTutor` (`xtutoremail`, `xtutorname`, `xtutorqualf`, `xtutorcontact`, `xtutorpic`) VALUES
('merlin@gmail.com', 'Merlin', 'Others', 9876879869, 'images/114.jpeg'),
('rithika@gmail.com', 'Rithika', 'Degree', 9876879869, 'images/student759.jpg'),
('rodwin@gmail.com', 'Rodwin Jose', 'Phd', 9876879869, 'images/tutor2.jpeg'),
('sreya@gmail.com', 'Sreya', 'Degree', 9876879789, 'images/113.jpeg'),
('sumayya@gmail.com', 'Sumayya', 'M-Tech', 9876879777, 'images/sumya.jpeg');

-- --------------------------------------------------------

--
-- Structure for view `FILES`
--
DROP TABLE IF EXISTS `FILES`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `FILES`  AS  select `tblTest`.`testname` AS `testname`,`tblTest`.`testdesc` AS `testdesc`,`tblSubmtest`.`test_answr` AS `test_answr` from (`tblTest` join `tblSubmtest`) where `tblTest`.`testid` = `tblSubmtest`.`subm_testid` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblAssignmark`
--
ALTER TABLE `tblAssignmark`
  ADD PRIMARY KEY (`assignmrkid`);

--
-- Indexes for table `tblAssignment`
--
ALTER TABLE `tblAssignment`
  ADD PRIMARY KEY (`assignid`);

--
-- Indexes for table `tblContactus`
--
ALTER TABLE `tblContactus`
  ADD PRIMARY KEY (`cemail`);

--
-- Indexes for table `tblCourse`
--
ALTER TABLE `tblCourse`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblDepartment`
--
ALTER TABLE `tblDepartment`
  ADD PRIMARY KEY (`depid`);

--
-- Indexes for table `tblFeedback`
--
ALTER TABLE `tblFeedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `tblGroup`
--
ALTER TABLE `tblGroup`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `tblGroupstud`
--
ALTER TABLE `tblGroupstud`
  ADD PRIMARY KEY (`gstudid`);

--
-- Indexes for table `tblHOD`
--
ALTER TABLE `tblHOD`
  ADD PRIMARY KEY (`HODemail`);

--
-- Indexes for table `tblInstitution`
--
ALTER TABLE `tblInstitution`
  ADD PRIMARY KEY (`instemail`);

--
-- Indexes for table `tblMaterial`
--
ALTER TABLE `tblMaterial`
  ADD PRIMARY KEY (`mtrlid`);

--
-- Indexes for table `tblRating`
--
ALTER TABLE `tblRating`
  ADD PRIMARY KEY (`ratingid`);

--
-- Indexes for table `tblReportstatus`
--
ALTER TABLE `tblReportstatus`
  ADD PRIMARY KEY (`rprtid`);

--
-- Indexes for table `tblResult`
--
ALTER TABLE `tblResult`
  ADD PRIMARY KEY (`rsltid`);

--
-- Indexes for table `tblStudent`
--
ALTER TABLE `tblStudent`
  ADD PRIMARY KEY (`studemail`);

--
-- Indexes for table `tblSubject`
--
ALTER TABLE `tblSubject`
  ADD PRIMARY KEY (`subjid`);

--
-- Indexes for table `tblSubmassign`
--
ALTER TABLE `tblSubmassign`
  ADD PRIMARY KEY (`assign_answr_id`);

--
-- Indexes for table `tblSubmtest`
--
ALTER TABLE `tblSubmtest`
  ADD PRIMARY KEY (`test_answr_id`);

--
-- Indexes for table `tblTeacher`
--
ALTER TABLE `tblTeacher`
  ADD PRIMARY KEY (`teachemail`);

--
-- Indexes for table `tblTest`
--
ALTER TABLE `tblTest`
  ADD PRIMARY KEY (`testid`);

--
-- Indexes for table `tblTestmark`
--
ALTER TABLE `tblTestmark`
  ADD PRIMARY KEY (`testmrkid`);

--
-- Indexes for table `tblXAssignmark`
--
ALTER TABLE `tblXAssignmark`
  ADD PRIMARY KEY (`xassignmrkid`);

--
-- Indexes for table `tblXAssignment`
--
ALTER TABLE `tblXAssignment`
  ADD PRIMARY KEY (`xassignid`);

--
-- Indexes for table `tblXGroup`
--
ALTER TABLE `tblXGroup`
  ADD PRIMARY KEY (`xgid`);

--
-- Indexes for table `tblXGroupstud`
--
ALTER TABLE `tblXGroupstud`
  ADD PRIMARY KEY (`xgstudid`);

--
-- Indexes for table `tblXMaterial`
--
ALTER TABLE `tblXMaterial`
  ADD PRIMARY KEY (`xmtrlid`);

--
-- Indexes for table `tblXStudent`
--
ALTER TABLE `tblXStudent`
  ADD PRIMARY KEY (`xstudemail`);

--
-- Indexes for table `tblXSubmassign`
--
ALTER TABLE `tblXSubmassign`
  ADD PRIMARY KEY (`xassign_answr_id`);

--
-- Indexes for table `tblXSubmtest`
--
ALTER TABLE `tblXSubmtest`
  ADD PRIMARY KEY (`xtest_answr_id`);

--
-- Indexes for table `tblXTest`
--
ALTER TABLE `tblXTest`
  ADD PRIMARY KEY (`xtestid`);

--
-- Indexes for table `tblXTestmark`
--
ALTER TABLE `tblXTestmark`
  ADD PRIMARY KEY (`xtestmrkid`);

--
-- Indexes for table `tblXTutor`
--
ALTER TABLE `tblXTutor`
  ADD PRIMARY KEY (`xtutoremail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblAssignmark`
--
ALTER TABLE `tblAssignmark`
  MODIFY `assignmrkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblAssignment`
--
ALTER TABLE `tblAssignment`
  MODIFY `assignid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblCourse`
--
ALTER TABLE `tblCourse`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblDepartment`
--
ALTER TABLE `tblDepartment`
  MODIFY `depid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblFeedback`
--
ALTER TABLE `tblFeedback`
  MODIFY `feedbackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblGroup`
--
ALTER TABLE `tblGroup`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblGroupstud`
--
ALTER TABLE `tblGroupstud`
  MODIFY `gstudid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblMaterial`
--
ALTER TABLE `tblMaterial`
  MODIFY `mtrlid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblRating`
--
ALTER TABLE `tblRating`
  MODIFY `ratingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblReportstatus`
--
ALTER TABLE `tblReportstatus`
  MODIFY `rprtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblResult`
--
ALTER TABLE `tblResult`
  MODIFY `rsltid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblSubject`
--
ALTER TABLE `tblSubject`
  MODIFY `subjid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblSubmassign`
--
ALTER TABLE `tblSubmassign`
  MODIFY `assign_answr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblSubmtest`
--
ALTER TABLE `tblSubmtest`
  MODIFY `test_answr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblTest`
--
ALTER TABLE `tblTest`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblTestmark`
--
ALTER TABLE `tblTestmark`
  MODIFY `testmrkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblXAssignmark`
--
ALTER TABLE `tblXAssignmark`
  MODIFY `xassignmrkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblXAssignment`
--
ALTER TABLE `tblXAssignment`
  MODIFY `xassignid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblXGroup`
--
ALTER TABLE `tblXGroup`
  MODIFY `xgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblXGroupstud`
--
ALTER TABLE `tblXGroupstud`
  MODIFY `xgstudid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblXMaterial`
--
ALTER TABLE `tblXMaterial`
  MODIFY `xmtrlid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblXSubmassign`
--
ALTER TABLE `tblXSubmassign`
  MODIFY `xassign_answr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblXSubmtest`
--
ALTER TABLE `tblXSubmtest`
  MODIFY `xtest_answr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblXTest`
--
ALTER TABLE `tblXTest`
  MODIFY `xtestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblXTestmark`
--
ALTER TABLE `tblXTestmark`
  MODIFY `xtestmrkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
