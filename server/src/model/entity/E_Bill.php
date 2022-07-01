<?php

class E_Bill
{
    public $id;
    public $userId;
    public $price;
    public $date;
    public $status;
    public function __construct($id, $userId, $price, $date, $status)
    {
        $this->id=$id;
        $this->userId=$userId;
        $this->price=$price;
        $this->date=$date;
        $this->status=$status;
    }
}