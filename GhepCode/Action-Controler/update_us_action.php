<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/function_handle_sql.php";
session_start();
$fullname  = $_REQUEST["full-name"];
$birth = $_REQUEST["birth"];
$address = $_REQUEST["address"];
$email = $_REQUEST["email"];
$phone = $_REQUEST["phone"];
$username  = $_REQUEST["user-name"];
$password  = $_REQUEST["password"];
if(strlen($password)<8 || strlen(trim($username))<=0){
    header("Location: /Project_WebBanHang/GhepCode/Template-View/user_infor.php");
    $_SESSION["error-pass"]="Độ dài mật khẩu cần ít nhất 8 ký tự !";
}
else{
    $updateUser = new User((int)$_SESSION["user-infor"]->getUserID(),$username,$password,$_SESSION["user-infor"]->getPos(),$fullname,$birth,$address,$email,$phone,(int)$_SESSION["user-infor"]->getAct());
    $_SESSION["user-infor"] = $updateUser;
    updateUser($updateUser);
    $_SESSION["error-pass"]=null;
    header("Location: /Project_WebBanHang/GhepCode/Template-View/user_infor.php");
}
?>