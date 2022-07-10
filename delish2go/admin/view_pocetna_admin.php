<?php include('partials/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>
        <?php
            if(isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        <br><br>
        <div class="col-4 text-center">
           
            <h1><?php echo count($kategorii); ?></h1>
            <br />
            Категории
        </div>

        <div class="col-4 text-center">
            
            <h1><?php echo count($proizvodi); ?></h1>
            <br />
            Производи
        </div>

        <div class="col-4 text-center">
            
            <h1><?php echo count($restorani); ?></h1>
            <br />
            Ресторани
        </div>

        <div class="col-4 text-center">
            <h1><?php echo count($administratori); ?></h1>
            <br />
            Администратори
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<br><br><br><br><br><br><br><br>
<?php include('partials/footer.php'); ?>