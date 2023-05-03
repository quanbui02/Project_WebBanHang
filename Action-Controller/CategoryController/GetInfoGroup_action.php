<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
session_start();
$grID = intval($_GET["id"]);
$conn = new mysqli("127.0.0.1", "root", "","csdldoan");
$sql =  "select * from group_product where grID = ".$grID;
$result = $conn->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $_SESSION["getInfoGroup"] = new GroupProduct($row["grID"],$row["grName"],$row["active"]);
    header("Location: /Project_WebBanHang/Template-Views/Admin/Category/editCategory.php?id=$grID");
}
?>