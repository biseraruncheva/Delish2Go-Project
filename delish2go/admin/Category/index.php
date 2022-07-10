<?php
require('../../model/constants.php');
require('../../model/category.php');
require('../../model/category_db.php');


include('../partials/login-check.php');

$category_id = filter_input(INPUT_GET, 'id', 
FILTER_VALIDATE_INT);
$action = filter_input(INPUT_GET, 'action');
$slika = filter_input(INPUT_GET, 'slika');

if($category_id != NULL && $action == 'delete')
{
    if($slika != "") {
        $path = "../../images/category/".$slika;
        $remove = unlink($path);
        if($remove == false) {
            $_SESSION['remove'] = "<div class='error'>Сликата не е успешно избришана.</div>";
            header('location:'.MAINURL.'admin/Category');
            die();
        }
    }
   $check=CategoryDB::deleteCategory($category_id);

   if($check == true) {
       //Category Deleted
       //Create Session Variable to Display Message 
       $categories=CategoryDB::getCategories();
       $_SESSION['delete'] = "<div class='success'>Категоријата е избришана.</div>";
       //Redirect to Manage Category
       header('location:'.MAINURL.'admin/Category');
   } else {
       //Failed to Delete Category
       $_SESSION['delete'] = "<div success='error'>Категоријата не е избришана успешно.</div>";
       header('location:'.MAINURL.'admin/Category');
   }
        
}

else if( $action == 'add')
{
    include('view-add-category.php');

    if(isset($_POST['submit'])) {
        $ime = $_POST['ime'];
        if(isset($_POST['active'])) {
            $active = $_POST['active'];
        } else {
            $active = "Не";
        }

        if(isset($_FILES['slika']['name'])) {
            $slika = $_FILES['slika']['name'];
            $pom = explode('.', $slika);
            $ext = end($pom);
            $slika = "Food_Category_".rand(000, 999).'.'.$ext;
            $source_path = $_FILES['slika']['tmp_name'];
            $destination_path = "../../images/category/".$slika;
            $upload = move_uploaded_file($source_path, $destination_path);
            if($upload==false) {
                $_SESSION['upload'] = "<div class='error'>Сликата не е прикачена успешно.</div>";
                header('location:'.MAINURL.'admin/Category?action=add');
                die();
            }
        } else {
            $slika = "";
        }

        $category=New Category ('',$ime,$slika,$active);
        $res=CategoryDB::addCategory($category);

        if ($res == true) {
            $_SESSION['add'] = "<div class='success'>Категоријата е додадена успешно.</div>";
            header('location:'.MAINURL.'admin/Category');
        } else {
            $_SESSION['add'] = "<div class='error'>Категоријата не е додадена.</div>";
            header('location:'.MAINURL.'admin/Category');
        }
    }
}
else
{
    $categories=CategoryDB::getCategories();
    include('view-manage-category.php');
}

?>