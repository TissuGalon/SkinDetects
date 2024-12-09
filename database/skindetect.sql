-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 08:10 AM
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
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `nama_pesanan` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `total_harga` int(5) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `status` enum('dipesan','dikirim') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nama_pesanan`, `user_id`, `id_product`, `qty`, `total_harga`, `nama_pemesan`, `alamat`, `status`) VALUES
(3, 'Wardah', 1, 16, 4, 40000, 'gg', '43453', 'dipesan'),
(4, 'Wardah', 1, 16, 5, 50000, 'gg', 'jghjghj', 'dipesan');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `harga` int(15) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `product_code` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `harga`, `image`, `product_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Night Cream JKL', 'Krim malam untuk perawatan kulit saat tidur', 0, 'img_673f27e1c03953.01478872.jpeg', 'PRD-006', '2024-11-19 19:07:18', NULL, NULL),
(7, 'Toner MNO', 'Toner untuk menyegarkan kulit setelah mencuci muka', 0, 'toner_mno.jpg', 'PRD-007', '2024-11-19 19:07:18', NULL, NULL),
(8, 'Face Mask PQR', 'Masker wajah dengan kandungan charcoal untuk detoksifikasi', 0, 'face_mask_pqr.jpg', 'PRD-008', '2024-11-19 19:07:18', NULL, NULL),
(9, 'Lip Balm STU', 'Lip balm dengan kandungan pelembap alami', 0, 'lip_balm_stu.jpg', 'PRD-009', '2024-11-19 19:07:18', NULL, NULL),
(10, 'Foundation VWX', 'Foundation cair dengan coverage tinggi', 0, 'foundation_vwx.jpg', 'PRD-010', '2024-11-19 19:07:18', NULL, NULL),
(11, 'Blush On YZ', 'Blush on dengan warna natural untuk riasan sehari-hari', 0, 'blush_on_yz.jpg', 'PRD-011', '2024-11-19 19:07:18', NULL, NULL),
(12, 'Eye Cream ABC', 'Krim mata untuk mengurangi lingkaran hitam', 0, 'eye_cream_abc.jpg', 'PRD-012', '2024-11-19 19:07:18', NULL, NULL),
(13, 'Body Lotion DEF', 'Lotion untuk melembapkan kulit tubuh sepanjang hari', 0, 'body_lotion_def.jpg', 'PRD-013', '2024-11-19 19:07:18', NULL, NULL),
(14, 'Hair Serum GHI', 'Serum rambut untuk mengatasi rambut rontok', 0, 'hair_serum_ghi.jpg', 'PRD-014', '2024-11-19 19:07:18', NULL, NULL),
(15, 'Makeup Remover JKL', 'Penghapus makeup yang lembut untuk kulit sensitif', 0, 'makeup_remover_jkl.jpg', 'PRD-015', '2024-11-19 19:07:18', NULL, NULL),
(16, 'Wardah', 'hehe', 10000, 'Wardah.png', 'PRD-16', '2024-11-21 07:52:13', NULL, NULL),
(17, 'Emina', 'hehehehe', 0, 'img_673ee78c8485b7.58561826.jpeg', 'PRD-17', '2024-11-21 07:55:56', NULL, NULL),
(18, 'Anu', 'Mwehehhe', 0, 'img_673f1d1aade0d2.81482570.jpeg', 'PRD-18', '2024-11-21 11:44:26', NULL, NULL);

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

--
-- Dumping data for table `transaction_item`
--

INSERT INTO `transaction_item` (`item_id`, `transaction_id`, `product_id`, `qty`) VALUES
(4, 1, 16, 2);

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
(1, 'admin', '$2y$10$e1T8I4y5v9Mk9BivLcGW/.C9tN5Tk/vjgPKKvp1e9rdg5HFCCWmAW', 'Admin System', NULL, 1, '2024-11-19 18:58:47', NULL),
(2, 'user1', '6ad14ba9986e3615423dfca256d04e3f', 'John Doe', 'john.jpg', 2, '2024-11-19 18:58:47', NULL),
(3, 'user2', '6ad14ba9986e3615423dfca256d04e3f', 'Jane Doe', 'jane.jpg', 2, '2024-11-19 18:58:47', NULL),
(4, 'gg', '$2y$10$zEcn.oF95bJcTTBdFzRuI.KVcOO7tg2TNeuKLN3tdRuYSFBc72J4W', '', NULL, 2, '2024-11-25 02:06:21', NULL),
(5, 'wew', '$2y$10$e1T8I4y5v9Mk9BivLcGW/.C9tN5Tk/vjgPKKvp1e9rdg5HFCCWmAW', '', NULL, 2, '2024-11-25 02:06:59', NULL),
(6, 'yy', '$2y$10$Ff3mjQQLYG07YPv3s6tlCeRL6fuULfhZzchWzXamrFAwvquAMz0We', '', NULL, 2, '2024-12-09 05:57:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

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
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
