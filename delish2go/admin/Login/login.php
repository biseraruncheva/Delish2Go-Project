<?php include('../../view/header.php'); ?>

<html>
    <head>
        
        <title>Најава - Администратор</title>
        <link rel="stylesheet" href="../../styles/stilovi.css">
    </head>

    <body>
    <br><br>
        <div class="wrapper" style="margin-left:20px;">
            <h1 >Најава - Администратор</h1>

            <?php

                if(isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message'])) {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- Login Form Starts Here -->
            <form action="index.php" method="POST" >
                <div class="txt_field">
                    <input type="text" name="korisnickoIme" id="korisnickoIme" placeholder="Внеси Корисничко Име">
                    <span></span>
                <label>Корисничко Име:<label>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" id="pass" placeholder="Внеси Лозинка">
                    <span></span>
                    <label> Лозинка:</label>
                </div>
                <input type="checkbox" name="remember_me"><label>Запамти податоци?</label>
                <input type="submit" name="submit" value="Најави се" >
            </form>
             
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </body>
</html>
<?php
    if(isset($_COOKIE['admin'])) {
        $admin = unserialize($_COOKIE['admin']);            
        $username = $admin['username'];
        $pass = $admin['pass'];
        echo "<script>
            document.getElementById('korisnickoIme').value = '$username';
            document.getElementById('pass').value = '$pass';
        </script>";
    }
?>
<?php include('../../view/footer.php'); ?>

