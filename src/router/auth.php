<?php
include_once("../controller/AuthController.php");
class auth{
    public function invoke(){
        $authController=new AuthController();
        if(isset($_GET['login']))
        {
            $authController->login($_POST["username"], $_POST["password"]);
        }
        else{
            // echo "hello";
        }
        
    }
}
$auth = new auth();
$auth->invoke();