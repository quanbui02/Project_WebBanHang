<?php 
include_once "C:/xampp/htdocs/GhepCode/Class-Model/class.php";
include_once "C:/xampp/htdocs/GhepCode/Action-Controler/function_handle_sql.php";

session_start();
$content = $_REQUEST["fb-content"];
if($_SESSION["login"]== true){
    if(strlen($content)>0){
        $conn = new mysqli("127.0.0.1", "root", "","csdldoan");
    try{
        $sqlAdd = "insert into `feedback` (`fbID`, `fbContent`, `fbTime`, `userID`, `proID`) values (NULL, '".$content."', curdate(), '".$_SESSION["user-infor"]->getUserID()."', '".$_SESSION["product"]->getPrID()."')";
        echo $sqlAdd;
        $conn->query($sqlAdd);
        header("Location: /GhepCode/Action-Controler/get_inforPR.php?id_product=".$_SESSION["product"]->getPrID()."");
    }
    catch(Exception $e){
        $_SESSION["error-sql"] = $e->getMessage();
    }
    finally{
        $conn->close();
    }
}else{
    header("Location: /GhepCode/Action-Controler/get_inforPR.php?id_product=".$_SESSION["product"]->getPrID()."");
}
}else{
    header("Location: /GhepCode/Template-View/login.php");
}
// INSERT INTO `feedback` (`fbID`, `fbContent`, `fbTime`, `userID`, `proID`) VALUES (NULL, 'Cái áo mặc rất tốt', '2023-04-18 21:52:10.000000', '2', '2'
?>