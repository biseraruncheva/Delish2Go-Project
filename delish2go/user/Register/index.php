<?php
require('../../model/constants.php');
require('../../model/category_db.php');
require('../../model/category.php');
require('../../model/product.php');
require('../../model/product_db.php');
require('../../model/korisnik.php');
require('../../model/korisnik_db.php');

$action = filter_input(INPUT_GET, 'result');


if($action != "reload")
{
    include('view/registracija.php');

if(isset($_POST['submit'])) 
{
        $ime=$_POST['ime'];
        $prezime=$_POST['prezime'];
        $adresa=$_POST['adresa'];
        $telefon=$_POST['telefon'];
        $email=$_POST['email'];
        $lozinka=$_POST['lozinka'];

        $korisnik=new Korisnik('',$adresa,$ime,$prezime,$email,$lozinka,$telefon,"5");
        $res=KorisnikDB::addKorisnik($korisnik);
        if($res == TRUE) 
        {
            $_SESSION['succesful'] = "<div class='success'>Корисникот е додаден.</div>";
            header("location:".MAINURL."user/Register/uspesnaRegistracija.php?Ime=$ime&Prezime=$prezime&Email=$email");
        } 
        else 
        {
            $_SESSION['successful'] = "<div class='error'>Корисникот не е успешно додаден.</div>";
            header('location:'.MAINURL.'user/Register?result=reload');
        }

    }
}

else

{
    include('view/registracija.php');
} 




?>
