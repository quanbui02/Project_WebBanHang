<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/UserDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";

session_start();

if($_SESSION["login"] == false) {
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
    <!-- <link rel="stylesheet" href="/Project_WebBanHang/assets/css/category.css"> -->
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
                                if($listUser[$i]->getPos() == "Thành viên") {

                                
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
        if (idDelete) {
            window.location.href = `/Project_WebBanHang/Action-Controller/UserController/DeleteUser_action.php?id=${idDelete}`
        }
    }
</script>

</html>