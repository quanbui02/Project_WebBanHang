<?php
session_start();
$_SESSION["login"]=false;
$_SESSION["user-infor"]=null;
unset($_SESSION["login"],$_SESSION["user-infor"]);
header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
?>