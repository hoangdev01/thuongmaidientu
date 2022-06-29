<?php
class E_Account
{
    public $id;
    public $username;
    public $password;
    public $role;
    public $active;
    public function __construct($id, $username, $password, $role, $active)
    {
        $this->id=$id;
        $this->username=$username;
        $this->password=$password;
        $this->role=$role;
        $this->active=$active;
    }
}
class Account{
    public function __construct() {
        $this->db_host        = 'mysql';
        $this->db_user        = 'homestead';
        $this->db_pass        = 'homestead';
        $this->db_database    = 'thuctap'; 
        $this->db_port        = '3306';
    }
    public function getAllAccount(){

    }
    public function getAccount($username, $password){
        $link = mysqli_connect($this->db_host,$this->db_user,$this->db_pass, $this->db_database, $this->db_port) or die ("Khong the ket noi den CSDL MYSQL");
        $sql = `select * from account where username = $username and password = $password`;
        $rs = mysqli_query($link, $sql);
        $account=null;
        if(is_resource($rs) && mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $id = $row['id']; 
                $username = $row['username'];
                $password = $row['password']; 
                $role = $row['role'];
                $active = $row['active'];
                $account = new E_Account($id, $username, $password,$active, $role);
            }
        return $account;
    }
}
?>