-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2022 pada 16.13
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `pass1` varchar(256) DEFAULT NULL,
  `profile_pic` varchar(256) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `goldar` varchar(10) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `notelp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `name`, `username`, `email`, `pass1`, `profile_pic`, `role`, `goldar`, `alamat`, `notelp`) VALUES
(8, 'Merryska C', 'merryskac', 'umsi@umich.edu', '$2y$10$jcy1tJevwp02RpVlRJxLW.RXYvhWefjDb6LYhkO/IOTchWlulsKP2', 'default.png', 1, 'AB+', 'JL. DEWI SARTIKA', '0813-4224-6239'),
(9, 'M. Fahril', 'admin', 'admin@pmi.com', '$2y$10$6dsDczyItJhTD2zpT94.LOd6ExiHtZYaa40DXJDbPv3ZIv7V14Oo.', 'me.jpg', 1, 'A+', 'Guru Tua', '0813-4224-6239'),
(10, 'Mercz', 'merch', 'merryskachr@gmail.com', '$2y$10$Lt7F3vV33dOjAwoaonmW/uMIZykr.ZLv5FIbysEoB7M3bdzIEl02.', 'default.png', 1, 'AB+', 'Guru Tua', '0813-4224-6239'),
(11, 'trirama', 'trirama', 'trikrama@gmail.com', '$2y$10$0.Qm/UeBGd4bevnjMx1w6.iEO7XF8nHVZo8c.FV7mmvphj1Ozd47K', 'default.png', 2, 'AB-', 'silae', '0323322'),
(12, 'Merryska C', 'merryskach', 'mer@gmail.com', '$2y$10$7GxJqolVp60xzR1GkmyOm.Xa2ReKzZURmeYL/Depkq1NEdaRVZrou', 'default.png', 2, '', '', '0'),
(13, 'M. Fahril', 'fahril', 'westanything@gmail.com', '$2y$10$n0RrEaKjge/3rUTZor2KleCw.2gK4OFnMclQ/N9MOC2L7ZFdycqBO', 'default.png', 2, 'B+', 'JL. DEWI SARTIKA', '0813-4224-6239'),
(14, 'Badrol bin Kasim', 'gengpetualanganbermula', 'pipinpin@gmail.com', '$2y$10$be43IaNo5z9mFIORNxjK2u26JrrrREMqf3P8KNon5eKbcGPMa66ci', 'default.png', 2, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `didonor`
--

CREATE TABLE `didonor` (
  `id` int(11) NOT NULL,
  `id_account` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `goldar` varchar(5) DEFAULT NULL,
  `banyak_kantong` int(11) NOT NULL,
  `urgent` int(11) DEFAULT NULL,
  `done` int(11) NOT NULL,
  `waktu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `didonor`
--

