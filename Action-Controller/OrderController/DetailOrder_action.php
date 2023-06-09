<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Order.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/OrderDetail.php";


session_start();
$ID = intval($_GET["id"]);
$list = array();
$count = 0;

$conn = connectDb();
$sqlUser = "select * from `order` INNER JOIN `user` on `order`.`userID` = `user`.`userID` where order.orderID = " . $ID;
$resultUser = $conn->query($sqlUser);

$rowUser = $resultUser->fetch_assoc();
$user = new User(
    $rowUser["userID"],
    $rowUser["userName"],
    $rowUser["pass"],
    $rowUser["position"],
    $rowUser["fullName"],
    $rowUser["birth"],
    $rowUser["address"],
    $rowUser["email"],
    $rowUser["phone"],
    $rowUser["active"]
);

$sqlOrderDetail = "select * from `order` INNER JOIN order_detail on `order`.`orderID` = order_detail.orderID INNER JOIN product on order_detail.prID = product.proID where order.orderID = " . $ID;
$resultOrderDetail = $conn->query($sqlOrderDetail);

$products = array(); // Mảng chứa các sản phẩm và order detail

if ($resultOrderDetail->num_rows > 0) {
    while ($rowOrderDetail = $resultOrderDetail->fetch_assoc()) {
        $product = new Product(
            $rowOrderDetail["proID"], 
            $rowOrderDetail["grID"], 
            $rowOrderDetail["proName"],
            $rowOrderDetail["price"], 
            $rowOrderDetail["quantity"], 
            $rowOrderDetail["size"], 
            $rowOrderDetail["color"], 
            $rowOrderDetail["description"], 
            $rowOrderDetail["active"], 
            $rowOrderDetail["image"]
        );

        $orderDetail = new OrderDetail(
            $rowOrderDetail["detailID"],
            $rowOrderDetail["orderID"],
            $rowOrderDetail["proID"],
            $rowOrderDetail["number"]
        );

        $products[] = array(
            "product" => $product,
            "orderDetail" => $orderDetail
        );
    }
}

$_SESSION["user"] = $user;
$_SESSION["products"] = $products;

header("Location: /Project_WebBanHang/Template-Views/Admin/Order/DetailOrder.php?id=$ID");
// select * from `order` INNER JOIN order_detail on `order`.`orderID` = order_detail.orderID INNER JOIN product on order_detail.prID = product.proID where order.orderID = 1;
?>