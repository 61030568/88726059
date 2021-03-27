<?php
$con= mysqli_connect("laravel-db","root","123456","Blog") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
?>