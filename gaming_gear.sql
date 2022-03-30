-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 08:22 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaming_gear`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'admin1', 'admin1@gmail.com', '12', 0),
(2, 'admin2', 'admin2@gmail.com', '1', 1),
(8, 'vũ trung hiếu', '$trunghieuvu22102001@gmail.com', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `img_thumb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `img_thumb`) VALUES
(1, 'Keyboard ', 'https://cwsmgmt.corsair.com/_ui/responsive/common/images/nav_keyboards.png'),
(16, 'Cases', 'https://cwsmgmt.corsair.com/landing/home/images/explore-cases.png'),
(20, 'Headsets', 'https://cwsmgmt.corsair.com/landing/home/images/explore-headsets.png'),
(22, 'Monitors', 'https://cwsmgmt.corsair.com/content/images/header/explore-monitors.png'),
(23, 'Mices', 'https://cwsmgmt.corsair.com/landing/home/images/explore-mice.png'),
(24, 'Chair', 'https://cwsmgmt.corsair.com/landing/home/images/explore-gaming-chairs.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` char(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone_number`, `address`) VALUES
(2, 'vũ trung hiếu', 'trunghieuvu22102001@gmail.com', '123456', '0123456789', 'nam định'),
(3, 'hieu hieu hiue', 'hieutrungvu22210@gmail.com', '123', '0123456789', 'nam định'),
(4, 'nguyen van a', 'anv@gmail.com', '1', '0123456789', 'ha noi'),
(6, 'vũ trung hiếu', 'trunghieuvu22102001aa@gmail.com', '123456', '+84943543690', 'nam định'),
(7, 'vũ trung hiếu', 'trunghieuvu22102001ccc@gmail.com', '123456', '0943543690', 'nam định'),
(8, 'nguyn van B', 'nvB@gmail.com', '654321', '0943543690', 'nam định,trai dat');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name_receiver` varchar(50) NOT NULL,
  `phone_receiver` char(20) NOT NULL,
  `address_receiver` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_money` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `status`, `created_at`, `total_money`) VALUES
(6, 2, 'vũ trung hiếu', '0123456789', 'nam định', 1, '2022-02-21 05:47:14', 5180000),
(7, 2, 'vũ trung hiếu', '0123456789', 'nam định', 1, '2022-02-18 08:36:13', 5180000),
(8, 2, 'hiếu vũ', '0987654321', 'ha noi', 1, '2022-02-24 05:47:19', 800000),
(9, 2, 'hieu123', '0123456789', 'nam định', 1, '2022-02-22 08:39:25', 1090000),
(13, 3, 'hieu hieu hiue', '0123456789', 'nam định', 0, '2022-02-23 08:17:36', 2180000),
(14, 3, 'hieu hieu hiue', '0123456789', 'giai phong,nam định', 2, '2022-02-24 08:19:27', 2800000),
(15, 3, 'hieu ', '0123456789', 'nam định', 1, '2022-02-23 06:37:38', 2180000),
(18, 2, 'vũ trung hiếu', '0123456789', 'nam định', 1, '2022-03-14 06:03:54', 4290000),
(20, 4, 'nguyen van a', '0123456789', 'ha noi', 1, '2022-03-14 06:17:02', 1800000);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`) VALUES
(6, 7, 1),
(6, 17, 1),
(7, 7, 1),
(7, 17, 1),
(8, 12, 1),
(9, 15, 1),
(13, 15, 2),
(14, 9, 1),
(15, 15, 2),
(18, 9, 1),
(18, 11, 1),
(20, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) NOT NULL,
  `img_3` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `price_sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `img`, `img_1`, `img_2`, `img_3`, `description`, `category_id`, `price`, `price_sale`) VALUES
