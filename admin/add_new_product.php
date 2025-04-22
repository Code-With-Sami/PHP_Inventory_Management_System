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
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add new product</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add new product</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" name="addNewProduct" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company :</label>
              <div class="controls">
                <select name="companyname" class="span11" required>
                  <option disabled selected>Choose Company</option>
                    <?php
                    $res = mysqli_query($link, "Select * from company") or die(mysqli_error($link));
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <option value="<?php echo $row["company_name"] ?>"><?php echo $row["company_name"] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="productname" placeholder="Product name" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Unit :</label>
              <div class="controls">
                <select name="unit" class="span11" required>
                  <option disabled selected>Choose Unit</option>
                    <?php
                    $res = mysqli_query($link, "Select * from unit") or die(mysqli_error($link));
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <option value="<?php echo $row["unitname"] ?>"><?php echo $row["unitname"] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="control-group">
              <label class="control-label">Packing Size :</label>
              <div class="controls">
                <input type="text" class="span11" name="packingsize" placeholder="Enter Packing size" required/>
              </div>
            </div>
            <div class="alert alert-warning" id="error" style="display: none;">
                The Product Already Exist! Please Try Another Product.
            </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="addProduct" class="btn btn-success">Add Product</button>
            </div>
            <div class="alert alert-success" id="success" style="display: none;">
                Add New Product Successfully.
            </div>
          </form>
        </div>

        <div class="widget-title mt-5"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>All Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>Product Name</th>
                  <th>Unit</th>
                  <th>Packing Size</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $res = mysqli_query($link, "Select * from products");
                  while ($row = mysqli_fetch_array($res)) {
                    ?>
                      <tr class="odd gradeX">
                          <td><?php echo $row["id"] ?></td>
                          <td><?php echo $row["company_name"] ?></td>
                          <td><?php echo $row["product_name"] ?></td>
                          <td><?php echo $row["unit"] ?></td>
                          <td><?php echo $row["packing_size"] ?></td>
                          <td class>
                            <a href="edit_product.php?id=<?php echo $row["id"] ?>" class="text-warning">Edit</a>
                          </td>
                          <td>
                            <a href="delete_product.php?id=<?php echo $row["id"] ?>" class="text-danger">Delete</a>
                          </td>
                </tr>
                    <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        </div>
    </div>
</div>

<?php
    if(isset($_POST["addProduct"]))
    {
        $companyname = $_POST["companyname"];
        $productname = $_POST["productname"];
        $unit = $_POST["unit"];
        $packingsize = $_POST["packingsize"];

        $count = 0;
        $result = mysqli_query($link,"select * from products where product_name = '$productname'");
        $count = mysqli_num_rows($result);
        echo $count;

        if ($count > 0) {
            ?>
            <script>
                document.getElementById("error").style.display = "block";
                document.getElementById("success").style.display = "none";
            </script>
            <?php
        }
        else{
            mysqli_query($link,"insert into products values(Null, '$companyname', '$productname', '$unit', '$packingsize')");
            ?>
            <script>
                document.getElementById("error").style.display = "none";
                document.getElementById("success").style.display = "block";
                setTimeout(function () {
                  window.location.href = window.location.href;
                }, 1500)
            </script>
            <?php
        }
    }

?>

<?php
include("footer.php");
?>