<?php
function connectDb(){
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "csdldoan";
    return new mysqli($servername, $username, $password,$database);
}
?>