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
            Add new company</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add new company</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" name="addNewCompany" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Comapny Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="companyname" placeholder="Company name" required/>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="addCompany" class="btn btn-success">Add Company</button>
            </div>
            <div class="alert alert-warning" id="error" style="display: none;">
                The Company Already Exist! Please Try Another Company.
            </div>
            <div class="alert alert-success" id="success" style="display: none;">
                Add New Company Successfully.
            </div>
          </form>
        </div>

        <div class="widget-title mt-5"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>All Company</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Company Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $res = mysqli_query($link, "Select * from company");
                  while ($row = mysqli_fetch_array($res)) {
                    ?>
                      <tr class="odd gradeX">
                          <td><?php echo $row["id"] ?></td>
                          <td><?php echo $row["company_name"] ?></td>
                          <td class>
                            <a href="edit_company.php?id=<?php echo $row["id"] ?>" class="text-warning  ">Edit</a>
                          </td>
                          <td>
                            <a href="delete_company.php?id=<?php echo $row["id"] ?>" class="text-danger">Delete</a>
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
    if(isset($_POST["addCompany"]))
    {
        $companyname = $_POST["companyname"];

        $count = 0;
        $result = mysqli_query($link,"select * from company where company_name = '$companyname'");
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
            mysqli_query($link,"insert into company values(Null, '$companyname')");
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