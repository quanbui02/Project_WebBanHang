<?php 
include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
include_once "H:/xampp/htdocs/DoAnCNW/Action-Controler/function_handle_sql.php";
session_start();
$orderID = $_GET["order_id"];
if($_SESSION["login"]== true){
    $conn = new mysqli("localhost", "bexuanmailonto", "170602cf","csdldoan");
    try{
        $sql = "update `order` set status = 'destroy' where orderID =".$orderID;
        $conn->query($sql);
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
        header("Location: /DoAnCNW/Template-View/user_infor.php");
    }
}else{
    header("Location:/DoAnCNW/Template-View/login.php ");
}
?>