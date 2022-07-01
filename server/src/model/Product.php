<?php
include_once("entity/E_Product.php");
include_once("Database.php");
class Product{
    public function __construct()
    {
        $this->link=Database::getLink();
    }
    public function getAll(){
        $sql = "select * from product";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $products=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $products[$i++] = new E_Product(
                    $row['id'], 
                    $row['name'], 
                    $row['description'],
                    $row['categoryId'],
                    $row['price'],
                    $row['userId'],
                    $row['imagePath']
                );
            }
        return $products;
        
    }
    public function show($id){
        $sql = "select * from product where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $product=null;  
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $product = new E_Product(
                    $row['id'], 
                    $row['name'], 
                    $row['description'],
                    $row['categoryId'],
                    $row['price'],
                    $row['userId'],
                    $row['imagePath']
                );
            }
        return $product;
    }
    public function showFromCategory($categoryId){
        $sql = "select * from product where categoryId='$categoryId'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $products=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $products[$i++] = new E_Product(
                    $row['id'], 
                    $row['name'], 
                    $row['description'],
                    $row['categoryId'],
                    $row['price'],
                    $row['userId'],
                    $row['imagePath']
                );
            }
        return $products;
   }
    public function create($name, $description, $categoryId, $price, $userId, $imagePath){
        $sql = "insert into product(name, description, categoryId, price, userId, imagePath) 
                values('$name', '$description','$categoryId','$price','$userId','$imagePath')";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function update($id, $name, $description, $categoryId, $price, $userId, $imagePath) {
        $sql = "update product set name='$name', description='$description', categoryId='$categoryId', price='$price', userId='$userId', imagePath='$imagePath'  where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function delete($id){
        $sql = "delete from product where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
}
?>