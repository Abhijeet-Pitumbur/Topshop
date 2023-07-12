-- Abhijeet Pitumbur © Topshop 2023

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 08:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

-- --------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+04:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
	`adminID` int(10) UNSIGNED NOT NULL,
	`name` varchar(25) NOT NULL,
	`email` varchar(25) NOT NULL,
	`password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminID`, `name`, `email`, `password`) VALUES
(1, 'Abhijeet', 'topshop@abhijt.com', '5f28c68f38e0a47437448c5949ec81831eff3a9a09c16377d15c6982cec18e09');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
	`brandID` int(10) UNSIGNED NOT NULL,
	`brandName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandID`, `brandName`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'LG'),
(4, 'Huawei'),
(5, 'OnePlus'),
(6, 'Nokia'),
(7, 'Xiaomi'),
(8, 'Dell'),
(9, 'Canon'),
(10, 'Summit Appliance'),
(11, 'Bonsaii'),
(12, 'Dastor'),
(13, 'Champion'),
(14, 'LuckyMore'),
(15, 'Sunny Fashion'),
(16, 'Avidqueen'),
(17, 'NASA'),
(18, 'Nike'),
(19, 'Adidas'),
(20, 'Merrell'),
(21, 'Asics'),
(22, 'Cushionaire'),
(23, 'Jessica Simpson'),
(24, 'Amazfit'),
(25, 'Vansarto'),
(26, 'Fidel'),
(27, 'Lenovo'),
(28, 'Matein'),
(29, 'Sterling Silver'),
(30, 'Miabella'),
(31, 'Swarovshi'),
(32, 'Lifestyle Solutions'),
(33, 'Einfach'),
(34, 'Meihua'),
(35, 'Home Square'),
(36, 'Simple Deluxe'),
(37, 'Binrrio'),
(38, 'Furinno'),
(39, 'Noblewell'),
(40, 'Nicetree'),
(41, 'Dreamline'),
(42, 'Chanel'),
(43, 'Yamaha'),
(44, 'Color More'),
(45, 'Teton Sports'),
(46, 'BDK'),
(47, 'Tea Tree'),
(48, 'Frontline Plus'),
(49, 'HP'),
(50, 'ASUS'),
(51, 'Intel'),
(52, 'Acer'),
(53, 'Microsoft'),
(54, 'Google'),
(55, 'Faberware'),
(56, 'Casio'),
(57, 'Pacific'),
(58, 'Logitech'),
(59, 'JBL'),
(60, 'Panasonic'),
(61, 'Sharp'),
(62, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
	`cartID` int(10) UNSIGNED NOT NULL,
	`productID` int(10) UNSIGNED NOT NULL,
	`customerID` int(10) UNSIGNED DEFAULT NULL,
	`quantity` int(10) UNSIGNED NOT NULL,
	`ipAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
	`categoryID` int(10) UNSIGNED NOT NULL,
	`categoryName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Phones'),
(2, 'Laptops'),
(3, 'Desktops'),
(4, 'Peripherals'),
(5, 'Kitchen'),
(6, 'Home'),
(7, 'Office'),
(8, 'Outdoors'),
(9, 'Clothing'),
(10, 'Shoes'),
(11, 'Accessories'),
(12, 'Jewellery'),
(13, 'Furniture'),
(14, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
	`classID` int(10) UNSIGNED NOT NULL,
	`className` varchar(25) NOT NULL,
	`tagline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classID`, `className`, `tagline`) VALUES
(1, 'Computers', 'Empowering you with technology.'),
(2, 'Appliances', 'Grab the quality, grab the opportunity.'),
(3, 'Fashion', 'Fashion as unique as you are.');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
	`collectionID` int(10) UNSIGNED NOT NULL,
	`collectionName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`collectionID`, `collectionName`) VALUES
(1, 'Featured Products'),
(2, 'Flash Sales'),
(3, 'Best Selling'),
(4, 'New Arrivals');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
	`couponID` int(10) UNSIGNED NOT NULL,
	`code` varchar(15) NOT NULL,
	`discountPercent` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`couponID`, `code`, `discountPercent`) VALUES
(1, 'Abhijeet', 50),
(2, 'XMAS25', 25);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
	`currencyID` int(10) UNSIGNED NOT NULL,
	`code` varchar(3) NOT NULL,
	`conversionRate` double UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currencyID`, `code`, `conversionRate`) VALUES
