-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 01:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webphim`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `position`) VALUES
(3, 'Phim mới', 'update', 1, 'phim-moi', 0),
(4, 'Phim lẻ', 'update', 1, 'phim-le', 3),
(7, 'Phim hot', 'update', 1, 'phim-hot', 1),
(12, 'Phim bộ', 'Phim bộ', 1, 'phim-bo', 4),
(13, 'Phim thuyết minh', 'Phim thuyết minh', 0, 'phim-thuyet-minh', 2);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(3, 'Việt Nam', 'Toàn phim hay', 1, 'viet-nam'),
(4, 'Nhật Bản', 'Hại thận lắm', 1, 'nhat-ban'),
(5, 'Hàn Quốc', 'Xem đi rồi mà khóc', 1, 'han-quoc');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `link_phim` varchar(255) NOT NULL,
  `episode` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(2, 'Hành động', 'gay cấn', 1, 'hanh-dong'),
(3, 'Tâm lý tình cảm', 'tâm lý', 1, 'tam-ly-tinh-cam'),
(4, 'Hài', 'hài hước', 1, 'hai'),
(5, 'Xã hội đen', 'ghê lắm', 1, 'xa-hoi-den');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tags` longtext NOT NULL,
  `thoiluong` varchar(50) DEFAULT NULL,
  `eng_name` varchar(255) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `phude` int(11) NOT NULL DEFAULT 0,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `phim_hot` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `ngaytao` varchar(50) DEFAULT NULL,
  `ngaycapnhat` varchar(50) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `season` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `tags`, `thoiluong`, `eng_name`, `resolution`, `phude`, `description`, `status`, `image`, `category_id`, `country_id`, `genre_id`, `phim_hot`, `slug`, `ngaytao`, `ngaycapnhat`, `year`, `topview`, `season`) VALUES
