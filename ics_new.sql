/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : ics_new

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2015-11-24 18:23:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for company
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `company_country` varchar(255) DEFAULT NULL,
  `company_add_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('1', 'Simura Group', null, '2015-10-11 12:27:01');
INSERT INTO `company` VALUES ('2', 'Simura Nonwovens Limited', null, '2015-10-11 12:27:04');

-- ----------------------------
-- Table structure for costing_by_user
-- ----------------------------
DROP TABLE IF EXISTS `costing_by_user`;
CREATE TABLE `costing_by_user` (
  `costing_id` int(11) NOT NULL AUTO_INCREMENT,
  `costing_user_id` int(11) unsigned DEFAULT NULL,
  `costing_user_ppnw` int(11) DEFAULT NULL,
  `costing_user_woven` int(11) DEFAULT NULL,
  `costing_user_jute` int(11) DEFAULT NULL,
  `costing_user_leather` int(11) DEFAULT NULL,
  PRIMARY KEY (`costing_id`),
  KEY `fk_costing_user_id` (`costing_user_id`),
  KEY `fk_costing_user_ppnw_id` (`costing_user_ppnw`),
  KEY `fk_costing_user_woven_id` (`costing_user_woven`),
  CONSTRAINT `fk_costing_user_id` FOREIGN KEY (`costing_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_costing_user_ppnw_id` FOREIGN KEY (`costing_user_ppnw`) REFERENCES `ppnw_costing` (`ics_order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_costing_user_woven_id` FOREIGN KEY (`costing_user_woven`) REFERENCES `woven_costing` (`tbl_woven_order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of costing_by_user
-- ----------------------------
INSERT INTO `costing_by_user` VALUES ('1', '1', '57', null, null, null);
INSERT INTO `costing_by_user` VALUES ('6', '1', null, '1', null, null);

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(255) DEFAULT NULL,
  `employee_phone` int(11) DEFAULT NULL,
  `employee_email` varchar(255) DEFAULT NULL,
  `employee_birth_date` date DEFAULT NULL,
  `employee_join_date` date DEFAULT NULL,
  `employee_blood_group` varchar(255) DEFAULT NULL,
  `employee_picture_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('2', 'Ziauddin', '1720223388', 'webdesigner@simuragroup.com', '1987-11-20', '2015-03-01', 'B-', '1');
INSERT INTO `employee` VALUES ('3', 'Timir ', null, 'timir@simuragroup.com', null, null, null, '1');
INSERT INTO `employee` VALUES ('4', 'Rajib Hossain', null, 'rhossain@simuragroup.com', null, null, null, '1');

-- ----------------------------
-- Table structure for employee_picture
-- ----------------------------
DROP TABLE IF EXISTS `employee_picture`;
CREATE TABLE `employee_picture` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `image_size` varchar(255) DEFAULT NULL,
  `image_ext` varchar(255) DEFAULT NULL,
  `full_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of employee_picture
