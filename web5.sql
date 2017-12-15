-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2017 at 02:43 AM
-- Server version: 10.2.3-MariaDB-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web5`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `akses` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `akses`, `status`) VALUES
(1, 'akses', 1),
(2, 'user', 1),
(3, 'kategori', 1),
(4, 'penanda', 1),
(5, 'post', 1),
(7, 'divisi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`, `status`) VALUES
(1, 'Seluler', 1),
(2, 'Travel', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `divisi_id`, `status`) VALUES
(4, 'Transaksi', 2, 1),
(5, 'Informasi', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `tag_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `slug`, `judul`, `isi`, `kategori_id`, `tag_id`, `user_id`, `tgl`, `divisi_id`, `status`) VALUES
(14, 'cara-topup-citilink', 'Cara Topup Citilink', '<p><strong>CARA TOP UP CITILINK</strong><br />\r\n<br />\r\n<strong><u>Topup Citilink di Mesin EDC Permata</u></strong><br />\r\n1. Gunakan kartu ATM Permata warna hijau di Mesin EDC Permata<br />\r\n2. Masuk ke menu PEMBAYARAN<br />\r\n3. Lalu VIRTUAL ACCOUNT<br />\r\n4. Input kode topup ini: 8990000038000413<br />\r\n5. Masukan nominal dan password<br />\r\n6. Struk keluar dan ambil<br />\r\n7. SELESAI<br />\r\n<br />\r\n<em><strong>Kode topup Citilink di Permata: 8990000038000413</strong></em><br />\r\n<br />\r\n-----------------------------------------------------------------------------------<br />\r\n<br />\r\n<strong><u>Topup Citilink melalui Bank Mandiri</u></strong><br />\r\n1. Login internet banking Mandiri<br />\r\n2. Masuk menu BAYAR<br />\r\n3. Masuk menu MULTI PAYMENT<br />\r\n4. Pilih Dari Rekening xxx5979<br />\r\n5. Centang Penyedia Jasa dan pilih CITILINK TOP UP<br />\r\n6. Isi Kode Agent: 0038000413<br />\r\n7. Nominal di isi sesuai nominal yang akan di topup<br />\r\n8. Lanjutkan dan Centang Nominal Lanjutkan lagi.<br />\r\n9. Proses input token<br />\r\n10. Selesai<br />\r\n<br />\r\n<em><strong>Kode&nbsp; topup Citilink di Mandiri: 0038000413</strong></em></p>\r\n', 4, '15', 1, '2017-12-14 09:05:59', NULL, 1),
(15, 'bagasi-maskapai', 'Bagasi Maskapai', '<h4><b>INFORMASI BAGASI MASKAPAI</b></h4><p><br><b>1. LION AIR GROUPS</b><br><i><b>- Lion Air (JT)</b></i><br>Domestik<br>Ekonomi: 20 kg<br>Bisnis: 30 kg<br><br>Internasional<br>Ekonomi: 20 kg<br><br><i><b>- Batik Air (ID)</b></i><br>Ekonimi: 20 kg<br>Bisnis: 30 kg<br><br><i><b>- Wings Air (IW)</b></i><br>Ekonomi: 10 kg<br><br><i><b>- Thai Lion Air</b></i><br>Domestik<br>Ekonomi: 15 kg<br><br>Internasional<br>Singapura: 20 kg<br>Jakarta Cengkareng: 20 kg<br>Myanmar: 30 kg<br><br><i><b>- Malindo (OD)</b></i><br>Domestik<br>Ekonomi: 30 kg (Pesawat Boeing)<br>Ekonomi: 15 kg (Pesawat ATR)<br>Bisnis: 40 kg (Pesawat ATR)<br>Infant: 10 kg<br><br>Internasional<br>Ekonomi: 30 kg<br>Bisnis: 40 kg<br>Infant: 10 kg<br>(Harap Cek Ulang MALINDO)<br><br>--------------------------------<br><br><b>2. CITILINK INDONESIA (QG)</b><br>Bagasi 20 kg dan kabin 7 kg.<br><br>--------------------------------<br><br><b>3. GARUDA INDONESIA (GA)</b><br>Firs Class / Eksekutif: 40 kg dewasa dan 20 kg infant.<br>Bisnis: 30 kg dewasa dan 10 kg infant<br>Ekonomi: 20 kg dewasa dan 10 kg infant<br>Kabin 7 kg<br><br>-----------------------------------<br><br><b>4. AIRASIA (X, XT)</b><br>Domestik: 15 kg<br>Internasional: Tanpa bagasi (bayar lagi jika mau bagasi)<br>Kabin 7 kg<br><br>------------------------------------<br><br><b>5. SRIWIJAYA AIR (SJ)</b><br>Bagasi 20 kg, kecuali rute CGK-TNJ bagasinya 15 kg.<br>NAM Air perlu update!<br><br>--------------------------------------<br><br><b>6. KALSTAR (KD)</b><br>Pesawat ATR / baling-baling : 10 kg (rute pendek)<br>Pesawat EMBRAYER / BOENG: 20kg (rute panjang)<br><br>---------------------------------------<br><br><b>7. EXPESS AIR (XN)</b><br>Pesawat baling-baling: 10 kg (rute pendek)<br>Pesawat BOENG: 20 kg (rute panjang)<br>Kabin 7 kg<br><br>---------------------------------------<br><br><b>8. TRIGANA (IL)</b><br>Pesawat ATR / baling-baling : 10 kg (rute pendek)<br>Pesawat BOENG: 20kg (rute panjang)<br>7 KABIN<i><b></b></i></p><p><b>NOTE:</b><br><i><b>Ketentuan bagasi dapat berubah sewaktu-waktu, silahkan update jika menemukan informasi perubahan dari maskapai.</b></i><br><br></p>                                    ', 5, '16', 1, '2017-12-14 09:24:57', NULL, 0),
(16, 'call-center-lion-air', 'Call Center Lion Air', '<h3><strong>Call Center Lion Air Group</strong></h3>\r\n\r\n<h3><strong>LION AIR 08041778899 / 021-63798000<em> </em>(24 Jam)</strong></h3>\r\n\r\n<h4><strong>Lion SUB: 031-5036111</strong></h4>\r\n\r\n<p><u>Jam Operasional Lion Surabaya:</u><br />\r\n<em>- Senin - Jumat jam 08.30 - 16.30<br />\r\n- Sabtu jam 08.30 - 14.30<br />\r\n- Minggu / Libur Nasional jam 10.00 - 14.00</em><br />\r\n<br />\r\n<u>Keterangan:</u><br />\r\n- Saat menelepon selalu awali dengan angka 9<br />\r\n- Jika tidak bisa, silahkan awali dengan 85<br />\r\n- Panggilan Cepat: *14<br />\r\n<br />\r\n<span style="color:#3498db"><em>*Saat ini Lion Surabaya dapat dikontak melalui Telegram, utamakan kontak di Telegram dulu.</em></span></p>\r\n', 5, '17', 1, '2017-12-14 09:55:16', NULL, 1),
(17, 'ketentuan-penarikan-saldo-agent', 'Ketentuan Penarikan Saldo', '<strong>KETENTUAN PENARIKAN SALDO AGENT:</strong>\r\n<ol>\r\n	<li>Rekening penerima wajib atas nama pemilik travel yang terdaftar.</li>\r\n	<li>Pemilik Rekening travel hanya diperkenankan mendaftarkan 1 (satu) rekening per bank yang dapat menerima transfer dari Karunia Travel. Contoh: 1 rekening BCA, 1 rekening Mandiri, dll. Mendaftarkan 2 nama / 2 nomor rekening dalam 1 bank tidak diizinkan.</li>\r\n	<li>Apabila saat permintaan transfer balik / penarikan saldo terjadi cross bank (bank penyetoran berbeda dengan bank penarikan) maka akan dikenakan biaya Rp. 25,000 / transaksi.</li>\r\n	<li>Penarikan di atas Rp. 2,000,000 memerlukan verifikasi khusus kepada Admin Karunia Travel dan akan memakan waktu minimal 24 jam dan maksimal 48 jam kerja (tidak termasuk Sabtu - Minggu dan hari libur nasional).</li>\r\n	<li>Penarikan saldo yang dilakukan selain melalui Bank BCA, Mandiri, dan BNI akan diproses di hari kerja berikutnya (tidak termasuk hari Minggu dan libur nasional). Saldo akan dipotong terlebih dahulu.</li>\r\n</ol>\r\n\r\n<p><br />\r\nUpaya ini dilakukan untuk mendukung program pemerintah dalam hal Money Laundry (pencucian uang) dan untuk keamanan kita bersama. Artikel dapat dilihat di http://id.wikipedia.org/wiki/Pencucian_uang.</p>\r\n\r\n<p><u><strong>Catatan untuk Staff:</strong></u><br />\r\n<span style="color:#e74c3c"><em>- Wajib menulis keterangan ID Agent di kolom berita saat akan memproses penarikan saldo / transfer balik.</em></span></p>\r\n\r\n<p>&nbsp;</p>\r\n', 5, '19', 1, '2017-12-14 10:29:14', NULL, 1),
(18, 'call-center-sriwijaya-air', 'Call Center Sriwijaya Air', '<h3><strong>Call Center Sriwijaya Air<br />\r\n<br />\r\nSRIWIJAYA: 08041777777 / 021-29279777 (24 jam)</strong></h3>\r\n\r\n<h4><strong>Sriwijaya SUB: 031-5052777</strong></h4>\r\n<br />\r\n<u>Keterangan:</u><br />\r\n- Saat menelepon selalu awali dengan angka 9<br />\r\n- Jika tidak bisa, silahkan awali dengan 85<br />\r\n- Panggilan Cepat: *12<br />\r\n&nbsp;', 5, '17', 1, '2017-12-14 11:42:55', NULL, 1),
(19, 'call-center-citilink', 'Call Center Citilink', '<h3><strong>Call Center Citilink<br />\r\n<br />\r\nCITILINK INDONESIA: 08041080808 (24 jam)</strong></h3>\r\n\r\n<h4><strong>Citilink SUB: 031-8553887<br />\r\nCitilink Agent: 021-29341014</strong></h4>\r\n<br />\r\n<u>Keterangan:</u><br />\r\n- Saat menelepon selalu awali dengan angka 9<br />\r\n- Jika tidak bisa, silahkan awali dengan 85<br />\r\n- Panggilan Cepat: *15<br />\r\n&nbsp;', 5, '17', 1, '2017-12-14 11:53:29', NULL, 1),
(20, 'call-center-garuda-indonesia', 'Call Center Garuda Indonesia', '<h3><strong>Call Center Garuda Indonesia<br />\r\n<br />\r\nGARUDA: 08041807807 / (021) 23519999 (24 jam)</strong></h3>\r\n<br />\r\n<u>Keterangan:</u><br />\r\n- Saat menelepon selalu awali dengan angka 9<br />\r\n- Jika tidak bisa, silahkan awali dengan 85<br />\r\n- Panggilan Cepat: *11<br />\r\n&nbsp;', 5, '17', 1, '2017-12-14 12:05:09', NULL, 1),
(21, 'call-center-airasia', 'Call Center AirAsia', '<h3><strong>Call Center AirAsia<br />\r\n<br />\r\nAIRASIA INDONESIA: 08041333333 / (021) 29270999 (24 jam)</strong></h3>\r\n<br />\r\nKeterangan:<br />\r\n- Saat menelepon selalu awali dengan angka 9<br />\r\n- Jika tidak bisa, silahkan awali dengan 85<br />\r\n&nbsp;', NULL, NULL, 1, '2017-12-14 12:09:02', NULL, 1),
(22, 'call-center-airasia-1513228166', 'Call Center AirAsia', 'Call Center AirAsia', NULL, NULL, 1, '2017-12-14 12:09:26', NULL, 1),
(23, 'call-center-airasia-1513228224', 'Call Center AirAsia', '<h3><strong>Call Center AirAsia Indonesia<br />\r\n<br />\r\nAIRASIA: 08041333333 / 021-29270999 (24 jam)</strong></h3>\r\n\r\n<h4><strong>AirAsia Travel Agent: 021-7205782</strong></h4>\r\n<br />\r\n<u>Keterangan:</u><br />\r\n- Saat menelepon selalu awali dengan angka 9<br />\r\n- Jika tidak bisa, silahkan awali dengan 85<br />\r\n&nbsp;', 5, '17', 1, '2017-12-14 12:10:24', NULL, 1),
(24, 'call-center-trigana', 'Call Center Trigana', '<h3><strong>Call Center Trigana Air Service<br />\r\n<br />\r\nTRIGANA: 021 - 86613207 / ex. 08 (24 jam)</strong></h3>\r\n\r\n<h4><strong>Trigana SUB: 031 - 8688487 / 031 - 72889111<br />\r\nBapak Erik Trigana SUB: 088805763262</strong></h4>\r\n<br />\r\n<u>Keterangan:</u><br />\r\n- Saat menelepon selalu awali dengan angka 9<br />\r\n- Jika tidak bisa, silahkan awali dengan 85<br />\r\n- Panggilan Cepat: *17<br />\r\n&nbsp;', 5, '17', 1, '2017-12-14 12:16:57', NULL, 1),
(25, 'call-center-expres-air', 'Call Center Expres Air', '<h3><strong>Call Center Xpres Air<br />\r\n<br />\r\nExpress: 021-65865656 / 021-500890 / 021-29407777</strong></h3>\r\n<br />\r\n<u>Keterangan:</u><br />\r\n- Saat menelepon selalu awali dengan angka 9<br />\r\n- Jika tidak bisa, silahkan awali dengan 85<br />\r\n&nbsp;', 5, '17', 1, '2017-12-14 12:22:24', NULL, 1),
(26, 'call-center-jetstar', 'Call Center Jetstar', '<h3><strong>Call Center Jetstar Airways<br />\r\n<br />\r\nJETSTAR / Value Air: 021-2555 6333 (24 jam)</strong></h3>\r\n<br />\r\n<u>Keterangan:</u><br />\r\n- Saat menelepon selalu awali dengan angka 9<br />\r\n- Jika tidak bisa, silahkan awali dengan 85<br />\r\n&nbsp;', 5, '17', 1, '2017-12-14 12:24:23', NULL, 1),
(27, 'call-center-kereta-api-indonesia', 'Call Center Kereta Api Indonesia', '<h3><strong>Call Center Kereta Api Indonesia<br />\r\n<br />\r\nKERETA API INDONESIA: 121 / 021-121 (24 jam)</strong></h3>\r\n<br />\r\n<u>Keterangan:</u><br />\r\n- Saat menelepon selalu awali dengan angka 9<br />\r\n- Jika tidak bisa, silahkan awali dengan 85<br />\r\n&nbsp;', 5, '17', 1, '2017-12-14 12:29:14', NULL, 1),
(28, 'login-bank', 'Login Bank', '<u><span style="font-size:22px"><strong>Username dan Password Bank</strong></span></u><br />\r\n<br />\r\n<strong>1. <u>Bank BCA</u></strong><br />\r\n<em><strong>- BCA<span style="font-size:11.0pt"> untuk dana masuk (Rekening Travel)</span></strong></em><br />\r\nUser&nbsp; : indragun2998<br />\r\nPass : 999999<br />\r\n<br />\r\n<em><strong>- BCA untuk transaksi dana keluar</strong></em><br />\r\nUser&nbsp; : indragun3086<br />\r\nPass : 999999<br />\r\n<br />\r\n-----------------------------------------------------------------------<br />\r\n<br />\r\n<strong>2. <u>Bank Mandiri</u></strong><br />\r\nUser&nbsp; : indrags86<br />\r\nPass : 999999<br />\r\n<br />\r\n-----------------------------------------------------------------------<br />\r\n<br />\r\n<strong>3. <u>Bank BNI</u></strong><br />\r\nUser&nbsp; : indragun3086<br />\r\nPass : Abcd9999<br />\r\n<br />\r\n-----------------------------------------------------------------------<br />\r\n<br />\r\n<strong>4. <u>Bank BRI</u></strong><br />\r\nUser&nbsp; : indrag0930<br />\r\nPass : Abcd9999<br />\r\n<br />\r\n-----------------------------------------------------------------------<br />\r\n<br />\r\n<strong>5. <u>Bank BII (Maybank)</u></strong><br />\r\n<em><strong>- Bank BII Travel</strong></em><br />\r\nUser&nbsp; : indragun3086<br />\r\nPass : Abcd9999<br />\r\n<br />\r\n<em><strong>- Bank BII Coolpay (Password sering update)</strong></em><br />\r\nCode : TCK2846<br />\r\nUser : INDRA86<br />\r\nPass : Abcd9797<br />\r\n<br />\r\n-----------------------------------------------------------------------<br />\r\n<br />\r\n<strong>6. <u>Bank CIMB Niaga</u></strong><br />\r\nUser&nbsp; : indrags<br />\r\nPass : Abc999<br />\r\n<br />\r\n-----------------------------------------------------------------------<br />\r\n<br />\r\n<strong>7. <u>Bank Permata</u></strong><br />\r\nUser&nbsp; : indrags<br />\r\nPass : Abc999<br />\r\n<br />\r\n-----------------------------------------------------------------------<br />\r\n<br />\r\n<strong>8. <u>Bank Danamon</u></strong><br />\r\nUser&nbsp; : indragun3086<br />\r\nPass : 99999999<br />\r\n<br />\r\n-----------------------------------------------------------------------<br />\r\n<br />\r\n<strong>9. <u>Bank Mega</u></strong><br />\r\nUser&nbsp; :<br />\r\nPass :<br />\r\n<br />\r\n<br />\r\n<span style="color:#ff0033"><em><u>Catatan:</u><br />\r\n- Mohon jaga kerahasiaan user login bank.<br />\r\n- Beberapa bank memberlakukan ketentuan untuk mengganti password secara berkala (update).</em></span><br />\r\n&nbsp;', 5, '21', 1, '2017-12-14 12:45:34', NULL, 1),
(29, 'sms-pengingat-customer', 'SMS Pengingat Customer', '<h3><span style="font-size:18px"><strong>SMS PENGINGAT CUSTOMER</strong></span></h3>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<caption>\r\n	<div style="text-align:left"><strong>Form Pending SMS</strong></div>\r\n	</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td><span style="color:#3498db">KARUNIA TRAVEL:<br />\r\n			Selamat malam Bapak Susilo,<br />\r\n			Tiket Sriwijaya ABCDEF Anda berangkat jam 21.00. Harap datang 2 jam sebelumnya untuk menghindari keterlambatan.</span><br />\r\n			&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<br />\r\n<u>Keterangan:</u><br />\r\n- Disarankan teks maksimal 160 karakter<br />\r\n- Bisa dikirim 12 jam sebelum jadwal penerbangan<br />\r\n- Pastikan setting tanggal dan jam pengiriman SMS sesuai<br />\r\n&nbsp;', 5, '20', 1, '2017-12-14 13:10:43', NULL, 1),
(30, 'format-promo-broadcast-bc-customer', 'Format Promo Broadcast / BC Customer', 'Selamat pagi...<br />\r\nSalam hangat dari Karunia Travel Surabaya<br />\r\n<br />\r\n<strong>TIKET MURAH MINGGU INI! </strong><br />\r\nLION Surabaya - Balikpapan mulai Rp 494,300<br />\r\nCITILINK Makassar - Surabaya mulai Rp 494,600<br />\r\nSRIWIJAYA Semarang - Jakarta mulai Rp 332,200<br />\r\nAIRASIA Denpasar - Surabaya mulai Rp 389,000<br />\r\n<br />\r\n<strong>HOTEL MURAH di MALANG!</strong><br />\r\nEveryday Smart Hotel mulai Rp 340,000 / malam<br />\r\nAmaris Hotel mulai Rp 371,000 / malam<br />\r\nThe Grand Palace Hotel mulai Rp 370,000 / malam<br />\r\nSwiss Bellin mulai Rp 530,000 / malam<br />\r\nThe Singasari Resort mulai Rp 1,100,000 / malam<br />\r\n*Semua termasuk sarapan untuk 2 orang<br />\r\n<br />\r\n<strong>DAN MASIH BANYAK PILIHAN PENERBANGAN DAN HOTEL LAINNYA....</strong><br />\r\n<br />\r\n<strong>DAPATKAN POTONGAN LANGSUNG DENGAN MEMESAN TIKET PESAWAT HARI INI!!!</strong><br />\r\n<br />\r\nPesan sekarang juga!<br />\r\nHubungi kami 24 jam:<br />\r\nKARUNIA TRAVEL SURABAYA<br />\r\nPertokoan Kalibutuh Indah<br />\r\nJl. Kalibutuh 134-Q, Surabaya<br />\r\nTelp: 031-5313253 | Fax: 031-5461793<br />\r\nwww.karuniatravel.com<br />\r\n<br />\r\n<strong>WA | Line | Telegram | SMS:</strong><br />\r\n087853685888<br />\r\n082234446699<br />\r\n085850080001<br />\r\n<br />\r\n<br />\r\n<u>Catatan:</u><br />\r\n- BC setiap 2 hari sekali melalui WA nomor XL<br />\r\n- Sertakan emot senyum atau logo pesawat<br />\r\n- Pembukaan bisa diganti Selamat pagi, selamat berakhir pekan, selamat hari pahlawan dll.<br />\r\n&nbsp;', 5, '20,22', 1, '2017-12-14 13:34:25', NULL, 1),
(31, 'nomor-kontak-karunia-travel', 'NOMOR KONTAK KARUNIA TRAVEL', '<span style="font-size:18px"><strong>NOMOR KONTAK KARUNIA TRAVEL</strong></span><br />\r\n<br />\r\n<span style="color:#3498db"><u><strong>Nomor 24 jam KHUSUS Telpon</strong></u></span><br />\r\n031-5313253<br />\r\nXL : 087852748111<br />\r\nTelkomsel : 081234356699<br />\r\nIM3 : 085785684111<br />\r\n<br />\r\n<span style="color:#3498db"><u><strong>Nomor 24 jam KHUSUS SMS</strong></u></span><br />\r\nXL : 087853685888<br />\r\nTelkomsel: 082234446699<br />\r\nIM3: 085850080001<br />\r\n(<em>Tersambung ke WhatsApp dan Telegram</em>)<br />\r\n<br />\r\n<u><strong>Whatsapp</strong></u><br />\r\n<span style="color:#3300ff"><strong>087853685888 | Karunia Travel 3 (XL)&nbsp;&nbsp; | Telegram 3 | @karuniatravel3 (Aktif 24 JAM)</strong></span><br />\r\n082234446699 Karunia travel 4 (Tsel) | Telegram 1<br />\r\n085850080001 Karunia travel 1 (ISAT) | Telegram 4<br />\r\n<br />\r\n<span style="color:#3498db"><u><strong>Telegram</strong></u></span><br />\r\n@karuniatravel1<br />\r\n@karuniatravel3<br />\r\n@karuniatravel4<br />\r\n<br />\r\n<span style="color:#3498db"><u><strong>Pin BBM</strong></u></span><br />\r\n2B161D17<br />\r\n<br />\r\n<span style="color:#3498db"><u><strong>LINE</strong></u></span><br />\r\n@karuniatravel1<br />\r\n@karuniatravel3<br />\r\n<br />\r\n<span style="color:#3498db"><u><strong>YM (Yahoo Messenger)</strong></u></span><br />\r\nkaruniatravel1<br />\r\nkaruniatravel3<br />\r\n<br />\r\n<span style="color:#3498db"><u><strong>Email </strong></u></span><br />\r\nticketing@karuniatravel.com<br />\r\n<br />\r\n----------------------------------------------------------------------------<br />\r\n<br />\r\n<span style="color:#3498db"><strong>Kontak Tim OP (Whatsapp dan Telegram)</strong></span><br />\r\nZuhri&nbsp;&nbsp; &nbsp; : 081336624444<br />\r\nAgung&nbsp;&nbsp; : 085755637225<br />\r\nAdit&nbsp;&nbsp; &nbsp;&nbsp; : 085733877469<br />\r\n<br />\r\nMas Indra: 081331486677<br />\r\n(<span style="color:#ff0033"><em>Konfirmasi dulu ke Mas Indra kalau ada yang meminta nomornya</em></span>)<br />\r\n&nbsp;', 5, '20,23', 1, '2017-12-14 13:46:12', NULL, 1),
(32, 'rekening-karunia-travel', 'Rekening Karunia Travel', '<h2><span style="color:#1abc9c"><u><strong>Nomor Rekening Karunia Travel</strong></u></span></h2>\r\nBCA: 2140636323<br />\r\nMandiri: 1420006095979<br />\r\nBNI: 0299469673<br />\r\nNiaga: 2160100086118<br />\r\nDanamon: 91980789<br />\r\nBII: 1089059789<br />\r\nBRI: 313701001727500<br />\r\nBank Mega: 020380029000017<br />\r\nPermata: 4104967685<br />\r\n<br />\r\nSemua atas nama Indra Gunawan Soetanto.<br />\r\n<br />\r\n<br />\r\n<u><strong>Catatan:</strong></u><br />\r\n- Info atas nama &quot;Indra Gunawan&quot; kepada agent baru<br />\r\n&nbsp;', 5, '21,23,24', 1, '2017-12-14 14:00:04', NULL, 1),
(33, 'terminal-maskapai-di-jakarta-update', 'Terminal Maskapai di Jakarta (Updated)', '<u><span style="font-size:18px"><strong>TERMINAL MASKAPAI DI JAKARTA (CGK) - Updated 03 Juli 2017</strong></span></u><br />\r\n<br />\r\n<strong>1. LION AIR GROUPS</strong><br />\r\n- Terminal 1A<br />\r\nPenerbangan untuk dari dan menuju Pulau Jawa, Sulawesi, Kalimantan, Ambon, dan Papua.<br />\r\n- Terminal 1B<br />\r\nPenerbangan dari dan menuju Pulau Sumatera, Bali, dan Lombok.<br />\r\n- Terminal 1C<br />\r\nBatik Air<br />\r\n- Terminal 2E<br />\r\nKhusus Lion Internasional<br />\r\n<br />\r\n--------------------------------------------------------------------------------------------------------------------<br />\r\n<br />\r\n<strong>2. CITILINK INDONESIA</strong><br />\r\nTerminal 1C (CGK dan HLP)<br />\r\n<br />\r\n--------------------------------------------------------------------------------------------------------------------<br />\r\n<br />\r\n<strong>3. SRIWIJAYA &amp; NAM AIR</strong><br />\r\nTerminal 2F<br />\r\n<br />\r\n--------------------------------------------------------------------------------------------------------------------<br />\r\n<br />\r\n<strong>4. GARUDA INDONESIA</strong><br />\r\nDomestik: Terminal 3 Ultimate gate 5<br />\r\nInternasional: Terminal 3 Ultimate gate 1 - 3<br />\r\nSurabaya di Terminal 2<br />\r\n<br />\r\n--------------------------------------------------------------------------------------------------------------------<br />\r\n<br />\r\n<strong>5. AIRASIA</strong><br />\r\n- Jakarta<br />\r\nDomestik: Terminal 2F<br />\r\nInternasional: Check-in 2F, boarding 2E<br />\r\n- Surabaya<br />\r\nDomestik &amp; Internasional: Terminal 2<br />\r\n<br />\r\n<br />\r\n<u>Catatan:</u><br />\r\n- Data terminal sewaktu-waktu bisa berubah.<br />\r\n&nbsp;', 5, '25,26', 1, '2017-12-14 14:18:45', NULL, 1),
(34, 'nomor-panggilan-cepat-kantor', 'Nomor Panggilan Cepat (Kantor)', '<h3><span style="color:#3498db"><u><strong>Panggilan Cepat diawali Tanda Bintang *</strong></u></span></h3>\r\n00 Indra Flexi<br />\r\n01 Indra HP<br />\r\n02 Indra XL<br />\r\n03 Rumah<br />\r\n11 Garuda<br />\r\n12 Sriwijaya<br />\r\n13 Batavia<br />\r\n14 Lion Air<br />\r\n15 Citilink<br />\r\n17 Trigana<br />\r\n18 Kalstar<br />\r\n21 Hotel 1<br />\r\n22 Hotel 2<br />\r\n23 Hotel 3<br />\r\n24 Hotel 4<br />\r\n25 Hotel 5<br />\r\n26 Hotel 6<br />\r\n27 Hotel 7<br />\r\n28 Hotel 8<br />\r\n31 MD<br />\r\n<br />\r\nContoh:<br />\r\nJika mau menelepon Lion ketik tanda bintang di telepon lalu 14, menjadi *14.<br />\r\n&nbsp;', 5, '23,29', 1, '2017-12-14 14:55:47', NULL, 1),
(35, 'ketentuan-booking-hotel-updated', 'KETENTUAN BOOKING HOTEL [UPDATED]', '<h3><span style="color:#3498db"><strong>KETENTUAN BOOKING HOTEL [UPDATED]</strong></span></h3>\r\n<br />\r\n<strong>1. <u>Kaha (KH / 21)</u></strong><br />\r\n- Karunia dapat komisi 10,000 dari KH<br />\r\n- Harga agent adalah harga web<br />\r\n- NTA adalah harga yang tercantum di web dikurangi 10,000<br />\r\n- Harga yang ditampilkan tidak online, jadi belum pasti tersedia<br />\r\n- Perhatikan jenis BF / sarapan single (1 orang) dan double (2 orang)<br />\r\n- Issued pakai saldo<br />\r\n- Dilarang mengisi nomor HP tamu, harap isi nomor Karunia<br />\r\n<br />\r\n<em><strong>Login KH</strong></em><br />\r\nagent.kaha-wholesaler.com<br />\r\nUsername: KARUNIAS0375<br />\r\nPassword: Karunia123<br />\r\n<br />\r\n<em><strong>Login KH Area Malang dan Topup</strong></em><br />\r\nagent.kahatravel.com/login<br />\r\nAgent ID: S0375<br />\r\nUsername: KARUNIA<br />\r\nPassword: Karunia123<br />\r\n<br />\r\n-------------------------------------------------------------------------------------------<br />\r\n<br />\r\n<strong>2. <u>Mandira (MD)</u></strong><br />\r\n- Harga agent adalah harga web ditambah 10,000 / room / night<br />\r\n- NTA adalah harga yang tercantum di web<br />\r\n- Tidak ada komisi ke agent<br />\r\n- Issued pakai saldo<br />\r\n<br />\r\n<em><strong>Login MD</strong></em><br />\r\nwww.mandiratravel.com<br />\r\nAgen ID: karuniasby<br />\r\nUsername: kalibutuh1<br />\r\nPass: kalibutuh1<br />\r\n<br />\r\n-------------------------------------------------------------------------------------------<br />\r\n<br />\r\n<strong>3. <u>Agoda (AG)</u></strong><br />\r\n- Harga di awal belum lain-lain, silahkan tambah 21 % dari harga awal<br />\r\n- Komisi agent 3% dari basic<br />\r\n- NTA adalah harga yang dibayar Karunia ke Agoda<br />\r\n- Jika tidak ada promo / komisi, ditambah 10.000 / room / night.<br />\r\n- Issued menggunakan CC BCA<br />\r\n- Jangan booking kamar dengan keterangan: Pay at hotel, tax receipt available, book without credit card.<br />\r\n<br />\r\n<em><strong>Login AG</strong></em><br />\r\nwww.agoda.com/bca<br />\r\nEmail: indra@karuniatravel.com<br />\r\nPassword: Karunia1234<br />\r\n<br />\r\n-------------------------------------------------------------------------------------------<br />\r\n<br />\r\n<strong>4. <u>Bedsonline (BO)</u></strong><br />\r\n- Harga sudah harga hotel, tidak perlu ditambah lagi. Jika cek lebih dari 1 malam, harga yang muncul adalah harga total.<br />\r\n- Hindari CC ANZ karena kena charge<br />\r\n- Pilih payment agent jika warna hijau tamu langsung bayar di hotelnya<br />\r\n- Komisi agent 5% dari total harga, dibulatkan ke bawah<br />\r\n- NTA dikurangi 10% (harga yang tertera setelah issued)<br />\r\n- Issued menggunakan CC BCA<br />\r\n<br />\r\n<em><strong>Login BO</strong></em><br />\r\nwww.bedsonline.com/login<br />\r\nUser: igunawan<br />\r\nPassword: Gun6a<br />\r\n<br />\r\n-------------------------------------------------------------------------------------------<br />\r\n<br />\r\n<strong>5. MG Holiday / MG (Web Agent)</strong><br />\r\n- Harga yang tertera sudah harga agent<br />\r\n- NTA harga web dikurangi 20.000<br />\r\n- Agent dapat komisi 10,000 jika issued sendiri, jika issued di staff tidak dapat komisi.<br />\r\n- Hotel internasional dicek di MG Web<br />\r\n- Issued pakai saldo<br />\r\n<br />\r\n<em><strong>Login MG Web</strong></em><br />\r\nwww.mgholiday.com<br />\r\nAgent code : i822<br />\r\nUsername : ticketing<br />\r\nPass : Karunia1234<br />\r\n<br />\r\n-------------------------------------------------------------------------------------------<br />\r\n<br />\r\n<strong>6. <u>Expedia (EX)</u></strong><br />\r\n- Harga awal ditambah 21%, atau lanjutkan dan klik &quot;tampilkan komisi&quot; jika mau tau harga total.<br />\r\n- Komisi Agent: 2,7% dari total<br />\r\n- NTA: dikurangi 9%<br />\r\n- Issued menggunakan CC BCA<br />\r\n- Jika tidak bisa, gunakan CC BNI<br />\r\n<br />\r\n<strong><em>Login EX</em></strong><br />\r\nwww.expedia.co.id/TAAP-Info<br />\r\nE: info@karuniatravel.com<br />\r\nP: Karunia1234<br />\r\n<br />\r\n<br />\r\n<u>Keterangan:</u><br />\r\n- Data CC tetap ambil di Notepad<br />\r\n- Isi nomor HP penumpang dengan nomor kantor<br />\r\n<br />\r\n&nbsp;', 5, '30', 1, '2017-12-14 15:20:49', NULL, 1),
(36, 'topup-xpress-air', 'Topup Xpress Air', '<h2><strong>Cara Topup Express Air</strong></h2>\r\n1. Login internet banking Mandiri<br />\r\n2. Masuk menu BAYAR<br />\r\n3. Masuk menu MULTI PAYMENT<br />\r\n4. Pilih Dari Rekening xxx5979<br />\r\n5. Centang Penyedia Jasa dan pilih XPRESS AIR<br />\r\n6. Isi Kode Agent: 15682<br />\r\n7. Nominal di isi sesuai nominal yang akan di topup (minimal 2juta)<br />\r\n8. Lanjutkan dan Centang Nominal Lanjutkan lagi.<br />\r\n9. Proses input token<br />\r\n10. Selesai<br />\r\n<br />\r\n---------------------------------------------------------------------------------------------------\r\n<h3><strong>Alternatif Topup Express (jika Topup Mandiri error)</strong></h3>\r\nJika Topup otomatis di Bank Mandiri gangguan, silahkan transfer ke:<br />\r\n<br />\r\nBCA 6070444419<br />\r\nPT. Travel Express Aviation Services<br />\r\n<br />\r\nTuliskan nomor sign in master anda / Kode booking di kolom BERITA.<br />\r\nEmailkan ke: topup@expressair.co.id<br />\r\nCC ke: surabaya1@karuniatravel.com<br />\r\n<br />\r\n&nbsp;', 4, '15', 1, '2017-12-14 16:51:19', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `tag`, `kategori_id`, `status`) VALUES
(15, 'Topup', 4, 1),
(16, 'Bagasi', 5, 1),
(17, 'Call Center', 5, 1),
(19, 'Penarikan Saldo / Transfer Balik', 5, 1),
(20, 'Customer', 5, 1),
(21, 'Bank', 5, 1),
(22, 'Promosi', 5, 1),
(23, 'Nomor', 5, 1),
(24, 'Rekening', 5, 1),
(25, 'Terminal', 5, 1),
(26, 'Maskapai', 5, 1),
(27, 'Maskapai', 5, 0),
(28, 'Refund', 5, 1),
(29, 'Kontak', 5, 1),
(30, 'Hotel', 5, 1),
(31, 'Transfer', 4, 1),
(32, 'Issued', 4, 1),
(33, 'Booking', 4, 1),
(34, 'Refund', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses_id`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1,7,3,4,5,2', 1),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '1,7,3,4,5,2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
