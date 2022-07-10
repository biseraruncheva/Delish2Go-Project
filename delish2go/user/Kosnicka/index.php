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


$kosnicka_id = filter_input(INPUT_GET, 'id', 
FILTER_VALIDATE_INT);
$korisnik_id = filter_input(INPUT_GET, 'id', 
FILTER_VALIDATE_INT);
$action = filter_input(INPUT_GET, 'action');


if($kosnicka_id != NULL && $action == 'delete'){

    $check=KoshnichkaDB::deleteKoshnichka($kosnicka_id);
    if($check == true) {
        $_SESSION['delete'] = "<div class='success'>Производот од кошничката е избришан.</div>";
        header('location:'.MAINURL.'user/Kosnicka');
    } else {
        $_SESSION['delete'] = "<div success='error'>Производот од кошничката не е избришан успешно.</div>";
        header('location:'.MAINURL.'user/Kosnicka');
    }
}
else if($action == 'naracka'){
    $check=KoshnichkaDB::naracaj($korisnik_id);
    if($check == true){
        $_SESSION['naracano'] = "<div class='success'>Нарачката е успешна.</div>";

        header("location:".MAINURL."user/Kosnicka/uspesnaNaracka.php?KorisnikID=$korisnik_id");
    }
    else {
        $_SESSION['naracano'] = "<div class='error'>Нарачката не е успешна.</div>";

        header('location:'.MAINURL.'user/Kosnicka');
    }
}
else if($action == 'deleteAll'){
    $check=KoshnichkaDB::deleteKoshnichki($korisnik_id);
    if($check == true){
        $_SESSION['delete2'] = "<div class='success'>Сите производи се избришани.</div>";

        header('location:'.MAINURL.'user/Kosnicka');
    }
    else {
        $_SESSION['delete2'] = "<div success='error'>Не се избришани производите.</div>";

        header('location:'.MAINURL.'user/Kosnicka');
    }
}
else{
    $kosnicki = KoshnichkaDB::getKoshnichki();
    $proizvodi = ProductDB::getProducts();
    $restorani = RestoranDB::getRestaurants();
    if(isset($_SESSION['korisnik']))
    {
        $ime=$_SESSION['korisnik'];
        $korisnik=KorisnikDB::getKorisnik($ime,'');
    }

    include('view/kosnicka.php');
}

?>