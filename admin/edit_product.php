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
$companyname;
$productname;
$unit;
$packingsize;
$result = mysqli_query($link,"select * from products where id = '$id'") or die(mysqli_error($conn));
while ($row = mysqli_fetch_array($result))
{
  $companyname = $row["company_name"];
  $productname = $row["product_name"];
  $unit = $row["unit"];
  $packingsize = $row["packing_size"];
}
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Update product</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Update product</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" name="updateProduct" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company :</label>
              <div class="controls">
                <select name="companyname" class="span11" required>
                    <?php
                     $res = mysqli_query($link, "Select * from company") or die(mysqli_error($link));
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <option value="<?php echo $row["company_name"] ?>" <?php if($companyname == $row["company_name"]){ echo"selected"; } ?> ><?php echo $row["company_name"] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="productname" placeholder="Product name" required value="<?php echo $productname ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Unit :</label>
              <div class="controls">
                <select name="unit" class="span11" required>
                    <?php
                    $res = mysqli_query($link, "Select * from unit") or die(mysqli_error($link));
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <option value="<?php echo $row["unitname"] ?>" <?php if($unit == $row["unitname"]){ echo"selected"; } ?> ><?php echo $row["unitname"] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="control-group">
              <label class="control-label">Packing Size :</label>
              <div class="controls">
                <input type="text" class="span11" name="packingsize" placeholder="Enter Packing size" required value="<?php echo $productname ?>" />
              </div>
            </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="updateProduct" class="btn btn-success">Update Product</button>
            </div>
            <div class="alert alert-success" id="success" style="display: none;">
                Update Product Successfully.
            </div>
          </form>
        </div>

        </div>
    </div>
</div>

<?php
    if(isset($_POST["updateProduct"]))
    {
        $companyname = $_POST["companyname"];
        $productname = $_POST["productname"];
        $unit = $_POST["unit"];
        $packingsize = $_POST["packingsize"];

            mysqli_query($link,"update products set company_name = '$companyname', product_name = '$productname',  unit = '$unit', packing_size = '$packingsize' where id = '$id' ");
            ?>
            <script>
                document.getElementById("success").style.display = "block";
                setTimeout(function () {
                  window.location.href = "add_new_product.php";
                }, 1500)
            </script>
            <?php
      }

?>

<?php
include("footer.php");
?>