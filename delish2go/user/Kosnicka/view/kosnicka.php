<?php include('../view/header.php') ?>
<?php          
	if(isset($_SESSION['delete'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
					
	if(isset($_SESSION['delete2'])) {
        echo $_SESSION['delete2'];
        unset($_SESSION['delete2']);
    }

	if(isset($_SESSION['mailNaracka'])) {
		echo $_SESSION['mailNaracka'];
		unset($_SESSION['mailNaracka']);
	}
?>
<div class="cart_body">
   <div class="CartContainer">
   	   <div class="Header">
   	   	<h3 class="Heading">Кошничка</h3>
   	   	<h5 class="Action"> <a href="<?php echo MAINURL; ?>user/Kosnicka?id=<?php echo $korisnik->getKorisnikID(); ?>&action=deleteAll" style="text-decoration:none; color:#E44C4C;">Испразни кошничка </a></h5>
   	   </div>
       
	   <?php
	   $count=0;
	   $suma=0;
	   if($kosnicki!=""){
	    foreach($kosnicki as $kosnicka) {
		if($kosnicka->getIsporacano()=="не"){
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
   	   	  	<div class="amount"><?php echo $cenaProizvod ?></div>
			<?php $suma += $cenaProizvod; ?>
   	   	  	<div class="remove"><a href="<?php echo MAINURL; ?>user/Kosnicka?id=<?php echo $kosnicka->getID(); ?>&action=delete"><u>Избриши</u> </a></div>
		</div>
   	   </div>
	   <?php } } } } } }?>

   	   
   	 <hr> 
   	 <div class="checkout">
   	 <div class="total">
   	 	<div>
   	 		<div class="Subtotal">Вкупно</div>
   	 		<div class="items"><?php if($count==1) {
				echo $count . " производ"; }
				else if($count==2){
					echo $count . " производа";}
				else { echo $count . " производи"; }
				 ?></div>
   	 	</div>
   	 	<div class="total-amount"><?php echo $suma; ?></div>
   	 </div>
   	 <button class="button"><a href="<?php echo MAINURL; ?>user/Kosnicka?id=<?php echo $korisnik->getKorisnikID(); ?>&action=naracka" id="naracaj">Нарачај </a></button></div>
   </div>
</div>

<?php include('../view/footer.php') ?>