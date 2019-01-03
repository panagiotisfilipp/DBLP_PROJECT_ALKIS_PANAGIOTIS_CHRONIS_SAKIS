-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: localhost:3306
-- Χρόνος δημιουργίας: 12 Δεκ 2018 στις 02:44:38
-- Έκδοση διακομιστή: 5.6.41-84.1
-- Έκδοση PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `alkibiad_dblp`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `downloads`
--

CREATE TABLE `downloads` (
  `url_id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `papers`
--

CREATE TABLE `papers` (
  `url_id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `authors` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `year` smallint(4) DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `link`) VALUES
(3, 'IEEE Cloud Computing', 'IEEE Cloud Computing', 'https://cs-services.computer.org/rss/periodicals/mags/cd/rss.xml'),
(4, ' IEEE Intelligent Systems', ' IEEE Intelligent Systems', 'https://cs-services.computer.org/rss/periodicals/mags/ex/rss.xml'),
(18, 'Computing in Science & Engineering', 'Computing in Science & Engineering', 'https://cs-services.computer.org/rss/periodicals/mags/cs/rss.xml'),
(21, 'ScienceDaily - Engineering', 'ScienceDaily - Engineering', 'https://www.sciencedaily.com/rss/matter_energy/engineering.xml');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `register_time` datetime DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`) VALUES
(2, 'admin', '$2y$10$l9zpixxuo.3F4jgB3pbxWeX1Nu3iFDRvHB2h22omY7.5OJbDm2YUu', 'sw@sw.com', '0'),
(5, 'demo', '$2y$10$P7ZUlgM04s2YzjPPs8PI8efU1joVmEnvulC5bxYqEEcY5M2Pq2i3q', 'filipp1977@gmail.com', '1');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`url_id`,`user_id`),
  ADD KEY `link_to_users` (`user_id`);

--
-- Ευρετήρια για πίνακα `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`url_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `link_to_papers` FOREIGN KEY (`url_id`) REFERENCES `papers` (`url_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_to_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

