<?php
include_once("../controller/AuthController.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET,HEAD,OPTIONS,POST,PUT");

class routerAuth{
    public function invoke(){
        $authController=new AuthController();
        if(isset($_GET['login']))
        {
            $authController->login(isset($_POST["username"])?$_POST["username"]:"",isset($_POST["password"])?$_POST["password"]:"");
        }
        else if(isset($_GET['register'])){
            $authController->register(
                isset($_POST["username"])?$_POST["username"]:"",
                isset($_POST["password"])?$_POST["password"]:"",
                isset($_POST["name"])?$_POST["name"]:"",
                isset($_POST["birthday"])?$_POST["birthday"]:"",
                isset($_POST["address"])?$_POST["address"]:"",
                isset($_POST["avataPath"])?$_POST["avataPath"]:"");
        }
        else if(isset($_GET['logout'])){
            $authController->logout();
        }
        else if(isset($_GET['checklogin'])){
            $authController->checklogin();
        }
    }
}
$routerAuth = new routerAuth();
$routerAuth->invoke();