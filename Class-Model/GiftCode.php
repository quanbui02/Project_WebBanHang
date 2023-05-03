<?php  
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

?>