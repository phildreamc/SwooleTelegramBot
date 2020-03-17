<?php
//数据库配置
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '52c1d19451c60ca2');
define('DB_NAME', 'phil');

//telegram配置
define('BOT_API_KEY', '1123523945:AAGtPOSx1S8EcbKH_TtFQPXc_cDYLMBgZfc');
define('BOT_USERNAME', 'PhilInfoBot');

/*
define('DIR_TPL', ROOT . DS . 'app' . DS . 'view' . DS . 'template_dir' . DS . 'default' . DS);
define('DIR_CPL', ROOT . DS . 'app' . DS . 'view' . DS . 'compile_dir' . DS);
define('DIR_CFG', ROOT . DS . 'app' . DS . 'view' . DS . 'config_dir' . DS);
define('DIR_CAC', ROOT . DS . 'app' . DS . 'view' . DS . 'cache_dir' . DS);
*/

//默认控制器和方法
/*
$default = [];
$default['controller'] = 'index';
$default['action'] = 'defaultAction';
*/

/*
define('WEBSITE', 'http://philswoole.com');
define('WEBIMG', WEBSITE . dirname(dirname($_SERVER['PHP_SELF'])) . '/img/');
*/

class Config {
	public static function get($id) {
		$default = [];
		$default['controller'] = 'index';
		$default['action'] = 'defaultAction';
		return $default;
	}
}