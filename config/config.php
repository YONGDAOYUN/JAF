<?php
/**
*站点基本配置
*/

/* 日志设置 */
//$GLOBALS['LOG_RECORD'] = false; // 默认不记录日志
$GLOBALS['DEBUG_LOG'] = false;//调试日记
if($GLOBALS['DEBUG_LOG'] == true){
	require_once './core/Library/Log.class.php';
	$LogClass = new Log();
}

/* 基础信息 */
require_once './config/base.php';


$GLOBALS['AppArr'] = array('hotel');  //应用
$GLOBALS['MethodArr'] = array('HotelList');  //方法




/*
0001:系统繁忙
0002:post内容不能为空
0003:参数格式不正确
0004:缺少公共参数
0005:签名错误
0006:App参数错误
0007:Method参数错误
*/

?>