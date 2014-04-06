<?php
namespace MyApp\Controller;

use MyApp\Model\XmlParser;

use TinyMVC\Controller\AbstractController;

class IndexController extends AbstractController {
    
    /**
     * @return void
     */
    public function indexAction() {
        $xmlParser = new XmlParser(XML_PATH . 'tinyPersonData.xml');
        $xmlParser->parseXML();
        
        return $this->render('Index/index', array(
            'xmlData' => $xmlParser->getXMLData(),
            'title' => 'List of some Persons'
        ));
    }
    
    
    
    /**
     * @return void
     */
    public function secondAction() {
        return $this->render('Index/second', array(
            'title' => 'Page 2'
        ));
    }
    
}