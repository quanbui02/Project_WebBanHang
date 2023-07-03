<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/function_handle_sql.php";
session_start();
$prID = intval($_GET["id_product"]);
$conn = new mysqli("127.0.0.1", "root", "","csdldoan");
$sql =  "select * from product where proID = ".$prID;
$result = $conn->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $_SESSION["product"] = new Product($row["proID"],$row["proName"],$row["grID"],$row["price"],$row["quantity"],$row["size"],$row["color"],$row["description"],$row["active"],$row["image"]);
    $_SESSION["feedback"] = getListFB($prID);
    header("Location: /Project_WebBanHang/GhepCode/Template-View/product_infor.php");
}else{
    $_SESSION["product"]=null;
    $_SESSION["feedback"]=null;
    header("Location: /Project_WebBanHang/GhepCode/Template-View/trangchu.php?search=");
}
?>