-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 02:54 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_siekedelai`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaction`
--

CREATE TABLE `detail_transaction` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaction`
--

INSERT INTO `detail_transaction` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(1, 'TR17110001', 4, 20, 8500, 170000, '2017-11-30 10:24:39', '2017-11-30 10:24:39'),
(2, 'TR17110001', 3, 10, 20000, 200000, '2017-11-30 10:24:39', '2017-11-30 10:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `transaction_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TR17110001', '45fa2e9fbf98e64035d39c5383eeec6e.jpg', 0, '2017-12-01 12:29:16', '2017-12-01 12:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `berat` int(11) NOT NULL DEFAULT '1',
  `discount` float NOT NULL,
  `available` enum('1','0') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `type`, `name`, `description`, `price`, `stock`, `berat`, `discount`, `available`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kedelai ABC', 'Kedelai lokal terbaik yang pernah ada', 18000, 56, 1, 0, '1', '2017-11-29 14:28:42', '2017-11-29 14:28:42'),
(2, 2, 'Kedelai Jhon', 'Kedelai impor yang enak dan keren', 25000, 40, 1, 10, '1', '2017-11-29 14:29:42', '2017-11-29 14:29:42'),
(3, 2, 'Awesome Kedelai', 'Kedelai paling mantap', 20000, 24, 1, 0, '1', '2017-11-29 14:30:35', '2017-11-30 10:24:39'),
(4, 2, 'Kacang kedelai Sintanila', 'kedelai impor paling laris', 10000, 25, 1, 15, '1', '2017-11-29 14:32:42', '2017-11-30 10:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '03442139186223263a08f1a7d5e97133.jpg', '2017-11-29 14:28:52', '2017-11-29 14:28:52'),
(2, 1, 'c38d8eeaf0fe7b320bbe679fc4cc9f47.jpg', '2017-11-29 14:29:00', '2017-11-29 14:29:00'),
(3, 1, 'b30a11db92a1211447c5dc18d5f2cf9d.jpg', '2017-11-29 14:29:09', '2017-11-29 14:29:09'),
(4, 2, 'cd57415c790a6b88f4392bf23b29633a.jpg', '2017-11-29 14:29:50', '2017-11-29 14:29:50'),
(5, 3, 'c4d8e9d221d53435cb0b2f1ecad26b43.jpg', '2017-11-29 14:30:49', '2017-11-29 14:30:49'),
(6, 3, '5f287c3137c86d1af89b7a8f5341aace.jpg', '2017-11-29 14:30:58', '2017-11-29 14:30:58'),
(7, 4, '8dfe672f0349dc0695d998b1b1a51a5e.jpg', '2017-11-29 14:32:51', '2017-11-29 14:32:51'),
(8, 4, '2df89d87919ed3bd013e2ec8acd6c3d6.jpg', '2017-11-29 14:32:59', '2017-11-29 14:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'TIKI', '15000', '2017-11-29 14:23:02', '2017-11-29 14:23:02'),
(2, 'JNE', '22000', '2017-11-29 14:23:10', '2017-11-29 14:23:10'),
(3, 'Wahana', '10000', '2017-11-29 14:23:22', '2017-11-29 14:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'ads@mail.com', '2017-12-01 13:32:35', '2017-12-01 13:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sub_total` float NOT NULL,
  `shipping` float NOT NULL,
  `total` float NOT NULL,
  `status` int(1) NOT NULL,
  `resi` varchar(100) DEFAULT NULL,
  `shipping_type` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `member_id`, `fullname`, `phone`, `address`, `sub_total`, `shipping`, `total`, `status`, `resi`, `shipping_type`, `created_at`, `updated_at`) VALUES
('TR17110001', 4, 'Member Bedebah', '086734747', 'Jalan Wisnu Marga Belayu No 19', 370000, 300000, 670000, 5, 'SKU0298849938932', 'Wahana', '2017-11-30 10:24:39', '2017-12-01 12:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isActive` int(1) NOT NULL DEFAULT '1',
  `type` int(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `isActive`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@mail.com', '$2y$10$bLGu/CEj58z2G1QX9J9DVegK6KScKwW0aUZOyhkXMld/7NhnVpOhu', '0822464828', 'Jalan Nangka', 1, 1, 'PntnES7JpnnUOXd7yLDdlryBay8KRExlRmfififHWT5t0We43iaC4XC14Pbe', '2017-05-26 20:49:12', '2017-05-30 00:55:14'),
(2, 'Admn Baru', 'baru@mail.com', '$2y$10$iKM.KC4IV6PlDsakdfC.JO/UPUOzBj.adt16uxpFIVX.WAqHixNtq', '08483748473', 'Jalan Merdeka No. 120', 1, 1, NULL, '2017-05-29 23:30:18', '2017-05-29 23:30:18'),
(4, 'Member Bedebah', 'member@mail.com', '$2y$10$Mj7tSGJJ786GO8Yuau1f2u.jTK40TOvlVroOFQkv2KPSRvPHZm3lm', '086734747', 'Jalan Wisnu Marga Belayu No 19', 1, 3, 'eQOKABFJGKXucjGadiOc97gKmciSgy0v1I00iRAIAvm0qNcGG2hKvpLuu8YZ', '2017-05-30 00:00:40', '2017-09-10 22:38:36'),
(6, 'Bedebah Edan', 'bedebah@mail.com', '$2y$10$z14Tf8v9zTeyQ56RDvtEduwl6lIMB1PqyyzpBf9t2UnNHzArBFzbK', '08476474638', 'Jalan Bedebah No. 666', 1, 3, 'RVYSGjvV7zoDEpcCor2aWrQh0kpjSElDT1lMMH86zaFbZYIzWcWKboA3awNM', '2017-06-12 23:00:06', '2017-06-12 23:00:06'),
(8, 'Made Bleger', 'made@mail.com', '$2y$10$NrfF0JNCS2uoBs.8PJhvjOXah3b77PXuPr.rvJSfQuLRyOSY97dG6', '082264546353', 'Jalan Raya Kapal No. 666', 1, 3, 'wC9KqMSRMUGA8Qtyj00lAXVQUV6cnKVEiveQ2QPPB7dW9MWMxNHnJB0g6Nza', '2017-09-08 17:53:48', '2017-09-08 17:53:48'),
(9, 'Test Register', 'memberbaru@mail.com', '$2y$10$rIycYKNp7.sWE883M8Q4FOIvjEJiHoXQgfObLHwIZK.rSeLB9VA8W', '085736484638', 'Jalan Nangka Utara No.1', 1, 3, 'MYV1bcf01CiXBNvnPp2sbHa6Mc8CL1d5QbfmYHTjzq4S6M0870iE7yNaSGNe', '2017-11-29 07:12:58', '2017-11-29 07:12:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
