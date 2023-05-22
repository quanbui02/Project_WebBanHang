<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/function_handle_sql.php";
session_start();
$userName = $_REQUEST["user-name"];
$phone = $_REQUEST["phone"];
$pass = $_REQUEST["pass"];
if(strlen($userName) <=0 || strlen($phone)<=0 || strlen($phone)>10  || strlen($pass) <= 7){
    $_SESSION["signup-err"] = "Hãy nhập thông tin phù hợp(mật khẩu ít nhất 8 ký tự)";
    header("Location: /Project_WebBanHang/GhepCode/Template-View/signup.php");
}else{
    $newUser = new User(0,$userName,$pass,'Thành viên','','','','',$phone,1);
    insertUser($newUser);
    header("Location: /Project_WebBanHang/GhepCode/Template-View/login.php");   
}
?>