<?php
class Product
{
    public $id;
    public $userId;
    public $price;
    public $date;
    public $accountId;
    public $status;
    public function __construct($id, $userId, $price, $date, $accountId, $status)
    {
        $this->id=$id;
        $this->userId=$userId;
        $this->price=$price;
        $this->date=$date;
        $this->accountId=$accountId;
        $this->status=$status;
    }
}
?>