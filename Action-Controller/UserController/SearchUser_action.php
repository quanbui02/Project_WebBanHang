<?php
session_start();
$searchGroup = $_REQUEST["search-user"];
$_SESSION["search-userName"]=$searchGroup;
header("location: /Project_WebBanHang/Template-Views/Admin/User/SearchUser.php?tim-kiem=".$searchGroup);
?>