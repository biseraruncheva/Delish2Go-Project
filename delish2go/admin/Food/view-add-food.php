<?php include('../partials/header.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Додади Производ</h1>

        <br><br>

        <?php
            if(isset($_SESSION['upload'])) {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Име на Производ: </td>
                    <td>
                        <input type="text" name="ime" placeholder="Внеси Име на Производ">
                    </td>
                </tr>
                <tr>
                    <td>Цена на Производ: </td>
                    <td>
                        <input type="number" name="cena">
                    </td>
                </tr>
                <tr>
                    <td>Прикачи Слика: </td>
                    <td>
                        <input type="file" name="slika">
                    </td>
                </tr>
                <tr>
                    <td>Категорија: </td>
                    <td>
                        <select name="kategorija">
                            <?php if($kategorii!=""){
                               foreach($kategorii as $kategorija) :
                                        ?>
                                        <option value="<?php echo $kategorija->getID(); ?>"><?php echo $kategorija->getIme(); ?></option>
                                        
                                        <?php endforeach ;?>   
                                        <?php } else { ?>
                                    <option value="0">Нема достапни категории</option>
                                    <?php } ?></select>
                    </td>
                </tr>
                <tr>
                    <td>Ресторан: </td>
                    <td>
                        <select name="restoran">
                            <?php
                                if($restorani!=""){
                                    foreach($restorani as $restoran) : ?>
                                        <option value="<?php echo $restoran->getID(); ?>"><?php echo $restoran->getID(); ?></option>
                                        
                                        <?php endforeach ;
                                         } else { ?>
                                    <option value="0">Нема достапни ресторани</option>
                                    <?php } ?></select>
                    </td>
                </tr>
                <tr>
                    <td>Прикажи во Мени? </td>
                    <td>
                        <input type="radio" value="Да" name="active">Да
                        <input type="radio" value="Не" name="active">Не
                    </td>
                </tr>
                <tr>
                    <td>Прикажи на Почетна? </td>
                    <td>
                        <input type="radio" value="Да" name="featured">Да
                        <input type="radio" value="Не" name="featured">Не
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Додади Производ" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>


    </div>
</div>

<?php include('../partials/footer.php');?>