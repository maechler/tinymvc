<?php
namespace MyMVC\Globals;

use MyMVC\Controller\AbstractController;
use Exception;
use ReflectionClass;

try {
    define('START_TIME', microtime(true));
    require_once 'sys/globals.php';
    
    $parameters        = $_GET + $_POST;
    
    $controllerName    = isset($parameters['controller']) ? $parameters['controller'] : DEFAULT_CONTROLLER;
    $actionName        = isset($parameters['action']) ? $parameters['action'] : DEFAULT_ACTION;

    $controllerClass   = CONTROLLER_NAMESPACE . $controllerName . 'Controller';
    $actionMethod      = $actionName . 'Action';
    
    $controllerReflection = new ReflectionClass($controllerClass);
    if (!$controllerReflection->isSubclassOf(CONTROLLER_NAMESPACE . 'AbstractController')) throw new Exception($controllerClass . ' is not an AbstractController ', 1387750158);
    if (!$controllerReflection->hasMethod($actionMethod)) throw new Exception('Action ' . $actionMethod . ' not found in Class ' . $controllerClass, 1387750068);
        
    $controller = new $controllerClass($parameters);
    echo $controller->$actionMethod();

} catch(Exception $e) {
    echo 'Oops an Error occured! <br>';
    echo '<strong>' . $e->getMessage() . '</strong> Code: ' . $e->getCode() . '<br>';
}
