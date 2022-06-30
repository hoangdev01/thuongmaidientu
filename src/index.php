<?php
include("./model/Account.php");
session_start();
if(isset($_SESSION["user"])) echo $_SESSION["user"]->username;
?>

<form action="./router/auth.php?login" method="post">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit" name="submit" id="submit">
</form>