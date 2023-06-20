<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Order.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/OrderDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/time.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/state.php";

session_start();

if($_SESSION["login"] == false) {
    header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
}

$listOrders = getListOrder();
$total_pages = getIndexPageOrder();
$page = isset($_GET['pI']) ? $_GET['pI'] : 1;
$lengthhOrders = count($listOrders);
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <title>Quản lý đơn hàng</title>
    </style>

</head>

<body>
    <div class="job">
        <div class="header">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path xmlns="http://www.w3.org/2000/svg" d="M512 503.5H381.7a48 48 0 01-45.3-32.1L265 268.1l-9-25.5 2.7-124.6L338.2 8.5l23.5 67.1L512 503.5z" fill="#0473ff" data-original="#28b446" />
                    <path xmlns="http://www.w3.org/2000/svg" fill="#0473ff" data-original="#219b38" d="M361.7 75.6L265 268.1l-9-25.5 2.7-124.6L338.2 8.5z" />
                    <path xmlns="http://www.w3.org/2000/svg" d="M338.2 8.5l-82.2 234-80.4 228.9a48 48 0 01-45.3 32.1H0l173.8-495h164.4z" fill="#0473ff" data-original="#518ef8" />
                </svg>
                Admin
            </div>
            <div class="header-menu">
                <a href="/Project_WebBanHang/Template-Views/Admin/Shared/Index.php">Trang chủ</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">Sản phẩm</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Category/Index.php">Danh mục sản phẩm</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/User/Index.php">Khách hàng</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Order/Index.php" class="active">Đơn hàng </a>
                <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php">Khuyến Mãi</a>
            </div>
            <div class="user-settings">
                <a href="/Project_WebBanHang/Action-Controller/LoginController/Logout_action.php" class="logout-btn">Đăng xuất</a>
            </div>
        </div>
        <div class="wrapper">
        <h3 style="text-align: center;">Danh sách đơn hàng</h3>
            <div>
            <div class="container">
    <div class="table">
        <div class="table-header">
            <div class="header__item"><a id="ID" class="filter__link filter__link--number" href="#">ID</a></div>
            <div class="header__item"><a id="account" class="filter__link" href="#">Ngày tạo</a></div>
            <div class="header__item"><a class="filter__link" href="#">Khách hàng</a></div>
            <div class="header__item"><a class="filter__link filter__link--number" href="#">Email</a>
            </div>
            <div class="header__item"><a class="filter__link filter__link--number" href="#">Số điện thoại</a>
            </div>
            <div class="header__item"><a id="name" class="filter__link" href="#">Trạng thái</a>
            </div>
            <div class="header__item"><a class="filter__link filter__link--number" href="#">Thao tác</a>
            </div>
        </div>
        <div class="table-content">
    <?php
    if ($lengthhOrders > 0) {
        foreach ($listOrders as $orderData) {
            $order = $orderData['order'];
            $user = $orderData['user'];
    ?>
            <div class="table-row">
                <div class="table-data"><?php echo $order->getOrderID(); ?></div>
                <div class="table-data"><?php echo convertDateTime($order->getDate()); ?></div>
                <div class="table-data"><?php echo $user->getUserName(); ?></div>
                <div class="table-data"><?php echo $user->getEmail(); ?></div>
                <div class="table-data"><?php echo $user->getPhone(); ?></div>
                <div class="table-data"><?php echo statusOrder($order->getStatus()); ?></div>
                <div class="table-data">
                    <div class="item-edit">
                        <a title="Chi tiết" href="/Project_WebBanHang/Action-Controller/OrderController/DetailOrder_action.php?id=<?php echo $order->getOrderID(); ?>" class="btn mx-1">
                            Chi tiết đơn hàng
                        </a>
                    </div>
                    <?php if ($order->getStatus() == "payed") { ?>
                        <div class="item-edit">
                            <a title="Xác nhận đơn hàng" href="/Project_WebBanHang/Action-Controller/OrderController/OrderConfirmProduct_action.php?id=<?php echo $order->getOrderID(); ?>" class="btn mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
                                </svg>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
    <?php
        }
    } else {
        echo "KHÔNG CÓ SẢN PHẨM NÀO!";
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
                            <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a href="?pg=<?php echo $i; ?>" class="page-link text-dark"><?php echo $i; ?></a></li>
                        <?php } ?>

                        <?php if ($page < $total_pages) { ?>
                            <li class="page-item"><a href="?pg=<?php echo ($page + 1); ?>" class="page-link text-dark">Tiếp</a></li>
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
                <form method="post" action="/Project_WebBanHang/Action-Controller/GiftCodeController/CreateGift_action.php">
                    <label>Số tiền</label>
                    <input id="GiftValue" type="number" name="GiftValue" required />
                    <br>
                    <label>Số lượng</label>
                    <input id="GiftQuantity" type="number" name="GiftQuantity" required />
                    <br>
                    <button class="Addbtn" type="submit">Thêm</button>
                </form>
            </div>
        </div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../../../assets/css/User/user.js"></script>
<script src="../../../assets/css/ToastMessage/ToastMessage.js"></script>

<script>

let active;
    let idDelete;

    function openModal(id, active) {
        var modal = document.getElementById("myModal");
        modal.classList.add("show");
        idDelete = id;
        state = active;
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.classList.remove("show");
        idDelete = null;
        state = null;
    }

    function deleteItem() {
        if (idDelete && state == 0) {
            window.location.href = `/Project_WebBanHang/Action-Controller/GiftCodeController/EditGift_action.php?active=${idDelete}`
        } else {
            window.location.href = `/Project_WebBanHang/Action-Controller/GiftCodeController/DeleteGift_action.php?id=${idDelete}`
        }
    }


// open model add gift
const addGroupButton = document.querySelectorAll('.add-product-js')
    const modal = document.querySelector('.modal-addGroup')
    const modalClose = document.querySelector('.js-modal-close')
    const modalContainer = document.querySelector('.js-modal-container')

    function showBuyTicket() {
        modal.classList.add('open')
    }

    function hideBuyTicket() {
        modal.classList.remove('open')
    }


    addGroupButton[0].addEventListener('click', showBuyTicket)


    modalClose.addEventListener('click', hideBuyTicket)

    modal.addEventListener('click', hideBuyTicket)

    modalContainer.addEventListener('click', (event) => {
        event.stopPropagation()
    })



//
   
    var properties = [
        'ID',
        'account',
        'name',
        'address',
    ];

    $.each(properties, function(i, val) {

        var orderClass = '';

        $("#" + val).click(function(e) {
            e.preventDefault();
            $('.filter__link.filter__link--active').not(this).removeClass('filter__link--active');
            $(this).toggleClass('filter__link--active');
            $('.filter__link').removeClass('asc desc');

            if (orderClass == 'desc' || orderClass == '') {
                $(this).addClass('asc');
                orderClass = 'asc';
            } else {
                $(this).addClass('desc');
                orderClass = 'desc';
            }

            var parent = $(this).closest('.header__item');
            var index = $(".header__item").index(parent);
            var $table = $('.table-content');
            var rows = $table.find('.table-row').get();
            var isSelected = $(this).hasClass('filter__link--active');
            var isNumber = $(this).hasClass('filter__link--number');

            rows.sort(function(a, b) {

                var x = $(a).find('.table-data').eq(index).text();
                var y = $(b).find('.table-data').eq(index).text();

                if (isNumber == true) {

                    if (isSelected) {
                        return x - y;
                    } else {
                        return y - x;
                    }

                } else {

                    if (isSelected) {
                        if (x < y) return -1;
                        if (x > y) return 1;
                        return 0;
                    } else {
                        if (x > y) return -1;
                        if (x < y) return 1;
                        return 0;
                    }
                }
            });

            $.each(rows, function(index, row) {
                $table.append(row);
            });

            return false;
        });

    });
</script>


