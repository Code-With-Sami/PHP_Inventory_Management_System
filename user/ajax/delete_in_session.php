<?php
session_start();
$sessionid = $_GET["sessionid"];
$b= array("product_company"=>"", "product_name"=>"", "unit"=>"", "packing_size"=>"", "price"=>"", "qty"=>"");
$_SESSION["cart"]["$sessionid"] = $b;
?>