<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
session_start();
$CategoryID =$_POST["GroupProduct_ID"];
$ProductName = $_REQUEST["ProductName"];
$ProductPrice = $_REQUEST["ProductPrice"];
$ProductQuantity = $_REQUEST["ProductQuantity"];
$ProductSize = $_REQUEST["ProductSize"];
$ProductColor = $_REQUEST["ProductColor"];
$ProductDescription = $_REQUEST["ProductDescription"];
$Active = 1;
    $newProduct = new Product(
        0,
        $CategoryID,
        $ProductName,
        $ProductPrice,
        $ProductQuantity,
        $ProductSize,
        $ProductColor,
        $ProductDescription,
        $Active
    );
    createProduct($newProduct);
    header("Location: /Project_WebBanHang/Template-Views/Admin/Product/Index.php");
?>
