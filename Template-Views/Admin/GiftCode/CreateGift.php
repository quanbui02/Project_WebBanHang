<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo mới mã giảm giá</title>
</head>
<body>
<form method="post" action="/Project_WebBanHang/Action-Controller/GiftCodeController/CreateGift_action.php">
        <label>Số tiền giảm</label>
        <br>
        <input type="text" id="GiftValue" type="text" name="GiftValue" required/>
        <br>
        <label>Số lượng mã gift</label>
        <br>
        <input type="text" id="GiftQuantity" type="text" name="GiftQuantity" required/>
        <br>
        <button class="Addbtn" type="submit">Thêm</button>
    </form>
    <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php">
        Tro Lai
    </a>
</body>
</html>