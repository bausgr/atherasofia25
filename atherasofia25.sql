-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 09:30 AM
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
-- Database: `atherasofia25`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_username`, `admin_password`) VALUES
(1, 'bausgr', 'baus1979');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `curriculum_id` int(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `num_hours` int(2) NOT NULL,
  `ordered` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `curriculum_id`, `title`, `num_hours`, `ordered`) VALUES
(1, 1, 'ΜΑΘΗΜΑΤΙΚΑ', 2, 1),
(2, 1, 'ΑΡΧΑΙΑ ΕΛΛΗΝΙΚΑ', 2, 2),
(3, 1, 'ΝΕΟΕΛΛΗΝΙΚΗ ΓΛΩΣΣΑ', 1, 3),
(4, 1, 'ΦΥΣΙΚΗ', 1, 4),
(5, 1, 'ΑΡΧΑΙΑ ΕΛΛΗΝΙΚΑ ΑΠΟ ΜΤΦ', 1, 5),
(6, 2, 'ΜΑΘΗΜΑΤΙΚΑ', 2, 1),
(7, 2, 'ΑΡΧΑΙΑ ΕΛΛΗΝΙΚΑ', 2, 2),
(9, 2, 'ΑΡΧΑΙΑ ΕΛΛΗΝΙΚΑ ΑΠΟ ΜΤΦ', 1, 3),
(10, 2, 'ΝΕΟΕΛΛΗΝΙΚΗ ΓΛΩΣΣΑ', 1, 4),
(11, 2, 'ΦΥΣΙΚΗ', 1, 5),
(12, 2, 'ΧΗΜΕΙΑ', 1, 6),
(13, 3, 'ΜΑΘΗΜΑΤΙΚΑ', 2, 1),
(14, 3, 'ΑΡΧΑΙΑ ΕΛΛΗΝΙΚΑ', 2, 2),
(15, 3, 'ΑΡΧΑΙΑ ΕΛΛΗΝΙΚΑ ΑΠΟ ΜΤΦ', 1, 3),
(16, 3, 'ΝΕΟΕΛΛΗΝΙΚΗ ΓΛΩΣΣΑ', 1, 4),
(17, 3, 'ΦΥΣΙΚΗ', 1, 5),
(18, 3, 'ΧΗΜΕΙΑ', 1, 6),
(19, 4, 'ΑΛΓΕΒΡA', 2, 1),
(20, 4, 'ΓΕΩΜΕΤΡΙΑ', 2, 2),
(21, 4, 'ΑΡΧΑΙΑ ΕΛΛΗΝΙΚΑ', 3, 3),
(22, 4, 'ΕΚΘΕΣΗ - ΕΚΦΡΑΣΗ', 1, 4),
(23, 4, 'ΦΥΣΙΚΗ', 2, 5),
(24, 4, 'ΧΗΜΕΙΑ', 1, 6),
(25, 6, 'ΑΡΧΑΙΑ ΕΛΛΗΝΙΚΑ', 4, 1),
(26, 6, 'ΛΑΤΙΝΙΚΑ (ΠΡΟΕΤΟΙΜΑΣΙΑ ΓΙΑ Γ΄ΛΥΚΕΙΟΥ)', 1, 2),
(27, 6, 'ΒΑΣΙΚΕΣ ΑΡΧΕΣ ΚΟΙΝΩΝΙΚΩΝ ΕΠΙΣΤΗΜΩΝ', 1, 3),
(28, 7, 'ΕΚΘΕΣΗ', 2, 1),
(29, 7, 'ΑΛΓΕΒΡΑ', 2, 2),
(30, 7, 'ΓΕΩΜΕΤΡΙΑ', 1, 3),
(31, 4, 'ΦΥΣΙΚΗ', 1, 4),
(32, 7, 'ΑΡΧΑΙΑ ΕΛΛΗΝΙΚΑ', 2, 5),
(33, 7, 'ΧΗΜΕΙΑ', 2, 6),
(34, 8, 'ΑΡΧΑΙΑ', 5, 1),
(35, 8, 'ΕΚΘΕΣΗ', 2, 2),
(36, 8, 'ΙΣΤΟΡΙΑ', 2, 3),
(37, 8, 'ΛΑΤΙΝΙΚΑ (ΕΠΙΛΟΓΗΣ)', 3, 4),
(38, 8, 'ΒΙΟΛΟΓΙΑ (ΕΠΙΛΟΓΗΣ)', 2, 5),
(39, 8, 'ΜΑΘΗΜΑΤΙΚΑ & ΣΤΟΙΧΕΙΑ ΣΤΑΤΙΣΤΙΚΗΣ (ΕΠΙΛΟΓΗΣ)', 2, 6),
(40, 9, 'ΦΥΣΙΚΗ', 4, 1),
(41, 9, 'ΧΗΜΕΙΑ', 3, 2),
(42, 9, 'ΕΚΘΕΣΗ', 2, 3),
(43, 9, 'ΜΑΘΗΜΑΤΙΚΑ (ΕΠΙΛΟΓΗΣ)', 2, 4),
(44, 9, 'ΒΙΟΛΟΓΙΑ (ΕΠΙΛΟΓΗΣ)', 2, 5),
(45, 9, 'ΙΣΤΟΡΙΑ (ΕΠΙΛΟΓΗΣ)', 2, 6),
(46, 9, 'ΜΑΘΗΜΑΤΙΚΑ ΠΡΟΣΑΝΑΤΟΛΙΣΜΟΥ', 4, 7),
(47, 10, 'ΜΑΘΗΜΑΤΙΚΑ (ΕΠΙΛΟΓΗΣ)', 4, 1),
(48, 10, 'ΑΕΠΠ', 2, 2),
(49, 10, 'ΕΚΘΕΣΗ', 2, 3),
(50, 10, 'ΑΟΘ (ΕΠΙΛΟΓΗΣ)', 2, 4),
(51, 10, 'ΒΙΟΛΟΓΙΑ (ΕΠΙΛΟΓΗΣ)', 2, 5),
(52, 10, 'ΙΣΤΟΡΙΑ Γ.Π. (ΕΠΙΛΟΓΗΣ)', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `id` int(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ordered` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`id`, `title`, `ordered`) VALUES
(1, 'Α ΓΥΜΝΑΣΙΟΥ', 1),
(2, 'Β ΓΥΜΝΑΣΙΟΥ', 2),
(3, 'Γ ΓΥΜΝΑΣΙΟΥ', 3),
(4, 'Α ΛΥΚΕΙΟΥ', 4),
(6, 'Β ΛΥΚΕΙΟΥ: ΟΜΑΔΑ ΑΝΘΡΩΠΙΣΤΙΚΩΝ ΣΠΟΥΔΩΝ', 5),
(7, 'Β ΛΥΚΕΙΟΥ: ΜΑΘΗΜΑΤΑ ΓΕΝΙΚΗΣ ΠΑΙΔΕΙΑΣ ', 6),
(8, 'Γ ΛΥΚΕΙΟΥ: ΟΜΑΔΑ ΑΝΘΡΩΠΙΣΤΙΚΩΝ ΣΠΟΥΔΩΝ ', 7),
(9, 'Γ ΛΥΚΕΙΟΥ: ΟΜΑΔΑ ΘΕΤΙΚΩΝ ΣΠΟΥΔΩΝ ', 8),
(10, 'Γ ΛΥΚΕΙΟΥ: ΟΜΑΔΑ ΣΠΟΥΔΩΝ ΟΙΚΟΝΟΜΙΑΣ ΚΑΙ ΠΛΗΡΟΦΟΡΙΚΗΣ ', 9);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(3) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `ordered` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `alt`, `img_path`, `ordered`) VALUES
(13, 'Φροντιστήρια Αθέρα Σοφία', 'img5.jpg', 3),
(21, 'Φροντιστήρια Αθέρα Σοφία', 'IMG-02dc6517009ee9a910fa819a17744776-V.jpg', 1),
(22, 'Φροντιστήρια Αθέρα Σοφία', 'IMG-02954c549cf0f82555ee8a2046bf0664-V.jpg', 2),
(23, 'Φροντιστήρια Αθέρα Σοφία', 'IMG-bf9b3d8d463b40699b067042a8c384fc-V.jpg', 4),
(24, 'Φροντιστήρια Αθέρα Σοφία', 'IMG-e3a833b9a8c96f23abd122d9b0c713b8-V.jpg', 5),
(25, 'Φροντιστήρια Αθέρα Σοφία', 'IMG-f37c78bca996c45e4e831b263635d5d1-V.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `service_path` varchar(255) NOT NULL,
  `ordered` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `service_path`, `ordered`) VALUES
(10, 'Συμπλήρωση μηχανογραφικού', 'protypa.pdf', 1),
(11, 'Προετοιμασία για εισαγωγή σε πρότυπα σχολεία', 'protypa.pdf', 2),
(12, 'Προετοιμασία για μαθητικούς διαγωνισμούς', 'protypa.pdf', 3),
(13, 'Μαθησιακές δυσκολίες', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'bausgr@gmail.com', '$2y$10$gX2eP2s10QLzsR71XuG/a.yK9cMxezojvJuaBX1B918TIVSURckhm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
