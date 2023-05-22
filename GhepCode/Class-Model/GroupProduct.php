<?php 
class GroupProduct{
    private $grID;
    private $grName;
    private $active;
   
    public function __construct($id,$name, $act)
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


?>