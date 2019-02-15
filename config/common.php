<?php 	
	/**
     * 获取自定义条形码(计数器)
     * @return boolean/int
     */
    function get_barcode(){
        //当前时间戳 毫秒级
        $microtime = (int)(microtime(true)*1000);
        $barcode = date("y").substr($microtime,2).sprintf('%03s',mt_rand(0,999));
        return $barcode;
    }
	
	/**
     * curlpost数据
	 * @param string $url 地址
	 * @param string $para 数据
     * @return string
     */
	function CurlPostData($url, $para){
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
		curl_setopt($curl,CURLOPT_POST,true); // post传输数据
		curl_setopt($curl,CURLOPT_POSTFIELDS,$para);// post传输数据
		$responseText = curl_exec($curl);
		//var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
		curl_close($curl);	
		return $responseText;
	}
?>