<?php 
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
  }
?>