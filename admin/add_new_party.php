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
            Add new party</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add new party</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" name="addNewParty" class="form-horizontal">
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
              <label class="control-label">Business Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="businessname" placeholder="Business name" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Phone Num :</label>
              <div class="controls">
                <input type="number"  class="span11" name="phonenum" placeholder="Enter Phone Num" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="email"  class="span11" name="email" placeholder="Enter Your Email" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address :</label>
              <div class="controls">
                <textarea name="address" class="span11" placeholder="Enter Your Address"></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">City :</label>
              <div class="controls">
                <input type="text"  class="span11" name="city" placeholder="Enter Your City" required/>
              </div>
            </div>
            <div class="alert alert-warning" id="error" style="display: none;">
                The Email Already Exist! Please Try Another Email.
            </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="addParty" class="btn btn-success">Add Party</button>
            </div>
            <div class="alert alert-success" id="success" style="display: none;">
                Add New Party Successfully.
            </div>
          </form>
        </div>

        <div class="widget-title mt-5"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>All Patry</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Business Name</th>
                  <th>Phone Num</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $res = mysqli_query($link, "Select * from party_info");
                  while ($row = mysqli_fetch_array($res)) {
                    ?>
                      <tr class="odd gradeX">
                          <td><?php echo $row["id"] ?></td>
                          <td><?php echo $row["firstname"] ?></td>
                          <td><?php echo $row["lastname"] ?></td>
                          <td><?php echo $row["businessname"] ?></td>
                          <td><?php echo $row["phonenum"] ?></td>
                          <td><?php echo $row["email"] ?></td>
                          <td><?php echo $row["address"] ?></td>
                          <td><?php echo $row["city"] ?></td>
                          <td class>
                            <a href="edit_party.php?id=<?php echo $row["id"] ?>" class="text-warning  ">Edit</a>
                          </td>
                          <td>
                            <a href="delete_party.php?id=<?php echo $row["id"] ?>" class="text-danger">Delete</a>
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
    if(isset($_POST["addParty"]))
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $businessname = $_POST["businessname"];
        $phonenum = $_POST["phonenum"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $city = $_POST["city"];

        $count = 0;
        $result = mysqli_query($link,"select * from party_info where email = '$email'");
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
            mysqli_query($link,"insert into party_info values(Null, '$firstname', '$lastname', '$businessname', '$phonenum', '$email', '$address', '$city')");
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