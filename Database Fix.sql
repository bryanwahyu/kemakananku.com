/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.19-MariaDB : Database - kemakananku
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kemakananku` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kemakananku`;

/*Table structure for table `akses` */

DROP TABLE IF EXISTS `akses`;

CREATE TABLE `akses` (
  `idakses` int(100) NOT NULL AUTO_INCREMENT,
  `hak` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idakses`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `akses` */

LOCK TABLES `akses` WRITE;

insert  into `akses`(`idakses`,`hak`) values (1,'Admin'),(2,'Catering'),(3,'Pembeli'),(4,'Pengantar ');

UNLOCK TABLES;

/*Table structure for table `bank` */

DROP TABLE IF EXISTS `bank`;

CREATE TABLE `bank` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `bank` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `bank` */

LOCK TABLES `bank` WRITE;

insert  into `bank`(`id`,`bank`) values (1,'BCA'),(2,'Mandiri'),(3,'BNI'),(4,'BRI');

UNLOCK TABLES;

/*Table structure for table `data_admin` */

DROP TABLE IF EXISTS `data_admin`;

CREATE TABLE `data_admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `Job` varchar(20) DEFAULT NULL,
  `notelp` varchar(16) DEFAULT NULL,
  `kode_user` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kode_user` (`kode_user`),
  CONSTRAINT `data_admin_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_admin` */

LOCK TABLES `data_admin` WRITE;

UNLOCK TABLES;

/*Table structure for table `data_catering` */

DROP TABLE IF EXISTS `data_catering`;

CREATE TABLE `data_catering` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama_catering` varchar(255) DEFAULT NULL,
  `pemilik` varchar(255) DEFAULT NULL,
  `alamat` text,
  `notelpon` varchar(15) DEFAULT NULL,
  `deskripsi` text,
  `bayar_registrasi` int(1) DEFAULT '0',
  `laporan_keuangan` int(1) DEFAULT '0',
  `first_login` int(1) DEFAULT '0',
  `kode_user` int(100) DEFAULT NULL,
  `kode_rating` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `data_catering_ibfk_1` (`kode_user`),
  KEY `data_catering_ibfk_2` (`kode_rating`),
  CONSTRAINT `data_catering_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `data_catering_ibfk_2` FOREIGN KEY (`kode_rating`) REFERENCES `rating` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_catering` */

LOCK TABLES `data_catering` WRITE;

UNLOCK TABLES;

/*Table structure for table `data_pembeli` */

DROP TABLE IF EXISTS `data_pembeli`;

CREATE TABLE `data_pembeli` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `Perkerjaan` varchar(255) DEFAULT NULL,
  `alamat` text,
  `notelp` varchar(15) DEFAULT NULL,
  `e-mail` varchar(255) DEFAULT NULL,
  `keterangan` tinytext,
  `first_login` int(1) DEFAULT '0',
  `log` datetime DEFAULT NULL,
  `vip` int(1) DEFAULT '0',
  `utang` int(100) DEFAULT NULL,
  `kode_user` int(100) DEFAULT NULL,
  `tipe_customer` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipe_customer` (`tipe_customer`),
  KEY `data_pembeli_ibfk_2` (`kode_user`),
  CONSTRAINT `data_pembeli_ibfk_1` FOREIGN KEY (`tipe_customer`) REFERENCES `tipe_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `data_pembeli_ibfk_2` FOREIGN KEY (`kode_user`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_pembeli` */

LOCK TABLES `data_pembeli` WRITE;

UNLOCK TABLES;

/*Table structure for table `detail_bank` */

DROP TABLE IF EXISTS `detail_bank`;

CREATE TABLE `detail_bank` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `norek` varchar(100) DEFAULT NULL,
  `atasnama` varchar(100) DEFAULT NULL,
  `kode_bank` int(5) DEFAULT NULL,
  `kode_penjual` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `norek` (`norek`),
  KEY `kode_bank` (`kode_bank`),
  KEY `kode_penjual` (`kode_penjual`),
  CONSTRAINT `detail_bank_ibfk_1` FOREIGN KEY (`kode_bank`) REFERENCES `bank` (`id`),
  CONSTRAINT `detail_bank_ibfk_2` FOREIGN KEY (`kode_penjual`) REFERENCES `data_catering` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `detail_bank` */

LOCK TABLES `detail_bank` WRITE;

UNLOCK TABLES;

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `jadwal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `jadwal` */

LOCK TABLES `jadwal` WRITE;

insert  into `jadwal`(`id`,`jadwal`) values (1,'Senin Pagi'),(2,'Senin Siang'),(3,'Senin Malam'),(4,'Selasa Pagi'),(5,'Selasa Siang'),(6,'Selasa Malam'),(7,'Rabu Pagi'),(8,'Rabu Siang'),(9,'Rabu Malam'),(10,'Kamis Pagi'),(11,'kamis Siang'),(12,'Kamis Malam'),(13,'Jumat Pagi'),(14,'Jumat Siang'),(15,'Jumat Malam'),(16,'Sabtu Pagi'),(17,'Sabtu Siang'),(18,'Sabtu Malam'),(19,'Minggu Pagi'),(20,'Minggu Siang');

UNLOCK TABLES;

/*Table structure for table `laporankerjasama` */

DROP TABLE IF EXISTS `laporankerjasama`;

CREATE TABLE `laporankerjasama` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kodekerja` int(5) DEFAULT NULL,
  `hitungan` int(200) DEFAULT NULL,
  `keterangan` text,
  `lunas` int(11) DEFAULT '0',
  `kodecatering` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kodecatering` (`kodecatering`),
  CONSTRAINT `laporankerjasama_ibfk_1` FOREIGN KEY (`kodecatering`) REFERENCES `data_catering` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `laporankerjasama` */

LOCK TABLES `laporankerjasama` WRITE;

UNLOCK TABLES;

/*Table structure for table `laporanpembayaran` */

DROP TABLE IF EXISTS `laporanpembayaran`;

CREATE TABLE `laporanpembayaran` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `bukti` varchar(100) DEFAULT NULL,
  `lunas` int(1) DEFAULT '0',
  `kodepesan` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kodepesan` (`kodepesan`),
  CONSTRAINT `laporanpembayaran_ibfk_1` FOREIGN KEY (`kodepesan`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `laporanpembayaran` */

LOCK TABLES `laporanpembayaran` WRITE;

UNLOCK TABLES;

/*Table structure for table `laporanvip` */

DROP TABLE IF EXISTS `laporanvip`;

CREATE TABLE `laporanvip` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kodepembeli` int(100) DEFAULT NULL,
  `tanggalmulai` datetime DEFAULT NULL,
  `tanggalselesai` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kodepembeli` (`kodepembeli`),
  CONSTRAINT `laporanvip_ibfk_1` FOREIGN KEY (`kodepembeli`) REFERENCES `data_pembeli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `laporanvip` */

LOCK TABLES `laporanvip` WRITE;

UNLOCK TABLES;

/*Table structure for table `makanan` */

DROP TABLE IF EXISTS `makanan`;

CREATE TABLE `makanan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `kodepenjual` int(100) DEFAULT NULL,
  `kodejadwal` int(100) DEFAULT NULL,
  `kodepaket` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kodejadwal` (`kodejadwal`),
  KEY `kodepaket` (`kodepaket`),
  KEY `kodepenjual` (`kodepenjual`),
  CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`kodejadwal`) REFERENCES `jadwal` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `makanan_ibfk_2` FOREIGN KEY (`kodepaket`) REFERENCES `paket` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `makanan_ibfk_3` FOREIGN KEY (`kodepenjual`) REFERENCES `data_catering` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `makanan` */

LOCK TABLES `makanan` WRITE;

UNLOCK TABLES;

/*Table structure for table `paket` */

DROP TABLE IF EXISTS `paket`;

CREATE TABLE `paket` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `namapaket` varchar(100) DEFAULT NULL,
  `harga` int(100) DEFAULT NULL,
  `bayar` int(1) DEFAULT '0',
  `id_penjual` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_penjual` (`id_penjual`),
  CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `data_catering` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paket` */

LOCK TABLES `paket` WRITE;

UNLOCK TABLES;

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `jumlah` int(10) DEFAULT NULL,
  `utang` int(1) DEFAULT '0',
  `bayar` int(1) DEFAULT '0',
  `kodepaket` int(100) DEFAULT NULL,
  `kodepembeli` int(100) DEFAULT NULL,
  `total` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kodepembeli` (`kodepembeli`),
  KEY `kodepaket` (`kodepaket`),
  CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kodepembeli`) REFERENCES `data_pembeli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`kodepaket`) REFERENCES `paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

