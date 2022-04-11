<?php
class Patients{
    protected string $_lastname;
    protected string $_firstname;
    protected string $_birthDate;
    protected string $_phone;
    protected string $_mail;

    public function __construct($lastname,$firstname,$birthDate,$phone,$mail){
    $this-> setLastname($lastname);
    $this-> setFirstname($firstname);
    $this-> setBirthDate($birthDate);
    $this-> setPhone($phone);
    $this-> setMail($mail);
    }

    //GETTER 
    public function getLastname():string {
        return $this->_lastname;
    }
    public function getFirstname():string{
        return $this->_firstname;
    }
    public function getBirthDate():string{
        return $this->_birthDate;
    }
    public function getPhone():string{
        return $this->_phone;
    }
    public function getMail():string {
        return $this->_mail;
    }


    //SETTER 
    public function setLastname():string {
        return $this->_lastname;
    }
    public function setFirstname():string{
        return $this->_firstname;
    }
    public function setBirthDate():string{
        return $this->_birthDate;
    }
    public function setPhone():string{
        return $this->_phone;
    }
    public function setMail():string {
        return $this->_mail;
    }
//$this= classe ds laquelle tu es.... dans la classe en cours
}



