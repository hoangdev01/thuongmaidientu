<?php
session_start();

include_once("../model/Account.php");
include_once("../model/User.php");
class AuthController{
    public function login($username, $password){
        header('Content-type: application/json');
        if(!$username||!$password) {
            echo json_encode(array("success"=>false, "message"=> "require username and password")); 
            return;
        }   
        $Account = new Account();
        $loginAccount = $Account->checkLogin($username, $password);
        if(!$loginAccount)
            echo json_encode(array("success"=>false, "message"=> "Invalid username or password")); 
            
        else {
            $_SESSION['user'] = $loginAccount;
            echo json_encode(array("success"=>true, "user"=>$loginAccount, "message"=>"Login successful")); 
        }
    }
    public function register($username, $password, $name, $birthday, $address, $avatarPath){
        header('Content-type: application/json');
        if(!$username||!$password) {
            echo json_encode(array("success"=>false, "message"=> "require username and password")); 
            return;
        }   
        if(!$name){
            echo json_encode(array("success"=>false, "message"=> "require display name")); 
            return;
        }
        $Account = new Account();
        $checkAccount = $Account->getAccountFromUsername($username);
        if($checkAccount)
            echo json_encode(array("success"=>false, "message"=> "Username already exist")); 
        else {
            $Account->create($username, $password);
            $Account = new Account();
            $checkAccount = $Account->getAccountFromUsername($username);
            $User = new User();
            $User->create($name, $birthday, $address, $checkAccount->id, $avatarPath);
            $_SESSION['user'] = $checkAccount;
            echo json_encode(array("success"=>true, "message"=>"register successful")); 
        }
    }
    public function logout(){
        header('Content-type: application/json');  
        if(isset($_SESSION["user"])){
            $_SESSION["user"]=null;           
            echo json_encode(array("success"=>true, "message"=> "Logout successful")); 
        }
    }
    public function checklogin(){
        header('Content-type: application/json');  
        if(isset($_SESSION["user"]))
            echo json_encode(array("success"=>true, "logged" => true, "user"=>$_SESSION["user"])); 
        else 
            echo json_encode(array("success"=>false, "logged"=> false)); 
    }
}