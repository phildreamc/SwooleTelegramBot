<?php
class Index extends Controller {
	public function defaultAction($info = null) {
		echo 'default';

		$param = [
			'chat_id' => $this->chat_id,
			'view' => 'message.home'
		];
		$this->sendMessage($param);
		
		$this->echoBack();
	}
}


