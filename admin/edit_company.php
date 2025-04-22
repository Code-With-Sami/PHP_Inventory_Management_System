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
$companyname = "";
$result = mysqli_query($link,"Select * from company where id = '$id' ");
while ($row = mysqli_fetch_assoc($result)) {
  $companyname = $row["company_name"];
}
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Edit company</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit company</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" name="updateCompany" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="companyname" placeholder="Company name" value="<?php echo $companyname ?>" required/>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="updateCompany" class="btn btn-success">Update Comapny</button>
            </div>
            <div class="alert alert-success" id="success" style="display: none;">
                Company Updated Successfully.
            </div>
          </form>
        </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST["updateCompany"]))
    {
        mysqli_query($link, "Update company set company_name = '$_POST[companyname]' where id = '$id'");
        ?>
        <script>
                document.getElementById("success").style.display = "block";
                  window.location.href = "add_new_company.php";
        </script>
        <?php   
    }

?>

<?php
include("footer.php");
?>