<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết danh mục</title>
</head>
<body>
    <div class="id_gr">Mã danh mục: <?php echo $_SESSION["group"]->getGrID(); ?> </div>
    <div class="name_gr">Tên danh mục: <?php echo $_SESSION["group"]->getNameGroup(); ?> </div>
    <div class="Active_gr">Hoạt động: <?php if($_SESSION["group"]->getAct() == 1) {
        ?> <p> đang hoạt động</p> <?php
    }
    else {
        ?>
        <p>không hoạt động</p>
        <?php
    }
    ?> 
    </div>
    <a href="/Project_WebBanHang/Template-Views/Admin/Category/Index.php">
        Tro Lai
    </a>
</body>

</html>