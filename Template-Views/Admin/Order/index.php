<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Order.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/OrderDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/time.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/state.php";

session_start();
if ($_SESSION["login"] == false) {
    header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
}
$listOrders = getListOrder();
$total_pages = getIndexPageOrder();
$page = isset($_GET['pI']) ? $_GET['pI'] : 1;
$lengthOrders = count($listOrders);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/Order/Order.css">
    <link rel="stylesheet" href="../../../assets/css/mainHeader.css">
    <link rel="stylesheet" href="../../../assets/css/User/user.css">
    <link rel="stylesheet" href="../../../assets/css/popUpModel.css">
    <link rel="stylesheet" href="../../../assets/css/pagination.css">
    <link rel="stylesheet" href="../../../assets/css/ToastMessage/ToastMessage.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />

    <title>Quản lý hóa đơn</title>
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
                <a href="/Project_WebBanHang/Template-Views/Admin/Order/Index.php" class="active">Đơn hàng </a>
                <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php">Khuyễn Mãi</a>
            </div>
            <div class="user-settings">
                <a href="/Project_WebBanHang/Action-Controller/LoginController/Logout_action.php"
                    class="logout-btn">Đăng xuất</a>
            </div>
        </div>

        <form class="search-menu"
            action="/Project_WebBanHang/Action-Controller/OrderController/Search-Order.php">
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
                <input name="search-order" id="search" placeholder="Tìm kiếm..." />
            </div>
            <button class="search-button">Tìm kiếm</button>
        </form>

        <div>
            <div class="container">
                <div class="table">
                    <div class="table-header">
                        <div class="header__item"><a id="ID" class="filter__link filter__link--number" href="#">Mã hóa đơn</a></div>
                        <div class="header__item"><a class="filter__link" href="#">Ngày tạo</a></div>
                        <div class="header__item"><a id="name" class="filter__link" href="#">Tên khách hàng</a></div>
                        <div class="header__item"><a class="filter__link filter__link--number" href="#">Email khách hàng</a>
                        </div>
                        <div class="header__item"><a class="filter__link" href="#">Số điện thoại khách hàng</a></div>
                        <div class="header__item"><a class="filter__link" href="#">Trạng thái</a></div>
                        <div class="header__item"><a class="filter__link filter__link--number" href="#">Thao tác</a>
                        </div>
                    </div>
                    <div class="table-content">
                        <?php
                        foreach ($listOrders as $orderData) {
                            $order = $orderData['order'];
                            $user = $orderData['user'];

                            echo '<div class="table-row">';
                            echo ' <div class="table-data">' . $order->getOrderID() . "</div>";
                            echo ' <div class="table-data">' .convertDateTime($order->getDate()) . "</div>";
                            echo ' <div class="table-data">' . $user->getUserName() ."</div>";
                            echo ' <div class="table-data">' . $user->getEmail() . "</div>";
                            echo ' <div class="table-data">' . $user->getPhone() . "</div>";
                            echo ' <div class="table-data">' . statusOrder($order->getStatus()) . "</div>";
                            echo '    <div class="table-data function-product">';
                            if ($order->getStatus() === "cart" || $order->getStatus() === "confirm" ||  $order->getStatus() === "completed") {
                                echo '<div class="item-edit">' .
                                '<a title="Chi tiết" href="/Project_WebBanHang/Action-Controller/OrderController/DetailOrder_action.php?id=' . $order->getOrderID() . '" class="btn mx-1">' .
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">' .
                                '<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />' .
                                '<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />' .
                                '</svg>' .
                                '</a>' .
                                '</div>'; 
                            } else if ($order->getStatus() === "payed") {
                                echo '<div class="item-edit">' .
                                '<a title="Chi tiết" href="/Project_WebBanHang/Action-Controller/OrderController/DetailOrder_action.php?id=' . $order->getOrderID() . '" class="btn mx-1">' .
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">' .
                                '<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />' .
                                '<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />' .
                                '</svg>' .
                                '</a>' .
                                '</div>'; 
                                echo '<div class="item-edit">' .
                                '<a title="Xác nhận đơn hàng" href="/Project_WebBanHang/Action-Controller/OrderController/OrderConfirmProduct_action.php?id=' . $order->getOrderID() . '" class="btn mx-1">' .
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">' .
                                '<path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>' .
                                '</svg>' .
                                '</a>' .
                                '</div>';
                                echo '<div class="item-edit">' .
                                '<a title="Hủy đơn hàng" href="/Project_WebBanHang/Action-Controller/OrderController/Cancel_action.php?id=' . $order->getOrderID() . '" class="btn mx-1">' .
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">' .
                                '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>' .
                                '<path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>' .
                                '</svg>' .
                                '</a>' .
                                '</div>';
                            }
                            echo '</div>';
                            echo '</div>';
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

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../../../assets/css/sortColumn/index.js"></script>
<script src="../../../assets/css/Order/Order.js"></script>

</html>