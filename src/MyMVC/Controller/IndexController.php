<?php
namespace MyMVC\Controller;

use MyMVC\Model\XmlParser;

class IndexController extends AbstractController {
    
    /**
     * @return void
     */
    public function indexAction() {
        $xmlParser = new XmlParser(XML_PATH . 'tinyPersonData.xml');
        $xmlParser->parseXML();
        
        $this->render('pages/index', array(
            'xmlData' => $xmlParser->getXMLData(),
            'title' => 'List of some Persons'
        ));
    }

}