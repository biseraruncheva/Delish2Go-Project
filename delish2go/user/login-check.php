<?php
    //Authorization - Access Control
    if(!isset($_SESSION['korisnik'])) { 
        $_SESSION['no-login-message'] = "<div class='error text-center'>Ве молиме да се Најавите</div>";
        header('location:'.MAINURL.'user/Login');
    }
?>