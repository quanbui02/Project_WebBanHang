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
    // Create a DateTime object and suppress any warnings
    $dateTime = @DateTime::createFromFormat('Y-m-d', $date);
    
    // Check if the date is valid
    if (!$dateTime || $dateTime->format('Y-m-d') !== $date) {
        return false; // Invalid date
    }
    
    // Format the date as dd/mm/yyyy
    $formattedDate = $dateTime->format('d/m/Y');
    
    return $formattedDate;
}

?>