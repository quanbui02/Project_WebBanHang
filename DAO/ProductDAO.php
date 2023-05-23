<?php
function getListProduct()
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    
    $conn = connectDb();
    try {
        $list = array();
        $count = 0;
        $per_page = 10; // số bản ghi hiển thị trên 1 trang
        $current_page = isset($_GET['pI']) ? $_GET['pI'] : 1; // trang hiện tại, mặc định là trang 1
        // tính toán offset
        $offset = ($current_page - 1) * $per_page;
        // truy vấn lấy dữ liệu
        $sql = "SELECT * FROM product where active = 1 LIMIT $per_page OFFSET $offset";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $list[$count] = new Product(
                    $row["proID"],
                    $row["grID"],
                    $row["proName"],
                    $row["price"],
                    $row["quantity"],
                    $row["size"],
                    $row["color"],
                    $row["description"],
                    $row["active"],
                    $row["image"]
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

function getAllListProduct()
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $list = array();
        $count = 0;
        $sql = "SELECT * FROM product where active = 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $list[$count] = new Product(
                    $row["proID"],
                    $row["grID"],
                    $row["proName"],
                    $row["price"],
                    $row["quantity"],
                    $row["size"],
                    $row["color"],
                    $row["description"],
                    $row["active"],
                    $row["image"]
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

function getIndexPageProduct()
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $per_page = 10;
        $sql = "select * from product where active = 1";
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

function getAllListDeletedProduct()
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $list = array();
        $count = 0;
        $per_page = 5; // số bản ghi hiển thị trên 1 trang
        $current_page = isset($_GET['pl']) ? $_GET['pl'] : 1; // trang hiện tại, mặc định là trang 1
        // tính toán offset
        $offset = ($current_page) * $per_page;
        // truy vấn lấy dữ liệu
        $sql = "SELECT * FROM product WHERE active = 0 LIMIT $offset";
        $sql2 = "SELECT * FROM product WHERE active = 0";
        $totalPage = $conn->query($sql2);
        $total_records = mysqli_num_rows($totalPage);
        $total_pages = ceil($total_records / $per_page);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $list[$count] = new Product(
                    $row["proID"],
                    $row["grID"],
                    $row["proName"],
                    $row["price"],
                    $row["quantity"],
                    $row["size"],
                    $row["color"],
                    $row["description"],
                    $row["active"],
                    $row["image"]
                );
                $count = $count + 1;
            }
        }

        return array(
            'list' => $list,
            'total_pages' => $total_pages
        );
    } catch (Exception $e) {
        $_SESSION["error-sql"] = $e->getMessage();
        return array();
    } finally {
        $conn->close();
    }
}

// function getAllListDeletedProduct()
// {
//     include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
//     include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
//     $conn = connectDb();
//     try {
//         $list = array();
//         $count = 0;
//         $per_page = 2; // số bản ghi hiển thị trên 1 trang
//         $current_page = isset($_GET['pl']) ? $_GET['pl'] : 1; // trang hiện tại, mặc định là trang 1
//         // tính toán offset
//         $offset = ($current_page - 1) * $per_page;
//         // truy vấn lấy dữ liệu
//         $sql = "SELECT * FROM product WHERE active = 0 LIMIT $per_page OFFSET $offset";
//         $sql2 = "SELECT COUNT(*) AS total_records FROM product WHERE active = 0";
//         $result = $conn->query($sql);
//         if ($result->num_rows > 0) {
//             while ($row = $result->fetch_assoc()) {
//                 $list[$count] = new Product(
//                     $row["proID"],
//                     $row["grID"],
//                     $row["proName"],
//                     $row["price"],
//                     $row["quantity"],
//                     $row["size"],
//                     $row["color"],
//                     $row["description"],
//                     $row["active"],
//                     $row["image"]
//                 );
//                 $count = $count + 1;
//             }
//         }
//         $result2 = $conn->query($sql2);
//         $total_records = 0;
//         if ($result2 && $result2->num_rows > 0) {
//             $row2 = $result2->fetch_assoc();
//             $total_records = $row2['total_records'];
//         }
//         $total_pages = ceil($total_records / $per_page);
        
