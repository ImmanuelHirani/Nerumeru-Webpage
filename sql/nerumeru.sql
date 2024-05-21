-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 01:22 PM
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
-- Database: `nerumeru`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_img` varchar(100) NOT NULL,
  `banner_title` varchar(100) NOT NULL,
  `banner_subtitle` varchar(200) NOT NULL,
  `banner_button` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bio`
--

CREATE TABLE `bio` (
  `bio_id` int(11) NOT NULL,
  `bio_title` varchar(100) NOT NULL,
  `bio_Subtitle` varchar(100) NOT NULL,
  `bio_full` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lastUpdate_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bio`
--

INSERT INTO `bio` (`bio_id`, `bio_title`, `bio_Subtitle`, `bio_full`, `status`, `insert_date`, `lastUpdate_date`) VALUES
(1, 'Nerumeru', 'å¯ã‚‹ ãƒ¡ãƒ«', 'In This Pandemic Era For Almost 2 Years, More Pets Adopted In Lovers&#039; Homes Animals In Indonesia. This Trend Is Taking Effect In Increasing Awareness Of The Importance Of Quality Products For Pets. In Order To Answer This Need, Neru Meru Is Here As A Brand That Is Able To Compete In The Domestic Market And Internationally With Experience And Technology With Japanese Quality Standards\n\nBased On The Love For Pets, Neru Meru Is Here As A Brand That Is Able To Provide The Best Solutions For Various Pet Needs. Innovative, Precise, Durable And Made Using The Highest Quality Materials, Every Neru Meru Product Is Created For The Comfort Of Pets And Their Human Companions.', 1, '2024-02-12 09:41:39', '2024-02-12 09:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_type` varchar(50) NOT NULL,
  `blog_icon` varchar(100) NOT NULL,
  `blog_targetLink` varchar(500) NOT NULL,
  `blog_icon_title` varchar(100) NOT NULL,
  `blog_vidio` varchar(500) NOT NULL,
  `status` int(1) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lastUpdate_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_type`, `blog_icon`, `blog_targetLink`, `blog_icon_title`, `blog_vidio`, `status`, `insert_date`, `lastUpdate_date`) VALUES
(1, 'icon', 'img/SVG/history-toggle.svg', '#OurStory', 'Our Story', '', 1, '2024-02-12 10:00:49', '2024-02-12 10:00:49'),
(2, 'icon', 'img/SVG/mood-heart.svg', '#HappyStory', 'Happy Story', '', 1, '2024-02-12 10:05:02', '2024-02-12 10:05:02'),
(3, 'icon', 'img/SVG/brand-instagram.svg', '#OurInsta', 'Our Insta', '', 1, '2024-02-12 10:05:12', '2024-02-12 10:05:12'),
(7, 'icon', 'img/SVG/calendar-event.svg', '#OurEvent', 'Our Event', '', 1, '2024-02-12 10:05:19', '2024-02-12 10:05:19'),
(8, 'vidio', '', '', '', 'vidio\\A Glimpse of NeruMeru Factory.mp4', 1, '2024-01-29 20:41:06', '2024-01-29 20:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `custombed`
--

CREATE TABLE `custombed` (
  `custombed_id` int(11) NOT NULL,
  `custombed_title` varchar(100) NOT NULL,
  `custombed_subtitle` varchar(100) NOT NULL,
  `custombed_fulldetails` varchar(1000) NOT NULL,
  `custombed_button1` varchar(50) NOT NULL,
  `custombed_button2` varchar(50) NOT NULL,
  `custombed_img` varchar(100) NOT NULL,
  `custombed_details_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `herosection`
--

CREATE TABLE `herosection` (
  `hero_id` int(11) NOT NULL,
  `hero_title1` varchar(200) NOT NULL,
  `hero_title2` varchar(200) NOT NULL,
  `hero_title3` varchar(200) NOT NULL,
  `hero_subtitle` varchar(1000) NOT NULL,
  `hero_button1` varchar(100) NOT NULL,
  `hero_button2` varchar(100) NOT NULL,
  `hero_img` varchar(500) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lastUpdate_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `herosection`
--

INSERT INTO `herosection` (`hero_id`, `hero_title1`, `hero_title2`, `hero_title3`, `hero_subtitle`, `hero_button1`, `hero_button2`, `hero_img`, `insert_date`, `lastUpdate_date`, `status`) VALUES
(36, 'Creating Happy Moments With Your Pets', 'Love And Care For Your Pets', 'Discover The Joy Of Pet Companionship', 'Providing Top-Quality Solutions For Pet Lovers\r\nWith Innovative , And High-Quality Products\r\nDesigned For Pets And Their Owners.', 'Explore Now', 'Shop Collection', 'Hero-Section.png', '2024-05-18 21:48:40', '2024-05-18 21:48:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `neru_event`
--

CREATE TABLE `neru_event` (
  `event_id` int(11) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `event_img` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lastUpdate_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `neru_event`
--

INSERT INTO `neru_event` (`event_id`, `event_type`, `event_img`, `status`, `insert_date`, `lastUpdate_date`) VALUES
(6, 'event', 'IIPE doc 1.jpg', 1, '2024-02-08 16:19:39', '2024-02-08 16:19:39'),
(10, 'news', 'june 3.jpg', 1, '2024-02-12 09:41:03', '2024-02-12 09:41:03'),
(21, 'event', 'IIPE doc 2.jpg', 1, '2024-02-08 16:20:02', '2024-02-08 16:20:02'),
(22, 'event', 'IIPE doc 3.jpg', 1, '2024-02-08 16:20:08', '2024-02-08 16:20:08'),
(23, 'event', 'IIPE doc 4.jpg', 1, '2024-02-08 16:20:15', '2024-02-08 16:20:15'),
(24, 'event', 'IIPE doc 2.jpg', 1, '2024-02-08 16:21:09', '2024-02-08 16:21:09'),
(25, 'event', 'IIPE doc 6.jpg', 1, '2024-02-08 16:20:30', '2024-02-08 16:20:30'),
(26, 'event', 'IIPE doc 7.jpg', 1, '2024-02-08 16:20:40', '2024-02-08 16:20:40'),
(27, 'event', 'IIPE doc 5.jpg', 1, '2024-02-08 16:20:50', '2024-02-08 16:20:50'),
(32, 'news', 'feeds 4 aug.jpg', 1, '2024-02-08 15:17:09', '2024-02-08 15:17:09'),
(33, 'news', 'July 8.jpg', 1, '2024-02-12 09:37:33', '2024-02-12 09:37:33'),
(34, 'news', 'agustus 2.jpg', 1, '2024-02-12 09:37:51', '2024-02-12 09:37:51'),
(35, 'news', 'Neru Stick 20cm (1).jpg', 1, '2024-02-12 09:38:03', '2024-02-12 09:38:03'),
(36, 'news', 'Sept 3-1.jpg', 1, '2024-02-12 09:38:21', '2024-02-12 09:38:21'),
(38, 'news', 'Sept 3-2.jpg', 1, '2024-02-12 09:38:48', '2024-02-12 09:38:48'),
(39, 'news', 'sept-3 (Cover).jpg', 1, '2024-02-12 09:39:59', '2024-02-12 09:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_kurir` varchar(100) NOT NULL,
  `order_duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_cart`
--

CREATE TABLE `order_cart` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(100) NOT NULL,
  `order_note` varchar(200) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lastUpdate_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_cart`
--

INSERT INTO `order_cart` (`order_id`, `user_id`, `product_id`, `order_quantity`, `order_note`, `insert_date`, `lastUpdate_date`) VALUES
(65, 10, 16, 5, 'awdawdawdaw', '2024-05-18 22:31:34', '2024-05-18 22:31:34'),
(66, 10, 26, 4, 'awdwad', '2024-05-18 22:32:52', '2024-05-18 22:32:52'),
(105, 9, 16, 2, '', '2024-05-21 18:20:47', '2024-05-21 18:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_color` varchar(100) NOT NULL,
  `product_weight` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_product_img`
--

CREATE TABLE `other_product_img` (
  `img_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_img_1` varchar(100) NOT NULL,
  `product_img_2` varchar(100) NOT NULL,
  `product_img_3` varchar(100) NOT NULL,
  `status_multiImg` tinyint(1) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lastUpdate_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `other_product_img`
--

INSERT INTO `other_product_img` (`img_id`, `product_id`, `product_img_1`, `product_img_2`, `product_img_3`, `status_multiImg`, `insert_date`, `lastUpdate_date`) VALUES
(15, 4, '6638282193bf0.jpg', '6638282193f78.png', '66382821940c3.jpg', 1, '2024-04-27 13:55:38', '2024-05-06 07:45:21'),
(17, 1, '6634cf90148e2.png', '6634cf9014a84.jpg', '6634cf9014dc7.png', 1, '2024-05-03 18:50:40', '2024-05-03 18:50:40'),
(18, 15, '66382a7ac04d9.jpg', '66382a7ac07bf.jpg', '66382a7ac09e9.png', 1, '2024-05-06 07:55:22', '2024-05-06 07:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_img` varchar(500) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_categories` varchar(100) NOT NULL,
  `product_stock` int(100) NOT NULL,
  `product_color` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_specification` varchar(2000) NOT NULL,
  `product_weight` varchar(100) NOT NULL,
  `product_warranty` varchar(500) NOT NULL,
  `product_rating` int(5) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lastUpdate_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_img`, `product_type`, `product_name`, `product_categories`, `product_stock`, `product_color`, `product_price`, `product_specification`, `product_weight`, `product_warranty`, `product_rating`, `insert_date`, `lastUpdate_date`, `status`) VALUES
(1, '6639f9cd50bb2.jpg', 'Bedding', 'Neru Arch - Waterproof Kasur Anjing Kucing Anti Air - Turquoise', 'Neru One', 5, 'Silver Grey', 485000, 'NeruArch - NeruMeru Non-Waterproof series\r\nProduct Sizel: 75 x 55 cm\r\n\r\nSangat nyaman untuk tidur hewan kesayangan anda.\r\nFavorit para anjing maupun kucing, terdapat bantal dipinggiran untuk kenyamanan hewan peliharaan anda.\r\n\r\nSpefisikasi:\r\n- Synthetic Goosedown (Bulu angsa sintetis) &amp; Dacron\r\n- Antislip\r\n- Detachable pillow\r\n- Machine washable\r\n- Reversed Zipper\r\n\r\nTersedia versi Waterproof pada etalase lain', '1kg', '1 Year (Foam, 20% Deflated) - 1 year warranty for inner foam if there is a 20% decrease', 5, '2024-02-25 00:00:00', '2024-05-07 21:01:48', 1),
(4, '65f15af6aa239.jpg', 'Bedding', 'Orthopedic Pet Bed Kasur Anjing Kucing - Neru Meru - Neru Takeshi - Smoky Grey', 'Neru One', 5, 'Smokey Grey', 850000, 'Neru Takeshi Ukuran 80x60 cm, tinggi dinding 10 cm\r\nNeru Meru - Neru Takeshi adalah kasur ortopedik khusus hewan peliharaan\r\n\r\nFoam Specification :\r\n3 cm Soft Memory Foam (White)\r\n5 cm Medium Support Foam (Yellow)\r\n\r\nInner Fabric : Polyester Cotton (Dark Grey)\r\nWater Resistant, Breathable, with Machine Washable Cover\r\n\r\nOuter Fabric : Premium Fabric made of Polyester, Super Tough, Comfortable, Soft with Machine Washable Cover and Anti Slip Fabric\r\n\r\nZipper :\r\nYKK (Middle-Inner)\r\nYKK (Under-Outer)\r\n\r\nColor Variant :\r\n1. Silver Grey\r\n2. Smoky Grey\r\n3. Icy Blue\r\n4. Mellow Rose\r\n5. Blazing Yellow\r\n6. Marina\r\n7. Tree Top\r\n8. Lava Smoke\r\n9. Nimbus Cloud\r\n10. Nautical Blue\r\n\r\nWarranty : 1 Year (Foam, 20% Deflated) - Garansi 1 tahun untuk foam dalam apabila ada penurunan 20%\r\n\r\nPERHATIAN:\r\nAda pertanyaan atau butuh info detail lainnya, klik Chat Tokopedia for fast response.\r\nPerhatikan pilihan warna, ukuran dan varian barang sebelum check-out. Karena, akan kami kirimkan berdasarkan pesanan Anda.\r\nHappy shopping dan terima kasih\r\nLihat Lebih Sedikit', '1kg', '1 Year (Foam, 20% Deflated) - 1 year warranty for inner foam if there is a 20% decrease', 5, '2024-03-13 14:51:18', '2024-05-07 21:02:49', 1),
(15, '663829e0aa2a3.png', 'Bedding', 'Neru Three - Orthopedic Dog Cat Pet Bed - Kasur Anjing - Neru Meru - Smoky Grey', 'Neru Two', 100, 'Smokey Grey', 200000, 'Neru Takeshi Ukuran 80x60 cm, tinggi dinding 10 cm\r\nNeru Meru - Neru Takeshi adalah kasur ortopedik khusus hewan peliharaan\r\n\r\nFoam Specification :\r\n3 cm Soft Memory Foam (White)\r\n5 cm Medium Support Foam (Yellow)\r\n\r\nInner Fabric : Polyester Cotton (Dark Grey)\r\nWater Resistant, Breathable, with Machine Washable Cover\r\n\r\nOuter Fabric : Premium Fabric made of Polyester, Super Tough, Comfortable, Soft with Machine Washable Cover and Anti Slip Fabric\r\n\r\nZipper :\r\nYKK (Middle-Inner)\r\nYKK (Under-Outer)\r\n\r\nColor Variant :\r\n1. Silver Grey\r\n2. Smoky Grey\r\n3. Icy Blue\r\n4. Mellow Rose\r\n5. Blazing Yellow\r\n6. Marina\r\n7. Tree Top\r\n8. Lava Smoke\r\n9. Nimbus Cloud\r\n10. Nautical Blue\r\n\r\nWarranty : 1 Year (Foam, 20% Deflated) - Garansi 1 tahun untuk foam dalam apabila ada penurunan 20%\r\n\r\nPERHATIAN:\r\nAda pertanyaan atau butuh info detail lainnya, klik Chat Tokopedia for fast response.\r\nPerhatikan pilihan warna, ukuran dan varian barang sebelum check-out. Karena, akan kami kirimkan berdasarkan pesanan Anda.\r\nHappy shopping dan terima kasih\r\nLihat Lebih Sedikit', 'Customizeable', '1 Year (Foam, 20% Deflated) - 1 year warranty for inner foam if there is a 20% decrease', 5, '2024-05-06 07:52:48', '2024-05-07 21:05:48', 1),
(16, '6639f1a2a1c5f.png', 'Toys', 'Neru Long Stick', 'Neru Stick', 20, 'Multi Color', 50000, 'NeruArch - NeruMeru Non-Waterproof series\r\nProduct Sizel: 75 x 55 cm\r\n\r\nSangat nyaman untuk tidur hewan kesayangan anda.\r\nFavorit para anjing maupun kucing, terdapat bantal dipinggiran untuk kenyamanan hewan peliharaan anda.\r\n\r\nSpefisikasi:\r\n- Synthetic Goosedown (Bulu angsa sintetis) &amp; Dacron\r\n- Antislip\r\n- Detachable pillow\r\n- Machine washable\r\n- Reversed Zipper\r\n\r\nTersedia versi Waterproof pada etalase lain', '50g', '1 Year (Foam, 20% Deflated) - 1 year warranty for inner foam if there is a 20% decrease', 4, '2024-05-07 16:17:22', '2024-05-07 21:11:24', 1),
(17, '6639f22e9cf3b.png', 'Toys', 'Neru Ring - Sunshine Yellow', 'Neru Ring', 20, 'Yellow Sunshine', 20000, 'NeruArch - NeruMeru Non-Waterproof series\r\nProduct Sizel: 75 x 55 cm\r\n\r\nSangat nyaman untuk tidur hewan kesayangan anda.\r\nFavorit para anjing maupun kucing, terdapat bantal dipinggiran untuk kenyamanan hewan peliharaan anda.\r\n\r\nSpefisikasi:\r\n- Synthetic Goosedown (Bulu angsa sintetis) &amp; Dacron\r\n- Antislip\r\n- Detachable pillow\r\n- Machine washable\r\n- Reversed Zipper\r\n\r\nTersedia versi Waterproof pada etalase lain', '20g', '1 Year (Foam, 20% Deflated) - 1 year warranty for inner foam if there is a 20% decrease', 2, '2024-05-07 16:19:42', '2024-05-07 20:59:08', 1),
(18, '6639f533b289e.jpg', 'Toys', 'Neru ball - rounded Blackstar', 'Neru Ring', 20, 'All Type Of color', 200000, 'NeruArch - NeruMeru Non-Waterproof series\r\nProduct Sizel: 75 x 55 cm\r\n\r\nSangat nyaman untuk tidur hewan kesayangan anda.\r\nFavorit para anjing maupun kucing, terdapat bantal dipinggiran untuk kenyamanan hewan peliharaan anda.\r\n\r\nSpefisikasi:\r\n- Synthetic Goosedown (Bulu angsa sintetis) &amp; Dacron\r\n- Antislip\r\n- Detachable pillow\r\n- Machine washable\r\n- Reversed Zipper\r\n\r\nTersedia versi Waterproof pada etalase lain', '250g', 'awdawdawd', 1, '2024-05-07 16:32:35', '2024-05-07 21:02:11', 1),
(19, '6639f568b9947.jpg', 'Toys', 'Neru Longest Stick Ever', 'Neru Ball', 200, 'All Type Of color', 400000, 'NeruArch - NeruMeru Non-Waterproof series\r\nProduct Sizel: 75 x 55 cm\r\n\r\nSangat nyaman untuk tidur hewan kesayangan anda.\r\nFavorit para anjing maupun kucing, terdapat bantal dipinggiran untuk kenyamanan hewan peliharaan anda.\r\n\r\nSpefisikasi:\r\n- Synthetic Goosedown (Bulu angsa sintetis) &amp; Dacron\r\n- Antislip\r\n- Detachable pillow\r\n- Machine washable\r\n- Reversed Zipper\r\n\r\nTersedia versi Waterproof pada etalase lain', '100g', '23124', 3, '2024-05-07 16:33:28', '2024-05-07 21:11:16', 1),
(20, '6639f58857c6a.jpg', 'Bedding', 'Neru Petite - Orthopedic Dog Cat Pet Bed - Kasur Anjing - Neru Meru - Icy Blue', 'Neru Two', 50, 'Icy blue', 509000, 'Kondisi: Baru\r\nWaktu Preorder: 3 Hari\r\nMin. Pemesanan: 1 Buah\r\nEtalase: Tempat Tidur Hewan\r\nNeru Petite - Orthopedic pet bed\r\nKasur size 60x40x8cm\r\nInclude 1 Pillow\r\n\r\nTerdiri dari 2 cover:\r\n- Outer cover (Polyester)\r\n- Inner cover (Waterproof)\r\n\r\nSpesifikasi:\r\nMemory foam 3cm\r\nSupport foam 5cm\r\n\r\nJapan technology\r\nSemua cover dapat dilepas dan cuci menggunakan mesin cuci\r\nFoam tidak dapat dicuci\r\n\r\nCocok untuk hewan peliharaan dibawah 4kg\r\n\r\nGaransi 1 Tahun untuk foam jiga kempes sebesar 20%', '2kg', 'Garansi 1 Tahun untuk foam jiga kempes sebesar 20%', 4, '2024-05-07 16:34:00', '2024-05-07 21:06:02', 1),
(23, '6639f8991bd34.png', 'Bedding', 'Neru Meru - Tempat Tidur Kasur Anjing Kucing Peliharaan - Neru Two - Tree Top', 'Neru Two', 200, 'Tree Top', 699000, 'Neru Two - Orthopedic Pet Bed Kasur Peliharaan untuk Anjing Kucing\r\nProduct Size : Small (80 cm x 60 cm x 8 cm)\r\nInclude Pillow 2pcs\r\n\r\nFoam Specification :\r\n3 cm Soft Memory Foam (White)\r\n5 cm Medium Support Foam (Yellow)', '500g', 'Warranty : 1 Year (Foam, 20% Deflated) - Garansi 1 tahun untuk foam dalam apabila ada penurunan foam sebesar 20%', 3, '2024-05-07 16:45:33', '2024-05-07 21:06:15', 1),
(24, '6647290af0752.jpg', 'Bedding', 'Neru Three Item Double Injections', 'Neru One', 20, 'Pink', 200000, 'bagus', '20g', 'Pasti kembali kalo jelek', 4, '2024-05-17 16:53:14', '2024-05-17 16:53:14', 1),
(25, '664729492f00b.png', 'Toys', 'Neru Ring 2', 'Neru Ring', 20, 'Yellow', 200000, 'Bagus Aja', '500g', 'Pasti kembali kalo jelek', 4, '2024-05-17 16:54:17', '2024-05-17 16:54:17', 1),
(26, '664729ae91856.png', 'Toys', 'Neru Stick 4', 'Neru Stick', 20, 'Multi Color', 50000, 'Bagus Aja yang ini ih kek nya', '2000g', 'Pasti kembali klao jelek', 4, '2024-05-17 16:55:58', '2024-05-17 16:55:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recommendsection`
--

CREATE TABLE `recommendsection` (
  `recommend_id` int(11) NOT NULL,
  `recommend_img` varchar(100) NOT NULL,
  `recommend_title` varchar(100) NOT NULL,
  `recommend_targetLink` varchar(500) NOT NULL,
  `status` int(1) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lastupdate_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recommendsection`
--

INSERT INTO `recommendsection` (`recommend_id`, `recommend_img`, `recommend_title`, `recommend_targetLink`, `status`, `insert_date`, `lastupdate_date`) VALUES
(1, '663a32163f6d9.png', 'NERU BEDDING', 'bedding.php', 1, '2024-05-07 20:52:22', '2024-05-07 20:52:22'),
(3, 'card-item5.png', 'NERU SANITIZE', 'sanitize.php', 1, '2024-04-12 10:14:00', '2024-04-12 10:14:00'),
(4, 'card-item-6.png', 'NERU TROLLY', 'trolly.php', 1, '2024-04-12 10:13:24', '2024-04-12 10:13:24'),
(6, 'card-item3.png', 'NERU PILLOW', 'pillow.php', 1, '2024-04-12 10:13:38', '2024-04-12 10:13:38'),
(9, 'card-item-2.png', 'Toys', 'toys.php', 1, '2024-04-12 10:13:54', '2024-04-12 10:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_rating` int(5) NOT NULL,
  `testimonial_commtent` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trolly`
--

CREATE TABLE `trolly` (
  `trolly_id` int(11) NOT NULL,
  `trolly_size` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `trolly_color` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lastUpdate_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trolly`
--

INSERT INTO `trolly` (`trolly_id`, `trolly_size`, `trolly_color`, `insert_date`, `lastUpdate_date`, `status`) VALUES
(1, '5', 'Green', '2024-03-06 20:53:05', '2024-03-06 20:59:03', 0),
(2, '6', 'Blue', '2024-03-06 20:55:36', '2024-03-06 20:55:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(14) NOT NULL,
  `user_password` varchar(1000) NOT NULL,
  `user_img` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lastUpdate_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_email`, `user_phone`, `user_password`, `user_img`, `insert_date`, `lastUpdate_date`) VALUES
(9, 'Immanuel Christian Hirani', 'nuel.hirani8@gmail.com', '081314801945', '$2y$10$kzu1FEPrTNavW3BKJ7/bMu7nnQK5qhIY0OaohtEUun5rdR5S9APeq', '6616725fa9b4c.jpeg', '2024-04-05 17:14:26', '2024-04-20 07:06:06'),
(10, 'Nathania', 'ela@gmail.com', '087788462255', '$2y$10$MUifwX3LLXUojaEYVrCYROQHVcfAxRfPFZ9CMVZ1HcATqpgz4dhZ2', '6618b24e4848f.png', '2024-04-12 10:29:48', '2024-04-12 11:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE `user_locations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_location` varchar(1000) NOT NULL,
  `user_phone_location` varchar(14) NOT NULL,
  `user_username_location` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_locations`
--

INSERT INTO `user_locations` (`id`, `user_id`, `user_location`, `user_phone_location`, `user_username_location`, `status`) VALUES
(25, 9, 'Jalan M.H. Thamrin Boulevard No.1100, Klp. Dua, Kec. Klp. Dua, Kabupaten Tangerang, Banten 15811', '087788452368', 'Habib Sagas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `whyus`
--

CREATE TABLE `whyus` (
  `whyus_id` int(11) NOT NULL,
  `whyus_img` varchar(500) NOT NULL,
  `whyus_title` varchar(50) NOT NULL,
  `whyus_subtitle` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lastUpdate_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `whyus`
--

INSERT INTO `whyus` (`whyus_id`, `whyus_img`, `whyus_title`, `whyus_subtitle`, `status`, `insert_date`, `lastUpdate_date`) VALUES
(1, '663a33177ebda.png', 'Water Resistance Inner Cover', 'The Inner Layer Of NeruMeru Bed Cover Is Made Of Water Ressistant That Helps Protect Your Bed From Spills And Dirt.', 1, '2024-05-07 20:56:39', '2024-05-07 20:56:39'),
(3, 'Washing mechine.png', 'Easy To Wash', 'Developed With Easy To Wash Design And Material. If Get It Dirty, You Can Easily Wash It With Washing Machine.', 1, '2024-02-06 20:52:30', '2024-02-06 20:52:30'),
(4, 'Dog.png', 'Orthopedic &amp; Japan Technology', 'Developed With Japan Technology &amp; Orthopedic Best Quality Material For Long-Lasting Durability To Provide Your Pet With A Better Sleep.', 1, '2024-02-06 20:52:51', '2024-02-06 20:52:51'),
(11, 'Save-bio.png', 'ROHS Certifications', 'ROHS Certification Limits Hazardous Substances (E.G., Lead, Mercury, Hexavalent Chromium, Cadmium) To Acceptable Levels.', 1, '2024-02-06 20:51:33', '2024-02-06 20:51:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `bio`
--
ALTER TABLE `bio`
  ADD PRIMARY KEY (`bio_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `custombed`
--
ALTER TABLE `custombed`
  ADD PRIMARY KEY (`custombed_id`);

--
-- Indexes for table `herosection`
--
ALTER TABLE `herosection`
  ADD PRIMARY KEY (`hero_id`);

--
-- Indexes for table `neru_event`
--
ALTER TABLE `neru_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `order_cart`
--
ALTER TABLE `order_cart`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_idUser` (`user_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `other_product_img`
--
ALTER TABLE `other_product_img`
  ADD PRIMARY KEY (`img_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_type` (`product_type`) USING BTREE;

--
-- Indexes for table `recommendsection`
--
ALTER TABLE `recommendsection`
  ADD PRIMARY KEY (`recommend_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `trolly`
--
ALTER TABLE `trolly`
  ADD PRIMARY KEY (`trolly_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `whyus`
--
ALTER TABLE `whyus`
  ADD PRIMARY KEY (`whyus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bio`
--
ALTER TABLE `bio`
  MODIFY `bio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `custombed`
--
ALTER TABLE `custombed`
  MODIFY `custombed_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `herosection`
--
ALTER TABLE `herosection`
  MODIFY `hero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `neru_event`
--
ALTER TABLE `neru_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_cart`
--
ALTER TABLE `order_cart`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `other_product_img`
--
ALTER TABLE `other_product_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `recommendsection`
--
ALTER TABLE `recommendsection`
  MODIFY `recommend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trolly`
--
ALTER TABLE `trolly`
  MODIFY `trolly_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `whyus`
--
ALTER TABLE `whyus`
  MODIFY `whyus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_cart`
--
ALTER TABLE `order_cart`
  ADD CONSTRAINT `fk_idUser` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `other_product_img`
--
ALTER TABLE `other_product_img`
  ADD CONSTRAINT `fk_other_product_img` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
