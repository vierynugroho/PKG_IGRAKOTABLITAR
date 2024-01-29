/*
 Navicat Premium Data Transfer


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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

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
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;



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
) ENGINE = InnoDB AUTO_INCREMENT = 242 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;


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
) ENGINE = InnoDB AUTO_INCREMENT = 1607 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;



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
  INDEX `id_jenis_user`(`id_jenis_user` ASC) USING BTREE,
  CONSTRAINT `FK_user_jenis_user` FOREIGN KEY (`id_jenis_user`) REFERENCES `jenis_user` (`id_jenis_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('5537755656300012', 5, 'adrikah', 'Adrikah, S.Psi., M.Pd.', 'Tetap', 'Kediri Bos', 'Kediri', '1996-03-21', 'L', 'N', '0819283746378');
INSERT INTO `user` VALUES ('9640761662300012', 6, 'erwin', 'Erwin Kusumawati, M.Pd.', 'Tetap', 'Surabaya', 'Surabaya', '1996-12-21', 'L', 'B', '0819283776666');
INSERT INTO `user` VALUES ('1547766665300000', 7, 'kicky', 'Kicky Vinda Happy Setiawan, S.Pd', 'Tetap', 'jalan raya kedung baruk no 98', 'Surabaya', '1990-08-31', 'L', 'B', '088776656676');
INSERT INTO `user` VALUES ('5138763665200000', 6, 'yusuf', 'Yusuf Dwi Cahyono, S.Pd.AUD', 'Tetap', 'Surabaya', 'Surabaya', '1990-06-12', 'L', 'B', '088887876767');
INSERT INTO `user` VALUES ('2839756657300010', 6, 'mudawamatul', 'Mudawamatul Fahma Malikatin, S.Pd.AUD', 'Tetap', 'Pondok Candra', 'Surabaya', '1987-03-11', 'L', 'B', '081228394859');
INSERT INTO `user` VALUES ('5553750651300000', 6, 'lilik', 'Lilik Uswatun Khasanah,S.Pd.AUD', 'Tetap', 'Magersari', 'Surabaya', '1985-11-21', 'L', 'N', '085223542854');
INSERT INTO `user` VALUES ('2539755655300000', 6, 'ita', 'Ita Dewi Sururiah, S.Pd.AUD', 'Tetap', 'Manukan', 'Surabaya', '1989-12-21', 'P', 'B', '081876765239');
INSERT INTO `user` VALUES ('4047750652300030', 6, 'siti', 'Siti Mardiatin, S.Pd.AUD', 'Tetap', 'Rewin', 'Surabaya', '1985-04-26', 'P', 'N', '089878764812');
INSERT INTO `user` VALUES ('2443750653300000', 6, 'sri', 'Sri Banun, S.Pd.AUD', 'Tetap', 'Kebraon', 'Surabaya', '1982-05-07', 'L', 'B', '089232375545');
INSERT INTO `user` VALUES ('3344749651300020', 6, 'triana', 'Triana Sulistyowati, S.Pd.AUD', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323');
INSERT INTO `user` VALUES ('1156749647300000', 6, 'rin', 'Rin Agustina, S.Pd.AUD', 'Tetap', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859');
INSERT INTO `user` VALUES ('5853749650300000', 6, 'suriyah', 'Suriyah, S.Ag', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765');
INSERT INTO `user` VALUES ('4552752653300000', 6, 'tri', 'Tri Diana Nur Sholihah, SPd.AUD', 'Tetap', 'Kediri Bos', 'Kediri', '1996-03-21', 'L', 'N', '0819283746378');
INSERT INTO `user` VALUES ('5144758661200000', 6, 'redy', 'Redy Agus Fitrianto, S.Pd.I', 'Tetap', 'Surabaya', 'Surabaya', '1996-12-21', 'L', 'B', '0819283776666');
INSERT INTO `user` VALUES ('4647762663300010', 6, 'aniek', 'Aniek Prihartini, S.Pd.AUD', 'Tetap', 'jalan raya kedung baruk no 98', 'Surabaya', '1990-08-31', 'L', 'B', '088776656676');
INSERT INTO `user` VALUES ('3838759660200030', 6, 'arif', 'Arif Muchson, S.Pd.I', 'Tetap', 'Surabaya', 'Surabaya', '1990-06-12', 'L', 'B', '088887876767');
INSERT INTO `user` VALUES ('6661759661300000', 6, 'daris', 'Daris Awaliyah, S.Pd.AUD', 'Tetap', 'Pondok Candra', 'Surabaya', '1987-03-11', 'L', 'B', '081228394859');
INSERT INTO `user` VALUES ('9433759662300000', 6, 'wahyuningsih', 'Wahyuningsih, S.Pd.AUD', 'Tetap', 'Magersari', 'Surabaya', '1985-11-21', 'L', 'N', '085223542854');
INSERT INTO `user` VALUES ('6452757659300010', 6, 'sri', 'Sri Adnin, S.Pd', 'Tetap', 'Manukan', 'Surabaya', '1989-12-21', 'P', 'B', '081876765239');
INSERT INTO `user` VALUES ('4958757657300000', 6, 'siti', 'Siti Arifah, S.Pd.AUD', 'Tetap', 'Rewin', 'Surabaya', '1985-04-26', 'P', 'N', '089878764812');
INSERT INTO `user` VALUES ('2540759660300010', 6, 'miftakhul', 'Miftakhul Choiriyah, S.Pd.AUD', 'Tetap', 'Kebraon', 'Surabaya', '1982-05-07', 'L', 'B', '089232375545');
INSERT INTO `user` VALUES ('3540760662300010', 6, 'umu', 'Umu Kholifah, S.Pd.AUD', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323');
INSERT INTO `user` VALUES ('4463756657300010', 6, 'muhibatul', 'Muhibatul Hidayah, S.Pd.AUD', 'Tetap', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859');
INSERT INTO `user` VALUES ('6451753656300000', 6, 'rismawati', 'Rismawati, S.Ag', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765');
INSERT INTO `user` VALUES ('6849757659300040', 6, 'yuyun', 'Yuyun Astuti, S.Pd.I', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323');
INSERT INTO `user` VALUES ('8455766668300000', 6, 'ainun', 'Ainun Tafsin Afidah, S.Pd.AUD', 'Tetap', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859');
INSERT INTO `user` VALUES ('3136761663300090', 6, 'andayani', 'Andayani, S.Pd.AUD', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765');
INSERT INTO `user` VALUES ('3035753655300010', 6, 'cholisatun', 'Cholisatun Niam, S.Pd.AUD', 'Tetap', 'Kediri Bos', 'Kediri', '1996-03-21', 'L', 'N', '0819283746378');
INSERT INTO `user` VALUES ('6341759662200020', 6, 'imron', 'Inmron Zunaidi, S.Pd.I', 'Tetap', 'Surabaya', 'Surabaya', '1996-12-21', 'L', 'B', '0819283776666');
INSERT INTO `user` VALUES ('20556036189001', 6, 'zuni', 'Zuni Ernawati, S.Pd.', 'Tetap', 'jalan raya kedung baruk no 98', 'Surabaya', '1990-08-31', 'L', 'B', '088776656676');
INSERT INTO `user` VALUES ('20556036193001', 6, 'herma', 'Herma Fery Rosadi, S.Pd.', 'Tetap', 'Surabaya', 'Surabaya', '1990-06-12', 'L', 'B', '088887876767');
INSERT INTO `user` VALUES ('20556036183001', 6, 'indah', 'Indah Palupi, S. Pd.AUD', 'Tetap', 'Pondok Candra', 'Surabaya', '1987-03-11', 'L', 'B', '081228394859');
INSERT INTO `user` VALUES ('20556036190001', 6, 'nur', 'Nur Indah Jarotin', 'Tetap', 'Magersari', 'Surabaya', '1985-11-21', 'L', 'N', '085223542854');
INSERT INTO `user` VALUES ('20556036194001', 6, 'siti', 'Siti Rifqi Udzakia', 'Tetap', 'Manukan', 'Surabaya', '1989-12-21', 'P', 'B', '081876765239');
INSERT INTO `user` VALUES ('205560361930002', 6, 'kurniawan', 'Kurniawan Bahyu Sadewa, S.Pd.', 'Tetap', 'Rewin', 'Surabaya', '1985-04-26', 'P', 'N', '089878764812');
INSERT INTO `user` VALUES ('20556036198001', 6, 'karisma', 'Karisma Virga Yoan  vella', 'Tetap', 'Kebraon', 'Surabaya', '1982-05-07', 'L', 'B', '089232375545');
INSERT INTO `user` VALUES ('20556036189002', 6, 'zuhri', 'Zuhri Ismail', 'Tetap', 'Embong Malang', 'Surabaya', '1989-01-23', 'P', 'B', '081220094323');
INSERT INTO `user` VALUES ('20556036188001', 6, 'sahyudi', 'Sahyudi, S.PdI', 'Tetap', 'Keputih', 'Surabaya', '1982-08-12', 'L', 'N', '083454594859');
INSERT INTO `user` VALUES ('2560742645200000', 6, 'supramono', 'Supramono', 'Tetap', 'Kupang Panjaan', 'Surabaya', '1987-10-02', 'L', 'B', '088999876765');


SET FOREIGN_KEY_CHECKS = 1;
