<?php include('../partials/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Додади Ресторан</h1>
        
        <br><br>

        <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Име на Ресторан: </td>
                    <td>
                        <input type="text" name="ime" placeholder="Внеси го името на ресторанот">
                    </td>
                </tr>
                <tr>
                    <td>Адреса на Ресторан: </td>
                    <td>
                        <input type="text" name="adresa" placeholder="Внеси ја адресата на ресторанот">
                    </td>
                </tr>
                <tr>
                    <td>Работно време на ресторанот: </td>
                    <td>
                        <input type="text" name="rabVreme" placeholder="Внеси работно време">
                    </td>
                </tr>
                <tr>
                    <td>Прикачи Слика:</td>
                    <td>
                        <input type="file" name="slika">
                    </td>
                </tr>
                <tr>
                    <td>Дали е достапен овој Ресторан?</td>
                    <td>
                        <input type="radio" name = "active" value="Да"> Да
                        <input type="radio" name = "active" value="Не"> Не
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Додади Ресторан" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('../partials/footer.php'); ?>

