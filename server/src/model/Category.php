<?php
include_once("entity/E_Category.php");
include_once("Database.php");
class Category{
    public function __construct()
    {
        $this->link=Database::getLink();
    }
    public function getAll(){
        $sql = "select * from category";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $categories=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $categories[$i++] = new E_Category(
                    $row['id'], 
                    $row['name'], 
                    $row['description']
                );
            }
        return $categories;
    }
    public function show($id){
        $sql = "select * from category where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        $category=null;        
        $i=0;
        if(mysqli_num_rows($rs) > 0)
            while($row = mysqli_fetch_array($rs)){
                $category = new E_Category(
                    $row['id'], 
                    $row['name'], 
                    $row['description']
                );
            }
        return $category;
    }
    public function create($name, $description){
        $sql = "insert into category(name, description) values('$name', '$description')";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function update($id, $name, $description){
        $sql = "update category set name='$name', description='$description' where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
    public function delete($id){
        $sql = "delete from category where id='$id'";
        $rs = mysqli_query($this->link, $sql) or die(mysqli_error($this->link));;
        mysqli_close($this->link);
    }
}
?>