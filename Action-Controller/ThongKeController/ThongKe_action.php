<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";

session_start();
$conn = connectDb();
if (!empty($_POST["DOANHTHU1"]) && !empty($_POST["DOANHTHU2"])) {
    $timestampTu = strtotime($_POST["DOANHTHU1"]);
    $timestampDen = strtotime($_POST["DOANHTHU2"]);
    $ngayTu = date("Y-m-d", $timestampTu);
    $ngayDen = date("Y-m-d", $timestampDen);
    if ($timestampTu <= $timestampDen) {

        try {
            $query = "SELECT 
            SUM(CASE WHEN `order`.status = 'completed' THEN order_detail.number * product.price - giftcode.giftValue ELSE 0 END) AS tongtien,
            COUNT(CASE WHEN `order`.status = 'payed' THEN 1 END) as soDonDangChoXacNhan,
            COUNT(CASE WHEN `order`.status = 'confirm' THEN 1 END) as soDonDangGiao,
            COUNT(CASE WHEN `order`.status = 'completed' THEN 1 END) as soDonDaGiao,
            COUNT(CASE WHEN `order`.status = 'destroyed' THEN 1 END) as soDonDaHuy
            FROM `order`
            INNER JOIN order_detail ON `order`.orderID = order_detail.orderID
            INNER JOIN product ON order_detail.prID = product.proID
            INNER JOIN giftcode ON `order`.`giftID` = giftcode.giftID
            WHERE `order`.`orderDate` >= '$ngayTu' AND `order`.`orderDate` <= '$ngayDen'";
            // Thong ke theo cac thang//
            $thongKeTheoCacThang = "SELECT 
            YEAR(`order`.`orderDate`) AS Nam,
            MONTH(`order`.`orderDate`) AS Thang,
            SUM(CASE 
                WHEN `order`.status = 'completed' 
                THEN order_detail.number * product.price - giftcode.giftValue 
                ELSE 0 
            END) AS TienHangThang 
        FROM 
            `order` 
            INNER JOIN order_detail ON `order`.orderID = order_detail.orderID 
            INNER JOIN product ON order_detail.prID = product.proID 
            INNER JOIN giftcode ON `order`.`giftID` = giftcode.giftID 
        WHERE 
            `order`.`orderDate` >= '$ngayTu' 
            AND `order`.`orderDate` <= '$ngayDen' 
            AND `order`.status = 'completed' 
        GROUP BY 
            YEAR(`order`.`orderDate`), 
            MONTH(`order`.`orderDate`);";

            $thongkeThang = $conn->query($thongKeTheoCacThang);

            $thang = array();
            $flag = 0;
            if ($thongkeThang->num_rows > 0) {
                while ($cacThang = $thongkeThang->fetch_assoc()) {
                    $thang[$flag] = [
                        'thang' => $cacThang['Thang'],
                        'nam' => $cacThang['Nam'],
                        'tongTien' => $cacThang["TienHangThang"]
                    ];
                    $flag = $flag + 1;
                }
            }
            $_SESSION['listThangThongKe'] = $thang;
            // END

            $result = $conn->query($query);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $tongTien = $row['tongtien'];
                $_SESSION['tongTien'] = $tongTien;
                $_SESSION['Ngaydau'] = $_POST["DOANHTHU1"];
                $_SESSION['NgaySau'] = $_POST["DOANHTHU2"];
                $_SESSION['ChoXacNhan'] = $row['soDonDangChoXacNhan'];
                $_SESSION['DangGiao'] = $row['soDonDangGiao'];
                $_SESSION['DaGiao'] = $row['soDonDaGiao'];
                $_SESSION['DaHuy'] = $row['soDonDaHuy'];
                header("Location: /Project_WebBanHang/Template-Views/Admin/Shared/Index.php");
            } else {
                throw new Exception("Không có kết quả.");
            }
        } catch (Exception $e) {
            $_SESSION['error-date'] = $e->getMessage();
            header("Location: /Project_WebBanHang/Template-Views/Admin/Shared/Index.php");
        } finally {
            if ($result || $thongkeThang) {
                $result->free_result();
                $thongkeThang->free_result();
                $conn->close();
            }
        }
    } else {
        $_SESSION['error-date'] = "Vui lòng nhập ngày hợp lệ";
        header("Location: /Project_WebBanHang/Template-Views/Admin/Shared/Index.php");
    }
} else {
    $_SESSION['error-date'] = "Vui lòng nhập đầy đủ ngày";
    header("Location: /Project_WebBanHang/Template-Views/Admin/Shared/Index.php");
}
