<?php  
class GiftCode{
    private $giftID;
    private $giftContent;
    private $giftValue;
    private $quantity;
    private $active;
    
    public function __construct($gID,$giftContent,$giftValue,$quantity,$active){
      $this->giftID = $gID;
      $this->giftContent = $giftContent;
      $this->giftValue = $giftValue;
      $this->quantity = $quantity;
      $this->active = $active;
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
    public function getGiftQuantity(){
      return $this->quantity;
    }
    public function getGiftActive(){
      return $this->active;
    }
  }

?>