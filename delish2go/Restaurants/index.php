<?php
require('../model/constants.php');
require('../model/restoran_db.php');
require('../model/restaurant.php');
require('../model/product.php');
require('../model/product_db.php');
require('../model/cart.php');
require('../model/cart_db.php');
require('../model/korisnik.php');
require('../model/korisnik_db.php');


$restoran_id = filter_input(INPUT_GET, 'restoranID', 
FILTER_VALIDATE_INT);
$korisnik_id = filter_input(INPUT_GET, 'id');
$action = filter_input(INPUT_GET, 'action');
$proizvod_id = filter_input(INPUT_GET, 'pid');
$rid = filter_input(INPUT_GET, 'rid'); //ushte edno za restoranID
if ($restoran_id != NULL && $restoran_id != FALSE) {

    if(isset($_SESSION['korisnik']))
    {
        $ime=$_SESSION['korisnik'];
        $korisnik=KorisnikDB::getKorisnik($ime,'');
    }

    $proizvodi = ProductDB::getProductsbyRestaurant($restoran_id);
    $restoran = RestoranDB::getRestaurant($restoran_id);

    include('view/meni-restorani.php');
}
else if($korisnik_id !=NULL && $action != NULL && $proizvod_id!=NULL)
{
    $koshnicka = New Koshnichka ('',$korisnik_id, $proizvod_id,"не");
    $check=KoshnichkaDB::addKoshnichka($koshnicka);
    if($check==true)
    {
        $_SESSION['added-to-cart'] = "<div class='success'>Производот е додаден во кошничка.</div>";
        
        header('location:'.MAINURL.'Restaurants?restoranID='.$rid);

    } 
    else
    {
        $_SESSION['added-to-cart'] = "<div class='error'>Производот не е додаден успешно.</div>";
        header('location:'.MAINURL.'Restaurants?restoranID='.$rid);

    }
   

}
else
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_restaurants';
    }



if ($action == 'list_restaurants') {
   
    $restorani = RestoranDB::getRestaurants();


    // Display resturants
    include('view/restorani.php');
  }

}

    
    
 
?>