<?php include('../partials/header.php'); ?>
    <div class="main-content">
        <div class="wrapper">
            <h1>Додади Администратор</h1>

            <br><br>

            <?php 
                if(isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Име: </td>
                        <td>
                            <input type="text" name="name" placeholder="Внесете го Вашето Име">
                        </td>
                    </tr>

                    <tr>
                        <td>Презиме: </td>
                        <td>
                            <input type="text" name="surname" placeholder="Внесете го Вашето Презиме">
                        </td>
                    </tr>

                    <tr>
                        <td>Корисничко Име: </td>
                        <td>
                            <input type="text" name="username" placeholder="Внесете го Вашето Корисничко Име">
                        </td>
                    </tr>

                    <tr>
                        <td>Лозинка: </td>
                        <td>
                            <input type="password" name="password" placeholder="Внесете Лозинка">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Додади Администратор" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php include('../partials/footer.php'); ?>

