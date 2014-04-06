<?php
namespace TinyMVC\Model;

use TinyMVC\Model\Request;
use TinyMVC\Model\Router;

class App {
    
    /**
     * @var integer
     */
    private $appStartTime;
    
    
    
    /**
     * @var Request
     */
    private $request;
    
    
    
    /**
     * @var Router
     */
    private $router;

    
    
    public function __construct() {
        $this->appStartTime = microtime(true);
        $this->initPHPSettings();
        $this->initAutoloading();
        $this->initRequest();
        $this->initRouter();
    }
    
    
    
    /**
     * @return void
     */
    public function run() {
        
    }
    
    
    
    /**
     * @return void
     */
    private function initPHPSettings() {
        ini_set("display_errors", 1);
        ini_set("log_errors", 1);
        error_reporting(E_ALL);
        ini_set("error_log", "log/php_errors.log");
    }
    
    
    
    /**
     * @return void
     */
    private function initAutoLoading() {
        set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
        spl_autoload_extensions(".php");
        spl_autoload_register();
    }
    
    
    
    /**
     * @return void
     */
    private function initRequest() {
        $this->request = new Request();
    }
    
    
    
    /**
     * @return void
     */
    private function initRouter() {
        $this->router = new Router($this->request);
    }
    
   
    
    /**
     * @return integer
     */
    public function getExecutionTime() {
        return microtime(true) - $this->appStartTime;
    }
    
   
    
    /**
     * @return string
     */
    public static function getCacheDir() {
        return APPLICATION_ROOT . '/cache/';
    }
    
   
    
    /**
     * @return string
     */
    public static function getSrcDir() {
        return APPLICATION_ROOT . '/src/';
    }

}