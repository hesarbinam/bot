<?php

	// https://api.telegram.org/bot1244263877:AAE7yiPwxxnuremNPSKsU4hVsMY8c1l5urk/setwebhook?url=https://raw.githubusercontent.com/hesarbinam/bot/main/mohsen_bt.php
	$update = file_get_contents("php://input");
	
	$update_array = json_decode($update , true);
	
	if (isset($update_array["message"]))
	{
		$text = $update_array["message"]["text"];
		
		$chat_id = $update_array["message"]["chat"]["id"];
		
	}
	
	$reply = "پیام شما : ".$GLOBALS['text'];
	$url = "https://api.telegram.org/bot" ."1244263877:AAE7yiPwxxnuremNPSKsU4hVsMY8c1l5urk" . "/sendMessage";
	
	$post_params = ['chat_id' => $GLOBALS['chat_id'] , 'text' => $reply];
	send_replay($url , $post_params);
	
	
	function send_replay($url , $post_params)
	{
		$cu = curl_init();
		
		curl_setopt($cu , CURLOPT_URL , $url);
		curl_setopt($cu , CURLOPT_POSTFIELDS , $post_params);
		curl_setopt($cu , CURLOPT_RETURNTRANSFER, true);
		
		$result = curl_exec($cu);
		
		curl_close($cu);
		
		return $result;
	}

?>
