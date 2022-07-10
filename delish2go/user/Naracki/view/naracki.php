<?php include('../view/header.php') ?>

<div class="cart_body">
   <div class="CartContainer">
   	   <div class="Header">
   	   	<h3 class="Heading">Претходнo завршени нарачки</h3>
   	   </div>
       
	   <?php
	   $count=0;
	   $suma=0;
	   if($kosnicki!=""){
	    foreach($kosnicki as $kosnicka) {
		if($kosnicka->getIsporacano()=="да"){
			if($kosnicka->getKorisnikID()==$korisnik->getKorisnikID()){
			$count++;
			$id1=$kosnicka->getProizvodID();
			foreach($proizvodi as $proizvod){
				$id2=$proizvod->getID();
				$resID1=$proizvod->getRestoranID();
					if($id1==$id2){
			?>
   	   <div class="Cart-Items">
   	   	  <div class="image-box">
			<?php $slika=$proizvod->getSlika(); ?>
   	   	  	<img src="<?php echo MAINURL; ?>images/food/<?php echo $slika; ?>" style=' height:120px; ' >
   	   	  </div>
   	   	  <div class="about">
			
   	   	  	<h1 class="title"><?php echo $proizvod->getIme() ?></h1>
   	   	    <?php foreach($restorani as $restoran){
				$resID2=$restoran->getID();
				if($resID1==$resID2){
					$imeRest=$restoran->getIme();
				}
			} ?>
			<h3 class="subtitle"><?php echo $imeRest ?></h3>
   	   	  </div>
   	   	  <div class="prices">
			<?php $cenaProizvod = $proizvod->getCena();?>
   	   	  	<div class="amount"><?php echo $cenaProizvod ." ден."?></div>
			<?php $suma += $cenaProizvod; ?>
		</div>
   	   </div>
	   <?php } } } } } }?>

   	 <hr> 
        </div>
        </div>
        
     <br> <br> <br> <br> <br>


<?php include('../view/footer.php') ?>