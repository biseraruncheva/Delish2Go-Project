<?php

require('../../model/constants.php');
require('../../model/category_db.php');
require('../../model/category.php');
require('../../model/product.php');
require('../../model/product_db.php');
require('../../model/korisnik.php');
require('../../model/korisnik_db.php');
require('../../util/secure_connection.php');

include('najava.php');




if(isset($_POST['submit'])) {
    $korisnickoIme = $_POST['korisnickoIme'];
    $password = $_POST['password'];


    $korisnik=KorisnikDB::getKorisnik($korisnickoIme,$password);


    if($korisnik!="") {
        $_SESSION['login'] = "<div class='success'>Успешно се најавивте.</div>";
        $_SESSION['korisnik'] = $korisnickoIme; //To check whether the user is logged in or not and logout will unset it

        header('location:'.MAINURL);
    } else {
        $_SESSION['login'] = "<div class='error text-center'>Погрешно Корисничко Име или Лозинка.</div>";
        header('location:'.MAINURL.'user/Login');
    }

    if(isset($_POST['remember_me'])) {
        $user=['email' => $korisnickoIme, 'pass' => $password];

        $user=serialize($user);

        setcookie('user', $user, time() + (86400 * 30));
    }
}

 
?>