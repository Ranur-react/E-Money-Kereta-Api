/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.6-MariaDB : Database - db_emoney_iqbal_upi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tb_kartu` */

CREATE TABLE `tb_kartu` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_card` varchar(200) NOT NULL,
  `tgl` date DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `value` double DEFAULT NULL,
  PRIMARY KEY (`no`,`id_card`)
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kartu` */

insert  into `tb_kartu`(`no`,`id_card`,`tgl`,`nama`,`value`) values (0,'9476A40','2019-12-12','you',0),(182,'F9B2A5A3','2020-01-14',NULL,20000);

/*Table structure for table `user` */

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`) values (1,'admin','202cb962ac59075b964b07152d234b70'),(20,'satu','27946274a201346f0322e3861909b5ff'),(21,'rahmat','202cb962ac59075b964b07152d234b70');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
