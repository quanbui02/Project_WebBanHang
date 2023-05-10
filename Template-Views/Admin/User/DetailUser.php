<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết thành viên</title>
</head>
<body>
    <div class="ID">Mã Người dùng: <?php echo $_SESSION["user"]->getUserID(); ?> </div>
    <div class="name_gr">Tài khoản: <?php echo $_SESSION["user"]->getUserName(); ?> </div>
    <div class="name_gr">Mật khẩu: <?php echo $_SESSION["user"]->getPass(); ?> </div>
    <div class="name_gr">Vị trí: <?php echo $_SESSION["user"]->getPos(); ?> </div>
    <div class="name_gr">Tên người dùng: <?php echo $_SESSION["user"]->getFullName(); ?> </div>
    <div class="name_gr">Ngày sinh: <?php echo $_SESSION["user"]->getBirth(); ?> </div>
    <div class="name_gr">Địa chỉ: <?php echo $_SESSION["user"]->getAddress(); ?> </div>
    <div class="name_gr">Email: <?php echo $_SESSION["user"]->getEmail(); ?> </div>
    <div class="name_gr">Điện thoại: <?php echo $_SESSION["user"]->getPhone(); ?> </div>
    <div class="Active_gr">Trạng thái: <?php if($_SESSION["user"]->getAct() == 1) {
        ?> <p>Hoạt động</p> <?php
    }
    else {
        ?>
        <p>Huỷ</p>
        <?php
    }
    ?> 
    </div>
    <a href="/Project_WebBanHang/Template-Views/Admin/User/Index.php">
        Tro Lai
    </a>
</body>

</html>