-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table grocerylist.list: ~9 rows (approximately)
/*!40000 ALTER TABLE `list` DISABLE KEYS */;
INSERT INTO `list` (`id`, `user`, `Name`, `Price`, `Quantity`, `Image`) VALUES
	(18, 'aurelius', 'inghetata', '10', 2, 'uploadimage/inghetata-detaliu.jpg'),
	(19, 'aurelius', 'sendwih cu pui', '50', 4, 'uploadimage/chicken-sandwich-with-mayo-500x500.jpg'),
	(20, 'aurelius', 'milk2', '100', 3, 'uploadimage/milk2.jpg'),
	(21, 'aurelius', 'soup', '77', 4, 'uploadimage/soup.jpg'),
	(22, 'aurelius', 'placinta cu mere', '88', 2, 'uploadimage/maxresdefault.jpg'),
	(23, 'mircea', 'tort mere', '20.00', 2, 'uploadimage/tort-mere.jpg'),
	(24, 'antonio', 'negrese', '40.00', 3, 'uploadimage/negrese.jpg'),
	(25, 'antonio', 'musuroi de cartita prajitura', '10.00', 3, 'uploadimage/musuroi.jpg');
/*!40000 ALTER TABLE `list` ENABLE KEYS */;

-- Dumping data for table grocerylist.notes: ~4 rows (approximately)
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` (`id`, `user`, `note_title`, `note_description`, `current_date`) VALUES
	(11, 'aurelius', 'dsf', 'sfdf', '2022-01-23 13:03:13'),
	(12, 'aurelius', 'fds', 'fdsfds', '2022-01-23 13:12:33'),
	(20, 'mircea', 'fdsfsd', 'sdfsd', '2022-01-26 15:02:37'),
	(21, 'mircea', 'fds', 'fdssdddddddddddddddddddd', '2022-01-26 15:06:34');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;

-- Dumping data for table grocerylist.product: ~9 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `name2`, `image`, `image2`, `price`, `price2`) VALUES
	(1, 'borsec minerala', 'bucovina-plata', 'shopping_cart/borsec-minerala.jpg', 'shopping_cart/bucovina.jpg', 50.00, 30.00),
	(2, 'chateau wine', 'murfatlar', 'shopping_cart/chateau-picon-wine.jpg', 'shopping_cart/murfatlar-cabernet-sauvignon.jpg', 20.00, 60.00),
	(3, 'cheddar cheese', 'bree cheese', 'shopping_cart/cheddar-cheese.jpg', 'shopping_cart/brie-cheese.jpg', 30.00, 70.00),
	(4, 'white bread', 'black bread', 'shopping_cart/white-bread.jpg', 'shopping_cart/black-bread.jpg', 80.00, 100.00),
	(5, 'white potato', 'red potato', 'shopping_cart/white-potato.jpg', 'shopping_cart/red-potato.jpg', 90.00, 120.00),
	(6, 'banana', 'red apple', 'shopping_cart/banana.jpg', 'shopping_cart/red-apples.jpg', 30.00, 20.00),
	(7, 'milk', 'kefir', 'shopping_cart/milk.jpg', 'shopping_cart/kefir.jpg', 20.00, 10.00),
	(8, 'nesquik cereal', 'cheerios cereal ', 'shopping_cart/nesquick-cereal.jpg', 'shopping_cart/cherious-cereal.jpg', 40.00, 20.00),
	(9, 'rice cakes', 'pringles', 'shopping_cart/rice-cakes.jpg', 'shopping_cart/pringles.jpg', 50.00, 10.00);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping data for table grocerylist.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES
	(1, 'aurelius', '81dc9bdb52d04dc20036dbd8313ed055', 'aurelius44@yahoo.com'),
	(2, 'mircea', '674f3c2c1a8a6f90461e8a66fb5550ba', 'mircea44@yahoo.ro'),
	(3, 'antonio', '8287458823facb8ff918dbfabcd22ccb', 'antonio33@yahoo.com'),
	(4, 'dorel', '68124427ce41a87dfcbea86ef95a8c09', 'werner333@gmail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
