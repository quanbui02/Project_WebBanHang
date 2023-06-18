<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Class-Model/class.php";
session_start();
$_SESSION["group-mode"] = true;
$id = intval($_GET["id_group"]);
$conn = new mysqli("127.0.0.1", "root", "","csdldoan");
$sql  = "select * from product where grID = '".$id."' and active = 1";
$result = $conn->query($sql);
$_SESSION["pro-group"]=array();
$count = 0;
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $_SESSION["pro-group"][$count]= new Product($row["proID"],$row["proName"],$row["grID"],$row["price"],$row["quantity"],$row["size"],$row["color"],$row["description"],$row["active"],$row["img"]);
        $count=$count +1;
    }
    header("Location: /Project_WebBanHang/GhepCode/Template-View/trangchu.php?search=");
}else{
    header("Location: /Project_WebBanHang/GhepCode/Template-View/trangchu.php?search=");
}
?>