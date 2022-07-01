<?php
class Database{
    public function __construct() {
        $this->db_host        = 'mysql';
        $this->db_user        = 'homestead';
        $this->db_pass        = 'homestead';
        $this->db_database    = 'thuctap'; 
        $this->db_port        = '3306';
    }
    public static function getLink(){
        $link = mysqli_connect('mysql','homestead','homestead','thuctap', '3306') or die ("Khong the ket noi den CSDL MYSQL");
        return $link;
    }
}