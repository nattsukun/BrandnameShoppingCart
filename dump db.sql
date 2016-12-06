-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2015 at 12:58 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_07_07_102904_parent_categories', 1),
('2015_07_07_180033_subcategories', 1),
('2015_07_09_162611_products', 1),
('2015_07_10_110857_product_images', 1),
('2015_07_10_154241_paypal', 1),
('2015_07_10_191605_system', 1),
('2015_07_10_205650_seo', 1),
('2015_07_21_181815_orders', 1),
('2015_07_23_111246_reviews', 1),
('2015_07_25_112458_users', 1),
('2015_08_02_094458_add_cashier_columns', 1),
('2015_10_26_184424_coupons', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `zip` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Processing',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product`, `client`, `phone`, `zip`, `city`, `total`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dfdsfdsfds', 'admin@gmail.com', 0, 0, '', '456546', '', 'Delivered', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'aaaaaaaaaaa', 'admin@gmail.com', 0, 0, '', '2147483647', '', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'chanal', 'admin@gmail.com', 0, 0, '', '126000', '', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'dfdsfdsfds', 'admin@gmail.com', 0, 0, '', '456546', '', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '999', 'admin@gmail.com', 0, 0, '', '100', '', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '999', 'admin@mail.com', 123456, 123456, '123456', '100', '123456', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Balenciaga รุ่น กระเป๋าสะพายและถือ', 'p@p.com', 987654, 987654, '987654', '68000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Boychanel', 'p@p.com', 987654, 987654, '987654', '134000', '987654', 'Shipping', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Balenciaga รุ่น กระเป๋าสะพายและถือ', 'p@p.com', 987654, 987654, '987654', '68000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Boychanel', 'p@p.com', 987654, 987654, '987654', '134000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Balenciaga รุ่น กระเป๋าสะพายและถือ', 'p@p.com', 987654, 987654, '987654', '68000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Boychanel', 'p@p.com', 987654, 987654, '987654', '134000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'DIRO1 WINTER 2015 ', 'p@p.com', 987654, 987654, '987654', '250000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Balenciaga รุ่น กระเป๋าสะพายและถือ', 'p@p.com', 987654, 987654, '987654', '68000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Boychanel', 'p@p.com', 987654, 987654, '987654', '134000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'DIRO1 WINTER 2015 ', 'p@p.com', 987654, 987654, '987654', '250000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Balenciaga รุ่น กระเป๋าสะพายและถือ', 'p@p.com', 987654, 987654, '987654', '68000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Boychanel', 'p@p.com', 987654, 987654, '987654', '134000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'DIRO1 WINTER 2015 ', 'p@p.com', 987654, 987654, '987654', '250000', '987654', 'Processing', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'BURBERRY ', 'hello@hello.com', 987987987, 654654654, '654654654', '144500', '5465465', 'Processed', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'DIRO LADY DIOR', 'hello@hello.com', 987987987, 654654654, '654654654', '275000', '5465465', 'Shipping', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Boychanel', 'hello@hello.com', 987987987, 654654654, '654654654', '134000', '5465465', 'Delivered', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `parent_categories`
--

CREATE TABLE `parent_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parent_categories`
--

INSERT INTO `parent_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Balenciaga', 'บาเลนเซียก้า', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'BURBERRY', 'เบอร์เบอรี่', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'chanel', 'ชาแนล', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Charles & Keith', 'ชาร์ลแอนด์คีท', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Diro', 'ดิออร์', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Hermès ', 'แอร์-เมส', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Michael Kors', 'ไมเคิล คอร์', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Yves Saint Laurent', 'อีฟส์ แซงต์ โลรองต์', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'miumiu', 'มิวมิว', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `offer_price` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `subcategory`, `price`, `offer_price`, `image`, `status`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Balenciaga รุ่น กระเป๋าสะพายและถือ', 'Balenciaga', 'BALENCIAGA', 69000, 68000, '', 'Active', '>BODY OF THE BAG IN SHINY GRAIN GOATSKIN\r\n>HAND STITCED HANDLES\r\n>REMOVABLE SHOULDER STRAP\r\n>TOP ZIP CLOSURE\r\n>GOLD METALLID EDGES AROUND SELF-FINISH STUDE\r\n>LEATHER TASSEL ZIPPER PULL\r\n>FRONT ZIP POCKER\r\n>INTERRIOR ZIP POCKER WITH BALECIAGA ENGFAVED PLAQUE\r\n>DOUBLE PHONE COMPARTMENT INSIDE\r\n>LEATHER FRAMED MIRROR\r\n> MADE IN ITALY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Balenciaga รุ่น กระเป๋าสะพายและถือ', 'Balenciaga', 'BALENCIAGA', 68500, 68400, '', 'Active', '>BODY OF THE BAG IN SHINY GRAIN GOATSKIN\r\n>HAND STITCED HANDLES\r\n>REMOVABLE SHOULDER STRAP\r\n>TOP ZIP CLOSURE\r\n>GOLD METALLID EDGES AROUND SELF-FINISH STUDE\r\n>LEATHER TASSEL ZIPPER PULL\r\n>FRONT ZIP POCKER\r\n>INTERRIOR ZIP POCKER WITH BALECIAGA ENGFAVED PLAQUE\r\n>DOUBLE PHONE COMPARTMENT INSIDE\r\n>LEATHER FRAMED MIRROR\r\n> MADE IN ITALY\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Balenciaga รุ่น กระเป๋าสะพายและถือ', 'Balenciaga', 'BALENCIAGA', 71000, 69900, '', 'Active', '>BODY OF THE BAG IN SHINY GRAIN GOATSKIN\r\n>HAND STITCED HANDLES\r\n>REMOVABLE SHOULDER STRAP\r\n>TOP ZIP CLOSURE\r\n>GOLD METALLID EDGES AROUND SELF-FINISH STUDE\r\n>LEATHER TASSEL ZIPPER PULL\r\n>FRONT ZIP POCKER\r\n>INTERRIOR ZIP POCKER WITH BALECIAGA ENGFAVED PLAQUE\r\n>DOUBLE PHONE COMPARTMENT INSIDE\r\n>LEATHER FRAMED MIRROR\r\n> MADE IN ITALY\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'BURBERRY ', 'BURBERRY', 'BURBERRY', 145000, 144500, '', 'Active', 'DETAILS\r\n14 x 11.5 x 17.5cm/5.5 x 4.5 x 6.9in\r\n100% polyamide with calf leather trim\r\nLining: 100% polyester\r\nInterior pouch pocket\r\nLeather and chain strap\r\nMagnetic closure\r\nHand-painted edges\r\nPolished metal hardware\r\nPinch-pleated sides\r\nMade in Italy\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'BURBERRY', 'BURBERRY', 'BURBERRY', 150000, 145000, '', 'Active', 'DESCRIPTION\r\nThe Bucket Bag crafted from tiered suede fringing with detachable leather wristlet. A runway icon designed in London and crafted in Italy. Hand-finished details capture the collection''s bohemian attitude.\r\n\r\nDETAILS\r\n26.5 x 19 x 36cm\r\n10.4 x 7.5 x 14.2in\r\n100% calf suede with calf leather trim\r\nLining: 68% polyester, 32% polyurethane\r\nOne interior pouch pocket, detachable wristlet\r\nRolled leather handle\r\nMagnetic closure\r\nHand-painted edges\r\nPolished metal hardware\r\nPinch-pleated sides\r\nMade in Italy\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Boychanel', 'chanel', 'chanel', 185000, 178000, '', 'Active', 'chanel\r\nกระเป๋าคลัช Boy chanel `หนังลูกวัวและหนังแพะสิทูโทน ตกแต่งด้วยที่ปิดกระเป๋า 13.5x27x6cm ,5.3x10.6x2.4 IN\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Boychanel', 'chanel', 'chanel', 135000, 134000, '', 'Active', 'chanel\r\nกระเป๋าคลัช Boy chanel `หนังลูกวัว ตกแต่งลายวิลท์   14.5x25x8 cm 5.7x9.8x3.1 IN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Boychanel', 'chanel', 'chanel', 126000, 125000, '', 'Active', 'chanel\r\nกระเป๋าคลัช Boy chanel `หนังลูกวัว ตกแต่งลายวิลท์   12X20X7 CM 4.7X7.9X2.8IN\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Boychanel', 'chanel', 'chanel', 125000, 125000, '', 'Active', 'chanel\r\nกระเป๋าคลัช Boy chanel หนังลูกแกะใบเล็ก ตกแต่งด้วยพลีทโดย LOGNON 12X20X7 CM 4.7X7.9X2.8 IN\r\n\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'chanel', 'chanel', 'chanel', 99000, 99000, '', 'Active', 'chanel\r\nกระเป๋าสะพายหนังแกะตกแต่งงานโครเชต์ใบเล็ก 15x20x8 cm 5.9x7.9x3.1IN\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'DIRO1 WINTER 2015 ', 'Diro', 'Diro', 250000, 250000, '', 'Active', 'DIRO\r\nWINTER 2015 \r\n"LADY DIOR" BAG \r\nBLEU DE MINUIT LAMBSKIN\r\nTIMELESS ELEGANCE\r\n\r\nTHE INSPIRATION\r\n\r\nA timeless and unique work of art, the "Lady Dior" \r\nbag is imbued with the Couture spirit of Dior. \r\nThis Bleu de Minuit lambskin bag is enhanced by iconic Dior "Cannage" stitching.\r\n\r\nTHE DESCRIPTION\r\n\r\n"Lady Dior" bag in Bleu de Minuit lambskin\r\n"Cannage" topstitching\r\nSilver-tone jewellery\r\nCan be carried by hand or on the shoulder\r\nDimensions: 24 x 20 x 11 cm\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'DIRO LADY DIOR', 'Diro', 'Diro', 275000, 275000, '', 'Active', 'DIRO\r\nLADY DIOR\r\nMINI "LADY DIOR" BAG\r\nBLACK SATIN EMBROIDERED WITH SEQUINS\r\n\r\nTIMELESS ELEGANCE\r\nTIMELESS ELEGANCE\r\n\r\nTHE INSPIRATION\r\n\r\nA timeless and unique work of art, the "Lady Dior" bag is imbued with the Couture spirit of Dior. This mini satin bag is sumptuously adorned with an embroidery of multi-coloured sequins,\r\n inspired by the Spring-Summer 2015 Haute Couture collection. The handles and strap in precious Cl?mentine crocodile add to the incomparable elegance of this bag.\r\n\r\nTHE DESCRIPTION\r\n\r\nMini "Lady Dior" bag in satin embroidered with sequins\r\nSilver-tone jewellery\r\nCl?mentine crocodile details\r\nCarried by hand, on the shoulder or across the body\r\nDimensions: 17 x 15 x 7 cm\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'DIRO LADY DIOR', 'Diro', 'Diro', 265000, 265000, '', 'Active', 'DIRO\r\nLADY DIOR\r\n"LADY DIOR" BAG\r\nCHAMPAGNE METALLIC CALFSKIN WITH MICRO-CANNAGE MOTIF\r\n\r\nTIMELESS ELEGANCE\r\nTHE INSPIRATION\r\n\r\nA timeless and unique work of art, the "Lady Dior" bag is imbued with the Couture spirit of Dior. \r\nThis small bag in champagne coloured metallic calfskin illustrates the futuristic world that fascinates Raf Simons. It is embossed with a miniature cannage, the subtle and urban emblem.\r\n\r\nTHE DESCRIPTION\r\n\r\n"Lady Dior" bag in champagne metallic calfskin with micro-cannage\r\n"Microcannage" motif \r\nLight gold-tone jewellery\r\nCan be carried by hand, on the shoulder or across the body\r\nDimensions: 24 x 20 x 11 cm\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'DIRO LADY DIOR', 'Diro', 'Diro', 350000, 350000, '', 'Active', 'DIRO\r\nLADY DIOR\r\n"LADY DIOR" BAG\r\nPRINTED LAMBSKIN\r\n\r\nTIMELESS ELEGANCE\r\n\r\nTHE INSPIRATION\r\n\r\nA timeless and unique work of art, the "Lady Dior" bag is imbued with the Couture spirit of Dior. \r\nThis bag in Ciel Clair lambskin with Dior''s emblematic "Cannage" topstitching is printed with feminine, ultra-realistic cherry blossoms.\r\n\r\nTHE DESCRIPTION\r\n\r\n"Lady Dior" bag in printed lambskin\r\n"Cannage" topstitching\r\nSilver-tone jewellery\r\nCan be carried by hand or on the shoulder\r\nDimensions: 24 x 20 x 11 cm\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'DIRO LADY DIOR', 'Diro', 'Diro', 450000, 450000, '', 'Active', 'DIRO\r\nLADY DIOR\r\n"LADY DIOR" BAG\r\nCALFSKIN STUDDED WITH BEADS AND RHINESTONES\r\n\r\nTIMELESS ELEGANCE\r\n\r\nTHE INSPIRATION\r\n\r\nA timeless and unique work of art, the "Lady Dior" bag is imbued with the Couture spirit of Dior. This model in sapphire blue calfskin with a rock yet couture feel is studded with beads, crystals and guilloch? jewellery.\r\n\r\nTHE DESCRIPTION\r\n\r\n"Lady Dior" bag in calfskin studded with beads and rhinestones\r\nSilver-tone jewellery\r\nCan be carried by hand or on the shoulder\r\nDimensions: 24 x 20 x 11 cm\r\n\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'HERMES1-2-3 Garden Party', 'Hermès ', 'Hermès ', 86025, 86025, '', 'Active', 'HERMES\r\nGarden Party\r\nHermes bag in fire red grand chevron weave and fire red country cowhide\r\nMeasures 14" x 10" x 6.5". Silver and palladium plated Clou de Selle snap closure.\r\nColor : fire orange/fire orange\r\nRef. H066602CKAF\r\n\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'HERMES4-5 Soie Cool', 'Hermès ', 'Hermès ', 55500, 55500, '', 'Active', 'HERMES4-5\r\nSoie Cool\r\nHermes sport-chic bag in cyclamen "Flamingo Party" printed silk and capucine red swift calfskin. Woven silk strong shoulder strap\r\nMeasures 4.3" x 6.1" x 4.3"\r\nSilver and palladium plated metal strap loops\r\nColor : cyclamen/capucine\r\nRef. H068610CKAA\r\n\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'HERMES6 So-Kelly', 'Hermès ', 'Hermès ', 268250, 268250, '', 'Active', 'HERMES6\r\nSo-Kelly\r\nHermes bag in Togo calfskin\r\nMeasures 8.5" x 12" x 4.5"\r\nZip front pocket, flat back pocket, adjustable strap\r\nSilver and palladium plated hardware\r\nColor : vermilion\r\nRef. H056304CK5E\r\n\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'MIU MIU', 'miumiu', 'miumiu', 160000, 160000, '', 'Active', 'MIU MIU1\r\nTOP HANDLE\r\n\r\nNappa leather patchwork + Ayers snakeskin set\r\nPlexiglas chain handle hand-threaded with ayers snakeskin\r\nPatent leather tag with mirror inside and logo\r\nPolished steel hardware\r\nMetal lettering logo on rear\r\nSatin cotton pocket with zipper and small patch pocket inside\r\nSuede lining\r\nDetachable 105 cm shoulder strap.\r\n\r\nL25 H18 W7 CM\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'MIU MIU', 'miumiu', 'miumiu', 160000, 160000, '', 'Active', 'MIU MIU\r\nTOP HANDLE\r\n\r\nNappa leather patchwork + Ayers snakeskin set\r\nConstruction with raw-cut seams and tear-drop side panel\r\nMatelass? and Ayers leather flap closure with milled push-lock clasp\r\nMatelass? front with Ayers leather band trim\r\nPlexiglas chain handle hand-threaded with patent leather\r\nAyers leather tag with mirror inside and logo\r\nPolished steel hardware\r\nMetal lettering logo on rear\r\nSatin cotton pocket with zipper and small patch pocket inside\r\nSuede lining\r\nDetachable 105 cm shoulder strap\r\n\r\nL22 H15.5 W6 CM\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'ysl SAINT LAURENT CLASSIC SMALL SAC DE JOUR BAG IN LIPSTICK RED LEATHER', 'Yves Saint Laurent', 'Yves Saint Laurent', 65490, 65490, '', 'Active', 'SIGNATURE SAINT LAURENT BAG WITH TUBULAR HANDLES, ACCORDION SIDES, COMPRESSION STRAPS WITH TABS AND EMBOSSED SAINT LAURENT SIGNATURE AND REMOVABLE SHOULDER STRAP.\r\nDIMENSIONS 12.5 9.8 6.4 INCHES\r\nLENGTH OF HANDLE 3.7 INCHES\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'SAINT LAURENT SMALL EMMANUELLE FRINGED BUCKET BAG IN DOVE WHITE LEATHER', 'Yves Saint Laurent', 'Yves Saint Laurent', 44030, 44030, '', 'Active', 'SIGNATURE SAINT LAURENT BUCKET BAG WITH REMOVABLE TUBULAR HANDLE, 3 ROWS OF FRINGES AND REMOVABLE AND ADJUSTABLE SHOULDER STRAP.\r\nDIMENSIONS 5.7 7.2 4.7 INCHES\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'SAINT LAURENT LARGE MONOGRAM SAINT LAURENT FLAP WALLET IN BLACK GRAIN DE POUDRE TEXTURED MATELASS? LEATHER', 'Yves Saint Laurent', 'Yves Saint Laurent', 17390, 17390, '', 'Active', 'LARGE WALLET WITH CENTRAL GOLD-TONED METAL INTERLOCKING YSL BUCKLE AND MATELASS? STITCHING.\r\nDIMENSIONS 7.4 4.3 1.2 INCHES\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'SAINT LAURENT SMALL MONOGRAM SAINT LAURENT CABAS BAG IN BLACK LEATHER', 'Yves Saint Laurent', 'Yves Saint Laurent', 51430, 51430, '', 'Active', 'TUBULAR TOP HANDLE BAG WITH LEATHER ENCASED KEY RING, INTERLOCKING YSL SIGNATURE BUCKLE CLOSURE AND ADJUSTABLE REMOVABLE SHOULDER STRAP.\r\nDIMENSIONS 12.5 8.6 5.8 INCHES\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'ํyves Saint Laurent', 'Yves Saint Laurent', 'เครื่องประดับ', 16280, 16280, '', 'Active', 'กำไลข้อมือ ที่ออกแบบมาเพื่อให้เข้ากับทุกชุดของคุณผู้หญิง ลวดลายบ่งบอกถึงแบนด์ ysl ได้อย่างชัเฃดเจน สวยงาม\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'BURBERRY', 'BURBERRY', 'BURBERRY', 44500, 44500, '', 'Active', 'DETAILS\r\n39 x 17 x 29.5cm/15.4 x 6.7 x 11.6in\r\n100% calf suede\r\nLining: 100% calf leather\r\nOne exterior flap pocket\r\nOne central zip compartment\r\nOne interior zip pocket\r\nRolled leather handles\r\nDetachable shoulder strap\r\nMagnetic stud closure\r\nHand-painted edges\r\nPolished metal hardware\r\nMade in Italy\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'aaaa', 'chanel', 'สร้อยคอ', 1500, 1500, '', 'Active', 'DETAILS\r\n39 x 17 x 29.5cm/15.4 x 6.7 x 11.6in\r\n100% calf suede\r\nLining: 100% calf leather\r\nOne exterior flap pocket\r\nOne central zip compartment\r\nOne interior zip pocket\r\nRolled leather handles\r\nDetachable shoulder strap\r\nMagnetic stud closure\r\nHand-painted edges\r\nPolished metal hardware\r\nMade in Italy', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_id`, `image`) VALUES
(6, '/assets/img/567958ca7950c_img.jpg'),
(7, '/assets/img/56795944b2c0e_img.jpg'),
(8, '/assets/img/567959714f5b0_img.jpg'),
(9, '/assets/img/56795c8b09c8d_img.jpg'),
(10, '/assets/img/56795cdb128eb_img.jpg'),
(14, '/assets/img/56795df40ef0c_img.png'),
(16, '/assets/img/56795e66ebc90_img.png'),
(17, '/assets/img/56795ed351784_img.jpg'),
(18, '/assets/img/56795f10ade1b_img.jpg'),
(19, '/assets/img/56795f85e97f2_img.jpg'),
(20, '/assets/img/56795fc8b40cc_img.jpg'),
(21, '/assets/img/56795ff912a51_img.jpg'),
(22, '/assets/img/56796412cdb70_img.jpg'),
(23, '/assets/img/567964440253b_img.jpg'),
(24, '/assets/img/567964887e2c3_img.jpg'),
(25, '/assets/img/567964d99fc6c_img.jpg'),
(26, '/assets/img/567965019e2cb_img.jpg'),
(27, '/assets/img/567965979a4b2_img.jpg'),
(28, '/assets/img/567965d1977cf_img.jpg'),
(29, '/assets/img/5679660f56d17_img.jpg'),
(30, '/assets/img/5679663e20a84_img.jpg'),
(31, '/assets/img/5679676645bd2_img.jpg'),
(13, '/assets/img/56796b5948364_img.png'),
(15, '/assets/img/56796b78b2c98_img.png'),
(12, '/assets/img/5679704c6082b_img.png'),
(32, '/assets/img/567970aa459ff_img.jpg'),
(33, '/assets/img/567975237a4f8_img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `review` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `name`, `email`, `review`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, '555555', '5555@a.com', '555555', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 13, 'sadasd546', 'a@a.com', 'sdfsdf+65dsf4565', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 6, 'testdomo', 'r@a.com', 'review   test', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 18, 'reewe', 'wewe@d.com', 'sdf[sdfpjiewrfoiuwerjrklsgv;xldvk df;h;jsdhg', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_analytics` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `description`, `parent`, `created_at`, `updated_at`) VALUES
(2, 'BALENCIAGA', 'BALENCIAGA ', 'Balenciaga', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'BURBERRY', 'BURBERRY', 'BURBERRY', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'chanel', 'chanal', 'chanel', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Charles & Keith', 'Charles & Keith', 'Charles & Keith', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Diro', 'Diro', 'Diro', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Hermès ', 'Hermès ', 'Hermès ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Michael Kors', 'Michael Korsไมเคิล คอร์', 'Michael Kors', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'miumiu', 'miumiuมิวมิว', 'miumiu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Yves Saint Laurent', 'Yves Saint Laurentอีฟส์ แซงต์ โลรองต์', 'Yves Saint Laurent', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'เครื่องประดับ', 'กำไลข้อมือ', 'Yves Saint Laurent', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'รองเท้า', 'MIU MIU SHOES ', 'miumiu', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'สร้อยคอ', 'สร้อยคอสุดหรูหลายแบนด์ดัง', 'chanel', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port` int(11) NOT NULL,
  `host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `title`, `url`, `email`, `tel`, `port`, `host`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'สินค้าแบนด์เนมทุกชนิด', 'www.ggg.com', 'admin@mail.com', '088888888888', 0, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stripe_active` tinyint(4) NOT NULL DEFAULT '0',
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_subscription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_plan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_four` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `subscription_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`, `address`, `zip`, `city`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`, `stripe_active`, `stripe_id`, `stripe_subscription`, `stripe_plan`, `last_four`, `trial_ends_at`, `subscription_ends_at`) VALUES
(39, 'admin', 'admin@gmail.com', '123456', 'Administrator', '08000123456', 'bbk', '10220', 'bkk', 0, 'uuVOhy5yQScCsdqKQUORoi3Q3phLZh', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'admin', 'admin@mail.com', '$2y$10$GW9OW0iggT6dNJW/x5pkEuNrLLDRQtM77Y5GyXLpUFCjj.T8TMz/.', 'Administrator', '123456', '123456', '123456', '123456', 0, 'HOd5oZ0qLExPdbkRgydmfr94cfYwj6', 'eRuNBWwH41uqaqcVtrrO2AmKnpmqKukZIb21D9rpFJgUmSQ6A0u6VokSocDa', '0000-00-00 00:00:00', '2015-12-22 16:57:52', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'test', 'test@mail.com', '$2y$10$eAYyxUntPHzgI1XAzwia9.Vx02P5p8h.WndgxwuP.zJKM7Z/0oSGK', 'client', '057876548', '555/555', '11120', 'bangkok', 0, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_categories`
--
ALTER TABLE `parent_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `parent_categories`
--
ALTER TABLE `parent_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
