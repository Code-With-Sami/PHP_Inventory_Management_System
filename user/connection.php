<?php
    $link = mysqli_connect("localhost","root","");
    mysqli_select_db($link,"php_ims") or die(mysqli_error($link));
?>