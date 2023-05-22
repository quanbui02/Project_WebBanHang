<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/UserDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$conn = connectDb();
$username = $_REQUEST["uname"];
$password = $_REQUEST["psw"];

$sqlLogin  = "select * from user where userName = '".$username."' and pass = '".$password."'";
$result=$conn->query($sqlLogin);
if($result->num_rows>0){
    $_SESSION["login-err"] = null;
    $row = $result->fetch_assoc();
    $_SESSION["login"]=false;
    $user=new User($row["userID"],$row["userName"],$row["pass"],$row["position"],$row["fullName"],$row["birth"],$row["address"],$row["email"],$row["phone"],$row["active"]);
    $_SESSION["user-infor"]= $user;
    if($row["position"] == "Admin" && $row["active"] == 1){
        $_SESSION["login"]=true;
        header("Location: /Project_WebBanHang/Template-Views/Admin/Index.php");
    }
    else{
        $_SESSION["login-err"] = "Tên người dùng không tồn tại !";
        header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
    }
}
else{
    $_SESSION["login-err"] = "Sai tên đăng nhập hoặc mật khẩu !";
    header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
}
$conn->close();
?>