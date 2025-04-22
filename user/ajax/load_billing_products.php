<?php
session_start();
$max = 0;

if (isset($_SESSION['cart'])) {
    $max = sizeof($_SESSION['cart']);
}
?>
<table class="table table-bordered table-striped">
  <thead>
        <tr>
          <th>Product Company</th>
          <th>Product Name</th>
          <th>Product Unit</th>
          <th>Packing Size</th>
          <th>Product Price</th>
          <th>Product Quantity</th>
          <th>Total</th>
          <th>Delete</th>
        </tr>
    </thead>
<tbody>
<?php

for ($i = 0; $i < $max; $i++) {
    if (isset($_SESSION['cart'][$i])) {
        $product_company = "";
        $product_name = "";
        $unit = "";
        $packing_size = "";
        $price = "";
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
            } else if ($key == "price") {
                $price = $val;
            } else if ($key == "qty") {
                $qty = $val;
            }
        }
        if($product_company!=""){
?>
        <tr>
              <th> <?php echo $product_company ?> </th>
              <th> <?php echo $product_name ?> </th>
              <th> <?php echo $unit ?> </th>
              <th> <?php echo $packing_size ?> </th>
              <th> <?php echo $price ?> </th>
              <th> <input type="number" name="qty" id="tt<?php echo $i ?>" value="<?php echo $qty ?>" > <i class="fa fa-refresh" style="font-size:24px" onclick="edit_qty(document.getElementById('tt<?php echo $i ?>').value , '<?php echo $product_company ?>', '<?php echo $product_name ?>', '<?php echo $unit ?>', '<?php echo $packing_size ?>', '<?php echo $price ?>')" ></i> </th>
              <!-- <th> <?php echo $qty ?> </th> -->
              <th> <?php echo $price * $qty ?> </th>
              <th style="cursor: pointer;" onclick="delete_qty(<?php echo $i ?>)" >Delete</th>
        </tr>
<?php
        }
    }
}
?>
</tbody>
</table>
