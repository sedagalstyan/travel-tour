-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 20, 2022 at 11:09 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traveltour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `surname`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Seda', 'Galstyan', 'sedagalstyan', 'sedagalstyann@gmail.com', '$2y$10$4JgXxiSvCfepqekkkGLLqOnUzx3GO9UiqTleAIWsFJsW7zdaO.vwe', NULL, '2022-05-17 07:07:34', '2022-05-17 07:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(255) NOT NULL,
  `title_hy` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_title_en_unique` (`title_en`),
  UNIQUE KEY `categories_title_hy_unique` (`title_hy`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title_en`, `title_hy`, `slug`) VALUES
(1, 'Adventure', 'Արկածային', 'adventure'),
(2, 'Wildlife', 'Վայրի բնության', 'wildlife'),
(3, 'Cultural', 'Մշակութային', 'cultural'),
(4, 'Cruise', 'Նավային', 'cruise'),
(5, 'Eco', 'Էկո', 'eco'),
(6, 'Family', 'Ընտանեկան', 'family'),
(7, 'Seasonal', 'Սեզոնային', 'seasonal');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

DROP TABLE IF EXISTS `destinations`;
CREATE TABLE IF NOT EXISTS `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(255) NOT NULL,
  `title_hy` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `destinations_title_en_unique` (`title_en`),
  UNIQUE KEY `destinations_title_hy_unique` (`title_hy`),
  UNIQUE KEY `destinations_slug_unique` (`slug`),
  UNIQUE KEY `destinations_img_unique` (`img`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `title_en`, `title_hy`, `slug`, `img`) VALUES
(1, 'North America', 'Հյուսիսային Ամերիկա', 'north-america', 'destination-1.jpg'),
(2, 'South America', 'Հարավային Ամերիկա', 'south-america', 'destination-2.jpg'),
(3, 'Europe', 'Եվրոպա', 'europe', 'destination-3.jpg'),
(4, 'Asia', 'Ասիա', 'asia', 'destination-4.jpg'),
(5, 'Australia', 'Ավստրալիա', 'australia', 'destination-5.png'),
(6, 'Africa', 'Աֆրիկա', 'africa', 'destination-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_04_144019_create_categories_table', 1),
(6, '2022_05_04_144151_create_destinations_table', 1),
(7, '2022_05_09_212645_create_pages_titles_table', 1),
(8, '2022_05_17_030751_create_admins_table', 1),
(9, '2022_05_20_005105_create_orders_table', 1),
(10, '2022_06_05_203205_create_tours_table', 1),
(11, '2022_06_06_080045_create_reviews_table', 1),
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(31, '2022_05_04_144019_create_categories_table', 1),
(32, '2022_05_04_144151_create_destinations_table', 1),
(33, '2022_05_09_212645_create_pages_titles_table', 1),
(34, '2022_05_17_030751_create_admins_table', 1),
(35, '2022_05_20_005105_create_orders_table', 1),
(36, '2022_05_20_005234_create_comments_table', 1),
(37, '2022_05_04_142400_create_tours_table', 2),
(38, '2022_06_08_034105_create_page_metas_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages_titles`
--

DROP TABLE IF EXISTS `pages_titles`;
CREATE TABLE IF NOT EXISTS `pages_titles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` text NOT NULL,
  `title_hy` text NOT NULL,
  `page` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages_titles`
--

INSERT INTO `pages_titles` (`id`, `title_en`, `title_hy`, `page`) VALUES
(1, 'Travel Tour', 'Թրեվլ տուր', 'home'),
(2, 'Destinations', 'Ուղղություններ', 'destinations'),
(3, 'Tours', 'Տուրեր', 'tours'),
(4, 'Login', 'Մուտք', 'login'),
(5, 'Sign Up', 'Գրանցվել', 'signup'),
(6, 'Verification', 'Նույնականացում', 'verification'),
(7, 'Profile', 'Պրոֆիլ', 'profile'),
(8, 'Contact', 'Հետադարձ կապ', 'contact'),
(9, 'Admin', 'Ադմին\r\n', 'admin'),
(10, 'Edit', 'Խմբագրել', 'edit'),
(11, 'Add user', 'Ավելացնել օգտատեր', 'add-user'),
(12, 'Pages Titles', 'Էջերի վերնագրեր', 'pages-titles'),
(13, 'Add page title', 'Ավելացնել էջի վերնագիր', 'add-pagetitle\r\n'),
(14, 'About us', 'Մեր մասին', 'about-us'),
(15, 'Search Tours', 'Որոնել տուրեր', 'search-tours'),
(16, 'Categories', 'Կատեգորիաներ', 'categories'),
(17, 'Add category', 'Ավելացնել կատեգորիա', 'add-category'),
(18, 'Add destination', 'Ավելացնել ուղղություն', 'add-destination'),
(19, 'Add Tour', 'Ավելացնել շրջագայություն', 'add-tour');

-- --------------------------------------------------------

--
-- Table structure for table `page_metas`
--

DROP TABLE IF EXISTS `page_metas`;
CREATE TABLE IF NOT EXISTS `page_metas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `page` varchar(255) NOT NULL,
  `keyword_en` varchar(255) NOT NULL,
  `keyword_hy` varchar(255) NOT NULL,
  `descr_en` varchar(255) NOT NULL,
  `descr_hy` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_metas_page_unique` (`page`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_metas`
--

