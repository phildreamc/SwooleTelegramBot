<?php

use Longman\TelegramBot\Request;

class Tg {
	
	private static $tg;
	
	public static function getInstance() {
		if (!is_object(self::$tg)) {
			self::$tg = new self();
		}
		return self::$tg;
	}
	
	//返回文本消息
	public function editMessageText($param) {
		$chat_id = $param['chat_id'];
		$message_id = $param['message_id'];
		$temp = explode('.', $param['view']);
		$call_param = $param['param'] ?? [];
		$buttonInfo = call_user_func_array([$temp[0], $temp[1]], $call_param);
		$keyboard = $buttonInfo['body'];
		$encodedKeyboard = json_encode($keyboard);
		go(function () use ($chat_id, $message_id, $buttonInfo, $encodedKeyboard) {
			Request::editMessageText([
				'chat_id' => $chat_id,
				'message_id' => $message_id,
				'text'    => $buttonInfo['title'],
				'reply_markup' => $encodedKeyboard
			]);
		});
	}
	
	
	//发送新消息
	public function sendMessage($param) {
		$chat_id = $param['chat_id'];
		$temp = explode('.', $param['view']);
		$call_param = $param['param'] ?? [];
		$buttonInfo = call_user_func_array([$temp[0], $temp[1]], $call_param);
		
		$keyboard = $buttonInfo['body'];
		$encodedKeyboard = json_encode($keyboard);
		go(function () use ($chat_id, $buttonInfo, $encodedKeyboard) {
			Request::sendMessage([
				'chat_id' => $chat_id,
				'text'    => $buttonInfo['title'],
				'reply_markup' => $encodedKeyboard
			]);
		});
	}
}