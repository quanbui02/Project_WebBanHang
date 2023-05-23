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
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/cate_detail.css">
    <title>Chi tiết danh mục</title>
</head>
<body>
    <div class="container">
            
            <div class="id_gr">Mã danh mục:</div>
            <div class="id"><?php echo $_SESSION["group"]->getGrID(); ?></div>
            
            <div class="name_gr">Tên danh mục:</div> 
            <div class="name"><?php echo $_SESSION["group"]->getNameGroup(); ?></div>
            <div class="Active_gr">Hoạt động: </div>
        <?php if($_SESSION["group"]->getAct() == 1) {?> <p> Đang hoạt động</p> <?php
        }
        else {
            ?>
            <p>Không hoạt động</p>
            <?php
        }
        ?> 
        
        <a href="/Project_WebBanHang/Template-Views/Admin/Category/Index.php" class="btn_back">
            Trở lại
        </a>
     </div>
</body>

</html>