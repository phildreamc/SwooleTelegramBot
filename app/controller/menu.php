<?php
class Menu extends Controller {
	public function first($param) {
		echo 'first' . PHP_EOL;
		$this->show($param);
	}
	
	public function second($param) {
		echo 'second' . PHP_EOL;
		$this->show($param);
	}
	
	public function third($param) {
		echo 'third' . PHP_EOL;
		$this->show($param);
	}
	
	public function fourth($param) {
		echo 'fourth' . PHP_EOL;
		$this->show($param);
	}
	
	public function fifth($param) {
		echo 'fifth' . PHP_EOL;
		$this->show($param);
	}
	
	public function sixth($param) {
		echo 'sixth' . PHP_EOL;
		$this->show($param);
	}
	
	public function show($test = null) {
		$param = [
			'message_id' => $this->message_id,
			'chat_id' => $this->chat_id,
			'view' => 'message.home',
			'param' => [
				$test,
			],
		];
		$this->editMessageText($param);

		$this->echoBack();
	}
}