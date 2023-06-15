<!-- <?php
        include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
        include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/UserDAO.php";
        include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";

        session_start();

        if ($_SESSION["login"] == false) {
            header("Location: /Project_WebBanHang/Template-Views/Admin/LoginAdmin/Index.php");
        }

        $listUser = getListUser();
        $total_pages = getIndexPageUser();
        $page = isset($_GET['p']) ? $_GET['p'] : 1;
        $lengthUser = count($listUser);
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/main.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/Popup.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/user_ind.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Quản lý thành viên</title>
</head>

<body>
    <div class="container_flex">
        <div class="side-nav">
            <div class="side-nav-inner">
            <?php
            echo sidebar();
            ?>
            </div>
        </div>
        <div class="content_Admin">
            <form class="search" action="/Project_WebBanHang/Action-Controller/UserController/SearchUser_action.php">
                <div class="search__text">
                    <svg style="color:#ccc;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                    <input name="search-user" id="search" placeholder="Tìm kiếm..." value />
                </div>
            </form>
            <div class="container_content">
                <div class="content_Admin">
                    <h3>Danh sách thành viên</h3>
                    <a class="btn-del" href="/Project_WebBanHang/Template-Views/Admin/User/DeletedUser.php">Danh sách thành viên bị huỷ</a>
                    <?php
                    if ($lengthUser > 0) {
                    ?>
                        <table id="customers">
                            <tr>
                                <th>ID</th>
                                <th>Tài khoản</th>
                                <th>Mật khẩu</th>
                                <th>Vị trí</th>
                                <th>Tên người dùng</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Email</th>
                                <th>Điện thoại</th>
                                <th>Thao tác</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < $lengthUser; $i++) {
                                if ($listUser[$i]->getPos() == "Thành viên") {


                            ?>
                                <tr>
                                    <td><?php echo $listUser[$i]->getUserID() ?></td>
                                    <td><?php echo $listUser[$i]->getUserName() ?></td>
                                    <td><?php echo $listUser[$i]->getPass() ?></td>
                                    <td><?php echo $listUser[$i]->getPos() ?></td>
                                    <td><?php echo $listUser[$i]->getFullName() ?></td>
                                    <td><?php echo $listUser[$i]->getBirth() ?></td>
                                    <td><?php echo $listUser[$i]->getAddress() ?></td>
                                    <td><?php echo $listUser[$i]->getEmail() ?></td>
                                    <td><?php echo $listUser[$i]->getPhone() ?></td>
                                    <td>
                                        <div class="icon_thaotac">
                                            <div class="item-edit">
                                                <a  title="Chi tiết" href="/Project_WebBanHang/Action-Controller/UserController/DetailUser_action.php?id=<?php echo $listUser[$i]->getUserID(); ?>" class="btn mx-1 btn_detail">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                        <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="item-edit">
                                                <a title="Xóa" onclick="openModal(<?php echo $listUser[$i]->getUserID(); ?>)" class="btn mx-1 btn_delete" style="cursor:pointer;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                                        <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                                }
                            }
                        } else {
                            echo "Không có thành viên nào";
                        }
                        ?>
                        </table>
                </div>
                <div class="Pagination">
                    <ul class="pagination">
                        <?php
                        if ($page > 1) {
                        ?>
                            <li class="page-item"><a href="?p=<?php echo ($page - 1); ?>" class="page-link text-dark">Trở lại</a></li>
                        <?php
                        }
                        ?>
                        <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                        ?>
                            <li class="page-item" <?php if ($i == $page) echo "class='active'"; ?>><a href="?p=<?php echo $i; ?>" class="page-link text-dark"><?php echo $i; ?></a></li>
                        <?php
                        }
                        ?>
                        <?php
                        if ($page < $total_pages) {
                        ?>
                            <li class="page-item"><a href="?p=<?php echo ($page + 1); ?>" class="page-link text-dark">Tiếp</a></li>
                        <?php
                        }
                        ?>
                    </ul>
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
        if (idDelete) {
            window.location.href = `/Project_WebBanHang/Action-Controller/UserController/DeleteUser_action.php?id=${idDelete}`
        }
    }
