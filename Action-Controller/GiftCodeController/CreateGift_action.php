<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GiftcodeDAO.php";
session_start();
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
$GiftContent = substr(str_shuffle($permitted_chars), 0, 10);
$GiftValue = $_REQUEST["GiftValue"];
$GiftQuantity = $_REQUEST["GiftQuantity"];
$active = 1;
if(empty($GiftValue) || $GiftQuantity == null) {
    header("Location: /Project_WebBanHang/Template-Views/Admin/GiftCode/CreateGift.php");   
}
else{
    $newGift = new GiftCode(0,$GiftContent,$GiftValue,$GiftQuantity,$active);
    createGift($newGift);
    header("Location: /Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php");   
}
?>