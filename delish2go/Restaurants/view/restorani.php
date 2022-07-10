<?php if(!isset($_SESSION['korisnik'])) {include('../view/header.php');} else {include('../user/view/header.php'); }?>
<p style="font-family: Georgia, serif; font-size:3em;margin-left:35%"><img src="<?php echo MAINURL; ?>images/dzvezda.png"><b>РЕСТОРАНИ</b><img src="<?php echo MAINURL; ?>images/dzvezda.png"></p>
<section class="categories" style='background-color:LemonChiffon' >
    <div class="container">
         <?php 
                    

                    if($restorani!=""){
                    foreach ($restorani as $restoran) : ?>     
                    
                    <a href="<?php echo MAINURL; ?>/Restaurants/index.php?restoranID=<?php echo $restoran->getID(); ?>" style='text-decoration: none;'>

                        <div class="wrapper">
                            <?php
                            $slika=$restoran->getSlika();
                                if($slika == "") {
                                    echo "<div class='error'>Не е достапна слика.</div>";
                                } else {
                            ?>
                            <img src="<?php echo MAINURL; ?>images/restaurants/<?php echo $slika; ?>"style='height: 100%; width: 100%; object-fit: contain' >
                                
                            <?php
                        }
                    ?>
                            <h3 class="center"><?php echo $restoran->getIme(); ?></h3> 
                            <p class="center" style='color: black;'><?php echo $restoran->getAdresa(); ?></p>
                            <p class="center" style='color:black;'><?php echo  $restoran->getRabotnoVreme(); ?></p>
                        </div>
                    </a>
                    <?php endforeach; ?>
                    <?php
          } else {
                echo "<div class='error'>Нема достапни ресторани.</div>";
        }
        ?>



        <div class="clearfix"></div>
        </div>
    </section>
<?php  include('../view/footer.php') ?>