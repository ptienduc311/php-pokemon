-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2024 at 09:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokemon`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `energy_id` int(11) DEFAULT NULL,
  `image` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `name`, `energy_id`, `image`, `created_at`) VALUES
(1, 'Airmure', 8, 'public/image/Airmure.jpg', '2024-06-01 05:26:42'),
(2, 'Arcko', 1, 'public/image/Arcko.jpg', '2024-06-01 05:26:42'),
(3, 'Aspicot', 1, 'public/image/Aspicot.jpg', '2024-06-01 05:33:16'),
(4, 'Baggiguane', 7, 'public/image/Baggiguane.jpg', '2024-06-01 05:33:16'),
(5, 'Bébécaille', 9, 'public/image/Bébécaille.jpg', '2024-06-01 05:33:16'),
(6, 'Bombydou', 10, 'public/image/Bombydou.jpg', '2024-06-01 05:33:16'),
(7, 'Brindibou', 1, 'public/image/Brindibou.jpg', '2024-06-01 05:33:16'),
(8, 'Caninos', 2, 'public/image/Caninos.jpg', '2024-06-01 05:33:16'),
(9, 'Chacripan', 7, 'public/image/Chacripan.jpg', '2024-06-01 05:36:24'),
(10, 'Charpenti', 6, 'public/image/Charpenti.jpg', '2024-06-01 05:36:24'),
(11, 'Chartor', 2, 'public/image/Chartor.jpg', '2024-06-01 05:36:24'),
(12, 'Chovsourir', 5, 'public/image/Chovsourir.jpg', '2024-06-01 05:36:24'),
(13, 'Clic', 8, 'public/image/Clic.jpg', '2024-06-01 05:36:24'),
(14, 'Cornèbre', 7, 'public/image/Cornèbre.jpg', '2024-06-01 05:36:24'),
(15, 'Cosmog', 5, 'public/image/Cosmog.jpg', '2024-06-01 05:36:24'),
(16, 'Couafarel', 11, 'public/image/Couafarel.jpg', '2024-06-01 05:36:24'),
(17, 'Coupenotte', 11, 'public/image/Coupenotte.jpg', '2024-06-01 05:36:24'),
(18, 'Crabagarre', 6, 'public/image/Crabagarre.jpg', '2024-06-01 05:36:24'),
(19, 'Crabicoque', 1, 'public/image/Crabicoque.jpg', '2024-06-01 05:36:24'),
(20, 'Croquine', 1, 'public/image/Croquine.jpg', '2024-06-01 05:36:24'),
(21, 'Dedenne', 10, 'public/image/Dedenne.jpg', '2024-06-01 05:38:50'),
(22, 'Draïeul', 9, 'public/image/Draïeul.jpg', '2024-06-01 05:38:50'),
(23, 'Dynavolt', 4, 'public/image/Dynavolt.jpg', '2024-06-01 05:38:50'),
(24, 'Électhor', 4, 'public/image/Électhor.jpg', '2024-06-01 05:38:50'),
(25, 'Emolga', 4, 'public/image/Emolga.jpg', '2024-06-01 05:38:50'),
(26, 'Farfuret', 7, 'public/image/Farfuret.jpg', '2024-06-01 05:38:50'),
(27, 'Feuillajou', 1, 'public/image/Feuillajou.jpg', '2024-06-01 05:38:50'),
(28, 'Feunnec', 2, 'public/image/Feunnec.jpg', '2024-06-01 05:38:50'),
(29, 'Flamajou', 2, 'public/image/Flamajou.jpg', '2024-06-01 05:38:50'),
(30, 'Flamiaou', 2, 'public/image/Flamiaou.jpg', '2024-06-01 05:38:50'),
(31, 'Flotillon', 5, 'public/image/Flotillon.jpg', '2024-06-01 05:38:50'),
(32, 'Froussardine', 3, 'public/image/Froussardine.jpg', '2024-06-01 05:38:50'),
(33, 'Gobou', 3, 'public/image/Gobou.jpg', '2024-06-01 05:40:56'),
(34, 'Goélise', 3, 'public/image/Goélise.jpg', '2024-06-01 05:40:56'),
(35, 'Goupix', 3, 'public/image/Goupix.jpg', '2024-06-01 05:40:56'),
(36, 'Grenousse', 3, 'public/image/Grenousse.jpg', '2024-06-01 05:40:56'),
(37, 'Grotichon', 2, 'public/image/Grotichon.jpg', '2024-06-01 05:40:56'),
(38, 'Kaiminus', 3, 'public/image/Kaiminus.jpg', '2024-06-01 05:40:56'),
(39, 'Kirlia', 5, 'public/image/Kirlia.jpg', '2024-06-01 05:40:56'),
(40, 'Larvibule', 1, 'public/image/Larvibule.jpg', '2024-06-01 05:40:56'),
(41, 'Lianaja', 1, 'public/image/Lianaja.jpg', '2024-06-01 05:40:56'),
(42, 'Loupio', 4, 'public/image/Loupio.jpg', '2024-06-01 05:40:56'),
(43, 'Machoc', 6, 'public/image/Machoc.jpg', '2024-06-01 05:40:56'),
(44, 'Magicarpe', 3, 'public/image/Magicarpe.jpg', '2024-06-01 05:40:56'),
(45, 'Magmar', 2, 'public/image/Magmar.jpg', '2024-06-01 05:43:48'),
(46, 'Magnéti', 4, 'public/image/Magnéti.jpg', '2024-06-01 05:43:48'),
(47, 'Makuhita', 6, 'public/image/Makuhita.jpg', '2024-06-01 05:43:48'),
(48, 'Manglouton', 11, 'public/image/Manglouton.jpg', '2024-06-01 05:43:48'),
(49, 'Maracachi', 1, 'public/image/Maracachi.jpg', '2024-06-01 05:43:48'),
(50, 'Marill', 10, 'public/image/Marill.jpg', '2024-06-01 05:43:48'),
(51, 'Marill', 1, 'public/image/Marill.jpg', '2024-06-01 05:43:48'),
(52, 'Mascaïman', 6, 'public/image/Mascaïman.jpg', '2024-06-01 05:43:48'),
(53, 'Mateloutre', 3, 'public/image/Mateloutre.jpg', '2024-06-01 05:43:48'),
(54, 'Méditikka', 6, 'public/image/Méditikka.jpg', '2024-06-01 05:43:48'),
(55, 'Mélofée', 10, 'public/image/Mélofée.jpg', '2024-06-01 05:43:48'),
(56, 'Mentali', 5, 'public/image/Mentali.jpg', '2024-06-01 05:43:48'),
(57, 'Miaouss d\'Alola', 7, 'public/image/Miaouss d\'Alola.jpg', '2024-06-01 05:46:26'),
(58, 'Miaouss', 11, 'public/image/Miaouss.jpg', '2024-06-01 05:46:26'),
(59, 'Minidraco', 9, 'public/image/Minidraco.jpg', '2024-06-01 05:46:26'),
(60, 'Monorpale', 8, 'public/image/Monorpale.jpg', '2024-06-01 05:46:26'),
(61, 'Mucuscule', 9, 'public/image/Mucuscule.jpg', '2024-06-01 05:46:26'),
(62, 'Munna', 5, 'public/image/Munna.jpg', '2024-06-01 05:46:26'),
(63, 'Nanméouïe', 11, 'public/image/Nanméouïe.jpg', '2024-06-01 05:46:26'),
(64, 'Nénupiot', 1, 'public/image/Nénupiot.jpg', '2024-06-01 05:46:26'),
(65, 'Noctali', 7, 'public/image/Noctali.jpg', '2024-06-01 05:46:26'),
(66, 'Otaquin', 3, 'public/image/Otaquin.jpg', '2024-06-01 05:46:26'),
(67, 'Pandarbare', 7, 'public/image/Pandarbare.jpg', '2024-06-01 05:46:26'),
(68, 'Passerouge', 11, 'public/image/Passerouge.jpg', '2024-06-01 05:46:26'),
(69, 'Picassaut', 11, 'public/image/Picassaut.jpg', '2024-06-01 05:49:40'),
(70, 'Pikachu', 4, 'public/image/Pikachu.jpg', '2024-06-01 05:49:40'),
(71, 'Poichigeon', 11, 'public/image/Poichigeon.jpg', '2024-06-01 05:49:40'),
(72, 'Poussifeu', 2, 'public/image/Poussifeu.jpg', '2024-06-01 05:49:40'),
(73, 'Psykokwak', 3, 'public/image/Psykokwak.jpg', '2024-06-01 05:49:40'),
(74, 'Pyroli', 2, 'public/image/Pyroli.jpg', '2024-06-01 05:49:40'),
(75, 'Racaillou', 4, 'public/image/Racaillou.jpg', '2024-06-01 05:49:40'),
(76, 'Ramoloss', 5, 'public/image/Ramoloss.jpg', '2024-06-01 05:49:40'),
(77, 'Rhinocorne', 6, 'public/image/Rhinocorne.jpg', '2024-06-01 05:49:40'),
(78, 'Riolu', 6, 'public/image/Riolu.jpg', '2024-06-01 05:49:40'),
(79, 'Rocabot', 6, 'public/image/Rocabot.jpg', '2024-06-01 05:49:40'),
(80, 'Rondoudou', 10, 'public/image/Rondoudou.jpg', '2024-06-01 05:49:40'),
(81, 'Rototaupe', 6, 'public/image/Rototaupe.jpg', '2024-06-01 05:51:51'),
(82, 'Sabelette', 3, 'public/image/Sabelette.jpg', '2024-06-01 05:51:51'),
(83, 'Salamèche', 2, 'public/image/Salamèche.jpg', '2024-06-01 05:51:51'),
(84, 'Sapereau', 11, 'public/image/Sapereau.jpg', '2024-06-01 05:51:51'),
(85, 'Sepiatop', 7, 'public/image/Sepiatop.jpg', '2024-06-01 05:51:51'),
(86, 'Skitty', 11, 'public/image/Skitty.jpg', '2024-06-01 05:51:51'),
(87, 'Snubbull', 10, 'public/image/Snubbull.jpg', '2024-06-01 05:51:51'),
(88, 'Sovkipou', 1, 'public/image/Sovkipou.jpg', '2024-06-01 05:51:51'),
(89, 'Stari', 3, 'public/image/Stari.jpg', '2024-06-01 05:51:51'),
(90, 'Sucroquin', 10, 'public/image/Sucroquin.jpg', '2024-06-01 05:51:51'),
(91, 'Tarsal', 10, 'public/image/Tarsal.jpg', '2024-06-01 05:51:51'),
(92, 'Taupiqueur', 8, 'public/image/Taupiqueur.jpg', '2024-06-01 05:51:51'),
(93, 'Cubone', 6, 'public/image/Cubone.jpg', '2024-06-01 05:54:05'),
(94, 'Tic', 8, 'public/image/Tic.jpg', '2024-06-01 05:54:05'),
(95, 'Togedemaru', 4, 'public/image/Togedemaru.jpg', '2024-06-01 05:54:05'),
(96, 'Togepi', 10, 'public/image/Togepi.jpg', '2024-06-01 05:54:05'),
(97, 'Triopikeur', 8, 'public/image/Triopikeur.jpg', '2024-06-01 05:54:05'),
(98, 'Voltali', 4, 'public/image/Voltali.jpg', '2024-06-01 05:54:05'),
(99, 'Wailmer', 3, 'public/image/Wailmer.jpg', '2024-06-01 05:54:05'),
(100, 'Zébibron', 4, 'public/image/Zébibron.jpg', '2024-06-01 05:54:05'),
(101, 'Zigzaton', 11, 'public/image/Zigzaton.jpg', '2024-06-01 05:54:05'),
(102, 'Zorua', 7, 'public/image/Zorua.jpg', '2024-06-01 05:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `card_exchange`
--

CREATE TABLE `card_exchange` (
  `id` int(11) NOT NULL,
  `fromUser` int(11) DEFAULT NULL,
  `toUser` int(11) DEFAULT NULL,
  `idCardFrom` int(11) DEFAULT NULL,
  `idCardTo` int(11) DEFAULT NULL,
  `status` enum('waiting','accept','ignore') NOT NULL DEFAULT 'waiting',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_exchange`
