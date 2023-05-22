<?php 
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
?>