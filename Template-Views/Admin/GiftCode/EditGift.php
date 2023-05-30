<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/giftcode_edit.css">
    <title>Cập nhật mã giảm giá</title>
</head>
<body>
    <div class="container">
        <form method="post" action="/Project_WebBanHang/Action-Controller/GiftCodeController/EditGift_action.php">
            <label>Số tiền giảm</label>
            <input type="text" id="GiftValue" name="GiftValue" required value="<?php echo $_SESSION["infoGift"]->getGiftValue() ?>"/>
            <br>
            <label>Số lượng mã gift</label>
            <input type="text" id="GiftQuantity" name="GiftQuantity" value="<?php echo $_SESSION["infoGift"]->getGiftQuantity() ?>" required/>
            <br>
            <?php 
            if($_SESSION["infoGift"]->getGiftActive() == 0) {
                ?>
                <label for="Active">Kích hoạt</label>
                <input type="radio" name="active" value=1>mở
                <input type="radio" name="active" value=0>tắt
                <br>
                <?php
            }
            ?>
            <button class="Addbtn" type="submit">Cập nhật</button>
        </form>
        <a class="btn_back" href="/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php">
            Trở lại
        </a>
    </div>
</body>
</html>