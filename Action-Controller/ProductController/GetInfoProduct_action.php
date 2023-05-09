<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/ImgProduct.php";
session_start();
$ID = intval($_GET["id"]);
$conn = new mysqli("127.0.0.1", "root", "","csdldoan");
// $sql = "SELECT * FROM product INNER JOIN group_product on product.grID = group_product.grID where product.proID = ".$ID;
$sql =  "select * from product where proID = ".$ID;
$result = $conn->query($sql);
$getImgs = "SELECT * FROM image_products WHERE idProduct = ".$ID;
$getImgsProduct = $conn->query($getImgs);
$imgProducts = array();
while ($row = $getImgsProduct->fetch_assoc()) {
    $imgProduct = new ImgProduct($row["id"],$row["idProduct"],$row["image"]);
    $imgProducts[] = $imgProduct;
}
$conn->close();
$_SESSION['InfoImgProducts'] = serialize($imgProducts);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $_SESSION["InfoProduct"] = new Product(
        $row["proID"],
        $row["grID"],
        $row["proName"],
        $row["price"],
        $row["quantity"],
        $row["size"],
        $row["color"],
        $row["description"],
        $row["active"],
        $row["image"]
    );
    header("Location: /Project_WebBanHang/Template-Views/Admin/Product/EditProduct.php?id=$ID");
}
?>