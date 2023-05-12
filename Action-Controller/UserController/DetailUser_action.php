<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/UserDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$ID = intval($_GET["id"]);
$conn = connectDb();
$sql =  "select * from user where userID = ".$ID;
$result = $conn->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $_SESSION["user"] = new User(
        $row["userID"],
        $row["userName"],
        $row["pass"],
        $row["position"],
        $row["fullName"],
        $row["birth"],
        $row["address"],
        $row["email"],
        $row["phone"],
        $row["active"]
    );
    header("Location: /Project_WebBanHang/Template-Views/Admin/User/DetailUser.php?id=$ID");
}
?>