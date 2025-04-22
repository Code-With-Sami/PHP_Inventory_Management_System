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
            Add new user</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add new user</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" name="addNewUser" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="firstname" placeholder="First name" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="lastname" placeholder="Last name" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">User Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="username" placeholder="User name" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="password"  class="span11" name="password" placeholder="Enter Password" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Role :</label>
              <div class="controls">
                <select name="role" class="span11" required>
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>
            </div>
            <div class="alert alert-warning" id="error" style="display: none;">
                The Username Already Exist! Please Try Another username.
            </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="addUser" class="btn btn-success">Add User</button>
            </div>
            <div class="alert alert-success" id="success" style="display: none;">
                Add New user Succaessfully.
            </div>
          </form>
        </div>

        <div class="widget-title mt-5"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>All Users</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>UserName</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $res = mysqli_query($link, "Select * from user_registration");
                  while ($row = mysqli_fetch_array($res)) {
                    ?>
                      <tr class="odd gradeX">
                          <td><?php echo $row["id"] ?></td>
                          <td><?php echo $row["firstname"] ?></td>
                          <td><?php echo $row["lastname"] ?></td>
                          <td><?php echo $row["username"] ?></td>
                          <td><?php echo $row["role"] ?></td>
                          <td><?php echo $row["status"] ?></td>
                          <td class>
                            <a href="edit_user.php?id=<?php echo $row["id"] ?>" class="text-warning  ">Edit</a>
                          </td>
                          <td>
                            <a href="delete_user.php?id=<?php echo $row["id"] ?>" class="text-danger">Delete</a>
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
    if(isset($_POST["addUser"]))
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role = $_POST["role"];

        $count = 0;
        $result = mysqli_query($link,"select * from user_registration where username = '$username'");
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
            mysqli_query($link,"insert into user_registration values(Null, '$firstname', '$lastname', '$username', '$password', '$role', 'active')");
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