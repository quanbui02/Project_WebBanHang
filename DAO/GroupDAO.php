<?php 
function getListGroup(){
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try{
        $list= array();
        $count = 0;
        $per_page = 5; // số bản ghi hiển thị trên 1 trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hiện tại, mặc định là trang 1
        // tính toán offset
        $offset = ($current_page - 1) * $per_page;
        // truy vấn lấy dữ liệu
        $sql = "SELECT * FROM group_product where active = 1 LIMIT $per_page OFFSET $offset";
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

function getAllListGroup(){
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try{
        $list= array();
        $count = 0;
        $sql = "SELECT * FROM group_product where active = 1";
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

function getIndexPage() {
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $per_page = 5;
        $sql = "select * from group_product where active = 1";
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

function getAllListDeletedGroup() {
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try{
        $list= array();
        $count = 0;
        $sql = "select * from group_product where active = 0";
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
function createGroup($newGrProduct){
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try{
        $sql = "INSERT INTO group_product (grID,grName, active) VALUES (0,'".$newGrProduct->getNameGroup()."', 1)";
        $conn->query($sql);
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
function updateGroup($newGroup){
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try{
        $sql = "UPDATE group_product SET grName = '".$newGroup->getNameGroup()."' where grID = '".$newGroup->getGrID()."';";
        $conn->query($sql);
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}
function searchGroup($nameGroup) {
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try{
        $count = 0;
        $lists =  array();
        if(trim($nameGroup) != ""){
            $sql = "select * from group_product where grName like '%".$nameGroup."%' and active = 1";
            $result = $conn->query($sql);
        }
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $groups  = new GroupProduct($row["grID"],$row["grName"],$row["active"]);
                $lists[$count] = $groups;
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
