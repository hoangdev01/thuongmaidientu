<?php
include_once("../model/Account.php");
class AuthController{
    public function login($username, $password){
        header('Content-type: application/json');
        if(!$username||!$password) {
            echo json_encode(array("success"=>false, "message"=> "Invalid username or password")); 
            return;
        }   
        $account = new Account();
        echo json_encode(array("account"=>$account->getAccount($username, $password)));
        // if(!$account->getAccount($username, $password))
        // echo json_encode(array("success"=>false, "message"=> "Ok")); 
        // else echo json_encode(array("success"=>true, "message"=> "Login successful"));
        // echo json_encode(array("success"=>true, "message"=> "Login successful"));
    }
}