(1, 'USD', 0.025),
(2, 'EUR', 0.02);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
	`customerID` int(10) UNSIGNED NOT NULL,
	`firstName` varchar(50) NOT NULL,
	`lastName` varchar(50) DEFAULT NULL,
	`email` varchar(50) NOT NULL,
	`address` varchar(50) NOT NULL,
	`city` varchar(25) NOT NULL,
	`zip` varchar(5) NOT NULL,
	`country` enum('Mauritius','Rodrigues','Other') NOT NULL,
	`phone` varchar(8) NOT NULL,
	`status` enum('inactive','verified') NOT NULL,
	`code` varchar(64) NOT NULL,
	`password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `firstName`, `lastName`, `email`, `address`, `city`, `zip`, `country`, `phone`, `status`, `code`, `password`) VALUES
(0, 'Guest', NULL, 'Guest', 'Guest', 'Guest', 'Guest', 'Other', 'Guest', 'verified', 'Guest', 'Guest'),
(1, 'Abhijeet', 'Pitumbur', 'topshop@abhijt.com', 'Royal Road', 'Surinam', '60902', 'Mauritius', '58038524', 'verified', 'e26c3ee14d08bed46633ba8637d134f887e15b8a812f93212a565b193f48f9de', '5f28c68f38e0a47437448c5949ec81831eff3a9a09c16377d15c6982cec18e09'),
(2, 'Abhijeet', 'Pitumbur', 'me@abhijt.com', 'Royal Road', 'Surinam', '60902', 'Mauritius', '58038524', 'verified', 'e26c3ee14d08bed46633ba8637d134f887e15b8a812f93212a565b193f48f9de', '5f28c68f38e0a47437448c5949ec81831eff3a9a09c16377d15c6982cec18e09'),
(3, 'Abhijeet', 'Pitumbur', 'pitumburabhijeet@gmail.com', 'Royal Road', 'Surinam', '60902', 'Mauritius', '58038524', 'verified', 'e26c3ee14d08bed46633ba8637d134f887e15b8a812f93212a565b193f48f9de', '5f28c68f38e0a47437448c5949ec81831eff3a9a09c16377d15c6982cec18e09');

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
	`featuredID` int(10) UNSIGNED NOT NULL,
	`productID` int(10) UNSIGNED NOT NULL,
	`tagline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`featuredID`, `productID`, `tagline`) VALUES
(1, 24890, "Topshop\'s featured product, the best of Apple."),
(2, 24892, "Draws you in. Blows you away."),
(3, 24903, "Define your way forward. Just do it.");

