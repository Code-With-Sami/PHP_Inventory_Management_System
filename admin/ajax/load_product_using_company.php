<?php
include "../../user/connection.php";
$company_name = $_GET["company_name"];
$res = mysqli_query($link, "select * from products where company_name = '$company_name' ");
?>
<select name="product_name" id="product_name" class="span11" onchange="select_product(this.value, '<?php echo $company_name ?>')">
    <option disabled selected>Choose Product</option>
    <?php
    while ($row = mysqli_fetch_array($res)) {
        ?>
        <option value="<?php echo $row["product_name"] ?>"> <?php echo $row["product_name"] ?> </option>
        <?php
    }
    ?>
</select>