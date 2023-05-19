<?php
session_start();
$_SESSION["login"]=false;
$_SESSION["user-infor"]=null;
header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
?>