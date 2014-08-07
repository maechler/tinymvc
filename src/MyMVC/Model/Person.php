<?php
namespace MyMVC\Model;

class Person {
    
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $email = '';
    
    /**
     * @var string
     */
    protected $company = '';
    
    /**
     * @var string
     */
    protected $city = '';
    
    /**
     * @var integer
     */
    protected $id = 0;
    
    /**
     * @param string $name
     * @param string $email
     * @param string $company
     * @param string $city
     * @param integer $id
     */
    public function __construct($name, $email, $company, $city, $id) {
        $this->setName($name);
        $this->setEmail($email);
        $this->setCompany($company);
        $this->setCity($city);
        $this->setId($id);
    }
    
    /**
     * @param string $name
     * @return void
     */
    protected function setName($name){
        if ( is_string($name) ) $this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getName(){
        return $this->name;
    }
    
    /**
     * @param string $email
     * @return void
     */
    protected function setEmail($email){
        if ( is_string($email) ) $this->email = $email;
    }
    
    /**
     * @return string
     */
    public function getEmail(){
        return $this->email;
    }
    
    /**
     * @param string $company
     * @return void
     */
    protected function setCompany($company){
        if ( is_string($company) ) $this->company = $company;
    }
    
    /**
     * @return string
     */
    public function getCompany(){
        return $this->company;
    }

    /**
     * @param string $city
     * @return void
     */
    protected function setCity($city){
        if ( is_string($city) ) $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCity(){
        return $this->city;
    }

    /**
     * @param integer $id
     * @return void
     */
    protected function setId($id){
        if ( is_integer($id) ) $this->id = $id;
    }
    
    /**
     * @return integer
     */
    public function getId(){
        return $this->id;
    }
}