(4, 'Moon Knight', '', NULL, '0', 0, 1, 'Moon Knight', 1, 'zQSABH2Dza4mXLow2f0V2IQvJOL7817.jpg', 3, 3, 2, 0, 'moon-knight', NULL, NULL, NULL, NULL, 0),
(6, 'The Batman', 'Batman: Kỵ Sĩ Bóng Đêm phimmoi.net, Batman: Kỵ Sĩ Bóng Đêm full hd vietsub, xem phim Batman: Kỵ Sĩ Bóng Đêm,phim The Dark Knight vietsub,Batman: Kỵ Sĩ Bóng Đêm bilutv,bilutvzz,Batman: Kỵ Sĩ Bóng Đêm phimmoi,phimmoizz,zphimmoi,phimmoii,phimmoiizz,Batman: Kỵ Sĩ Bóng Đêm motphim,Batman: Kỵ Sĩ Bóng Đêm bphimmoi,mphimmoivn,ephimmoi,phimbathu,Batman: Kỵ Sĩ Bóng Đêm khoaitv, bongngo,The Dark Knight xemphimplus,zingtv, hdonline, phim3s, xemphimgi, banhtv, Batman: Kỵ Sĩ Bóng Đêm dongphim,dongphym,vtv16, vuviphim, 247phim, vtvgiaitri,Batman: Kỵ Sĩ Bóng Đêm youtube,phimnhanh,tvhay,vphim,Batman: Kỵ Sĩ Bóng Đêm netflix,Batman: Kỵ Sĩ Bóng Đêm fullphim,ssphim,phimgi,phechill,subnhanhtv,Batman: Kỵ Sĩ Bóng Đêm motchill,bichill,fim1080,phim1080,luotphim,bongngovip,tvhai,Batman: Kỵ Sĩ Bóng Đêm phimmoiplus,Batman: Kỵ Sĩ Bóng Đêm cam,Batman: Kỵ Sĩ Bóng Đêm thuyết minh,Batman: Kỵ Sĩ Bóng Đêm phụ đề,Batman: Kỵ Sĩ Bóng Đêm lồng tiếng,tải phim Batman: Kỵ Sĩ Bóng Đêm,review Batman: Kỵ Sĩ Bóng Đêm The Dark Knight', NULL, '0', 0, 1, 'The Batman', 1, '74xTEgt7R36Fpooo50r9T25onhq1823.jpg', 3, 3, 2, 0, 'the-batman', NULL, '2022-05-10 14:39:10', NULL, NULL, 0),
(7, 'The Bad Guys', '', NULL, '0', 0, 1, 'The Bad Guys xoay quanh một nhóm động vật sống ngoài vòng pháp luật bao gồm đầu sỏ Sói xấu xa cùng các đồng đội: cô Nhện, anh Cá Mập, anh Cá Hổ và anh Rắn. Trong quá khứ, năm người này là những tên tội phạm “máu mặt” chuyên thực hiện những vụ trộm cắp trong thành phố. Tuy nhiên, nhiệm vụ mới họ thực hiện lần này sẽ khác hoàn toàn các lần trước, một thử thách được cho là “không tưởng”, đó chính là: cải tà quy chính - trở thành “công dân kiểu mẫu”.', 1, '7qop80YfuO0BwJa1uXk1DXUUEwv6524.jpg', 7, 3, 2, 0, 'the-bad-guys', NULL, NULL, NULL, NULL, 0),
(8, 'Monstrous', '', NULL, '0', 0, 1, 'Monstrous', 1, 'hqtp6EnL41A5aBtIAVOUFGthT8L3942.jpg', 7, 3, 2, 0, 'monstrous', NULL, NULL, NULL, NULL, 0),
(9, 'Doctor Strange', '', NULL, '0', 0, 1, 'Doctor Strange', 1, 'uGBVj3bEbCoZbDjjl9wTxcygko16265.jpg', 7, 3, 2, 0, 'doctor-strange', NULL, NULL, NULL, NULL, 0),
(10, 'Extreme Job', '', NULL, '0', 0, 1, 'Bộ phim có doanh thu phòng vé cao thứ 2 mọi thời đại ở Hàn Quốc, chỉ sau \"Parasite - Ký Sinh Trùng\". Đồng thời là phim hài có số lượng vé bán ra cao nhất trong lịch sử xứ Kim chi. Kỷ lục trước đó được xác lập bởi bộ phim \"Miracle in Cell No. 7 - Điều Kỳ Diệu Ở Phòng Giam Số 7\".\r\n\r\nNội dung phim xoay quanh câu chuyện nhóm điều tra do đội trưởng Ko (Ryu Seung-yong) lãnh đạo đứng trước nguy cơ giải tán nhờ chuỗi “thành tích” thất bại đáng nể. Cơ hội cuối cùng để cứu vớt sự nghiệp của họ chính là phải triệt phá một băng đảng buôn bán ma tuý tầm cỡ quốc tế. Để làm được điều đó, đội trưởng Ko và các thành viên trong nhóm đã cải trang thành những nhân viên bán gà tại một quán ăn ngay đối diện hang ổ của kẻ địch. Trớ trêu thay, món gà rán của họ quá ngon và nhà hàng bỗng chốc nổi như cồn, căn cứ địa có nguy cơ bại lộ khiến 5 cảnh sát chìm rơi vào những nguy hiểm khó lường.', 1, '52oLgq2gEiZyDjpJ7tgkGruoQI03021.jpg', 7, 3, 2, 0, 'extreme-job', NULL, NULL, NULL, NULL, 0),
(11, 'The Bad Guys', '', NULL, '0', 0, 1, 'The Bad Guys xoay quanh một nhóm động vật sống ngoài vòng pháp luật bao gồm đầu sỏ Sói xấu xa cùng các đồng đội: cô Nhện, anh Cá Mập, anh Cá Hổ và anh Rắn. Trong quá khứ, năm người này là những tên tội phạm “máu mặt” chuyên thực hiện những vụ trộm cắp trong thành phố. Tuy nhiên, nhiệm vụ mới họ thực hiện lần này sẽ khác hoàn toàn các lần trước, một thử thách được cho là “không tưởng”, đó chính là: cải tà quy chính - trở thành “công dân kiểu mẫu”.', 1, '7qop80YfuO0BwJa1uXk1DXUUEwv6524.jpg', 7, 3, 2, 0, 'the-bad-guys', NULL, NULL, NULL, NULL, 0),
(12, 'Monstrous', '', NULL, '0', 0, 1, 'Monstrous', 1, 'hqtp6EnL41A5aBtIAVOUFGthT8L3942.jpg', 7, 3, 2, 0, 'monstrous', NULL, NULL, NULL, NULL, 0),
(13, 'Doctor Strange', '', NULL, '0', 0, 1, 'Doctor Strange', 1, 'uGBVj3bEbCoZbDjjl9wTxcygko16265.jpg', 7, 3, 2, 0, 'doctor-strange', NULL, NULL, NULL, NULL, 0),
(14, 'Extreme Job', '', NULL, '0', 0, 1, 'Bộ phim có doanh thu phòng vé cao thứ 2 mọi thời đại ở Hàn Quốc, chỉ sau \"Parasite - Ký Sinh Trùng\". Đồng thời là phim hài có số lượng vé bán ra cao nhất trong lịch sử xứ Kim chi. Kỷ lục trước đó được xác lập bởi bộ phim \"Miracle in Cell No. 7 - Điều Kỳ Diệu Ở Phòng Giam Số 7\".\r\n\r\nNội dung phim xoay quanh câu chuyện nhóm điều tra do đội trưởng Ko (Ryu Seung-yong) lãnh đạo đứng trước nguy cơ giải tán nhờ chuỗi “thành tích” thất bại đáng nể. Cơ hội cuối cùng để cứu vớt sự nghiệp của họ chính là phải triệt phá một băng đảng buôn bán ma tuý tầm cỡ quốc tế. Để làm được điều đó, đội trưởng Ko và các thành viên trong nhóm đã cải trang thành những nhân viên bán gà tại một quán ăn ngay đối diện hang ổ của kẻ địch. Trớ trêu thay, món gà rán của họ quá ngon và nhà hàng bỗng chốc nổi như cồn, căn cứ địa có nguy cơ bại lộ khiến 5 cảnh sát chìm rơi vào những nguy hiểm khó lường.', 1, '52oLgq2gEiZyDjpJ7tgkGruoQI03021.jpg', 7, 3, 2, 0, 'extreme-job', NULL, NULL, NULL, NULL, 0),
(15, 'The Bad Guys', '', NULL, '0', 0, 0, 'The Bad Guys xoay quanh một nhóm động vật sống ngoài vòng pháp luật bao gồm đầu sỏ Sói xấu xa cùng các đồng đội: cô Nhện, anh Cá Mập, anh Cá Hổ và anh Rắn. Trong quá khứ, năm người này là những tên tội phạm “máu mặt” chuyên thực hiện những vụ trộm cắp trong thành phố. Tuy nhiên, nhiệm vụ mới họ thực hiện lần này sẽ khác hoàn toàn các lần trước, một thử thách được cho là “không tưởng”, đó chính là: cải tà quy chính - trở thành “công dân kiểu mẫu”.', 1, '7qop80YfuO0BwJa1uXk1DXUUEwv6524.jpg', 7, 3, 2, 0, 'the-bad-guys', NULL, NULL, NULL, NULL, 0),
(16, 'Monstrous', '', NULL, '0', 0, 0, 'Monstrous', 1, 'hqtp6EnL41A5aBtIAVOUFGthT8L3942.jpg', 7, 3, 2, 0, 'monstrous', NULL, NULL, NULL, NULL, 0),
(17, 'Doctor Strange', '', NULL, '0', 0, 0, 'Doctor Strange', 1, 'uGBVj3bEbCoZbDjjl9wTxcygko16265.jpg', 7, 3, 2, 0, 'doctor-strange', NULL, NULL, NULL, NULL, 0),
(18, 'Extreme Job', '', NULL, '0', 0, 0, 'Bộ phim có doanh thu phòng vé cao thứ 2 mọi thời đại ở Hàn Quốc, chỉ sau \"Parasite - Ký Sinh Trùng\". Đồng thời là phim hài có số lượng vé bán ra cao nhất trong lịch sử xứ Kim chi. Kỷ lục trước đó được xác lập bởi bộ phim \"Miracle in Cell No. 7 - Điều Kỳ Diệu Ở Phòng Giam Số 7\".\r\n\r\nNội dung phim xoay quanh câu chuyện nhóm điều tra do đội trưởng Ko (Ryu Seung-yong) lãnh đạo đứng trước nguy cơ giải tán nhờ chuỗi “thành tích” thất bại đáng nể. Cơ hội cuối cùng để cứu vớt sự nghiệp của họ chính là phải triệt phá một băng đảng buôn bán ma tuý tầm cỡ quốc tế. Để làm được điều đó, đội trưởng Ko và các thành viên trong nhóm đã cải trang thành những nhân viên bán gà tại một quán ăn ngay đối diện hang ổ của kẻ địch. Trớ trêu thay, món gà rán của họ quá ngon và nhà hàng bỗng chốc nổi như cồn, căn cứ địa có nguy cơ bại lộ khiến 5 cảnh sát chìm rơi vào những nguy hiểm khó lường.', 1, '52oLgq2gEiZyDjpJ7tgkGruoQI03021.jpg', 7, 3, 2, 0, 'extreme-job', NULL, NULL, NULL, 2, 0),
(19, 'The Bad Guys', '', NULL, '0', 0, 0, 'The Bad Guys xoay quanh một nhóm động vật sống ngoài vòng pháp luật bao gồm đầu sỏ Sói xấu xa cùng các đồng đội: cô Nhện, anh Cá Mập, anh Cá Hổ và anh Rắn. Trong quá khứ, năm người này là những tên tội phạm “máu mặt” chuyên thực hiện những vụ trộm cắp trong thành phố. Tuy nhiên, nhiệm vụ mới họ thực hiện lần này sẽ khác hoàn toàn các lần trước, một thử thách được cho là “không tưởng”, đó chính là: cải tà quy chính - trở thành “công dân kiểu mẫu”.', 1, '7qop80YfuO0BwJa1uXk1DXUUEwv6524.jpg', 7, 3, 2, 0, 'the-bad-guys', NULL, NULL, NULL, 2, 0),
(21, 'Doctor Strange 123', '', NULL, '0', 0, 1, 'Doctor Strange', 1, 'uGBVj3bEbCoZbDjjl9wTxcygko16265.jpg', 7, 3, 2, 1, 'doctor-strange', NULL, NULL, NULL, 2, 0),
(22, 'Extreme Job 456', '', NULL, '0', 0, 0, 'Bộ phim có doanh thu phòng vé cao thứ 2 mọi thời đại ở Hàn Quốc, chỉ sau \"Parasite - Ký Sinh Trùng\". Đồng thời là phim hài có số lượng vé bán ra cao nhất trong lịch sử xứ Kim chi. Kỷ lục trước đó được xác lập bởi bộ phim \"Miracle in Cell No. 7 - Điều Kỳ Diệu Ở Phòng Giam Số 7\".\r\n\r\nNội dung phim xoay quanh câu chuyện nhóm điều tra do đội trưởng Ko (Ryu Seung-yong) lãnh đạo đứng trước nguy cơ giải tán nhờ chuỗi “thành tích” thất bại đáng nể. Cơ hội cuối cùng để cứu vớt sự nghiệp của họ chính là phải triệt phá một băng đảng buôn bán ma tuý tầm cỡ quốc tế. Để làm được điều đó, đội trưởng Ko và các thành viên trong nhóm đã cải trang thành những nhân viên bán gà tại một quán ăn ngay đối diện hang ổ của kẻ địch. Trớ trêu thay, món gà rán của họ quá ngon và nhà hàng bỗng chốc nổi như cồn, căn cứ địa có nguy cơ bại lộ khiến 5 cảnh sát chìm rơi vào những nguy hiểm khó lường.', 1, '52oLgq2gEiZyDjpJ7tgkGruoQI03021.jpg', 7, 3, 2, 1, 'extreme-job', NULL, NULL, NULL, 2, 0),
(23, 'Fortress: Sniper\'s Eye', '', NULL, '0', 0, 0, 'Fortress: Sniper\'s Eye', 1, '61J34xHVVdQHbJ4MSCWQo4e727v4889.jpg', 3, 3, 2, 0, 'fortress-snipers-eye', NULL, NULL, NULL, 2, 0),
(24, 'Secrets in the Hot Spring', '', NULL, '0', 0, 0, 'Secrets in the Hot Spring', 1, 'nnzcWhBYpF6RAepGlcjp0LR8zLs7904.jpg', 3, 3, 2, 0, 'secrets-in-the-hot-spring', NULL, NULL, NULL, 2, 0),
(25, 'American Underdog', '', NULL, '0', 0, 0, 'American Underdog', 1, 'u3iXpvLPG4DbmuNY9yPjn1Ei54279.jpg', 4, 3, 2, 0, 'american-underdog', NULL, NULL, NULL, 0, 0),
(26, 'Till We Meet Again', '', NULL, '0', 0, 0, 'Till We Meet Again', 1, 'heWQxesmAiUmsbyz2p4RJm3tEgt9622.jpg', 4, 3, 2, 0, 'till-we-meet-again', NULL, NULL, NULL, 0, 0),
(27, 'Qinling Mountains', '', NULL, '0', 0, 0, 'Qinling Mountains', 1, 'qNOza32GNEMyvsqBJHx1cSMBnS59785.jpg', 4, 3, 2, 0, 'qinling-mountains', NULL, NULL, NULL, 0, 0),
(28, 'Constantine: The House of Mystery', '', NULL, '0', 0, 0, 'Constantine: The House of Mystery', 1, 'kqYDoEb9PxLXM2ccoHInMMJalti7347.jpg', 3, 3, 2, 0, 'constantine-the-house-of-mystery', NULL, NULL, NULL, NULL, 0),
(29, 'Again My Life', '', NULL, '0', 0, 0, 'Again My Life', 1, '6QDWvFl9eScywwF8eUvhVZBleb18805.jpg', 12, 3, 2, 1, 'again-my-life', NULL, NULL, NULL, 0, 0),
(30, 'Our Blues', '', NULL, '0', 0, 0, 'Our Blues', 1, 'sT5Mlt5UmKiGfBisccwmD4LnPRD3141.jpg', 12, 3, 2, 0, 'our-blues', NULL, NULL, NULL, 1, 0),
(31, 'My Liberation Notes', '', '50 phút/tập', '0', 3, 1, 'My Liberation Notes', 1, 'olmfFeKZyQoTwj9Zo3Y5IUaioPB1586.jpg', 12, 3, 2, 0, 'my-liberation-notes', NULL, '2022-05-10 11:45:14', '2019', 1, 0),
(32, 'Halo', 'Hào Quang phimmoi.net, Hào Quang full hd vietsub, xem phim Hào Quang,phim Halo vietsub,Hào Quang bilutv,bilutvzz,Hào Quang phimmoi,phimmoizz,zphimmoi,phimmoii,phimmoiizz,Hào Quang motphim,Hào Quang bphimmoi,mphimmoivn,ephimmoi,phimbathu,Hào Quang khoaitv, bongngo,Halo xemphimplus,zingtv, hdonline, phim3s, xemphimgi, banhtv, Hào Quang dongphim,dongphym,vtv16, vuviphim, 247phim, vtvgiaitri,Hào Quang youtube,phimnhanh,tvhay,vphim,Hào Quang netflix,Hào Quang fullphim,ssphim,phimgi,phechill,subnhanhtv,Hào Quang motchill,bichill,fim1080,phim1080,luotphim,bongngovip,tvhai,Hào Quang phimmoiplus,Hào Quang cam,Hào Quang thuyết minh,Hào Quang phụ đề,Hào Quang lồng tiếng,tải phim Hào Quang,review Hào Quang Halo', '150 phút', '0', 0, 0, 'Halo', 1, 'nJUHX3XL1jMkk8honUZnUmudFb97608.jpg', 12, 3, 2, 1, 'halo', NULL, '2022-05-10 14:38:06', '2019', 1, 15),
(33, 'Bố già', 'hailongdev,motphim,phim never die,Hào Quang bphimmoi', '120 phút', 'God Father', 4, 0, 'Phim này nếu bạn là đàn ông thì nên xem nhé okok', 1, 'MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@7382.jpg', 7, 3, 5, 1, 'bo-gia', '2022-05-09 17:34:37', '2022-05-10 15:08:52', '1', 1, 0),
(34, 'Atlantis', 'hailongdev,motphim,phim never die', '120 phút', 'Atlantis', 2, 1, 'Atlantis', 1, '8dtC60nTU9h8L71QtPYpkMuO0C7916.jpg', 3, 3, 2, 1, 'atlantis', NULL, '2022-05-10 17:14:10', '2019', 1, 2),
(35, 'long-long-4-Một băng đảng khét tiếng xuất hiện ở Birmingham, Anh Quốc năm 1919. Cầm đầu băng là Tommy Shelby, tên trùm tội phạm khét tiếng muốn nổi lên bằng mọi giá.', 'Bóng ma anh quốc', '60 phút/tập', 'Peaky Blinders', 4, 0, 'Một băng đảng khét tiếng xuất hiện ở Birmingham, Anh Quốc năm 1919. Cầm đầu băng là Tommy Shelby, tên trùm tội phạm khét tiếng muốn nổi lên bằng mọi giá.', 1, 'vUUqzWa2LnHIVqkaKVlVGkVcZIW7005.jpg', 3, 3, 2, 1, 'bong-ma-anh-quoc', '2022-05-13 14:59:06', '2022-05-13 14:59:06', '2022', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Long Đoàn', 'hailongsport@gmail.com', NULL, '$2y$10$F2aAB7GUffeLygKAS9Ko9easZ98ttaXTez46CiXqJCVb5K6sjjNRe', NULL, '2022-04-26 00:12:42', '2022-04-26 00:12:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;