LOCK TABLES `pesanan` WRITE;

UNLOCK TABLES;

/*Table structure for table `rating` */

DROP TABLE IF EXISTS `rating`;

CREATE TABLE `rating` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `rating` double DEFAULT NULL,
  `keterangan` text,
  `kodepembeli` int(100) DEFAULT NULL,
  `kodepenjual` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kodepembeli` (`kodepembeli`),
  KEY `kodepenjual` (`kodepenjual`),
  CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`kodepembeli`) REFERENCES `data_pembeli` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`kodepenjual`) REFERENCES `data_catering` (`kode_user`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rating` */

LOCK TABLES `rating` WRITE;

UNLOCK TABLES;

/*Table structure for table `tiket` */

DROP TABLE IF EXISTS `tiket`;

CREATE TABLE `tiket` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `isi` text,
  `kodetipe` int(5) DEFAULT NULL,
  `kodepembeli` int(100) DEFAULT NULL,
  `kodepenjual` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kodetipe` (`kodetipe`),
  KEY `kodepembeli` (`kodepembeli`),
  KEY `kodepenjual` (`kodepenjual`),
  CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`kodetipe`) REFERENCES `tipe_kategori` (`id`),
  CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`kodepembeli`) REFERENCES `data_pembeli` (`id`),
  CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`kodepenjual`) REFERENCES `data_catering` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tiket` */

LOCK TABLES `tiket` WRITE;

UNLOCK TABLES;

/*Table structure for table `tipe_customer` */

DROP TABLE IF EXISTS `tipe_customer`;

CREATE TABLE `tipe_customer` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tipe_customer` */

LOCK TABLES `tipe_customer` WRITE;

insert  into `tipe_customer`(`id`,`tipe`) values (1,'Mahasiswa'),(2,'Perusahaan'),(3,'Hotel'),(4,'Peorangan'),(5,'Pernikahan');

UNLOCK TABLES;

/*Table structure for table `tipe_kategori` */

DROP TABLE IF EXISTS `tipe_kategori`;

CREATE TABLE `tipe_kategori` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tipe_kategori` */

LOCK TABLES `tipe_kategori` WRITE;

insert  into `tipe_kategori`(`id`,`kategori`) values (1,'Keuangan'),(2,'user'),(3,'penipuan'),(4,'bug');

UNLOCK TABLES;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `iduser` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `kode_akses` int(100) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `username` (`username`),
  KEY `user_ibfk_1` (`kode_akses`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`kode_akses`) REFERENCES `akses` (`idakses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

LOCK TABLES `user` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
