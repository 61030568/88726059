<meta charset="UTF-8" />
<?php 
require_once('connect.php');

    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
    $numrandb = (mt_rand());
	
	//รับชื่อไฟล์จากฟอร์ม 
	$heading = $_POST['heading'];
	$article = $_POST['article'];
    $category = $_POST['category'];
	$author_name = $_POST['author_name'];
	$head_photo = (isset($_POST['head_photo']) ? $_POST['head_photo'] : '');
    $blog_photo = (isset($_POST['blog_photo']) ? $_POST['blog_photo'] : '');
		
	$upload=$_FILES['head_photo'];
	if($upload != '') { 

	//โฟลเดอร์ที่เก็บไฟล์
	$path="img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['head_photo']['name'],".");
    $typeb = strrchr($_FILES['blog_photo']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$date1.$type;
    $newnameb =$numrandb.$date1.$type;

	$path_copy=$path.$newname;
    $path_copyb=$path.$newnameb;
	$path_link="img/".$newname;
    $path_linkb="img/".$newnameb;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['head_photo']['tmp_name'],$path_copy);  
    move_uploaded_file($_FILES['blog_photo']['tmp_name'],$path_copyb);  
		
	}

			 $sql = "INSERT INTO Blog (heading, author_name, category_id, article, head_photo ,blog_photo) 
                         VALUES ('$heading', '$author_name','$category', '$article', '$newname','$newnameb');";
		
		$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

	if($result){
        echo "<script type='text/javascript'>";
        echo "alert('เพิ่มบทความเรียบร้อยแล้ว');";
        echo "window.location = 'main.html'; ";
        echo "</script>";
	}
	else{
        echo "<script type='text/javascript'>";
        echo "alert('เกิดข้อผิดพลาด');";
        echo "window.location = 'main.html'; ";
        echo "</script>";
	  }
	  
 ?>
</body>
</html>