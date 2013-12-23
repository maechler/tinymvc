<?php
namespace MyMVC\Controller;

abstract class AbstractController {
    
    /**
     * @var array
     */
    private $parameters;
    
    
    /**
     * @param array $parameters
     * @return void
     */
    public function __construct($parameters) {
        if (is_array($parameters)) $this->setParameters($parameters);
    }
    
    
    /**
     * @param string $view
     * @param array $variables
     * @return File $file
     */
    protected function render($view, $variables){
        if (!is_string($view)) throw new Exception('View Parameter must be string.', 1387808564);
        if (!is_array($variables)) $variables = array();
        
        $filePath = VIEW_PATH . $view . '.php';
        if (!file_exists($filePath)) throw new Exception('View Template not found in ' . $filePath . '.', 1387808790);

        foreach ($variables as $key => $value) {
            $$key = $value;
        }
        
        return include $filePath;
    }
    
    
    /**
     * @param array $parameters
     * @return void
     */
    private function setParameters(array $parameters) {
        $this->parameters = $parameters;
    }
    
    
    /**
     * @return array
     */
    protected function getParameters() {
        return is_array($this->parameters) ? $this->parameters : array();
    }
    
}