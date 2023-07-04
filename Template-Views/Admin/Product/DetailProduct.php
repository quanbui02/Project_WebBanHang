<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Feedback.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/ImgProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/UserDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/ultis/time.php";

session_start();
$listGroup = getAllListGroup();
$lengthGroup = count($listGroup);
$listImgs = unserialize($_SESSION['imgProducts']);

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
    <link rel="stylesheet" href="../../../assets/css/Product/editProduct.css">
    <link rel="stylesheet" href="../../../assets/css/Product/detailProduct.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <title>Chi tiết sản phẩm</title>
</head>

<body>
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
            <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php" class="active">Sản phẩm</a>
            <a href="/Project_WebBanHang/Template-Views/Admin/Category/Index.php">Danh mục sản phẩm</a>
            <a href="/Project_WebBanHang/Template-Views/Admin/User/Index.php">Khách hàng</a>
            <a href="/Project_WebBanHang/Template-Views/Admin/Order/Index.php">Đơn hàng </a>
            <a href="/Project_WebBanHang/Template-Views/Admin/GiftCode/Index.php">Khuyễn Mãi</a>
        </div>
        <div class="user-settings">
            <a href="/Project_WebBanHang/Action-Controller/LoginController/Logout_action.php" class="logout-btn">Đăng
                xuất</a>
        </div>
    </div>

    <div class="main">
        <div class="main-content">
            <div class="main-container edit-product">
                <h2>Chi tiết sản phẩm</h2>
                <div class="edit-post-form product">
                    <div style="display: flex;">
                        <div class="text-form">
                            <div class="form-field field-1 medium">
                                <label for="product-name">Tên sản phẩm</label>
                                <input readonly id="product-name" type="text" name="ProductName" value="<?php echo $_SESSION["product"]->getPrName(); ?>" />
                            </div>
                            <div class="form-field field-2 medium">
                                <label for="product-price">Giá sản phẩm</label>
                                <input readonly id="product-price" type="number" name="ProductPrice" value="<?php echo $_SESSION["product"]->getPrice(); ?>" />
                            </div>
                            <div class="form-field field-3 medium">
                                <label for="shop-url">Số lượng</label>
                                <input readonly id="product-price" type="number" name="ProductQuantity" value="<?php echo $_SESSION["product"]->getQuantity(); ?>" />
                            </div>
                            <div class="form-field field-5 medium">
                                <label for="product-image">Kích cỡ</label>
                                <input readonly class="Input" type="text" id="size" name="ProductSize" value="<?php echo $_SESSION["product"]->getSize(); ?>" />
                            </div>
                            <div class="form-field field-5 medium">
                                <label for="product-image">Màu sắc</label>
                                <input readonly class="Input" type="text" id="color" name="ProductColor" value="<?php echo $_SESSION["product"]->getColor(); ?>" />
                            </div>
                            <div class="form-field field-4 medium">
                                <label for="product-description">Mô tả sản phẩm</label>
                                <textarea readonly id="product-description" type="text" rows="2" name="ProductDescription" placeholder="Mô tả sản phẩm..."><?php echo $_SESSION["product"]->getDes(); ?></textarea>
                            </div>
                        </div>
                        <div class="images-form">
                            <div>
                                <div class="form-field field-5 short">
                                    <label for="product-description">Ảnh đại diện sản phẩm</label>
                                    <div class="content"> <img onclick="openFullscreen(this)" id="output" src="/Project_WebBanHang/Upload/img/<?php echo $_SESSION["product"]->getImg() ?>" />
                                    </div>
                                </div>
                                <div class="form-field field-5 short">
                                    <label for="product-description">Ảnh mô tả sản phẩm</label>
                                    <div id="input">
                                        <?php
                                        foreach ($listImgs as $imgProduct) {
                                        ?>
                                            <div class="image-container">
                                                <img onclick="openFullscreen(this)" class="review" src="/Project_WebBanHang/Upload/imgDetail/<?php echo $imgProduct->getImg() ?>">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comments-container">
                        <h1>Danh sách phản hồi sản phẩm</h1>

                        <ul id="comments-list" class="comments-list">
                            <?php
                                $listFeedBacks = $_SESSION["listFeedBacks"];
                                foreach ($listFeedBacks as $feedbackData) {
                                    $feedback = $feedbackData["feedback"];
                                    $user = $feedbackData["user"];
                                    echo "<li>";
                                    echo "<div class='comment-main-level'>";
                                    echo "<div class='comment-avatar'><img src='https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI='></div>";
                                    echo "<div class='comment-box'>";
                                    echo "<div class='comment-head'>";
                                    echo "<h6 class='comment-name'>" . $user->getUserName() . "</h6>";
                                    echo "<span>" . convertDateTime($feedback->getDate())  . "</span>";
                                    echo "</div>";
                                    echo "<div class='comment-content'>" .  $feedback->getFbContent()  . "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <button class="update" onclick="onBack()" style="background-color: red; padding: 12px 8px;">Quay lại </button>
            </div>


            <div id="fullscreen-overlay" onclick="closeFullscreen()">
                <img id="fullscreen-image" src="" alt="Fullscreen Image">
            </div>
        </div>
    </div>
</body>

<script src="../../../assets/css/Product/detailProduct.js"></script>

</html>