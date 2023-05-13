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
        <link rel="stylesheet" href="detail_order.css">
    </head>
    <body>
        <div class="header">
            <div class="back"><button><a href="/DoAnCNW/Template-View/trangchu.php?search="> <-Trở về</a></button></div>
            <div class="tag"><h2><?php echo "Thông tin đơn hàng ".$code; ?></h2></div>
        </div>
        <div class="infor">
            <div class="date">
                <div class="label">Thời gian:</div>
                <div class="content"><?php echo $date; ?></div>   
            </div>
            <div class="status">
                <div class="label">Trạng thái:</div>
                <div class="content">
                    <?php 
                        if($status == "payed"){
                        echo " Đang giao";
                        }else{
                        if($status == "completed"){
                        echo " Đã giao"; 
                        }else{
                        echo " Chưa thanh toán";
                        }
                      } 
                    ?>
                </div>
            </div>
            <div class="details">
                <p>Danh sách sản phẩm</p>
                <?php 
                   for($i = 0;$i<count($listDetails);$i++){
                    ?>
                       <div class="item">
                          <div class="name">
                            <div class="label">Tên sản phẩm: </div>
                            <div class="content"> <?php echo $listDetails[$i]->getNameProduct(); ?></div>
                          </div>
                          <div class="number-money"> 
                            <div class="number">
                                <div class="label" style="font-style:italic;font-weight:14px">->Số lượng:</div>
                                <div class="content" >x<?php echo $listDetails[$i]->getNumber(); ?></div>
                            </div>
                            <div class="money"> 
                                 <div class="label" style="font-style:italic;font-weight:14px">Thành tiền:</div>
                                 <div class="content" ><?php echo $listDetails[$i]->getMoney(); ?> VND</div>
                            </div> 
                          </div>
                       </div>
                    <?php
                   }
                ?>
            </div>
            <div class="sum-money">
                <div class="content"><?php echo getOrderByID($orderID)->sumMoney(); ?> VND</div>
                <div class="label" style="font-style:italic;font-weight:14px">Tổng tiền: </div>
            </div>
            <div class="purchase">
                <div class="content"><?php echo getOrderByID($orderID)->sumMoneyWithGift(); ?> VND</div> 
                <div class="label" style="font-style:italic;font-weight:14px">Số tiền thanh toán(Sau khi sử dụng mã giảm giá nếu có):</div>
            </div>
        </div>
    </body>
 </html>