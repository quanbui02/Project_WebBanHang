<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";
session_start();
if ($_SESSION["login"] == false) {
    header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
}
$date1 = $_SESSION['Ngaydau'];
$date2 = $_SESSION['NgaySau'];

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
                <span>TRANG CHỦ QUẢN TRỊ</span>
            </div>
            <div class="content">
                <ul>
                    <li>
                        <p>Đơn hàng đang chờ xác nhận</p>
                        <p>
                            <?php if (isset($_SESSION['ChoXacNhan'])) {
                                echo $_SESSION['ChoXacNhan'];
                            } else {
                                echo "0";
                            } ?>
                        </p>
                    </li>
                    <li>
                        <p>Đơn hàng đang giao</p>
                        <p>
                            <?php if (isset($_SESSION['DangGiao'])) {
                                echo $_SESSION['DangGiao'];
                            } else {
                                echo "0";
                            } ?>
                        </p>
                    </li>
                    <li>
                        <p>Đơn hàng đã giao</p>
                        <p>
                            <?php if (isset($_SESSION['DaGiao'])) {
                                echo $_SESSION['DaGiao'];
                            } else {
                                echo "0";
                            } ?>
                        </p>
                    </li>
                    <li>
                        <p>Đơn hàng đã huỷ</p>
                        <p>
                            <?php if (isset($_SESSION['DaHuy'])) {
                                echo $_SESSION['DaHuy'];
                            } else {
                                echo "0";
                            } ?>
                        </p>
                    </li>
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
                } else {
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

    <div class="chart-container">
        <div class="chart-title">Biểu đồ thống kê</div>
        <div class="chart">
        <?php
        // Truy cập vào các biến session để lấy dữ liệu đã tính toán
        $tongTien = $_SESSION['tongTien'];
        $ngayDau = $_SESSION['Ngaydau'];
        $ngaySau = $_SESSION['NgaySau'];
        $choXacNhan = $_SESSION['ChoXacNhan'];
        $dangGiao = $_SESSION['DangGiao'];
        $daGiao = $_SESSION['DaGiao'];
        $daHuy = $_SESSION['DaHuy'];

        // Chia khoảng thời gian thành từng tháng
        $dateFrom = strtotime($ngayDau);
        $dateTo = strtotime($ngaySau);
        while ($dateFrom <= $dateTo) {
            $thang = date('m', $dateFrom);
            $nam = date('Y', $dateFrom);

            // Tính toán chiều cao của cột dựa trên dữ liệu
            $tongTienPercent = ($tongTien / $maxTongTien) * 100;
            $choXacNhanPercent = ($choXacNhan / $maxChoXacNhan) * 100;
            $dangGiaoPercent = ($dangGiao / $maxDangGiao) * 100;
            $daGiaoPercent = ($daGiao / $maxDaGiao) * 100;
            $daHuyPercent = ($daHuy / $maxDaHuy) * 100;

            // Hiển thị các cột trong biểu đồ
            echo '<div class="bar" style="height: '.$tongTienPercent.'%"></div>';
            echo '<div class="bar" style="height: '.$choXacNhanPercent.'%"></div>';
            echo '<div class="bar" style="height: '.$dangGiaoPercent.'%"></div>';
            echo '<div class="bar" style="height: '.$daGiaoPercent.'%"></div>';
            echo '<div class="bar" style="height: '.$daHuyPercent.'%"></div>';

            // Tăng thời gian lên 1 tháng
            $dateFrom = strtotime("+1 month", $dateFrom);
        }
        ?>
    </div>
    </div>
</body>

</html>