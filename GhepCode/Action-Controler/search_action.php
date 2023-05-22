<?php
session_start();
$_SESSION["group-mode"] = false;
$searchQS = $_REQUEST["search-product"];
$_SESSION["search-input"]=$searchQS;
header("Location: /Project_WebBanHang/GhepCode/Template-View/trangchu.php?search=".$searchQS);
?>