<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/money.php";

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/mainHeader.css">
    <link rel="stylesheet" href="../../../assets/css/User/user.css">
    <link rel="stylesheet" href="../../../assets/css/Home/index.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/Home/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />

    <title>Trang chủ Admin</title>
</head>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>
    <div class="content">
        <div class="job">
            <div class="header">
                <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M512 503.5H381.7a48 48 0 01-45.3-32.1L265 268.1l-9-25.5 2.7-124.6L338.2 8.5l23.5 67.1L512 503.5z"
                            fill="#0473ff" data-original="#28b446" />
                        <path xmlns="http://www.w3.org/2000/svg" fill="#0473ff" data-original="#219b38"
                            d="M361.7 75.6L265 268.1l-9-25.5 2.7-124.6L338.2 8.5z" />
                        <path xmlns="http://www.w3.org/2000/svg"
                            d="M338.2 8.5l-82.2 234-80.4 228.9a48 48 0 01-45.3 32.1H0l173.8-495h164.4z" fill="#0473ff"
                            data-original="#518ef8" />
                    </svg>
                    Admin
                </div>
                <div class="header-menu">
                    <a href="/Project_WebBanHang/Template-Views/Admin/Shared/Index.php" class="active">Trang chủ</a>
                    <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">Sản phẩm</a>
                    <a href="/Project_WebBanHang/Template-Views/Admin/Category/Index.php">Danh mục sản phẩm</a>
                    <a href="/Project_WebBanHang/Template-Views/Admin/User/Index.php">Khách hàng</a>
                    <a href="/Project_WebBanHang/Template-Views/Admin/Order/Index.php">Đơn hàng </a>
                    <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php">Khuyễn Mãi</a>
                </div>
                <div class="user-settings">
                    <a href="/Project_WebBanHang/Action-Controller/LoginController/Logout_action.php"
                        class="logout-btn">Đăng xuất</a>
                </div>
            </div>

            <div class="row main-content">
                <h2 class="title-form" for="DOANHTHU" style="margin-bottom: 24px; font-size: 24px;">TÌNH TRẠNG TẤT CẢ
                    ĐƠN HÀNG: </h2>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5"> <?php
                                if (isset($_SESSION['ChoXacNhan'])) {
                                  echo $_SESSION['ChoXacNhan'];
                                } else {
                                  echo $soDonDangChoXacNhan;
                                }
                                ?> Đơn hàng chờ xác nhận</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">Không có lỗi</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5"><?php
                              if (isset($_SESSION['DangGiao'])) {
                                echo $_SESSION['DangGiao'];
                              } else {
                                echo $soDonDangGiao;
                              }
                              ?> Đơn hàng đang giao</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">Không có lỗi</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5"><?php
                              if (isset($_SESSION['DaGiao'])) {
                                echo $_SESSION['DaGiao'];
                              } else {
                                echo $soDonDaGiao;
                              }
                              ?> Đơn hàng đã giao</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">Không có lỗi</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-support"></i>
                            </div>
                            <div class="mr-5"> <?php
                                if (isset($_SESSION['DaHuy'])) {
                                  echo $_SESSION['DaHuy'];
                                } else {
                                  echo $soDonDaHuy;
                                }
                                ?> Đơn hàng đã hủy</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">Không có lỗi</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <?php
          unset($_SESSION['ChoXacNhan'], $_SESSION['DangGiao'], $_SESSION['DaGiao'], $_SESSION['DaHuy']);
         ?>
            <div class="chart">
                <h2 class="title-form" for="DOANHTHU">DOANH THU:
                    <?php if(isset($_SESSION['tongTien'])) { echo formatCurrency($_SESSION['tongTien']); } else {echo '';}?>
                </h2>
                <form action="/Project_WebBanHang/Action-Controller/ThongKeController/ThongKe_action.php" method="post"
                    class="form-container">
                    <div class="input-group">
                        <p>Từ:</p>
                        <input type="datetime-local" id="DOANHTHU1" name="DOANHTHU1"
                            value="<?php echo isset($_SESSION['Ngaydau']) ? $_SESSION['Ngaydau'] : ''; ?>">
                    </div>
                    <div class="input-group">
                        <p>Đến:</p>
                        <input type="datetime-local" id="DOANHTHU2" name="DOANHTHU2"
                            value="<?php echo isset($_SESSION['NgaySau']) ? $_SESSION['NgaySau'] : ''; ?>">
                    </div>
                    <button type="submit" class="btn-submit">Thống kê</button>
                </form>


                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</body>

<?php
$month = $_SESSION['listThangThongKe'];
$labels = [];
$data = [];

$monthNames = array(
    'Jan' => 'T1',
    'Feb' => 'T2',
    'Mar' => 'T3',
    'Apr' => 'T4',
    'May' => 'T5',
    'Jun' => 'T6',
    'Jul' => 'T7',
    'Aug' => 'T8',
    'Sep' => 'T9',
    'Oct' => 'T10',
    'Nov' => 'T11',
    'Dec' => 'T12'
);

foreach ($month as $item) {
    $dateString = $item['thang'] . '-' . $item['nam'];
    $date = DateTime::createFromFormat('m-Y', $dateString);
    $monthKey = $date->format('M');
    $label = $monthNames[$monthKey] . '-' . $date->format('Y');
    $labels[] = $label;
    $data[] = $item['tongTien'];
}
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('myChart').getContext('2d');
    var data = {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Doanh thu',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };
    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
});
</script>

</html>