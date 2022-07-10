<?php
    include('../model/constants.php');

    if(isset($_GET['id']) AND isset($_GET['slika'])) {
        $id = $_GET['id'];
        $slika = $_GET['slika'];

        //Remove the physical image file
        if($slika != "") {
            $path = "../images/category/".$slika;
            $remove = unlink($path);
            if($remove == false) {
                $_SESSION['remove'] = "<div class='error'>Сликата не е успешно избришана.</div>";
                header('location:'.MAINURL.'admin/manage-category.php');
                die();
            }
        }
        //Delete data from database
        $sql = "DELETE FROM kategorija WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res == true) {
            $_SESSION['delete'] = "<div class='success'>Категоријата е успешно избришана.</div>";
            header('location:'.MAINURL.'admin/manage-category.php');
        } else {
            $_SESSION['delete'] = "<div class='error'>Категоријата не е успешно избришана.</div>";
            header('location:'.MAINURL.'admin/manage-category.php');
        }
    } else {
        header('location:'.MAINURL.'admin/manage-category.php');
    }
?>