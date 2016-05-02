-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-05-02 15:38:34
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- 表的结构 `building`
--

CREATE TABLE IF NOT EXISTS `building` (
  `building_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '楼宇ID',
  `building_num` int(10) NOT NULL COMMENT '楼宇号',
  `building_floor` int(10) NOT NULL COMMENT '楼宇层数',
  `orientation` varchar(255) NOT NULL COMMENT '朝向',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  PRIMARY KEY (`building_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='楼宇表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `building`
--

INSERT INTO `building` (`building_id`, `building_num`, `building_floor`, `orientation`, `remark`) VALUES
(1, 1, 6, '东', '没有备注');

-- --------------------------------------------------------

--
-- 表的结构 `carport`
--

CREATE TABLE IF NOT EXISTS `carport` (
  `carport_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `carport_name` varchar(255) NOT NULL COMMENT '车位编号名',
  `area` decimal(10,2) NOT NULL COMMENT '车位面积',
  `license` varchar(255) NOT NULL COMMENT '车牌号',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  PRIMARY KEY (`carport_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='车位管理表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `carport`
--

INSERT INTO `carport` (`carport_id`, `carport_name`, `area`, `license`, `remark`) VALUES
(1, 'carport_1', '15.00', '浙A5588', ''),
(2, 'newbalance', '50.00', '浙B8888', '');

-- --------------------------------------------------------

--
-- 表的结构 `charge`
--

CREATE TABLE IF NOT EXISTS `charge` (
  `charge_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL COMMENT '缴费类型ID',
  `house_id` int(10) NOT NULL,
  `invoiceNum` varchar(255) NOT NULL COMMENT '单据编号',
  `createTime` int(10) NOT NULL COMMENT '单据生成日期',
  `paymentTime` int(10) NOT NULL COMMENT '缴费日期',
  `handleName` varchar(255) NOT NULL COMMENT '单据填写人员姓名',
  `chargeName` varchar(255) NOT NULL COMMENT '收费人员姓名',
  `paymentMoney` decimal(10,2) NOT NULL COMMENT '缴费金额',
  `status` tinyint(4) NOT NULL DEFAULT '10' COMMENT '缴费状态 10未缴费 20已缴费',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  PRIMARY KEY (`charge_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='收费管理表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `charge`
--

INSERT INTO `charge` (`charge_id`, `type_id`, `house_id`, `invoiceNum`, `createTime`, `paymentTime`, `handleName`, `chargeName`, `paymentMoney`, `status`, `remark`) VALUES
(2, 1, 1, '11221212', 0, 0, '戴红', '戴轰轰', '10.00', 10, '无'),
(3, 3, 1, '23463516', 0, 0, 'susu', '熊熊', '233.00', 10, '无');

-- --------------------------------------------------------

--
-- 表的结构 `charge_type`
--

CREATE TABLE IF NOT EXISTS `charge_type` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL COMMENT '缴费类型',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `charge_type`
--

INSERT INTO `charge_type` (`type_id`, `type_name`) VALUES
(1, '水费'),
(2, '电费'),
(3, '网络费'),
(4, '物业费');

-- --------------------------------------------------------

--
-- 表的结构 `complain`
--

CREATE TABLE IF NOT EXISTS `complain` (
  `complain_id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `audit_name` varchar(255) DEFAULT NULL COMMENT '审核人员姓名',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `modify_time` int(10) NOT NULL DEFAULT '0',
  `finish_time` int(10) NOT NULL DEFAULT '0',
  `content` varchar(255) NOT NULL COMMENT '投诉内容',
  `handle_name` varchar(255) DEFAULT NULL COMMENT '处理人员姓名',
  `handle_info` varchar(255) DEFAULT NULL COMMENT '处理情况',
  `status` tinyint(4) NOT NULL DEFAULT '10' COMMENT '审核状态 10未处理 20正在处理 30处理完成',
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`complain_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='投诉管理表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `complain`
--

INSERT INTO `complain` (`complain_id`, `member_id`, `title`, `audit_name`, `create_time`, `modify_time`, `finish_time`, `content`, `handle_name`, `handle_info`, `status`, `remark`) VALUES
(4, 1, 'LOL', '小白', 1461832977, 0, 1462181803, 'LOL', '小飞龙', '问题已经完全解决了', 30, '大家一起来玩啊'),
(5, 1, '楼下装修', NULL, 1462182208, 0, 0, '经常半夜装修', NULL, NULL, 10, '请尽快处理');

-- --------------------------------------------------------

--
-- 表的结构 `house`
--

CREATE TABLE IF NOT EXISTS `house` (
  `house_id` int(10) NOT NULL AUTO_INCREMENT,
  `carport_id` int(10) NOT NULL,
  `building_id` int(10) NOT NULL,
  `house_name` varchar(255) NOT NULL,
  `telephone` int(50) NOT NULL,
  `unit_num` int(10) NOT NULL COMMENT '房间单元号',
  `status` tinyint(4) NOT NULL COMMENT '房间状态 10未使用 20使用中',
  `move_in_time` int(10) DEFAULT NULL,
  `move_out_time` int(10) DEFAULT NULL,
  `remark` int(255) DEFAULT NULL,
  PRIMARY KEY (`house_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='住户信息表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `house`
--

INSERT INTO `house` (`house_id`, `carport_id`, `building_id`, `house_name`, `telephone`, `unit_num`, `status`, `move_in_time`, `move_out_time`, `remark`) VALUES
(1, 1, 1, '301', 2147483647, 48, 20, 2147483647, 1111111111, 0),
(2, 1, 2, '', 2147483647, 34, 20, 0, NULL, 0),
(3, 1, 2, '', 2147483647, 23, 20, 0, NULL, 0),
(4, 2, 1, '', 2147483647, 34, 20, 0, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(255) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `house_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `mobile` varchar(255) NOT NULL COMMENT '手机号',
  `building_num` int(10) NOT NULL COMMENT '楼宇号',
  `address_detail` varchar(255) NOT NULL COMMENT '详细地址',
  `is_super` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否管理员 1是 0否',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`member_id`, `house_id`, `username`, `password`, `name`, `mobile`, `building_num`, `address_detail`, `is_super`) VALUES
(1, 1, 'user01', '123456', 'dhh', '88888888', 1, '1号楼203', 0),
(6, 1, 'admin', '123456', '待遇风', '1234567', 1, '临安大学', 1),
(7, 1, 'user033', '123456', 'user02', '18854121500', 6, 'sd', 0);

-- --------------------------------------------------------

--
-- 表的结构 `repair`
--

CREATE TABLE IF NOT EXISTS `repair` (
  `repair_id` int(10) NOT NULL AUTO_INCREMENT,
  `house_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL COMMENT '维修内容',
  `repair_time` int(10) NOT NULL,
  `create_time` int(10) NOT NULL,
  `repair_name` varchar(255) NOT NULL COMMENT '维修人员',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '维修状态0等待维修 10维修中 20维修完成',
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`repair_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='保修管理表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `repair`
--

INSERT INTO `repair` (`repair_id`, `house_id`, `title`, `content`, `repair_time`, `create_time`, `repair_name`, `status`, `remark`) VALUES
(3, 1, '马桶保修', '马桶漏水', 0, 0, '熊熊', 20, ''),
(5, 1, '书桌维修', '我家的书桌脚坏了', 0, 1461830043, '', 0, '尽量快一点');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
