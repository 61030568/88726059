<meta charset="UTF-8">
<?php
// เข้าฐานข้อมูล
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "123456";
    $db_name = "Song";

 // กำหนดตัวแปร
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");


   $song = $_POST['song'];
   $cat = $_POST['cat'];
   $year = $_POST['year'];

 //นำข้อมูลที่ได้จากการ post มาสร้างเป็นคำสั่ง SELECT และส่งไป execute ที่ ฐานข้อมูล
   $sql = "SELECT song_name,artist_name FROM songs,styles,albums,artists
   WHERE (song_name LIKE '$song%' OR artist_name LIKE '$song%') 
   AND style_name LIKE '$cat%' AND album_year LIKE '$year
   ORDER BY 1" ;

    // แปลงข้อมูลเป็น JSON และส่งกลับไปยัง ไฟล์ searchsong.html
     echo "$mysqli";
     $result = $mysqli->query($sql);
     $arr = array();
     while($row = $result->fetch_object())
     {
         $arr[] = $row;
     }
 
     echo json_encode($arr);
?>