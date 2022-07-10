<?php
require('../../model/constants.php');
require('../../model/restaurant.php');
require('../../model/restoran_db.php');

include('../partials/login-check.php');

$restoran_id = filter_input(INPUT_GET, 'id', 
FILTER_VALIDATE_INT);
$action = filter_input(INPUT_GET, 'action');
$slika = filter_input (INPUT_GET, 'slika');

 if($restoran_id != NULL && $action == 'delete')
 {
    if($slika != "") {
        $path = "../../images/restaurants/".$slika;
        $remove = unlink($path);
        if($remove == false) {
            $_SESSION['remove'] = "<div class='error'>Сликата не е успешно избришана.</div>";
            header('location:'.MAINURL.'admin/Restaurants');
            die();
        }
    }
    $check=RestoranDB::deleteRestaurant($restoran_id);

    if($check == true) {
        //Restaurant Deleted
        //Create Session Variable to Display Message 
        $restaurants=RestoranDB::getRestaurants();
        $_SESSION['delete'] = "<div class='success'>Ресторанот е избришан.</div>";
        //Redirect to Manage Restaurant
        header('location:'.MAINURL.'admin/Restaurants');
    } else {
        //Failed to Delete Restaurant
        $_SESSION['delete'] = "<div success='error'>Ресторанот не е избришан успешно.</div>";
        header('location:'.MAINURL.'admin/Restaurants');
    }
         
 }
 else if($restoran_id != NULL && $action == 'update')
 {
    $restaurants=RestoranDB::getRestaurants();
     include('view-manage-restaurants.php');


 }
 else if($action == 'add')
 {
    include('view-add-restaurant.php');

      //Check whether the button is clicked or not
      if(isset($_POST['submit'])) {
        //1. Get the value from form
        $ime = $_POST['ime'];
        $adresa = $_POST['adresa'];
        $rabVreme = $_POST['rabVreme'];
        if(isset($_POST['active'])) {
            //Get the value from form
            $active = $_POST['active'];
        } else {
            //Set the Default Value
            $active = "Не";
        }

        //Check whether the image is selected or not
        if(isset($_FILES['slika']['name'])) {
            //Upload the Image
            $slika = $_FILES['slika']['name'];
            $pom=explode('.', $slika);
            $ext = end($pom);

            $slika = "Restaurant_".rand(000, 999).'.'.$ext;

            $source_path = $_FILES['slika']['tmp_name'];
            $destination_path = "../../images/restaurants/".$slika;

            $upload = move_uploaded_file($source_path, $destination_path);
            if($upload==false) {
                $_SESSION['upload'] = "<div class='error'>Сликата не е прикачена успешно.</div>";
                header('location:'.MAINURL.'admin/Restaurants?action=add');
                //Stop the process
                die();
            }
        } else {
            $slika = "";
        }

        $restoran=New Restoran ('',$ime, $rabVreme,$adresa,$slika,$active);

        //2. Create SQL query to insert category in database

        $res = RestoranDB::addRestaurant($restoran);
      /*  $sql = "INSERT INTO restoran SET
            Ime = '$ime',
            Adresa = '$adresa',
            RabotnoVreme = '$rabVreme',
            slika = '$slika',
            active = '$active'
        "; */

        //3. Execute the query and save in database

        if ($res == true) {
            $_SESSION['add'] = "<div class='success'>Ресторанот е додаден успешно.</div>";
            header('location:'.MAINURL.'admin/Restaurants');
        } else {
            $_SESSION['add'] = "<div class='error'>Ресторанот не е додаден.</div>";
            header('location:'.MAINURL.'admin/Restaurants');
        }
    }
    
 }
 else
 {
     $restaurants=RestoranDB::getRestaurants();
     include('view-manage-restaurants.php');
 }
?>
