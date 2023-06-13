<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
session_start();
$listProduct = getAllListDeletedProduct();
$lengthProduct = $listProduct['list'];
$total_page = $listProduct['total_pages'];
if (isset($_GET['pl'])) {
    $page = $_GET['pl'] + 1;
} else {
    $page = 2;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/main.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/Category.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/pro_Del.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Sản phẩm đã xoá</title>
</head>

<body>
    <div class="container_flex">
        <div class="content_Admin">
            <div class="container_content">
                <div class="content_Admin">
                    <h3>Danh sách sản phẩm đã xoá</h3>
                    <?php
                    if (count($lengthProduct) > 0) {
                    ?>
                        <table id="customers">
                            <tr>
                                <th>Mã Sản phẩm</th>
                                <th>Tên Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Màu sắc</th>
                                <th>Size</th>
                                <th>Giá</th>
                                <th>Thao tác</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($lengthProduct); $i++) {
                            ?>
                                <tr>
                                    <td><?php echo $lengthProduct[$i]->getPrID() ?></td>
                                    <td><?php echo $lengthProduct[$i]->getPrName() ?></td>
                                    <td><?php echo $lengthProduct[$i]->getQuantity() ?></td>
                                    <td><?php echo $lengthProduct[$i]->getColor() ?></td>
                                    <td><?php echo $lengthProduct[$i]->getSize() ?></td>
                                    <td><?php echo $lengthProduct[$i]->getPrice() ?></td>
                                    <td>
                                        <div class="icon_thaotac">
                                            <div class="item-edit">
                                                <a href="/Project_WebBanHang/Action-Controller/ProductController/DetailProduct_action.php?id=<?php echo $lengthProduct[$i]->getPrID(); ?>" class="btn mx-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="item-edit">
                                                <a href="/Project_WebBanHang/Action-Controller/ProductController/UndoProduct_action.php?id=<?php echo $lengthProduct[$i]->getPrID(); ?>" class="btn mx-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                                        <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                    } else {
                        echo "KHÔNG CÓ SẢN PHẨM NÀO!";
                    }
                    ?>
                    </table>
                </div>
                <div class="loadback">
                    <div class="back">
                        <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">Trở lại</a>
                    </div>
                    <div class="load">
                        <ul class="pagination">
                            <li><a href="?pl=<?php echo $page; ?>">Xem thêm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const searchBox = document.getElementById("search");
        searchBox.addEventListener("keypress", function (event) {
            if (event.keyCode === 13) {
                if (searchBox.value.trim() == "") {
                    event.preventDefault();
                    alert("Vui Lòng điền thông tin cần tìm kiếm")
                }
            }
        });
    </script>
</body>

</html>