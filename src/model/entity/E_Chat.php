<?php

class E_Chat
{
    public $id;
    public $sendId;
    public $reveiceId;
    public $content;
    public $filePath;
    public function __construct($id, $sendId, $reveiceId, $content, $filePath)
    {
        $this->id=$id;
        $this->sendId=$sendId;
        $this->reveiceId=$reveiceId;
        $this->content=$content;
        $this->filePath=$filePath;
    }
}