//         return array(
//             'list' => $list,
//             'total_pages' => $total_pages
//         );
//     } catch (Exception $e) {
//         $_SESSION["error-sql"] = $e->getMessage();
//     } finally {
//         $conn->close();
//     }
// }


// function getAllListDeletedProduct()
// {
//     include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
//     include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
//     $conn = connectDb();
//     try {
//         $list = array();
//         $count = 0;
//         $per_page = 5; // số bản ghi hiển thị trên 1 trang
//         $current_page = isset($_GET['pl']) ? $_GET['pl'] : 1; // trang hiện tại, mặc định là trang 1
//         // tính toán offset
//         $offset = ($current_page - 1) * $per_page;
//         // truy vấn lấy dữ liệu
//         $sql = "SELECT * FROM product where active = 0 LIMIT $per_page OFFSET $offset";
//         $sql2 = "select * from product where active = 0";
//         $totalPage = $conn->query($sql2);
//         $total_records = mysqli_num_rows($totalPage);
//         $total_pages = ceil($total_records / $per_page);
//         $result = $conn->query($sql);
//         if ($result->num_rows > 0) {
//             while ($row = $result->fetch_assoc()) {
//                 $list[$count] = new Product(
//                     $row["proID"],
//                     $row["grID"],
//                     $row["proName"],
//                     $row["price"],
//                     $row["quantity"],
//                     $row["size"],
//                     $row["color"],
//                     $row["description"],
//                     $row["active"],
//                     $row["image"]
//                 );
//                 $count = $count + 1;
//             }
//         }
//         return $list;
//     } catch (Exception $e) {
//         $_SESSION["error-sql"] = $e->getMessage();
//     } finally {
//         $conn->close();
//         return $total_pages;
//     }
// }
function createProduct($newProduct)
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $sql = "INSERT INTO product (proID,grID,proName,price,quantity,size,color,description, active,image) 
        VALUES (
            0,
            '" . $newProduct->getGrID() . "',
            '" . $newProduct->getPrName() . "',
            '" . $newProduct->getPrice() . "',
            '" . $newProduct->getQuantity() . "',
            '" . $newProduct->getSize() . "',
            '" . $newProduct->getColor() . "',
            '" . $newProduct->getDes() . "',
            '" . $newProduct->getAct() . "',
            '" . $newProduct->getImg() . "'
             )";
        $conn->query($sql);
        $id = $conn->insert_id;
        $conn->close();
        return $id;
    } catch (Exception $e) {
        $_SESSION["error-sql"] = $e->getMessage();
    }
}
function createDetailImg($newImgs)
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/ImgProduct.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $sql = "INSERT INTO image_products (id, idProduct,image) 
        VALUES (
            0,
            '" . $newImgs->getProID() . "',
            '" . $newImgs->getImg() . "'
             )";
        $conn->query($sql);
    } catch (Exception $e) {
        $_SESSION["error-sql"] = $e->getMessage();
    } finally {
        $conn->close();
    }
}
function updateProduct($product)
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $sql = "UPDATE product
            SET grID = '" . $product->getGrID() . "',
                proName = '" . $product->getPrName() . "',
                price = '" . $product->getPrice() . "',
                quantity = '" . $product->getQuantity() . "',
                size = '" . $product->getSize() . "',
                color = '" . $product->getColor() . "',
                description = '" . $product->getDes() . "',
                active = '" . $product->getAct() . "',
                image = '" . $product->getImg() . "' 
                where proID = '" . $product->getPrID() . "';";
        $conn->query($sql);
    } catch (Exception $e) {
        $_SESSION["error-sql"] = $e->getMessage();
    } finally {
        $conn->close();
    }
}
function SearchProduct($nameProduct)
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $count = 0;
        $lists =  array();
        if (trim($nameProduct) != "") {
            $sql = "select * from product where proName like '%" . $nameProduct . "%'";
            $result = $conn->query($sql);
        }
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
                $product  = new Product(
                    $row["proID"],
                    $row["grID"],
                    $row["proName"],
                    $row["price"],
                    $row["quantity"],
                    $row["size"],
                    $row["color"],
                    $row["description"],
                    $row["active"],
                    $row["image"]
                );
                $lists[$count] = $product;
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


// test commit
// test commit 