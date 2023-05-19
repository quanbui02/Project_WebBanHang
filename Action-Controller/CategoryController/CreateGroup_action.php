<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
session_start();
    $GroupName = $_REQUEST["CategoryName"];
    $Active = 1;
    if(trim($GroupName) == ""){
        $_SESSION["err_value"] = "Dien du thong tin du lieu";
        header("Location: /Project_WebBanHang/Template-Views/Admin/Category/CreateCategory.php");
    }else{
        $newGroup = new GroupProduct(0,$GroupName,$Active);
        createGroup($newGroup);
        $_SESSION["err_value"] = "";
        header("Location: /Project_WebBanHang/Template-Views/Admin/Category/Index.php");   
    }
?>