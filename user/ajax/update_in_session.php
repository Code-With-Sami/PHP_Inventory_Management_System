<?php
session_start();
include "../../user/connection.php";

// Get values from AJAX
$product_company = $_GET["product_company"];
$product_name = $_GET["product_name"];
$unit = $_GET["unit"];
$packing_size = $_GET["packing_size"];
$price = $_GET["price"];
$qty = $_GET["qty"];
$total = $_GET["total"];

$av_qty = 0;
$exist_qty = 0;
$exist_qty = $qty;
$av_qty = check_qty($product_company, $product_name, $unit, $packing_size, $link);
if ($av_qty>=$exist_qty) {
    $check_product_no_session = check_product_no_session($product_company, $product_name, $unit, $packing_size);
    $b= array("product_company"=>$product_company, "product_name"=>$product_name, "unit"=>$unit, "packing_size"=>$packing_size, "price"=>$price, "qty"=>$exist_qty);
    $_SESSION["cart"] [$check_product_no_session] = $b;
}else {
    echo "Entered Qty is not Available!!!";
}

// Helper functions

function check_qty($product_company, $product_name, $product_unit, $packing_size, $link) {
    $product_qty = 0;
    $res = mysqli_query($link, "SELECT * FROM stock_master WHERE product_company='$product_company' AND product_name='$product_name' AND product_unit='$product_unit' AND product_packingsize='$packing_size'");
    
    if (!$res) {
        echo "Query Error: " . mysqli_error($link);
        exit;
    }

    while ($row = mysqli_fetch_array($res)) {
        $product_qty += $row["product_quantity"]; 
    }
    return $product_qty;
}

function check_dupliate_product($product_company, $product_name, $product_unit, $packing_size) {
    foreach ($_SESSION['cart'] as $item) {
        if (
            $item["product_company"] === $product_company &&
            $item["product_name"] === $product_name &&
            $item["unit"] === $product_unit &&
            $item["packing_size"] === $packing_size
        ) {
            return 1;
        }
    }
    return 0;
}

function check_the_qty($product_company, $product_name, $product_unit, $packing_size) {
    foreach ($_SESSION['cart'] as $item) {
        if (
            $item["product_company"] === $product_company &&
            $item["product_name"] === $product_name &&
            $item["unit"] === $product_unit &&
            $item["packing_size"] === $packing_size
        ) {
            return $item["qty"];
        }
    }
    return 0;
}

function check_product_no_session($product_company, $product_name, $product_unit, $packing_size) {
    foreach ($_SESSION['cart'] as $index => $item) {
        if (
            $item["product_company"] === $product_company &&
            $item["product_name"] === $product_name &&
            $item["unit"] === $product_unit &&
            $item["packing_size"] === $packing_size
        ) {
            return $index;
        }
    }
    return -1;
}
?>
