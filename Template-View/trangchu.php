<?php
include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
include_once "H:/xampp/htdocs/DoAnCNW/Action-Controler/function_handle_sql.php";
session_start();
if(empty( $_SESSION["group-mode"]) || $_SESSION["group-mode"]==false ){
$searchQS=$_GET["search"];
$listProduct = getListProduct($searchQS);
}else{
    $listProduct = $_SESSION["pro-group"];
}
$listGroup = getListGroup();
?>
<html>
    <head>
        <link rel="stylesheet" href="trangchu2.css">
    </head>
    <body>
        <div class="header">
            <div class="logo"><img src="https://1000logos.net/wp-content/uploads/2020/09/Navi-logo.png"></div>
            <div class="search">
                <form action="/DoAnCNW/Action-Controler/search_action.php">
                    <input type="text" name="search-product" placeholder = "Nhập tên sản phẩm bạn muốn tìm kiếm..." value="<?php echo $_GET["search"]; ?>">
                    <button>Tìm</button>
                </form>
            </div>
            <div class="user-infor">
                <div class="name">
                    <div><a href="/DoAnCNW/Template-View/user_infor.php"><?php if($_SESSION["login"]==false){echo "Khách";}else{echo  $_SESSION["user-infor"]->getUserName();} ?></a></div>
                    <button><a href="/DoAnCNW/Template-View/cart.php">Giỏ hàng</a></button>
                    <?php if($_SESSION["login"]==false){echo "<button><a href='/DoAnCNW/Template-View/login.php'>Đăng nhập</a></button>";}else{echo "<button><a href='/DoAnCNW/Action-Controler/logout_action.php'>Đăng xuất</a></button>";} ?>
                </div>
                <div class="avatar"><img src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=2000" ></div>
            </div>
        </div>
        <div class="list-group">
            <div class="item-gr"><a href="/DoAnCNW/Action-Controler/search_action.php">Tất cả</a></div>
            <?php 
            for($i = 0;$i<count($listGroup);$i++){
                ?>
                     <div class="item-gr"><a href="<?php echo "/DoAnCNW/Action-Controler/get_product_followGR.php?id_group=".$listGroup[$i]->getGrID(); ?>"><?php echo $listGroup[$i]->getNameGroup(); ?></a></div>
                <?php
            }
            ?>
        </div>
        <div class="list-product">
            <?php 
              for($i=0;$i<count($listProduct);$i++){
                ?>
                 <div class="item-pr">
                   <div class="pro-image">
                       <img src="https://ae01.alicdn.com/kf/H1d2ba95e663f47f98db0f8065d9664bdA/New-Navi-T-Shirt-Natus-Vincere-Esports-Team-T-Shirt-Game-CSGO-Pro-Player-Streetwear-Uniform.jpg_640x640.jpg" >
                   </div>
                   <div class="pro-infor">
                       <div class="pro-name"><?php echo $listProduct[$i]->getPrName(); ?></div>
                       <div class="pro-size">-Kích cỡ: <?php echo $listProduct[$i]->getSize(); ?></div>
                       <div class="pro-color">-Màu sắc: <?php echo $listProduct[$i]->getColor(); ?></div>
                   </div>
                   <div class="handle-btn">
                       <button><a href="/DoAnCNW/Action-Controler/get_inforPR.php?id_product=<?php echo $listProduct[$i]->getPrID(); ?>">Chi tiết sản phẩm</a></button><br>
                       <button>
                          <?php if(validatorQuantity($listProduct[$i]->getPrID())){
                            ?>
                             <a href="<?php echo "/DoAnCNW/Action-Controler/add_cart_action.php?id_product=".$listProduct[$i]->getPrID()."&quantityPro=".$listProduct[$i]->getQuantity(); ?>">Thêm vào giỏ hàng</a>
                            <?php
                          } else{
                            ?>
                              Hiện đang hết hàng
                            <?php
                          } 
                          ?>
                       </button>
                   </div>
                 </div>
                <?php
              }
            ?>
        </div>
    </body>
</html>