<?php
class Message {
	public static function home($test = null) {
		//echo 'test: ' . $test . PHP_EOL;
		$text = [
			'title' => '首页: ' . strval($test),
			'body' => [
			    'inline_keyboard' => [
			    	[
						['text' => '第一个按钮', 'callback_data' => Url::get('menu', 'first', '1-1')],
						['text' => '第二个按钮', 'callback_data' => Url::get('menu', 'second', '1-2')],
						['text' => '第三个按钮', 'callback_data' => Url::get('menu', 'third', '1-3')]
					],
					[
						['text' => '第二排一个', 'callback_data' => Url::get('menu', 'fourth', '2-1')],
						['text' => '第二排二个', 'callback_data' => Url::get('menu', 'fifth', '2-2')],
						['text' => '第二排三个', 'callback_data' => Url::get('menu', 'sixth', '2-3')]
					],
			    ],
			],
		];
		return $text;
	}
	
	public static function hello() {
		$text = [
			'title' => 'This Bot is Powered By @phildreamc',
			'body' => [
				
			],
		];
		return $text;
	}
}