--

INSERT INTO `card_exchange` (`id`, `fromUser`, `toUser`, `idCardFrom`, `idCardTo`, `status`, `created_at`) VALUES
(1, 2, 1, 8, 54, 'accept', '2024-06-02 07:31:56'),
(2, 1, 2, 8, 54, 'ignore', '2024-06-02 07:33:08'),
(3, 3, 1, 7, 59, 'accept', '2024-06-02 07:36:23'),
(4, 6, 1, 4, 9, 'accept', '2024-06-02 14:24:40'),
(5, 6, 1, 55, 11, 'ignore', '2024-06-02 14:25:42'),
(6, 1, 6, 4, 55, 'accept', '2024-06-02 14:26:33'),
(7, 1, 2, 3, 5, 'accept', '2024-06-02 15:21:59'),
(8, 1, 2, 1, 6, 'ignore', '2024-06-02 15:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `energy`
--

CREATE TABLE `energy` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `energy`
--

INSERT INTO `energy` (`id`, `name`, `created_at`) VALUES
(1, 'Énergie Plante', '2024-05-31 19:36:22'),
(2, 'Énergie Feu', '2024-05-31 19:36:22'),
(3, 'Énergie Eau', '2024-05-31 19:36:22'),
(4, 'Énergie Électrick', '2024-05-31 19:36:22'),
(5, 'Énergie Psy', '2024-05-31 19:36:22'),
(6, 'Énergie Combat', '2024-05-31 19:36:22'),
(7, 'Énergie Obscurité', '2024-05-31 19:36:22'),
(8, 'Énergie Métal', '2024-05-31 19:36:22'),
(9, 'Énergie Dragon', '2024-06-01 05:24:20'),
(10, 'Énergie Fairy', '2024-06-01 05:24:20'),
(11, 'Énergie Normal', '2024-06-01 05:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'phamtienduc', 'ptienduc311@gmail.com', '$2y$10$dy3BZv9ANW8OxAFCzCZk3.7MF0y5Jmd71CB8wthvpZTF8hwvE5kCq', '2024-06-02 07:29:14'),
(2, 'trandinh', 'trandinh123@gmail.com', '$2y$10$MSHbp22fF5fra82V8yGYNOx.y7Ot860MxsXYElezlUvcLhvNy7KVC', '2024-06-02 07:30:33'),
(3, 'vuthuan', 'vuthuan@xyz.abc', '$2y$10$OG/2W1dvekB6n779xnCBsuWOy4tquV5pGtYrPzMT8Tw2gkxKRd3LC', '2024-06-02 07:33:55'),
(4, 'nvanbinh', 'binhtonga1@gmail.com', '$2y$10$Gx.fIISIHmSQB4Zck.b4SeXGrt.im.QuiXyDrAlSVtfaNiDBhOGFS', '2024-06-02 07:54:34'),
(5, 'vubang', 'vubang123@gmail.com', '$2y$10$7leUKDm14CkM.YMmgrEsUuE3xsnflSoELKiznK7gpePsFLQxEn3U6', '2024-06-02 14:09:12'),
(6, 'vancuong', 'tranvancuong@gmail.com', '$2y$10$YO7y92FOYxdYkAwPvGEKku.QQoEnxzNqnhIhZ34.j3fqVSOQpFgL2', '2024-06-02 14:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_card`
--

CREATE TABLE `user_card` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `card_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_card`
--

INSERT INTO `user_card` (`id`, `user_id`, `card_id`, `created_at`) VALUES
(1, 1, 1, '2024-06-02 07:30:08'),
(2, 1, 2, '2024-06-02 07:30:08'),
(3, 1, 5, '2024-06-02 07:30:08'),
(4, 1, 55, '2024-06-02 07:30:08'),
(5, 1, 10, '2024-06-02 07:30:08'),
(6, 1, 11, '2024-06-02 07:30:08'),
(7, 1, 13, '2024-06-02 07:30:08'),
(8, 1, 14, '2024-06-02 07:30:08'),
(9, 1, 19, '2024-06-02 07:30:08'),
(10, 1, 21, '2024-06-02 07:30:08'),
(11, 1, 27, '2024-06-02 07:30:08'),
(12, 1, 29, '2024-06-02 07:30:08'),
(13, 1, 36, '2024-06-02 07:30:08'),
(14, 1, 37, '2024-06-02 07:30:08'),
(15, 1, 42, '2024-06-02 07:30:08'),
(16, 1, 8, '2024-06-02 07:30:08'),
(17, 1, 56, '2024-06-02 07:30:08'),
(18, 1, 7, '2024-06-02 07:30:08'),
(19, 1, 64, '2024-06-02 07:30:08'),
(20, 1, 70, '2024-06-02 07:30:08'),
(21, 2, 3, '2024-06-02 07:31:44'),
(22, 2, 6, '2024-06-02 07:31:44'),
(23, 2, 54, '2024-06-02 07:31:44'),
(24, 2, 11, '2024-06-02 07:31:44'),
(25, 2, 12, '2024-06-02 07:31:44'),
(26, 2, 15, '2024-06-02 07:31:44'),
(27, 2, 21, '2024-06-02 07:31:44'),
(28, 2, 22, '2024-06-02 07:31:44'),
(29, 2, 31, '2024-06-02 07:31:44'),
(30, 2, 39, '2024-06-02 07:31:44'),
(31, 2, 45, '2024-06-02 07:31:44'),
(32, 2, 50, '2024-06-02 07:31:44'),
(33, 2, 59, '2024-06-02 07:31:44'),
(34, 2, 62, '2024-06-02 07:31:44'),
(35, 2, 72, '2024-06-02 07:31:44'),
(36, 2, 74, '2024-06-02 07:31:44'),
(37, 2, 83, '2024-06-02 07:31:44'),
(38, 2, 90, '2024-06-02 07:31:44'),
(39, 2, 91, '2024-06-02 07:31:44'),
(40, 2, 96, '2024-06-02 07:31:44'),
(41, 3, 1, '2024-06-02 07:34:45'),
(42, 3, 2, '2024-06-02 07:34:45'),
(43, 3, 3, '2024-06-02 07:34:45'),
(44, 3, 59, '2024-06-02 07:34:45'),
(45, 3, 16, '2024-06-02 07:34:45'),
(46, 3, 17, '2024-06-02 07:34:45'),
(47, 3, 19, '2024-06-02 07:34:45'),
(48, 3, 20, '2024-06-02 07:34:45'),
(49, 3, 27, '2024-06-02 07:34:45'),
(50, 3, 40, '2024-06-02 07:34:45'),
(51, 3, 41, '2024-06-02 07:34:45'),
(52, 3, 48, '2024-06-02 07:34:45'),
(53, 3, 49, '2024-06-02 07:34:45'),
(54, 3, 51, '2024-06-02 07:34:45'),
(55, 3, 58, '2024-06-02 07:34:45'),
(56, 3, 63, '2024-06-02 07:34:45'),
(57, 3, 64, '2024-06-02 07:34:45'),
(58, 3, 68, '2024-06-02 07:34:45'),
(59, 3, 69, '2024-06-02 07:34:45'),
(60, 3, 84, '2024-06-02 07:34:45'),
(61, 4, 1, '2024-06-02 12:39:51'),
(62, 4, 2, '2024-06-02 12:39:51'),
(63, 4, 3, '2024-06-02 12:39:51'),
(64, 4, 4, '2024-06-02 12:39:51'),
(65, 4, 5, '2024-06-02 12:39:51'),
(66, 4, 6, '2024-06-02 12:39:51'),
(67, 4, 7, '2024-06-02 12:39:51'),
(68, 4, 8, '2024-06-02 12:39:51'),
(69, 4, 9, '2024-06-02 12:39:51'),
(70, 4, 10, '2024-06-02 12:39:51'),
(71, 4, 11, '2024-06-02 12:39:51'),
(72, 4, 12, '2024-06-02 12:39:51'),
(73, 4, 14, '2024-06-02 12:39:51'),
(74, 4, 33, '2024-06-02 12:39:51'),
(75, 4, 34, '2024-06-02 12:39:51'),
(76, 4, 35, '2024-06-02 12:39:51'),
(77, 4, 44, '2024-06-02 12:39:51'),
(78, 4, 45, '2024-06-02 12:39:51'),
(79, 4, 46, '2024-06-02 12:39:51'),
(80, 4, 47, '2024-06-02 12:39:51'),
(81, 5, 2, '2024-06-02 14:09:53'),
(82, 5, 4, '2024-06-02 14:09:53'),
(83, 5, 5, '2024-06-02 14:09:53'),
(84, 5, 8, '2024-06-02 14:09:53'),
(85, 5, 10, '2024-06-02 14:09:53'),
(86, 5, 13, '2024-06-02 14:09:53'),
(87, 5, 14, '2024-06-02 14:09:53'),
(88, 5, 15, '2024-06-02 14:09:53'),
(89, 5, 18, '2024-06-02 14:09:53'),
(90, 5, 19, '2024-06-02 14:09:53'),
(91, 5, 22, '2024-06-02 14:09:53'),
(92, 5, 23, '2024-06-02 14:09:53'),
(93, 5, 27, '2024-06-02 14:09:53'),
(94, 5, 28, '2024-06-02 14:09:53'),
(95, 5, 34, '2024-06-02 14:09:53'),
(96, 5, 35, '2024-06-02 14:09:53'),
(97, 5, 36, '2024-06-02 14:09:53'),
(98, 5, 38, '2024-06-02 14:09:53'),
(99, 5, 39, '2024-06-02 14:09:53'),
(100, 5, 41, '2024-06-02 14:09:53'),
(101, 6, 1, '2024-06-02 14:22:06'),
(102, 6, 2, '2024-06-02 14:22:06'),
(103, 6, 3, '2024-06-02 14:22:06'),
(104, 6, 9, '2024-06-02 14:22:06'),
(105, 6, 54, '2024-06-02 14:22:06'),
(106, 6, 4, '2024-06-02 14:22:06'),
(107, 6, 56, '2024-06-02 14:22:06'),
(108, 6, 58, '2024-06-02 14:22:06'),
(109, 6, 59, '2024-06-02 14:22:06'),
(110, 6, 60, '2024-06-02 14:22:06'),
(111, 6, 68, '2024-06-02 14:22:06'),
(112, 6, 69, '2024-06-02 14:22:06'),
(113, 6, 70, '2024-06-02 14:22:06'),
(114, 6, 76, '2024-06-02 14:22:06'),
(115, 6, 77, '2024-06-02 14:22:06'),
(116, 6, 78, '2024-06-02 14:22:06'),
(117, 6, 80, '2024-06-02 14:22:06'),
(118, 6, 81, '2024-06-02 14:22:06'),
(119, 6, 82, '2024-06-02 14:22:06'),
(120, 6, 88, '2024-06-02 14:22:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `energy_id` (`energy_id`);

--
-- Indexes for table `card_exchange`
--
ALTER TABLE `card_exchange`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fromUser` (`fromUser`),
  ADD KEY `toUser` (`toUser`),
  ADD KEY `idCardFrom` (`idCardFrom`),
  ADD KEY `idCardTo` (`idCardTo`);

--
-- Indexes for table `energy`
--
ALTER TABLE `energy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_card`
--
ALTER TABLE `user_card`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `card_id` (`card_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `card_exchange`
--
ALTER TABLE `card_exchange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `energy`
--
ALTER TABLE `energy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_card`
--
ALTER TABLE `user_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`energy_id`) REFERENCES `energy` (`id`);

--
-- Constraints for table `card_exchange`
--
ALTER TABLE `card_exchange`
  ADD CONSTRAINT `card_exchange_ibfk_1` FOREIGN KEY (`fromUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `card_exchange_ibfk_2` FOREIGN KEY (`toUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `card_exchange_ibfk_3` FOREIGN KEY (`idCardFrom`) REFERENCES `card` (`id`),
  ADD CONSTRAINT `card_exchange_ibfk_4` FOREIGN KEY (`idCardTo`) REFERENCES `card` (`id`);

--
-- Constraints for table `user_card`
--
ALTER TABLE `user_card`
  ADD CONSTRAINT `user_card_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_card_ibfk_2` FOREIGN KEY (`card_id`) REFERENCES `card` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
