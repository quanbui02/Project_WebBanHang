<?php
include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
include_once "H:/xampp/htdocs/DoAnCNW/Action-Controler/function_handle_sql.php";
session_start();
$giftcode = $_REQUEST["giftcode"];
$address = $_REQUEST["address"];
$phone = $_REQUEST["phone"];
if(strlen($phone)<=0 || strlen($address)<=0){
    $_SESSION["error-purchase"]="Không thể để trống địa chỉ hoặc số điện thoại";
    header("Location: /DoAnCNW/Template-View/purchase.php?code=".$_SESSION["code"]."&money=".$_SESSION["money"]."&id=".$_SESSION["id-order"]);
}else{
    $conn = new mysqli("localhost", "bexuanmailonto", "170602cf","csdldoan");
    if(strlen($giftcode)>0){
        try{
            $sql = "select * from giftcode where `giftContent` like '".$giftcode."'";
            $result = $conn->query($sql);
            echo $result->num_rows;
            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                $sqlUpdate1 = "update `order` set `giftID` = ".$row["giftID"]." , status = 'payed' WHERE `orderID` =".$_SESSION["id-order"];
                $conn->query($sqlUpdate1);
                $sqlUpdateUser = "update `user` SET `address` = '".$address." ', `phone` = '".$phone."', `active` = b'1' where `userID` = ".$_SESSION["user-infor"]->getUserID();
                $conn->query($sqlUpdateUser);
                header("Location: /DoAnCNW/Template-View/trangchu.php?search=");

            }else{
                $_SESSION["error-purchase"]="Giftcode không hợp lệ";
                header("Location: /DoAnCNW/Template-View/purchase.php?code=".$_SESSION["code"]."&money=".$_SESSION["money"]."&id=".$_SESSION["id-order"]);
            }
        }
        catch(Exception $e){
            $_SESSION["error-sql"]=$e->getMessage();
        }
        finally{
            $conn->close();
        }
    }else{
        $sqlUpdate2 = "update `order` set status = 'payed' WHERE `orderID` =".$_SESSION["id-order"];
        $conn->query($sqlUpdate2);
        $sqlUpdateUser = "update `user` SET `address` = '".$address." ', `phone` = '".$phone."', `active` = b'1' where `userID` = ".$_SESSION["user-infor"]->getUserID();
        $conn->query($sqlUpdateUser);
        $conn->close();
        header("Location: /DoAnCNW/Template-View/trangchu.php?search=");
    }
}
?>