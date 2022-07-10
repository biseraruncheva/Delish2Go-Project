<?php include('../partials/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Менаџирање со Ресторани</h1>

        <br /><br />

        <?php
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['remove'])) {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }
            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
        ?>

        <br><br>

                <!-- Button to Add Admin -->
                <a href="<?php echo MAINURL;?>admin/Restaurants?action=add" class="btn-primary">Додади Ресторан</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>БР.</th>
                        <th>Име на Ресторан</th>
                        <th>Адреса</th>
                        <th>Работно Време</th>
                        <th>Слика</th>
                        <th>Достапен</th>
                        <th>Акции</th>
                    </tr>

                    <?php

                        $sn = 1;

                        if($restaurants > 0) {
                           foreach($restaurants as $restaurant):

                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $restaurant->getIme(); ?></td>
                                        <td><?php echo $restaurant->getAdresa(); ?></td>
                                        <td><?php echo $restaurant->getRabotnoVreme(); ?></td>
                                        <td>
                                            <?php
                                            $slika=$restaurant->getSlika();
                                               if($slika!="") {
                                                    ?>
                                                    <img src="<?php echo MAINURL;?>images/restaurants/<?php echo $slika; ?>" width="100px">
                                                    <?php
                                               } else {
                                                    echo "<div class='error'>Нема Слика</div>";
                                               }   
                                            ?>
                                        </td>
                                        <td><?php echo $restaurant->getActive(); ?></td>
                                        <td>
                                            <a href="<?php echo MAINURL; ?>admin/Restaurants?id=<?php echo $restaurant->getID(); ?>&slika=<?php echo $slika;?>&action=delete" class="btn-danger">Избриши Ресторан</a>

                                        </td>
                                    </tr>
                                <?php
                            endforeach;
                        } else {
                            ?>

                            <tr>
                                <td colspan="5"><div class="error">Нема додадени Ресторани.</div></td>
                            </tr>

                            <?php 
                        }
                    ?>


                </table>
    </div>
</div>

<?php include('../partials/footer.php'); ?>