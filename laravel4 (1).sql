-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 07:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel4`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `motivation` text NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `created_at`, `updated_at`, `date`, `start_time`, `end_time`, `motivation`, `patient_id`, `user_id`) VALUES
(28, '2025-03-15 22:25:04', '2025-03-15 22:25:04', '2025-03-17', '08:00:00', '08:30:00', 'Tái Khám', 53, 9);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_patient`
--

CREATE TABLE `doctor_patient` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_patient`
--

INSERT INTO `doctor_patient` (`created_at`, `updated_at`, `patient_id`, `user_id`) VALUES
(NULL, NULL, 43, 9),
(NULL, NULL, 54, 9),
(NULL, NULL, 53, 9);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_17_182010_create_patients_table', 1),
(6, '2022_10_19_120120_create_scans_table', 1),
(7, '2022_10_19_160514_add_patient_id_to_scans_table', 1),
(8, '2022_10_20_142615_create_orientation_letters_table', 1),
(9, '2022_10_20_143728_add_patient_id_to_orientation_letters_table', 1),
(10, '2022_10_21_165843_create_appointments_table', 1),
(11, '2022_10_21_170138_add_patient_id_to_appointments_table', 1),
(12, '2022_10_21_170215_add_doctor_id_to_appointments_table', 1),
(13, '2022_10_22_224954_create_prescriptions_table', 1),
(14, '2022_10_22_225323_add_patient_id_to_prescriptions_table', 1),
(15, '2022_10_28_143456_create_doctor_patient_table', 1),
(16, '2022_11_01_175122_add_doctor_id_to_prescriptions_table', 1),
(17, '2022_11_01_184522_add_doctor_id_to__orientation_letter_table', 1),
(18, '2022_11_01_185750_add_doctor_id_to_scans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orientation_letters`
--

CREATE TABLE `orientation_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `noSSocial` varchar(11) DEFAULT NULL,
  `dob` varchar(30) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diseases` varchar(255) DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `antecedents` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `created_at`, `updated_at`, `lastname`, `name`, `noSSocial`, `dob`, `phone`, `email`, `diseases`, `allergies`, `antecedents`, `comments`) VALUES
