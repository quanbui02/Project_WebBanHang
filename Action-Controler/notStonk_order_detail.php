<?php 
include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
include_once "H:/xampp/htdocs/DoAnCNW/Action-Controler/function_handle_sql.php";
session_start();
$conn = new mysqli("localhost", "bexuanmailonto", "170602cf","csdldoan");
$proID  = $_GET["id_product"];
$number = $_GET["number"];
$detailID = $_GET["id_detail"];
$orderID = $_GET["order_id"];
    try{
        //Update so luong cua chi tiet hoa don
        $newNumber = $number - 1;
        if($newNumber<=0){
            header("Location: /DoAnCNW/Action-Controler/destroy_order_detail.php?id_product=".$proID."&id_detail=".$detailID."&number=".$number."&order_id=".$orderID);
        }else{
        $sqlUpdateDetail = "update `order_detail` set `number` = ".$newNumber." where detailID= ".$detailID ."";
        $conn->query($sqlUpdateDetail);
        //Update so luong san pham
        $product  = getProductByID($proID);
        $newQuantity = $product->getQuantity() + 1;
        $sqlUpdatePro  = "update `product` set `quantity` = ".$newQuantity." where proID = ".$proID;
        $conn->query($sqlUpdatePro);
        header("Location: /DoAnCNW/Template-View/cart.php");
        }
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
?>