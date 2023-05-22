<?php 
// include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
// include_once "H:/xampp/htdocs/DoAnCNW/Action-Controler/function_handle_sql.php";
include_once "H:/xampp/htdocs/Project_WebBanHang/Class-Model/class.php";
include_once "H:/xampp/htdocs/Projecr_WebBanHang/Action-Controler/function_handle_sql.php";
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
        // header("Location: /DoAnCNW/Template-View/cart.php");
        header("Location: /Project_WebBanHang/Template-View/cart.php");
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}else{
    // header("Location: /DoAnCNW/Template-View/cart.php");
    header("Location: /Project_WebBanHang/Template-View/cart.php");
}
?>