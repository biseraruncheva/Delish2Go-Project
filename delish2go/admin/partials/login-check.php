<?php
    //Authorization - Access Control
    if(!isset($_SESSION['user'])) { 
        $_SESSION['no-login-message'] = "<div class='error text-center'>Ве молиме да се Најавите за да може да пристапите до Admin Panel</div>";
        header('location:'.MAINURL.'admin/Login');
    }
?>