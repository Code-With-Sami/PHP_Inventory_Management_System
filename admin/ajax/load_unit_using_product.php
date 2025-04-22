<?php
include "../../user/connection.php";
$company_name = $_GET["company_name"];
$product_name = $_GET["product_name"];
$res = mysqli_query($link, "select * from products where company_name = '$company_name' && product_name = '$product_name' ");
?>
<select name="unit" id="unit" class="span11" onchange="select_unit(this.value, '<?php echo $product_name ?>', '<?php echo $company_name ?>')">
    <option disabled selected>Choose Unit</option>
    <?php
    while ($row = mysqli_fetch_array($res)) {
        ?>
        <option value="<?php echo $row["unit"] ?>"> <?php echo $row["unit"] ?> </option>
        <?php
    }
    ?>
</select>