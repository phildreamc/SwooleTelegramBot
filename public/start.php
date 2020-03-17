<?php
$http = new Swoole\Http\Server("0.0.0.0", 9501);

$http->on('WorkerStart', function ($server, $worker_id) {
	require_once(__DIR__ . '/set.php');
	
	try {
		$telegram = new Longman\TelegramBot\Telegram(BOT_API_KEY, BOT_USERNAME);
		//$temp = $telegram->handle();
		//var_dump($param);
	} catch (Longman\TelegramBot\Exception\TelegramException $e) {
		echo $e->getMessage();
		//$response->end("<h1>Hello TG-BOT. #" . rand(1000, 9999) . "</h1>");
	}
	
	//启动定时轮询检测
	/*
	if ($worker_id == 0) {
		Swoole\Timer::tick(600000, function () {
			PhilCommon::run();
		});
	}
	*/
});

$http->on('request', function ($request, $response) {
	$url = ROUTE::parseUrl($request);
	$default = Config::get('default');
	//URL, 默认控制器方法, RQUEST, RESPONSE
	$core =  [
		'url' => $url,
		'default' => $default,
		'request' => $request,
		'response' => $response
	];

	ROUTE::run($core);
	
	/*
	$param = json_decode($request->rawContent());
	$response->header("Content-Type", "text/html; charset=utf-8");
	$response->end("<h1>Hello TG-BOT. #" . rand(1000, 9999) . "</h1>");
	*/
});

$http->start();