--
-- Triggers `featured`
--
DELIMITER $$
CREATE TRIGGER `UpdateFeatured` BEFORE UPDATE ON `featured` FOR EACH ROW BEGIN
		UPDATE `products`
		SET `collectionID` = NULL
		WHERE `productID` = OLD.`productID`;
		UPDATE `products`
		SET `oldPrice` = NULL, `discountPercent` = NULL, `discountEndDate` = NULL, `collectionID` = 1
		WHERE `productID` = NEW.`productID`;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
	`subscriberID` int(10) UNSIGNED NOT NULL,
	`email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
	`orderdetailID` int(10) UNSIGNED NOT NULL,
	`orderID` int(10) UNSIGNED NOT NULL,
	`productID` int(10) UNSIGNED NOT NULL,
	`quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
	`orderID` int(10) UNSIGNED NOT NULL,
	`customerID` int(10) UNSIGNED NOT NULL,
	`date` date NOT NULL,
	`status` enum('Payment pending','Processing order','Delivering order','Order delivered') NOT NULL DEFAULT 'Payment pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
	`productID` int(10) UNSIGNED NOT NULL,
	`categoryID` int(10) UNSIGNED NOT NULL,
	`brandID` int(10) UNSIGNED NOT NULL,
	`typeID` int(10) UNSIGNED DEFAULT NULL,
	`collectionID` int(10) UNSIGNED DEFAULT NULL,
	`productName` varchar(50) NOT NULL,
	`newPrice` decimal(6,0) NOT NULL DEFAULT 100,
	`oldPrice` decimal(6,0) DEFAULT NULL,
	`discountPercent` int(10) UNSIGNED DEFAULT NULL,
	`discountEndDate` date DEFAULT NULL,
	`shortDesc` text NOT NULL DEFAULT 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.',
	`longDesc` text NOT NULL DEFAULT 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.',
	`colors` varchar(255) NOT NULL DEFAULT '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90',
	`options` varchar(255) DEFAULT 'Small (S), Medium (M), Large (L)',
	`specs` varchar(255) NOT NULL DEFAULT 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus',
	`stock` int(10) UNSIGNED NOT NULL DEFAULT 100000,
	`unitsSold` int(10) UNSIGNED NOT NULL DEFAULT 1000,
	`dateAdded` date NOT NULL DEFAULT '2023-01-01',
	`keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `brandID`, `typeID`, `collectionID`, `productName`, `newPrice`, `oldPrice`, `discountPercent`, `discountEndDate`, `shortDesc`, `longDesc`, `colors`, `options`, `specs`, `stock`, `unitsSold`, `dateAdded`, `keywords`) VALUES
(24873, 1, 1, NULL, 4, 'iPhone 13 Pro Max', '96900', NULL, NULL, NULL, 'The iPhone 13 Pro Max has a bright, vibrant 6.7-inch OLED screen. The A15 Bionic SoC provides more than enough power for gaming and heavy apps.</p> <p>iPhone 13 Pro Max represents a massive leap in camera design with advancements in hardware and computational photography that deliver stunning photos and videos. The new wide camera, with 1.7 µm pixels, comes with the biggest sensor ever in an iPhone dual-camera system and is capable of gathering 47 percent more light for less noise and brighter results.', 'The A15 Bionic chip featured in the iPhone 13 Pro Max is much faster than the competition, delivering more performance and better power efficiency, making everything even more fluid in the iPhone 13 lineup. It uses 5-nanometer technology and has nearly 15 billion transistors to tackle the most demanding tasks, including the latest computational photography features.</p> <p>iOS 15 enhances the iPhone experience with new ways to stay connected, and powerful features that help users focus, explore, and do more with on-device intelligence.</p> <p>iPhone 13 Pro Max is designed to minimize its impact on the environment, including antenna lines that use upcycled plastic water bottles that have been chemically transformed into a stronger, high-performance material — an industry first.', '#A7C1D9, #F1F2ED, #FAE7CF, #54524F', 'My.T, Emtel, Chilli', 'Colors:Sierra Blue, Silver, Gold, Graphite~Screen Size:6.7 inches~OS:iOS 15~Chipset:Apple A15 Bionic~RAM:6 GB~Storage:512 GB~Size:160.8 x 78.1 x 7.7 mm~Weight:240 g', 100000, 1000, '2023-01-01', 'apple iphones 13 pro max phones computers abhijeet'),
(24874, 1, 1, NULL, 3, 'iPhone 13', '48900', NULL, NULL, NULL, 'The iPhone 13 is an all-out standout featuring one of most advanced dual-camera system ever on an iPhone and lightning-fast performance with the all-new A15 bionic chip.</p> <p>Shoot incredible low-light photos and videos with the new 12 MP Wide & Ultra Wide cameras and make movie magic with Cinematic mode. With 128 GB of storage space, you will be able to download and store your favorite apps, games, music and more!', 'The 6.1-inch Super Retina screen boasts an XDR display that is even brighter, so it is easier to see in full sunlight. Add in durability, power and speed with Ceramic Shield, a leap in battery life with up to 19 hours of video playback, and 5G capability for superfast downloads and high-quality streaming.</p> <p>Filmmakers use a technique called rack focus — shifting focus from one subject to another — to guide the attention of the audience in their movies. Now iPhone makes it easy for you to bring the same storytelling technique to your videos.</p> <p>Just start recording and Cinematic mode will hold focus on your subject while creating a beautiful depth-of-field effect all around them.', '#FADDD7, #276787, #232A31, #FAF6F2, #BF0013', 'My.T, Emtel, Chilli', 'Colors:Pink, Blue, Midnight, Starlight, Red~Screen Size:6.1 inches~OS:iOS 15~Chipset:Apple A15 Bionic~RAM:6 GB~Storage:128 GB~Size:146.7 x 71.5 x 7.7 mm~Weight:174 g', 100000, 1000, '2023-01-01', 'apple iphones 13 phones computers abhijeet'),
(24875, 1, 1, NULL, 2, 'iPhone 12 Pro Max', '70900', '78700', 10, '2023-10-01', 'A super-powerful chip. 5G speed. An advanced dual-camera system. A Ceramic Shield front that is tougher than any smartphone glass. And a bright, beautiful OLED display. iPhone 12 Pro Max has it all.</p> <p>A14 Bionic is the first 5-nanometer chip in the industry, with advanced components literally atoms wide. Forty percent more transistors rev up speeds while increasing efficiency for great battery life. And a new ISP powers Dolby Vision recording — something no pro movie camera, let alone any other phone, can do.', '5G transforms the iPhone 12 Pro Max with accelerated wireless speeds and better performance on congested networks. Now you can download huge files on the go or stream high-quality HDR movies. Without. All. The. Lag. iPhone 12 Pro Max also has the most 5G bands of any smartphone so you get 5G in more places. And all that speed opens up amazing possibilities for the future of apps.</p> <p>Night mode comes to both the Wide and Ultra Wide cameras, and it is better than ever at capturing incredible low-light shots. LiDAR makes Night mode portraits possible. And the Wide camera lets in 27 percent more light, for greater detail and sharper focus day or night.</p> <p>Privacy is built into iPhone 12 Pro Max from the ground up. Face ID data does not leave your iPhone. There is no phone like iPhone.', '#D3D4D6, #597582, #DDBD83, #6B6965', 'My.T, Emtel, Chilli', 'Colors:Silver, Pacific Blue, Gold, Graphite~Screen Size:6.7 inches~OS:iOS 14~Chipset:Apple A14 Bionic~RAM:6 GB~Storage:256 GB~Size:160.8 x 78.1 x 7.4 mm~Weight:228 g', 100000, 1000, '2023-01-01', 'apple iphones 12 pro max phones computers abhijeet'),
(24876, 1, 1, NULL, NULL, 'iPhone 12', '43900', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'apple iphones 12 phones computers abhijeet'),
(24877, 1, 1, NULL, 3, 'iPhone SE 2020', '27900', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'apple iphones se 2020 phones computers abhijeet'),
(24878, 1, 2, NULL, 4, 'Galaxy S21 Ultra', '58200', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'samsung galaxy s21 ultra phones computers abhijeet'),
(24879, 1, 2, NULL, 2, 'Galaxy Note20', '39800', '46800', 15, '2023-10-02', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'samsung galaxy note20 phones computers abhijeet'),
(24880, 1, 3, NULL, 2, 'G8 ThinQ', '19700', '24600', 20, '2023-10-03', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'lg g8 thinq phones computers abhijeet'),
(24881, 1, 3, NULL, 3, 'Velvet', '12800', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'lg velvet phones computers abhijeet'),
(24882, 1, 4, NULL, 4, 'Mate 40 Pro', '42500', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'huawei mate 40 pro phones computers abhijeet'),
(24883, 1, 4, NULL, 3, 'Nova 9', '23150', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'huawei nova 9 phones computers abhijeet'),
(24884, 1, 5, NULL, 4, '9 Pro', '43200', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'oneplus 9 pro phones computers abhijeet'),
(24885, 1, 5, NULL, 2, 'Nord 2', '20250', '27000', 25, '2023-10-04', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'oneplus nord 2 phones computers abhijeet'),
(24886, 1, 6, NULL, 2, 'X20', '18500', '26400', 30, '2023-10-05', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'nokia x20 phones computers abhijeet'),
(24887, 1, 6, NULL, 3, 'New 3310', '1490', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'nokia new 3310 phones computers abhijeet'),
(24888, 1, 7, NULL, 3, 'Redmi Note 11T Pro', '21750', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'xiaomi redmi note 11t pro phones computers abhijeet'),
(24889, 1, 7, NULL, 4, 'Redmi Note 10S', '10900', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'xiaomi redmi note 10s phones computers abhijeet'),
(24890, 2, 1, NULL, 1, 'MacBook Pro 2023', '62600', NULL, NULL, NULL, 'The most powerful MacBook Pro ever is here. With the blazing-fast M1 Max chip — the first Apple silicon designed for pros — you get groundbreaking performance and amazing battery life.</p> <p>Add to that a stunning Liquid Retina XDR display, the best camera and audio ever in a Mac notebook, and all the ports you need. The first notebook of its kind, this MacBook Pro is a beast.', 'Expand your view of everything on MacBook Pro thanks to a larger 16-inch Retina display with sharper pixel resolution and support for millions of colors. Harness the power of 10 core processors and AMD Radeon Pro 5000M series graphics with up to 8 GB of GDDR6 memory, together with an optimized thermal architecture for groundbreaking performance.</p> <p>The M1 Max is the most powerful chip ever created for a pro notebook, with 10 CPU cores, up to 32 GPU cores, and a 16-core Neural Engine. It delivers two times faster graphics processing and double the memory bandwidth of M1 Pro. And it has a dedicated media engine for decode and two for encode — with up to two times faster video encoding — and two ProRes accelerators for even higher multistream performance. <p>Featuring 32 GB of 2666MHz memory and 8 TB of storage. Touch ID and the Touch Bar. And all-day battery life. Designed for pros who put performance above all else, MacBook Pro gives you the power to accomplish.', '#E1E3E2, #B4B5B9', NULL, 'Colors:Silver, Space Gray~Screen Size:16 inches~OS:MacOS Monterey~Chipset:Apple M1 Max~RAM:32 GB~Storage:8 TB SSD~Battery:100 Wh lithium-polymer~Size:1.68 x 35.57 x 24.81 cm~Weight:2.2 kg', 100000, 10000, '2023-01-01', 'apple macbooks pro 2023 laptops computers abhijeet'),
(24891, 2, 8, NULL, 2, 'XPS 17', '90600', '136900', 35, '2023-10-06', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'dell xps 17 laptops computers abhijeet'),
(24892, 3, 1, NULL, 1, 'iMac Pro 2023', '180500', NULL, NULL, NULL, 'Now everyone from video editors and 3D animators to musicians and software developers can turn big ideas into amazing work. iMac Pro is powered by an Intel Xeon W processor with 18 cores for incredible performance.</p> <p>Its AMD Radeon Pro Vega graphics chip lets you build and render amazingly lifelike special effects and VR worlds. And with 32 GB of memory and 4 TB of flash storage, saving and loading projects happens almost instantly. iMac Pro. The most powerful all-in-one Mac ever.', 'An iMac with 4 cores is remarkable enough. But an iMac with 18 cores is an entirely different creature. Add Turbo Boost speeds up to 4.5 GHz, and iMac Pro has the power and flexibility to balance multicore processing with single-thread performance. With new AVX-512 vector instructions and a new cache architecture, the processor handles even more data — even more quickly. Which means you can render images, edit up to 8K video, manipulate photos, create real-time audio effects, or compile your next five-star app — all at lightning speed.</p> <p>Featuring Radeon Pro Vega graphics, iMac Pro delivers the best workstation-class graphics of any Mac. The first Mac with Vega architecture features 16 GB of High Bandwidth Memory, which helps deliver a major jump in performance — two times faster than any other iMac GPU and three times faster than the GPU in Mac Pro. This translates to higher frame rates for VR, real-time 3D rendering, more lifelike special effects, and gameplay at max settings. It also supports both single- and half-precision computing, so operations that do not require a full 32 bits of precision can be performed twice as fast. How fast? Up to 22 teraflops fast.', '#D4D5D7, #B1CADE, #B5D0C7, #F4CBC5, #FBD58C', NULL, 'Colors:Silver, Blue, Green, Pink, Yellow~Screen Size:27 inches~OS:MacOS Monterey~Chipset:3.2 GHz 18-core Intel Xeon W processor~RAM:32 GB 2666 MHz DDR4 ECC~Storage:4 TB SSD~Graphics:AMD Radeon Pro Vega 56 GPU~Size:51.6 x 65 x 20.3 cm~Weight:9.7 kg', 100000, 10000, '2023-01-01', 'apple imacs pro 2023 macs desktops computers abhijeet'),
(24893, 4, 9, 1, 4, 'Pixma TS3522 Wireless Printer', '5150', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'canon pixma ts3522 wireless printers peripherals computers abhijeet'),
(24894, 5, 10, 11, 4, '24-Inch Gas Stove', '29950', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'summit appliance 24 inches wide gas stoves kitchen appliances abhijeet'),
(24895, 6, 3, 19, 2, '86-Inch 4K Smart NanoCell TV', '102650', '114000', 10, '2023-10-07', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'lg 86 inches 4k smart nanocell tv televisions home appliances abhijeet'),
(24896, 7, 11, 27, 3, 'Office Paper Shredder', '8500', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'bonsaii office paper shredders appliances abhijeet'),
(24897, 8, 12, 36, 4, 'Dusk to Dawn Outdoor Wall Sconces', '4500', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'dastor dusk to dawn outdoors wall sconces lighting appliances abhijeet'),
(24898, 9, 13, 41, 3, 'Men Powerblend Fleece Hoodie', '1200', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'champion men powerblend fleece hoodie clothing fashion abhijeet'),
(24899, 9, 14, 42, 4, 'Women Long-Sleeve Sweatshirt', '1800', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'luckymore women long sleeve sweatshirt clothing fashion abhijeet');
INSERT INTO `products` (`productID`, `categoryID`, `brandID`, `typeID`, `collectionID`, `productName`, `newPrice`, `oldPrice`, `discountPercent`, `discountEndDate`, `shortDesc`, `longDesc`, `colors`, `options`, `specs`, `stock`, `unitsSold`, `dateAdded`, `keywords`) VALUES
(24900, 9, 15, 43, 2, 'Girl Black Dress', '1250', '1350', 10, '2023-10-08', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'sunny fashion girls black dress kids clothing fashion abhijeet'),
(24901, 9, 16, 44, 3, 'Baby Boys Tops and Pants', '1125', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'avidqueen baby boys tops and pants babies clothing fashion abhijeet'),
(24902, 9, 17, 45, 3, 'Officially-Licensed T-Shirt', '1250', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'nasa officially licensed t shirts unisex clothing fashion abhijeet'),
(24903, 10, 18, 41, 1, 'Flyknit Roshe Run', '6350', NULL, NULL, NULL, 'The Flyknit Roshe Run builds on the strength of its predecessor which refined the primary elements of a sneaker. </p> <p>This black and white sneaker comes with a minimal upper that forms to the foot of the wearer and a supplemental foam layer that provides additional cushioning.', 'The Flyknit Roshe Run epitomizes simplicity, using only what is truly necessary. It has no embellishments, only the basic shoe necessities that provide breathability and ultra-lightweight cushioning for all occasions.</p> <p>In perfect harmony with the efficient Nike Roshe design, Nike Flyknit technology creates shoe uppers precisely engineered to provide support where it is needed while reducing waste in the manufacturing process.', '#7797B3, #707070', 'Small (S), Medium (M), Large (L)', 'Colors:Blue, Gray~Sole Material:Rubber~Outer Material:Fabric~Lining Material:Fabric~Weight:1.36 kg', 100000, 1000, '2023-01-01', 'nike flyknit roshe run men shoes fashion abhijeet'),
(24904, 10, 19, 42, 2, 'Women QT Running Shoes', '2425', '3725', 35, '2023-10-09', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'adidas women qt running shoes fashion abhijeet'),
(24905, 10, 20, 43, 3, 'Kid Trail Quest Hiking Sneakers', '2625', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'merrell kids trail quest hiking sneakers shoes fashion abhijeet'),
(24906, 10, 21, 46, 4, 'Upcourt Indoor Sports Shoes', '2850', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'asics upcourt indoor sports shoes fashion abhijeet'),
(24907, 10, 22, 47, 2, 'Women Slip-On Boots', '2625', '3750', 30, '2023-10-10', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'cushionaire women slip on boots shoes fashion abhijeet'),
(24908, 11, 23, 48, 3, 'J106 Women Sunglasses', '1725', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'jessica simpson j106 women sunglasses accessories fashion abhijeet'),
(24909, 11, 24, 49, 4, 'Band 5 Fitness Watch', '2150', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'amazfit band 5 fitness watches accessories fashion abhijeet'),
(24910, 11, 25, 50, 2, 'Women 3-Piece Handbags', '2575', '3425', 25, '2023-10-11', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'vansarto women 3 pieces handbags accessories fashion abhijeet'),
(24911, 11, 27, 52, 4, 'Laptop Shoulder Bag', '750', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'lenovo laptops shoulder bags accessories fashion abhijeet'),
(24912, 11, 28, 53, 2, 'Travel Backpack', '1650', '2000', 20, '2023-10-12', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'matein travel backpacks accessories fashion abhijeet'),
(24913, 12, 29, 54, 3, 'Sky Flower Necklace', '1700', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'sterling silver sky flower necklaces jewellery fashion abhijeet'),
(24914, 12, 29, 55, 4, 'Sky Flower Earrings', '1050', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'sterling silver sky flower earrings accessories fashion abhijeet'),
(24915, 11, 30, 56, 2, 'Rose Diamond Infinity Ring', '6950', '8150', 15, '2023-10-13', 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'miabella rose diamond infinity rings accessories fashion abhijeet'),
(24916, 11, 31, 57, 3, 'Crystal Infinity Bracelet', '5375', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'swarovshi crystal infinity bracelets accessories fashion abhijeet'),
(24917, 13, 32, 58, NULL, 'Harrington Sofa', '18700', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'lifestyle solutions harrington sofas furniture abhijeet'),
(24918, 13, 33, 59, NULL, 'Wingback Bed Frame with Mattress', '9875', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'einfach wingback beds frames with mattress furniture abhijeet'),
(24919, 13, 34, 60, NULL, 'Kitchen Table Set', '19600', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'meihua kitchen tables and chairs set furniture abhijeet'),
(24920, 13, 35, 61, NULL, 'Contemporary Bedroom Set', '19050', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'home square contemporary bedroom set furniture abhijeet'),
(24921, 13, 36, 62, NULL, 'Ergonomic Office Chair', '2525', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'simple deluxe ergonomic office chairs furniture abhijeet'),
(24922, 13, 37, 63, NULL, 'Modern TV Rack', '10500', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'binrrio modern tv television racks furniture abhijeet'),
(24923, 13, 39, 65, NULL, 'Computer Desk with Shelves', '6250', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'noblewell computer desks with shelves furniture abhijeet'),
(24924, 13, 40, 66, NULL, 'Jewellery Cabinet with Mirror', '6750', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'nicetree jewellery cabinets with mirror furniture abhijeet'),
(24925, 13, 38, 67, NULL, 'Modern Criss-Crossed Coffee Table', '2050', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'furinno modern criss crossed coffee tables furniture abhijeet'),
(24926, 13, 41, 68, NULL, 'Prime Sliding Shower Cabin', '79500', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'dreamline prime sliding shower cabins furniture abhijeet');
INSERT INTO `products` (`productID`, `categoryID`, `brandID`, `typeID`, `collectionID`, `productName`, `newPrice`, `oldPrice`, `discountPercent`, `discountEndDate`, `shortDesc`, `longDesc`, `colors`, `options`, `specs`, `stock`, `unitsSold`, `dateAdded`, `keywords`) VALUES
(24927, 14, 42, 69, NULL, 'Coco Mademoiselle Women Perfume', '5575', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'chanel coco mademoiselle women perfumes others abhijeet'),
(24928, 14, 43, 70, NULL, 'Sunburst Acoustic Guitar', '8425', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'yamaha sunburst acoustic guitars music instruments others abhijeet'),
(24929, 14, 44, 71, NULL, '175-Piece Deluxe Art Set', '2325', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'color more 175 pieces deluxe art set supplies others abhijeet'),
(24930, 14, 45, 72, NULL, 'Family Camping Tent', '48575', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'teton sports family camping tents kits others abhijeet'),
(24931, 14, 46, 73, NULL, 'PolyPro Car Seat Cover Set', '1550', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'bdl polypro cars seats covers sets others abhijeet'),
(24932, 14, 47, 74, NULL, 'Special Shampoo', '1750', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'tea tree special shampoos personal care others abhijeet'),
(24933, 14, 48, 75, NULL, 'Cat Flea Treatment', '2075', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'frontline plus cats flea treatments pet care others abhijeet'),
(24934, 1, 3, NULL, NULL, 'G6 ThinQ', '9900', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'lg g6 thinq phones computers abhijeet'),
(24935, 6, 2, 18, NULL, 'RS22T Stainless Steel Refrigerator', '92500', NULL, NULL, NULL, 'Samsung RS22T refrigerator is beautifully designed with a built-in look for a seamless fit. It offers smooth and streamlined exterior design features beautiful flat doors, a minimal display dispenser, and easy to open recessed handles that blend beautifully into your cabinetry, adding function and style to your kitchen.</p> <p>More space, more ways to stay organized. A completely redesigned interior with 27.4 cubic feet capacity that fits 10% more groceries than ever. Keep every item evenly cooled. Multi-vent technology keeps items on every shelf evenly cooled.\r\n', 'High capacity in-door ice maker that saves shelf space for your frozen foods. Top shelf in freezer can easily be adjusted to fit taller items and provide flexible storage. Gallon door bins provide more shelf space inside the fridge. Use the SmartThings app on your smartphone to control the temperature and monitor your refrigerator remotely.<p> </p>Ranking #1 in Customer Satisfaction with Side-by-Side refrigerators, highest for Performance and Reliability, as well as Styling and Appearance, among other factors.<p> </p>This refrigerator was awarded the U.S. Environmental Protection Agency 2021 Energy Star Emerging Technology Award.', '#C1C3C8, #4D4E53', NULL, 'Colors:Gray, Black~Refrigerator Style:Side by Side~Capacity:27.4 cubic feet~Interior Shelves Material:Glass~Width:91.2 cm~Height:174.4 cm~Depth:72.6 cm', 100000, 1000, '2023-01-01', 'samsung rs22t stainless steel refrigerators fridges home appliances abhijeet'),
(24936, 6, 3, 20, NULL, 'LW1019 Dual Inverter Air Conditioner', '19050', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'lg lw1019 dual inverter air conditioners home appliances abhijeet'),
(24937, 7, 55, 28, NULL, 'FW29 Standing Water Dispenser', '6450', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'faberware fw29 standing water dispensers office appliances abhijeet'),
(24938, 7, 56, 29, NULL, 'FX-115ES Scientific Calculator', '950', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'casio fx 115es scientific calculators office appliances abhijeet'),
(24939, 2, 1, NULL, NULL, 'MacBook Air', '43500', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'apple macbooks air laptops computers abhijeet'),
(24940, 3, 1, NULL, NULL, 'Mac Pro', '255000', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'apple macs pro desktops computers abhijeet'),
(24941, 1, 3, NULL, NULL, 'Wing', '42500', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'lg wing phones computers abhijeet'),
(24942, 1, 2, NULL, NULL, 'Galaxy S22 Ultra', '52200', NULL, NULL, NULL, 'This is placeholder text retrieved from the database. The text has been duplicated for each product. Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Dui in ornare quam orci sagittis. Congue mauris rhoncus aenean vel elit scelerisque. Risus nec feugiat in fermentum posuere.', 'Venenatis cras sed felis eget velit aliquet <strong>sem integer vitae</strong> justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque. Fringilla est ullamcorper eget.</p> <p>Id faucibus nisl tincidunt eget nullam non nisi est. Eu sem integer vitae justo eget magna. Consequat nisl vel pretium lectus quam id leo in. Id eu nisl nunc mi. Venenatis a condimentum vitae sapien pellentesque <strong>ullamcorper eget nulla</strong> Sed turpis tincidunt id aliquet risus feugiat in ante.</p> <p>Consectetur libero id faucibus nisl tincidunt eget nullam. Sit amet nulla facilisi morbi tempus iaculis urna id. Praesent elementum facilisis leo vel fringilla. Erat velit scelerisque in dictum non. Nulla facilisi cras fermentum odio eu feugiat pretium nibh.', '#EEEEEE, #707070, #FF7F50, #87CEFA, #90EE90', 'Small (S), Medium (M), Large (L)', 'Colors:Silver Gray, Space Black, Ruby Red, Sky Blue, Teal Green~Size:32.25 x 24.13 x 3.55 cm~Weight:1.75 kg~Aenean:Eu lacus ligula~Praesent Sed:Tincidunt ex quisque~Vivamus:Scelerisque est ut dapibus~Eget Pretium:Dui enim id~Dignissim:Lectus', 100000, 1000, '2023-01-01', 'samsung galaxy s22 ultra phones computers abhijeet');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `CheckInsertProduct` BEFORE INSERT ON `products` FOR EACH ROW BEGIN
		IF (NEW.`collectionID` = 2 AND (NEW.`oldPrice` IS NULL OR NEW.`discountPercent` IS NULL OR NEW.`discountEndDate` IS NULL)) THEN
				SIGNAL SQLSTATE '45000'
						SET MESSAGE_TEXT = 'Discount details must NOT be NULL if Collection is set to Flash Sales';
		ELSEIF (NEW.`collectionID` <> 2 AND (NEW.`oldPrice` IS NOT NULL OR NEW.`discountPercent` IS NOT NULL OR NEW.`discountEndDate` IS NOT NULL)) THEN
				SIGNAL SQLSTATE '45000'
						SET MESSAGE_TEXT = 'Discount details must be NULL if Collection is NOT set to Flash Sales';
		ELSEIF (NEW.`newPrice` >= NEW.`oldPrice`) THEN
				SIGNAL SQLSTATE '45000'
					 SET MESSAGE_TEXT = 'New price must be less than old price';
		ELSEIF (NEW.`discountEndDate` < CURDATE()) THEN
				SIGNAL SQLSTATE '45000'
						SET MESSAGE_TEXT = 'Discount end date must be in the future';
		ELSEIF (NEW.`dateAdded` > CURDATE()) THEN
				SIGNAL SQLSTATE '45000'
						SET MESSAGE_TEXT = 'Date added must NOT be in the future';
		END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `CheckUpdateProduct` BEFORE UPDATE ON `products` FOR EACH ROW BEGIN
		IF (NEW.`collectionID` = 2 AND (NEW.`oldPrice` IS NULL OR NEW.`discountPercent` IS NULL OR NEW.`discountEndDate` IS NULL)) THEN
				SIGNAL SQLSTATE '45000'
						SET MESSAGE_TEXT = 'Discount details must NOT be NULL if Collection is set to Flash Sales';
		ELSEIF (NEW.`collectionID` <> 2 AND (NEW.`oldPrice` IS NOT NULL OR NEW.`discountPercent` IS NOT NULL OR NEW.`discountEndDate` IS NOT NULL)) THEN
				SIGNAL SQLSTATE '45000'
						SET MESSAGE_TEXT = 'Discount details must be NULL if Collection is NOT set to Flash Sales';
		ELSEIF (NEW.`newPrice` >= NEW.`oldPrice`) THEN
				SIGNAL SQLSTATE '45000'
					 SET MESSAGE_TEXT = 'New price must be less than old price';
		ELSEIF (NEW.`discountEndDate` < CURDATE()) THEN
				SIGNAL SQLSTATE '45000'
						SET MESSAGE_TEXT = 'Discount end date must be in the future';
		ELSEIF (NEW.`dateAdded` > CURDATE()) THEN
				SIGNAL SQLSTATE '45000'
						SET MESSAGE_TEXT = 'Date added must NOT be in the future';
		END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
	`reviewID` int(10) UNSIGNED NOT NULL,
	`productID` int(10) UNSIGNED NOT NULL,
	`customerID` int(10) UNSIGNED NOT NULL,
	`title` varchar(50) NOT NULL,
	`review` text NOT NULL,
	`datePublished` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
	`typeID` int(10) UNSIGNED NOT NULL,
	`typeName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeID`, `typeName`) VALUES
(1, 'Printers'),
(2, 'Monitors'),
(3, 'Mice'),
(4, 'Keyboards'),
(5, 'Hard Disk Drives'),
(6, 'Solid State Drives'),
(7, 'Headphones'),
(8, 'Webcams'),
(9, 'Microphones'),
(10, 'Ovens'),
(11, 'Gas Stoves'),
(12, 'Kitchen Extractors'),
(13, 'Dish Washers'),
(14, 'Coffee Makers'),
(15, 'Microwave Ovens'),
(16, 'Kettles'),
(17, 'Rice Cookers'),
(18, 'Refrigerators'),
(19, 'Televisions'),
(20, 'Air Conditioners'),
(21, 'Fans'),
(22, 'Lighting'),
(23, 'Cleaning Tools'),
(24, 'Vacuum Cleaner'),
(25, 'Washing Machines'),
(26, 'Irons'),
(27, 'Paper Shredders'),
(28, 'Water Dispensers'),
(29, 'Calculators'),
(30, 'Binders and Laminators'),
(31, 'Lockers and Safes'),
(32, 'Projectors'),
(33, 'Networking Appliances'),
(34, 'Labelling Machines'),
(35, 'Water Tanks'),
(36, 'Outdoor Lighting'),
(37, 'Water Pumps'),
(38, 'Pressure Washers'),
(39, 'Security Cameras'),
(40, 'Generators'),
(41, 'Men'),
(42, 'Women'),
(43, 'Kids'),
(44, 'Baby'),
(45, 'Unisex'),
(46, 'Sports'),
(47, 'Boots'),
(48, 'Sunglasses'),
(49, 'Watches'),
(50, 'Handbags'),
(51, 'Wallets'),
(52, 'Laptop Bags'),
(53, 'Backpacks'),
(54, 'Necklaces'),
(55, 'Earrings'),
(56, 'Rings'),
(57, 'Bracelets'),
(58, 'Sofas'),
(59, 'Beds'),
(60, 'Tables and Chairs'),
(61, 'Bedroom Sets'),
(62, 'Office Chairs'),
(63, 'TV Racks'),
(64, 'Bookshelves'),
(65, 'Computer Desks'),
(66, 'Jewellery Cabinets'),
(67, 'Coffee Tables'),
(68, 'Shower Cabins'),
(69, 'Perfumes'),
(70, 'Music Instruments'),
(71, 'Art Supplies'),
(72, 'Camping Kits'),
(73, 'Car Seat Covers'),
(74, 'Personal Care'),
(75, 'Pet Care');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
	`wishlistID` int(10) UNSIGNED NOT NULL,
	`productID` int(10) UNSIGNED NOT NULL,
	`customerID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
	ADD PRIMARY KEY (`adminID`),
	ADD UNIQUE KEY `AdminEmail` (`email`) USING BTREE;

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
	ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
	ADD PRIMARY KEY (`cartID`),
	ADD KEY `CartProduct` (`productID`) USING BTREE,
	ADD KEY `CartCustomer` (`customerID`) USING BTREE;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
	ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
	ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
	ADD PRIMARY KEY (`collectionID`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
	ADD PRIMARY KEY (`couponID`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
	ADD PRIMARY KEY (`currencyID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
	ADD PRIMARY KEY (`customerID`),
	ADD UNIQUE KEY `CustomerEmail` (`email`) USING BTREE;

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
	ADD PRIMARY KEY (`featuredID`),
	ADD KEY `FeaturedProduct` (`productID`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
	ADD PRIMARY KEY (`subscriberID`),
	ADD UNIQUE KEY `SubscriberEmail` (`email`) USING BTREE;

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
	ADD PRIMARY KEY (`orderdetailID`),
	ADD KEY `OrderdetailOrder` (`orderID`) USING BTREE,
	ADD KEY `OrderdetailProduct` (`productID`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
	ADD PRIMARY KEY (`orderID`),
	ADD KEY `OrderCustomer` (`customerID`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
	ADD PRIMARY KEY (`productID`),
	ADD KEY `ProductBrand` (`brandID`) USING BTREE,
	ADD KEY `ProductCategory` (`categoryID`) USING BTREE,
	ADD KEY `ProductCollection` (`collectionID`) USING BTREE,
	ADD KEY `ProductType` (`typeID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
	ADD PRIMARY KEY (`reviewID`),
	ADD KEY `ReviewProduct` (`productID`),
	ADD KEY `ReviewCustomer` (`customerID`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
	ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
	ADD PRIMARY KEY (`wishlistID`),
	ADD KEY `WishlistCustomer` (`customerID`),
	ADD KEY `WishlistProduct` (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
	MODIFY `adminID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
	MODIFY `brandID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
	MODIFY `cartID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
	MODIFY `categoryID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
	MODIFY `classID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
	MODIFY `collectionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
	MODIFY `couponID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
	MODIFY `currencyID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
	MODIFY `customerID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
	MODIFY `featuredID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
	MODIFY `subscriberID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
	MODIFY `orderdetailID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
	MODIFY `orderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13724;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
	MODIFY `productID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24943;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
	MODIFY `reviewID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
	MODIFY `typeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
	MODIFY `wishlistID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
	ADD CONSTRAINT `cartCustomer` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
	ADD CONSTRAINT `cartProduct` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `featured`
--
ALTER TABLE `featured`
	ADD CONSTRAINT `featuredProduct` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
	ADD CONSTRAINT `orderdetailOrder` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
	ADD CONSTRAINT `orderdetailProduct` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
	ADD CONSTRAINT `orderCustomer` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
	ADD CONSTRAINT `poductType` FOREIGN KEY (`typeID`) REFERENCES `types` (`typeID`) ON DELETE CASCADE ON UPDATE CASCADE,
	ADD CONSTRAINT `productBrand` FOREIGN KEY (`brandID`) REFERENCES `brands` (`brandID`) ON DELETE CASCADE ON UPDATE CASCADE,
	ADD CONSTRAINT `productCategory` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
	ADD CONSTRAINT `productCollection` FOREIGN KEY (`collectionID`) REFERENCES `collections` (`collectionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
	ADD CONSTRAINT `reviewCustomer` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
	ADD CONSTRAINT `reviewProduct` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
	ADD CONSTRAINT `wishlistCustomer` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE,
	ADD CONSTRAINT `wishlistProduct` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;