<?php 
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
  private $image;

  public function __construct($id, $grID,$name,$price,$quantity,$size,$color,$des,$act,$img)
  {
    $this->prID = $id;
    $this->grID = $grID;
    $this->prName = $name;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->size = $size;
    $this->color = $color;
    $this->des = $des;
    $this->active = $act;
    $this->image = $img;

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
    return $this->image;
  }
}
?>