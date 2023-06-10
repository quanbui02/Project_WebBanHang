<?php 
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Order.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/OrderDetail.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thông tin người dùng và sản phẩm</title>
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/order_detail.css">
</head>
<body>
    <h1>Thông tin người dùng và sản phẩm</h1>
    <?php
    session_start();

    // Kiểm tra xem đã lưu thông tin user và products trong $_SESSION chưa
    if (isset($_SESSION["user"]) && isset($_SESSION["products"])) {
        $user = $_SESSION["user"];
        $products = $_SESSION["products"];

        ?>
        <div class="user_inf">
        <h2>Thông tin người dùng</h2>
        <p>Tên người dùng: <?= $user->getUserName() ?></p>
        <p>Họ tên đầy đủ: <?= $user->getFullName() ?></p>
        <p>Địa chỉ: <?= $user->getAddress() ?></p>
        <p>Số điện thoại: <?= $user->getPhone() ?></p></div>

<div class="pro_inf">
        <h2>Thông tin sản phẩm</h2>
        <table id="detail_order">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Kích cỡ</th>
                <th>Màu sắc</th>
                <th>Mô tả</th>
                <th>Ảnh</th>
            </tr>
            <?php foreach ($products as $item) {
                $product = $item["product"];
                $orderDetail = $item["orderDetail"];
                ?>
                <tr>
                    <td><?= $product->getPrID() ?></td>
                    <td><?= $product->getPrName() ?></td>
                    <td><?= $product->getPrice() ?></td>
                    <td><?= $product->getQuantity() ?></td>
                    <td><?= $product->getSize() ?></td>
                    <td><?= $product->getColor() ?></td>
                    <td><?= $product->getDes() ?></td>
                    <td><img src="<?= $product->getImage() ?>"></td>
                </tr>
            <?php } ?>
        </table></div>
    <?php } else { ?>
        <p>Không có thông tin user và sản phẩm.</p>
    <?php } ?>
</body>
</html>
