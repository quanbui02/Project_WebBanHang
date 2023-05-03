<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
session_start();
$GroupName = $_REQUEST["CategoryName"];
if(trim($GroupName) == ""){
    $_SESSION["err_value"] = "Dien du thong tin du lieu";
    header("Location: /Project_WebBanHang/Template-Views/Admin/Category/editCategory.php");
}else{
    $updateGroup = new GroupProduct((int)$_SESSION["getInfoGroup"]->getGrID(),$GroupName,(int)$_SESSION["getInfoGroup"]->getAct());
    updateGroup($updateGroup);
    $_SESSION["err_value"] = "";
    header("Location: /Project_WebBanHang/Template-Views/Admin/Category/Index.php");   
}
?>