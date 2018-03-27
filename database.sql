-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(120) NOT NULL,
  `cat_type` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_type`) VALUES
(10,	'New',	'blog_post'),
(11,	'Habib',	'blog_post'),
(13,	'Design',	'portfolio'),
(14,	'Web Dev',	'portfolio');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `post_type` varchar(120) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `details` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL,
  `image` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `title`, `slug`, `post_type`, `cat_id`, `details`, `created_at`, `status`, `image`) VALUES
(2,	'Web Dev',	'',	'home_service',	NULL,	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse tempore ipsam iusto omnis, reiciendis, libero sapiente labore, unde non, illo fugit voluptate laboriosam sit? Eum voluptates voluptatum quasi vel quaerat?\r\n',	'2018-03-25 10:34:31',	'1',	'fa-asterisk'),
(3,	'Web Design',	'',	'home_service',	NULL,	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse tempore ipsam iusto omnis, reiciendis, libero sapiente labore, unde non, illo fugit voluptate laboriosam sit? Eum voluptates voluptatum quasi vel quaerat?\r\n',	'2018-03-25 10:34:49',	'1',	'fa-edit'),
(4,	'Clean & Responsive',	'',	'home_slider',	NULL,	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse tempore ipsam iusto omnis, reiciendis, libero sapiente labore, unde non, illo fugit voluptate laboriosam sit? Eum voluptates voluptatum quasi vel quaerat?\r\n',	'2018-03-25 10:35:08',	'1',	'slider-1521952508-87774.jpg'),
(5,	'Modern Design',	'',	'home_slider',	NULL,	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse tempore ipsam iusto omnis, reiciendis, libero sapiente labore, unde non, illo fugit voluptate laboriosam sit? Eum voluptates voluptatum quasi vel quaerat?\r\n',	'2018-03-25 10:35:25',	'1',	'slider-1521952525-74739.jpg'),
(8,	'Business Card',	'',	'portfolio',	13,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.',	'2018-03-26 22:48:54',	'1',	'post-1522082933-45536.jpg'),
(9,	'Diploma',	'',	'portfolio',	14,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis',	'2018-03-26 22:58:21',	'1',	'post-1522083501-89737.jpg'),
(13,	'Modern Design',	'modern-design',	'blog_post',	10,	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse tempore ipsam iusto omnis, reiciendis, libero sapiente labore, unde non, illo fugit voluptate laboriosam sit? Eum voluptates voluptatum quasi vel quaerat?\r\n',	'2018-03-26 23:11:39',	'1',	'post-1522084299-13699.jpg'),
(14,	'New Post',	'new-post',	'blog_post',	10,	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse tempore ipsam iusto omnis, reiciendis, libero sapiente labore, unde non, illo fugit voluptate laboriosam sit? Eum voluptates voluptatum quasi vel quaerat?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse tempore ipsam iusto omnis, reiciendis, libero sapiente labore, unde non, illo fugit voluptate laboriosam sit? Eum voluptates voluptatum quasi vel quaerat?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Esse tempore ipsam iusto omnis, reiciendis, libero sapiente labore, unde non, illo fugit voluptate laboriosam sit? Eum voluptates voluptatum quasi vel quaerat?',	'2018-03-26 23:46:03',	'1',	'post-1522086363-49792.jpg'),
(15,	'This is Another Post',	'this-is-another-post',	'blog_post',	10,	'<p><strong> Lorem&nbsp;</strong>ipsum dolor sit amet,<span style=\"font-size: 14px;\"> consectetur adipisicing elit. Enim animi possimus rerum nisi voluptate facilis, nam! Veniam voluptatibus, obcaecati, similique voluptatum, tempora dolores ipsum ratione velit aliquam dolore architecto, delectus?</span></p>\r\n<p>&nbsp;</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim animi possimus rerum nisi voluptate facilis, nam! Veniam voluptatibus, obcaecati, similique voluptatum, tempora dolores ipsum ratione velit aliquam dolore architecto, delectus?</p>',	'2018-03-26 23:57:25',	'1',	'post-1522087045-85089.jpg');

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_type` varchar(50) NOT NULL,
  `data_key` varchar(50) NOT NULL,
  `data_value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_key` (`data_key`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO `settings` (`id`, `data_type`, `data_key`, `data_value`) VALUES
(1,	'site_setting',	'ws_name',	'RainDrops'),
(3,	'site_setting',	'ws_menu',	'fixed'),
(4,	'site_setting',	'ws_address',	'East Panthopath, West RajaBazar, Dhaka'),
(5,	'site_setting',	'ws_phone',	'01712345678'),
(6,	'site_setting',	'ws_email',	'msar.akash@gmail.com'),
(9,	'site_setting',	'ws_skin',	'indigo'),
(10,	'site_content',	'ws_hcta',	'<span>Moderna</span> My HTML Business Template.'),
(11,	'site_content',	'ws_footer_credit',	' All right reserved.'),
(13,	'site_content',	'ws_sl_fb',	'https://www.facebook.com/'),
(14,	'site_setting',	'ws_sl_tt',	'https://twitter.com/4msar'),
(15,	'site_content',	'ws_c_lat',	'23.2374064'),
(16,	'site_content',	'ws_c_lng',	'90.4083639'),
(17,	'site_content',	'ws_gmap_api',	'AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY'),
(18,	'site_content',	'ws_flickr',	'10656850@N00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `role` varchar(50) CHARACTER SET utf8 NOT NULL,
  `avator` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  KEY `role` (`role`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `username`, `password`, `role`, `avator`, `created_at`) VALUES
(1,	'Saiful Alam Rakib',	'01517865532',	'120msar@gmail.com',	'admin',	'efca89071967d22fc2a5dc5667b37a98',	'admin',	'user-1521560264-74159.png',	'2018-03-01 21:02:13'),
(2,	'Raju Ahmed',	'01745758558',	'raju@gmail.com',	'raju',	'762a86377d999662c657abb258ffeb83',	'user',	'user-1521560276-63741.png',	'2018-03-20 19:13:43');

-- 2018-03-26 19:21:00
