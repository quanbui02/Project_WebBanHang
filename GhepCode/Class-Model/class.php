<?php
//1
class GroupProduct{
  private $grID;
  private $grName;
  private $active;
 
  public function __construct($id, $name, $act)
  {
    $this->grID = $id;
    $this->grName = $name;
    $this->active = $act;
  }
  public function getGrID()
  {
    return $this->grID;
  }
  public function getNameGroup()
  {
    return $this->grName;
  }
  public function getAct()
  {
    return $this->active;
  }
}
//2
class Product{
  private $prID;
  private $prName;
  private $grID;
  private $price;
  private $quantity;
  private $size;
  private $color;
  private $des;
  private $active;
  private $img;

  public function __construct($id, $name, $grID,$price,$quantity,$size,$color,$des,$act,$img)
  {
    $this->prID = $id;
    $this->prName = $name;
    $this->grID = $grID;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->size = $size;
    $this->color = $color;
    $this->des = $des;
    $this->active = $act;
    $this->img = $img;
  }
  public function getPrID(){
    return $this->prID;
  } 
  public function getPrName(){
    return $this->prName;
  }
  public function getGrID(){
    return $this->grID;
  }
  public function getPrice(){
    return $this->price;
  }
  public function getQuantity(){
    return $this->quantity;
  }
  public function getSize(){
    return $this->size;
  }
  public function getColor(){
    return $this->color;
  }
  public function getDes(){
    return $this->des;
  }
  public function getAct(){
    return $this->active;
  }
  public function getImg(){
    return $this->img;
  }
}
//3
class User{
  private $userID;
  private $userName;
  private $password;
  private $position;
  private $fullName;
  private $birth;
  private $address;
  private $phone;
  private $email;
  private $active;
 
  public function __construct($id, $uname, $pass,$pos,$fullName,$birth,$address,$email,$phone,$act)
  {
    $this->userID = $id;
    $this->userName = $uname;
    $this->password = $pass;
    $this->position = $pos;
    $this->fullName = $fullName;
    $this->birth = $birth;
    $this->address = $address;
    $this->phone = $phone;
    $this->email = $email;
    $this->active = $act;

  }
  public function getUserID(){
    return $this->userID;
  } 
  public function getUserName(){
    return $this->userName;
  }
  public function getPass(){
    return $this->password;
  }
  public function getPos(){
    return $this->position;
  }
  public function getFullName(){
    return $this->fullName;
  }
  public function getBirth(){
    return $this->birth;
  }
  public function getAddress(){
    return $this->address;
  }
  public function getPhone(){
    return $this->phone;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getAct(){
    return $this->active;
  }
}
//4
class Order{
  private $orderID;
  private $date;
  private $userID;
  private $giftID;
  private $status;

  public function __construct($orID,$date,$uID,$gID,$status){
    $this->orderID = $orID;
    $this->date = $date;
    $this->userID = $uID;
    $this->giftID = $gID;
    $this->status = $status;
  }
  public function getOrderID(){
    return $this->orderID;
  }
  public function getDate(){
    return $this->date;
  }
  public function getUserID(){
    return $this->userID;
  }
  public function getGiftID(){
    return $this->giftID;
  }
  public function getStatus(){
    return $this->status;
  }
  public function sumMoney(){
    include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/function_handle_sql.php";
    $money  = 0;
    $listOrderDetail =  getOrderDetails($this->orderID);
    for($i = 0;$i<count($listOrderDetail);$i++){
      $money = $money + $listOrderDetail[$i]->getMoney();
    }
    return $money;
  }
  public function sumMoneyWithGift(){
    include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/function_handle_sql.php";
    $sumMoney = $this->sumMoney();
    $giftValue = getGiftValue($this->giftID);
    $money  = $sumMoney - $giftValue;
    return $money;
  }
}
//5
class OrderDetail{
  private $detailID;
  private $orderID;
  private $proID;
  private $number;

  public function __construct($detailID,$orderID,$proID,$number){
    $this->detailID = $detailID;
    $this->orderID = $orderID;
    $this->proID = $proID;
    $this->number = $number;
  }

  public function getDetailID(){
    return $this->detailID;
  }
  public function getOrderID(){
    return $this->orderID;
  }
  public function getProID(){
    return $this->proID;
  }
  public function getNumber(){
    return $this->number;
  }
  public function getMoney(){
    include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/function_handle_sql.php";
    $money = 0;
    $listProduct  = getListProduct("");
    for($i=0;$i<count($listProduct);$i++){
      if($listProduct[$i]->getPrID() == $this->proID){
        $money = intval($listProduct[$i]->getPrice()) * intval($this->number);
        break;
      }
    }
    return $money;
  }
  public function getNameProduct(){
    include_once "C:/xampp/htdocs/Project_WebBanHang/GhepCode/Action-Controler/function_handle_sql.php";
    $namePro = "";
    $listProduct  = getListProduct("");
    for($i=0;$i<count($listProduct);$i++){
      if($listProduct[$i]->getPrID() == $this->proID){
        $namePro= $listProduct[$i]->getPrName() ;
        break;
      }
    }
    return $namePro;
  }
}
//6
class GiftCode{
  private $giftID;
  private $giftContent;
  private $giftValue;

  public function __construct($gID,$giftContent,$giftValue){
    $this->giftID = $gID;
    $this->giftContent = $giftContent;
    $this->giftValue = $giftValue;
  }

  public function getGiftID(){
    return $this->giftID;
  }
  public function getGiftContent(){
    return $this->giftContent;
  }
  public function getGiftValue(){
    return $this->giftValue;
  }
}
//7
class Feedback{
  private $fbID;
  private $proID;
  private $userID;
  private $date;
  private $fbContent;

  public function __construct($fbID,$prID,$userID,$date,$fbContent){
    $this->fbID = $fbID;
    $this->proID = $prID;
    $this->userID = $userID;
    $this->date = $date;
    $this->fbContent = $fbContent;
  }
  public function getFbID(){
    return $this->fbID;
  }
  public function getProID(){
    return $this->proID;
  }
  public function getUserID(){
    return $this->userID;
  }
  public function getDate(){
    return $this->date;
  }
  public function getFbContent(){
    return $this->fbContent;
  }
  public function getNameUser(){
    // $conn = new mysqli("localhost", "bexuanmailonto", "170602cf","csdldoan");
    $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    try{
      $sql = "select * from user where userID =".$this->userID;
      $result=$conn->query($sql);
      $row = $result->fetch_assoc();
      $name = $row["userName"];

      return $name;
    }
    catch(Exception $e){
      $_SESSION["error-sql"]=$e->getMessage();
    }
    finally{
      $conn->close();
    }
  }
}
?>