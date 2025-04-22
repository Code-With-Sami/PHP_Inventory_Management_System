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
include("header.php");
include("../user/connection.php");
$id = $_GET["id"];
$product_company;
$product_name;
$product_unit;
$product_packingsize;
$product_quantity;
$product_selling_price;
$result = mysqli_query($link,"select * from stock_master where id = '$id'") or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result))
{
  $product_company = $row["product_company"];
  $product_name = $row["product_name"];
  $product_unit = $row["product_unit"];
  $product_packingsize = $row["product_packingsize"];
  $product_quantity = $row["product_quantity"];
  $product_selling_price = $row["product_selling_price"];
}
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Update Stock</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Update Stcok</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" name="updateStock" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Product Company :</label>
              <div class="controls">
                <select name="product_company" class="span11" required disabled>
                    <?php
                     $res = mysqli_query($link, "Select * from stock_master") or die(mysqli_error($link));
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <option value="<?php echo $row["product_company"] ?>" ><?php echo $row["product_company"] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="product_name" placeholder="Product name" required value="<?php echo $product_name ?>" disabled/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Unit :</label>
              <div class="controls">
                <select name="product_unit" class="span11" required disabled>
                    <?php
                    $res = mysqli_query($link, "Select * from stock_master") or die(mysqli_error($link));
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <option value="<?php echo $row["product_unit"] ?>" ><?php echo $row["product_unit"] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="control-group">
              <label class="control-label">Product Packing Size :</label>
              <div class="controls">
                <input type="text" class="span11" name="product_packingsize" placeholder="Enter Packing size" required value="<?php echo $product_packingsize ?>" disabled/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Quantity :</label>
              <div class="controls">
                <input type="number" class="span11" name="product_quantity" placeholder="Enter Product Quantity" required value="<?php echo $product_quantity ?>" disabled/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Selling Price :</label>
              <div class="controls">
                <input type="number" class="span11" name="product_selling_price" placeholder="Enter Selling Price" required value="<?php echo $product_selling_price ?>"/>
              </div>
            </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="updateStockMaster" class="btn btn-success">Update Stcok</button>
            </div>
            <div class="alert alert-success" id="success" style="display: none;">
                Updated Successfully!
            </div>
          </form>
        </div>

        </div>
    </div>
</div>

<?php
    if(isset($_POST["updateStockMaster"]))
    {
        $product_company = $_POST["product_company"];
        $product_name = $_POST["product_name"];
        $product_unit = $_POST["product_unit"];
        $product_packingsize = $_POST["product_packingsize"];
        $product_quantity = $_POST["product_quantity"];
        $product_selling_price = $_POST["product_selling_price"];

        mysqli_query($link,"update stock_master set product_selling_price = '$product_selling_price' where id = '$id' ") or die(mysqli_error($link));

        ?>
          <script>
          document.getElementById("success").style.display = "block";
          setTimeout(function() {
              window.location.href = "stock_master.php";
          }, 1500)
          </script>
      <?php
    }

?>

<?php
include("footer.php");
?>