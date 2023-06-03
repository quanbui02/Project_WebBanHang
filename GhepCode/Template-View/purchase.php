<?php 
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/function_handle_sql.php";

session_start();
$code = $_GET["code"];
$money = $_GET["money"];
$id=$_GET["id"];
$_SESSION["money"] = $money;
$_SESSION["code"] = $code;
$_SESSION["id-order"]=$id;
?>
<html>
    <head>
        <link rel="stylesheet" href="purchase.css">
    </head>
    <body>
        <div class="header">
            <div class="back"><button><a href="/Project_WebBanHang/GhepCode/Template-View/cart.php"><-Trở về</a></button></div>
            <div class="tag"><h2>Trang thanh toán</h2></div>
        </div>
        <div class="infor-bill">
            <h3>Thông tin hoá đơn</h3>
            <div class="name" style="font-style:italic;font-weight:500;">Mã hoá đơn <?php echo $code; ?></div>
            <div class="money" style="font-style:italic;font-weight:500;">Tổng tiền: <?php echo $money; ?> VND</div>
            <div class="infor">
                <form action="/Project_WebBanHang/GhepCode/Action-Controler/purchase_action.php" method="post">
                    <div class="giftcode">
                        <div class="label">Mã giảm giá: </div>
                        <div class="content">
                           <input type="text" name="giftcode" placeholder="Nhập mã giảm giá/giftcode tại đây.."><br> 
                        </div>
                    </div>
                    <div class="address">
                        <div class="label">Địa chỉ nhận hàng: </div>
                        <div class="content">
                           <input type="text" name="address" placeholder="Địa chỉ" value="<?php echo $_SESSION["user-infor"]->getAddress(); ?>"><br>
                        </div>
                    </div>
                    <div class="phone">
                        <div class="label">Số điện thoại: </div>
                        <div class="content">
                           <input type="text" name="phone" placeholder="Số điện thoại" value="<?php echo $_SESSION["user-infor"]->getPhone(); ?>"><br>
                        </div>
                    </div>
                    <?php if(empty($_SESSION["error-purchase"])){echo "";}else{echo "<span style='color:red;'>".$_SESSION["error-purchase"]."</span><br>";} ?>
                    <div class="submit">
                           <input type="submit" value="Xác nhận">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>