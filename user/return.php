<?php
session_start();
if (!isset($_SESSION["admin"])) {
    ?>
        <script>
            window.location.href = "index.php";
        </script>
    <?php
}
?>
<?php
include("../user/connection.php");
$id = $_GET["id"];
$bill_id = "";
$product_company = "";
$product_name = "";
$product_unit = "";
$packing_size = "";
$price = "";
$qty = "";
$total = 0;

$res = mysqli_query($link, "Select * from billing_details where id = '$id' ");
while ($row = mysqli_fetch_array($res)) {
    $bill_id = $row["bill_id"];
    $product_company = $row["product_comapny"];
    $product_name = $row["product_nme"];
    $product_unit = $row["product_unit"];
    $packing_size = $row["packing_size"];
    $price = $row["price"];
    $qty = $row["qty"];
    $total = $price * $qty;
}

$bill_no = "";
$res2 = mysqli_query($link,"Select * from billing_header where id = '$bill_id' ");
while ($row2 = mysqli_fetch_array($res2)) {
    $bill_no = $row2["bill_no"];
}

$today_date = date('Y-m-d');

mysqli_query($link, "Insert into return_products values (Null, '$bill_no', '$_SESSION[user]', '$today_date', '$product_company', '$product_name', '$product_unit', '$packing_size', '$price', '$qty', '$total' )");
mysqli_query($link, query: "Update stock_master set product_quantity = product_quantity+$qty where product_company='$product_company' && product_name='$product_name' && product_unit='$product_unit' && product_packingsize='$packing_size'");
mysqli_query($link,"Delete from billing_details where id = '$id' ");
?>
<script>
    alert("Product take as a return succesfully!");
    window.location = "view_bill_details.php?id=<?php echo $bill_id; ?>";
</script>