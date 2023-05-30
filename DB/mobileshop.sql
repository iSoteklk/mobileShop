-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 03:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Laptops', '1.jpg'),
(2, 'Processors', '2.jpg'),
(3, 'Motherboards', '3.jpg'),
(4, 'RAM', '4.jpg'),
(5, 'Graphic Cards', '5.jpg'),
(6, 'Power Supply', '6.jpg'),
(7, 'Monitors', '7.jpg'),
(8, 'Keybords and Mouse', '8.jpg'),
(9, 'Flash Drives', '9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `email`, `phone`, `nic`, `add1`, `add2`, `city`, `postal`, `password`) VALUES
(2, 'Test', 'User', 'user@gmail.com', '1111111111', '111111111V', '1st road', 'no 10', 'Kurunegala', '60000', '12345'),
(3, 'John', 'Doe', 'doe@gmail.com', '0789876789', '123387987V', '1st Road', 'Mawathagama', 'Kurunegala', '60000', '12345'),
(4, 'Ivor', 'Mccray', 'tenujimip@mailinator.com', '1234567898', '123456789V', '20 Oak Parkway', 'In at id voluptatum ', 'Dolore qui pariatur', '17', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `image`, `description`, `price`) VALUES
(1, 1, 'Microfost Surface', 'product-1.jpg', 'Microsoft Surface Laptop Go 12.4\" Touchscreen, Intel Core i5-1035G1 Processor, 4 GB RAM, 128GB PCIe SSD, Up to 13Hr Battery Life, WiFi, Webcam, Windows 11 Pro, Platinum Silver ', 200000),
(2, 2, 'AMD Ryzen 9 5900X', 'amd.jpg', 'Be unstoppable with the unprecedented speed of the world’s best desktop processors. AMD Ryzen 5000 Series processors deliver the ultimate in high performance, whether you’re playing the latest games, designing the next skyscraper or crunching scientific data. With AMD Ryzen, you’re always in the lead. A fast and easy way to expand and accelerate the storage in a desktop PC with an AMD Ryzen™ processor.', 90000),
(3, 3, 'MSI B550M PRO-VDH WiFi ProSeries Motherboard', 'MSI-B550M.jpg', 'Powered by AMD Ryzen AM4 processors, the MSI B550M PRO-VDH WIFI combines stable functionality and high-quality assembly to solve professional workflows. ', 30000),
(4, 4, 'KLEVV CRAS X RGB 32GB (2 x 16GB) DDR4 Gaming UDIMM', 'ram1.jpg', 'KLEVV CRAS X RGB 32GB (2 x 16GB) DDR4 Gaming UDIMM 3200MHz CL16 SK Hynix Chips 288 Pin Desk Ram Memory (KD4AGU880-32A160X) ', 20000),
(5, 4, 'Corsair Vengeance LPX 32GB', 'ram2.jpg', 'Corsair Vengeance LPX 32GB (2X16GB) DDR4 3200 (PC4-25600) C16 1.35V Desktop Memory - Black, 2 count (pack of 1)', 19000),
(6, 5, 'ASUS ROG Strix GeForce RTX® 4090', 'vga.jpg', 'The next generation is finally here. The ROG Strix GeForce RTX™ 4090 has been reimagined and improved to house the all new Ada Lovelace architecture from NVIDIA, which delivers up to 2x the performance of the previous generation and brings new and improved NVIDIA technologies to the market.', 560000),
(7, 6, 'Apevia ATX-PM1000W ', 'power.jpg', 'The Apevia Premier 80+ Gold Efficiency Semi-Modular RGB Gaming PSU line of power supplies is available in 650W / 850W / 1000W wattage options and brings a stylish design while providing form and function to your system to suit your needs. It supports the newer ATX 12v2.3 standard and single rail setup. Boasting a cool 135mm RGB fan, it adds a nice glow to any computer.', 21000),
(8, 7, 'AXM 2718 27\" WQHD 2560 x 1440 60Hz', 'monitor.jpg', 'AXM 2718 27\" WQHD 2560 x 1440 60Hz IPS Gaming Monitor, Adaptive-Sync (FreeSync Compatible), Height Adjustable Stand, Display Port*1/ HDMI Port*2, with Speaker', 51000),
(9, 8, 'Redragon S101', 'key.jpg', 'Redragon S101 Wired Gaming Keyboard and Mouse Combo RGB Backlit Gaming Keyboard with Multimedia Keys Wrist Rest and Red Backlit Gaming Mouse 3200 DPI for Windows PC Gamers (Black)', 12000),
(10, 9, 'SAMSUNG Type-C™ 128GB', 'flash.jpg', 'SAMSUNG Type-C™ USB Flash Drive, 128GB, Transfers 4GB Files in 11 Secs w/Up to 400MB/s 3.13 Read Speeds, Compatible w/USB 3.0/2.0, Waterproof, 2022 ', 3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
