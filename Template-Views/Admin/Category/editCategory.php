<?php 
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/cate_edit.css">
</head>
<body>
<div class="container">
    <form method="post" action="/Project_WebBanHang/Action-Controller/CategoryController/EditGroup_action.php">
        <label>Tên danh mục</label>
        <input type="text" id="CatName" name="CategoryName" value ="<?php echo $_SESSION["getInfoGroup"]->getNameGroup(); ?>"/>
        <br>
        <?php if(empty($_SESSION["err_value"])){echo "";}else{ echo "<span style='color:red;font-size:14px;'>".$_SESSION["err_value"]."</span>" ;} ?>
        <button type="submit">Cập nhật</button>
    </form>
    <a href="/Project_WebBanHang/Template-Views/Admin/Category/Index.php" class= "btn_back"> 
        <?php $_SESSION["err_value"] = ""; ?>
        Trở lại
    </a>
    </div>

</html>
