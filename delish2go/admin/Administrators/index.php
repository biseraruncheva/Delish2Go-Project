<?php
require('../../model/constants.php');
require('../../model/admin.php');
require('../../model/admin_db.php');

include('../partials/login-check.php');


$admin_id = filter_input(INPUT_GET, 'id', 
FILTER_VALIDATE_INT);
$action = filter_input(INPUT_GET, 'action');


 if($admin_id != NULL && $action == 'delete')
 {
    $check=AdminDB::deleteAdmin($admin_id);

    if($check == true) {
        //Admin Deleted
        //Create Session Variable to Display Message 
        $_SESSION['delete'] = "<div class='success'>Администраторот е избришан.</div>";
        //Redirect to Manage Admin
        header('location:'.MAINURL.'admin/Administrators');
    } else {
        //Failed to Delete Admin
        $_SESSION['delete'] = "<div success='error'>Администраторот не е избришан успешно.</div>";
        header('location:'.MAINURL.'admin/Administrators');
    }
         
 }
 else if($admin_id != NULL && $action == 'update')
 {

    $admin1=AdminDB::getAdminbyID($admin_id);
    
   
        if($admin1!="")
        {
            include('view-update-admin.php');

     
            if(isset($_POST['submit'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $username = $_POST['username'];
        
                $admin=New Admin($id, $name, $surname, $username, '');
        
                $res = AdminDB::updateAdmin($admin);
                if($res == true) {
                    $_SESSION['update'] = "<div class='success'>Успешно променети податоци.</div>";
                    header('location:'.MAINURL.'admin/Administrators');
                } else {
                    $_SESSION['update'] = "<div class='error'>Не се променети податоците.</div>";
                    header('location:'.MAINURL.'admin/Administrators');
                }
            }
        


        }
        else
        {
            header('location:'.MAINURL.'admin/Administrators');
        }
    }

 else if($action == 'add')
 {
    include('view-add-admin.php');

    //Process the Value from Form and Save it in Database
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit'])) {
        
        //1. get the data from form
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $password = ($_POST['password']); 

        $admin=New Admin ('',$name,$surname,$username,$password);
        $res = AdminDB::addAdmin($admin);

      
        //4. Check whether the data is inserted or not and display appropriate message
        if($res == TRUE) {
            //Data Inserted
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Администраторот е додаден.</div>";
            //redirect page to Manage Admin
            header('location:'.MAINURL.'admin/Administrators');
        } else {
            //Failed to Insert Data
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Администраторот не е успешно додаден.</div>";
            //redirect page to Add Admin
            header('location:'.MAINURL.'admin/Administrators');
        }
    }
    
 }
 else
 {
     $admins=AdminDB::getAdmins();
     include('view-manage-admin.php');
 }
 
?>