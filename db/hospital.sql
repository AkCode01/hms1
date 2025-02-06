-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 12:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `admission_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctorid_01` int(11) DEFAULT NULL,
  `doctorid_02` int(11) DEFAULT NULL,
  `doctorid_03` int(11) DEFAULT NULL,
  `admission_date` datetime NOT NULL,
  `discharge_date` datetime DEFAULT NULL,
  `ward` varchar(100) DEFAULT NULL,
  `room_number` varchar(100) DEFAULT NULL,
  `bed_number` varchar(100) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `adm_created_by` varchar(100) NOT NULL,
  `adm_created_date` datetime NOT NULL,
  `adm_modified_by` varchar(100) DEFAULT NULL,
  `adm_modified_date` datetime DEFAULT NULL,
  `adm_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admission_id`, `patient_id`, `doctorid_01`, `doctorid_02`, `doctorid_03`, `admission_date`, `discharge_date`, `ward`, `room_number`, `bed_number`, `reason`, `adm_created_by`, `adm_created_date`, `adm_modified_by`, `adm_modified_date`, `adm_status`) VALUES
(50001, 30001, 20002, 20001, 0, '2024-12-17 00:00:00', NULL, '12', '3', '5', 'Not feeling well', 'Admin', '2024-12-17 13:22:35', NULL, NULL, 1),
(50002, 30002, 20002, 20001, 0, '2024-12-17 00:00:00', '2024-12-22 11:09:00', 'ICU1', '451', '31', 'for surgery on 20-12-20241', 'Admin', '2024-12-17 13:51:46', 'Admin', '2024-12-24 07:09:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `decision_making`
--

CREATE TABLE `decision_making` (
  `medication_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `dm_medication_name` varchar(255) NOT NULL,
  `dm_dosage` varchar(100) NOT NULL,
  `dm_instructions` text DEFAULT NULL,
  `dm_created_by` varchar(100) NOT NULL,
  `dm_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `dm_modified_by` varchar(100) DEFAULT NULL,
  `dm_modified_date` datetime DEFAULT NULL,
  `dm_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decision_making`
--

INSERT INTO `decision_making` (`medication_id`, `visit_id`, `dm_medication_name`, `dm_dosage`, `dm_instructions`, `dm_created_by`, `dm_created_date`, `dm_modified_by`, `dm_modified_date`, `dm_status`) VALUES
(33001, 31001, 'Calpol syrup', 'Three time daily', 'never eat chiken ', 'Admin', '2024-12-19 07:44:41', NULL, NULL, 1),
(33002, 31002, 'Calpol syrup', 'Three time daily', 'never eat chiken ', 'Admin', '2024-12-23 09:51:39', 'Admin', '2024-12-23 11:43:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discharge_card`
--

CREATE TABLE `discharge_card` (
  `discharge_id` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `discharge_date` date NOT NULL,
  `disc_principal_diagnosis` text DEFAULT NULL,
  `disc_associated_diagnosis` text DEFAULT NULL,
  `disc_hospital_course` text DEFAULT NULL,
  `disc_followup_instructions` text DEFAULT NULL,
  `disc_dietary_instructions` text DEFAULT NULL,
  `general_condition_on_discharge` text DEFAULT NULL,
  `mode_of_discharge` varchar(100) DEFAULT NULL,
  `laboratory_radiology` text DEFAULT NULL,
  `disc_created_by` varchar(100) DEFAULT NULL,
  `disc_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `disc_modified_by` varchar(100) DEFAULT NULL,
  `disc_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `disc_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discharge_medicine`
--

CREATE TABLE `discharge_medicine` (
  `medicine_id` int(11) NOT NULL,
  `discharge_id` int(11) NOT NULL,
  `dismed_medicine_name` varchar(255) NOT NULL,
  `dismed_form` varchar(100) DEFAULT NULL,
  `dismed_strength` varchar(50) DEFAULT NULL,
  `dismed_days` varchar(100) DEFAULT NULL,
  `dosage_instructions` text DEFAULT NULL,
  `dismed_created_by` varchar(100) DEFAULT NULL,
  `dismed_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `dismed_modified_by` varchar(100) DEFAULT NULL,
  `dismed_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dismed_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `dr_first_name` varchar(100) NOT NULL,
  `dr_last_name` varchar(100) NOT NULL,
  `dr_nic` varchar(50) NOT NULL,
  `dr_specialty` varchar(100) NOT NULL,
  `dr_contact` varchar(20) NOT NULL,
  `dr_email` varchar(100) NOT NULL,
  `dr_address` text NOT NULL,
  `dr_gender` varchar(100) NOT NULL,
  `dr_pic` varchar(255) NOT NULL,
  `dr_license_num` varchar(100) NOT NULL,
  `dr_credentials` varchar(100) NOT NULL,
  `dr_experience` int(11) NOT NULL,
  `dr_created_by` varchar(100) NOT NULL,
  `dr_created_date` datetime NOT NULL,
  `dr_modified_by` varchar(100) NOT NULL,
  `dr_modified_date` datetime NOT NULL,
  `dr_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `dr_first_name`, `dr_last_name`, `dr_nic`, `dr_specialty`, `dr_contact`, `dr_email`, `dr_address`, `dr_gender`, `dr_pic`, `dr_license_num`, `dr_credentials`, `dr_experience`, `dr_created_by`, `dr_created_date`, `dr_modified_by`, `dr_modified_date`, `dr_status`) VALUES
(20001, 'Niaz ', 'Somroo', '1212121', 'Thorasic', '63636363', 'niaz@gmail.com', 'R-52, Defence Karachi', 'Male', 'Niaz 1212121.jfif', '123', 'MBBS', 20, 'Admin', '2024-12-17 11:29:37', '', '0000-00-00 00:00:00', 1),
(20002, 'Hassan', 'Shahzad', '3783678937', 'Thirasic', '873678383', 'hassan@gmail.com', 'Kaneez Fatima Society', 'Male', 'Hassan3783678937.jpg', '456', 'MBBS', 10, 'Admin', '2024-12-17 11:33:08', '', '0000-00-00 00:00:00', 1),
(20003, 'Mohsin Hassan', 'Khan', '23423423423', '', '', '', '', 'Male', '', '', '', 33, 'Admin', '2024-12-30 11:44:08', '', '0000-00-00 00:00:00', 1),
(20004, 'Saleema', '', '', '', '', '', '', 'Female', '', '', '', 3, 'Admin', '2024-12-30 11:44:40', '', '0000-00-00 00:00:00', 1),
(20005, 'Abdul', 'Hafeez', '23423423423', '', '', '', '', 'Male', 'Abdul23423423423.jpg', '', '', 1, 'Admin', '2025-01-24 12:21:14', '', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctors_assessment`
--

CREATE TABLE `doctors_assessment` (
  `doctors_assessment_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `doctor_assess_date` date NOT NULL,
  `doctor_assess_visit_no_followup` varchar(100) DEFAULT NULL,
  `doctor_assess_active_complain` varchar(100) DEFAULT NULL,
  `doctor_assess_duration` varchar(100) DEFAULT NULL,
  `doctor_assess_examination` varchar(100) DEFAULT NULL,
  `doctor_assess_past_medhistory` varchar(100) DEFAULT NULL,
  `doctor_assess_previous_treatment` varchar(100) DEFAULT NULL,
  `doctor_assess_chemo_radiation_location` varchar(255) DEFAULT NULL,
  `doctor_assess_chemo_radiation_cycles` varchar(100) DEFAULT NULL,
  `doctor_assess_chemo_radiation_date_from` date DEFAULT NULL,
  `doctor_assess_chemo_radiation_date_to` date DEFAULT NULL,
  `doctor_assess_radiation_fractions` varchar(100) DEFAULT NULL,
  `doctor_assess_created_by` varchar(100) NOT NULL,
  `doctor_assess_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `doctor_assess_modified_by` varchar(100) DEFAULT NULL,
  `doctor_assess_modified_date` datetime DEFAULT NULL,
  `doctor_assess_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors_assessment`
--

INSERT INTO `doctors_assessment` (`doctors_assessment_id`, `visit_id`, `doctor_assess_date`, `doctor_assess_visit_no_followup`, `doctor_assess_active_complain`, `doctor_assess_duration`, `doctor_assess_examination`, `doctor_assess_past_medhistory`, `doctor_assess_previous_treatment`, `doctor_assess_chemo_radiation_location`, `doctor_assess_chemo_radiation_cycles`, `doctor_assess_chemo_radiation_date_from`, `doctor_assess_chemo_radiation_date_to`, `doctor_assess_radiation_fractions`, `doctor_assess_created_by`, `doctor_assess_created_date`, `doctor_assess_modified_by`, `doctor_assess_modified_date`, `doctor_assess_status`) VALUES
(34001, 31002, '2024-12-12', '1', 'Bleeding', '30 minutes', 'check the patient', 'Yes', 'Injection ', 'Hyderabad', '20 minutes ', '2024-12-18', '2024-12-19', 'radiation fraction', 'Admin', '2024-12-19 05:22:08', NULL, NULL, 1),
(34002, 31001, '2024-12-19', '1', 'Bleeding2', '302', 'Exam12', 'his12', 'tre12', 'sadar2', 'cy12', '2024-12-17', '2024-12-19', 'frac252', 'Admin', '2024-12-19 07:02:11', 'Admin', '2024-12-23 09:08:41', 1),
(34003, 31002, '2025-01-06', '2', 'Bleeding', '30 minutes', 'check the patient', '', '', '', '', '0000-00-00', '0000-00-00', '', 'Admin', '2025-01-06 05:56:51', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `schedule_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `drSched_day` varchar(100) NOT NULL,
  `drSched_start_time` time NOT NULL,
  `drSched_end_time` time NOT NULL,
  `drSched_created_by` varchar(100) NOT NULL,
  `drSched_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `drSched_modified_by` varchar(100) DEFAULT NULL,
  `drSched_modified_date` datetime DEFAULT NULL,
  `drSched_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`schedule_id`, `doctor_id`, `drSched_day`, `drSched_start_time`, `drSched_end_time`, `drSched_created_by`, `drSched_created_date`, `drSched_modified_by`, `drSched_modified_date`, `drSched_status`) VALUES
(21001, 20003, 'Monday, Sat, Sun', '14:14:00', '03:14:00', 'Admin', '2024-12-19 08:14:08', 'Admin', '2025-01-06 07:27:27', 1),
(21002, 20001, 'Friday', '13:15:00', '12:19:00', 'Admin', '2024-12-19 08:15:31', NULL, NULL, 1),
(21003, 20002, 'Monday', '12:30:00', '14:28:00', 'Admin', '2024-12-19 08:28:29', NULL, NULL, 1),
(21004, 20004, 'Mon, Wed, Fri', '15:02:00', '20:08:00', 'Admin', '2024-12-30 12:01:22', 'Admin', '2024-12-30 12:36:42', 1),
(21005, 20005, 'Mon, Wed, Fri', '07:28:00', '22:28:00', 'Admin', '2025-01-24 12:28:17', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `follow_up`
--

CREATE TABLE `follow_up` (
  `follow_up_id` int(11) NOT NULL,
  `discharge_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `followup_visit_date` date NOT NULL,
  `followup_visit_day` varchar(50) DEFAULT NULL,
  `follup_visit_from` time DEFAULT NULL,
  `follup_visit_to` time DEFAULT NULL,
  `follup_created_by` varchar(100) DEFAULT NULL,
  `follup_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `follup_modified_by` varchar(100) DEFAULT NULL,
  `follup_modified_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `follup_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_detail`
--

CREATE TABLE `hospital_detail` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_code` varchar(20) NOT NULL,
  `hospital_address` varchar(255) DEFAULT NULL,
  `hospital_contact_number` varchar(20) DEFAULT NULL,
  `hospital_email` varchar(100) DEFAULT NULL,
  `hospital_website` varchar(100) DEFAULT NULL,
  `hospital_status` tinyint(1) NOT NULL,
  `hospital_created_by` varchar(100) DEFAULT NULL,
  `hospital_created_date` datetime DEFAULT NULL,
  `hospital_modified_by` varchar(100) DEFAULT NULL,
  `hospital_modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital_detail`
--

INSERT INTO `hospital_detail` (`hospital_id`, `hospital_name`, `hospital_code`, `hospital_address`, `hospital_contact_number`, `hospital_email`, `hospital_website`, `hospital_status`, `hospital_created_by`, `hospital_created_date`, `hospital_modified_by`, `hospital_modified_date`) VALUES
(10001, 'Agha Khan', 'AGH', 'Stadium Road Karachi', '111222333', 'agha@gmail.com', 'www.agakhan.com', 1, 'Admin', '2024-12-17 15:21:31', NULL, NULL),
(10002, 'Liaquat National Hospital', 'LNH', '', '', 'info@lnh.com', '', 1, 'Admin', '2024-12-19 10:32:21', 'Admin', '2024-12-19 10:36:12'),
(10003, 'Indus Hospital Karachi', 'IHK', '', '', '', '', 1, 'Admin', '2024-12-19 10:34:04', NULL, NULL),
(10004, 'National Medical Centre', 'NMC', '', '', '', '', 1, 'Admin', '2024-12-19 10:35:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `lab_test_id` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `lab_test_sub_type_id` int(11) NOT NULL,
  `lab_test_date` datetime NOT NULL,
  `lab_test_description` text DEFAULT NULL,
  `lab_test_created_by` varchar(100) NOT NULL,
  `lab_test_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lab_test_modified_by` varchar(100) DEFAULT NULL,
  `lab_test_modified_date` datetime DEFAULT NULL,
  `lab_test_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`lab_test_id`, `admission_id`, `patient_id`, `doctor_id`, `lab_test_sub_type_id`, `lab_test_date`, `lab_test_description`, `lab_test_created_by`, `lab_test_created_date`, `lab_test_modified_by`, `lab_test_modified_date`, `lab_test_status`) VALUES
(62001, 50002, 30002, 20002, 61001, '2024-12-18 00:00:00', 'CXR PA1333', 'Admin', '2024-12-17 14:11:52', 'Admin', '2024-12-24 10:39:34', 1),
(62002, 50001, 30001, 20002, 61001, '2024-12-19 00:00:00', 'Chest X-Ray', 'Admin', '2024-12-24 09:05:09', NULL, NULL, 1),
(62003, 50002, 30002, 20002, 61002, '2024-12-24 00:00:00', 'CT Scan Description', 'Admin', '2024-12-24 09:10:38', NULL, NULL, 1),
(62004, 50002, 30002, 20002, 61005, '2024-12-31 00:00:00', 'Other After', 'Admin', '2024-12-31 09:54:08', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_sub_type`
--

CREATE TABLE `lab_test_sub_type` (
  `lab_test_sub_type_id` int(11) NOT NULL,
  `lab_test_type_id` int(11) NOT NULL,
  `lab_test_sub_type_name` varchar(255) NOT NULL,
  `lab_test_sub_type_created_by` varchar(100) NOT NULL,
  `lab_test_sub_type_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lab_test_sub_type_modified_by` varchar(100) DEFAULT NULL,
  `lab_test_sub_type_modified_date` datetime DEFAULT NULL,
  `lab_test_sub_type_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_test_sub_type`
--

INSERT INTO `lab_test_sub_type` (`lab_test_sub_type_id`, `lab_test_type_id`, `lab_test_sub_type_name`, `lab_test_sub_type_created_by`, `lab_test_sub_type_created_date`, `lab_test_sub_type_modified_by`, `lab_test_sub_type_modified_date`, `lab_test_sub_type_status`) VALUES
(61001, 60001, 'X-Ray', 'Admin', '2024-12-17 13:28:37', 'Admin', '2024-12-24 14:16:02', 1),
(61002, 60001, 'Computed Tomography (CT) Scan', 'Admin', '2024-12-17 13:28:58', NULL, NULL, 1),
(61003, 60001, 'Magnetic Resonance Imaging (MRI)', 'Admin', '2024-12-17 13:29:17', NULL, NULL, 1),
(61004, 60001, 'Ultrasound (US)', 'Admin', '2024-12-17 13:29:30', NULL, NULL, 1),
(61005, 60007, 'Other Diagnostics', 'Admin', '2024-12-24 13:17:53', 'Admin', '2024-12-24 14:15:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_type`
--

CREATE TABLE `lab_test_type` (
  `lab_test_type_id` int(11) NOT NULL,
  `lab_test_type_name` varchar(300) NOT NULL,
  `lab_test_type_created_by` varchar(100) NOT NULL,
  `lab_test_type_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lab_test_type_modified_by` varchar(100) DEFAULT NULL,
  `lab_test_type_modified_date` datetime DEFAULT NULL,
  `lab_test_type_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lab_test_type`
--

INSERT INTO `lab_test_type` (`lab_test_type_id`, `lab_test_type_name`, `lab_test_type_created_by`, `lab_test_type_created_date`, `lab_test_type_modified_by`, `lab_test_type_modified_date`, `lab_test_type_status`) VALUES
(60001, 'Imaging Diagnostics', 'Admin', '2024-12-17 13:23:46', 'Admin', '2024-12-24 13:05:35', 1),
(60002, 'Laboratory Diagnostics', 'Admin', '2024-12-17 13:24:22', 'Admin', '2024-12-24 11:47:11', 1),
(60003, 'Electrophysiology Diagnostics', 'Admin', '2024-12-17 13:24:37', NULL, NULL, 1),
(60004, 'Endoscopy and Bronchoscopy', 'Admin', '2024-12-17 13:24:44', NULL, NULL, 1),
(60005, 'Nuclear Medicine Diagnostics', 'Admin', '2024-12-17 13:24:59', NULL, NULL, 1),
(60006, 'Genetic Diagnostics', 'Admin', '2024-12-17 13:25:08', NULL, NULL, 1),
(60007, 'Other Diagnostics', 'Admin', '2024-12-17 13:25:18', NULL, NULL, 1),
(60008, 'Specialized Diagnostics', 'Admin', '2024-12-17 13:25:27', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `patient_first_name` varchar(100) NOT NULL,
  `patient_last_name` varchar(100) NOT NULL,
  `patient_nic` varchar(50) NOT NULL,
  `patient_dob` date NOT NULL,
  `patient_gender` varchar(100) NOT NULL,
  `patient_contact` varchar(20) NOT NULL,
  `patient_email` varchar(100) NOT NULL,
  `patient_address_permanent` varchar(200) NOT NULL,
  `patient_address_current` varchar(200) NOT NULL,
  `patient_private_corporate` varchar(200) NOT NULL,
  `patient_emergency_contact` varchar(100) NOT NULL,
  `patient_emergency_phone` varchar(20) NOT NULL,
  `patient_translator` varchar(100) NOT NULL,
  `patient_translator_phone` varchar(50) NOT NULL,
  `patient_marital_status` varchar(100) NOT NULL,
  `patient_nationality` varchar(100) NOT NULL,
  `patient_allergies` text NOT NULL,
  `patient_code_blue` tinyint(1) NOT NULL DEFAULT 0,
  `patient_doctor_ref` varchar(100) NOT NULL,
  `patient_created_by` varchar(100) NOT NULL,
  `patient_created_date` datetime NOT NULL,
  `patient_modified_by` varchar(100) NOT NULL,
  `patient_modified_date` datetime NOT NULL,
  `patient_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `hospital_id`, `patient_first_name`, `patient_last_name`, `patient_nic`, `patient_dob`, `patient_gender`, `patient_contact`, `patient_email`, `patient_address_permanent`, `patient_address_current`, `patient_private_corporate`, `patient_emergency_contact`, `patient_emergency_phone`, `patient_translator`, `patient_translator_phone`, `patient_marital_status`, `patient_nationality`, `patient_allergies`, `patient_code_blue`, `patient_doctor_ref`, `patient_created_by`, `patient_created_date`, `patient_modified_by`, `patient_modified_date`, `patient_status`) VALUES
(30001, 10001, 'Khurram', 'Khan', '923492378-98', '1975-05-12', 'Male', '03422269335', 'zia@gmail.com', 'Faisalabad', 'Karachi Kemari', 'Private', 'Bro', '64654645645', 'Mehnaz', '92-098378383', 'Single', 'Pakistan', 'Cold Water', 1, 'Hashim Rehan/ Mujahid Ali/ Saqib Noor', 'Admin', '2024-12-17 13:20:10', '', '0000-00-00 00:00:00', 1),
(30002, 10001, 'Zeeshan', 'Khan', '923492378-98', '1975-05-22', 'Male', '03422269335', 'saleem@gmail.com', 'Korangi', 'Sadar', 'Private', 'Bro', 'Inam Ul Haq', 'Mehnaz', '8888999333', 'Single', 'Bangladesh', 'Piza Golden', 1, 'Hashim Rehan/ Mujahid Ali/ Saqib Noor', 'Admin', '2024-12-17 13:48:11', '', '0000-00-00 00:00:00', 1),
(30003, 10004, 'Hina', 'Rabani', '234234234', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 'Admin', '2025-01-06 06:30:35', '', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pre_assessment`
--

CREATE TABLE `pre_assessment` (
  `pre_assessment_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `pre_assess_date` date NOT NULL,
  `pre_assess_bp_sys` varchar(100) NOT NULL,
  `pre_assess_bp_dia` varchar(100) NOT NULL,
  `pre_assess_pulse` varchar(100) NOT NULL,
  `pre_assess_weight_kg` decimal(5,2) NOT NULL,
  `pre_assess_height_ft_inch` decimal(5,2) NOT NULL,
  `pre_assess_spo2` varchar(100) NOT NULL,
  `pre_assess_temp_f` decimal(5,2) NOT NULL,
  `pre_assess_created_by` varchar(100) NOT NULL,
  `pre_assess_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `pre_assess_modified_by` varchar(100) DEFAULT NULL,
  `pre_assess_modified_date` datetime DEFAULT NULL,
  `pre_assess_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pre_assessment`
--

INSERT INTO `pre_assessment` (`pre_assessment_id`, `visit_id`, `pre_assess_date`, `pre_assess_bp_sys`, `pre_assess_bp_dia`, `pre_assess_pulse`, `pre_assess_weight_kg`, `pre_assess_height_ft_inch`, `pre_assess_spo2`, `pre_assess_temp_f`, `pre_assess_created_by`, `pre_assess_created_date`, `pre_assess_modified_by`, `pre_assess_modified_date`, `pre_assess_status`) VALUES
(32001, 31001, '2024-12-17', '120', '80 mm Hg', '85', 35.00, 5.00, '98%', 99.00, 'Admin', '2024-12-17 13:22:15', NULL, NULL, 1),
(32002, 31002, '2024-12-17', '1201', '80 mm Hg1', '881', 351.00, 15.00, '914%', 199.00, 'Admin', '2024-12-17 13:51:10', 'Admin', '2024-12-20 09:48:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_description` varchar(255) DEFAULT NULL,
  `role_is_active` tinyint(1) DEFAULT 1,
  `role_created_by` varchar(50) DEFAULT NULL,
  `role_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surg_operation`
--

CREATE TABLE `surg_operation` (
  `surg_op_id` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `surg_op_ot_date` date NOT NULL,
  `surg_op_primary_consultant` varchar(200) NOT NULL,
  `surg_op_ot_consultant` int(11) NOT NULL,
  `surg_op_anaesthetist` varchar(200) NOT NULL,
  `surg_op_operations` varchar(200) NOT NULL,
  `surg_op_post_of_remarks` varchar(200) NOT NULL,
  `surg_op_surgical_remarks` varchar(200) NOT NULL,
  `surg_op_status` tinyint(1) NOT NULL,
  `surg_op_created_by` varchar(200) NOT NULL,
  `surg_op_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `surg_op_modified_by` varchar(200) NOT NULL,
  `surg_op_modified_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surg_operation`
--

INSERT INTO `surg_operation` (`surg_op_id`, `admission_id`, `surg_op_ot_date`, `surg_op_primary_consultant`, `surg_op_ot_consultant`, `surg_op_anaesthetist`, `surg_op_operations`, `surg_op_post_of_remarks`, `surg_op_surgical_remarks`, `surg_op_status`, `surg_op_created_by`, `surg_op_created_date`, `surg_op_modified_by`, `surg_op_modified_date`) VALUES
(92001, 50002, '2025-01-06', 'Dr. Sultan', 20002, 'Hashim Rehan Shah', 'Heart Surgery', 'Gilty removed from heart', 'Gilty was cover the heart', 1, 'Admin', '2025-01-06 14:10:51', '', '2025-01-06 14:10:51'),
(92002, 50002, '2025-01-06', 'Dr. Aasia', 20002, 'Mehmood Khan', 'Kidney', 'Post of remarks', 'surgical remoarks', 1, 'Admin', '2025-01-06 15:53:10', '', '2025-01-06 15:53:10'),
(92003, 50002, '2025-01-07', 'Dr. Aasia', 20002, 'Mehmood Khan', 'Kidney 2', 'Post of remarks 2', 'surgical remoarks 2', 1, 'Admin', '2025-01-07 09:17:18', '', '2025-01-07 09:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `surg_operation_media`
--

CREATE TABLE `surg_operation_media` (
  `surg_opration_media_id` int(11) NOT NULL,
  `surg_op_id` int(11) NOT NULL,
  `surg_opration_media_url` varchar(200) NOT NULL,
  `surg_opration_media_filename` varchar(200) NOT NULL,
  `surg_opration_media_type` varchar(200) NOT NULL,
  `surg_opration_media_status` int(11) NOT NULL,
  `surg_opration_media_created_by` varchar(100) NOT NULL,
  `surg_opration_media_created_date` datetime NOT NULL,
  `surg_opration_media_modified_by` varchar(100) NOT NULL,
  `surg_opration_media_modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surg_operation_media`
--

INSERT INTO `surg_operation_media` (`surg_opration_media_id`, `surg_op_id`, `surg_opration_media_url`, `surg_opration_media_filename`, `surg_opration_media_type`, `surg_opration_media_status`, `surg_opration_media_created_by`, `surg_opration_media_created_date`, `surg_opration_media_modified_by`, `surg_opration_media_modified_date`) VALUES
(93001, 92001, 'any url of operation ', '92001_1_(JPEG Image, 1248 × 793 pixels).jpg', 'image', 1, 'Admin', '2025-01-09 10:25:43', '', '0000-00-00 00:00:00'),
(93002, 92003, '', '92003_1_1_asana.png', 'image', 1, 'Admin', '2025-02-06 11:57:53', '', '0000-00-00 00:00:00'),
(93003, 92003, '', '92003_1_2_behance.png', 'image', 1, 'Admin', '2025-02-06 11:57:53', '', '0000-00-00 00:00:00'),
(93004, 92003, '', '92003_1_3_dribbble.png', 'image', 1, 'Admin', '2025-02-06 11:57:53', '', '0000-00-00 00:00:00'),
(93005, 92003, '', '92003_1_4_instagram.png', 'image', 1, 'Admin', '2025-02-06 11:57:53', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `surg_pre_op_assessment`
--

CREATE TABLE `surg_pre_op_assessment` (
  `pre_op_assid` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `doctor_id_anaeshesologist` int(11) NOT NULL,
  `doctor_id_surgeon` int(11) NOT NULL,
  `pre_op_diagnosis` text DEFAULT NULL,
  `pre_op_surgery_date` date DEFAULT NULL,
  `pre_op_asa_classification` varchar(255) DEFAULT NULL,
  `pre_op_mets` varchar(255) DEFAULT NULL,
  `pre_op_cvs_hr` varchar(255) DEFAULT NULL,
  `pre_op_cvs_hypertension` varchar(255) DEFAULT NULL,
  `pre_op_cvs_cong_defects` varchar(255) DEFAULT NULL,
  `pre_op_cvs_bp` varchar(255) DEFAULT NULL,
  `pre_op_cvs_temp` varchar(255) DEFAULT NULL,
  `pre_op_cvs_ml` varchar(255) DEFAULT NULL,
  `pre_op_cvs_angina` varchar(255) DEFAULT NULL,
  `pre_op_cvs_ccf` varchar(255) DEFAULT NULL,
  `pre_op_cbvs_npo_time` varchar(255) DEFAULT NULL,
  `pre_op_cvs_orthoponea` varchar(255) DEFAULT NULL,
  `pre_op_cvs_anaemia` varchar(255) DEFAULT NULL,
  `cvs_edema` varchar(255) DEFAULT NULL,
  `pre_op_resp_dyspnoea` varchar(255) DEFAULT NULL,
  `pre_op_resp_cough` varchar(255) DEFAULT NULL,
  `pre_op_resp_cyanosis` varchar(255) DEFAULT NULL,
  `pre_op_resp_sputum` varchar(255) DEFAULT NULL,
  `pre_op_resp_smoking` varchar(255) DEFAULT NULL,
  `pre_op_resp_tuberculosis` varchar(255) DEFAULT NULL,
  `pre_op_resp_asthma` varchar(255) DEFAULT NULL,
  `pre_op_resp_copd` varchar(255) DEFAULT NULL,
  `pre_op_resp_uri` varchar(255) DEFAULT NULL,
  `pre_op_resp_stridor` varchar(255) DEFAULT NULL,
  `pre_op_resp_haemoptysis` varchar(255) DEFAULT NULL,
  `pre_op_renal` varchar(255) DEFAULT NULL,
  `pre_op_hepatic` varchar(255) DEFAULT NULL,
  `pre_op_cns` varchar(255) DEFAULT NULL,
  `pre_op_coag_problems` varchar(255) DEFAULT NULL,
  `pre_op_allergies` varchar(255) DEFAULT NULL,
  `pre_op_family_history` varchar(255) DEFAULT NULL,
  `pre_op_thyroid` varchar(255) DEFAULT NULL,
  `diabetes` varchar(255) DEFAULT NULL,
  `pre_op_current_medication_conc_disease_consultation` text DEFAULT NULL,
  `pre_op_ecg` varchar(255) DEFAULT NULL,
  `pre_op_hb_hct` varchar(255) DEFAULT NULL,
  `pre_op_na` varchar(255) DEFAULT NULL,
  `pre_op_k` varchar(255) DEFAULT NULL,
  `pre_op_cl` varchar(255) DEFAULT NULL,
  `pre_op_hco3` varchar(255) DEFAULT NULL,
  `pre_op_cxr` varchar(255) DEFAULT NULL,
  `pre_op_pit` varchar(255) DEFAULT NULL,
  `pre_op_fbs_rbs` varchar(255) DEFAULT NULL,
  `pre_op_bun` varchar(255) DEFAULT NULL,
  `pre_op_cr` varchar(255) DEFAULT NULL,
  `pre_op_anaesthetic_history` text DEFAULT NULL,
  `pre_op_ausculation` varchar(255) DEFAULT NULL,
  `pre_op_aa_teeth` varchar(255) DEFAULT NULL,
  `pre_op_aa_dentures` varchar(255) DEFAULT NULL,
  `pre_op_aa_neck_movement` varchar(255) DEFAULT NULL,
  `pre_op_aa_jaw_movement` varchar(255) DEFAULT NULL,
  `pre_op_mallampatti` varchar(255) DEFAULT NULL,
  `pre_op_operative_orders` text DEFAULT NULL,
  `pre_op_miscellaneous` text DEFAULT NULL,
  `pre_op_anaesthesia_plan` text DEFAULT NULL,
  `pre_op_status` varchar(255) DEFAULT NULL,
  `pre_op_created_by` varchar(100) NOT NULL,
  `pre_op_created_date` datetime DEFAULT current_timestamp(),
  `pre_op_modified_by` int(11) DEFAULT NULL,
  `pre_op_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surg_pre_op_assessment`
--

INSERT INTO `surg_pre_op_assessment` (`pre_op_assid`, `admission_id`, `doctor_id_anaeshesologist`, `doctor_id_surgeon`, `pre_op_diagnosis`, `pre_op_surgery_date`, `pre_op_asa_classification`, `pre_op_mets`, `pre_op_cvs_hr`, `pre_op_cvs_hypertension`, `pre_op_cvs_cong_defects`, `pre_op_cvs_bp`, `pre_op_cvs_temp`, `pre_op_cvs_ml`, `pre_op_cvs_angina`, `pre_op_cvs_ccf`, `pre_op_cbvs_npo_time`, `pre_op_cvs_orthoponea`, `pre_op_cvs_anaemia`, `cvs_edema`, `pre_op_resp_dyspnoea`, `pre_op_resp_cough`, `pre_op_resp_cyanosis`, `pre_op_resp_sputum`, `pre_op_resp_smoking`, `pre_op_resp_tuberculosis`, `pre_op_resp_asthma`, `pre_op_resp_copd`, `pre_op_resp_uri`, `pre_op_resp_stridor`, `pre_op_resp_haemoptysis`, `pre_op_renal`, `pre_op_hepatic`, `pre_op_cns`, `pre_op_coag_problems`, `pre_op_allergies`, `pre_op_family_history`, `pre_op_thyroid`, `diabetes`, `pre_op_current_medication_conc_disease_consultation`, `pre_op_ecg`, `pre_op_hb_hct`, `pre_op_na`, `pre_op_k`, `pre_op_cl`, `pre_op_hco3`, `pre_op_cxr`, `pre_op_pit`, `pre_op_fbs_rbs`, `pre_op_bun`, `pre_op_cr`, `pre_op_anaesthetic_history`, `pre_op_ausculation`, `pre_op_aa_teeth`, `pre_op_aa_dentures`, `pre_op_aa_neck_movement`, `pre_op_aa_jaw_movement`, `pre_op_mallampatti`, `pre_op_operative_orders`, `pre_op_miscellaneous`, `pre_op_anaesthesia_plan`, `pre_op_status`, `pre_op_created_by`, `pre_op_created_date`, `pre_op_modified_by`, `pre_op_modified_date`) VALUES
(90001, 50001, 20001, 20002, 'Heart', '2024-12-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Admin', '2024-12-26 10:06:05', 0, '2024-12-26 10:09:14'),
(90002, 50002, 20001, 20002, 'Heart', '2024-12-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Admin', '2024-12-26 17:49:43', NULL, NULL),
(90003, 50001, 20001, 20002, 'Diagnosis', '2024-12-26', '3', '3-6', 'hr', 'Hypertension', 'Cong ', 'BP', 'Temp', 'ML', 'II', 'CCF', 'NPO ', 'Orthoponea', 'Anaemia', 'Edema', 'Dyspnoea', 'Resp Cough', 'Resp Cyanosis', 'Resp Sputum', 'Resp Smoking', 'Resp Tuberculosis', 'Resp Asthma', 'Resp Asthma', 'Resp Uri', 'Resp Stridor', 'Resp Haemoptysis', 'Renal', 'Hepatic', 'Cns', 'Coag Problems', 'Allergies', 'Family History', 'Thyroid', 'Diabetes', 'Current Medication / Disease Consultation', 'Ecg', 'Hct', 'Na', 'K', 'Cl', 'HCO3', 'Cxr', 'Pit', 'Fbs Rbs', 'Bun', 'CR', 'Anaesthetic History', 'Ausculation', 'Teeth', 'Dentures', 'Neck_movement', 'Jaw Movement', 'Class III', 'Operative ', 'Miscellaneous', 'Invasive Monitor', '1', 'Admin', '2024-12-27 13:58:47', NULL, NULL),
(90004, 50002, 20002, 20001, '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 'Admin', '2024-12-27 15:42:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surg_pre_op_assessment_media`
--

CREATE TABLE `surg_pre_op_assessment_media` (
  `pre_op_ass_media_id` int(11) NOT NULL,
  `pre_op_assid` int(11) NOT NULL,
  `pre_op_ass_media_url` varchar(255) NOT NULL,
  `pre_op_ass_media_filename` varchar(200) NOT NULL,
  `pre_op_ass_media_type` varchar(255) NOT NULL,
  `pre_op_ass_media_status` tinyint(1) NOT NULL,
  `pre_op_ass_media_created_by` varchar(100) NOT NULL,
  `pre_op_ass_media_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `pre_op_ass_media_modified_by` varchar(100) NOT NULL,
  `pre_op_ass_media_modified_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surg_pre_op_assessment_media`
--

INSERT INTO `surg_pre_op_assessment_media` (`pre_op_ass_media_id`, `pre_op_assid`, `pre_op_ass_media_url`, `pre_op_ass_media_filename`, `pre_op_ass_media_type`, `pre_op_ass_media_status`, `pre_op_ass_media_created_by`, `pre_op_ass_media_created_date`, `pre_op_ass_media_modified_by`, `pre_op_ass_media_modified_date`) VALUES
(91001, 90001, 'https://youtu.be/UY2xGiOwe2o', '90001_1__download.png', 'image', 1, 'Admin', '2024-12-26 14:05:44', '', '2024-12-26 17:37:23'),
(91002, 90001, 'Test', '', 'image', 1, 'Admin', '2024-12-26 14:06:25', '', '2024-12-26 14:06:25'),
(91003, 90001, '', '90001_3_Arif.jpg', 'image', 1, 'Admin', '2024-12-26 16:10:51', '', '2024-12-26 16:10:51'),
(91004, 90001, 'https://www.youtube.com/watch?v=kfwpf2XHaQo&list=PLHi_NUJDIGWK7LSO0naSttSs3bXr4tB14&index=2', '90001_4_download.png', 'image', 1, 'Admin', '2024-12-26 16:32:59', '', '2024-12-26 16:32:59'),
(91005, 90002, 'https://www.youtube.com/watch?v=kfwpf2XHaQo&list=PLHi_NUJDIGWK7LSO0naSttSs3bXr4tB14&index=2', '', 'image', 1, 'Admin', '2024-12-26 17:49:54', '', '2024-12-26 17:49:54'),
(91006, 90002, 'Test', '90002_2_image_2024_12_18T13_30_04_897Z.png', 'image', 1, 'Admin', '2024-12-26 17:50:53', '', '2024-12-26 17:50:53'),
(91007, 90004, '', '90004_1_1_1.jpg', 'image', 1, 'Admin', '2025-02-06 15:38:56', '', '2025-02-06 15:38:56'),
(91008, 90004, '', '90004_1_2_2.jpg', 'image', 1, 'Admin', '2025-02-06 15:38:56', '', '2025-02-06 15:38:56'),
(91009, 90004, '', '90004_1_3_3.jpg', 'image', 1, 'Admin', '2025-02-06 15:38:56', '', '2025-02-06 15:38:56'),
(91010, 90003, '', '90003_1_1_18.jpg', 'image', 1, 'Admin', '2025-02-06 15:42:23', '', '2025-02-06 15:42:23'),
(91011, 90003, '', '90003_1_2_19.jpg', 'image', 1, 'Admin', '2025-02-06 15:42:23', '', '2025-02-06 15:42:23'),
(91012, 90003, '', '90003_1_3_20.jpg', 'image', 1, 'Admin', '2025-02-06 15:42:23', '', '2025-02-06 15:42:23'),
(91013, 90003, '', '90003_4_1_5.jpg', 'image', 1, 'Admin', '2025-02-06 15:42:52', '', '2025-02-06 15:42:52'),
(91014, 90003, '', '90003_4_2_12.jpg', 'image', 1, 'Admin', '2025-02-06 15:42:52', '', '2025-02-06 15:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_plan`
--

CREATE TABLE `treatment_plan` (
  `treatment_id` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `treatment_date` date NOT NULL,
  `treatment_description` text DEFAULT NULL,
  `treatment_created_by` varchar(100) DEFAULT NULL,
  `treatment_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `treatment_modified_by` varchar(100) DEFAULT NULL,
  `treatment_modified_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `treatment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treatment_plan`
--

INSERT INTO `treatment_plan` (`treatment_id`, `admission_id`, `treatment_date`, `treatment_description`, `treatment_created_by`, `treatment_created_date`, `treatment_modified_by`, `treatment_modified_on`, `treatment_status`) VALUES
(70001, 50001, '2024-12-17', 'Oxygen therapy', 'Admin', '2024-12-17 08:23:09', NULL, '2024-12-17 12:23:21', 1),
(70002, 50002, '2024-12-17', 'Oxygen therapy2345', 'Admin', '2024-12-17 09:10:41', 'Admin', '2024-12-24 03:48:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(50) DEFAULT NULL,
  `user_last_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_contact_no` varchar(15) DEFAULT NULL,
  `user_is_active` tinyint(1) DEFAULT 1,
  `user_role` varchar(20) NOT NULL,
  `user_created_by` varchar(50) DEFAULT NULL,
  `user_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `userrole_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `userrole_created_by` varchar(100) NOT NULL,
  `userrole_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `userrole_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles_pages`
--

CREATE TABLE `user_roles_pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_created_by` varchar(100) NOT NULL,
  `page_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `page_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles_pages_right`
--

CREATE TABLE `user_roles_pages_right` (
  `page_right_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `page_right_add` tinyint(1) NOT NULL DEFAULT 0,
  `pager_ight_edit` tinyint(1) NOT NULL DEFAULT 0,
  `page_right_delete` tinyint(1) NOT NULL DEFAULT 0,
  `page_right_view` tinyint(1) NOT NULL DEFAULT 1,
  `page_right_created_by` varchar(100) NOT NULL,
  `page_right_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `page_right_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visit_log`
--

CREATE TABLE `visit_log` (
  `visit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `visit_date` datetime NOT NULL,
  `visit_symptoms` text DEFAULT NULL,
  `visit_diagnosis` text DEFAULT NULL,
  `visit_created_by` varchar(100) NOT NULL,
  `visit_created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `visit_modified_by` varchar(100) DEFAULT NULL,
  `visit_modified_date` datetime DEFAULT NULL,
  `visit_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visit_log`
--

INSERT INTO `visit_log` (`visit_id`, `patient_id`, `doctor_id`, `visit_date`, `visit_symptoms`, `visit_diagnosis`, `visit_created_by`, `visit_created_date`, `visit_modified_by`, `visit_modified_date`, `visit_status`) VALUES
(31001, 30001, 20001, '2024-12-17 13:21:00', ' cough (51%)', 'Admit', 'Admin', '2024-12-17 13:21:43', NULL, NULL, 1),
(31002, 30002, 20001, '2024-12-17 13:49:00', ' shortness of breath, cough, chest pain since 3 months', 'anterior mediastinal mass', 'Admin', '2024-12-17 13:49:27', NULL, NULL, 1),
(31003, 30003, 20002, '2025-01-06 06:32:00', ' Heatup', 'Have allergies', 'Admin', '2025-01-06 06:32:41', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`admission_id`);

--
-- Indexes for table `decision_making`
--
ALTER TABLE `decision_making`
  ADD PRIMARY KEY (`medication_id`);

--
-- Indexes for table `discharge_card`
--
ALTER TABLE `discharge_card`
  ADD PRIMARY KEY (`discharge_id`);

--
-- Indexes for table `discharge_medicine`
--
ALTER TABLE `discharge_medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctors_assessment`
--
ALTER TABLE `doctors_assessment`
  ADD PRIMARY KEY (`doctors_assessment_id`);

--
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `follow_up`
--
ALTER TABLE `follow_up`
  ADD PRIMARY KEY (`follow_up_id`);

--
-- Indexes for table `hospital_detail`
--
ALTER TABLE `hospital_detail`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`lab_test_id`);

--
-- Indexes for table `lab_test_sub_type`
--
ALTER TABLE `lab_test_sub_type`
  ADD PRIMARY KEY (`lab_test_sub_type_id`);

--
-- Indexes for table `lab_test_type`
--
ALTER TABLE `lab_test_type`
  ADD PRIMARY KEY (`lab_test_type_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `pre_assessment`
--
ALTER TABLE `pre_assessment`
  ADD PRIMARY KEY (`pre_assessment_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `surg_operation`
--
ALTER TABLE `surg_operation`
  ADD PRIMARY KEY (`surg_op_id`);

--
-- Indexes for table `surg_operation_media`
--
ALTER TABLE `surg_operation_media`
  ADD PRIMARY KEY (`surg_opration_media_id`);

--
-- Indexes for table `surg_pre_op_assessment`
--
ALTER TABLE `surg_pre_op_assessment`
  ADD PRIMARY KEY (`pre_op_assid`);

--
-- Indexes for table `surg_pre_op_assessment_media`
--
ALTER TABLE `surg_pre_op_assessment_media`
  ADD PRIMARY KEY (`pre_op_ass_media_id`);

--
-- Indexes for table `treatment_plan`
--
ALTER TABLE `treatment_plan`
  ADD PRIMARY KEY (`treatment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`userrole_id`);

--
-- Indexes for table `user_roles_pages`
--
ALTER TABLE `user_roles_pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `user_roles_pages_right`
--
ALTER TABLE `user_roles_pages_right`
  ADD PRIMARY KEY (`page_right_id`);

--
-- Indexes for table `visit_log`
--
ALTER TABLE `visit_log`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50003;

--
-- AUTO_INCREMENT for table `decision_making`
--
ALTER TABLE `decision_making`
  MODIFY `medication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33003;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20006;

--
-- AUTO_INCREMENT for table `doctors_assessment`
--
ALTER TABLE `doctors_assessment`
  MODIFY `doctors_assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34004;

--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21006;

--
-- AUTO_INCREMENT for table `hospital_detail`
--
ALTER TABLE `hospital_detail`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;

--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `lab_test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62005;

--
-- AUTO_INCREMENT for table `lab_test_sub_type`
--
ALTER TABLE `lab_test_sub_type`
  MODIFY `lab_test_sub_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61006;

--
-- AUTO_INCREMENT for table `lab_test_type`
--
ALTER TABLE `lab_test_type`
  MODIFY `lab_test_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60009;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30004;

--
-- AUTO_INCREMENT for table `pre_assessment`
--
ALTER TABLE `pre_assessment`
  MODIFY `pre_assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32003;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surg_operation`
--
ALTER TABLE `surg_operation`
  MODIFY `surg_op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92004;

--
-- AUTO_INCREMENT for table `surg_operation_media`
--
ALTER TABLE `surg_operation_media`
  MODIFY `surg_opration_media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93006;

--
-- AUTO_INCREMENT for table `surg_pre_op_assessment`
--
ALTER TABLE `surg_pre_op_assessment`
  MODIFY `pre_op_assid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90005;

--
-- AUTO_INCREMENT for table `surg_pre_op_assessment_media`
--
ALTER TABLE `surg_pre_op_assessment_media`
  MODIFY `pre_op_ass_media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91015;

--
-- AUTO_INCREMENT for table `treatment_plan`
--
ALTER TABLE `treatment_plan`
  MODIFY `treatment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70003;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `userrole_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles_pages`
--
ALTER TABLE `user_roles_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles_pages_right`
--
ALTER TABLE `user_roles_pages_right`
  MODIFY `page_right_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visit_log`
--
ALTER TABLE `visit_log`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31004;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