</script>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
            outline: none;
            box-sizing: border-box;
        }

        :root {
            --body-bg-color: #e5ecef;
            --theme-bg-color: #fafafb;
            --body-font: "Poppins", sans-serif;
            --body-color: #2f2f33;
            --active-color: #0162ff;
            --active-light-color: #e1ebfb;
            --header-bg-color: #fff;
            --search-border-color: #efefef;
            --border-color: #d8d8d8;
            --alert-bg-color: #e8f2ff;
            --subtitle-color: #83838e;
            --inactive-color: #f0f0f0;
            --placeholder-color: #9b9ba5;
            --time-button: #fc5757;
            --level-button: #5052d5;
            --button-color: #fff;
        }

        ::-moz-placeholder {
            color: var(--placeholder-color);
        }

        :-ms-input-placeholder {
            color: var(--placeholder-color);
        }

        ::placeholder {
            color: var(--placeholder-color);
        }

        img {
            max-width: 100%;
        }

        html {
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        body {
            background-color: var(--body-bg-color);
            font-family: var(--body-font);
            font-size: 15px;
            color: var(--body-color);
        }

        .job {
            display: flex;
            flex-direction: column;
            max-width: 100%;
            margin: 0 auto;
            overflow: hidden;
            background-color: var(--theme-bg-color);
        }

        .logo {
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 18px;
            cursor: pointer;
        }

        .logo svg {
            width: 24px;
            margin-right: 12px;
        }

        .header {
            display: flex;
            align-items: center;
            transition: box-shadow 0.3s;
            flex-shrink: 0;
            padding: 0 40px;
            white-space: nowrap;
            background-color: var(--header-bg-color);
            height: 60px;
            width: 100%;
            font-size: 14px;
            justify-content: space-between;
        }

        .header-menu a {
            text-decoration: none;
            color: var(--body-color);
            font-weight: 500;
        }

        .header-menu a:hover {
            color: var(--active-color);
        }

        .header-menu a:not(:first-child) {
            margin-left: 30px;
        }

        .user-settings {
            display: flex;
            align-items: center;
            font-weight: 500;
        }

        .user-settings svg {
            width: 20px;
            color: #94949f;
        }

        .user-menu {
            position: relative;
            margin-right: 8px;
            padding-right: 8px;
            border-right: 2px solid #d6d6db;
        }

        .user-menu:before {
            position: absolute;
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            border: 2px solid var(--header-bg-color);
            right: 6px;
            top: -1px;
            background-color: var(--active-color);
        }

        .user-profile {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            -o-object-fit: cover;
            object-fit: cover;
            margin-right: 10px;
        }

        .wrapper {
            width: 100%;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            scroll-behavior: smooth;
            padding: 30px 40px;
            overflow: auto;
        }

        .search-menu {
            height: 56px;
            white-space: nowrap;
            display: flex;
            flex-shrink: 0;
            align-items: center;
            background-color: var(--header-bg-color);
            border-radius: 8px;
            width: 100%;
            padding-left: 20px;
        }

        .search-menu div:not(:last-of-type) {
            border-right: 1px solid var(--search-border-color);
        }

        .search-bar {
            height: 55px;
            width: 100%;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            height: 100%;
            display: block;
            background-color: transparent;
            border: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 56.966 56.966' fill='%230162ff'%3e%3cpath d='M55.146 51.887L41.588 37.786A22.926 22.926 0 0046.984 23c0-12.682-10.318-23-23-23s-23 10.318-23 23 10.318 23 23 23c4.761 0 9.298-1.436 13.177-4.162l13.661 14.208c.571.593 1.339.92 2.162.92.779 0 1.518-.297 2.079-.837a3.004 3.004 0 00.083-4.242zM23.984 6c9.374 0 17 7.626 17 17s-7.626 17-17 17-17-7.626-17-17 7.626-17 17-17z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-size: 14px;
            background-position: 0 50%;
            padding: 0 25px 0 305px;
        }

        .search-location,
        .search-job,
        .search-salary {
            display: flex;
            align-items: center;
            width: 50%;
            font-size: 14px;
            font-weight: 500;
            padding: 0 25px;
            height: 100%;
        }

        .search-location input,
        .search-job input,
        .search-salary input {
            width: 100%;
            height: 100%;
            display: block;
            background-color: transparent;
            border: none;
        }

        .search-location svg,
        .search-job svg,
        .search-salary svg {
            margin-right: 8px;
            width: 18px;
            color: var(--active-color);
            flex-shrink: 0;
        }

        .search-button {
            background-color: var(--active-color);
            height: 55px;
            border: none;
            font-weight: 600;
            font-size: 14px;
            padding: 0 15px;
            border-radius: 0 8px 8px 0;
            color: var(--button-color);
            cursor: pointer;
            margin-left: auto;
        }

        .search.item {
            position: absolute;
            top: 10px;
            left: 25px;
            font-size: 13px;
            color: var(--active-color);
            border: 1px solid var(--search-border-color);
            padding: 8px 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
        }

        .search.item svg {
            width: 12px;
            margin-left: 5px;
        }

        .search.item:last-child {
            left: 185px;
        }

        .header-menu a.active {
            color: var(--active-color);
        }

        .logout-btn {
            text-decoration: none;
            background-color: #0162ff;
            padding: 6px 12px;
            color: white;
            border-radius: 6px;
        }
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
                <a href="#">Trang chủ</a>
                <a href="#">Sản phẩm</a>
                <a href="#">Danh mục sản phẩm</a>
                <a href="#" class="active">Khách hàng</a>
                <a href="#">Đơn hàng </a>
                <a href="#">Khuyễn Mãi</a>
            </div>
            <div class="user-settings">
                <a href="#" class="logout-btn">Đăng xuất</a>
            </div>
        </div>

        <div class="wrapper">
            <div class="search-menu">
                <div class="search-bar">
                    <input type="text" class="search-box" autofocus />
                    <div class="search item">Product Designer
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <path d="M18 6L6 18M6 6l12 12" />
                        </svg>
                    </div>
                    <div class="search item">UI Designer
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <path d="M18 6L6 18M6 6l12 12" />
                        </svg>
                    </div>
                </div>
                <div class="search-location">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
                        <circle cx="12" cy="10" r="3" />
                    </svg>
                    Londontowne, MD
                </div>
                <div class="search-job">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
                        <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16" />
                    </svg>
                    <input type="text" placeholder="Job Type">
                </div>
                <div class="search-salary">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="currentColor" stroke-width=".4">
                        <path d="M12.6 18H9.8a.8.8 0 010-1.5h2.8a.9.9 0 000-1.8h-1.2a2.4 2.4 0 010-4.7h2.8a.8.8 0 010 1.5h-2.8a.9.9 0 000 1.8h1.2a2.4 2.4 0 010 4.7z" stroke="currentColor" />
                        <path d="M12 20a.8.8 0 01-.8-.8v-2a.8.8 0 011.6 0v2c0 .5-.4.8-.8.8zM12 11.5a.8.8 0 01-.8-.8v-2a.8.8 0 011.6 0v2c0 .5-.4.8-.8.8z" stroke="currentColor" />
                        <path d="M21.3 23H2.6A2.8 2.8 0 010 20.2V3.9C0 2.1 1.2 1 2.8 1h18.4C22.9 1 24 2.2 24 3.8v16.4c0 1.6-1.2 2.8-2.8 2.8zM2.6 2.5c-.6 0-1.2.6-1.2 1.3v16.4c0 .7.6 1.3 1.3 1.3h18.4c.7 0 1.3-.6 1.3-1.3V3.9c0-.7-.6-1.3-1.3-1.3z" stroke="currentColor" />
                        <path d="M23.3 6H.6a.8.8 0 010-1.5h22.6a.8.8 0 010 1.5z" stroke="currentColor" />
                    </svg>
                    <input type="text" placeholder="Salary Range">
                </div>
                <button class="search-button">Find Job</button>
            </div>

        </div>
</body>

</html>