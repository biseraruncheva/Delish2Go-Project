<?php include('../../view/header.php') ?>

        <div class="wrapper">
            <h1>Најава</h1>

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

<br>
<br>
            <form action="" method="post">
                <div class="txt_field">
                    <input type="text" name="korisnickoIme" id="email" required>
                    <span></span>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" id="pass" required>
                    <span></span>
                    <label>Лозинка</label>
                </div>
                <input type="checkbox" name="remember_me"><label>Запамти податоци?</label>
                <input type="submit" name="submit" value="Најави се">
                <div class="signup_link">
                    Нов корисник? <a href="<?php echo MAINURL; ?>user/Register">Регистрирај се</a>
                    <br>
                    <a href="<?php echo MAINURL; ?>admin/Login">Најави се како Администратор</a>
                </div>
            </form>
        </div>
        <?php
        if(isset($_COOKIE['user'])) {
            $user = unserialize($_COOKIE['user']);
            $email = $user['email'];
            $pass = $user['pass'];
            echo "<script>
                document.getElementById('email').value = '$email';
                document.getElementById('pass').value = '$pass';
            </script>";
        }
        ?>
<?php include('../../view/footer.php') ?>