<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Order.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/OrderDetail.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/money.php";
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/Order_detail.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/Order/OrderDetail.css">
    <link rel="stylesheet" href="../../../assets/css/mainHeader.css">
    <link rel="stylesheet" href="../../../assets/css/User/user.css">
    <link rel="stylesheet" href="../../../assets/css/popUpModel.css">
    <link rel="stylesheet" href="../../../assets/css/pagination.css">
    <link rel="stylesheet" href="../../../assets/css/ToastMessage/ToastMessage.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <title>Chi tiết hóa đơn</title>
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
                <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php">Khuyễn Mãi</a>
            </div>
            <div class="user-settings">
                <a href="/Project_WebBanHang/Action-Controller/LoginController/Logout_action.php" class="logout-btn">Đăng xuất</a>
            </div>
        </div>

        <!-- get info user and list products  -->
        <?php
        session_start();
        $user = $_SESSION["user"];
        $products = $_SESSION["products"];
        ?>

        <section class="section-container">
            <div class="main-heading-wrapper">
                <h1>Chi tiết hóa đơn</h1>
            </div>

            <div class="order-layout">
                <div class="order-details">
                    <div class="order-details__header">
                        <h2 class="order-details__heading">Danh mục sản phẩm</h2>
                    </div>
                    <ul class="order-list">
                        <?php foreach ($products as $item) {
                            $product = $item["product"];
                            $orderDetail = $item["orderDetail"];
                        ?>
                            <li class="order-item">
                                <div class="order-item__img">
                                    <!-- <img src="../../../Upload/img/image.jpg" alt="Image of Hamburg" /> -->
                                    <img src="../../../Upload/img/<?= $product->getImg() ?>" />
                                </div>
                                <div>
                                    <h3 class="order-item__heading"><?= $product->getPrName() ?></h3>
                                    <span class="order-item__code"><?= formatCurrency($product->getPrice()) ?></span>
                                    <div class="order-item__quantity">
                                        <i class="bi bi-box-seam"></i>
                                        <span>Số lượng : <?= $orderDetail->getNumber() ?></span>
                                    </div>
                                </div>
                                <span class="order-item__single-price"><?= formatCurrency($product->getPrice()) ?> x
                                    <?= $orderDetail->getNumber() ?></span>
                                <span class="order-item__total-price">
                                    <?php
                                    $totalProduct = $product->getPrice() * $orderDetail->getNumber();
                                    formatCurrency($totalProduct)
                                    ?>
                                </span>
                            </li>
                        <?php } ?>
                    </ul>

                    <div class="order-summary">
                        <div class="order-summary__left-container">
                            <span>Địa chỉ cơ sở đóng hàng</span>
                            <span>Chi phí vận chuyển (5% giá trị đơn hàng)</span>
                            <span>VAT: (10% giá trị đơn hàng)</span>
                            <span>Total amount</span>
                        </div>
                        <div class="order-summary__right-container">
                            <span>55 Giải Phóng,phường Đồng Tâm, quận Hai Bài Trưng, Hà Nội</span>
                            <span>
                                <?php
                                $totalValue = 0;
                                $totalQuantity = 0;


                                foreach ($products as $item) {
                                    $product = $item["product"];
                                    $orderDetail = $item["orderDetail"];

                                    $totalValue += $product->getPrice() * $orderDetail->getNumber();
                                    $totalQuantity += $orderDetail->getNumber();
                                }
                                $deliveryValue =  $totalValue * 5 / 100;
                                formatCurrency($deliveryValue);
                                ?>
                            </span>
                            <span>
                                <?php
                                $totalValueTax =  $totalValue * 10 / 100;

                                formatCurrency($totalValueTax)
                                ?>
                            </span>
                            <span>
                                <?php
                                formatCurrency($totalValue + $totalValueTax + $deliveryValue)
                                ?>
                            </span>
                            <span>Đã bao gốm tất cả các loại phí</span>
                        </div>
                    </div>
                </div>

                <div class="sidebar">
                    <div class="customer-info">
                        <div class="customer-info__header">
                            <h2 class="customer-info__heading">Thông tin khách hàng</h2>
                            <a href="#">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </div>
                        <div class="customer-info__content">
                            <span class="customer-info__name">Tên nickname: <?= $user->getUserName() ?></span>
                            <span class="customer-info__name">Tên đầy đủ: <?= $user->getFullName() ?></span>
                            <span class="customer-info__name">Địa chỉ: <?= $user->getAddress() ?></span>
                            <span class="customer-info__name">Số điện thoại liên hệ: <?= $user->getPhone() ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cancellation-wrapper">
                <a href="/Project_WebBanHang/Template-Views/Admin/Order/index.php"><button>Quay lại</button></a>
            </div>
        </section>

    </div>

</body>

</html>