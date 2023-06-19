<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/UserDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$active = 0;
$ID = intval($_GET["id"]);

// $pageIndex = $_SESSION['PageIndex'];
try {
    $conn = connectDb();
    $sql = "UPDATE user SET active = $active WHERE userID = " . $ID;
    $result = $conn->query($sql);

    if ($result) {
        $_SESSION["success_message"] = "Người dùng đã được xóa thành công";
    } else {
        $_SESSION["error_message"] = "Lỗi: Không thể xóa người dùng";
    }
} catch (Exception $e) {
    $_SESSION["error_message"] = "Lỗi: " . $e->getMessage();
}

header("Location: /Project_WebBanHang/Template-Views/Admin/User/Index.php");
