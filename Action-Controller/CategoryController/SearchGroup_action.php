<?php
session_start();
$searchGroup = $_REQUEST["search-group"];
$_SESSION["search-input"]=$searchGroup;
header("location: /Project_WebBanHang/Template-Views/Admin/Category/SearchCategory.php?tim-kiem=".$searchGroup);
?>