<?php
class AdminDB {
    public static function getAdmins()
    {
        global $conn;
        
        $query="SELECT * FROM  `admin`
                ORDER BY id";
       
        $result=mysqli_query($conn,$query);

        $admins = array();
      
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
        while($row = mysqli_fetch_assoc($result)) {
        $admin = new Admin($row['id'],
                           $row['ime'],
                           $row['prezime'],
                           $row['korisnickoIme'],
                           $row['password']);
        $admins[]=$admin;
       }
       return $admins;

        }
        else
        {
            $admins="";
            return $admins;
        }
       
        
    }
    
    public static function getAdminbyID($admin_id)
    {
      global $conn;
    
    $query = "SELECT * FROM `admin`
              WHERE id = '$admin_id'";    

    $result=mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count > 0)
    {
    $row = $result->fetch_assoc();
    $admin = new Admin($row['id'],
                           $row['ime'],
                           $row['prezime'],
                           $row['korisnickoIme'],
                           $row['password']);
    return $admin;
    }else
    {
        $admin="";
        return $admin;
    }
    }

    public static function getAdmin($ki, $pw)
    {
      global $conn;
       $pass=md5($pw); //shifrirano
    $query = "SELECT * FROM `admin`
              WHERE korisnickoIme='$ki' AND `password`='$pass'";    

    $result=mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count > 0)
    {
    $row = $result->fetch_assoc();
    $admin = new Admin($row['id'],
                           $row['ime'],
                           $row['prezime'],
                           $row['korisnickoIme'],
                           $row['password']);
    return $admin;
    }else
    {
        $admin="";
        return $admin;
    }

    }


    public static function addAdmin($admin) {
        global $conn;
    
        $admin_id = $admin->getID();
        $ime = $admin->getIme();
        $prezime = $admin->getPrezime();
        $ki = $admin->getKorisnichkoIme();
        $pw = md5($admin->getPassword());
        

        $query = "INSERT INTO `admin` SET
            id = '$admin_id', ime='$ime', prezime='$prezime', korisnickoIme='$ki', `password`='$pw' "; 

        $result = mysqli_query($conn, $query);

        if($result==true)
        {
            return true;

        }
        else
        {
           return false;
        }
       
    }

    public static function deleteAdmin($admin_id) {
       global $conn;
   
        $query = "DELETE FROM `admin`
                  WHERE id = $admin_id ";
        
        $result=mysqli_query($conn,$query);
        
        if($result==true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function updateAdmin($admin)
    {
        global $conn;
    
        $admin_id = $admin->getID();
        $ime = $admin->getIme();
        $prezime = $admin->getPrezime();
        $ki = $admin->getKorisnichkoIme();
        $pw = md5($admin->getPassword());

        $query = "UPDATE admin SET  
        ime = '$ime',prezime = '$prezime', korisnickoIme = '$ki' WHERE id='$admin_id'";

       $result = mysqli_query($conn, $query);

       if($result==true)
       {
         return true;

        }
       else
      {
        return false;
      }
        
    }

}



