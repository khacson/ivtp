/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.31-MariaDB : Database - investor
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `ivt_investment_commets` */

DROP TABLE IF EXISTS `ivt_investment_commets`;

CREATE TABLE `ivt_investment_commets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `has_child` tinyint(1) DEFAULT '0',
  `level` tinyint(1) DEFAULT '0',
  `fullname` char(50) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `memberid` int(11) DEFAULT NULL,
  `blogid` int(11) DEFAULT NULL,
  `description` text,
  `accept` tinyint(1) DEFAULT '0',
  `reply_id` int(11) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `userupdate` char(50) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_blogid` (`blogid`),
  KEY `idx_memberid` (`memberid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `ivt_investment_commets` */

LOCK TABLES `ivt_investment_commets` WRITE;

insert  into `ivt_investment_commets`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`memberid`,`blogid`,`description`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`,`isdelete`) values (9,0,1,0,'Khương','1234567',NULL,-1,'test',1,NULL,'2018-06-15 21:54:41',NULL,NULL,0,0);
insert  into `ivt_investment_commets`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`memberid`,`blogid`,`description`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`,`isdelete`) values (10,0,1,0,'Betty','1234567',NULL,-1,'test',1,NULL,'2018-06-15 21:55:00',NULL,NULL,0,0);
insert  into `ivt_investment_commets`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`memberid`,`blogid`,`description`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`,`isdelete`) values (11,10,1,1,'Tata','1111111',NULL,-1,'test',1,NULL,'2018-06-15 21:55:26',NULL,NULL,0,0);
insert  into `ivt_investment_commets`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`memberid`,`blogid`,`description`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`,`isdelete`) values (12,11,1,2,'Anna','12313123',NULL,-1,'test',1,NULL,'2018-06-15 21:56:11',NULL,NULL,0,0);
insert  into `ivt_investment_commets`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`memberid`,`blogid`,`description`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`,`isdelete`) values (13,12,0,3,'Khương','0997257935',NULL,-1,'test',1,NULL,'2018-06-15 21:56:37',NULL,NULL,0,0);
insert  into `ivt_investment_commets`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`memberid`,`blogid`,`description`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`,`isdelete`) values (14,0,0,0,'','',NULL,-1,NULL,1,NULL,'2018-06-15 22:31:06',NULL,NULL,0,0);
insert  into `ivt_investment_commets`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`memberid`,`blogid`,`description`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`,`isdelete`) values (15,0,0,0,'Khương','',NULL,-1,'test',1,NULL,'2018-06-15 22:33:53',NULL,NULL,0,0);
insert  into `ivt_investment_commets`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`memberid`,`blogid`,`description`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`,`isdelete`) values (16,9,0,1,'Khương','',NULL,-1,'test',1,NULL,'2018-06-15 22:35:49',NULL,NULL,0,0);
insert  into `ivt_investment_commets`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`memberid`,`blogid`,`description`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`,`isdelete`) values (17,0,1,0,'Khương','12313123',NULL,-1,'test',1,NULL,'2018-06-15 22:40:39',NULL,NULL,0,0);
insert  into `ivt_investment_commets`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`memberid`,`blogid`,`description`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`,`isdelete`) values (18,17,0,1,'Khương','12313123',NULL,-1,'test',1,NULL,'2018-06-15 22:41:45',NULL,NULL,0,0);
insert  into `ivt_investment_commets`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`memberid`,`blogid`,`description`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`,`isdelete`) values (19,0,0,0,'Khương','',NULL,-1,'test',1,NULL,'2018-06-15 22:46:38',NULL,NULL,0,0);

UNLOCK TABLES;

/*Table structure for table `ivt_markettrend_comment` */

DROP TABLE IF EXISTS `ivt_markettrend_comment`;

CREATE TABLE `ivt_markettrend_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `has_child` tinyint(1) DEFAULT '0',
  `level` tinyint(1) DEFAULT '0',
  `fullname` char(50) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `memberid` int(11) DEFAULT NULL,
  `blogid` int(11) DEFAULT NULL,
  `accept` tinyint(1) DEFAULT '0',
  `reply_id` int(11) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `userupdate` char(50) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_member` (`memberid`),
  KEY `idx_post` (`blogid`),
  KEY `show_cmt` (`blogid`,`parent_id`,`accept`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `ivt_markettrend_comment` */

LOCK TABLES `ivt_markettrend_comment` WRITE;

insert  into `ivt_markettrend_comment`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`description`,`memberid`,`blogid`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`) values (1,0,1,0,'Nguyễn Duy Khương',NULL,'Chào bạn, bạn cho mình hỏi cái này ...',NULL,15,1,NULL,'2018-06-14 23:27:56',NULL,NULL,0);
insert  into `ivt_markettrend_comment`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`description`,`memberid`,`blogid`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`) values (2,1,1,1,'Đặng Thu Huyền',NULL,'Mình cũng hỏi cái này nha bạn ...',NULL,15,1,NULL,'2018-06-14 23:27:58',NULL,NULL,0);
insert  into `ivt_markettrend_comment`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`description`,`memberid`,`blogid`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`) values (3,2,1,2,'Nguyễn Gia Huy',NULL,'Cái này thì sao bạn ...',NULL,15,1,NULL,'2018-06-14 23:28:00',NULL,NULL,0);
insert  into `ivt_markettrend_comment`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`description`,`memberid`,`blogid`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`) values (4,1,1,1,'Nguyễn Gia Huy',NULL,'Cái này cũng vậy ...',NULL,15,1,NULL,'2018-06-14 23:28:04',NULL,NULL,0);
insert  into `ivt_markettrend_comment`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`description`,`memberid`,`blogid`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`) values (5,0,0,0,'Nguyễn Duy Khương',NULL,'Hi bạn ...',NULL,15,1,NULL,'2018-06-14 23:28:07',NULL,NULL,0);
insert  into `ivt_markettrend_comment`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`description`,`memberid`,`blogid`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`) values (6,3,1,3,'Khương','0997257935','Hello admin',NULL,15,1,NULL,'2018-06-15 00:24:17',NULL,NULL,0);
insert  into `ivt_markettrend_comment`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`description`,`memberid`,`blogid`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`) values (7,1,1,1,'Tiễn','','123 123 213',NULL,15,1,18,'2018-06-15 00:38:51','root','2018-06-16 11:25:07',0);
insert  into `ivt_markettrend_comment`(`id`,`parent_id`,`has_child`,`level`,`fullname`,`phone`,`description`,`memberid`,`blogid`,`accept`,`reply_id`,`datecreate`,`userupdate`,`dateupdate`,`is_admin`) values (18,7,0,2,'Administrator - Admin',NULL,'test',NULL,15,1,NULL,'2018-06-16 11:25:07',NULL,NULL,1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
