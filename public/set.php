<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once(ROOT . DS . 'core' . DS . 'bootstrap.php');

//加载默认控制器
require_once(ROOT . DS . 'app' . DS . 'controller' . DS . (Config::get('default'))['controller'] . '.php');