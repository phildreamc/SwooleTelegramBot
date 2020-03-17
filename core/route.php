<?php
class ROUTE {
	
	public static function run($core) {
		$url = $core['url'];
		$default = $core['default'];
		
	    $param = array();
	    $urlArr = !empty($url) ? explode("/", rtrim($url, "/")) : [];
	    $controller = array_shift($urlArr);
	    $action = array_shift($urlArr);
	    $param = [
	    	'core' => $core,
	    	'param' => $urlArr
	    ];
	    
	    if (empty($controller)){
	        $controller = $default['controller'];
	        $action = $default['action'];
	    }
	    
	    if (empty($action)){
	        $action = $default['action'];
	    }
	    
	    $controller_name = ucfirst($controller);
	    if (!class_exists($controller_name)) {
	    	call_default($default, $param);
	    	return;
	    }
	    
	    $dispatch = new $controller_name($param);

	    if (method_exists($dispatch, ucfirst($action))){
	    	call_user_func_array(array($dispatch, ucfirst($action)), $param['param']);
	    }else{
	    	//无匹配控制器-方法, 调用默认控制器方法
	    	call_default($default, $param);
	    }
	}
	
	//解析控制器方法
	public static function parseUrl($request) {
		$requestObj = json_decode($request->rawContent());
		$url = isset($requestObj->message) && isset($requestObj->message->text) ? $requestObj->message->text : '';
		$url = isset($requestObj->callback_query) && isset($requestObj->callback_query->data) ? $requestObj->callback_query->data : $url;
		return $url;
	}
}

//调用默认控制器方法
function call_default($default, $param) {
	$controller = $default['controller'];
    $action = $default['action'];
	$controller_name = ucfirst($controller);
	$dispatch = new $controller_name($param);
	call_user_func_array(array($dispatch, ucfirst($action)), $param['param']);
}

function auto_load($classname){
	global $default;
    if (file_exists(ROOT . DS . 'core' . DS . strtolower($classname) . '.class.php')){
        require_once(ROOT . DS . 'core' . DS . strtolower($classname) . '.class.php');
    }else if(file_exists(ROOT . DS . 'app' . DS . 'controller' . DS . strtolower($classname) . '.php')){
        require_once(ROOT . DS . 'app' . DS . 'controller' . DS . strtolower($classname) . '.php');
    }else if(file_exists(ROOT . DS . 'app' . DS . 'model' . DS . strtolower($classname) . '.php')){
        require_once(ROOT . DS . 'app' . DS . 'model' . DS . strtolower($classname) . '.php');
    }else if(file_exists(ROOT . DS . 'app' . DS . 'view' . DS . strtolower($classname) . '.view.php')){
    	require_once(ROOT . DS . 'app' . DS . 'view' . DS . strtolower($classname) . '.view.php');
    }
}

spl_autoload_register('auto_load');