<?php 
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$active = 0;
$prID = intval($_GET["id"]);
// $pageIndex = $_SESSION['PageIndex'];
$conn = connectDb();
$sql = "UPDATE product SET active = $active where proID = ".$prID;
$result = $conn->query($sql);
$conn->close();
$_SESSION["err_value"] = "";
// header("Location: /Project_WebBanHang/Template-Views/Admin/Category/Index.php?page=$pageIndex");
header("Location: /Project_WebBanHang/Template-Views/Admin/Product/Index.php");
?>
