<?php 

function convertDateTime($datetime) {
    // Chuyển đổi chuỗi thời gian vào đối tượng DateTime
    $datetimeObj = DateTime::createFromFormat('Y-m-d H:i:s.u', $datetime);

    // Kiểm tra nếu chuyển đổi thành công
    if ($datetimeObj) {
        // Trích xuất ngày, tháng, năm và giờ
        $date = $datetimeObj->format('d - m - Y');
        $time = $datetimeObj->format('H:i:s');

        // Hiển thị kết quả
        return 'Ngày: ' . $date . ' Giờ: ' . $time ;
    } else {
        return 'Thời gian không hợp lệ.';
    }
}

function convertToDdMmYyyy($date) {
    if ($date === "0000-00-00 00:00:00.000000") {
        return 'Không thỏa mãn';
    }
    
    $currentDate = new DateTime();
    $dateTime = new DateTime($date);
    
    if ($dateTime > $currentDate) {
        return 'Không thỏa mãn';
    }
    
    $formattedDate = $dateTime->format('d/m/Y');
    
    return $formattedDate;
}


?>