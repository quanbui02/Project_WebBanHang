<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Order.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/OrderDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/time.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/state.php";


session_start();

if ($_SESSION["login"] == false) {
    header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
}

$listOrders = getListOrder();
$total_pages = getIndexPageOrder();
$page = isset($_GET['pI']) ? $_GET['pI'] : 1;
$lengthOrders = count($listOrders);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/mainHeader.css">
    <link rel="stylesheet" href="../../../assets/css/User/user.css">
    <link rel="stylesheet" href="../../../assets/css/popUpModel.css">
    <link rel="stylesheet" href="../../../assets/css/pagination.css">
    <link rel="stylesheet" href="../../../assets/css/GiftCode/gift.css">
    <link rel="stylesheet" href="../../../assets/css/ToastMessage/ToastMessage.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <title>Quản lý đơn hàng</title>
    </style>

</head>

<body>
    <div class="job">
        <div class="header">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path xmlns="http://www.w3.org/2000/svg" d="M512 503.5H381.7a48 48 0 01-45.3-32.1L265 268.1l-9-25.5 2.7-124.6L338.2 8.5l23.5 67.1L512 503.5z" fill="#0473ff" data-original="#28b446" />
                    <path xmlns="http://www.w3.org/2000/svg" fill="#0473ff" data-original="#219b38" d="M361.7 75.6L265 268.1l-9-25.5 2.7-124.6L338.2 8.5z" />
                    <path xmlns="http://www.w3.org/2000/svg" d="M338.2 8.5l-82.2 234-80.4 228.9a48 48 0 01-45.3 32.1H0l173.8-495h164.4z" fill="#0473ff" data-original="#518ef8" />
                </svg>
                Admin
            </div>
            <div class="header-menu">
                <a href="/Project_WebBanHang/Template-Views/Admin/Shared/Index.php">Trang chủ</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">Sản phẩm</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Category/Index.php">Danh mục sản phẩm</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/User/Index.php">Khách hàng</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Order/Index.php" class="active">Đơn hàng </a>
                <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php">Khuyến Mãi</a>
            </div>
            <div class="user-settings">
                <a href="/Project_WebBanHang/Action-Controller/LoginController/Logout_action.php" class="logout-btn">Đăng xuất</a>
            </div>
        </div>
        <div class="wrapper">
<<<<<<< HEAD
            <h3 style="text-align: center;">Danh sách đơn hàng</h3>
            <form class="search-menu" action="/Project_WebBanHang/Action-Controller/OrderController/Search-Order.php">
=======
        <h3 style="text-align: center;">Danh sách đơn hàng</h3>
        <form class="search-menu" action="/Project_WebBanHang/Action-Controller/OrderController/Search-Order.php">
>>>>>>> 3da906a (updateUIorder)
                <div class="search-salary">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="currentColor" stroke-width=".4">
                        <path d="M12.6 18H9.8a.8.8 0 010-1.5h2.8a.9.9 0 000-1.8h-1.2a2.4 2.4 0 010-4.7h2.8a.8.8 0 010 1.5h-2.8a.9.9 0 000 1.8h1.2a2.4 2.4 0 010 4.7z" stroke="currentColor" />
                        <path d="M12 20a.8.8 0 01-.8-.8v-2a.8.8 0 011.6 0v2c0 .5-.4.8-.8.8zM12 11.5a.8.8 0 01-.8-.8v-2a.8.8 0 011.6 0v2c0 .5-.4.8-.8.8z" stroke="currentColor" />
                        <path d="M21.3 23H2.6A2.8 2.8 0 010 20.2V3.9C0 2.1 1.2 1 2.8 1h18.4C22.9 1 24 2.2 24 3.8v16.4c0 1.6-1.2 2.8-2.8 2.8zM2.6 2.5c-.6 0-1.2.6-1.2 1.3v16.4c0 .7.6 1.3 1.3 1.3h18.4c.7 0 1.3-.6 1.3-1.3V3.9c0-.7-.6-1.3-1.3-1.3z" stroke="currentColor" />
                        <path d="M23.3 6H.6a.8.8 0 010-1.5h22.6a.8.8 0 010 1.5z" stroke="currentColor" />
                    </svg>
                    <input name="search-user" id="search" placeholder="Tìm kiếm..." value />
                </div>
                <button class="search-button">Tìm kiếm</button>
