<?php
session_start();
$searchOrder = $_REQUEST["search-order"];
if(trim($searchOrder) == "") {
    header("location: /Project_WebBanHang/Template-Views/Admin/Order/index.php");
}
else {
    $_SESSION["search-order"]=$searchOrder;
    header("location: /Project_WebBanHang/Template-Views/Admin/Order/SearchOrder.php?tim-kiem=".$searchOrder);
}
?>