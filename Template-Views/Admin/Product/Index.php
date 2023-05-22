<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";

session_start();
$listProduct = getListProduct();
$total_pages = getIndexPageProduct();
$page = isset($_GET['pI']) ? $_GET['pI'] : 1;
$lengthProduct = count($listProduct);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/main.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/category.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/product.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/Popup.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    <div class="container_flex">
        <div class="side-nav">
            <div class="side-nav-inner">
                <ul class="side-nav-menu scrollable">
                    <?php
                    echo sidebar();
                    ?>
                </ul>
            </div>
        </div>
        <div class="content_Admin">
            <form class="search" action="/Project_WebBanHang/Action-Controller/ProductController/SearchProduct_action.php">
                <div class="search__text">
                    <svg style="color:#ccc;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                    <input name="search-product" id="search" placeholder="Tìm kiếm..." value />
                </div>
            </form>
            <div class="container_content">
                <div class="content_Admin_List">
                    <h3 style="margin-top:15px">Danh sách sản phẩm</h3>
                <a href="/Project_WebBanHang/Template-Views/Admin/Product/CreateProduct.php"  class="btn-add ">Thêm sản phẩm mới</a>
                    <a href="/Project_WebBanHang/Template-Views/Admin/Product/ProductDeleted.php"  class="btn-delete">Sản phẩm đã xoá</a>
                    <?php
                    if ($lengthProduct > 0) {
                    ?>
                        <table id="customers">
                            <tr>
                                <th>Mã Sản phẩm</th>
                                <th>Tên Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Màu sắc</th>
                                <th>Size</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Thao tác</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < $lengthProduct; $i++) {
                            ?>
                                <tr>
                                    <td><?php echo $listProduct[$i]->getPrID() ?></td>
                                    <td><?php echo $listProduct[$i]->getPrName() ?></td>
                                    <td><?php echo $listProduct[$i]->getQuantity() ?></td>
                                    <td><?php echo $listProduct[$i]->getColor() ?></td>
                                    <td><?php echo $listProduct[$i]->getSize() ?></td>
                                    <td><img class="img_product" src="/Project_WebBanHang/Upload/img/<?php echo $listProduct[$i]->getImg() ?>"></td>
                                    <td><?php echo $listProduct[$i]->getPrice() ?></td>
                                    <td>
                                        <div class="icon_thaotac">
                                            <div class="item-edit">
                                                <a title="Chi tiết" href="/Project_WebBanHang/Action-Controller/ProductController/DetailProduct_action.php?id=<?php echo $listProduct[$i]->getPrID(); ?>" class="btn mx-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>

                                                </a>
                                            </div>
                                            <div class="item-edit">
                                                <a title="Chỉnh sửa" href="/Project_WebBanHang/Action-Controller/ProductController/GetInfoProduct_action.php?id=<?php echo $listProduct[$i]->getPrID(); ?>" class="btn mx-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="item-edit">
                                                <a onclick="openModal(<?php echo $listProduct[$i]->getPrID(); ?>)" title="Xoá"  class="btn mx-1" style="cursor:pointer;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                                        <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="item-edit">
                                                <a title="Xem phản hồi" href="/Project_WebBanHang/Action-Controller/ProductController/Feedback_action.php?id=<?php echo $listProduct[$i]->getPrID(); ?>" class="btn mx-1" style="cursor:pointer;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
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
                <!-- <ul class="pagination">
                    <?php
                    if ($page > 1) {
                    ?>
                        <li><a href="?pI=<?php echo ($page - 1); ?>">Trở lại</a></li>
                    <?php
                    }
                    ?>
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) {
                    ?>
                        <li <?php if ($i == $page) echo "class='active'"; ?>><a href="?pI=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($page < $total_pages) {
                    ?>
                        <li><a href="?pI=<?php echo ($page + 1); ?>">Tiếp</a></li>
                    <?php
                    }
                    ?>
                </ul> -->
                <div class="Pagination">
                    <ul class="pagination">
                        <?php
                        if ($page > 1) {
                        ?>
                            <li class="page-item"><a href="?page=<?php echo ($page - 1); ?> " class="page-link text-dark ">Trở lại</a></li>
                        <?php
                        }
                        ?>
                        <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                        ?>
                            <li class="page-item" <?php if ($i == $page) echo "class='active'"; ?>><a href="?page=<?php echo $i; ?>"class="page-link text-dark "><?php echo $i; ?></a></li>
                        <?php
                        }
                        ?>
                        <?php
                        if ($page < $total_pages) {
                        ?>
                            <li class="page-item"><a href="?page=<?php echo ($page + 1); ?>" class="page-link text-dark">Tiếp</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Model -->
    <div id="myModal" class="modal-popup">
        <div class="modal-content-popup">
            <p class="text-modal">Bạn có chắc chắn muốn xóa?</p>
            <div class="list-btn">
                <button class="button delete action-delete" onclick="deleteItem()">Xóa</button>
                <button class="button" onclick="closeModal()">Hủy</button>
            </div>
        </div>
    </div>

</body>
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
        function openModal(id) {
        var modal = document.getElementById("myModal");
        modal.classList.add("show");
        idDelete = id;
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.classList.remove("show");

        idDelete = null
    }

    function deleteItem() {
        if(idDelete) {
            window.location.href = `/Project_WebBanHang/Action-Controller/ProductController/DeleteProduct_action.php?id=${idDelete}`
        }
    }
    </script>

</html>