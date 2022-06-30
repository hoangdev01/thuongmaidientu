<?php
include_once("entity/E_User.php");
include_once("Database.php");
class User{
    public function __construct()
    {
        $this->link=Database::getLink();
    }
    public function getAll(){
        
    }
    public function show(){

    }
    public function create(){

    }
    public function update(){

    }
    public function delete(){

    }
}
?>