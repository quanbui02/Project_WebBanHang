<?php
session_start();
$searchGroup = $_REQUEST["search-group"];
if(trim($searchGroup) == "") {
    header("location: /Project_WebBanHang/Template-Views/Admin/Category/Index.php");
}
else {
    $_SESSION["search-input"]=$searchGroup;
    header("location: /Project_WebBanHang/Template-Views/Admin/Category/SearchCategory.php?tim-kiem=".$searchGroup);
}
?>