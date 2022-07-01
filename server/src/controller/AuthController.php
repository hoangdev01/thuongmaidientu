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
            echo json_encode(array("success"=>true, "message"=>"Login successful")); 
        }
    }
    public function register($username, $password, $name, $birthday, $address, $avatarPath){
        header('Content-type: application/json');
        if(!$username||!$password) {
            echo json_encode(array("success"=>false, "message"=> "require username and password")); 
            return;
        }   
        $Account = new Account();
        $User = new User();
        $checkAccount = $Account->getAccountFromUsername($username);
        if($checkAccount)
            echo json_encode(array("success"=>false, "message"=> "Username already exist")); 
        else {
            $Account->create($username, $password);
            $account=$Account->getAccountFromUsername($username);
            $User->create($name||"", $birthday||"", $address||"", $account->id, $avatarPath||"");
            echo json_encode(array("success"=>true, "message"=>"register successful")); 
        }
    }
}