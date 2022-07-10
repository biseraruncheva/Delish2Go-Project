<?php
require('../model/constants.php');
require('../model/category_db.php');
require('../model/category.php');
require('../model/product.php');
require('../model/product_db.php');
require('../model/korisnik.php');
require('../model/korisnik_db.php');
require('../model/cart.php');
require('../model/cart_db.php');



$category_id = filter_input(INPUT_GET, 'categoryID', 
FILTER_VALIDATE_INT);
$korisnik_id = filter_input(INPUT_GET, 'id');
$action = filter_input(INPUT_GET, 'action');
$proizvod_id = filter_input(INPUT_GET, 'pid');
$cid = filter_input(INPUT_GET, 'cid'); //ushte edno za categoryID

if ($category_id != NULL && $category_id != FALSE) {

   if(isset($_SESSION['korisnik']))
    {
        $ime=$_SESSION['korisnik'];
        $korisnik=KorisnikDB::getKorisnik($ime,'');
    }

    $proizvodi = ProductDB::getProductsbyCategory($category_id);
    $kategorija = CategoryDB::getCategory($category_id);

    include('view/meni-hrana.php');
}
else if($korisnik_id !=NULL && $action != NULL && $proizvod_id!=NULL)
{
    $koshnicka = New Koshnichka ('',$korisnik_id, $proizvod_id,"не");
    $check=KoshnichkaDB::addKoshnichka($koshnicka);
    if($check==true)
    {
        $_SESSION['added-to-cart'] = "<div class='success'>Производот е додаден во кошничка.</div>";
        header('location:'.MAINURL.'Menu?categoryID='.$cid);

    } 
    else
    {
        $_SESSION['added-to-cart'] = "<div class='error'>Производот не е додаден успешно.</div>";
        header('location:'.MAINURL.'Menu?categoryID='.$cid);

    }
   

}
else
{

    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_categories';
    }


if ($action == 'list_categories') {
   
    $kategorii = CategoryDB::getCategories();


    // Display categories
    include('view/meni.php');
  }

}

    
    
 
?>