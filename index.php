<?php

define("DX_ROOT_DIR", dirname(__FILE__) . '/');
define("DX_ROOT_PATH", basename(dirname(__FILE__)) . '/');

$request = $_SERVER["REQUEST_URI"];
$request_home = '/' . DX_ROOT_PATH;

$controller = "main";
$method = "index";
$param = array();

include_once 'controllers/main.php';

if(!empty($request)){
    if( strpos($request, $request_home) === 0){
        $request = substr($request, strlen($request_home));

        $components = explode('/', $request, 3);

        var_dump($request);
        var_dump($components);

        if(count($components) > 1){
            list($controller, $method) = $components;

            if(isset($components[2])){
                $param = $components[2];
            }

            include_once 'controllers/' . $controller . '.php';
        }
    }
}

var_dump($controller);
var_dump($method);
var_dump($param);

$controller_class = '\Controllers\\' . ucfirst($controller) . "_Controller";
var_dump($controller_class);

$controller_instance = new $controller_class();

// checks if the specified controller
// supports that method
if(method_exists($controller_instance, $method)){
    call_user_func_array(
        array($controller_instance, $method),
        array($param));
}