<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/connect.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Class-Model/class.php";
session_start();
$_SESSION["group-mode"] = false;
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$sqlLogin  = "select * from user where userName = '".$username."' and pass = '".$password."'";
$result=$conn->query($sqlLogin);
if($result->num_rows>0){
    $_SESSION["login-err"] = null;
    $row = $result->fetch_assoc();
    $_SESSION["login"]=true;
    $user=new User($row["userID"],$row["userName"],$row["pass"],$row["position"],$row["fullName"],$row["birth"],$row["address"],$row["email"],$row["phone"],$row["active"]);
    $_SESSION["user-infor"]= $user;
    if($row["position"] == "Thành viên" && $row["active"] == 1){
        header("Location: /Project_WebBanHang/GhepCode/Template-View/trangchu.php?search=");
    }else{
        header("Location: /Project_WebBanHang/GhepCode/Template-View/login.php");
    }
}else{
    $_SESSION["login-err"] = "Sai tên đăng nhập hoặc mật khẩu !";
    header("Location: /Project_WebBanHang/GhepCode/Template-View/login.php");
}
$conn->close();
?>