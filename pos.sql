-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 12:12 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--
CREATE DATABASE IF NOT EXISTS `pos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pos`;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `message` longtext DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('M','W') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `del_key` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `del_key` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`, `del_key`) VALUES
(1, 'Bakso & Tahu Bakso', '2020-07-02 16:46:10', NULL, 1),
(2, 'bento frozen', '2020-07-02 16:46:11', NULL, 1),
(3, 'Bumbu', '2020-07-02 16:46:11', NULL, 1),
(4, 'Cireng', '2020-07-02 16:46:11', NULL, 1),
(5, 'Daging Burger, Kebab', '2020-07-02 16:46:11', NULL, 1),
(6, 'Dimsum', '2020-07-02 16:46:11', NULL, 1),
(7, 'Donat, Roti, Bakpao', '2020-07-02 16:46:11', NULL, 1),
(8, 'Kaki Naga', '2020-07-02 16:46:11', NULL, 1),
(9, 'Keju', '2020-07-02 16:46:11', NULL, 1),
(10, 'Kentang Goreng', '2020-07-02 16:46:11', NULL, 1),
(11, 'Minuman', '2020-07-02 16:46:11', NULL, 1),
(12, 'Nugget', '2020-07-02 16:46:11', NULL, 1),
(13, 'Otak Otak', '2020-07-02 16:46:11', NULL, 1),
(14, 'Puding', '2020-07-02 16:46:11', NULL, 1),
(15, 'Rolade', '2020-07-02 16:46:11', NULL, 1),
(16, 'Roti Maryam', '2020-07-02 16:46:11', NULL, 1),
(17, 'Saos & Mayonaise', '2020-07-02 16:46:11', NULL, 1),
(18, 'Seafood Cedea', '2020-07-02 16:46:11', NULL, 1),
(19, 'Sosis', '2020-07-02 16:46:11', NULL, 1),
(20, 'Susu', '2020-07-02 16:46:11', NULL, 1),
(21, 'Umum', '2020-07-02 16:46:11', NULL, 1),
(22, 'Es Krim', '2020-07-02 17:06:35', '2020-07-02 12:21:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `del-key` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created`, `updated`, `del-key`) VALUES
(230, 'A001', 'Shrimp Roll isi Full Pack isi 30', 250, 11, 85000, 10, NULL, '2020-07-04 11:23:19', NULL, 1),
(231, 'A002', 'Kimbo Sosis Sapi Ori Mini BW isi 10', 267, 11, 30000, 3, NULL, '2020-07-04 11:23:19', NULL, 1),
(232, 'A003', 'Tasaji Roti Maryam Ori', 264, 11, 16000, 2, NULL, '2020-07-04 11:23:19', '2020-07-04 15:05:54', 1),
(233, 'A004', 'Dimsum Pack isi 8', 254, 11, 20000, 4, NULL, '2020-07-04 11:23:19', NULL, 1),
(234, 'A005', 'Bakso Sapi AB Warisan 319 isi 10', 249, 11, 8500, 0, NULL, '2020-07-04 11:23:19', NULL, 1),
(235, 'A006', 'Athien Otak Otak Super', 261, 11, 7000, 6, NULL, '2020-07-04 11:23:19', NULL, 1),
(236, 'A007', 'Ayoma Rolade Ayam 225 Gr', 263, 11, 12000, 5, NULL, '2020-07-04 11:23:19', NULL, 1),
(237, 'A008', 'Ayoma Rolade Sapi 225 Gr', 263, 11, 13000, 2, NULL, '2020-07-04 11:23:19', NULL, 1),
(238, 'A009', 'Bakso Sapi SB Kebon Jeruk isi 25', 249, 11, 29000, 1, NULL, '2020-07-04 11:23:20', NULL, 1),
(239, 'A010', 'Bakso Sapi SB Kebon Jeruk isi 50', 249, 11, 56000, 0, NULL, '2020-07-04 11:23:20', NULL, 1),
(240, 'A011', 'Bakso Sapi One Suke isi 10', 249, 11, 9000, 2, NULL, '2020-07-04 11:23:20', '2020-07-04 14:56:38', 1),
(241, 'A012', 'Belfoods Ceria Nugget 250gr', 260, 11, 22000, 11, NULL, '2020-07-04 11:23:20', NULL, 1),
(242, 'A013', 'Belfoods Nugget Ayam 170gr', 260, 11, 10000, 0, NULL, '2020-07-04 11:23:20', NULL, 1),
(243, 'A014', 'Belfoods Nugget Koin 250gr', 260, 11, 15000, 9, NULL, '2020-07-04 11:23:20', NULL, 1),
(244, 'A015', 'Belfoods Nugget Stick 250 Gr', 260, 11, 15000, 7, NULL, '2020-07-04 11:23:20', NULL, 1),
(245, 'A016', 'Belfoods Nugget Stick 500 Gr', 260, 11, 29500, 0, NULL, '2020-07-04 11:23:20', NULL, 1),
(246, 'A017', 'Belfoods Golden Fillet 250 Gr', 260, 11, 28500, 6, NULL, '2020-07-04 11:23:20', NULL, 1),
(247, 'A018', 'Belfoods Golden Fillet 500 Gr', 260, 11, 56500, 0, NULL, '2020-07-04 11:23:20', NULL, 1),
(248, 'A019', 'Belfoods Kentang Shoestring 500 Gr', 258, 11, 19000, 1, NULL, '2020-07-04 11:23:20', NULL, 1),
(249, 'A020', 'Belfoods Kentang Shoestring 200 Gr', 258, 11, 10000, 42, NULL, '2020-07-04 11:23:20', NULL, 1),
(250, 'A021', 'Belfoods Sosis Ayam 200 Gr', 267, 11, 10000, 0, NULL, '2020-07-04 11:23:20', NULL, 1),
(251, 'A022', 'Belfoods Baso Ayam isi 50', 249, 11, 16000, 2, NULL, '2020-07-04 11:23:20', NULL, 1),
(252, 'A023', 'Belfoods Baso Ayam Mini isi 100', 249, 11, 15000, 5, NULL, '2020-07-04 11:23:20', NULL, 1),
(253, 'A024', 'Belfoods Uenak Nugget Ayam S 250 Gr', 260, 11, 12000, 0, NULL, '2020-07-04 11:23:20', NULL, 1),
(254, 'A025', 'Belfoods Nugget Ayam S 500 Gr', 260, 11, 20500, 0, NULL, '2020-07-04 11:23:20', NULL, 1),
(255, 'A026', 'Belfoods Uenak Sosis Ayam 500 Gr', 267, 11, 18000, 5, NULL, '2020-07-04 11:23:20', NULL, 1),
(256, 'A027', 'Belfoods Uenak Sosis Ayam 375 Gr isi 15', 267, 11, 15000, 9, NULL, '2020-07-04 11:23:20', NULL, 1),
(257, 'A028', 'Bumbu Bamboe Hainan', 251, 11, 8000, 2, NULL, '2020-07-04 11:23:20', NULL, 1),
(258, 'A029', 'Bumbu Bamboe Nasi Goreng', 251, 11, 6000, 1, NULL, '2020-07-04 11:23:20', NULL, 1),
(259, 'A030', 'Bumbu Bamboe Nasi Goreng Pedas', 251, 11, 6000, 1, NULL, '2020-07-04 11:23:20', NULL, 1),
(260, 'A031', 'Bumbu Bamboe Rawon', 251, 11, 6000, 3, NULL, '2020-07-04 11:23:20', NULL, 1),
(261, 'A032', 'Bumbu Bamboe Rendang', 251, 11, 6000, 2, NULL, '2020-07-04 11:23:20', NULL, 1),
(262, 'A033', 'Bumbu Bamboo Tom Yum', 251, 11, 8000, 11, NULL, '2020-07-04 11:23:20', NULL, 1),
(263, 'A034', 'Cedea Crab Stick 250 gr', 266, 11, 14000, 3, NULL, '2020-07-04 11:23:20', NULL, 1),
(264, 'A035', 'Cedea Fish Roll 250 Gr', 266, 11, 14000, 3, NULL, '2020-07-04 11:23:20', NULL, 1),
(265, 'A036', 'Cedea Steamboat 300 gr', 266, 11, 23000, 5, NULL, '2020-07-04 11:23:20', NULL, 1),
(266, 'A037', 'Champ Sosis Ayam 375 Gr', 267, 11, 16000, 1, NULL, '2020-07-04 11:23:20', NULL, 1),
(267, 'A038', 'Ciki Wiki Nugget 250 Gr', 260, 11, 14000, 1, NULL, '2020-07-04 11:23:20', NULL, 1),
(268, 'A039', 'Delmonte Sambel Hot 1 Kg', 265, 11, 19500, 2, NULL, '2020-07-04 11:23:20', NULL, 1),
(269, 'A040', 'Delmonte Saos Tomat 1 Kg', 265, 11, 15000, 2, NULL, '2020-07-04 11:23:20', NULL, 1),
(270, 'A041', 'Diva Donat Kentang', 255, 11, 19000, 2, NULL, '2020-07-04 11:23:21', NULL, 1),
(271, 'A042', 'Diva Roti Goreng Ayam Sayur isi 10', 255, 11, 20000, 4, NULL, '2020-07-04 11:23:21', NULL, 1),
(272, 'A043', 'Diva Roti Goreng Coklat', 255, 11, 20000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(273, 'A044', 'Diva Roti Goreng Coklat Keju', 255, 11, 21000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(274, 'A045', 'Diva Roti Goreng Jasuke', 255, 11, 23000, 2, NULL, '2020-07-04 11:23:21', NULL, 1),
(275, 'A046', 'Diva Roti Goreng Pisang Coklat', 255, 11, 21000, 3, NULL, '2020-07-04 11:23:21', NULL, 1),
(276, 'A047', 'Diva Roti Goreng Sosis', 255, 11, 23000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(277, 'A048', 'Rujak Cireng Brecxelle', 252, 11, 13000, 2, NULL, '2020-07-04 11:23:21', '2020-07-04 15:15:24', 1),
(278, 'A049', 'Donat Makmur', 255, 11, 14000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(279, 'A050', 'Ebi Furai FullPack isi 12', 250, 11, 27000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(280, 'A051', 'Ebi Furai isi 6', 250, 11, 14000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(281, 'A052', 'Euro Gourmet Saos Keju', 265, 11, 21000, 1, NULL, '2020-07-04 11:23:21', NULL, 1),
(282, 'A053', 'Hemato Nugget 250 Gr', 260, 11, 10000, 3, NULL, '2020-07-04 11:23:21', NULL, 1),
(283, 'A054', 'Hemato Nugget Ayam 500 Gr', 260, 11, 17000, 2, NULL, '2020-07-04 11:23:21', NULL, 1),
(284, 'A055', 'Hemato Sosis Ayam 375 Gr', 267, 11, 13000, 1, NULL, '2020-07-04 11:23:21', NULL, 1),
(285, 'A056', 'Hemato Sosis Sapi 375 Gr', 267, 11, 13000, 2, NULL, '2020-07-04 11:23:21', NULL, 1),
(286, 'A057', 'Kipao Mini 430 Gr isi 25', 255, 11, 16000, 2, NULL, '2020-07-04 11:23:21', NULL, 1),
(287, 'A058', 'La Fonte Saos Bolognese', 265, 11, 19000, 1, NULL, '2020-07-04 11:23:21', NULL, 1),
(288, 'A059', 'Maestro Light Mayonaise', 265, 11, 28000, 2, NULL, '2020-07-04 11:23:21', NULL, 1),
(289, 'A060', 'Maestro Thousand Island 1kg', 265, 11, 27000, 5, NULL, '2020-07-04 11:23:21', NULL, 1),
(290, 'A061', 'Minaku Kaki Naga 500 Gr', 256, 11, 16500, 3, NULL, '2020-07-04 11:23:21', NULL, 1),
(291, 'A062', 'Mydibel Kentang Shoestring 1 kg', 258, 11, 25000, 3, NULL, '2020-07-04 11:23:21', NULL, 1),
(292, 'A063', 'Beef Teriyaki 5 porsi', 250, 11, 85000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(293, 'A064', 'Chicken Katsu isi 4', 250, 11, 65000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(294, 'A065', 'Chicken Teriyaki 5 porsi', 250, 11, 60000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(295, 'A066', 'Crab Roll isi 15', 250, 11, 110000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(296, 'A067', 'Crab Roll Isi 5', 250, 11, 40000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(297, 'A068', 'Premium Dimsum ayam isi 10', 254, 11, 35000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(298, 'A069', 'Premium Dimsum Ayam Isi 20', 254, 11, 70000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(299, 'A070', 'Premium Dimsum Ayam Udang Isi 20', 254, 11, 70000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(300, 'A071', 'Premium Dimsum Udang Isi 20', 254, 11, 70000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(301, 'A072', 'Premium Ebi Furai Full Pack', 250, 11, 45000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(302, 'A073', 'Egg Chicken Roll Full Pack', 250, 11, 85000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(303, 'A074', 'Egg Chicken Roll Isi 3', 250, 11, 40000, 0, NULL, '2020-07-04 11:23:21', '2020-07-04 14:55:41', 1),
(304, 'A075', 'Shrimp Roll Isi 10', 250, 11, 30000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(305, 'A076', 'Spicy Chicken Full Pack Isi 30', 250, 11, 85000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(306, 'A077', 'Spicy Chicken Isi 10', 250, 11, 30000, 0, NULL, '2020-07-04 11:23:21', NULL, 1),
(307, 'A078', 'Tori No Teba isi 10', 250, 11, 110000, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(308, 'A079', 'Toni No Teba Isi 2', 250, 11, 23000, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(309, 'A080', 'Champ Nugget 250 Gr', 260, 11, 17000, 3, NULL, '2020-07-04 11:23:22', NULL, 1),
(310, 'A081', 'Prochiz Keju Cheddar 170 Gr', 257, 11, 17000, 2, NULL, '2020-07-04 11:23:22', NULL, 1),
(311, 'A082', 'Rujak Cireng LBA', 252, 11, 13500, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(312, 'A083', 'Silky Puding', 262, 11, 16000, 4, NULL, '2020-07-04 11:23:22', NULL, 1),
(313, 'A084', 'Silky Puding', 262, 11, 16000, 4, NULL, '2020-07-04 11:23:22', NULL, 1),
(314, 'A085', 'Silky Puding', 262, 11, 16000, 1, NULL, '2020-07-04 11:23:22', NULL, 1),
(315, 'A086', 'Silky Puding', 262, 11, 16000, 1, NULL, '2020-07-04 11:23:22', NULL, 1),
(316, 'A087', 'Tahu Bakso Dua Saudara isi 10', 249, 11, 11000, 2, NULL, '2020-07-04 11:23:22', NULL, 1),
(317, 'A088', 'Tahu Bakso Dua Saudara isi 10', 249, 11, 11000, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(318, 'A089', 'Tasaji Roti Maryam Keju 400 gr', 264, 11, 23000, 2, NULL, '2020-07-04 11:23:22', NULL, 1),
(319, 'A090', 'Teman Laut Bakso Ikan', 269, 11, 19000, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(320, 'A091', 'Diamond UHT Chocolate 1 L', 268, 11, 16000, 5, NULL, '2020-07-04 11:23:22', NULL, 1),
(321, 'A092', 'Diamond Biggy Chocolate Puding', 262, 11, 3000, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(322, 'A093', 'Diamond Biggy Manggo Puding', 262, 11, 3000, 6, NULL, '2020-07-04 11:23:22', NULL, 1),
(323, 'A094', 'Cedea Steamboat 500 gr', 266, 11, 36000, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(324, 'A095', 'Hemato Sosis Ayam Kombinasi', 267, 11, 13000, 2, NULL, '2020-07-04 11:23:22', NULL, 1),
(325, 'A096', 'Cedea Fish Dumpling Cheese 200 gr', 266, 11, 12500, 3, NULL, '2020-07-04 11:23:22', NULL, 1),
(326, 'A097', 'Cedea Chikuwa 250 gr', 266, 11, 16000, 2, NULL, '2020-07-04 11:23:22', NULL, 1),
(327, 'A098', 'Kimbo Sosis Sapi Lada Hitam Mini BW isi 10', 267, 11, 30000, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(328, 'A099', 'Kimbo Sosis Sapi Keju mini BW isi 10', 267, 11, 30000, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(329, 'A100', 'Prima Agung Saos Barbeque 250 gr', 265, 11, 13000, 1, NULL, '2020-07-04 11:23:22', NULL, 1),
(330, 'A101', 'Prima Agung Mayonais 250 gr', 265, 11, 13000, 1, NULL, '2020-07-04 11:23:22', NULL, 1),
(331, 'A102', 'Bakso SB Warisan 319 Isi 50', 249, 11, 29000, 1, NULL, '2020-07-04 11:23:22', NULL, 1),
(332, 'A103', 'Cedea Dumpling Chicken 500 gr', 266, 11, 28000, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(333, 'A104', 'Diva Risol Isi 10', 255, 11, 25000, 1, NULL, '2020-07-04 11:23:22', NULL, 1),
(334, 'A105', 'Lemon Sereh Selasin', 259, 11, 7000, 17, NULL, '2020-07-04 11:23:22', NULL, 1),
(335, 'A106', 'Maestro Thousand Island 180 gr', 265, 11, 8500, 1, NULL, '2020-07-04 11:23:22', NULL, 1),
(336, 'A107', 'Delmonte Saos Barbeque 250 gr', 265, 11, 8500, 1, NULL, '2020-07-04 11:23:22', NULL, 1),
(337, 'A108', 'Delmonte Saus Extra Hot Sachet isi 24', 265, 11, 7000, 2, NULL, '2020-07-04 11:23:22', NULL, 1),
(338, 'A109', 'Delmonte Saos Tomat sachet isi 24', 265, 11, 7000, 2, NULL, '2020-07-04 11:23:22', NULL, 1),
(339, 'A110', 'Bernardi Roti Burger Wijen Isi 6', 255, 11, 13000, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(340, 'A111', 'Belfoods Baso Ayam 100 gr', 249, 11, 10000, 19, NULL, '2020-07-04 11:23:22', NULL, 1),
(341, 'A112', 'Roti Maryam Catering', 264, 11, 0, 4, NULL, '2020-07-04 11:23:22', NULL, 1),
(342, 'A113', 'Roti Cane/Mariyam Polos Isi 20', 264, 11, 19000, 4, NULL, '2020-07-04 11:23:22', NULL, 1),
(343, 'A114', 'Hemato Daging Burger Isi 10', 253, 11, 10000, 2, NULL, '2020-07-04 11:23:22', NULL, 1),
(344, 'A115', 'Catering Tortila Isi 20', 255, 11, 20000, 1, NULL, '2020-07-04 11:23:22', NULL, 1),
(345, 'A116', 'Catering Tortila Sedang', 255, 11, 25000, 1, NULL, '2020-07-04 11:23:22', NULL, 1),
(346, 'A117', 'Burger Yona', 253, 11, 36000, 1, NULL, '2020-07-04 11:23:22', NULL, 1),
(347, 'A118', 'Daging Kebab Iris 250 gr', 253, 11, 34000, 0, NULL, '2020-07-04 11:23:22', NULL, 1),
(348, 'A119', 'Diamond UHT Full Cream 1 L', 268, 11, 16000, 6, NULL, '2020-07-04 11:23:23', NULL, 1),
(349, 'A120', 'ladaku', 251, 11, 1000, 2, NULL, '2020-07-04 11:23:23', NULL, 1),
(350, 'A121', 'Paket Belfoods 1', 260, 11, 28000, 0, NULL, '2020-07-04 11:23:23', NULL, 1),
(351, 'A122', 'Lolipop', 270, 11, 1500, 300, NULL, '2020-07-04 11:23:23', NULL, 1),
(352, 'A123', 'Frutty', 270, 11, 2000, 300, NULL, '2020-07-04 11:23:23', NULL, 1),
(353, 'A124', 'Mini Sombrero', 270, 11, 2500, 300, NULL, '2020-07-04 11:23:23', NULL, 1),
(354, 'A125', 'Regular Cup', 270, 11, 3000, 300, NULL, '2020-07-04 11:23:23', NULL, 1),
(355, 'A126', 'Pudding', 270, 11, 3000, 300, NULL, '2020-07-04 11:23:23', NULL, 1),
(356, 'A127', 'Big Bite', 270, 11, 3500, 300, NULL, '2020-07-04 11:23:23', NULL, 1),
(357, 'A128', 'Bakso Sapi One Suke isi 20', 249, 11, 8000, 3, NULL, '2020-07-04 19:59:10', '2020-07-04 14:59:45', 1),
(358, 'A129', 'So Nice Nugget Stick 250 gram', 260, 11, 14000, 1, NULL, '2020-07-04 20:01:07', NULL, 1),
(359, 'A130', 'So Nice Sosis Ayam 375 gram isi 15', 267, 11, 14000, 1, NULL, '2020-07-04 20:02:11', NULL, 1),
(360, 'A131', 'Turki Kebab Frozen mini isi 1-', 253, 11, 27000, 1, NULL, '2020-07-04 20:05:27', NULL, 1),
(361, 'A132', 'Egg Chicken Roll Polos isi 3', 250, 11, 20500, 1, NULL, '2020-07-04 20:07:42', NULL, 1),
(362, 'A133', 'My Healthy Yogurt isi 30 per pack', 259, 11, 15000, 1, NULL, '2020-07-04 20:11:09', NULL, 1),
(363, 'A134', 'My Healthy Yogurt satuan', 259, 11, 1000, 30, NULL, '2020-07-04 20:11:51', NULL, 1),
(364, 'A135', 'Beef Patties Yona 500 gram isi 10', 253, 11, 36000, 0, NULL, '2020-07-04 20:14:14', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL,
  `del_key` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `created`, `updated`, `del_key`) VALUES
(11, 'Semua', '2020-07-02 17:11:09', '2020-07-02 12:11:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL,
  `del_key` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_cart`
--

CREATE TABLE `t_cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `discount_item` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_order`
--

CREATE TABLE `t_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_sale`
--

CREATE TABLE `t_sale` (
  `sale_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_total` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_total`, `cash`, `remaining`, `note`, `date`, `user_id`, `created`) VALUES
(4, 'NF2007040001', NULL, 28000, 0, 28000, 100000, 72000, '2 orang', '2020-07-04', 1, '2020-07-04 11:26:23'),
(5, 'NF2007040002', NULL, 40000, 0, 40000, 50000, 10000, '', '2020-07-04', 33, '2020-07-04 17:52:36'),
(6, 'NF2007040003', NULL, 82000, 0, 82000, 100000, 18000, '', '2020-07-04', 33, '2020-07-04 18:57:50'),
(7, 'NF2007080001', NULL, 56000, 0, 56000, 100000, 44000, '', '2020-07-08', 33, '2020-07-08 11:37:25'),
(8, 'NF2007080002', NULL, 30000, 0, 30000, 50000, 20000, '', '2020-07-08', 33, '2020-07-08 11:41:42'),
(9, 'NF2007080003', NULL, 35000, 0, 35000, 50000, 15000, '', '2020-07-08', 33, '2020-07-08 11:42:31'),
(10, 'NF2007080004', NULL, 8500, 0, 8500, 100000, 91500, 'kulit kebab Rp. 25.000\ndaging kebab 1 kg Rp. 75.000', '2020-07-08', 33, '2020-07-08 11:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `t_sale_detail`
--

CREATE TABLE `t_sale_detail` (
  `detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sale_detail`
--

INSERT INTO `t_sale_detail` (`detail_id`, `sale_id`, `item_id`, `price`, `qty`, `discount_item`, `total`) VALUES
(7, 4, 267, 14000, 1, 0, 14000),
(8, 4, 256, 15000, 1, 1000, 14000),
(9, 5, 309, 17000, 1, 0, 17000),
(10, 5, 246, 28500, 1, 5500, 23000),
(11, 6, 323, 36000, 1, 0, 36000),
(12, 6, 250, 10000, 1, 0, 10000),
(13, 6, 326, 16000, 1, 0, 16000),
(14, 6, 233, 20000, 1, 0, 20000),
(15, 7, 360, 27000, 1, 0, 27000),
(16, 7, 231, 30000, 1, 1000, 29000),
(17, 8, 249, 10000, 1, 0, 10000),
(18, 8, 242, 10000, 1, 0, 10000),
(19, 8, 282, 10000, 1, 0, 10000),
(20, 9, 364, 36000, 1, 1000, 35000),
(21, 10, 335, 8500, 1, 0, 8500);

--
-- Triggers `t_sale_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_min` AFTER INSERT ON `t_sale_detail` FOR EACH ROW BEGIN
	UPDATE p_item SET stock = stock - NEW.qty
    WHERE item_id = NEW.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(1, 242, 'in', 'kulakan', NULL, 1, '2020-07-08', '2020-07-08 11:40:28', 33);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1 for admin, 2 for cashier',
  `image` varchar(128) CHARACTER SET utf8 NOT NULL,
  `password_updated` date DEFAULT NULL,
  `updated` time DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`, `image`, `password_updated`, `updated`, `created`) VALUES
(1, 'Admin', '33df0a7c29b3cf85e5aa152f1f65178854b7bc4a', 'Atha Tsaqif', 'Pemalang', 1, 'profile-Admins-200605.JPG', NULL, NULL, '2020-06-11 19:12:52'),
(31, 'naftober2306', 'a00550f53670a031da51726f5d521c3d1f1f93f4', 'Nafisa Zahra', 'Dulido Bogor', 1, 'profile-naftober2306-200611.jpg', NULL, NULL, '2020-06-11 22:10:56'),
(33, 'Lia', '8cb2237d0679ca88db6464eac60da96345513964', 'Lia', 'Bekasi', 2, 'user-image.jpg', NULL, NULL, '2020-06-25 15:30:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `from_user` (`from_user`),
  ADD KEY `to_user` (`to_user`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `t_cart_ibfk_2` (`user_id`);

--
-- Indexes for table `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`from_user`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`to_user`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`);

--
-- Constraints for table `t_cart`
--
ALTER TABLE `t_cart`
  ADD CONSTRAINT `t_cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD CONSTRAINT `t_sale_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`);

--
-- Constraints for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
