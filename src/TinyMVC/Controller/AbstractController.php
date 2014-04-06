<?php
namespace TinyMVC\Controller;

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
    public function __construct(array $parameters) {
        $this->setParameters($parameters);
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
        unset($view);
  
        if (!file_exists($this->getFilePath())) throw new Exception('View Template not found in ' . $this->getFilePath() . '.', 1387808790);

        extract($variables);

        ob_start();
        include $this->getFilePath();
        $content = ob_get_clean();

        ob_start();
        include VIEW_PATH . 'layout.php';
        $layout = ob_get_clean();
        
        return $layout;
    }
    
    
    /**
     * @return string
     */
    private function getFilePath(){
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