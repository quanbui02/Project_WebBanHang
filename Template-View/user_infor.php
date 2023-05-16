<?php
include_once "C:/xampp/htdocs/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/GhepCode/Action-Controler/function_handle_sql.php";
session_start();
if($_SESSION["login"]==false){
    header("Location:/GhepCode/Template-View/login.php ");
}else{
    $listOrder = array();
    $count = 0;
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    $sql = "select * from `order` where userID = ".intval($_SESSION["user-infor"]->getUserID());
    try{
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                //__construct($orID,$date,$uID,$gID,$status){
                $listOrder[$count] = new Order($row["orderID"],$row["orderDate"],$row["userID"],$row["giftID"],$row["status"]);
                $count = $count+1;
            }
        }else{
            $errorOrder = "Bạn chưa có đơn hàng nào trước đây";
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
            <link rel="stylesheet" href="user.css">
        </head>
        <body>
            <div class="header">
                <div class="back"><button><a href="/GhepCode/Template-View/trangchu.php?search="> <-Trở về</a></button></div>
                <div class="tag"><h2>Thông tin người dùng</h2></div>
            </div>
            <div class="container">
              <div class="infor">
                <form action="/GhepCode/Action-Controler/update_us_action.php" class="form-infor">
                    <div class="full-name">
                        <div class="label">Tên người dùng:</div>
                        <div class="form-input">
                            <input type="text" name ="full-name" value ="<?php echo $_SESSION["user-infor"]->getFullName(); ?>">
                        </div>
                    </div>
                    <div class="birth">
                        <div class="label">Ngày sinh:</div>
                        <div class="form-input">
                            <input type="text" name ="birth" value ="<?php echo $_SESSION["user-infor"]->getBirth(); ?>">
                        </div>
                    </div>
                    <div class="address">
                        <div class="label">Địa chỉ:</div>
                        <div class="form-input">
                            <input type="text" name ="address" value ="<?php echo $_SESSION["user-infor"]->getAddress(); ?>">
                        </div>
                    </div>
                    <div class="email">
                        <div class="label">Email:</div>
                        <div class="form-input">
                             <input type="text" name ="email" value ="<?php echo $_SESSION["user-infor"]->getEmail(); ?>">
                        </div>
                    </div>
                    <div class="phone">
                        <div class="label">Số điện thoại:</div>
                        <div class="form-input">
                             <input type="text" name ="phone" value ="<?php echo $_SESSION["user-infor"]->getPhone(); ?>">
                        </div>
                    </div>
                    <div class="user-name">
                        <div class="label">Tên đăng nhập:</div>
                        <div class="form-input">
                             <input type="text" name ="user-name" value ="<?php echo $_SESSION["user-infor"]->getUserName(); ?>">
                        </div>
                    </div>
                    <div class="password">
                        <div class="label">Mật khẩu:</div>
                        <div class="form-input">
                             <input type="text" name ="password" value ="<?php echo $_SESSION["user-infor"]->getPass(); ?>"><br>
                             <span>
                               <?php 
                                 if(empty($_SESSION["error-pass"])){
                                    echo "";
                                 }else{
                                    echo $_SESSION["error-pass"];
                                 }
                                ?>
                             </span>
                        </div>
                    </div>
                    <div class="button-update">
                        <button>Cập nhât thông tin</button>
                    </div>
                </form>
              </div>
              <div class="order-history">
                <p>Lịch sử đơn hàng:</p>
                <?php
                   if(empty($errorOrder)){
                     for($i=0;$i<count($listOrder);$i++){
                        ?>
                          <div class="item">
                           <div class="box">
                            <div class="name-order" style="font-size:15px;font-weight:500"> 
                                <?php echo "Đơn hàng ".$listOrder[$i]->getUserID().$listOrder[$i]->getOrderID(); ?>
                            </div>
                            <div class="date" style="font-style:italic">
                                <?php echo "->Ngày :".$listOrder[$i]->getDate(); ?>
                            </div>
                            <div class="status" style="font-style:italic">
                                 <?php 
                                   if($listOrder[$i]->getStatus() == "payed"){
                                     echo "->Trạng thái : Đang giao";
                                   }else{
                                     if($listOrder[$i]->getStatus() == "completed"){
                                     echo "->Trạng thái : Đã giao"; 
                                     }else{
                                        echo "->Trạng thái : Chưa thanh toán";
                                     }
                                   }
                                 ?>
                            </div>
                            <div class="money" style="font-style:italic">
                                <?php echo "->Tổng tiền: ".$listOrder[$i]->sumMoneyWithGift()." VND"; ?>
                            </div>
                           </div>
                           <div class="infor-order">
                                <button><a href="<?php echo"/GhepCode/Template-View/detail_order.php?id_order=".$listOrder[$i]->getOrderID()."&order_date=".$listOrder[$i]->getDate()."&code=".$listOrder[$i]->getUserID().$listOrder[$i]->getOrderID().$listOrder[$i]->getGiftID()."&status=".$listOrder[$i]->getStatus(); ?>">Xem chi tiết</a></button>
                            </div>
                           </div>
                        <?php
                     }
                   }else{
                    echo "<p>".$errorOrder."</p>";
                   }
                ?>
              </div>
            </div>
        </body>
    </html>
    <?php
}
?>
