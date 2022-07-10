<?php
require('../model/constants.php');
require('../model/category_db.php');
require('../model/category.php');
require('../model/product.php');
require('../model/product_db.php');
require('../model/restaurant.php');
require('../model/restoran_db.php');
require('../model/admin_db.php');
require('../model/admin.php');


include('partials/login-check.php');



$kategorii=CategoryDB::getCategories();
$proizvodi=ProductDB::getProducts();
$restorani=RestoranDB::getRestaurants();
$administratori=AdminDB::getAdmins();


include('view_pocetna_admin.php');
 
    
 
?>