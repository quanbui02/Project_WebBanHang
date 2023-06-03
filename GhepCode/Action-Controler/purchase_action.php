<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/function_handle_sql.php";
session_start();
$giftcode = $_REQUEST["giftcode"];
$address = $_REQUEST["address"];
$phone = $_REQUEST["phone"];
if(strlen($phone)<=0 || strlen($address)<=0){
    $_SESSION["error-purchase"]="Không thể để trống địa chỉ hoặc số điện thoại";
    header("Location: /Project_WebBanHang/GhepCode/Template-View/purchase.php?code=".$_SESSION["code"]."&money=".$_SESSION["money"]."&id=".$_SESSION["id-order"]);
}else{
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    if(strlen($giftcode)>0){
        try{
            $sql = "select * from giftcode where `giftContent` like '".$giftcode."'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                $row  = $result->fetch_assoc();
                if(intval($row["quantity"])>0){
                    $sqlCheckedGiftID = "select * from `order` where giftID = ".$row["giftID"]." and userID =".$_SESSION["user-infor"]->getUserID();
                    $rs = $conn->query($sqlCheckedGiftID);
                    if($rs->num_rows>0){
                        $_SESSION["error-purchase"]="Giftcode đã được sử dụng (Chỉ được sử dụng tối đa 1 lần !)";
                        header("Location: /Project_WebBanHang/GhepCode/Template-View/purchase.php?code=".$_SESSION["code"]."&money=".$_SESSION["money"]."&id=".$_SESSION["id-order"]);
                    }else{
                        $sqlUpdate1 = "update `order` set `giftID` = ".$row["giftID"]." , status = 'payed' WHERE `orderID` =".$_SESSION["id-order"];
                        $conn->query($sqlUpdate1);
                        $sqlUpdateUser = "update `user` SET `address` = '".$address." ', `phone` = '".$phone."', `active` = b'1' where `userID` = ".$_SESSION["user-infor"]->getUserID();
                        $conn->query($sqlUpdateUser);
                        $newGiftcodeNumber =intval($row["quantity"]) - 1;
                        $sqlUpdateGiftQuantity = "update `giftcode` SET `quantity` = '".$newGiftcodeNumber."' where giftID = ".$row["giftID"];
                        $conn->query($sqlUpdateGiftQuantity);
                        header("Location: /Project_WebBanHang/GhepCode/Template-View/trangchu.php?search=");   
                    }
                }else{
                    $_SESSION["error-purchase"]="Giftcode đã hết";
                    header("Location: /Project_WebBanHang/GhepCode/Template-View/purchase.php?code=".$_SESSION["code"]."&money=".$_SESSION["money"]."&id=".$_SESSION["id-order"]);
                }
            }else{
                $_SESSION["error-purchase"]="Giftcode không hợp lệ";
                header("Location: /Project_WebBanHang/GhepCode/Template-View/purchase.php?code=".$_SESSION["code"]."&money=".$_SESSION["money"]."&id=".$_SESSION["id-order"]);
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
        header("Location: /Project_WebBanHang/GhepCode/Template-View/trangchu.php?search=");
    }
}
?>