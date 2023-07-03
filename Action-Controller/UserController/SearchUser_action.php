<?php
session_start();
$searchUser =$_REQUEST["search-user"];
if(trim($searchUser) == "") {
    header("location: /Project_WebBanHang/Template-Views/Admin/User/Index.php");
}
else {
    $_SESSION["search-userName"]=$searchUser;
    header("location: /Project_WebBanHang/Template-Views/Admin/User/SearchUser.php?tim-kiem=".$searchUser);
}
?>