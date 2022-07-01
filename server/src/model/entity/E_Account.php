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