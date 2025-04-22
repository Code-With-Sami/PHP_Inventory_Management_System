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
$bill_no = "";
$full_name = "";
$bill_type = "";
$bill_date = "";
$res =  mysqli_query($link, "Select * from billing_header where id = '$id' ");
while ($row = mysqli_fetch_array($res)){
    $bill_no = $row["bill_no"];
    $full_name = $row["full_name"];
    $bill_type = $row["bill_type"];
    $bill_date = $row["date"];
}

?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            View Detailed Bill</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Bill Details</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>Bill No: </td>
                                <td><?php echo $bill_no ?></td>
                            </tr>
                            <tr>
                                <td>Full Name: </td>
                                <td><?php echo $full_name ?></td>
                            </tr>
                            <tr>
                                <td>Bill Type: </td>
                                <td><?php echo $bill_type ?></td>
                            </tr>
                            <tr>
                                <td>Bill Date: </td>
                                <td><?php echo $bill_date ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Order Details</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product Company</th>
                                <th>Product Name</th>
                                <th>Product Unit</th>
                                <th>Packing Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Return</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           $total = 0;
                           $res = mysqli_query($link,"Select * from billing_details where bill_id = '$id' ");
                           while ($row = mysqli_fetch_array($res)){
                            ?>
                            <tr>
                                <td><?php echo $row["product_comapny"]; ?></td>
                                <td><?php echo $row["product_nme"]; ?></td>
                                <td><?php echo $row["product_unit"]; ?></td>
                                <td><?php echo $row["packing_size"]; ?></td>
                                <td><?php echo $row["price"]; ?></td>
                                <td><?php echo $row["qty"]; ?></td>
                                <td><?php echo $row["price"] * $row["qty"]; ?></td>
                                <td><a style="color: red;" href="return.php?id=<?php echo $row["id"]; ?>">Return</a></td>
                            </tr>
                            <?php
                            $total = $total + ($row["price"] * $row["qty"]);
                           }
                           ?>
                        </tbody>
                    </table>
                </div>
                <div style="margin:0 25px; display: flex; justify-content: right; " >
                    <h3>Total: <?php echo $total; ?></h3>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

<!--end-main-container-part-->

<?php

include("footer.php");
?>