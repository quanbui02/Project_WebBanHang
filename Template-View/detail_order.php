<?php
include_once "H:/xampp/htdocs/DoAnCNW/Class-Model/class.php";
include_once "H:/xampp/htdocs/DoAnCNW/Action-Controler/function_handle_sql.php";
$orderID=$_GET["id_order"];
$code = $_GET["code"];
$date = $_GET["order_date"];
$status = $_GET["status"];
$listDetails = getOrderDetails(intval($orderID));
 ?>
 <html>
    <head>
        <link rel="stylesheet" href=".">
    </head>
    <body>
        <div class="header">
            <p><?php echo "Thông tin đơn hàng ".$code; ?></p>
        </div>
        <div class="infor">
            <div class="date">Thời gian: <?php echo $date; ?></div>
            <div class="status">Trạng thái: <?php echo $status ?></div>
            <div class="details">
                <?php 
                   for($i = 0;$i<count($listDetails);$i++){
                    ?>
                       <div class="item">
                          <div class="name"> Tên sản phẩm:  <?php echo $listDetails[$i]->getNameProduct(); ?></div>
                          <div class="number"> Số lượng:  <?php echo $listDetails[$i]->getNumber(); ?></div>
                          <div class="money"> Thành tiền: <?php echo $listDetails[$i]->getMoney(); ?> VND</div>
                       </div>
                    <?php
                   }
                ?>
            </div>
            <div class="sum-money">Tổng tiền: <?php echo getOrderByID($orderID)->sumMoney(); ?> VND</div>
            <div class="purchase">Số tiền thanh toán(Sau khi sử dụng mã giảm giá nếu có): <?php echo getOrderByID($orderID)->sumMoneyWithGift(); ?> VND </div>
        </div>
    </body>
 </html>