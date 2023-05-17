<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GiftcodeDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";

session_start();
$listGift = getListGift();
$total_pages = getIndexPage();
$page = isset($_GET['pg']) ? $_GET['pg'] : 1;
$_SESSION['index'] = $page;
$lengtGift = count($listGift);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/main.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/category.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/Popup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>GiftCode</title>
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
            <div class="container_content">
                <div class="content_Admin">
                    <h3>Danh mục sản phẩm</h3>
                    <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/CreateGift.php">Thêm mã giảm giá</a>
                    <?php
                    if ($lengtGift > 0) {
                    ?>
                        <table id="customers">
                            <tr>
                                <th>ID</th>
                                <th>Mã Gift</th>
                                <th>Thành tiền</th>
                                <th>Số lượng</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < $lengtGift; $i++) {
                            ?>
                                <tr>
                                    <td><?php echo $listGift[$i]->getGiftID() ?></td>
                                    <td><?php echo $listGift[$i]->getGiftContent() ?></td>
                                    <td><?php echo $listGift[$i]->getGiftValue() ?></td>
                                    <td><?php echo $listGift[$i]->getGiftQuantity() ?></td>
                                    <td><?php if($listGift[$i]->getGiftActive() == 1) {
                                        echo "Hoạt động";
                                    }
                                    else {
                                        echo "<p>Đã Huỷ</p>";
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <div class="icon_thaotac">
                                           
                                                <?php
                                                if($listGift[$i]->getGiftActive() == 1) {

                                                    ?>
                                            <div class="item-edit">
                                                <a href="/Project_WebBanHang/Action-Controller/GiftCodeController/GetInfoGift_action.php?id=<?php echo $listGift[$i]->getGiftID(); ?>" class="btn mx-1">
                                                    Sửa
                                                </a>
                                            </div>
                                            <div class="item-edit">
                                                <a onclick="openModal(<?php echo $listGift[$i]->getGiftID(); ?>)" class="btn mx-1" style="cursor:pointer;">
                                                    Xoá
                                                </a>
                                            </div>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <a onclick="openModal(<?php echo $listGift[$i]->getGiftID(); ?>,<?php echo $listGift[$i]->getGiftActive(); ?>)" style="cursor:pointer;" class="btn mx-1">
                                                    Kích hoạt
                                                </a>
                                                <?php
                                                }
                                                ?>
                                              
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "KHÔNG CÓ DANH MỤC SẢN PHẨM NÀO!";
                        }
                        ?>
                        </table>
                </div>
                <ul class="pagination">
                    <?php
                    if ($page > 1) {
                    ?>
                        <li><a href="?pg=<?php echo ($page - 1); ?>">Trở lại</a></li>
                    <?php
                    }
                    ?>
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) {
                    ?>
                        <li <?php if ($i == $page) echo "class='active'"; ?>><a href="?pg=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($page < $total_pages) {
                    ?>
                        <li><a href="?pg=<?php echo ($page + 1); ?>">Tiếp</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal-popup">
        <div class="modal-content-popup">
            <p class="text-modal">Bạn có chắc chắn muốn Kích hoạt/ xóa?</p>
            <div class="list-btn">
                <button class="button delete action-delete" onclick="deleteItem()">Kích hoạt/ Xóa</button>
                <button class="button" onclick="closeModal()">Hủy</button>
            </div>
        </div>
    </div>

</body>

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
        if(idDelete && state == 0) {
           window.location.href= `/Project_WebBanHang/Action-Controller/GiftCodeController/EditGift_action.php?active=${idDelete}`
        }
        else {
            window.location.href = `/Project_WebBanHang/Action-Controller/GiftCodeController/DeleteGift_action.php?id=${idDelete}`
        }
    }
</script>

</html>