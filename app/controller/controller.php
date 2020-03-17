<?php
class Controller {
	public function __construct($param) {
		$this->request = $param['core']['request'];
		$this->response = $param['core']['response'];
		$this->param = $param['param'];
		$this->requestObj = json_decode($param['core']['request']->rawContent());
		
		if (is_null($this->requestObj->callback_query)) {
			$this->chat_id = $this->requestObj->message->chat->id;
			$this->message = $this->requestObj->message->text;
		} else {
			$this->chat_id = $this->requestObj->callback_query->message->chat->id;
			$this->message_id = $this->requestObj->callback_query->message->message_id;
			$this->message = $this->requestObj->callback_query->data;
		}
		
	}
	
	public function echoBack() {
		$this->response->header("Content-Type", "text/html; charset=utf-8");
		$this->response->end("<h1>Hello Phil-Swoole. #" . rand(1000, 9999) . "</h1>" . PHP_EOL);
	}
	
	public function __call($action, $param) {
		$tg = Tg::getInstance();
		call_user_func_array(array($tg, ucfirst($action)), $param);
	}
}