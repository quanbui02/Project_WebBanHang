<?php 
class ImgProduct{
  private $ID;
  private $proID;
  private $image;

  public function __construct($id,$prID,$img)
  {
    $this->ID = $id;
    $this->proID = $prID;
    $this->image = $img;

  }
  public function getID() {
    return $this -> ID;
  }
  public function getProID(){
    return $this->proID;
  } 
  public function getImg(){
    return $this->image;
  }
}
?>