-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2025 at 09:07 AM
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
-- Database: `hstudios_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `balance`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Main Business Account', 1018.82, 1, '2025-08-16 10:15:43', '2025-08-16 10:15:47'),
(2, 'Savings Account', 1419.10, 1, '2025-08-16 10:15:43', '2025-08-16 10:15:47'),
(3, 'Inactive Old Account', 0.00, 0, '2025-08-16 10:15:43', '2025-08-16 10:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `is_active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `sub_title`, `slug`, `meta_keyword`, `meta_description`, `meta_title`, `details`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Getting Started with Laravel', 'A beginner guide to Laravel framework', 'getting-started-with-laravel', 'Laravel, PHP, Web Development', 'Learn how to get started with Laravel, one of the most popular PHP frameworks.', 'Getting Started with Laravel', 'Laravel is a web application framework with expressive, elegant syntax...', 1, '2025-08-16 10:15:43', '2025-08-20 04:46:29'),
(2, 'Why SEO Matters', 'Understanding the basics of SEO', 'why-seo-matters', 'SEO, Marketing, Meta Tags', 'Explore why search engine optimization is essential for your website.', 'Why SEO Matters', 'Search Engine Optimization (SEO) helps increase the visibility of your website...', 1, '2025-08-16 10:15:43', '2025-08-20 07:31:42'),
(3, 'Laravel Tips for Developers', 'Boost your Laravel productivity', 'laravel-tips-for-developers', 'Laravel, Tips, Tricks', 'Handy Laravel tips to write cleaner, faster code.', 'Laravel Tips for Developers', 'Laravel provides many hidden features that can help you become more productive...', 1, '2025-08-16 10:15:43', '2025-08-22 16:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `career_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `behance` varchar(255) DEFAULT NULL,
  `is_hired` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `career_id`, `first_name`, `last_name`, `email`, `phone`, `country`, `city`, `linkedin`, `github`, `behance`, `is_hired`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ahmed', 'Hassan', 'ahmed@example.com', '01012345678', 'Egypt', 'Cairo', 'https://linkedin.com/in/ahmedhassan', 'https://github.com/ahmedhassan', 'https://behance.net/ahmedhassan', 0, '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(2, 2, 'Salma', 'Mohamed', 'salma@example.com', '01098765432', 'Egypt', 'Alexandria', 'https://linkedin.com/in/salmamohamed', 'https://github.com/salmamohamed', NULL, 1, '2025-08-16 10:15:47', '2025-08-16 10:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `experience_level` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `min_salary` decimal(10,2) DEFAULT NULL,
  `max_salary` decimal(10,2) DEFAULT NULL,
  `is_active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `is_published` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `title`, `currency`, `type`, `experience_level`, `details`, `min_salary`, `max_salary`, `is_active`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'Senior Laravel Developer', 'USD', 'Full-time', 'Senior', 'Responsible for backend development and API integration.', 4000.00, 6000.00, 1, 1, '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(2, 'Junior Frontend Developer', 'EUR', 'Part-time', 'Junior', 'Assist in building and maintaining web interfaces using Vue.js.', 1000.00, 2000.00, 1, 0, '2025-08-16 10:15:47', '2025-08-16 10:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_field` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `password`, `company_name`, `company_field`, `created_at`, `updated_at`) VALUES
