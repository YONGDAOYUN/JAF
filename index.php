<?php
date_default_timezone_set('PRC');//设置时区

require_once './config/config.php';

//判断是否存在
if(!in_array($App, $AppArr)){
	$return = array(
		"err_code" => "0006",
		"err_msg" => "App参数错误"
	);
}else if(!in_array($Method, $MethodArr)){
	$return = array(
		"err_code" => "0007",
		"err_msg" => "Method参数错误"
	);
}else{
	require("./src/".$App."/".$Method.".php");
}

if(empty($return)){
	$return = array(
		"err_code" => "0001",
		"err_msg" => "系统繁忙"
	);
}
//写入日志
if($GLOBALS['DEBUG_LOG'] == true){
	$LogClass->DeBugLogWrite($Module,$Method,"【返回结果】:".$return['err_code']."|".$return['err_msg']);
}
echo json_encode($return);
//mysql_close($conn);
exit;
?>