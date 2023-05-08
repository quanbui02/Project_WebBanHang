<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
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
  <form method="post" action="/Project_WebBanHang/Action-Controller/ProductController/EditProduct_action.php">
    <label for="Cat">Danh mục sản phẩm:</label>
    <select id="category" name="GroupProduct_ID">
      <?php
      for ($i = 0; $i < $lengtGroup; $i++) {
        if ($_SESSION['InfoProduct']->getGrID == $listGroup[$i]) {
      ?>
          <option value="<?php echo $_SESSION["InfoProduct"]->getGrID(); ?>"> <?php echo $listGroup[$i]->getNameGroup(); ?></option>
          ?<?php
          }
        }
            ?>
          <?php
          for ($i = 0; $i < $lengtGroup; $i++) {
          ?>
            <option value="<?php echo $listGroup[$i]->getGrID() ?>"><?php echo $listGroup[$i]->getNameGroup() ?></option>
          <?php
          }
          ?>
    </select>
    <br>
    <label>Tên sản phẩm</label>
    <br>
    <input type="text" id="PrName" name="ProductName" value="<?php echo $_SESSION["InfoProduct"]->getPrName(); ?>" required/>
    <br>
    <label>Giá</label>
    <br>
    <input type="text" id="price" name="ProductPrice" value="<?php echo $_SESSION["InfoProduct"]->getPrice(); ?>" required />
    <br>
    <label>Số lượng</label>
    <br>
    <input type="text" id="quantity"  name="ProductQuantity" value="<?php echo $_SESSION["InfoProduct"]->getQuantity(); ?>" required />
    <br>
    <label>Kích cỡ</label>
    <br>
    <input type="text" id="size"  name="ProductSize" value="<?php echo $_SESSION["InfoProduct"]->getSize(); ?>" required />
    <br>
    <label>Màu sắc</label>
    <br>
    <input type="text" id="color"  name="ProductColor" value="<?php echo $_SESSION["InfoProduct"]->getColor(); ?>" required />
    <br>
    <label>Mô tả (* không bắt buộc)</label>
    <br>
    <textarea type="text" id="description" name="ProductDescription" value="<?php echo $_SESSION["InfoProduct"]->getDes(); ?>" placeholder="Mô tả sản phẩm..."></textarea>
    <br>
    <br>
    <label for="image">Chỉnh sửa ảnh đại diện:</label>
    <br>
    <input type="file" name="ProductImage" onchange="loadFile(event)">
    <br>
    <img id="output" style="width:300px;height:300px;object-fit:cover;" src="/Project_WebBanHang/Upload/img/<?php echo $_SESSION["InfoProduct"]->getImg() ?>" />
    <br>
    <label for="image">Thêm ảnh mô tả:</label>
    <br>
    <input id="inputImg" type="file" name="images[]" onchange="loadFiles(event)" multiple="multiple">
    <br>
    <div id="imageContainer"></div>
    <br>
    <?php if (empty($_SESSION["err_value"])) {
      echo "";
    } else {
      echo "<span style='color:red;font-size:14px;'>" . $_SESSION["err_value"] . "</span>";
    } ?>
    <button type="submit">Cập nhật</button>
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