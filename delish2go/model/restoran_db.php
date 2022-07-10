<?php
class RestoranDB {
    public static function getRestaurants()
    {
        global $conn;
        
        $query="SELECT * FROM restoran
                ORDER BY ID";
       
        $result=mysqli_query($conn,$query);

        $restorani = array();
      
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
        while($row = mysqli_fetch_assoc($result)) {
        $restoran = new Restoran($row['ID'],
                                 $row['Ime'],
                                 $row['RabotnoVreme'],
                                 $row['Adresa'],
                                 $row['slika'],
                                 $row['active']);
        $restorani[]=$restoran;
       }
       return $restorani;

        }
        else
        {
            $restorani="";
            return $restorani;
        }
       
        
    }
    
    public static function getRestaurant($restoran_id)
    {
      global $conn;
    
    $query = "SELECT * FROM restoran
              WHERE ID = $restoran_id";    

    $result=mysqli_query($conn,$query);
    $row = $result->fetch_assoc();
    $restoran = new Restoran($row['ID'],
                                 $row['Ime'],
                                 $row['RabotnoVreme'],
                                 $row['Adresa'],
                                 $row['slika'],
                                 $row['active']);
    return $restoran;

    }

      
    public static function addRestaurant($restoran) {
        global $conn;
    
        $restoran_id = $restoran->getID();
        $ime = $restoran->getIme();
        $RabVreme = $restoran->getRabotnoVreme();
        $Adresa=$restoran->getAdresa();
        $Slika = $restoran->getSlika();
        $Active = $restoran->getActive();

        $query = "INSERT INTO restoran SET
        ID = '$restoran_id',
        Ime = '$ime',
        Adresa = '$Adresa',
        RabotnoVreme = '$RabVreme',
        slika = '$Slika',
        active = '$Active'
    ";

        $result=mysqli_query($conn, $query);
        if($result==true){
            return true;
        }
        else {
            return false;
        }
    }


    public static function deleteRestaurant($restoran_id) {
       global $conn;
   
        $query = "DELETE FROM restoran
                  WHERE ID = '$restoran_id'";
        $result=mysqli_query($conn, $query);
        if($result==true){
            return true;
        }
        else {
            return false;
        }
      }
    

}



