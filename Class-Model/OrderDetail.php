<?php  
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
  }
?>