-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-12-20 13:31:42
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chd`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(64) NOT NULL COMMENT '密码',
  `hospital` varchar(4) NOT NULL COMMENT '所属医院',
  `role` varchar(4) NOT NULL COMMENT '角色',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `parent_id` int(11) NOT NULL COMMENT '创建者ID',
  `last_login_time` int(11) NOT NULL COMMENT '最近一次登录时间'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `hospital`, `role`, `create_time`, `parent_id`, `last_login_time`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1000', '0', 0, 0, 1450611038),
(4, 'herbre', 'e10adc3949ba59abbe56e057f20f883e', '1001', '1', 1437401873, 0, 1437791124);

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `type` varchar(50) NOT NULL COMMENT '类型',
  `c_key` varchar(4) NOT NULL COMMENT '配置项关键字',
  `c_value` text NOT NULL COMMENT '配置项值'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='配置信息表 ';

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`id`, `type`, `c_key`, `c_value`) VALUES
(2, 'role', '0', '超级管理员'),
(3, 'role', '1', '主任'),
(4, 'role', '2', '医生'),
(5, 'hospital', '1000', '昆明医科大学第一附属医院'),
(6, 'xztz_bw', '1001', '心尖'),
(7, 'xztz_bw', '1002', '主动脉瓣区'),
(8, 'xztz_bw', '1003', '肺动脉瓣区'),
(9, 'xztz_bw', '1004', '三尖瓣区'),
(10, 'xztz_sq', '1001', '收缩期'),
(11, 'xztz_sq', '1002', '舒张期'),
(12, 'xztz_sq', '1003', '连续性'),
(13, 'qtjx', '1001', '耳聋'),
(14, 'qtjx', '1002', '先天性白内障'),
(15, 'qtjx', '1003', '兔唇'),
(16, 'qtjx', '1004', '21三体'),
(17, 'qtjx', '1005', '溶血'),
(18, 'qtjx', '1006', '贫血'),
(19, 'qtjx', '1007', '骨关节畸形'),
(20, 'qtjx', '1008', '内脏发育异常'),
(21, 'xlsc', '1001', 'I度'),
(22, 'xlsc', '1002', 'II度一型'),
(23, 'xlsc', '1003', 'III度二型'),
(24, 'hospital', '1001', '重庆西南医院'),
(25, 'hospital', '1002', '第三军医大学第一附属医院'),
(26, 'hospital', '1003', '玉龙县人民医院');

-- --------------------------------------------------------

--
-- 表的结构 `diagnostic`
--

CREATE TABLE IF NOT EXISTS `diagnostic` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `patient_code` varchar(32) NOT NULL COMMENT '病人ID',
  `xztz_zy` bit(1) NOT NULL COMMENT '心脏听诊 杂音 有 1 无 0',
  `xztz_bw` text NOT NULL COMMENT '心脏听诊 部位 不定项勾选 心尖()       主动脉瓣区()        肺动脉瓣区()     三尖瓣区()',
  `xztz_sq` text NOT NULL COMMENT '心脏听诊 时期 不定项勾选收缩期()     舒张期()      连续性()',
  `kyzx_wykn` bit(1) NOT NULL COMMENT '可疑症象 喂养困难 是-否',
  `kyzx_ffgm` bit(1) NOT NULL COMMENT '可疑症象 反复感冒、肺炎 是-否',
  `kyzx_tsmr` bit(1) NOT NULL COMMENT '可疑症象 特殊面容 是-否',
  `kyzx_hdnlc` bit(1) NOT NULL COMMENT '可疑症象 活动耐力差 是-否',
  `kyzx_xxqlq` bit(1) NOT NULL COMMENT '可疑症象 心胸区隆起 是-否',
  `kyzx_fg` bit(1) NOT NULL COMMENT '可疑症象 发绀 是-否',
  `kyzx_szfych` bit(1) NOT NULL COMMENT '可疑症象 生长发育迟缓 是-否',
  `kyzx_hxjc` bit(1) NOT NULL COMMENT '可疑症象 呼吸急促 是-否',
  `kyzx_hxjc_ext` int(11) NOT NULL COMMENT '可疑症象 呼吸急促  单位次/分',
  `kyzx_xdj` int(11) NOT NULL COMMENT '可疑症象 喜蹲踞  是-否',
  `jpcysz_shou_1` float NOT NULL COMMENT '经皮测氧数值（%） 手 ',
  `jpcysz_yz_1` float NOT NULL COMMENT '经皮测氧数值（%） 右足',
  `jpcysz_shou_2` float NOT NULL COMMENT '第二次',
  `jpcysz_yz_2` float NOT NULL,
  `jpcysz_shou_3` float NOT NULL COMMENT '第三次',
  `jpcysz_yz_3` float NOT NULL,
  `fmwycqblsj_yzqgr` int(1) NOT NULL COMMENT '父母围孕产期不良事件 孕早期感染 是-否-不详',
  `fmwycqblsj_xy` int(1) NOT NULL COMMENT '父母围孕产期不良事件 吸烟 是-否',
  `fmwycqblsj_dwjc` int(1) NOT NULL COMMENT '父母围孕产期不良事件 毒物接触 是-否-不详',
  `fmwycqblsj_xj` int(1) NOT NULL COMMENT '父母围孕产期不良事件 酗酒 是-否',
  `fmwycqblsj_sxjc` int(1) NOT NULL COMMENT '父母围孕产期不良事件 射线接触 是-否-不详',
  `xzcc_PDA` int(1) NOT NULL COMMENT '心脏彩超 PDA 是-否',
  `xzcc_VSD` int(1) NOT NULL COMMENT '心脏彩超 VSD 是-否',
  `xzcc_ASD` int(1) NOT NULL COMMENT '心脏彩超 ASD 是-否',
  `xzcc_TFO` int(1) NOT NULL COMMENT '心脏彩超 TFO 是-否',
  `xzcc_PS` int(1) NOT NULL COMMENT '心脏彩超 PS 是-否',
  `xzcc_Ebstein` int(1) NOT NULL COMMENT '心脏彩超 Ebstein畸形 是-否',
  `xzcc_qt` int(1) NOT NULL COMMENT '心脏彩超 其他 是-否',
  `xzcc_qt_ext` text NOT NULL COMMENT '心脏彩超 其他 扩展内容',
  `qtjx` int(1) NOT NULL COMMENT '其他畸形  有-无   ',
  `qtjx_ext` text NOT NULL COMMENT '其他畸形 有 扩展内容：耳聋 先天性白内障 兔唇 21三体 溶血 贫血 骨关节畸形 内脏发育异常   '
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='诊断信息表';

--
-- 转存表中的数据 `diagnostic`
--

INSERT INTO `diagnostic` (`id`, `patient_code`, `xztz_zy`, `xztz_bw`, `xztz_sq`, `kyzx_wykn`, `kyzx_ffgm`, `kyzx_tsmr`, `kyzx_hdnlc`, `kyzx_xxqlq`, `kyzx_fg`, `kyzx_szfych`, `kyzx_hxjc`, `kyzx_hxjc_ext`, `kyzx_xdj`, `jpcysz_shou_1`, `jpcysz_yz_1`, `jpcysz_shou_2`, `jpcysz_yz_2`, `jpcysz_shou_3`, `jpcysz_yz_3`, `fmwycqblsj_yzqgr`, `fmwycqblsj_xy`, `fmwycqblsj_dwjc`, `fmwycqblsj_xj`, `fmwycqblsj_sxjc`, `xzcc_PDA`, `xzcc_VSD`, `xzcc_ASD`, `xzcc_TFO`, `xzcc_PS`, `xzcc_Ebstein`, `xzcc_qt`, `xzcc_qt_ext`, `qtjx`, `qtjx_ext`) VALUES
(3, '2015071816110472464', b'1', '1002,1003', '1002,1003', b'1', b'1', b'1', b'0', b'0', b'0', b'0', b'0', 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '1001,1002,1003,1004,1007,1008'),
(4, '2015071400002', b'0', '', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, ''),
(5, '2015071400001', b'0', '', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 21, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, ''),
(6, '201507220001', b'1', '', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 232, 232, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, ''),
(7, '201507222', b'0', '', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, -4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, ''),
(8, '201507220001', b'0', '', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, -4, -5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, ''),
(9, '2015072200002', b'0', '', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, -4, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, ''),
(10, '201507220002', b'0', '', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, -5, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, ''),
(11, '201507220003', b'0', '', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, -4, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, ''),
(12, '201507220004', b'0', '', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, -5, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, ''),
(13, '201507230001', b'0', '', '', b'0', b'0', b'0', b'0', b'0', b'0', b'0', b'0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `followup`
--

CREATE TABLE IF NOT EXISTS `followup` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `patient_code` varchar(21) NOT NULL COMMENT '病人ID',
  `project` int(11) NOT NULL COMMENT '分3,6月和1年随访',
  `zl` bit(1) NOT NULL COMMENT '治疗',
  `csfcjg_image` text NOT NULL COMMENT '超声复查结果 图像',
  `csfcjg_text` int(11) NOT NULL COMMENT '超声复查结果 文字描述'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='随访记录表';

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `code` varchar(4) NOT NULL COMMENT '菜单code',
  `group` varchar(4) NOT NULL COMMENT '父级菜单code',
  `name` varchar(50) NOT NULL COMMENT '菜单显示名称',
  `url` text NOT NULL COMMENT '菜单链接'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`id`, `code`, `group`, `name`, `url`) VALUES
(1, '1000', '0', '总览', '/admin/dashboard'),
(2, '1001', '1', '大儿童病例列表', '/admin/patient'),
(3, '1002', '1', '大儿童病例新增', '/admin/patient/add'),
(4, '1003', '2', '随访列表', '#'),
(5, '1004', '2', '到期已填写', '#'),
(6, '1005', '2', '到期未填写', '#'),
(7, '1006', '2', '过期随访', '#'),
(8, '1007', '3', '数据分析', '#'),
(9, '1008', '4', '用户管理', '/admin/user'),
(10, '1009', '4', '医院管理', '/admin/hospital'),
(11, '1010', '1', '新生儿病例列表', ''),
(12, '1011', '1', '新生儿病例新增', '');

-- --------------------------------------------------------

--
-- 表的结构 `newborn_diagnostic`
--

CREATE TABLE IF NOT EXISTS `newborn_diagnostic` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `info_code` varchar(32) NOT NULL COMMENT '新生儿ID',
  `KYZX` tinyint(1) NOT NULL COMMENT '可疑征象 1.无  2.有',
  `KYZX_OPTION` varchar(255) NOT NULL COMMENT '不定项选择A.青紫、B.呼吸急促、C.上呼吸道感染或肺炎、D.特殊面容、E.喂养困难、F.输入',
  `XWJX` tinyint(1) NOT NULL COMMENT '心外畸形或出生缺陷1.无  2.有  ',
  `XWJX_OPTION` varchar(255) NOT NULL COMMENT '不定项选择A.耳聋B.先天性白内障、C.兔唇、D.21三体、E.骨关 节畸形、F.溶血、G.贫血、H.内脏发育异常 I.输入',
  `XZTZ` tinyint(1) NOT NULL COMMENT '心脏听诊（杂音）1.无  2.有  ',
  `XZTZ_BW_OPTION` varchar(255) NOT NULL COMMENT '部位 不定项选择 A心尖区、B肺动脉瓣区、C主动脉瓣第一听诊区、D主动脉瓣第二听诊区、E三尖瓣区',
  `XZTZ_SQ_OPTION` varchar(255) NOT NULL COMMENT '时期 不定项选择 1.收缩期、2.舒张期、3.连续性',
  `XYBHD_CSS_YS` varchar(10) NOT NULL COMMENT '血氧饱和度出生24小时  右手：___%',
  `XYBHD_CSS_YJ` varchar(10) NOT NULL COMMENT '出生24小时  右脚：___%',
  `XYBHD_CYQ_YS` varchar(10) NOT NULL COMMENT '出院前 右手：___%  ',
  `XYBHD_CYQ_YJ` varchar(10) NOT NULL COMMENT '出院前 右脚：___%  ',
  `XZTZFZJG` tinyint(1) NOT NULL COMMENT '心脏听诊复诊结果 1.正常 2.异常',
  `XZTZFZJG_ZYBW_OPTION` varchar(255) NOT NULL COMMENT '杂音部位 不定项选择 A心尖区、B肺动脉瓣区、C主动脉瓣第一听诊区、D主动脉瓣第二听诊区、E三尖瓣区',
  `XZTZFZJG_SQ_OPTION` varchar(255) NOT NULL COMMENT '时期 不定项选择 1.收缩期、2.舒张期、3.连续性',
  `XZCC` tinyint(1) NOT NULL COMMENT '心脏彩超检查结果 1.正常 2.异常',
  `XZCC_OPTION` varchar(255) NOT NULL COMMENT '不定项选择 A.PDA 、B.VSD 、C.ASD 、D.TFO 、E.PS 、F.Ebstein畸形 、G.输入',
  `QTJC` tinyint(1) NOT NULL COMMENT '其它检查 1.正常 2.异常',
  `QTJC_INPUT` text NOT NULL COMMENT '其它检查 输入',
  `CSZD_OPTION` varchar(255) NOT NULL COMMENT '出生诊断 不定项选择 A.正常足月儿、B.早产儿、C.新生儿黄疸、D.新生儿肺炎、E.新生儿窒息、F.先天性心脏病',
  `CSZD_INPUT` text NOT NULL COMMENT '出生诊断 输入',
  `BZ_INPUT` text NOT NULL COMMENT '备注 输入',
  `KYZX_INPUT` text NOT NULL COMMENT '可疑征象 输入',
  `XWJX_INPUT` text NOT NULL COMMENT '心外畸形或出生缺陷 输入',
  `XZCC_INPUT` text NOT NULL COMMENT '心脏彩超 输入'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新生儿诊断信息';

-- --------------------------------------------------------

--
-- 表的结构 `newborn_father`
--

CREATE TABLE IF NOT EXISTS `newborn_father` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `info_code` int(11) NOT NULL,
  `CSNY` int(11) NOT NULL COMMENT '出生年月',
  `MZ` varchar(255) NOT NULL COMMENT '民族	单项勾选	1.汉族 2.回族 3.傣族 4.彝族 5.白族 6.苗族 7.哈尼族8.瑶族9.输入 ',
  `MZ_INPUT` varchar(255) NOT NULL COMMENT '民族 输入',
  `ZY` varchar(255) NOT NULL COMMENT '职业	单项勾选	1.工人 2.农民 3.进城务工 4.公司职员 5.公务员或事业单位工作人员 6.个体经营者 7.无业人员 8.输入',
  `ZY_INPUT` varchar(255) NOT NULL COMMENT '职业		输入',
  `WHCD` varchar(255) NOT NULL COMMENT '文化程度（学历）	单项勾选	1.小学以下 2.小学 3.初中 4.高中 5.中专 6.大专 7.本科及以上',
  `CZD` text NOT NULL COMMENT '常住地	输入',
  `BLXG` tinyint(1) NOT NULL COMMENT '不良生活习惯	下拉框选择	1.无  2.有  ',
  `BLXG_OPTION` varchar(255) NOT NULL COMMENT '不良生活习惯 1.无  2.有  ',
  `BLXG_INPUT` text NOT NULL COMMENT 'A.主动吸烟 B.被动吸烟 C.饮酒 D.吸毒 E.赌博 F.输入	不定项勾选',
  `YHWZJC` tinyint(1) NOT NULL COMMENT '有害物质接触	下拉框选择	1.无  2.有  ',
  `YHWZJC_OPTION` varchar(255) NOT NULL COMMENT '有害物质接触 "A.噪声 B.微波 C.电脑辐射 D.X线 E.铅汞等重金属 F.苯 G. 农药 H.油漆 I.涂料 J.空气污染 K.水污染 L.输入 "	不定项勾选',
  `YHWZJC_INPUT` text NOT NULL COMMENT '有害物质接触 输入',
  `JWBS` tinyint(1) NOT NULL COMMENT '既往病史	下拉框选择	1.无  2.有  ',
  `JWBS_INPUT` text NOT NULL COMMENT '既往病史 输入',
  `JZYCBS` tinyint(1) NOT NULL COMMENT '家族遗传病史及先心病家族史	下拉框选择	1.无  2.有  ',
  `JZYCBS_INPUT` text NOT NULL COMMENT '家族遗传病史及先心病家族史	输入'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `newborn_info`
--

CREATE TABLE IF NOT EXISTS `newborn_info` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `code` varchar(32) NOT NULL COMMENT '新生儿ID',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `sex` int(1) NOT NULL COMMENT '性别',
  `TL` int(11) NOT NULL COMMENT '胎龄',
  `TS` int(11) NOT NULL COMMENT '胎数',
  `CSTZ` varchar(5) NOT NULL COMMENT '出生体重（单位克）',
  `CSRQ` int(11) NOT NULL COMMENT '出生时间',
  `TCFS` int(1) NOT NULL COMMENT '胎产方式 1.顺产 2.剖宫产',
  `XSEPF` varchar(5) NOT NULL COMMENT '新生儿评分 单位：分',
  `hospital` varchar(4) NOT NULL COMMENT '所属医院ID',
  `fllow_hospital` varchar(4) NOT NULL COMMENT '随访医院ID',
  `create_time` int(11) NOT NULL COMMENT '记录创建时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新生儿基础信息';

-- --------------------------------------------------------

--
-- 表的结构 `newborn_monther`
--

CREATE TABLE IF NOT EXISTS `newborn_monther` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `info_code` varchar(32) NOT NULL COMMENT '新生儿ID',
  `CSNY` int(11) NOT NULL COMMENT '出生年月',
  `MZ` varchar(255) NOT NULL COMMENT '民族 1.汉族 2.回族 3.傣族 4.彝族 5.白族 6.苗族 7.哈尼族8.瑶族',
  `ZY` varchar(255) NOT NULL COMMENT '职业 1.工人 2.农民 3.进城务工 4.公司职员 5.公务员或事业单位工作人员 6.个体经营者 7.无业人员',
  `WHCD` varchar(255) NOT NULL COMMENT '文化程度（学历） 1.小学以下 2.小学 3.初中 4.高中 5.中专 6.大专 7.本科及以上',
  `JTNSR` varchar(255) NOT NULL COMMENT '家庭年收入 1.五千以下 2.五千以上一万以下 3.一万以上五万以下 4.五万--十万 5.十万以上',
  `CZD` text NOT NULL COMMENT '常住地',
  `YZ` varchar(10) NOT NULL COMMENT '孕周',
  `HYNN` varchar(10) NOT NULL COMMENT '此次怀孕时年龄',
  `YCCS` int(11) NOT NULL COMMENT '孕次产次 1~20',
  `YWRSJJ` varchar(255) NOT NULL COMMENT '以往妊娠结局 A.早产 B.活产正常儿 C.自然流产 D.死胎 E.死产 F.新生儿死亡 G.生育畸形儿',
  `CSQXYYS` int(11) NOT NULL COMMENT '出生缺陷孕育史（含先心病）',
  `MZ_INPUT` int(11) NOT NULL COMMENT '民族 输入',
  `ZY_INTPUT` int(11) NOT NULL COMMENT '职业 输入',
  `CSQXYYS_INPUT` int(11) NOT NULL COMMENT '出生缺陷孕育史（含先心病） 输入',
  `SJQSNXXBS` int(11) NOT NULL COMMENT '三级亲属内先心病史 1.无  2.有  ',
  `SJQSNXXBS_INPUT` int(11) NOT NULL COMMENT '三级亲属内先心病史 输入',
  `JZYCBS` int(11) NOT NULL COMMENT '家族遗传病史  1.无  2.有  ',
  `JZYCBS_INPUT` int(11) NOT NULL COMMENT '家族遗传病史 输入',
  `JQHPS` int(11) NOT NULL COMMENT '近亲婚配史 1.无  2.有  ',
  `JQHPS_INPUT` int(11) NOT NULL COMMENT '近亲婚配史 输入'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新生儿母亲信息';

-- --------------------------------------------------------

--
-- 表的结构 `newborn_ survey`
--

CREATE TABLE IF NOT EXISTS `newborn_ survey` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `info_code` varchar(32) NOT NULL COMMENT '新生儿ID',
  `YYMC` varchar(255) NOT NULL COMMENT '医院名称',
  `YYKS` tinyint(1) NOT NULL COMMENT '科室 单项选择	心内科，产科，儿科',
  `ZYH` varchar(255) NOT NULL COMMENT '住院号',
  `CHXM` varchar(255) NOT NULL COMMENT '产妇姓名',
  `JTZZ` varchar(500) NOT NULL COMMENT '家庭住址',
  `LXDH_FQ` varchar(20) NOT NULL COMMENT '联系电话（新生儿父亲）',
  `LXDH_MQ` varchar(20) NOT NULL COMMENT '联系电话（新生儿母亲）',
  `DCBTP` text NOT NULL COMMENT '调查表图片 文件上传 下载'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新生儿调查表';

-- --------------------------------------------------------

--
-- 表的结构 `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `patient_code` varchar(32) NOT NULL COMMENT '病人ID',
  `ssbh` varchar(200) NOT NULL COMMENT '手术编号',
  `sssj` int(11) NOT NULL COMMENT '手术时间',
  `ssfs_jrfd` bit(1) NOT NULL COMMENT '手术方式 介入封堵 是 否',
  `ssfs_jrfd_qxmc` text NOT NULL COMMENT '手术方式 介入封堵 器械名称',
  `ssfs_jrfd_size` text NOT NULL COMMENT '手术方式 介入封堵 size',
  `ssfs_wkkx` bit(1) NOT NULL COMMENT '手术方式 外科开胸（根治手术、分次手术）',
  `ssfs_wxqkfd` bit(1) NOT NULL COMMENT '手术方式 微笑切口封堵',
  `ssbfz_rx` bit(1) NOT NULL COMMENT '手术并发症 溶血',
  `ssbfz_cyl` bit(1) NOT NULL COMMENT '手术并发症 残余漏',
  `ssbfz_xlsc` bit(1) NOT NULL COMMENT '手术并发症 心律失常 是 否',
  `ssbfz_xlsc_sxzb` text NOT NULL COMMENT '手术并发症 心律失常 室性早搏',
  `ssbfz_xlsc_fscdzz` text NOT NULL COMMENT '手术并发症 心律失常 房室传导阻滞',
  `ssbfz_szcdzz` bit(1) NOT NULL COMMENT '手术并发症 束支传导阻滞',
  `ssbfz_fc` bit(1) NOT NULL COMMENT '手术并发症 房颤',
  `ssbfz_Erosion` bit(1) NOT NULL COMMENT '手术并发症 Erosion',
  `ssbfz_fdqtl` bit(1) NOT NULL COMMENT '手术并发症 封堵器脱落',
  `ssbfz_qt` text NOT NULL COMMENT '手术并发症 其他',
  `shcs_image` text NOT NULL COMMENT '术后超声 上传图片',
  `shcs_text` text NOT NULL COMMENT '术后超声 文字输入',
  `shsf_date` int(11) NOT NULL COMMENT '术后随访 日历选择',
  `shsf_rx` bit(1) NOT NULL COMMENT '术后随访 溶血',
  `shsf_cyl` bit(1) NOT NULL COMMENT '术后随访 残余漏',
  `shsf_xlsc` bit(1) NOT NULL COMMENT '术后随访 心律失常 是 否',
  `shsf_xlsc_sxzb` text NOT NULL COMMENT '术后随访 心律失常  室性早搏',
  `shsf_xlsc_fscdzz` text NOT NULL COMMENT '术后随访 心律失常 房室传导阻滞',
  `shsf_szcdzz` bit(1) NOT NULL COMMENT '术后随访 束支传导阻滞',
  `shsf_fc` bit(1) NOT NULL COMMENT '术后随访 房颤',
  `shsf_Erosion` bit(1) NOT NULL COMMENT '术后随访 Erosion',
  `shsf_fdqtl` bit(1) NOT NULL COMMENT '术后随访 封堵器脱落',
  `shsf_qt` text NOT NULL COMMENT '术后随访 其他',
  `shsf_cs_image` text NOT NULL COMMENT '术后随访超声 图片',
  `shsf_cs_text` text NOT NULL COMMENT '术后随访超声 输入'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='先心病介入手术';

