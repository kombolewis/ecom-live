<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__file__));

use Core\{Session,Cookie,Router};
use App\Models\Users;


//load configuration and helper files

require_once(ROOT . DS . 'config' . DS . 'config.php');


//Autoload classes 
function autoload($className) {
  $classAry = explode('\\', $className);
  $class = array_pop($classAry);
  $subPath = strtolower(implode(DS,$classAry));
  $path = ROOT . DS . $subPath . DS . $class . '.php';
  if(file_exists($path)) {
    require_once($path);
  }
}




spl_autoload_register('autoload');
session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : [];
if(!Session::exists(CURRENT_USER_SESSION_NAME) && Cookie::exists(REMEMBER_ME_COOKIE_NAME)) {
  Users::loginUserFromCookie();
}

//router
Router::route($url);