-- ----------------------------
INSERT INTO `employee_picture` VALUES ('1', '5100d142c8bdfba480e2cfba79b8305c.jpg', '189.64', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/employee/5100d142c8bdfba480e2cfba79b8305c.jpg');
INSERT INTO `employee_picture` VALUES ('2', 'DSC04852.jpg', '500866', null, null);
INSERT INTO `employee_picture` VALUES ('3', 'logo.png', '33741', null, null);

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` VALUES ('2', 'members', 'General User');
INSERT INTO `groups` VALUES ('3', 'merchandiser', '');

-- ----------------------------
-- Table structure for image_upload
-- ----------------------------
DROP TABLE IF EXISTS `image_upload`;
CREATE TABLE `image_upload` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `image_size` varchar(255) DEFAULT NULL,
  `image_full_path` varchar(255) DEFAULT NULL,
  `image_ext` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of image_upload
-- ----------------------------
INSERT INTO `image_upload` VALUES ('1', '', './assets/images/eimg/98564030f73f68e.jpg', null, null, null);
INSERT INTO `image_upload` VALUES ('5', '', './assets/images/eimg/16558564033665a2d6.jpg', null, null, null);
INSERT INTO `image_upload` VALUES ('6', '', './assets/images/eimg/15951564034a4b9331.png', null, null, null);
INSERT INTO `image_upload` VALUES ('7', '', './assets/images/eimg/817856405f6021839.png', null, null, null);

-- ----------------------------
-- Table structure for just_post
-- ----------------------------
DROP TABLE IF EXISTS `just_post`;
CREATE TABLE `just_post` (
  `just_id` int(11) NOT NULL AUTO_INCREMENT,
  `just_post_title` varchar(255) DEFAULT NULL,
  `just_post_description` varchar(255) DEFAULT NULL,
  `just_active` tinyint(1) DEFAULT NULL,
  `url_slug` varchar(255) NOT NULL,
  PRIMARY KEY (`just_id`,`url_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of just_post
-- ----------------------------
INSERT INTO `just_post` VALUES ('17', 'This is new post with workable slug', '<p>This is new post with slug</p>', '1', 'this-is-new-post-with-workable-slug');
INSERT INTO `just_post` VALUES ('18', 'This is new post with workable slug', '<p>THis is new psot with dev Another Post</p>', '1', 'this-is-new-post-with-workable-slug');
INSERT INTO `just_post` VALUES ('19', 'This is csv inport', 'This is first New csv upload', '1', 'sdsadf');
INSERT INTO `just_post` VALUES ('20', 'This is csv insdfsdfport', 'asd', '1', 'asdfasdfdf');
INSERT INTO `just_post` VALUES ('21', 'sdfsdf', 'df', '1', 'asdfdasf');
INSERT INTO `just_post` VALUES ('22', 'sadfsdaf', 'asdfasdff', '1', 'asdfasdfdf');
INSERT INTO `just_post` VALUES ('23', 'asdf', 'asdfasdff', '1', 'asdfasf');
INSERT INTO `just_post` VALUES ('24', 'asf', 'asdfasfd', '1', 'asdfaf');
INSERT INTO `just_post` VALUES ('25', 'This is csv inport', 'This is first New csv upload', '1', 'sdsadf');
INSERT INTO `just_post` VALUES ('26', 'This is csv insdfsdfport', 'asd', '1', 'asdfasdfdf');
INSERT INTO `just_post` VALUES ('27', 'sdfsdf', 'df', '1', 'asdfdasf');
INSERT INTO `just_post` VALUES ('28', 'sadfsdaf', 'asdfasdff', '1', 'asdfasdfdf');
INSERT INTO `just_post` VALUES ('29', 'asdf', 'asdfasdff', '1', 'asdfasf');
INSERT INTO `just_post` VALUES ('30', 'asf', 'asdfasfd', '1', 'asdfaf');
INSERT INTO `just_post` VALUES ('31', 'This is csv inport', 'This is first New csv upload', '1', 'sdsadf');
INSERT INTO `just_post` VALUES ('32', 'This is csv insdfsdfport', 'asd', '1', 'asdfasdfdf');
INSERT INTO `just_post` VALUES ('33', 'sdfsdf', 'df', '1', 'asdfdasf');
INSERT INTO `just_post` VALUES ('34', 'sadfsdaf', 'asdfasdff', '1', 'asdfasdfdf');
INSERT INTO `just_post` VALUES ('35', 'asdf', 'asdfasdff', '1', 'asdfasf');
INSERT INTO `just_post` VALUES ('36', 'asf', 'asdfasfd', '1', 'asdfaf');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for ppnw_costing
-- ----------------------------
DROP TABLE IF EXISTS `ppnw_costing`;
CREATE TABLE `ppnw_costing` (
  `ics_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_order_id_name` varchar(255) DEFAULT NULL,
  `tbl_company_id` varchar(255) DEFAULT NULL,
  `tbl_ref_name` varchar(255) DEFAULT NULL,
  `tbl_item_name` varchar(255) DEFAULT NULL,
  `tbl_order_date` date DEFAULT NULL,
  `tbl_order_gsm` int(3) DEFAULT NULL,
  `tbl_order_color` varchar(255) DEFAULT NULL,
  `tbl_order_usd` decimal(2,0) DEFAULT NULL,
  `tbl_order_wastage` decimal(2,0) DEFAULT NULL,
  `tbl_order_margin` decimal(2,0) DEFAULT NULL,
  `tbl_order_quantity` decimal(7,0) DEFAULT NULL,
  `tbl_order_transport` decimal(7,0) DEFAULT NULL,
  `tbl_order_bank_doc_charge` decimal(7,0) DEFAULT NULL,
  `tbl_dimension_body_height` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_height_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_height_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_panel` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_panel_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_panel_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_handle_length` double(3,2) DEFAULT NULL,
  `tbl_dimension_handle_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_handle_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_handle_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_handle_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_handle_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_width` double(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_order_ppnw_item_cost` decimal(3,2) DEFAULT NULL,
  `tbl_order_ppnw_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_order_ppnw_rate` decimal(5,4) DEFAULT NULL,
  `tbl_order_ppnw_total_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_tape_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_tape_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_tape_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_tape_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_puller_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_puller_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_puller_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_puller_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_print_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_print_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_print_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_print_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_thread_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_thread_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_thread_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_thread_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_tag_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_tag_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_tag_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_tag_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_label_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_label_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_label_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_label_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_packing_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_packing_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_packing_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_packing_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_order_sewing` decimal(5,4) DEFAULT NULL,
  `tbl_order_overheads` decimal(5,4) DEFAULT NULL,
  `tbl_order_total_material_inc_wastage` decimal(7,4) DEFAULT NULL,
  `tbl_order_total_overhead_and_other_cost` decimal(7,4) DEFAULT NULL,
  `tbl_total_cost` decimal(7,4) DEFAULT NULL,
  `tbl_total_price` decimal(7,4) DEFAULT NULL,
  PRIMARY KEY (`ics_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ppnw_costing
-- ----------------------------
INSERT INTO `ppnw_costing` VALUES ('57', 'BBS2015-11-13', 'Bangladesh Book Socaity', 'bncc1', 'BNC13', '2015-11-13', '1', 'Blue', '1', '1', '1', '1', '1', '1', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '44.0000', '0.0000', '0.0000', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '21.8718', '4.0000', '25.8718', '26.1305');

-- ----------------------------
-- Table structure for ppnw_costing_rev
-- ----------------------------
DROP TABLE IF EXISTS `ppnw_costing_rev`;
CREATE TABLE `ppnw_costing_rev` (
  `tbl_order_rev_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_order_id_name` varchar(255) DEFAULT NULL,
  `tbl_company_id` varchar(255) DEFAULT NULL,
  `tbl_ref_name` varchar(255) DEFAULT NULL,
  `tbl_item_name` varchar(255) DEFAULT NULL,
  `tbl_order_date` date DEFAULT NULL,
  `tbl_order_gsm` int(3) DEFAULT NULL,
  `tbl_order_color` varchar(255) DEFAULT NULL,
  `tbl_order_usd` decimal(2,0) DEFAULT NULL,
  `tbl_order_wastage` decimal(2,0) DEFAULT NULL,
  `tbl_order_margin` decimal(2,0) DEFAULT NULL,
  `tbl_order_quantity` decimal(7,0) DEFAULT NULL,
  `tbl_order_transport` decimal(7,0) DEFAULT NULL,
  `tbl_order_bank_doc_charge` decimal(7,0) DEFAULT NULL,
  `tbl_dimension_body_height` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_height_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_height_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_panel` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_panel_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_panel_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_handle_length` double(3,2) DEFAULT NULL,
  `tbl_dimension_handle_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_handle_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_handle_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_handle_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_handle_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_pocket_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_width` double(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_1_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_2_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_extra_3_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_order_ppnw_item_cost` decimal(3,2) DEFAULT NULL,
  `tbl_order_ppnw_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_order_ppnw_rate` decimal(5,4) DEFAULT NULL,
  `tbl_order_ppnw_total_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_tape_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_tape_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_tape_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_tape_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_puller_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_puller_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_puller_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_puller_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_print_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_print_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_print_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_print_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_thread_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_thread_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_thread_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_thread_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_tag_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_tag_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_tag_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_tag_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_label_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_label_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_label_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_label_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_packing_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_packing_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_packing_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_packing_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_order_sewing` decimal(5,4) DEFAULT NULL,
  `tbl_order_overheads` decimal(5,4) DEFAULT NULL,
  `tbl_order_total_material_inc_wastage` decimal(7,4) DEFAULT NULL,
  `tbl_order_total_overhead_and_other_cost` decimal(7,4) DEFAULT NULL,
  `tbl_total_cost` decimal(7,4) DEFAULT NULL,
  `tbl_total_price` decimal(7,4) DEFAULT NULL,
  `tbl_modification_time` time DEFAULT NULL,
  `tbl_modification_date` date DEFAULT NULL,
  `tbl_ics_order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbl_order_rev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ppnw_costing_rev
-- ----------------------------
INSERT INTO `ppnw_costing_rev` VALUES ('65', 'BBS2015-11-13', 'Bangladesh Book Socaity', 'bncc1', 'BNC13', '2015-11-13', '1', 'Blue', '1', '1', '1', '1', '1', '1', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '44.0000', '0.0000', '0.0000', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '21.8718', '4.0000', '25.8718', '26.1305', '02:21:57', '2015-11-13', '57');
INSERT INTO `ppnw_costing_rev` VALUES ('66', 'BBS2015-11-13', 'Bangladesh Book Socaity', 'bncc1', 'BNC13', '2015-11-13', '1', 'Blue', '1', '1', '1', '1', '1', '1', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '1.00', '2.00', '1.00', '44.0000', '0.0000', '0.0000', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '1.0000', '21.8718', '4.0000', '25.8718', '26.1305', '02:25:12', '2015-11-13', '57');
INSERT INTO `ppnw_costing_rev` VALUES ('67', 'NC2015-11-24', 'New Compay', 'NSNF', 'New', '2015-11-24', null, null, '76', '6', '5', '5000', '25000', '25000', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0.2300', '15.0000', '0.2515', '3.7725', null, null, null, null, null, null, null, null, '0.2500', '23.0000', '0.2734', '6.2882', null, null, null, null, '0.2500', '0.2300', '0.2734', '0.0629', '0.2100', '0.2300', '0.2297', '0.0528', '9.9999', '0.2500', '9.9999', '5.7500', '0.2100', '0.2300', '0.2100', '0.0483', null, null, null, null, '0.2100', '0.2300', '0.2100', '0.0483', '0.2300', '0.2100', '0.2300', '0.0483', '0.2300', '0.2100', '0.2300', '0.0483', '0.0210', '0.2300', '0.0210', '0.0048', '0.2300', '0.2500', '0.2300', '0.0575', '0.2300', '0.2300', '0.2300', '0.0529', '0.2100', '0.2300', '0.2100', '0.0483', '0.2300', '0.2100', '0.2300', '0.0483', '0.2500', '0.2500', '0.2500', '0.0625', '0.2500', '0.2300', '0.2500', '0.0575', '0.2500', '0.2700', '0.2500', '0.0675', '0.2000', '0.2300', '55.9669', '0.0000', '0.0000', '0.0000', '12:25:44', '2015-11-24', '7');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', 'New Image');
INSERT INTO `product` VALUES ('2', '');
INSERT INTO `product` VALUES ('3', 'New Product ');
INSERT INTO `product` VALUES ('4', 'Flat Bag');
INSERT INTO `product` VALUES ('5', '');
INSERT INTO `product` VALUES ('6', '');
INSERT INTO `product` VALUES ('7', 'New Image');
INSERT INTO `product` VALUES ('8', 'New Image');
INSERT INTO `product` VALUES ('9', 'New Image');
INSERT INTO `product` VALUES ('10', '');
INSERT INTO `product` VALUES ('11', '');

-- ----------------------------
-- Table structure for product_details
-- ----------------------------
DROP TABLE IF EXISTS `product_details`;
CREATE TABLE `product_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_ext` varchar(255) DEFAULT NULL,
  `full_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_details
-- ----------------------------
INSERT INTO `product_details` VALUES ('1', '1', '5100d142c8bdfba480e2cfba79b8305c.jpg', '189.64', '.jpg', 'C:/xampp/htdocs/ICS_NEW/uploadmulti/5100d142c8bdfba480e2cfba79b8305c.jpg');
INSERT INTO `product_details` VALUES ('2', '1', '4b71a02b3d00780f672262fb96bb5092.jpg', '192.27', '.jpg', 'C:/xampp/htdocs/ICS_NEW/uploadmulti/4b71a02b3d00780f672262fb96bb5092.jpg');
INSERT INTO `product_details` VALUES ('3', '1', 'c24776f71aef3b48e00a6e499e50ffa3.jpg', '189.94', '.jpg', 'C:/xampp/htdocs/ICS_NEW/uploadmulti/c24776f71aef3b48e00a6e499e50ffa3.jpg');
INSERT INTO `product_details` VALUES ('4', '1', 'f686a39f8607cc43b694424dcdde6557.jpg', '196.15', '.jpg', 'C:/xampp/htdocs/ICS_NEW/uploadmulti/f686a39f8607cc43b694424dcdde6557.jpg');
INSERT INTO `product_details` VALUES ('5', '2', '9e1a8e9ab1b11c9b4f0d05f14a8422ab.JPG', '52.22', '.JPG', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/9e1a8e9ab1b11c9b4f0d05f14a8422ab.JPG');
INSERT INTO `product_details` VALUES ('6', '2', '5f580b05d8a41d09c80f3c8cd7f748eb.JPG', '50.8', '.JPG', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/5f580b05d8a41d09c80f3c8cd7f748eb.JPG');
INSERT INTO `product_details` VALUES ('7', '2', '7ab14a2bf7b49024e7dc39770774753b.JPG', '57.16', '.JPG', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/7ab14a2bf7b49024e7dc39770774753b.JPG');
INSERT INTO `product_details` VALUES ('8', '2', '6f7b054c381d09af3f1eeee536e2d05c.JPG', '52.18', '.JPG', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/6f7b054c381d09af3f1eeee536e2d05c.JPG');
INSERT INTO `product_details` VALUES ('9', '2', '3ee78e8c7b1585f89dde289c52d421ed.JPG', '50.67', '.JPG', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/3ee78e8c7b1585f89dde289c52d421ed.JPG');
INSERT INTO `product_details` VALUES ('10', '2', '27ef701fe0485e44762c7e1d60383459.JPG', '47.85', '.JPG', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/27ef701fe0485e44762c7e1d60383459.JPG');
INSERT INTO `product_details` VALUES ('11', '3', '83e73cabf2d578bb1a4c38ffb4211516.jpg', '151.35', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/83e73cabf2d578bb1a4c38ffb4211516.jpg');
INSERT INTO `product_details` VALUES ('12', '3', 'f52cb4d03b801e8559f43959f2683507.jpg', '166.44', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/f52cb4d03b801e8559f43959f2683507.jpg');
INSERT INTO `product_details` VALUES ('13', '3', '7bbfbdc4f1c0c6fa1add9586ff85af90.jpg', '149.65', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/7bbfbdc4f1c0c6fa1add9586ff85af90.jpg');
INSERT INTO `product_details` VALUES ('14', '3', 'e7ad824ad656f7d87ed3308266ee9f7a.jpg', '154.29', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/e7ad824ad656f7d87ed3308266ee9f7a.jpg');
INSERT INTO `product_details` VALUES ('15', '4', '9a58d223240d54026d257f0d3bf8ffff.jpg', '174.02', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/9a58d223240d54026d257f0d3bf8ffff.jpg');
INSERT INTO `product_details` VALUES ('16', '4', '43fd7fd0f847011349f6a4cc8661411c.jpg', '181.18', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/43fd7fd0f847011349f6a4cc8661411c.jpg');
INSERT INTO `product_details` VALUES ('17', '5', '39bf3bbad2d978ae3cbab4ea7f9e17e4.jpg', '15.22', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/39bf3bbad2d978ae3cbab4ea7f9e17e4.jpg');
INSERT INTO `product_details` VALUES ('18', '6', '762562d3b5617f3b84565018089c506c.png', '93.71', '.png', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/762562d3b5617f3b84565018089c506c.png');
INSERT INTO `product_details` VALUES ('19', '7', '5112a7086041cfc26d7f0c4211a245f2.jpg', '290.86', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/5112a7086041cfc26d7f0c4211a245f2.jpg');
INSERT INTO `product_details` VALUES ('20', '8', '1196d33f7f3b072c2e0f8ef06d54d3bf.png', '4.05', '.png', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/1196d33f7f3b072c2e0f8ef06d54d3bf.png');
INSERT INTO `product_details` VALUES ('21', '8', 'b3e8be4825ef3c121826d06b4b81d5c0.jpg', '4.47', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/b3e8be4825ef3c121826d06b4b81d5c0.jpg');
INSERT INTO `product_details` VALUES ('22', '8', '8036257c301c143c1a1e017c4df68819.png', '5.03', '.png', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/8036257c301c143c1a1e017c4df68819.png');
INSERT INTO `product_details` VALUES ('23', '10', 'c48657dc4eb42a218ac4d69a007086ad.png', '12.2', '.png', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/c48657dc4eb42a218ac4d69a007086ad.png');
INSERT INTO `product_details` VALUES ('24', '10', 'ef6fa429511ffbf9b6bd547ae68e3f9c.jpg', '318.44', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/ef6fa429511ffbf9b6bd547ae68e3f9c.jpg');
INSERT INTO `product_details` VALUES ('25', '11', '1df50e2ba3e4b1a20a1d62fe2b028b4b.jpg', '489.13', '.jpg', 'C:/xampp/htdocs/ICS_NEW/assets/images/gallery/1df50e2ba3e4b1a20a1d62fe2b028b4b.jpg');

-- ----------------------------
-- Table structure for rev_just_post
-- ----------------------------
DROP TABLE IF EXISTS `rev_just_post`;
CREATE TABLE `rev_just_post` (
  `just_id` int(11) NOT NULL AUTO_INCREMENT,
  `just_post_title` varchar(255) DEFAULT NULL,
  `just_post_description` varchar(255) DEFAULT NULL,
  `just_active` tinyint(1) DEFAULT NULL,
  `url_slug` varchar(255) NOT NULL,
  `rev_post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`just_id`,`url_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rev_just_post
-- ----------------------------
INSERT INTO `rev_just_post` VALUES ('20', 'This is new post with workable slug', '<p>New Post</p>', null, 'this-is-new-post-with-workable-slug', null);
INSERT INTO `rev_just_post` VALUES ('21', 'This is new post with workable slug', '<p>THis is new psot with dev</p>', null, 'this-is-new-post-with-workable-slug', '18');
INSERT INTO `rev_just_post` VALUES ('22', 'This is new post with workable slug', '<p>THis is new psot with dev Another Post</p>', null, 'this-is-new-post-with-workable-slug', '18');

-- ----------------------------
-- Table structure for tasks
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tasks
-- ----------------------------
INSERT INTO `tasks` VALUES ('3', 'Add to-do items', '2014-10-28', '16:21:12');
INSERT INTO `tasks` VALUES ('10', 'New Task Added', '0000-00-00', '00:00:00');
INSERT INTO `tasks` VALUES ('11', 'Another task added', '0000-00-00', '00:00:00');
INSERT INTO `tasks` VALUES ('12', 'This is another task', '0000-00-00', '00:00:00');
INSERT INTO `tasks` VALUES ('14', 'Todo list first', '0000-00-00', '00:00:00');
INSERT INTO `tasks` VALUES ('15', 'Herllo ', '0000-00-00', '00:00:00');

-- ----------------------------
-- Table structure for task_by_user
-- ----------------------------
DROP TABLE IF EXISTS `task_by_user`;
CREATE TABLE `task_by_user` (
  `task_user_id` int(11) unsigned DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  KEY `fk_task_user_id` (`task_user_id`),
  KEY `fk_task_id` (`task_id`),
  CONSTRAINT `fk_task_id` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_task_user_id` FOREIGN KEY (`task_user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of task_by_user
-- ----------------------------
INSERT INTO `task_by_user` VALUES ('5', '10');
INSERT INTO `task_by_user` VALUES ('5', '11');
INSERT INTO `task_by_user` VALUES ('5', '12');
INSERT INTO `task_by_user` VALUES ('1', '14');
INSERT INTO `task_by_user` VALUES ('1', '15');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', null, null, null, '1268889823', '1448335975', '1', 'Admin', 'istrator', 'ADMIN', '0');
INSERT INTO `users` VALUES ('4', '127.0.0.1', 'timir', '$2y$08$AmclLIpLcaHUy5d/IMJBB.rGfDE7x5tUv/X5iAx0sZCwZCF56sqeu', null, 'timir@simuragroup.com', null, null, null, null, '1443787186', '1446351869', '1', 'Mahibullah', 'Timir', '', '');
INSERT INTO `users` VALUES ('5', '127.0.0.1', 'rhossain', '$2y$08$hKjjbJpDYWNTomDjaZTTIOOS.symveD0C9ZTOyb9jVx1qXaWNFcjK', null, 'rhossain@simuragroup.com', null, null, null, null, '1444545302', '1444974816', '1', 'Rajib', ' Hossain', 'SIMURA Nonwovens Ltd.', '');

-- ----------------------------
-- Table structure for users_employee
-- ----------------------------
DROP TABLE IF EXISTS `users_employee`;
CREATE TABLE `users_employee` (
  `user_employee` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`user_employee`),
  KEY `fk_employee_id` (`employee_id`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `fk_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_employee
-- ----------------------------
INSERT INTO `users_employee` VALUES ('1', '2', '1');
INSERT INTO `users_employee` VALUES ('3', '3', '4');
INSERT INTO `users_employee` VALUES ('4', '4', '5');

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('6', '1', '1');
INSERT INTO `users_groups` VALUES ('7', '4', '2');
INSERT INTO `users_groups` VALUES ('8', '5', '2');

-- ----------------------------
-- Table structure for woven_body_material
-- ----------------------------
DROP TABLE IF EXISTS `woven_body_material`;
CREATE TABLE `woven_body_material` (
  `tbl_material_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_material_name` varchar(255) DEFAULT NULL,
  `tbl_material_roll_width` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`tbl_material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of woven_body_material
-- ----------------------------
INSERT INTO `woven_body_material` VALUES ('1', 'Polyester Fabric', '1.40');
INSERT INTO `woven_body_material` VALUES ('2', 'Lining Fabric', '1.40');
INSERT INTO `woven_body_material` VALUES ('3', 'Foam', '1.00');
INSERT INTO `woven_body_material` VALUES ('4', 'Extra 1', '1.00');
INSERT INTO `woven_body_material` VALUES ('5', 'Extra 2', '1.00');
INSERT INTO `woven_body_material` VALUES ('6', 'Extra 3', '1.00');

-- ----------------------------
-- Table structure for woven_body_material_dimension_cost
-- ----------------------------
DROP TABLE IF EXISTS `woven_body_material_dimension_cost`;
CREATE TABLE `woven_body_material_dimension_cost` (
  `tbl_wbmdc_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_wbmdc_body_material_id` int(11) DEFAULT NULL,
  `tbl_wbmdc_dimension` int(11) DEFAULT NULL,
  `tbl_wbmdc_cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbl_wbmdc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of woven_body_material_dimension_cost
-- ----------------------------

-- ----------------------------
-- Table structure for woven_costing
-- ----------------------------
DROP TABLE IF EXISTS `woven_costing`;
CREATE TABLE `woven_costing` (
  `tbl_woven_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_woven_dimension_id` int(11) DEFAULT NULL,
  `tbl_woven_id_name` varchar(255) DEFAULT NULL,
  `tbl_woven_company_name` varchar(255) DEFAULT NULL,
  `tbl_woven_ref_name` varchar(255) DEFAULT NULL,
  `tbl_woven_item_name` varchar(255) DEFAULT NULL,
  `tbl_woven_order_date` date DEFAULT NULL,
  `tbl_woven_order_gsm` int(3) DEFAULT NULL,
  `tbl_woven_order_color` varchar(255) DEFAULT NULL,
  `tbl_woven_order_usd` decimal(2,0) DEFAULT NULL,
  `tbl_woven_order_wastage` decimal(2,0) DEFAULT NULL,
  `tbl_woven_order_margin` decimal(2,0) DEFAULT NULL,
  `tbl_woven_order_quantity` decimal(7,0) DEFAULT NULL,
  `tbl_woven_order_transport` decimal(7,0) DEFAULT NULL,
  `tbl_woven_order_bank_doc_charge` decimal(7,0) DEFAULT NULL,
  `tbl_woven_body_material_1_name` varchar(255) DEFAULT NULL,
  `tbl_woven_body_material_2_name` varchar(255) DEFAULT NULL,
  `tbl_woven_body_material_3_name` varchar(255) DEFAULT NULL,
  `tbl_woven_body_material_4_name` varchar(255) DEFAULT NULL,
  `tbl_woven_body_material_5_name` varchar(255) DEFAULT NULL,
  `tbl_woven_body_material_6_name` varchar(255) DEFAULT NULL,
  `tbl_woven_body_material_1_roll_width` decimal(3,2) DEFAULT NULL,
  `tbl_woven_body_material_2_roll_width` decimal(3,2) DEFAULT NULL,
  `tbl_woven_body_material_3_roll_width` decimal(3,2) DEFAULT NULL,
  `tbl_woven_body_material_4_roll_width` decimal(3,2) DEFAULT NULL,
  `tbl_woven_body_material_5_roll_width` decimal(3,2) DEFAULT NULL,
  `tbl_woven_body_material_6_roll_width` decimal(3,2) DEFAULT NULL,
  `tbl_woven_body_material_1_cost` decimal(3,2) DEFAULT NULL,
  `tbl_woven_body_material_1_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_body_material_1_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_1_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_2_cost` decimal(3,2) DEFAULT NULL,
  `tbl_woven_body_material_2_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_body_material_2_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_2_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_3_cost` decimal(3,2) DEFAULT NULL,
  `tbl_woven_body_material_3_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_body_material_3_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_3_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_4_cost` decimal(3,2) DEFAULT NULL,
  `tbl_woven_body_material_4_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_body_material_4_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_4_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_5_cost` decimal(6,4) DEFAULT NULL,
  `tbl_woven_body_material_5_consumption` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_5_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_5_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_6_cost` decimal(6,4) DEFAULT NULL,
  `tbl_woven_body_material_6_consumption` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_6_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_body_material_6_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_zipper_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_zipper_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_yard_zipper_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_zipper_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_two_inch_webbing_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_two_inch_webbing_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_yard_two_inch_webbing_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_two_inch_webbing_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_one_and_half_inch_webbing_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_one_and_half_webbing_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_yard_one_and_half_webbing_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_one_and_half_webbing_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_velcro_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_velcro_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_yard_velcro_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_velcro_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_1_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_1_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_1_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_1_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_2_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_2_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_2_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_2_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_3_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_3_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_3_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_yard_extra_3_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_puller_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_puller_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_puller_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_puller_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_print_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_print_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_print_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_print_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_d_buckle_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_d_buckle_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_d_buckle_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_d_buckle_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_swivel_hook_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_swivel_hook_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_swivel_hook_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_swivel_hook_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_adjustable_bukle_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_adjustable_bukle_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_adjustable_bukle_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_adjustable_bukle_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_magnetic_button_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_magnetic_button_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_magnetic_button_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_magnetic_button_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_snap_button_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_snap_button_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_snap_button_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_snap_button_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_rivet_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_rivet_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_rivet_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_rivet_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_bottom_base_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_bottom_base_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_bottom_base_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_bottom_base_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_thread_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_thread_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_thread_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_thread_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_tag_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_tag_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_tag_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_tag_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_label_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_label_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_label_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_label_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_packing_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_packing_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_packing_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_packing_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_bottom_shoe_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_bottom_shoe_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_bottom_shoe_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_bottom_shoe_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_1_name` varchar(255) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_1_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_1_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_1_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_1_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_2_name` varchar(255) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_2_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_2_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_2_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_2_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_3_name` varchar(255) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_3_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_3_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_3_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_3_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_4_name` varchar(255) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_4_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_4_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_4_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_4_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_5_name` varchar(255) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_5_item_cost` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_5_item_consumption` decimal(6,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_5_item_rate` decimal(5,4) DEFAULT NULL,
  `tbl_woven_trims_piece_extra_5_item_total_cost` decimal(5,4) DEFAULT NULL,
  `tbl_order_sewing` decimal(5,4) DEFAULT NULL,
  `tbl_order_overheads` decimal(5,4) DEFAULT NULL,
  `tbl_order_total_material_inc_wastage` decimal(7,4) DEFAULT NULL,
  `tbl_order_total_overhead_and_other_cost` decimal(7,4) DEFAULT NULL,
  `tbl_total_cost` decimal(7,4) DEFAULT NULL,
  `tbl_total_price` decimal(7,4) DEFAULT NULL,
  PRIMARY KEY (`tbl_woven_order_id`),
  KEY `fk_woven_dimension_id` (`tbl_woven_dimension_id`),
  CONSTRAINT `fk_woven_dimension_id` FOREIGN KEY (`tbl_woven_dimension_id`) REFERENCES `woven_dimension` (`tbl_dimension_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of woven_costing
-- ----------------------------
INSERT INTO `woven_costing` VALUES ('1', '11', 'SNw2015-11-24', 'Simura Non wovens', 'lwns1', 'Snwl', '2015-11-24', null, null, '75', '5', '5', '25000', '25000', '10000', 'MT 1', 'MT 2', 'MT 3', 'MT 4', 'MT 5', 'MT 6', '2.00', '1.00', '1.00', '1.00', '1.00', '1.00', '2.45', '0.0000', '1.3397', '0.0000', '1.25', '0.0000', '1.3670', '0.0000', '2.12', '0.0000', '2.3185', '0.0000', '0.25', '0.0000', '0.2734', '0.0000', '2.2500', '0.0000', '2.4606', '0.0000', '2.6900', '0.0000', '2.9418', '0.0000', '0.2500', '12.0000', '0.2734', '3.2808', '1.0000', '1.0000', '1.0936', '1.0936', '1.0000', '1.0000', '1.0936', '1.0936', '0.2500', '2.0000', '0.2734', '0.5468', '0.2400', '23.0000', '0.2625', '6.0375', '0.2800', '0.2300', '0.3062', '0.0704', '0.2100', '0.2300', '0.2297', '0.0528', '0.0230', '0.2100', '0.0230', '0.0048', '0.2300', '0.2100', '0.2300', '0.0483', '0.2300', '0.2500', '0.2300', '0.0575', '0.5800', '0.5400', '0.5800', '0.1242', '1.0000', '2.0000', '1.0000', '2.0000', '0.5800', '0.5400', '0.5800', '0.3132', '0.5700', '0.5600', '0.5700', '0.3192', '0.5700', '0.5600', '0.5700', '0.3192', '0.5700', '0.5600', '0.5700', '0.3192', '0.0540', '0.5800', '0.0540', '0.0313', '0.5400', '0.2300', '0.5400', '0.1242', '0.5400', '0.2500', '0.5400', '0.1350', '0.8500', '0.5400', '0.8500', '0.4590', '0.5800', '0.5400', '0.5800', '0.3132', 'Buckle', '0.5800', '0.2560', '0.5800', '0.1485', 'Hook', '0.5400', '0.5600', '0.5400', '0.3024', 'ex3', '0.5800', '0.5600', '0.5800', '0.3248', 'ex4', '2.0000', '2.0000', '2.0000', '4.0000', 'ex5', '0.5800', '0.5600', '0.5800', '0.3248', '0.2300', '0.2100', '22.9365', '0.4587', '23.3952', '24.5650');
INSERT INTO `woven_costing` VALUES ('2', '10', 'NC2015-11-24', 'Another Company', 'snwl1', 'New', '2015-11-24', null, null, '76', '6', '5', null, '25000', '25000', 'Material 1', 'Material 2', 'Material 3', 'Material 4', 'Material 5', 'Material 6', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '2.25', '0.0000', '2.4606', '0.0000', '2.36', '0.0000', '2.5809', '0.0000', '2.36', '0.0000', '2.5809', '0.0000', '2.48', '0.0000', '2.7122', '0.0000', '2.5800', '0.0000', '2.8215', '0.0000', '2.5600', '0.0000', '2.7997', '0.0000', '0.2300', '15.0000', '0.2515', '3.7725', null, null, null, null, null, null, null, null, '0.2500', '23.0000', '0.2734', '6.2882', '0.2500', '0.2300', '0.2734', '0.0629', '0.2100', '0.2300', '0.2297', '0.0528', '0.2300', '0.2100', '0.2515', '0.0528', '9.9999', '0.2500', null, null, '0.2100', '0.2300', null, null, '0.2100', '0.2300', null, null, '0.2100', '0.2300', null, null, null, null, null, null, '0.2300', '0.2100', null, null, '0.2300', '0.2100', null, null, '0.2300', '0.2100', null, null, '0.0210', '0.2300', null, null, '0.2300', '0.2500', null, null, '0.2300', '0.2300', null, null, '0.2100', '0.2300', null, null, '0.2300', '0.2100', null, null, '0.2500', '0.2300', null, null, 'extra 1', '0.2500', '0.2500', '0.2500', '0.0625', 'extra 2', '0.2500', '0.2300', '0.2500', '0.0575', 'extra 3', '0.2500', '0.2700', '0.2500', '0.0675', 'extra 2', null, null, null, null, 'extra 5', '0.2500', '0.2700', '0.2500', '0.0675', '0.2000', '0.2300', '14.3559', '0.4563', '14.8122', '15.5528');

-- ----------------------------
-- Table structure for woven_cost_body_material
-- ----------------------------
DROP TABLE IF EXISTS `woven_cost_body_material`;
CREATE TABLE `woven_cost_body_material` (
  `tbl_cost_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_cost_yard` decimal(3,2) DEFAULT NULL,
  `tbl_cost_consumption_sqm` decimal(6,4) DEFAULT NULL,
  `tbl_cost_rate_sqm` decimal(6,4) DEFAULT NULL,
  `tbl_cost_body_material_final_cost` decimal(6,4) DEFAULT NULL,
  PRIMARY KEY (`tbl_cost_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of woven_cost_body_material
-- ----------------------------

-- ----------------------------
-- Table structure for woven_cost_trims_in_pieces
-- ----------------------------
DROP TABLE IF EXISTS `woven_cost_trims_in_pieces`;
CREATE TABLE `woven_cost_trims_in_pieces` (
  `tbl_cost_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_cost_piece` decimal(3,2) DEFAULT NULL,
  `tbl_cost_consumption_piece` decimal(6,4) DEFAULT NULL,
  `tbl_cost_rate_piece` decimal(6,4) DEFAULT NULL,
  `tbl_cost_piece_final_cost` decimal(6,4) DEFAULT NULL,
  PRIMARY KEY (`tbl_cost_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of woven_cost_trims_in_pieces
-- ----------------------------

-- ----------------------------
-- Table structure for woven_cost_trims_in_yards
-- ----------------------------
DROP TABLE IF EXISTS `woven_cost_trims_in_yards`;
CREATE TABLE `woven_cost_trims_in_yards` (
  `tbl_cost_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_cost_yard` decimal(3,2) DEFAULT NULL,
  `tbl_cost_consumption_metre` decimal(6,4) DEFAULT NULL,
  `tbl_cost_rate_metre` decimal(6,4) DEFAULT NULL,
  `tbl_cost_yard_final_cost` decimal(6,4) DEFAULT NULL,
  PRIMARY KEY (`tbl_cost_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of woven_cost_trims_in_yards
-- ----------------------------

-- ----------------------------
-- Table structure for woven_dimension
-- ----------------------------
DROP TABLE IF EXISTS `woven_dimension`;
CREATE TABLE `woven_dimension` (
  `tbl_dimension_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_dimension_body_material_1_front_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_front_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_front_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_front_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_front_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_front_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_back_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_back_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_back_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_back_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_back_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_back_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_top_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_top_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_top_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_top_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_top_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_top_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_bottom_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_bottom_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_bottom_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_bottom_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_bottom_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_bottom_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_left_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_left_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_left_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_left_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_left_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_left_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_right_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_right_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_right_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_right_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_right_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_right_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_pocket_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_pocket_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_pocket_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_pocket_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_pocket_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_pocket_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_1_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_1_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_1_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_1_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_1_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_1_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_2_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_2_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_2_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_2_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_2_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_2_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_3_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_3_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_3_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_3_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_3_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_1_extra_3_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_front_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_front_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_front_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_front_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_front_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_front_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_back_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_back_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_back_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_back_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_back_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_back_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_top_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_top_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_top_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_top_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_top_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_top_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_bottom_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_bottom_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_bottom_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_bottom_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_bottom_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_bottom_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_left_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_left_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_left_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_left_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_left_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_left_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_right_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_right_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_right_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_right_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_right_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_right_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_pocket_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_pocket_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_pocket_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_pocket_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_pocket_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_pocket_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_1_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_1_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_1_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_1_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_1_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_1_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_2_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_2_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_2_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_2_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_2_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_2_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_3_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_3_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_3_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_3_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_3_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_2_extra_3_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_front_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_front_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_front_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_front_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_front_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_front_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_back_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_back_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_back_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_back_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_back_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_back_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_top_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_top_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_top_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_top_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_top_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_top_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_bottom_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_bottom_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_bottom_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_bottom_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_bottom_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_bottom_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_left_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_left_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_left_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_left_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_left_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_left_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_right_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_right_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_right_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_right_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_right_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_right_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_pocket_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_pocket_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_pocket_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_pocket_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_pocket_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_pocket_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_1_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_1_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_1_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_1_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_1_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_1_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_2_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_2_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_2_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_2_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_2_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_2_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_3_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_3_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_3_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_3_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_3_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_3_extra_3_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_front_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_front_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_front_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_front_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_front_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_front_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_back_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_back_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_back_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_back_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_back_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_back_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_top_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_top_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_top_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_top_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_top_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_top_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_bottom_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_bottom_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_bottom_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_bottom_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_bottom_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_bottom_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_left_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_left_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_left_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_left_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_left_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_left_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_right_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_right_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_right_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_right_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_right_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_right_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_pocket_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_pocket_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_pocket_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_pocket_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_pocket_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_pocket_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_1_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_1_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_1_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_1_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_1_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_1_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_2_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_2_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_2_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_2_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_2_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_2_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_3_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_3_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_3_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_3_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_3_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_4_extra_3_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_front_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_front_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_front_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_front_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_front_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_front_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_back_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_back_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_back_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_back_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_back_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_back_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_top_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_top_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_top_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_top_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_top_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_top_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_bottom_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_bottom_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_bottom_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_bottom_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_bottom_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_bottom_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_left_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_left_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_left_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_left_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_left_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_left_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_right_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_right_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_right_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_right_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_right_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_right_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_pocket_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_pocket_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_pocket_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_pocket_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_pocket_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_pocket_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_1_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_1_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_1_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_1_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_1_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_1_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_2_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_2_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_2_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_2_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_2_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_2_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_3_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_3_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_3_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_3_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_3_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_5_extra_3_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_front_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_front_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_front_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_front_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_front_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_front_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_back_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_back_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_back_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_back_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_back_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_back_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_top_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_top_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_top_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_top_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_top_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_top_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_bottom_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_bottom_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_bottom_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_bottom_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_bottom_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_bottom_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_left_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_left_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_left_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_left_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_left_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_left_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_right_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_right_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_right_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_right_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_right_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_right_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_pocket_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_pocket_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_pocket_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_pocket_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_pocket_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_pocket_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_1_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_1_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_1_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_1_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_1_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_1_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_2_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_2_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_2_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_2_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_2_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_2_width_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_3_length` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_3_length_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_3_length_total` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_3_width` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_3_width_allowance` decimal(3,2) DEFAULT NULL,
  `tbl_dimension_body_material_6_extra_3_width_total` decimal(3,2) DEFAULT NULL,
  PRIMARY KEY (`tbl_dimension_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of woven_dimension
-- ----------------------------
INSERT INTO `woven_dimension` VALUES ('10', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');
INSERT INTO `woven_dimension` VALUES ('11', '0.23', '0.21', '0.44', '0.23', '0.58', '0.81', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.23', '0.21', '0.44', '0.25', '0.21', '0.46', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', null, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');
