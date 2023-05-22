<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GiftcodeDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$giftID = intval($_GET["id"]);
$conn = connectDb();
$sql =  "select * from giftcode where giftID = ".$giftID;
$result = $conn->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $_SESSION["infoGift"] = new GiftCode($row["giftID"],$row["giftContent"],$row["giftValue"],$row["quantity"],$row["active"]);
    $conn->close();
    header("Location: /Project_WebBanHang/Template-Views/Admin/GiftCode/EditGift.php?id=$giftID");
}
?>