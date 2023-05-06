<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
session_start();
$listGroup = getAllListGroup();
$lengtGroup = count($listGroup);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="post" enctype="multipart/form-data" action="/Project_WebBanHang/Action-Controller/ProductController/CreateProduct_action.php">
        <label for="Cat">Danh mục sản phẩm:</label>
        <select id="category" name="GroupProduct_ID">
            <option value="">-- Chọn danh mục --</option>
            <?php
            for($i = 0; $i < $lengtGroup; $i++){
                ?>
                <option value="<?php echo $listGroup[$i]->getGrID() ?>" ><?php echo $listGroup[$i]->getNameGroup()?></option>
                <?php
            }
            ?>
        </select>
        <br>
        <label>Tên sản phẩm</label>
        <br>
        <input type="text" id="PrName" type="text" name="ProductName" required />
        <br>
        <label>Giá</label>
        <br>
        <input type="text" id="price" type="text" name="ProductPrice" required />
        <br>
        <label>Số lượng</label>
        <br>
        <input type="text" id="quantity" type="text" name="ProductQuantity" required />
        <br>
        <label>Kích cỡ</label>
        <br>
        <input type="text" id="size" type="text" name="ProductSize" required />
        <br>
        <label>Màu sắc</label>
        <br>
        <input type="text" id="color" type="text" name="ProductColor" required />
        <br>
        <label>Mô tả (* không bắt buộc)</label>
        <br>
        <textarea type="text" id="description" type="text" name="ProductDescription" placeholder="Mô tả sản phẩm..."></textarea>
        <br>
        <br>
        <label for="image">Thêm ảnh đại diện:</label>
        <br>
        <input type="file" name="ProductImage" onchange="loadFile(event)">
        <br>
        <img id="output" style="width:300px;height:300px;object-fit:cover;" />
        <br>
        <button type="submit">Thêm</button>
    </form>
    <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">
        <?php $_SESSION["err_value"] = ""; ?>
        Tro Lai
    </a>
    <script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src)
        }
    };
</script>
</body>
</html>