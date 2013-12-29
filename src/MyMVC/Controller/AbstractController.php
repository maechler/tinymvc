<?php
namespace MyMVC\Controller;

abstract class AbstractController {
    
    /**
     * @var array
     */
    private $parameters;
    
    
    /**
     * @var string
     */
    private $view;
    
    
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
        
        $this->view = $view;
  
        if (!file_exists($this->getFilePath())) throw new Exception('View Template not found in ' . $this->getFilePath() . '.', 1387808790);

        foreach ($variables as $key => $value) {
            $$key = $value;
        }
        
        unset($key, $value, $view, $variables);
        
        return include $this->getFilePath();
    }
    
    
    /**
     * @return string
     */
    public function getFilePath(){
        return VIEW_PATH . $this->view . '.php';
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