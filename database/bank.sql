/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.8-MariaDB : Database - bank
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bank` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bank`;

/*Table structure for table `deposit` */

DROP TABLE IF EXISTS `deposit`;

CREATE TABLE `deposit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `deposit_amount` float NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `deposit` */

insert  into `deposit`(`id`,`deposit_amount`,`created_at`,`user_id`) values 
(18,500,'2020-06-03 20:11:42',6),
(19,200,'2020-06-03 20:12:04',6);

/*Table structure for table `transaction` */

DROP TABLE IF EXISTS `transaction`;

CREATE TABLE `transaction` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `related_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `transaction` */

insert  into `transaction`(`id`,`type`,`user_id`,`description`,`related_id`,`created_at`,`amount`) values 
(8,'deposit',6,'',18,'2020-06-03 20:11:42',500),
(9,'deposit',6,'',19,'2020-06-03 20:12:04',200),
(10,'withdrow',6,'',5,'2020-06-03 20:12:28',100),
(11,'withdrow',6,'',6,'2020-06-03 20:12:57',200);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bank_account` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ballance` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`user_id`,`first_name`,`last_name`,`email`,`bank_account`,`phone_num`,`password`,`ballance`) values 
(6,'admin','admin','admin','admin@gmail.com','1996720','1111111111','e020590f0e18cd6053d7ae0e0a507609',400);

/*Table structure for table `withdrow` */

DROP TABLE IF EXISTS `withdrow`;

CREATE TABLE `withdrow` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `withdrow_amount` float NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `withdrow` */

insert  into `withdrow`(`id`,`withdrow_amount`,`created_at`,`user_id`) values 
(5,100,'2020-06-03 20:12:27',6),
(6,200,'2020-06-03 20:12:57',6);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
