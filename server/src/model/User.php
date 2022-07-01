<?php
include_once("entity/E_User.php");
include_once("Database.php");
class User{
    public function __construct()
    {
        $this->link=Database::getLink();
    }
    public function getAll(){
        $sql = "select * from user";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $users=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $users[$i++] = new E_User(
                    $row['id'], 
                    $row['name'], 
                    $row['birthday'], 
                    $row['address'], 
                    $row['accountId'], 
                    $row['avatarPath']);
            }
        return $users;
    }
    public function show($id){
        $sql = "select * from user where id = '$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $user=null;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $user = new E_User(
                    $row['id'], 
                    $row['name'], 
                    $row['birthday'], 
                    $row['address'], 
                    $row['accountId'], 
                    $row['avatarPath']
                );
            }
        return $user;
    }
    public function showFromAccountId($accountId){
        $sql = "select * from user where accountId = '$accountId'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $user=null;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $user = new E_User(
                    $row['id'], 
                    $row['name'], 
                    $row['birthday'], 
                    $row['address'], 
                    $row['accountId'], 
                    $row['avatarPath']
                );
            }
        return $user;
    }
    public function create($name, $birthday, $address, $accountId, $avatarPath){
        $sql = "insert into user(name, birthday, address, accountId, avatarPath) values('$name','$birthday','$address','$accountId', '$avatarPath')";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));
        mysqli_close($this->link);
    }
    public function update($accountId, $newName, $newBirthday, $newAddress, $newAccountId, $newAvatarPath){
        $sql = "update user 
                set 
                    name='$newName', 
                    birthday='$newBirthday', 
                    address='$newAddress', 
                    avatarPath='$newAvatarPath') 
                where accountId='$accountId'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
}
?>