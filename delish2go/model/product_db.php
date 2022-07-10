<?php
class ProductDB {
    public static function getProducts()
    {
        global $conn;
        
        $query="SELECT * FROM proizvod
                ORDER BY ProizvodID";
       
        $result=mysqli_query($conn,$query);

        $proizvodi = array();
      
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
        while($row = mysqli_fetch_assoc($result)) {
        $proizvod = new Product($row['ProizvodID'],
                                 $row['Ime'],
                                 $row['Cena'],
                                 $row['slika'],
                                 $row['active'],
                                 $row['featured'],
                                 $row['KategorijaID'],
                                 $row['RestoranID']);
        $proizvodi[]=$proizvod;
       }
       return $proizvodi;

        }
        else
        {
            $proizvodi="";
            return $proizvodi;
        }
       
        
    }
    
    public static function getProductsbyRestaurant($restoran_id)
    {
        global $conn;
        
        $query="SELECT * FROM proizvod
                WHERE RestoranID=$restoran_id
                ORDER BY ProizvodID";
       
        $result=mysqli_query($conn,$query);

        $proizvodi = array();
      
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
        while($row = mysqli_fetch_assoc($result)) {
        $proizvod = new Product($row['ProizvodID'],
                                 $row['Ime'],
                                 $row['Cena'],
                                 $row['slika'],
                                 $row['active'],
                                 $row['featured'],
                                 $row['KategorijaID'],
                                 $row['RestoranID']);
        $proizvodi[]=$proizvod;
       }
       return $proizvodi;

        }
        else
        {
            $proizvodi="";
            return $proizvodi;
        }
       
        
    }

    public static function getProductsbyCategory($category_id)
    {
        global $conn;
        
        $query="SELECT * FROM proizvod
                WHERE KategorijaID=$category_id
                ORDER BY ProizvodID";
       
        $result=mysqli_query($conn,$query);

        $proizvodi = array();
      
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
        while($row = mysqli_fetch_assoc($result)) {
        $proizvod = new Product($row['ProizvodID'],
                                 $row['Ime'],
                                 $row['Cena'],
                                 $row['slika'],
                                 $row['active'],
                                 $row['featured'],
                                 $row['KategorijaID'],
                                 $row['RestoranID']);
        $proizvodi[]=$proizvod;
       }
       return $proizvodi;

        }
        else
        {
            $proizvodi="";
            return $proizvodi;
        }
       
        
    }
    

    public static function getProduct($product_id)
    {
      global $conn;
    
    $query = "SELECT * FROM proizvod
              WHERE ProizvodID = $product_id";    

    $result=mysqli_query($conn,$query);
    $row = $result->fetch_assoc();
    $proizvod = new Product($row['ProizvodID'],
                            $row['Ime'],
                            $row['Cena'],
                            $row['slika'],
                            $row['active'],
                            $row['featured'],
                            $row['KategorijaID'],
                            $row['RestoranID']);
    return $proizvod;

    }

 
    public static function addProduct($proizvod) {
        global $conn;
    
        $product_id = $proizvod->getID();
        $ime = $proizvod->getIme();
        $cena = $proizvod->getCena();
        $Slika = $proizvod->getSlika();
        $Active = $proizvod->getActive();
        $feat = $proizvod->getFeatured();
        $kID= $proizvod->getKategorijaID();
        $rID = $proizvod->getRestoranID();

        $query = "INSERT INTO proizvod SET
        ProizvodID = '$product_id',
        Ime = '$ime',
        Cena = $cena,
        slika = '$Slika',
        active = '$Active',
        featured = '$feat',
        KategorijaID = $kID,
        RestoranID = $rID
        ";

        $result=mysqli_query($conn, $query);
        if($result==true){
        return true;
        }
        else {
            return false;
        }
    }

    public static function deleteProduct($product_id) {
        global $conn;
    
         $query = "DELETE FROM proizvod
                   WHERE ProizvodID = '$product_id'";
         $result=mysqli_query($conn, $query);
         if($result==true){
             return true;
         }
         else {
             return false;
         }
     }

     public static function getTop3MostSoldProducts()
     {
        global $conn;
        
        $query="SELECT proizvod.* FROM proizvod, kosnicka
                WHERE proizvod.ProizvodID = kosnicka.proizvodID AND kosnicka.isporacano='да'
                GROUP BY kosnicka.proizvodID
                ORDER BY COUNT(kosnicka.proizvodID) DESC
                LIMIT 3";
       
        $result=mysqli_query($conn,$query);

        $proizvodi = array();
      
        $count = mysqli_num_rows($result);
        if($count > 0)
        {
        while($row = mysqli_fetch_assoc($result)) {
        $proizvod = new Product($row['ProizvodID'],
                                 $row['Ime'],
                                 $row['Cena'],
                                 $row['slika'],
                                 $row['active'],
                                 $row['featured'],
                                 $row['KategorijaID'],
                                 $row['RestoranID']);
        $proizvodi[]=$proizvod;
       }
       return $proizvodi;

        }
        else
        {
            $proizvodi="";
            return $proizvodi;
        }
       

     }
}



