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
include "header.php";
include "../user/connection.php";
?>


    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="#" class="tip-bottom"><i class="icon-home"></i>
                    Expire Products Report</a></div>
        </div>
        <!--End-breadcrumbs-->
        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
                <form class="form-inline" action="" name="form1" method="post">
                    <div class="form-group">
                        <label for="email">Select Start Date</label>
                        <input type="text" name="dt" id="dt" autocomplete="off" class="form-control" required style="width:200px;border-style:solid; border-width:1px; border-color:#666666" placeholder="click here to open calender"  >
                    </div>
                    <div class="form-group">
                        <label for="email">Select End Date</label>
                        <input type="text" name="dt2" id="dt2" autocomplete="off" placeholder="click here to open calender"  class="form-control" style="width:200px;border-style:solid; border-width:1px; border-color:#666666" >
                    </div>
                    <button type="submit" name="submit1" class="btn btn-success">Product Expire From These Dates</button>
                    <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
                </form>

                <br>


                <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">



                <div class="span12">

                    <div class="widget-content nopadding">

                       <?php
                       if (isset($_POST["submit1"])) {
                        ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Purshase By</th>
                                    <th>Product Company</th>
                                    <th>Product Name</th>
                                    <th>Product Unit</th>
                                    <th>Packing Size</th>
                                    <th>Product Qty</th>
                                    <th>Price</th>
                                    <th>Party Name</th>
                                    <th>Purchase Type</th>
                                    <th>Expiry Date</th>
                                    <th>Purchase Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                $res = mysqli_query($link, "Select * from purchase_master where (expiry_date >= '$_POST[dt]' && expiry_date <= '$_POST[dt2]')");
                                while ($row = mysqli_fetch_array($res)) {
                                    $count = $count + 1;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $row["username"]; ?></td>
                                        <td><?php echo $row["company_name"]; ?></td>
                                        <td><?php echo $row["product_name"]; ?></td>
                                        <td><?php echo $row["unit"]; ?></td>
                                        <td><?php echo $row["packing_size"]; ?></td>
                                        <td><?php echo $row["quantity"]; ?></td>
                                        <td><?php echo $row["price"]; ?></td>
                                        <td><?php echo $row["party_name"]; ?></td>
                                        <td><?php echo $row["purchase_type"]; ?></td>
                                        <td><?php echo $row["expiry_date"]; ?></td>
                                        <td><?php echo $row["purchase_date"]; ?></td>
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
                                        <th>Sr. No</th>
                                        <th>Purshase By</th>
                                        <th>Product Company</th>
                                        <th>Product Name</th>
                                        <th>Product Unit</th>
                                        <th>Packing Size</th>
                                        <th>Product Qty</th>
                                        <th>Price</th>
                                        <th>Party Name</th>
                                        <th>Purchase Type</th>
                                        <th>Expiry Date</th>
                                        <th>Purchase Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    $res = mysqli_query($link, "Select * from purchase_master");
                                    while ($row = mysqli_fetch_array($res)) {
                                        $count = $count + 1;
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $row["username"]; ?></td>
                                            <td><?php echo $row["company_name"]; ?></td>
                                            <td><?php echo $row["product_name"]; ?></td>
                                            <td><?php echo $row["unit"]; ?></td>
                                            <td><?php echo $row["packing_size"]; ?></td>
                                            <td><?php echo $row["quantity"]; ?></td>
                                            <td><?php echo $row["price"]; ?></td>
                                            <td><?php echo $row["party_name"]; ?></td>
                                            <td><?php echo $row["purchase_type"]; ?></td>
                                            <td><?php echo $row["expiry_date"]; ?></td>
                                            <td><?php echo $row["purchase_date"]; ?></td>
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




<?php
include "footer.php";
?>



