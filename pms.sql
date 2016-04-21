-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-21 11:07:44
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='楼宇表' AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='车位管理表' AUTO_INCREMENT=1 ;

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
  `status` tinyint(4) NOT NULL COMMENT '缴费状态',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  PRIMARY KEY (`charge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收费管理表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `charge_type`
--

CREATE TABLE IF NOT EXISTS `charge_type` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL COMMENT '缴费类型',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `complain`
--

CREATE TABLE IF NOT EXISTS `complain` (
  `complain_id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `audit_name` varchar(255) NOT NULL COMMENT '审核人员姓名',
  `create_time` int(10) NOT NULL,
  `modify_time` int(10) NOT NULL,
  `finish_time` int(10) NOT NULL,
  `content` varchar(255) NOT NULL COMMENT '投诉内容',
  `handle_name` varchar(255) NOT NULL COMMENT '处理人员姓名',
  `handle_info` varchar(255) NOT NULL COMMENT '处理情况',
  `status` tinyint(4) NOT NULL DEFAULT '10' COMMENT '审核状态 10未处理',
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`complain_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='投诉管理表' AUTO_INCREMENT=1 ;

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
  `status` tinyint(4) NOT NULL COMMENT '房间状态',
  `move_in_time` int(10) NOT NULL,
  `move_out_time` int(10) NOT NULL,
  `remark` int(255) NOT NULL,
  PRIMARY KEY (`house_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='住户信息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(255) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `house_name` int(10) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `mobile` varchar(255) NOT NULL COMMENT '手机号',
  `building_num` int(10) NOT NULL COMMENT '楼宇号',
  `address_detail` varchar(255) NOT NULL COMMENT '详细地址',
  `is_super` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否管理员 1是 0否',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`member_id`, `house_name`, `username`, `password`, `name`, `mobile`, `building_num`, `address_detail`, `is_super`) VALUES
(1, 0, 'user01', '123456', 'dhh', '88888888', 1, '1号楼203', 0),
(6, 1, 'admin', '123456', '待遇风', '1234567', 1, '临安大学', 1),
(7, 203, 'user033', '123456', 'user02', '18854121500', 6, 'sd', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保修管理表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
