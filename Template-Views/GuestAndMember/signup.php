<?php
session_start();
?>
<html>
    <head>
    <link rel="stylesheet" href="signup.css">
    </head>
    <body>
    <div class="signup-form">
        <!-- <form action="/DoAnCNW/Action-Controler/signup_action.php"> -->
        <form action="/Project_WebBanHang/Action-Controler/signup_action.php">
            <h2>Đăng ký</h2>
            <input type="text" name="phone" placeholder = "Số điện thoai "><br>
            <input type="text" name="user-name" placeholder="Tên đăng nhập"><br>
            <input type="password" name="pass" placeholder="Mật khẩu"><br>
            <?php if(empty($_SESSION["signup-err"])){echo "";}else{ echo "<span style='color:red;font-size:14px;'>".$_SESSION["signup-err"]."</span>" ;} ?>
            <button>Đăng ký</button><br>
        </form>
    </div>
    </body>
</html>