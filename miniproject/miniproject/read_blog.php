<!DOCTYPE html>
<html lang="en">
<head>
  <title>Read Baby Blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    th, td {
      padding: 5px;   
    }
    p {
        font-size: 20px;
    }
    .fakeimg {
        height: 200px;
        background: #aaa;
  }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="main.html">หน้าหลัก</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>Baby Blog</h1>
        <p>เว็บไซต์เขียนบทความที่นิยมที่สุดในปัจจุบัน</p> 
      </div>
      
      

<?php
    // connect database 
    $db_host = "laravel-db";
    $db_user = "root";
    $db_password = "123456";
    $db_name = "Blog";

    // connect database
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");
    
    $id = $_GET['id'];

    $sql = "SELECT blog_id,heading,article,author_name,blog_photo
            FROM Blog
            WHERE blog_id = $id ";

    $result = $mysqli->query($sql);

    $arr = array();
   
    while($row = mysqli_fetch_array($result))
    {
        $arr[]= $row;
    }

    $imgname = $arr[0][4];

    echo "<table align='center' width='1000'>";
    echo "<tr>";
    echo "<td align='center' >" . "</br>" . "<div style=\"font-size:30px;\">".$arr[0][1]."</div>" . "</br>" . "</br>". "</td>" ;
    echo "</tr>";

    echo "<tr>";
    echo "<td align='center'>" . "<img src='img/" . $imgname . "' width='400x400px'>" . "</br>" . "</br>". "</br>". "</td>" ;
    echo "</tr>";

    echo "<tr>";
    echo "<td>" ."<div style=\"font-size:20px;\">".$arr[0][2]."</div>" . "</br>" . "</br>". "</td>" ;
    echo "</tr>";

    echo "<tr>";
    echo "<td align='center'>" . "<div style=\"font-size:20px;\">"."เขียนโดย : ".$arr[0][3]."</div>" . "</br>" . "</td>" ;
    echo "</tr>";
    echo "</table>";


    
 ?>
