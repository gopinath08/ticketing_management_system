-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 17, 2020 at 10:55 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `closed_tickets`
--

DROP TABLE IF EXISTS `closed_tickets`;
CREATE TABLE IF NOT EXISTS `closed_tickets` (
  `closed_ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `start_time` varchar(200) NOT NULL,
  `closed_status` int(11) NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `end_time` varchar(200) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  PRIMARY KEY (`closed_ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closed_tickets`
--

INSERT INTO `closed_tickets` (`closed_ticket_id`, `user_id`, `ticket_id`, `start_date`, `start_time`, `closed_status`, `end_date`, `end_time`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 3, 1, '2020-12-16 00:00:00', '11:45', 3, '2020-12-16 00:00:00', '15:18', 3, '2020-12-16', 3, '2020-12-16'),
(2, 3, 1, '2020-12-16 00:00:00', '15:15', 2, NULL, NULL, 3, '2020-12-16', NULL, NULL),
(3, 3, 3, '2020-12-16 00:00:00', '15:20', 3, '2020-12-17 00:00:00', '15:21', 3, '2020-12-16', 3, '2020-12-16'),
(4, 3, 4, '2020-12-17 00:00:00', '15:24', 3, '2020-12-17 00:00:00', '15:27', 3, '2020-12-16', 3, '2020-12-16'),
(5, 3, 5, '2020-12-16 00:00:00', '15:37', 3, '2020-12-16 00:00:00', '15:37', 3, '2020-12-16', 3, '2020-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE IF NOT EXISTS `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `Designation_name` varchar(145) NOT NULL,
  `division_status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `department_id`, `Designation_name`, `division_status`, `created_by`, `created`, `modified_by`, `modified_on`) VALUES
(1, 1, 'ALL', 1, 1, '2020-12-10 09:45:55', 1, '2020-12-10'),
(2, 1, 'PHPDEVELOPER', 1, 1, '2020-12-10 09:49:18', NULL, NULL),
(3, 1, 'ANDROID DEVELOPER', 1, 1, '2020-12-10 09:49:35', NULL, NULL),
(4, 3, 'Senior Engineer', 1, 1, '2020-12-10 10:11:25', NULL, NULL),
(5, 4, 'Automation Testing', 1, 1, '2020-12-10 10:11:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masters_client`
--

DROP TABLE IF EXISTS `masters_client`;
CREATE TABLE IF NOT EXISTS `masters_client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `client_name` varchar(250) NOT NULL,
  `code` varchar(200) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `box_no` varchar(200) DEFAULT NULL,
  `Gst_number` varchar(200) DEFAULT NULL,
  `pan_number` varchar(200) DEFAULT NULL,
  `street` varchar(200) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `pin` varchar(200) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `passworrd` varchar(250) NOT NULL,
  `org_password` varchar(250) NOT NULL,
  `client_status` varchar(250) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters_client`
--

INSERT INTO `masters_client` (`client_id`, `company_id`, `client_name`, `code`, `email`, `mobile`, `box_no`, `Gst_number`, `pan_number`, `street`, `area`, `state`, `city`, `pin`, `username`, `passworrd`, `org_password`, `client_status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 'IAL', 'DSAF546', 'ial@gmail.com', '879564231', 'DFG564', 'GFD132', 'SFG564', 'CHN', 'CHENNAI', 'TAMILNADU', 'SOUTH CHNENNAI', '87956452', 'SOUTH CHNENNAI', 'e10adc3949ba59abbe56e057f20f883e', '123456', '2', 1, '2020-12-10', 1, '2020-12-17'),
(2, 1, 'CPCL', 'ccs879', 'cpc@gmail.com', '8795641325', 'FDS64', 'DSF564', 'DSF65', 'kamachi street', 'guindy', 'tn', 'chennai', '13256', 'cpcl', 'e10adc3949ba59abbe56e057f20f883e', '123456', '1', 1, '2020-12-10', NULL, NULL),
(3, 1, 'TOSHIBA', 'SDF987', 'tosh@gmail.com', '8794562', 'SFD879', 'DSF879', 'DSF897', 'GUINDY ESTATE', 'CHENNAI', 'TN', 'CHENNAI', '45646', 'TOSHIBA', 'e10adc3949ba59abbe56e057f20f883e', '123456', '1', 1, '2020-12-10', NULL, NULL),
(4, 1, 'UCO', 'DSF879', 'uco@chennai.in', '25331230', '01', 'D564', 'ads+564', 'thumbu ', 'parris', 'tn', 'chennai', '620332', 'ucosas', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '1', 1, '2020-12-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masters_company`
--

DROP TABLE IF EXISTS `masters_company`;
CREATE TABLE IF NOT EXISTS `masters_company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company_name` text NOT NULL,
  `company_address` varchar(200) NOT NULL,
  `company_contact` varchar(200) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters_company`
--

INSERT INTO `masters_company` (`id`, `company_name`, `company_address`, `company_contact`, `status`, `created`) VALUES
(1, 'bluebase_software_services', 'New No:118,Anna Salai,Manikkam Lane,Guindy,Chennai,Tamil-Nadu 600032', '9025535590', 1, '2020-12-07 06:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `masters_department`
--

DROP TABLE IF EXISTS `masters_department`;
CREATE TABLE IF NOT EXISTS `masters_department` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters_department`
--

INSERT INTO `masters_department` (`id`, `name`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'IT', 1, 1, '2020-12-01 12:07:02', NULL, NULL),
(2, 'SERVER', 1, 1, '2020-12-01 12:07:39', NULL, NULL),
(3, 'NETWORK', 1, 1, '2020-12-01 12:07:39', NULL, NULL),
(4, 'TESTING', 1, 1, '2020-12-01 12:08:29', NULL, NULL),
(5, 'ACCOUNTS', 1, 1, '2020-12-01 12:08:42', 1, '2020-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `masters_employee`
--

DROP TABLE IF EXISTS `masters_employee`;
CREATE TABLE IF NOT EXISTS `masters_employee` (
  `emp_id` int(22) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `emp_name` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `role_id` varchar(250) NOT NULL,
  `department_id` varchar(250) NOT NULL,
  `division_id` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `passworrd` varchar(250) NOT NULL,
  `org_password` varchar(299) NOT NULL,
  `employee_status` int(22) NOT NULL,
  `created_by` int(22) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `modified_by` int(22) DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters_employee`
--

INSERT INTO `masters_employee` (`emp_id`, `company_id`, `emp_name`, `gender`, `dob`, `email`, `mobile`, `role_id`, `department_id`, `division_id`, `username`, `passworrd`, `org_password`, `employee_status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 'girish', '1', '2020-12-11', 'raj@gmail.com', '879564', '3', '3', '3', 'vanitha', 'e10adc3949ba59abbe56e057f20f883e', '123456', 2, 1, '2020-12-10', 1, '2020-12-17'),
(2, 1, 'Raji', '2', '2020-12-11', 'raji@gmail.com', '879564132', '4', '1', '1', 'raji', 'e10adc3949ba59abbe56e057f20f883e', '123456', 2, 1, '2020-12-10', 1, '2020-12-11'),
(3, 1, 'Jai', '1', '2020-12-11', 'jai@gmail.com', '87956421', '5', '1', '2', 'jai', 'e10adc3949ba59abbe56e057f20f883e', '123456', 2, 1, '2020-12-10', NULL, NULL),
(4, 1, 'Laxmi', '2', '2020-12-12', 'laxmi@gmail.com', '8795642', '1', '1', '1', 'laxmi', 'e10adc3949ba59abbe56e057f20f883e', '123456', 1, 1, '2020-12-10', 1, '2020-12-16'),
(5, 1, 'Gopinath', '1', '2020-12-11', 'gopi@gmail.com', '132564879', '1', '1', '1', 'gopi', 'e10adc3949ba59abbe56e057f20f883e', '123456', 1, 1, '2020-12-10', 1, '2020-12-16'),
(6, 1, 'arun', '1', '2020-12-11', 'gnath@gmail.com', '879564132', '5', '1', '1', 'arun', 'e10adc3949ba59abbe56e057f20f883e', '123456', 1, 1, '2020-12-11', NULL, NULL),
(7, 1, 'ishu', '1', '2020-12-19', 'ishu@gmail.comg', '9548361423', '5', '1', '2', 'ishwa', 'e10adc3949ba59abbe56e057f20f883e', '123456', 1, 1, '2020-12-17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masters_menu`
--

DROP TABLE IF EXISTS `masters_menu`;
CREATE TABLE IF NOT EXISTS `masters_menu` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `menu_description` varchar(255) DEFAULT NULL,
  `menu_order` varchar(255) DEFAULT NULL,
  `menu_class` varchar(255) DEFAULT NULL,
  `menu_url` varchar(255) DEFAULT NULL,
  `call_method` varchar(125) DEFAULT NULL,
  `created_by` int(255) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters_menu`
--

INSERT INTO `masters_menu` (`id`, `menu_name`, `menu_description`, `menu_order`, `menu_class`, `menu_url`, `call_method`, `created_by`, `created_on`) VALUES
(1, 'Masters', 'Employee', '1', 'emp', 'employee', 'employee()', 1, '2020-12-01 00:00:00'),
(2, 'Projects', 'Project', '2', 'prj', 'Project', 'Project()', 1, '2020-12-01 00:00:00'),
(3, 'Task', 'Task', '2', 'task', 'Task', 'task()', 1, '2020-12-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `masters_project`
--

DROP TABLE IF EXISTS `masters_project`;
CREATE TABLE IF NOT EXISTS `masters_project` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `Project_name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `hod_id` int(11) NOT NULL,
  `status` int(100) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters_project`
--

INSERT INTO `masters_project` (`id`, `company_id`, `client_id`, `Project_name`, `department_id`, `division_id`, `hod_id`, `status`, `created_by`, `created`, `modified_by`, `modified_on`) VALUES
(1, 1, 2, 'aji', 1, 1, 2, 1, 1, '2020-12-11', 1, '2020-12-16'),
(2, 1, 2, 'services', 1, 1, 2, 1, 1, '2020-12-11', 1, '2020-12-17'),
(3, 1, 2, 'jai', 1, 1, 2, 1, 1, '2020-12-16', 1, '2020-12-16'),
(5, 1, 3, 'vanith', 1, 1, 2, 1, 1, '2020-12-16', 1, '2020-12-17'),
(4, 1, 3, 'asdfgh', 1, 1, 2, 1, 1, '2020-12-16', 1, '2020-12-17'),
(6, 1, 2, 'dsd', 1, 1, 2, 1, 1, '2020-12-17', 1, '2020-12-17'),
(7, 1, 2, 'IAL', 1, 1, 2, 1, 1, '2020-12-17', NULL, NULL),
(8, 1, 2, 'IAL', 1, 1, 2, 1, 1, '2020-12-17', NULL, NULL),
(9, 1, 3, 'IAL', 1, 1, 2, 1, 1, '2020-12-17', NULL, NULL),
(10, 1, 2, 'laxmi', 1, 1, 2, 1, 1, '2020-12-17', NULL, NULL),
(11, 1, 3, 'jai', 1, 1, 2, 1, 1, '2020-12-17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masters_sub_menu`
--

DROP TABLE IF EXISTS `masters_sub_menu`;
CREATE TABLE IF NOT EXISTS `masters_sub_menu` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `menu_id` int(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `call_method` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_by` int(2) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` int(2) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters_sub_menu`
--

INSERT INTO `masters_sub_menu` (`id`, `menu_id`, `name`, `call_method`, `status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 'Employee', 'employee()', 1, 1, '2020-12-01 00:00:00', NULL, NULL),
(2, 1, 'Client', 'client()', 1, 1, '2020-12-01 00:00:00', NULL, NULL),
(3, 1, 'Project', 'project()', 1, 1, '2020-12-07 16:16:00', NULL, NULL),
(4, 1, 'Department', 'Department()', 1, 1, '2020-12-07 16:16:00', NULL, NULL),
(5, 1, 'Division', 'Designation()', 1, 1, '2020-12-07 16:16:00', NULL, NULL),
(6, 1, 'Role', 'Role()', 1, 1, '2020-12-07 16:16:00', NULL, NULL),
(7, 1, 'Company Profile', 'Company()', 1, 1, '2020-12-07 16:16:00', NULL, NULL),
(9, 2, 'projects', 'projects()', 1, 1, '2020-12-07 16:16:00', NULL, NULL),
(10, 2, 'assign', 'assign()', 1, 1, '2020-12-07 16:16:00', NULL, NULL),
(11, 2, 'Tickets', 'ticket_raising()', 1, 1, '2020-12-07 16:16:00', NULL, NULL),
(12, 2, 'task', 'task()', 1, 1, '2020-12-07 16:16:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_mapping`
--

DROP TABLE IF EXISTS `role_mapping`;
CREATE TABLE IF NOT EXISTS `role_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(200) NOT NULL,
  `submenu_id` int(200) NOT NULL,
  `view_only` varchar(200) NOT NULL,
  `edit_only` int(200) NOT NULL,
  `all_only` varchar(50) NOT NULL,
  `approval` int(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_mapping`
--

INSERT INTO `role_mapping` (`id`, `role_id`, `menu_id`, `submenu_id`, `view_only`, `edit_only`, `all_only`, `approval`, `created_by`, `created_on`) VALUES
(1, 1, 1, 1, '0', 0, '1', 0, '1', '2020-12-01 00:00:00'),
(2, 1, 1, 2, '0', 0, '1', 0, '1', '2020-12-01 00:00:00'),
(3, 1, 1, 3, '0', 0, '1', 0, '1', '2020-12-01 00:00:00'),
(4, 1, 1, 4, '0', 0, '1', 0, '1', '2020-12-01 00:00:00'),
(5, 1, 1, 5, '0', 0, '1', 0, '1', '2020-12-01 00:00:00'),
(6, 1, 1, 6, '0', 0, '1', 0, '1', '2020-12-01 00:00:00'),
(7, 1, 1, 7, '0', 0, '1', 0, '1', '2020-12-01 00:00:00'),
(9, 4, 2, 9, '0', 0, '1', 0, '1', '2020-12-11 00:00:00'),
(10, 4, 2, 10, '0', 0, '1', 0, '1', '2020-12-11 00:00:00'),
(11, 3, 2, 11, '0', 0, '1', 0, '1', '2020-12-11 00:00:00'),
(12, 5, 2, 12, '0', 0, '1', 0, '1', '2020-12-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

DROP TABLE IF EXISTS `role_master`;
CREATE TABLE IF NOT EXISTS `role_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) NOT NULL,
  `status` int(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`id`, `role_name`, `status`) VALUES
(1, 'Super_admin', 1),
(2, 'admin', 1),
(3, 'client', 1),
(4, 'hod', 1),
(5, 'users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task_assign`
--

DROP TABLE IF EXISTS `task_assign`;
CREATE TABLE IF NOT EXISTS `task_assign` (
  `Task_id` int(11) NOT NULL AUTO_INCREMENT,
  `tickets_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `hours` int(100) NOT NULL,
  `Task_status` int(100) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`Task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_assign`
--

INSERT INTO `task_assign` (`Task_id`, `tickets_id`, `department_id`, `division_id`, `users_id`, `due_date`, `hours`, `Task_status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 1, 2, 3, '2020-12-16', 6, 1, 4, '2020-12-15 17:01:40', NULL, NULL),
(3, 2, 1, 2, 3, '2020-12-18', 2, 1, 4, '2020-12-16 15:09:38', NULL, NULL),
(4, 2, 1, 2, 3, '2020-12-17', 4, 1, 4, '2020-12-16 15:15:56', NULL, NULL),
(5, 4, 1, 2, 3, '2020-12-16', 1, 1, 4, '2020-12-16 15:17:29', NULL, NULL),
(6, 5, 1, 2, 3, '2020-12-23', 3, 1, 4, '2020-12-16 15:38:05', NULL, NULL),
(7, 6, 1, 2, 3, '2020-12-24', 564, 1, 4, '2020-12-16 15:38:50', NULL, NULL),
(8, 7, 1, 2, 3, '2020-12-17', 4, 1, 4, '2020-12-16 15:39:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `hod_id` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `attachment` varchar(200) NOT NULL,
  `tickets_status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_on` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `client_id`, `project_id`, `hod_id`, `subject`, `description`, `attachment`, `tickets_status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 2, 2, 'did not save ', 'not save in add in foods section', 'uploads/1/', 3, 3, '2020-12-14', NULL, NULL),
(2, 1, 2, 2, 'testing', 'testing', 'uploads/1/', 3, 3, '2020-12-15', NULL, NULL),
(3, 1, 2, 2, 'dsafc', 'sdf', 'uploads/1/', 3, 3, '2020-12-15', NULL, NULL),
(4, 1, 2, 2, 'sfd', 'df', 'uploads/1/', 3, 3, '2020-12-15', NULL, NULL),
(5, 1, 2, 2, 'tesing', 'tesing                     \r\n                     \r\n                   \r\n                    ', 'uploads/1/', 1, 3, '2020-12-16', NULL, NULL),
(6, 1, 2, 2, 'zvdbv', 'vxcvxc', 'uploads/1/', 1, 3, '2020-12-16', NULL, NULL),
(7, 1, 2, 2, 'sdfsdf', 'sdfsdfsdf', 'uploads/1/', 1, 3, '2020-12-16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

DROP TABLE IF EXISTS `user_master`;
CREATE TABLE IF NOT EXISTS `user_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype` varchar(200) NOT NULL,
  `users_id` int(11) NOT NULL,
  `role_master_id` int(100) DEFAULT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `org_password` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `user_status` int(11) DEFAULT '1',
  `created_by` varchar(200) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` varchar(250) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `usertype`, `users_id`, `role_master_id`, `user_name`, `password`, `org_password`, `full_name`, `user_status`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'Employee', 1, 1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'girish', 1, '1', '2020-12-10 11:54:02', NULL, NULL),
(2, 'Client', 1, 3, 'ial', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'IAL', 1, '1', '2020-12-10 11:55:59', NULL, NULL),
(3, 'Employee', 2, 4, 'raji', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Raji', 1, '1', '2020-12-11 04:01:51', NULL, NULL),
(4, 'Employee', 3, 5, 'jai', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Jai', 1, '1', '2020-12-11 04:05:28', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
