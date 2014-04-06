<?php
namespace TinyMVC\Model;

class Person {
    
    /**
     * @var string
     */
    protected $name;
    
    
    /**
     * @var string
     */
    protected $email;
    
    
    /**
     * @var string
     */
    protected $company;
    
    
    /**
     * @var string
     */
    protected $city;
    
    
    /**
     * @var integer
     */
    protected $id;
    
    
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
        $this->name = is_string($name) ? $name : '';
    }
    
    
    /**
     * @return string
     */
    public function getName(){
        return is_string($this->name) ? $this->name : '';
    }
    
    
    /**
     * @param string $email
     * @return void
     */
    protected function setEmail($email){
        $this->email = is_string($email) ? $email : '';
    }
    
    
    /**
     * @return string
     */
    public function getEmail(){
        return is_string($this->email) ? $this->email : '';
    }
    
    
    /**
     * @param string $company
     * @return void
     */
    protected function setCompany($company){
        $this->company = is_string($company) ? $company : '';
    }
    
    
    /**
     * @return string
     */
    public function getCompany(){
        return is_string($this->company) ? $this->company : '';
    }
    
    
    /**
     * @param string $city
     * @return void
     */
    protected function setCity($city){
        $this->city = is_string($city) ? $city : '';
    }
    
    
    /**
     * @return string
     */
    public function getCity(){
        return is_string($this->city) ? $this->city : '';
    }
    
    
    /**
     * @param integer $id
     * @return void
     */
    protected function setId($id){
        $this->id = is_integer($id) ? $id : 0;
    }
    
    
    /**
     * @return integer
     */
    public function getId(){
        return is_int($this->id) ? $this->id : 0;
    }
}