<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/ImgProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";

session_start();
$listGroup = getAllListGroup();
$lengthGroup = count($listGroup);
$listImgs = unserialize($_SESSION['imgProducts']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/pro_detail.css">
    <title>Chi tiết sản phẩm</title>
</head>

<body>
    <div class="header">
        <div class="detailheader">
            <h2 style="padding-top:12px">Chi tiết sản phẩm</h2>
        </div>
    </div>
    <div class="block">
        <div class="image1">
            <p style="font-style: italic; text-align:left; margin-bottom:3px">Ảnh đại diện sản phẩm</p>
            <img src="/Project_WebBanHang/Upload/img/<?php echo $_SESSION["product"]->getImg(); ?>" alt="Product Image"
                style="width:300px;height:300px;object-fit:cover;">
        </div>

        <div class="image2">
            <p style="font-style: italic; text-align: left; margin-bottom:3px">Ảnh chi tiết sản phẩm</p>
            <?php
            foreach ($listImgs as $imgProduct) {
                ?>
                <img style="width:150px;height:150px;object-fit:cover;"
                    src="/Project_WebBanHang/Upload/imgDetail/<?php echo $imgProduct->getImg() ?>">
                <?php
            }
            ?>
        </div>
        <!-- </div> -->
        <!-- </div> -->
        <div class="details">
            <div class="id">
                <div class="label"> Mã sản phẩm: </div>
                <div class="content">
                    <?php echo $_SESSION["product"]->getPrID(); ?>
                </div>
            </div>
            <div class="name">
                <div class="label">Tên sản phẩm: </div>
                <div class="content">
                    <?php echo $_SESSION["product"]->getPrName(); ?>
                </div>
            </div>
            <div class="groupName">
                <div class="label">Thuộc danh mục: </div>
                <div class="content">
                    <?php for ($i = 0; $i < $lengthGroup; $i++) {
                        if ($_SESSION["product"]->getGrID() == $listGroup[$i]->getGrID()) {
                            echo $listGroup[$i]->getNameGroup();
                        }
                    } ?>
                </div>
            </div>

            <div class="size">
                <div class="label">Kích cỡ sản phẩm: </div>
                <div class="content">
                    <?php echo $_SESSION["product"]->getSize(); ?>
                </div>
            </div>
            <div class="quantity">
                <div class="label">Số lượng sản phẩm: </div>
                <div class="content">
                    <?php echo $_SESSION["product"]->getQuantity(); ?>
                </div>
            </div>
            <div class="price">
                <div class="label">Giá sản phẩm: </div>
                <div class="content">
                    <?php echo $_SESSION["product"]->getPrice(); ?> VND
                </div>
            </div>
            <div class="description">
                <div class="label">Mô tả sản phẩm: </div>
                <div class="content">
                    <?php if ($_SESSION["product"]->getDes() == "") {
                        echo "Chưa có mô tả sản phẩm";
                    } else {
                        echo $_SESSION["product"]->getDes();
                    } ?> VND
                </div>

            </div>

            <div class="Active_gr">
                <div class="label">Hoạt động: </div>
                <div class="content">
                    <?php if ($_SESSION["product"]->getAct() == 1) {
                        ?> <span>đang hoạt động</span>
                        <?php
                    } else {
                        ?>
                        <span>không hoạt động</span>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div>

            <?php
            var_dump($_SESSION["listFeedBacks"]);

            if (isset($_SESSION["listFeedBacks"])) {
                // Lấy giá trị của biến listFeedBacks từ phiên làm việc
                $listFeedBacks = $_SESSION["listFeedBacks"];
            
                // Hiển thị thông tin phản hồi
                foreach ($listFeedBacks as $feedbackData) {
                    $feedback = $feedbackData["feedback"];
                    $user = $feedbackData["user"];
        
                    echo "Người dùng: " . $user->getUserName() . "<br>";
                    echo "Thời gian: " . $feedback->getFeedbackTime() . "<br>";
                    echo "Nội dung: " . $feedback->getFeedbackContent() . "<br>";
                    echo "<hr>";
                }
            } else {
                echo "Không có phản hồi.";
            }

            ?>

        </div>

    </div>
    </div>
    <div class="back">
        <button> <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">
                Trở lại</button>
        </a>
    </div>
</body>

</html>