<?php  
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
    public function getUSerID(){
      return $this->userID;
    }
    public function getGiftID(){
      return $this->giftID;
    }
    public function getStatus(){
      return $this->status;
    }
  }
?>