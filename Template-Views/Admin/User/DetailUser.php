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
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/u_detail.css">
    <title>Chi tiết thành viên</title>
</head>
<body>
    <div class="container">
        <div class="ID">Mã Người dùng: </div>
           <div id ="id"><?php echo $_SESSION["user"]->getUserID(); ?></div>   

        <div class="name_gr">Tài khoản:</div>
             <div id ="user"> <?php echo $_SESSION["user"]->getUserName(); ?></div>  

        <div class="name_gr">Mật khẩu: </div>
            <div id="pass"><?php echo $_SESSION["user"]->getPass(); ?> </div> 

        <div class="name_gr">Vị trí: </div>
            <div id="position"><?php echo $_SESSION["user"]->getPos(); ?> </div>

        <div class="name_gr">Tên người dùng: </div>
            <div id = "name"><?php echo $_SESSION["user"]->getFullName(); ?> </div>

        <div class="name_gr">Ngày sinh: </div>
            <div id ="birth"><?php echo $_SESSION["user"]->getBirth(); ?></div> 

        <div class="name_gr">Địa chỉ: </div>
            <div id="address"><?php echo $_SESSION["user"]->getAddress(); ?></div> 

        <div class="name_gr">Email: </div>
            <div id ="email"><?php echo $_SESSION["user"]->getEmail(); ?> </div>

        <div class="name_gr">Điện thoại:</div>
             <div id ="phone"><?php echo $_SESSION["user"]->getPhone(); ?></div>

        <div class="Active_gr">Trạng thái:</div>
         <?php if($_SESSION["user"]->getAct() == 1) {
            ?> <p>Hoạt động</p> <?php
        }
        else {
            ?>
            <p>Huỷ</p>
            <?php
        }
        ?> 
        <a href="/Project_WebBanHang/Template-Views/Admin/User/Index.php" class="btn_back">
            Trở lại
        </a>
    </div>
</body>

</html>