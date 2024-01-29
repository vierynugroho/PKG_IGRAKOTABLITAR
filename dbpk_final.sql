-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Agu 2023 pada 02.18
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpk_final`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_kompetensi`
--

CREATE TABLE `isi_kompetensi` (
  `id_isi` int(11) NOT NULL,
  `id_kompetensi` int(11) DEFAULT NULL,
  `isi_kompetensi` text,
  `ket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `isi_kompetensi`
--

INSERT INTO `isi_kompetensi` (`id_isi`, `id_kompetensi`, `isi_kompetensi`, `ket`) VALUES
(1, 1, 'Guru dapat mengidentifikasi karakteristik anak  usia  dini yang berkaitan dengan 6 aspek perkembangan yaitu : nilai agama dan moral, kognitif, fisik motorik, bahasa, sosial emosional, seni dan sesuai latar belakang sosial-budaya.', '0,1,2'),
(2, 1, 'Guru mengidentifikasi kemampuan awal anak usia dini dalam aspek perkembangan.', '0,1,2'),
(3, 1, 'Guru menata lingkungan main yang memfasilitasi  anak  usia dini dalam perkembangan.', '0,1,2'),
(4, 1, 'Guru memastikan semua anak usia dini mendapatkan kesempatan untuk berpartisipasi aktif dalam kegiatan belajar melalui bermain.', '0,1,2'),
(5, 1, 'Guru memiliki catatan tentang perkembangan kemampuan anak usia dini dalam 6 aspek perkembangan.', '0,1,2'),
(6, 1, 'Guru  mengidentifikasi kesulitan yang  dialami  anak usia dini dalam 6 aspek pengembangan dan membantu mengatasinya.', '0,1,2'),
(7, 1, 'Guru dapat memilih metode belajar melalui bermain yang sesuai dalam berbagai bidang pengembangan di RA', '0,1,2'),
(8, 1, 'Guru menggunakan metode belajar melalui bermain yang sesuai dalam berbagai bidang pengembangan di RA.', '0,1,2'),
(9, 1, 'Guru merancang kegiatan bermain yang mendidik secara kreatif dalam berbagai lingkungan bermain untuk memfasilitasi anak usia dini belajar melalui bermain.', '0,1,2'),
(10, 1, 'Guru merancang kegiatan pembelajaran tematik yang bermakna sesuai dengan kompetensi dasar yang diajarkan.', '0,1,2'),
(11, 1, 'Guru menggunakan teknik bermain yang bervariasi untuk memotivasi anak usia dini agar mau beraktivitas belajar melalui bermain sesuai aspek dan tahap perkembangan.', '0,1,2'),
(12, 1, 'Guru membuat rancangan kegiatan bermain dalam bentuk program tahunan/semester dengan menentukan tema, kegiatan, dan alokasi waktu sesuai kebutuhan menyesuaikan dengan kalender pendidikan.', '0,1,2'),
(13, 1, 'Guru membuat rancangan kegiatan bermain sesuai tema/topik dalam bentuk program mingguan sesuai dengan kompetensi dasar untuk mendukung semua aspek perkembangan anak usia dini', '0,1,2'),
(14, 1, 'Guru membuat rancangan kegiatan bermain dalam bentuk program harian yang mempermudah penguasaan kompetensi dasar.', '0,1,2'),
(15, 1, 'Guru membuat rancangan kegiatan bermain dalam bentuk kompetensi dasar', '0,1,2'),
(16, 1, 'Guru merancang kegiatan bermain sebagai bentuk pembelajaran yang mendidik dengan tujuan membantu perkembangan dan pertumbuhan anak usia dini.', '0,1,2'),
(17, 1, 'Guru menciptakan suasana bermain yang menyenangkan sehingga tidak membuat anak usia dini merasa tertekan.', '0,1,2'),
(18, 1, 'Guru merancang kegiatan secara kreatif dan bervariasi baik di dalam maupun di luar kelas sesuai kebutuhan', '0,1,2'),
(19, 1, 'Guru melaksanakan kegiatan pembelajaran tematik yang bermakna dengan mengaitkan pengalaman sehari-hari anak usia dini.', '0,1,2'),
(20, 1, 'Guru memberikan pembiasaan- pembiasaan yang baik pada anak', '0,1,2'),
(21, 1, 'Guru memberikan banyak kesempatan kepada anak usia dini untuk bertanya, mempraktikkan dan berinteraksi dengan teman-temannya.', '0,1,2'),
(22, 1, 'Guru memanfaatkan media dan sumber belajar yang sesuai dengan pendekatan bermain untuk meningkatkan motivasiuntuk meningkatkan motivasi belajar anak usia dini.', '0,1,2'),
(23, 1, 'Guru memanfaatkan teknologi informasi dan komunikasi (TIK) untuk mengembangkan materi dan kegiatan pembelajaran', '0,1,2'),
(24, 1, 'Guru memanfaatkan TIK untuk mengembangkan media pembelajaran melalui bermain yang sesuai dengan kebutuhan', '0,1,2'),
(25, 1, 'Guru Menggunakan alat bantu mengajar Audio-visual (termasuk TIK) untuk meningkatkan motivasi belajar anak usia dini dalam mencapai tujuan pembelajaran', '0,1,2'),
(26, 1, 'Guru memanfaatkan teknologi informasi dan komunikasi untuk membantu penyelenggaraan administrasi yang mendukung kegiatan pembelajaran', '0,1,2'),
(27, 1, 'Guru memilih sarana yang bervariasi termasuk memanfaatkan alam dan lingkungan sekitar sebagai sumber belajar yang bermakna sesuai dengan tujuan untuk pengembangan anak usia dini.', '0,1,2'),
(28, 1, 'Guru memilih media pembelajaran alat permainan edukatif (APE) untuk mendukung aspek perkembangan anak usia dini.', '0,1,2'),
(29, 1, 'Guru membuat media pembelajaran alat permainan edukatif untuk pengembangan potensi anak usia dini (misal dengan memanfaatkan bahan di sekitar, limbah, media IT, dll).', '0,1,2'),
(30, 1, 'Guru memberikan kesempatan belajar melalui bermain dan mengaktualisasikan diri kepada anak usia dini sesuai dengan minat dan potensi masing- masing.', '0,1,2'),
(31, 1, 'Guru dapat mengidentifikasi bakat, minat, potensi, dan kesulitan belajar masing- masing peserta didik dan membantu mengembangkan potensinya.', '0,1,2'),
(32, 1, 'Guru memberikan dukungan pada setiap anak usia dini untuk mengembangkan potensi dan kreatifitas melalui kegiatan bermain sambil belajar', '0,1,2'),
(33, 1, 'Guru melaksanakan, mencatat, dan mengadministrasikan penilaian secara terencana, bertahap, dan terus menerus untuk mendapatkan gambaran tentang pertumbuhan dan perkembangan anak.', '0,1,2'),
(34, 1, 'Guru melaksanakan kegiatan penilaian dalam konteks bermain, sehingga anak tidak merasa tertekan/terbebani.', '0,1,2'),
(35, 1, 'Guru mengembangkan instrumen penilaian dengan berbagai teknik dan jenis penilaian yang meliputi penilaian proses dan hasil belajar.', '0,1,2'),
(36, 1, 'Guru mengembangkan indikator penilaian dengan menentukan tingkatcapaian perkembangan sesuai tahapan perkembangan anak usia dini.', '0,1,2'),
(37, 1, 'Guru melaksanakan penilaian otentik (berdasarkan kondisi nyata yang muncul dari perilaku anak selama proses kegiatan maupun hasil dari kegiatan).', '0,1,2'),
(38, 1, 'Guru menganalisis hasil penilaian untuk mengidentifikasi kekuatan dan kelemahan masing-masing anak usia dini.', '0,1,2'),
(39, 1, 'Guru menindaklanjuti hasil analisis dengan melaksanakan program remedial (perbaikan) dan pengayaan melalui pendekatan bermain.', '0,1,2'),
(40, 1, 'Guru memanfatkan hasil penilaian sebagai bahan penyusunan rancangan pembelajaran yang akan dilakukan selanjutnya untuk meningkatkan kualitas pembelajaran.', '0,1,2'),
(41, 1, 'Guru mengkomunikasikan hasil penilaian kepada orang tua dan pihak lain yang berkepentingan.', '0,1,2'),
(42, 3, 'Guru memberi perhatian yang sama kepada anak usia dini dengan berbeda jenis kelamin, status sosial, daerah asal, dan latar belakang lainnya.', '0,1,2'),
(43, 3, 'Guru tidak bersikap diskriminatif (membeda-bedakan) terhadap anak usia dini, teman sejawat, orang tua peserta didik dan lingkungan sekolah karena perbedaan agama, suku, jenis kelamin, latar belakang keluarga, dan status sosial-ekonomi', '0,1,2'),
(44, 3, 'Guru mendorong dan membiasakan anak usia dini untuk saling menghargai perbedaan (agama, suku, adat- istiadat, status sosial, jenis kelamin).', '0,1,2'),
(45, 3, 'Guru taat pada norma agama, peraturan dan hukum, serta dapat menyesuaikan diri dengan norma yang berlaku di masyarakat.', '0,1,2'),
(46, 3, 'Guru memiliki rasa nasionalisme, persatuan dan kesatuan sebagai bangsa Indonesia.', '0,1,2'),
(47, 3, 'Guru mencerminkan diri sebagai pribadi yang taat beragama dan menjalankan amalan yang baik sesuai tuntunan agama', '0,1,2'),
(48, 3, 'Guru berperilaku jujur dan memiliki integritas (sikap dan perilaku guru menunjukkan sama antara kata dan perbuatan).', '0,1,2'),
(49, 3, 'Guru bertingkah laku sopan dalam penampilan,tutur kata, perbuatan, dan sikap terhadap anak usia dini, orang tua, dan teman sejawat.', '0,1,2'),
(50, 3, 'Guru berperilaku baik dan dapat menjadi teladan di lingkungan RA maupun di masyarakat dan dapat mencitrakan nama baik RA', '0,1,2'),
(51, 3, 'Guru bersikap dewasa dalam menerima masukan untuk pengembangan diri dan meningkatkan kualitas pembelajaran.', '0,1,2'),
(52, 3, 'Guru hadir tepat waktu, menyelesaikan semua tugas sesuai standar yang telah ditetapkan, dan penuh tanggung jawab.', '0,1,2'),
(53, 3, 'Jika harus meninggalkan kegiatan pembelajaran, guru memastikan ada guru pengganti yang dapat mendampingi anak dan mengkomunikasikan rencana kegiatan pembelajaran pada guru pengganti.', '0,1,2'),
(54, 3, 'Guru memenuhi jam mengajar dan dapat melakukan kegiatan lain di luar jam mengajar berdasarkan ijin dan persetujuan pengelola RA / Kepala RA', '0,1,2'),
(55, 3, 'Guru meminta ijin sebelumnya dengan memberikan alasan dan bukti yangsah jika tidak dapat melaksanakan proses pembelajaran atau menghadiri kegiatan lain di RA', '0,1,2'),
(56, 3, 'Guru memanfaatkan waktu luang untuk kegiatan yang produktif untuk pengembangan anak usia dini.', '0,1,2'),
(57, 3, 'Guru memberikan kontribusi terhadap pengembangan RA dan mempunyai prestasi yang berdampak positif terhadap', '0,1,2'),
(58, 3, 'Guru merasa bangga dengan profesinya sebagai guru dan menunjukkan perilaku yang sesuai dengan kode etik guru.', '0,1,2'),
(59, 5, 'Guru melakukan pemetaan kompetensi inti dan kompetensi dasar untuk berbagai bidang pengembangan di RA.', '0,1,2'),
(60, 5, 'Guru dapat mengembangkan materi bidang moral agama, kognitif, bahasa, fisik motorik, sosial, emosi, dan seni sesuai dengan kebutuhan, tahapan perkembangan dan psikomotorik anak usia dini.', '0,1,2'),
(61, 5, 'Guru dapat merancang kegiatan belajar melalui bermain untuk mengembangkan aspek moral agama, kognitif, bahasa, fisik motorik, sosial emosi, dan seni sesuai dengan kebutuhan, tahapan perkembangan dan psikomotorik anak usia dini.', '0,1,2'),
(62, 5, 'Guru melakukan evaluasi diri terhadap kinerjanya secara lengkap didukung bukti yang kuat.', '0,1,2'),
(63, 5, 'Guru memanfaatkan hasil evaluasi diri untuk memperbaiki perencanaan dan pelaksanaan pembelajaran selanjutnya dan merencanakan Program Pengembangan Keprofesian Berkelanjutan (PKB).', '0,1,2'),
(64, 5, 'Guru aktif dalam pengembangan keprofesian dengan melakukan penelitian, mengembangkan karya inovasi, mengikuti kegiatan ilmiah (misalnya seminar, diklat, workshop).', '0,1,2'),
(65, 5, 'Guru dapat mengaplikasikan pengalaman PKB untuk meningkatkan kompetensi dan kualitas kinerja.', '0,1,2'),
(66, 5, 'Guru melakukan refleksi terhadap kegiatan pengembangan anak usia dini dan meningkatkan kualitas pengembangan anak usia dini melaluipenelitian tindakan kelas.', '0,1,2'),
(67, 4, 'Guru mampu bekerja sama dan menjaga hubungan baik dengan pimpinan, rekan sejawat, orang tua, dan masyarakat untuk pengembangan RA.', '0,1,2'),
(68, 4, 'Guru aktif dalam komunitas profesi serta berkontribusi positif untuk pengembangan RA.', '0,1,2'),
(69, 4, 'Guru bekerja sama dengan orang tua peserta didik dan pihak terkait dalam program pembelajaran dan dalam mengatasi kesulitan belajar anak usia dini.', '0,1,2'),
(70, 4, 'Guru memanfaatkan beragam media termasuk TIK untuk menjalin komunikasi yang efektif dan menyebarkan informasi untuk kepentingan RA.', '0,1,2'),
(71, 4, 'Guru dapat menyesuaikan diri dengan lingkungan tempat bekerja, termasuk memahami bahasa daerah setempat dalam rangka meningkatkan efektivitas sebagai pendidik RA.Guru memanfaatkan TIK untuk mengembangkan media pembelajaran melalui bermain yang sesuai dengan kebutuhan.', '0,1,2'),
(72, 4, 'Guru menghargai budaya daerah di lingkungan RA dan memanfaatkannya untuk pengembangan RA.', '0,1,2'),
(73, 4, 'Guru memanfaatkan aneka ragam sosial budaya Indonesia untuk pengembangan kegiatan RA (misal: permainan tradisional, seni budaya, dan lainnya).', '0,1,2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kompetensi`
--

CREATE TABLE `jenis_kompetensi` (
  `id_kompetensi` int(11) NOT NULL,
  `nama_kompetensi` varchar(50) DEFAULT '0',
  `bobot_kompetensi` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jenis_kompetensi`
--

INSERT INTO `jenis_kompetensi` (`id_kompetensi`, `nama_kompetensi`, `bobot_kompetensi`) VALUES
(1, 'Pedagogik', 40),
(3, 'Kepribadian', 20),
(4, 'Sosial', 20),
(5, 'Profesional', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_user`
--

CREATE TABLE `jenis_user` (
  `id_jenis_user` int(11) NOT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jenis_user`
--

INSERT INTO `jenis_user` (`id_jenis_user`, `jabatan`, `level`) VALUES
(4, 'Wakil Kepala Sekolah', 2),
(5, 'Kepala Sekolah', 3),
(6, 'Guru', 1),
(7, 'Tata Usaha', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilai`
--

CREATE TABLE `penilai` (
  `id_penilai` int(11) NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `id_periode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `penilai`
--

INSERT INTO `penilai` (`id_penilai`, `nip`, `id_periode`) VALUES
(56, '1547766665300000', 3),
(57, '2839756657300010', 3),
(58, '5553750651300000', 3),
(59, '2539755655300000', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_nilai` int(11) NOT NULL,
  `id_penilai_detail` int(11) DEFAULT NULL,
  `id_isi` int(11) DEFAULT NULL,
  `hasil_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilai_detail`
--

CREATE TABLE `penilai_detail` (
  `id_penilai_detail` int(11) NOT NULL,
  `id_penilai` int(11) NOT NULL,
  `nip` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `penilai_detail`
--

INSERT INTO `penilai_detail` (`id_penilai_detail`, `id_penilai`, `nip`) VALUES
(239, 56, '5537755656300012'),
(240, 57, '5537755656300012'),
(241, 58, '5537755656300012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `tahun_ajar` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `status_periode` int(11) NOT NULL,
  `setting` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id_periode`, `tahun_ajar`, `semester`, `status_periode`, `setting`) VALUES
(1, '2018', 'Ganjil', 0, '50;25;25'),
(2, '2018', 'Genap', 0, '50;30;20'),
(3, '2019', 'Ganjil', 1, '50;30;0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nip` char(18) NOT NULL,
  `id_jenis_user` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `status_guru` varchar(100) DEFAULT NULL,
  `alamat` text,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `status_nikah` char(1) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nip`, `id_jenis_user`, `password`, `nama_guru`, `status_guru`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `status_nikah`, `no_telp`) VALUES
('1156749647300000', 6, 'rin', 'Rin Agustina, S.Pd.AUD', 'Tetap', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859'),
('1547766665300000', 7, 'kicky', 'Kicky Vinda Happy Setiawan, S.Pd', 'Tetap', 'jalan raya kedung baruk no 98', 'Surabaya', '1990-08-31', 'L', 'B', '088776656676'),
('20556036183001', 6, 'indah', 'Indah Palupi, S. Pd.AUD', 'Tetap', 'Pondok Candra', 'Surabaya', '1987-03-11', 'L', 'B', '081228394859'),
('20556036188001', 6, 'sahyudi', 'Sahyudi, S.PdI', 'Tetap', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859'),
('20556036189001', 6, 'zuni', 'Zuni Ernawati, S.Pd.', 'Tetap', 'jalan raya kedung baruk no 98', 'Surabaya', '1990-08-31', 'L', 'B', '088776656676'),
('20556036189002', 6, 'zuhri', 'Zuhri Ismail', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323'),
('20556036190001', 6, 'nur', 'Nur Indah Jarotin', 'Tetap', 'Magersari', 'Surabaya', '1985-11-21', 'L', 'N', '085223542854'),
('205560361930002', 6, 'kurniawan', 'Kurniawan Bahyu Sadewa, S.Pd.', 'Tetap', 'Rewin', 'Surabaya', '1985-04-26', 'P', 'N', '089878764812'),
('20556036193001', 6, 'herma', 'Herma Fery Rosadi, S.Pd.', 'Tetap', 'Surabaya', 'Surabaya', '1990-06-12', 'L', 'B', '088887876767'),
('20556036194001', 6, 'siti', 'Siti Rifqi Udzakia', 'Tetap', 'Manukan', 'Surabaya', '1989-12-21', 'P', 'B', '081876765239'),
('20556036198001', 6, 'karisma', 'Karisma Virga Yoan  vella', 'Tetap', 'Kebraon', 'Surabaya', '1982-05-07', 'L', 'B', '089232375545'),
('2443750653300000', 6, 'sri', 'Sri Banun, S.Pd.AUD', 'Tetap', 'Kebraon', 'Surabaya', '1982-05-07', 'L', 'B', '089232375545'),
('2539755655300000', 6, 'ita', 'Ita Dewi Sururiah, S.Pd.AUD', 'Tetap', 'Manukan', 'Surabaya', '1989-12-21', 'P', 'B', '081876765239'),
('2540759660300010', 6, 'miftakhul', 'Miftakhul Choiriyah, S.Pd.AUD', 'Tetap', 'Kebraon', 'Surabaya', '1982-05-07', 'L', 'B', '089232375545'),
('2560742645200000', 6, 'supramono', 'Supramono', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765'),
('2839756657300010', 6, 'mudawamatul', 'Mudawamatul Fahma Malikatin, S.Pd.AUD', 'Tetap', 'Pondok Candra', 'Surabaya', '1987-03-11', 'L', 'B', '081228394859'),
('3035753655300010', 6, 'cholisatun', 'Cholisatun Niam, S.Pd.AUD', 'Tetap', 'Kediri Bos', 'Kediri', '1996-03-21', 'L', 'N', '0819283746378'),
('3136761663300090', 6, 'andayani', 'Andayani, S.Pd.AUD', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765'),
('3344749651300020', 6, 'triana', 'Triana Sulistyowati, S.Pd.AUD', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323'),
('3540760662300010', 6, 'umu', 'Umu Kholifah, S.Pd.AUD', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323'),
('3838759660200030', 6, 'arif', 'Arif Muchson, S.Pd.I', 'Tetap', 'Surabaya', 'Surabaya', '1990-06-12', 'L', 'B', '088887876767'),
('4047750652300030', 6, 'siti', 'Siti Mardiatin, S.Pd.AUD', 'Tetap', 'Rewin', 'Surabaya', '1985-04-26', 'P', 'N', '089878764812'),
('4463756657300010', 6, 'muhibatul', 'Muhibatul Hidayah, S.Pd.AUD', 'Tetap', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859'),
('4552752653300000', 6, 'tri', 'Tri Diana Nur Sholihah, SPd.AUD', 'Tetap', 'Kediri Bos', 'Kediri', '1996-03-21', 'L', 'N', '0819283746378'),
('4647762663300010', 6, 'aniek', 'Aniek Prihartini, S.Pd.AUD', 'Tetap', 'jalan raya kedung baruk no 98', 'Surabaya', '1990-08-31', 'L', 'B', '088776656676'),
('4958757657300000', 6, 'siti', 'Siti Arifah, S.Pd.AUD', 'Tetap', 'Rewin', 'Surabaya', '1985-04-26', 'P', 'N', '089878764812'),
('5138763665200000', 6, 'yusuf', 'Yusuf Dwi Cahyono, S.Pd.AUD', 'Tetap', 'Surabaya', 'Surabaya', '1990-06-12', 'L', 'B', '088887876767'),
('5144758661200000', 6, 'redy', 'Redy Agus Fitrianto, S.Pd.I', 'Tetap', 'Surabaya', 'Surabaya', '1996-12-21', 'L', 'B', '0819283776666'),
('5537755656300012', 5, 'adrikah', 'Adrikah, S.Psi., M.Pd.', 'Tetap', 'Kediri Bos', 'Kediri', '1996-03-21', 'L', 'N', '0819283746378'),
('5553750651300000', 6, 'lilik', 'Lilik Uswatun Khasanah,S.Pd.AUD', 'Tetap', 'Magersari', 'Surabaya', '1985-11-21', 'L', 'N', '085223542854'),
('5853749650300000', 6, 'suriyah', 'Suriyah, S.Ag', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765'),
('6341759662200020', 6, 'imron', 'Inmron Zunaidi, S.Pd.I', 'Tetap', 'Surabaya', 'Surabaya', '1996-12-21', 'L', 'B', '0819283776666'),
('6451753656300000', 6, 'rismawati', 'Rismawati, S.Ag', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765'),
('6452757659300010', 6, 'sri', 'Sri Adnin, S.Pd', 'Tetap', 'Manukan', 'Surabaya', '1989-12-21', 'P', 'B', '081876765239'),
('6661759661300000', 6, 'daris', 'Daris Awaliyah, S.Pd.AUD', 'Tetap', 'Pondok Candra', 'Surabaya', '1987-03-11', 'L', 'B', '081228394859'),
('6849757659300040', 6, 'yuyun', 'Yuyun Astuti, S.Pd.I', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323'),
('8455766668300000', 6, 'ainun', 'Ainun Tafsin Afidah, S.Pd.AUD', 'Tetap', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859'),
('9433759662300000', 6, 'wahyuningsih', 'Wahyuningsih, S.Pd.AUD', 'Tetap', 'Magersari', 'Surabaya', '1985-11-21', 'L', 'N', '085223542854'),
('9640761662300012', 6, 'erwin', 'Erwin Kusumawati, M.Pd.', 'Tetap', 'Surabaya', 'Surabaya', '1996-12-21', 'L', 'B', '0819283776666');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `isi_kompetensi`
--
ALTER TABLE `isi_kompetensi`
  ADD PRIMARY KEY (`id_isi`) USING BTREE,
  ADD KEY `id_kompetensi` (`id_kompetensi`) USING BTREE;

--
-- Indeks untuk tabel `jenis_kompetensi`
--
ALTER TABLE `jenis_kompetensi`
  ADD PRIMARY KEY (`id_kompetensi`) USING BTREE;

--
-- Indeks untuk tabel `jenis_user`
--
ALTER TABLE `jenis_user`
  ADD PRIMARY KEY (`id_jenis_user`) USING BTREE;

--
-- Indeks untuk tabel `penilai`
--
ALTER TABLE `penilai`
  ADD PRIMARY KEY (`id_penilai`) USING BTREE,
  ADD KEY `nip` (`nip`) USING BTREE,
  ADD KEY `id_periode` (`id_periode`) USING BTREE;

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_nilai`) USING BTREE,
  ADD KEY `id_isi` (`id_isi`) USING BTREE,
  ADD KEY `id_penilai_detail` (`id_penilai_detail`) USING BTREE;

--
-- Indeks untuk tabel `penilai_detail`
--
ALTER TABLE `penilai_detail`
  ADD PRIMARY KEY (`id_penilai_detail`) USING BTREE,
  ADD KEY `id_penilai` (`id_penilai`) USING BTREE,
  ADD KEY `nip` (`nip`) USING BTREE;

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`) USING BTREE,
  ADD KEY `id_jenis_user` (`id_jenis_user`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `isi_kompetensi`
--
ALTER TABLE `isi_kompetensi`
  MODIFY `id_isi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `jenis_kompetensi`
--
ALTER TABLE `jenis_kompetensi`
  MODIFY `id_kompetensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis_user`
--
ALTER TABLE `jenis_user`
  MODIFY `id_jenis_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penilai`
--
ALTER TABLE `penilai`
  MODIFY `id_penilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1607;

--
-- AUTO_INCREMENT untuk tabel `penilai_detail`
--
ALTER TABLE `penilai_detail`
  MODIFY `id_penilai_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `isi_kompetensi`
--
ALTER TABLE `isi_kompetensi`
  ADD CONSTRAINT `FK_isi_kompetensi_jenis_kompetensi` FOREIGN KEY (`id_kompetensi`) REFERENCES `jenis_kompetensi` (`id_kompetensi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilai`
--
ALTER TABLE `penilai`
  ADD CONSTRAINT `FK_penilai_periode` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_penilai_user` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `FK_penilaian_isi_kompetensi` FOREIGN KEY (`id_isi`) REFERENCES `isi_kompetensi` (`id_isi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_penilaian_penilai_detail` FOREIGN KEY (`id_penilai_detail`) REFERENCES `penilai_detail` (`id_penilai_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilai_detail`
--
ALTER TABLE `penilai_detail`
  ADD CONSTRAINT `FK_penilai_detail_penilai` FOREIGN KEY (`id_penilai`) REFERENCES `penilai` (`id_penilai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_penilai_detail_user` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_jenis_user` FOREIGN KEY (`id_jenis_user`) REFERENCES `jenis_user` (`id_jenis_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
