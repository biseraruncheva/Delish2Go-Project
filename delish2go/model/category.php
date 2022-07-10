<?php
class Category {
    private $ID;
    private $ime;
    private $slika;
    private $active;


    public function __construct($id, $name, $pic, $act) {
        $this->id = $id;
        $this->ime = $name;
        $this->slika = $pic;
        $this->active = $act;
       
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
        $this->name = $value;
    }
 
  
    public function getSlika() {
        return $this->slika;
    }

    public function setSlika($value) {
        $this->slika = $value;
    }
    public function getActive() {
        return $this->active;
    }

    public function setActive($value) {
        $this->adresa = $value;
    }


}
?>