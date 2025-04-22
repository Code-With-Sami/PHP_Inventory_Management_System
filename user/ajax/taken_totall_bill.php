<?php
session_start();

$g_total = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $qty = isset($item['qty']) ? intval($item['qty']) : 0;
        $price = isset($item['price']) ? floatval($item['price']) : 0.0;

        $g_total += $qty * $price;
    }
}

echo $g_total;
?>
