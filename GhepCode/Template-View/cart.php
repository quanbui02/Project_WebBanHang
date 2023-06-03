<?php 
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/function_handle_sql.php";
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
        <link rel="stylesheet" href="cart.css">
    </head>
    <body>
       <div class="header">
            <div class="back"><button><a href="/Project_WebBanHang/GhepCode/Template-View/trangchu.php?search="> <-Trở về</a></button></div>
            <div class="tag"><h2><?php echo "Thông tin giỏ hàng "; ?></h2></div>
       </div>
       <div class="infor">
        <?php
            if(empty($error)){
                ?>
                <div class="date">
                    <div class="label">Ngày khởi tạo:</div>
                    <div class="content"><?php echo $cartOrder->getDate(); ?></div>   
                </div>
                <div class="details">
                    <p>Danh sách sản phẩm</p>
                    <?php
                    for($i =0;$i<count($cartDetailOrder);$i++){
                        ?>
                        <div class="item">
                            <div class="name">
                                <div class="label">Tên sản phẩm: </div>
                                <div class="content"> <?php echo $cartDetailOrder[$i]->getNameProduct(); ?></div>
                            </div>
                            <div class="number-money">
                                <div class="number">
                                    <div class="label" style="font-style:italic;font-weight:14px">->Số lượng:</div>
                                    <div class="plus"><button><a href="<?php echo "/Project_WebBanHang/GhepCode/Action-Controler/stonk_order_detail.php?id_product=".$cartDetailOrder[$i]->getProID()."&id_detail=".$cartDetailOrder[$i]->getDetailID()."&number=".$cartDetailOrder[$i]->getNumber(); ?>">+</a></button></div>
                                    <div class="content" >x <?php echo $cartDetailOrder[$i]->getNumber(); ?></div>
                                    <div class="except"><button><a href="<?php echo "/Project_WebBanHang/GhepCode/Action-Controler/notStonk_order_detail.php?id_product=".$cartDetailOrder[$i]->getProID()."&id_detail=".$cartDetailOrder[$i]->getDetailID()."&number=".$cartDetailOrder[$i]->getNumber()."&order_id=".$cartOrder->getOrderID(); ?>">-</a></button></div>
                                    <div class="delete"><button><a href="<?php echo "/Project_WebBanHang/GhepCode/Action-Controler/destroy_order_detail.php?id_product=".$cartDetailOrder[$i]->getProID()."&id_detail=".$cartDetailOrder[$i]->getDetailID()."&number=".$cartDetailOrder[$i]->getNumber()."&order_id=".$cartOrder->getOrderID(); ?>">x</a></button></div>
                                </div>
                                <div class="money">
                                    <div class="label" style="font-style:italic;font-weight:14px">Thành tiền:</div>
                                    <div class="content" ><?php echo $cartDetailOrder[$i]->getMoney(); ?> VND</div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                     ?>
                </div>
                <div class="sum-money">
                    <div class="content"><?php echo $cartOrder->sumMoney(); ?> VND</div>
                    <div class="label" style="font-style:italic;font-weight:14px">Tổng tiền: </div>
                </div>
                <div class="purchase-btn">
                    <button><a href="<?php echo "/Project_WebBanHang/GhepCode/Template-View/purchase.php?code=".$cartOrder->getUserID().$cartOrder->getOrderID()."&money=".$cartOrder->sumMoney()."&id=".$cartOrder->getOrderID(); ?>">Thanh toán</a></button>
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
    header("Location:/Project_WebBanHang/GhepCode/Template-View/login.php");
}
?>