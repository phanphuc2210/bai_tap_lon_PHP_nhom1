

<h3 class="mb-4"><u class="fw-bold text-origin">Bài 6:</u>Thêm sữa mới</a></h2>
<?php
  // Ket noi CSDL
  require("connect.php");
if(isset($_POST['IDsua']))  
$IDsua=trim($_POST['IDsua']);
else $IDsua="";
if(isset($_POST['name']))  
    $name=trim($_POST['name']);
else $name="";
if(isset($_POST['hang']))  
    $hang=trim($_POST['hang']);
else $hang="";
if(isset($_POST['loai']))  
    $loai=trim($_POST['loai']);
else $loai="";
if(isset($_POST['wei']))  
    $wei=trim($_POST['wei']);
else $wei="";
if(isset($_POST['price']))  
    $price=trim($_POST['price']);
else $price="";
if(isset($_POST['tp']))  
    $tp=trim($_POST['tp']);
else $tp="";
if(isset($_POST['bene']))  
    $bene=trim($_POST['bene']);
else $bene="";
if(isset($_FILES['ProductImg']))  
    $ProductImg= $_FILES['ProductImg']['name'];
else $ProductImg="";

if(isset($_POST['add'])){  
    if(isset($_FILES['ProductImg']['name']) && $_FILES['ProductImg']['name'] != NULL)
    {
        $error = array();
        $file_name = $_FILES['ProductImg']['name'];
        $file_size = $_FILES['ProductImg']['size'];
        $file_tmp = $_FILES['ProductImg']['tmp_name'];
        $file_type = $_FILES['ProductImg']['type'];
        $file_ext = @strtolower(end(explode('.',$_FILES['ProductImg']['name'])));
        $expensions= array('jpeg', 'jpg', 'png');
        if(in_array($file_ext,$expensions) == false){
            $error[] = "Don't accept image files with extension, please choose JPEG or PNG extension.";

        }
        if($file_size > 2097152){
            $error[] = 'File size should be 2MB';
        }
        if(empty($error)==true){
            move_uploaded_file($file_tmp,
                    "..\\..\\Hinh_sua\\".$file_name);
            echo "Successfully uploaded";
        }
    }
    $sql =  "INSERT INTO sua VALUES ('$IDsua','$name','$hang','$loai',$wei,$price,'$tp','$bene','$ProductImg')";
    $result = mysqli_query($conn, $sql);
    if (!$result){
        die ('Câu truy vấn bị sai');
    } else {
        echo 'Thêm sữa mới thành công';
    }
    $rows = mysqli_fetch_array($result);
    print_r($rows);
}

?>
<?php

?>
<form action="" method="post" enctype="multipart/form-data">
    <table style="width:500px;" align="center" bgcolor="#20B2AA" cellpadding="2" cellspacing="2">
        <tr bgcolor="#008080">
            <th colspan="3" align="center"><h3 class="text-center"><i><font color="white">THÊM SỮA MỚI</font></i></h3></th>
        </tr>
        <tr>
            <td>Mã sữa:</td>
            <td><input id='IDsua' type="text" name="IDsua" value="" size="30"/></td>
        </tr>
        <tr>
            <td>Tên sữa:</td>
            <td><input id="name" type="text" name="name" value="" size="30"/></td>
        </tr>
        <tr>
            <td>Hãng sữa:</td>
            <td>
                <?php
                    $result = mysqli_query($conn, 'SELECT Ma_hang_sua, Ten_hang_sua 
                    FROM hang_sua');
                    echo '<select name="hang">';
                    if(mysqli_num_rows($result)<>0)
                    {
                        while($rows=mysqli_fetch_row($result))
                        {       
                            echo "<option value='$rows[0]'>
                            $rows[1]
                        </option>";
                        }
                    }
                    echo '</select>';
                ?>
            </td>
        </tr>
        <tr>
            <td>Loại sữa:</td>
            <td>
            <?php
                    $result = mysqli_query($conn, 'SELECT Ma_loai_sua, Ten_loai 
                    FROM loai_sua');
                    echo '<select name="loai">';
                    if(mysqli_num_rows($result)<>0)
                    {
                        while($rows=mysqli_fetch_row($result))
                        {       
                            echo "<option value='$rows[0]'>
                            $rows[1]
                        </option>";
                        }
                    }
                    echo '</select>';
                ?>
            </td>
        </tr>
        <tr>
            <td>Trọng lượng:</td>
            <td><input id="wei" type="text" name="wei" value="" size="30"/></td>
        </tr>
        <tr>
            <td>Đơn giá:</td>
            <td><input id="price" type="text" name="price" value="" size="30"/></td>
        </tr>
        <tr>
            <td>TP dinh dưỡng:</td>
            <td><input id="tp" type="text" name="tp" value="" size="30"/></td>
        </tr>
        <tr>
            <td>Lợi ích:</td>
            <td><input id="bene" type="text" name="bene" value="" size="30"/></td>
        </tr>
        <tr>
            <td>Hình ảnh:</td>
            <td><input type="file" name='ProductImg' ></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="add" value="Thêm mới"/>
            </td>
        </tr>

    </table>
</form>