(43, '2025-03-15 21:04:01', '2025-03-15 21:04:01', 'Nguyễn', 'Văn', NULL, '2025-02-26', '0913222111', 'Cái Nhum - Vĩnh Long', NULL, NULL, NULL, NULL),
(45, '2025-03-16 03:00:00', '2025-03-16 03:00:00', 'Nguyễn', 'Văn An', '123456789', '1985-06-15', '0987654321', '123 Đường Trần Hưng Đạo, Quận 1', 'Tiểu đường', 'Phấn hoa', 'Không có', 'Bệnh nhân cần kiểm tra đường huyết thường xuyên'),
(46, '2025-03-16 03:10:00', '2025-03-16 03:10:00', 'Trần', 'Thị Bích', '987654321', '1990-09-22', '0912345678', '456 Nguyễn Huệ, Quận 1', 'Huyết áp cao', 'Dị ứng hải sản', 'Bệnh tim', 'Thường xuyên bị chóng mặt'),
(47, '2025-03-16 03:20:00', '2025-03-16 03:20:00', 'Lê', 'Hoàng Minh', '741852963', '1978-11-10', '0901122334', '789 Lê Lợi, Quận 3', 'Đau dạ dày', 'Dị ứng thuốc giảm đau', 'Tiền sử loét dạ dày', 'Cần theo dõi chế độ ăn uống'),
(48, '2025-03-16 03:30:00', '2025-03-16 03:30:00', 'Phạm', 'Thanh Tùng', '852963741', '2000-03-05', '0933221100', '159 Hai Bà Trưng, Quận 1', 'Hen suyễn', 'Lông động vật', 'Không có', 'Bệnh nhân cần mang theo ống hít'),
(49, '2025-03-16 03:40:00', '2025-03-16 03:40:00', 'Đặng', 'Mai Linh', '369258147', '1995-12-12', '0966778899', '753 Phạm Ngũ Lão, Quận 5', 'Suy thận', 'Không có', 'Ghép thận năm 2015', 'Cần kiểm tra định kỳ mỗi tháng'),
(50, '2025-03-16 03:50:00', '2025-03-16 03:50:00', 'Võ', 'Quốc Bảo', '159357486', '1980-08-25', '0977553322', '951 Tôn Đức Thắng, Quận 4', 'Béo phì', 'Dị ứng trứng', 'Không có', 'Được tư vấn chế độ ăn kiêng'),
(51, '2025-03-16 04:00:00', '2025-03-16 04:00:00', 'Bùi', 'Phương Trang', '258147369', '1987-07-30', '0944887766', '369 Lý Thường Kiệt, Quận 10', 'Đau nửa đầu', 'Không có', 'Thường xuyên bị stress', 'Cần hạn chế thức khuya'),
(52, '2025-03-16 04:10:00', '2025-03-16 04:10:00', 'Hồ', 'Công Danh', '753159852', '1992-04-18', '0988111222', '159 Bạch Đằng, Quận Bình Thạnh', 'Viêm gan B', 'Không có', 'Nhiễm virus năm 2018', 'Đang theo dõi điều trị'),
(53, '2025-03-16 04:20:00', '2025-03-16 04:20:00', 'Tô', 'Ngọc Hân', '852147963', '1998-06-01', '0955332211', '852 Lạc Long Quân, Quận Tân Bình', 'Viêm xoang', 'Bụi mịn', 'Không có', 'Thời tiết lạnh dễ tái phát'),
(54, '2025-03-16 04:30:00', '2025-03-16 04:30:00', 'Dương', 'Chấn Hưng', '147258369', '1983-05-14', '0900668899', '147 Phan Xích Long, Quận Phú Nhuận', 'Gout', 'Không có', 'Có tiền sử gia đình bị gout', 'Cần hạn chế thực phẩm giàu purin');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `created_at`, `updated_at`, `content`, `patient_id`, `user_id`) VALUES
(13, '2025-03-15 21:12:59', '2025-03-15 21:12:59', 'Paracetamol 500mg : 2 viên/ngày\r\nAmoxicillin 500mg: 2 viên/ngày\r\nMetformin 850mg: 2 viên/ngày', 54, 9),
(14, '2025-03-15 21:18:59', '2025-03-15 21:18:59', 'PARACETAMOL\r\nDSFLSDF', 54, 9),
(15, '2025-03-15 22:25:27', '2025-03-15 22:25:27', 'Paracetamol 500g : ngày 2 viên\r\nParacetamol 500g : ngày 2 viên\r\nParacetamol 500g : ngày 2 viên', 53, 9);

-- --------------------------------------------------------

--
-- Table structure for table `scans`
--

CREATE TABLE `scans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `scan_path` text NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scans`
--

INSERT INTO `scans` (`id`, `created_at`, `updated_at`, `type`, `scan_path`, `patient_id`, `user_id`) VALUES
(7, '2025-03-15 21:13:21', '2025-03-15 21:13:21', 'Ảnh Phổi: Bình Thường', 'images/1742098401.jpg', 54, 9),
(8, '2025-03-15 22:25:55', '2025-03-15 22:25:55', 'Ảnh phổi XQuang', 'images/1742102755.jpg', 53, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Admin', 'BS', 'BS', 'admin@clinictlemcen.com', NULL, '$2y$10$/Xj47kuxTlOK2CB2tNgIWeCkZp39AfOibre4GyS2f7XAwITvHVG1u', 2, NULL, '2025-03-14 01:04:40', '2025-03-15 22:22:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`);

--
-- Indexes for table `doctor_patient`
--
ALTER TABLE `doctor_patient`
  ADD KEY `doctor_patient_patient_id_foreign` (`patient_id`),
  ADD KEY `doctor_patient_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orientation_letters`
--
ALTER TABLE `orientation_letters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orientation_letters_patient_id_foreign` (`patient_id`),
  ADD KEY `orientation_letters_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_patient_id_foreign` (`patient_id`),
  ADD KEY `prescriptions_user_id_foreign` (`user_id`);

--
-- Indexes for table `scans`
--
ALTER TABLE `scans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scans_patient_id_foreign` (`patient_id`),
  ADD KEY `scans_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orientation_letters`
--
ALTER TABLE `orientation_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `scans`
--
ALTER TABLE `scans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_patient`
--
ALTER TABLE `doctor_patient`
  ADD CONSTRAINT `doctor_patient_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_patient_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orientation_letters`
--
ALTER TABLE `orientation_letters`
  ADD CONSTRAINT `orientation_letters_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orientation_letters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `scans`
--
ALTER TABLE `scans`
  ADD CONSTRAINT `scans_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
