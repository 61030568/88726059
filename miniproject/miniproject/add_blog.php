<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Baby Blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    table, th, td {
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      text-align: left;    
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
      
      
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6"> <br />
      <hr />
      <form action="add_blog_db.php" method="POST" enctype="multipart/form-data"  name="addprd" class="form-horizontal" id="addprd">
        <div class="form-group">
          <div class="col-sm-12">
            <p> ชื่อเรื่อง/บทนำ </p>
            <input type="text"  name="heading" class="form-control" required placeholder="ชื่อเรื่อง" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> บทความ </p>
            <textarea name="article"></textarea>
            <script src="./tinymce/tinymce.min.js"></script>
                    <script>
                    tinymce.init({
                        selector: "textarea",theme: "modern",width: 500,height: 300,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                      ],
                      toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                      toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                      image_advtab: true ,
                      
                      external_filemanager_path:"./filemanager/",
                      filemanager_title:"Responsive Filemanager" ,
                      external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
                      ,relative_urls:false,
                      remove_script_host:false,
                      document_base_url:"http://localhost:8000/miniproject"
                    });
                    </script>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8 info">
            <p> หมวดหมู่ </p>
            <select id="category" name="category">
                <?php
                // connect database 
                $db_host = "laravel-db";
                $db_user = "root";
                $db_password = "123456";
                $db_name = "Blog";
            
                $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
                $mysqli->set_charset("utf8");
                
            
                $sql = "SELECT *
                        FROM Category
                        ORDER BY 1";
                $result = $mysqli->query($sql);
            
                while($row = $result->fetch_object()) {
                    echo "<option value='$row->category_id '>$row->category</option>";
                }
            ?>
    </select>
          </div>
              </br>
          <div class="col-sm-3">
            <p> ผู้เขียน</p>
            <input type="text"  name="author_name" class="form-control" required placeholder="นามปากกา" />
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-8 info">
            <p> ภาพหน้าปก </p>
            <input type="file" name="head_photo" class="form-control" />
          </div>
          <div class="col-sm-8 info">
            <p> ภาพในบทความ </p>
            <input type="file" name="blog_photo" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" name="btnadd"> + เพิ่มบทความ </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>