<?php
namespace TinyMVC\Controller;

use TinyMVC\Controller\AbstractController;

class ErrorController extends AbstractController {
    
    
    /**
     * @return void
     */
    public function pageNotFoundAction() {
        return $this->render('Error/pageNotFound', array(
            'title' => '404 - Sry Page not found'
        ));
    }
    
}