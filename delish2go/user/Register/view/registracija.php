<?php include('../../view/header.php'); ?>

            <div class="wrapper">

            <?php 
                    if(isset($_SESSION['mailIspraten'])) {
                        echo $_SESSION['mailIspraten'];
                        unset($_SESSION['mailIspraten']);
                    }
                ?>
                <h1>Регистрирај се</h1>
                <form action="" method="POST">
                    <div class="txt_field">
                        <input type="text" name="ime" required>
                        <span></span>
                        <label>Име</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="prezime" required>
                        <span></span>
                        <label>Презиме</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="adresa" required>
                        <span></span>
                        <label>Адреса на живеење</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="telefon" required>
                        <span></span>
                        <label>Телефонски број</label>
                    </div>
                    <div class="txt_field">
                        <input type="text" name="email"  required>
                        <span></span>
                        <label>Email</label>
                    </div>
                    <div class="txt_field">
                        <input type="password" name="lozinka" required>
                        <span></span>
                        <label>Лозинка</label>
                    </div>
                    <input type="submit" name="submit" value="Регистрирај се">
                </form>
            </div>

<?php include('../../view/footer.php'); ?>