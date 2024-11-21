-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 05:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skindetect`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_code` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `image`, `product_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Night Cream JKL', 'Krim malam untuk perawatan kulit saat tidur', 'img_673f27e1c03953.01478872.jpeg', 'PRD-006', '2024-11-19 19:07:18', NULL, NULL),
(7, 'Toner MNO', 'Toner untuk menyegarkan kulit setelah mencuci muka', 'toner_mno.jpg', 'PRD-007', '2024-11-19 19:07:18', NULL, NULL),
(8, 'Face Mask PQR', 'Masker wajah dengan kandungan charcoal untuk detoksifikasi', 'face_mask_pqr.jpg', 'PRD-008', '2024-11-19 19:07:18', NULL, NULL),
(9, 'Lip Balm STU', 'Lip balm dengan kandungan pelembap alami', 'lip_balm_stu.jpg', 'PRD-009', '2024-11-19 19:07:18', NULL, NULL),
(10, 'Foundation VWX', 'Foundation cair dengan coverage tinggi', 'foundation_vwx.jpg', 'PRD-010', '2024-11-19 19:07:18', NULL, NULL),
(11, 'Blush On YZ', 'Blush on dengan warna natural untuk riasan sehari-hari', 'blush_on_yz.jpg', 'PRD-011', '2024-11-19 19:07:18', NULL, NULL),
(12, 'Eye Cream ABC', 'Krim mata untuk mengurangi lingkaran hitam', 'eye_cream_abc.jpg', 'PRD-012', '2024-11-19 19:07:18', NULL, NULL),
(13, 'Body Lotion DEF', 'Lotion untuk melembapkan kulit tubuh sepanjang hari', 'body_lotion_def.jpg', 'PRD-013', '2024-11-19 19:07:18', NULL, NULL),
(14, 'Hair Serum GHI', 'Serum rambut untuk mengatasi rambut rontok', 'hair_serum_ghi.jpg', 'PRD-014', '2024-11-19 19:07:18', NULL, NULL),
(15, 'Makeup Remover JKL', 'Penghapus makeup yang lembut untuk kulit sensitif', 'makeup_remover_jkl.jpg', 'PRD-015', '2024-11-19 19:07:18', NULL, NULL),
(16, 'Wardah', 'hehe', 'Wardah.png', 'PRD-16', '2024-11-21 07:52:13', NULL, NULL),
(17, 'Emina', 'hehehehe', 'img_673ee78c8485b7.58561826.jpeg', 'PRD-17', '2024-11-21 07:55:56', NULL, NULL),
(18, 'Anu', 'Mwehehhe', 'img_673f1d1aade0d2.81482570.jpeg', 'PRD-18', '2024-11-21 11:44:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'dipesan',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'dipesan', '2024-11-19 18:59:58', NULL, NULL),
(2, 3, 'dikirim', '2024-11-19 18:59:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_item`
--

CREATE TABLE `transaction_item` (
  `item_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `photo_profile` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 2 COMMENT '1=Admin, 2=User',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `photo_profile`, `role`, `created_at`, `deleted_at`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin System', NULL, 1, '2024-11-19 18:58:47', NULL),
(2, 'user1', '6ad14ba9986e3615423dfca256d04e3f', 'John Doe', 'john.jpg', 2, '2024-11-19 18:58:47', NULL),
(3, 'user2', '6ad14ba9986e3615423dfca256d04e3f', 'Jane Doe', 'jane.jpg', 2, '2024-11-19 18:58:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaction_item`
--
ALTER TABLE `transaction_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction_item`
--
ALTER TABLE `transaction_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_item`
--
ALTER TABLE `transaction_item`
  ADD CONSTRAINT `transaction_item_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
