<?php
session_start();
$searchProduct = $_REQUEST["search-product"];
$_SESSION["search-product"]=$searchProduct;
header("location: /Project_WebBanHang/Template-Views/Admin/Product/SearchProduct.php?tim-kiem=".$searchProduct);
?>