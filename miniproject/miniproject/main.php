<?php
    // connect database 
    $db_host = "laravel-db";
    $db_user = "root";
    $db_password = "123456";
    $db_name = "Blog";

    // connect database
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");
    // check connection error 
    
    $sql = "SELECT blog_id,category,heading,author_name,date,head_photo FROM Blog,Category 
            WHERE Category.category_id = Blog.category_id
            ORDER BY 1";

    $result = $mysqli->query($sql);

    $arr = array();
   
    while($row = $result->fetch_object())
    {

        $arr[] = $row;

    }

    echo json_encode($arr);
    
 ?>

