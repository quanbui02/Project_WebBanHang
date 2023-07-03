<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GiftcodeDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
session_start();

if ($_SESSION["login"] == false) {
    header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
}

$listGift = getListGift();
$total_pages = getIndexPage();
$page = isset($_GET['pg']) ? $_GET['pg'] : 1;
$_SESSION['index'] = $page;
$lengthGift = count($listGift);
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
    <link rel="stylesheet" href="../../../assets/css/GiftCode/gift.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />

    <title>Quản lý khuyến mãi</title>
    </style>

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
                <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">Sản phẩm</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Category/Index.php">Danh mục sản phẩm</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/User/Index.php">Khách hàng</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Order/Index.php">Đơn hàng </a>
                <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php" class="active">Khuyến Mãi</a>
            </div>
            <div class="user-settings">
                <a href="/Project_WebBanHang/Action-Controller/LoginController/Logout_action.php"
                    class="logout-btn">Đăng xuất</a>
            </div>
        </div>


        <div class="wrapper">
            <button class="add-product-js btn_add">Thêm mã giảm giá</button>
            <div>
                <div class="container">
                    <div class="table">
                        <div class="table-header">
                            <div class="header__item"><a id="ID" class="filter__link filter__link--number"
                                    href="#">ID</a></div>
                            <div class="header__item"><a id="codeGift" class="filter__link" href="#">Mã Gift</a></div>
                            <div class="header__item"><a id="priceGift" class="filter__link filter__link--number"
                                    href="#">Thành tiền</a></div>
                            <div class="header__item"><a id="quantityGift" class="filter__link filter__link--number"
                                    href="#">Số lượng</a>
                            </div>
                            <div class="header__item"><a id="name" class="filter__link" href="#">Trạng thái</a>
                            </div>
                            <div class="header__item"><a class="filter__link filter__link--number" href="#">Thao tác</a>
                            </div>
                        </div>
                        <div class="table-content">
                            <?php
                            if ($lengthGift > 0) {
                                foreach ($listGift as $gift) {
                                    echo '<div class="table-row">';
                                    echo '<div class="table-data">' . $gift->getGiftID() . '</div>';
                                    echo '<div class="table-data">' . strtoupper($gift->getGiftContent()) . '</div>';
                                    echo '<div class="table-data">' . $gift->getGiftValue() . '</div>';
                                    echo '<div class="table-data">' . $gift->getGiftQuantity() . '</div>';
                                    echo '<div class="table-data">';
                                    if ($gift->getGiftActive() == 1) {
                                        echo '<div class="active-gift">Hoạt động</div>';
                                    } else {
                                        echo '<div class="no-active-gift">Đã huỷ</div>';
                                    }
                                    echo '</div>';
                                    echo '<div class="table-data act">';
                                    if ($gift->getGiftActive() == 1) {
                                        echo '<div class="item-edit" onClick="openEditModal(' . $gift->getGiftID() . ', \'' . $gift->getGiftValue() . '\', \'' . $gift->getGiftQuantity() . '\')">';
                                        echo '<a class="btn mx-1 btn_edit">';
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">';
                                        echo '<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />';
                                        echo '</svg>';
                                        echo '</a>';
                                        echo '</div>';
                                        echo '<div class="item-edit delete-item" onclick="openModal(' . $gift->getGiftID() . ')">';
                                        echo '<a class="btn mx-1 btn_del btn_edit" style="cursor:pointer;">';
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">';
                                        echo '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>';
                                        echo '<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>';
                                        echo '</svg>';
                                        echo '</a>';
                                        echo '</div>';
                                    } else {
                                        echo '<div onclick="openModal(' . $gift->getGiftID() . ',' . $gift->getGiftActive() . ')" class="item-edit convert-gift-active">';
                                        echo '<a style="cursor:pointer;" class="btn mx-1 btn_active btn_edit">';
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">';
                                        echo '<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>';
                                        echo '<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>';
                                        echo '</svg>';
                                        echo '</a>';
                                        echo '</div>';
                                    }
                                    echo '</div>';
                                    echo "</div>";
                                }
                            } else {
                                echo 'KHÔNG CÓ DANH MỤC SẢN PHẨM NÀO!';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="Pagination">
                    <ul class="pagination">
                        <?php if ($page > 1) { ?>
                        <li class="page-item"><a href="?pg=<?php echo ($page - 1); ?>" class="page-link text-dark">Trở
                                lại</a></li>
                        <?php } ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a href="?pg=<?php echo $i; ?>"
                                class="page-link text-dark"><?php echo $i; ?></a></li>
                        <?php } ?>

                        <?php if ($page < $total_pages) { ?>
                        <li class="page-item"><a href="?pg=<?php echo ($page + 1); ?>"
                                class="page-link text-dark">Tiếp</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div id="myModal" class="modal-popup">
            <div class="modal-content-popup">
                <p class="text-modal">Bạn có chắc chắn muốn Kích hoạt/ xóa?</p>
                <div class="list-btn">
                    <button class="button delete action-delete" onclick="deleteItem()">Kích hoạt/ Xóa</button>
                    <button class="button" onclick="closeModal()">Hủy</button>
                </div>
            </div>
        </div>

        <div class="modal-addGroup">
            <div class="modal-container js-modal-container">
                <p class="modal-close js-modal-close">X</p>
                <form method="post" id="add_gift"
                    action="/Project_WebBanHang/Action-Controller/GiftCodeController/CreateGift_action.php">
                    <label>Số tiền</label>
                    <input id="GiftValue" type="number" name="GiftValue" required />
                    <br>
                    <label>Số lượng</label>
                    <input id="GiftQuantity" type="number" name="GiftQuantity" required />
                    <br>
                    <button id="Button-form" class="Addbtn" type="submit">Thêm</button>
                </form>
            </div>
        </div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../../../assets/css/GiftCode/gift.js"></script>
<script src="../../../assets/css/sortColumn/index.js"></script>