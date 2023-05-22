<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Class-Model/class.php";
session_start();
if(empty($_SESSION["feedback"])){
    $error = "Chưa có phản hồi cho sản phẩm này";
}
?>
<html>
    <head>
        <link rel="stylesheet" href="product_infor.css">
    </head>
    <body>
        <div class="header">
            <div class="back"><button><a href="/Project_WebBanHang/GhepCode/Template-View/trangchu.php?search="> <-Trở về</a></button></div>
            <div class="tag"><h2>Thông tin sản phẩm</h2></div>
        </div>
        <div class="infor">
            <div class="picture">
                <img src="<?php echo $_SESSION["product"]->getImg(); ?>" >
            </div>
            <div class="details">
                <div class="name">
                    <div class="label">-Tên sản phẩm:</div>
                    <div class="content"><?php echo $_SESSION["product"]->getPrName(); ?></div>
                 </div>
                <div class="description">
                    <div class="label">-Mô tả sản phẩm:</div>
                    <div class="content"><?php echo $_SESSION["product"]->getDes(); ?></div>    
                </div>
                <div class="color">
                    <div class="label">-Màu sắc:</div>
                    <div class="content"><?php echo $_SESSION["product"]->getColor(); ?></div>  
                </div>
                <div class="size">
                    <div class="label">-Kích cỡ:</div>
                    <div class="content"><?php echo $_SESSION["product"]->getSize(); ?></div>
                </div>
                <div class="status">
                    <div class="label">-Tình trạng sản phẩm:</div>
                    <div class="content"><?php if($_SESSION["product"]->getQuantity()>0){echo "Còn hàng";}else{echo "Hết hàng";} ?></div>  
                </div>
                <div class="price">
                    <div class="label">-Giá:</div>
                    <div class="content"><?php echo $_SESSION["product"]->getPrice(); ?> VND</div>     
                </div>
                <div class="add-cart">
                <button>
                    <?php 
                      if($_SESSION["product"]->getQuantity()>0){
                        ?>
                        <a href="<?php echo "/Project_WebBanHang/GhepCode/Action-Controler/add_cart_action.php?id_product=".$_SESSION["product"]->getPrID()."&quantityPro=".$_SESSION["product"]->getQuantity(); ?>">Thêm vào giỏ hàng</a>
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
        </div>
        <div class="feedback">
            <p>Phản hồi người dùng:</p>
            <div class="list-fb">
                <?php
                   if(empty($error)){
                    for($i=0;$i<count($_SESSION["feedback"]);$i++){
                        ?>
                            <div class="item">
                                <div class="feedback-content">Nội dung: <?php echo $_SESSION["feedback"][$i]->getFbContent(); ?></div>
                                <div class="user">->Từ: <?php echo $_SESSION["feedback"][$i]->getNameUser(); ?></div>
                            </div>
                        <?php
                       }
                   }else{
                    echo "<div class='empty'>".$error."</div>";
                   }
                ?>
            </div>
        </div>
        <div class="fb-input">
            <form action="<?php echo "/Project_WebBanHang/GhepCode/Action-Controler/add_fb_action.php"; ?>">
              <input type="text" name="fb-content" placeholder="Phản hồi của bạn" class="fb">
              <input type="submit" class="submit">
            </form>
        </div>
    </body>
</html>
<!--Xong-->