<?php
function getListUser()
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $list = array();
        $count = 0;
        $per_page = 15; // số bản ghi hiển thị trên 1 trang
        $current_page = isset($_GET['p']) ? $_GET['p'] : 1; // trang hiện tại, mặc định là trang 1
        // tính toán offset
        $offset = ($current_page - 1) * $per_page;
        // truy vấn lấy dữ liệu
        $sql = "SELECT * FROM user where active = 1 and position like 'Thành viên' LIMIT $per_page OFFSET $offset";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $list[$count] = new User(
                    $row["userID"],
                    $row["userName"],
                    $row["pass"],
                    $row["position"],
                    $row["fullName"],
                    $row["birth"],
                    $row["address"],
                    $row["email"],
                    $row["phone"],
                    $row["active"]
                );
                $count = $count + 1;
            }
        }
        return $list;
    } catch (Exception $e) {
        $_SESSION["error-sql"] = $e->getMessage();
    } finally {
        $conn->close();
    }
}
function getAllUser()
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $list = array();
        $count = 0;
        $sql = "SELECT * FROM user where active = 0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $list[$count] = new User(
                    $row["userID"],
                    $row["userName"],
                    $row["pass"],
                    $row["position"],
                    $row["fullName"],
                    $row["birth"],
                    $row["address"],
                    $row["email"],
                    $row["phone"],
                    $row["active"]
                );
                $count = $count + 1;
            }
        }
        return $list;
    } catch (Exception $e) {
        $_SESSION["error-sql"] = $e->getMessage();
    } finally {
        $conn->close();
    }
}

function getIndexPageUser()
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $per_page = 15;
        $sql = "select * from user where active = 1";
        $result = $conn->query($sql);
        $total_records = mysqli_num_rows($result);
        $total_pages = ceil($total_records / $per_page);
        return $total_pages;
    } catch (Exception $e) {
        $_SESSION["error-sql"] = $e->getMessage();
    } finally {
        $conn->close();
    }
}

//Chua dung toi
// function createUser($newUser)
// {
//     include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
//     $conn = new mysqli("127.0.0.1", "root", "", "csdldoan");
//     try {
//         $sql = "INSERT INTO product (proID,grID,proName,price,quantity,size,color,description, active,image) 
//         VALUES (
//             0,
//             '" . $newProduct->getGrID() . "',
//             '" . $newProduct->getPrName() . "',
//             '" . $newProduct->getPrice() . "',
//             '" . $newProduct->getQuantity() . "',
//             '" . $newProduct->getSize() . "',
//             '" . $newProduct->getColor() . "',
//             '" . $newProduct->getDes() . "',
//             '" . $newProduct->getAct() . "',
//             '" . $newProduct->getImg() . "'
//              )";
//         $conn->query($sql);
//         $id = $conn->insert_id;
//         $conn->close();
//         return $id;
//     } catch (Exception $e) {
//         $_SESSION["error-sql"] = $e->getMessage();
//     }
// }
//0----0//
// function updateUser($product)
// {
//     include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
//     $conn = new mysqli("127.0.0.1", "root", "", "csdldoan");
//     try {
//         $sql = "UPDATE product
//             SET grID = '" . $product->getGrID() . "',
//                 proName = '" . $product->getPrName() . "',
//                 price = '" . $product->getPrice() . "',
//                 quantity = '" . $product->getQuantity() . "',
//                 size = '" . $product->getSize() . "',
//                 color = '" . $product->getColor() . "',
//                 description = '" . $product->getDes() . "',
//                 active = '" . $product->getAct() . "',
//                 image = '" . $product->getImg() . "' 
//                 where proID = '" . $product->getPrID() . "';";
//         $conn->query($sql);
//     } catch (Exception $e) {
//         $_SESSION["error-sql"] = $e->getMessage();
//     } finally {
//         $conn->close();
//     }
// }
function SearchUser($UserName)
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $count = 0;
        $lists =  array();
        if (trim($UserName) != "") {
            $sql = "select * from user where userName like '%" . $UserName . "%' or fullName like '%" . $UserName . "%'";
            $result = $conn->query($sql);
        }
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
                $user  = new User(
                    $row["userID"],
                    $row["userName"],
                    $row["pass"],
                    $row["position"],
                    $row["fullName"],
                    $row["birth"],
                    $row["address"],
                    $row["email"],
                    $row["phone"],
                    $row["active"]
                );
                $lists[$count] = $user;
                $count = $count + 1;
            }
        }
        return $lists;
    } catch (Exception $e) {
        $_SESSION["error-sql"] = $e->getMessage();
    } finally {
        $conn->close();
    }
}
