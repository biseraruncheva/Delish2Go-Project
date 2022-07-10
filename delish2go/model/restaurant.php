<?php
class Restoran {
    private $id;
    private $ime;
    private $vreme;
    private $adresa;
    private $slika;
    private $active;

    public function __construct($id, $name,$vreme,$adress, $pic, $act) {
        $this->id = $id;
        $this->ime = $name;
        $this->vreme = $vreme;
        $this->adresa = $adress;
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
    public function getRabotnoVreme() {
        return $this->vreme;
    }

    public function setRabotnoVreme($value) {
        $this->name = $value;
    }

    public function getAdresa() {
        return $this->adresa;
    }

    public function setAdresa($value) {
        $this->adresa = $value;
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