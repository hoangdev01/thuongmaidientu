<?php
include_once("Database.php");
include_once("entity/E_Bill.php");
class Bill{
    public function __construct()
    {
        $this->link=Database::getLink();
    }
    public function getAll(){
        $sql = "select * from bill";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $bills=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $bills[$i++] = new E_Bill(
                    $row['id'], 
                    $row['userId'], 
                    $row['price'], 
                    $row['date'], 
                    $row['status']);
            }
        return $bills;
    }
    public function show($id){
        $sql = "select * from bill where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $bill=null; 
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $bill = new E_Account(
                    $row['id'], 
                    $row['userId'], 
                    $row['price'], 
                    $row['date'], 
                    $row['status']);
            }
        return $bill;
    }
    public function create($userId, $price, $date, $status){
        $sql = "insert into bill(userId, price, date, status) values('$userId', '$price', '$date', '$status')";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function update($id, $userId, $price, $date, $status){
        $sql = "update bill set userId='$userId', price='$price', date='$date', status='$status' where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function delete($id){
        $sql = "delete from bill where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
}
?>