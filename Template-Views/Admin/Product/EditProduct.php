<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/ImgProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
session_start();
$listGroup = getAllListGroup();
$lengtGroup = count($listGroup);
$listImgs = unserialize($_SESSION['InfoImgProducts']);
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Project_WebBanHang/assets/css/product.css">
</head>

<body>
  <?php if (empty($_SESSION["err_value"])) {
    echo "";
  } else {
    echo "<span style='color:red;font-size:14px;'>" . $_SESSION["err_value"] . "</span>";
  } ?>
  <form method="post" enctype="multipart/form-data" action="/Project_WebBanHang/Action-Controller/ProductController/EditProduct_action.php">
    <label for="Cat">Danh mục sản phẩm:</label>
    <select id="category" name="GroupProduct_ID">
      <?php
      $selectedGrID = (int)$_SESSION["InfoProduct"]->getGrID();
      for ($i = 0; $i < $lengtGroup; $i++) {
        $grID = $listGroup[$i]->getGrID();
        $nameGroup = $listGroup[$i]->getNameGroup();
        if ($selectedGrID == $grID) {
          echo "<option value='$grID' selected>$nameGroup</option>";
        } else {
          echo "<option value='$grID'>$nameGroup</option>";
        }
      }
      ?>
    </select>

    <br>
    <label>Tên sản phẩm</label>
    <br>
    <input type="text" id="PrName" name="ProductName" value="<?php echo $_SESSION["InfoProduct"]->getPrName(); ?>" />
    <br>
    <label>Giá</label>
    <br>
    <input type="text" id="price" name="ProductPrice" value="<?php echo $_SESSION["InfoProduct"]->getPrice(); ?>" />
    <br>
    <label>Số lượng</label>
    <br>
    <input type="text" id="quantity" name="ProductQuantity" value="<?php echo $_SESSION["InfoProduct"]->getQuantity(); ?>" />
    <br>
    <label>Kích cỡ</label>
    <br>
    <input type="text" id="size" name="ProductSize" value="<?php echo $_SESSION["InfoProduct"]->getSize(); ?>" />
    <br>
    <label>Màu sắc</label>
    <br>
    <input type="text" id="color" name="ProductColor" value="<?php echo $_SESSION["InfoProduct"]->getColor(); ?>" />
    <br>
    <label>Mô tả (* không bắt buộc)</label>
    <br>
    <textarea type="text" id="description" name="ProductDescription" placeholder="Mô tả sản phẩm..."><?php echo $_SESSION["InfoProduct"]->getDes(); ?></textarea>
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
    <input id="inputImg" type="file" name="images[]" multiple="multiple">
    <br>
    <div id="imageContainer">
      <?php
      foreach ($listImgs as $imgProduct) {
      ?>
        <img style="width:150px;height:150px;object-fit:cover;" src="/Project_WebBanHang/Upload/imgDetail/<?php echo $imgProduct->getImg() ?>">
      <?php
      }
      ?>
    </div>
    <div id="load"></div>
    <br>
    <button type="submit">Cập nhật</button>
  </form>
  <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">
    <?php $_SESSION["err_value"] = ""; ?>
    Tro Lai
  </a>
  <script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src)
      }
    };
    document.addEventListener("DOMContentLoaded", function() {
      let imageInput = document.querySelector("#inputImg");
      let imageContainer = document.querySelector("#load");

      imageInput.addEventListener("change", function() {
        imageContainer.innerHTML = ""; // Xóa hết ảnh trước đó trong #imageContainer

        // Lặp qua từng file được chọn
        for (let i = 0; i < this.files.length; i++) {
          let file = this.files[i];

          // Kiểm tra nếu file không phải là ảnh thì bỏ qua
          if (!file.type.match("image.*")) {
            continue;
          }

          // Đọc file ảnh
          let reader = new FileReader();
          reader.onload = function(event) {
            // Tạo một thẻ <img> mới và thêm vào #imageContainer
            let imgElement = document.createElement("img");
            imgElement.setAttribute("src", event.target.result);
            imgElement.setAttribute("object-fit", "cover");
            imgElement.setAttribute("height", "150px");
            imgElement.setAttribute("width", "150px");
            classCSs = imgElement.classList;
            classCSs.add("imgs");
            imageContainer.appendChild(imgElement);
          };
          reader.readAsDataURL(file);
        }
      });
    });
  </script>
</body>

</html>