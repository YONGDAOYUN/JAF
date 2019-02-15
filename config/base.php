<?php 	
//1.获取数据（json）
$param = @$GLOBALS['HTTP_RAW_POST_DATA'];
if ($param) {
	$postdata = json_decode($param,true);
}else{
	$param = json_encode(@$_POST);
	$postdata = @$_POST;
}
//验证传递数据不为空
if(empty($postdata)){
	$return = array(
		"err_code" => "0002",
		"err_msg" => "post内容不能为空"
	);
}else{
	//验证数据	
	if(!is_array($postdata)){
		$return = array(
			"err_code" => "0003",
			"err_msg" => "参数格式不正确"
		);	   
	}else if(empty($postdata['App'])){
		$return = array(
			"err_code" => "0004",
			"err_msg" => "缺少公共参数App"
		);
	}else if(empty($postdata['Method'])){
		$return = array(
			"err_code" => "0004",
			"err_msg" => "缺少公共参数Method"
		);
	}else if(empty($postdata['TimeStamp'])){
		$return = array(
			"err_code" => "0004",
			"err_msg" => "缺少公共参数TimeStamp"
		);
	}else if(empty($postdata['Sign'])){
		$return = array(
			"err_code" => "0004",
			"err_msg" => "缺少公共参数Sign"
		);
	}
}

$App = @$postdata['App']; //模块
$Method = @$postdata['Method']; //方法

//写入日记
if($GLOBALS['DEBUG_LOG'] == true){
	$LogClass->DeBugLogWrite($Module,$Method,"【接收信息】:".$param);
}
if(!empty($return)){
	if($GLOBALS['DEBUG_LOG'] == true){
		$LogClass->DeBugLogWrite($Module,$Method,"【返回结果】:".$return['err_msg']);
	}
	echo json_encode($return);exit;	
}
?>