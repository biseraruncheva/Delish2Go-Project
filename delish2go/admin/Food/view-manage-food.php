<?php include('../partials/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Менаџирање со Производи</h1>

        <br /><br />

                <!-- Button to Add Admin -->
                <a href="<?php echo MAINURL;?>admin/Food?action=add" class="btn-primary">Додади Производ</a>

                <br /><br />

                <?php 
                    if(isset($_SESSION['add'])) {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete'])) {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['upload'])) {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    if(isset($_SESSION['unauthorized'])) {
                        echo $_SESSION['unauthorized'];
                        unset($_SESSION['unauthorized']);
                    }
                ?>

                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>БР.</th>
                        <th>Име на Производ</th>
                        <th>Цена</th>
                        <th>Слика</th>
                        <th>Достапен во Мени</th>
                        <th>Достапен на Почетна</th>
                        <th>Акции</th>
                    </tr>
                    
                    <?php 
                       
                       if($products>0){
                        $sn = 1;
                        foreach($products as $product) :
                
                                ?>

                                <tr>
                                    <td><?php echo $sn++;?> </td>
                                    <td><?php echo $product->getIme(); ?></td>
                                    <td><?php echo $product->getCena(); ?></td>
                                    <td>
                                        <?php 
                                        $slika= $product->getSlika();
                                            if($slika == "") {
                                                echo "<div class='error'>Нема слика</div>";
                                            } else {
                                                ?>
                                                <img src="<?php echo MAINURL; ?>images/food/<?php echo $slika; ?>" width="100px">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo  $product->getActive(); ?></td>
                                    <td><?php echo  $product->getFeatured(); ?></td>
                                    <td>
                                        <a href="<?php echo MAINURL ?>admin/Food?id=<?php echo  $product->getID(); ?>&slika=<?php echo $slika; ?>&action=delete" class="btn-danger">Избриши Производ</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php
                            
                        } else {
                            echo "<tr><td colspan='7' class='error'>Сеуште нема додадено производи.</td></tr>";
                        }
                    ?>

                    

                    
                </table>
    </div>
</div>

<?php include('../partials/footer.php'); ?>