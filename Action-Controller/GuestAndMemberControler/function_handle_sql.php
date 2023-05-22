<?php
//User function
function insertUser($newUser){
    // include_once "H:/xampp/htdocs/DoAnCNW/Action-Controler/connect.php";
    // include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
    include_once "H:/xampp/htdocs/Project_WebBanHang/Action-Controler/connect.php";
    include_once "H:/xampp/htdocs/Project_WebBanHang/Class-Model/class.php";
    try{
        $sql = "INSERT INTO user (userID, userName, pass,position,fullName,birth,address,email,phone,active) VALUES (0, '".$newUser->getUserName()."', '".$newUser->getPass()."','".$newUser->getPos()."','".$newUser->getFullName()."','".$newUser->getBirth()."','".$newUser->getAddress()."','".$newUser->getEmail()."','".$newUser->getPhone()."',".$newUser->getAct().")";
        $conn->query($sql);
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
function updateUser($newUser){
    // include_once "H:/xampp/htdocs/DoAnCNW/Action-Controler/connect.php";
    // include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
    include_once "/Project_WebBanHang/Action-Controler/connect.php";
     include_once "/Project_WebBanHang/Class-Model/class.php";
    try{
        $sql = "UPDATE user SET userName='".$newUser->getUserName()."',pass='".$newUser->getPass()."', fullName = '".$newUser->getFullName()."', birth = '".$newUser->getBirth()."' , address = '".$newUser->getAddress()."',email ='".$newUser->getEmail()."',phone = '".$newUser->getPhone()."'  WHERE userID = ".$newUser->getUserID().";";
        $conn->query($sql);
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
//Product function
function getListProduct($proName){
    // include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
    include_once "/Project_WebBanHang/Class-Model/class.php";
    // $conn = new mysqli("localhost", "bexuanmailonto", "170602cf","csdldoan");
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    try{
        $count = 0;
        $lists =  array();
        if(strlen($proName) == 0){
            $sql = "select * from product ";
            $result = $conn->query($sql);
        }else{
            //like N'%n%'
            $sql = "select * from product where proName like '%".$proName."%'";
            $result = $conn->query($sql);
        }
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                //__construct($id, $name, $grID,$price,$quantity,$size,$color,$des,$act)
                $product  = new Product($row["proID"],$row["proName"],$row["grID"],$row["price"],$row["quantity"],$row["size"],$row["color"],$row["description"],$row["active"]);
                $lists[$count] = $product;
                $count=$count + 1;
            }
         }
         return $lists;
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
function getProductByID($idPro){
    // include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
    include_once "/Project_WebBanHang/Class-Model/class.php";
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    try{
        $sql  = "select * from product where proID = '".$idPro."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $product  = new Product($row["proID"],$row["proName"],$row["grID"],$row["price"],$row["quantity"],$row["size"],$row["color"],$row["description"],$row["active"]);

        return $product;
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
//Group function
function getListGroup(){
    // include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
    include_once "/Project_WebBanHang/Class-Model/class.php";
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    try{
        $list= array();
        $count = 0;
        $sql = "select * from group_product";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $list[$count] = new GroupProduct($row["grID"],$row["grName"],$row["active"]);
                $count = $count+1;
            }
        }
        return $list;
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
//Feedback function 
function getListFB($proID){
    // include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
    include_once "/Project_WebBanHang/Class-Model/class.php";
    // $conn = new mysqli("localhost", "bexuanmailonto", "170602cf","csdldoan");
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    try{
        $list = array();
        $count = 0;
        $sql = "select * from feedback where proID = ".$proID;
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                //__construct($fbID,$prID,$userID,$date,$fbContent)
                $list[$count] = new Feedback($row["fbID"],$row["proID"],$row["userID"],$row["fbTime"],$row["fbContent"]);
                $count = $count + 1;
            }
        }   
        return $list;
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
//Order details function
function getOrderDetails($orderID){
    // include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
    include_once "/Project_WebBanHang/Class-Model/class.php";
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    try{
        $list = array();
        $count = 0;
        $sql = "select * from order_detail where orderID = ".$orderID;
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                //__construct($detailID,$orderID,$proID,$number)
                $list[$count] = new OrderDetail($row["detailID"],$row["orderID"],$row["prID"],$row["number"]);
                $count =$count+1;
            }
        }
        return $list;
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
function getOrderByID($id){
    // include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
    include_once "Project_WebBanHang/Class-Model/class.php";
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    try{
        $result = $conn->query("select * from `order` where orderID = ".intval($id));
        $row = $result->fetch_assoc();
        //__construct($orID,$date,$uID,$gID,$status)
        $order = new Order($row["orderID"],$row["orderDate"],$row["userID"],$row["giftID"],$row["status"]);

        return $order;
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
function validatorQuantity($idProuct){
    // include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
    include_once "/Project_WebBanHang/Class-Model/class.php";
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    try{

        $sql = "select * from `product` where proID = ".$idProuct;
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $row  = $result->fetch_assoc();
            $product = new Product($row["proID"],$row["proName"],$row["grID"],$row["price"],$row["quantity"],$row["size"],$row["color"],$row["description"],$row["active"]);
            
            if($product->getQuantity()>0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
?>