<?php
include_once("../controller/ProductController.php");
class routerProduct{
    public function invoke(){
        $productController=new ProductController();
        if(isset($_GET['create']))
        {
            $productController->createProduct(
                isset($_POST["name"])?$_POST["name"]:"",
                isset($_POST["description"])?$_POST["description"]:"",
                isset($_POST["categoryId"])?$_POST["categoryId"]:"",
                isset($_POST["price"])?$_POST["price"]:"",
                isset($_POST["userId"])?$_POST["userId"]:"",
                isset($_POST["imagePath"])?$_POST["imagePath"]:"");
        }
        else if(isset($_GET['update'])){
            $productController->updateProduct(
                isset($_POST["id"])?$_POST["id"]:"",
                isset($_POST["name"])?$_POST["name"]:"",
                isset($_POST["description"])?$_POST["description"]:"",
                isset($_POST["categoryId"])?$_POST["categoryId"]:"",
                isset($_POST["price"])?$_POST["price"]:"",
                isset($_POST["userId"])?$_POST["userId"]:"",
                isset($_POST["imagePath"])?$_POST["imagePath"]:"");
        }
        else if(isset($_GET['delete'])){
            $productController->deleteProduct(isset($_POST["id"])?$_POST["id"]:"");
        }
        else{
            $productController->getListProduct();
        }
    }
}
$routerProduct = new routerProduct();
$routerProduct->invoke();