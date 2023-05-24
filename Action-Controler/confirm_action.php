<?php 
include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
session_start();
$orderID = $_GET["order_id"];
if($_SESSION["login"]==true){
    $conn = new mysqli("localhost", "bexuanmailonto", "170602cf","csdldoan");
    try{
        $sql  = "update `order` set status = 'completed' where orderID =".$orderID;
        $conn->query($sql);
        header("Location: /DoAnCNW/Template-View/user_infor.php");
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