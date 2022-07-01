<?php

class E_Product
{
    public $id;
    public $name;
    public $description;
    public $categoryId;
    public $price;
    public $userId;
    public $imagePath;
    public function __construct($id, $name, $description, $categoryId, $price, $userId, $imagePath)
    {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->categoryId=$categoryId;
        $this->price=$price;
        $this->userId=$userId;
        $this->imagePath=$imagePath;
    }
}