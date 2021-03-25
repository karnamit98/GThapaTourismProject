-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 03:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rrdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sport_detail_id` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `desctiption` varchar(1000) NOT NULL,
  `thumbnail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location`, `desctiption`, `thumbnail`) VALUES
(1, 'kathmandu', 'Kathmandu, Nepal\'s capital, is set in a valley surrounded by the Himalayan mountains. At the heart of the old city’s mazelike alleys is Durbar Square, which becomes frenetic during Indra Jatra, a religious festival featuring masked dances. Many of the city\'s historic sites were damaged or destroyed by a 2015 earthquake. Durbar Square\'s palace, Hanuman Dhoka, and Kasthamandap, a wooden Hindu temple, are being rebuilt.', 'ktm1.jpg'),
(2, 'pokhara', 'Pokhara is a city on Phewa Lake, in central Nepal. It’s known as a gateway to the Annapurna Circuit, a popular trail in the Himalayas. Tal Barahi Temple, a 2-story pagoda, sits on an island in the lake. On the eastern shore, the Lakeside district has yoga centers and restaurants. In the city’s south, the International Mountain Museum has exhibits on the history of mountaineering and the people of the Himalayas.', 'pokhara1.jpg'),
(3, 'Annapurna Conservation Area', 'The Annapurna Conservation Area (ACA) has been established in 1992. It has an area of 7629 sq. km., which is the largest conservation area of Nepal. The conservation area encompasses the Annapurna himalayan range and also contains the world\'s deepest valley Kali Gandaki River Valley. It is bounded by the dry alpine deserts of Mustang and Tibet (China) in the north, by the Kali Gandaki River in the west, by Marsyandi Valley to wards east and by valleys and foothills of northern of Pokhara valley in the south border.', 'aca.jpg'),
(4, 'nagarjun forest', 'Located next to the city. Good escape place. Stayed here for a year. Love this place. There are many cool trekking and hiking trails, beautiful scenery and very safe. I went there early in the morning. It should open at 7 in the morning, but the staff is too lazy to get to work on time. Unfriendly military guards. The forest road is dark and we can hardly see the life of the birds.', 'nagarjun.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `slot_id` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `sport_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `opening_season` varchar(255) NOT NULL,
  `slot_duration` int(11) NOT NULL,
  `price` double NOT NULL,
  `thumbnail1` varchar(500) NOT NULL,
  `thumbnail2` varchar(500) NOT NULL,
  `thumbnail3` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`sport_id`, `name`, `opening_season`, `slot_duration`, `price`, `thumbnail1`, `thumbnail2`, `thumbnail3`) VALUES
(1, 'zipline', 'winter', 10, 3500, 'zipline1.jpg', 'zipline12.jpg', 'zipline13.jpg'),
(2, 'bunjee jumping', 'summer', 15, 3500, 'bunjee1.jpg', 'bunjee2.jpg', 'bunjee3.jpg'),
(3, 'paragliding', 'spring', 10, 6500, 'paragliding1.jpg', 'paragliding2.jpg', 'paragliding3.jpg'),
(4, 'skydiving', 'summer', 120, 35000, 'skydiving1.jpg', 'skydiving2.jpg', 'skydiving3.jpg'),
(5, 'paramotor gliding', 'summer', 30, 25000, 'paramotorgliding1.jpg', 'paramotorgliding2.jpg', 'paramotorgliding3.jpg'),
(6, 'kayaking and canyoning', 'summer', 60, 500, 'kayakingandcanyoning1.jpg', 'kayakingandcanyoning2.jpg', 'kayakingandcanyoning3.jpg'),
(7, 'ice climbing', 'winter', 420, 1000, 'iceclimbing1.jpg', 'iceclimbing2.jpg', 'iceclimbing3.jpg'),
(8, 'rock climbing', 'summer', 360, 5000, 'rockclimbing1.jpg', 'rockclimbing2.jpg', 'rockclimbing3.jpg'),
(9, 'mountain biking', 'summer', 60, 200, 'mountainbiking1.jpg', 'mountainbiking2.jpg', 'mountainbiking3.jpg'),
(10, 'white-water rafting', 'summer', 480, 5000, 'rafting1.jpg', 'rafting2.jpg', 'rafting3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sport_detail`
--

CREATE TABLE `sport_detail` (
  `sport_detail_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `total_slots` int(11) NOT NULL,
  `thumbnail1` varchar(500) NOT NULL,
  `thumbnail2` varchar(500) NOT NULL,
  `thumbnail3` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `age`, `country`, `password`, `role`, `status`) VALUES
(2, 'Uzumaki Naruto', 'naruto', 'naruto@gmail.com', 0, '', 'Naruto@123', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `ForeignKeyUserId` (`user_id`),
  ADD KEY `ForeignKeySportDetailId` (`sport_detail_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`slot_id`),
  ADD KEY `ForeignKeyBookingId` (`booking_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `sport_detail`
--
ALTER TABLE `sport_detail`
  ADD PRIMARY KEY (`sport_detail_id`),
  ADD KEY `ForeignKeySportId` (`sport_id`),
  ADD KEY `ForeignKeyLocationId` (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sport_detail`
--
ALTER TABLE `sport_detail`
  MODIFY `sport_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `ForeignKeySportDetailId` FOREIGN KEY (`sport_detail_id`) REFERENCES `sport` (`sport_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeignKeyUserId` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slot`
--
ALTER TABLE `slot`
  ADD CONSTRAINT `ForeignKeyBookingId` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sport_detail`
--
ALTER TABLE `sport_detail`
  ADD CONSTRAINT `ForeignKeyLocationId` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeignKeySportId` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`sport_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
