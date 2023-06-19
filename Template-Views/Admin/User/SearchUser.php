<?php

include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/UserDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/time.php";


session_start();
$searchUser = $_SESSION["search-userName"];
$listUserSearch = SearchUser($searchUser);
$page = isset($_GET['p']) ? $_GET['p'] : 1;
$total_pages = count($listUserSearch);
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />

    <title>Quản lý khách hàng</title>
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
                <a href="/Project_WebBanHang/Template-Views/Admin/User/Index.php" class="active">Khách hàng</a>
                <a href="/Project_WebBanHang/Template-Views/Admin/Order/Index.php">Đơn hàng </a>
                <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php">Khuyễn Mãi</a>
            </div>
            <div class="user-settings">
                <a href="/Project_WebBanHang/Action-Controller/LoginController/Logout_action.php" class="logout-btn">Đăng xuất</a>
            </div>
        </div>

        <div class="wrapper">
            <form class="search-menu" action="/Project_WebBanHang/Action-Controller/UserController/SearchUser_action.php">
                <div class="search-salary">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                        fill="currentColor" stroke-width=".4">
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
                    <input name="search-user" id="search" placeholder="Tìm kiếm..." value />
                </div>
                <button class="search-button">Tìm kiếm</button>
            </form>

            <div>
                <div class="container">
                    <div class="table">
                        <div class="table-header">
                            <div class="header__item"><a id="ID" class="filter__link filter__link--number"
                                    href="#">ID</a></div>
                            <div class="header__item"><a id="account" class="filter__link" href="#">Tài khoản</a></div>
                            <div class="header__item"><a class="filter__link" href="#">Mật khẩu</a></div>
                            <div class="header__item"><a class="filter__link filter__link--number" href="#">Vị trí</a>
                            </div>
                            <div class="header__item"><a id="name" class="filter__link" href="#">Tên người dùng</a>
                            </div>
                            <div class="header__item"><a class="filter__link" href="#">Ngày sinh</a></div>
                            <div class="header__item"><a id="address" class="filter__link" href="#">Địa chỉ</a></div>
                            <div class="header__item"><a class="filter__link filter__link--number" href="#">Email</a>
                            </div>
                            <div class="header__item"><a class="filter__link filter__link--number" href="#">Điện
                                    thoại</a></div>
                            <div class="header__item"><a class="filter__link filter__link--number" href="#">Thao tác</a>
                            </div>
                        </div>
                        <div class="table-content">
                            <?php
                            foreach ($listUserSearch as $user) {
                                if ($user->getPos() == "Thành viên") {
                                    echo '<div class="table-row">';
                                    echo ' <div class="table-data">' . $user->getUserID() . "</div>";
                                    echo ' <div class="table-data">' . $user->getUserName() . "</div>";
                                    echo ' <div class="table-data">' . $user->getPass() . "</div>";
                                    echo ' <div class="table-data">' . $user->getPos() . "</div>";
                                    echo ' <div class="table-data">' . $user->getFullName() . "</div>";
                                    echo ' <div class="table-data">' . convertToDdMmYyyy( $user->getBirth()) . "</div>";
                                    echo ' <div class="table-data">' . $user->getAddress() . "</div>";
                                    echo ' <div class="table-data">' . $user->getEmail() . "</div>";
                                    echo ' <div class="table-data">' . $user->getPhone() . "</div>";
                                    echo '    <div class="table-data">';
                                    echo '        <div class="item-edit">';
                                    echo '            <a title="Xóa" onclick="openModal(' . $user->getUserID() . ')" class="btn mx-1 btn_delete" style="cursor:pointer;">';
                                    echo '                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">';
                                    echo '                       <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />';
                                    echo '                </svg>';
                                    echo '            </a>';
                                    echo '        </div>';
                                    echo '    </div>';
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="myModal" class="modal-popup">
            <div class="modal-content-popup">
                <p class="text-modal">Bạn có chắc chắn muốn xóa?</p>
                <div class="list-btn">
                    <button class="button delete action-delete" onclick="deleteItem()">Xóa</button>
                    <button class="button" onclick="closeModal()">Hủy</button>
                </div>
            </div>
        </div>

        <div id="toast" class="toast"></div>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="../../../assets/css/User/user.js"></script>
<script src="../../../assets/css/ToastMessage/ToastMessage.js"></script>

<script>
let idDelete;

function checkInputSearch(event) {
    if (event.keyCode === 13 || event.type === "click") {
        if (searchBox.value.trim() === "") {
            console.log(1);
            event.preventDefault();
            toast({
                title: "Thất bại!",
                message: "Vui lòng điền đầy đủ thông tin trước khi tìm kiếm",
                type: "error",
                duration: 5000
            });
        } else {
            window.location.href = "/Project_WebBanHang/Action-Controller/UserController/SearchUser_action.php";
        }
    }
}

const searchBox = document.getElementById("search");
const btnSearch = document.querySelector('.search-button');
btnSearch.addEventListener("click", checkInputSearch);
searchBox.addEventListener("keypress", checkInputSearch);

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
    if (idDelete) {
        window.location.href =
            `/Project_WebBanHang/Action-Controller/UserController/DeleteUser_action.php?id=${idDelete}`
    }
}

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