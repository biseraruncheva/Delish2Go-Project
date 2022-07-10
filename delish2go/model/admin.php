<?php
class Admin {
    private $id;
    private $ime;
    private $prezime;
    private $ki; //korisnickoime
    private $pw; //password


    public function __construct($id, $name, $lastname, $ki, $pw) {
        $this->id = $id;
        $this->ime = $name;
        $this->prezime = $lastname;
        $this->ki = $ki;
        $this->pw = $pw;
       
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getIme() {
        return $this->ime;
    }

    public function setIme($value) {
        $this->ime = $value;
    }
 
  
    public function getPrezime() {
        return $this->prezime;
    }

    public function setPrezime($value) {
        $this->prezime = $value;
    }
    public function getKorisnichkoIme() {
        return $this->ki;
    }

    public function setKorisnichkoIme($value) {
        $this->ki = $value;
    }

    public function getPassword() {
        return $this->pw;
    }

    public function setPassword($value) {
        $this->pw = $value;
    }



}
?>