INSERT INTO `page_metas` (`id`, `page`, `keyword_en`, `keyword_hy`, `descr_en`, `descr_hy`, `created_at`, `updated_at`) VALUES
(1, 'home', 'travel tour agency, tours from yerevan, travel tour packages europe, travel tour thailand package, tours to europe from armenia, tour agency yerevan', 'տուր դեպի դուբայ, տուրեր դեպի եվրոպա, արտագնա տուրեր հայաստանից, տուր փաթեթներ, Տուրեր աշխարհի բոլոր ուղղություններով', 'Travel Tour is an outbound travel agency located in the center of Yerevan.', 'Travel Tour արտագնա տուրիստական գործակալություն է, որը գտնվում է Երևան քաղաքի կենտրոնում:', NULL, NULL),
(2, 'destinations', 'tours from yerevan, Asian Tour, europe tours, america travel tour, travel tour to europe, travel tour asia, paris tours', 'տուր դեպի դուբայ, տուր դեպի հունաստան, տուր դեպի իտալիա, Երուսաղեմ տուր, արտագնա տուրեր հայաստանից', 'We offer outbound tour packages to Europe, Asia, Africa, North and South America. ', 'Մենք առաջարկում ենք արտագնա տուր փաթեթներ դեպի Եվրոպա, Ասիա, Աֆրիկա, Հյուսիսային և Հարավային Ամերիկա:', NULL, NULL),
(3, 'tours', 'package tour, travel tour thailand package, travel tour packages europe, travel tour packages asia, travel tour packages to europe, new york travel tour packages', 'տուր փաթեթներ, Տուրեր աշխարհի բոլոր ուղղություններով, Արտագնա տուրեր և տուր փաթեթներ դեպի Եվրոպա, Ասիա, Աֆրիկա 2020', 'The packages include: air tickets, high quality hotel accommodation, guide, entrance fees - all transportation to the destination.', 'Փաթեթները իրենց մեջ ներառում են՝ ավիատոմսեր, բարձրակարգ կացություն հյուրանոցում, գիդ, մուտքի վճարներ և բոլոր փոխադրումները նշանակման վայրում:', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_tour_id_foreign` (`tour_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `rating`, `user_id`, `tour_id`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s..', 5, 2, 1, '2022-08-30 15:39:51', '2022-08-30 15:39:51'),
(2, 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets', 4, 3, 2, '2022-08-30 15:42:32', '2022-08-30 15:42:32'),
(3, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 3, 5, 3, '2022-08-30 15:47:02', '2022-08-30 15:47:02'),
(4, 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 4, 7, 4, '2022-08-30 15:49:06', '2022-08-30 15:49:06'),
(5, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 4, 13, 5, '2022-08-30 15:54:37', '2022-08-30 15:54:37'),
(6, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 3, 15, 6, '2022-08-30 15:55:30', '2022-08-30 15:55:30'),
(8, 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', 4, 14, 7, '2022-08-30 15:58:37', '2022-08-30 15:58:37'),
(9, 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 3, 9, 8, '2022-08-30 16:08:19', '2022-08-30 16:08:19'),
(10, 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', 3, 46, 2, '2022-08-31 13:52:45', '2022-08-31 13:52:45'),
(11, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 5, 1, 6, '2022-09-01 05:31:04', '2022-09-01 05:31:04'),
(14, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using', 2, 15, 7, '2022-09-01 05:41:36', '2022-09-01 05:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
CREATE TABLE IF NOT EXISTS `tours` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_hy` varchar(255) NOT NULL,
  `descr_en` text NOT NULL,
  `descr_hy` text NOT NULL,
  `days_en` text NOT NULL,
  `days_hy` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL DEFAULT '0',
  `duration_en` varchar(255) NOT NULL,
  `duration_hy` varchar(255) NOT NULL,
  `min_age` varchar(255) NOT NULL,
  `max_people` int(11) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `available_seats` int(11) NOT NULL,
  `from_en` varchar(255) NOT NULL,
  `to_en` varchar(255) NOT NULL,
  `from_hy` varchar(255) NOT NULL,
  `to_hy` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL DEFAULT '0',
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `tours_destination_id_foreign` (`destination_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `img`, `title_en`, `title_hy`, `descr_en`, `descr_hy`, `days_en`, `days_hy`, `price`, `discount`, `duration_en`, `duration_hy`, `min_age`, `max_people`, `availability`, `available_seats`, `from_en`, `to_en`, `from_hy`, `to_hy`, `rating`, `destination_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'tour-1.jpg', 'Milaidhoo island, Maldives', 'Milaidhoo կղզի, Մալդիվներ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:', '{\"days\":[{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}}]}', '{\"days\":[{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}}]}', '600', '10', '4 days', '4 օր', '12+', 40, '2022-04-04', 40, 'Yerevan', 'Maldives', 'Երևան', 'Մալդիվներ', '5.0', 4, 7, '2022-05-23 14:42:08', '2022-09-20 11:07:40'),
(2, 'tour-2.jpg', 'Athens, Santorini & Mykonos', 'Աթենք, Սանտորինի և Միկոնոս', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:', '{\"days\":[{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}}]}', '{\"days\":[{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}}]}', '2000', '25', '10 days', '10 օր', '5+', 35, '2022-05-25', 35, 'Yerevan', 'Athens', 'Երևան', 'Աթենք', '3.5', 3, 6, '2022-05-23 14:56:58', '2022-09-20 11:07:40'),
(3, 'tour-3.jpg', 'Cruise  Alaska', 'Նավարկություն Ալյասկա', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:', '{\"days\":[{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}}]}', '{\"days\":[{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}}]}', '350', '0', '3 days', '3 or', '10+', 30, '2022-06-02', 30, 'Yerevan', 'Alaska', 'Երևան', 'Ալյասկա', '3.0', 1, 4, '2022-05-23 15:26:45', '2022-09-20 11:07:40'),
(4, 'tour-4.jpg', 'Marina Bay Sands Singapore', 'Marina Bay Sands Սինգապուր', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:', '{\"days\":[{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}}]}', '{\"days\":[{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567:\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567:\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567:\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567:\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567:\"}}]}', '680', '15', '5 days', '5 օր', '10+', 25, '2022-06-13', 25, 'Yerevan', 'Singapore', 'Երևան', 'Singapore', '4.0', 4, 3, '2022-05-23 15:41:34', '2022-09-20 11:07:40'),
(5, 'tour-5.jpg', 'Glimpse of Koh Samui & Bangkok', 'Կոհ Սամուիի հայացքը և Բանգկոկ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:', '{\"days\":[{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}}]}', '{\"days\":[{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}}]}', '750', '0', '6 days', '6 օր', '2+', 25, '2022-06-04', 25, 'Yerevan', 'Bangkok', 'Երևան', 'Բանգկոկ', '4.0', 4, 7, '2022-05-30 09:59:22', '2022-09-20 11:07:40'),
(6, 'tour-6.jpg', 'Cairns Adventure', 'Cairns արկածային', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:', '{\"days\":[{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}}]}', '{\"days\":[{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}}]}', '3000', '10', '7 days', '7 օր', '15+', 30, '2022-06-14', 30, 'Yerevan', 'Canberra', 'Երևան', 'Կանբերա', '4.0', 5, 1, '2022-05-30 11:36:16', '2022-09-20 11:07:40'),
(7, 'tour-7.jpg', 'Kapama River - Greater Kruger', 'Կապամա գետ -  Մեծ Կրյուգեր', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ', '{\"days\":[{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}}]}', '{\"days\":[{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}}]}', '780', '0', '3 days', '3 օր', '15+', 35, '2022-06-10', 35, 'Yerevan', 'Johannesburg', 'Երևան', 'Յոհանեսբուրգ', '3.0', 6, 2, '2022-05-30 12:16:41', '2022-09-20 11:07:40'),
(8, 'tour-8.jpg', 'Iguazu Falls', 'Իգուազու ջրվեժ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum-ը տպագրության և տպագրական արդյունաբերության համար նախատեսված մոդելային տեքստ է: Սկսած 1500-ականներից` Lorem Ipsum-ը հանդիսացել է տպագրական արդյունաբերության ստանդարտ մոդելային տեքստ, ինչը մի անհայտ տպագրիչի կողմից տարբեր տառատեսակների օրինակների գիրք ստեղծելու ջանքերի արդյունք է: Այս տեքստը ոչ միայն կարողացել է գոյատևել հինգ դարաշրջան, այլև ներառվել է էլեկտրոնային տպագրության մեջ` մնալով էապես անփոփոխ: Այն հայտնի է դարձել 1960-ականներին Lorem Ipsum բովանդակող Letraset էջերի թողարկման արդյունքում, իսկ ավելի ուշ համակարգչային տպագրության այնպիսի ծրագրերի թողարկման հետևանքով, ինչպիսին է Aldus PageMaker-ը, որը ներառում է Lorem Ipsum-ի տարատեսակներ:', '{\"days\":[{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}},{\"title\":\"What is Lorem Ipsum?\",\"descr\":{\"info\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\"}}]}', '{\"days\":[{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}},{\"title\":\"\\u053b\\u055e\\u0576\\u0579 \\u0567 Lorem Ipsum-\\u0568\",\"descr\":{\"info\":\"Lorem Ipsum-\\u0568 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0587 \\u057f\\u057a\\u0561\\u0563\\u0580\\u0561\\u056f\\u0561\\u0576 \\u0561\\u0580\\u0564\\u0575\\u0578\\u0582\\u0576\\u0561\\u0562\\u0565\\u0580\\u0578\\u0582\\u0569\\u0575\\u0561\\u0576 \\u0570\\u0561\\u0574\\u0561\\u0580 \\u0576\\u0561\\u056d\\u0561\\u057f\\u0565\\u057d\\u057e\\u0561\\u056e \\u0574\\u0578\\u0564\\u0565\\u056c\\u0561\\u0575\\u056b\\u0576 \\u057f\\u0565\\u0584\\u057d\\u057f \\u0567: \\u054d\\u056f\\u057d\\u0561\\u056e 1500-\\u0561\\u056f\\u0561\\u0576\\u0576\\u0565\\u0580\\u056b\\u0581\"}}]}', '200', '0', '3 days', '3 օր', '15+', 350, '2022-06-16', 350, 'Yerevan', 'Misiones', 'Երևան', 'Միսիոնես', '3.0', 2, 1, '2022-05-30 12:36:59', '2022-09-20 11:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) NOT NULL DEFAULT 'user.png',
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `surname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user.png', 'Seda', 'Galstyan', 'sedagalstyann@gmail.com', '$2y$10$/UJSueN7cXU90OVM1kVxlOYROfGTj19wUoa9jM3G5M4tGgeB2HSau', NULL, '2022-05-17 07:45:19', '2022-09-01 05:29:52'),
(2, 'user.png', 'Mohamed', 'Aufderhar', 'domenica89@example.com', '$2y$10$lG5577JiupYvnPNFkBoTPOMXPriJ3LnWLjF7hn/4g5/1dWeVYFoAi', 'BTFhWXqDeVkKuSw8r1FQ2V4YZHVgW4aKcn18pCnjWUx2UYOxMPTDSkJpmwDd', '2022-05-17 08:19:52', '2022-08-30 15:38:54'),
(3, 'user.png', 'William', 'Aufderhar', 'maria43@example.com', '$2y$10$ZNt8a4EaJZmFwm5bt8bnke4UFmC1GOUgGYPumIEANvtHnZtDguvL.', 'ML0R7NeivOduW2f9iG5mbkswYKr2y5WDpoxEE5XGlWhs1M6tGRETr3eW2p1H', '2022-05-17 08:19:52', '2022-08-30 15:41:55'),
(4, 'user.png', 'Zoe', 'Hane', 'xavier42@example.com', '$2y$10$LYCsXNZqXBFWFToEdjjMZuN//9s18I71ZCEb00Kz2t.TTaqTGZviK', '8dCQn17AZD', '2022-05-17 08:19:52', '2022-05-17 08:19:52'),
(5, 'user.png', 'Henderson', 'Farrell', 'ena63@example.com', '$2y$10$FdC0vBH17xG6UwQOeEkNx./.o5biVg7dJEZLyRXnNiSwEcYGU/mGu', 'DFo0CEHipW61XJCdTHVY5sCgyt1RFZKvlFhjf5ZeKZzKUszXdlIr5lYVK6Ri', '2022-05-17 08:19:52', '2022-08-30 15:45:34'),
(6, 'user.png', 'Sandy', 'Williamson', 'darius.kuhlman@example.net', '$2y$10$x8R0DYy5MdQmhI2rj51AR.HHZud8i2Zg9cKwg.TtMIpleIFWSf9BS', 'JKdnd7Ufvs', '2022-05-17 08:19:52', '2022-05-17 08:19:52'),
(7, 'user.png', 'Issac', 'Graham', 'thintz@example.com', '$2y$10$YZG2tJ9AqLNtRGXCH6/L9ulse2i2r16PwOf8qtcA0vYXt4LAehZ1K', 'THILHK8HwkFmBVhFkxfhFBbGYvSCjlJYZ1ac8r6TIPyRaJaEYf9zbOE84iIp', '2022-05-17 08:19:52', '2022-08-30 15:48:37'),
(8, 'user.png', 'Gabe', 'Aufderhar', 'mlittel@example.com', '$2y$10$UrDVVPOxAaae8M8fPHIweeXxZ0dmuxRnMRLHT.EFGvcw3TwhcEAVW', 'bFhRl5sA1d', '2022-05-17 08:19:52', '2022-05-17 08:19:52'),
(9, 'user.png', 'Jordy', 'Bartoletti', 'rosalind69@example.org', '$2y$10$fY8UYExmklxyursPW5fKAu2KN.SsjeJFrYkSk.PtJKSGX1j8bTDYO', '1GFIe9ecoT', '2022-05-17 08:19:52', '2022-08-30 16:07:45'),
(10, 'user.png', 'Cade', 'Gaylord', 'fritsch.octavia@example.com', '$2y$10$2el8s6LgKzbxs3NYwISCleQvIMQUAwO7CQKga0nkwt1kUeINdfFOK', 'C5d5bjaIaW', '2022-05-17 08:19:52', '2022-05-17 08:19:52'),
(11, 'user.png', 'Marlon', 'Jerde', 'ursula.wiza@example.org', '$2y$10$sQrkGX/RPS4TQKGDbU4zmutAgckPZeIYKSqn70/PrF4Vk2sh6x5vG', '0p7vbqQ4Rv', '2022-05-17 08:19:52', '2022-05-17 08:19:52'),
(12, 'user.png', 'Eveline', 'Jacobson', 'jonas76@example.net', '$2y$10$vVtMEh/typs45OBR/8Sg8e64HRIeaEbXiVzbGoVxCMDYqMaXxW4jm', '8gU1sYZLtJ', '2022-05-17 08:19:54', '2022-05-17 08:19:54'),
(13, 'user.png', 'Mya', 'Lang', 'fpurdy@example.net', '$2y$10$ynMifRI3np./pulJ445aSesfxrEoDaNJ0zjW5V/FOLNObTb9X5jDW', 'ms3Nae58f2YMTlj7xJ3U1qgtbRIRtGh4yApZIEhIkYh9iRrncQwHslie8Smy', '2022-05-17 08:19:54', '2022-08-30 15:53:18'),
(14, 'user.png', 'Russ', 'Bins', 'mikel.murazik@example.net', '$2y$10$EG1TxMoEhZ.OHiMmoFXKduTwUDCxkDEa8eR/vItbzPd4BkrteLl4u', 'YKwKwCtUmmNz5PlfiAotgdAszT4Udg5iF18ztDFyD6ww4yxDrkWwTnreXElb', '2022-05-17 08:19:54', '2022-08-30 15:56:57'),
(15, 'user.png', 'Rowan', 'Shanahan', 'isabelle.windler@example.net', '$2y$10$2x/We5hJkHiSTE.cw1keUuPqviPbYi7v2XTjkfi8bRJ.gm74QmEx2', 'MtQrndekG9eO17wcwpRxlIHeFp2CvGS8OOGxem04k09DzUxALYnpBGUt9w6M', '2022-05-17 08:19:54', '2022-09-01 05:32:38'),
(16, 'user.png', 'Vernon', 'Doyle', 'metz.gladyce@example.com', '$2y$10$XRxExDMj26jHjt4iKxVCsOE/YPNEjcpgFNReah0TAgOicRy2dZhk6', 'OQfvrztt2d', '2022-05-17 08:19:54', '2022-05-17 08:19:54'),
(17, 'user.png', 'Janae', 'Hane', 'colleen32@example.com', '$2y$10$LcnbsOPjUa1rR.z44rx1Z.JRP5G3yrjfzfQ/9cgM2H/fVEAGtrlHy', 'Dl3eJlwfL6', '2022-05-17 08:19:54', '2022-05-17 08:19:54'),
(18, 'user.png', 'Tyreek', 'Veum', 'friedrich.cartwright@example.com', '$2y$10$uRd3p4P3swXk08bBxGWiuuKw30AZAT9d5eedj2a4Ulgr7oMUDW5nO', 'AD4lHSqQoH', '2022-05-17 08:19:54', '2022-05-17 08:19:54'),
(19, 'user.png', 'Ashtyn', 'Kessler', 'shanelle.brekke@example.com', '$2y$10$V0HQibz2Hqo3EHoyZOtVTeuI5FbEq9p4cuQ2k.WM2/VFO4C1c7eaa', '1HxBErZkbe', '2022-05-17 08:19:54', '2022-05-17 08:19:54'),
(20, 'user.png', 'Maritza', 'Ratke', 'schinner.athena@example.org', '$2y$10$J9V0B10hji4iU2cFY10wbuyz4P0bZQqJLIvooGJIgiNhvgT0Ya5/m', 'tGu2MPQxt3', '2022-05-17 08:19:54', '2022-05-17 08:19:54'),
(21, 'user.png', 'Orlando', 'Veum', 'jakubowski.polly@example.net', '$2y$10$6c.S9vm9khY3h1T0Vh3YUeWL.C95/mEmY33bDXnH7SZ8hfWqQMXhy', 'eSJdPcON0p', '2022-05-17 08:19:55', '2022-05-17 08:19:55'),
(22, 'user.png', 'Rowan', 'Schroeder', 'gcrona@example.org', '$2y$10$EZi37HRy/KRnQUllqI4gJ.lr9NN0TnuiGfMr7JxpnHYFdsuZnnYIG', 'Y0TAGusWwM', '2022-05-17 08:19:56', '2022-05-17 08:19:56'),
(23, 'user.png', 'Valentine', 'Gleason', 'pfeffer.felicia@example.net', '$2y$10$FkI/vCclqWb6GoiGrEome.12bY/AEw2dl11l5p4Lsy1a4/eHKn9Fe', 'y5gucYp4Pf', '2022-05-17 08:19:56', '2022-05-17 08:19:56'),
(24, 'user.png', 'Conrad', 'Bogan', 'strosin.clint@example.org', '$2y$10$.qp.VsOEw6kCQg.bw3lMDecZVhqSMNlH5WDwNnr6ycIFh9ou8C4AW', 'KrfOdCe6mi', '2022-05-17 08:19:57', '2022-05-17 08:19:57'),
(25, 'user.png', 'Jason', 'Kuphal', 'dave.schuster@example.org', '$2y$10$z0w19CGUgoYK8bbVTneLVexfhYuIEN7Ow95g2N/l9EEwr1Mo81Be6', 'aDUp1aHTRv', '2022-05-17 08:19:57', '2022-05-17 08:19:57'),
(26, 'user.png', 'Julianne', 'Ratke', 'gerda07@example.org', '$2y$10$Rm8Ceekcb/L3pL9So6HizOzGkNm6.sBpbWQWzYWIGkbWmMrrXHDXe', 'gEFHcwvAXY', '2022-05-17 08:19:57', '2022-05-17 08:19:57'),
(27, 'user.png', 'Caleigh', 'Langworth', 'ena.hirthe@example.org', '$2y$10$yQ7GGxR2CBr4KlOIAQt.7.TcgHIszASUoy71RwhgJlaEodqAtv7Xe', 'kflSG4CFFI', '2022-05-17 08:19:57', '2022-05-17 08:19:57'),
(28, 'user.png', 'Zetta', 'Howell', 'beier.rhoda@example.org', '$2y$10$WitpATIEAK3tIjE9jlAJKueoDopRlR8J5e/R9vstl5pLlwKeCIk52', 'zi920T1rcI', '2022-05-17 08:19:57', '2022-05-17 08:19:57'),
(29, 'user.png', 'Jared', 'Watsica', 'lila60@example.org', '$2y$10$k7c05GGADp42HtmAh7TxrO6/IEY5OWP2aF5i82l5zyTdf3pVeMw6O', 'aN37yrlwW1', '2022-05-17 08:19:57', '2022-05-17 08:19:57'),
(30, 'user.png', 'Lesly', 'Johnston', 'bdickinson@example.org', '$2y$10$JqbzCgKQy1OYMwMB/jAwvuruGvzlysky8EqXeOy32wdve5qCvIFo2', 'xEvMa5caVv', '2022-05-17 08:19:57', '2022-05-17 08:19:57'),
(31, 'user.png', 'Americo', 'Schoen', 'qkuhn@example.org', '$2y$10$sUKwJL1SpuhllHcSW3me/Ou97YZ7I5QyCNchoDJnceC2q8DpSdCVq', '3PhLpBCMSw', '2022-05-17 08:19:57', '2022-05-17 08:19:57'),
(32, 'user.png', 'Marguerite', 'Gutkowski', 'white.leonardo@example.com', '$2y$10$2AG9cJXmay9PnnE/5LADUOw.7hgR3aPaT3Ytq895cCiX8t.wBUl8e', 'RNNcuj7pDY', '2022-05-17 08:20:00', '2022-05-17 08:20:00'),
(33, 'user.png', 'Trinity', 'Greenholt', 'leanne84@example.net', '$2y$10$../y0lEQCJgeL3b29JR6Teg4Cf4O8WqRivKsnwiLH5zTjAdJmNUe2', 'yYWrSr0eOT', '2022-05-17 08:20:00', '2022-05-17 08:20:00'),
(34, 'user.png', 'Jamaal', 'Reynolds', 'declan.rolfson@example.org', '$2y$10$wapy0qyhnUmhs6L9olf9TeajYYC8QM91bqhyhcR2UgfENHN0NhQZK', 'MoWZVNSkYO', '2022-05-17 08:20:00', '2022-05-17 08:20:00'),
(35, 'user.png', 'Billy', 'Kautzer', 'paul12@example.com', '$2y$10$LvS/fmMUxAbMwhdld45COeVZfmxQ0vE1mcZ4XXOiw42zOOCcskLOO', '9tH4aAYDA1', '2022-05-17 08:20:00', '2022-05-17 08:20:00'),
(36, 'user.png', 'Reymundo', 'Oberbrunner', 'cornelius67@example.org', '$2y$10$f4n2TLnwjWQGv9G5.RXFhe9Cnsgbr2lOLpWkqkrL3VlV2Me72cCKG', 'YOlv8Bvnk9', '2022-05-17 08:20:00', '2022-05-17 08:20:00'),
(37, 'user.png', 'Antonette', 'Nienow', 'ebernier@example.com', '$2y$10$9YPo.YrlmXBHuKYzTIrK/OP.Z6ReJne78TO3v7UJOCUrJMdsdT3kO', 'wvSvu3UL3H', '2022-05-17 08:20:00', '2022-05-17 08:20:00'),
(38, 'user.png', 'Elroy', 'Stokes', 'patience.walker@example.net', '$2y$10$1YRYeN/ixOzMca9.Z8NTz.2b9lHabwMLjS9qmac9P.QKL2b7z5/cu', 'LAiKzAMtjl', '2022-05-17 08:20:00', '2022-05-17 08:20:00'),
(39, 'user.png', 'Sister', 'Johnston', 'kadin48@example.net', '$2y$10$0ZVZWDcSDt9vvPzxJO/Auu5zU9MItNxl2h9kiZz9/n/HXImA6gW8a', 'ZLlWIrkf1o', '2022-05-17 08:20:00', '2022-05-17 08:20:00'),
(40, 'user.png', 'Alexandro', 'Jast', 'fhintz@example.net', '$2y$10$SKhlmpcz.ksJjCM7hvrc7uaGSJZMnJMwLMiKus2IwVgUaz3oB0q5m', 'jNkD2qKwqv', '2022-05-17 08:20:00', '2022-05-17 08:20:00'),
(41, 'user.png', 'Duane', 'Crona', 'oren.luettgen@example.net', '$2y$10$g8lI.5e2GnCji6lJnvbo0OdKWJTGX3cdbiE2B8JfmC/Amc5vqWOLO', 'zmaSGjOhpe', '2022-05-17 08:20:00', '2022-05-17 08:20:00'),
(42, 'user.png', 'Ila', 'McDermott', 'upton.kale@example.org', '$2y$10$Ekzz5qTMwjiU9/OVMN7PH.0o1aMlNQEbt42dwciugIA07aOlF8RP2', 'SUl3lVUBaF', '2022-05-17 08:20:02', '2022-05-17 08:20:02'),
(43, 'user.png', 'Marley', 'Altenwerth', 'huel.shania@example.net', '$2y$10$Qt/OPI/2WgqSzWyT.rOHyeNSfrs8ShsxMIkjgIb838HMbPFB3LEOu', 'nIXsaW3QuF', '2022-05-17 08:20:02', '2022-05-17 08:20:02'),
(44, 'user.png', 'Kamren', 'Parisian', 'major86@example.com', '$2y$10$.WyZaonbDY7uEZ06Ix.pTOAPYtiSEEw9m7m2TeUlzZ8P1Ev0j0TAy', 'HTv1hNw5tk', '2022-05-17 08:20:02', '2022-05-17 08:20:02'),
(45, 'user.png', 'Grant', 'Lakin', 'coconnell@example.org', '$2y$10$71e90WiZBbkhWsU4M9hycuueIfbRr14qGE6UX53UhbZ2kqex/oX9y', 'hXAIm4mtjv', '2022-05-17 08:20:02', '2022-05-17 08:20:02'),
(46, 'user.png', 'Devyn', 'Metz', 'pbogan@example.com', '$2y$10$z1hP.TOFWbIqAp8Otjhf6OxXoVoxVQy9fpmZRWp.4dc0dV8TNfZoa', 'OeUfaCAH1t', '2022-05-17 08:20:02', '2022-08-31 13:51:20'),
(47, 'user.png', 'Derick', 'Powlowski', 'hchristiansen@example.net', '$2y$10$yEa4b6LFSlh4YNtaJEmyiejJX/kYbDGGXuObAmIqX.oSZd2pxRi06', 'KDArA3VLNB', '2022-05-17 08:20:03', '2022-05-17 08:20:03'),
(48, 'user.png', 'Ewell', 'Gleason', 'dgorczany@example.com', '$2y$10$PqvTFA2oNfNC2tQHCdTvgec6bHtyLaMCFIl3ALW36IHDCWo1.Qipa', 'MklS01pqCz', '2022-05-17 08:20:03', '2022-05-17 08:20:03'),
(49, 'user.png', 'Arvid', 'Schoen', 'yazmin.stamm@example.net', '$2y$10$qnlbDLw2G87jKvLMc0iQ0OIKmvSGuLg23Ko/AxjmZDWwpLBfaHDlW', 'N5RAeqkDoo', '2022-05-17 08:20:03', '2022-05-17 08:20:03'),
(50, 'user.png', 'Dolores', 'Schuppe', 'psatterfield@example.com', '$2y$10$bT03eyRs3EYHBAxX/wqr4O9JLiBBFJULQMPs.rHWr28UUURjFz3Ha', 'kUfRKlDxgD', '2022-05-17 08:20:03', '2022-05-17 08:20:03'),
(51, 'user.png', 'Maximillia', 'Ledner', 'kolby.ullrich@example.com', '$2y$10$D0xRH8HtTQ/YWqCEBrJpAupLWRPf/3KB30oFd2TnOJksZpxI.q8ki', '4EnCtNFP8b', '2022-05-17 08:20:03', '2022-05-17 08:20:03'),
(52, 'user.png', 'Katlyn', 'Tillman', 'janiya.schaden@example.com', '$2y$10$1czIgiIjbZvvqQ2N9lnRr.5CjqGRLZehgOPFzhgHkNi.gy6Hb7/8K', 'xHmQd9oo6c', '2022-05-17 08:20:06', '2022-05-17 08:20:06'),
(53, 'user.png', 'Katherine', 'Schinner', 'hoeger.karine@example.net', '$2y$10$N.A0Cs1dCKv1GyhudZWgI.D.CQzvNG2kdNvYKX.WQQyh8k5NeU4hS', 'mbNwhuoONb', '2022-05-17 08:20:06', '2022-05-17 08:20:06'),
(54, 'user.png', 'Dorthy', 'Towne', 'collins.reggie@example.com', '$2y$10$Xyb9Po6iEFfyrCOd.yfwteZ5VuStUx/yHuEPGaE2z7uh8S6umvQJq', 'X490lo1wyf', '2022-05-17 08:20:06', '2022-05-17 08:20:06'),
(55, 'user.png', 'Lance', 'O\'Keefe', 'waters.darby@example.com', '$2y$10$4ZY.8toBRrFvRVWODKdlyOjuEa2Mt.mdwYvUbpZGSo4qvCnvLbXpi', 'a8wclydKFy', '2022-05-17 08:20:06', '2022-05-17 08:20:06'),
(56, 'user.png', 'Mercedes', 'Walker', 'eino.tremblay@example.org', '$2y$10$8zmwqZ1ifklbIwRL.iuGz.lj7/itCUtUqIxFGSBv9YCrsvhrNNjXG', 't87M9wGEE7', '2022-05-17 08:20:06', '2022-05-17 08:20:06'),
(57, 'user.png', 'Coty', 'Champlin', 'carroll.neva@example.com', '$2y$10$98Z7/okeBagdJ5QivoMGsuQfvKBJOe4R5Iv5pvPJo6A8NbvIhMD92', 'bTsNPqkAyM', '2022-05-17 08:20:06', '2022-05-17 08:20:06'),
(58, 'user.png', 'Lukas', 'Tillman', 'uschamberger@example.com', '$2y$10$qLyU2bNWGyulTbZmPDj0o.l3FxipX8nhudB1jLllXMpq7ELIwYsHm', 'T0w9Rs6d5E', '2022-05-17 08:20:06', '2022-05-17 08:20:06'),
(59, 'user.png', 'Bettie', 'Senger', 'imuller@example.com', '$2y$10$BIilrgAGBcpGirodCYKYsefBG2dP5CO6UUhNNC4vplGa.2Y74Vah2', 'gnFQDrw8Ae', '2022-05-17 08:20:06', '2022-05-17 08:20:06'),
(60, 'user.png', 'Tara', 'Schoen', 'dean.oreilly@example.com', '$2y$10$6KMenzRZyYaOC2MBtdt9Lenr4x.DVXiti4swtKN0VR54V/u2XZ3MG', 'ECPV71brPb', '2022-05-17 08:20:06', '2022-05-17 08:20:06'),
(61, 'user.png', 'Brooks', 'Ebert', 'cristian.gaylord@example.net', '$2y$10$mCeW2gxVsbWS8ujUk7Hz7OZ2aS7mcLKNMHlCFRlCs15YX5ZLzV3ku', 'flke04Fn3n', '2022-05-17 08:20:06', '2022-05-17 08:20:06'),
(62, 'user.png', 'Brando', 'Schneider', 'dominic.white@example.net', '$2y$10$NenkUzSuSYgsCcNA/5qvjuTKot7THfj.IBRmxVhH5j1XlZGeqS9Ke', '9VOkTJkzRg', '2022-05-17 08:20:08', '2022-05-17 08:20:08'),
(63, 'user.png', 'Bernice', 'Runolfsdottir', 'borer.ahmad@example.com', '$2y$10$nlx/pAeb3kJoyZabQTE5P.djvqF2tM4of9U72mb02zYT1o5qsfxQy', 'L6sH7FdKnw', '2022-05-17 08:20:08', '2022-05-17 08:20:08'),
(64, 'user.png', 'Ettie', 'Dare', 'cgislason@example.org', '$2y$10$6VGs/8fhs2SFj2FICgTWYO/4MyE.eEiOy7Ae6dMby9vyq6KQQapvm', 'fRCrYdcYuI', '2022-05-17 08:20:08', '2022-05-17 08:20:08'),
(65, 'user.png', 'Skyla', 'Kuvalis', 'rgrady@example.org', '$2y$10$6eYWLz5vdH4oLn0bwXtaA.pCaas73yiekOSmv8ikJqVFdnnVKsQSi', 'b0XQ3ylMM1', '2022-05-17 08:20:08', '2022-05-17 08:20:08'),
(66, 'user.png', 'Shemar', 'Keebler', 'nicolette50@example.net', '$2y$10$HwJrTNS34Yf6rGmGJDkZv.CJtysfFMYCdLFLRFzM66wTs5Eej7ntm', 'bxIDNvGjAg', '2022-05-17 08:20:08', '2022-05-17 08:20:08'),
(67, 'user.png', 'Loren', 'Gottlieb', 'diamond38@example.org', '$2y$10$U9HS00E1Fd3EYwzVICFVwekgft3U/bcZM8cVvjvATasrCVfY5p2cu', '6ZLJflo6Fo', '2022-05-17 08:20:08', '2022-05-17 08:20:08'),
(68, 'user.png', 'Patricia', 'Bahringer', 'hschinner@example.com', '$2y$10$6X.CX4HOHE0F8D9RxfeDpuN204QovA9CLOvKO8yFVllgk7NNWtMv.', 'IhNdzC8P8z', '2022-05-17 08:20:08', '2022-05-17 08:20:08'),
(69, 'user.png', 'Kirk', 'Swift', 'vance.weimann@example.com', '$2y$10$4D5/0PfRqISIHBN9RB5SUO.EJjaEtnUmLxsMbsWsuAWWlgRN42Cd2', '5YxhlGM4i7', '2022-05-17 08:20:08', '2022-05-17 08:20:08'),
(70, 'user.png', 'Alda', 'Schuppe', 'pfeest@example.net', '$2y$10$YtMaegIjX3PFZlb/G0QRp.ur3ObyvRyIQqbJymIm/C3OGmz0khr1W', 'nnHnnHj0wY', '2022-05-17 08:20:08', '2022-05-17 08:20:08'),
(71, 'user.png', 'Kendall', 'Yost', 'roselyn85@example.com', '$2y$10$2hIXlHqGyC5tENJTZfuWJuSRrUjHSBVIVznt2bK534q8kK8FkStcS', '4lBQyEZGfE', '2022-05-17 08:20:08', '2022-05-17 08:20:08'),
(72, 'user.png', 'Caroline', 'Lind', 'jewel83@example.org', '$2y$10$YnfhB5BCOnZMBQZ30106V.E6ei5j0rKIpVfQDSCeVl8YfH8TXfXim', 'WXBTNjR7Pu', '2022-05-17 08:20:10', '2022-05-17 08:20:10'),
(73, 'user.png', 'Yadira', 'Stanton', 'rosalyn.willms@example.org', '$2y$10$Io/V7Ol7N63H2a/NnFErPujnc3Kcr5elga3H53LgSeaDxBDGTEsQe', 'kwERkIL0ye', '2022-05-17 08:20:10', '2022-05-17 08:20:10'),
(74, 'user.png', 'Francesca', 'Huels', 'lebsack.magdalen@example.org', '$2y$10$wypL1wyp2ayAr7l6TkDQM.2pwz.5pNX2I..jzdGdklkJUT2eMAkwK', 'hWLypj09jm', '2022-05-17 08:20:10', '2022-05-17 08:20:10'),
(75, 'user.png', 'Neoma', 'Johns', 'deven10@example.com', '$2y$10$OwQXy3ZTtJ6fswqIa03y5uyRkaWTBdPUq/JiBHdgsw3XCxP15QJZS', 'F8ZAKSgy2R', '2022-05-17 08:20:10', '2022-05-17 08:20:10'),
(76, 'user.png', 'Trevion', 'Hammes', 'koberbrunner@example.com', '$2y$10$5A8EOucJbvVIw52Mg7qCD.k1dKzCNMe61woTFYY75WCYPxxossfNm', 'N7OWIBOqGi', '2022-05-17 08:20:10', '2022-05-17 08:20:10'),
(77, 'user.png', 'Marina', 'Davis', 'bernie30@example.org', '$2y$10$YZvuJq4PxLt/N0Q056Xh3.o/s2WOshTEgc2t97rkfw5cW5gJ6xBXq', 'CsjG0UI8bP', '2022-05-17 08:20:10', '2022-05-17 08:20:10'),
(78, 'user.png', 'Leopoldo', 'Parisian', 'adelia.bernhard@example.org', '$2y$10$zBw/hP.JhpaiEKM0a5DDsO.x88iKvUDRNICWcqioH/AMemkv9Tyei', 'sHsD8no0Jo', '2022-05-17 08:20:10', '2022-05-17 08:20:10'),
(79, 'user.png', 'Oswald', 'Lynch', 'aurelia.schaefer@example.org', '$2y$10$yO7cLtM0rq/BEdsAfDl.N.dFKxCYyNpXwxVGaLITTXNLW1SbwU9s6', 'aBxBQKI2pF', '2022-05-17 08:20:10', '2022-05-17 08:20:10'),
(80, 'user.png', 'Cleo', 'Haley', 'kkiehn@example.org', '$2y$10$Ow2pucK0YAMRx06iS3DjRO2yNcVJ5KDCF3UYO6rwzkBBGd98OlQOq', 'MYp4AxDWQt', '2022-05-17 08:20:10', '2022-05-17 08:20:10'),
(81, 'user.png', 'Lenny', 'Wyman', 'bell.gislason@example.com', '$2y$10$BhbtQyISTS9VlGCFx39tyefephLPlN4mRB7pwVQ5snsQsfrohTxRu', '5C0xRR1vsT', '2022-05-17 08:20:10', '2022-05-17 08:20:10'),
(82, 'user.png', 'Alberto', 'Bosco', 'effertz.pascale@example.net', '$2y$10$gKAjMOpWgoxnjMhwmpkwL.5yDA8lTO3P9.T4aN1I5lpXVkmd4VYWi', '3faNivZLB3', '2022-05-17 08:20:12', '2022-05-17 08:20:12'),
(83, 'user.png', 'Jedidiah', 'Gerhold', 'qfeest@example.org', '$2y$10$iufpXW11QKb6uaAXtUcuCOdTFI6w2F8gLqrWYKLKX08oXOR7W2DSy', 'SIbuMjrh6n', '2022-05-17 08:20:12', '2022-05-17 08:20:12'),
(84, 'user.png', 'Emery', 'Weissnat', 'cary.stroman@example.net', '$2y$10$40eN3890SSLF6soMUyX4y.a7tt0fz0xHzYggC37I/vxlRwu0kB/3u', 'k3hh1w86dc', '2022-05-17 08:20:12', '2022-05-17 08:20:12'),
(85, 'user.png', 'Afton', 'Rolfson', 'ntreutel@example.com', '$2y$10$uLs4dGWwtDjTnTL99A9hD.RCEL8bQz7koHj4YqEwjZaHjQWay38jm', '4KtL9OKtTU', '2022-05-17 08:20:12', '2022-05-17 08:20:12'),
(86, 'user.png', 'Lyla', 'Hermann', 'rolson@example.com', '$2y$10$i2752iKM27qUEt3XShzWDOmq6vCkQBKGSb8ZyXWy8wHDKDsflEU0S', 'oQy6EmMu9a', '2022-05-17 08:20:12', '2022-05-17 08:20:12'),
(87, 'user.png', 'Bryon', 'Zemlak', 'alvah.waters@example.org', '$2y$10$KouNiL.b3ZmQU4xYrh./N.XgXoczw9mfp.FslKuNMqdg1MrI3kEgq', 'Y84FJ71RAA', '2022-05-17 08:20:12', '2022-05-17 08:20:12'),
(88, 'user.png', 'Cade', 'Cormier', 'dillon.murray@example.net', '$2y$10$vO77AoaFdH6ncZQbjKapgOTqsiNaFQKQIQ31dDnjv.ezylIMYGiWC', '5SubWBA8XR', '2022-05-17 08:20:12', '2022-05-17 08:20:12'),
(89, 'user.png', 'Margarett', 'Bogan', 'emurphy@example.com', '$2y$10$wMSfTr9ocvgtPp65qG14yeYXv7Wl6i57ZatMiCZACOjhNFY2BTqUa', 'ZDOzF8NbMH', '2022-05-17 08:20:12', '2022-05-17 08:20:12'),
(90, 'user.png', 'Damon', 'O\'Reilly', 'kautzer.zakary@example.org', '$2y$10$RuKgAkMC4GlFxCS8qeph2.2QVl2m2WEmJ/WQlhucf387TteilyFLe', 'EEXmfLPAes', '2022-05-17 08:20:12', '2022-05-17 08:20:12'),
(91, 'user.png', 'Evan', 'O\'Keefe', 'winifred.lind@example.org', '$2y$10$DivTgdwWzVbP0atBMYdJPO.R8nx7PM91yYXgxDsMt0/cCTf6VfwfO', 'Xq0n40EYcR', '2022-05-17 08:20:12', '2022-05-17 08:20:12'),
(92, 'user.png', 'Joannie', 'Hilpert', 'trenton.hermann@example.net', '$2y$10$VLkHTZdvHnXSN9Pwxb4cwe9OtSe89ksqAOzB1l1ybY/UnWIHsgp6a', 'xKYC76tv48', '2022-05-17 08:20:14', '2022-05-17 08:20:14'),
(93, 'user.png', 'Uriel', 'Pollich', 'jamarcus55@example.net', '$2y$10$kerm2BttqQXGRDJ/SMP8iuCQ8O8EbvyzxSA9srJ.MQVyBDCRIUE02', 'jxRmgNJtp1', '2022-05-17 08:20:14', '2022-05-17 08:20:14'),
(94, 'user.png', 'Agustin', 'Feeney', 'weissnat.ardith@example.net', '$2y$10$xjj6UGfqGn1gCxKNwZ8.d.pMFPw2yQGfHlEb7OT4Cq64Y8Lzur.j2', 'UvBv1RWt1i', '2022-05-17 08:20:14', '2022-05-17 08:20:14'),
(95, 'user.png', 'Shanon', 'Greenfelder', 'white.creola@example.net', '$2y$10$oYzn.u4Q9B2ojEXCP2mZfOkM.TkpZSlRYKV7ilpMS/kCmLGSCb12K', 'r7CBxP8RgI', '2022-05-17 08:20:14', '2022-05-17 08:20:14'),
(96, 'user.png', 'Omari', 'King', 'lexus.prosacco@example.net', '$2y$10$7Yyw0QAAspjSazw8iVatZOuialdigfkd.0jYuJquxhevbM9vgBS5O', 'bGDfCeHNFi', '2022-05-17 08:20:14', '2022-05-17 08:20:14'),
(97, 'user.png', 'Dexter', 'Mertz', 'kemmer.mollie@example.com', '$2y$10$2bLegkXM/hI5kJu4qX8qKeXXeNz0aEgY/hH9M7FbXZPEwvrGbzYi6', 'ZufvsrXYzT', '2022-05-17 08:20:15', '2022-05-17 08:20:15'),
(98, 'user.png', 'Jeramie', 'Reinger', 'dina82@example.com', '$2y$10$VnJW2xO/MyuyE0PRpNvV6uoD2YB17n4D1L05WH860yP.lmr0NsCgS', 'J2O8QDMOsK', '2022-05-17 08:20:15', '2022-05-17 08:20:15'),
(99, 'user.png', 'Nova', 'Howe', 'umoen@example.com', '$2y$10$ocYjKecf3WNOGPQ1pCJYz.isEFzK/i1T0.0SXNT2vy5BZqNjQcXGi', 'oZ4wBqaOyG', '2022-05-17 08:20:15', '2022-05-17 08:20:15'),
(100, 'user.png', 'Donny', 'Jast', 'iwolff@example.org', '$2y$10$bNcbX8SVn9zmRRves8fphuDtwcNv6Cxi9DtZTSnkspE1EoC3wll8S', 'XH6SN3p5tK', '2022-05-17 08:20:15', '2022-05-17 08:20:15'),
(101, 'user.png', 'Ofelia', 'Shields', 'koelpin.darren@example.org', '$2y$10$yn74DdIyldQLzKByHT2qY.Wat5228UkgDlIuDhwpTsxyYqUTvy4zu', 'Z2J8Z2nr0T', '2022-05-17 08:20:15', '2022-05-17 08:20:15'),
(102, 'user.png', 'Electa', 'Hickle', 'ibrahim29@example.com', '$2y$10$LoccLMcF1F3A3USwugTYfuQicA.cdoRhTeRUVBc3V6pb.Iue3FuM6', 'tvrQ0sxFtt', '2022-05-17 08:20:16', '2022-05-17 08:20:16'),
(103, 'user.png', 'Hobart', 'Schowalter', 'frances.volkman@example.com', '$2y$10$TeiZbIKRwgd88W2jigzXuuvTA5cyE6rHhyg4IWMmJQudUorI9/fJe', '5uUAQxR9gP', '2022-05-17 08:20:16', '2022-05-17 08:20:16'),
(104, 'user.png', 'Vance', 'Medhurst', 'fward@example.net', '$2y$10$QbYaJn7O0jTB8IKpL3pbZuFujau2M75wfDUNVQcSt5IurZW183hya', 'NLm7wt3YaC', '2022-05-17 08:20:16', '2022-05-17 08:20:16'),
(105, 'user.png', 'Whitney', 'Dibbert', 'huels.dale@example.com', '$2y$10$wkagB1ws81zSStTUWo0I6uWxvkx3npwlsbZjEcEKEYM0hFslYkRoK', 'HVzaanlpje', '2022-05-17 08:20:16', '2022-05-17 08:20:16'),
(106, 'user.png', 'Gerhard', 'Sipes', 'vkulas@example.com', '$2y$10$gEzaUBfMKjYmsnig13N8v.yJ5M8UGo5n9RywCdkjYhF.1ayqorE3.', 'OIHxwPX5m5', '2022-05-17 08:20:17', '2022-05-17 08:20:17'),
(107, 'user.png', 'Vidal', 'Carter', 'veum.annette@example.com', '$2y$10$LcDCCN5aCXQ2PvcRSdbPx.KqdiLBQJbEn87RHWLkzOzfU9vKHjcSG', 'liNMcr1L3F', '2022-05-17 08:20:17', '2022-05-17 08:20:17'),
(108, 'user.png', 'Lilly', 'Ratke', 'jorge51@example.org', '$2y$10$USM4l5He/ce6ZaXnsxpXMuFUFVzylECHCgz5RDBvGanIt18rQRwrC', 'QKITdpqmH0', '2022-05-17 08:20:17', '2022-05-17 08:20:17'),
(109, 'user.png', 'Toy', 'Tillman', 'skeeling@example.com', '$2y$10$B8w4NALgs7REvwuW33ibC.JpB.OCbOpDDX7xa20tcrCzbbObQEmAa', 'mtW7jfrxg8', '2022-05-17 08:20:17', '2022-05-17 08:20:17'),
(110, 'user.png', 'Cecilia', 'Batz', 'yaltenwerth@example.com', '$2y$10$Cx1EmjdaKej6jvvswDLHtO7pdP9Q9kDdZQJ0DYe9BhC2ogyPLCJy2', 'LcyBFk0FhW', '2022-05-17 08:20:17', '2022-05-17 08:20:17'),
(111, 'user.png', 'Ava', 'Cartwright', 'zschaden@example.org', '$2y$10$vv79Ko3cDOEENEP1an7XlOL/YaxUQ9/yWylUFGc6xw/M9va4pL7bG', 'jPOJGchdn7', '2022-05-17 08:20:17', '2022-05-17 08:20:17'),
(112, 'user.png', 'Pascale', 'Rutherford', 'lauryn.dach@example.net', '$2y$10$bxJdBYIVP1m1FjIK5UrY1etyRkXl9uZojsglDONJnYoyAwn.hb5YS', 'FCkpk2LrdQ', '2022-05-17 08:20:18', '2022-05-17 08:20:18'),
(115, 'user.png', 'Dereck', 'Raynor', 'colin07@example.com', '$2y$10$N5GW3xHdkoqAFqrj6ioaruOcI.Gi3Hl8aUfLjHpfI7TAxCz6KmJ02', 'IrcY4cj4Mw', '2022-05-17 08:20:19', '2022-05-17 08:20:19'),
(116, 'user.png', 'Braxton', 'Romaguera', 'dlockman@example.net', '$2y$10$W338XRWh3nObiNGqTQBQguSEgE0r1a.hlp5u2u5AvdcWU3zukmdRi', 'cKMb8t2MWz', '2022-05-17 08:20:19', '2022-05-17 08:20:19'),
(117, 'user.png', 'Bethany', 'Lind', 'george.pacocha@example.net', '$2y$10$pEe/wbpPRNE6MQ9VgOpLI.bwyNNNVIfhdqEfz25O3Hs8HjETibbKS', 'aVC4P7biKW', '2022-05-17 08:20:19', '2022-05-17 08:20:19'),
(118, 'user.png', 'Adah', 'Lindgren', 'emmanuelle.nader@example.net', '$2y$10$qzU4xSPCA/IT9ZL5DWyjue9F0BwxO2CubqRNeTSDen2t4GOKxN4mq', 'H4UaN7JHnm', '2022-05-17 08:20:19', '2022-05-17 08:20:19'),
(119, 'user.png', 'Freddy', 'Collins', 'cummerata.sheridan@example.org', '$2y$10$jFNbb5rEDd2n.Wf1nNyuE.lqW63Nk2LMqRBDlRtnWJsC5ba2.IAUi', 'kaFCVKKajo', '2022-05-17 08:20:19', '2022-05-17 08:20:19'),
(120, 'user.png', 'Vanessa', 'Wilkinson', 'paris99@example.com', '$2y$10$cG1QLvVfBFya2XRUnAbHLOIM.3WIKEg6IdsL.eadOk4OAL13fw6fu', 'DtUaLtDh0K', '2022-05-17 08:20:19', '2022-05-17 08:20:19'),
(122, 'user.png', 'John', 'Boris', 'john-boris@kdwin.com', '$2y$10$0AmnaFyWBafwg4qHtV7RKunPB/5Wh3riKkAqqMc5SuMZnIXDz/Zcy', NULL, '2022-05-19 03:55:03', '2022-05-19 03:55:24');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
