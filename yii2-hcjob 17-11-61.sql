-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2018 at 10:00 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2-hcjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL COMMENT 'งานที่ดำเนินการ',
  `operator_name` varchar(150) DEFAULT NULL COMMENT 'ผู้ดำเนินการ',
  `forward_id` int(11) NOT NULL DEFAULT '1' COMMENT 'ประเภทการดำเนินการ',
  `forward_no` varchar(45) DEFAULT NULL COMMENT 'เลขที่การส่งต่อ',
  `cause` varchar(150) DEFAULT NULL COMMENT 'สาเหตุ',
  `process` text COMMENT 'วิธีการแก้ไข',
  `date_start` varchar(45) DEFAULT NULL COMMENT 'วันเริ่มดำเนินการ',
  `date_end` varchar(45) DEFAULT NULL COMMENT 'วันดำเนินการเสร็จ',
  `sparepart` text COMMENT 'อะไหล่',
  `pr_no` varchar(45) DEFAULT NULL COMMENT 'เลขที่ใบขอซื้อ',
  `cost` int(11) DEFAULT '0' COMMENT 'ค่าใช้จ่าย',
  `wage` int(11) DEFAULT '0' COMMENT 'ค่าแรง',
  `remask` text COMMENT 'หมายเหตุ',
  `photo` varchar(45) DEFAULT NULL COMMENT 'รูป',
  `file` varchar(45) DEFAULT NULL COMMENT 'ไฟล์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='การดำเนินการ';

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `orders_id`, `operator_name`, `forward_id`, `forward_no`, `cause`, `process`, `date_start`, `date_end`, `sparepart`, `pr_no`, `cost`, `wage`, `remask`, `photo`, `file`) VALUES
(1, 1, 'เอกชัย เกิดศรี', 3, '564488', 'แบตเสื่อม', 'เปลี่ยนแบต', '2018-11-15 08:30', '2018-11-15 10:00', 'แบตเตอรี่ 12V', 'PR-2546668', 400, 100, '', '', ''),
(2, 2, 'ภูมิพัฒน์ เกียรติบำรุง', 1, '', '', '', '', '', '', '', NULL, NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `approved`
--

CREATE TABLE `approved` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL COMMENT 'งานที่รับการอนุมัติ',
  `date_ap` varchar(45) DEFAULT NULL COMMENT 'วันที่อนุมัติ',
  `approve_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อผู้อนุมัติ',
  `comment` text COMMENT 'ความคิดเห็น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(11) NOT NULL,
  `assign_name` varchar(45) NOT NULL COMMENT 'แผนกที่รับมอบหมาย',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี',
  `line_token` varchar(45) DEFAULT NULL COMMENT 'รหัสกลุ่ม Line',
  `email` varchar(45) DEFAULT NULL COMMENT 'อีเมมล์กลาง',
  `tel` varchar(45) DEFAULT NULL COMMENT 'เบอร์โทร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `assign_name`, `color`, `line_token`, `email`, `tel`) VALUES
(1, 'อาคารสถานที่', '#0000ff', '', 'building@hicretethai.com', '2800'),
(2, 'ไอที', '#ff9900', '', 'icthc@hicretethai.com', '2100'),
(3, 'ไฟฟ้า', '#cc0000', '', 'electrical@hicretethai.com', '5100'),
(4, 'เครื่องกล', '#9900ff', '', '', ''),
(5, 'จัดการบ้านพัก', '#3c78d8', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cb_chart`
--

CREATE TABLE `cb_chart` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `chart_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datasource_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datasource_type` enum('query','datasource') COLLATE utf8_unicode_ci DEFAULT 'query',
  `tag_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_type` enum('table','chart') COLLATE utf8_unicode_ci DEFAULT 'chart',
  `result_id` char(36) COLLATE utf8_unicode_ci DEFAULT 'realtime',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `query` text COLLATE utf8_unicode_ci,
  `result` float DEFAULT NULL,
  `target_value` float DEFAULT NULL,
  `condition` text COLLATE utf8_unicode_ci,
  `options` text COLLATE utf8_unicode_ci,
  `xaxis` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaxis_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `series` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stacked` smallint(1) DEFAULT '0',
  `yaxis_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `params` text COLLATE utf8_unicode_ci,
  `latest_data` text COLLATE utf8_unicode_ci,
  `connection_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cb_chart`
--

INSERT INTO `cb_chart` (`id`, `name`, `detail`, `chart_type`, `datasource_id`, `datasource_type`, `tag_name`, `display_type`, `result_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `query`, `result`, `target_value`, `condition`, `options`, `xaxis`, `xaxis_label`, `series`, `stacked`, `yaxis_label`, `title`, `sub_title`, `params`, `latest_data`, `connection_id`) VALUES
('e1d8d443-8acd-4fe8-81a7-a7958d974539', 'order', '<p>.</p>', 'Line', '', 'query', 'order', 'chart', 'realtime', '2018-11-15 16:37:37', '2018-11-15 17:13:24', 1, 1, 'SELECT * FROM orders;', NULL, NULL, NULL, '', '', '', '', 0, '', '', '', '', NULL, 'efa0e4ec-9763-40be-bc78-f3ced8341f78');

-- --------------------------------------------------------

--
-- Table structure for table `cb_chart_type`
--

CREATE TABLE `cb_chart_type` (
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `options` text COLLATE utf8_unicode_ci,
  `widget_classname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cb_chart_type`
--

INSERT INTO `cb_chart_type` (`code`, `name`, `image`, `options`, `widget_classname`, `sort`) VALUES
('Area', 'Area', NULL, NULL, 'miloschuman\\highcharts\\Highcharts', NULL),
('Bar', 'Bar', NULL, NULL, 'miloschuman\\highcharts\\Highcharts', NULL),
('Column', 'Column', NULL, NULL, 'miloschuman\\highcharts\\Highcharts', NULL),
('Line', 'Line', NULL, NULL, 'miloschuman\\highcharts\\Highcharts', NULL),
('Pie', 'Pie', NULL, NULL, 'miloschuman\\highcharts\\Highcharts', NULL),
('Scatter', 'Scatter', NULL, NULL, 'miloschuman\\highcharts\\Highcharts', NULL),
('SolidGauge', 'Solid Gauge', NULL, NULL, 'miloschuman\\highcharts\\Highcharts', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cb_connection`
--

CREATE TABLE `cb_connection` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `connection_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `host` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `driver` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `database` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `charset` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cb_connection`
--

INSERT INTO `cb_connection` (`id`, `connection_name`, `host`, `port`, `username`, `password`, `created_at`, `updated_at`, `created_by`, `updated_by`, `driver`, `database`, `charset`) VALUES
('efa0e4ec-9763-40be-bc78-f3ced8341f78', 'yii2-hcjob', 'localhost', '3306', 'root', 'Í\ZðØ,/´HéªÈjª607501491e07c39cae3ba6084441993418a4e9f90b321a2051b44711fb1c34fe­_Lµ\n!ZÚËäë;+ð+aìfQÛÀy²r', '2018-11-15 16:36:08', '2018-11-15 16:36:08', 1, 1, 'mysql', 'yii2-hcjob', 'utf8');

-- --------------------------------------------------------

--
-- Table structure for table `cb_datasource`
--

CREATE TABLE `cb_datasource` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `query` text COLLATE utf8_unicode_ci,
  `connection_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `params` text COLLATE utf8_unicode_ci,
  `filter` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(45) NOT NULL COMMENT 'หน่วยงาน',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `color`) VALUES
(1, 'บริหารสำนักงาน', '#ff0000'),
(2, 'โครงสร้างเหล็ก', '#6aa84f'),
(3, 'วิศวกรรม', '#ffd966'),
(4, 'สนับสนุนและบริการ', '#ff00ff'),
(5, 'ผลิตภัณฑ์คอนกรีต', '#9900ff'),
(6, 'เครื่องกลและไฟฟ้า', '#0000ff');

-- --------------------------------------------------------

--
-- Table structure for table `forward`
--

CREATE TABLE `forward` (
  `id` int(11) NOT NULL,
  `forward_name` varchar(150) NOT NULL COMMENT 'ประเภทการดำเนินการ',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ประเภทการดำเนินการ';

--
-- Dumping data for table `forward`
--

INSERT INTO `forward` (`id`, `forward_name`, `color`) VALUES
(1, 'ดำเนินการภายใน', '#308d00'),
(2, 'ดำเนินการภายนอก', '#9900ff'),
(3, 'ส่งเคลม', '#ff9900'),
(4, 'ตีชำรุด', '#ff0000');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL COMMENT 'username',
  `password` varchar(45) NOT NULL COMMENT 'password'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1542187526),
('m140209_132017_init', 1542187530),
('m140403_174025_create_account_table', 1542187531),
('m140504_113157_update_tables', 1542187535),
('m140504_130429_create_token_table', 1542187537),
('m140506_102106_rbac_init', 1542187708),
('m140602_111327_create_menu_table', 1542187622),
('m140830_171933_fix_ip_field', 1542187537),
('m140830_172703_change_account_table_name', 1542187537),
('m141222_110026_update_ip_field', 1542187538),
('m141222_135246_alter_username_length', 1542187538),
('m150614_103145_update_social_account_table', 1542187540),
('m150623_212711_fix_username_notnull', 1542187541),
('m151218_234654_add_timezone_to_profile', 1542187541),
('m160312_050000_create_user', 1542187622),
('m160929_103127_add_last_login_at_to_user_table', 1542187541),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1542187708),
('m170907_093320_cb_chart_type', 1542274299),
('m170907_093428_cb_connection', 1542274299),
('m170907_093446_cb_datasource', 1542274300),
('m170907_093458_cb_chart', 1542274302),
('m170907_101344_cb_chart_typeDataInsert', 1542274302);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date_at` varchar(45) DEFAULT NULL COMMENT 'วันที่แจ้ง',
  `order_no` varchar(45) DEFAULT NULL COMMENT 'เลขที่ใบแจ้งงาน',
  `assign_id` int(11) NOT NULL COMMENT 'แจ้งไปยังหน่วยงาน',
  `user_request` varchar(100) NOT NULL COMMENT 'ชื่อผู้แจ้งงาน',
  `departments_id` int(11) NOT NULL COMMENT 'หน่วยงานผู้แจ้งงาน',
  `location` varchar(200) DEFAULT NULL COMMENT 'สถานที่',
  `asset_no` varchar(45) DEFAULT NULL COMMENT 'รหัสทรัพย์สิน',
  `equipment` varchar(200) DEFAULT NULL COMMENT 'ชนิดเครื่องจักร-อุปกรณ์',
  `title` varchar(200) NOT NULL COMMENT 'หัวข้อ',
  `details` text COMMENT 'รายละเอียด',
  `hc_job` varchar(45) DEFAULT NULL COMMENT 'เลขที่งาน(JOB)',
  `photo` varchar(45) DEFAULT NULL COMMENT 'รูป',
  `file` varchar(45) DEFAULT NULL COMMENT 'ไฟล์',
  `status_id` int(11) NOT NULL DEFAULT '1' COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date_at`, `order_no`, `assign_id`, `user_request`, `departments_id`, `location`, `asset_no`, `equipment`, `title`, `details`, `hc_job`, `photo`, `file`, `status_id`) VALUES
(1, '2018-11-14 14:40', 'JB-A0001', 3, 'ธีรพงศ์ ขันตา', 4, 'อาคารไอที', 'HC17OE010508-001', 'UPS', 'ไม่สำรองไฟ', 'เวลามีไฟดับทำให้ Server ดับไปด้วย', '61/BK', 'cce7d3c5b434eff630d9483132e53333.jpg', '', 3),
(2, '2018-11-17 10:20', 'JB-00002', 2, 'อาทิตย์ กรอบทอง', 5, 'โรงผลิตสายสีส้ม', 'HC17OE010502-005', 'คอมพิวเตอร์', 'เชื่อมต่อเน็ตไม่ได้', 'ไม่มี User password สำหรับผู้รับเหมา', '', 'ebcaa54a605b15200a5a33cc18ca00f6.png', '', 1),
(4, '2018-11-16 13:15', 'JB-A0025', 1, 'เด่นพงษ์ สุวบุตร', 4, 'ที่จอดรถอาคารเอ ล้อคที่ 5', '', 'ป้ายที่จอดรถ', 'ทำป้ายที่จอดรถ', 'ที่จอดรถอาคารเอ ล้อคที่ 5', '', '981cabf8de3159b61887ed759332d412.jpg', '', 1),
(5, '2018-11-15 09:30', 'JB-A0892', 4, 'สิทธิชัย ใจโปร่ง', 2, 'โรง Fab', '', 'รถ HIAB', 'รถยางรั่ว', 'เหยียบเหล็กแล้วเกิดยางรั่ว', '', 'accd31ecad9414ef90e7fde027b34eb8.jpg', '', 1),
(6, '2018-11-16 10:50', 'JB-A0987', 5, 'รุ่งนภา', 1, 'ห้อง A411', '', 'ก๊อกน้ำ', 'ก๊อกน้ำรั่ว', 'ห้อง A411 เจ้าของห้อง คุณอำนาจ', '', '9ac9ac2db24b9b698c0104ec501ec8db.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(45) NOT NULL COMMENT 'สกุล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(45) NOT NULL COMMENT 'สถานะ',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`, `color`) VALUES
(1, 'แจ้งงาน', '#ff0000'),
(2, 'อนุมัติดำเนินการ', '#ff9900'),
(3, 'ปิดงาน', '#00b614'),
(4, 'ยกเลิก', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `status`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$12$m8gss53ZYWIHeTdOOIzpheZXfFwLK4Owky1T0mCKTV33PTJ.kVC4i', 'lkpgNaLJcAQTKzMDDJ-3PmBypxw6gQtY', 1542187598, NULL, NULL, NULL, 1542187598, 1542187598, 0, 1542349498, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_actions_forward1_idx` (`forward_id`),
  ADD KEY `fk_actions_orders1_idx` (`orders_id`);

--
-- Indexes for table `approved`
--
ALTER TABLE `approved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_approved_orders1_idx` (`orders_id`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `cb_chart`
--
ALTER TABLE `cb_chart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_name` (`tag_name`),
  ADD KEY `chart_type` (`chart_type`);

--
-- Indexes for table `cb_chart_type`
--
ALTER TABLE `cb_chart_type`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `cb_connection`
--
ALTER TABLE `cb_connection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cb_datasource`
--
ALTER TABLE `cb_datasource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forward`
--
ALTER TABLE `forward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_departments_idx` (`departments_id`),
  ADD KEY `fk_orders_assign1_idx` (`assign_id`),
  ADD KEY `fk_orders_status1_idx` (`status_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`,`login_id`),
  ADD KEY `fk_person_login1_idx` (`login_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `approved`
--
ALTER TABLE `approved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `forward`
--
ALTER TABLE `forward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `fk_actions_forward1` FOREIGN KEY (`forward_id`) REFERENCES `forward` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_actions_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `approved`
--
ALTER TABLE `approved`
  ADD CONSTRAINT `fk_approved_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cb_chart`
--
ALTER TABLE `cb_chart`
  ADD CONSTRAINT `fk_cb_chart_chart_type` FOREIGN KEY (`chart_type`) REFERENCES `cb_chart_type` (`code`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_assign1` FOREIGN KEY (`assign_id`) REFERENCES `assign` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_departments` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `fk_person_login1` FOREIGN KEY (`login_id`) REFERENCES `logins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
