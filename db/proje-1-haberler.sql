-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 31 Eki 2024, 13:22:58
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje-1-haberler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL,
  `events_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `events_id`, `user_id`, `comment`, `created_at`) VALUES
(12, NULL, 55, 33, 'dfvdfvcb', '2024-10-24 17:31:34'),
(13, NULL, 58, 33, 'vcbcvbcvxcvcvb', '2024-10-24 17:34:19'),
(14, 93, NULL, 33, 'sfgsfgsfgh', '2024-10-24 17:40:52'),
(15, 92, NULL, 33, 'gyhjhjmjköhklşjlşhjdghdgh', '2024-10-24 17:43:23'),
(16, NULL, 58, 33, 'burkaburkaubkruakbu', '2024-10-25 11:26:09'),
(17, NULL, 58, 22, 'g-fsa', '2024-10-25 12:04:30'),
(18, NULL, 58, 22, 'g-fsa', '2024-10-25 12:06:44'),
(19, 90, NULL, 22, 'komikyorum', '2024-10-25 13:58:30'),
(20, 91, NULL, 22, 'ahahyoruö', '2024-10-25 13:58:47'),
(21, 91, NULL, 22, 'dfggfnj', '2024-10-25 13:58:56'),
(24, NULL, 73, 35, 'sdfasd', '2024-10-30 13:49:53'),
(25, 104, NULL, 35, '58484848484', '2024-10-30 14:12:10'),
(26, NULL, 56, 35, 'asdasd', '2024-10-30 15:43:55'),
(27, NULL, 58, 35, 'asdasd', '2024-10-30 15:46:05'),
(28, NULL, 55, 35, 'asdsad', '2024-10-30 15:46:18'),
(29, 90, NULL, 35, 'asdasd', '2024-10-31 11:41:00'),
(30, 90, NULL, 35, 'vbvbvb', '2024-10-31 11:49:27'),
(31, 90, NULL, 35, 'asdasdasd', '2024-10-31 14:28:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `baslik` longtext NOT NULL,
  `icerik` longtext NOT NULL,
  `kategori` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `comments_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `events`
--

INSERT INTO `events` (`id`, `baslik`, `icerik`, `kategori`, `created_at`, `user_id`, `comments_id`) VALUES
(55, 'asdas', 'asdasdd', 'asdasd', '2024-10-24 15:30:10', 22, 0),
(56, 'asdas', 'dasd', 'asdasd', '2024-10-24 15:52:25', 22, 0),
(57, 'wsadasdas', 'dsdfbfgbnfghjk', 'ltıoyşuiopıği,ğüoişlkjhgfdcsxaz', '2024-10-24 16:46:23', 22, 0),
(58, 'burak etkinlik', 'burak ', 'burak etkinliği', '2024-10-24 16:54:02', 33, 17),
(64, 'cvbcvb', 'cvbcvbcvb', 'cvbcvbcvbcvbcv', '2024-10-30 13:12:35', 35, NULL),
(71, 'haber', 'HABER ', 'SDKLKSKSJSJSJQJ11J1J1J1J', '2024-10-30 13:26:54', 35, NULL),
(72, 'haber', 'HABER ', 'SDKLKSKSJSJSJQJ11J1J1J1J', '2024-10-30 13:26:58', 35, NULL),
(73, 'haber', 'HABER ', 'SDKLKSKSJSJSJQJ11J1J1J1J', '2024-10-30 13:27:01', 35, NULL),
(74, 'haber', 'HABER ', 'SDKLKSKSJSJSJQJ11J1J1J1J', '2024-10-30 13:27:03', 35, NULL),
(75, 'haber', 'HABER ', 'SDKLKSKSJSJSJQJ11J1J1J1J', '2024-10-30 13:27:06', 35, NULL),
(76, 'haber', 'HABER ', 'SDKLKSKSJSJSJQJ11J1J1J1J', '2024-10-30 13:27:08', 35, NULL),
(77, 'haber', 'HABER ', 'SDKLKSKSJSJSJQJ11J1J1J1J', '2024-10-30 13:27:12', 35, NULL),
(78, 'haber', 'HABER ', 'SDKLKSKSJSJSJQJ11J1J1J1J', '2024-10-30 13:27:14', 35, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL,
  `events_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `type` varchar(4) NOT NULL DEFAULT 'like',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `news_id`, `events_id`, `comment_id`, `type`, `created_at`) VALUES
(58, 33, 91, NULL, NULL, 'like', '2024-10-24 17:44:25'),
(61, 33, 90, NULL, NULL, 'like', '2024-10-24 17:44:33'),
(62, 33, 92, NULL, NULL, 'like', '2024-10-24 17:44:36'),
(63, 33, NULL, 56, NULL, 'like', '2024-10-25 14:55:54'),
(64, 22, NULL, 57, NULL, 'like', '2024-10-25 15:22:43'),
(65, 35, 102, NULL, NULL, 'like', '2024-10-30 11:59:43'),
(66, 35, 90, NULL, NULL, 'like', '2024-10-31 13:56:55'),
(67, 35, 91, NULL, NULL, 'like', '2024-10-31 13:56:56'),
(68, 35, 92, NULL, NULL, 'like', '2024-10-31 13:56:58'),
(72, 35, 103, NULL, NULL, 'like', '2024-10-31 13:57:05'),
(73, 35, 104, NULL, NULL, 'like', '2024-10-31 13:57:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `baslik` longtext NOT NULL,
  `kategori` longtext NOT NULL,
  `haber` longtext NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `comments_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `baslik`, `kategori`, `haber`, `created_at`, `user_id`, `comments_id`) VALUES
