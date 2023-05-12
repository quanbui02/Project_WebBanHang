<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$active = 0;
$grID = intval($_GET["id"]);
$pageIndex = $_SESSION['PageIndex'];
$conn = connectDb();
$sql = "UPDATE group_product SET active = $active where grID = ".$grID;
$result = $conn->query($sql);
$_SESSION["err_value"] = "";
header("Location: /Project_WebBanHang/Template-Views/Admin/Category/Index.php?page=$pageIndex");
?>