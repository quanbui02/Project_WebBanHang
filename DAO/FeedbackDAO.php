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

function getIndexPageFeedback()
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Feedback.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";

    $conn = connectDb();
    try {
        $per_page = 10;
        $sql = "select * from feedback where active = 1";
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
