<?php
function getIndexPageOrder()
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Order.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
    $conn = connectDb();
    try {
        $per_page = 10;
        $sql = "select * from order";
        $result = $conn->query($sql);
        $total_records = mysqli_num_rows($result);
        $total_pages = ceil($total_records / $per_page);    
        return $total_pages;
    } catch (Exception $e) {
        $_SESSION["error-sql"] = $e->getMessage();
    } finally {
        $conn->close();
    }
}

function getListOrder()
{
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Order.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";

    $conn = connectDb();
    try {
        $list = array();
        $count = 0;
        $per_page = 10;
        $current_page = isset($_GET['pI']) ? $_GET['pI'] : 1;
        $offset = ($current_page - 1) * $per_page;

        $sql = "SELECT * FROM `order` INNER JOIN user ON `order`.userID = user.userID;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User(
                    $row["userID"],
                    $row["userName"],
                    $row["pass"],
                    $row["position"],
                    $row["fullName"],
                    $row["birth"],
                    $row["address"],
                    $row["email"],
                    $row["phone"],
                    $row["active"]
                );
                $orderData = [
                    'order' => new Order(
                        $row['orderID'],
                        $row['orderDate'],
                        $row['userID'],
                        $row['giftID'],
                        $row['status']
                    ),
                    'user' => $user
                ];

                $list[$count] = $orderData;
                $count++;
            }
        }
        return $list;
    } catch (Exception $e) {
        $_SESSION["error-sql"] = $e->getMessage();
    } finally {
        $conn->close();
    }
}

function searchOrders($nameUserSearch)
{ 
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Order.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
    include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";

    $conn = connectDb();
    try {
        $list = array();
        $count = 0;
        $per_page = 10;
        $current_page = isset($_GET['pI']) ? $_GET['pI'] : 1;
        $offset = ($current_page - 1) * $per_page;

        $sql = "SELECT * FROM `order` INNER JOIN user ON `order`.userID = user.userID WHERE user.userName LIKE '%" . $nameUserSearch . "%';";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User(
                    $row["userID"],
                    $row["userName"],
                    $row["pass"],
                    $row["position"],
                    $row["fullName"],
                    $row["birth"],
                    $row["address"],
                    $row["email"],
                    $row["phone"],
                    $row["active"]
                );
                $orderData = [
                    'order' => new Order(
                        $row['orderID'],
                        $row['orderDate'],
                        $row['userID'],
                        $row['giftID'],
                        $row['status']
                    ),
                    'user' => $user
                ];

                $list[$count] = $orderData;
                $count++;
            }
        }
        return $list;
    } catch (Exception $e) {
        $_SESSION["error-sql"] = $e->getMessage();
    } finally {
        $conn->close();
    }
}