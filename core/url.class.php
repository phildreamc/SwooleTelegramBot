<?php
class Url {
	public static function get($controller, $action, $param = null) {
		$url = $controller . '/' . $action;
		if (!empty($param)) {
			$url .= '/' . $param;
		}
		return $url;
	}
}