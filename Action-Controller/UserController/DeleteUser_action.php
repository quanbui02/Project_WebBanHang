<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/UserDAO.php";
session_start();
$active = 0;
$ID = intval($_GET["id"]);
// $pageIndex = $_SESSION['PageIndex'];
$conn = new mysqli("127.0.0.1", "root", "","csdldoan");
$sql = "UPDATE user SET active = $active where userID = ".$ID;
$result = $conn->query($sql);
$_SESSION["err_value"] = "";
header("Location: /Project_WebBanHang/Template-Views/Admin/User/Index.php");
?>