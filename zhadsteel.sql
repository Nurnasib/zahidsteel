-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2026 at 05:49 PM
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
-- Database: `zhadsteel`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `slug` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `seo_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `imageTitle` varchar(255) DEFAULT NULL,
  `totalViews` int(11) DEFAULT NULL,
  `source_url` varchar(191) DEFAULT NULL,
  `readingTime` varchar(255) DEFAULT NULL,
  `createdTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `title`, `short_description`, `description`, `meta_title`, `meta_description`, `status`, `slug`, `seo_title`, `seo_description`, `seo_image`, `created_at`, `updated_at`, `category_id`, `imageTitle`, `totalViews`, `source_url`, `readingTime`, `createdTime`) VALUES
(1, 'assets/images/blog/blog_6a262822874f3.jpeg', 'Zahid Steel the success of steel structure builders in Bangladesh', 'Zahid Steel Limited is a steel structure builders in Bangladesh with a variety of structural engineering services. From developing the concept to steel structure home design, steel structure building design, we always make the optimum decision in our work.', '<h2 style=\"font-family: Roboto, sans-serif; color: rgb(51, 51, 51); margin-top: 20px; font-size: 30px; text-align: justify;\">Zahid Steel have great achievement in 2018</h2><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\">Zahid Steel Limited is a steel structure builders in Bangladesh with a variety of structural engineering services. From developing the concept to steel structure home design, steel structure building design, we always make the optimum decision in our work.</p><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\">Detailing for fabrication &amp; erection drawings, precise production of building members, well-equipped transportation pool for smooth delivery of goods on project site, well planned Erection &amp; installation ensuring adequate safety measures are the strengths of our company. Our engineers and technical members are highly experienced and skilled to meet any kind of steel structure project in construction engineering.</p><p><span class=\"\" style=\"border-top-style: solid; border-bottom-style: solid; color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 16px; display: block; clear: both; height: 0px; padding-top: 1px; border-top-width: 0px; border-bottom-width: 0px;\"></span></p><h2 style=\"font-family: Roboto, sans-serif; color: rgb(51, 51, 51); margin-top: 20px; font-size: 30px; text-align: justify;\">The success of steel structure builders in Bangladesh</h2><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\">To put it simply, we see ourselves reaching the top of the steel structure builders in Bangladesh. At Marn Steel structure, we do not compromise on producing effective steel structure models, we give our best in order for them to stand strong. We believe that by continuing this tireless pursuit of ours to the top, we will reach our goals and make the community proud of us in steel structure engineering.</p><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\">The strength of <a href=\"https://www.zahidsteelltd.com/\" style=\"color: rgb(51, 122, 183); transition: 0.3s;\">MSSL</a> is its ability to deliver and serve the clients with understanding their real needs and managing a high quality in steel construction engineering and <a href=\"https://en.wikipedia.org/wiki/Construction\" target=\"_blank\" rel=\"noopener\" style=\"color: rgb(51, 122, 183); transition: 0.3s;\">civil construction</a> within time and budget. Steel structure building in Bangladesh has been a growing trend for business development and growth opportunities. We aim to cling onto that and continue our mission with tenacious efficiency.</p><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\">Our national economy is expanding in Prefabricated company in Bangladesh. Local businesses now have an opportunity to perform on an international platform. As for the globalization of the steel structure company in Bangladesh has the most opportunity to bring manufacturing steel construction engineering. Steel structure companies in 2018 have seen and a massive increase</p>', NULL, NULL, 'active', 'zahid-steel-the-success-of-steel-structure-builders-in-bangladesh-9999', NULL, NULL, NULL, '2026-03-30 06:13:50', '2026-06-07 20:25:38', 1, NULL, NULL, NULL, '223', NULL),
(2, 'assets/images/blog/blog_6a2627abb4c7e.jpeg', 'Zahid Steel the Success Steel Shade Company in Bangladesh', 'কুমিল্লা নগরের রাজগঞ্জ পানপট্টি এলাকায় আটতলা ভবনের একটি ফ্ল্যাটে ভাড়া থাকতেন নিহত কাস্টমস কর্মকর্তা বুলেট বৈরাগী (৩৫) ও তাঁর পরিবারের সদস্যরা।', '<p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\"><a href=\"http://www.zahidsteelltd.com/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"color: rgb(51, 122, 183); transition: 0.3s;\">ZAHID Steel Structure Ltd</a> is one of the dexterous steel shade companies engrossed in the manufacture and service provider of an optimum collection of industrial steelworks. MARN Steel Structure Ltd make sure over the durability, efficiency, and resilience of these products before catering them to the individual clientele end. We ensure the best quality of Imported materials with <a href=\"https://en.wikipedia.org/wiki/Pre-engineered_building\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"color: rgb(51, 122, 183); transition: 0.3s;\">pre-fabricated steel building</a> accessories. Moreover, we are engrossed in offering these products at a really genuine and economical market price to our customers so may suit up with the convenience and needs of our patrons.</p><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\"><a href=\"http://www.zahidsteelltd.com/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"background-color: rgb(255, 255, 255); color: rgb(51, 122, 183); transition: 0.3s;\">ZAHID</a>&nbsp;Steel Structure Ltd are fully welded for superior construction and shipped pre-assembled for fast and simple installation. At MARN, you’re in business immediately with the No. 1 designer, manufacturer supplier of commercial shade structures in the country. At MARN Steel Structure Ltd, we save time and cost on projects of all types and sizes. This steel shade company is the leader in the design, engineering, and manufacturing in Bangladesh.</p><h2 style=\"font-family: Roboto, sans-serif; color: rgb(51, 51, 51); margin-top: 20px; font-size: 30px; text-align: justify;\">Why you should select us?</h2><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\">We are the only one steel shade company in Bangladesh who serve with Pre-Fabricated Buildings! Pre-fabricated buildings are the factory built buildings of steel that are shipped to the site and assembled. What distinguishes them from other buildings is that the constructor also designs the building – a practice called <em>design &amp; build</em>. This style of erection is ideally suited to industrial buildings and warehouses. PEB is cheap, very fast to fabricate, and can also be dismantled and moved to another site – more on that later.</p><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\">The structural system of PEB gives it its rapidity and flexibility. This system consists of factory-painted steel column and beam segments and factory fabricated that are easily bolted together at the site. The columns and beams are custom-contracted I-section members that have an end plate with holes for bolting at both ends. These are made by cutting steel plates of the wanted thickness and welding them together to make I sections. The cutting and welding are done by industrial robots for rapidity and accuracy. Operators will simply feed a CAD (Computer Aided Design) drawing of the beams into the machines, and they do the rest. This manufacturing line style of work makes for great speed and consistency in fabrication. The shape of the beams can be tailored to excellent structural efficiency: they are deeper where the forces are greater, and shallow where they are not. This is one form of construction in which the structures are plotted to carry <em>exactly </em>the loads envisioned and no more.</p><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\">In this system, vast rapidity is achieved cause while the foundations and floor slab are being constructed, the pillars and columns – the structural system – are being manufactured in the industry. Once the foundations and floor are done, the columns are shipped to the field, lifted into place by cranes, and bolted together.</p><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\">This steel shade company takes care of everything, from an idea and concept development to realization. We trust in traditions and incorporate them into our innovations. We work with Proper Planning &amp; Friendly Technical Suggestion. This steel shade company have experienced technical personnel and high-quality workmanship. All our avocation incorporates a unique artistic image and functional solutions. Our clients are the soul of the project. Our first goal is to illustrate their values and individuality through design.</p>', NULL, NULL, 'active', 'zahid-steel-the-success-steel-shade-company-in-bangladesh-9999', NULL, NULL, NULL, '2026-04-26 05:49:51', '2026-06-07 20:23:39', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'assets/images/blog/blog_6a262711cfc82.jpeg', 'Prefabricated Company in Bangladesh', 'prefabricated company in Bangladesh, Prefabricated Structures Supplier in Bangladesh, Prefabricated Structures Company in Bangladesh. We have a wide range of prefabricating in Bangladesh products, Zahid Steel Structure Limited also engaged in offering a unique range of Prefabricated Buildings in Bangladesh', '<h2 class=\"wp-block-heading\" style=\"font-family: Roboto, sans-serif; color: rgb(51, 51, 51); margin-top: 20px; font-size: 30px;\">Introducing Prefabricated Company in Bangladesh</h2><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">prefabricated company in Bangladesh, Prefabricated Structures Supplier in Bangladesh, Prefabricated Structures Company in Bangladesh. We have a wide range of prefabricating in Bangladesh products, <span style=\"font-weight: 700;\">Zahid Steel Structure Limited</span> also engaged in offering a unique range of Prefabricated Buildings in Bangladesh.</p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">It has hassle-free functioning, excellent & high quality of précised designing which makes these PEB very popular and demanding products in the market. MARN using the high-quality grade of raw material as per the industrial industry standards & need, these Prefabricated Buildings in Bangladesh are available in diverse specifications as per the client-specific requirements.</p><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\"> </p><figure class=\"wp-block-image size-medium\" style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 16px;\"><img decoding=\"async\" class=\"aligncenter wp-image-6574 size-full\" src=\"https://marnsteel.com/wp-content/uploads/2020/08/steel-structure-1.jpg\" alt=\"\" width=\"2500\" height=\"500\" srcset=\"https://marnsteel.com/wp-content/uploads/2020/08/steel-structure-1.jpg 2500w, https://marnsteel.com/wp-content/uploads/2020/08/steel-structure-1-300x60.jpg 300w, https://marnsteel.com/wp-content/uploads/2020/08/steel-structure-1-1024x205.jpg 1024w, https://marnsteel.com/wp-content/uploads/2020/08/steel-structure-1-768x154.jpg 768w, https://marnsteel.com/wp-content/uploads/2020/08/steel-structure-1-1536x307.jpg 1536w, https://marnsteel.com/wp-content/uploads/2020/08/steel-structure-1-2048x410.jpg 2048w\" sizes=\"(max-width: 2500px) 100vw, 2500px\" style=\"vertical-align: bottom; max-width: 100%; height: auto; float: left; width: 847.5px; display: table; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; padding: 0px; clear: both; margin-left: auto; margin-right: auto;\"></figure><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\"> </p><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\"> </p><h3 class=\"wp-block-heading\" style=\"font-family: Roboto, sans-serif; color: rgb(51, 51, 51); margin-top: 20px; font-size: 23px;\"><br></h3><h3 class=\"wp-block-heading\" style=\"font-family: Roboto, sans-serif; color: rgb(51, 51, 51); margin-top: 20px; font-size: 23px;\"><br></h3><h3 class=\"wp-block-heading\" style=\"font-family: Roboto, sans-serif; color: rgb(51, 51, 51); margin-top: 20px; font-size: 23px;\">Prefabricated Building – Optimal Solution for Your Projects</h3><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">If you want a building that has cost saving, fast erection, perfect quality control, high durability, <span style=\"font-weight: 700;\">a prefabricated company in Bangladesh</span> is the best choice. As the latest trend in building construction, the prefabricated company is increasingly confirmed its outstanding advantages in industrial and commercial projects such as factory, warehouse, cold storage, showroom, office, supermarket, school, stadium, logistics center, shopping mall, etc…</p><p style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\"> </p><h3 class=\"wp-block-heading\" style=\"font-family: Roboto, sans-serif; color: rgb(51, 51, 51); margin-top: 20px; font-size: 23px;\"><span style=\"font-weight: 700;\">What are prefabricated buildings?</span></h3><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">A <a href=\"https://en.wikipedia.org/wiki/Prefabricated_building\" target=\"_blank\" rel=\"noreferrer noopener\" style=\"color: rgb(51, 122, 183); transition: 0.3s;\">prefabricated building</a>, informally a prefab, is a building that is manufactured and constructed using prefabrication. It consists of factory-made components or units that are transported and assembled on-site to form the complete building.</p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"font-weight: 700;\"><em>Prefabricated engineered building</em></span> is built over three members connected to each other:</p><ul class=\"wp-block-list\" style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 16px;\"><li><span style=\"font-weight: 700;\">Primary members</span> (columns, rafters, bracing…)</li><li><span style=\"font-weight: 700;\">Secondary members</span> (Z or C purlins, girts, and eave struts)</li><li><span style=\"font-weight: 700;\">Roof and wall sheeting</span> connected to each other</li><li><span style=\"font-weight: 700;\">Other building components</span></li></ul><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">The entire primary members and secondary members are designed and fully fabricated including cut-to-length, punching, drilling, welding, and performing in the factory before shipping to the site for erection.</p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">At the site, all components are assembled and jointed via nut & bolt connections; thereby reducing the costs and assembly times.</p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">These buildings can be provided with different structural and non-structural additions such as wall lights, turbo vents, roof monitors, ridge ventilators, doors & windows, trusses, mezzanine floors, canopies, crane systems, insulation…, based on the customer’s requirements.</p><h3 class=\"wp-block-heading\" style=\"font-family: Roboto, sans-serif; color: rgb(51, 51, 51); margin-top: 20px; font-size: 23px;\">Why choose a prefabricated company in Bangladesh?</h3><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"font-weight: 700;\">Cost Savings </span>Price per square meter can be lower than conventional steel buildings. Site erection cost is low because of faster erection times and easier erection process.</p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"font-weight: 700;\">Quality Control</span></p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">Designed and fabricated in-house with strict quality control. The fabrication process includes design and engineering, as well as detailing and manufacturing at the factory.</p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"font-weight: 700;\">Quick Erection</span></p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">All steel components are fabricated at factory and are linked by bolts at site. So the erection process is fast, step by step, easy to install and requires simple equipment.</p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"font-weight: 700;\">Flexibility</span></p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">Prefabricated steel buildings are flexible in any requirement of design, easy to expand in the future and also economically with low transportation costs.</p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"font-weight: 700;\">Energy Efficiency</span></p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">Nowadays, <em>prefabricated buildings</em> are the green solution for the environment with CO2 reduction, energy efficiency and recyclability.</p><h3 class=\"wp-block-heading\" style=\"font-family: Roboto, sans-serif; color: rgb(51, 51, 51); margin-top: 20px; font-size: 23px;\">How to build a prefabricated building with MARN?</h3><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">Each of ZAHID’s prefabricated buildings is tailor-made to meet the needs of our customers with high performance, efficiency and international quality standards. If you are looking for a competitive price and best quality prefabricated company in Bangladesh, please contact Zahid for our advice. We are ready to answers any questions regarding your projects.</p><p class=\"wp-block-paragraph\" style=\"color: rgb(102, 102, 102); line-height: 25px; font-family: Roboto, sans-serif; font-size: 16px;\">Fill the form or send us an <a href=\"https://marnsteel.com/contact-us/\" style=\"color: rgb(51, 122, 183); transition: 0.3s;\">email</a> to request a quotation to ZAHID’s professional advisory team.</p>', NULL, NULL, 'active', 'prefabricated-company-in-bangladesh-10000', NULL, NULL, NULL, '2026-04-26 05:55:00', '2026-06-07 20:46:15', NULL, NULL, NULL, 'https://www.prothomalo.com/religion/islam/ghvhg69tmb', NULL, '2026-06-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `image`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'dfdgdrgdrfgrtg', NULL, 'active', '2026-03-30 06:10:38', '2026-03-30 06:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `blog_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_writers`
--

CREATE TABLE `blog_writers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `writer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_writers`
--

INSERT INTO `blog_writers` (`id`, `blog_id`, `writer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-admin@gmail.com|127.0.0.1', 'i:1;', 1780858101),
('laravel-cache-admin@gmail.com|127.0.0.1:timer', 'i:1780858101;', 1780858101),
('laravel-cache-c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1780858100),
('laravel-cache-c525a5357e97fef8d3db25841c86da1a:timer', 'i:1780858100;', 1780858100),
('laravel-cache-dc44958e29ffba8b810d21377ae366b5', 'i:1;', 1781108946),
('laravel-cache-dc44958e29ffba8b810d21377ae366b5:timer', 'i:1781108946;', 1781108946),
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:9:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"role-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:9:\"role-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"role-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:9:\"user-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:11:\"user-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:9:\"user-edit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:11:\"user-delete\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:9:\"blog-list\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}}}', 1775111876);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `title`, `url`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dsfsefdesf', NULL, '{\"original\":\"uploads\\/category\\/6a1fbf7d0e5031780465533.jpg\",\"small\":\"uploads\\/category\\/6a1fbf7d0e5031780465533_400.jpg\",\"medium\":\"uploads\\/category\\/6a1fbf7d0e5031780465533_768.jpg\",\"large\":\"uploads\\/category\\/6a1fbf7d0e5031780465533_1200.jpg\"}', 'active', '2026-06-02 23:45:33', '2026-06-02 23:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `status` enum('new','reply','pending') NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `message`, `reply`, `service_id`, `subject`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mohsin', '01715486265', 'm@gmail.com', 'hello', NULL, 1, NULL, 'new', '2026-04-01 03:44:06', '2026-04-01 03:44:06'),
(2, 'Mohsin Sikder', '01715486265', 'mohsinsikder895@gmail.com', 'ghtyhjuty', NULL, NULL, 'erte45r6hjhjhum', 'new', '2026-06-09 14:01:27', '2026-06-09 14:01:27'),
(3, 'Mohsin', '01715486265', 'mohsinsikder895@gmail.com', 'drestgfdretgr', NULL, NULL, 'dscesf', 'new', '2026-06-09 14:03:05', '2026-06-09 14:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `email_configs`
--

CREATE TABLE `email_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_mailer` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mail_encryption` varchar(255) DEFAULT NULL,
  `email_name` varchar(255) DEFAULT NULL,
  `mail_name` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `event_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `factories`
--

INSERT INTO `factories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cutting Section', 'active', '2026-06-10 10:36:02', '2026-06-10 10:36:02'),
(2, 'Cutting Section', 'active', '2026-06-10 10:37:10', '2026-06-10 10:37:10'),
(4, 'Welding Section', 'active', '2026-06-10 10:42:47', '2026-06-10 10:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `factory_galleries`
--

CREATE TABLE `factory_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `factory_id` int(11) DEFAULT NULL,
  `gallery` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `factory_galleries`
--

INSERT INTO `factory_galleries` (`id`, `factory_id`, `gallery`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"original\":\"uploads\\/projects\\/1\\/1781109362_6a299272803b0.jpeg\"}', '2026-06-10 10:36:02', '2026-06-10 10:36:02'),
(2, 1, '{\"original\":\"uploads\\/projects\\/1\\/1781109362_6a2992728145b.jpeg\"}', '2026-06-10 10:36:02', '2026-06-10 10:36:02'),
(3, 1, '{\"original\":\"uploads\\/projects\\/1\\/1781109362_6a29927281caf.jpeg\"}', '2026-06-10 10:36:02', '2026-06-10 10:36:02'),
(4, 1, '{\"original\":\"uploads\\/projects\\/1\\/1781109362_6a299272824bd.jpeg\"}', '2026-06-10 10:36:02', '2026-06-10 10:36:02'),
(5, 1, '{\"original\":\"uploads\\/projects\\/1\\/1781109362_6a2992728564f.jpeg\"}', '2026-06-10 10:36:02', '2026-06-10 10:36:02'),
(6, 1, '{\"original\":\"uploads\\/projects\\/1\\/1781109362_6a29927285f38.jpeg\"}', '2026-06-10 10:36:02', '2026-06-10 10:36:02'),
(7, 1, '{\"original\":\"uploads\\/projects\\/1\\/1781109362_6a29927293f16.jpeg\"}', '2026-06-10 10:36:02', '2026-06-10 10:36:02'),
(8, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781109430_6a2992b66c3a0.jpeg\"}', '2026-06-10 10:37:10', '2026-06-10 10:37:10'),
(9, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781109430_6a2992b66cf1e.jpeg\"}', '2026-06-10 10:37:10', '2026-06-10 10:37:10'),
(10, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781109430_6a2992b66d74c.jpeg\"}', '2026-06-10 10:37:10', '2026-06-10 10:37:10'),
(11, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781109430_6a2992b66df0a.jpeg\"}', '2026-06-10 10:37:10', '2026-06-10 10:37:10'),
(12, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781109430_6a2992b66e8cb.jpeg\"}', '2026-06-10 10:37:10', '2026-06-10 10:37:10'),
(13, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781109430_6a2992b671fa8.jpeg\"}', '2026-06-10 10:37:10', '2026-06-10 10:37:10'),
(14, 3, '{\"original\":\"uploads\\/projects\\/3\\/1781109447_6a2992c7d4c43.jpeg\"}', '2026-06-10 10:37:27', '2026-06-10 10:37:27'),
(15, 3, '{\"original\":\"uploads\\/projects\\/3\\/1781109447_6a2992c7d5809.jpeg\"}', '2026-06-10 10:37:27', '2026-06-10 10:37:27'),
(16, 3, '{\"original\":\"uploads\\/projects\\/3\\/1781109447_6a2992c7d601a.jpeg\"}', '2026-06-10 10:37:27', '2026-06-10 10:37:27'),
(17, 3, '{\"original\":\"uploads\\/projects\\/3\\/1781109447_6a2992c7d69b8.jpeg\"}', '2026-06-10 10:37:27', '2026-06-10 10:37:27'),
(18, 3, '{\"original\":\"uploads\\/projects\\/3\\/1781109447_6a2992c7d7379.jpeg\"}', '2026-06-10 10:37:27', '2026-06-10 10:37:27'),
(19, 4, '{\"original\":\"uploads\\/projects\\/4\\/1781109767_6a299407830a7.jpeg\"}', '2026-06-10 10:42:47', '2026-06-10 10:42:47'),
(20, 4, '{\"original\":\"uploads\\/projects\\/4\\/1781109767_6a29940783d4c.jpeg\"}', '2026-06-10 10:42:47', '2026-06-10 10:42:47'),
(21, 4, '{\"original\":\"uploads\\/projects\\/4\\/1781109767_6a29940784567.jpeg\"}', '2026-06-10 10:42:47', '2026-06-10 10:42:47'),
(22, 4, '{\"original\":\"uploads\\/projects\\/4\\/1781109767_6a29940784d44.jpeg\"}', '2026-06-10 10:42:47', '2026-06-10 10:42:47'),
(23, 4, '{\"original\":\"uploads\\/projects\\/4\\/1781109767_6a29940786fc5.jpeg\"}', '2026-06-10 10:42:47', '2026-06-10 10:42:47'),
(24, 4, '{\"original\":\"uploads\\/projects\\/4\\/1781109767_6a299407878f6.jpeg\"}', '2026-06-10 10:42:47', '2026-06-10 10:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Are you licensed and insured?', 'Yes, absolutely. Our company is fully licensed and insured to operate in the AI and technology solutions sector. We comply with all industry standards and local regulations to ensure the safety, legality, and quality of our work. Whether we\'re developing custom AI applications, you can trust that you\'re working with certified professionals.', NULL, 'active', '2026-03-29 05:17:34', '2026-03-29 05:17:34'),
(2, 'বন্যার্তদের মধ্যে ত্রাণ বিতরণ', 'swqde', 2, 'active', '2026-04-01 23:59:34', '2026-04-01 23:59:34'),
(3, 'What services does Bexon offer to clients?', 'Getting started is easy! Simply reach out to us through our contact form or give us a call, and we\'ll schedule a consultation to discuss your project and how we can best assist you.', 1, 'active', '2026-04-26 05:02:03', '2026-04-26 05:02:03'),
(4, 'How do I get started with Corporate Business?', 'Contact our team to discuss your corporate needs. We offer tailored solutions for businesses of all sizes, with dedicated account managers and streamlined onboarding.', 1, 'active', '2026-04-26 05:02:48', '2026-04-26 05:02:48'),
(5, 'How do you ensure the success of a project?', 'We use a proven project management methodology with clear milestones, regular updates, and dedicated quality assurance at every stage.', 1, 'active', '2026-04-26 05:03:21', '2026-04-26 05:03:21'),
(6, 'How long will it take to complete my project?', 'Project timelines vary based on scope and complexity. Most standard projects are completed within 2–6 weeks with full transparency at every step.', 1, 'active', '2026-04-26 05:03:54', '2026-04-26 05:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Annual Conference 2026', 'active', '2026-06-09 13:04:50', '2026-06-09 13:04:50'),
(3, '12 Years of Excellence 2026', 'active', '2026-06-09 13:07:33', '2026-06-09 13:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `gallery` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `gallery`, `created_at`, `updated_at`) VALUES
(7, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781032019_6a2864536faef.jpeg\"}', '2026-06-09 13:06:59', '2026-06-09 13:06:59'),
(8, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781032019_6a28645370e39.jpeg\"}', '2026-06-09 13:06:59', '2026-06-09 13:06:59'),
(9, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781032019_6a286453715a0.jpeg\"}', '2026-06-09 13:06:59', '2026-06-09 13:06:59'),
(10, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781032019_6a28645371ce4.jpeg\"}', '2026-06-09 13:06:59', '2026-06-09 13:06:59'),
(11, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781032019_6a286453724da.jpeg\"}', '2026-06-09 13:06:59', '2026-06-09 13:06:59'),
(12, 2, '{\"original\":\"uploads\\/projects\\/2\\/1781032019_6a28645372cd4.jpeg\"}', '2026-06-09 13:06:59', '2026-06-09 13:06:59'),
(13, 3, '{\"original\":\"uploads\\/projects\\/3\\/1781032053_6a28647528497.jpeg\"}', '2026-06-09 13:07:33', '2026-06-09 13:07:33'),
(14, 3, '{\"original\":\"uploads\\/projects\\/3\\/1781032053_6a2864753036c.jpeg\"}', '2026-06-09 13:07:33', '2026-06-09 13:07:33'),
(15, 3, '{\"original\":\"uploads\\/projects\\/3\\/1781032053_6a28647530a8f.jpeg\"}', '2026-06-09 13:07:33', '2026-06-09 13:07:33'),
(16, 3, '{\"original\":\"uploads\\/projects\\/3\\/1781032053_6a28647531fe5.jpeg\"}', '2026-06-09 13:07:33', '2026-06-09 13:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_30_160801_create_blogs_table', 1),
(5, '2025_08_14_170933_add_two_factor_columns_to_users_table', 1),
(6, '2025_09_24_184227_create_settings_table', 1),
(7, '2025_10_10_182132_create_email_configs_table', 1),
(8, '2025_12_09_105935_create_blog_categories_table', 1),
(9, '2025_12_09_110057_create_blog_writers_table', 1),
(10, '2025_12_09_110226_create_writers_table', 1),
(11, '2025_12_09_110411_add_colum_blog_writer_id_category_id', 1),
(12, '2025_12_09_110652_create_tags_table', 1),
(13, '2025_12_09_110746_create_blog_tags_table', 1),
(14, '2025_12_18_092032_create_brands_table', 1),
(15, '2025_12_19_224349_create_sliders_table', 1),
(16, '2025_12_19_234150_create_banners_table', 1),
(17, '2026_03_16_071514_create_permission_tables', 1),
(18, '2026_03_16_071605_create_personal_access_tokens_table', 1),
(19, '2026_03_29_110136_create_patners_table', 2),
(20, '2026_03_29_110600_create_faqs_table', 2),
(21, '2026_03_29_113314_create_services_table', 3),
(22, '2026_03_30_102755_create_reviews_table', 4),
(23, '2026_03_30_122643_create_why_chooses_table', 5),
(24, '2026_03_31_121308_create_project_categories_table', 5),
(25, '2026_03_31_121315_create_projects_table', 5),
(26, '2026_04_01_064551_create_subscribers_table', 6),
(27, '2026_04_01_065130_create_page_visitors_table', 7),
(28, '2026_04_01_093519_create_contacts_table', 8),
(29, '2026_04_02_063550_create_oddo_apps_table', 9),
(30, '2026_04_02_065700_create_white_papers_table', 10),
(31, '2026_04_12_052654_create_teams_table', 11),
(33, '2026_04_20_060442_create_events_table', 13),
(35, '2026_04_12_053352_create_products_table', 14),
(36, '2026_04_20_061657_create_event_categories_table', 14),
(37, '2026_06_03_053602_create_clients_table', 15),
(38, '2026_06_09_165210_create_project_galleries_table', 16),
(39, '2026_06_09_182038_create_galleries_table', 17),
(40, '2026_06_09_182126_create_gallery_images_table', 17),
(41, '2026_06_10_162900_create_factories_table', 18),
(42, '2026_06_10_162907_create_factory_galleries_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oddo_apps`
--

CREATE TABLE `oddo_apps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oddo_apps`
--

INSERT INTO `oddo_apps` (`id`, `title`, `url`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ertgfretgr', 'https://facebook.com', '{\"original\":\"uploads\\/category\\/69ce115530e621775112533.svg\",\"small\":\"uploads\\/category\\/69ce115530e621775112533.svg\",\"medium\":\"uploads\\/category\\/69ce115530e621775112533.svg\",\"large\":\"uploads\\/category\\/69ce115530e621775112533.svg\"}', 'active', '2026-04-02 00:48:53', '2026-04-02 00:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `page_visitors`
--

CREATE TABLE `page_visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitable_type` varchar(255) NOT NULL,
  `visitable_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patners`
--

CREATE TABLE `patners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patners`
--

INSERT INTO `patners` (`id`, `type`, `title`, `location`, `url`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'test8', 'Kewa, Sreepur, Gazipur\r\nUtility of Building: 4 (Four)Storied Warehouse Building', 'https://bengalbricks.com/', '{\"original\":\"uploads\\/category\\/6a270a94936d91780943508.jpg\",\"small\":\"uploads\\/category\\/6a270a94936d91780943508_400.jpg\",\"medium\":\"uploads\\/category\\/6a270a94936d91780943508_768.jpg\",\"large\":\"uploads\\/category\\/6a270a94936d91780943508_1200.jpg\"}', 'active', '2026-03-29 05:26:35', '2026-06-08 12:31:48'),
(2, 1, 'test6', 'Kewa, Sreepur, Gazipur\r\nUtility of Building: 4 (Four)Storied Warehouse Building', 'https://tasfons.com/', '{\"original\":\"uploads\\/category\\/6a270a85369e11780943493.jpg\",\"small\":\"uploads\\/category\\/6a270a85369e11780943493_400.jpg\",\"medium\":\"uploads\\/category\\/6a270a85369e11780943493_768.jpg\",\"large\":\"uploads\\/category\\/6a270a85369e11780943493_1200.jpg\"}', 'active', '2026-04-02 00:23:58', '2026-06-08 12:31:33'),
(3, 2, 'test4', 'Kewa, Sreepur, Gazipur\r\nUtility of Building: 4 (Four)Storied Warehouse Building', 'https://www.lottobd.com/products/black-sport-slide-for-men-8720619', '{\"original\":\"uploads\\/category\\/6a270a74933511780943476.jpg\",\"small\":\"uploads\\/category\\/6a270a74933511780943476_400.jpg\",\"medium\":\"uploads\\/category\\/6a270a74933511780943476_768.jpg\",\"large\":\"uploads\\/category\\/6a270a74933511780943476_1200.jpg\"}', 'active', '2026-04-04 23:18:47', '2026-06-08 12:31:16'),
(4, 1, 'test3', 'Kewa, Sreepur, Gazipur\r\nUtility of Building: 4 (Four)Storied Warehouse Building', NULL, '{\"original\":\"uploads\\/category\\/6a270a5d755ab1780943453.jpg\",\"small\":\"uploads\\/category\\/6a270a5d755ab1780943453_400.jpg\",\"medium\":\"uploads\\/category\\/6a270a5d755ab1780943453_768.jpg\",\"large\":\"uploads\\/category\\/6a270a5d755ab1780943453_1200.jpg\"}', 'active', '2026-04-25 22:32:07', '2026-06-08 12:30:53'),
(5, 1, 'test2', 'Kewa, Sreepur, Gazipur\r\nUtility of Building: 4 (Four)Storied Warehouse Building', NULL, '{\"original\":\"uploads\\/category\\/6a270a4a967391780943434.jpg\",\"small\":\"uploads\\/category\\/6a270a4a967391780943434_400.jpg\",\"medium\":\"uploads\\/category\\/6a270a4a967391780943434_768.jpg\",\"large\":\"uploads\\/category\\/6a270a4a967391780943434_1200.jpg\"}', 'active', '2026-04-25 22:32:16', '2026-06-08 12:30:34'),
(6, 1, 'test 1', 'Kewa, Sreepur, Gazipur\r\nUtility of Building: 4 (Four)Storied Warehouse Building', NULL, '{\"original\":\"uploads\\/category\\/6a270a3c51a6c1780943420.jpg\",\"small\":\"uploads\\/category\\/6a270a3c51a6c1780943420_400.jpg\",\"medium\":\"uploads\\/category\\/6a270a3c51a6c1780943420_768.jpg\",\"large\":\"uploads\\/category\\/6a270a3c51a6c1780943420_1200.jpg\"}', 'active', '2026-04-25 22:32:24', '2026-06-08 12:30:20'),
(7, 1, 'N E Enterprise', 'Kewa, Sreepur, Gazipur\r\nUtility of Building: 4 (Four)Storied Warehouse Building', NULL, '{\"original\":\"uploads\\/category\\/6a270a2a1012b1780943402.jpg\",\"small\":\"uploads\\/category\\/6a270a2a1012b1780943402_400.jpg\",\"medium\":\"uploads\\/category\\/6a270a2a1012b1780943402_768.jpg\",\"large\":\"uploads\\/category\\/6a270a2a1012b1780943402_1200.jpg\"}', 'active', '2026-04-25 22:32:31', '2026-06-08 12:30:02'),
(8, 1, 'Transcom Electronics Ltd.', 'Transcom Electronics Park, Narsingdi, \r\nUtility of Building: Warehouse Building (Civil & Steel Part, TEPN Project)', NULL, '{\"original\":\"uploads\\/category\\/6a27092b3a0071780943147.jpg\",\"small\":\"uploads\\/category\\/6a27092b3a0071780943147_400.jpg\",\"medium\":\"uploads\\/category\\/6a27092b3a0071780943147_768.jpg\",\"large\":\"uploads\\/category\\/6a27092b3a0071780943147_1200.jpg\"}', 'active', '2026-04-25 22:32:39', '2026-06-08 12:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2026-04-01 00:13:37', '2026-04-01 00:13:37'),
(2, 'role-create', 'web', '2026-04-01 00:13:37', '2026-04-01 00:13:37'),
(3, 'role-edit', 'web', '2026-04-01 00:13:37', '2026-04-01 00:13:37'),
(4, 'role-delete', 'web', '2026-04-01 00:13:37', '2026-04-01 00:13:37'),
(5, 'user-list', 'web', '2026-04-01 00:13:37', '2026-04-01 00:13:37'),
(6, 'user-create', 'web', '2026-04-01 00:13:37', '2026-04-01 00:13:37'),
(7, 'user-edit', 'web', '2026-04-01 00:13:37', '2026-04-01 00:13:37'),
(8, 'user-delete', 'web', '2026-04-01 00:13:37', '2026-04-01 00:13:37'),
(9, 'blog-list', 'web', '2026-04-01 00:33:46', '2026-04-01 00:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `serviceNote` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`serviceNote`)),
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `description` longtext DEFAULT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `description` longtext DEFAULT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `type`, `slug`, `title`, `location`, `size`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Office Building & Warehouse (Steel)', 'dhl-bangladesh', 'DHL Bangladesh', 'Kuril Bishwaroad, Dhaka', '1,25,000 Sft', '{\"original\":\"uploads\\/project\\/69ede993c87be1777199507.jpg\",\"small\":\"uploads\\/project\\/69ede993c87be1777199507_400.jpg\",\"medium\":\"uploads\\/project\\/69ede993c87be1777199507_768.jpg\",\"large\":\"uploads\\/project\\/69ede993c87be1777199507_1200.jpg\"}', NULL, 'inactive', '2026-04-26 04:31:48', '2026-06-09 11:19:06'),
(5, 'Shed Building', 'aci-motors-limited', 'ACI Motors Limited', 'Sreepur, Gazipur', '86,500 Sft.', '{\"original\":\"uploads\\/project\\/69edee77c1b2b1777200759.jpg\",\"small\":\"uploads\\/project\\/69edee77c1b2b1777200759_400.jpg\",\"medium\":\"uploads\\/project\\/69edee77c1b2b1777200759_768.jpg\",\"large\":\"uploads\\/project\\/69edee77c1b2b1777200759_1200.jpg\"}', NULL, 'active', '2026-04-26 04:52:40', '2026-06-09 11:15:25'),
(6, 'Four Storied Commercial Building', 'the-acme-laboratories-limited', 'The ACME Laboratories Limited', 'Dinajpur', '35,476 Sft.', '{\"original\":\"uploads\\/project\\/69edee87000031777200775.jpg\",\"small\":\"uploads\\/project\\/69edee87000031777200775_400.jpg\",\"medium\":\"uploads\\/project\\/69edee87000031777200775_768.jpg\",\"large\":\"uploads\\/project\\/69edee87000031777200775_1200.jpg\"}', NULL, 'active', '2026-04-26 04:52:55', '2026-06-09 11:12:34'),
(8, NULL, 'annual-conference-2026', 'Annual Conference 2026', NULL, NULL, NULL, NULL, 'active', '2026-06-09 13:02:48', '2026-06-09 13:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE `project_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `title`, `type`, `status`, `created_at`, `updated_at`) VALUES
(2, 'sdefewfrefref', NULL, 'active', '2026-03-31 06:24:57', '2026-03-31 06:24:57'),
(3, 'test', 1, 'active', '2026-04-04 22:47:49', '2026-04-04 22:47:49'),
(4, 'test', 1, 'active', '2026-04-04 22:51:19', '2026-04-04 22:51:19'),
(5, 'test', 1, 'active', '2026-04-04 22:52:22', '2026-04-04 22:52:22'),
(6, 'test', 2, 'active', '2026-04-04 22:52:59', '2026-04-04 22:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `project_galleries`
--

CREATE TABLE `project_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `gallery` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_galleries`
--

INSERT INTO `project_galleries` (`id`, `project_id`, `gallery`, `created_at`, `updated_at`) VALUES
(1, 6, '{\"original\":\"uploads\\/projects\\/6\\/1781025086_6a28493e8e41a.jpeg\"}', '2026-06-09 11:11:26', '2026-06-09 11:11:26'),
(2, 6, '{\"original\":\"uploads\\/projects\\/6\\/1781025086_6a28493e9e855.jpeg\"}', '2026-06-09 11:11:26', '2026-06-09 11:11:26'),
(3, 6, '{\"original\":\"uploads\\/projects\\/6\\/1781025086_6a28493eacf00.jpeg\"}', '2026-06-09 11:11:26', '2026-06-09 11:11:26'),
(4, 6, '{\"original\":\"uploads\\/projects\\/6\\/1781025086_6a28493ed38f4.jpeg\"}', '2026-06-09 11:11:26', '2026-06-09 11:11:26'),
(5, 6, '{\"original\":\"uploads\\/projects\\/6\\/1781025087_6a28493f0228c.jpeg\"}', '2026-06-09 11:11:27', '2026-06-09 11:11:27'),
(6, 5, '{\"original\":\"uploads\\/projects\\/5\\/1781025325_6a284a2d95826.jpeg\"}', '2026-06-09 11:15:25', '2026-06-09 11:15:25'),
(7, 5, '{\"original\":\"uploads\\/projects\\/5\\/1781025325_6a284a2d962d3.jpeg\"}', '2026-06-09 11:15:25', '2026-06-09 11:15:25'),
(8, 5, '{\"original\":\"uploads\\/projects\\/5\\/1781025325_6a284a2d96ac1.jpeg\"}', '2026-06-09 11:15:25', '2026-06-09 11:15:25'),
(9, 5, '{\"original\":\"uploads\\/projects\\/5\\/1781025325_6a284a2d972ae.jpeg\"}', '2026-06-09 11:15:25', '2026-06-09 11:15:25'),
(10, 5, '{\"original\":\"uploads\\/projects\\/5\\/1781025325_6a284a2d97a52.jpeg\"}', '2026-06-09 11:15:25', '2026-06-09 11:15:25'),
(11, 4, '{\"original\":\"uploads\\/projects\\/4\\/1781025365_6a284a55c2d48.jpeg\"}', '2026-06-09 11:16:05', '2026-06-09 11:16:05'),
(12, 4, '{\"original\":\"uploads\\/projects\\/4\\/1781025365_6a284a55c4600.jpeg\"}', '2026-06-09 11:16:05', '2026-06-09 11:16:05'),
(13, 4, '{\"original\":\"uploads\\/projects\\/4\\/1781025365_6a284a55c4de3.jpeg\"}', '2026-06-09 11:16:05', '2026-06-09 11:16:05'),
(14, 4, '{\"original\":\"uploads\\/projects\\/4\\/1781025365_6a284a55c8565.jpeg\"}', '2026-06-09 11:16:05', '2026-06-09 11:16:05'),
(15, 4, '{\"original\":\"uploads\\/projects\\/4\\/1781025365_6a284a55c8d6a.jpeg\"}', '2026-06-09 11:16:05', '2026-06-09 11:16:05'),
(16, 8, '{\"original\":\"uploads\\/projects\\/8\\/1781031768_6a2863587f1de.jpeg\"}', '2026-06-09 13:02:48', '2026-06-09 13:02:48'),
(17, 8, '{\"original\":\"uploads\\/projects\\/8\\/1781031768_6a28635894f60.jpeg\"}', '2026-06-09 13:02:48', '2026-06-09 13:02:48'),
(18, 8, '{\"original\":\"uploads\\/projects\\/8\\/1781031768_6a28635895754.jpeg\"}', '2026-06-09 13:02:48', '2026-06-09 13:02:48'),
(19, 8, '{\"original\":\"uploads\\/projects\\/8\\/1781031768_6a28635895f34.jpeg\"}', '2026-06-09 13:02:48', '2026-06-09 13:02:48'),
(20, 8, '{\"original\":\"uploads\\/projects\\/8\\/1781031768_6a2863589acef.jpeg\"}', '2026-06-09 13:02:48', '2026-06-09 13:02:48'),
(21, 8, '{\"original\":\"uploads\\/projects\\/8\\/1781031768_6a2863589f666.jpeg\"}', '2026-06-09 13:02:48', '2026-06-09 13:02:48'),
(22, 8, '{\"original\":\"uploads\\/projects\\/8\\/1781031768_6a286358ab091.jpeg\"}', '2026-06-09 13:02:48', '2026-06-09 13:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `designation` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `title`, `review`, `rating`, `image`, `designation`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sdfcdsfcv', 'dsfvcdvgdvgdvgdfv', '4', '{\"original\":\"uploads\\/category\\/69ca55a28a36c1774867874.jpg\",\"small\":\"uploads\\/category\\/69ca55a28a36c1774867874_400.jpg\",\"medium\":\"uploads\\/category\\/69ca55a28a36c1774867874_768.jpg\",\"large\":\"uploads\\/category\\/69ca55a28a36c1774867874_1200.jpg\"}', 'dsvdgvd', 'active', '2026-03-30 04:50:46', '2026-03-30 04:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2026-04-01 00:17:55', '2026-04-01 00:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `serviceNote` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`serviceNote`)),
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `description` longtext DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `serviceNote`, `image`, `description`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'drfegvredgvrtfrtv', 'drfegvredgvrtfrtv', '[{\"note_icon\":\"fa-check-circle\",\"note_title\":\"dfgvdrfgvdfrgv\",\"note_description\":\"rfgvdfbvdfbvfbv\"}]', '{\"original\":\"uploads\\/service\\/69ca56f5cf48d1774868213.jpg\",\"small\":\"uploads\\/service\\/69ca56f5cf48d1774868213_400.jpg\",\"medium\":\"uploads\\/service\\/69ca56f5cf48d1774868213_768.jpg\",\"large\":\"uploads\\/service\\/69ca56f5cf48d1774868213_1200.jpg\"}', '<p><i class=\"fa fa-home\" style=\"margin:0 3px;\"></i>ewrewrtfetgretygryghrt<i class=\"fa fa-exclamation-circle\" style=\"margin:0 3px;\">yhutyhjutyjutyjtyujyu</i></p>', NULL, 'active', '2026-03-30 04:56:54', '2026-03-30 06:00:54'),
(2, 'sqawdswadfeswfef', 'sqawdswadfeswfef', NULL, '{\"original\":\"uploads\\/service\\/69cbc1b125d141774961073.jpg\",\"small\":\"uploads\\/service\\/69cbc1b125d141774961073_400.jpg\",\"medium\":\"uploads\\/service\\/69cbc1b125d141774961073_768.jpg\",\"large\":\"uploads\\/service\\/69cbc1b125d141774961073_1200.jpg\"}', '<p>dsfdsfvdgvdrgv</p>', NULL, 'active', '2026-03-31 06:44:33', '2026-03-31 06:44:33'),
(3, 'sawedwdrw', 'sawedwdrw', '[{\"note_icon\":\"fa-check-circle\",\"note_title\":\"dfgvdrfgvdfrgv\",\"note_description\":\"wedrwrdfewr\"}]', '{\"original\":\"uploads\\/service\\/69ce098a687f51775110538.png\",\"small\":\"uploads\\/service\\/69ce098a687f51775110538_400.png\",\"medium\":\"uploads\\/service\\/69ce098a687f51775110538_768.png\",\"large\":\"uploads\\/service\\/69ce098a687f51775110538_1200.png\"}', '<p>wedwrdwrdfw</p>', 1, 'active', '2026-04-02 00:15:41', '2026-04-02 00:15:41'),
(4, 'erferfe', 'erferfe', '[{\"note_icon\":\"fa-check-circle\",\"note_title\":\"dfgvdrfgvdfrgv\",\"note_description\":\"erftetgfre\"}]', '{\"original\":\"uploads\\/service\\/69d1f255d5bde1775366741.jpg\",\"small\":\"uploads\\/service\\/69d1f255d5bde1775366741_400.jpg\",\"medium\":\"uploads\\/service\\/69d1f255d5bde1775366741_768.jpg\",\"large\":\"uploads\\/service\\/69d1f255d5bde1775366741_1200.jpg\"}', '<p>fetfetgfre</p>', 2, 'active', '2026-04-04 23:25:42', '2026-04-04 23:25:42'),
(5, 'drfdretgretygr', 'drfdretgretygr', '[{\"note_icon\":\"fa-check-circle\",\"note_title\":\"rtgrygr\",\"note_description\":\"ygrygr\"}]', '{\"original\":\"uploads\\/service\\/69db345c9a4221775973468.PNG\",\"small\":\"uploads\\/service\\/69db345c9a4221775973468_400.PNG\",\"medium\":\"uploads\\/service\\/69db345c9a4221775973468_768.PNG\",\"large\":\"uploads\\/service\\/69db345c9a4221775973468_1200.PNG\"}', '<p>rtgrygrygrg</p>', 1, 'active', '2026-04-11 23:57:51', '2026-04-11 23:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kz6IZaG6NS0meCTPAheCMV2oMdYZkvCioZNgNLIk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkx5QkJnQXo5QTdNYkc3dmJRSGduVmRmVXNDZXZRRklFUVRVc0M3SiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1781375414),
('oKtjfrBZSBYeV8T6I21sq0Q0LH2wroBaZbR1ysgB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVpxTDJBcE5CZDVSOHJCUmdFTmpyMUQ3TFNLemtkZGc0Tk1wRk1EbyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1781378106),
('PN9FBL5PlW13qAi24IsC0jSZ09fwer2cVg4gmOMA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHJDOHRjdDVoMFRZR2VyWUc1TzN6b2t4b0NMQkFTS05qVFFGb1BYaiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1783878160),
('rq2Fp7c5HziLLVudm8dyvEXTbHLkoJ24wvBPBfxW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGJUVWxNazFDVmo3SHYwdEx1d2xLSW55ODk5WHdMNlhWclFEOFVzNiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYm91dC11cyI7czo1OiJyb3V0ZSI7czo4OiJhYm91dC11cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1781376214),
('woK49mQ1nFlJ8oM1HbKcktZijBiRM42JJRtqwRvr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNmRnNVg4UjZsTmJ0bGNySlBVZzlpSEV5NzdmMGVneGRGYUFNWlVlMSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYm91dC11cyI7czo1OiJyb3V0ZSI7czo4OiJhYm91dC11cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1781376229);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `videoUrl` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `emails` longtext DEFAULT NULL,
  `whitebglogo` varchar(255) DEFAULT NULL,
  `phones` longtext DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `iosUrl` varchar(255) DEFAULT NULL,
  `androidUrl` varchar(255) DEFAULT NULL,
  `webUrl` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `google_pixle` varchar(255) DEFAULT NULL,
  `facebook_pixle` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `wp` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkdi` varchar(255) DEFAULT NULL,
  `term_condition` longtext DEFAULT NULL,
  `privacy_policy` longtext DEFAULT NULL,
  `return_policy` longtext DEFAULT NULL,
  `about_us` longtext DEFAULT NULL,
  `addresses` longtext DEFAULT NULL,
  `footer_content` longtext DEFAULT NULL,
  `footerLogoFirst` varchar(191) DEFAULT NULL,
  `footerLogoSecond` varchar(191) DEFAULT NULL,
  `brochure` varchar(255) DEFAULT NULL,
  `map` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `logo`, `videoUrl`, `favicon`, `emails`, `whitebglogo`, `phones`, `currency`, `position`, `url`, `iosUrl`, `androidUrl`, `webUrl`, `seo_title`, `seo_description`, `google_pixle`, `facebook_pixle`, `fb`, `wp`, `twitter`, `youtube`, `linkdi`, `term_condition`, `privacy_policy`, `return_policy`, `about_us`, `addresses`, `footer_content`, `footerLogoFirst`, `footerLogoSecond`, `brochure`, `map`, `created_at`, `updated_at`) VALUES
(1, 'ZAHID STEEL LIMITED', 'uploads/images/projects/1780888225_logo.jpeg', 'TIN: 769190945277', 'uploads/images/projects/1780888101_favicon.jpeg', '[\"info@zahidsteel.com\"]', 'uploads/images/projects/1781062539_whitebglogo.jpg', '[\"01713-355637\"]', NULL, NULL, 'https://zahidsteelltd.com/', 'C-111383/13', NULL, 'https://zahidsteelltd.com/', 'Zahid Steel Structure Ltd', 'Zahid Steel Structure Ltd. is a prominent pre-fabricated steel building manufacturer in Bangladesh with a group of experienced', NULL, NULL, NULL, NULL, NULL, 'https://youtube.com/@zahidsteelltd?si=J2f8PK4PPiN4V8d9', 'https://www.linkedin.com/company/zahid-steel-limited/', NULL, NULL, NULL, NULL, '[\"House#13, Road# 10\\/A, Sector#09,Uttara, Dhaka-1230\",\"Bhawal Badre Alam Govt. College(opposition),Chandona Chowrasta, Gazipur City\"]', NULL, NULL, NULL, 'uploads/images/projects/1781063088_brochure.pdf', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7296.590764642809!2d90.39123773574832!3d23.87914223240983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c438fb7814bb%3A0x4badb30ca9c36544!2sHANSA%20-%20A%20Premium%20Residence!5e0!3m2!1sen!2sbd!4v1781034034642!5m2!1sen!2sbd\" width=\"100%\" height=\"400\" frameborder=\"0\" style=\"border:0\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2026-03-25 04:15:47', '2026-06-09 21:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `media_type` varchar(191) DEFAULT NULL,
  `video` varchar(191) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `type`, `media_type`, `video`, `title`, `sub_title`, `url`, `image`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(19, NULL, 'image', NULL, 'dferefef', NULL, NULL, '\"{\\\"original\\\":\\\"uploads\\\\\\/slider\\\\\\/images\\\\\\/1780884508_6a26241c607cf.jpeg\\\"}\"', 'active', NULL, '2026-05-06 01:59:46', '2026-06-07 20:08:28'),
(20, 1, 'image', NULL, 'sdeswrfed', 'fdrvdre', NULL, '\"{\\\"original\\\":\\\"uploads\\\\\\/slider\\\\\\/images\\\\\\/1780884496_6a262410e9b28.jpeg\\\"}\"', 'active', NULL, '2026-05-06 02:00:29', '2026-06-07 20:08:16'),
(21, 1, 'image', NULL, 'dfvdgvdfgbf', 'gfbfb', NULL, '\"{\\\"original\\\":\\\"uploads\\\\\\/slider\\\\\\/images\\\\\\/1780884487_6a26240723d5b.jpeg\\\"}\"', 'active', NULL, '2026-05-06 02:02:14', '2026-06-07 20:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'm@gmail.com', 'active', '2026-04-01 03:30:51', '2026-04-01 03:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ewrfetfesf', 'active', '2026-03-30 06:12:00', '2026-03-30 06:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `wp` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `teamType` int(11) DEFAULT NULL,
  `linkdi` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `image`, `name`, `designation`, `description`, `fb`, `wp`, `twitter`, `youtube`, `teamType`, `linkdi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/images/projects/1781037884.jpg', 'mohsin', 'gdfhhb', 'retgretgrygh', NULL, NULL, NULL, NULL, 2, NULL, 'active', '2026-06-09 14:44:44', '2026-06-09 21:11:01'),
(2, 'uploads/images/projects/1781037898.jpg', 'dfefdreg', 'grtfgrtfh', 'fgrftgrftgh', NULL, NULL, NULL, NULL, 1, NULL, 'active', '2026-06-09 14:44:58', '2026-06-09 21:10:55'),
(3, 'uploads/images/projects/1781060801.jpg', 'rtfetgry', 'gryghrtyhthu', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'active', '2026-06-09 21:06:41', '2026-06-09 21:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `roleType` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `phone`, `avatar`, `address`, `city`, `zip`, `country`, `roleType`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', NULL, '$2y$12$zNUNY16gd3Dw5zKLRgCaKemzKBPwSeYHt.oNfYdo4C/0S3GJx0pM2', NULL, NULL, NULL, '01706125400', NULL, NULL, NULL, NULL, NULL, 'user', 'active', NULL, '2026-03-24 23:18:44', '2026-04-01 00:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `white_papers`
--

CREATE TABLE `white_papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `pdfFile` varchar(255) DEFAULT NULL,
  `serviceNote` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`serviceNote`)),
  `short_description` text DEFAULT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `white_papers`
--

INSERT INTO `white_papers` (`id`, `title`, `image`, `pdfFile`, `serviceNote`, `short_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dfefr', '{\"original\":\"uploads\\/white_paper\\/69ce182e95cfb1775114286.webp\",\"small\":\"uploads\\/white_paper\\/69ce182e95cfb1775114286_400.webp\",\"medium\":\"uploads\\/white_paper\\/69ce182e95cfb1775114286_768.webp\",\"large\":\"uploads\\/white_paper\\/69ce182e95cfb1775114286_1200.webp\"}', 'uploads/white_paper/pdf/69ce182ef121a1775114286.pdf', '[{\"note_icon\":\"fa-check-circle\",\"note_title\":\"dfgvdrfgvdfrgv\",\"note_url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/oddo\\/white-paper\"}]', 'sdeeswfregfre', 'active', '2026-04-02 01:18:06', '2026-04-02 01:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `why_chooses`
--

CREATE TABLE `why_chooses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('active','inactive','delete') NOT NULL DEFAULT 'active',
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_chooses`
--

INSERT INTO `why_chooses` (`id`, `title`, `icon`, `description`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'frefefef', 'fa-check-square', '<p>fredfregfvrtg</p>', 'active', NULL, '2026-03-31 07:03:10', '2026-03-31 07:04:13'),
(2, 'esdrfedstfetgfe', 'fa-check-circle', '<p>rfredfretgfretg</p>', 'active', 1, '2026-04-02 00:30:39', '2026-04-02 00:30:39'),
(3, 'esdewsdf', 'fa-check', '<p>eswdrfewrfe</p>', 'active', 2, '2026-04-04 23:12:28', '2026-04-04 23:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `wp` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `linkdi` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `image`, `name`, `designation`, `description`, `fb`, `wp`, `twitter`, `youtube`, `linkdi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/images/projects/1774872712.webp', 'ertfretgf', 'rrygryghtge', 'rtyghrthtr', NULL, NULL, NULL, NULL, NULL, 'active', '2026-03-30 06:11:52', '2026-03-30 06:11:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_writers`
--
ALTER TABLE `blog_writers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_configs`
--
ALTER TABLE `email_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factories`
--
ALTER TABLE `factories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factory_galleries`
--
ALTER TABLE `factory_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_available_at_index` (`queue`,`reserved_at`,`available_at`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oddo_apps`
--
ALTER TABLE `oddo_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_visitors`
--
ALTER TABLE `page_visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_visitors_visitable_type_visitable_id_index` (`visitable_type`,`visitable_id`),
  ADD KEY `page_visitors_user_id_foreign` (`user_id`),
  ADD KEY `page_visitors_ip_visitable_id_visitable_type_index` (`ip`,`visitable_id`,`visitable_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patners`
--
ALTER TABLE `patners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Indexes for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_galleries`
--
ALTER TABLE `project_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `white_papers`
--
ALTER TABLE `white_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_chooses`
--
ALTER TABLE `why_chooses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_writers`
--
ALTER TABLE `blog_writers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_configs`
--
ALTER TABLE `email_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `factories`
--
ALTER TABLE `factories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `factory_galleries`
--
ALTER TABLE `factory_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `oddo_apps`
--
ALTER TABLE `oddo_apps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_visitors`
--
ALTER TABLE `page_visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patners`
--
ALTER TABLE `patners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_galleries`
--
ALTER TABLE `project_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `white_papers`
--
ALTER TABLE `white_papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_chooses`
--
ALTER TABLE `why_chooses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_visitors`
--
ALTER TABLE `page_visitors`
  ADD CONSTRAINT `page_visitors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
