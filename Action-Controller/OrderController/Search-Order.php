<?php
session_start();
$searchOrder = $_REQUEST["search-order"];
$_SESSION["search-order"]=$searchOrder;

header("location: /Project_WebBanHang/Template-Views/Admin/Order/SearchOrder.php?tim-kiem=".$searchOrder);
?>