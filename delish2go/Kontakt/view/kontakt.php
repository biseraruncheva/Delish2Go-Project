<?php if(!isset($_SESSION['korisnik'])) {include('../view/header.php'); } else {require('../util/secure_connection.php'); include('../user/view/header.php'); }?>

             <br>
             <br>
             <br>
             
             <div style="padding: 20px;">
             <div style="float:left; margin-left:80px; ">
             <iframe style="width:500px; height:400px"src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2964.8576582823816!2d21.3949979!3d42.0033303!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1354146ea1150f8b%3A0x697ee389ec3cc250!2sBlvd.%20Partizanski%20Odredi%20102%2C%20Skopje%201000!5e0!3m2!1sen!2smk!4v1656598796645!5m2!1sen!2smk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>             </div>
             <div style="float:right;  margin-right:180px;">
                 <p>
                     <b style="font-size:2em;" >Работно време</b> <br> <br> <br> 
                    Понеделник-Петок: 08:00-00:00 <br>
                    Сабота-Недела: 10:00-01:00 <br>
                    <br> <br> <br>
                    Партизански Одреди бр.102, Скопје 
                    <br> <br> <br> <br>
                    Тел: +389 70 444 222 <br>
                    Email: <a href="mailto:delish2gophp@gmail.com">delish2gophp@gmail.com</a>
                </p>
                <br><br><br>
                <img src="<?php echo MAINURL;?>images/facebook.png" height="30px" width="30px">
                <img src="<?php echo MAINURL;?>images/Instagram.png" height="35px" width="35px">
                <img src="<?php echo MAINURL;?>images/twitter.png" height="30px" width="30px">
             </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br>
            <br>
            <br>    
<?php include('../view/footer.php'); ?>