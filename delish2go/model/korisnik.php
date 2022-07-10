<?php
class Korisnik {
    private $KorisnikID;
    private $Adresa;
    private $Ime;
    private $Prezime;
    private $Email;
    private $Password;
    private $Telefon;
    private $kosnickaID;

    public function __construct($korID, $adr, $im, $prez, $em, $pass, $tel, $kosID) {
        $this->KorisnikID = $korID;
        $this->Adresa = $adr;
        $this->Ime = $im;
        $this->Prezime = $prez;
        $this->Email = $em;
        $this->Password = $pass;
        $this->Telefon = $tel;
        $this->kosnickaID = $kosID;
    }
    public function getKorisnikID() {
        return $this->KorisnikID;
    }
    public function getAdresa() {
        return $this->Adresa;
    }
    public function getIme() {
        return $this->Ime;
    }
    public function getPrezime() {
        return $this->Prezime;
    }
    public function getEmail() {
        return $this->Email;
    }
    public function getPassword() {
        return $this->Password;
    }
    public function getTelefon() {
        return $this->Telefon;
    }
    public function getKosnickaID() {
        return $this->kosnickaID;
    }
    


}
?>