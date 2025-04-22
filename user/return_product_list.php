<?php
session_start();
if (!isset($_SESSION["user"])) {
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
            Return Products</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <form class="form-inline" action="" name="form1" method="post">
                    <div class="form-group">
                        <label for="email">Select Start Date</label>
                        <input type="text" name="dt" id="dt" autocomplete="off" class="form-control" required style="width:250px;border-style:solid; border-width:1px; border-color:#666666" placeholder="click here to open calender"  >
                    </div>
                    <div class="form-group">
                        <label for="email">Select End Date</label>
                        <input type="text" name="dt2" id="dt2" autocomplete="off" placeholder="click here to open calender"  class="form-control" style="width:250px;border-style:solid; border-width:1px; border-color:#666666" >
                    </div>
                    <button type="submit" name="submit1" class="btn btn-success">Show Purchase From These Dates</button>
                    <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
        </form>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Return Products</h5>
                </div>
                <div class="widget-content nopadding">
                    <?php
                    if (isset($_POST["submit1"])) {
                        ?>
                            <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bill No</th>
                                <th>Return By</th>
                                <th>Return Date</th>
                                <th>Product Company</th>
                                <th>Product Name</th>
                                <th>Product Unit</th>
                                <th>Packing Size</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res = mysqli_query($link, "Select * from return_products where (return_date >= '$_POST[dt]' && return_date <= '$_POST[dt2]') order by id desc");
                            while ($row = mysqli_fetch_array($res)){
                                ?>
                                <tr>
                                    <td><?php echo $row["bill_no"] ?></td>
                                    <td><?php echo $row["return_by"] ?></td>
                                    <td><?php echo $row["return_date"] ?></td>
                                    <td><?php echo $row["product_company"] ?></td>
                                    <td><?php echo $row["product_name"] ?></td>
                                    <td><?php echo $row["product_unit"] ?></td>
                                    <td><?php echo $row["packing_size"] ?></td>
                                    <td><?php echo $row["product_price"] ?></td>
                                    <td><?php echo $row["product_qty"] ?></td>
                                    <td><?php echo $row["total"] ?></td>
                                </tr>
                                <?php
                            }
                            ?>                            
                        </tbody>
                    </table>
                        <?php
                    }else{
                        ?>
                            <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bill No</th>
                                <th>Return By</th>
                                <th>Return Date</th>
                                <th>Product Company</th>
                                <th>Product Name</th>
                                <th>Product Unit</th>
                                <th>Packing Size</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res = mysqli_query($link, "Select * from return_products order by id desc");
                            while ($row = mysqli_fetch_array($res)){
                                ?>
                                <tr>
                                    <td><?php echo $row["bill_no"] ?></td>
                                    <td><?php echo $row["return_by"] ?></td>
                                    <td><?php echo $row["return_date"] ?></td>
                                    <td><?php echo $row["product_company"] ?></td>
                                    <td><?php echo $row["product_name"] ?></td>
                                    <td><?php echo $row["product_unit"] ?></td>
                                    <td><?php echo $row["packing_size"] ?></td>
                                    <td><?php echo $row["product_price"] ?></td>
                                    <td><?php echo $row["product_qty"] ?></td>
                                    <td><?php echo $row["total"] ?></td>
                                </tr>
                                <?php
                            }
                            ?>                            
                        </tbody>
                    </table>
                        <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!--end-main-container-part-->

<?php

include("footer.php");
?>