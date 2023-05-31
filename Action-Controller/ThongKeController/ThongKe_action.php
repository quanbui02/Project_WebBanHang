<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";

session_start();
$conn = connectDb();
if (!empty($_POST["DOANHTHU1"]) && !empty($_POST["DOANHTHU2"])) {
    $ngayTu = $_POST["DOANHTHU1"];
    $ngayDen = $_POST["DOANHTHU2"];
    $timestampTu = strtotime($ngayTu);
    $timestampDen = strtotime($ngayDen);
    if ($timestampTu < $timestampDen) {
        try {
            $query = "SELECT SUM(order_detail.number * product.price - giftcode.giftValue) AS tongtien
                      FROM `order`
                      INNER JOIN order_detail ON `order`.orderID = order_detail.orderID
                      INNER JOIN product ON order_detail.prID = product.proID
                      INNER JOIN giftcode ON `order`.`giftID` = giftcode.giftID
                      WHERE `order`.`orderDate` >= '$ngayTu' AND `order`.`orderDate` <= '$ngayDen'";
            $result = $conn->query($query);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $tongTien = $row['tongtien'];
                $_SESSION['tongTien'] = $tongTien;
                $_SESSION['Ngaydau'] = $ngayTu;
                $_SESSION['NgaySau'] = $ngayDen;
                header("Location: /Project_WebBanHang/Template-Views/Admin/Shared/Thongke.php");
            } else {
                throw new Exception("Không có kết quả.");
            }
        } catch (Exception $e) {
            $_SESSION['error-date'] = $e->getMessage();
            header("Location: /Project_WebBanHang/Template-Views/Admin/Shared/Index.php");
        } finally {
            if ($result) {
                $result->free_result();
            }
        }
    } else {
        $_SESSION['error-date'] = "Vui lòng nhập ngày hợp lệ.";
        header("Location: /Project_WebBanHang/Template-Views/Admin/Shared/Index.php");
    }
} else {
    $_SESSION['error-date'] = "Vui lòng nhập đầy đủ ngày.";
    header("Location: /Project_WebBanHang/Template-Views/Admin/Shared/Index.php");
}

?>
