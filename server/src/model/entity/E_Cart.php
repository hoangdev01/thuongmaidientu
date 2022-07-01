<?php

class E_Cart
{
    public $id;
    public $userId;
    public $productId;
    public $amount;
    public function __construct($id, $userId, $productId, $amount)
    {
        $this->id=$id;
        $this->userId=$userId;
        $this->productId=$productId;
        $this->amount=$amount;
    }
}