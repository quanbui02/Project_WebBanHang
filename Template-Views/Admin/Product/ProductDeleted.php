<?php 
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/product.php";
session_start();
$listProductDeleted = getAllListProduct();
$lengtGroup = count($listGroup);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm đã xoá</title>
</head>
<body>
<?php
            if ($lengtGroup > 0) {
                ?>
                <table id="customers">
                    <tr>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php
                    for ($i = 0; $i <$lengtGroup; $i++) {
                        if ($listGroup[$i]->getAct() == 0) {
                    ?>
                            <tr>
                                <td><?php echo $listGroup[$i]->getGrID(); ?></td>
                                <td><?php echo $listGroup[$i]->getNameGroup(); ?></td>   
                                <td>
                                    <div class="icon_thaotac">
                                        <div class="item-edit">
                                            <a href="/Project_WebBanHang/Action-Controller/CategoryController/DetailGroup_action.php?id=<?php echo $listGroup[$i]->getGrID(); ?>" class="btn mx-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="item-edit">
                                            <a href="/Project_WebBanHang/Action-Controller/CategoryController/UndoGroup_action.php?id=<?php echo $listGroup[$i]->getGrID(); ?>" class="btn mx-1">
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
                    echo "KHÔNG CÓ DANH MỤC SẢN PHẨM NÀO!";
                }
                ?>
                </table>
                <a href="/Project_WebBanHang/Template-Views/Admin/Category/Index.php">Tro Lai</a>
</body>
</html>