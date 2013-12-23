<?php
namespace MyMVC\Model;

class Person {
    
    protected $name;
    protected $email;
    protected $company;
    protected $city;
    protected $id;
    
    
    public function __construct($name, $email, $company, $city, $id) {
        $this->setName($name);
        $this->setEmail($email);
        $this->setCompany($company);
        $this->setCity($city);
        $this->setId($id);
    }
    
    
    protected function setName($name){
        $this->name = is_string($name) ? $name : '';
    }
    
    
    public function getName(){
        return is_string($this->name) ? $this->name : '';
    }
    
    
    protected function setEmail($email){
        $this->email = is_string($email) ? $email : '';
    }
    
    
    public function getEmail(){
        return is_string($this->email) ? $this->email : '';
    }
    
    
    protected function setCompany($company){
        $this->company = is_string($company) ? $company : '';
    }
    
    
    public function getCompany(){
        return is_string($this->company) ? $this->company : '';
    }
    
    
    protected function setCity($city){
        $this->city = is_string($city) ? $city : '';
    }
    
    
    public function getCity(){
        return is_string($this->city) ? $this->city : '';
    }
    
    
    protected function setId($id){
        $this->id = is_integer($id) ? $id : 0;
    }
    
    
    public function getId(){
        return is_int($this->id) ? $this->id : 0;
    }
}