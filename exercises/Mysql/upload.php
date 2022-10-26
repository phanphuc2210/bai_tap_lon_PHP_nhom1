<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Upload</title>
    <!-- <style>
        tr:nth-child(even){
            background-color: bisque;
        }
    </style> -->
</head>
<body>
<?php
if($_FILES['ProductImg']['name'] != NULL)
{
    $error = array();
    $file_name = $_FILES['ProductImg']['name'];
    $file_size = $_FILES['ProductImg']['size'];
    $file_tmp = $_FILES['ProductImg']['tmp_name'];
    $file_type = $_FILES['ProductImg']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['ProductImg']['name'])));
    $expensions= array('jpeg', 'jpg', 'png');
    if(in_array($file_ext,$expensions) == false){
        $error[] = "Don't accept image files with extension, please choose JPEG or PNG extension.";

    }
    if($file_size > 2097152){
        $error[] = 'File size should be 2MB';
    }
    if(empty($error)==true){
        move_uploaded_file($file_tmp,"D:\\PHP\\Mysql\\files\\".$file_name);
        echo "Successfully uploaded";
    }
    // move_uploaded_file($_FILES["ProductImg"]["tmp_name"],
    // "D:\\PHP\\Mysql\\files\\".$_FILES["ProductImg"]["name"]);
    // echo "<h3>Upload thành công</h3>";
    // echo "Name: " .$_FILES["ProductImg"]["name"]."<br>";
    // echo "Type: " .$_FILES["ProductImg"]["type"]."<br>";
    // echo "Size: " .($_FILES["ProductImg"]["size"]/1024)."Kb<br>";
    // echo "Temp. Stored in: ".$_FILES["ProductImg"]["tmp_name"];
    // }
    // else echo "Vui lòng chọn file upload!";
}
?>
<form action="" method="post" enctype="multipart/form-data">
    Tên file: <input type="file" name='ProductImg' >
    <input type="submit" value="Submit">
</form>
<?php 

?>
</body>
</html>
