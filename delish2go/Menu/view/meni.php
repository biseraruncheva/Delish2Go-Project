<?php if(!isset($_SESSION['korisnik'])) {include('../view/header.php'); } else {include('../user/view/header.php'); }?>
<p style="font-family: Georgia, serif; font-size:3em;margin-left:40%"><img src="<?php echo MAINURL; ?>images/dzvezda.png"><b>МЕНИ</b><img src="<?php echo MAINURL; ?>images/dzvezda.png"></p>

<section class="categories" style='background-color:LemonChiffon'>
    <div  class="container">
    
        <?php 
       
        if($kategorii!=""){
               foreach ($kategorii as $kategorija) :
                    ?>

                    <a href="<?php echo MAINURL;?>Menu/index.php?categoryID=<?php echo $kategorija->getID();?>"style='text-decoration: none;'>
                        <div class="wrapper">
                            <?php
                                 $slika=$kategorija->getSlika();
                                if($slika == "") {
                                    echo "<div class='error'>Не е достапна слика.</div>";
                                } else {
                            ?>
                            <img src="<?php echo MAINURL; ?>images/category/<?php echo $slika; ?>" style='height: 100%; width: 100%; object-fit: contain'>
                            <?php
                        }
                    ?>
                    <h3 class="center"><?php echo $kategorija->getIme(); ?></h3>
                </div>
            </a>
            <?php endforeach; ?>       
            <?php
            
        } else {
                echo "<div class='error'>Нема достапни категории.</div>";
        }
        ?>
        <div class="clearfix"></div>
        </div>
    </section>
<?php include('../view/footer.php') ?>