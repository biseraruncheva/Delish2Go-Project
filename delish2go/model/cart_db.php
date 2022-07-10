<?php
class KoshnichkaDB {
    public static function getKoshnichki()
    {
        global $conn;
        
        $query="SELECT * FROM kosnicka
                ORDER BY id";
       
        $result=mysqli_query($conn,$query);

        $carts = array();
      
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
        while($row = mysqli_fetch_assoc($result)) {
        $cart = new Koshnichka($row['id'],
                                 $row['korisnikID'],
                                 $row['proizvodID'],
                                $row['isporacano']);
        $carts[]=$cart;
       }
       return $carts;

        }
        else
        {
            $carts="";
            return $carts;
        }
       
        
    }

    public static function getKoshnichkiByKorisnik($korisnik_id)
    {
        global $conn;
        
        $query="SELECT * FROM kosnicka
                WHERE korisnikID='$korisnik_id'";
       
        $result=mysqli_query($conn,$query);

        $carts = array();
      
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
        while($row = mysqli_fetch_assoc($result)) {
        $cart = new Koshnichka($row['id'],
                                 $row['korisnikID'],
                                 $row['proizvodID'],
                                 $row['isporacano']);
        $carts[]=$cart;
       }
       return $carts;

        }
        else
        {
            $carts="";
            return $carts;
        }
       
        
    }

    
    public static function getKoshnichkaByID($cart_id)
    {
      global $conn;
    
    $query = "SELECT * FROM kosnicka
              WHERE id = $cart_id";    

    $result=mysqli_query($conn,$query);
    $row = $result->fetch_assoc();
    $cart = new Koshnichka($row['id'],
                           $row['korisnikID'],
                           $row['proizvodID'],
                           $row['isporacano']);
    return $cart;

    }


    public static function addKoshnichka($cart) {
        global $conn;
    
        $cart_id = $cart->getID();
        $kid = $cart->getKorisnikID();
        $pid = $cart->getProizvodID();
        $isp = $cart->getIsporacano();

        

        $query = "INSERT INTO kosnicka
                  SET id = '$cart_id', korisnikID =  '$kid',proizvodID = '$pid', isporacano = '$isp'";
       $result=mysqli_query($conn, $query);
       if($result==true){
        return true;
       }
       else{
        return false;
       }
    }

    public static function deleteKoshnichka($cart_id) {
       global $conn;
   
        $query = "DELETE FROM kosnicka
                  WHERE id = '$cart_id'";
        $result=mysqli_query($conn, $query);
        if($result==true){
            return true;
        }
        else {
            return false;
        }
    }
    
    public static function deleteKoshnichki($korisnik_id){
        global $conn;

        $query = "DELETE FROM kosnicka
                  WHERE isporacano = 'не' AND korisnikID = '$korisnik_id'";
        $result=mysqli_query($conn, $query);

        if($result==true){
            return true;
        }
        else {
            return false;
        }
    }

    public static function naracaj($korisnik_id){
        global $conn;

        $query = "UPDATE kosnicka
                  SET isporacano = 'да'
                  WHERE isporacano = 'не' AND korisnikID = '$korisnik_id' ";
        $result=mysqli_query($conn, $query);

        if($result==true){
            return true;
        }
        else {
            return false;
        }
    }



}



