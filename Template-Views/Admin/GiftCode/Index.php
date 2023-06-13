<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GiftcodeDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GiftCode.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/layout/sidebar.php";

session_start();

if($_SESSION["login"] == false) {
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/main.css">
    <!-- <link rel="stylesheet" href="/Project_WebBanHang/assets/css/category.css"> -->
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/Popup.css">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/giftcode_ind.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>GiftCode</title>
</head>

<body>
<style>
        /* modal  */
        .modal-addGroup {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.4);
            display: none;
            align-items: center;
            justify-content: center;
        }

        .modal-addGroup.open {
            display: flex;
        }

        .flex-box {
            display: flex;
        }

        .modal-addGroup .modal-container {
            background-color: #fff;
            min-height: 150px;
            width: 620px;
            position: relative;
            max-width: calc(100% - 32px);
            animation: modalFadeIn ease 0.5s;
        }

        .modal-addGroup .modal-header {
            background-color: #009688;
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #fff;
        }

        .modal-addGroup .modal-close {
            position: absolute;
            margin-top: 0px;
            margin-bottom: 0px;
            right: 0;
            top: 0;
            color: #fff;
            padding: 12px;
            cursor: pointer;
        }

        .modal-body {
            padding: 16px;
        }

        .modal-label {
            display: block;
            font-size: 15px;
            margin-bottom: 12px;
        }

        .modal-input {
            border: 1px solid #ccc;
            width: 100%;
            padding: 10px;
            font-size: 15px;
            margin-bottom: 12px;
            padding-right: 0px;
        }

        #buyTickets {
            background-color: #009688;
            border: none;
            color: #fff;
            width: 100%;
            font-size: 15px;
            padding: 18px;
            cursor: pointer;
        }

        #buyTickets:hover {
            opacity: 0.8;
        }

        .modal-footer {
            padding: 16px;
            text-align: right;
        }

        .modal-footer a {
            color: #2196f3
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-100px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <div class="container_flex">
        <div class="side-nav">
            <div class="side-nav-inner">
                <ul class="side-nav-menu scrollable" style="list-style-type: none;">
                    <?php
                    echo sidebar();
                    ?>
                </ul>
            </div>
        </div>
        <div class="content_Admin">
            <div class="container_content">
                <div class="content_Admin">
                    <h3>Danh sách mã giảm giá</h3>
                    <button class="add-product-js btn_add">Thêm mới mã giảm giá</button>
                    <!-- <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/CreateGift.php">Thêm mã giảm giá</a> -->
                    <?php
                    if ($lengthGift > 0) {
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
                            for ($i = 0; $i < $lengthGift; $i++) {
                            ?>
                                <tr>
                                    <td><?php echo $listGift[$i]->getGiftID() ?></td>
                                    <td><?php echo $listGift[$i]->getGiftContent() ?></td>
                                    <td><?php echo $listGift[$i]->getGiftValue() ?></td>
                                    <td><?php echo $listGift[$i]->getGiftQuantity() ?></td>
                                    <td><?php if ($listGift[$i]->getGiftActive() == 1) {
                                            echo "Hoạt động";
                                        } else {
                                            echo "Đã huỷ";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="icon_thaotac">

                                            <?php
                                            if ($listGift[$i]->getGiftActive() == 1) {

                                            ?>
                                                <div class="item-edit">
                                                    <a href="/Project_WebBanHang/Action-Controller/GiftCodeController/GetInfoGift_action.php?id=<?php echo $listGift[$i]->getGiftID(); ?>" class="btn mx-1 btn_edit">
                                                        Sửa
                                                    </a>
                                                </div>
                                                <div class="item-edit">
                                                    <a onclick="openModal(<?php echo $listGift[$i]->getGiftID(); ?>)" class="btn mx-1 btn_del" style="cursor:pointer;">
                                                        Xoá
                                                    </a>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <a onclick="openModal(<?php echo $listGift[$i]->getGiftID(); ?>,<?php echo $listGift[$i]->getGiftActive(); ?>)" style="cursor:pointer;" class="btn mx-1 btn_active">
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
                <div class="Pagination">
                <ul class="pagination">
                    <?php
                    if ($page > 1) {
                    ?>
                        <li class="page-item"><a href="?pg=<?php echo ($page - 1); ?>" class="page-link text-dark ">Trở lại</a></li>
                    <?php
                    }
                    ?>
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) {
                    ?>
                        <li class="page-item"<?php if ($i == $page) echo "class='active'"; ?>><a href="?pg=<?php echo $i; ?>" class="page-link text-dark "><?php echo $i; ?></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($page < $total_pages) {
                    ?>
                        <li class="page-item"><a href="?pg=<?php echo ($page + 1); ?>"class="page-link text-dark ">Tiếp</a></li>
                    <?php
                    }
                    ?>
                </ul>

                </div>
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
    <div class="modal-addGroup">
        <div class="modal-container js-modal-container">
            <p class="modal-close js-modal-close">X</p>
            <form method="post" action="/Project_WebBanHang/Action-Controller/GiftCodeController/CreateGift_action.php">
                <label>Số tiền giảm</label>
                <input id="GiftValue" type="number" name="GiftValue" required />
                <br>
                <label>Số lượng mã gift</label>

                <input id="GiftQuantity" type="number" name="GiftQuantity" required />
                <br>
                <button class="Addbtn" type="submit">Thêm</button>
            </form>
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
        if (idDelete && state == 0) {
            window.location.href = `/Project_WebBanHang/Action-Controller/GiftCodeController/EditGift_action.php?active=${idDelete}`
        } else {
            window.location.href = `/Project_WebBanHang/Action-Controller/GiftCodeController/DeleteGift_action.php?id=${idDelete}`
        }
    }
    // model

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
</script>

</html>