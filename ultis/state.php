<?php
function statusOrder($statusOrder)
{
    if ($statusOrder == "cart") {
        return '<div style="    margin: 0 auto;padding: 4px 12px; width: fit-content; background-color: #ea815e; color: white; border-radius: 8px;">Trong giỏ hàng </div>';
    } else if ($statusOrder == "payed") {
        return '<div style="    margin: 0 auto;padding: 4px 12px; width: fit-content; background-color: #F7375D; color: white; border-radius: 8px;">Đàng chờ xác nhận</div>';
    } else if ($statusOrder == "confirm") {
        return '<div style="    margin: 0 auto;padding: 4px 12px; width: fit-content; background-color: green; color: white; border-radius: 8px;">Đang giao</div>';
    } else if ($statusOrder == "completed") {
        return '<div style="    margin: 0 auto;padding: 4px 12px; width: fit-content; background-color: #248CF3; color: white; border-radius: 8px;">Hoàn thành</div>';
    }
    else if ($statusOrder == "destroyed") {
        return '<div style="    margin: 0 auto;padding: 4px 12px; width: fit-content; background-color: red; color: white; border-radius: 8px;">Đơn huỷ</div>';
    }
}
?>

