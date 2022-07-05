<?php
session_start();

include_once("../model/User.php");

class UserController{
    public function getAllUser(){
        header('Content-type: application/json');
        $User=new User();
        $listUser = $User->getAll();
        return $listUser;
    }
    public function getUserFromAccountId($accountId){
        header('Content-type: application/json');
        if(!$accountId) {
            echo json_encode(array("success"=>false, "message"=>"User infomation not found")); 
            return;
        }
        $User=new User();
        $user = $User->showFromAccountId($accountId);
        if(!$user){
            echo json_encode(array("success"=>false, "message"=>"User does not exist")); 
            return;
        }
        echo json_encode(array("success"=>true, "user"=>$user)); 
        return;
    }
    public function updateUser($accountId, $newName, $newBirthday, $newAddress, $newAvatarPath){
        header('Content-type: application/json');
        if(!$accountId) {
            echo json_encode(array("success"=>false, "message"=>"User infomation not found")); 
            return;
        }
        $User=new User();
        $oldUser = $User->showFromAccountId($accountId);
        $listUser = $User->update(
            $accountId, 
            $newName?$newName:$oldUser->name, 
            $newBirthday?$newBirthday:$oldUser->birthday, 
            $newAddress?$newAddress:$oldUser->address, 
            $newAvatarPath?$newAvatarPath:$oldUser->avatarPath, 
        );
        echo json_encode(array("success"=>true, "message"=>"User updated successful")); 
    }
    public function getListCart(){

    }
    public function createCart(){
        
    }
    public function getListChat(){

    }
    public function createChat(){

    }
    public function updateChat(){

    }
}