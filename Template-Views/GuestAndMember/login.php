<?php
session_start();
?>
<html>
    <head>
    <link rel="stylesheet" href="login.css">
    </head>
    <body>
    <div class="login-form">
        <!-- <form action="/DoAnCNW/Action-Controler/login_action.php"> -->
        <form action="/Project_WebBanHang/Action-Controler/login_action.php">
            <h2>Đăng nhập</h2>
            <input type="text" name="username" placeholder="Tên đăng nhập"><br>
            <input type="password" name="password" placeholder="Mật khẩu"><br><?php if(empty($_SESSION["login-err"])){echo "";}else{echo "<span style= 'color:red;font-szie:14px;'>".$_SESSION["login-err"]."</span><br>";} ?>
            <button>Đăng nhập</button><br>
            <h3>-Hoặc-</h3>
            <!-- <button><a href="/DoAnCNW/Template-View/signup.php">Đăng ký</a></button> -->
            <button><a href="/Project_WebBanHang/Template-View/signup.php">Đăng ký</a></button>
        </form>
    </div>
    </body>
</html>