(1, 'Nada Amr', 'nada@example.com', '$2y$12$dmYjPdgq0C026EAqECLbcuABO7zFvIj.vUQ2.VFuPSuVHQBMllUxa', 'Tech Solutions', 'Software Development', '2025-08-16 10:15:49', '2025-08-16 10:15:49'),
(2, 'Omar Ali', 'omar@example.com', '$2y$12$AkrnNwYCkrJuWgrXLiAp/OQVG51BOGBApFgCOLKFrbF/YNyuCnypG', 'Creative Studio', 'Marketing', '2025-08-16 10:15:50', '2025-08-16 10:15:50'),
(3, 'Nada amr', 'nadamr444@gmail.com', '$2y$12$e.g7GLm9Qqd5T2.jiNaVROjb6tFlzutcNTKE1z6.Who9.x/03Yso2', 'Tech Solutions', 'Software Development', '2025-08-21 07:20:17', '2025-08-21 07:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Nada Amr', 'nada@example.com', '01001234567', 'Inquiry about services', 'Hi, I would like to know more about your offerings.', '2025-08-16 10:15:53', '2025-08-16 10:15:53'),
(2, 'Ali Mahmoud', 'ali@example.com', '01122334455', 'Feedback', 'Great work, keep it up!', '2025-08-16 10:15:53', '2025-08-16 10:15:53'),
(3, 'Sara Youssef', 'sara@example.com', '01233445566', 'Support request', 'I’m having trouble accessing my account.', '2025-08-16 10:15:53', '2025-08-16 10:15:53'),
(4, 'Nada amr', 'nadamr444@gmail.com', '01094432194', 'meeting resource', '@if (session(\'success_message\'))@if (session(\'success_message\'))@if (session(\'success_message\'))@if (session(\'success_message\'))', '2025-08-18 11:27:25', '2025-08-18 11:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `client_id`, `name`, `service_request_id`, `status`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, 'Website Redesign', 1, 'pending', 'This deal is automatically generated for testing.', '2025-08-16 10:15:50', '2025-08-16 10:15:50'),
(2, 1, 'Website Redesign', 2, 'pending', 'This deal is automatically generated for testing.', '2025-08-16 10:15:50', '2025-08-16 10:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `deal_service`
--

CREATE TABLE `deal_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deal_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal_service`
--

INSERT INTO `deal_service` (`id`, `deal_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `behance` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `job`, `linkedin`, `github`, `behance`, `salary`, `created_at`, `updated_at`) VALUES
(1, 'Sarah Ahmed', 'sarah@example.com', '01012345678', 'Frontend Developer', 'https://linkedin.com/in/sarah', 'https://github.com/sarahdev', 'https://behance.net/sarahdesign', 12000.00, '2025-08-16 10:15:53', '2025-08-16 10:15:53'),
(2, 'Mohamed Youssef', 'mohamed@example.com', '01087654321', 'Backend Developer', 'https://linkedin.com/in/mohamed', 'https://github.com/mohameddev', NULL, 14000.00, '2025-08-16 10:15:53', '2025-08-16 10:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `expense_source_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `expense_date` date NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `account_id`, `expense_source_id`, `title`, `amount`, `expense_date`, `details`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'suscipit doloremque perspiciatis', 38809.46, '2025-07-28', 'Omnis esse unde voluptatem autem aut quibusdam eius.', '2025-08-16 10:15:46', '2025-08-16 10:15:46'),
(2, 2, 5, 'incidunt voluptatem nihil', 1985.92, '2025-08-03', NULL, '2025-08-16 10:15:46', '2025-08-16 10:15:46'),
(3, 1, 4, 'nihil debitis eum', 82879.80, '2025-08-14', NULL, '2025-08-16 10:15:46', '2025-08-16 10:15:46'),
(4, 2, 4, 'ducimus aut alias', 1595.64, '2025-07-27', 'Vel ut modi qui corrupti.', '2025-08-16 10:15:46', '2025-08-16 10:15:46'),
(5, 2, 2, 'numquam quia exercitationem', 3852.79, '2025-07-24', 'Dolor impedit iste nostrum nihil cumque repellendus.', '2025-08-16 10:15:46', '2025-08-16 10:15:46'),
(6, 1, 3, 'quia mollitia voluptas', 6648.12, '2025-07-30', NULL, '2025-08-16 10:15:46', '2025-08-16 10:15:46'),
(7, 1, 5, 'sint sunt similique', 3463.54, '2025-08-12', 'Qui ducimus ea incidunt possimus eos doloremque.', '2025-08-16 10:15:46', '2025-08-16 10:15:46'),
(8, 1, 5, 'est et in', 1212.12, '2025-07-17', NULL, '2025-08-16 10:15:46', '2025-08-16 10:15:46'),
(9, 1, 1, 'commodi ipsam voluptatibus', 1160.75, '2025-07-17', NULL, '2025-08-16 10:15:46', '2025-08-16 10:15:46'),
(10, 1, 2, 'aut quo aut', 366.85, '2025-07-17', NULL, '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(11, 2, 3, 'voluptas deleniti sequi', 1137.09, '2025-07-22', 'Ea enim quia maxime officia iusto.', '2025-08-16 10:15:47', '2025-08-16 10:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `expense_sources`
--

CREATE TABLE `expense_sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `is_active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_sources`
--

INSERT INTO `expense_sources` (`id`, `name`, `details`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Office Rent', 'Monthly rent for office space', 1, '2025-08-16 10:15:44', '2025-08-16 10:15:44'),
(2, 'Software Subscriptions', 'Recurring SaaS payments', 1, '2025-08-16 10:15:44', '2025-08-16 10:15:44'),
(3, 'Utilities', 'Electricity, internet, and water bills', 1, '2025-08-16 10:15:44', '2025-08-16 10:15:44'),
(4, 'Team Lunches', 'Occasional team bonding meals', 1, '2025-08-16 10:15:44', '2025-08-16 10:15:44'),
(5, 'Advertising', 'Social media and search engine ad spend', 1, '2025-08-16 10:15:44', '2025-08-16 10:15:44');

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
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `income_source_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `income_date` date NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `account_id`, `income_source_id`, `title`, `amount`, `income_date`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Client A Payment', 2500.00, '2025-08-09', 'Monthly retainer from Client A', '2025-08-16 10:15:43', '2025-08-16 10:15:43'),
(2, 1, 2, 'E-Book Sales', 750.00, '2025-08-13', 'Automated sales income', '2025-08-16 10:15:43', '2025-08-16 10:15:43'),
(3, 2, 3, 'Consulting Session', 1200.00, '2025-08-16', '1-on-1 consulting service', '2025-08-16 10:15:44', '2025-08-16 10:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `income_sources`
--

CREATE TABLE `income_sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `is_active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_sources`
--

INSERT INTO `income_sources` (`id`, `name`, `details`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Client Payments', 'Monthly payments from clients for service contracts.', 1, '2025-08-16 10:15:43', '2025-08-16 10:15:43'),
(2, 'Product Sales', 'Income from software product sales.', 1, '2025-08-16 10:15:43', '2025-08-16 10:15:43'),
(3, 'Consulting Services', 'Fees from consulting and freelance projects.', 1, '2025-08-16 10:15:43', '2025-08-16 10:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `career_id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `interview_date` date NOT NULL,
  `duration` decimal(8,2) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`id`, `career_id`, `candidate_id`, `type`, `interview_date`, `duration`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'online', '2025-09-03', 2.20, 'Dolores iure est ex nihil accusantium facere ullam molestias.', '2025-08-16 10:15:48', '2025-08-16 10:15:48'),
(2, 2, 2, 'online', '2025-08-24', 1.30, 'Ut doloremque odit dolorem.', '2025-08-16 10:15:48', '2025-08-16 10:15:48'),
(3, 1, 1, 'offline', '2025-08-30', 3.00, 'Illo odio ut est fugit aperiam.', '2025-08-16 10:15:48', '2025-08-16 10:15:48'),
(4, 2, 1, 'offline', '2025-09-05', 0.90, 'Dicta ipsa aut excepturi cupiditate maxime.', '2025-08-16 10:15:48', '2025-08-16 10:15:48'),
(5, 1, 1, 'online', '2025-09-03', 2.80, 'Alias qui aperiam quibusdam quis autem nihil et.', '2025-08-16 10:15:48', '2025-08-16 10:15:48'),
(6, 2, 2, 'online', '2025-08-19', 2.80, 'Voluptatem mollitia at quidem doloribus nihil.', '2025-08-16 10:15:48', '2025-08-16 10:15:48'),
(7, 1, 1, 'offline', '2025-09-02', 1.10, 'Voluptates adipisci et ea ipsum.', '2025-08-16 10:15:48', '2025-08-16 10:15:48'),
(8, 2, 1, 'online', '2025-08-23', 0.70, 'Culpa cum voluptatum sed neque aut suscipit reprehenderit.', '2025-08-16 10:15:48', '2025-08-16 10:15:48'),
(9, 1, 1, 'offline', '2025-08-29', 1.10, 'Nesciunt eligendi nam illo minus distinctio architecto maiores amet.', '2025-08-16 10:15:48', '2025-08-16 10:15:48'),
(10, 2, 2, 'offline', '2025-09-04', 3.00, 'Nam natus rem fuga et beatae.', '2025-08-16 10:15:48', '2025-08-16 10:15:48');

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
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `career_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `behance` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `career_id`, `first_name`, `last_name`, `email`, `phone`, `country`, `city`, `linkedin`, `github`, `behance`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'John', 'Doe', 'john.doe@example.com', '+1-555-123-4567', 'USA', 'New York', 'https://linkedin.com/in/johndoe', 'https://github.com/johndoe', NULL, NULL, '2025-08-16 10:15:48', '2025-08-16 10:15:48'),
(2, 1, 'Jane', 'Smith', 'jane.smith@example.com', '+1-555-987-6543', 'USA', 'Los Angeles', 'https://linkedin.com/in/janesmith', 'https://github.com/janesmith', 'https://www.behance.net/janesmith', NULL, '2025-08-16 10:15:48', '2025-08-16 10:15:48'),
(3, 2, 'Farah', 'Ahmed', 'amrfarah27@gmail.com', '01211059120', 'Egypt', 'Giza', 'https://linkedin.com/in/nada', 'https://github.com/in/nada', 'https://behance.net/nadadesign', NULL, '2025-08-23 17:38:05', '2025-08-23 17:38:05');

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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\Blog', 1, '3070735e-d5cf-43a2-91fe-f551faa875f7', 'blog_images', 'blog-img1', 'blog-img1.jpg', 'image/jpeg', 'public', 'public', 46831, '[]', '[]', '[]', '[]', 1, '2025-08-20 07:00:32', '2025-08-20 07:00:32'),
(4, 'App\\Models\\Blog', 3, '1cf722c5-f74c-4b27-a036-31cb0afdf402', 'blog_images', 'blog-img2', 'blog-img2.jpg', 'image/jpeg', 'public', 'public', 27090, '[]', '[]', '[]', '[]', 1, '2025-08-20 07:31:26', '2025-08-20 07:31:26'),
(5, 'App\\Models\\Blog', 2, '56c34cbb-dc2d-4e8c-9bd5-943a744a2427', 'blog_images', 'blog-img3', 'blog-img3.jpg', 'image/jpeg', 'public', 'public', 36503, '[]', '[]', '[]', '[]', 1, '2025-08-20 07:31:42', '2025-08-20 07:31:42'),
(6, 'App\\Models\\Employee', 2, 'f118a4f7-d5b9-47c4-abf3-5ca3bb3d1b95', 'employee_images', 'team-img2', 'team-img2.png', 'image/png', 'public', 'public', 215329, '[]', '[]', '[]', '[]', 1, '2025-08-22 19:26:44', '2025-08-22 19:26:44'),
(7, 'App\\Models\\Employee', 1, 'd6b89951-31b2-4cf6-86c6-12b502959f2c', 'employee_images', 'team-img4', 'team-img4.png', 'image/png', 'public', 'public', 141509, '[]', '[]', '[]', '[]', 1, '2025-08-22 19:27:07', '2025-08-22 19:27:07'),
(8, 'App\\Models\\Job_Application', 3, '54f8b7ca-29fe-495d-82a7-8768aab571bd', 'application_images', 'team-img3', 'team-img3.png', 'image/png', 'public', 'public', 836871, '[]', '[]', '[]', '[]', 1, '2025-08-23 17:38:10', '2025-08-23 17:38:10'),
(9, 'App\\Models\\Job_Application', 3, 'fa8c827a-bc1e-446b-b257-e5f27c8b406f', 'application_cv', 'HR emails', 'HR-emails.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 'public', 16446, '[]', '[]', '[]', '[]', 2, '2025-08-23 17:38:12', '2025-08-23 17:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `deal_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `meet_date` date NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `client_id`, `deal_id`, `subject`, `type`, `address`, `meet_date`, `details`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Mollitia error itaque.', 'In-person', '9204 Kenyon Vista\nPowlowskishire, VA 83519-9114', '2025-09-20', NULL, '2025-08-24 03:59:03', '2025-08-24 03:59:03'),
(2, 2, 2, 'Et consequuntur explicabo.', 'In-person', '55965 Wolff Green\nLubowitzburgh, OH 52348-1246', '2025-09-08', NULL, '2025-08-24 03:59:03', '2025-08-24 03:59:03'),
(3, 1, 1, 'Omnis qui voluptatum.', 'Online', '7356 Zulauf Lodge\nPort Shirleychester, ND 43930', '2025-09-03', 'Optio aspernatur non consequuntur voluptatem vero voluptas est. Enim ea tempora possimus in perspiciatis voluptatem. Non enim molestiae minima quae. Sapiente in quae ab. Expedita omnis minus quidem autem et.', '2025-08-24 03:59:03', '2025-08-24 03:59:03'),
(4, 2, 2, 'At provident.', 'Online', '870 Schoen Row\nPort Erickaland, IN 89275', '2025-09-13', NULL, '2025-08-24 03:59:03', '2025-08-24 03:59:03'),
(5, 1, 1, 'Fugiat nulla a.', 'Phone Call', '5408 Oliver Port Apt. 078\nPort Matildeport, NM 91144', '2025-09-07', 'Neque non alias quis dolor repellat qui. Vel dolores distinctio distinctio expedita repudiandae et. Vitae aut repellendus eveniet et quia tempore.', '2025-08-24 03:59:03', '2025-08-24 03:59:03'),
(6, 3, 1, 'Sapiente molestiae qui porro.', 'Phone Call', '8890 Goldner Field Apt. 954\nNorth Brookschester, OR 54811', '2025-09-09', NULL, '2025-08-24 03:59:03', '2025-08-24 03:59:03'),
(7, 2, 1, 'Expedita officiis eum harum.', 'Online', '36079 Collier Manor Apt. 208\nUlisesmouth, SD 63633', '2025-09-16', NULL, '2025-08-24 03:59:03', '2025-08-24 03:59:03'),
(8, 2, 1, 'Dolor corporis et minus.', 'Phone Call', '13050 Marquardt Haven Apt. 716\nPort Jeanie, NV 38120', '2025-09-04', 'Ut illum est enim architecto rem officiis nihil. Nihil reiciendis est rerum eum ut qui. Architecto reprehenderit distinctio nobis sed incidunt. Et repellat quia voluptas fugit.', '2025-08-24 03:59:03', '2025-08-24 03:59:03'),
(9, 3, 1, 'Repellendus ducimus omnis voluptatem.', 'Online', '91704 Kub Rapids Apt. 895\nTerrancestad, CT 04489-3544', '2025-09-14', NULL, '2025-08-24 03:59:03', '2025-08-24 03:59:03'),
(10, 3, 2, 'Laudantium sed incidunt.', 'Online', '264 Murphy Fields\nNorth Hilario, MN 16659-4622', '2025-08-27', NULL, '2025-08-24 03:59:03', '2025-08-24 03:59:03');

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
(4, '2025_07_01_105240_create_clients_table', 1),
(5, '2025_07_22_105238_create_blogs_table', 1),
(6, '2025_07_22_105238_create_services_table', 1),
(7, '2025_07_22_105239_create_projects_table', 1),
(8, '2025_07_22_105239_create_service_requests_table', 1),
(9, '2025_07_22_105240_create_deals_table', 1),
(10, '2025_07_22_105241_create_meetings_table', 1),
(11, '2025_07_22_105241_create_words_table', 1),
(12, '2025_07_22_105242_create_contacts_table', 1),
(13, '2025_07_22_105242_create_payments_table', 1),
(14, '2025_07_22_105243_create_accounts_table', 1),
(15, '2025_07_22_105243_create_employees_table', 1),
(16, '2025_07_22_105244_create_income_sources_table', 1),
(17, '2025_07_22_105244_create_incomes_table', 1),
(18, '2025_07_22_105245_create_expense_sources_table', 1),
(19, '2025_07_22_105245_create_expenses_table', 1),
(20, '2025_07_22_105245_create_transfers_table', 1),
(21, '2025_07_22_105246_create_careers_table', 1),
(22, '2025_07_22_105247_create_job_applications_table', 1),
(23, '2025_07_23_105246_create_candidates_table', 1),
(24, '2025_07_23_105247_create_interviews_table', 1),
(25, '2025_08_05_165141_create_deal_service_table', 1),
(26, '2025_08_05_191601_create_service_request_service_table', 1),
(27, '2025_08_11_090620_create_media_table', 1),
(28, '2025_08_16_133226_create_project_service_table', 2);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deal_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `pay_date` date NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `deal_id`, `client_id`, `amount`, `pay_date`, `details`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 2132.38, '2025-07-23', 'Ipsum occaecati earum et veniam neque repudiandae.', '2025-08-16 10:15:50', '2025-08-16 10:15:50'),
(2, 1, 1, 2744.02, '1971-09-05', 'Autem maiores nam tenetur sunt occaecati excepturi.', '2025-08-16 10:15:50', '2025-08-16 10:15:50'),
(3, 1, 1, 4651.85, '1971-09-08', 'Officia excepturi accusamus dolorum labore perferendis.', '2025-08-16 10:15:50', '2025-08-16 10:15:50'),
(4, 2, 1, 2434.18, '1991-09-27', 'Voluptatem minima quo velit eum qui.', '2025-08-16 10:15:50', '2025-08-16 10:15:50'),
(5, 1, 1, 612.95, '2021-10-14', 'Non et facilis quia dolor exercitationem consequatur facere.', '2025-08-16 10:15:50', '2025-08-16 10:15:50'),
(6, 1, 1, 1108.00, '1988-04-28', 'Adipisci dolores quam nulla.', '2025-08-16 10:15:50', '2025-08-16 10:15:50'),
(7, 2, 1, 3396.72, '1994-11-24', 'Voluptate qui et atque placeat fugiat suscipit numquam.', '2025-08-16 10:15:50', '2025-08-16 10:15:50'),
(8, 2, 1, 3859.58, '1982-11-21', 'Aliquid et illum praesentium iusto qui.', '2025-08-16 10:15:51', '2025-08-16 10:15:51'),
(9, 2, 1, 1749.81, '2009-07-22', 'Qui nobis voluptatem delectus accusantium.', '2025-08-16 10:15:51', '2025-08-16 10:15:51'),
(10, 1, 1, 2729.10, '1981-12-14', 'Fugiat ratione consequuntur voluptas dignissimos sint repellat.', '2025-08-16 10:15:51', '2025-08-16 10:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `view_name` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `content`, `view_name`, `meta_keyword`, `meta_description`, `meta_title`, `created_at`, `updated_at`) VALUES
(1, 'E-commerce Website', 'A modern e-commerce platform with cart and checkout.', 'firstproject', 'ecommerce, shop, online store', 'Build your own e-commerce store with full functionality.', 'E-commerce Website', '2025-08-22 16:59:01', '2025-08-22 16:59:01'),
(2, 'CMS Builder', 'A content management system for managing websites easily.', 'secondproject', 'cms, content management, website builder', 'Easily manage content with a custom CMS.', 'CMS Builder', '2025-08-22 16:59:01', '2025-08-22 16:59:01'),
(3, 'Portfolio Website', 'A personal portfolio to showcase projects and skills.', 'test', 'portfolio, resume, showcase', 'A sleek portfolio website for professionals.', 'Portfolio Website', '2025-08-22 16:59:01', '2025-08-22 16:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `project_service`
--

CREATE TABLE `project_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_service`
--

INSERT INTO `project_service` (`id`, `project_id`, `service_id`, `created_at`, `updated_at`) VALUES
(5, 1, 1, '2025-08-22 17:02:01', '2025-08-22 17:02:01'),
(6, 1, 2, '2025-08-22 17:02:01', '2025-08-22 17:02:01'),
(7, 2, 1, '2025-08-22 17:02:01', '2025-08-22 17:02:01'),
(8, 3, 2, '2025-08-22 17:02:01', '2025-08-22 17:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `client_id`, `name`, `title`, `slug`, `meta_keyword`, `meta_description`, `meta_title`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Development', 'Professional Web Development Services', 'web-development', 'web, development, services', 'We offer expert web development services.', 'Web Development Services', 'We build modern, responsive websites tailored to your business needs.', '2025-08-16 10:15:50', '2025-08-16 10:15:50'),
(2, 2, 'SEO Optimization', 'Effective SEO Services', 'seo-optimization', 'SEO, optimization, marketing', 'Boost your visibility with our SEO solutions.', 'SEO Services', 'Our SEO services help your business rank higher on search engines.', '2025-08-16 10:15:50', '2025-08-16 10:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `details` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `name`, `client_id`, `details`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Website Redesign', 1, 'Client needs a full website redesign including UI/UX.', NULL, '2025-08-16 10:15:50', '2025-08-16 10:15:50'),
(2, 'Mobile App Development', 1, 'Client requested an Android/iOS app for e-commerce.', NULL, '2025-08-16 10:15:50', '2025-08-16 10:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `service_request_service`
--

CREATE TABLE `service_request_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_request_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_request_service`
--

INSERT INTO `service_request_service` (`id`, `service_request_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 2, NULL, NULL);

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
('gKbsUbDS4NdUCQFPyoQ1M7TGmZTE88cnBwatu6F5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQWdWeWloU21QS0RtY3N3cjFqemZ4MkNlM2JhQVNYTzNUZTBmMTR6RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1755990953),
('T7uk839xUbkgSr00tqNxF0L3WdeiijlzYoP2AMIh', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiN3gwc3NBbVdva0dacDVFbkZvN2ZKeWgzeVpEOGo1YzI1UkZScUlBQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1756018886);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id_from` bigint(20) UNSIGNED NOT NULL,
  `account_id_to` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `transfer_date` date NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `account_id_from`, `account_id_to`, `title`, `amount`, `transfer_date`, `details`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Et magnam ducimus quasi.', 2535.04, '2025-07-23', 'Dolores voluptas voluptate sapiente enim et totam. Magni quaerat doloremque neque vel. Voluptatem facilis fugit maiores et.', '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(2, 2, 3, 'Dolor ducimus iste.', 986.34, '2025-08-15', 'Commodi et ut quaerat esse. Sint nihil cupiditate praesentium voluptatem asperiores et. Consectetur magnam incidunt nostrum corrupti laborum.', '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(3, 3, 1, 'Consequatur vero voluptatem.', 1287.25, '2025-08-02', 'Sit expedita est soluta nostrum aperiam molestiae. Neque laudantium maiores et perferendis voluptatem voluptatum. Fugiat qui sit repellat velit. Et qui et incidunt consequatur.', '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(4, 2, 1, 'Qui nemo tempora.', 3574.46, '2025-08-01', NULL, '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(5, 2, 1, 'Nesciunt veritatis distinctio culpa.', 3884.51, '2025-08-03', NULL, '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(6, 2, 1, 'Labore temporibus labore qui.', 3195.56, '2025-07-30', NULL, '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(7, 1, 2, 'Inventore ducimus sunt culpa.', 940.56, '2025-07-19', NULL, '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(8, 3, 1, 'Fugiat illum quaerat maxime.', 154.45, '2025-07-27', NULL, '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(9, 1, 2, 'Cupiditate itaque atque quidem.', 3253.20, '2025-07-26', 'Voluptatem error veniam quia maiores assumenda id et et. Dolor voluptas consequatur eius. Totam corporis explicabo sint asperiores dicta. In ut a autem labore quia qui consequatur dolores.', '2025-08-16 10:15:47', '2025-08-16 10:15:47'),
(10, 1, 3, 'Ea nam aliquam.', 2444.26, '2025-07-29', NULL, '2025-08-16 10:15:47', '2025-08-16 10:15:47');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nada amr', 'nadamr444@gmail.com', NULL, '$2y$12$YLlih.Bkho0xj9fq4RdjLebSnRMAXIziouqYRXHo5sKem0xUAvJ7G', NULL, '2025-08-18 10:41:53', '2025-08-18 10:41:53'),
(2, 'farah amr', 'amrfarah27@gmail.com', NULL, '$2y$12$ofhp9hQurR0pwEBnN5fPHe9iNOqmn50ECZNEeFAziH3Vgjl15KJ4W', NULL, '2025-08-24 01:28:25', '2025-08-24 01:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `param` longtext NOT NULL,
  `ar` longtext NOT NULL,
  `fr` longtext NOT NULL,
  `en` longtext NOT NULL,
  `wordable_type` varchar(255) NOT NULL,
  `wordable_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `param`, `ar`, `fr`, `en`, `wordable_type`, `wordable_id`, `created_at`, `updated_at`) VALUES
(1, 'aspernatur_delectus', 'Illo dolorum quis similique.', 'Quo non quis tempore autem.', 'Modi expedita est quia commodi aut quas est.', 'App\\Models\\ExampleModel', 1, '2025-08-16 10:15:52', '2025-08-16 10:15:52'),
(2, 'voluptatem_quam', 'Officia aut fugiat veritatis voluptatem accusamus earum esse rerum.', 'Et dicta ducimus harum officiis.', 'Vel soluta ut accusamus aut assumenda quis voluptas.', 'App\\Models\\ExampleModel', 1, '2025-08-16 10:15:52', '2025-08-16 10:15:52'),
(3, 'labore_sint', 'Eius quasi et blanditiis cum.', 'Maxime ipsum blanditiis ipsa inventore id pariatur aut alias.', 'Ut aliquam cumque quod iusto itaque est libero.', 'App\\Models\\ExampleModel', 1, '2025-08-16 10:15:52', '2025-08-16 10:15:52'),
(4, 'deserunt_tempora', 'Minus cumque et id dignissimos.', 'Assumenda modi mollitia quo facilis neque.', 'Dolores ut architecto pariatur cum.', 'App\\Models\\ExampleModel', 1, '2025-08-16 10:15:52', '2025-08-16 10:15:52'),
(5, 'totam_minus', 'Eaque praesentium architecto quo et.', 'Ex sunt ducimus nihil dolores unde iste odio.', 'Et ut enim culpa omnis.', 'App\\Models\\ExampleModel', 1, '2025-08-16 10:15:52', '2025-08-16 10:15:52'),
(6, 'quis_velit', 'Sunt et voluptate animi repellendus.', 'Nam beatae vel soluta occaecati.', 'Similique sapiente quia ut harum optio laborum ipsa est.', 'App\\Models\\ExampleModel', 1, '2025-08-16 10:15:53', '2025-08-16 10:15:53'),
(7, 'necessitatibus_praesentium', 'Itaque omnis non numquam ratione est.', 'Voluptas reprehenderit illum deserunt.', 'Dolor maxime tempora et nam.', 'App\\Models\\ExampleModel', 1, '2025-08-16 10:15:53', '2025-08-16 10:15:53'),
(8, 'asperiores_quia', 'Illo velit voluptatibus laboriosam aliquid architecto a suscipit.', 'Sint commodi doloremque non laborum at fuga.', 'Repellendus totam rerum placeat exercitationem.', 'App\\Models\\ExampleModel', 1, '2025-08-16 10:15:53', '2025-08-16 10:15:53'),
(9, 'laborum_vel', 'Aspernatur voluptates numquam laudantium minima blanditiis nam exercitationem.', 'Sed voluptates perferendis odio maxime.', 'Et libero illum magni ducimus aliquam.', 'App\\Models\\ExampleModel', 1, '2025-08-16 10:15:53', '2025-08-16 10:15:53'),
(10, 'laboriosam_ea', 'Ut aliquid omnis quo occaecati voluptate dignissimos.', 'Est inventore ipsum dolores.', 'Quasi dolorem praesentium qui similique.', 'App\\Models\\ExampleModel', 1, '2025-08-16 10:15:53', '2025-08-16 10:15:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `candidates_email_unique` (`email`),
  ADD KEY `candidates_career_id_foreign` (`career_id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deals_service_request_id_unique` (`service_request_id`),
  ADD KEY `deals_client_id_foreign` (`client_id`);

--
-- Indexes for table `deal_service`
--
ALTER TABLE `deal_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deal_service_deal_id_foreign` (`deal_id`),
  ADD KEY `deal_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_account_id_foreign` (`account_id`),
  ADD KEY `expenses_expense_source_id_foreign` (`expense_source_id`);

--
-- Indexes for table `expense_sources`
--
ALTER TABLE `expense_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomes_account_id_foreign` (`account_id`),
  ADD KEY `incomes_income_source_id_foreign` (`income_source_id`);

--
-- Indexes for table `income_sources`
--
ALTER TABLE `income_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interviews_career_id_foreign` (`career_id`),
  ADD KEY `interviews_candidate_id_foreign` (`candidate_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_applications_email_unique` (`email`),
  ADD KEY `job_applications_career_id_foreign` (`career_id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meetings_client_id_foreign` (`client_id`),
  ADD KEY `meetings_deal_id_foreign` (`deal_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_deal_id_foreign` (`deal_id`),
  ADD KEY `payments_client_id_foreign` (`client_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_service`
--
ALTER TABLE `project_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_service_project_id_foreign` (`project_id`),
  ADD KEY `project_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_client_id_foreign` (`client_id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_requests_client_id_foreign` (`client_id`);

--
-- Indexes for table `service_request_service`
--
ALTER TABLE `service_request_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_request_service_service_request_id_foreign` (`service_request_id`),
  ADD KEY `service_request_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfers_account_id_from_foreign` (`account_id_from`),
  ADD KEY `transfers_account_id_to_foreign` (`account_id_to`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deal_service`
--
ALTER TABLE `deal_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expense_sources`
--
ALTER TABLE `expense_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `income_sources`
--
ALTER TABLE `income_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_service`
--
ALTER TABLE `project_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_request_service`
--
ALTER TABLE `service_request_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deals_service_request_id_foreign` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deal_service`
--
ALTER TABLE `deal_service`
  ADD CONSTRAINT `deal_service_deal_id_foreign` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `deal_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_expense_source_id_foreign` FOREIGN KEY (`expense_source_id`) REFERENCES `expense_sources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `incomes_income_source_id_foreign` FOREIGN KEY (`income_source_id`) REFERENCES `income_sources` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `interviews_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meetings_deal_id_foreign` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_deal_id_foreign` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_service`
--
ALTER TABLE `project_service`
  ADD CONSTRAINT `project_service_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD CONSTRAINT `service_requests_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_request_service`
--
ALTER TABLE `service_request_service`
  ADD CONSTRAINT `service_request_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_request_service_service_request_id_foreign` FOREIGN KEY (`service_request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_account_id_from_foreign` FOREIGN KEY (`account_id_from`) REFERENCES `accounts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_account_id_to_foreign` FOREIGN KEY (`account_id_to`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
