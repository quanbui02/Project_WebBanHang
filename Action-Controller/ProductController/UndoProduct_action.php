<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$active = 1;
$ID = intval($_GET["id"]);
$conn = connectDb();
$sql = "UPDATE product SET active = $active where proID = ".$ID;
$result = $conn->query($sql);
$_SESSION["err_value"] = "";
header("Location: /Project_WebBanHang/Template-Views/Admin/Product/Index.php");
?>