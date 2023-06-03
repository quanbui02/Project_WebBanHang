<?php 
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Class-Model/class.php";
session_start();
$orderID = $_GET["order_id"];
if($_SESSION["login"]==true){
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    try{
        $sql  = "update `order` set status = 'completed' where orderID =".$orderID;
        $conn->query($sql);
        header("Location: /Project_WebBanHang/GhepCode/Template-View/user_infor.php");
    }
    catch(Exception $e){
        $_SESSION["error-sql"]=$e->getMessage();
    }
    finally{
        $conn->close();
    }
}else{
    echo "404_Not_found!";
}
?>