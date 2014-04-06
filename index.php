<?php
namespace TinyMVC;

use TinyMVC\Model\App;
use TinyMVC\Model\Logger;
use TinyMVC\Controller\ErrorController;
use Exception;

try {
    require_once 'conf/globals.php';

    $app = new App();
    $app->run();
/*
    $uriParts          = explode('/', $_SERVER['REQUEST_URI']);
    
    $controllerName    = !empty($uriParts[1]) ? $uriParts[1] : DEFAULT_CONTROLLER;
    $actionName        = !empty($uriParts[2]) ? $uriParts[2] : DEFAULT_ACTION;

    $controllerClass   = CONTROLLER_NAMESPACE . $controllerName . 'Controller';
    $actionMethod      = $actionName . 'Action';
    
    $controllerReflection = new ReflectionClass($controllerClass);
    if (!$controllerReflection->isSubclassOf(CONTROLLER_NAMESPACE . 'AbstractController')) throw new Exception($controllerClass . ' is not an AbstractController ', 1387750158);
    if (!$controllerReflection->hasMethod($actionMethod)) throw new Exception('Action ' . $actionMethod . ' not found in Class ' . $controllerClass, 1387750068);
        
    $controller = new $controllerClass($parameters);
    echo $controller->$actionMethod();
*/
    throw new Exception("hi");
} catch(Exception $e) {
    try {
        Logger::logException(Logger::UNCAUGHT_EXCEPTION, $e);
        $controller = new ErrorController(array());
        
        echo $controller->pageNotFoundAction();
        
    } catch (Exception $e) {
        Logger::logException(Logger::FATAL_EXCEPTION, $e);
        
        echo 'Oops, an unexpected Error occured! <br>' .
             'Please try again later.';
    }
}
