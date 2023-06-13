<?php
function connectDb(){
    $serverName = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "csdldoan";
    return new mysqli($serverName, $username, $password,$database);
}
?>