
<?php
function formatCurrency($amount) {
    $formattedAmount = number_format($amount, 0, ',', '.');
    echo $formattedAmount . ' VND';
}
