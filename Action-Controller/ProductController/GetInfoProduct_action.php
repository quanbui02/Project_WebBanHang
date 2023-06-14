<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Feedback.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/ImgProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$ID = intval($_GET["id"]);
$conn = connectDb();
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

$listFeedBackSQL = "SELECT * FROM feedback INNER JOIN user on feedback.userID = user.userID WHERE proID = ".$ID;
$resultFeedBacks = $conn->query($listFeedBackSQL);
$listFeedBacks = array();

if ($resultFeedBacks->num_rows > 0) {
    while ($resultFeedBack = $resultFeedBacks->fetch_assoc()) {
        $feedback = new Feedback(
            $resultFeedBack["fbID"], 
            $resultFeedBack["proID"], 
            $resultFeedBack["userID"],
            $resultFeedBack["fbTime"], 
            $resultFeedBack["fbContent"]
        );

        $user = new User(
            $resultFeedBack["userID"],
            $resultFeedBack["userName"],
            $resultFeedBack["pass"],
            $resultFeedBack["position"],
            $resultFeedBack["fullName"],
            $resultFeedBack["birth"],
            $resultFeedBack["address"],
            $resultFeedBack["email"],
            $resultFeedBack["phone"],
            $resultFeedBack["active"]
        );

        $listFeedBacks[] = array(
            "feedback" => $feedback,
            "user" => $user
        );
    }
}

$_SESSION["listFeedBacks"] = $listFeedBacks;

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
}
$conn->close();

header("Location: /Project_WebBanHang/Template-Views/Admin/Product/EditProduct.php?id=$ID");
?>