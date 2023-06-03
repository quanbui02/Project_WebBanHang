<?php 
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/function_handle_sql.php";
session_start();
$conn = new mysqli("127.0.0.1", "root", "","csdldoan");
$proID  = $_GET["id_product"];
$number = $_GET["number"];
$detailID = $_GET["id_detail"];
$orderID = $_GET["order_id"];
    try{
        //Update so luong cua chi tiet hoa don
        $newNumber = $number - 1;
        if($newNumber<=0){
            header("Location: /Project_WebBanHang/GhepCode/Action-Controler/destroy_order_detail.php?id_product=".$proID."&id_detail=".$detailID."&number=".$number."&order_id=".$orderID);
        }else{
        $sqlUpdateDetail = "update `order_detail` set `number` = ".$newNumber." where detailID= ".$detailID ."";
        $conn->query($sqlUpdateDetail);
        //Update so luong san pham
        $product  = getProductByID($proID);
        $newQuantity = $product->getQuantity() + 1;
        $sqlUpdatePro  = "update `product` set `quantity` = ".$newQuantity." where proID = ".$proID;
        $conn->query($sqlUpdatePro);
        header("Location: /Project_WebBanHang/GhepCode/Template-View/cart.php");
        }
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
?>