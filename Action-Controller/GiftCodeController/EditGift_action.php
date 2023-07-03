<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GiftcodeDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";

session_start();
$conn = connectDb();
$GiftID = intval($_GET["active"]);
$ID = intval($_GET["id"]);

echo $_SESSION["infoGift"];

if($GiftID != null) {
    $Active = 1;
    $sql = "UPDATE giftcode set active = $Active where giftID = $GiftID";
    $result = $conn->query($sql);
    $conn->close();
    header("Location: /Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php");
}
else {
    $GiftValue = $_POST["GiftValue"];
    $GiftQuantity = $_POST["GiftQuantity"];
    if(empty($GiftValue) || $GiftQuantity == null) {
        header("Location: /Project_WebBanHang/Template-Views/Admin/GiftCode/EditGift.php?id=".$_SESSION["infoGift"]->getGiftID());   
    }else{
            // $updateGift = new GiftCode($ID ,$_SESSION["infoGift"]->getGiftContent(),$GiftValue,$GiftQuantity,$_SESSION["infoGift"]->getGiftActive());
            updateGiftCode($ID,$GiftValue,$GiftQuantity);
            header("Location: /Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php");      
        }
}
?>