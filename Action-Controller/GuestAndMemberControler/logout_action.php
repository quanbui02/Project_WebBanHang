<?php
session_start();
$_SESSION["login"]=false;
$_SESSION["user-infor"]=null;
// header("Location: /DoAnCNW/Template-View/trangchu.php?search=");
header("Location: /Project_WebBanHang/Template-View/trangchu.php?search=");
?>