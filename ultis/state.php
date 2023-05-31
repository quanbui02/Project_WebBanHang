<?php
function statusOrder($statusOrder)
{
    if ($statusOrder == "DONE") {
        return '<div style="padding: 4px 12px; background-color: green; color: white; border-radius: 8px;">Hoàn thành</div>';
    } else if ($statusOrder == "INPROCESS") {
        return '<div style="padding: 4px 12px; background-color: blue; color: black; border-radius: 8px;">Chờ xác nhận</div>';
    } else if ($statusOrder == "CANCEL") {
        return '<div style="padding: 4px 12px; background-color: red; color: white; border-radius: 8px;">Hủy hóa đơn</div>';
    } else if ($statusOrder == "CONFIRM") {
        return '<div style="padding: 4px 12px; background-color: yellow; color: white; border-radius: 8px;">Đang giao hàng</div>';
    } else {
        return '<div style="padding: 4px 12px; background-color: red; color: white; border-radius: 8px;>Lỗi</div>';
    }
}
?>