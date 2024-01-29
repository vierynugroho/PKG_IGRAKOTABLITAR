/*
 Navicat Premium Data Transfer

 Source Server         : viery_connection
 Source Server Type    : MySQL
 Source Server Version : 100138 (10.1.38-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : dbpk_final

 Target Server Type    : MySQL
 Target Server Version : 100138 (10.1.38-MariaDB)
 File Encoding         : 65001

 Date: 29/01/2024 15:52:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for isi_kompetensi
-- ----------------------------
DROP TABLE IF EXISTS `isi_kompetensi`;
CREATE TABLE `isi_kompetensi`  (
  `id_isi` int NOT NULL AUTO_INCREMENT,
  `id_kompetensi` int NULL DEFAULT NULL,
  `isi_kompetensi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ket` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_isi`) USING BTREE,
  INDEX `id_kompetensi`(`id_kompetensi` ASC) USING BTREE,
  CONSTRAINT `FK_isi_kompetensi_jenis_kompetensi` FOREIGN KEY (`id_kompetensi`) REFERENCES `jenis_kompetensi` (`id_kompetensi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of isi_kompetensi
-- ----------------------------
INSERT INTO `isi_kompetensi` VALUES (1, 1, 'Guru dapat mengidentifikasi karakteristik anak  usia  dini yang berkaitan dengan 6 aspek perkembangan yaitu : nilai agama dan moral, kognitif, fisik motorik, bahasa, sosial emosional, seni dan sesuai latar belakang sosial-budaya.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (2, 1, 'Guru mengidentifikasi kemampuan awal anak usia dini dalam aspek perkembangan.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (3, 1, 'Guru menata lingkungan main yang memfasilitasi  anak  usia dini dalam perkembangan.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (4, 1, 'Guru memastikan semua anak usia dini mendapatkan kesempatan untuk berpartisipasi aktif dalam kegiatan belajar melalui bermain.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (5, 1, 'Guru memiliki catatan tentang perkembangan kemampuan anak usia dini dalam 6 aspek perkembangan.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (6, 1, 'Guru  mengidentifikasi kesulitan yang  dialami  anak usia dini dalam 6 aspek pengembangan dan membantu mengatasinya.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (7, 1, 'Guru dapat memilih metode belajar melalui bermain yang sesuai dalam berbagai bidang pengembangan di RA', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (8, 1, 'Guru menggunakan metode belajar melalui bermain yang sesuai dalam berbagai bidang pengembangan di RA.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (9, 1, 'Guru merancang kegiatan bermain yang mendidik secara kreatif dalam berbagai lingkungan bermain untuk memfasilitasi anak usia dini belajar melalui bermain.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (10, 1, 'Guru merancang kegiatan pembelajaran tematik yang bermakna sesuai dengan kompetensi dasar yang diajarkan.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (11, 1, 'Guru menggunakan teknik bermain yang bervariasi untuk memotivasi anak usia dini agar mau beraktivitas belajar melalui bermain sesuai aspek dan tahap perkembangan.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (12, 1, 'Guru membuat rancangan kegiatan bermain dalam bentuk program tahunan/semester dengan menentukan tema, kegiatan, dan alokasi waktu sesuai kebutuhan menyesuaikan dengan kalender pendidikan.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (13, 1, 'Guru membuat rancangan kegiatan bermain sesuai tema/topik dalam bentuk program mingguan sesuai dengan kompetensi dasar untuk mendukung semua aspek perkembangan anak usia dini', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (14, 1, 'Guru membuat rancangan kegiatan bermain dalam bentuk program harian yang mempermudah penguasaan kompetensi dasar.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (15, 1, 'Guru membuat rancangan kegiatan bermain dalam bentuk kompetensi dasar', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (16, 1, 'Guru merancang kegiatan bermain sebagai bentuk pembelajaran yang mendidik dengan tujuan membantu perkembangan dan pertumbuhan anak usia dini.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (17, 1, 'Guru menciptakan suasana bermain yang menyenangkan sehingga tidak membuat anak usia dini merasa tertekan.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (18, 1, 'Guru merancang kegiatan secara kreatif dan bervariasi baik di dalam maupun di luar kelas sesuai kebutuhan', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (19, 1, 'Guru melaksanakan kegiatan pembelajaran tematik yang bermakna dengan mengaitkan pengalaman sehari-hari anak usia dini.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (20, 1, 'Guru memberikan pembiasaan- pembiasaan yang baik pada anak', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (21, 1, 'Guru memberikan banyak kesempatan kepada anak usia dini untuk bertanya, mempraktikkan dan berinteraksi dengan teman-temannya.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (22, 1, 'Guru memanfaatkan media dan sumber belajar yang sesuai dengan pendekatan bermain untuk meningkatkan motivasiuntuk meningkatkan motivasi belajar anak usia dini.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (23, 1, 'Guru memanfaatkan teknologi informasi dan komunikasi (TIK) untuk mengembangkan materi dan kegiatan pembelajaran', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (24, 1, 'Guru memanfaatkan TIK untuk mengembangkan media pembelajaran melalui bermain yang sesuai dengan kebutuhan', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (25, 1, 'Guru Menggunakan alat bantu mengajar Audio-visual (termasuk TIK) untuk meningkatkan motivasi belajar anak usia dini dalam mencapai tujuan pembelajaran', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (26, 1, 'Guru memanfaatkan teknologi informasi dan komunikasi untuk membantu penyelenggaraan administrasi yang mendukung kegiatan pembelajaran', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (27, 1, 'Guru memilih sarana yang bervariasi termasuk memanfaatkan alam dan lingkungan sekitar sebagai sumber belajar yang bermakna sesuai dengan tujuan untuk pengembangan anak usia dini.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (28, 1, 'Guru memilih media pembelajaran alat permainan edukatif (APE) untuk mendukung aspek perkembangan anak usia dini.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (29, 1, 'Guru membuat media pembelajaran alat permainan edukatif untuk pengembangan potensi anak usia dini (misal dengan memanfaatkan bahan di sekitar, limbah, media IT, dll).', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (30, 1, 'Guru memberikan kesempatan belajar melalui bermain dan mengaktualisasikan diri kepada anak usia dini sesuai dengan minat dan potensi masing- masing.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (31, 1, 'Guru dapat mengidentifikasi bakat, minat, potensi, dan kesulitan belajar masing- masing peserta didik dan membantu mengembangkan potensinya.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (32, 1, 'Guru memberikan dukungan pada setiap anak usia dini untuk mengembangkan potensi dan kreatifitas melalui kegiatan bermain sambil belajar', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (33, 1, 'Guru melaksanakan, mencatat, dan mengadministrasikan penilaian secara terencana, bertahap, dan terus menerus untuk mendapatkan gambaran tentang pertumbuhan dan perkembangan anak.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (34, 1, 'Guru melaksanakan kegiatan penilaian dalam konteks bermain, sehingga anak tidak merasa tertekan/terbebani.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (35, 1, 'Guru mengembangkan instrumen penilaian dengan berbagai teknik dan jenis penilaian yang meliputi penilaian proses dan hasil belajar.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (36, 1, 'Guru mengembangkan indikator penilaian dengan menentukan tingkatcapaian perkembangan sesuai tahapan perkembangan anak usia dini.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (37, 1, 'Guru melaksanakan penilaian otentik (berdasarkan kondisi nyata yang muncul dari perilaku anak selama proses kegiatan maupun hasil dari kegiatan).', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (38, 1, 'Guru menganalisis hasil penilaian untuk mengidentifikasi kekuatan dan kelemahan masing-masing anak usia dini.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (39, 1, 'Guru menindaklanjuti hasil analisis dengan melaksanakan program remedial (perbaikan) dan pengayaan melalui pendekatan bermain.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (40, 1, 'Guru memanfatkan hasil penilaian sebagai bahan penyusunan rancangan pembelajaran yang akan dilakukan selanjutnya untuk meningkatkan kualitas pembelajaran.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (41, 1, 'Guru mengkomunikasikan hasil penilaian kepada orang tua dan pihak lain yang berkepentingan.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (42, 3, 'Guru memberi perhatian yang sama kepada anak usia dini dengan berbeda jenis kelamin, status sosial, daerah asal, dan latar belakang lainnya.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (43, 3, 'Guru tidak bersikap diskriminatif (membeda-bedakan) terhadap anak usia dini, teman sejawat, orang tua peserta didik dan lingkungan sekolah karena perbedaan agama, suku, jenis kelamin, latar belakang keluarga, dan status sosial-ekonomi', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (44, 3, 'Guru mendorong dan membiasakan anak usia dini untuk saling menghargai perbedaan (agama, suku, adat- istiadat, status sosial, jenis kelamin).', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (45, 3, 'Guru taat pada norma agama, peraturan dan hukum, serta dapat menyesuaikan diri dengan norma yang berlaku di masyarakat.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (46, 3, 'Guru memiliki rasa nasionalisme, persatuan dan kesatuan sebagai bangsa Indonesia.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (47, 3, 'Guru mencerminkan diri sebagai pribadi yang taat beragama dan menjalankan amalan yang baik sesuai tuntunan agama', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (48, 3, 'Guru berperilaku jujur dan memiliki integritas (sikap dan perilaku guru menunjukkan sama antara kata dan perbuatan).', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (49, 3, 'Guru bertingkah laku sopan dalam penampilan,tutur kata, perbuatan, dan sikap terhadap anak usia dini, orang tua, dan teman sejawat.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (50, 3, 'Guru berperilaku baik dan dapat menjadi teladan di lingkungan RA maupun di masyarakat dan dapat mencitrakan nama baik RA', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (51, 3, 'Guru bersikap dewasa dalam menerima masukan untuk pengembangan diri dan meningkatkan kualitas pembelajaran.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (52, 3, 'Guru hadir tepat waktu, menyelesaikan semua tugas sesuai standar yang telah ditetapkan, dan penuh tanggung jawab.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (53, 3, 'Jika harus meninggalkan kegiatan pembelajaran, guru memastikan ada guru pengganti yang dapat mendampingi anak dan mengkomunikasikan rencana kegiatan pembelajaran pada guru pengganti.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (54, 3, 'Guru memenuhi jam mengajar dan dapat melakukan kegiatan lain di luar jam mengajar berdasarkan ijin dan persetujuan pengelola RA / Kepala RA', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (55, 3, 'Guru meminta ijin sebelumnya dengan memberikan alasan dan bukti yangsah jika tidak dapat melaksanakan proses pembelajaran atau menghadiri kegiatan lain di RA', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (56, 3, 'Guru memanfaatkan waktu luang untuk kegiatan yang produktif untuk pengembangan anak usia dini.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (57, 3, 'Guru memberikan kontribusi terhadap pengembangan RA dan mempunyai prestasi yang berdampak positif terhadap', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (58, 3, 'Guru merasa bangga dengan profesinya sebagai guru dan menunjukkan perilaku yang sesuai dengan kode etik guru.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (59, 5, 'Guru melakukan pemetaan kompetensi inti dan kompetensi dasar untuk berbagai bidang pengembangan di RA.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (60, 5, 'Guru dapat mengembangkan materi bidang moral agama, kognitif, bahasa, fisik motorik, sosial, emosi, dan seni sesuai dengan kebutuhan, tahapan perkembangan dan psikomotorik anak usia dini.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (61, 5, 'Guru dapat merancang kegiatan belajar melalui bermain untuk mengembangkan aspek moral agama, kognitif, bahasa, fisik motorik, sosial emosi, dan seni sesuai dengan kebutuhan, tahapan perkembangan dan psikomotorik anak usia dini.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (62, 5, 'Guru melakukan evaluasi diri terhadap kinerjanya secara lengkap didukung bukti yang kuat.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (63, 5, 'Guru memanfaatkan hasil evaluasi diri untuk memperbaiki perencanaan dan pelaksanaan pembelajaran selanjutnya dan merencanakan Program Pengembangan Keprofesian Berkelanjutan (PKB).', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (64, 5, 'Guru aktif dalam pengembangan keprofesian dengan melakukan penelitian, mengembangkan karya inovasi, mengikuti kegiatan ilmiah (misalnya seminar, diklat, workshop).', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (65, 5, 'Guru dapat mengaplikasikan pengalaman PKB untuk meningkatkan kompetensi dan kualitas kinerja.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (66, 5, 'Guru melakukan refleksi terhadap kegiatan pengembangan anak usia dini dan meningkatkan kualitas pengembangan anak usia dini melaluipenelitian tindakan kelas.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (67, 4, 'Guru mampu bekerja sama dan menjaga hubungan baik dengan pimpinan, rekan sejawat, orang tua, dan masyarakat untuk pengembangan RA.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (68, 4, 'Guru aktif dalam komunitas profesi serta berkontribusi positif untuk pengembangan RA.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (69, 4, 'Guru bekerja sama dengan orang tua peserta didik dan pihak terkait dalam program pembelajaran dan dalam mengatasi kesulitan belajar anak usia dini.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (70, 4, 'Guru memanfaatkan beragam media termasuk TIK untuk menjalin komunikasi yang efektif dan menyebarkan informasi untuk kepentingan RA.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (71, 4, 'Guru dapat menyesuaikan diri dengan lingkungan tempat bekerja, termasuk memahami bahasa daerah setempat dalam rangka meningkatkan efektivitas sebagai pendidik RA.Guru memanfaatkan TIK untuk mengembangkan media pembelajaran melalui bermain yang sesuai dengan kebutuhan.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (72, 4, 'Guru menghargai budaya daerah di lingkungan RA dan memanfaatkannya untuk pengembangan RA.', '0,1,2');
INSERT INTO `isi_kompetensi` VALUES (73, 4, 'Guru memanfaatkan aneka ragam sosial budaya Indonesia untuk pengembangan kegiatan RA (misal: permainan tradisional, seni budaya, dan lainnya).', '0,1,2');

-- ----------------------------
-- Table structure for jenis_kompetensi
-- ----------------------------
DROP TABLE IF EXISTS `jenis_kompetensi`;
CREATE TABLE `jenis_kompetensi`  (
  `id_kompetensi` int NOT NULL AUTO_INCREMENT,
  `nama_kompetensi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `bobot_kompetensi` int NULL DEFAULT 0,
  PRIMARY KEY (`id_kompetensi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of jenis_kompetensi
-- ----------------------------
INSERT INTO `jenis_kompetensi` VALUES (1, 'Pedagogik', 40);
INSERT INTO `jenis_kompetensi` VALUES (3, 'Kepribadian', 20);
INSERT INTO `jenis_kompetensi` VALUES (4, 'Sosial', 20);
INSERT INTO `jenis_kompetensi` VALUES (5, 'Profesional', 20);

-- ----------------------------
-- Table structure for jenis_user
-- ----------------------------
DROP TABLE IF EXISTS `jenis_user`;
CREATE TABLE `jenis_user`  (
  `id_jenis_user` int NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of jenis_user
-- ----------------------------
INSERT INTO `jenis_user` VALUES (4, 'Wakil Kepala Sekolah', 2);
INSERT INTO `jenis_user` VALUES (5, 'Kepala Sekolah', 3);
INSERT INTO `jenis_user` VALUES (6, 'Guru', 1);
INSERT INTO `jenis_user` VALUES (7, 'Tata Usaha', 0);

-- ----------------------------
-- Table structure for penilai
-- ----------------------------
DROP TABLE IF EXISTS `penilai`;
CREATE TABLE `penilai`  (
  `id_penilai` int NOT NULL AUTO_INCREMENT,
  `nip` char(18) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_periode` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_penilai`) USING BTREE,
  INDEX `nip`(`nip` ASC) USING BTREE,
  INDEX `id_periode`(`id_periode` ASC) USING BTREE,
  CONSTRAINT `FK_penilai_periode` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_penilai_user` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 97 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of penilai
-- ----------------------------
INSERT INTO `penilai` VALUES (56, '1547766665300000', 3);
INSERT INTO `penilai` VALUES (57, '2839756657300010', 3);
INSERT INTO `penilai` VALUES (82, '20556036183001', 3);
INSERT INTO `penilai` VALUES (83, '20556036189001', 3);
INSERT INTO `penilai` VALUES (84, '4047750652300030', 3);
INSERT INTO `penilai` VALUES (96, '8455766668300000', 3);

-- ----------------------------
-- Table structure for penilai_detail
-- ----------------------------
DROP TABLE IF EXISTS `penilai_detail`;
CREATE TABLE `penilai_detail`  (
  `id_penilai_detail` int NOT NULL AUTO_INCREMENT,
  `id_penilai` int NOT NULL,
  `nip` char(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_penilai_detail`) USING BTREE,
  INDEX `id_penilai`(`id_penilai` ASC) USING BTREE,
  INDEX `nip`(`nip` ASC) USING BTREE,
  CONSTRAINT `FK_penilai_detail_penilai` FOREIGN KEY (`id_penilai`) REFERENCES `penilai` (`id_penilai`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_penilai_detail_user` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 303 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of penilai_detail
-- ----------------------------
INSERT INTO `penilai_detail` VALUES (239, 56, '5537755656300012');
INSERT INTO `penilai_detail` VALUES (240, 57, '5537755656300012');
INSERT INTO `penilai_detail` VALUES (281, 82, '5537755656300012');
INSERT INTO `penilai_detail` VALUES (282, 83, '5537755656300012');
INSERT INTO `penilai_detail` VALUES (283, 84, '5537755656300012');
INSERT INTO `penilai_detail` VALUES (302, 96, '5537755656300012');

-- ----------------------------
-- Table structure for penilaian
-- ----------------------------
DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE `penilaian`  (
  `id_nilai` int NOT NULL AUTO_INCREMENT,
  `id_penilai_detail` int NULL DEFAULT NULL,
  `id_isi` int NULL DEFAULT NULL,
  `hasil_nilai` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai`) USING BTREE,
  INDEX `id_isi`(`id_isi` ASC) USING BTREE,
  INDEX `id_penilai_detail`(`id_penilai_detail` ASC) USING BTREE,
  CONSTRAINT `FK_penilaian_isi_kompetensi` FOREIGN KEY (`id_isi`) REFERENCES `isi_kompetensi` (`id_isi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_penilaian_penilai_detail` FOREIGN KEY (`id_penilai_detail`) REFERENCES `penilai_detail` (`id_penilai_detail`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1972 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of penilaian
-- ----------------------------
INSERT INTO `penilaian` VALUES (1607, 239, 1, 1);
INSERT INTO `penilaian` VALUES (1608, 239, 2, 2);
INSERT INTO `penilaian` VALUES (1609, 239, 3, 4);
INSERT INTO `penilaian` VALUES (1610, 239, 4, 3);
INSERT INTO `penilaian` VALUES (1611, 239, 5, 2);
INSERT INTO `penilaian` VALUES (1612, 239, 6, 4);
INSERT INTO `penilaian` VALUES (1613, 239, 7, 2);
INSERT INTO `penilaian` VALUES (1614, 239, 8, 3);
INSERT INTO `penilaian` VALUES (1615, 239, 9, 2);
INSERT INTO `penilaian` VALUES (1616, 239, 10, 1);
INSERT INTO `penilaian` VALUES (1617, 239, 11, 3);
INSERT INTO `penilaian` VALUES (1618, 239, 12, 2);
INSERT INTO `penilaian` VALUES (1619, 239, 13, 4);
INSERT INTO `penilaian` VALUES (1620, 239, 14, 3);
INSERT INTO `penilaian` VALUES (1621, 239, 15, 4);
INSERT INTO `penilaian` VALUES (1622, 239, 16, 3);
INSERT INTO `penilaian` VALUES (1623, 239, 17, 3);
INSERT INTO `penilaian` VALUES (1624, 239, 18, 3);
INSERT INTO `penilaian` VALUES (1625, 239, 19, 3);
INSERT INTO `penilaian` VALUES (1626, 239, 20, 4);
INSERT INTO `penilaian` VALUES (1627, 239, 21, 3);
INSERT INTO `penilaian` VALUES (1628, 239, 22, 3);
INSERT INTO `penilaian` VALUES (1629, 239, 23, 4);
INSERT INTO `penilaian` VALUES (1630, 239, 24, 3);
INSERT INTO `penilaian` VALUES (1631, 239, 25, 4);
INSERT INTO `penilaian` VALUES (1632, 239, 26, 3);
INSERT INTO `penilaian` VALUES (1633, 239, 27, 3);
INSERT INTO `penilaian` VALUES (1634, 239, 28, 3);
INSERT INTO `penilaian` VALUES (1635, 239, 29, 4);
INSERT INTO `penilaian` VALUES (1636, 239, 30, 4);
INSERT INTO `penilaian` VALUES (1637, 239, 31, 4);
INSERT INTO `penilaian` VALUES (1638, 239, 32, 4);
INSERT INTO `penilaian` VALUES (1639, 239, 33, 4);
INSERT INTO `penilaian` VALUES (1640, 239, 34, 4);
INSERT INTO `penilaian` VALUES (1641, 239, 35, 4);
INSERT INTO `penilaian` VALUES (1642, 239, 36, 3);
INSERT INTO `penilaian` VALUES (1643, 239, 37, 3);
INSERT INTO `penilaian` VALUES (1644, 239, 38, 4);
INSERT INTO `penilaian` VALUES (1645, 239, 39, 3);
INSERT INTO `penilaian` VALUES (1646, 239, 40, 4);
INSERT INTO `penilaian` VALUES (1647, 239, 41, 4);
INSERT INTO `penilaian` VALUES (1648, 239, 42, 3);
INSERT INTO `penilaian` VALUES (1649, 239, 43, 4);
INSERT INTO `penilaian` VALUES (1650, 239, 44, 4);
INSERT INTO `penilaian` VALUES (1651, 239, 45, 3);
INSERT INTO `penilaian` VALUES (1652, 239, 46, 3);
INSERT INTO `penilaian` VALUES (1653, 239, 47, 4);
INSERT INTO `penilaian` VALUES (1654, 239, 48, 4);
INSERT INTO `penilaian` VALUES (1655, 239, 49, 4);
INSERT INTO `penilaian` VALUES (1656, 239, 50, 3);
INSERT INTO `penilaian` VALUES (1657, 239, 51, 4);
INSERT INTO `penilaian` VALUES (1658, 239, 52, 4);
INSERT INTO `penilaian` VALUES (1659, 239, 53, 4);
INSERT INTO `penilaian` VALUES (1660, 239, 54, 4);
INSERT INTO `penilaian` VALUES (1661, 239, 55, 4);
INSERT INTO `penilaian` VALUES (1662, 239, 56, 3);
INSERT INTO `penilaian` VALUES (1663, 239, 57, 4);
INSERT INTO `penilaian` VALUES (1664, 239, 58, 3);
INSERT INTO `penilaian` VALUES (1665, 239, 67, 3);
INSERT INTO `penilaian` VALUES (1666, 239, 68, 4);
INSERT INTO `penilaian` VALUES (1667, 239, 69, 4);
INSERT INTO `penilaian` VALUES (1668, 239, 70, 3);
INSERT INTO `penilaian` VALUES (1669, 239, 71, 2);
INSERT INTO `penilaian` VALUES (1670, 239, 72, 3);
INSERT INTO `penilaian` VALUES (1671, 239, 73, 4);
INSERT INTO `penilaian` VALUES (1672, 239, 59, 4);
INSERT INTO `penilaian` VALUES (1673, 239, 60, 4);
INSERT INTO `penilaian` VALUES (1674, 239, 61, 3);
INSERT INTO `penilaian` VALUES (1675, 239, 62, 3);
INSERT INTO `penilaian` VALUES (1676, 239, 63, 4);
INSERT INTO `penilaian` VALUES (1677, 239, 64, 3);
INSERT INTO `penilaian` VALUES (1678, 239, 65, 4);
INSERT INTO `penilaian` VALUES (1679, 239, 66, 3);
INSERT INTO `penilaian` VALUES (1680, 281, 1, 1);
INSERT INTO `penilaian` VALUES (1681, 281, 2, 3);
INSERT INTO `penilaian` VALUES (1682, 281, 3, 3);
INSERT INTO `penilaian` VALUES (1683, 281, 4, 4);
INSERT INTO `penilaian` VALUES (1684, 281, 5, 4);
INSERT INTO `penilaian` VALUES (1685, 281, 6, 4);
INSERT INTO `penilaian` VALUES (1686, 281, 7, 3);
INSERT INTO `penilaian` VALUES (1687, 281, 8, 3);
INSERT INTO `penilaian` VALUES (1688, 281, 9, 4);
INSERT INTO `penilaian` VALUES (1689, 281, 10, 4);
INSERT INTO `penilaian` VALUES (1690, 281, 11, 4);
INSERT INTO `penilaian` VALUES (1691, 281, 12, 4);
INSERT INTO `penilaian` VALUES (1692, 281, 13, 3);
INSERT INTO `penilaian` VALUES (1693, 281, 14, 3);
INSERT INTO `penilaian` VALUES (1694, 281, 15, 4);
INSERT INTO `penilaian` VALUES (1695, 281, 16, 4);
INSERT INTO `penilaian` VALUES (1696, 281, 17, 4);
INSERT INTO `penilaian` VALUES (1697, 281, 18, 3);
INSERT INTO `penilaian` VALUES (1698, 281, 19, 4);
INSERT INTO `penilaian` VALUES (1699, 281, 20, 3);
INSERT INTO `penilaian` VALUES (1700, 281, 21, 4);
INSERT INTO `penilaian` VALUES (1701, 281, 22, 3);
INSERT INTO `penilaian` VALUES (1702, 281, 23, 4);
INSERT INTO `penilaian` VALUES (1703, 281, 24, 3);
INSERT INTO `penilaian` VALUES (1704, 281, 25, 4);
INSERT INTO `penilaian` VALUES (1705, 281, 26, 4);
INSERT INTO `penilaian` VALUES (1706, 281, 27, 3);
INSERT INTO `penilaian` VALUES (1707, 281, 28, 4);
INSERT INTO `penilaian` VALUES (1708, 281, 29, 3);
INSERT INTO `penilaian` VALUES (1709, 281, 30, 3);
INSERT INTO `penilaian` VALUES (1710, 281, 31, 4);
INSERT INTO `penilaian` VALUES (1711, 281, 32, 4);
INSERT INTO `penilaian` VALUES (1712, 281, 33, 4);
INSERT INTO `penilaian` VALUES (1713, 281, 34, 3);
INSERT INTO `penilaian` VALUES (1714, 281, 35, 4);
INSERT INTO `penilaian` VALUES (1715, 281, 36, 4);
INSERT INTO `penilaian` VALUES (1716, 281, 37, 3);
INSERT INTO `penilaian` VALUES (1717, 281, 38, 3);
INSERT INTO `penilaian` VALUES (1718, 281, 39, 3);
INSERT INTO `penilaian` VALUES (1719, 281, 40, 3);
INSERT INTO `penilaian` VALUES (1720, 281, 41, 4);
INSERT INTO `penilaian` VALUES (1721, 281, 42, 3);
INSERT INTO `penilaian` VALUES (1722, 281, 43, 3);
INSERT INTO `penilaian` VALUES (1723, 281, 44, 4);
INSERT INTO `penilaian` VALUES (1724, 281, 45, 4);
INSERT INTO `penilaian` VALUES (1725, 281, 46, 3);
INSERT INTO `penilaian` VALUES (1726, 281, 47, 4);
INSERT INTO `penilaian` VALUES (1727, 281, 48, 4);
INSERT INTO `penilaian` VALUES (1728, 281, 49, 3);
INSERT INTO `penilaian` VALUES (1729, 281, 50, 4);
INSERT INTO `penilaian` VALUES (1730, 281, 51, 4);
INSERT INTO `penilaian` VALUES (1731, 281, 52, 4);
INSERT INTO `penilaian` VALUES (1732, 281, 53, 4);
INSERT INTO `penilaian` VALUES (1733, 281, 54, 3);
INSERT INTO `penilaian` VALUES (1734, 281, 55, 3);
INSERT INTO `penilaian` VALUES (1735, 281, 56, 4);
INSERT INTO `penilaian` VALUES (1736, 281, 57, 4);
INSERT INTO `penilaian` VALUES (1737, 281, 58, 4);
INSERT INTO `penilaian` VALUES (1738, 281, 67, 3);
INSERT INTO `penilaian` VALUES (1739, 281, 68, 4);
INSERT INTO `penilaian` VALUES (1740, 281, 69, 3);
INSERT INTO `penilaian` VALUES (1741, 281, 70, 4);
INSERT INTO `penilaian` VALUES (1742, 281, 71, 4);
INSERT INTO `penilaian` VALUES (1743, 281, 72, 4);
INSERT INTO `penilaian` VALUES (1744, 281, 73, 4);
INSERT INTO `penilaian` VALUES (1745, 281, 59, 4);
INSERT INTO `penilaian` VALUES (1746, 281, 60, 4);
INSERT INTO `penilaian` VALUES (1747, 281, 61, 4);
INSERT INTO `penilaian` VALUES (1748, 281, 62, 3);
INSERT INTO `penilaian` VALUES (1749, 281, 63, 4);
INSERT INTO `penilaian` VALUES (1750, 281, 64, 4);
INSERT INTO `penilaian` VALUES (1751, 281, 65, 3);
INSERT INTO `penilaian` VALUES (1752, 281, 66, 4);
INSERT INTO `penilaian` VALUES (1753, 240, 1, 3);
INSERT INTO `penilaian` VALUES (1754, 240, 2, 3);
INSERT INTO `penilaian` VALUES (1755, 240, 3, 2);
INSERT INTO `penilaian` VALUES (1756, 240, 4, 4);
INSERT INTO `penilaian` VALUES (1757, 240, 5, 3);
INSERT INTO `penilaian` VALUES (1758, 240, 6, 3);
INSERT INTO `penilaian` VALUES (1759, 240, 7, 3);
INSERT INTO `penilaian` VALUES (1760, 240, 8, 3);
INSERT INTO `penilaian` VALUES (1761, 240, 9, 2);
INSERT INTO `penilaian` VALUES (1762, 240, 10, 3);
INSERT INTO `penilaian` VALUES (1763, 240, 11, 3);
INSERT INTO `penilaian` VALUES (1764, 240, 12, 2);
INSERT INTO `penilaian` VALUES (1765, 240, 13, 2);
INSERT INTO `penilaian` VALUES (1766, 240, 14, 3);
INSERT INTO `penilaian` VALUES (1767, 240, 15, 3);
INSERT INTO `penilaian` VALUES (1768, 240, 16, 3);
INSERT INTO `penilaian` VALUES (1769, 240, 17, 3);
INSERT INTO `penilaian` VALUES (1770, 240, 18, 2);
INSERT INTO `penilaian` VALUES (1771, 240, 19, 4);
INSERT INTO `penilaian` VALUES (1772, 240, 20, 1);
INSERT INTO `penilaian` VALUES (1773, 240, 21, 3);
INSERT INTO `penilaian` VALUES (1774, 240, 22, 3);
INSERT INTO `penilaian` VALUES (1775, 240, 23, 3);
INSERT INTO `penilaian` VALUES (1776, 240, 24, 2);
INSERT INTO `penilaian` VALUES (1777, 240, 25, 3);
INSERT INTO `penilaian` VALUES (1778, 240, 26, 3);
INSERT INTO `penilaian` VALUES (1779, 240, 27, 2);
INSERT INTO `penilaian` VALUES (1780, 240, 28, 3);
INSERT INTO `penilaian` VALUES (1781, 240, 29, 3);
INSERT INTO `penilaian` VALUES (1782, 240, 30, 2);
INSERT INTO `penilaian` VALUES (1783, 240, 31, 2);
INSERT INTO `penilaian` VALUES (1784, 240, 32, 3);
INSERT INTO `penilaian` VALUES (1785, 240, 33, 4);
INSERT INTO `penilaian` VALUES (1786, 240, 34, 3);
INSERT INTO `penilaian` VALUES (1787, 240, 35, 3);
INSERT INTO `penilaian` VALUES (1788, 240, 36, 3);
INSERT INTO `penilaian` VALUES (1789, 240, 37, 3);
INSERT INTO `penilaian` VALUES (1790, 240, 38, 3);
INSERT INTO `penilaian` VALUES (1791, 240, 39, 3);
INSERT INTO `penilaian` VALUES (1792, 240, 40, 2);
INSERT INTO `penilaian` VALUES (1793, 240, 41, 2);
INSERT INTO `penilaian` VALUES (1794, 240, 42, 2);
INSERT INTO `penilaian` VALUES (1795, 240, 43, 3);
INSERT INTO `penilaian` VALUES (1796, 240, 44, 2);
INSERT INTO `penilaian` VALUES (1797, 240, 45, 2);
INSERT INTO `penilaian` VALUES (1798, 240, 46, 2);
INSERT INTO `penilaian` VALUES (1799, 240, 47, 3);
INSERT INTO `penilaian` VALUES (1800, 240, 48, 3);
INSERT INTO `penilaian` VALUES (1801, 240, 49, 3);
INSERT INTO `penilaian` VALUES (1802, 240, 50, 3);
INSERT INTO `penilaian` VALUES (1803, 240, 51, 2);
INSERT INTO `penilaian` VALUES (1804, 240, 52, 4);
INSERT INTO `penilaian` VALUES (1805, 240, 53, 3);
INSERT INTO `penilaian` VALUES (1806, 240, 54, 3);
INSERT INTO `penilaian` VALUES (1807, 240, 55, 2);
INSERT INTO `penilaian` VALUES (1808, 240, 56, 2);
INSERT INTO `penilaian` VALUES (1809, 240, 57, 3);
INSERT INTO `penilaian` VALUES (1810, 240, 58, 3);
INSERT INTO `penilaian` VALUES (1811, 240, 67, 4);
INSERT INTO `penilaian` VALUES (1812, 240, 68, 4);
INSERT INTO `penilaian` VALUES (1813, 240, 69, 3);
INSERT INTO `penilaian` VALUES (1814, 240, 70, 3);
INSERT INTO `penilaian` VALUES (1815, 240, 71, 2);
INSERT INTO `penilaian` VALUES (1816, 240, 72, 3);
INSERT INTO `penilaian` VALUES (1817, 240, 73, 2);
INSERT INTO `penilaian` VALUES (1818, 240, 59, 1);
INSERT INTO `penilaian` VALUES (1819, 240, 60, 2);
INSERT INTO `penilaian` VALUES (1820, 240, 61, 3);
INSERT INTO `penilaian` VALUES (1821, 240, 62, 4);
INSERT INTO `penilaian` VALUES (1822, 240, 63, 3);
INSERT INTO `penilaian` VALUES (1823, 240, 64, 2);
INSERT INTO `penilaian` VALUES (1824, 240, 65, 1);
INSERT INTO `penilaian` VALUES (1825, 240, 66, 2);
INSERT INTO `penilaian` VALUES (1899, 282, 1, 4);
INSERT INTO `penilaian` VALUES (1900, 282, 2, 4);
INSERT INTO `penilaian` VALUES (1901, 282, 3, 4);
INSERT INTO `penilaian` VALUES (1902, 282, 4, 1);
INSERT INTO `penilaian` VALUES (1903, 282, 5, 3);
INSERT INTO `penilaian` VALUES (1904, 282, 6, 3);
INSERT INTO `penilaian` VALUES (1905, 282, 7, 4);
INSERT INTO `penilaian` VALUES (1906, 282, 8, 2);
INSERT INTO `penilaian` VALUES (1907, 282, 9, 1);
INSERT INTO `penilaian` VALUES (1908, 282, 10, 3);
INSERT INTO `penilaian` VALUES (1909, 282, 11, 4);
INSERT INTO `penilaian` VALUES (1910, 282, 12, 4);
INSERT INTO `penilaian` VALUES (1911, 282, 13, 3);
INSERT INTO `penilaian` VALUES (1912, 282, 14, 1);
INSERT INTO `penilaian` VALUES (1913, 282, 15, 3);
INSERT INTO `penilaian` VALUES (1914, 282, 16, 1);
INSERT INTO `penilaian` VALUES (1915, 282, 17, 1);
INSERT INTO `penilaian` VALUES (1916, 282, 18, 2);
INSERT INTO `penilaian` VALUES (1917, 282, 19, 3);
INSERT INTO `penilaian` VALUES (1918, 282, 20, 4);
INSERT INTO `penilaian` VALUES (1919, 282, 21, 4);
INSERT INTO `penilaian` VALUES (1920, 282, 22, 4);
INSERT INTO `penilaian` VALUES (1921, 282, 23, 2);
INSERT INTO `penilaian` VALUES (1922, 282, 24, 4);
INSERT INTO `penilaian` VALUES (1923, 282, 25, 2);
INSERT INTO `penilaian` VALUES (1924, 282, 26, 3);
INSERT INTO `penilaian` VALUES (1925, 282, 27, 1);
INSERT INTO `penilaian` VALUES (1926, 282, 28, 4);
INSERT INTO `penilaian` VALUES (1927, 282, 29, 1);
INSERT INTO `penilaian` VALUES (1928, 282, 30, 3);
INSERT INTO `penilaian` VALUES (1929, 282, 31, 4);
INSERT INTO `penilaian` VALUES (1930, 282, 32, 1);
INSERT INTO `penilaian` VALUES (1931, 282, 33, 3);
INSERT INTO `penilaian` VALUES (1932, 282, 34, 3);
INSERT INTO `penilaian` VALUES (1933, 282, 35, 1);
INSERT INTO `penilaian` VALUES (1934, 282, 36, 3);
INSERT INTO `penilaian` VALUES (1935, 282, 37, 3);
INSERT INTO `penilaian` VALUES (1936, 282, 38, 2);
INSERT INTO `penilaian` VALUES (1937, 282, 39, 2);
INSERT INTO `penilaian` VALUES (1938, 282, 40, 3);
INSERT INTO `penilaian` VALUES (1939, 282, 41, 1);
INSERT INTO `penilaian` VALUES (1940, 282, 42, 3);
INSERT INTO `penilaian` VALUES (1941, 282, 43, 4);
INSERT INTO `penilaian` VALUES (1942, 282, 44, 3);
INSERT INTO `penilaian` VALUES (1943, 282, 45, 3);
INSERT INTO `penilaian` VALUES (1944, 282, 46, 2);
INSERT INTO `penilaian` VALUES (1945, 282, 47, 4);
INSERT INTO `penilaian` VALUES (1946, 282, 48, 1);
INSERT INTO `penilaian` VALUES (1947, 282, 49, 1);
INSERT INTO `penilaian` VALUES (1948, 282, 50, 1);
INSERT INTO `penilaian` VALUES (1949, 282, 51, 2);
INSERT INTO `penilaian` VALUES (1950, 282, 52, 2);
INSERT INTO `penilaian` VALUES (1951, 282, 53, 3);
INSERT INTO `penilaian` VALUES (1952, 282, 54, 2);
INSERT INTO `penilaian` VALUES (1953, 282, 55, 3);
INSERT INTO `penilaian` VALUES (1954, 282, 56, 1);
INSERT INTO `penilaian` VALUES (1955, 282, 57, 3);
INSERT INTO `penilaian` VALUES (1956, 282, 58, 3);
INSERT INTO `penilaian` VALUES (1957, 282, 67, 4);
INSERT INTO `penilaian` VALUES (1958, 282, 68, 3);
INSERT INTO `penilaian` VALUES (1959, 282, 69, 2);
INSERT INTO `penilaian` VALUES (1960, 282, 70, 3);
INSERT INTO `penilaian` VALUES (1961, 282, 71, 4);
INSERT INTO `penilaian` VALUES (1962, 282, 72, 2);
INSERT INTO `penilaian` VALUES (1963, 282, 73, 1);
INSERT INTO `penilaian` VALUES (1964, 282, 59, 4);
INSERT INTO `penilaian` VALUES (1965, 282, 60, 2);
INSERT INTO `penilaian` VALUES (1966, 282, 61, 3);
INSERT INTO `penilaian` VALUES (1967, 282, 62, 4);
INSERT INTO `penilaian` VALUES (1968, 282, 63, 3);
INSERT INTO `penilaian` VALUES (1969, 282, 64, 1);
INSERT INTO `penilaian` VALUES (1970, 282, 65, 2);
INSERT INTO `penilaian` VALUES (1971, 282, 66, 2);

-- ----------------------------
-- Table structure for periode
-- ----------------------------
DROP TABLE IF EXISTS `periode`;
CREATE TABLE `periode`  (
  `id_periode` int NOT NULL AUTO_INCREMENT,
  `tahun_ajar` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `semester` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_periode` int NOT NULL,
  `setting` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_periode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of periode
-- ----------------------------
INSERT INTO `periode` VALUES (1, '2018', 'Ganjil', 0, '50;25;25');
INSERT INTO `periode` VALUES (2, '2018', 'Genap', 0, '50;30;20');
INSERT INTO `periode` VALUES (3, '2019', 'Ganjil', 1, '50;30;0');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `nip` char(18) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_jenis_user` int NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_guru` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_guru` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tempat_lahir` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `jenis_kelamin` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_nikah` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nip`) USING BTREE,
  INDEX `id_jenis_user`(`id_jenis_user` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1101101110101011', 7, '1101101110101011', 'Viery Nugroho', 'PNS', 'Blitar', 'Blitar', '1995-08-10', 'L', 'B', '088817217277');
INSERT INTO `user` VALUES ('1156749647300000', 6, 'rin', 'Rin Agustina, S.Pd.AUD', 'GTY', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859');
INSERT INTO `user` VALUES ('1547766665300000', 7, 'kicky', 'Kicky Vinda Happy Setiawan, S.Pd', 'Tetap', 'jalan raya kedung baruk no 98', 'Surabaya', '1990-08-31', 'L', 'B', '088776656676');
INSERT INTO `user` VALUES ('20556036183001', 6, 'indah', 'Indah Palupi, S. Pd.AUD', 'Tetap', 'Pondok Candra', 'Surabaya', '1987-03-11', 'L', 'B', '081228394859');
INSERT INTO `user` VALUES ('20556036188001', 6, 'sahyudi', 'Sahyudi, S.PdI', 'Tetap', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859');
INSERT INTO `user` VALUES ('20556036189001', 6, 'zuni', 'Zuni Ernawati, S.Pd.', 'Tetap', 'jalan raya kedung baruk no 98', 'Surabaya', '1990-08-31', 'L', 'B', '088776656676');
INSERT INTO `user` VALUES ('20556036189002', 6, 'zuhri', 'Zuhri Ismail', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323');
INSERT INTO `user` VALUES ('20556036190001', 6, 'nur', 'Nur Indah Jarotin', 'Tetap', 'Magersari', 'Surabaya', '1985-11-21', 'L', 'N', '085223542854');
INSERT INTO `user` VALUES ('205560361930002', 6, 'kurniawan', 'Kurniawan Bahyu Sadewa, S.Pd.', 'Tetap', 'Rewin', 'Surabaya', '1985-04-26', 'P', 'N', '089878764812');
INSERT INTO `user` VALUES ('20556036193001', 6, 'herma', 'Herma Fery Rosadi, S.Pd.', 'Tetap', 'Surabaya', 'Surabaya', '1990-06-12', 'L', 'B', '088887876767');
INSERT INTO `user` VALUES ('20556036194001', 6, 'siti', 'Siti Rifqi Udzakia', 'Tetap', 'Manukan', 'Surabaya', '1989-12-21', 'P', 'B', '081876765239');
INSERT INTO `user` VALUES ('20556036198001', 6, 'karisma', 'Karisma Virga Yoan  vella', 'Tetap', 'Kebraon', 'Surabaya', '1982-05-07', 'L', 'B', '089232375545');
INSERT INTO `user` VALUES ('2443750653300000', 6, 'sri', 'Sri Banun, S.Pd.AUD', 'Tetap', 'Kebraon', 'Surabaya', '1982-05-07', 'L', 'B', '089232375545');
INSERT INTO `user` VALUES ('2539755655300000', 6, 'ita', 'Ita Dewi Sururiah, S.Pd.AUD', 'Tetap', 'Manukan', 'Surabaya', '1989-12-21', 'P', 'B', '081876765239');
INSERT INTO `user` VALUES ('2540759660300010', 6, 'miftakhul', 'Miftakhul Choiriyah, S.Pd.AUD', 'Tetap', 'Kebraon', 'Surabaya', '1982-05-07', 'L', 'B', '089232375545');
INSERT INTO `user` VALUES ('2560742645200000', 6, 'supramono', 'Supramono', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765');
INSERT INTO `user` VALUES ('2839756657300010', 6, 'mudawamatul', 'Mudawamatul Fahma Malikatin, S.Pd.AUD', 'Tetap', 'Pondok Candra', 'Surabaya', '1987-03-11', 'L', 'B', '081228394859');
INSERT INTO `user` VALUES ('3035753655300010', 6, 'cholisatun', 'Cholisatun Niam, S.Pd.AUD', 'Tetap', 'Kediri Bos', 'Kediri', '1996-03-21', 'L', 'N', '0819283746378');
INSERT INTO `user` VALUES ('3136761663300090', 6, 'andayani', 'Andayani, S.Pd.AUD', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765');
INSERT INTO `user` VALUES ('3344749651300020', 6, 'triana', 'Triana Sulistyowati, S.Pd.AUD', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323');
INSERT INTO `user` VALUES ('3540760662300010', 6, 'umu', 'Umu Kholifah, S.Pd.AUD', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323');
INSERT INTO `user` VALUES ('3838759660200030', 6, 'arif', 'Arif Muchson, S.Pd.I', 'Tetap', 'Surabaya', 'Surabaya', '1990-06-12', 'L', 'B', '088887876767');
INSERT INTO `user` VALUES ('4047750652300030', 6, 'siti', 'Siti Mardiatin, S.Pd.AUD', 'Tetap', 'Rewin', 'Surabaya', '1985-04-26', 'P', 'N', '089878764812');
INSERT INTO `user` VALUES ('4463756657300010', 6, 'muhibatul', 'Muhibatul Hidayah, S.Pd.AUD', 'Tetap', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859');
INSERT INTO `user` VALUES ('4552752653300000', 6, 'tri', 'Tri Diana Nur Sholihah, SPd.AUD', 'Tetap', 'Kediri Bos', 'Kediri', '1996-03-21', 'L', 'N', '0819283746378');
INSERT INTO `user` VALUES ('4647762663300010', 6, 'aniek', 'Aniek Prihartini, S.Pd.AUD', 'Tetap', 'jalan raya kedung baruk no 98', 'Surabaya', '1990-08-31', 'L', 'B', '088776656676');
INSERT INTO `user` VALUES ('4958757657300000', 6, 'siti', 'Siti Arifah, S.Pd.AUD', 'Tetap', 'Rewin', 'Surabaya', '1985-04-26', 'P', 'N', '089878764812');
INSERT INTO `user` VALUES ('5138763665200000', 6, 'yusuf', 'Yusuf Dwi Cahyono, S.Pd.AUD', 'Tetap', 'Surabaya', 'Surabaya', '1990-06-12', 'L', 'B', '088887876767');
INSERT INTO `user` VALUES ('5144758661200000', 6, 'redy', 'Redy Agus Fitrianto, S.Pd.I', 'Tetap', 'Surabaya', 'Surabaya', '1996-12-21', 'L', 'B', '0819283776666');
INSERT INTO `user` VALUES ('5537755656300012', 5, 'adrikah', 'Adrikah, S.Psi., M.Pd.', 'Tetap', 'Kediri Bos', 'Kediri', '1996-03-21', 'L', 'N', '0819283746378');
INSERT INTO `user` VALUES ('5553750651300000', 6, 'lilik', 'Lilik Uswatun Khasanah,S.Pd.AUD', 'Tetap', 'Magersari', 'Surabaya', '1985-11-21', 'L', 'N', '085223542854');
INSERT INTO `user` VALUES ('5853749650300000', 6, 'suriyah', 'Suriyah, S.Ag', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765');
INSERT INTO `user` VALUES ('6341759662200020', 6, 'imron', 'Inmron Zunaidi, S.Pd.I', 'Tetap', 'Surabaya', 'Surabaya', '1996-12-21', 'L', 'B', '0819283776666');
INSERT INTO `user` VALUES ('6451753656300000', 6, 'rismawati', 'Rismawati, S.Ag', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765');
INSERT INTO `user` VALUES ('6452757659300010', 6, 'sri', 'Sri Adnin, S.Pd', 'Tetap', 'Manukan', 'Surabaya', '1989-12-21', 'P', 'B', '081876765239');
INSERT INTO `user` VALUES ('6661759661300000', 6, 'daris', 'Daris Awaliyah, S.Pd.AUD', 'Tetap', 'Pondok Candra', 'Surabaya', '1987-03-11', 'L', 'B', '081228394859');
INSERT INTO `user` VALUES ('6849757659300040', 6, 'yuyun', 'Yuyun Astuti, S.Pd.I', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323');
INSERT INTO `user` VALUES ('8455766668300000', 6, 'ainun', 'Ainun Tafsin Afidah, S.Pd.AUD', 'Tetap', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859');
INSERT INTO `user` VALUES ('9433759662300000', 6, 'wahyuningsih', 'Wahyuningsih, S.Pd.AUD', 'Tetap', 'Magersari', 'Surabaya', '1985-11-21', 'L', 'N', '085223542854');
INSERT INTO `user` VALUES ('9640761662300012', 6, 'erwin', 'Erwin Kusumawati, M.Pd.', 'Tetap', 'Surabaya', 'Surabaya', '1996-12-21', 'L', 'B', '0819283776666');

SET FOREIGN_KEY_CHECKS = 1;
