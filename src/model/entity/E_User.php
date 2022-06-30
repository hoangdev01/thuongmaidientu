<?php
class E_User
{
    public $id;
    public $name;
    public $birthday;
    public $address;
    public $accountId;
    public $avatarPath;
    public function __construct($id, $name, $birthday, $address, $accountId, $avatarPath)
    {
        $this->id=$id;
        $this->name=$name;
        $this->birthday=$birthday;
        $this->address=$address;
        $this->accountId=$accountId;
        $this->avatarPath=$avatarPath;
    }
}