<?php include('../partials/header.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Промени Податоци на Администратор</h1>
        
        <br><br>

        <form action="" method="POST">
            
            <table class="tbl-30">
                <tr>
                    <td>Име: </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $admin1->getIme(); ?>">
                    </td>
                </tr>

                <tr>
                    <td>Презиме: </td>
                    <td>
                        <input type="text" name="surname" value="<?php echo $admin1->getPrezime(); ?>">
                    </td>
                </tr>

                <tr>
                    <td>Корисничко Име: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $admin1->getKorisnichkoIme(); ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="3">
                        <input type="hidden" name="id" value="<?php echo $admin1->getID();?>">
                        <input type="submit" name="submit" value="Промени" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>



<?php include('../partials/footer.php') ?>