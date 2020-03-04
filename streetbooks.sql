-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Şub 2020, 00:20:19
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `streetbooks`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `begen`
--

CREATE TABLE `begen` (
  `id` int(11) NOT NULL,
  `kitapID` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `eksikkitap`
--

CREATE TABLE `eksikkitap` (
  `id` int(11) NOT NULL,
  `kitapAdi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kitapYazar` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `eksikkitap`
--

INSERT INTO `eksikkitap` (`id`, `kitapAdi`, `kitapYazar`) VALUES
(1, 'Yörünge', 'Tess Gerritsen'),
(2, 'Bilinmeyen Bir Kadının Mektubu', 'Stefan Zweig'),
(3, '1984', 'George Orwell'),
(4, 'Görünür Karanlık', 'William Golding'),
(5, 'Lord Jim', 'Joseph Conrad'),
(6, 'Vejeteryan', 'Han Kang'),
(7, 'gökhan', 'asdas'),
(8, 'Ay ışığı sokağı', 'Stefan Zweig'),
(9, 'Dava', 'Franz Kafka');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gununkitabi`
--

CREATE TABLE `gununkitabi` (
  `id` int(11) NOT NULL,
  `kitap-adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `yazar-adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kitap-hakkinda` text COLLATE utf8_turkish_ci NOT NULL,
  `baglanti` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `kategoriAdi` varchar(60) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategoriAdi`) VALUES
(1, 'Roman'),
(2, 'Hikaye'),
(3, 'Edebiyat'),
(4, 'Bilim-Kurgu'),
(5, 'Diğer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `kitapKapak` text COLLATE utf8_turkish_ci NOT NULL,
  `kitapAdi` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `yazarAdi` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `kitapHakkinda` text COLLATE utf8_turkish_ci NOT NULL,
  `yayinEvi` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `kategoriID` int(11) NOT NULL,
  `sayfaSayisi` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `begen` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `kitapKapak`, `kitapAdi`, `yazarAdi`, `kitapHakkinda`, `yayinEvi`, `kategoriID`, `sayfaSayisi`, `begen`) VALUES
(1, '0000000061424-1.jpg', 'Tutunamayanlar', 'Oğuz Atay', 'Ülkemizin en değerli yazarlarından biri olan Oğuz Atay’ın yazıldığı dönemde büyük tartışma konusu olmuş eseri Tutunamayanlar, 1972 yılında yayımlanmıştır. Eser, bilinç-akışı tekniğiyle döneme damgasını vurarak Türk Edebiyatı’nda yeni bir çağı başlatmıştır. Pek çok eleştirmen, Tutunamayanlar’ı Türk Dili’nde yazılmış en iyi eser olarak değerlendirmektedir.\r\n\r\nTutunamayanlar Oğuz Atay ismiyle özdeşleşmiş bir roman olarak, büyük yazarımızın hayatından izler taşımasıyla da kısmen otobiyografik bir eser olarak da değerlendirilebilir. Roman, son derece üst düzey diliyle çevirisi en zor romanlar arasında yer alır. Tutunamayanlar, sadece birkaç dile çevrilebilmiştir. “Het leven in stukken” adı altında Flemenkçeye (Hollanda Dili) çevrilen eser, eserin Hollandalı çevirmenine ödül kazandırmıştır.\r\n\r\nTutunamayanlar konusu itibariyle intihar eden arkadaşının geçmişini araştıran Turgut Özben’in, söz konusu arkadaşı Selim Işık’ın modern hayata neden “Tutunamadığı”nı öğrenme çabasını anlatmaktadır. Romanda Turgut’un karşılaştığı her kişi Selim Işık’ı tanıyan kişilerdir ve her biri Turgut’a Selim’in farklı yönlerini aktarmaktadır.\r\n\r\nİletişim Yayınları’nın en prestijli kitaplarından biri olan Tutunamayanlar, ülkemizde olduğu kadar Dünya çapında da merak konusu olan eserlerden biridir.\r\n\r\nHer yıl çok satan kitaplar arasında yer alan Eser, TRT Roman Ödülü’ne sahiptir. Tutunamayanlar romanının ilk baskısı 1000 TL gibi bir fiyat ile alıcı bulmuştur.', 'İletişim Yayınları', 1, '732', 21),
(2, '0000000064031-1.jpg', 'Şeker Portakalı', 'José Mauro de Vasconcelos', 'Şeker Portakalı, Brezilyalı yazar José Mauro De Vasconcelos&#039;un 1968 tarihli romanı. Brezilya&#039;nın Minas Gerais bölgesinde yaşayan fakir bir ailenin beş yaşındaki oğlu olan hayal gücü çok gelişmiş Zeze adlı çocuğun başından geçenleri konu edinir.', 'Can yayınları', 2, '1414', 3),
(3, '0000000293370-1.jpg', 'Otomatik Portakal', 'Anthony Burgess', 'Tüm hayvanların en zekisi, iyiliğin ne demek olduğunu bilen insanoğluna sistematik bir baskı uygulayarak onu otomatik işleyen bir makine haline getirenlere kılıç kadar keskin olan kalemimle saldırmaktan başka hiçbir şey yapamıyorum...\r\n...\r\nCockney dilinde (İngiliz argosu) bir deyiş vardır. &quot;Uqueer as as clockwork orange&quot;. Bu deyiş, olabilecek en yüksek derecede gariplikleri barındıran kişi anlamına gelir. Bu çok sevdiğim lafı, yıllarca bir kitap başlığında kullanmayı düşünmüşümdür. Bir de tabii Malezya&#039;da &quot;canlı&quot; anlamına gelen &quot;orang&quot; sözcüğü var. Kitabı yazmaya başladığımda, rengi ve hoş bir kokusu olan bir meyvenin kullanıldığı bu deyişin, tam da benim anlatmak istediğim duruma, Pavlov kanunlarının uygulanmasına dayalı bir hikâyeye çok iyi oturduğunu düşündüm...\r\n-Anthony Burges-', 'İş Bankası Kültür Yayınları', 5, '485', 5),
(4, '0000000671636-1.jpg', 'Olağanüstü Bir Gece', 'Stefan Zweig', '“Ne olması gerekirdi ki, diye düşündüm, beni, vücudumu böyle alev alev yakacak, sesimi ağzımdan kendi iradem dışında fırlatacak bir ateş seviyesine yükseltecek kadar heyecanlandırsın?” Hâli vakti yerinde, kendi küçük zevklerini zorlanmadan elde eden bir adamın ruhunun ölmeye başladığını dehşet içinde fark etmesi, onu insanlığını yeniden keşfedeceği olayların içine itiyor. Daha önce küçümsediği duygulara kendisinin de kapılmasını tetikleyen küçücük bir hâdise yaşaması gerekiyor. ', 'Türk Edebiyat Vakfı Yayınları', 2, '682', 0),
(5, 'select.jpg', 'Sineklerin Tanrısı', 'William Golding', '&quot;Sineklerin Tanrısı&quot;, günümüzde bir atom savaşı sırasında, ıssız bir adaya düşen bir avuç okul çocuğunun, geldikleri dünyanın bütün uygar törelerinden uzaklaşarak, insan yaradılışının temelindeki korkunç bir gerçeği ortaya koymalarını dile getirir. Konusu, R. M. Ballantyne&#039;ın Mercan Adası gibi eşsiz bir mercan adasının cenneti andıran ortamında başlayan bu roman, çağdaş toplumlardaki çöküntünün, insan yaradılışındaki köklerini gözönüne sermek amacıyla Mercan Adası&#039;ndaki duygusal iyimserlikten apayrı bir yönde gelişir. Uygar insanın yüreğinde gizlenen karanlığı deşerken &quot;Sineklerin Tanrısı&quot;; daha çok Conrad&#039;ın kısa romanı &quot;Karanlığın Yüreği&quot;ni andırır. Golding&#039;in romanındaki çocuklar da başlangıçta tıpkı Kurtz gibi, uygar toplumun baskılarından uzak bir örnek düzen kurmak isterlerken, gitgide hayvanlaşır, korkunç bir kişiliğe bürünürler. Bu yönüyle Sineklerin Tanrısı&#039;nın Mercan Adası ile öbür ıssız ada serüvenlerinden ayrıldığı en önemli nokta, ıssız ada yaşamının çetin güçlüklerini ya da mutluluğunu anlatmaktan daha çok, bir insanlık durumunu, kişiler arasındaki çatışma aracılığıyla ortaya koymaya çalışmasıdır.', 'İş Bankası Kültür Yayınları', 2, '632', 4),
(6, '0000000064038-1.jpg', '1984', 'George Orwell', 'lorem ipsum dolor sit ametttttt', 'Can', 4, '813', 2),
(8, 'IMG_20180601_061751_983.jpg', 'Kitap Adı', 'Yazar Adı', 'Kitap Hakkında', 'Yayın Evi', 4, '2225', 0),
(9, 'fog-1535201_1920.jpg', 'eqwe', 'ewqewq', 'ewqeqw', 'eqweqw', 3, '312324', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sss`
--

CREATE TABLE `sss` (
  `id` int(11) NOT NULL,
  `baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sss`
--

INSERT INTO `sss` (`id`, `baslik`, `icerik`) VALUES
(1, 'Street Books nedir?', 'Street Books tamamen üniversite öğrencileri tarafından geliştirilen bir sistemdir. Tek amacı dünyayı daha güzel bir hale getirmek.'),
(3, 'en yeni sss', 'yeni sss içerik yeni sss içerik yeni sss içerik yeni sss içerik yeni sss içerik yeni sss içerik yeni sss içerik yeni sss içerik yeni sss içerik yeni sss içerik '),
(4, 'Street Books Ücretli Mi?', 'Street Books hiçbir kâr amacı gütmez. Tamamen ücretsizdir.'),
(5, 'yeni deneme', 'http://localhost/streetBooks/admin/icerik/kitapGuncelle.php?sayfa=6http://localhost/streetBooks/admin/icerik/kitapGuncelle.php?sayfa=6http://localhost/streetBooks/admin/icerik/kitapGuncelle.php?sayfa=6'),
(6, 'dsadsa', 'http://localhost/streetBooks/admin/icerik/kitapGuncelle.php?sayfa=6');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `email` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` text COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `sehir` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kayitTarihi` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `email`, `ad`, `soyad`, `sifre`, `cinsiyet`, `sehir`, `kayitTarihi`) VALUES
(5, 'enesbilalogullari@trakya.edu.tr', 'Enes', 'Bilaloğulları', 'e10adc3949ba59abbe56e057f20f883e', 'Erkek', 'Bursa', '2018-05-02 11:05:20'),
(2, 'emre.elicora@hotmail.com', 'Emre', 'Eliçora', '81dc9bdb52d04dc20036dbd8313ed055', 'Erkek', 'Bursa', '2018-04-29 03:44:59'),
(3, 'burak.yildirim@gmail.com', 'Burak', 'Yıldırım', '20057fd0afd9a5909de70606b9d85142', 'Erkek', 'Edirne', '2018-04-29 03:45:40'),
(4, 'gokhanmertcan@trakya.edu.tr', 'Gökhan', 'Mertcan', '202cb962ac59075b964b07152d234b70', 'Erkek', 'Çanakkale', '2018-04-29 03:46:18'),
(6, 'emir.ozturk@trakya.edu.tr', 'Emir', 'Öztürk', '81dc9bdb52d04dc20036dbd8313ed055', 'Erkek', 'Bursa', '2018-05-02 15:14:25'),
(7, 'ali.aliaksoy@outlook.com', 'Ali', 'Aksoy', '202cb962ac59075b964b07152d234b70', 'Erkek', 'Bursa', '2020-02-21 23:45:43');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `begen`
--
ALTER TABLE `begen`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `eksikkitap`
--
ALTER TABLE `eksikkitap`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gununkitabi`
--
ALTER TABLE `gununkitabi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sss`
--
ALTER TABLE `sss`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `begen`
--
ALTER TABLE `begen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `eksikkitap`
--
ALTER TABLE `eksikkitap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `gununkitabi`
--
ALTER TABLE `gununkitabi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `sss`
--
ALTER TABLE `sss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
