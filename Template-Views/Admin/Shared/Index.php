<?php

include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";

session_start();
if ($_SESSION["login"] == false) {
    header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
}
$conn = connectDb();
try {
    $query = "SELECT 
        COUNT(CASE WHEN status = 'payed' THEN 1 END) as soDonDangChoXacNhan,
        COUNT(CASE WHEN status = 'confirm' THEN 1 END) as soDonDangGiao,
        COUNT(CASE WHEN status = 'completed' THEN 1 END) as soDonDaGiao,
        COUNT(CASE WHEN status = 'destroyed' THEN 1 END) as soDonDaHuy
        FROM `order`";
    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $soDonDangChoXacNhan = $row['soDonDangChoXacNhan'];
        $soDonDangGiao = $row['soDonDangGiao'];
        $soDonDaGiao = $row['soDonDaGiao'];
        $soDonDaHuy = $row['soDonDaHuy'];
    } else {
        throw new Exception("Không có dữ liệu");
    }
} catch (Exception $e) {
    $_SESSION['error-date'] = $e->getMessage();
} finally {
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/main.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/Home/index.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Trang chủ Admin</title>
</head>

<body>
    <div class="container_flex">
        <div class="side-nav">
            <div class="side-nav-inner">
                <?php
                echo sidebar();
                ?>
            </div>
        </div>
        <div class="container_admin">
            <div class="content_Admin">
                TRANG CHỦ QUẢN TRỊ
            </div>
            <div class="content">
                <ul class="list-orders">
                    <li class="item-order" style="background-color: #ea815e;">
                        <p class="title">Đơn hàng đang chờ xác nhận</p>
                        <p class="quantity">
                            <?php 
                            if (isset($_SESSION['ChoXacNhan'])) {
                                echo $_SESSION['ChoXacNhan'];
                            } else {
                                echo $soDonDangChoXacNhan; 
                            }
                            ?>
                        </p>
                    </li>
                    <li class="item-order" style="background-color:#F7375D;">
                        <p class="title">Đơn hàng đang giao</p>
                        <p class="quantity">
                            <?php
                            if (isset($_SESSION['DangGiao'])) {
                                echo $_SESSION['DangGiao'];
                            } else {
                                echo $soDonDangGiao;
                            }
                            ?>
                        </p>
                    </li>
                    <li class="item-order" style="background-color:#D448FF;">
                        <p class="title">Đơn hàng đã giao</p>
                        <p class="quantity">
                            <?php
                            if (isset($_SESSION['DaGiao'])) {
                                echo $_SESSION['DaGiao'];
                            } else {
                                echo $soDonDaGiao; 
                            }
                            ?>
                        </p>
                    </li>
                    <li class="item-order" style="background-color:red;">
                        <p class="title">Đơn hàng đã huỷ</p>
                        <p class="quantity">
                            <?php
                            if (isset($_SESSION['DaHuy'])) {
                                echo $_SESSION['DaHuy'];
                            } else {
                                echo $soDonDaHuy;
                            }
                            ?>
                        </p>
                    </li>
                </ul>
                <?php
                unset($_SESSION['ChoXacNhan'],$_SESSION['DangGiao'],$_SESSION['DaGiao'],$_SESSION['DaHuy']);
                ?>
                <div class="form-date">
                    <div>
                        <form action="/Project_WebBanHang/Action-Controller/ThongKeController/ThongKe_action.php"
                            method="post">
                            <label class="title-form" for="DOANHTHU">DOANH THU:</label>
                            <p>Từ:</p>
                            <input type="datetime-local" id="DOANHTHU1" name="DOANHTHU1" value="<?php echo isset($_SESSION['Ngaydau']) ? $_SESSION['Ngaydau'] : '';?>">
                            <p>Đến:</p>
                            <input type="datetime-local" id="DOANHTHU2" name="DOANHTHU2" value="<?php echo isset($_SESSION['NgaySau']) ? $_SESSION['NgaySau'] : '';?>">
                            <br>
                            <br>
                            <button style="border:1px solid #ccc;border-radius:3px;" type="submit">Thống kê</button>
                        </form>
                    </div>
                    <?php unset($_SESSION['NgaySau'],$_SESSION['Ngaydau']) ?>
                    <?php
                      if (isset($_SESSION['tongTien'])) {
                        $tongTien = $_SESSION['tongTien'];
                        echo "<p>Tổng tiền: " . $tongTien . "</p>";
                        unset($_SESSION['tongTien']);
                    } else {
                        echo "0";
                    }
                    ?>
                    <!-- <div class="chart-container">
                        <div class="chart-title">Biểu đồ thống kê</div>
                        <div class="chart">
                            <?php
                            // Lấy dữ liệu thống kê từ session
                            $thongKe = $_SESSION['thongKe'];

                            // Tạo các cột biểu đồ dựa trên dữ liệu thống kê
                            foreach ($thongKe as $item) {
                                $month = $item['month'];
                                $tongTien = $item['tongTien'];

                                // Tính chiều cao của cột dựa trên tổng tiền
                                $height = $tongTien / 100; // Giả sử mỗi đơn vị là 100
                            
                                echo '<div class="bar" style="height: ' . $height . '%;"></div>';
                                echo '<div class="label">' . $month . '</div>';
                            }
                            ?>
                        </div>
                    </div> -->
                </div>
                <?php
                if (isset($_SESSION['error-date'])) {
                    $errorDate = $_SESSION['error-date'];
                    echo "<p> " . $errorDate . "</p>";
                    unset($_SESSION['error-date']);
                }
                ?>
            </div>
        </div>

    </div>
</body>

</html>