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
$firstname = "";
$lastname = "";
$username = "";
$password = "";
$role = "";
$status = "";
$result = mysqli_query($link,"Select * from user_registration where id = '$id' ");
while ($row = mysqli_fetch_assoc($result)) {
  $firstname = $row["firstname"];
  $lastname = $row["lastname"];
  $username = $row["username"];
  $password = $row["password"];
  $role = $row["role"];
  $status = $row["status"];
}
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Edit user</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit user</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" name="updateUser" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="firstname" placeholder="First name" value="<?php echo $firstname ?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="lastname" placeholder="Last name" value="<?php echo $lastname ?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">User Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="username" placeholder="User name" value="<?php echo $username ?>" disabled/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="password"  class="span11" name="password" placeholder="Enter Password" value="<?php echo $password ?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Role :</label>
              <div class="controls">
                <select name="role" class="span11" required>
                    <option <?php if ($role == "user") { echo "selected"; } ?> value="user">user</option>
                    <option <?php if ($role == "admin") { echo "selected"; } ?> value="admin">admin</option>
                </select>
            </div>
            <div class="control-group">
              <label class="control-label">Role :</label>
              <div class="controls">
                <select name="status" class="span11" required>
                    <option <?php if ($status == "active") { echo "selected"; } ?> value="active">active</option>
                    <option <?php if ($status == "inactive") { echo "selected"; } ?> value="inactive">inactive</option>
                </select>
            </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="updateUser" class="btn btn-success">Update User</button>
            </div>
            <div class="alert alert-success" id="success" style="display: none;">
                User Updated Successfully.
            </div>
          </form>
        </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST["updateUser"]))
    {
        mysqli_query($link, "Update user_registration set firstname = '$_POST[firstname]', lastname = '$_POST[lastname]', password = '$_POST[password]', role = '$_POST[role]', status = '$_POST[status]' where id = '$id'");
        ?>
        <script>
                document.getElementById("success").style.display = "block";
                  window.location.href = "add_new_user.php";
        </script>
        <?php   
    }

?>

<?php
include("footer.php");
?>