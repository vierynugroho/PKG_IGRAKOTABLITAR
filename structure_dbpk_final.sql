/*
 Navicat Premium Data Transfer

 Source Server         : viery_connection
 Source Server Type    : MySQL
 Source Server Version : 100138 (10.1.38-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_kosong

 Target Server Type    : MySQL
 Target Server Version : 100138 (10.1.38-MariaDB)
 File Encoding         : 65001

 Date: 29/01/2024 16:15:31
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
INSERT INTO `jenis_user` VALUES (1, 'Kepala Sekolah', 3);
INSERT INTO `jenis_user` VALUES (2, 'Wakil Kepala Sekolah', 2);
INSERT INTO `jenis_user` VALUES (3, 'Tata Usaha', 0);
INSERT INTO `jenis_user` VALUES (4, 'Guru', 1);

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
  CONSTRAINT `FK_jenis_user` FOREIGN KEY (`id_jenis_user`) REFERENCES `jenis_user` (`id_jenis_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
