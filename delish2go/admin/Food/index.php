<?php
ob_start();
require('../../model/constants.php');
require('../../model/product.php');
require('../../model/product_db.php');
require('../../model/category.php');
require('../../model/category_db.php');
require('../../model/restaurant.php');
require('../../model/restoran_db.php');


include('../partials/login-check.php');

$proizvod_id = filter_input(INPUT_GET, 'id', 
FILTER_VALIDATE_INT);
$action = filter_input(INPUT_GET, 'action');
$slika = filter_input(INPUT_GET, 'slika');


 if($proizvod_id != NULL && $action == 'delete')
 {

        if($slika != "") 
        {
            $path = "../../images/food/".$slika;
            $remove = unlink($path);
            if($remove == false) {
                $_SESSION['upload'] = "<div class='error'>Сликата не е успешно избришана.</div>"; 
                header('location:'.MAINURL.'admin/Food');
                die();
            }
        }


    $check=ProductDB::deleteProduct($proizvod_id);

    if($check == true) {
        //Food Deleted
        //Create Session Variable to Display Message 
        $_SESSION['delete'] = "<div class='success'>Производот е избришан.</div>";
        //Redirect to Manage Food
        header('location:'.MAINURL.'admin/Food');
    } else {
        //Failed to Delete Food
        $_SESSION['delete'] = "<div success='error'>Производот не е избришан успешно.</div>";
        header('location:'.MAINURL.'admin/Food');
    }
         
 }
 else if($action == 'add')
 {

    $kategorii=CategoryDB::getCategories();
    $restorani=RestoranDB::getRestaurants();

    include('view-add-food.php');

    if(isset($_POST['submit'])) {
        $ime = $_POST['ime'];
        $cena = $_POST['cena'];
        $kategorija = $_POST['kategorija'];
        $restoran = $_POST['restoran'];

        if(isset($_POST['active'])) {
            $active = $_POST['active'];
        } else {
            $active = "Не";
        }

        if(isset($_POST['featured'])) {
            $featured = $_POST['featured'];
        } else {
            $featured = "Не";
        }

        if(isset($_FILES['slika']['name'])) {
            //Upload the Image
            $slika = $_FILES['slika']['name'];
            
            if($slika!="") {
                $pom=explode('.', $slika);
                $ext = end($pom);
                $slika = "Food-Name-".rand(0000,9999).".".$ext;
                $src = $_FILES['slika']['tmp_name'];
                $dst = "../../images/food/".$slika;
                $upload = move_uploaded_file($src, $dst);
                if($upload == false) {
                    $_SESSION['upload'] = "<div class='error'>Сликата не е прикачена успешно.</div>";
                    header('location:'.MAINURL.'admin/Food?action=add');
                    die();
                }
            } 
        } else {
            $slika = "";
        }

        $product= New Product('', $ime,$cena,$slika,$active,$featured,$kategorija,$restoran);
        $res2=ProductDB::addProduct($product);


        if($res2 == true) {
            
            $_SESSION['add'] = "<div class='success'>Производот е успешно додаден.</div>";
            header('location:'.MAINURL.'admin/Food');
          
        } else {

            $_SESSION['add'] = "<div class='error'>Производот не е успешно додаден.</div>";
            header('location:'.MAINURL.'admin/Food');
        

        }
    }


 }
 else
 {
     $products=ProductDB::getProducts();
     include('view-manage-food.php');
     ob_end_flush();
 }
?>