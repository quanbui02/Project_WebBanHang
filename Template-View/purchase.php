<?php 
include_once "C:/xampp/htdocs/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/GhepCode/Action-Controler/function_handle_sql.php";

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
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h3>Trang thanh toán</h3>
        <div class="infor-bill">
            <div class="name">Hoá đơn <?php echo $code; ?></div>
            <div class="money">Tổng tiền: <?php echo $money; ?> VND</div>
            <div class="gifcode">
                <form action="/GhepCode/Action-Controler/purchase_action.php" method="post">
                    <input type="text" name="giftcode" placeholder="Nhập mã giảm giá/giftcode tại đây.."><br>
                    <input type="text" name="address" placeholder="Địa chỉ" value="<?php echo $_SESSION["user-infor"]->getAddress(); ?>"><br>
                    <input type="text" name="phone" placeholder="Số điện thoại" value="<?php echo $_SESSION["user-infor"]->getPhone(); ?>"><br>
                    <?php if(empty($_SESSION["error-purchase"])){echo "";}else{echo "<span style='color:red;'>".$_SESSION["error-purchase"]."</span><br>";} ?>
                    <input type="submit" value="Xác nhận">
                </form>
                <button><a href="/GhepCode/Template-View/cart.php">Trở lại</a></button>
            </div>
        </div>
    </body>
</html>