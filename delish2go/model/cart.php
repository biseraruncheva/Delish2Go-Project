<?php
class Koshnichka {
    private $ID;
    private $kID; //korisnikID
    private $pID; //proizvodID
    private $isporacano;


    public function __construct($id, $kid, $pid, $isp) {
        $this->ID = $id;
        $this->kID = $kid;
        $this->pID = $pid;
        $this->isporacano=$isp;
       
    }

    public function getID() {
        return $this->ID;
    }

    public function setID($value) {
        $this->ID = $value;
    }

    public function getKorisnikID() {
        return $this->kID;
    }

    public function setKorisnikID($value) {
        $this->kID = $value;
    }
 
  
    public function getProizvodID() {
        return $this->pID;
    }

    public function setProizvodID($value) {
        $this->pID = $value;
    }
    public function getIsporacano() {
        return $this->isporacano;
    }

    public function setIsporacano($value) {
        $this->isporacano = $value;
    }
    


}
?>