(90, 'asdasd', 'asdsad', 'sadasd', '2024-10-24 15:26:59', 22, 14),
(91, 'asda', 'sdasdas', 'dasd', '2024-10-24 15:52:35', 22, 0),
(92, 'ABD', 'ABD', 'ABD ilk kadın başkanını mı seçecek, yoksa ikincABD ilk kadın başkanını mı seçecek, yoksa ikinci bir Donald Trump iktidarına yeşil ışık mı yakacak?  Seçim günü yaklaştıkça anketlerin nabzını yoklayacağız ve Beyaz Saray\'a giden yolda seçim kampanyalarının etkilerini gözlemleyeceğiz.', '2024-10-24 15:56:53', 22, 15),
(93, 'asdasd', 'asdas', 'ABD ilk kadın başkanını mı seçecek, ', '2024-10-24 16:01:12', 22, 0),
(94, 'ssx', 'ccc', 'vvvv', '2024-10-30 11:11:52', 33, NULL),
(95, 'xss', 'vvv', 'bbbbb', '2024-10-30 11:16:32', 34, NULL),
(102, 'haber ', 'haber', 'Otomobil camındaki çizikler, araç sahiplerinin en sık karşılaştığı estetik sorunlardan biridir.\r\n\r\nZamanla oluşan bu çizikler, yalnızca görünümünü bozmakla kalmaz, aynı zamanda görüş alanını da etkileyebilir. Cam çiziklerini gidermenin çeşitli yolları bulunmaktadır.\r\n\r\nBu yazıda, otomobil camındaki çizikleri nasıl yok edebileceğinizi ve bu işlemi gerçekleştirirken nelere dikkat etmeniz gerektiğini keşfedekcesiniz.\r\n\r\nHem pratik hem de etkili yöntemlerle, camlarınızı yeniden pırıl pırıl hale getirmek mümkün.\r\n\r\nOtomobil camındaki çizikleri gidermek için birkaç yöntem deneyebilirsiniz. İşte bu yöntemler...', '2024-10-30 11:55:24', 35, NULL),
(103, 'sdfsdf', 'asfsdfsd', 'fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf fsdfdsfsdfdsfsdf ', '2024-10-30 12:28:07', 35, NULL),
(104, 'er', 'erttyj', 'gk', '2024-10-30 13:19:07', 36, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `replies`
--

CREATE TABLE `replies` (
  `id` int(55) NOT NULL,
  `user_id` int(55) NOT NULL,
  `comment_id` int(55) NOT NULL,
  `reply_comment` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `comment_id`, `reply_comment`, `created_at`) VALUES
(2, 35, 12, 'furkan dfcdvcb yorDENMESİNİEE', '2024-10-31 12:14:26'),
(3, 35, 12, 'furkan dfcdvcb yorumu denemesi\r\n', '2024-10-31 12:17:26'),
(4, 35, 12, 'furkan dfcdvcb yorumu denemesi\r\n', '2024-10-31 12:21:52'),
(5, 35, 26, 'yeni demene', '2024-10-31 12:22:03'),
(6, 35, 26, 'asdasd ye yeni yanıt verme mesajım \r\n', '2024-10-31 13:11:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(22, 'Furkan', 'furkan@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-10-24 11:47:29'),
(23, 'Nazım', 'nazimm@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2024-10-24 11:47:29'),
(29, 'berkin', 'berkin1@gmail.com', 'c761f3205489c2730366ec5cbc7d4c8a', '2024-10-24 11:47:29'),
(31, 'furkan', 'fuurkanizci_10@gmail.com', '4297f44b13955235245b2497399d7a93', '2024-10-24 11:47:29'),
(32, 'ahmer', 'ahmer@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', '2024-10-24 11:47:29'),
(33, 'Burak', 'burak@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2024-10-24 16:53:31'),
(34, 'Berkin', 'berkin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2024-10-30 11:15:59'),
(35, 'Kerem', 'kerem@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2024-10-30 11:39:42'),
(36, 'Ahmet', 'ahmet@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2024-10-30 13:18:44');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`,`events_id`,`user_id`),
  ADD KEY `events_id` (`events_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comments_id`),
  ADD KEY `comment_id_2` (`comments_id`);

--
-- Tablo için indeksler `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_id` (`events_id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Tablo için AUTO_INCREMENT değeri `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Tablo için AUTO_INCREMENT değeri `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Tablo kısıtlamaları `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