<<<<<<< HEAD
            </form>
            <div>
                <div class="container">
                    <div class="table">
                        <div class="table-header">
                            <div class="header__item"><a id="ID" class="filter__link filter__link--number" href="#">ID</a></div>
                            <div class="header__item"><a id="account" class="filter__link" href="#">Ngày tạo</a></div>
                            <div class="header__item"><a class="filter__link" href="#">Khách hàng</a></div>
                            <div class="header__item"><a class="filter__link filter__link--number" href="#">Email</a>
                            </div>
                            <div class="header__item"><a class="filter__link filter__link--number" href="#">Số điện
                                    thoại</a>
                            </div>
                            <div class="header__item"><a id="name" class="filter__link" href="#">Trạng thái</a>
                            </div>
                            <div class="header__item"><a class="filter__link filter__link--number" href="#">Thao tác</a>
                            </div>
                        </div>
                        <div class="table-content">
                            <?php
                            if ($lengthOrders > 0) {
                                foreach ($listOrders as $orderData) {
                                    $order = $orderData['order'];
                                    $user = $orderData['user'];
                            ?>
                                    <div class="table-row">
                                        <div class="table-data"><?php echo $order->getOrderID(); ?></div>
                                        <div class="table-data"><?php echo convertDateTime($order->getDate()); ?></div>
                                        <div class="table-data"><?php echo $user->getUserName(); ?></div>
                                        <div class="table-data"><?php echo $user->getEmail(); ?></div>
                                        <div class="table-data"><?php echo $user->getPhone(); ?></div>
                                        <div class="table-data"><?php echo statusOrder($order->getStatus()); ?></div>
                                        <div class="table-data">
                                            <div class="item-edit">
                                                <a title="Chi tiết" href="/Project_WebBanHang/Action-Controller/OrderController/DetailOrder_action.php?id=<?php echo $order->getOrderID(); ?>" class="btn mx-1">
                                                    Chi tiết
                                                </a>
                                            </div>
                                        </div>
                                        <!-- <?php if ($order->getStatus() == "payed") { ?>
                                            <div class="item-edit">
                                                <a title="Xác nhận đơn hàng" href="/Project_WebBanHang/Action-Controller/OrderController/OrderConfirmProduct_action.php?id=<?php echo $order->getOrderID(); ?>" class="btn mx-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        <?php } ?> -->
                                    </div>
                            <?php
                                }
                            } else {
                                echo "KHÔNG CÓ SẢN PHẨM NÀO!";
                            }
                            ?>
                        </div>
                    </div>
                </div>
=======
        </form>
            <div>
            <div class="container">
    <div class="table">
        <div class="table-header">
            <div class="header__item"><a id="ID" class="filter__link filter__link--number" href="#">ID</a></div>
            <div class="header__item"><a id="account" class="filter__link" href="#">Ngày tạo</a></div>
            <div class="header__item"><a class="filter__link" href="#">Khách hàng</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" href="#">Email</a>
            </div>
            <div class="header__item"><a class="filter__link filter__link--number" href="#">Số điện thoại</a>
            </div>
            <div class="header__item"><a id="name" class="filter__link" href="#">Trạng thái</a>
            </div>
            <div class="header__item"><a class="filter__link filter__link--number" href="#">Thao tác</a>
            </div>
        </div>
        <div class="table-content">
    <?php
    if ($lengthhOrders > 0) {
        foreach ($listOrders as $orderData) {
            $order = $orderData['order'];
            $user = $orderData['user'];
    ?>
            <div class="table-row">
                <div class="table-data"><?php echo $order->getOrderID(); ?></div>
                <div class="table-data"><?php echo convertDateTime($order->getDate()); ?></div>
                <div class="table-data"><?php echo $user->getUserName(); ?></div>
                <div class="table-data"><?php echo $user->getEmail(); ?></div>
                <div class="table-data"><?php echo $user->getPhone(); ?></div>
                <div class="table-data"><?php echo statusOrder($order->getStatus()); ?></div>
                <div class="table-data">
                    <div class="item-edit">
                        <a title="Chi tiết" href="/Project_WebBanHang/Action-Controller/OrderController/DetailOrder_action.php?id=<?php echo $order->getOrderID(); ?>" class="btn mx-1">
                            Chi tiết
                        </a>
                    </div>
                    <?php if ($order->getStatus() == "payed") { ?>
                        <div class="item-edit">
                            <a title="Xác nhận đơn hàng" href="/Project_WebBanHang/Action-Controller/OrderController/OrderConfirmProduct_action.php?id=<?php echo $order->getOrderID(); ?>" class="btn mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                                </svg>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
    <?php
        }
    } else {
        echo "KHÔNG CÓ SẢN PHẨM NÀO!";
    }
    ?>
</div>
    </div>
</div>
>>>>>>> 3da906a (updateUIorder)
                <div class="Pagination">
                    <ul class="pagination">
                        <?php if ($page > 1) { ?>
                            <li class="page-item"><a href="?pI=<?php echo ($page - 1); ?>" class="page-link text-dark">Trở
                                    lại</a></li>
                        <?php } ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a href="?pI=<?php echo $i; ?>" class="page-link text-dark"><?php echo $i; ?></a></li>
                        <?php } ?>

                        <?php if ($page < $total_pages) { ?>
                            <li class="page-item"><a href="?pI=<?php echo ($page + 1); ?>" class="page-link text-dark">Tiếp</a></li>
                        <?php } ?>
                    </ul>
                </div>

            </div>

        </div>
    </div>
    <div id="toast" class="toast"></div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../../../assets/css/User/user.js"></script>
<script src="../../../assets/css/ToastMessage/ToastMessage.js"></script>

<script>
    //

    var properties = [
        'ID',
        'account',
        'name',
        'address',
    ];

    $.each(properties, function(i, val) {

        var orderClass = '';

        $("#" + val).click(function(e) {
            e.preventDefault();
            $('.filter__link.filter__link--active').not(this).removeClass('filter__link--active');
            $(this).toggleClass('filter__link--active');
            $('.filter__link').removeClass('asc desc');

            if (orderClass == 'desc' || orderClass == '') {
                $(this).addClass('asc');
                orderClass = 'asc';
            } else {
                $(this).addClass('desc');
                orderClass = 'desc';
            }

            var parent = $(this).closest('.header__item');
            var index = $(".header__item").index(parent);
            var $table = $('.table-content');
            var rows = $table.find('.table-row').get();
            var isSelected = $(this).hasClass('filter__link--active');
            var isNumber = $(this).hasClass('filter__link--number');

            rows.sort(function(a, b) {

                var x = $(a).find('.table-data').eq(index).text();
                var y = $(b).find('.table-data').eq(index).text();

                if (isNumber == true) {

                    if (isSelected) {
                        return x - y;
                    } else {
                        return y - x;
                    }

                } else {

                    if (isSelected) {
                        if (x < y) return -1;
                        if (x > y) return 1;
                        return 0;
                    } else {
                        if (x > y) return -1;
                        if (x < y) return 1;
                        return 0;
                    }
                }
            });

            $.each(rows, function(index, row) {
                $table.append(row);
            });

            return false;
        });

    });
</script>
