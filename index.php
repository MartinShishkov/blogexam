<?php

define("DX_ROOT_DIR", dirname(__FILE__) . '/');
define("DX_ROOT_PATH", basename(dirname(__FILE__)) . '/');

$request = $_SERVER["REQUEST_URI"];
$request_home = '/' . DX_ROOT_PATH;

$controller = "main";
$method = "index";
$param = array();

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
        }
    }
}

var_dump($controller);
var_dump($method);
var_dump($param);