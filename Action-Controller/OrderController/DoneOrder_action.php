<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";

session_start();
$orderID = intval($_GET["id"]);
$conn = connectDb();
$sql = "UPDATE `order` SET `status` = 'DONE' WHERE `orderID` = ".$orderID;
$result = $conn->query($sql);
$conn->close();
$_SESSION["err_value"] = "";
header("Location: /Project_WebBanHang/Template-Views/Admin/Order/index.php");
?>
