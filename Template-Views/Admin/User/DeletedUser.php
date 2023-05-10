<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
session_start();
$listUserDelete = getAllUser();
$lengthDeleteUser = count($listUserDelete);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh vien da huy</title>
</head>

<body>
    <?php
    if ($lengthDeleteUser > 0) {
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
            for ($i = 0; $i < $lengthDeleteUser; $i++) {
                if ($listUserDelete[$i]->getAct() == 0) {
            ?>
                    <tr>
                        <td><?php echo $listUserDelete[$i]->getUserID() ?></td>
                        <td><?php echo $listUserDelete[$i]->getUserName() ?></td>
                        <td><?php echo $listUserDelete[$i]->getPass() ?></td>
                        <td><?php echo $listUserDelete[$i]->getPos() ?></td>
                        <td><?php echo $listUserDelete[$i]->getFullName() ?></td>
                        <td><?php echo $listUserDelete[$i]->getBirth() ?></td>
                        <td><?php echo $listUserDelete[$i]->getAddress() ?></td>
                        <td><?php echo $listUserDelete[$i]->getEmail() ?></td>
                        <td><?php echo $listUserDelete[$i]->getPhone() ?></td>
                        <td>
                            <div class="icon_thaotac">
                                <div class="item-edit">
                                    <a href="/Project_WebBanHang/Action-Controller/UserController/DetailUser_action.php?id=<?php echo $listUserDelete[$i]->getUserID(); ?>" class="btn mx-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                            <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="item-edit">
                                    <a href="/Project_WebBanHang/Action-Controller/UserController/UndoUser_action.php?id=<?php echo $listUserDelete[$i]->getUserID(); ?>" class="btn mx-1">
                                        Khôi phục
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
        <?php
                }
            }
        } else {
            echo "KHÔNG CÓ THANH VIEN NAO!";
        }
        ?>
        </table>
        <a href="/Project_WebBanHang/Template-Views/Admin/User/Index.php">Tro Lai</a>
</body>

</html>