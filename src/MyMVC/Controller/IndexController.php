<?php
namespace MyMVC\Controller;

use MyMVC\Model\XmlParser;

use MyMVC\Controller\AbstractController;
use MyMVC\Model;

class IndexController extends AbstractController {
    
    /**
     * @return void
     */
    public function indexAction() {
        $xmlParser = new XmlParser(XML_PATH . 'tinyPersonData.xml');
        $xmlParser->parseXML();
        
        return $this->render('index', array(
            'xmlData' => $xmlParser->getXMLData(),
            'title' => 'List of some Persons'
        ));
    }

}