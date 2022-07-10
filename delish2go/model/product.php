<?php
class Product {
    private $ID;
    private $ime;
    private $cena;
    private $featured;
    private $slika;
    private $active;
    private $kID; // KategorijaID
    private $rID; // RestoranID

    public function __construct($id, $name, $cena, $pic, $act, $feat, $kID, $rID) {
        $this->id = $id;
        $this->ime = $name;
        $this->cena = $cena;
        $this->featured = $feat;
        $this->slika = $pic;
        $this->active = $act;
        $this->kID = $kID;
        $this->rID = $rID;

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
    public function getCena() {
        return $this->cena;
    }

    public function setCena($value) {
        $this->cena = $value;
    }

    public function getFeatured() {
        return $this->featured;
    }

    public function setFeatured($value) {
        $this->featured= $value;
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

    public function getKategorijaID() {
        return $this->kID;
    }

    public function setKategorijaID($value) {
        $this->kID = $value;
    }

    public function getRestoranID() {
        return $this->rID;
    }

    public function setRestoranID($value) {
        $this->rID = $value;
    }


}
?>