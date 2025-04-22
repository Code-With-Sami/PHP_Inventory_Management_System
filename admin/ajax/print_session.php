<?php
session_start();
$max = 0;

if (isset($_SESSION['cart'])) {
    $max = sizeof($_SESSION['cart']);
}

for ($i = 0; $i < $max; $i++) {
    if (isset($_SESSION['cart'][$i])) {
        $product_company = "";
        $product_name = "";
        $unit = "";
        $packing_size = "";
        $qty = "";

        // Use foreach instead of each()
        foreach ($_SESSION['cart'][$i] as $key => $val) {
            if ($key == "product_company") {
                $product_company = $val;
            } else if ($key == "product_name") {
                $product_name = $val;
            } else if ($key == "unit") {
                $unit = $val;
            } else if ($key == "packing_size") {
                $packing_size = $val;
            } else if ($key == "qty") {
                $qty = $val;
            }
        }

        echo $product_company . " " . $product_name . " " . $unit . " " . $packing_size . " " . $qty;
        echo "<br>";
    }
}
?>
