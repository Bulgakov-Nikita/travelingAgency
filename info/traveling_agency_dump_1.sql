-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2023 at 02:06 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 7.1.33-52+ubuntu22.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traveling_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` bigint NOT NULL,
  `email` varchar(128) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `birthday_date` datetime NOT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '*password_hash*'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `phone`, `email`, `register_date`, `birthday_date`, `password`) VALUES
(1, 'Сергей Иванов Александрович', 89082964422, 'b@mail.ru', '2023-03-14 12:33:35', '1993-07-22 00:00:00', '*password_hash*'),
(2, 'Антонова Варвара Фёдоровна', 86866757474, 'b2@mail.ru', '2023-03-16 13:08:08', '1969-07-17 00:00:00', '*password_hash*'),
(3, 'Березин Михаил Максимович', 89054343432, 'b3@mail.ru', '2023-03-16 13:13:58', '1991-05-13 00:00:00', '*password_hash*');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`) VALUES
(1, 'Администратор'),
(2, 'Менеджер'),
(3, 'СММ');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `client_id` int NOT NULL,
  `tour_id` int NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL,
  `stars` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`client_id`, `tour_id`, `text`, `created_at`, `stars`) VALUES
(1, 2, 'Чистый отель, отзывчивый персонал', '2023-03-22 13:18:27', 5),
(3, 2, 'Красивый вид из окна, качество еды ниже среднего', '2023-03-20 13:18:27', 4);

-- --------------------------------------------------------

--
-- Table structure for table `solded_tours`
--

CREATE TABLE `solded_tours` (
  `client_id` int NOT NULL,
  `tour_id` int NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `solded_tours`
--

INSERT INTO `solded_tours` (`client_id`, `tour_id`, `date`) VALUES
(1, 2, '2023-03-22 13:17:21'),
(2, 1, '2023-03-20 13:17:21'),
(3, 1, '2023-03-02 13:17:21'),
(3, 2, '2023-02-24 13:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int NOT NULL,
  `hotel_name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `destination` varchar(64) NOT NULL,
  `nights` int NOT NULL,
  `cost` int NOT NULL,
  `departure_date` timestamp NOT NULL,
  `departure_place` varchar(128) NOT NULL,
  `persons` int NOT NULL,
  `is_actual` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `hotel_name`, `description`, `destination`, `nights`, `cost`, `departure_date`, `departure_place`, `persons`, `is_actual`, `created_at`) VALUES
(1, 'Морская жемчужина', 'Пятизвёздочный отель на берегу моря, чистым пляжем, трёхразовым питанием. Бесплатный интернет, имеется кафе и бассейн на территории отеля', 'Турция, Стамбул, Senlikkoy Mah. Yesilkoy Halkali Cad. No:95', 7, 70588, '2023-03-18 11:50:00', 'Москва, аэропорт Внуково', 1, 1, '2023-03-16 12:35:25'),
(2, 'Eagle House Inn', 'Трёхзвёздочный отель с комнатой для двоих, включено двухразовое питане', 'Россия, Приморский край, Владивосток, улица Державина, 11', 5, 24978, '2023-03-31 03:25:00', 'Москва, аэропорт Внуково', 2, 1, '2023-03-16 13:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` int NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` bigint NOT NULL,
  `email` varchar(128) NOT NULL,
  `hire_date` datetime NOT NULL,
  `birthday` datetime NOT NULL,
  `is_works` tinyint(1) NOT NULL,
  `position_id` int NOT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '*password_hash*'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `name`, `phone`, `email`, `hire_date`, `birthday`, `is_works`, `position_id`, `password`) VALUES
(1, 'Григорий Третьяков Васильевич', 85676574656, 'a@mail.ru', '2021-02-17 00:00:00', '1994-07-27 00:00:00', 1, 1, '*password_hash*'),
(2, 'Прохорова Мария Максимовна', 87685856767, 'a2@mail.ru', '2023-06-06 00:00:00', '2000-07-14 00:00:00', 1, 2, '*password_hash*'),
(3, 'Дорофеева Диана Артёмовна', 89988676744, 'a3@mail.ru', '2023-01-10 00:00:00', '1991-06-19 00:00:00', 1, 2, '*password_hash*'),
(4, 'Козырев Глеб Александрович', 89234535535, 'a4@mail.ru', '2023-03-07 00:00:00', '1993-12-04 00:00:00', 1, 3, '*password_hash*');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`client_id`,`tour_id`),
  ADD KEY `tours_id2` (`tour_id`);

--
-- Indexes for table `solded_tours`
--
ALTER TABLE `solded_tours`
  ADD PRIMARY KEY (`client_id`,`tour_id`),
  ADD KEY `tours_id` (`tour_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `client_id2` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tours_id2` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `solded_tours`
--
ALTER TABLE `solded_tours`
  ADD CONSTRAINT `client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tours_id` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `worker`
--
ALTER TABLE `worker`
  ADD CONSTRAINT `position_id` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
