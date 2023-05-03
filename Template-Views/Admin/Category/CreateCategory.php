<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="post" action="/Project_WebBanHang/Action-Controller/CategoryController/CreateGroup_action.php">
        <label>Tên danh mục</label>
        <br>
        <input type="text" id="CatName" type="text" name="CategoryName" required/>
        <br>
        <?php if (empty($_SESSION["err_value"])) {
            echo "";
        } else {
            echo "<span style='color:red;font-size:14px;'>" . $_SESSION["err_value"] . "</span>";
        } ?>
        <button class="Addbtn" type="submit">Thêm</button>
    </form>
    <a href="/Project_WebBanHang/Template-Views/Admin/Category/Index.php">
        <?php $_SESSION["err_value"] = ""; ?>
        Tro Lai
    </a>
</body>

</html>