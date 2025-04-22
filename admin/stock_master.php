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
            Stock Master</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-box">
        <div class="widget-title mt-5"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>All Stocks</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Product Company</th>
                  <th>Product Name</th>
                  <th>Product Unit</th>
                  <th>Product Packing Size</th>
                  <th>Product Quantity</th>
                  <th>Product Selling Price</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $res = mysqli_query($link, "Select * from stock_master");
                  while ($row = mysqli_fetch_array($res)) {
                    ?>
                      <tr class="odd gradeX">
                          <td><?php echo $row["id"] ?></td>
                          <td><?php echo $row["product_company"] ?></td>
                          <td><?php echo $row["product_name"] ?></td>
                          <td><?php echo $row["product_unit"] ?></td>
                          <td><?php echo $row["product_packingsize"] ?></td>
                          <td><?php echo $row["product_quantity"] ?></td>
                          <td><?php echo $row["product_selling_price"] ?></td>
                          <td class>
                            <a href="edit_stock_master.php?id=<?php echo $row["id"] ?>" class="text-warning">Edit</a>
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
include("footer.php");
?>