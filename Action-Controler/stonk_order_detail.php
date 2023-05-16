<?php 
include_once "C:/xampp/htdocs/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/GhepCode/Action-Controler/function_handle_sql.php";
session_start();
$conn = new mysqli("127.0.0.1", "root", "","csdldoan");
$proID  = $_GET["id_product"];
$number = $_GET["number"];
$detailID = $_GET["id_detail"];
if(validatorQuantity($proID)){
    try{
        //Update so luong cua chi tiet hoa don
        $newNumber = $number + 1;
        $sqlUpdateDetail = "update `order_detail` set `number` = ".$newNumber." where detailID= ".$detailID ."";
        $conn->query($sqlUpdateDetail);
        //Update so luong san pham
        $product  = getProductByID($proID);
        $newQuantity = $product->getQuantity() - 1;
        $sqlUpdatePro  = "update `product` set `quantity` = ".$newQuantity." where proID = ".$proID;
        $conn->query($sqlUpdatePro);
        header("Location: /GhepCode/Template-View/cart.php");
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}else{
    header("Location: /GhepCode/Template-View/cart.php");
}
?>