<?php if(!isset($_SESSION['korisnik'])) {include('../view/header.php'); } else {include('../user/view/header.php'); }?>



<section class="food-search text-center">
        <div class="container">
            
            <h2>Категорија <a href="#" class="text-white">"<?php echo $kategorija->getIme(); ?>"</a></h2>

        </div>
</section>

<section class="food-menu">
    <div class="container">
    <?php 
                if(isset($_SESSION['added-to-cart'])) 
                {
                    echo $_SESSION['added-to-cart'];
                    unset($_SESSION['added-to-cart']);
                }
            ?>
        <h2 class="text-center">Достапни производи</h2>
        <?php
        $categoryName=$kategorija->getIme(); 
        if($proizvodi!="")
        { foreach($proizvodi as $proizvod) :   ?>
                    
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                
                                 $slika=$proizvod->getSlika();
                                if($slika=="") {
                                    echo "<div class='error'>Нема достапна слика за овој производ.</div>";
                                } else {
                                    ?>
                                        <img src="<?php echo MAINURL;?>images/food/<?php echo $slika;?>" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="food-menu-desc">
                            <h4><?php echo $proizvod->getIme(); ?></h4>
                            <p class="food-price"><?php echo $proizvod->getCena(); ?> денари</p>
                            <br>
                            <?php if(!isset($_SESSION['korisnik'])) { ?>
                            <a href="<?php echo MAINURL; ?>user" class="btn btn-primary">Додади во Кошничка</a>
                            <?php } else { ?>
                             <a href="<?php echo MAINURL; ?>Menu?id=<?php echo $korisnik->getKorisnikID(); ?>&action=add&pid=<?php echo $proizvod->getID(); ?>&action=add&cid=<?php echo $kategorija->getID(); ?>" class="btn btn-primary">Додади во Кошничка</a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php endforeach; ?> 
                    <?php
                }
             else {
                echo "<div class='error'>Нема достапни производи од $categoryName kategorijata.</div>";
            }
        ?>
        <div class="clearfix"></div>
    </div>
</section>
<?php include('../view/footer.php') ?>