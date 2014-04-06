<?php
namespace TinyMVC\Model;

use SimpleXMLElement;
use MyMVC\Model;

class XmlParser {

    /**
     * @var SimpleXMLElement
     */
    protected $simpleXMLElement;


    /**
     * @var Array
     */
    protected $xmlData = array();


    /**
     * @var String $xmlURL
     */
    public function __construct($xmlURL) {
        $this->simpleXMLElement = new SimpleXMLElement($xmlURL, NULL, TRUE);
    }


    /**
     * @return void
     */
    public function parseXML() {
        $counter = 0;
        foreach ($this->simpleXMLElement->record as $record) {
            $this->xmlData[] = new Person((String) $record->name, (String) $record->email, (String) $record->company, (String) $record->city, $counter++);
        }
    }


    /**
     * @return array
     */
    public function getXMLData() {
        return is_array($this->xmlData) ? $this->xmlData : array();
    }

}