<?php include('../partials/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Менаџирање со Категорија на Храна</h1>

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

                <!-- Button to Add Category -->
                <a href="<?php echo MAINURL;?>admin/Category?action=add" class="btn-primary">Додади Категорија</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>БР.</th>
                        <th>Име на Категорија</th>
                        <th>Слика</th>
                        <th>Достапна во Мени</th>
                        <th>Акции</th>
                    </tr>

                    <?php
                        
                        $sn = 1;

                        if($categories > 0) {
                            foreach($categories as $category) :
            

                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $category->getIme(); ?></td>
                                        <td>
                                            <?php
                                            $slika=$category->getSlika();
                                               if($slika!="") {
                                                    ?>
                                                    <img src="<?php echo MAINURL;?>images/category/<?php echo $slika; ?>" width="100px">
                                                    <?php
                                               } else {
                                                    echo "<div class='error'>Нема Слика</div>";
                                               }   
                                            ?>
                                        </td>
                                        <td><?php echo $category->getActive(); ?></td>
                                        <td>
                                            <a href="<?php echo MAINURL; ?>admin/Category?id=<?php echo $category->getID(); ?>&slika=<?php echo $slika;?>&action=delete" class="btn-danger">Избриши Категорија</a>

                                        </td>
                                    </tr>
                                <?php endforeach;
                            
                        } else {
                            ?>

                            <tr>
                                <td colspan="5"><div class="error">Нема додадени Категории.</div></td>
                            </tr>

                            <?php 
                        }
                    ?>

                    
                </table>
    </div>
</div>

<?php include('../partials/footer.php'); ?>