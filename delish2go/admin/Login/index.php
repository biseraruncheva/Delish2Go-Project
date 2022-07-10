<?php

require('../../model/constants.php');
require('../../model/category_db.php');
require('../../model/category.php');
require('../../model/product.php');
require('../../model/product_db.php');
require('../../model/admin.php');
require('../../model/admin_db.php');
require('../../util/secure_connection.php');


include('login.php');


if(isset($_POST['submit'])) {
    $korisnickoIme = $_POST['korisnickoIme'];
    $password = $_POST['password'];


    $admin=AdminDB::getAdmin($korisnickoIme,$password);

 
    if($admin!="") {
        $_SESSION['login'] = "<div class='success'>Успешно се најавивте.</div>";
        $_SESSION['user'] = $korisnickoIme; //To check whether the user is logged in or not and logout will unset it

        header('location:'.MAINURL.'admin');
    } else {
        $_SESSION['login'] = "<div class='error text-center'>Погрешно Корисничко Име или Лозинка.</div>";
        header('location:'.MAINURL.'admin/Login');
    }

    if(isset($_POST['remember_me'])) {
        $admin=['username' => $korisnickoIme, 'pass' => $password];

        $admin=serialize($admin);

        setcookie('admin', $admin, time() + (86400 * 30));
    }
}

 
?>