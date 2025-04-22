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
                Add new purchase</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>Add new purchase</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="post" name="addNewPurchase" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Company :</label>
                            <div class="controls">
                                <select name="company_name" class="span11" required id="company_name"
                                    onchange="select_company(this.value)">
                                    <option disabled selected>Choose Company</option>
                                    <?php
                    $res = mysqli_query($link, "Select * from company") or die(mysqli_error($link));
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                                    <option value="<?php echo $row["company_name"] ?>">
                                        <?php echo $row["company_name"] ?></option>
                                    <?php
                    }
                    ?>
                                </select>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Name :</label>
                                <div class="controls" id="product_name_div">
                                    <select name="product_name" id="" class="span11">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Unit :</label>
                                <div class="controls" id="unit_div">
                                    <select name="unit" class="span11" required>
                                        <option>Select</option>
                                    </select>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Packing Size :</label>
                                    <div class="controls" id="packing_size_div">
                                        <select name="packing_size" class="span11">
                                            <option>select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Enter QTY :</label>
                                    <div class="controls">
                                        <input type="number" name="quantity" class="span11">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Enter Price :</label>
                                    <div class="controls">
                                        <input type="number" name="price" class="span11">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Select Party :</label>
                                    <div class="controls">
                                        <select name="party_name" class="span11">
                                            <option selected disabled>select</option>
                                            <?php
                    $res = mysqli_query($link,"Select * from party_info") or die(mysqli_error($link));
                    while ($row = mysqli_fetch_assoc($res)) {
                      ?>
                                            <option value="<?php echo $row["businessname"] ?>">
                                                <?php echo $row["businessname"] ?> </option>
                                            <?php
                    }
                    ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Payment Type :</label>
                                    <div class="controls">
                                        <select name="payment_type" class="span11">
                                            <option value="cash">Cash</option>
                                            <option value="debit">Debit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Expiry Date :</label>
                                    <div class="controls">
                                        <input type="date" name="expiry_date" class="span11">
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" name="addProductMaster" class="btn btn-success">Purchase</button>
                            </div>
                            <div class="alert alert-success" id="success" style="display: none;">
                                Purchase Successfully.
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
    function select_company(company_name) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("product_name_div").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "ajax/load_product_using_company.php?company_name=" + company_name, true);
        xmlhttp.send();
    }

    function select_product(product_name, company_name) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("unit_div").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "ajax/load_unit_using_product.php?product_name=" + product_name + "&company_name=" +
            company_name, true);
        xmlhttp.send();
        // alert(product_name+ '=='+ company_name);
    }

    function select_unit(unit, product_name, company_name) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("packing_size_div").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "ajax/load_packingsize_using_unit.php?unit=" + unit + "&product_name=" + product_name +
            "&company_name=" + company_name, true);
        xmlhttp.send();
    }
    </script>

    <?php
    if(isset($_POST["addProductMaster"]))
    {  
      $company_name = $_POST["company_name"];
      $product_name = $_POST["product_name"];
      $unit = $_POST["unit"];
      $packing_size = $_POST["packing_size"];
      $quantity = $_POST["quantity"];
      $price = $_POST["price"];
      $party_name = $_POST["party_name"];
      $payment_type = $_POST["payment_type"];
      $expiry_date = $_POST["expiry_date"];
      $today_date = date("Y-m-d");

      mysqli_query($link,"insert into `purchase_master` VALUES (Null,'$company_name','$product_name','$unit','$packing_size','$quantity','$price','$party_name','$payment_type','$expiry_date', '$today_date', '$_SESSION[admin]')") or die(mysqli_error($link));

      $count = 0;
      $res = mysqli_query( $link,"select * from stock_master where product_company = '$company_name' && product_name = '$product_name' && product_unit = '$unit' && product_packingsize = '$packing_size' ") or die(mysqli_error($link));
      $count = mysqli_num_rows($res);

      if($count == 0){
        mysqli_query($link,"insert into stock_master values (Null, '$company_name','$product_name','$unit', '$packing_size', '$quantity', '0')") or die(mysqli_error($link));
      }
      else{
        mysqli_query($link,"update stock_master set product_quantity=product_quantity+$quantity where product_company = '$company_name' && product_name = '$product_name' && product_unit = '$unit' && product_packingsize = '$packing_size' ") or die(mysqli_error($link));
      }
      ?>
          <script>
          document.getElementById("success").style.display = "block";
          setTimeout(function() {
              window.location.href = window.location.href;
          }, 1500)
          </script>
      <?php
    }

?>

    <?php
include("footer.php");
?>