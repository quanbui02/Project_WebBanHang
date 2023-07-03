<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";

session_start();
if ($_SESSION["login"] == false) {
    header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
}
$listGroup = getAllListGroup();
$lengthGroup = count($listGroup);

$listProduct = getListProduct();
$total_pages = getIndexPageProduct();
$page = isset($_GET['pI']) ? $_GET['pI'] : 1;
$lengthProduct = count($listProduct);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/mainHeader.css">
    <link rel="stylesheet" href="../../../assets/css/User/user.css">
    <link rel="stylesheet" href="../../../assets/css/popUpModel.css">
    <link rel="stylesheet" href="../../../assets/css/pagination.css">
    <link rel="stylesheet" href="../../../assets/css/ToastMessage/ToastMessage.css">
    <link rel="stylesheet" href="../../../assets/css/Product/product.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />

    <title>Quản lý sản phẩm</title>
</head>

<body>
    <div class="job">
        <div class="header">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path xmlns="http://www.w3.org/2000/svg"
                        d="M512 503.5H381.7a48 48 0 01-45.3-32.1L265 268.1l-9-25.5 2.7-124.6L338.2 8.5l23.5 67.1L512 503.5z"
                        fill="#0473ff" data-original="#28b446" />
                    <path xmlns="http://www.w3.org/2000/svg" fill="#0473ff" data-original="#219b38"
                        d="M361.7 75.6L265 268.1l-9-25.5 2.7-124.6L338.2 8.5z" />
                    <path xmlns="http://www.w3.org/2000/svg"
                        d="M338.2 8.5l-82.2 234-80.4 228.9a48 48 0 01-45.3 32.1H0l173.8-495h164.4z" fill="#0473ff"
                        data-original="#518ef8" />
                </svg>
                Admin
            </div>
            <div class="header-menu">
                <a href="/Project_WebBanHang/Template-Views/Admin/Shared/Index.php">Trang chủ</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php" class="active">Sản phẩm</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Category/Index.php">Danh mục sản phẩm</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/User/Index.php">Khách hàng</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Order/Index.php">Đơn hàng </a>
                <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php">Khuyễn Mãi</a>
            </div>
            <div class="user-settings">
                <a href="/Project_WebBanHang/Action-Controller/LoginController/Logout_action.php"
                    class="logout-btn">Đăng xuất</a>
            </div>
        </div>

        <form class="search-menu"
            action="/Project_WebBanHang/Action-Controller/ProductController/SearchProduct_action.php">
            <div class="search-salary">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="currentColor"
                    stroke-width=".4">
                    <path
                        d="M12.6 18H9.8a.8.8 0 010-1.5h2.8a.9.9 0 000-1.8h-1.2a2.4 2.4 0 010-4.7h2.8a.8.8 0 010 1.5h-2.8a.9.9 0 000 1.8h1.2a2.4 2.4 0 010 4.7z"
                        stroke="currentColor" />
                    <path
                        d="M12 20a.8.8 0 01-.8-.8v-2a.8.8 0 011.6 0v2c0 .5-.4.8-.8.8zM12 11.5a.8.8 0 01-.8-.8v-2a.8.8 0 011.6 0v2c0 .5-.4.8-.8.8z"
                        stroke="currentColor" />
                    <path
                        d="M21.3 23H2.6A2.8 2.8 0 010 20.2V3.9C0 2.1 1.2 1 2.8 1h18.4C22.9 1 24 2.2 24 3.8v16.4c0 1.6-1.2 2.8-2.8 2.8zM2.6 2.5c-.6 0-1.2.6-1.2 1.3v16.4c0 .7.6 1.3 1.3 1.3h18.4c.7 0 1.3-.6 1.3-1.3V3.9c0-.7-.6-1.3-1.3-1.3z"
                        stroke="currentColor" />
                    <path d="M23.3 6H.6a.8.8 0 010-1.5h22.6a.8.8 0 010 1.5z" stroke="currentColor" />
                </svg>
                <input name="search-product" id="search" placeholder="Tìm kiếm..." />
            </div>
            <button class="search-button">Tìm kiếm</button>
        </form>

        <div class="add-product">
            <button class="add-product-js button-add">Thêm mới sản phẩm</button>
        </div>

        <div>
            <div class="container">
                <div class="table">
                    <div class="table-header">
                        <div class="header__item"><a id="ID" class="filter__link filter__link--number" href="#">Mã Sản
                                phẩm</a></div>
                        <div class="header__item"><a id="account" class="filter__link" href="#">Tên Sản phẩm</a></div>
                        <div class="header__item"><a class="filter__link" href="#">Giá</a></div>
                        <div class="header__item"><a class="filter__link filter__link--number" href="#">Số lượng</a>
                        </div>
                        <div class="header__item"><a id="name" class="filter__link" href="#">Màu sắc</a></div>
                        <div class="header__item"><a id="address" class="filter__link" href="#">Size</a></div>
                        <div class="header__item"><a class="filter__link filter__link--number" href="#">Thao tác</a>
                        </div>
                    </div>
                    <div class="table-content">
                        <?php
                        foreach ($listProduct as $product) {
                            echo '<div class="table-row">';
                            echo ' <div class="table-data">' . $product->getPrID() . "</div>";
                            echo ' <div class="table-data">' . $product->getPrName() . "</div>";
                            echo ' <div class="table-data">' . $product->getPrice() . "</div>";
                            echo ' <div class="table-data">' . $product->getQuantity() . "</div>";
                            echo ' <div class="table-data">' . $product->getColor() . "</div>";
                            echo ' <div class="table-data">' . $product->getSize() . "</div>";
                            echo '    <div class="table-data function-product">';

                            echo '<div class="item-edit">' .
                                '<a title="Chỉnh sửa" href="/Project_WebBanHang/Action-Controller/ProductController/GetInfoProduct_action.php?id=' . $product->getPrID() . '" class="btn mx-1">' .
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">' .
                                '<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />' .
                                '</svg>' .
                                '</a>' .
                                '</div>';
                            echo '<div class="item-edit">' .
                                '<a title="Chi tiết" href="/Project_WebBanHang/Action-Controller/ProductController/DetailProduct_action.php?id=' . $product->getPrID() . '" class="btn mx-1">' .
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">' .
                                '<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />' .
                                '<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />' .
                                '</svg>' .
                                '</a>' .
                                '</div>';
                            echo '<div class="item-edit">';
                            echo '  <a title="Xóa" onclick="openModal(' . $product->getPrID() . ')" class="btn mx-1 btn_delete" style="cursor:pointer;">';
                            echo '      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">';
                            echo '          <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />';
                            echo '      </svg>';
                            echo '  </a>';
                            echo '  </div>';
                            echo '</div>';
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="Pagination">
                <ul class="pagination">
                    <?php if ($page > 1) { ?>
                    <li class="page-item"><a href="?pI=<?php echo ($page - 1); ?>" class="page-link text-dark">Trở
                            lại</a></li>
                    <?php } ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a href="?pI=<?php echo $i; ?>"
                            class="page-link text-dark"><?php echo $i; ?></a></li>
                    <?php } ?>

                    <?php if ($page < $total_pages) { ?>
                    <li class="page-item"><a href="?pI=<?php echo ($page + 1); ?>" class="page-link text-dark">Tiếp</a>
                    </li>
                    <?php } ?>
                </ul>
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

    <div class="modal-addGroup">
        <div class="modal-container js-modal-container">
            <span aria-hidden="true" class="modal-close js-modal-close">&times;</span>
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header border-bottom-0 ">
                        <h2 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h2>
                    </div>
                    <form method="post" enctype="multipart/form-data"
                        action="/Project_WebBanHang/Action-Controller/ProductController/CreateProduct_action.php">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm<sup class="text-danger">*</sup></label>
                                <input id="PrName" name="ProductName" type="text" class="form-control"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="select form-group">
                                <label for="name">Danh mục sản phẩm<sup class="text-danger">*</sup></label>
                                <select id="category" name="GroupProduct_ID" class="form-control">
                                    <option value="">-- Chọn danh mục --</option>
                                    <?php
                                    for ($i = 0; $i < $lengthGroup; $i++) {
                                    ?>
                                    <option value="<?php echo $listGroup[$i]->getGrID() ?>">
                                        <?php echo $listGroup[$i]->getNameGroup() ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>


                            <div style="
                                display: flex;
                                justify-content: space-around;
                                align-items: center;
                                width: 81%;
                                margin: 0 auto;">
                                <div style="width: 100%;">
                                    <div class=" form-group">
                                        <label for="address">Số lượng</label>
                                        <input type="number" id="quantity" name="ProductQuantity" class="form-control"
                                            placeholder="Enter your address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Kích cỡ</label>
                                        <input id="size" name="ProductSize" type="text" class="form-control"
                                            placeholder="Enter your phone no." required>
                                    </div>
                                </div>

                                <div style="width: 100%;">
                                    <div class="form-group">
                                        <label for="phone">Màu sắc</label>
                                        <input id="color" name="ProductColor" type="text" class="form-control"
                                            placeholder="Enter your phone no." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email1">Giá Sản phẩm</label>
                                        <input type="number" id="price" name="ProductPrice" class="form-control"
                                            id="email1" aria-describedby="emailHelp" placeholder="Enter your email"
                                            required>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="phone">Mô tả</label>
                                <textarea id="description" name="ProductDescription" class="form-control" cols="3"
                                    rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="label"> <label for="image">Ảnh đại diện sản phẩm:</label></div>
                                <div class="content1"> <input type="file" name="ProductImage"
                                        onchange="loadFile(event)"></div>
                                <div class="content"> <img id="output"
                                        style="width:200px;height:200px;object-fit:cover;" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="label"> <label for="image">Ảnh mô tả sản phẩm:</label></div>
                                <div id="input">
                                    <input type="file" id="images" multiple="multiple" name="images[]" />
                                </div>
                            </div>

                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <button class="button-create button-createProduct" type="submit">Thêm sản phẩm</button>
                                <button onclick="hideModel()" class="button-cancel button-createProduct">Hủy</button>
                            </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
    </div>
    <div id="toast" class="toast"></div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../../../assets/css/ToastMessage/ToastMessage.js"></script>
<script src="../../../assets/css/User/user.js"></script>
<script src="../../../assets/css/Product/product.js"></script>
</html>