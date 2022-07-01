<?php
include("Database.php");
include_once("entity/E_Account.php");
class Account{

    public function __construct(){
        $this->link = Database::getLink();
    }
    public function getAll(){
        $sql = "select * from account";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $accounts=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $accounts[$i++] = new E_Account(
                    $row['id'], 
                    $row['username'], 
                    $row['password'], 
                    $row['role'], 
                    $row['active']);
            }
        return $accounts;
    }
    public function checkLogin($username, $password){
        $sql = "select * from account where username = '$username' and password = '$password'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $account=null;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $account = new E_Account($row['id'], $row['username'], $row['password'], $row['role'], $row['active']);
            }
        return $account;
    }
    public function getAccountFromUsername($username){
        $sql = "select * from account where username = '$username'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $account=null;
        if($rs && mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $account = new E_Account($row['id'], $row['username'], $row['password'], $row['role'], $row['active']);
            }
        return $account;
    }
    public function create($username, $password){
        $sql = "insert into account(username, password, role, active) values('$username','$password','admin',true)";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function updatePassword($username, $password){
        $sql = "update account set password='$password' where username='$username'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function updateRole($username, $password, $role){
        $sql = "update account set role='$role' where username='$username' and password='$password'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function delete($username){
        $sql = "delete from account username='$username'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
}
?>