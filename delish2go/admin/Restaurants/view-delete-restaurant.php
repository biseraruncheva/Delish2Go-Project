<?php
    include('../model/constants.php');

    if(isset($_GET['id']) AND isset($_GET['slika'])) {
        $id = $_GET['id'];
        $slika = $_GET['slika'];

        //Remove the physical image file
        if($slika != "") {
            $path = "../images/restaurants/".$slika;
            $remove = unlink($path);
            if($remove == false) {
                $_SESSION['remove'] = "<div class='error'>Сликата не е успешно избришана.</div>";
                header('location:'.MAINURL.'admin/manage-restaurants.php');
                die();
            }
        }
        //Delete data from database
        $sql = "DELETE FROM restoran WHERE ID=$id";
        $res = mysqli_query($conn, $sql);

        if($res == true) {
            $_SESSION['delete'] = "<div class='success'>Ресторанот е успешно избришан.</div>";
            header('location:'.MAINURL.'admin/manage-restaurants.php');
        } else {
            $_SESSION['delete'] = "<div class='error'>Ресторанот не е успешно избришан.</div>";
            header('location:'.MAINURL.'admin/manage-restaurants.php');
        }
    } else {
        header('location:'.MAINURL.'admin/manage-restaurants.php');
    }
?>