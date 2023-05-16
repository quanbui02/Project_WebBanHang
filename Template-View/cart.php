<?php 
include_once "C:/xampp/htdocs/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/GhepCode/Action-Controler/function_handle_sql.php";
session_start();
if($_SESSION["login"]==true){
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
$sql = "select * from `order` where userID= ".intval($_SESSION["user-infor"]->getUserID());
$cartOrder = null;
$cartDetailOrder = null;
try{
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $listOrders= array();
        $count = 0;
        while($row=$result->fetch_assoc()){
            $listOrders[$count] = new Order($row["orderID"],$row["orderDate"],$row["userID"],$row["giftID"],$row["status"]);
            $count = $count+1;
        }
        for($i=0;$i<count($listOrders);$i++){
            if($listOrders[$i]->getStatus() == "cart"){
                $cartOrder = $listOrders[$i];
                $cartDetailOrder = getOrderDetails($cartOrder->getOrderID());
                break;
            }
        }
        if(empty($cartOrder) && empty($cartDetailOrder)){
            $error = "Giỏ hàng hiện tại đang rỗng";
        }
    }else{
        $error = "Giỏ hàng hiện tại đang rỗng";
    }
}
catch(Exception $e){
    $_SESSION["error-sql"]=$e->getMessage();
}
finally{
    $conn->close();
}
?>
<html>
    <head>
        <link rel="stylesheet" href="">
    </head>
    <body>
       <div class="header"><p>Thông tin giỏ hàng</p></div>
       <div class="details">
        <?php
            if(empty($error)){
                ?>
                <div class="date">Ngày khởi tạo: <?php echo $cartOrder->getDate(); ?></div>
                <div class="order-details">
                    <?php
                    for($i =0;$i<count($cartDetailOrder);$i++){
                        ?>
                        <div class="item">
                            <div class="name">Tên sản phẩm: <?php echo $cartDetailOrder[$i]->getNameProduct(); ?></div>
                            <div class="quantity">
                                 Số lượng:
                                <button><a href="<?php echo "/GhepCode/Action-Controler/stonk_order_detail.php?id_product=".$cartDetailOrder[$i]->getProID()."&id_detail=".$cartDetailOrder[$i]->getDetailID()."&number=".$cartDetailOrder[$i]->getNumber(); ?>">+</a></button>
                                <?php echo $cartDetailOrder[$i]->getNumber(); ?>
                                <button><a href="<?php echo "/GhepCode/Action-Controler/notStonk_order_detail.php?id_product=".$cartDetailOrder[$i]->getProID()."&id_detail=".$cartDetailOrder[$i]->getDetailID()."&number=".$cartDetailOrder[$i]->getNumber(); ?>">-</a></button>
                                <button><a href="<?php echo "/GhepCode/Action-Controler/destroy_order_detail.php?id_product=".$cartDetailOrder[$i]->getProID()."&id_detail=".$cartDetailOrder[$i]->getDetailID()."&number=".$cartDetailOrder[$i]->getNumber(); ?>">x</a></button>
                            </div>
                            <div class="money">Thành tiền: <?php echo $cartDetailOrder[$i]->getMoney(); ?> VND</div>
                        </div>
                        <?php
                    }
                     ?>
                </div>
                <div class="sum-money">Tổng tiền: <?php echo $cartOrder->sumMoney(); ?> VND</div>
                <div class="purchase">
                    <button><a href="<?php echo "/GhepCode/Template-View/purchase.php?code=".$cartOrder->getUserID().$cartOrder->getOrderID()."&money=".$cartOrder->sumMoney()."&id=".$cartOrder->getOrderID(); ?>">Thanh toán</a></button>
                    <button><a href="/GhepCode/Template-View/trangchu.php?search=">Trở về trang chủ</a></button>
                </div>
                <?php
            }else{
                echo "<p>".$error."</p>";
            }
         ?>
       </div> 
    </body>
</html>
<?php
}else{
    header("Location: /GhepCode/Template-View/login.php");
}
?>