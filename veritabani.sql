-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 20 Ara 2022, 05:31:44
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `myblog2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8_turkish_ci DEFAULT NULL,
  `message` text COLLATE utf8_turkish_ci,
  `status` int(11) DEFAULT '0' COMMENT '0 okunmadı. 1 okundu. 2 cevaplandı.',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `status`, `date`) VALUES
(184, 'Gülçin', 'g12@gmail.com', '05455254522', 'siteniz çok karışık', 1, '2022-12-13 09:03:00'),
(183, 'Savaş Topla', 'svs@gmail.com', '545245666552', 'fhgf regyhgf thgyjh', 2, '2022-12-13 08:34:07'),
(182, 'Mustafa Yurtseven', 'yurtevenist@hotmail.com', '54555522000', 'dthgf fdbygfhhhnh ', 0, '2022-12-13 08:33:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_turkish_ci NOT NULL,
  `who` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `who`, `date`) VALUES
(4, 'Mustafa Yurtseven', 'yurtsevenist@hotmail.com', '$2y$10$73QIyWFaTNTezoU6S60/1eYUtP2eQD5KbcyMKB479YeYDxZzXsiVi', 0, '2022-12-06 09:17:38'),
(5, 'savas topal', 'svstopal@gmail.com', '$2y$10$QQcX.THk7IcPF89TToyCFucXhuhTDmPjwdeEj.F6goKW1mKxydQKG', 1, '2022-12-13 07:31:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