(1, 'K100 RGB Mechanical Gaming Keyboard — CHERRY® MX  ', 'https://www.corsair.com/medias/sys_master/images/images/h1b/h75/9686908141598/CH-912A014-NA/Gallery/K100_RGB_01/-CH-912A014-NA-Gallery-K100-RGB-01.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/hdf/h03/9590575661086/CH-912A014-NA/Gallery/K100_RGB_02/-CH-912A014-NA-Gallery-K100-RGB-02.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/hd8/hcd/9590578413598/CH-912A014-NA/Gallery/K100_RGB_05/-CH-912A014-NA-Gallery-K100-RGB-05.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/h59/h51/9590576054302/CH-912A014-NA/Gallery/K100_RGB_06/-CH-912A014-NA-Gallery-K100-RGB-06.png_1200Wx1200H', '       The incomparable CORSAIR K100 RGB Mechanical Gaming Keyboard combines stunning aluminum design, per-key RGB lighting with powerful CORSAIR AXON Hyper-Processing Technology and CHERRY MX SPEED keyswitches      ', 1, 1000000, 900000),
(7, 'iCUE 4000D RGB AIRFLOW QL Edition Mid-Tower ATX Case — True White', 'https://www.corsair.com/medias/sys_master/images/images/h4d/hae/9884894625822/base-4000d-rgb-airflow-ql-config/Gallery/4000D_RGB_AIRFLOW_QL_01/-base-4000d-rgb-airflow-ql-config-Gallery-4000D-RGB-AIRFLOW-QL-01.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/h38/h36/9884887941150/base-4000d-rgb-airflow-ql-config/Gallery/4000D_RGB_AIRFLOW_QL_20/-base-4000d-rgb-airflow-ql-config-Gallery-4000D-RGB-AIRFLOW-QL-20.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/h1e/h0e/9884891480094/base-4000d-rgb-airflow-ql-config/Gallery/4000D_RGB_AIRFLOW_QL_22/-base-4000d-rgb-airflow-ql-config-Gallery-4000D-RGB-AIRFLOW-QL-22.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/hbd/hd3/9884893052958/base-4000d-rgb-airflow-ql-config/Gallery/4000D_RGB_AIRFLOW_QL_26/-base-4000d-rgb-airflow-ql-config-Gallery-4000D-RGB-AIRFLOW-QL-26.png_1200Wx1200H', '   The CORSAIR iCUE 4000D RGB AIRFLOW QL Edition Mid-Tower Case includes four pre-installed QL120 RGB fans and an iCUE Lighting Node CORE, in a stunning all-white 4000D AIRFLOW case. ', 16, 4200000, 3990000),
(8, 'Crystal Series 280X RGB Tempered Glass Micro ATX Case — Black', 'https://www.corsair.com/medias/sys_master/images/images/h20/h23/9112715329566/-CC-9011135-WW-Gallery-280X-RGB-BLK-01.png', 'https://www.corsair.com/medias/sys_master/images/images/h47/hbc/9112715395102/-CC-9011135-WW-Gallery-280X-RGB-BLK-02.png', 'https://www.corsair.com/medias/sys_master/images/images/h36/h40/9112715460638/-CC-9011135-WW-Gallery-280X-RGB-BLK-03.png', 'https://www.corsair.com/medias/sys_master/images/images/h16/hc9/9112705564702/-CC-9011135-WW-Gallery-280X-RGB-BLK-15.png', '   The CORSAIR Crystal Series 280X RGB is a high-performance Micro-ATX case with three beautiful tempered glass panels, iCUE software-controlled RGB lighting and an innovative dual-chamber internal layout for clean looks and cleaner builds. ', 16, 2990000, 2500000),
(9, 'Crystal Series 680X RGB ATX High Airflow Tempered Glass Smart Case — Black', 'https://www.corsair.com/medias/sys_master/images/images/h4b/hf0/9190818742302/-CC-9011168-WW-Gallery-680X-RGB-Black-01.png', 'https://www.corsair.com/medias/sys_master/images/images/h0f/h0a/9190822019102/-CC-9011168-WW-Gallery-680X-RGB-Black-22.png', 'https://www.corsair.com/medias/sys_master/images/images/h29/h83/9190821232670/-CC-9011168-WW-Gallery-680X-RGB-Black-24.png', 'https://www.corsair.com/medias/sys_master/images/images/hce/hd7/9190820446238/-CC-9011168-WW-Gallery-680X-RGB-Black-25.png', '   The CORSAIR Crystal Series 680X RGB is a dual-chamber tempered glass ATX smart case boasting superb airflow and brilliant software-controlled RGB fans to efficiently cool and illuminate the most demanding systems. ', 16, 2990000, 2800000),
(10, 'K70 RGB PRO Mechanical Gaming Keyboard with PBT DOUBLE SHOT PRO Keycaps — CHERRY® MX Blue (KR)', 'https://www.corsair.com/medias/sys_master/images/images/hd7/h15/9955051929630/CH-9109411-KR2/Gallery/K70_RGB_PRO_PBT_01/-CH-9109411-KR2-Gallery-K70-RGB-PRO-PBT-01.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/h87/he9/9966200291358/CH-9109411-KR2/Gallery/K70_RGB_PRO_PBT_02/-CH-9109411-KR2-Gallery-K70-RGB-PRO-PBT-02.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/hcc/hb5/9966186135582/CH-9109411-KR2/Gallery/K70_RGB_PRO_PBT_03/-CH-9109411-KR2-Gallery-K70-RGB-PRO-PBT-03.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/h0a/hdf/9966166474782/CH-9109411-KR2/Gallery/K70_RGB_PRO_PBT_04/-CH-9109411-KR2-Gallery-K70-RGB-PRO-PBT-04.png_1200Wx1200H', '  The CORSAIR K70 RGB PRO Mechanical Gaming Keyboard delivers an iconic aluminum frame and even better performance, powered by CORSAIR AXON Hyper-Processing Technology.', 1, 1990000, 1500000),
(11, 'STRAFE RGB MK.2 Mechanical Gaming Keyboard — CHERRY® MX Red', 'https://www.corsair.com/medias/sys_master/images/images/h31/h9c/9112643862558/-CH-9104110-NA-Gallery-Strafe-Mk2-RGB-10.png', 'https://www.corsair.com/medias/sys_master/images/images/h67/hbd/9112643928094/-CH-9104110-NA-Gallery-Strafe-Mk2-RGB-11.png', 'https://www.corsair.com/medias/sys_master/images/images/h9b/h3b/9112642879518/-CH-9104110-NA-Gallery-Strafe-Mk2-RGB-14.png', 'https://www.corsair.com/medias/sys_master/images/images/hd0/h05/9112643010590/-CH-9104110-NA-Gallery-Strafe-Mk2-RGB-03.png', '  The next-generation CORSAIR STRAFE RGB MK.2 mechanical keyboard features CHERRY® MX RGB keyswitches and 8MB onboard profile storage to take your gaming profiles with you.', 1, 1600000, 1490000),
(12, 'VIRTUOSO RGB WIRELESS High-Fidelity Gaming Headset — White', 'https://www.corsair.com/medias/sys_master/images/images/h99/h91/9312777469982/-CA-9011186-NA-Gallery-VIRTUOSO-WHITE-01.png', 'https://www.corsair.com/medias/sys_master/images/images/h88/haa/9312757055518/-CA-9011186-NA-Gallery-VIRTUOSO-WHITE-03.png', 'https://www.corsair.com/medias/sys_master/images/images/hfa/h28/9312761020446/-CA-9011186-NA-Gallery-VIRTUOSO-WHITE-11.png', 'https://www.corsair.com/medias/sys_master/images/images/h9c/h7f/9312773832734/-CA-9011186-NA-Gallery-VIRTUOSO-WHITE-15.png', '  The CORSAIR VIRTUOSO RGB Wireless delivers a high - fidelity audio experience, all - day comfort from its premium memory foam earpads, and hyper - fast connectivity with SLIPSTREAM WIRELESS technology.', 20, 990000, 800000),
(13, 'VIRTUOSO RGB WIRELESS SE High-Fidelity Gaming Headset — Gunmetal (EU)', 'https://www.corsair.com/medias/sys_master/images/images/ha1/h9b/9314787262494/-CA-9011180-EU-Gallery-VIRTUOSO-SE-01.png', 'https://www.corsair.com/medias/sys_master/images/images/h56/h58/9314779299870/-CA-9011180-EU-Gallery-VIRTUOSO-SE-03.png', 'https://www.corsair.com/medias/sys_master/images/images/h8e/hed/9314802073630/-CA-9011180-EU-Gallery-VIRTUOSO-SE-11.png', 'https://www.corsair.com/medias/sys_master/images/images/h3a/h40/9314810331166/-CA-9011180-EU-Gallery-VIRTUOSO-SE-15.png', '  The CORSAIR VIRTUOSO RGB Wireless SE delivers a high-fidelity audio experience, all-day comfort from its premium memory foam earpads, and hyper-fast connectivity with SLIPSTREAM WIRELESS technology.', 20, 800000, 790000),
(14, 'VOID RGB ELITE Wireless Premium Gaming Headset with 7.1 Surround Sound — Carbon', 'https://www.corsair.com/medias/sys_master/images/images/hae/h3b/9325692452894/-CA-9011201-NA-Gallery-VOID-RGB-ELITE-WIRELESS-CARBON-01.png', 'https://www.corsair.com/medias/sys_master/images/images/hf9/h4e/9325662994462/-CA-9011201-NA-Gallery-VOID-RGB-ELITE-WIRELESS-CARBON-07.png', 'https://www.corsair.com/medias/sys_master/images/images/ha9/h7f/9325874184222/-CA-9011201-NA-Gallery-VOID-RGB-ELITE-WIRELESS-CARBON-12.png', 'https://www.corsair.com/medias/sys_master/images/images/h2b/h6a/9325664665630/-CA-9011201-NA-Gallery-VOID-RGB-ELITE-WIRELESS-CARBON-13.png', '  Immerse yourself in the action with the CORSAIR VOID RGB ELITE Wireless, boasting custom-tuned 50mm neodymium audio drivers, comfortable microfiber mesh fabric with memory foam earpads, and a 2.4GHz wireless connection.', 20, 1100000, 1000000),
(15, 'CORSAIR XENEON 32QHD165 Gaming Monitor', 'https://www.corsair.com/medias/sys_master/images/images/h3f/h3f/9873543200798/CM-9020001-AU/Gallery/XENEON_32QHD165_Gaming_Monitor_RENDER_01/-CM-9020001-AU-Gallery-XENEON-32QHD165-Gaming-Monitor-RENDER-01.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/h6e/h85/9873538088990/CM-9020001-AU/Gallery/XENEON_32QHD165_Gaming_Monitor_RENDER_06/-CM-9020001-AU-Gallery-XENEON-32QHD165-Gaming-Monitor-RENDER-06.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/h34/h92/9870456324126/CM-9020001-AU/Gallery/XENEON_32QHD165_Gaming_Monitor_RENDER_04/-CM-9020001-AU-Gallery-XENEON-32QHD165-Gaming-Monitor-RENDER-04.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/h01/h94/9873541234718/CM-9020001-AU/Gallery/XENEON_32QHD165_Gaming_Monitor_RENDER_09/-CM-9020001-AU-Gallery-XENEON-32QHD165-Gaming-Monitor-RENDER-09.png_1200Wx1200H', '  The CORSAIR XENEON brings your games and media to life on a vibrant, ultra-slim 32-inch IPS QHD (2560 x1440) display with a blazing fast refresh rate up to 165Hz and 1ms response time.', 22, 1200000, 1090000),
(16, 'M65 RGB ULTRA WIRELESS Tunable FPS Gaming Mouse (AP)', 'https://www.corsair.com/medias/sys_master/images/images/he6/h14/9877849866270/base-m65-rgb-ultra-wireless-config/Gallery/M65_RGB_ULTRA_WIRELESS_01/-base-m65-rgb-ultra-wireless-config-Gallery-M65-RGB-ULTRA-WIRELESS-01.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/h0c/hff/9877847113758/base-m65-rgb-ultra-wireless-config/Gallery/M65_RGB_ULTRA_WIRELESS_12/-base-m65-rgb-ultra-wireless-config-Gallery-M65-RGB-ULTRA-WIRELESS-12.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/hd5/h21/9877840363550/base-m65-rgb-ultra-wireless-config/Gallery/M65_RGB_ULTRA_WIRELESS_13/-base-m65-rgb-ultra-wireless-config-Gallery-M65-RGB-ULTRA-WIRELESS-13.png_1200Wx1200H', 'https://www.corsair.com/medias/sys_master/images/images/hc5/hf5/9877842395166/base-m65-rgb-ultra-wireless-config/Gallery/M65_RGB_ULTRA_WIRELESS_14/-base-m65-rgb-ultra-wireless-config-Gallery-M65-RGB-ULTRA-WIRELESS-14.png_1200Wx1200H', '  Make all your clicks count with the CORSAIR M65 RGB ULTRA WIRELESS Tunable Gaming Mouse, boasting a durable aluminum frame, hyper-fast SLIPSTREAM WIRELESS, and a 26,000 DPI MARKSMAN optical sensor.', 23, 1100000, 990000),
(17, 'HARPOON RGB PRO FPS/MOBA Gaming Mouse', 'https://www.corsair.com/medias/sys_master/images/images/h4e/he0/9211674853406/-CH-9301111-NA-Gallery-Harpoon-RGB-PRO-01.png', 'https://www.corsair.com/medias/sys_master/images/images/hc4/hab/9211673804830/-CH-9301111-NA-Gallery-Harpoon-RGB-PRO-11.png', 'https://www.corsair.com/medias/sys_master/images/images/h03/h35/9211676819486/-CH-9301111-NA-Gallery-Harpoon-RGB-PRO-12.png', 'https://www.corsair.com/medias/sys_master/images/images/ha6/hb9/9211675574302/-CH-9301111-NA-Gallery-Harpoon-RGB-PRO-13.png', '  The CORSAIR HARPOON RGB PRO gaming mouse sports a comfortable contoured shape, a 12,000 dpi sensor, and weighs an incredibly light 85g for endless hours of effortless gaming.', 23, 1200000, 1190000),
(18, 'SCIMITAR RGB ELITE Optical MOBA/MMO Gaming Mouse', 'https://www.corsair.com/medias/sys_master/images/images/h1c/h8a/9442445295646/-CH-9304211-NA-Gallery-Scimitar-ELITE-BLK-01.png', 'https://www.corsair.com/medias/sys_master/images/images/hb1/hb7/9442442149918/-CH-9304211-NA-Gallery-Scimitar-ELITE-BLK-16.png', 'https://www.corsair.com/medias/sys_master/images/images/hc3/hde/9442416853022/-CH-9304211-NA-Gallery-Scimitar-ELITE-BLK-17.png', 'https://www.corsair.com/medias/sys_master/images/images/h89/hb2/9442414493726/-CH-9304211-NA-Gallery-Scimitar-ELITE-BLK-18.png', 'The SCIMITAR RGB ELITE levels up your gameplay with 17 fully programmable buttons, a patented Key Slider™ control system, and an 18,000 DPI optical sensor.', 23, 1300000, 1190000),
(19, 'T3 RUSH Gaming Chair — Gray/White', 'https://www.corsair.com/medias/sys_master/images/images/h37/h5e/9397515157534/-CF-9010030-WW-Gallery-CORSAIR-T3-RUSH-GREY-WHITE-01.png', 'https://www.corsair.com/medias/sys_master/images/images/h67/h7c/9397511618590/-CF-9010030-WW-Gallery-CORSAIR-T3-RUSH-GREY-WHITE-02.png', 'https://www.corsair.com/medias/sys_master/images/images/hc0/hcf/9398242344990/-CF-9010030-WW-Gallery-CORSAIR-T3-RUSH-GREY-WHITE-03.png', 'https://www.corsair.com/medias/sys_master/images/images/hfc/h85/9398240378910/-CF-9010030-WW-Gallery-CORSAIR-T3-RUSH-GREY-WHITE-04.png', '  The CORSAIR T3 RUSH gaming chair combines racing-inspired design and contoured comfort, with a breathable soft cloth exterior, padded neck cushion and memory foam lumbar support.', 24, 6990000, 6500000),
(20, 'T2 ROAD WARRIOR Gaming Chair — Black/Red', 'https://www.corsair.com/medias/sys_master/images/images/hf9/h8a/9112039161886/-CF-9010008-WW-Gallery-Gallery-1.png', 'https://www.corsair.com/medias/sys_master/images/images/h0f/ha1/9112040407070/-CF-9010008-WW-Gallery-Gallery-3.png', 'https://www.corsair.com/medias/sys_master/images/images/h96/h2a/9112040800286/-CF-9010008-WW-Gallery-Gallery-4.png', 'https://www.corsair.com/medias/sys_master/images/images/h65/h9b/9112036016158/-CF-9010008-WW-Gallery-Gallery-10.png', '  The CORSAIR T2 ROAD WARRIOR features a wide seat, tall back, and two-layer custom color accents, giving you the style, comfort and endurance you need for long-haul gaming sessions.', 24, 7000000, 6890000),
(21, 'T1 RACE 2018 Gaming Chair — Black/Yellow', 'https://www.corsair.com/medias/sys_master/images/images/hf5/he5/9112025759774/-CF-9010015-WW-Gallery-T1-Chair-2018-01-YLO.png', 'https://www.corsair.com/medias/sys_master/images/images/h83/h5c/9112024711198/-CF-9010015-WW-Gallery-T1-Chair-2018-03-YLO.png', 'https://www.corsair.com/medias/sys_master/images/images/h52/hcd/9112024645662/-CF-9010015-WW-Gallery-T1-Chair-2018-04-YLO.png', 'https://www.corsair.com/medias/sys_master/images/images/h36/h4e/9112024055838/-CF-9010015-WW-Gallery-T1-Chair-2018-06-YLO.png', '  The CORSAIR T1 RACE 2018 chair features a wide seat, tall back, and two-layer custom color accents, giving you the style, comfort and endurance you need for long-haul gaming sessions.', 24, 7000000, 6800000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
