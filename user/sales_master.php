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
$bill_id = 0;
$res = mysqli_query($link, "Select * from billing_header order by id desc limit 1");
while ($row = mysqli_fetch_array($res)){
  $bill_id = $row["id"];
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Sale a Product</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Sale a Product</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" name="addSale" class="form-horizontal">
            <div class="row" style="display: flex;" >
              <div class="col col-md-3">
                <div class="control-group">
                  <label class="control-label">Full Name :</label>
                  <div class="controls"  >
                    <input type="text" class="" name="fullname" placeholder="Full name" required/>
                  </div>
                </div>
              </div>
              <div class="col col-md-3">
                <div class="control-group">
                  <label class="control-label">Bill Type :</label>
                  <div class="controls">
                  <select name="bill_type" class="" required>
                          <option selected>Select</option>
                          <option value="cash">Cash</option>
                          <option value="debit">Debit</option>
                        </select>
                  </div>
                </div>
              </div>
              <div class="col col-md-3">
                <div class="control-group">
                  <label class="control-label">Date :</label>
                  <div class="controls">
                    <input type="date" class="" name="bill_date"  value="<?php echo date("Y-m-d") ?>" readonly />
                  </div>
                </div>
              </div>
            </div>
            <div class="row" style="display: flex;" >
              <div class="col col-md-3">
                <div class="control-group">
                  <label class="control-label">Bill No :</label>
                  <div class="controls">
                    <input type="number" class="" name="bill_no"  value="<?php echo generate_bill_no($bill_id); ?>" readonly />
                  </div>
                </div>
              </div>
            </div>

            <div class="widget-title mt-5"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Select A Product</h5>
          </div>

            <div class="row" style="display: flex;">
              <div class="col col-md-3">
                  <div class="control-group">
                    <label class="control-label">Product Company</label>
                    <div class="controls">
                      <select name="company_name" class="" required id="company_name" onchange="select_company(this.value)">
                        <option>Select</option>
                        <?php
                          $res = mysqli_query($link, "select * from company");
                          while ($row = mysqli_fetch_array($res)) {
                              echo "<option>";
                              echo $row["company_name"];
                              echo "</option>";
                          }
                         ?>
                      </select>
                    </div>
                  </div>
              </div>
              <div class="col col-md-3">
                  <div class="control-group"  >
                    <label class="control-label">Product Name</label>
                    <div class="controls">
                      <div id="product_name_div">
                        <select name="" class="" required>
                          <option value="">Select</option>
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col col-md-3">
                  <div class="control-group"  >
                    <label class="control-label">Unit</label>
                    <div class="controls">
                      <div id="unit_div">
                        <select name="" class="" required>
                          <option value="">Select</option>
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row" style="display: flex;">
              <div class="col col-md-3">
                  <div class="control-group"  >
                    <label class="control-label">Packing Size</label>
                    <div class="controls">
                      <div id="packing_size_div">
                        <select name="" class="" required>
                          <option value="">Select</option>
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col col-md-3">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" class="" name="price" id="price" readonly value="0">
                </div>
              </div>
              <div class="col col-md-3">
                <div class="control-group">
                  <label class="control-label">Enter Qty</label>
                    <div class="controls">
                      <div class="control-group">
                        <input type="text" class="" name="qty" id="qty" autocomplete="off" onkeyup="generate_total(this.value)">
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="row" style="display: flex;">
              <div class="col col-md-3">
                <div class="control-group">
                  <label class="control-label">Total</label>
                    <div class="controls">
                      <input type="text" class="" name="total" id="total" value="0" readonly>
                    </div>
                </div>
              </div>
            </div>
            </div>
            <div class="form-actions">
              <input type="button" class=" btn btn-success" value="Add" onclick="add_session()">
            </div>
        </div>

        <div class="widget-title mt-5" style="margin-bottom: 20px;" > <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Taken Products</h5>
          </div>
          <div class="widget-content nopadding">
            <div id="taken_products_div">

            </div>
            <h4>
                <div style="float: right; margin-top: 20px; margin-right: 10px;"><span style="float:left;">Total:&nbsp;</span><span style="float: left" id="taken_totall_bill">0</span></div>
            </h4>
          </div>
          <br><br><br><br>
          <div class="form-actions">
            <center>
              <button type="submit" name="generateBill" class="btn btn-success"> Generat Bill</button>
          </center>
            </div>
          
        </div>
        </form>

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
    }

    function select_unit(unit, product_name, company_name) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("packing_size_div").innerHTML = xmlhttp.responseText;
            }

            $('#packing_size').on('change', function(){
              load_price(document.getElementById("packing_size").value);
              // let absd = document.getElementById("packing_size").value;
              // alert(absd);
            });
        };
        xmlhttp.open("GET", "ajax/load_packingsize_using_unit.php?unit=" + unit + "&product_name=" + product_name +
            "&company_name=" + company_name, true);
        xmlhttp.send();
    }

    function load_price(packing_size){
      var company_name = document.getElementById("company_name").value;
      var product_name = document.getElementById("product_name").value;
      var unit = document.getElementById("unit").value;
      // alert(packing_size+company_name+product_name+unit);
      
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("price").value = xmlhttp.responseText;
                // alert(xmlhttp.responseText);
            }
        };
        xmlhttp.open("GET", "ajax/load_price.php?company_name="+company_name+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size, true);
        xmlhttp.send();
    }

    function generate_total(qty) {
      document.getElementById("total").value = eval(document.getElementById("price").value) * eval(document.getElementById("qty").value);
    }

    function add_session(){
      var product_company = document.getElementById("company_name").value;
      var product_name = document.getElementById("product_name").value;
      var unit = document.getElementById("unit").value;
      var packing_size = document.getElementById("packing_size").value;
      var price = document.getElementById("price").value;
      var qty = document.getElementById("qty").value;
      var total = document.getElementById("total").value;
      
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "") {
                  load_billing_products();
                  // alert ("Product Added Successfully!!!");
                  
                }
                else{
                  load_billing_products();
                  alert(xmlhttp.responseText);
                  
                }
            }
        };
        xmlhttp.open("GET", "ajax/save_in_session.php?product_company="+product_company+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size+"&price="+price+"&qty="+qty+"&total="+total, true);
        xmlhttp.send();
    }

    function load_billing_products() {
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              document.getElementById("taken_products_div").innerHTML = xmlhttp.responseText;
              taken_totall_bill();
            }
        };
        xmlhttp.open("GET", "ajax/load_billing_products.php", true);
        xmlhttp.send();
    }

    function taken_totall_bill() {
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("taken_totall_bill").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "ajax/taken_totall_bill.php", true);
        xmlhttp.send();
    }

    load_billing_products();

    function edit_qty(qty1, company_name1, product_name1, unit1, packing_size1, price1) {
      // alert(qty1 + "==" + company_name1 + "==" + product_name1 + "==" + unit1 + "==" + packing_size1 + "==" + price1);
      // console.log(qty1 + "==" + company_name1 + "==" + product_name1 + "==" + unit1 + "==" + packing_size1 + "==" + price1);
      
      var product_company = company_name1;
      var product_name = product_name1;
      var unit = unit1;
      var packing_size = packing_size1;
      var price = price1;
      var qty = qty1;
      var total = eval(price) * eval(qty);
      
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "") {
                  load_billing_products();
                  alert ("Product Added Successfully!!!");
                  
                }
                else{
                  load_billing_products();
                  alert(xmlhttp.responseText);
                  
                }
            }
        };
        xmlhttp.open("GET", "ajax/update_in_session.php?product_company="+product_company+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size+"&price="+price+"&qty="+qty+"&total="+total, true);
        xmlhttp.send();
    }

    function delete_qty(sessionid) {
    
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == "") {
                  load_billing_products();
                  alert ("Product Deleted Successfully!!!");
                  
                }
                else{
                  load_billing_products();
                  alert(xmlhttp.responseText);
                  
                }
            }
        };
        xmlhttp.open("GET", "ajax/delete_in_session.php?sessionid="+sessionid, true);
        xmlhttp.send();
    }
