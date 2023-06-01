<?php
function statusOrder($statusOrder)
{
    if ($statusOrder == "cart") {
        return '<div style="padding: 4px 12px; background-color: yellow; color: white; border-radius: 8px;">Trong gio hang</div>';
    } else if ($statusOrder == "payed") {
        return '<div style="padding: 4px 12px; background-color: blue; color: black; border-radius: 8px;">Da thanh toan</div>';
    } else if ($statusOrder == "confirm") {
        return '<div style="padding: 4px 12px; background-color: orange; color: white; border-radius: 8px;">Da xac nhan</div>';
    } else if ($statusOrder == "completed") {
        return '<div style="padding: 4px 12px; background-color: green; color: white; border-radius: 8px;">Hoan thanh don hang</div>';
    } else {
        return '<div style="padding: 4px 12px; background-color: red; color: white; border-radius: 8px;>Lỗi</div>';
    }
}
?>