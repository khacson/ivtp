/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.21-MariaDB : Database - firefuma
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`firefuma` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `firefuma`;

/*Table structure for table `ffm_about` */

DROP TABLE IF EXISTS `ffm_about`;

CREATE TABLE `ffm_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about_title` varchar(250) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `mete_description` varchar(500) DEFAULT NULL,
  `description_short` varchar(5000) DEFAULT NULL COMMENT 'Mô tả ngắn, ckediter',
  `description_long` text COMMENT 'Mô tả chi tiết ckediter',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='gio thieu';

/*Data for the table `ffm_about` */

insert  into `ffm_about`(`id`,`about_title`,`image`,`friendlyurl`,`meta_title`,`meta_keyword`,`mete_description`,`description_short`,`description_long`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (1,'Giới thiệu công ty','22.png','gioi-thieu-cong-ty','Giới thiệu công ty','Phần mềm bán hàng, phần mềm bán cà phê, phần mềm quản lý nhà hàng, phần mềm quả lý bảo hành điện thoại điện máy','Phần mềm bán hàng, phần mềm bán cà phê, phần mềm quản lý nhà hàng, phần mềm quản lý khách sạn, phần mềm quả lý bảo hành điện thoại điện máy, phan mem quan ly ban hang, phan mem quan ly ban ca phe, phan mem quan ly nha hang, phan mem quan ly khach san','<strong>Firefuma</strong> l&agrave; một đội ngũ c&aacute;c chuy&ecirc;n gia CNTT với c&aacute;c kỹ sư gi&agrave;u kinh nghiệm cũng với sự năng động, đầy nhiệt huyết của c&aacute;c bạn trẻ. Ch&uacute;ng t&ocirc;i lu&ocirc;n khao kh&aacute;t mang ứng dụng CNTT v&agrave;o c&ocirc;ng ty, cửa h&agrave;ng của bạn để gi&uacute;p bạn loại bỏ bớt những cuốn số ghi ch&eacute;p cồng kềnh v&agrave; tiết kiệm chi ph&iacute; thời gian một c&aacute;ch hiệu quả nhất.','<p><b>Firefuma</b> l&agrave; một đội ngũ c&aacute;c chuy&ecirc;n gia CNTT với c&aacute;c kỹ sư gi&agrave;u kinh nghiệm cũng với sự năng động, đầy nhiệt huyết của c&aacute;c bạn trẻ. Ch&uacute;ng t&ocirc;i lu&ocirc;n khao kh&aacute;t mang ứng dụng CNTT v&agrave;o c&ocirc;ng ty, cửa h&agrave;ng của bạn để gi&uacute;p bạn loại bỏ bớt những cuốn số ghi ch&eacute;p cồng kềnh v&agrave; tiết kiệm chi ph&iacute; thời gian một c&aacute;ch hiệu quả nhất.</p>\r\n\r\n<h4 class=\"text-left\">&nbsp;&nbsp;&nbsp;Giới thiệu chung</h4>\r\n\r\n<p><b>Firefuma</b> được th&agrave;nh lập 2017 l&agrave; một c&ocirc;ng ty non trẻ, nhưng đội ngũ c&aacute;c kỹ sư gi&agrave;u kinh nghiệm từng l&agrave;m việc cho những c&ocirc;ng ty v&agrave; tập đo&agrave;n lớn. Lu&ocirc;n khao kh&aacute;t đ&oacute;ng g&oacute;p ph&aacute;t triển c&ocirc;ng ty trở th&agrave;nh c&ocirc;ng ty c&ocirc;ng nghệ h&agrave;ng đầu.</p>\r\n\r\n<h4 class=\"text-left\">&nbsp;&nbsp;&nbsp;Tầm nh&igrave;n sứ mệnh</h4>\r\n\r\n<p>X&acirc;y dựng C&ocirc;ng ty <b>Firefuma</b> h&ugrave;ng mạnh dựa tr&ecirc;n nguồn lực con người, nền tảng c&ocirc;ng nghệ, năng lực quản l&yacute; vượt trội, tinh thần l&agrave;m việc nghi&ecirc;m t&uacute;c, sức s&aacute;ng tạo v&agrave; cải tiến kh&ocirc;ng ngừng</p>\r\n\r\n<h4 class=\"text-left\">&nbsp;&nbsp;&nbsp;Phương ch&acirc;m hoạt động</h4>\r\n\r\n<p>Tr&iacute; tuệ, s&aacute;ng tạo l&agrave; nền m&oacute;ng ph&aacute;t triển c&ocirc;ng ty. Sự đo&agrave;n kết v&agrave; t&iacute;nh chuy&ecirc;n nghiệp l&agrave; phương ph&aacute;p l&agrave;m việc của C&ocirc;ng ty. Sự h&agrave;i l&ograve;ng của kh&aacute;ch h&agrave;ng v&agrave; hiệu quả kinh tế l&agrave; mục ti&ecirc;u c&ocirc;ng ty theo đuổi.</p>\r\n\r\n<p>&nbsp;</p>\r\n','2018-05-05 09:17:21','root',NULL,NULL,0);

/*Table structure for table `ffm_baner` */

DROP TABLE IF EXISTS `ffm_baner`;

CREATE TABLE `ffm_baner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `positionid` int(3) DEFAULT NULL,
  `customerid` int(11) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `width` char(3) DEFAULT NULL,
  `height` char(3) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `ishome` tinyint(1) DEFAULT '1',
  `banner_files` varchar(250) DEFAULT NULL,
  `banner_type` tinyint(1) DEFAULT '1' COMMENT '1 img, 2 flash',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(50) DEFAULT NULL,
  `userupdate` char(50) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`,`customerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ffm_baner` */

/*Table structure for table `ffm_blog` */

DROP TABLE IF EXISTS `ffm_blog`;

CREATE TABLE `ffm_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `friendlyurl` varchar(250) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `mete_description` varchar(500) DEFAULT NULL,
  `description_sort` text,
  `description_long` text,
  `typeid` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `thumb` varchar(250) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '1' COMMENT '1 hien thi, 0 khong hien thi',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_url` (`friendlyurl`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_blog` */

insert  into `ffm_blog`(`id`,`title`,`friendlyurl`,`meta_title`,`meta_keyword`,`mete_description`,`description_sort`,`description_long`,`typeid`,`image`,`thumb`,`views`,`ordering`,`isshow`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (3,'Kinh doanh chia sẻ: Hiện tượng làm giàu cực nóng trên thế giới','kinh-doanh-chia-se:-hien-tuong-lam-giau-cuc-nong-tren-the-gioi','Hiện tượng làm giàu cực nóng trên thế giới','Kinh doanh, bán hàng, phần mềm bán hàng','Hiện tượng làm giàu cực nóng trên thế giới, Kinh doanh, bán hàng, phần mềm bán hàng','M&ocirc; h&igrave;nh kinh doanh chia sẻ đang tạo ra lợi nhuận khủng tại nhiều nước nhưng cũng l&agrave;m c&aacute;c nh&agrave; quản l&yacute; đau đầu.','TP.HCM đang phối hợp th&iacute; điểm ứng dụng vận tải h&agrave;nh kh&aacute;ch theo hợp đồng &ldquo;Grab&rdquo;. Đ&acirc;y cũng l&agrave; một ứng dụng hoạt động theo m&ocirc; h&igrave;nh &ldquo;kinh tế chia sẻ&rdquo; - hiện tượng đang &ldquo;l&agrave;m mưa l&agrave;m gi&oacute;&rdquo; m&ocirc;i trường kinh doanh thế giới hiện nay. Những ứng dụng mang t&iacute;nh chia sẻ tiện &iacute;ch c&oacute; thu ph&iacute; nổi tiếng như Uber trong lĩnh vực vận tải h&agrave;nh kh&aacute;ch hay Airbnb trong lĩnh vực chỗ ở v&agrave; du lịch đều nằm trong nh&oacute;m m&ocirc; h&igrave;nh kinh doanh mới nổi mang t&ecirc;n: &ldquo;Kinh doanh chia sẻ&rdquo;. M&ocirc; h&igrave;nh n&agrave;y mang lại mức lợi nhuận &ldquo;đi&ecirc;n rồ&rdquo;, được đ&aacute;nh gi&aacute; l&agrave; hiện tượng kinh doanh năm 2015 v&agrave; l&agrave; m&ocirc; h&igrave;nh kinh doanh n&oacute;ng nhất đầu năm 2016 đến nay, theo tạp ch&iacute; kinh doanh Jacobin (Mỹ). Lợi nhuận &ldquo;đi&ecirc;n rồ&rdquo; &ldquo;Kinh tế chia sẻ&rdquo; nhằm n&oacute;i về một hiện tượng dịch vụ mới, trong đ&oacute; những c&aacute; nh&acirc;n c&oacute; thể chia sẻ c&ugrave;ng sử dụng t&agrave;i sản của nhau th&ocirc;ng qua một b&ecirc;n thứ ba l&agrave; một ứng dụng mạng l&agrave;m cầu nối. Mỗi ng&agrave;y, c&oacute; h&agrave;ng chục triệu người tương t&aacute;c với nhau th&ocirc;ng qua c&aacute;c điện thoại th&ocirc;ng minh v&agrave; m&aacute;y t&iacute;nh bảng x&aacute;ch tay, trao đổi v&ocirc; số h&agrave;ng h&oacute;a v&agrave; dịch vụ dựa tr&ecirc;n sự đ&aacute;nh gi&aacute; v&agrave; tin tưởng của những người d&ugrave;ng trước đ&oacute;. Trong khoảng năm năm qua, những ứng dụng chia sẻ như Uber, Airbnb (Mỹ) hay Didi Kuaidi (Trung Quốc) đ&atilde; tạo n&ecirc;n t&ecirc;n tuổi như những nh&agrave; ti&ecirc;n phong đầy th&agrave;nh c&ocirc;ng trong lĩnh vực kinh doanh n&agrave;y. Uber v&agrave; Airbnb đ&atilde; trở th&agrave;nh hai &ldquo;con g&agrave; đẻ trứng v&agrave;ng&rdquo; của l&agrave;ng ứng dụng c&ocirc;ng nghệ Mỹ, theo tạp ch&iacute; kinh tế Jacobin. Trong năm 2015, lượng lợi nhuận thu về của hai c&ocirc;ng ty n&agrave;y đ&atilde; đạt đến mức &ldquo;đi&ecirc;n rồ&rdquo;. Ứng dụng chia sẻ chỗ ở Airbnb giờ đ&acirc;y trị gi&aacute; đến 25 tỉ USD, l&agrave; đối thủ trực tiếp của nhiều chuỗi kh&aacute;ch sạn của Mỹ. Trong khi đ&oacute;, ứng dụng chia sẻ vận tải h&agrave;nh kh&aacute;ch Uber đ&atilde; được định gi&aacute; đến 65 tỉ USD, tương đương c&aacute;c h&atilde;ng xe &ocirc; t&ocirc; lớn của Mỹ. Chỉ t&iacute;nh ri&ecirc;ng năm 2015, Airbnb đ&atilde; tăng th&ecirc;m 1,6 tỉ USD để đầu tư v&agrave;o hoạt động nghi&ecirc;n cứu v&agrave; kinh doanh, n&acirc;ng tổng mức đầu tư l&ecirc;n mốc 2 tỉ USD. Con số n&agrave;y đối với Uber l&agrave; 6,5 tỉ USD. Cả hai doanh nghiệp n&agrave;y đ&atilde; bỏ xa những ứng dụng khởi nghiệp kh&aacute;c tại Mỹ cũng dựa v&agrave;o mạng. M&ocirc; h&igrave;nh kinh doanh chia sẻ n&agrave;y cũng đang nở rộ tại Trung Quốc. Theo trang tin ECNS (Trung Quốc), quy m&ocirc; của thị trường &ldquo;kinh tế chia sẻ&rdquo; tại nước n&agrave;y trong năm 2015 đ&atilde; vượt ngưỡng 1.000 tỉ nh&acirc;n d&acirc;n tệ (hơn 152,8 tỉ USD). C&ograve;n tại Mỹ, tổng gi&aacute; trị c&aacute;c c&ocirc;ng ty tham gia loại h&igrave;nh &ldquo;kinh tế chia sẻ&rdquo; đ&atilde; đạt tr&ecirc;n 463,9 tỉ USD, chiếm hơn 3% GDP nước Mỹ. Tờ Huffington Post đ&aacute;nh gi&aacute; loại h&igrave;nh &ldquo;kinh tế chia sẻ&rdquo; n&agrave;y kh&ocirc;ng c&ograve;n l&agrave; một thị trường ng&aacute;ch hay một hiện tượng nhất thời m&agrave; l&agrave; tương lai của m&ocirc;i trường kinh doanh to&agrave;n cầu. M&ocirc; h&igrave;nh n&agrave;y đ&atilde; tự th&agrave;nh h&igrave;nh v&agrave; ph&aacute;t triển mạnh mẽ ngay từ khi nền kinh tế nước Mỹ v&agrave; thế giới vẫn c&ograve;n đang chật vật phục hồi sau khủng hoảng kinh tế. V&agrave; bất chấp tốc độ tăng trưởng kinh tế thế giới hiện đang c&oacute; dấu hiệu chững lại, c&aacute;c chuy&ecirc;n gia đ&aacute;nh gi&aacute; &ldquo;kinh tế chia sẻ&rdquo; vẫn sẽ ph&aacute;t triển mạnh mẽ. Ng&acirc;n h&agrave;ng Thụy Sĩ Credit Suisse dự đo&aacute;n tổng gi&aacute; trị giao dịch của những kh&aacute;ch h&agrave;ng tham gia chia sẻ trong năm 2025 sẽ đạt mức 335 tỉ USD.\r\n\r\nGiới trẻ l&agrave; chất kết d&iacute;nh để nền kinh tế chia sẻ hoạt động. (Ảnh minh họa) Qu&aacute; mới để quản l&yacute; Kh&aacute;i niệm &ldquo;kinh tế chia sẻ&rdquo; đang được c&aacute;c doanh nh&acirc;n v&agrave; những người đam m&ecirc; khởi nghiệp tại nhiều nước xem l&agrave; &ldquo;g&agrave; đẻ trứng v&agrave;ng&rdquo; mới cho c&aacute;c nền kinh tế. Ma Huateng, Chủ tịch v&agrave; CEO của quỹ đầu tư Tencent Holdings, đ&atilde; tr&igrave;nh b&agrave;y vấn đề ph&aacute;t triển m&ocirc;i trường cho hoạt động kinh doanh chia sẻ tại kỳ họp Quốc hội của Trung Quốc. Theo tờ T&acirc;n Hoa x&atilde;, Bắc Kinh cũng c&oacute; &yacute; định biến m&ocirc; h&igrave;nh kinh doanh n&agrave;y trở th&agrave;nh đ&ograve;n bẩy mới cho nền kinh tế quốc gia, đặc biệt khi thị trường bất động sản v&agrave; c&aacute;c ng&agrave;nh c&ocirc;ng nghiệp nặng của nước n&agrave;y bắt đầu c&oacute; dấu hiệu chững lại. &ldquo;Kinh tế chia sẻ vẫn c&ograve;n kh&ocirc;ng gian rộng lớn để ph&aacute;t triển tại Trung Quốc&rdquo; - &ocirc;ng Ma Huateng đ&aacute;nh gi&aacute;. &ldquo;Thế nhưng c&aacute;ch gi&aacute;m s&aacute;t ng&agrave;nh kinh doanh n&agrave;y vẫn y hệt c&aacute;ch quản l&yacute; c&aacute;c ng&agrave;nh nghề truyền thống, điều n&agrave;y l&agrave;m hạn chế ph&aacute;t triển v&agrave; s&aacute;ng tạo&rdquo;. Nhưng tr&aacute;i với giới doanh nh&acirc;n, &ldquo;kinh tế chia sẻ&rdquo; đang l&agrave;m những nh&agrave; quản l&yacute; ch&iacute;nh s&aacute;ch đau đầu. Những th&aacute;ch thức mới đặt ra về khung ph&aacute;p l&yacute;, sự &ldquo;bất c&ocirc;ng&rdquo; đối với c&aacute;c m&ocirc; h&igrave;nh dịch vụ truyền thống khiến c&aacute;c cơ quan quản l&yacute; kinh doanh c&aacute;c nước bối rối. C&aacute;c nghiệp đo&agrave;n taxi tại nhiều nước từ &Acirc;u đến &Aacute; đều đ&atilde; nhiều lần tổ chức biểu t&igrave;nh đ&ograve;i cấm Uber được hợp ph&aacute;p h&oacute;a tại nước m&igrave;nh. Nhiều chuỗi nh&agrave; h&agrave;ng v&agrave; h&atilde;ng du lịch tại Mỹ đ&atilde; y&ecirc;u cầu cơ quan chức năng kiểm tra lại c&aacute;ch thức Airbnb đ&aacute;nh gi&aacute; người chia sẻ nơi ở xem c&oacute; hiện tượng gian lận số liệu để h&uacute;t kh&aacute;ch h&agrave;ng hay kh&ocirc;ng. Việc kiểm so&aacute;t minh bạch th&ocirc;ng tin của c&aacute;c doanh nghiệp n&agrave;y cũng l&agrave; một vấn đề đang l&agrave;m kh&oacute; nh&agrave; quản l&yacute;, theo tạp ch&iacute; Jacobin. Uber v&agrave; Airbnb đ&atilde; kh&ocirc;n kh&eacute;o chọn lọc trong kho dữ kiện khổng lồ thu thập từ kh&aacute;ch h&agrave;ng những th&ocirc;ng tin c&oacute; lợi để l&agrave;m c&ocirc;ng cụ &ldquo;t&ocirc; hồng&rdquo; h&igrave;nh ảnh những c&ocirc;ng ty n&agrave;y. Năm 2014, Uber đ&atilde; tuy&ecirc;n bố rằng c&aacute;c t&agrave;i xế của họ tại TP New York c&oacute; thể kiếm được khoản tiền l&ecirc;n đến 90.000 USD trong một năm. C&acirc;u chuyện n&agrave;y đ&atilde; g&acirc;y sức h&uacute;t tr&ecirc;n to&agrave;n nước Mỹ, tăng số lượng người đăng k&yacute; l&agrave;m t&agrave;i xế cho Uber v&agrave; mở rộng mạng lưới hoạt động cho c&ocirc;ng ty n&agrave;y. Tuy nhi&ecirc;n, theo tạp ch&iacute; Jacobin, khi nh&agrave; b&aacute;o Alison Griswold bắt đầu điều tra, đa số t&agrave;i xế Uber kh&ocirc;ng thể đạt đến được con số thu nhập khủng như Uber tuy&ecirc;n bố. Điều m&agrave; Uber đ&atilde; l&agrave;m kh&ocirc;ng phải l&agrave; n&oacute;i dối m&agrave; l&agrave; n&oacute;i chọn lọc chỉ những điều tốt để n&oacute;i về m&igrave;nh. Nhiều th&ocirc;ng tin c&oacute; t&iacute;nh chất tương tự đ&atilde; được c&aacute;c c&ocirc;ng ty như Uber v&agrave; Airbnb c&ocirc;ng bố. Họ l&agrave;m được điều n&agrave;y l&agrave; do c&aacute;c c&ocirc;ng ty nắm ri&ecirc;ng trong tay cơ sở dữ liệu của kh&aacute;ch h&agrave;ng m&agrave; kh&ocirc;ng c&oacute; bất cứ cơ quan n&agrave;o kh&aacute;c c&oacute; thể đụng đến được. Kh&ocirc;ng chỉ thế, những c&ocirc;ng ty tham gia &ldquo;kinh tế chia sẻ&rdquo; hiện vẫn duy tr&igrave; danh nghĩa l&agrave; c&ocirc;ng ty tư nh&acirc;n. Điều n&agrave;y cho ph&eacute;p c&aacute;c c&ocirc;ng ty như Uber v&agrave; Airbnb linh động điều chỉnh, kh&ocirc;ng phải b&aacute;o c&aacute;o số liệu với cổ đ&ocirc;ng, kh&ocirc;ng bị kiểm to&aacute;n độc lập v&agrave; kh&ocirc;ng ai c&oacute; thể gi&aacute;m s&aacute;t t&agrave;i khoản của họ. Uber cũng đ&atilde; từng th&agrave;nh lập c&ocirc;ng ty con tại H&agrave; Lan - Uber International C.V. Họ đ&atilde; chuyển quyền sở hữu c&aacute;c chi nh&aacute;nh tại c&aacute;c nước về c&ocirc;ng ty n&agrave;y khiến mọi nguồn thu b&ecirc;n ngo&agrave;i nước Mỹ chủ yếu chảy về H&agrave; Lan v&agrave; tr&aacute;nh được hệ thống thuế của Mỹ. Những g&igrave; Uber đ&atilde; l&agrave;m thật ra cũng kh&ocirc;ng phải phương c&aacute;ch mới. Những g&atilde; khổng lồ l&agrave;ng c&ocirc;ng nghệ như Google v&agrave; Facebook đều đang thực hiện, theo tạp ch&iacute; Fortune. Tuy nhi&ecirc;n, với sự linh động của một c&ocirc;ng ty tư nh&acirc;n, c&aacute;c chuy&ecirc;n gia về ch&iacute;nh s&aacute;ch thuế nhận định chiến thuật n&eacute; thuế m&agrave; Uber l&agrave; gần như ho&agrave;n hảo. M&ocirc; h&igrave;nh kinh doanh dựa tr&ecirc;n dữ liệu lớn (big data) qu&aacute; mới để c&oacute; c&aacute;ch quản l&yacute; th&iacute;ch hợp, thay cho những biện ph&aacute;p kiểm to&aacute;n truyền thống. Gi&aacute;m đốc c&aacute;c c&ocirc;ng ty n&agrave;y vẫn tiếp tục đưa ra những tuy&ecirc;n bố m&agrave; người kh&aacute;c sẽ mất rất nhiều thời gian để kiểm chứng dựa tr&ecirc;n điều tra độc lập. V&agrave; đến khi sự thật được đưa ra th&igrave; mọi chuyện đ&atilde; xong xu&ocirc;i. Sinh vi&ecirc;n: Ch&igrave;a kh&oacute;a của &ldquo;kinh tế chia sẻ&rdquo; Theo bản b&aacute;o c&aacute;o &ldquo;Nguồn lực lao động 1099&rdquo;, c&ocirc;ng bố năm 2015 bởi ĐH Standford, 39% những người tham gia l&agrave;m việc trong nền &ldquo;kinh tế chia sẻ&rdquo; tại Mỹ c&oacute; độ tuổi 18-24. Nếu cộng lu&ocirc;n cả những người l&agrave;m việc trong độ tuổi 25-34, tỉ lệ những người trẻ tham gia hoạt động trong &ldquo;kinh tế chia sẻ&rdquo; l&ecirc;n đến 68%. Con số n&agrave;y tương đương 1/3 tổng số người trong độ tuổi lao động tại Mỹ, theo Huffington Post. Quản l&yacute; vi&ecirc;n chương tr&igrave;nh tại Microsoft, Krish Ramineri, nhận định: &ldquo;Kh&ocirc;ng kể đến những hứa hẹn v&agrave; cả độ n&oacute;ng của nền &ldquo;kinh tế chia sẻ&rdquo;, ch&iacute;nh những sinh vi&ecirc;n l&agrave; chất keo kết d&iacute;nh tương lai của m&ocirc;i trường kinh doanh mới n&agrave;y&rdquo;. Viktor Fenyves, đồng s&aacute;ng lập của dịch vụ trao đổi h&agrave;ng h&oacute;a Swoppler, cho biết: &ldquo;Sinh vi&ecirc;n nắm trong tay nhiều loại h&agrave;ng h&oacute;a, c&aacute;i họ thiếu l&agrave; tiền mặt. Nền &ldquo;kinh tế chia sẻ&rdquo; cho họ quyền được đặt gi&aacute; trị cho những t&agrave;i sản m&agrave; họ c&oacute; hoặc muốn c&oacute;, từ s&aacute;ch gi&aacute;o khoa, &acirc;m nhạc đến vận chuyển hay dạy k&egrave;m&rdquo;. Nguồn: doanhnhan.net',12,'kinh_doanh_chia_se_1.jpg','kinh_doanh_chia_se_1.jpg',NULL,NULL,1,'2017-03-29 21:09:04','root','2017-03-29 21:12:07','root',0),(4,'6 bài học thành công từ các nữ doanh nhân khởi nghiệp','6-bai-hoc-thanh-cong-tu-cac-nu-doanh-nhan-khoi-nghiep','Bài học thành công','6 bài học thành công từ các nữ doanh nhân khởi nghiệp','6 bài học thành công từ các nữ doanh nhân khởi nghiệp','Theo dữ liệu từ Bloomberg cũng như một nghi&ecirc;n cứu của Lesa Mitchell v&agrave; Vivek Wadhwa, những dự &aacute;n khởi nghiệp được th&agrave;nh lập bởi phụ nữ h&oacute;a ra lại hay c&oacute; kết quả tốt hơn đ&aacute;ng kể so với c&aacute;c c&ocirc;ng ty của nam giới.','\nTheo đ&oacute;, những c&ocirc;ng ty n&agrave;y thường đạt được lợi tức đầu tư (ROI) cao hơn 35%, cũng như c&oacute; doanh thu cao hơn khoảng 12%. Mặc d&ugrave; vậy, c&oacute; một thực tế l&agrave; phụ nữ gặp nhiều kh&oacute; khăn hơn khi huy động vốn đầu tư mạo hiểm, v&agrave; kh&ocirc;ng được nắm giữ c&aacute;c vị tr&iacute; quan trọng như nam giới.\n\r\n\r\n\nTuy nhi&ecirc;n, x&atilde; hội đang chứng kiến những sự thay đổi lớn. Sheryl Sandberg (COO của Facebook) v&agrave; Sophia Amarosa (nh&agrave; s&aacute;ng lập NastyGal) l&agrave; điển h&igrave;nh cho thế hệ những nh&agrave; l&atilde;nh đạo mới.\n\r\n\r\n\nAndrew Thomas (nh&agrave; đồng s&aacute;ng lập c&ocirc;ng ty c&ocirc;ng nghệ an ninh SkyBell) đ&atilde; phỏng vấn 6 nữ doanh nh&acirc;n khởi nghiệp suất sắc v&agrave; r&uacute;t ra c&aacute;c b&agrave;i học th&agrave;nh c&ocirc;ng qu&yacute; gi&aacute; từ họ.\n\r\n\r\n\n1. Đừng ngại gi&agrave;nh lấy cơ hội (Payal Kadakia)\n\r\n\r\n\nPayal Kadakia l&agrave; nh&agrave; đồng s&aacute;ng lập ki&ecirc;m CEO của c&ocirc;ng ty dịch vụ tập gym ClassPass. C&ocirc; đ&atilde; từng c&oacute; v&agrave;i lần khởi nghiệp trước khi s&aacute;ng lập n&ecirc;n ClassPass lớn mạnh của ng&agrave;y h&ocirc;m nay, với tổng số vốn đ&atilde; huy động l&agrave; hơn 84 triệu USD trong v&ograve;ng chưa tới 3 năm.\n\r\n\r\n\nKadakia t&acirc;m sự: &quot;Đừng e sợ thất bại v&igrave; th&agrave;nh c&ocirc;ng thường đi đ&ocirc;i với thất bại. T&ocirc;i đ&atilde; phải trải qua v&agrave;i lần sai lầm trước khi l&agrave;m đ&uacute;ng mọi việc. T&ocirc;i đ&atilde; học được nhiều từ những sai lầm đ&oacute; v&agrave; x&acirc;y dựng việc kinh doanh của m&igrave;nh tốt hơn&quot;.\n\r\n\r\n\nChia sẻ về một quyết định kh&oacute; khăn nhưng đ&atilde; đem lại nhiều th&agrave;nh c&ocirc;ng, Kadakia cho biết: &quot;T&ocirc;i đ&atilde; y&ecirc;u cầu nh&oacute;m của m&igrave;nh thay đổi ho&agrave;n to&agrave;n m&ocirc; h&igrave;nh kinh doanh, d&ugrave; l&uacute;c đ&oacute; mọi việc đang su&ocirc;n sẻ. Nhưng t&ocirc;i biết m&igrave;nh đ&atilde; c&oacute; một quyết định đ&uacute;ng đắn, v&igrave; ch&uacute;ng t&ocirc;i vẫn chưa l&agrave;m được nhiệm vụ đ&atilde; đề ra, v&agrave; t&ocirc;i phải lường trước tầm nh&igrave;n d&agrave;i hạn hơn. Thật may mắn, quyết định đ&oacute; đ&atilde; mang lại th&agrave;nh c&ocirc;ng&quot;.\n\r\n2. Ph&aacute;t huy sự s&aacute;ng tạo (Nicole Shariat Farb)\r\n\r\n\r\n\nSau khi c&oacute; một sự nghiệp th&agrave;nh c&ocirc;ng rực rỡ trong lĩnh vực ng&acirc;n h&agrave;ng đầu tư, Nicole Shariat Farb đ&atilde; lập n&ecirc;n Darby Smart - một dịch vụ trực tuyến kết nối những nh&agrave; thiết kế mới nổi trong lĩnh vực thời trang v&agrave; đồ nội thất với người ti&ecirc;u d&ugrave;ng.\n\r\n\r\n\nTrong vai tr&ograve; CEO, Nicole lu&ocirc;n nắm r&otilde; c&aacute;c dữ liệu v&agrave; con số của c&ocirc;ng ty. Tuy nhi&ecirc;n, c&ocirc; cho rằng b&iacute; quyết th&agrave;nh c&ocirc;ng của m&igrave;nh ch&iacute;nh l&agrave; biết ph&aacute;t huy khả năng s&aacute;ng tạo để mang đến sự h&agrave;i h&agrave;i l&ograve;ng cho kh&aacute;ch h&agrave;ng.\n\r\n\r\n\n&quot;H&atilde;y pha trộn sự s&aacute;ng tạo với đầu &oacute;c ph&acirc;n t&iacute;ch. Dữ liệu c&oacute; sức mạnh đến kh&ocirc;ng ngờ. N&oacute; gi&uacute;p ch&uacute;ng ta đưa ra sự lựa chọn đ&uacute;ng đắn mỗi ng&agrave;y v&agrave; t&ugrave;y biến trải nghiệm cho từng kh&aacute;ch h&agrave;ng. Nhưng s&aacute;ng tạo cũng cũng c&oacute; sức mạnh tương tự. H&atilde;y nghĩ về những c&aacute;ch l&agrave;m h&agrave;i l&ograve;ng kh&aacute;ch h&agrave;ng của bạn. H&atilde;y mang ph&eacute;p thuật v&agrave;o cuộc sống của họ. Dữ liệu kh&ocirc;ng cho ta biết c&aacute;ch l&agrave;m điều n&agrave;y nhưng bản năng s&aacute;ng tạo sẽ m&aacute;ch bảo bạn&quot;.\n\r\n\r\n\nAndrew Thomas đ&atilde; hỏi Shariat Farb liệu c&oacute; b&iacute; quyết ngắn gọn n&agrave;o để trở th&agrave;nh một nh&agrave; s&aacute;ng lập tốt hơn, v&agrave; được trả lời: &quot;H&atilde;y cho một th&agrave;nh vi&ecirc;n trong đội một thứ m&agrave; bạn đang sở hữu. Nghĩa l&agrave; n&ecirc;n trao quyền cho họ, v&agrave; mở ra cho m&igrave;nh nhiều thời gian hơn để vạch n&ecirc;n c&aacute;c chiến lược. Điều đ&oacute; sẽ gi&uacute;p c&ocirc;ng ty hoạt động hiệu quả hơn&quot;.\n\r\n3. Biết m&igrave;nh đang l&agrave;m g&igrave; v&agrave; l&yacute; do v&igrave; sao (Danae Ringelmann)\r\n\r\n\r\n\nDanae Ringelmann l&agrave; nh&agrave; đồng s&aacute;ng lập dịch vụ gọi vốn cộng đồng (crowdfunding) Indiegogo. Kể từ năm 2008, Indiegogo đ&atilde; gi&uacute;p nhiều doanh nh&acirc;n khởi nghiệp v&agrave; nghệ sĩ gọi vốn được hơn 800 triệu USD cũng như gi&uacute;p họ loại bỏ nhiều r&agrave;o cản giấy tờ phức tạp.\n\r\n\r\n\nNếu bạn hiểu được những kh&oacute; khăn m&agrave; Ringelmann đ&atilde; phải vượt qua trong l&uacute;c x&acirc;y dựng Indiegogo th&igrave; kh&ocirc;ng c&oacute; g&igrave; phải ngạc nhi&ecirc;n khi những lời khuy&ecirc;n của c&ocirc; đều xoay quanh việc nắm r&otilde; mục đ&iacute;ch v&agrave; động lực bản th&acirc;n.\n\r\n\r\n\n&quot;Điều duy nhất bạn c&oacute; thể chắc chắn về qu&aacute; tr&igrave;nh khởi nghiệp l&agrave; tại sao m&igrave;nh lại chọn h&agrave;nh tr&igrave;nh n&agrave;y, do vậy h&atilde;y đảm bảo l&agrave; bạn hiểu r&otilde; n&oacute;. H&atilde;y lặp đi lặp lại điều đ&oacute; v&agrave;o mỗi buổi s&aacute;ng khi bạn thức dậy. Mỗi khi bạn gặp những th&aacute;ch thức tưởng chừng kh&ocirc;ng thể vượt qua, bằng c&aacute;ch n&agrave;o đ&oacute; n&oacute; sẽ dẫn lối cho bạn vượt qua&quot;, c&ocirc; n&oacute;i.\n\r\n4. X&ocirc;ng x&aacute;o, x&ocirc;ng x&aacute;o nữa, x&ocirc;ng x&aacute;o m&atilde;i (Jenny Fielding)\r\n\r\n\r\n\nCon đường khởi nghiệp th&agrave;nh c&ocirc;ng sẽ kh&ocirc;ng bao giờ lộng lẫy như những g&igrave; ch&uacute;ng ta hay thấy tr&ecirc;n b&aacute;o ch&iacute; v&agrave; phim ảnh. Jenny Fielding - Gi&aacute;m đốc quỹ đầu tư mạo hiểm Techstars - chia sẻ kinh nghiệm x&acirc;y dựng Switch - Mobile (một c&ocirc;ng ty dịch vụ điện thoại qua internet (VoIP) m&agrave; c&ocirc; đ&atilde; b&aacute;n lại hồi năm 2009):\n\r\n\r\n\n&quot;T&ocirc;i bắt đầu c&ocirc;ng ty của m&igrave;nh ở New York v&agrave;o năm 2006, l&uacute;c m&agrave; m&ocirc;i trường khởi nghiệp ở đ&oacute; c&ograve;n kh&aacute; th&ocirc; sơ. V&igrave; thế, t&ocirc;i đ&atilde; phải mất nhiều thời gian để tự học mọi thứ v&agrave; tự tạo n&ecirc;n c&aacute;c quy tắc cho m&igrave;nh. T&ocirc;i đ&atilde; mắc phải mọi sai lầm c&oacute; thể trong qu&aacute; tr&igrave;nh khởi nghiệp. Tuy nhi&ecirc;n, t&ocirc;i đ&atilde; kh&ocirc;ng đầu h&agrave;ng. T&ocirc;i dẫm l&ecirc;n mọi kh&oacute; khăn v&agrave; cống hiến hết sức m&igrave;nh cho tới khi th&agrave;nh c&ocirc;ng&quot;.\n\r\n\r\n\n5. Đừng đ&aacute;nh mất sự ch&uacute; &yacute; (Nina Ojeda)\n\r\n\r\n&nbsp;\r\n\nDoanh nh&acirc;n khởi nghiệp lu&ocirc;n dễ bị sao l&atilde;ng bởi h&agrave;ng loạt c&aacute;c th&ocirc;ng tin về đối thủ cạnh tranh, c&aacute;c kỳ vọng bị thổi phồng, những tr&agrave;o lưu nhất thời&hellip; Ch&uacute;ng c&oacute; thể khiến bạn xa rời điều cần ch&uacute; t&acirc;m nhất &ndash; c&ocirc;ng việc kinh doanh của ch&iacute;nh m&igrave;nh.\n\r\n\r\n\nNina Ojeda - nh&agrave; s&aacute;ng lập ki&ecirc;m CEO của dịch vụ PR The Avenue West - gửi lời nhắc nhở: &ldquo;Bạn rất dễ bị mất tập trung khi khởi nghiệp, v&agrave; hay thấy &ldquo;cỏ xanh hơn ở sườn đồi b&ecirc;n kia&rdquo;, rồi lại sinh ra mơ mộng&rdquo;.\n\r\n\r\n\nOjeda khuy&ecirc;n: &ldquo;Đừng cạnh tranh với ai cả m&agrave; h&atilde;y cạnh tranh với bản th&acirc;n m&igrave;nh. T&ocirc;i thấy qu&aacute; nhiều nh&agrave; s&aacute;ng lập bị &aacute;m ảnh bởi đối thủ cạnh tranh. Khoảnh khắc bạn bắt đầu tập trung v&agrave;o người kh&aacute;c l&agrave; l&uacute;c bạn đ&atilde; rời mắt khỏi quả b&oacute;ng ngay trong ch&acirc;n m&igrave;nh. Điều đ&oacute; kh&ocirc;ng đem lại lợi &iacute;ch g&igrave; cả&rdquo;.\n\r\n\r\n\n6. Ho&agrave;n th&agrave;nh tốt hơn ho&agrave;n hảo (Shama Hyder)\n\r\n\r\n\nC&oacute; một c&acirc;u ch&acirc;m ng&ocirc;n m&agrave; c&aacute;c doanh nh&acirc;n khởi nghiệp hay n&oacute;i: &ldquo;Perfect is the enemy of good&rdquo; (&ldquo;Sự ho&agrave;n hảo l&agrave; kẻ th&ugrave; của kết quả tốt&rdquo;), nhưng lại rất &iacute;t người thực sự l&agrave;m theo được điều n&agrave;y.\n\r\n\r\n\nShama Hyder - nh&agrave; s&aacute;ng lập ki&ecirc;m CEO của Tập đo&agrave;n marketing kỹ thuật số The Marketing Zen - nhắc nhở rằng, những thứ lớn lao đều bắt đầu từ c&aacute;c bước đi chậm m&agrave; chắc: &ldquo;Bạn sẽ kh&ocirc;ng bao giờ đạt được sự ho&agrave;n hảo, thay v&agrave;o đ&oacute; h&atilde;y theo đuổi sự tiến bộ từng ng&agrave;y.&rdquo;\n\r\n\r\n\nHyder đ&atilde; x&acirc;y dựng sự th&agrave;nh c&ocirc;ng của c&ocirc; bằng c&aacute;ch đối xử tốt với mọi người v&agrave; duy tr&igrave; những mối quan hệ hữu hảo. &ldquo;H&atilde;y lu&ocirc;n đối xử với nh&acirc;n vi&ecirc;n, nh&agrave; cung cấ[ v&agrave; kh&aacute;ch h&agrave;ng bằng sự t&ocirc;n trọng tột bậc. Thậm ch&iacute; nếu c&oacute; mối quan hệ n&agrave;o kh&ocirc;ng đem lại lợi &iacute;ch g&igrave; th&igrave; cũng đừng vội ph&aacute; hủy n&oacute;.&rdquo;\n\r\nNguồn: B&aacute;o Doanh Nh&acirc;n S&agrave;i G&ograve;n\r\n\r\n\r\n&nbsp;',0,'6_bai_hoc_thanh_cong_tu_cac_nu_doanh_nhan_khoi_nghiep_3.jpg','6_bai_hoc_thanh_cong_tu_cac_nu_doanh_nhan_khoi_nghiep_3.jpg',NULL,NULL,1,'2017-03-29 21:18:29','root',NULL,NULL,0),(5,'Bài học khởi nghiệp xương máu từ tỷ phú Jack Ma','bai-hoc-khoi-nghiep-xuong-mau-tu-ty-phu-jack-ma','Jack Ma','Phần mềm bán hàng, Monger','Bài học khởi nghiệp xương máu từ tỷ phú Jack Ma','Thất bại khi khởi nghiệp l&agrave; điều thường xuy&ecirc;n xảy ra. Dưới đ&acirc;y l&agrave; 5 lời khuy&ecirc;n d&agrave;nh cho c&aacute;c nh&agrave; s&aacute;ng lập trẻ từ tỷ ph&uacute; Jack Ma.','Jack Ma l&agrave; một trong những doanh nh&acirc;n c&ocirc;ng nghệ th&agrave;nh c&ocirc;ng nhất của Trung Quốc. S&aacute;ng lập v&agrave; điều h&agrave;nh Alibaba Group, Jack Ma trở th&agrave;nh tỷ ph&uacute; gi&agrave;u nhất Trung Quốc v&agrave; xếp thứ 70 của thế giới. C&acirc;u chuyện khởi nghiệp th&agrave;nh c&ocirc;ng của Jack Ma trở th&agrave;nh b&agrave;i học cho bất cứ ai muốn th&agrave;nh c&ocirc;ng.\r\n\r\n\r\n\n1. Sử dụng bản năng của bạn\n\r\n\r\n\nKhi điều h&agrave;nh Alibaba, Jack Ma kh&ocirc;ng &iacute;t lần sử dụng bản năng để đưa ra c&aacute;c quyết định quan trọng. Tham khảo nhiều &yacute; kiến c&oacute; thể gi&uacute;p bạn nắm r&otilde; t&igrave;nh h&igrave;nh hơn, nhưng đ&ocirc;i khi n&oacute; khiến bạn bối rối v&igrave; nhiễu th&ocirc;ng tin. Dựa v&agrave;o trực gi&aacute;c v&agrave; kiến thức của ch&iacute;nh bản th&acirc;n để kh&ocirc;ng lạc lối.\n\r\n\r\n\n2. Tầm nh&igrave;n xa\n\r\n\r\n\nJack Ma lu&ocirc;n t&igrave;m kiếm con đường d&agrave;i hơi cho doanh nghiệp. Thậm ch&iacute;, nếu m&ocirc; h&igrave;nh kinh doanh hiện tại đang th&agrave;nh c&ocirc;ng, &ocirc;ng cũng sẵn s&agrave;ng đổi mới n&oacute; nếu cần thiết v&igrave; mục ti&ecirc;u l&acirc;u d&agrave;i.\n\r\n\r\n\n3. Tập trung v&agrave;o nhiệm vụ v&agrave; giấc mơ ban đầu\n\r\n\r\n\nKh&ocirc;ng chỉ Jack Ma, m&agrave; cả đội ngũ s&aacute;ng lập Alibaba đều tập trung theo đuổi đến c&ugrave;ng giấc mơ của họ. Mọi hoạt động của họ đều tập trung v&agrave;o mục ti&ecirc;u d&agrave;i hơi v&agrave; lợi &iacute;ch l&acirc;u d&agrave;i.\n\r\n\r\n\n4. Đặt bản th&acirc;n v&agrave;o c&aacute;i giới hạn mới\n\r\n\r\n\nJack Ma lu&ocirc;n đặt k&igrave; vọng cao v&agrave;o bản th&acirc;n v&agrave; cả đồng đội. Bạn sẽ kh&ocirc;ng bao giờ biết bạn c&oacute; thể l&agrave;m được điều g&igrave; khi chưa &eacute;p m&igrave;nh đến giới hạn. Sự kỳ vọng v&agrave; nỗ lực hết sức sẽ cho bạn th&agrave;nh tựu kh&ocirc;ng ngờ.\n\r\n\r\n\n5. Biết m&igrave;nh biết ta\n\r\n\r\n\nKh&aacute;ch h&agrave;ng l&agrave; trung t&acirc;m của mọi kế hoạch kinh doanh, bởi họ ch&iacute;nh l&agrave; người trả tiền cho doanh nghiệp của bạn. Sản phẩm của doanh nghiệp phải dựa tr&ecirc;n nhu cầu của kh&aacute;ch h&agrave;ng thay v&igrave; nhu cầu của nền c&ocirc;ng nghiệp. Kế hoạch kinh doanh chỉ th&agrave;nh c&ocirc;ng nếu bạn nhắm tr&uacute;ng nhu cầu của kh&aacute;ch h&agrave;ng v&agrave; phục vụ họ tốt nhất.\n\r\n\r\n\n6. Lắng nghe lời khuy&ecirc;n của nh&agrave; đầu tư, nhưng h&atilde;y ghi nhớ: họ kh&ocirc;ng phải người chịu tr&aacute;ch nhiệm\n\r\n\r\n\nBằng c&aacute;ch lấy kh&aacute;ch h&agrave;ng l&agrave; trung t&acirc;m, bạn c&oacute; thể tạo dựng một doanh nghiệp bền vững. Khi c&aacute;c c&ocirc;ng ty tập trung k&ecirc;u gọi nh&agrave; đầu tư, họ c&oacute; thể may mắn thu h&uacute;t được nguồn vốn lớn nhưng cũng c&oacute; thể suy sụp. Kh&aacute;ch h&agrave;ng rất tinh tường, họ sẽ nhận ra gi&aacute; trị m&agrave; doanh nghiệp thực sự đầu tư.\n\r\n\r\n\nNếu gi&aacute;m đốc điều h&agrave;nh được v&iacute; l&agrave; cha mẹ của c&ocirc;ng ty th&igrave; c&aacute;c nh&agrave; đầu tư c&oacute; thể v&iacute; l&agrave; ch&uacute; b&aacute;c. Họ c&oacute; thể đưa ra g&oacute;p &yacute; như một th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh bạn, nhưng họ kh&ocirc;ng phải chịu tr&aacute;ch nhiệm nếu ph&aacute;t sinh vấn đề.\n\r\n\r\n\n7. Khi bạn th&agrave;nh c&ocirc;ng, bạn sẽ c&oacute; tiền\n\r\n\r\n\nNhiều người bắt đầu kinh doanh với mong muốn kiếm tiền nhiều hơn. Nhưng thực tế, tiền chỉ l&agrave; sản phẩm phụ của th&agrave;nh c&ocirc;ng. Một số doanh nghiệp c&oacute; thể may mắn v&agrave; thu lợi nhuận cao trong thời gian ngắn. Những doanh nh&acirc;n thực sự đo lường sự th&agrave;nh c&ocirc;ng của họ dựa tr&ecirc;n những t&aacute;c động của doanh nghiệp đối với x&atilde; hội. Mọi người đều muốn c&oacute; nhiều tiền hơn, nhưng đ&oacute; kh&ocirc;ng phải mục ti&ecirc;u cuối c&ugrave;ng. Khi bạn th&agrave;nh c&ocirc;ng, tiền sẽ tự động t&igrave;m đến bạn.\n\r\n\r\n\n8. D&ugrave;ng thế mạnh của đối thủ để đ&aacute;nh bại họ\n\r\n\r\n\nEbay l&agrave; một trong những đối thủ cạnh tranh lớn nhất của Alibaba. Jack Ma biết rằng &ocirc;ng kh&ocirc;ng đủ tiềm lực t&agrave;i ch&iacute;nh để chạy đua marketing với Ebay. V&igrave; vậy, Alibaba đ&atilde; sử dụng ch&iacute;nh nguồn lực của Ebay để PR cho doanh nghiệp.\n\r\n\r\n\nMỗi khi Ebay n&oacute;i về c&aacute;ch họ đang đ&aacute;nh bại Alibaba, c&aacute;c kh&aacute;ch h&agrave;ng của Ebay cũng gi&aacute;n tiếp biết đến Alibaba v&agrave; t&ograve; m&ograve; t&igrave;m hiểu về c&ocirc;ng ty n&agrave;y. Nhờ đ&oacute;, mức độ nhận diện doanh nghiệp của Alibaba lại tăng th&ecirc;m.\n\r\n\r\n\n9. Thiết lập c&aacute;c mục ti&ecirc;u t&aacute;o bạo\n\r\n\r\n\nJack Ma lu&ocirc;n nhắc nhở tầm nh&igrave;n chiến lược trong c&aacute;c cuộc họp: Alibaba sẽ trở th&agrave;nh 1 trong 10 website lớn nhất thế giới v&agrave; doanh nghiệp c&oacute; thể bền vững tr&ecirc;n 103 năm. Nếu kh&ocirc;ng c&oacute; tầm nh&igrave;n chiến lược, hiếm người c&oacute; thể đạt được th&agrave;nh c&ocirc;ng thực sự. Th&agrave;nh tựu rực rỡ kh&ocirc;ng thể trở th&agrave;nh hiện thực nếu bạn kh&ocirc;ng đặt ra mục ti&ecirc;u lớn, thậm ch&iacute; vượt qu&aacute; khả năng hiện tại.\n\r\n\r\n\nThiết lập mục ti&ecirc;u t&aacute;o bạo, sở hữu đội ngũ nh&acirc;n vi&ecirc;n t&acirc;m huyết, lu&ocirc;n h&agrave;nh động hướng về mục ti&ecirc;u lớn v&agrave; l&acirc;u d&agrave;i, đ&oacute; l&agrave; những yếu tố gi&uacute;p doanh nghiệp th&agrave;nh c&ocirc;ng v&agrave; vững bền.\n\r\nNguồn: doanhnhan.net',12,'bai_hoc_khoi_nghiep_xuong_mau_tu_ty_phu_jack_ma.jpg','bai_hoc_khoi_nghiep_xuong_mau_tu_ty_phu_jack_ma.jpg',NULL,NULL,1,'2017-03-29 21:21:57','root',NULL,NULL,0),(6,'Làm ít hơn, hoàn thành nhiều hơn, và hạnh phúc hơn','lam-it-hon-hoan-thanh-nhieu-hon-va-hanh-phuc-hon','Làm ít hơn, hoàn thành nhiều hơn, và hạnh phúc hơn','Phần mềm bán hàng, Phần mềm bán cafe','','Mỗi buổi s&aacute;ng thức dậy, bị &ldquo;mắc kẹt&rdquo; v&agrave;o chiếc smartphone với h&agrave;ng loạt những d&ograve;ng th&ocirc;ng b&aacute;o, hay bị ph&acirc;n t&acirc;m bởi qu&aacute; nhiều thiết bị kỹ thuật số v&agrave; kh&ocirc;ng thể ho&agrave;n th&agrave;nh những phần việc quan trọng trong suốt một ng&agrave;y l&agrave;m việc&hellip; l&agrave; t&igrave;nh trạng chung của nhiều nh&agrave; l&atilde;nh đạo.','Theo William Treseder &ndash; chuy&ecirc;n gia của H&atilde;ng tư vấn quản l&yacute; kinh doanh BMNT, c&oacute; 2 th&aacute;ch thức lớn nhất c&oacute; thể &quot;giết chết&quot; khả năng tập trung của c&aacute;c nh&agrave; l&atilde;nh đạo:\r\n\r\n\nThứ nhất l&agrave; bị phiền nhiễu bởi qu&aacute; nhiều thiết bị kết nối. Ng&agrave;y c&agrave;ng nhiều người sử dụng điện thoại th&ocirc;ng minh, m&aacute;y t&iacute;nh bảng, v&agrave; hiện tại ch&uacute;ng ta d&agrave;nh trung b&igrave;nh hơn 12 tiếng mỗi ng&agrave;y cho c&aacute;c phương tiện truyền th&ocirc;ng x&atilde; hội. Sự kết nối li&ecirc;n tục v&agrave; mọi l&uacute;c mọi nơi kh&ocirc;ng cho ph&eacute;p ch&uacute;ng ta t&aacute;i tạo năng lượng v&agrave; sự tập trung.\n\r\n\r\n\nThứ hai l&agrave; bị phụ thuộc qu&aacute; nhiều v&agrave;o c&aacute;c cuộc họp h&agrave;nh v&agrave; cho rằng đ&oacute; l&agrave; một phương thức mặc định để tương t&aacute;c với người kh&aacute;c trong c&ocirc;ng việc. Nhiều nghi&ecirc;n cứu chỉ ra, nh&agrave; l&atilde;nh đạo d&agrave;nh 35 &ndash; 55% thời gian l&agrave;m việc cho họp h&agrave;nh.\n\r\n\r\n\nVượt qua được hai th&aacute;ch thức n&agrave;y, nh&agrave; l&atilde;nh đạo v&agrave; cả doanh nghiệp của họ sẽ được hưởng lợi rất nhiều. Cụ thể, họ v&agrave; cả đội ngũ sẽ tận dụng thời gian tốt hơn, ho&agrave;n th&agrave;nh được nhiều việc hơn v&agrave; cảm thấy hạnh ph&uacute;c hơn. Để được như vậy, trong một b&agrave;i viết tr&ecirc;n&nbsp;Harvard Business Review&nbsp;(HBR), chuy&ecirc;n gia William Treseder khuy&ecirc;n c&aacute;c nh&agrave; l&atilde;nh đạo n&ecirc;n thực hiện 5 việc sau đ&acirc;y mỗi ng&agrave;y:\n\r\n\r\n\n1. Tập thiền\n\r\n\r\n\nSai lầm lớn nhất của hầu hết mọi người nằm ở c&aacute;ch bắt đầu một ng&agrave;y mới. Lăn qua lăn lại tr&ecirc;n giường, sau đ&oacute; kiểm tra email tr&ecirc;n điện thoại l&agrave; một &yacute; tưởng rất tệ, theo nh&agrave; t&acirc;m l&yacute; học Emma Sepp&auml;l&auml; &ndash; t&aacute;c giả cuốn&nbsp;The Happiness Track. Bởi v&igrave; khi li&ecirc;n tục kết nối với c&aacute;c h&agrave;nh động c&oacute; thể g&acirc;y ra stress, ch&uacute;ng ta đang l&agrave;m suy yếu đi c&aacute;c khả năng li&ecirc;n quan đến nhận thức m&agrave; cơ thể rất cần, như khả năng ghi nhớ v&agrave; ch&uacute; &yacute;.\n\r\n\r\n\nH&atilde;y bắt đầu thử thực h&agrave;nh một b&agrave;i tập thiền đơn giản (như y&ecirc;n lặng h&iacute;t thở s&acirc;u từ 20 &ndash; 30 ph&uacute;t) khi thức dậy. Theo Emma Sepp&auml;l&auml;, thiền l&agrave; một c&aacute;ch gi&uacute;p cho hệ thần kinh trở n&ecirc;n b&igrave;nh tĩnh hơn d&ugrave; phải đối diện với nhiều &aacute;p lực trong cuộc sống hằng ng&agrave;y. Khi b&igrave;nh tĩnh hơn, tr&iacute; th&ocirc;ng minh cảm x&uacute;c của mỗi người sẽ tăng l&ecirc;n, từ đ&oacute; gi&uacute;p đưa ra c&aacute;c quyết định s&aacute;ng suốt hơn.\n\r\n\r\n\n2. Sắp xếp c&ocirc;ng việc hợp l&yacute;\n\r\n\r\n\nMột sai lầm phổ biến l&agrave; để cho người kh&aacute;c điền v&agrave;o lịch l&agrave;m việc mỗi ng&agrave;y của bạn, đặc biệt l&agrave; v&agrave;o buổi s&aacute;ng. Bạn phải chắc chắn rằng m&igrave;nh d&agrave;nh đủ thời gian cho c&aacute;c phần việc phức tạp v&agrave; cần phải ph&aacute;t huy khả năng s&aacute;ng tạo. Bởi v&igrave; để ho&agrave;n th&agrave;nh ch&uacute;ng, bạn phải ở trong trạng th&aacute;i thoải m&aacute;i, chứ đừng giải quyết ch&uacute;ng trong những ph&uacute;t giải lao giữa c&aacute;c cuộc họp căng thẳng.\n\r\n\r\n\nNhiều nh&agrave; l&atilde;nh đạo nghĩ rằng họ c&oacute; thể giải quyết hiệu quả c&ugrave;ng l&uacute;c nhiều phần việc, nhưng kết quả c&aacute;c cuộc nghi&ecirc;n cứu khoa học đ&atilde; cho thấy điều ngược lại.\n\r\n\r\n\nH&atilde;y tận dụng nhịp điệu sinh học tự nhi&ecirc;n của cơ thể bằng c&aacute;ch tập trung v&agrave;o c&aacute;c phần việc phức tạp v&agrave; đ&ograve;i hỏi sự s&aacute;ng tạo trong buổi s&aacute;ng v&agrave; sắp xếp c&aacute;c cuộc họp h&agrave;nh c&oacute; t&iacute;nh chất đơn giản hơn v&agrave;o buổi chiều.\n\r\n\r\n\n3. Dọn dẹp mọi thứ\n\r\n\r\n\nB&agrave;n l&agrave;m việc, m&agrave;n h&igrave;nh ch&iacute;nh m&aacute;y t&iacute;nh hoặc smartphone của bạn được sắp xếp hợp l&yacute; hay chỉ l&agrave; một mớ hỗn độn? Tất cả mọi thứ c&oacute; li&ecirc;n quan đến m&ocirc;i trường xung quanh đều t&aacute;c động đến năng suất v&agrave; chất lượng c&ocirc;ng việc của ch&uacute;ng ta. Điều n&agrave;y đ&atilde; được chứng minh qua cuốn s&aacute;ch nổi tiếng của t&aacute;c giả người Nhật Marie Kondo với tựa đề&nbsp;The Life-Changing Magic of Tidying Up&nbsp;(tạm dịch:&nbsp;Ph&eacute;p m&agrave;u thay đổi cuộc sống từ sự dọn dẹp ngăn nắp).\n\r\n\r\n\nH&atilde;y giữ cho m&ocirc;i trường l&agrave;m việc được sạch sẽ v&agrave; gọn g&agrave;ng, cả m&ocirc;i trường thực lẫn &ldquo;m&ocirc;i trường kỹ thuật số&rdquo;. Tr&ecirc;n b&agrave;n l&agrave;m việc, h&atilde;y cho mọi thứ v&agrave;o ngăn k&eacute;o. H&atilde;y tạo thư mục hợp l&yacute; tr&ecirc;n m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh để chứa c&aacute;c tập tin con v&agrave; giữ lại chỉ từ 8 &ndash; 12 ứng dụng tr&ecirc;n m&agrave;n h&igrave;nh ch&iacute;nh của smartphone. H&atilde;y tắt những th&ocirc;ng b&aacute;o kh&ocirc;ng cần thiết tr&ecirc;n điện thoại. Khi kh&ocirc;ng c&ograve;n bị t&aacute;c động bởi sự lộn xộn, bạn sẽ duy tr&igrave; được sự tập trung l&acirc;u hơn.\n\r\n\r\n\n4. Giảm bớt nh&acirc;n sự cho một cuộc họp\n\r\n\r\n\nMột nghi&ecirc;n cứu của&nbsp;HBR&nbsp;v&agrave;o năm 2015 v&agrave; nhiều nghi&ecirc;n cứu kh&aacute;c sau đ&oacute; đ&atilde; cho thấy lợi &iacute;ch của việc họp h&agrave;nh với lượng nh&acirc;n sự tham gia tối thiểu. H&atilde;y hạn chế số nh&acirc;n sự tham gia họp trong khoảng 8 người hoặc &iacute;t hơn, trừ những cuộc họp thuần về th&ocirc;ng b&aacute;o th&ocirc;ng tin. H&atilde;y chắc chắn rằng mỗi cuộc họp đều đưa ra những phần việc cụ thể, thời hạn ho&agrave;n th&agrave;nh v&agrave; x&aacute;c định được người chịu tr&aacute;ch nhiệm ch&iacute;nh.\n\r\n\r\n\nChọn ra c&aacute; nh&acirc;n chịu tr&aacute;ch nhiệm trực tiếp ch&iacute;nh l&agrave; &ldquo;thủ thuật&rdquo; m&agrave; H&atilde;ng c&ocirc;ng nghệ Apple đ&atilde; sử dụng để quản l&yacute; hiệu quả lượng nh&acirc;n sự khổng lồ.\n\r\n\r\n\n5. Bảo to&agrave;n &ldquo;v&ugrave;ng đệm&rdquo;\n\r\n\r\n\nMột l&yacute; do khiến nhiều người kh&oacute; tập trung l&agrave; v&igrave; kh&ocirc;ng c&oacute; những &ldquo;khoảng thời gian đệm&rdquo;. Bạn kh&ocirc;ng thể tập trung tối đa khi phải li&ecirc;n tục tham gia hết cuộc họp n&agrave;y đến cuộc họp kh&aacute;c. Chuyển đổi từ phần việc n&agrave;y sang phần việc kia kh&ocirc;ng phải l&agrave; nhiệm vụ dễ d&agrave;ng cho bộ n&atilde;o, v&agrave; khả năng n&agrave;y c&ograve;n suy giảm dần trong suốt một ng&agrave;y d&agrave;i. Đối với những nh&agrave; quản l&yacute; bận rộn, sự thiếu tập trung v&igrave; l&yacute; do n&agrave;y c&oacute; thể khiến họ l&atilde;ng ph&iacute; đến 70% thời gian l&agrave;m việc.\n\r\n\r\n\nNếu muốn tr&aacute;nh l&atilde;ng ph&iacute; thời gian v&agrave; để bộ n&atilde;o kh&ocirc;ng bị qu&aacute; tải, h&atilde;y cộng th&ecirc;m những khoảng thời gian đệm giữa những cuộc họp. Đối với mỗi cuộc họp k&eacute;o d&agrave;i 45 &ndash; 60 ph&uacute;t, h&atilde;y cộng th&ecirc;m cho m&igrave;nh 15 ph&uacute;t để xử l&yacute; v&agrave; tiếp nhận th&ocirc;ng tin. Điều n&agrave;y c&ograve;n mang đến lợi &iacute;ch cho cả những thuộc cấp của bạn, v&igrave; họ cũng sẽ được cộng th&ecirc;m c&ugrave;ng một khoảng thời gian như vậy để tư duy hiệu quả hơn.\n\r\nNguồn: B&aacute;o Doanh Nh&acirc;n S&agrave;i G&ograve;n',13,'lam_it_hon_hoan_thanh_nhieu_hon_va_hanh_phuc_hon.jpg','lam_it_hon_hoan_thanh_nhieu_hon_va_hanh_phuc_hon.jpg',NULL,NULL,1,'2017-03-29 21:25:06','root',NULL,NULL,0),(7,'Để thương mại điện tử tiến tới mốc 10 tỷ USD vào năm 2020','de-thuong-mai-dien-tu-tien-toi-moc-10-ty-usd-vao-nam-2020','Để thương mại điện tử tiến tới mốc 10 tỷ USD vào năm 2020','','','Gỡ bỏ r&agrave;o cản chuyển ph&aacute;t v&agrave; tiết giảm chi ph&iacute; vận chuyển, n&acirc;ng cao uy t&iacute;n, g&acirc;y dựng niềm tin của người ti&ecirc;u d&ugrave;ng... được c&aacute;c chuy&ecirc;n gia kinh tế đ&aacute;nh gi&aacute; l&agrave; những điểm then chốt tạo bứt ph&aacute; cho thương mại điện tử (TMĐT) trong những năm tới.','\nTăng trưởng mạnh mẽ\n\r\n\r\n\nTheo thống k&ecirc; của Cục Thương mại điện tử v&agrave; C&ocirc;ng nghệ th&ocirc;ng tin (Bộ C&ocirc;ng Thương), tốc độ ph&aacute;t triển internet v&agrave; viễn th&ocirc;ng Việt Nam rất cao, năm 2015, Việt Nam đứng trong Top 10 ch&acirc;u &Aacute; v&agrave; Top 20 to&agrave;n cầu về số lượng truy cập internet. Hơn 41 triệu người Việt Nam (tương đương 45% d&acirc;n số) truy cập internet v&agrave; đang c&oacute; hơn 127 triệu thu&ecirc; bao di động.\n\r\n\r\n\nSố liệu thống k&ecirc; của Hiệp hội TMĐT Việt Nam (VECOM) cho thấy, năm 2015, tổng doanh thu b&aacute;n lẻ trực tuyến Việt Nam đạt 4,07 tỷ USD (tăng 37% so với năm 2014), dự b&aacute;o đến năm 2020 sẽ đạt 10 tỷ USD (chiếm 5% tổng doanh thu b&aacute;n lẻ). VECOM cũng cho biết, c&oacute; 62% người d&ugrave;ng internet tại Việt Nam từng mua h&agrave;ng qua mạng trong năm 2015 v&agrave; 43% doanh nghiệp đạt doanh thu cao hơn nhờ TMĐT.\n\r\n\r\n\nDẫn lời b&agrave; L&ecirc; Thị H&agrave;, Cục thương mại điện tử v&agrave; C&ocirc;ng nghệ th&ocirc;ng tin (Bộ C&ocirc;ng Thương) tr&ecirc;n B&aacute;o điện tử VOV th&igrave;, tiềm năng ph&aacute;t triển TMĐT ở Việt Nam rất lớn. B&agrave; H&agrave; cho biết, người ti&ecirc;u d&ugrave;ng sử dụng internet đ&atilde; chi ti&ecirc;u tới 160 USD/năm cho mua b&aacute;n trực tuyến. Chỉ cần 62% người sử dụng internet c&oacute; mua sắm trực tuyến tương đương với khoảng gần 30 triệu người sẵn s&agrave;ng chi ti&ecirc;u khoảng 160 USD/năm sẽ l&agrave; một tiềm năng rất lớn cho thị trường TMĐT cần được khai th&aacute;c.\n\r\n\r\n\nMột xu hướng mới được b&agrave; H&agrave; quan t&acirc;m, lưu &yacute; hiện nay l&agrave; c&aacute;c phương tiện truy cập internet đang dần thay đổi mạnh mẽ. Nếu như trước đ&acirc;y người ti&ecirc;u d&ugrave;ng thường truy cập internet bằng m&aacute;y t&iacute;nh để b&agrave;n th&igrave; ng&agrave;y nay lại c&oacute; xu hướng chuyển qua c&aacute;c thiết bị cầm tay.\n\r\n\r\n\nKhảo s&aacute;t của Bộ C&ocirc;ng Thương trong 6 th&aacute;ng năm 2016 cho thấy, lượng truy cập internet nhiều nhất hiện nay l&agrave; từ thiết bị di động với tỷ lệ 85%, trong khi năm 2015, tỷ lệ n&agrave;y chỉ chiếm 65%, tăng 21% trong v&ograve;ng 1 năm. Đ&acirc;y l&agrave; xu hướng mới m&agrave; c&aacute;c doanh nghiệp khi đầu tư v&agrave;o TMĐT cần t&iacute;nh to&aacute;n khi x&acirc;y dựng nền tảng TMĐT th&ocirc;ng qua thiết bị cụ thể để c&oacute; ứng dụng b&aacute;n h&agrave;ng tốt nhất nhằm thu h&uacute;t người ti&ecirc;u d&ugrave;ng.\n\r\n\r\n\nSong, gặp kh&ocirc;ng &iacute;t r&agrave;o cản\n\r\n\r\n\nTuy nhi&ecirc;n, b&ecirc;n cạnh những thế mạnh, cuộc chiến TMĐT tại Việt&nbsp;Nam&nbsp;cũng đang ng&agrave;y c&agrave;ng khốc liệt. Cuộc đổ bộ của h&agrave;ng loạt c&aacute;c c&ocirc;ng ty TMĐT nước ngo&agrave;i g&acirc;y sức &eacute;p lớn l&ecirc;n c&aacute;c c&ocirc;ng ty TMĐT của Việt&nbsp;Nam.\n\r\n\r\n\nĐầu th&aacute;ng 04/2016, h&atilde;ng TMĐT Trung Quốc Alibaba đ&atilde; ho&agrave;n tất thương vụ trị gi&aacute; 1 tỷ USD để th&acirc;u t&oacute;m to&agrave;n bộ s&agrave;n TMĐT Lazada tại Đ&ocirc;ng Nam &Aacute;. Sau đ&oacute; v&agrave;i tuần, Rocket Internet, chủ sở hữu Zalora Việt Nam cũng b&aacute;n s&agrave;n n&agrave;y cho Central Group của Th&aacute;i Lan.\n\r\n\r\n\nKh&ocirc;ng chỉ bị th&acirc;u t&oacute;m, s&acirc;n chơi TMĐT tại Việt Nam đang l&agrave; &ldquo;cuộc chiến&rdquo; khốc liệt của h&agrave;ng trăm c&ocirc;ng ty trong v&agrave; ngo&agrave;i nước v&agrave; Top 5 hiện tại thuộc về c&aacute;c &ldquo;đại gia&rdquo;, như: Lazada, Tiki, Cdiscount, Caganu v&agrave; Adayroi. &ldquo;G&atilde; khổng lồ&rdquo; Alibaba cũng đang tiến v&agrave;o thị trường với những kế hoạch d&agrave;i hạn.\n\r\n\r\n\n\n\r\n\r\n\nNăm 2015, tổng doanh thu b&aacute;n lẻ trực tuyến Việt&nbsp;Nam&nbsp;đạt 4,07 tỷ USD\n\r\n\r\n\nB&ecirc;n cạnh đ&oacute;, bản th&acirc;n TMĐT trong nước cũng đang bộc lộ nhiều kh&oacute; khăn, hạn chế. Theo B&aacute;o c&aacute;o Thương mại điện tử Việt Nam 2015 do Cục Thương mại điện tử v&agrave; C&ocirc;ng nghệ th&ocirc;ng tin (Vecita), Bộ C&ocirc;ng Thương c&ocirc;ng bố, c&oacute; 45% kh&aacute;ch h&agrave;ng TMĐT ph&agrave;n n&agrave;n về chi ph&iacute; vận chuyển (cứ 10 người mua h&agrave;ng trực tuyến th&igrave; c&oacute; 4-5 người kh&ocirc;ng h&agrave;i l&ograve;ng). Chuyển ph&aacute;t chậm, thiếu chuy&ecirc;n nghiệp cũng l&agrave; r&agrave;o cản lớn với người ti&ecirc;u d&ugrave;ng khi mua sắm trực tuyến. Hơn nữa, b&igrave;nh qu&acirc;n mỗi th&aacute;ng, doanh nghiệp TMĐT sẽ phải tốn th&ecirc;m khoảng 10%-20% doanh thu cho c&aacute;c dịch vụ vận chuyển, đ&oacute;ng g&oacute;i, thu tiền v&agrave; chăm s&oacute;c kh&aacute;ch h&agrave;ng. Chi ph&iacute; vận chuyển cao trở th&agrave;nh điểm yếu l&agrave;m giảm sức cạnh tranh của c&aacute;c doanh nghiệp TMĐT.\n\r\n\r\n\nL&yacute; giải vấn đề n&agrave;y, tr&ecirc;n b&aacute;o điện tử C&ocirc;ng Thương, b&agrave; Đinh Thị Mỹ Loan, Chủ tịch Hiệp hội B&aacute;n lẻ Việt Nam cho biết: Ph&iacute; vận chuyển khiến gi&aacute; mua sắm trực tuyến kh&ocirc;ng rẻ hơn đ&aacute;ng kể so với mua sắm truyền thống. Kh&aacute;ch h&agrave;ng mua sắm trực tuyến chủ yếu do t&iacute;nh tiện lợi hơn l&agrave; chi ph&iacute; v&agrave; chất lượng.\n\r\n\r\n\nCũng theo kết quả của B&aacute;o c&aacute;o tr&ecirc;n, một r&agrave;o cản nữa được đưa ra đ&oacute; l&agrave;: h&igrave;nh thức thanh to&aacute;n ch&iacute;nh l&agrave; điểm yếu lớn nhất của TMĐT Việt&nbsp;Nam. 91% kh&aacute;ch h&agrave;ng vẫn sử dụng h&igrave;nh thức COD (thanh to&aacute;n khi nhận h&agrave;ng), g&acirc;y kh&oacute; khăn cho cả hệ thống cung cấp v&agrave; kh&aacute;ch h&agrave;ng.\n\r\n\r\n\nĐ&aacute;ng buồn l&agrave; về mức độ h&agrave;i l&ograve;ng khi mua sắm trực tuyến, chỉ 38% số người tham gia khảo s&aacute;t trả lời h&agrave;i l&ograve;ng. Sản phẩm k&eacute;m chất lượng so với quảng c&aacute;o l&agrave; trở ngại được nhiều người quan t&acirc;m với tỷ lệ 73%. Tiếp theo l&agrave; trở ngại về gi&aacute; cả (61%).\n\r\n\r\n\nB&ecirc;n cạnh đ&oacute;, trong số 38% người tham gia khảo s&aacute;t chưa tham gia mua sắm trực tuyến, khi được hỏi về nguy&ecirc;n nh&acirc;n chưa mua sắm trực tuyến, 50% cho biết kh&ocirc;ng tin tưởng đơn vị b&aacute;n h&agrave;ng, 37% quan niệm mua tại cửa h&agrave;ng tiện lợi v&agrave; rẻ hơn, 26% kh&ocirc;ng c&oacute; thẻ t&iacute;n dụng hoặc thẻ thanh to&aacute;n qua mạng, 25% lo sợ lộ th&ocirc;ng tin c&aacute; nh&acirc;n.\n\r\n\r\n\nV&igrave; vậy, d&ugrave; được đ&aacute;nh gi&aacute; l&agrave; thị trường tiềm năng nhưng sau một thời gian hoạt động, kh&ocirc;ng &iacute;t trang TMĐT tại Việt&nbsp;Nam&nbsp;đ&atilde; phải dừng cuộc chơi v&igrave; qu&aacute; khốc liệt. Với số lỗ khoảng 150 tỷ đồng, website Lingo.vn đ&atilde; tạm biệt thị trường v&agrave;o th&aacute;ng 8/2016 vừa qua. Trước đ&oacute;, năm 2015, h&agrave;ng loạt doanh nghiệp TMĐT tại Việt&nbsp;Nam, như: Beyeu.vn, Deca.vn, Fab.vn, Cucre.vn&hellip; đ&atilde; phải đ&oacute;ng cửa v&igrave; kh&ocirc;ng thể chịu nổi sức &eacute;p cạnh tranh đang ng&agrave;y c&agrave;ng lớn.\n\r\n\r\n\nB&ecirc;n cạnh đ&oacute;, kh&ocirc;ng &iacute;t c&aacute;c trang TMĐT do thua lỗ đ&atilde; phải nhượng lại cho đối t&aacute;c để t&aacute;i cơ cấu. Th&aacute;ng 04/2016, Rocket Internet - chủ sở hữu Zalora Việt&nbsp;Nam&nbsp;đ&atilde; b&aacute;n lại s&agrave;n n&agrave;y cho Central Group (Th&aacute;i Lan). C&ugrave;ng thời gian n&agrave;y, h&atilde;ng TMĐT Trung Quốc Alibaba đ&atilde; mua lại Lazada tại Đ&ocirc;ng Nam &Aacute; với trị gi&aacute; 1 tỷ USD&hellip;\n\r\n\r\n\nDẫn lời b&agrave; Lại Việt Anh, Ph&oacute; Cục trưởng Cục TMĐT v&agrave; C&ocirc;ng nghệ th&ocirc;ng tin (Bộ C&ocirc;ng Thương) tr&ecirc;n B&aacute;o điện tử C&ocirc;ng Thương cho biết, những doanh nghiệp rơi v&agrave;o kh&oacute; khăn phải đ&oacute;ng cửa tr&ecirc;n thị trường TMĐT l&agrave; quy luật b&igrave;nh thường. Đồng thời, c&aacute;c doanh nghiệp lớn cũng kh&ocirc;ng thể chi phối hay l&egrave;o l&aacute;i to&agrave;n thị trường, trong khi đ&oacute; c&oacute; c&aacute;c doanh nghiệp nhỏ v&agrave; vừa vẫn c&oacute; mức tăng trưởng nhất định, đ&oacute;ng g&oacute;p t&iacute;ch cực v&agrave;o sự ph&aacute;t triển của thị trường.\n\r\n\r\n\nGiải ph&aacute;p n&agrave;o để th&uacute;c đẩy?\n\r\n\r\n\nTheo Hiệp hội TMĐT Việt&nbsp;Nam, gỡ bỏ r&agrave;o cản chuyển ph&aacute;t v&agrave; tiết giảm chi ph&iacute; vận chuyển sẽ tạo bứt ph&aacute; cho TMĐT. Theo đ&oacute;, để n&acirc;ng cao năng lực chuyển ph&aacute;t, c&aacute;c dịch vụ chuyển ph&aacute;t truyền thống phải c&oacute; những bước chuyển biến để ph&ugrave; hợp với t&igrave;nh h&igrave;nh mới. Xung quanh vấn đề n&agrave;y, trả lời tr&ecirc;n Thời b&aacute;o kinh doanh, &ocirc;ng Nguyễn Ngọc Dũng, Ph&oacute; Chủ tịch Hiệp hội TMĐT Việt Nam cho rằng, phải c&oacute; những c&ocirc;ng ty vận chuyển chuy&ecirc;n biệt phục vụ cho TMĐT k&eacute;o theo hệ thống kho b&atilde;i chuy&ecirc;n nghiệp hơn, ph&aacute;t triển, mở rộng c&aacute;c điểm nhận v&agrave; giao h&agrave;ng rộng khắp tại c&aacute;c địa phương.\n\r\n\r\n\n\r\n	\r\n		\r\n			\n\r\n			\nVề hỗ trợ ph&aacute;p l&yacute; cho TMĐT ph&aacute;t triển, ng&agrave;y 08/08/2016, Thủ tướng Ch&iacute;nh phủ cũng đ&atilde; ban h&agrave;nh Quyết định 1563/QĐ-TTg về việc ph&ecirc; duyệt Kế hoạch tổng thể ph&aacute;t triển TMĐT giai đoạn 2016-2020. Kế hoạch đ&atilde; đưa ra nhiều vấn đề trọng t&acirc;m để ph&aacute;t triển hơn nhằm đẩy mạnh ph&aacute;t triển hạ tầng giao thương trực tuyến, n&acirc;ng cao ứng dụng dịch vụ c&ocirc;ng...\n\r\n			\n\r\n		\r\n	\r\n\n\r\n\r\n\nNgo&agrave;i ra, tập trung hiện đại h&oacute;a k&ecirc;nh chuyển ph&aacute;t, gia tăng c&aacute;c điểm trung chuyển để giảm chi ph&iacute; vận chuyển l&agrave; giải ph&aacute;p tăng sức cạnh tranh được giới chuy&ecirc;n m&ocirc;n v&agrave; c&aacute;c doanh nghiệp TMĐT quan t&acirc;m. Đ&oacute; l&agrave; l&yacute; do h&agrave;ng loạt c&aacute;c &ldquo;&ocirc;ng lớn&rdquo;, như: FPT, Lazada&hellip; đang chạy đua trong cuộc chiến dịch vụ giao nhận nhanh - rẻ, để thu h&uacute;t kh&aacute;ch h&agrave;ng.\n\r\n\r\n\nNhiều chuy&ecirc;n gia khuyến nghị, phải c&oacute; sự hợp t&aacute;c chặt chẽ giữa c&aacute;c nh&agrave; b&aacute;n h&agrave;ng trực tuyến v&agrave; c&ocirc;ng ty cung cấp dịch vụ chuyển ph&aacute;t, gi&uacute;p doanh nghiệp TMĐT v&agrave; doanh nghiệp chuyển ph&aacute;t tận dụng tốt c&aacute;c cơ hội từ thị trường, n&acirc;ng cao chất lượng dịch vụ chuyển ph&aacute;t, tiến tới chuy&ecirc;n nghiệp.\n\r\n\r\n\nB&ecirc;n cạnh đ&oacute;, để khắc phục điểm yếu về h&igrave;nh thức thanh to&aacute;n, TMĐT Việt&nbsp;Nam&nbsp;phải n&acirc;ng cao uy t&iacute;n, g&acirc;y dựng niềm tin của người ti&ecirc;u d&ugrave;ng. Trong đ&oacute;, bảo đảm chất lượng sản phẩm l&agrave; y&ecirc;u cầu then chốt.\n\r\n\r\n\nTiếp theo l&agrave; loại bỏ sự cạnh tranh kh&ocirc;ng c&ocirc;ng bằng, tr&aacute;nh chi&ecirc;u tr&ograve; &ldquo;khuyến m&atilde;i ảo&rdquo; g&acirc;y mất niềm tin của người ti&ecirc;u d&ugrave;ng. Ngo&agrave;i ra, C&aacute;c trang TMĐT cần minh bạch c&aacute;c vấn đề về đổi trả, bảo h&agrave;nh, khiếu nại. Đồng thời, kiểm so&aacute;t chất lượng, hoạt động rao b&aacute;n, mua h&agrave;ng tr&ecirc;n s&agrave;n TMĐT. Bởi chữ t&iacute;n quyết định th&agrave;nh c&ocirc;ng của TMĐT. Thực tế đ&ograve;i hỏi c&aacute;c doanh nghiệp TMĐT tại Việt&nbsp;Nam&nbsp;cần ho&agrave;n thiện hơn, giảm thiểu rủi ro để thu h&uacute;t, thuyết phục kh&aacute;ch h&agrave;ng./.\n\r\n\r\n\nNguồn: Tạp ch&iacute; Kinh tế v&agrave; Dự b&aacute;o\n\r\n',13,'de_thuong_mai_dien_tu_tien_toi_moc_10_ty_usd_vao_nam_2020.jpg','de_thuong_mai_dien_tu_tien_toi_moc_10_ty_usd_vao_nam_2020.jpg',NULL,NULL,1,'2017-03-29 21:28:14','root',NULL,NULL,0),(8,'Amazon bí mật Uber hóa mảng giao hàng','amazon-bi-mat-uber-hoa-mang-giao-hang','Amazon bí mật Uber hóa mảng giao hàng','Bán hàng','','Amazon đang b&iacute; mật x&acirc;y dựng một ứng dụng &ldquo;giống như Uber&rdquo; nhằm phục vụ mảng giao h&agrave;ng của H&atilde;ng, theo Business Insider.','Một nguồn tin n&oacute;i với&nbsp;Business Insider&nbsp;rằng, ứng dụng m&agrave; Amazon đang x&acirc;y dựng hướng đến c&aacute;c t&agrave;i xế xe tải - những người sẽ chở c&aacute;c đơn h&agrave;ng của H&atilde;ng, v&agrave; rằng dịch vụ mới n&agrave;y sẽ đ&aacute;nh dấu sự hiện diện của &quot;g&atilde; khổng lồ&quot; thương mại điện tử trong ng&agrave;nh c&ocirc;ng nghiệp vận tải đường bộ trị gi&aacute; l&ecirc;n đến 800 tỷ USD\r\n\r\n\r\n\nỨng dụng được cho l&agrave; sẽ ra mắt v&agrave;o m&ugrave;a H&egrave; 2017 được thiết kế để tạo điều kiện thuận lợi cho những t&agrave;i xế xe tải chở h&agrave;ng dễ d&agrave;ng t&igrave;m thấy nh&acirc;n vi&ecirc;n giao h&agrave;ng - những người sẽ trực tiếp giao sản phẩm đến từng kh&aacute;ch h&agrave;ng. C&aacute;ch vận h&agrave;nh n&agrave;y tương tự với c&aacute;ch kết nối t&agrave;i xế v&agrave; người gọi xe của Uber.&nbsp;\n\r\n\r\n\nTheo đ&oacute;, ứng dụng c&ograve;n cung cấp nhiều th&ocirc;ng tin hướng dẫn cho t&agrave;i xế cũng như c&aacute; nh&acirc;n h&oacute;a c&aacute;c t&iacute;nh năng như khuyến nghị khi n&agrave;o n&ecirc;n dừng xe lại, gợi &yacute; h&agrave;nh tr&igrave;nh cụ thể để nhận hoặc chuyển giao h&agrave;ng h&oacute;a...\n\r\n\r\n\nTh&ocirc;ng qua ứng dụng, Amazon dường như đang muốn loại bỏ bớt phần chi ph&iacute; cho b&ecirc;n trung gian thứ ba trong lĩnh vực giao h&agrave;ng. Động th&aacute;i lần n&agrave;y c&agrave;ng g&oacute;p phần nhấn mạnh độ tin cậy của nghi vấn cho rằng Amazon đang muốn trở th&agrave;nh một h&atilde;ng logistics to&agrave;n diện nhằm kiểm so&aacute;t &quot;từ A tới Z&quot; quy tr&igrave;nh giao nhận của m&igrave;nh.\n\r\n\r\n\nTr&ecirc;n thực tế, trong khoảng một năm qua, Amazon đ&atilde; mua h&agrave;ng ng&agrave;n xe tải chở h&agrave;ng v&agrave; h&agrave;ng chục m&aacute;y bay chuy&ecirc;n chở, đồng thời tung ra nhiều dịch vụ giao h&agrave;ng mới nhằm vận chuyển h&agrave;ng h&oacute;a đến tận tay người d&ugrave;ng cuối (chẳng hạn như Amazon Flex).\n\r\n\r\n\nNếu th&agrave;nh c&ocirc;ng, kế hoạch c&oacute; phần tham vọng n&agrave;y sẽ gi&uacute;p &quot;đại gia thương mại điện tử&quot; loại bỏ ho&agrave;n to&agrave;n mức chi ph&iacute; khổng lồ từng phải chi cho c&aacute;c b&ecirc;n đối t&aacute;c thứ ba tại bến cảng, kho b&atilde;i.&nbsp;\n\r\n\r\n\nTuy nhi&ecirc;n, kh&ocirc;ng chỉ một m&igrave;nh Amazon thu lợi m&agrave; khi mọi việc tiến triển theo chiều hướng khả quan, mức gi&aacute; m&agrave; kh&aacute;ch h&agrave;ng phải trả cho mỗi m&oacute;n h&agrave;ng cũng nhiều khả năng được giảm xuống đ&aacute;ng kể.\n\r\nNguồn: Doanh nh&acirc;n s&agrave;i g&ograve;n',13,'amazon_bi_mat_uber_hoa_mang_giao_hang.jpg','amazon_bi_mat_uber_hoa_mang_giao_hang.jpg',NULL,NULL,1,'2017-03-29 21:58:45','root',NULL,NULL,0),(9,'Khâu thanh toán - trở ngại cho thương mại điện tử Việt Nam ','khau-thanh-toan--tro-ngai-cho-thuong-mai-dien-tu-viet-nam-','','','','Mặc d&ugrave; thương mại điện tử tại Việt Nam đang ph&aacute;t triển với tốc độ &ldquo;ch&oacute;ng mặt&rdquo; nhưng hầu hết c&aacute;c chuy&ecirc;n gia kinh tế v&agrave; c&aacute;c doanh nghiệp đều thừa nhận, kh&oacute; khăn lớn nhất của thương mại điện tử Việt Nam l&agrave; việc thanh to&aacute;n','Kh&oacute; khăn trong thanh to&aacute;n Tại Diễn đ&agrave;n b&aacute;n lẻ Việt Nam 2016 với chủ đề: &ldquo;Thương mại điện tử, c&ocirc;ng nghệ di động với ng&agrave;nh dịch vụ b&aacute;n lẻ Việt Nam&rdquo; diễn ra ng&agrave;y 8/12, &ocirc;ng Nguyễn Thanh Hưng - Chủ tịch Hiệp hội Thương mại điện tử Việt Nam cho rằng, thương mại điện tử ở Việt Nam ph&aacute;t triển nhanh nhưng mới chỉ ở mức độ phổ cập, ai cũng tham gia, &quot;ng&oacute; nghi&ecirc;ng&quot;, quy m&ocirc; kh&ocirc;ng lớn. Mặc d&ugrave; năm 2015, doanh thu từ thương mại điện tử đạt 4,07 tỷ USD, tăng gấp 5 lần so với năm 2012 nhưng nếu so với doanh thu của c&aacute;c nước kh&aacute;c th&igrave; con số n&agrave;y kh&ocirc;ng thấm v&agrave;o đ&acirc;u. V&iacute; dụ, doanh thu b&aacute;n lẻ của Mỹ từ thương mại điện tử l&agrave; 355 tỷ USD, H&agrave;n Quốc l&agrave; 38 tỷ USD, Trung Quốc l&agrave; 637 tỷ USD. Một trong những kh&oacute; khăn lớn nhất đối với thương mại điện tử ở Việt Nam được b&agrave; Đinh Thị Mỹ Loan - Chủ tịch Hiệp hội C&aacute;c nh&agrave; b&aacute;n lẻ Việt Nam chỉ ra l&agrave; việc thanh to&aacute;n. Hầu hết ở Việt Nam, d&ugrave; mua h&agrave;ng trực tuyến nhưng vẫn sử dụng phương ph&aacute;p nhận h&agrave;ng rồi trả tiền tại chỗ. Cụ thể, h&igrave;nh thức người mua thanh to&aacute;n sau khi nhận h&agrave;ng chiếm 90% tổng doanh thu; thanh to&aacute;n qua Internetbanking/thẻ t&iacute;n dụng/thẻ ATM chiếm 15% v&agrave; phương ph&aacute;p giao h&agrave;ng phổ biến nhất hiện nay vẫn chủ yếu bằng phương tiện xe m&aacute;y. Điều n&agrave;y xuất ph&aacute;t từ niềm tin của người ti&ecirc;u d&ugrave;ng đối với việc mua h&agrave;ng trực tuyến, mua h&agrave;ng online. Tr&ecirc;n thực tế, nhiều người ti&ecirc;u d&ugrave;ng đ&atilde; phải &ldquo;ăn quả đắng&rdquo; khi mua h&agrave;ng qua mạng bởi h&agrave;ng khi nhận về kh&ocirc;ng giống như quảng c&aacute;o tr&ecirc;n mạng. &gt;&gt; [Infographic] L&yacute; do kh&aacute;ch mua h&agrave;ng trực tuyến bỏ cuộc &Ocirc;ng Nguyễn Thanh Hưng cho rằng, kh&oacute; khăn của thương mại điện tử đến từ vấn đề ph&aacute;p l&yacute;. Cụ thể, Việt Nam hiện chưa c&oacute; văn bản hướng dẫn cụ thể quy định về c&aacute;c hoạt động thương mại điện tử tr&ecirc;n nền tảng thiết bị di động, n&ecirc;n chưa c&oacute; cơ sở để x&aacute;c định m&ocirc; h&igrave;nh hoạt động cụ thể, cũng như chưa x&aacute;c định được phương hướng quản l&yacute; ph&ugrave; hợp đối với c&aacute;c m&ocirc; h&igrave;nh hoạt động n&agrave;y. B&ecirc;n cạnh đ&oacute;, mức độ trung th&agrave;nh của kh&aacute;ch h&agrave;ng thấp, họ c&oacute; thể mua sắm tại trang n&agrave;y nhưng cũng dễ d&agrave;ng chuyển sang c&aacute;c trang kh&aacute;c v&agrave; đ&acirc;y cũng đang l&agrave; vấn đề kh&oacute; khăn cho nhiều doanh nghiệp khi ph&aacute;t triển thương mại điện tử. Thay đổi nhận thức người ti&ecirc;u d&ugrave;ng B&agrave; Đinh Thị Mỹ Loan chia sẻ, sự phổ cập của internet, kỹ thuật số v&agrave; c&ocirc;ng nghệ di động đ&atilde; tăng th&ecirc;m &quot;sức mạnh&quot; cho thương mại điện tử v&agrave; tạo ra những cơ hội, những bước ph&aacute;t triển ngoạn mục cho ng&agrave;nh dịch vụ b&aacute;n lẻ trong tương lai. &ldquo;Mua sắm qua mạng x&atilde; hội như Facebook, Zalo, Viber đ&atilde; trở th&agrave;nh nơi ph&aacute;t triển cho c&aacute;c doanh nghiệp b&aacute;n lẻ trực tuyến. Tuy nhi&ecirc;n, muốn ph&aacute;t triển thương mại điện tử ở Việt Nam, mấu chốt l&agrave; phải thay đổi được nhận thức của người ti&ecirc;u d&ugrave;ng, của doanh nghiệp&rdquo;, b&agrave; Loan đưa ra &yacute; kiến. &Ocirc;ng Phạm Th&agrave;nh C&ocirc;ng - Trưởng ph&ograve;ng cấp cao của C&ocirc;ng ty Nielsen cho rằng, mặc d&ugrave; thương mại điện tử l&agrave; bước tiến lớn nhưng con đường khai th&aacute;c thương mại di động kh&ocirc;ng hẳn l&agrave; lu&ocirc;n bằng phẳng. Tr&ecirc;n thị trường c&oacute; qu&aacute; nhiều loại thiết bị di động được điều h&agrave;nh bởi những nền tảng c&ocirc;ng nghệ kh&aacute;c nhau n&ecirc;n c&aacute;c nh&agrave; b&aacute;n lẻ buộc phải lựa chọn c&aacute;c giải ph&aacute;p th&iacute;ch ứng chung. Khả năng kết nối internet cũng như sự phổ biến của băng th&ocirc;ng rộng trong một v&ugrave;ng địa l&yacute; cũng đ&aacute;ng được quan t&acirc;m để bảo đảm cho doanh nghiệp c&oacute; được lượng kh&aacute;ch h&agrave;ng đ&ocirc;ng đảo. Do đ&oacute;, doanh nghiệp phải chọn c&aacute;c giải ph&aacute;p c&ocirc;ng nghệ b&aacute;n lẻ sao cho kh&aacute;ch h&agrave;ng sử dụng c&aacute;c nền tảng hay hệ điều h&agrave;nh kh&aacute;c nhau m&agrave; vẫn c&oacute; thể tiếp cận với kho h&agrave;ng, mặt kh&aacute;c phải lu&ocirc;n theo d&otilde;i c&aacute;c dữ liệu ph&acirc;n t&iacute;ch để biết h&agrave;nh vi mua sắm của người ti&ecirc;u d&ugrave;ng th&ocirc;ng qua h&igrave;nh thức thương mại mới nhiều triển vọng n&agrave;y. &gt;&gt; Ch&acirc;n dung người mua h&agrave;ng online ở Mỹ B&agrave; Hồ Thị Kim Thoa - Thứ trưởng Bộ C&ocirc;ng Thương cũng khẳng định, sự ra đời của thương mại điện tử tạo n&ecirc;n cuộc chuyển hướng đầu ti&ecirc;n trong c&aacute;ch mua b&aacute;n, cho ph&eacute;p người ti&ecirc;u d&ugrave;ng c&oacute; thể mua h&agrave;ng ở bất cứ nơi đ&acirc;u chỉ với chiếc m&aacute;y t&iacute;nh c&oacute; kết nối internet. Điều n&agrave;y cho ph&eacute;p kh&aacute;ch h&agrave;ng vượt qua c&aacute;c ranh giới để tiếp cận thị trường to&agrave;n cầu. &ldquo;Tuy nhi&ecirc;n, sự xuất hiện của thiết bị di động c&ugrave;ng với sự chuyển đổi từ việc sử dụng điện thoại th&ocirc;ng thường sang điện thoại th&ocirc;ng minh v&agrave; m&aacute;y t&iacute;nh bảng cũng như sự xuất hiện của những kho phần mềm ứng dụng di động đang l&agrave;m cho trật tự của ng&agrave;nh b&aacute;n lẻ một lần nữa bị đảo lộn&rdquo;, Thứ trưởng nhận x&eacute;t. Theo Quyết định 1563 của Thủ tướng Ch&iacute;nh phủ, đến năm 2020, quy m&ocirc; thương mại điện tử của Việt Nam phải đạt 10 tỷ USD, chiếm 5% tỷ trọng tổng mức b&aacute;n lẻ. Tuy nhi&ecirc;n, số lượng doanh nghiệp tham gia ph&aacute;t triển thương mại điện tử chưa nhiều, chưa c&oacute; c&aacute;c doanh nghiệp quy m&ocirc; lớn n&ecirc;n theo Thứ trưởng Thoa, mục ti&ecirc;u Ch&iacute;nh phủ đề ra &ldquo;phấn đấu rất kh&oacute;&rdquo;. &ldquo;Ch&uacute;ng ta đang vướng nhiều ở phần thanh to&aacute;n nhưng trong Ng&agrave;y Mua sắm trực tuyến vừa qua đ&atilde; c&oacute; 19 ng&acirc;n h&agrave;ng tham gia hỗ trợ thanh to&aacute;n. Điều n&agrave;y chứng tỏ doanh nghiệp đ&atilde; dần &yacute; thức được sự quan trọng của thương mại điện tử. Bộ C&ocirc;ng Thương đang phối hợp với c&aacute;c địa phương thực hiện chương tr&igrave;nh th&aacute;ng khuyến mại để đẩy mạnh hoạt động thương mại điện tử đồng bộ tr&ecirc;n to&agrave;n quốc&rdquo;, Thứ trưởng cho biết. Nguồn: Doanh nh&acirc;n s&agrave;i g&ograve;n',13,'card.jpg','card.jpg',NULL,NULL,1,'2017-03-29 22:02:27','root','2017-08-26 16:41:23','root',0);

/*Table structure for table `ffm_blog_` */

DROP TABLE IF EXISTS `ffm_blog_`;

CREATE TABLE `ffm_blog_` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `friendlyurl` varchar(250) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `mete_description` varchar(500) DEFAULT NULL,
  `description_sort` text,
  `description_long` text,
  `typeid` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `thumb` varchar(250) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '1' COMMENT '1 hien thi, 0 khong hien thi',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_url` (`friendlyurl`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_blog_` */

insert  into `ffm_blog_`(`id`,`title`,`friendlyurl`,`meta_title`,`meta_keyword`,`mete_description`,`description_sort`,`description_long`,`typeid`,`image`,`thumb`,`views`,`ordering`,`isshow`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (2,'Dịch vụ IT Bình Dương','dich-vu-it-binh-duong','Dịch vụ IT tại Bình Dương','Dịch vụ IT tại Bình Dương, dịch vụ IT support','Cung cấp dịch vụ IT chuyên nghiệp tại khu vực Bình Dương, hiệu quả, chuyên nghiệp và chi phí thấp','Dịch vụ IT B&igrave;nh Dương, Dịch vụ IT Support tại khu vực B&igrave;nh Dương.<br />\r\nCh&uacute;ng t&ocirc;i cung cấp dịch vụ IT hỗ trợ cho doanh nghiệp, tổ chứ, c&aacute; nhận tại khu vực B&igrave;nh Dương với dịch vụ IT chuy&ecirc;n nghiệp, chi ph&iacute; thấp, hiệu quả cao','<h3>Dịch vụ IT B&igrave;nh Dương</h3>\r\n\r\n<p><strong>DỊCH VỤ IT B&Igrave;NH DƯƠNG- DỊCH VỤ IT TẠI KHU VỰC B&Igrave;NH DƯƠNG</strong></p>\r\n\r\n<p><strong>&nbsp;Cung cấp dịch vụ IT B&igrave;nh Dương, cung cấp c&aacute;c dịch vụ IT tại B&igrave;nh Dương</strong></p>\r\n\r\n<p><em>C&ocirc;ng ty TNHH Dịch Vụ C&ocirc;ng Nghệ Th&ocirc;ng Tin Lam &Aacute;nh Dương</em></p>\r\n\r\n<p><em>Chi nh&aacute;nh tại 15A/5E, KDC B&igrave;nh Đ&aacute;ng, B&igrave;nh H&ograve;a, Thuận An, B&igrave;nh Dương</em></p>\r\n\r\n<p><strong><em>Hotline: 0915574877</em></strong></p>\r\n\r\n<p><strong>Cung cấp dịch vụ tại khu vực b&igrave;nh dương với c&aacute;c g&oacute;i dịch vụ như sau:</strong></p>\r\n\r\n<p>1. G&oacute;i cho thu&ecirc; IT</p>\r\n\r\n<p>2. G&oacute;i dịch vụ theo th&aacute;ng</p>\r\n\r\n<p>3. G&oacute;i dịch vụ theo giờ.</p>\r\n\r\n<p><strong>A) G&oacute;i dịch vụ cho thu&ecirc; IT</strong>, IT sẽ l&agrave;m việc ngay tại c&ocirc;ng ty của qu&yacute; kh&aacute;ch h&agrave;ng, l&agrave;m tất cả c&aacute;c c&ocirc;ng việc trong lĩnh vực IT như:</p>\r\n\r\n<p>- C&agrave;i đặt hệ điều h&agrave;nh cho m&aacute;y t&iacute;nh.</p>\r\n\r\n<p>- Sửa chữa, bảo h&agrave;nh c&aacute;c vấn đề li&ecirc;n quan tới m&aacute;y t&iacute;nh.</p>\r\n\r\n<p>- C&agrave;i đặt c&aacute;c phần mềm office cho m&aacute;y t&iacute;nh.</p>\r\n\r\n<p>- C&agrave;i đặt, cấu h&igrave;nh Email outlook</p>\r\n\r\n<p>- Vận h&agrave;nh hệ thống mạng m&aacute;y t&iacute;nh như wifi, router, switch</p>\r\n\r\n<p>- Khắc phục c&aacute;c sự cố li&ecirc;n quan tới internet, kết nối mạng nội bộ</p>\r\n\r\n<p>- Xử l&yacute; c&aacute;c vấn đề về m&aacute;y in, m&aacute;y fax, điện thoại...</p>\r\n\r\n<p>- Khắc phục c&aacute;c sự cố li&ecirc;n quan tới phần mềm tr&ecirc;n m&aacute;y t&iacute;nh.</p>\r\n\r\n<p>- Tư vấn x&acirc;y dựng hệ thống server, quản l&yacute; dữ liệu user</p>\r\n\r\n<p>- Quản l&yacute; t&agrave;i sản IT, tư vấn mua m&aacute;y t&iacute;nh, server...</p>\r\n\r\n<p>- Chịu sự ph&acirc;n bổ c&ocirc;ng việc v&agrave; y&ecirc;u cầu c&ocirc;ng việc của c&ocirc;ng ty.</p>\r\n\r\n<p>- B&aacute;o c&aacute;o cho cấp quản l&yacute; trực tiếp của c&ocirc;ng ty.</p>\r\n\r\n<p>Ưu điểm l&agrave;:</p>\r\n\r\n<p>- Nếu c&oacute; phất sinh sự cố nhiều m&agrave; cần nhiều hơn số lương IT đang thu&ecirc;, b&ecirc;n LAD sẽ cho người xuống hỗ trợ m&agrave; kh&ocirc;ng ph&aacute;t sinh bất cứ một khoản chi ph&iacute; n&agrave;o?</p>\r\n\r\n<p>- Nh&acirc;n vi&ecirc;n IT được đ&agrave;o tạo v&agrave; quản l&yacute; theo chuẩn ITIL của c&ocirc;ng ty LAD để đảm bảo c&ocirc;ng việc IT hiệu quả nhất.</p>\r\n\r\n<p>- Được tư vấn miến ph&iacute; xấy dựng c&aacute;c hệ thống IT cần thiết.</p>\r\n\r\n<p><strong>B) G&oacute;i dịch vụ theo th&aacute;ng</strong></p>\r\n\r\n<p>- C&ocirc;ng việc IT sẽ l&agrave;m th&igrave; giống như g&oacute;i A, tuy nhi&ecirc;n sẽ kh&aacute;c về h&igrave;nh thức l&agrave;m việc.</p>\r\n\r\n<p>- H&igrave;nh thức l&agrave;m việc: Tiếp nhận y&ecirc;u cầu hỗ trợ của kh&aacute;ch h&agrave;ng, nh&acirc;n vi&ecirc;n IT của LAD sẽ tiền h&agrave;nh hỗ trợ từ xa qua Team Viewer để xử l&yacute;, trường hợp kh&ocirc;ng xư l&yacute; từ xa đươc do kh&ocirc;ng c&oacute; kết nối internet th&igrave; nh&acirc;n vi&ecirc;n LAD sẽ c&oacute; mặt sau 30 ph&uacute;t kể từ l&uacute;c nhận được y&ecirc;u.</p>\r\n\r\n<p>- Được hỗ trợ c&aacute;c dịch vụ tư vấn miễn ph&iacute; về xấy dựng hệ thống server, tư vấn mua m&aacute;y t&iacute;nh, mua bản quyền...</p>\r\n\r\n<p>Ưu điểm: chi ph&iacute; thấp</p>\r\n\r\n<p><strong>C) g&oacute;i theo giờ.</strong></p>\r\n\r\n<p>H&igrave;nh thức l&agrave;m việc:</p>\r\n\r\n<p>Khi kh&aacute;ch h&agrave;ng c&oacute; y&ecirc;u cầu cần hỗ trợ xử l&yacute;, gọi trực tiếp tới c&ocirc;ng ty LAD, LAD sẽ cho người xuống hỗ trợ v&agrave; t&iacute;nh ph&iacute; tại thời điểm đ&oacute;.</p>\r\n',12,'Dich_vu_IT.png','Dich_vu_IT.png',NULL,NULL,1,'2017-03-12 15:28:42','root','2017-04-01 19:55:42','root',0),(3,'Máy chủ Bình Dương, Server Bình Dương','may-chu-binh-duong-server-binh-duong','Máy chủ Bình Dương, Server Bình Dương','Máy chủ Bình Dương, Server Bình Dương','Cung cấp tất cả các dòng máy chủ, server chính hãng, bảo hành 3 năm, có CO, CQ nhà sản xuất. hỗ trợ lắp đặt cấu hình, bảo hành tận nơi','<p>M&aacute;y chủ B&igrave;nh Dương. Trung t&acirc;m m&aacute;y chủ tại khu vực B&igrave;nh Dương, Đồng Nai, B&igrave;nh Phước, HCM. Chung t&ocirc;i chuy&ecirc;n cung cấp c&aacute;c loại m&aacute;y chủ (Server) ch&iacute;nh h&atilde;ng bảo h&agrave;nh 3 năm.<br />\r\nHỗ trợ lắp đặt c&agrave;i đặt, tư vẫn triển khai hệ thống lưu trữ dữ liệu, quản l&yacute; dữ liệu miễn ph&iacute;, Hỗ trợ tận nơi. H&agrave;ng h&oacute;a c&oacute; CO, CQ đầy đủ của h&atilde;ng cung cấp.</p>\r\n','<p><b>Ch&uacute;ng tối l&agrave; đối t&aacute;c của 3 h&atilde;ng m&aacute;y chủ tốt nhất hiện nay đ&oacute; l&agrave; HPE, DELL v&agrave; LENOVO.</b></p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i chuy&ecirc;n tư vấn giải ph&aacute;p server (giải ph&aacute;p m&aacute;y chủ), giải ph&aacute;p lưu trữ, giải ph&aacute;p quản l&yacute; dữ liệu cho doanh nghiệp:</p>\r\n\r\n<p>Giải ph&aacute;p m&aacute;y chủ. Để đầu tư v&agrave;o hệ thống quản l&yacute; dữ liệu th&ocirc;ng tin doanh nghiệp tổ chức một c&aacute;ch hiệu quả v&agrave;</p>\r\n\r\n<p>an to&agrave;n, một giải ph&aacute;p m&aacute;y chủ tổng qu&aacute;t cho qu&aacute; tr&igrave;nh ph&aacute;t triển cho doanh nghiệp l&agrave; một điều cực kỳ quan trong, nếu</p>\r\n\r\n<p>bạn kh&ocirc;ng c&oacute; một giải ph&aacute;p tổng thể v&agrave; hiệu quả th&igrave; c&oacute; thể năm nay bạn x&acirc;y dựng hệ thống m&aacute;y chủ th&igrave; 2 năm</p>\r\n\r\n<p>sau bạn c&oacute; thể phải vứt bỏ n&oacute; để xấy dựng một hệ thống mới v&igrave; hệ thống cũ kh&ocirc;ng đ&aacute;p ứng được nhu cầu của</p>\r\n\r\n<p>doanh nghiệp.</p>\r\n\r\n<p>C&ocirc;ng ty TNHH C&ocirc;ng Nghệ Th&ocirc;ng Tin Lam &Aacute;nh Dương tư vấn cung cấp tư vấn giải ph&aacute;p m&aacute;y chủ, lắp đặt v&agrave; triển</p>\r\n\r\n<p>khai c&aacute;c hệ thống m&aacute;y chủ đảm bảo an to&agrave;n dữ liệu, hiệu quả về kinh tế v&agrave; khả năng linh động về mở rộng trong tương lai.</p>\r\n\r\n<p>ch&iacute;nh h&atilde;ng t&iacute;ch hợp hệ thống quản l&yacute; dữ liệu, ứng dụng cho c&aacute;c doanh nghiệp, cơ quan dựa tr&ecirc;n nền tảng sản</p>\r\n\r\n<p>phẩm m&aacute;y chủ của c&aacute;c h&atilde;ng nổi tiếng như m&aacute;y chủ<strong>&nbsp;IBM, HP v&agrave; DELL</strong>.</p>\r\n\r\n<p><img alt=\"hp-dl80-g9-270x203\" height=\"203\" src=\"http://giaiphapits.com/images/hp-dl80-g9-270x203.png\" width=\"270\" /><img alt=\"hp-dl380p-g8-8sff-270x203\" height=\"203\" src=\"http://giaiphapits.com/images/hp-dl380p-g8-8sff-270x203.jpg\" width=\"270\" /></p>\r\n\r\n<p><img alt=\"Linh-kiện-máy-chủ-Server-và-cách-chọn-mua\" height=\"198\" src=\"http://giaiphapits.com/images/Linh-ki%E1%BB%87n-m%C3%A1y-ch%E1%BB%A7-Server-v%C3%A0-c%C3%A1ch-ch%E1%BB%8Dn-mua.jpg\" width=\"264\" /><img alt=\"images\" height=\"135\" src=\"http://giaiphapits.com/images/images.jpg\" width=\"322\" /></p>\r\n\r\n<p><img alt=\"dell poweredge 2970\" height=\"116\" src=\"http://giaiphapits.com/images/dell_poweredge_2970.jpg\" width=\"264\" /><img alt=\"images 1\" height=\"89\" src=\"http://giaiphapits.com/images/images_1.jpg\" width=\"297\" /></p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i với y&ecirc;u tố dịch vụ lu&ocirc;n đặt l&ecirc;n h&agrave;ng đầu, l&agrave; niệm tự h&agrave;o của c&ocirc;ng ty chũng t&ocirc;i, ch&uacute;ng t&ocirc;i cung cấp giải ph&aacute;p server với một chất lượng dịch vụ tốt nhất với c&aacute;c điều kiện bảo h&agrave;nh v&agrave; hỗ trợ như sau:</p>\r\n\r\n<p><strong>1. Tư vấn kh&aacute;ch h&agrave;ng về giải ph&aacute;p m&aacute;y chủ, giải ph&aacute;p lưu trữ, SAN, NAS...</strong></p>\r\n\r\n<p><strong>2. Tư vấn v&agrave; triển khai c&aacute;c hệ thống quản l&yacute; dữ liệu tr&ecirc;n m&aacute;y chủ như File Server, AD, Email....</strong></p>\r\n\r\n<p><strong>3. Hỗ trợ lắp đặt c&agrave;i đặt v&agrave; cấu h&igrave;nh server một c&aacute;ch ho&agrave;n chỉnh.</strong></p>\r\n\r\n<p><strong>4. Giao h&agrave;ng tận nơi, hương dẫn sử dụng chiết tiết.</strong></p>\r\n\r\n<p><strong>3. Bảo h&agrave;nh tận nơi cho kh&aacute;ch h&agrave;ng khi c&oacute; sự cố xẩy ra.</strong></p>\r\n\r\n<p><strong>4. C&oacute; Server thay thế tạm thời cho kh&aacute;ch h&agrave;ng sử dụng nếu h&agrave;ng h&oacute;a phải mang đi bảo h&agrave;nh.</strong></p>\r\n\r\n<p><strong>5. Tư vấn miễn ph&iacute;, nhận triển khai c&aacute;c hệ thống quản l&yacute; dữ liệu, back dữ liệu.</strong></p>\r\n\r\n<p><strong>6. Lu&ocirc;n lu&ocirc;n đặt v&agrave; chăm s&oacute;c kh&aacute;c h&agrave;ng tốt nhất c&oacute; thể</strong></p>\r\n\r\n<p>Với chất lượng dịch vụ, ch&uacute;ng t&ocirc;i cam kết sẽ mang đến cho qu&yacute; kh&aacute;ch h&agrave;ng một hệ thống server ổn định v&agrave; tốt nhất, hiệu quả nhất.</p>\r\n\r\n<p>H&atilde;y li&ecirc;n hệ với ch&uacute;ng t&ocirc;i để được tư vấn miễn ph&iacute;.</p>\r\n',12,'223-930.jpg','223-930.jpg',NULL,NULL,1,'2017-03-12 15:30:15','root','2017-06-06 08:52:55','root',0),(4,'máy chủ Bình Dương','may-chu-binh-duong','máy chủ bình dương','Máy chủ, server Bình Dương','Cung cấp máy chủ Dell, HP, Lenovo tại khu vực bình dương, bảo hành onsite chính hãng 3 năm','Cung cấp giải ph&aacute;p m&aacute;y chủ tại khu vực b&igrave;nh dương, m&aacute;y chủ ch&iacute;nh h&atilde;ng bảo h&agrave;nh 3 năm theo h&atilde;ng, bảo h&agrave;nh onsite.&nbsp;<br />\r\nM&aacute;y chủ Dell, M&aacute;y chủ HP, M&aacute;y chủ Lenovo','<p><b>Server IBM, Server HP,&nbsp;Server Dell,&nbsp;Giải ph&aacute;p Server cho doanh nghiệp</b></p>\r\n\r\n<p>Tư vấn giải ph&aacute;p server, giải ph&aacute;p lưu trữ, giải ph&aacute;p quản l&yacute; dữ liệu cho doanh nghiệp:</p>\r\n\r\n<p>Giải ph&aacute;p m&aacute;y chủ. Để đầu tư v&agrave;o hệ thống quản l&yacute; dữ liệu th&ocirc;ng tin doanh nghiệp tổ chức một c&aacute;ch hiệu quả v&agrave;</p>\r\n\r\n<p>an to&agrave;n, một giải ph&aacute;p m&aacute;y chủ tổng qu&aacute;t cho qu&aacute; tr&igrave;nh ph&aacute;t triển cho doanh nghiệp l&agrave; một điều cực kỳ quan trong, nếu</p>\r\n\r\n<p>bạn kh&ocirc;ng c&oacute; một giải ph&aacute;p tổng thể v&agrave; hiệu quả th&igrave; c&oacute; thể năm nay bạn x&acirc;y dựng hệ thống m&aacute;y chủ th&igrave; 2 năm</p>\r\n\r\n<p>sau bạn c&oacute; thể phải vứt bỏ n&oacute; để xấy dựng một hệ thống mới v&igrave; hệ thống cũ kh&ocirc;ng đ&aacute;p ứng được nhu cầu của</p>\r\n\r\n<p>doanh nghiệp.</p>\r\n\r\n<p>C&ocirc;ng ty TNHH C&ocirc;ng Nghệ Th&ocirc;ng Tin Lam &Aacute;nh Dương tư vấn cung cấp tư vấn giải ph&aacute;p m&aacute;y chủ, lắp đặt v&agrave; triển</p>\r\n\r\n<p>khai c&aacute;c hệ thống m&aacute;y chủ đảm bảo an to&agrave;n dữ liệu, hiệu quả về kinh tế v&agrave; khả năng linh động về mở rộng trong tương lai.</p>\r\n\r\n<p>ch&iacute;nh h&atilde;ng t&iacute;ch hợp hệ thống quản l&yacute; dữ liệu, ứng dụng cho c&aacute;c doanh nghiệp, cơ quan dựa tr&ecirc;n nền tảng sản</p>\r\n\r\n<p>phẩm m&aacute;y chủ của c&aacute;c h&atilde;ng nổi tiếng như m&aacute;y chủ<strong>&nbsp;IBM, HP v&agrave; DELL</strong>.&nbsp;<br />\r\n&nbsp;</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i với y&ecirc;u tố dịch vụ lu&ocirc;n đặt l&ecirc;n h&agrave;ng đầu, l&agrave; niệm tự h&agrave;o của c&ocirc;ng ty chũng t&ocirc;i, ch&uacute;ng t&ocirc;i cung cấp giải ph&aacute;p server với một chất lượng dịch vụ tốt nhất với c&aacute;c điều kiện bảo h&agrave;nh v&agrave; hỗ trợ như sau:</p>\r\n\r\n<p><strong>1. Tư vấn kh&aacute;ch h&agrave;ng về giải ph&aacute;p m&aacute;y chủ, giải ph&aacute;p lưu trữ, SAN, NAS...</strong></p>\r\n\r\n<p><strong>2. Tư vấn v&agrave; triển khai c&aacute;c hệ thống quản l&yacute; dữ liệu tr&ecirc;n m&aacute;y chủ như File Server, AD, Email....</strong></p>\r\n\r\n<p><strong>3. Hỗ trợ lắp đặt c&agrave;i đặt v&agrave; cấu h&igrave;nh server một c&aacute;ch ho&agrave;n chỉnh.</strong></p>\r\n\r\n<p><strong>4. Giao h&agrave;ng tận nơi, hương dẫn sử dụng chiết tiết.</strong></p>\r\n\r\n<p><strong>3. Bảo h&agrave;nh tận nơi cho kh&aacute;ch h&agrave;ng khi c&oacute; sự cố xẩy ra.</strong></p>\r\n\r\n<p><strong>4. C&oacute; Server thay thế tạm thời cho kh&aacute;ch h&agrave;ng sử dụng nếu h&agrave;ng h&oacute;a mang đi bảo h&agrave;nh.</strong></p>\r\n\r\n<p><strong>5. Tư vấn miễn ph&iacute;, nhận triển khai c&aacute;c hệ thống quản l&yacute; dữ liệu, back dữ liệu.</strong></p>\r\n\r\n<p><strong>6. Lu&ocirc;n lu&ocirc;n đặt v&agrave; chăm s&oacute;c kh&aacute;c h&agrave;ng tốt nhất c&oacute; thể</strong></p>\r\n\r\n<p>Với chất lượng dịch vụ, ch&uacute;ng t&ocirc;i cam kết sẽ mang đến cho qu&yacute; kh&aacute;ch h&agrave;ng một hệ thống server ổn định v&agrave; tốt nhất.</p>\r\n',12,'DL80_Gen9_E5-2620v3.jpg','DL80_Gen9_E5-2620v3.jpg',NULL,NULL,1,'2017-04-01 20:46:01','root','2017-04-01 21:44:50','root',0);

/*Table structure for table `ffm_blog_commets` */

DROP TABLE IF EXISTS `ffm_blog_commets`;

CREATE TABLE `ffm_blog_commets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` int(11) DEFAULT NULL,
  `blogid` int(11) DEFAULT NULL,
  `description` text,
  `datecreate` datetime DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_blogid` (`blogid`),
  KEY `idx_memberid` (`memberid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ffm_blog_commets` */

/*Table structure for table `ffm_blog_type` */

DROP TABLE IF EXISTS `ffm_blog_type`;

CREATE TABLE `ffm_blog_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blogtype_name` varchar(250) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `ishome` tinyint(1) DEFAULT '1',
  `ordering` int(11) DEFAULT '1',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_url` (`friendlyurl`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='loai blog';

/*Data for the table `ffm_blog_type` */

insert  into `ffm_blog_type`(`id`,`blogtype_name`,`friendlyurl`,`img`,`ishome`,`ordering`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (12,'Tin tức công nghệ','tin-tuc-cong-nghe',NULL,1,0,'2017-03-11 09:36:28','root','2017-03-11 09:38:05','root',0),(13,'Tin xã hội','tin-xa-hoi',NULL,1,1,'2017-03-12 15:26:17','root',NULL,NULL,0);

/*Table structure for table `ffm_blog_type_` */

DROP TABLE IF EXISTS `ffm_blog_type_`;

CREATE TABLE `ffm_blog_type_` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blogtype_name` varchar(250) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `ishome` tinyint(1) DEFAULT '1',
  `ordering` int(11) DEFAULT '1',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='loai blog';

/*Data for the table `ffm_blog_type_` */

/*Table structure for table `ffm_catalog` */

DROP TABLE IF EXISTS `ffm_catalog`;

CREATE TABLE `ffm_catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_name` varchar(250) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `default_img` varchar(250) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Catalog';

/*Data for the table `ffm_catalog` */

insert  into `ffm_catalog`(`id`,`catalog_name`,`friendlyurl`,`ordering`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`default_img`,`isdelete`) values (5,'iPhones','iphone',1,'2016-03-31 10:44:32','root',NULL,NULL,'ip6splus.png',0),(6,'Samsungs','samsung',2,'2016-03-31 10:44:32','root',NULL,NULL,'slide2.png',0),(7,'Smartphones','smartphone',3,'2016-03-31 10:44:32','root',NULL,NULL,'sell-phone-LG_G5.JPG',0),(8,'Tablets','tablet',4,'2016-03-31 10:44:32','root',NULL,NULL,'ipad_mini2.png',0);

/*Table structure for table `ffm_contact` */

DROP TABLE IF EXISTS `ffm_contact`;

CREATE TABLE `ffm_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` char(100) DEFAULT NULL,
  `company_name_2` char(100) DEFAULT NULL,
  `company_name_3` char(100) DEFAULT NULL,
  `phone` char(100) DEFAULT NULL,
  `phone_2` char(100) DEFAULT NULL,
  `phone_3` char(100) DEFAULT NULL,
  `hotline` char(70) DEFAULT NULL,
  `fax` char(100) DEFAULT NULL,
  `email` char(100) DEFAULT NULL,
  `email_2` char(100) DEFAULT NULL,
  `email_3` char(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `address_2` varchar(250) DEFAULT NULL,
  `address_3` varchar(250) DEFAULT NULL,
  `url_facebook` char(200) DEFAULT NULL,
  `url_google` char(200) DEFAULT NULL,
  `url_twitter` char(200) DEFAULT NULL,
  `url_youtube` char(200) DEFAULT NULL,
  `skype` char(70) DEFAULT NULL,
  `slogan` varchar(1000) DEFAULT NULL,
  `slogan2` varchar(5000) DEFAULT NULL,
  `google_address` varchar(500) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `mete_description` varchar(500) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `searchkey` varchar(250) DEFAULT NULL,
  `phone_contact` char(50) DEFAULT NULL,
  `phone_help` char(50) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_contact` */

insert  into `ffm_contact`(`id`,`company_name`,`company_name_2`,`company_name_3`,`phone`,`phone_2`,`phone_3`,`hotline`,`fax`,`email`,`email_2`,`email_3`,`address`,`address_2`,`address_3`,`url_facebook`,`url_google`,`url_twitter`,`url_youtube`,`skype`,`slogan`,`slogan2`,`google_address`,`meta_title`,`meta_keyword`,`mete_description`,`logo`,`searchkey`,`phone_contact`,`phone_help`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (1,'Công ty TNHH Firefuma','Minh Man Agricultural Mechanical CO.,LTD','有限责任公司胡志明市农业男人力学','0911 316 123 - 0978 59 59 49','Phone: 0909 358 538','电话: 0962258466 WECHAT ID: QUANGY123','0911 316 123','','contact@firefuma.com','Email: maygatminhman@gmail.com','电子邮件: maygatminhman@gmail.com','80/6 TX43, P. Thạnh Xuân, Q.12, TP. Hồ Chí Minh ','Address: 645 - Highway 13 - KP.3 - Hiep Binh Phuoc Ward - Thu Duc District - City. Ho Chi Minh','地址：645 - 高速公路13 - KP.3 - 协平福沃德 - 守德区 - 城市。胡志明市','#','#','#','#','#','Trao giá trị gửi niềm tin ','Chúng tôi luôn đặt chất lượng sản phẩm lên hàng đầu, chất lượng sản phẩm chúng tôi cung cấp là danh dự cho toàn doanh nghiệp chúng tôi. Sản phẩm bán ra đúng tiêu chuẩn của hãng sản xuất, bảo hành theo tiêu chuẩn của nhà sản xuất. Bên cạnh đó chúng tôi không thể bỏ qua dịch vụ chăm sóc khách hàng. Chúng tôi luôn tận tình hướng dẫn kỹ thuật, hướng dẫn bảo trì máy móc thiết bị theo tiêu chuẩn kỹ thuật tốt nhất để đảm bảo tuổi thọ của sản phẩm cao nhất có thể. Hãy một lần sử dụng sản phẩm và dịch vụ của chúng tối để được sử dụng dịch vụ tốt nhất của chúng tôi','#','Phần mêm bán hàng, phần mềm quản lý bảo hành','Phần mềm bán hàng, phần mềm bán cà phê, phần mềm quản lý nhà hàng, phần mềm quả lý bảo hành điện thoại điện máy','Phần mềm bán hàng, phần mềm bán cà phê, phần mềm quản lý nhà hàng, phần mềm quản lý khách sạn, phần mềm quả lý bảo hành điện thoại điện máy, phan mem quan ly ban hang, phan mem quan ly ban ca phe, phan mem quan ly nha hang, phan mem quan ly khach san','0','Phần mềm bán hàng','0911 316 123','0911 316 123','2016-04-23 23:26:08','root','2017-08-26 21:38:49','root',0);

/*Table structure for table `ffm_contacus` */

DROP TABLE IF EXISTS `ffm_contacus`;

CREATE TABLE `ffm_contacus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `fullname` char(50) DEFAULT NULL,
  `email` char(70) DEFAULT NULL,
  `phone` char(30) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `reply` varchar(1000) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_contacus` */

insert  into `ffm_contacus`(`id`,`title`,`fullname`,`email`,`phone`,`description`,`reply`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (4,NULL,'Son  Nguyen','khacson2504@gmail.com','0978595949','sdfdsf sdf sdfsd',NULL,'2016-11-22 21:42:36',NULL,NULL,NULL,0),(5,NULL,'Nguyễn Khắc Sơn','','0911316123','',NULL,NULL,NULL,NULL,NULL,0);

/*Table structure for table `ffm_customer` */

DROP TABLE IF EXISTS `ffm_customer`;

CREATE TABLE `ffm_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(250) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `website` char(70) DEFAULT NULL,
  `phone` char(50) DEFAULT NULL,
  `email` char(70) DEFAULT NULL,
  `ishome` tinyint(1) DEFAULT '1',
  `ordering` int(11) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='doi tac';

/*Data for the table `ffm_customer` */

insert  into `ffm_customer`(`id`,`customer_name`,`friendlyurl`,`img`,`website`,`phone`,`email`,`ishome`,`ordering`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (1,'Nhà khách UBND tỉnh Bình Dương','nha-khach-ubnd-tinh-binh-duong','nha-khch-binh-duong1.jpg','#','','',1,1,'2017-03-25 23:37:49','root','2017-03-25 23:43:10','root',0),(2,'Cửa Hàng VLXD Tùng Phát','cua-hang-vlxd-tung-phat','vatlieu.jpg','#','','',1,3,'2017-03-25 23:42:58','root',NULL,NULL,0),(3,'DNTN TM Dương Đức Tín','dntn-tm-duong-duc-tin','duong-duc-tin.jpg','#','','',1,2,'2017-03-25 23:44:17','root','2017-03-25 23:54:51','root',0),(4,'Công Ty TNHH MTV TMDV Kiến Ong','cong-ty-tnhh-mtv-tmdv-kien-ong','van-phong-pham-1.jpg','#','','',1,4,'2017-03-25 23:45:55','root','2017-03-25 23:51:27','root',0);

/*Table structure for table `ffm_groups` */

DROP TABLE IF EXISTS `ffm_groups`;

CREATE TABLE `ffm_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(100) NOT NULL,
  `params` varchar(8000) DEFAULT NULL,
  `grouptype` tinyint(1) DEFAULT NULL COMMENT '-1 Root, 0 admin, 1 Guest, 2 Manager, 3 user',
  `parentid` int(11) DEFAULT NULL,
  `isadmin` tinyint(1) DEFAULT '0',
  `department` varchar(255) DEFAULT NULL,
  `datecreate` datetime NOT NULL,
  `usercreate` char(50) NOT NULL,
  `ipcreate` char(25) DEFAULT NULL,
  `ipupdate` char(25) DEFAULT NULL,
  `userupdate` char(50) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_groups` */

insert  into `ffm_groups`(`id`,`groupname`,`params`,`grouptype`,`parentid`,`isadmin`,`department`,`datecreate`,`usercreate`,`ipcreate`,`ipupdate`,`userupdate`,`dateupdate`,`isdelete`) values (1,'Root','{\"20\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"51\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"50\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"39\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"55\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"37\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"27\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"47\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"57\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"58\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"60\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"61\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"24\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"52\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"},\"3\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\",\"right\":\"\"},\"4\":{\"view\":\"\",\"add\":\"\",\"edit\":\"\",\"delete\":\"\"}}',0,1,0,'','2013-07-01 08:57:48','root',NULL,'::1','root','2018-05-05 10:19:07',0);

/*Table structure for table `ffm_help` */

DROP TABLE IF EXISTS `ffm_help`;

CREATE TABLE `ffm_help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `about_title` varchar(250) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='gio thieu';

/*Data for the table `ffm_help` */

/*Table structure for table `ffm_menus` */

DROP TABLE IF EXISTS `ffm_menus`;

CREATE TABLE `ffm_menus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(250) DEFAULT NULL,
  `route` char(25) NOT NULL,
  `classicon` char(50) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `params` char(100) NOT NULL DEFAULT 'view,add,edit,delete',
  `keylang` char(100) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_parent` (`parent`),
  KEY `idx_router` (`route`),
  KEY `idx_menu_0` (`parent`,`isdelete`,`ordering`),
  KEY `idx_menu_1` (`parent`,`isdelete`,`route`,`ordering`),
  KEY `idx_name` (`name`),
  KEY `idx_name_en` (`name_en`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_menus` */

insert  into `ffm_menus`(`id`,`name`,`name_en`,`route`,`classicon`,`parent`,`params`,`keylang`,`ordering`,`isdelete`) values (1,'Quản trị','Admin','#','',0,'','quan-tri',19,0),(3,'Nhóm quyền','Add group','group','',1,'view,add,edit,delete,right','nhom-quyen',1,0),(4,'Tài khoản','Add user','user','',1,'view,add,edit,delete','nguoi-su-dung',2,0),(17,'Danh mục','Catalog','#','',0,'view,add,edit,delete',NULL,8,0),(20,'Sản phẩm','product','product','',45,'view,add,edit,delete',NULL,2,0),(24,'Tin tức','blog','blog','',31,'view,add,edit,delete',NULL,1,0),(27,'Thông tin công ty','Contact us','contactus','',36,'view,add,edit,delete',NULL,4,0),(31,'Tin tức','news','#','',0,'view,add,edit,delete',NULL,13,0),(36,'Liên hệ','Contac Us','#','',0,'view,add,edit,delete',NULL,9,0),(37,'Liên hệ','Contac Us','contact','',36,'view,add,edit,delete',NULL,1,0),(39,'Đối tác','Partner','partner','',17,'view,add,edit,delete',NULL,11,0),(45,'Sản phẩm','Product','#','',0,'view,add,edit,delete',NULL,6,0),(46,'Giới thiệu','About us','#','',0,'view,add,edit,delete',NULL,10,0),(47,'Giới thiệu công ty','About us','aboutus','',46,'view,add,edit,delete',NULL,1,0),(50,'Khách hàng','customer','customer','',17,'view,add,edit,delete',NULL,10,0),(51,'Dịch vụ','service','service','',45,'view,add,edit,delete',NULL,3,0),(52,'Loại tin tức','blog type','blogtype','',31,'view,add,edit,delete',NULL,2,0),(54,'Banner','Banner','banner','',8,'view,add,edit,delete',NULL,2,0),(55,'Bài viết','Posts','posts','',17,'view,add,edit,delete',NULL,13,0),(56,'Web','Web','#','',0,'view,add,edit,delete',NULL,11,0),(57,'Web','Web','web','',56,'view,add,edit,delete',NULL,1,0),(58,'Loại web','Web type','webtype','',56,'view,add,edit,delete',NULL,2,0),(59,'Hình ảnh','Web','#','',0,'view,add,edit,delete',NULL,12,0),(60,'Hỉnh ảnh','Picture','picture','',59,'view,add,edit,delete',NULL,1,0),(61,'Loại hình ảnh','Picture type','picturetype','',59,'view,add,edit,delete',NULL,2,0);

/*Table structure for table `ffm_partner` */

DROP TABLE IF EXISTS `ffm_partner`;

CREATE TABLE `ffm_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(250) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `website` char(70) DEFAULT NULL,
  `phone` char(50) DEFAULT NULL,
  `email` char(70) DEFAULT NULL,
  `ishome` tinyint(1) DEFAULT '1',
  `ordering` int(11) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='doi tac';

/*Data for the table `ffm_partner` */

insert  into `ffm_partner`(`id`,`partner_name`,`friendlyurl`,`img`,`website`,`phone`,`email`,`ishome`,`ordering`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (1,'DELL','dell','dell_2016_logo.png','','','',1,NULL,'2016-11-13 15:34:00','root','2017-05-23 08:35:29','root',0),(2,'HP','hp','HP.png','','','',1,NULL,'2016-11-13 15:34:09','root','2017-05-23 08:36:31','root',0),(3,'Lenovo','lenovo','Lenovo.gif','','','',1,NULL,'2016-11-13 15:34:16','root','2017-05-23 08:36:49','root',0),(4,'Kaspersky','kaspersky','Kaspersky1.png','','','',1,NULL,'2016-11-13 15:34:25','root','2017-05-23 08:37:53','root',0);

/*Table structure for table `ffm_picture` */

DROP TABLE IF EXISTS `ffm_picture`;

CREATE TABLE `ffm_picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `linkweb` char(100) DEFAULT NULL,
  `friendlyurl` varchar(250) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `mete_description` varchar(500) DEFAULT NULL,
  `description_sort` text,
  `description_long` text,
  `typeid` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `thumb` varchar(250) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '1' COMMENT '1 hien thi, 0 khong hien thi',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_url` (`friendlyurl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ffm_picture` */

/*Table structure for table `ffm_picturetype` */

DROP TABLE IF EXISTS `ffm_picturetype`;

CREATE TABLE `ffm_picturetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picturetype_name` varchar(250) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `ishome` tinyint(1) DEFAULT '1',
  `ordering` int(11) DEFAULT '1',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_url` (`friendlyurl`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='loai hình';

/*Data for the table `ffm_picturetype` */

insert  into `ffm_picturetype`(`id`,`picturetype_name`,`friendlyurl`,`img`,`ishome`,`ordering`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (1,'Phần mềm','phan-mem',NULL,1,1,'2018-05-05 10:23:07','root',NULL,NULL,0),(2,'APP','app',NULL,1,2,'2018-05-05 10:23:13','root',NULL,NULL,0),(3,'Web','web',NULL,1,3,'2018-05-05 10:23:18','root',NULL,NULL,0);

/*Table structure for table `ffm_postison` */

DROP TABLE IF EXISTS `ffm_postison`;

CREATE TABLE `ffm_postison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postison_name` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_postison` */

insert  into `ffm_postison`(`id`,`postison_name`) values (1,'Trang chủ - Giữa trang'),(2,'Điện thoại - Đầu trang'),(3,'Điện thoại - Sản phẩm - Đầu trang'),(4,'Phụ kiện - Đầu trang');

/*Table structure for table `ffm_posts` */

DROP TABLE IF EXISTS `ffm_posts`;

CREATE TABLE `ffm_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `friendlyurl` varchar(250) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `mete_description` varchar(500) DEFAULT NULL,
  `description_sort` text,
  `description_long` text,
  `typeid` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `thumb` varchar(250) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '1' COMMENT '1 hien thi, 0 khong hien thi',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ffm_posts` */

/*Table structure for table `ffm_posts_type` */

DROP TABLE IF EXISTS `ffm_posts_type`;

CREATE TABLE `ffm_posts_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blogtype_name` varchar(250) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `ishome` tinyint(1) DEFAULT '1',
  `ordering` int(11) DEFAULT '1',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='loai blog';

/*Data for the table `ffm_posts_type` */

/*Table structure for table `ffm_product` */

DROP TABLE IF EXISTS `ffm_product`;

CREATE TABLE `ffm_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `code` char(100) DEFAULT NULL,
  `price` double DEFAULT '0',
  `price_new` double DEFAULT '0',
  `producttypeid` int(11) DEFAULT '0',
  `friendlyurl` char(200) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `mete_description` varchar(500) DEFAULT NULL,
  `image` varchar(2000) DEFAULT NULL COMMENT 'cho up nhiu hinh theu mau san',
  `thumb` varchar(250) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '1',
  `isnew` tinyint(1) DEFAULT '1',
  `iskm` tinyint(1) DEFAULT '1',
  `isnb` tinyint(1) DEFAULT '1',
  `views` int(11) DEFAULT NULL,
  `url` char(100) DEFAULT NULL,
  `description_sort` text,
  `description_long` text,
  `ordering` int(11) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_manufacture` (`producttypeid`),
  KEY `idx_url` (`friendlyurl`)
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_product` */

insert  into `ffm_product`(`id`,`title`,`code`,`price`,`price_new`,`producttypeid`,`friendlyurl`,`meta_title`,`meta_keyword`,`mete_description`,`image`,`thumb`,`isshow`,`isnew`,`iskm`,`isnb`,`views`,`url`,`description_sort`,`description_long`,`ordering`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (1,'Phần mềm quản lý bán hàng',NULL,0,0,1,'phan-mem-quan-ly-ban-hang','','','','phan-mem-ban-hang.png','phan-mem-ban-hang.png',1,1,1,1,NULL,'http://monger.vn/','Quản l&yacute; qu&aacute;n c&agrave; ph&ecirc;, nh&agrave; h&agrave;ng, kh&aacute;ch sạn, shop thời trang, nội thất &amp; gia dụng, xe m&aacute;y &amp; linh kiện Quản l&yacute; nh&agrave; thuốc Vật liệu x&acirc;y dựng, văn ph&ograve;ng phẩm','',NULL,'2017-07-22 13:40:57','root','2017-08-26 17:23:53','root',0),(2,'Phần mềm quản lý bảo hành(Shopfoor)',NULL,0,0,1,'phan-mem-quan-ly-bao-hanh-shopfoor-','Phần mềm quản lý bảo hành','Phần mềm quản lý bảo hành, điện thoại, điện máy','Phần mềm quản lý bảo hành, điện thoại, điện máy','phan-mem-quan-ly-bao-hanh.png','phan-mem-quan-ly-bao-hanh.png',1,1,1,1,NULL,'http://shopfloor.firefuma.com/','Quản l&yacute; bảo h&agrave;nh điện thoại(đọc th&ocirc;ng tin model,serial, imei..., in barcode), quản l&yacute; b&aacute;n h&agrave;ng, linh kiện, tồn kho, thu chi','Quản l&yacute; bảo h&agrave;nh điện thoại(đọc th&ocirc;ng tin model,serial, imei..., in barcode), quản l&yacute; b&aacute;n h&agrave;ng, linh kiện, tồn kho, thu chi',NULL,'2017-08-26 17:11:03','root','2017-08-26 17:18:49','root',0),(256,'Phần mềm quản lý nhân sự',NULL,0,0,1,'phan-mem-quan-ly-nhan-su','Phần mềm quản lý nhân sự','Phần mềm quản lý nhân sự, tiền lương','Phần mềm quản lý nhân sự, tiền lương','phan_mem_quan_ly_nhan_su.jpg','phan_mem_quan_ly_nhan_su.jpg',1,1,1,1,NULL,'#','Hệ thống chuy&ecirc;n dụng cho việc tự cấu h&igrave;nh c&ocirc;ng thức lương dựa theo bảng c&ocirc;ng, cổng th&ocirc;ng tin nh&acirc;n sự, gi&uacute;p cho việc đăng k&yacute; nghỉ online hay xem b&aacute;o c&aacute;o động','Hệ thống chuy&ecirc;n dụng cho việc tự cấu h&igrave;nh c&ocirc;ng thức lương dựa theo bảng c&ocirc;ng, cổng th&ocirc;ng tin nh&acirc;n sự, gi&uacute;p cho việc đăng k&yacute; nghỉ online hay xem b&aacute;o c&aacute;o động',NULL,'2017-08-26 17:11:06','root','2017-08-26 17:18:23','root',0);

/*Table structure for table `ffm_producttype` */

DROP TABLE IF EXISTS `ffm_producttype`;

CREATE TABLE `ffm_producttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producttype_name` varchar(250) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `parentid` int(11) DEFAULT '0',
  `img` varchar(250) DEFAULT NULL,
  `background` char(6) DEFAULT NULL,
  `ishome` tinyint(1) DEFAULT '1',
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `mete_description` varchar(500) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='loai san pham';

/*Data for the table `ffm_producttype` */

insert  into `ffm_producttype`(`id`,`producttype_name`,`friendlyurl`,`parentid`,`img`,`background`,`ishome`,`meta_title`,`meta_keyword`,`mete_description`,`ordering`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (1,'N/A',NULL,0,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0);

/*Table structure for table `ffm_province` */

DROP TABLE IF EXISTS `ffm_province`;

CREATE TABLE `ffm_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countryid` int(11) DEFAULT '1',
  `province_name` varchar(150) DEFAULT NULL,
  `friendlyurl` char(150) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `usercreate` char(50) NOT NULL,
  `datecreate` datetime NOT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(50) DEFAULT NULL,
  `isdelete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_province` */

insert  into `ffm_province`(`id`,`countryid`,`province_name`,`friendlyurl`,`icon`,`ordering`,`status`,`usercreate`,`datecreate`,`dateupdate`,`userupdate`,`isdelete`) values (1,1,'TP. Hồ Chí Minh','tp-ho-chi-minh',NULL,1,1,'','0000-00-00 00:00:00',NULL,NULL,0),(2,1,'TP. Hà Nội','tp-ha-noi',NULL,2,1,'','0000-00-00 00:00:00',NULL,NULL,0),(3,1,'TP. Đà Nẵng','tp-da-nang',NULL,3,1,'admin','2013-01-03 16:36:18',NULL,NULL,0),(4,1,'TP. Hải Phòng','tp-hai-phong',NULL,4,1,'admin','2013-01-03 16:39:30',NULL,NULL,0),(5,1,'TP. Cần Thơ','tp-can-tho',NULL,5,1,'admin','2013-01-03 16:43:25',NULL,NULL,0),(6,1,'Bắc Giang','bac-giang',NULL,62,1,'admin','2013-01-03 16:43:43',NULL,NULL,0),(8,1,'Bắc Kạn','bac-kan',NULL,60,1,'admin','2013-01-03 16:44:18',NULL,NULL,0),(9,1,'Lạng Sơn','lang-son',NULL,59,1,'admin','2013-01-03 16:44:32',NULL,NULL,0),(10,1,'Cao Bằng','cao-bang',NULL,58,1,'admin','2013-01-03 16:44:54',NULL,NULL,0),(11,1,'Hà Giang','ha-giang',NULL,57,1,'admin','2013-01-03 16:45:06',NULL,NULL,0),(12,1,'Lào Cai','lao-cai',NULL,56,1,'admin','2013-01-03 16:45:17',NULL,NULL,0),(13,1,'Lai Châu','lai-chau',NULL,55,1,'admin','2013-01-03 16:46:04',NULL,NULL,0),(14,1,'Tuyên Quang','tuyen-quang',NULL,54,1,'admin','2013-01-03 16:46:17',NULL,NULL,0),(15,1,'Yên Bái','yen-bai',NULL,53,1,'admin','2013-01-03 16:46:27',NULL,NULL,0),(16,1,'Thái Nguyên','thai-nguyen',NULL,52,1,'admin','2013-01-03 16:46:37',NULL,NULL,0),(17,1,'Phú Thọ','phu-tho',NULL,51,1,'admin','2013-01-03 16:46:48',NULL,NULL,0),(18,1,'Sơn La','son-la',NULL,50,1,'admin','2013-01-03 16:46:58',NULL,NULL,0),(19,1,'Vĩnh Phúc','vinh-phuc',NULL,49,1,'admin','2013-01-03 16:47:12',NULL,NULL,0),(20,1,'Quảng Ninh','quang-ninh',NULL,48,1,'admin','2013-01-03 16:47:23',NULL,NULL,0),(21,1,'Hải Dương','hai-duong',NULL,47,1,'admin','2013-01-03 16:47:32',NULL,NULL,0),(22,1,'Hưng Yên','hung-yen',NULL,46,1,'admin','2013-01-03 16:47:45',NULL,NULL,0),(23,1,'Hòa Bình','hoa-binh',NULL,45,1,'admin','2013-01-03 16:48:00',NULL,NULL,0),(24,1,'Hà Nam','ha-nam',NULL,44,1,'admin','2013-01-03 16:48:09',NULL,NULL,0),(25,1,'Thái Bình','thai-binh',NULL,43,1,'admin','2013-01-03 16:48:23',NULL,NULL,0),(26,1,'Ninh Bình','ninh-binh',NULL,42,1,'admin','2013-01-03 16:49:07',NULL,NULL,0),(27,1,'Nam Định','nam-dinh',NULL,41,1,'admin','2013-01-03 16:49:17',NULL,NULL,0),(28,1,'Thanh Hóa','thanh-hoa',NULL,40,1,'admin','2013-01-03 16:49:28',NULL,NULL,0),(29,1,'Nghệ An','nghe-an',NULL,39,1,'admin','2013-01-03 16:49:38',NULL,NULL,0),(30,1,'Hà Tĩnh','ha-tinh',NULL,38,1,'admin','2013-01-03 16:49:50',NULL,NULL,0),(31,1,'Quảng Bình','quang-binh',NULL,37,1,'admin','2013-01-03 16:50:02',NULL,NULL,0),(32,1,'Quảng Trị','quang-tri',NULL,36,1,'admin','2013-01-03 16:50:27',NULL,NULL,0),(33,1,'Thừa Thiên Huế','thua-thien-hue',NULL,35,1,'admin','2013-01-03 16:50:55',NULL,NULL,0),(34,1,'Quảng Nam','quang-nam',NULL,34,1,'admin','2013-01-03 16:51:09',NULL,NULL,0),(35,1,'Quảng Ngãi','quang-ngai',NULL,33,1,'admin','2013-01-03 16:51:24',NULL,NULL,0),(36,1,'Kon Tum','kon-tum',NULL,32,1,'admin','2013-01-03 16:51:33',NULL,NULL,0),(37,1,'Bình Định','binh-dinh',NULL,31,1,'admin','2013-01-03 16:51:41',NULL,NULL,0),(38,1,'Gia Lai','gia-lai',NULL,30,1,'admin','2013-01-03 16:51:54',NULL,NULL,0),(39,1,'Phú Yên','phu-yen',NULL,29,1,'admin','2013-01-03 16:52:04',NULL,NULL,0),(40,1,'Đắk Lắk','dak-lak',NULL,28,1,'admin','2013-01-03 16:52:13',NULL,NULL,0),(41,1,'Đắk Nông','dak-nong',NULL,27,1,'admin','2013-01-03 16:52:22',NULL,NULL,0),(42,1,'Khánh Hòa','khanh-hoa',NULL,26,1,'admin','2013-01-03 16:52:32',NULL,NULL,0),(43,1,'Ninh Thuận','ninh-thuan',NULL,25,1,'admin','2013-01-03 16:52:41',NULL,NULL,0),(44,1,'Lâm Đồng','lam-dong',NULL,24,1,'admin','2013-01-03 16:52:49',NULL,NULL,0),(45,1,'Bình Phước','binh-phuoc',NULL,23,1,'admin','2013-01-03 16:52:59',NULL,NULL,0),(46,1,'Bình Thuận','binh-thuan',NULL,22,1,'admin','2013-01-03 16:53:14',NULL,NULL,0),(47,1,'Đồng Nai','dong-nai',NULL,21,1,'admin','2013-01-03 16:53:25',NULL,NULL,0),(48,1,'Tây Ninh','tay-ninh',NULL,20,1,'admin','2013-01-03 16:53:36',NULL,NULL,0),(49,1,'Bình Dương','binh-duong',NULL,19,1,'admin','2013-01-03 16:53:47',NULL,NULL,0),(50,1,'Bà Rịa Vũng Tàu','ba-ria-vung-tau',NULL,18,1,'admin','2013-01-03 16:53:59',NULL,NULL,0),(51,1,'Long An','long-an',NULL,17,1,'admin','2013-01-03 16:54:52',NULL,NULL,0),(52,1,'Đồng Tháp','dong-thap',NULL,16,1,'admin','2013-01-03 16:55:01','2016-07-24 21:34:50','nova',0),(53,1,'Tiền Giang','tien-giang',NULL,15,1,'admin','2013-01-03 16:55:09',NULL,NULL,0),(54,1,'An Giang','an-giang',NULL,14,1,'admin','2013-01-03 16:55:22',NULL,NULL,0),(55,1,'Kiên Giang','kien-giang',NULL,13,1,'admin','2013-01-03 16:55:31',NULL,NULL,0),(56,1,'Vĩnh Long','vinh-long',NULL,12,1,'admin','2013-01-03 16:55:40',NULL,NULL,0),(57,1,'Bến Tre','ben-tre',NULL,11,1,'admin','2013-01-03 16:55:55',NULL,NULL,0),(58,1,'Trà Vinh','tra-vinh',NULL,10,1,'admin','2013-01-03 16:56:09',NULL,NULL,0),(59,1,'Bắc Ninh','bac-ninh',NULL,9,1,'admin','2013-01-03 16:56:21',NULL,NULL,0),(60,1,'Hậu Giang','hau-giang',NULL,8,1,'admin','2013-01-03 16:56:29',NULL,NULL,0),(61,1,'Sóc Trăng','soc-trang',NULL,7,1,'admin','2013-01-03 16:56:37',NULL,NULL,0),(62,1,'Bạc Liêu','bac-lieu',NULL,6,1,'admin','2013-01-03 16:56:49',NULL,NULL,0),(63,1,'Cà Mau','ca-mau',NULL,5,1,'admin','2013-01-03 16:56:58','2015-12-22 22:52:39','root',0);

/*Table structure for table `ffm_service` */

DROP TABLE IF EXISTS `ffm_service`;

CREATE TABLE `ffm_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `friendlyurl` varchar(250) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `mete_description` varchar(500) DEFAULT NULL,
  `description_sort` text,
  `description_long` text,
  `image` varchar(250) DEFAULT NULL,
  `thumb` varchar(250) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '1' COMMENT '1 hien thi, 0 khong hien thi',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_url` (`friendlyurl`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_service` */

insert  into `ffm_service`(`id`,`title`,`friendlyurl`,`meta_title`,`meta_keyword`,`mete_description`,`description_sort`,`description_long`,`image`,`thumb`,`views`,`ordering`,`isshow`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (6,'Xây dựng giải pháp doanh nghiệp','xay-dung-giai-phap-doanh-nghiep','','','','Với sự ph&aacute;t triển của khoa học c&ocirc;ng nghệ, c&aacute;ch mạng c&ocirc;ng nghiệp 4.0 được dự đo&aacute;n sẽ chuyển h&oacute;a to&agrave;n bộ thế giới thực sang thế giới số. Qua đ&oacute;, n&oacute; sẽ g&oacute;p phần thay đổi to&agrave;n diện cuộc sống của con người ở tất cả c&aacute;c lĩnh vực, từ kinh tế - văn h&oacute;a - x&atilde; hội.','','giaphapdoanhnghip1.jpg','giaphapdoanhnghip.jpg',NULL,NULL,1,'2018-05-03 08:42:14','root','2018-05-03 09:02:27','root',0),(7,'Thiết kế phần mềm theo yêu câu','thiet-ke-phan-mem-theo-yeu-cau','','','','Gia c&ocirc;ng phần mềm, viết phần mềm theo y&ecirc;u cầu, phần mềm quản l&yacute; doanh nghiệp, quản l&yacute; b&aacute;n h&agrave;ng, Quản l&yacute; sản xuất, phần mềm quản l&yacute; kho, Quản l&yacute; nh&acirc;n sự tiền lương... Ch&uacute;ng t&ocirc;i c&oacute; thể đ&aacute;p ứng hầu hết c&aacute;c lĩnh vực theo y&ecirc;u cầu của kh&aacute;ch h&agrave;ng.','','phanmem.png','phanmem.png',NULL,NULL,1,'2018-05-03 08:42:34','root','2018-05-03 09:02:19','root',0),(8,'Xây dựng website','xay-dung-website','','','','Một website đẹp, chuy&ecirc;n nghiệp được hỗ trợ SEO sẽ l&agrave;m tăng lượng kh&aacute;ch h&agrave;ng v&agrave; thương hiệu doanh nghiệp. Với c&ocirc;ng nghệ mới nhất hiện nay ch&uacute;ng t&ocirc;i lu&ocirc;n đảm bảo cho website của bạn một c&aacute;ch chuy&ecirc;n nghiệp nhất.','','website.png','website1.png',NULL,NULL,1,'2018-05-03 08:43:01','root','2018-05-03 09:02:06','root',0);

/*Table structure for table `ffm_slide_top` */

DROP TABLE IF EXISTS `ffm_slide_top`;

CREATE TABLE `ffm_slide_top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(250) DEFAULT NULL,
  `description` text,
  `img` varchar(250) DEFAULT NULL,
  `thumb_img` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_slide_top` */

insert  into `ffm_slide_top`(`id`,`slide_name`,`description`,`img`,`thumb_img`,`url`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (3,'Laptop,PC','Laptop DELL, Laptop HP, Laptop ASUS, Laptop LENOVO','Help-Me-Choose-Laptop-Page-Banner.jpg',NULL,'http://www.lamanhduong.com/san-pham/laptop','2017-03-27 09:56:04','root','2017-04-02 08:43:51','root',1),(4,'Server, máy chủ','M&aacute;y chủ dell, server dell, Server hp, m&aacute;y chủ hp, server lenovo, m&aacute;y chủ lenovo','Server_dell.jpg',NULL,'http://www.lamanhduong.com/san-pham/server','2017-03-27 09:59:51','root',NULL,NULL,0),(5,'máy bộ','m&aacute;y t&iacute;nh bộ','PC.jpg',NULL,'http://www.lamanhduong.com/san-pham/pc','2017-03-27 10:02:41','root',NULL,NULL,0);

/*Table structure for table `ffm_supplier` */

DROP TABLE IF EXISTS `ffm_supplier`;

CREATE TABLE `ffm_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(250) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `supplier_image` varchar(250) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='nha mang';

/*Data for the table `ffm_supplier` */

insert  into `ffm_supplier`(`id`,`supplier_name`,`friendlyurl`,`supplier_image`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (1,'Verizon','verizon','carrier_verizon.png','2016-03-31 10:44:32','root',NULL,NULL,0),(2,'AT&T','att','carrier_att.png','2016-03-31 10:44:32','root',NULL,NULL,0),(3,'T-Mobile','t-mobile','carrier_tmobile.png','2016-03-31 10:44:32','root',NULL,NULL,0),(4,'Sprint','sprint','carrier_sprint.png','2016-03-31 10:44:32','root',NULL,NULL,0),(5,'Unlocked','unlocked','carrier_unlocked.png','2016-03-31 10:44:32','root',NULL,NULL,0);

/*Table structure for table `ffm_support` */

DROP TABLE IF EXISTS `ffm_support`;

CREATE TABLE `ffm_support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_name` char(200) DEFAULT NULL,
  `fullname` char(200) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_url` (`fullname`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='nha san xuat';

/*Data for the table `ffm_support` */

insert  into `ffm_support`(`id`,`title_name`,`fullname`,`phone`,`ordering`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (7,'Tư vấn bán hàng 1','Ms Lam','0650-6502465',1,'2017-03-11 15:18:29','root','2017-06-02 08:21:54','root',0),(8,'Tư vấn bán hàng 2','Mr Dương','0909851420',2,'2017-03-11 15:19:00','root','2017-06-02 08:33:21','root',0);

/*Table structure for table `ffm_users` */

DROP TABLE IF EXISTS `ffm_users`;

CREATE TABLE `ffm_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `groupid` int(10) DEFAULT NULL,
  `username` char(50) DEFAULT NULL,
  `password` char(100) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` char(50) DEFAULT NULL,
  `email` char(100) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `country` char(50) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT '0',
  `activate` tinyint(1) DEFAULT '1',
  `approve_permission` tinyint(1) DEFAULT '0',
  `supervisor` tinyint(1) DEFAULT '0',
  `signature` varchar(250) DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `datecreate` datetime DEFAULT '0000-00-00 00:00:00',
  `dateupdate` datetime DEFAULT '0000-00-00 00:00:00',
  `userupdate` char(70) DEFAULT NULL,
  `ipcreate` char(25) DEFAULT NULL,
  `ipupdate` char(25) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  `account_type` varchar(10) DEFAULT 'local',
  PRIMARY KEY (`id`),
  KEY `idx_username` (`username`),
  KEY `idx_isdelete` (`isdelete`),
  KEY `idx_dept` (`department`,`isdelete`),
  KEY `idx_dept_username_isd` (`isdelete`,`department`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_users` */

insert  into `ffm_users`(`id`,`groupid`,`username`,`password`,`fullname`,`address`,`mobile`,`email`,`department`,`image`,`country`,`gender`,`activate`,`approve_permission`,`supervisor`,`signature`,`usercreate`,`datecreate`,`dateupdate`,`userupdate`,`ipcreate`,`ipupdate`,`lastlogin`,`isdelete`,`account_type`) values (1,1,'root','ce88541c1e6280dfee8eb5cae1f6e56b202cb962ac59075b964b07152d234b70','Administrator','','909851420','duong.pham@giaiphapits.com',0,'','Vietnam',1,1,0,0,'Koala.jpg','nghianguyen','2012-12-05 11:24:56','2017-08-26 17:36:38','root',NULL,'::1','2015-10-05 15:31:00',0,'local');

/*Table structure for table `ffm_web` */

DROP TABLE IF EXISTS `ffm_web`;

CREATE TABLE `ffm_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `linkweb` char(100) DEFAULT NULL,
  `friendlyurl` varchar(250) DEFAULT NULL,
  `meta_title` varchar(500) DEFAULT NULL,
  `meta_keyword` varchar(500) DEFAULT NULL,
  `mete_description` varchar(500) DEFAULT NULL,
  `description_sort` text,
  `description_long` text,
  `typeid` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `thumb` varchar(250) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `isshow` tinyint(1) DEFAULT '1' COMMENT '1 hien thi, 0 khong hien thi',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_url` (`friendlyurl`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `ffm_web` */

insert  into `ffm_web`(`id`,`title`,`linkweb`,`friendlyurl`,`meta_title`,`meta_keyword`,`mete_description`,`description_sort`,`description_long`,`typeid`,`image`,`thumb`,`views`,`ordering`,`isshow`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (1,'Dreamholidays.vn','','dreamholidays-vn','','','','#','#',1,'Dreamholidays_vn.jpg','Dreamholidays_vn1.jpg',NULL,NULL,1,'2018-05-05 09:44:33','root','2018-05-05 10:07:04','root',0),(2,'Regentbay.vn','','regentbay-vn','','','','#','#',1,'regentbay_vn.jpg','regentbay_vn1.jpg',NULL,NULL,1,'2018-05-05 09:47:31','root','2018-05-05 10:06:54','root',0);

/*Table structure for table `ffm_webtype` */

DROP TABLE IF EXISTS `ffm_webtype`;

CREATE TABLE `ffm_webtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webtype_name` varchar(250) DEFAULT NULL,
  `friendlyurl` char(200) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `ishome` tinyint(1) DEFAULT '1',
  `ordering` int(11) DEFAULT '1',
  `datecreate` datetime DEFAULT NULL,
  `usercreate` char(70) DEFAULT NULL,
  `dateupdate` datetime DEFAULT NULL,
  `userupdate` char(70) DEFAULT NULL,
  `isdelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_url` (`friendlyurl`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='loai blog';

/*Data for the table `ffm_webtype` */

insert  into `ffm_webtype`(`id`,`webtype_name`,`friendlyurl`,`img`,`ishome`,`ordering`,`datecreate`,`usercreate`,`dateupdate`,`userupdate`,`isdelete`) values (1,'Du lịch','du-lich',NULL,1,1,'2018-05-05 09:32:32','root','2018-05-05 09:52:45','root',0),(2,'Bán hàng','ban-hang',NULL,1,2,'2018-05-05 09:32:42','root',NULL,NULL,0),(3,'Tin tức','tin-tuc',NULL,1,3,'2018-05-05 09:32:48','root',NULL,NULL,0),(4,'Xây dựng','xay-dung',NULL,1,4,'2018-05-05 09:32:59','root',NULL,NULL,0),(5,'Bất động sản','bat-dong-san',NULL,1,5,'2018-05-05 09:35:02','root',NULL,NULL,0),(6,'Thương mại điện tử','thuong-mai-dien-tu',NULL,1,6,'2018-05-05 09:35:14','root',NULL,NULL,0),(7,'Giới thiệu công ty','gioi-thieu-cong-ty',NULL,1,7,'2018-05-05 09:35:21','root',NULL,NULL,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
