<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
session_start();
$CategoryID =$_POST["GroupProduct_ID"];
$ProductName = $_POST["ProductName"];
$ProductPrice = $_POST["ProductPrice"];
$ProductQuantity = $_POST["ProductQuantity"];
$ProductSize = $_POST["ProductSize"];
$ProductColor = $_POST["ProductColor"];
$ProductDescription = $_POST["ProductDescription"];
$Active = 1;
$fileNameImg = $_FILES['ProductImage']['name'];
$file = $_FILES['ProductImage']['tmp_name'];
$path = "C:/xampp/htdocs/Project_WebBanHang/Upload/img".$fileNameImg;
if(move_uploaded_file($file,$path)) {
    $newProduct = new Product(
        0,
        $CategoryID,
        $ProductName,
        $ProductPrice,
        $ProductQuantity,
        $ProductSize,
        $ProductColor,
        $ProductDescription,
        $Active,
        $fileNameImg
    );
    createProduct($newProduct);
    header("Location: /Project_WebBanHang/Template-Views/Admin/Product/Index.php");
}
else {
    echo "Tải tập tin thất bại";
    header("Location: /Project_WebBanHang/Template-Views/Admin/Product/CreateProduce.php");
}
?>
