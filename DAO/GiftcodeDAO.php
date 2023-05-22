<?php 
function getListGift(){
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try{
        $list= array();
        $count = 0;
        $per_page = 10; // số bản ghi hiển thị trên 1 trang
        $current_page = isset($_GET['pg']) ? $_GET['pg'] : 1; // trang hiện tại, mặc định là trang 1
        // tính toán offset
        $offset = ($current_page - 1) * $per_page;
        // truy vấn lấy dữ liệu
        $sql = "SELECT * FROM giftcode LIMIT $per_page OFFSET $offset";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $list[$count] = new GiftCode($row["giftID"],$row["giftContent"],$row["giftValue"],$row["quantity"],$row["active"]);
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

function getAllListGiftCode(){
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try{
        $list= array();
        $count = 0;
        $sql = "SELECT * FROM giftcode";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $list[$count] = new GiftCode($row["giftID"],$row["giftContent"],$row["giftValue"],$row["quantity"],$row["active"]);
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

function getIndexPage() {
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $per_page = 10;
        $sql = "select * from giftcode";
         $result = $conn->query($sql);
         $total_records = mysqli_num_rows($result);
         $total_pages = ceil($total_records / $per_page);
         return $total_pages;
    }  catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}

function createGift($newGift){
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try{
        $sql = "INSERT INTO giftcode (giftID,giftValue, giftContent,quantity,active) VALUES (0,'".$newGift->getGiftValue()."', '".$newGift->getGiftContent()."','".$newGift->getGiftQuantity()."','".$newGift->getGiftActive()."')";
        $conn->query($sql);
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
function updateGift($newGift){
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try{
        $sql = "UPDATE giftcode SET giftValue = '".$newGift->getGiftValue()."', giftContent = '".$newGift->getGiftContent()."',quantity ='".$newGift->getGiftQuantity()."',active = '".$newGift->getGiftActive()."'  where giftID = '".$newGift->getGiftID()."';";
        $conn->query($sql);
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
