<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";
session_start();
$date1 = $_SESSION['Ngaydau'];
$date2 = $_SESSION['NgaySau'];
$_SESSION['ChoXacNhan'];
$_SESSION['DangGiao'];
$_SESSION['DaGiao'];
$_SESSION['DaHuy'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/main.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/category.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/Popup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Trang chủ Admin</title>
</head>

<body>
    <div class="container_flex">
        <div class="side-nav">
            <div class="side-nav-inner">
                <ul class="side-nav-menu scrollable">
                    <?php
                    echo sidebar();
                    ?>
                </ul>
            </div>
        </div>
        <div class="container_admin">
            <div class="content_Admin">
                <span>TRANG CHỦ QUẢN TRỊ</span>
            </div>
            <div class="content">
            <ul>
                    <li><p>Đơn hàng đang chờ xác nhận</p>
                    <p><?php echo $_SESSION['ChoXacNhan']; ?></p></li>
                    <li><p>Đơn hàng đang giao</p>
                    <p><?php echo $_SESSION['DangGiao']; ?></p></li>
                    <li><p>Đơn hàng đã giao</p>
                    <p><?php echo $_SESSION['DaGiao']; ?></p></li>
                    <li><p>Đơn hàng đã huỷ</p>
                    <p><?php echo $_SESSION['DaGiao']; ?></p></li>
                </ul>
                <!-- <div class="item">
                    <div class="item-detail">
                        <span>Đơn hàng hôm nay</span>

                    </div>
                </div> -->
                <form action="/Project_WebBanHang/Action-Controller/ThongKeController/ThongKe_action.php" method="post">
                    <label for="DOANHTHU">DOANH THU:</label>
                    <p>Từ:</p>
                    <input type="datetime-local" id="DOANHTHU1" name="DOANHTHU1" value="<?php echo $date1 ?>">
                    <p>Đến:</p>
                    <input type="datetime-local" id="DOANHTHU2" name="DOANHTHU2" value="<?php echo $date2 ?>">
                    <br>
                    <br>
                    <button style="border:1px solid #ccc;border-radius:3px;" type="submit">Thống kê</button>
                </form>
                <?php
                if (isset($_SESSION['tongTien'])) {
                    $tongTien = $_SESSION['tongTien'];
                    echo "<p>Tổng tiền: " . $tongTien . "</p>";
                    unset($_SESSION['tongTien']);
                }
                else {
                    echo "<p> Không có dữ liệu trong thời gian này</p>";
                }

                if (isset($_SESSION['error-date'])) {
                    $errorDate = $_SESSION['error-date'];
                    echo "<p>Lỗi: " . $errorDate . "</p>";
                    unset($_SESSION['error-date']);
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>