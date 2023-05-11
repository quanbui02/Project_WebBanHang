<?php
session_start();
$searchUser =$_REQUEST["search-user"];
$_SESSION["search-userName"]=$searchUser;
header("location: /Project_WebBanHang/Template-Views/Admin/User/SearchUser.php?tim-kiem=".$searchUser);
?>