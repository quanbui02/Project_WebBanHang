<?php
session_start();
$_SESSION["login"]=false;
$_SESSION["user-infor"]=null;
header("Location: /Project_WebBanHang/GhepCode/Template-View/trangchu.php?search=");
?>