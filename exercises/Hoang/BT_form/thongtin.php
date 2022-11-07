<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thông Tin Đăng Nhập</title>
    <style type="text/css">
        fieldset{
            width: fit-content;
        }
        table{
            text-align: left;
        }
        h3{
            font-family: verdana;
            text-align: center;
            /* text-anchor: middle; */
            font-size: medium;
        }
    </style>
</head>
<body>
<?php 
// if(isset($_POST['gui'])){
//     if(empty($_POST['name'])){
//         echo "<font color='red'>Mời nhập họ tên</font>";
//     } else {
//         if (is_numeric($old) && is_numeric($new) && is_numeric($_POST['dg']) && $new > $old)  
//         $total=($new - $old) * $_POST['dg'];
//         else {
//             echo "<font color='red'>Vui lòng nhập đúng số liệu! </font>";
//             $total="";
//         }
//     }
// }
if(isset($_POST['name']))  
    $name=trim($_POST['name']);
else $name='';
if(isset($_POST['dc'])) 
    $dc=trim($_POST['dc']); 
else $dc='';
if(isset($_POST['sdt'])) 
    $sdt=trim($_POST['sdt']); 
else $sdt='';
if(isset($_POST['gt'])) 
    $gt=trim($_POST['gt']); 
else $gt='';
if(isset($_POST['qt'])) 
    $qt=trim($_POST['qt']); 
else $qt='';
if(isset($_POST['sub'])) {
    $sub=trim($_POST['sub']); 
}
else $sub='';
if(isset($_POST['note'])) 
    $note=trim($_POST['note']); 
else $note='';

?>
<fieldset>
    <legend>Enter your information</legend>
<form align='center' action="xulythongtin.php" method="post">
<table>
    <tr>
        <td>Họ tên:</td>
        <td>
            <input type="text" name="name" value="" required />
        </td>
    </tr>
    <tr>
        <td>Địa chỉ:</td>
        <td>
            <input type="text" name="dc" value=" " required/>
        </td>
    </tr>
    <tr>
        <td>Số điện thoại:</td>
        <td><input type="text" name="sdt"  value=" " required/></td>
    </tr>
    <tr>
        <td>Giới tính:</td>
        <td>
            <input type="radio" name='gt' value="nam" id="nam" required checked>   
            <label for="nam">Nam</label>
            <input type="radio" name='gt' value="nu" id="nu" required>   
            <label for="nu">Nu</label>
        </td>
    </tr>
    <tr>
        <td>Quốc tịch:</td>
        <td>
            <select name="qt" required >
                <option value="vn" selected>
                    Việt Nam
                </option>
                <option value="en">
                    EngLand
                </option>
                <option value="jp">
                    Nhật Bản
                </option>
            </select>   
        </td>
    </tr>
    <tr>
        <td>Các môn đã học :</td>
        <td>
            <input type="checkbox" name="sub[]" value="PHP" id="php" >
            <label for="php">PHP & mySQL</label>    
            <input type="checkbox" name="sub[]" value="C#" id="C#" >
            <label for="C#">C#</label>  
            <input type="checkbox" name="sub[]" value="XML" id="XML" >
            <label for="XML">XML</label>  
            <input type="checkbox" name="sub[]" value="Python" id="py" >
            <label for="py">Python</label>  
        </td>
    </tr>
    <tr>
        <td>Ghi chú:</td>
        <td>
            <textarea name="note"  id="" cols="20" rows="5" ></textarea>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="submit" value="Gửi" name="gui" />
            <input type="reset" value="hủy" name="huy" />
        </td>
    </tr>

</table>
</form>
</fieldset>
</body>
</html>