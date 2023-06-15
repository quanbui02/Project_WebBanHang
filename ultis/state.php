<?php
function statusOrder($statusOrder)
{
    if ($statusOrder == "cart") {
        return '<div style="padding: 4px 12px; width: fit-content; background-color: #ea815e; color: white; border-radius: 8px;">Trong giỏ hàng </div>';
    } else if ($statusOrder == "payed") {
        return '<div style="padding: 4px 12px; width: fit-content; background-color: #F7375D; color: white; border-radius: 8px;">Đã thanh toán </div>';
    } else if ($statusOrder == "confirm") {
        return '<div style="padding: 4px 12px; width: fit-content; background-color: #D448FF; color: white; border-radius: 8px;">Đã xác nhận </div>';
    } else if ($statusOrder == "completed") {
        return '<div style="padding: 4px 12px; width: fit-content; background-color: #248CF3; color: white; border-radius: 8px;">Hoàn thành đơn đặt hàng</div>';
    } else {
        return '<div style="padding: 4px 12px; width: fit-content; background-color: red; color: white; border-radius: 8px;>Lỗi</div>';
    }
}
?>

