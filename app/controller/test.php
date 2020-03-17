<?php
class Test extends Controller {
	public function index ($str = null) {
		echo 'called test-index:' . $str . PHP_EOL;
		$this->echoBack();
	}
}