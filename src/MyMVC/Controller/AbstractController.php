<?php
namespace MyMVC\Controller;

use Exception;

abstract class AbstractController {
    
    /**
     * @var array
     */
    private $parameters = array();

    /**
     * @var array
     */
    private $variables = array();
    
    /**
     * @var string
     */
    private $view = '';
    
    /**
     * @param array $parameters
     *
     * @return void
     */
    public function __construct(array $parameters) {
        $this->setParameters($parameters);
    }
    
    /**
     * @param string $view
     * @param array $variables
     *
     * @return void
     */
    protected function render($view, $variables){
        $this->renderTemplate('layout/header', $variables);
        $this->renderTemplate($view, $variables);
        $this->renderTemplate('layout/footer', $variables);
    }

    /**
     * @param string $view
     * @param array $variables
     *
     * @return void
     */
    protected function renderTemplate($view, $variables){
        $this->setView($view);
        $this->setVariables($variables);
        unset($view, $variables);

        if ( !file_exists($this->getFilePath()) ) throw new Exception('View Template not found in ' . $this->getFilePath() . '.', 1387808790);

        extract($this->getVariables());

        include $this->getFilePath();
    }
    
    /**
     * @return string
     */
    public function getFilePath(){
        return VIEW_PATH . $this->getView() . '.phtml';
    }

    /**
     * @param array $parameters
     *
     * @return void
     */
    private function setVariables(array $variables) {
        $this->variables = $variables;
    }

    /**
     * @return array
     */
    private function getVariables() {
        return $this->variables;
    }

    /**
     * @param string $view
     *
     * @return void
     */
    private function setView($view) {
        if ( !is_string($view) ) throw new Exception('View Parameter must be string.', 1387808564);

        $this->view = $view;
    }

    /**
     * @return string
     */
    private function getView() {
        return $this->view;
    }

    /**
     * @param array $parameters
     *
     * @return void
     */
    private function setParameters(array $parameters) {
        $this->parameters = $parameters;
    }
    
    /**
     * @return array
     */
    protected function getParameters() {
        return $this->parameters;
    }
    
}