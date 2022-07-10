<?php
require('../../model/constants.php');
require('../../model/cart_db.php');
require('../../model/cart.php');
require('../../model/product_db.php');
require('../../model/product.php');
require('../../model/restoran_db.php');
require('../../model/restaurant.php');
require('../../model/korisnik.php');
require('../../model/korisnik_db.php');


$kosnicki = KoshnichkaDB::getKoshnichki();
    $proizvodi = ProductDB::getProducts();
    $restorani = RestoranDB::getRestaurants();
    if(isset($_SESSION['korisnik']))
    {
        $ime=$_SESSION['korisnik'];
        $korisnik=KorisnikDB::getKorisnik($ime,'');
    }
include('view/naracki.php');
?>