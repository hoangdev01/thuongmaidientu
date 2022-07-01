<?php
include_once("entity/E_Cart.php");
include_once("Database.php");
class Cart{
    public function __construct()
    {
        $this->link=Database::getLink();
    }
    public function getAll(){
        $sql = "select * from cart";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $carts=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $carts[$i++] = new E_Cart(
                    $row['id'], 
                    $row['userId'], 
                    $row['productId'], 
                    $row['amount']);
            }
        return $carts;
    }
    public function getAllFromUser($userId){
        $sql = "select * from cart where userId='$userId'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $carts=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $carts[$i++] = new E_Cart(
                    $row['id'], 
                    $row['userId'], 
                    $row['productId'], 
                    $row['amount']);
            }
        return $carts;
    }
    public function show(){

    }
    public function create($userId, $productId, $amount) {
        $sql = "insert into cart(userId, productId, amount) values('$userId', '$productId', '$amount')";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function update($id, $amount){
        $sql = "update bill set amount='$amount' where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function delete($id){
        $sql = "delete from cart where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
}
?>