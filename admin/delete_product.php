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
include("../user/connection.php");
$id = $_GET["id"];
mysqli_query($link, "delete from products where id = '$id' ");
?>
<script>
    window.location.href = "add_new_product.php";
</script>