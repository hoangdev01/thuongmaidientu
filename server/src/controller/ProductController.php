<?php
session_start();
include_once("../model/Product.php");
include_once("../model/Category.php");
include_once("../model/User.php");
class ProductController{
    public function getListProduct(){
        header('Content-type: application/json');
        $Product=new Product();
        $listProduct = $Product->getAll();
        echo json_encode(array("success"=>true, "listProduct" => $listProduct)); 
    }
    public function getProduct($id){
        header('Content-type: application/json');
        if(!$id){
            echo json_encode(array("success"=>false, "message"=> "Product id not found")); 
        }
        else{
            $Product = new Product();
            $product = $Product->show($id);
            echo json_encode(array("success"=> true, "product"=>$product));
        }
    }
    public function getListProductFromCategory($categoryId){
        header('Content-type: application/json');  
        if(!$categoryId){
            echo json_encode(array("success"=>false, "message"=> "Category id not found")); 
        }
        else {
            $Category=new Category();
            $category = $Category->show($categoryId);
            if(!$category){
                echo json_encode(array("success"=>false, "message"=> "Category does not exist")); 
            }
            else{
                $Product = new Product();
                $listProduct = $Product->showFromCategory($categoryId);
                echo json_encode(array("success"=> true, "listProduct"=>$listProduct));
            }
        }
    }
    public function createProduct($name, $description, $categoryId, $price, $userId, $imagePath){
        if(!$name){
            echo json_encode(array("success"=>false, "message"=> "Product require name")); 
            return;
        }
        if(!$categoryId || !(new Category)->show($categoryId)){
            echo json_encode(array("success"=>false, "message"=> "Product require category"));
            return; 
        }
        if(!$userId || !(new User())->show($userId)){
            echo json_encode(array("success"=>false, "message"=> "You must login")); 
            return;
        }
        $Product = new Product();
        $Product->create($name, $description, $categoryId, $price, $userId, $imagePath);
        echo json_encode(array("success"=>true, "message"=> "Product is created successful")); 
    }
    public function updateProduct($id, $name, $description, $categoryId, $price, $userId, $imagePath){
        $Product = new Product();
        $oldProduct = $Product->show($id);
        $Product->update($id, 
            ($name)? $name: $oldProduct->name, 
            ($description)? $description: $oldProduct->description, 
            ($categoryId)? $categoryId: $oldProduct->categoryId, 
            ($price)? $price: $oldProduct->price, 
            ($userId)? $userId: $oldProduct->userId, 
            ($imagePath)? $imagePath: $oldProduct->imagePath);
        echo json_encode(array("success"=>true, "message"=> "Product is updated successful")); 
    }
    public function deleteProduct($id){
        $Product = new Product();
        $Product->delete($id);
        echo json_encode(array("success"=>true, "message"=> "Product is deleted successful")); 
    }
}