INSERT INTO `didonor` (`id`, `id_account`, `nama`, `alamat`, `umur`, `goldar`, `banyak_kantong`, `urgent`, `done`, `waktu`) VALUES
(33, 11, 'Shaine Tran', '863-1327 Feugiat. Street', 30, 'B-', 2, 0, 1, '2:43 AM'),
(35, 9, 'Gil Mayer', 'P.O. Box 927, 2901 Felis Ave', 40, 'O-', 3, 1, 0, '2022/06/19 18:30:29'),
(37, 11, 'Yoshio Church', 'Ap #983-7573 Nec St.', 63, 'AB+', 2, 0, 1, '9:35 AM'),
(38, 10, 'Dante Giles', '391-244 Aliquet St.', 45, 'A+', 1, 0, 0, '12:57 PM'),
(39, 11, 'Kirestin Mueller', 'Ap #357-7961 Augue St.', 57, 'AB-', 2, 0, 0, '1:53 AM'),
(40, 10, 'Ralph Head', '1163 Velit Street', 58, 'AB-', 2, 1, 0, '11:33 PM'),
(41, 11, 'Randall Mayer', 'Ap #554-5745 Facilisis Avenue', 34, 'AB-', 1, 1, 1, '11:53 PM'),
(42, 11, 'Mufutau Stewart', 'Ap #467-4813 Dui Ave', 67, 'B-', 2, 1, 1, '7:30 AM'),
(43, 10, 'Scarlet Walls', '915-565 Turpis. Ave', 35, 'AB-', 2, 1, 1, '9:14 PM'),
(44, 9, 'Lareina Anthony', '314-6902 Maecenas Road', 41, 'O-', 2, 0, 0, '12:57 PM'),
(45, 10, 'Jaquelyn Ellis', 'Ap #391-7779 Vitae, Av.', 63, 'B-', 1, 1, 1, '6:47 AM'),
(46, 11, 'Keaton Pickett', '583-3052 Elementum St.', 24, 'B+', 2, 0, 0, '5:37 AM'),
(47, 9, 'Nyssa Fuentes', 'P.O. Box 954, 3800 Dui. Road', 24, 'A-', 4, 0, 0, '7:58 PM'),
(48, 9, 'Marvin Alvarado', '6547 Risus. Avenue', 35, 'O-', 4, 1, 1, '4:06 AM'),
(49, 9, 'Samson Gates', 'Ap #848-3448 Vehicula St.', 49, 'AB-', 5, 0, 0, '2:03 AM'),
(50, 9, 'Marsden Bray', 'Ap #742-6121 Augue Av.', 68, 'AB+', 4, 0, 1, '10:29 PM'),
(51, 11, 'Sybill Burris', 'P.O. Box 643, 8216 Erat. Rd.', 60, 'B+', 5, 1, 0, '5:12 AM'),
(53, 12, 'Lev Holder', '6362 Eu Av.', 63, 'A-', 4, 0, 0, '2:08 AM'),
(54, 11, 'Fallon Weaver', '229-8705 Imperdiet Rd.', 66, 'AB-', 4, 1, 1, '3:52 AM'),
(55, 10, 'Rafael Wilkinson', '975-6737 Phasellus Av.', 69, 'A+', 5, 1, 1, '12:08 AM'),
(56, 11, 'Salvador Willis', 'Ap #658-655 Fames Rd.', 36, 'A+', 5, 1, 0, '4:51 PM'),
(57, 10, 'Ryder Ruiz', 'Ap #717-5912 Vestibulum Av.', 29, 'A-', 2, 1, 1, '1:00 AM'),
(58, 10, 'Tarik Cash', '4492 Risus. Rd.', 17, 'B-', 4, 1, 1, '11:19 PM'),
(59, 10, 'Tasha Clayton', '353-7668 Ligula St.', 42, 'A-', 2, 1, 1, '2:51 PM'),
(61, 9, 'Aladdin Phelps', 'P.O. Box 598, 8376 Odio. Avenue', 22, 'A+', 2, 1, 1, '12:17 AM'),
(63, 8, 'Merryska', 'jl destik', 21, 'B+', 3, 1, 0, '2022/06/08 13:51:30'),
(65, 8, 'hai', 'jl destik', 24, 'B+', 4, NULL, 0, '2022/06/14 14:50:45'),
(66, 13, 'Ardiansyah R', 'jl. jalan', 90, 'O+', 12, 0, 0, '2022/06/19 01:03:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendonor`
--

CREATE TABLE `pendonor` (
  `id` int(11) NOT NULL,
  `id_account` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `umur` varchar(256) DEFAULT NULL,
  `goldar` varchar(5) DEFAULT NULL,
  `banyak_kantong` int(11) NOT NULL,
  `alamat_pmi` varchar(128) NOT NULL,
  `waktu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendonor`
--

INSERT INTO `pendonor` (`id`, `id_account`, `nama`, `alamat`, `umur`, `goldar`, `banyak_kantong`, `alamat_pmi`, `waktu`) VALUES
(6, 9, 'Merryska', 'jl destik', '18', 'AB+', 4, 'PMI palu', '2022/04/23 23:03:21'),
(8, 9, 'MerryskaC', 'Jl. Lagarutu', '23', 'A+', 1, 'PMI palu', '2022/04/26 15:24:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_idx` (`role`);

--
-- Indeks untuk tabel `didonor`
--
ALTER TABLE `didonor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`);

--
-- Indeks untuk tabel `pendonor`
--
ALTER TABLE `pendonor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_account` (`id_account`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `didonor`
--
ALTER TABLE `didonor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `pendonor`
--
ALTER TABLE `pendonor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `didonor`
--
ALTER TABLE `didonor`
  ADD CONSTRAINT `didonor_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendonor`
--
ALTER TABLE `pendonor`
  ADD CONSTRAINT `pendonor_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `akun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