--
-- 转存表中的数据 `operation`
--

INSERT INTO `operation` (`id`, `patient_code`, `ssbh`, `sssj`, `ssfs_jrfd`, `ssfs_jrfd_qxmc`, `ssfs_jrfd_size`, `ssfs_wkkx`, `ssfs_wxqkfd`, `ssbfz_rx`, `ssbfz_cyl`, `ssbfz_xlsc`, `ssbfz_xlsc_sxzb`, `ssbfz_xlsc_fscdzz`, `ssbfz_szcdzz`, `ssbfz_fc`, `ssbfz_Erosion`, `ssbfz_fdqtl`, `ssbfz_qt`, `shcs_image`, `shcs_text`, `shsf_date`, `shsf_rx`, `shsf_cyl`, `shsf_xlsc`, `shsf_xlsc_sxzb`, `shsf_xlsc_fscdzz`, `shsf_szcdzz`, `shsf_fc`, `shsf_Erosion`, `shsf_fdqtl`, `shsf_qt`, `shsf_cs_image`, `shsf_cs_text`) VALUES
(3, '2015071816110472464', '3423423', 626544000, b'1', '', '', b'1', b'0', b'0', b'0', b'0', '', '1002', b'1', b'0', b'0', b'0', '', '', '', 1437494400, b'0', b'0', b'0', '', '1003', b'1', b'1', b'0', b'0', '', 'http://localhost:9999/assets/filestore/image/2015-07-19/14372760797330.jpg', ''),
(4, '2015071400002', '', 0, b'0', '', '', b'0', b'0', b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', 'http://localhost:9999/assets/filestore/image/2015-07-19/14372878494122.jpg', '', 0, b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', 'http://localhost:9999/assets/filestore/image/2015-07-19/14372845827059.jpg   ', ''),
(5, '2015071400001', '', 0, b'0', '', '', b'0', b'0', b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', '  ', '', 0, b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', '  ', ''),
(6, '201507220001', '', 0, b'0', '', '', b'0', b'0', b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', '', 0, b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', ''),
(7, '201507222', '', 0, b'0', '', '', b'0', b'0', b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', '', 0, b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', ''),
(8, '201507220001', '', 0, b'0', '', '', b'0', b'0', b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', '', 0, b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', ''),
(9, '2015072200002', '', 0, b'0', '', '', b'0', b'0', b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', '', 0, b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', ''),
(10, '201507220002', '', 0, b'0', '', '', b'0', b'0', b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', '', 0, b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', ''),
(11, '201507220003', '', 0, b'0', '', '', b'0', b'0', b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', '', 0, b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', ''),
(12, '201507220004', '', 0, b'0', '', '', b'0', b'0', b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', '  ', '', 0, b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', '  ', ''),
(13, '201507230001', '', 0, b'0', '', '', b'0', b'0', b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', '', 0, b'0', b'0', b'0', '', '', b'0', b'0', b'0', b'0', '', ' ', '');

-- --------------------------------------------------------

--
-- 表的结构 `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL COMMENT 'ID主键',
  `patient_code` varchar(32) NOT NULL COMMENT '病人编号',
  `name` varchar(50) NOT NULL COMMENT '姓名',
  `sex` int(1) NOT NULL DEFAULT '2' COMMENT '性别 1 女 2 男',
  `born` int(11) NOT NULL COMMENT '出生日期',
  `nationality` varchar(20) NOT NULL COMMENT '名族',
  `place` varchar(20) NOT NULL COMMENT '籍贯',
  `phone` varchar(20) NOT NULL COMMENT '联系电话',
  `address` varchar(500) NOT NULL COMMENT '详细地址',
  `has_history` bit(1) NOT NULL COMMENT '是否有家族病史，1 有 0 无',
  `height` varchar(10) NOT NULL COMMENT '身高 cm',
  `weight` varchar(10) NOT NULL COMMENT '体重 kg',
  `BMI` float NOT NULL COMMENT '自动计算 体重(公斤) / 身高2(米2)',
  `hospital` varchar(4) NOT NULL COMMENT '建档医院',
  `follow_hospital` varchar(4) NOT NULL COMMENT '随访医院',
  `xxbjrss` bit(1) NOT NULL COMMENT '先心病介入手术 是-否',
  `create_time` int(11) NOT NULL COMMENT '建档时间'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='病人 基础信息表';

--
-- 转存表中的数据 `patient`
--

INSERT INTO `patient` (`id`, `patient_code`, `name`, `sex`, `born`, `nationality`, `place`, `phone`, `address`, `has_history`, `height`, `weight`, `BMI`, `hospital`, `follow_hospital`, `xxbjrss`, `create_time`) VALUES
(1, '2015071400001', '张大炮', 2, 1436976000, '汉族', '重庆', '18985254874', '重庆市渝北区 ', b'0', '100', '30', 30, '1000', '1000', b'0', 1437526376),
(2, '2015071400002', '周杰伦', 2, 1716998400, '汉族', '重庆', '18985254874', '重庆市渝北区 ', b'0', '110', '50', 41.3223, '1000', '', b'0', 1437287859),
(7, '201507220001', 'afasd', 2, 1435593600, '汉族', 'dfasd', '4871111111', 'sdfsdfsd', b'0', '', '', 0, '1001', '1001', b'0', 1437555970),
(10, '201507220003', 'dfs', 2, 1436284800, '汉族', '重启过', 'sdf', 'sdfsd', b'0', '', '', 0, '1001', '1001', b'0', 1437556097),
(11, '201507220004', 'xcvzxv', 1, 1436284800, '汉族', 'zcxv', '13245673232', 'xcvxc', b'0', '', '', 0, '1001', '1001', b'1', 1437569664),
(12, '201507230001', 'sdfsdf', 1, 1436371200, '汉族', 'sdfs', '18983260059', 'dfsdf', b'0', '', '', 0, '1000', '1000', b'0', 1437639065);

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `code` int(2) NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `permission` text NOT NULL COMMENT '角色权限'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='角色管理';

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`id`, `code`, `name`, `permission`) VALUES
(1, 0, '超级管理员', '1000,1001,1002,1003,1004,1005,1006,1007,1008,1009,1010,1011'),
(2, 1, '管理员', '1000,1001,1002,1003,1004,1005,1006,1007,1010,1011'),
(3, 2, '主任', '1000,1001,1002,1003,1004,1005,1006,1007,1010,1011'),
(4, 3, '医生', '1000,1001,1002,1003,1004,1005,1006,1010,1011');

-- --------------------------------------------------------

--
-- 表的结构 `share`
--

CREATE TABLE IF NOT EXISTS `share` (
  `id` int(11) NOT NULL COMMENT '主键ID',
  `hospital` varchar(4) NOT NULL COMMENT '病历提供医院',
  `target_hospital` varchar(4) NOT NULL COMMENT '病历分享到医院',
  `permission` varchar(10) NOT NULL COMMENT '病历分享到医院所拥有权限'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='病历分享表';

--
-- 转存表中的数据 `share`
--

INSERT INTO `share` (`id`, `hospital`, `target_hospital`, `permission`) VALUES
(11, '1001', '1001', '0,1,2'),
(12, '1002', '1002', '0,1,2'),
(13, '1003', '1003', '0,1,2'),
(22, '1000', '1000', '0,1,2'),
(23, '1000', '1001', '0,1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostic`
--
ALTER TABLE `diagnostic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followup`
--
ALTER TABLE `followup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newborn_diagnostic`
--
ALTER TABLE `newborn_diagnostic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newborn_father`
--
ALTER TABLE `newborn_father`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newborn_info`
--
ALTER TABLE `newborn_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newborn_monther`
--
ALTER TABLE `newborn_monther`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newborn_ survey`
--
ALTER TABLE `newborn_ survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_code` (`patient_code`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `diagnostic`
--
ALTER TABLE `diagnostic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `followup`
--
ALTER TABLE `followup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID';
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `newborn_diagnostic`
--
ALTER TABLE `newborn_diagnostic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID';
--
-- AUTO_INCREMENT for table `newborn_father`
--
ALTER TABLE `newborn_father`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID';
--
-- AUTO_INCREMENT for table `newborn_info`
--
ALTER TABLE `newborn_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID';
--
-- AUTO_INCREMENT for table `newborn_monther`
--
ALTER TABLE `newborn_monther`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID';
--
-- AUTO_INCREMENT for table `newborn_ survey`
--
ALTER TABLE `newborn_ survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID';
--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID主键',AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
