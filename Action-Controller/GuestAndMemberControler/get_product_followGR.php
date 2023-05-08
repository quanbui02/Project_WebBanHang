<?php
include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
session_start();
$_SESSION["group-mode"] = true;
$id = intval($_GET["id_group"]);
$conn = new mysqli("localhost", "bexuanmailonto", "170602cf","csdldoan");
$sql  = "select * from product where grID = '".$id."'";
$result = $conn->query($sql);
$_SESSION["pro-group"]=array();
$count = 0;
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $_SESSION["pro-group"][$count]= new Product($row["proID"],$row["proName"],$row["grID"],$row["price"],$row["quantity"],$row["size"],$row["color"],$row["description"],$row["active"]);
        $count=$count +1;
    }
    header("Location: /DoAnCNW/Template-View/trangchu.php?search=");
}else{
    header("Location: /DoAnCNW/Template-View/trangchu.php?search=");
}
?>