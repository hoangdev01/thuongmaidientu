<?php
include_once("entity/E_BillDetail.php");
include_once("Database.php");
class BillDetail{
    public function __construct()
    {
        $this->link=Database::getLink();
    }
    public function getAll(){
        $sql = "select * from bill_detail";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $billDetails=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $billDetails[$i++] = new E_BillDetails(
                    $row['id'], 
                    $row['billId'], 
                    $row['productId'], 
                    $row['amount']);
            }
        return $billDetails;
    }
    public function showFromBillId($billId){
        $sql = "select * from bill_detail where billId='$billId'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $billDetails=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $billDetails[$i++] = new E_BillDetails(
                    $row['id'], 
                    $row['billId'], 
                    $row['productId'], 
                    $row['amount']);
            }
        return $billDetails;
    }
    public function create($billId, $productId, $amount) {
        $sql = "insert into bill_detail(billId, productId, amount) values('$billId', '$productId', '$amount')";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function update($id, $amount){
        $sql = "update bill_detail set amount='$amount' where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function delete($id){
        $sql = "delete from bill_detail where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
}
?>