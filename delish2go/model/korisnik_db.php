<?php
class KorisnikDB{
    public static function getKorisnici()
    {
        global $conn;
        
        $query="SELECT * FROM  `korisnik`
                ORDER BY KorisnikID";
       
        $result=mysqli_query($conn,$query);

        $korisnici = array();
      
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
        while($row = mysqli_fetch_assoc($result)) {
        $korisnik = new Korisnik($row['KorisnikID'],
                           $row['Adresa'],
                           $row['Ime'],
                           $row['Prezime'],
                           $row['Email'],
                           $row['Password'],
                           $row['Telefon'],
                           $row['kosnickaID']);
        $korisnici[]=$korisnik;
       }
       return $korisnici;

        }
        else
        {
            $korisnici="";
            return $korisnici;
        }
       
        
    }
    public static function getKorisnikbyID($korisnik_id)
    {
      global $conn;
    
    $query = "SELECT * FROM `korisnik`
              WHERE KorisnikID = '$korisnik_id'";    

    $result=mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count > 0)
    {
    $row = $result->fetch_assoc();
    $korisnik = new Korisnik($row['KorisnikID'],
                             $row['Adresa'],
                            $row['Ime'],
                            $row['Prezime'],
                            $row['Email'],
                            $row['Password'],
                            $row['Telefon'],
                            $row['kosnickaID']);
    return $korisnik;
    }else
    {
        $korisnik="";
        return $korisnik;
    }
    }
    public static function getKorisnik($em, $pw)
    {
      global $conn;
       $pass=md5($pw); //shifrirano
       if($pw!='')
       {
       $query = "SELECT * FROM `korisnik`
              WHERE Email='$em' AND `password`='$pass'";  
       }
       else
       { 
        $query = "SELECT * FROM `korisnik`
        WHERE Email='$em'";

       }  

    $result=mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count > 0)
    {
    $row = $result->fetch_assoc();
    $korisnik = new Korisnik($row['KorisnikID'],
                            $row['Adresa'],
                            $row['Ime'],
                            $row['Prezime'],
                            $row['Email'],
                            $row['Password'],
                            $row['Telefon'],
                            $row['kosnickaID']);
    return $korisnik;
    }else
    {
        $korisnik="";
        return $korisnik;
    }

    }
    public static function addKorisnik($korisnik) {
        global $conn;
    
        $korisnik_id = $korisnik->getKorisnikID();
        $adresa=$korisnik->getAdresa();
        $ime = $korisnik->getIme();
        $prezime = $korisnik->getPrezime();
        $em = $korisnik->getEmail();
        $pw = md5($korisnik->getPassword());
        $telefon=$korisnik->getTelefon();
        $kosnickaID=$korisnik->getKosnickaID();        

        $query = "INSERT INTO `korisnik` SET
            KorisnikID = '$korisnik_id', Adresa='$adresa', Ime='$ime', Prezime='$prezime', Email='$em', `Password`='$pw', Telefon='$telefon',kosnickaID='$kosnickaID'"; 

        $result = mysqli_query($conn, $query);

        if($result==true)
        {
            return true;

        }
        else
        {
           return false;
        }
       
    }
}
?>