</script>

<?php
function generate_bill_no($id){
  if($id == ""){
    $id1 = 0;
  }
  else{
    $id1 = $id;
  }
  $id1 = $id1 + 1;

  $len = strlen($id1);

  if($len == "1"){
    $id1 = "0000".$id1;
  }
  if($len == "2"){
    $id1 = "000".$id1;
  }
  if($len == "3"){
    $id1 = "00".$id1;
  }
  if($len == "4"){
    $id1 = "0".$id1;
  }
  if($len == "5"){
    // $id1 = $id1;
  }

  return $id1;
}

if (isset($_POST["generateBill"])) {
  $lastbillno = 0;
  mysqli_query( $link,"Insert into billing_header values (null, '$_POST[fullname]', '$_POST[bill_type]', '$_POST[bill_date]', '$_POST[bill_no]', '$_SESSION[user]')");
  $res=mysqli_query( $link,"Select * from billing_header order by id desc limit 1");
  while ($row = mysqli_fetch_array($res)) {
    $lastbillno = $row["id"];
  }

  $max = sizeof($_SESSION['cart']);

  for ($i = 0; $i < $max; $i++) {
    if (isset($_SESSION['cart'][$i])) {
        $product_company = "";
        $product_name = "";
        $unit = "";
        $packing_size = "";
        $price = "";
        $qty = "";

        // Use foreach instead of each()
        foreach ($_SESSION['cart'][$i] as $key => $val) {
            if ($key == "product_company") {
                $product_company = $val;
            } else if ($key == "product_name") {
                $product_name = $val;
            } else if ($key == "unit") {
                $unit = $val;
            } else if ($key == "packing_size") {
                $packing_size = $val;
            } else if ($key == "price") {
                $price = $val;
            } else if ($key == "qty") {
                $qty = $val;
            }
        }
        if($product_company!=""){
            mysqli_query($link, "Insert into billing_details values (Null, '$lastbillno', '$product_company', '$product_name', '$unit', '$packing_size', '$price', '$qty')") or die(mysqli_error($link)); 
            mysqli_query($link, query: "Update stock_master set product_quantity = product_quantity-$qty where product_company='$product_company' && product_name='$product_name' && product_unit='$unit' && product_packingsize='$packing_size'") or die(mysqli_error($link));
        }
    }
}
unset($_SESSION['cart']);
?>
<script>
  alert("Bill Generated Successfully!")
  window.location.href = window.location.href;
</script>
<?php
}
?>

<?php
include("footer.php");
?>