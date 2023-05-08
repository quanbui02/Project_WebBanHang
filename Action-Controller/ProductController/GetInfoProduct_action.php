<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
session_start();
$ID = intval($_GET["id"]);
$conn = new mysqli("127.0.0.1", "root", "","csdldoan");
$sql =  "select * from product where proID = ".$ID;
$result = $conn->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $_SESSION["InfoProduct"] = new Product($row["proID"],$row["grID"],$row["proName"],$row["price"],$row["quantity"],$row["size"],$row["color"],$row["description"],$row["active"],$row["image"]);
    header("Location: /Project_WebBanHang/Template-Views/Admin/Product/EditProduct.php?id=$ID");
}
?>