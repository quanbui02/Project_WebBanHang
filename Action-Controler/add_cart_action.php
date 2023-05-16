<?php
include_once "C:/xampp/htdocs/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/GhepCode/Action-Controler/function_handle_sql.php";
session_start();
if($_SESSION["login"]==true){
$proID = $_GET["id_product"];
$proQuantity = $_GET["quantityPro"];
$conn = new mysqli("127.0.0.1", "root", "","csdldoan");
$sql = "select * from `order` where userID= ".intval($_SESSION["user-infor"]->getUserID());
$cartOrder = null;
$cartDetailOrder = null;
try{
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $listOrders= array();
        $count = 0;
        while($row=$result->fetch_assoc()){
            $listOrders[$count] = new Order($row["orderID"],$row["orderDate"],$row["userID"],$row["giftID"],$row["status"]);
            $count = $count+1;
        }
        for($i=0;$i<count($listOrders);$i++){
            if($listOrders[$i]->getStatus() == "cart"){
                $cartOrder = $listOrders[$i];
                $cartDetailOrder = getOrderDetails($cartOrder->getOrderID());
                break;
            }
        }
        if(empty($cartOrder)){//Chua co gio hang
            //Tao don hang moi
            $sqlAdd  = "insert into `order` (`orderID`, `orderDate`, `userID`, `giftID`, `status`) values (NULL, curdate(), '".$_SESSION["user-infor"]->getUserID()."', '1', 'cart')";
            $conn->query($sqlAdd);
            //Lay id don hang vua tao
            $sqlGetCart = "select * from `order` where userID =".$_SESSION["user-infor"]->getUserID()." and status = 'cart'";
            $rs = $conn->query($sqlGetCart);
            $r=$rs->fetch_assoc();
            $orID = $r["orderID"];
            //Tao chi tiet don hang cho don hang cua tao
            $sqlAddDetails = "insert into  `order_detail` (`detailID`, `orderID`, `number`, `prID`) VALUES (NULL, '".$orID."', '1', '".$proID."')";
            $conn->query($sqlAddDetails);
            //Update lai so luong san pham
            $newQuantity = $proQuantity - 1;
            $sqlUpdatePro = "update `product` set `quantity` = ".$newQuantity." where proID = ".$proID;
            $conn->query($sqlUpdatePro);
            header("Location: /GhepCode/Template-View/trangchu.php?search=");
        }else{//Da co gio hang
            $check = false;
            for($i = 0;$i<count($cartDetailOrder);$i++){
                if($cartDetailOrder[$i]->getProID()==$proID){//SP da ton tai trong gio hang
                    $newNumber = intval($cartDetailOrder[$i]->getNumber())+1;
                    $sqlUp = "update `order_detail` set `number` = ".$newNumber." where detailID= ".$cartDetailOrder[$i]->getDetailID()."";
                    $conn->query($sqlUp);
                    $check = true;
                    $newQuantity = $proQuantity - 1;
                    $sqlUpdatePro = "update `product` set `quantity` = ".$newQuantity." where proID = ".$proID;
                    $conn->query($sqlUpdatePro);
                    header("Location: /GhepCode/Template-View/trangchu.php?search=");
                    break;
                }
            }
            if($check == false){//SP chua ton tai trong gio hang
                $sqlAddDetail = "insert into  `order_detail` (`detailID`, `orderID`, `number`, `prID`) VALUES (NULL, '".$cartOrder->getOrderID()."', '1', '".$proID."')";
                $conn->query($sqlAddDetail);
                $newQuantity = $proQuantity - 1;
                $sqlUpdatePro = "update `product` set `quantity` = ".$newQuantity." where proID = ".$proID;
                $conn->query($sqlUpdatePro);
                header("Location: /GhepCode/Template-View/trangchu.php?search=");
            }
        }
    }else{
        $sqlAdd  = "insert into `order` (`orderID`, `orderDate`, `userID`, `giftID`, `status`) values (NULL, curdate(), '".$_SESSION["user-infor"]->getUserID()."', '1', 'cart')";
        $conn->query($sqlAdd);
        //Lay id don hang vua tao
        $sqlGetCart = "select * from `order` where userID =".$_SESSION["user-infor"]->getUserID()." and status = 'cart'";
        $rs = $conn->query($sqlGetCart);
        $r=$rs->fetch_assoc();
        $orID = $r["orderID"];
        //Tao chi tiet don hang cho don hang cua tao
        $sqlAddDetails = "insert into  `order_detail` (`detailID`, `orderID`, `number`, `prID`) VALUES (NULL, '".$orID."', '1', '".$proID."')";
        $conn->query($sqlAddDetails);
        $newQuantity = $proQuantity - 1;
        $sqlUpdatePro = "update `product` set `quantity` = ".$newQuantity." where proID = ".$proID;
        $conn->query($sqlUpdatePro);
        header("Location: /GhepCode/Template-View/trangchu.php?search=");
    }
}
catch(Exception $e){
    $_SESSION["error-sql"]=$e->getMessage();
}
finally{
    $conn->close();
}
}else{
    header("Location: /GhepCode/Template-View/login.php");
}
?>