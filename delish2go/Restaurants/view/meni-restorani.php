<?php if(!isset($_SESSION['korisnik'])) {include('../view/header.php'); } else {include('../user/view/header.php'); }?>
<section class="food-search text-center">
        <div class="container">
            
            <h2>Ресторан <a href="#" class="text-white">"<?php echo $restoran->getIme(); ?>"</a></h2>

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
        <h2 class="text-center">Достапни производи во <?php echo $restoran->getIme(); ?></h2>
        <?php 
        $restoranName = $restoran->getIme();
        if($proizvodi!=""){
            foreach ($proizvodi as $proizvod) :
                    ?>
                   
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                $slika=$proizvod->getSlika();
                                if($slika=="") {
                                    echo "<div class='error'>Нема достапна слика за овој производ.</div>";
                                } else {
                                    ?>
                                        <img src="<?php echo MAINURL; ?>images/food/<?php echo $slika; ?>" class="img-responsive img-curve">
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
                             <a href="<?php echo MAINURL; ?>Restaurants?id=<?php echo $korisnik->getKorisnikID(); ?>&action=add&pid=<?php echo $proizvod->getID(); ?>&action=add&rid=<?php echo $restoran->getID(); ?>" class="btn btn-primary">Додади во Кошничка</a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php
            
             } else {
                echo "<div class='error'>Нема достапни производи од $restoranName ресторанот.</div>";
            }
        ?>
        <div class="clearfix"></div>
    </div>
</section>
<?php include('../view/footer.php') ?>