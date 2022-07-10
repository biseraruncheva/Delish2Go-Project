<?php if(!isset($_SESSION['korisnik'])) {include('view/header.php'); } else {include('user/view/header.php'); }?>

<?php
            if(isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
?>
        <br>
        <br>
        <br>
        <section style="background-image: url(images/background2.jpg); position: absolute; background-size: cover;;height: 80%;width: 100%;">
            <p style="font-family: Georgia, serif;position: absolute;top: 50px;left: 60px; font-size: 3.5em;"><b>Вкусна храна, брза достава</b></p>
            <p style="font-size: 7em; color:rgb(205, 10, 10);position: absolute;top: 110px;left: 60px;"><b>Delish2Go</b></p> 
            <?php if(!isset($_SESSION['korisnik'])) { ?>
                 <a href="<?php echo MAINURL; ?>user"> <input type="button" value="Нарачај веднаш" style="padding:1%;background-color:rgb(205, 10, 10);font-size: 1.2em; color:white;position: absolute;top: 420px;left: 60px; border-radius: 4px; border: 3px solid rgb(112, 5, 5);"> </a>

             <?php    } else {  ?>
            <a href="Restaurants"> <input type="button" value="Нарачај веднаш" style="padding:1%;background-color:rgb(205, 10, 10);font-size: 1.2em; color:white;position: absolute;top: 420px;left: 60px; border-radius: 4px; border: 3px solid rgb(112, 5, 5);"> </a>

            <?php  }?>
        </section>
        
        <section style="background-color: rgb(255, 243, 243); margin-top: 650px;">
            <br>
            <br>
           <img src="images/restorani2.png"  style="margin-left: 85px;  width:27%"> 
           <img src="images/dostava2.png"  style="margin-left: 70px;  width:27%">
           <img src="images/kvalitet2.png"  style="margin-left: 70px;  width:27%">
           <br>
           <br>
           <br>
           <br>
           <br>
           <section style="background-color: white; margin-left: 80px; margin-right:80px;">
            
            <p style="font-family: Georgia, serif; font-size:3em;text-align: center;"><img src="images/dzvezda.png"><b>НАЈПРОДАВАНИ ПРОИЗВОДИ</b><img src="images/dzvezda.png"></p>
            <br>
            <br>
            <section class="categories" style='background-color:white' >
    <div class="container">
        <div class="row">
         <?php 
                    

                    if($proizvodi!=""){
                    foreach ($proizvodi as $proizvod) : ?>     
                    <div class="column">
                        <div class="top3">
                            <?php
                            $slika=$proizvod->getSlika();
                                if($slika == "") {
                                    echo "<div class='error'>Не е достапна слика.</div>";
                                } else {
                            ?>
                            <img src="<?php echo MAINURL; ?>images/food/<?php echo $slika; ?>"style='height: 350px; width: 100%;' >
                                
                            <?php
                        }
                    ?>
                            <h3 class="center"><?php echo $proizvod->getIme(); ?></h3> 
                            <p class="center" style='color: black;'><?php echo $proizvod->getCena(); ?> ден.</p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                    <?php } else { ?>
                <h2 class='error' style="text-align:center; margin-left:20%" > Нема најпродавани производи.</h2>
        <?php } ?>



        <div class="clearfix"></div>
        </div>
    </section>
           
            <a href="Menu"> <input type="button" value="Цело мени" style=" margin-left:40.5%;text-align:center;margin-top:120%;padding:1%;background-color:rgb(205, 10, 10);font-size: 1.2em; color:white;position: absolute;top: 420px;left: 60px; border-radius: 4px; border: 3px solid rgb(112, 5, 5);"> </a>
           </section>
        <br> <br> <br> <br><br> <br> <br> <br>
        <div class="red">
            <div class="kolona">
        <section style="background-color: white; margin-left: 80px;margin-top:80px; height: 500px; width: 600px" >
            <p style="font-family: Georgia, serif; font-size:2.5em;margin-left:10px"><img src="images/dzvezda.png"><b>Понуда на неделата</b><img src="images/dzvezda.png"></p>
            <p style=' text-align: center;'> <b style='font-size: 1.5em;'>Само оваа недела специјална понуда</b> <br> <br> <br> <br>         
        <div style='text-align: center;'>    Понуда која не се пропушта! <br> Новиот Чизбургер од ресторанот Мартини <br> по промотивна цена од <b> само 120 денари.<b> </div></p>
            <br><br><br><br><br>
        </section>
                    </div>
            <div class="kolona">
        <section style="background-color: rgb(255, 243, 243); margin-left: 80px;margin-top:80px;" >
        <img src="<?php echo MAINURL; ?>images/food/Food-Name-8989.jpg"style='height: 500px; width: 600px;' >
           
        </section>
                    </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>


<section style="background-color:white">
<br>
<br>
<br>
<br>
<br>

</section>
<?php include('view/footer.php') ?>