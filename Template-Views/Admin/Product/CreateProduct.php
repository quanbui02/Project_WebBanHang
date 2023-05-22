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
  <link rel="stylesheet" href="/Project_WebBanHang/assets/css/product.css">
  <link rel="stylesheet" href="/Project_WebBanHang/assets/css/addedit.css">
</head>

<body>
  <form method="post" enctype="multipart/form-data"
    action="/Project_WebBanHang/Action-Controller/ProductController/CreateProduct_action.php">
    <div class="details">
      <div class="Cate">
        <div class="label"> <label for="Cat">Danh mục sản phẩm:</label></div>
        <div class="content"> <select id="category" name="GroupProduct_ID">
            <option value="">-- Chọn danh mục --</option>
            <?php
            for ($i = 0; $i < $lengtGroup; $i++) {
              ?>
              <option value="<?php echo $listGroup[$i]->getGrID() ?>"><?php echo $listGroup[$i]->getNameGroup() ?></option>
              <?php
            }
            ?>
          </select></div>
      </div>
      <div class="namepro">
        <div class="label"><label>Tên sản phẩm</label></div>
        <div class="content"> <input class="Input" type="text" id="PrName" name="ProductName" required /></div>
      </div>
      <div class="Price">
        <div class="label"> <label>Giá</label></div>
        <div class="content"> <input class="Input" type="text" id="price" name="ProductPrice" required /></div>
      </div>
      <div class="Quanti">
        <div class="label"> <label>Số lượng</label></div>
        <div class="content"> <input class="Input" type="text" id="quantity" name="ProductQuantity" required /></div>
      </div>
      <div class="Size">
        <div class="label"> <label>Kích cỡ</label></div>
        <div class="content"> <input class="Input" type="text" id="size" name="ProductSize" required /></div>
      </div>
      <div class="Col">
        <div class="label"><label>Màu sắc</label></div>
        <div class="content"> <input class="Input" type="text" id="color" name="ProductColor" required /></div>
      </div>
      <div class="Des">
        <div class="label"><label>Mô tả (* không bắt buộc)</label></div>
        <div class="content"> <textarea class="Input" type="text" id="description" name="ProductDescription"
            required></textarea></div>
      </div>
      <div class="Ima">
        <div class="label"> <label for="image">Thêm ảnh đại diện:</label></div>
        <div class="content1"> <input type="file" name="ProductImage" onchange="loadFile(event)"></div>
        <!-- <div class="content"> <img id="output" style="width:300px;height:300px;object-fit:cover;" /></div> -->
      </div>
      <div class="ImaDes">
        <div class="label"> <label for="image">Thêm ảnh mô tả:</label></div>
        <div class="content"><input id="inputImg" type="file" name="images[]" multiple="multiple"></div>
      </div>
      <!-- <div id="imageContainer">
      <?php
      foreach ($listImgs as $imgProduct) {
        ?>
          <img style="width:150px;height:150px;object-fit:cover;"
            src="/Project_WebBanHang/Upload/imgDetail/<?php echo $imgProduct->getImg() ?>">
          <?php
      }
      ?>
      </div> -->

      <div class="loadback">
        <div class="load"><button type="submit">Thêm</button></div>
        <div class="back">
          <button> <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">
              <?php $_SESSION["err_value"] = ""; ?> Tro Lai
            </a></button>
        </div>
      </div>
    </div>
    </div>
  </form>
  <!-- 
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
        <label for="image">Thêm ảnh mô tả:</label>
        <br>
        <input id="inputImg" type="file" name="images[]" multiple="multiple">
        <br>
        <div id="imageContainer"></div>
        <br>
        <button type="submit">Thêm</button>
    </form>
    <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">
        <?php $_SESSION["err_value"] = ""; ?>
        Tro Lai
    </a>  -->
  <script>
    var loadFile = function (event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function () {
        URL.revokeObjectURL(output.src)
      }
    };
    document.addEventListener("DOMContentLoaded", function () {
      let imageInput = document.querySelector("#inputImg");
      let imageContainer = document.querySelector("#imageContainer");

      imageInput.addEventListener("change", function () {
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
          reader.onload = function (event) {
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
  </script>
</body>

</html>