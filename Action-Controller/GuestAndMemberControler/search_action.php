<?php
session_start();
$_SESSION["group-mode"] = false;
$searchQS = $_REQUEST["search-product"];
$_SESSION["search-input"]=$searchQS;
// header("Location: /DoAnCNW/Template-View/trangchu.php?search=".$searchQS);
header("Location: /Project_WebBanHang/Template-View/trangchu.php?search=".$searchQS);
?>