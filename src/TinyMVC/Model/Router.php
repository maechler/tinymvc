<?php
namespace TinyMVC\Model;

use TinyMVC\Model\Request;

class Router {
    
    /**
     * @var array
     */
    private $routesConfig;
    
    
    
    /**
     * @var Request
     */
    private $request;
    
    
    
    public function __construct(Request $request) {
        $this->request = $request;
        $this->routesConfig = $this->readRoutesConfig();
    }
    
    
    
    /**
     * @return string
     */
    private function readRoutesConfig() {
        $config = Cache::getConfig();
        
        return is_array($config['routes']) ? $config['routes'] : array();
    }
    
    
    
    /**
     * @return string
     */
    public function getController() {
        
    }
    
}