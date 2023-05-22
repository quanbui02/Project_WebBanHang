<?php
// include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/class.php";
session_start();
if(empty($_SESSION["feedback"])){
    $error = "Chưa có phản hồi cho sản phẩm này";
}
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">Thông tin sản phẩm</div>
        <div class="infor">
            <div class="picture">
                <img src="https://ae01.alicdn.com/kf/H1d2ba95e663f47f98db0f8065d9664bdA/New-Navi-T-Shirt-Natus-Vincere-Esports-Team-T-Shirt-Game-CSGO-Pro-Player-Streetwear-Uniform.jpg_640x640.jpg" >
            </div>
            <div class="details">
                <div class="name">Tên sản phẩm: <?php echo $_SESSION["product"]->getPrName(); ?> </div>
                <div class="description">Mô tả sản phẩm: <?php echo $_SESSION["product"]->getDes(); ?> </div>
                <div class="color">Màu sắc: <?php echo $_SESSION["product"]->getColor(); ?> </div>
                <div class="size">Kích cỡ:  <?php echo $_SESSION["product"]->getSize(); ?></div>
                <div class="status">Tình trạng sản phẩm: <?php if($_SESSION["product"]->getQuantity()>0){echo "Còn hàng";}else{echo "Hết hàng";} ?></div>
                <div class="price">Giá: <?php echo $_SESSION["product"]->getPrice(); ?> VND</div>
            </div>
            <div class="add-cart"> 
                <button>
                    <?php 
                      if($_SESSION["product"]->getQuantity()>0){
                        ?>
                        <!-- <a href="<?php echo "/DoAnCNW/Action-Controler/add_cart_action.php?id_product=".$_SESSION["product"]->getPrID(); ?>">Thêm vào giỏ hàng</a> -->
                        <a href="<?php echo "/Project_WebBanHang/Action-Controler/add_cart_action.php?id_product=".$_SESSION["product"]->getPrID(); ?>">Thêm vào giỏ hàng</a>
                        <?php 
                        
                      }else{
                        ?>
                        Sản phẩm hiện đang hết hàng
                        <?php
                      }
                    ?>
                </button>
            </div>
        </div>
        <div class="feedback">
            <p>Phản hồi: </p>
            <div class="list-fb">
                <?php
                   if(empty($error)){
                    for($i=0;$i<count($_SESSION["feedback"]);$i++){
                        ?>
                            <div class="item">
                                 <p>Nội dung: <?php echo $_SESSION["feedback"][$i]->getFbContent(); ?> </p>
                                <!-- <p>Thời gian: <?php echo $_SESSION["feedback"][$i]->getDate(); ?> </p> -->
                                 <p>Từ: <?php echo $_SESSION["feedback"][$i]->getNameUser(); ?></p>
                            </div>
                        <?php
                       }
                   }else{
                    echo $error;
                   }
                ?>
            </div>
        </div>
        <div class="fb-input">
            <!-- <form action="<?php echo "/DoAnCNW/Action-Controler/add_fb_action.php"; ?>"> -->
            
            <form action="<?php echo "/Project_WebBanHang/Action-Controler/add_fb_action.php"; ?>">
              <label for="">Bình luận của bạn:</label>
              <input type="text" name="fb-content">
              <input type="submit">
            </form>
        </div>
        <div class="back">
            <!-- <button><a href="/DoAnCNW/Template-View/trangchu.php?search=">Trở về trang chủ</a></button> -->
            <button><a href="/Project_WebBanHang/Template-View/trangchu.php?search=">Trở về trang chủ</a></button>
        </div>
    </body>
</html>