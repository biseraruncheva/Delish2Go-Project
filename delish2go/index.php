<?php
require_once('model/constants.php');
require_once('model/restoran_db.php');
require_once('model/product.php');
require_once('model/product_db.php');


$proizvodi=ProductDB::getTop3MostSoldProducts();

// Display pocetna
include('pocetna.php');



?>