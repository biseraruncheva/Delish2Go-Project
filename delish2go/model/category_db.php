<?php
class CategoryDB {
    public static function getCategories()
    {
        global $conn;
        
        $query="SELECT * FROM kategorija
                ORDER BY id";
       
        $result=mysqli_query($conn,$query);

        $kategorii = array();
      
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
        while($row = mysqli_fetch_assoc($result)) {
        $kategorija = new Category($row['id'],
                                 $row['ime'],
                                 $row['slika'],
                                 $row['active']);
        $kategorii[]=$kategorija;
       }
       return $kategorii;

        }
        else
        {
            $kategorii="";
            return $kategorii;
        }
       
        
    }
    
    public static function getCategory($category_id)
    {
      global $conn;
    
    $query = "SELECT * FROM kategorija
              WHERE id = $category_id";    

    $result=mysqli_query($conn,$query);
    $row = $result->fetch_assoc();
    $kategorija = new Category($row['id'],
                              $row['ime'],
                              $row['slika'],
                              $row['active']);
    return $kategorija;

    }


    public static function addCategory($kategorija) {
        global $conn;
    
        $category_id = $kategorija->getID();
        $ime = $kategorija->getIme();
        $Slika = $kategorija->getSlika();
        $Active = $kategorija->getActive();
        

        $query = "INSERT INTO kategorija
                SET       
                id = '$category_id',
                ime =  '$ime',
                slika = '$Slika',
                active = '$Active'
                ";
       $result=mysqli_query($conn, $query);
       if($result==true){
        return true;
       }
       else{
        return false;
       }
    }

    public static function deleteCategory($category_id) {
       global $conn;
   
        $query = "DELETE FROM kategorija
                  WHERE id = '$category_id'";
        $result=mysqli_query($conn, $query);
        if($result==true){
            return true;
        }
        else {
            return false;
        }
    }

}



