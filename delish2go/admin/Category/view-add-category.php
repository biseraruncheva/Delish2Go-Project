<?php include('../partials/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Додади Категорија на храна</h1>
        
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
                    <td>Име на Категорија: </td>
                    <td>
                        <input type="text" name="ime" placeholder="Внеси категорија">
                    </td>
                </tr>
                <tr>
                    <td>Прикачи Слика:</td>
                    <td>
                        <input type="file" name="slika">
                    </td>
                </tr>
                <tr>
                    <td>Прикажи во Мени?</td>
                    <td>
                        <input type="radio" name = "active" value="Да"> Да
                        <input type="radio" name = "active" value="Не"> Не
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Додади Категорија" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('../partials/footer.php'); ?>

