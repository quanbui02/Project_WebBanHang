<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
session_start();
$listProduct = getAllListDeletedProduct();
$lengtProduct = count($listProduct);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/main.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/category.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    <div class="container_flex">
        <div class="content_Admin">
            <form class="search" action="/Project_WebBanHang/Action-Controller/CategoryController/SearchGroup_action.php">
                <div class="search__text">
                    <svg style="color:#ccc;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                    <input name="search-group" id="search" placeholder="Tìm kiếm..." value />
                </div>
            </form>
            <div class="container_content">
                <div class="content_Admin">
                    <h3>Danh sách sản phẩm đã xoá</h3>
                    <?php
                    if ($lengtProduct > 0) {
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
                            for ($i = 0; $i < $lengtProduct; $i++) {
                            ?>
                                <tr>
                                    <td><?php echo $listProduct[$i]->getPrID() ?></td>
                                    <td><?php echo $listProduct[$i]->getPrName() ?></td>
                                    <td><?php echo $listProduct[$i]->getQuantity() ?></td>
                                    <td><?php echo $listProduct[$i]->getColor() ?></td>
                                    <td><?php echo $listProduct[$i]->getSize() ?></td>
                                    <td><?php echo $listProduct[$i]->getPrice() ?></td>
                                    <td>
                                        <div class="icon_thaotac">
                                            <div class="item-edit">
                                                <a href="/Project_WebBanHang/Action-Controller/ProductController/DetailProduct_action.php?id=<?php echo $listProduct[$i]->getPrID(); ?>" class="btn mx-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="item-edit">
                                                <a href="/Project_WebBanHang/Action-Controller/ProductController/UndoProduct_action.php?id=<?php echo $listProduct[$i]->getPrID(); ?>" class="btn mx-1">
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
                <div class="back">
                    <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">Tro Lai</a>
                </div>
                <!-- <ul class="pagination">
                    <?php
                    if ($page > 1) {
                    ?>
                        <li><a href="?page=<?php echo ($page - 1); ?>">Trở lại</a></li>
                    <?php
                    }
                    ?>
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) {
                    ?>
                            <li <?php if ($i == $page) echo "class='active'"; ?>><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($page < $total_pages) {
                    ?>
                        <li><a href="?page=<?php echo ($page + 1); ?>">Tiếp</a></li>
                    <?php
                    }
                    ?>
                </ul> -->
            </div>
        </div>
    </div>
    <script>
        const searchBox = document.getElementById("search");
        searchBox.addEventListener("keypress", function(event) {
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