<?php
namespace TinyMVC\Model;

class Request {
    
    /**
     * @var array
     */
    private $GET;
    
    
    
    /**
     * @var array
     */
    private $POST;
    
    
    
    /**
     * @var array
     */
    private $SERVER;
    
    
    
    /**
     * @var array
     */
    private $parameters;
    
    
    
    public function __construct() {
        $this->GET       = $_GET;
        $this->POST      = $_POST;
        $this->SERVER    = $_SERVER;
        $this->parameters = $this->GET + $this->POST;
    }

}