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
$businessname = "";
$phonenum = "";
$email = "";
$address = "";
$city = "";
$result = mysqli_query($link,"Select * from party_info where id = '$id' ");
while ($row = mysqli_fetch_assoc($result)) {
  $firstname = $row["firstname"];
  $lastname = $row["lastname"];
  $businessname = $row["businessname"];
  $phonenum = $row["phonenum"];
  $email = $row["email"];
  $address = $row["address"];
  $city = $row["city"];
}
?>

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Edit Party</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit party</h5>
        </div>
        <div class="widget-content nopadding">
          <form method="post" name="updateParty" class="form-horizontal">
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
              <label class="control-label">Business Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="businessname" placeholder="Business name" value="<?php echo $businessname ?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Phone Num :</label>
              <div class="controls">
                <input type="number" class="span11" name="phonenum" placeholder="Phone Num" value="<?php echo $phonenum ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="email"  class="span11" name="email" placeholder="Enter email" value="<?php echo $email ?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address :</label>
              <div class="controls">
                <textarea name="address" class="span11" placeholder="Enter Your Address"><?php echo $address ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">City :</label>
              <div class="controls">
                <input type="text"  class="span11" name="city" placeholder="Enter city" value="<?php echo $city ?>" required/>
              </div>
            </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="updateParty" class="btn btn-success">Update Party</button>
            </div>
            <div class="alert alert-success" id="success" style="display: none;">
                Party Updated Successfully.
            </div>
          </form>
        </div>
        </div>
    </div>
</div>

<?php
    if(isset($_POST["updateParty"]))
    {
        mysqli_query($link, "Update party_info set firstname = '$_POST[firstname]', lastname = '$_POST[lastname]', businessname = '$_POST[businessname]', phonenum = '$_POST[phonenum]', email = '$_POST[email]', address = '$_POST[address]', city = '$_POST[city]' where id = '$id'") or die(mysqli_error($link));
        ?>
        <script>
                document.getElementById("success").style.display = "block";
                  window.location.href = "add_new_party.php";
        </script>
        <?php   
    }

?>

<?php
include("footer.php");
?>