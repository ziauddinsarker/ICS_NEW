/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50625
Source Host           : localhost:3306
Source Database       : ics_new

Target Server Type    : MYSQL
Target Server Version : 50625
File Encoding         : 65001

Date: 2015-11-10 18:06:39
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
  `costing_user_id` int(11) unsigned DEFAULT NULL,
  `costing_user_ppnw` int(11) DEFAULT NULL,
  `costing_user_cotton` int(11) DEFAULT NULL,
  `costing_user_jute` int(11) DEFAULT NULL,
  `costing_user_leather` int(11) DEFAULT NULL,
  KEY `fk_costing_user_id` (`costing_user_id`),
  KEY `fk_costing_user_ppnw_id` (`costing_user_ppnw`),
  CONSTRAINT `fk_costing_user_id` FOREIGN KEY (`costing_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_costing_user_ppnw_id` FOREIGN KEY (`costing_user_ppnw`) REFERENCES `ppnw_costing` (`ics_order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of costing_by_user
-- ----------------------------
INSERT INTO `costing_by_user` VALUES ('1', '1', null, null, null);
INSERT INTO `costing_by_user` VALUES ('4', '2', null, null, null);
INSERT INTO `costing_by_user` VALUES ('1', '22', null, null, null);
INSERT INTO `costing_by_user` VALUES ('1', '23', null, null, null);
INSERT INTO `costing_by_user` VALUES ('1', '25', null, null, null);
INSERT INTO `costing_by_user` VALUES ('1', '26', null, null, null);
INSERT INTO `costing_by_user` VALUES ('1', '28', null, null, null);
INSERT INTO `costing_by_user` VALUES ('1', '29', null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of just_post
-- ----------------------------
INSERT INTO `just_post` VALUES ('17', 'This is new post with workable slug', '<p>This is new post with slug</p>', null, 'this-is-new-post-with-workable-slug');
INSERT INTO `just_post` VALUES ('18', 'This is new post with workable slug', '<p>THis is new psot with dev Another Post</p>', null, 'this-is-new-post-with-workable-slug');

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
  `tbl_order_ppnw_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_order_ppnw_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_order_ppnw_rate` decimal(4,0) DEFAULT NULL,
  `tbl_order_ppnw_total_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_tape_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_tape_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_tape_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_tape_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_puller_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_puller_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_puller_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_puller_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_print_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_print_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_print_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_print_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_thread_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_thread_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_thread_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_thread_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_tag_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_tag_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_tag_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_tag_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_label_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_label_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_label_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_label_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_packing_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_packing_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_packing_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_packing_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_order_total_material_inc_wastage` decimal(4,0) DEFAULT NULL,
  `tbl_order_total_overhead_and_other_cost` decimal(6,4) DEFAULT NULL,
  `tbl_order_sewing` decimal(4,0) DEFAULT NULL,
  `tbl_order_overheads` decimal(4,0) DEFAULT NULL,
  `tbl_total_cost` decimal(6,4) DEFAULT NULL,
  `tbl_total_price` decimal(6,4) DEFAULT NULL,
  PRIMARY KEY (`ics_order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ppnw_costing
-- ----------------------------
INSERT INTO `ppnw_costing` VALUES ('1', 'SG2015-10-11', 'Simura Group', 'B-253P', 'Bata-D Cut Bag', '2015-10-11', '90', 'Red', '76', '5', '5', '250000', '20000', '4000', '2.52', '0.55', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.50', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '3', null, null, null, '1', '10', null, null, '1', '5', null, null, '0', '50', null, null, '0', '0', null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, '1', '52', null, null, '1', '25', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, '20.5556');
INSERT INTO `ppnw_costing` VALUES ('2', 'Simura021015001', 'Simura Nonwovens Limited', null, null, '2015-10-11', '90', '', '75', '5', '5', '25000', '20000', '1000', '0.25', '0.53', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0', null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, '25.2536');
INSERT INTO `ppnw_costing` VALUES ('20', 'B2015-10-14', 'Bata', 'B-253P', 'D cut Bag', '2015-10-14', '90', '', '0', '0', '0', '0', '0', '0', '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0', null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, null);
INSERT INTO `ppnw_costing` VALUES ('22', 'BC2015-10-12', 'Bata Company', '125AV', 'Bata-D Cut Bag', '2015-10-12', '90', 'Red', '75', '5', '5', '26500', '20000', '10000', '0.20', '0.20', null, '0.20', '0.03', null, '0.06', '0.03', null, '0.50', '0.03', null, '0.08', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '2', null, null, null, '0', '50', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '52', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, null);
INSERT INTO `ppnw_costing` VALUES ('23', 'A2015-10-18', 'Apex', '125AV', 'Apex Cotton 12', '2015-10-18', '90', 'Blue', '75', '5', '5', '25000', '20000', '10000', '0.20', '0.03', null, '0.20', '0.00', null, '0.06', '0.03', null, '0.50', '0.03', null, '0.08', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '3', null, null, null, '0', '1', null, null, '0', '1', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, null, null, null, null, null, null, '1', '2', null, null, '1', '5', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, null);
INSERT INTO `ppnw_costing` VALUES ('25', 'H2015-11-09', 'Himm', 'lsdkfj', 'KHI', '2015-11-09', '90', '', '5', '55', '5', '5', '5', '5', '9.99', '2.00', null, '2.52', '2.00', null, '2.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '3', null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, null);
INSERT INTO `ppnw_costing` VALUES ('26', 'BB2015-11-17', 'Bata Bangaldesh', 'Kne-23', 'ICCS', '2015-11-17', '75', '', '47', '77', '77', '1025', '25122', '2555', '9.99', '0.00', null, '9.99', '0.00', null, '9.99', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '77', null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, null);
INSERT INTO `ppnw_costing` VALUES ('28', 'NC2015-11-03', 'No Company ', 'll', 'Name', '2015-11-10', '900', '', '75', '5', '5', '522', '2500', '500', '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '3', null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, null);
INSERT INTO `ppnw_costing` VALUES ('29', 'DIP2015-11-10', 'Dhaka International PPNW', 'snwl-ppnw-01', 'snwl1', '2015-11-10', '90', 'dgdfg', '75', '5', '5', '500', '8585', '23232', '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5', null, null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, null, '5.0000', '0', '0', '5.0000', '5.0000');

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
  `tbl_order_ppnw_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_order_ppnw_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_order_ppnw_rate` decimal(4,0) DEFAULT NULL,
  `tbl_order_ppnw_total_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_zipper_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_webbing_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_draw_string_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_velcro_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_tape_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_tape_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_tape_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_tape_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_1_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_yard_extra_2_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_puller_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_puller_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_puller_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_puller_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_print_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_print_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_print_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_print_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_eyelet_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_buckle_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_snap_button_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_magnetic_button_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_bottom_base_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_thread_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_thread_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_thread_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_thread_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_tag_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_tag_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_tag_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_tag_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_label_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_label_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_label_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_label_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_packing_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_packing_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_packing_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_packing_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_1_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_2_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_cost` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_consumption` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_rate` decimal(4,0) DEFAULT NULL,
  `tbl_trims_piece_extra_3_item_total_cost` decimal(4,0) DEFAULT NULL,
  `tbl_order_total_material_inc_wastage` decimal(4,0) DEFAULT NULL,
  `tbl_order_total_overhead_and_other_cost` decimal(6,4) DEFAULT NULL,
  `tbl_order_sewing` decimal(4,0) DEFAULT NULL,
  `tbl_order_overheads` decimal(4,0) DEFAULT NULL,
  `tbl_total_cost` decimal(6,4) DEFAULT NULL,
  `tbl_total_price` decimal(6,4) DEFAULT NULL,
  `tbl_modification_time` time DEFAULT NULL,
  `tbl_modification_date` date DEFAULT NULL,
  `tbl_ics_order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tbl_order_rev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ppnw_costing_rev
-- ----------------------------
INSERT INTO `ppnw_costing_rev` VALUES ('31', 'SNL2015-11-04', 'Simura Nonwovens Limited', 'snwl-ppnw-01', 'snwl1', '2015-11-04', '95', 'Red', '75', '5', '5', '10000', '5000', '2555', '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5', null, null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, null, null, '0', '0', null, null, '07:20:05', null, '29');
INSERT INTO `ppnw_costing_rev` VALUES ('44', 'DI2015-11-10', 'Dhaka International ', 'snwl-ppnw-01', 'snwl1', '2015-11-10', '90', 'dgdfg', '75', '5', '5', '2584', '8585', '23232', '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5', null, null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, null, null, '0', '0', null, null, '01:22:37', '2015-11-10', '29');
INSERT INTO `ppnw_costing_rev` VALUES ('45', 'DI2015-11-10', 'Dhaka International ', 'snwl-ppnw-01', 'snwl1', '2015-11-10', '90', 'dgdfg', '75', '5', '5', '15000', '8585', '23232', '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5', null, null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, null, null, '0', '0', null, null, '02:42:47', '2015-11-10', '29');
INSERT INTO `ppnw_costing_rev` VALUES ('46', 'DIP2015-11-10', 'Dhaka International PPNW', 'snwl-ppnw-01', 'snwl1', '2015-11-10', '90', 'dgdfg', '75', '5', '5', '15000', '8585', '23232', '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5', null, null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, null, null, '0', '0', null, null, '02:43:00', '2015-11-10', '29');
INSERT INTO `ppnw_costing_rev` VALUES ('47', 'NC2015-11-03', 'No Company ', 'll', 'Name', '2015-11-10', '900', '', '75', '5', '5', '522', '2500', '500', '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '3', null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, null, '04:13:21', '2015-11-10', '28');
INSERT INTO `ppnw_costing_rev` VALUES ('48', 'BB2015-11-17', 'Bata Bangaldesh', 'Kne-23', 'ICCS', '2015-11-10', '58', '', '47', '77', '77', '77', '77', '77', '9.99', '0.00', null, '9.99', '0.00', null, '9.99', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '77', null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, null, '04:13:58', '2015-11-10', '26');
INSERT INTO `ppnw_costing_rev` VALUES ('49', 'BB2015-11-10', 'Bata Bangaldesh', 'Kne-23', 'ICCS', '2015-11-10', '58', '', '47', '77', '77', '5000', '77', '77', '9.99', '0.00', null, '9.99', '0.00', null, '9.99', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '77', null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, null, '04:14:15', '2015-11-10', '26');
INSERT INTO `ppnw_costing_rev` VALUES ('50', 'BB2015-11-10', 'Bata Bangaldesh', 'Kne-23', 'ICCS', '2015-11-10', '75', '', '47', '77', '77', '5000', '20500', '2555', '9.99', '0.00', null, '9.99', '0.00', null, '9.99', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '77', null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, null, '04:14:39', '2015-11-10', '26');
INSERT INTO `ppnw_costing_rev` VALUES ('51', 'BB2015-11-17', 'Bata Bangaldesh', 'Kne-23', 'ICCS', '2015-11-17', '75', '', '47', '77', '77', '1025', '25122', '2555', '9.99', '0.00', null, '9.99', '0.00', null, '9.99', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '0.00', '0.00', null, '77', null, null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, '0', '0', null, null, null, null, '0', '0', null, null, '04:14:55', '2015-11-10', '26');
INSERT INTO `ppnw_costing_rev` VALUES ('52', 'DIP2015-11-10', 'Dhaka International PPNW', 'snwl-ppnw-01', 'snwl1', '2015-11-10', '90', 'dgdfg', '75', '5', '5', '500', '8585', '23232', '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5.00', '5.00', null, '5', null, null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '5', '5', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, '6', '6', null, null, null, null, '0', '0', null, null, '05:06:43', '2015-11-10', '29');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tasks
-- ----------------------------
INSERT INTO `tasks` VALUES ('3', 'Add to-do items', '2014-10-28', '16:21:12');
INSERT INTO `tasks` VALUES ('10', 'New Task Added', '0000-00-00', '00:00:00');
INSERT INTO `tasks` VALUES ('11', 'Another task added', '0000-00-00', '00:00:00');
INSERT INTO `tasks` VALUES ('12', 'This is another task', '0000-00-00', '00:00:00');
INSERT INTO `tasks` VALUES ('14', 'Todo list first', '0000-00-00', '00:00:00');
INSERT INTO `tasks` VALUES ('15', 'Herllo ', '0000-00-00', '00:00:00');
INSERT INTO `tasks` VALUES ('16', 'New List', '0000-00-00', '00:00:00');

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
INSERT INTO `task_by_user` VALUES ('1', '16');

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
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', null, null, null, '1268889823', '1447125002', '1', 'Admin', 'istrator', 'ADMIN', '0');
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
