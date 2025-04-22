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
            Party Report</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <form class="form-inline" action="" name="form1" method="post">
                    <div class="form-group">
                        <label for="email">Select Party Name</label>
                        <select name="businessname" class="form-control" required style="width:250px;border-style:solid; border-width:1px; border-color:#666666" >
                            <option>Select</option>
                            <?php
                            $res = mysqli_query($link,"Select * from party_info");
                            while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <option value="<?php echo $row["businessname"]?>"><?php echo $row["businessname"]?></option>
                                <?php
                            }
                            ?>                           
                        </select>
                    </div>
                    <button type="submit" name="submit1" class="btn btn-success">Show Puurchase From This Party</button>
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
                                <th>Company Name</th>
                                <th>Product Name</th>
                                <th>Unit</th>
                                <th>Packing Size</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Party Name</th>
                                <th>Purchase Type</th>
                                <th>Expiry Date</th>
                                <th>Purchase Date</th>
                                <th>Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $res = mysqli_query($link, "Select * from purchase_master where party_name = '$_POST[businessname]' ");
                            while ($row = mysqli_fetch_array($res)){
                                ?>
                                <tr>
                                    <td><?php echo $row["company_name"] ?></td>
                                    <td><?php echo $row["product_name"] ?></td>
                                    <td><?php echo $row["unit"] ?></td>
                                    <td><?php echo $row["packing_size"] ?></td>
                                    <td><?php echo $row["quantity"] ?></td>
                                    <td><?php echo $row["price"] ?></td>
                                    <td><?php echo $row["party_name"] ?></td>
                                    <td><?php echo $row["purchase_type"] ?></td>
                                    <td><?php echo $row["expiry_date"] ?></td>
                                    <td><?php echo $row["purchase_date"] ?></td>
                                    <td><?php echo $row["username"] ?></td>
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