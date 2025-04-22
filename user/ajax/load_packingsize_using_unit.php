<?php
include "../../user/connection.php";
$company_name = $_GET["company_name"];
$product_name = $_GET["product_name"];
$unit = $_GET["unit"];
$res = mysqli_query($link, "select * from products where company_name = '$company_name' && product_name = '$product_name' && unit = '$unit' ");
?>
<select name="packing_size" id="packing_size" class="span11">
    <option disabled selected>Choose Packing Size</option>
    <?php
    while ($row = mysqli_fetch_array($res)) {
        ?>
        <option value="<?php echo $row["packing_size"] ?>"> <?php echo $row["packing_size"] ?> </option>
        <?php
    }
    ?>
</select>
