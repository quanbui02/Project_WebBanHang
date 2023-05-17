<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GiftcodeDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$conn = connectDb();
$active = 0;
$giftID = intval($_GET["id"]);
$sql = "UPDATE giftcode SET active = $active where giftID = ".$giftID;
$result = $conn->query($sql);
$conn->close();
header("Location: /Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php");
?>