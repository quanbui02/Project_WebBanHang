<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/ImgProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
session_start();
$listGroup = getAllListGroup();
$lengtGroup = count($listGroup);
$listImgs = unserialize($_SESSION['imgProducts']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
</head>
<body>
    <div class="id">Mã sản phẩm: <?php echo $_SESSION["product"]->getPrID(); ?> </div>
    <div class="name">Tên sản phẩm: <?php echo $_SESSION["product"]->getPrName(); ?> </div>
    <div class="groupName">Thuộc danh mục: <?php 
    for($i =0 ; $i <$lengtGroup; $i++) {
        if($_SESSION["product"]->getGrID() == $listGroup[$i]->getGrID()) {
            echo $listGroup[$i]->getNameGroup(); 
        }
    }
    ?> </div>
    <div class="size">Kích cỡ sản phẩm: <?php echo $_SESSION["product"]->getSize(); ?> </div>
    <div class="quantity">Số lượng sản phẩm: <?php echo $_SESSION["product"]->getQuantity(); ?> </div>
    <div class="price">Giá sản phẩm: <?php echo $_SESSION["product"]->getPrice(); ?> </div>
    <div class="description">Mô tả sản phẩm: <?php 
    if($_SESSION["product"]->getDes() == "") {
        echo "Chưa có mô tả sản phẩm";
    }
    else {
        echo $_SESSION["product"]->getDes(); 
    }
    ?> </div>
    <div class="image">
        <p>Ảnh đại diện sản phẩm</p>
        <img src="/Project_WebBanHang/Upload/img/<?php echo $_SESSION["product"]->getImg(); ?>" alt="Product Image" style="width:300px;height:300px;object-fit:cover;">
    </div>
    <label for="">Ảnh chi tiết sản phẩm</label>
    <div class="images">
        <?php
        foreach ($listImgs as $imgProduct) {
            ?>
            <img style="width:150px;height:150px;object-fit:cover;" src="/Project_WebBanHang/Upload/imgDetail/<?php echo $imgProduct->getImg() ?>" >
            <?php
        }
        ?>
    </div>
    <div class="Active_gr">Hoạt động: <?php if($_SESSION["product"]->getAct() == 1) {
        ?> <p>đang hoạt động</p> <?php
    }
    else {
        ?>
        <p>không hoạt động</p>
        <?php
    }
    ?> 
    </div>
    <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">
        Tro Lai
    </a>
</body>

</html>