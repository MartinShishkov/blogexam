<?php

define("DX_ROOT_DIR", dirname(__FILE__) . '/');
define("DX_ROOT_PATH", basename(dirname(__FILE__)) . '/');
define( 'DX_ROOT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/examblog/' );

$request = $_SERVER["REQUEST_URI"];
$request_home = '/' . DX_ROOT_PATH;

$controller = "home";
$method = "index";
$param = array();

include_once 'config/db.php';
include_once 'lib/database.php';
include_once 'lib/auth.php';
include_once 'controllers/main.php';
include_once 'controllers/home.php';
include_once 'models/main.php';

if(!empty($request)){
    if( strpos($request, $request_home) === 0){
        $request = substr($request, strlen($request_home));

        $components = explode('/', $request, 3);

        if(count($components) > 1){
            list($controller, $method) = $components;

            if(isset($components[2])){
                $param = $components[2];
            }

            include_once 'controllers/' . $controller . '.php';
        }
    }
}

$controller_class = "\Controllers\\" . ucfirst($controller) . "_Controller";

$controller_instance = new $controller_class();

// checks if the specified controller
// supports that method
if(method_exists($controller_instance, $method)){
    call_user_func_array(
        array($controller_instance, $method),
        array($param));
}

$db_object = \Lib\Database::get_instance();

// establishing a connection with the database
$database_connection = $db_object->get_db();


















