<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Order.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/OrderDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/time.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/state.php";

session_start();
$listOrders = getListOrder();
$total_pages = getIndexPageOrder();
$page = isset($_GET['pI']) ? $_GET['pI'] : 1;
$lengthOrders = count($listOrders);

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            <form class="search"
                action="/Project_WebBanHang/Action-Controller/ProductController/SearchProduct_action.php">
                <div class="search__text">
                    <svg style="color:#ccc;" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                    <input name="search-product" id="search" placeholder="Tìm kiếm..." value />
                </div>
            </form>
            <div class="container_content">
                <div class="content_Admin_List">
                    <h3 style="margin-top:15px">Danh sách hóa đơn</h3>

                    <?php
                    if ($lengthOrders > 0) {

                        ?>
                        <table id="order">
                            <thead>
                                <tr>
                                    <th>Mã hóa đơn</th>
                                    <th>Ngày tạo</th>
                                    <th>Khách hàng</th>
                                    <th>Địa chỉ Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Tình trạng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listOrders as $orderData): ?>
                                    <?php $order = $orderData['order']; ?>
                                    <?php $user = $orderData['user']; ?>
                                    <tr>
                                        <td>
                                            <?php echo $order->getOrderID(); ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo convertDateTime($order->getDate())
                                                ?>
                                        </td>
                                        <td>
                                            <?php echo $user->getUserName(); ?>
                                        </td>
                                        <td>
                                            <?php echo $user->getEmail(); ?>
                                        </td>
                                        <td>
                                            <?php echo $user->getPhone(); ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo statusOrder($order->getStatus())
                                                ?>
                                        </td>
                                        <td>
                                            <div class="item-edit">
                                                <a title="Chi tiết"
                                                    href="/Project_WebBanHang/Action-Controller/OrderController/DetailOrder_action.php?id=<?php echo $order->getOrderID(); ?>"
                                                    class="btn mx-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                        <path
                                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                    </svg>

                                                </a>
                                            </div>

                                            <?php
                                            if ($order->getStatus() == "INPROCESS") {
                                                echo '
                                                    <div class="item-edit">
                                                        <a title="Xác nhận đơn hàng"
                                                            href="/Project_WebBanHang/Action-Controller/OrderController/OrderConfirmProduct_action.php?id=' . $order->getOrderID() . '"
                                                            class="btn mx-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                                                            </svg>
                                                        </a>
                                                    </div>

                                                    <div class="item-edit">
                                                        <a title="Xác nhận đơn hàng"
                                                        href="/Project_WebBanHang/Action-Controller/OrderController/Cancel_action.php?id=' . $order->getOrderID() . '"
                                                        class="btn mx-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                            </svg>
                                                        </a>
                                                    </div>

                                                ';
                                            } else if ($order->getStatus() == "CONFIRM") {
                                                echo '
                                                    <div class="item-edit">
                                                        <a title="Giao hàng thành công"
                                                            href="/Project_WebBanHang/Action-Controller/OrderController/DoneOrder_action.php?id=' . $order->getOrderID() . '"
                                                            class="btn mx-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                ';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php

                    } else {
                        echo "KHÔNG CÓ SẢN PHẨM NÀO!";
                    }
                    ?>
                    </table>
                </div>
                <ul class="pagination">
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
                        <li <?php if ($i == $page)
                            echo "class='active'"; ?>><a href="?pI=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                </ul>
                <div class="Pagination">
                    <ul class="pagination">
                        <?php
                        if ($page > 1) {
                            ?>
                            <li class="page-item"><a href="?page=<?php echo ($page - 1); ?> "
                                    class="page-link text-dark ">Trở lại</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                            ?>
                            <li class="page-item" <?php if ($i == $page)
                                echo "class='active'"; ?>><a
                                    href="?page=<?php echo $i; ?>" class="page-link text-dark "><?php echo $i; ?></a></li>
                            <?php
                        }
                        ?>
                        <?php
                        if ($page < $total_pages) {
                            ?>
                            <li class="page-item"><a href="?page=<?php echo ($page + 1); ?>"
                                    class="page-link text-dark">Tiếp</a></li>
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

</html>