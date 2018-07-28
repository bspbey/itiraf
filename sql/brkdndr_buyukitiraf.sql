-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 28 Tem 2018, 07:14:35
-- Sunucu sürümü: 10.2.15-MariaDB-cll-lve
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `brkdndr_buyukitiraf`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_genel_ayarlar`
--

CREATE TABLE `brkdndr_genel_ayarlar` (
  `id` int(11) NOT NULL,
  `site_title` text COLLATE utf8_turkish_ci NOT NULL,
  `site_description` text COLLATE utf8_turkish_ci NOT NULL,
  `site_keywords` text COLLATE utf8_turkish_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_facebook` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_twitter` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_instagram` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_youtube` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_google_plus` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_itiraf_sayisi` int(11) NOT NULL,
  `updatedAt` datetime NOT NULL,
  `guncelleyen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_genel_ayarlar`
--

INSERT INTO `brkdndr_genel_ayarlar` (`id`, `site_title`, `site_description`, `site_keywords`, `site_logo`, `site_facebook`, `site_twitter`, `site_instagram`, `site_youtube`, `site_google_plus`, `anasayfa_itiraf_sayisi`, `updatedAt`, `guncelleyen_id`) VALUES
(1, 'Büyük İtiraf', 'Üniversitelilerin itiraf & dedikodu platformu', 'itiraf, dedikodu, üniversite', '', 'https://www.facebook.com/#', 'https://www.twitter.com/#', 'https://www.instagram.com/#', 'https://www.youtube.com/#', 'https://plus.google.com/#', 5, '2018-07-28 07:45:48', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_iletisim`
--

CREATE TABLE `brkdndr_iletisim` (
  `id` int(11) NOT NULL,
  `gonderen_ad_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gonderen_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `konu` text COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_durum` int(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_itiraflar`
--

CREATE TABLE `brkdndr_itiraflar` (
  `id` int(11) NOT NULL,
  `itiraf_rumuz` text COLLATE utf8_turkish_ci NOT NULL,
  `itiraf_cinsiyet` int(1) DEFAULT NULL,
  `itiraf_icerik` longtext COLLATE utf8_turkish_ci NOT NULL,
  `itiraf_durum` int(1) NOT NULL,
  `itiraf_goruntulenme` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_itiraf_yorumlar`
--

CREATE TABLE `brkdndr_itiraf_yorumlar` (
  `id` int(11) NOT NULL,
  `itiraf_id` int(11) NOT NULL,
  `yorum_rumuz` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_icerik` longtext COLLATE utf8_turkish_ci NOT NULL,
  `yorum_cinsiyet` int(1) DEFAULT NULL,
  `yorum_durum` int(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_uyeler`
--

CREATE TABLE `brkdndr_uyeler` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` int(1) NOT NULL,
  `sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` int(1) NOT NULL,
  `user_role` int(1) NOT NULL,
  `ekleyen_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_uyeler`
--

INSERT INTO `brkdndr_uyeler` (`id`, `ad_soyad`, `email`, `telefon`, `cinsiyet`, `sifre`, `isActive`, `user_role`, `ekleyen_id`, `createdAt`, `updatedat`) VALUES
(1, 'Admin', 'admin@admin.com', '05555555555', 1, '25f9e794323b453885f5181f1b624d0b', 1, 4, 1, '2018-07-28 07:50:11', '0000-00-00 00:00:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `brkdndr_genel_ayarlar`
--
ALTER TABLE `brkdndr_genel_ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_iletisim`
--
ALTER TABLE `brkdndr_iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_itiraflar`
--
ALTER TABLE `brkdndr_itiraflar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_itiraf_yorumlar`
--
ALTER TABLE `brkdndr_itiraf_yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_uyeler`
--
ALTER TABLE `brkdndr_uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_genel_ayarlar`
--
ALTER TABLE `brkdndr_genel_ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_iletisim`
--
ALTER TABLE `brkdndr_iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_itiraflar`
--
ALTER TABLE `brkdndr_itiraflar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_itiraf_yorumlar`
--
ALTER TABLE `brkdndr_itiraf_yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_uyeler`
--
ALTER TABLE `brkdndr_uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
