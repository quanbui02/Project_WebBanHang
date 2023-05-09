<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/ImgProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
session_start();
$CategoryID = $_POST["GroupProduct_ID"];
$ProductName = $_POST["ProductName"];
$ProductPrice = $_POST["ProductPrice"];
$ProductQuantity = $_POST["ProductQuantity"];
$ProductSize = $_POST["ProductSize"];
$ProductColor = $_POST["ProductColor"];
$ProductDescription = $_POST["ProductDescription"];
$Active = 1;
if (trim($ProductName) == "" || trim($ProductPrice) == "" || trim($ProductQuantity) == "" || trim($ProductSize) == "" || trim($ProductColor) == "") {
    $_SESSION["err_value"] = "Dien du thong tin du lieu";
    header("Location: /Project_WebBanHang/Template-Views/Admin/Product/EditProduct.php");
} else {
    if (isset($_FILES['ProductImage']) == true) {
        $tmpName = $_FILES['ProductImage']['tmp_name'];
        $fileName = $_FILES['ProductImage']['name'];
        if(empty($fileName)) {
            $fileName = $_SESSION["InfoProduct"]->getImg();
        }
        else {
            $uploadDir = "C:/xampp/htdocs/Project_WebBanHang/Upload/img/";
            $destination = $uploadDir . $fileName;
            move_uploaded_file($tmpName, $destination);
            $oldFileName = $_SESSION["InfoProduct"]->getImg();
            if (!empty($oldFileName) && file_exists($uploadDir . $oldFileName)) {
                unlink($uploadDir . $oldFileName);
            }
        }
        $updateProduct = new Product(
            (int)$_SESSION["InfoProduct"]->getPrID(),
            $CategoryID,
            $ProductName,
            $ProductPrice,
            $ProductQuantity,
            $ProductSize,
            $ProductColor,
            $ProductDescription,
            $_SESSION["InfoProduct"]->getAct(),
            $fileName
        );
        updateProduct($updateProduct);
    } 
    // else {
    //     $conn = new mysqli("127.0.0.1", "root", "", "csdldoan");
    //     $sql = "UPDATE product SET grID = $CategoryID,proName = $ProductName,price=$ProductPrice,quantity = $ProductQuantity, size = $ProductSize ,color = $ProductColor ,description = $ProductDescription  where proID = " . $prID;
    //     $result = $conn->query($sql);
    //     $conn->close();
    // }
    if (isset($_FILES['images']) == true) {
        $file_tmps = $_FILES['images']['tmp_name'];
        $file_names = $_FILES['images']['name'];
        if(!empty($file_names)) {
            foreach ($file_names as $key => $value) {
                move_uploaded_file($file_tmps[$key], "C:/xampp/htdocs/Project_WebBanHang/Upload/imgDetail/" . $value);
            }
            foreach ($file_names as $key => $value) {
                if(!empty($value)) {
                    $newImage = new ImgProduct(
                        0,
                        (int)$_SESSION["InfoProduct"]->getPrID(),
                        $value
                    );
                    createDetailImg($newImage);
                }
            }
        }
    }
    $_SESSION["err_value"] = "";
    header("Location: /Project_WebBanHang/Template-Views/Admin/Product/Index.php");
}
