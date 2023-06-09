<?php 
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Order.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/OrderDetail.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>User and Product Information</title>
</head>
<body>
    <h1>User and Product Information</h1>
    <?php
    session_start();

    // Kiểm tra xem đã lưu thông tin user và products trong $_SESSION chưa
    if (isset($_SESSION["user"]) && isset($_SESSION["products"])) {
        $user = $_SESSION["user"];
        $products = $_SESSION["products"];

        ?>
        <h2>User Information</h2>
        <p>Username: <?= $user->getUserName() ?></p>
        <p>Full Name: <?= $user->getFullName() ?></p>
        <p>Address: <?= $user->getAddress() ?></p>
        <p>PhoneNumber: <?= $user->getPhone() ?></p>


        <h2>Product Information</h2>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Color</th>
                <th>Description</th>
                <th>Image</th>
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
        </table>
    <?php } else { ?>
        <p>Không có thông tin user và sản phẩm.</p>
    <?php } ?>
</body>
</html>
