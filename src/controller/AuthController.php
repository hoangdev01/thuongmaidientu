<?php
session_start();

include_once("../model/Account.php");
class AuthController{
    public function login($username, $password){
        // header('Content-type: application/json');
        if(!$username||!$password) {
            echo json_encode(array("success"=>false, "message"=> "require username and password")); 
            return;
        }   
        $account = new Account();
        $loginAccount = $account->checkLogin($username, $password);
        if(!$loginAccount)
            echo json_encode(array("success"=>false, "message"=> "Invalid username or password")); 
            
        else {
            $_SESSION['user'] = $loginAccount;
            echo json_encode(array("success"=>true, "message"=>"Login successful")); 
        }
    }
    public function register($username, $password, $name, $birthday, $address){
        if(!$username||!$password) {
            echo json_encode(array("success"=>false, "message"=> "require username and password")); 
            return;
        }   
        $account = new Account();
        $checkAccount = $account->getAccountFromUsername($username);
        if($checkAccount)
            echo json_encode(array("success"=>false, "message"=> "Username already exist")); 
        else {
            
            echo json_encode(array("success"=>true, "message"=>"Login successful")); 
        }
    }
}