<?php
include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
include_once "H:/xampp/htdocs/DoAnCNW/Action-Controler/function_handle_sql.php";
session_start();
$prID = intval($_GET["id_product"]);
$conn = new mysqli("localhost", "bexuanmailonto", "170602cf","csdldoan");
$sql =  "select * from product where proID = ".$prID;
$result = $conn->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $_SESSION["product"] = new Product($row["proID"],$row["proName"],$row["grID"],$row["price"],$row["quantity"],$row["size"],$row["color"],$row["description"],$row["active"],$row["img"]);
    $_SESSION["feedback"] = getListFB($prID);
    header("Location: /DoAnCNW/Template-View/product_infor.php");
}else{
    $_SESSION["product"]=null;
    $_SESSION["feedback"]=null;
    header("Location: /DoAnCNW/Template-View/trangchu.php?search=");
}
?>