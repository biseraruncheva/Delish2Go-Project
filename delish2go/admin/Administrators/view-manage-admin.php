<?php include('../partials/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Менаџирање на Администратори</h1>

        <br />

        <?php 
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];//Displaying Session Message
                unset($_SESSION['add']);//Removing Session Message
            }
            if(isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>
                
        <br /><br />

        <!-- Button to Add Admin -->
        <a href="<?php echo MAINURL; ?>admin/Administrators?action=add" class="btn-primary">Додади Администратор</a>

        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>БР.</th>
                <th>Име</th>
                <th>Презиме</th>
                <th>Корисничко Име</th>
                <th>Акции</th>
            </tr>

            <?php
               
                    $sn = 1;
                    
                    if($admins > 0) {
                        foreach ($admins as $admin) : 
                            ?>

                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $admin->getIme(); ?></td>
                                <td><?php echo $admin->getPrezime(); ?></td>
                                <td><?php echo $admin->getKorisnichkoIme(); ?></td>
                                <td>
                                    <a href="<?php echo MAINURL; ?>admin/Administrators?id=<?php echo $admin->getID(); ?>&action=update" class="btn-secondary">Промени Податоци</a>
                                    <a href="<?php echo MAINURL; ?>admin/Administrators?id=<?php echo $admin->getID(); ?>&action=delete" class="btn-danger">Избриши Администратор</a>
                                </td>
                            </tr>

                            <?php endforeach; ?>
                   <?php } else {

                    }
                

            ?>
        </table>
                
    </div>
</div>

<?php include('../partials/footer.php'); ?>
