<?php
include_once("entity/E_Chat.php");
include_once("Database.php");
class Chat{
    public function __construct()
    {
        $this->link=Database::getLink();
    }
    public function getAll(){
        $sql = "select * from chat";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $chats=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $chats[$i++] = new E_Category(
                    $row['id'], 
                    $row['sendId'], 
                    $row['receiveId'],
                    $row['contend'],
                    $row['filePath']
                );
            }
        return $chats;
    }
    public function getListChatsPerson($userId){
        $sql = "select reveiceId from chat where sendId='$userId' or receiveId='$userId'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $chats=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $chats[$i++] = $row['reveiceId'];
            }
        return $chats;
    }
    public function show($sendId, $receiveId){
        $sql = "select * from chat where (sendId='$sendId' and receiveId='$receiveId') ";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $chats=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $chats[$i++] = new E_Category(
                    $row['id'], 
                    $row['sendId'], 
                    $row['receiveId'],
                    $row['contend'],
                    $row['filePath']
                );
            }
        return $chats;
    }
    public function create($sendId, $receiveId, $content, $filePath){
        $sql = "insert into chat(sendId, receiveId, content, filePath) values('$sendId', '$receiveId','$content','$filePath')";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function update($id, $content, $filePath){
        $sql = "update chat set content='$content', filePath='$filePath' where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function delete($id){
        $sql = "delete from chat where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
}
?>