<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>tinh dien tich HCN</title>
    <style type="text/css">
        table{
            background: #e7d799;
            border: 0 solid yellow;
        }
        thead{
            background: #e7d93d;    
        }
        td {
            color: blue;
        }
        h3{
            font-family: verdana;
            text-align: center;
            /* text-anchor: middle; */
            color: #ff8100;
            font-size: medium;
        }
    </style>
</head>
<body>
<?php 
if(isset($_POST['old']))  
    $old=trim($_POST['old']);
else $old='';
if(isset($_POST['new'])) 
    $new=trim($_POST['new']); 
else $new='';
if(isset($_POST['dg'])) 
    $dg=trim($_POST['dg']); 
else $dg='';
if(isset($_POST['tinh']))
    if(empty($_POST['name'])){
        echo "<font color='red'>Mời nhập tên chủ hộ</font>";
        $total = 0;
    } else {
        if (is_numeric($old) && is_numeric($new) && is_numeric($_POST['dg']) && $new > $old)  
        $total=($new - $old) * $_POST['dg'];
        else {
            echo "<font color='red'>Vui lòng nhập đúng số liệu! </font>";
            $total="";
        }
    }
    else $total=0;
    

?>
<form align='center' action="" method="post">
<table>
    <thead>
        <th colspan="2" align="center"><h3>Tính Tiền Điện</h3></th>
    </thead>
    <tr>
        <td>Tên chủ hộ:</td>
        <td><input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name'] ?>"/></td>
    </tr>
    <tr>
        <td>Chỉ số cũ:</td>
        <td><input type="text" name="old" value="<?php  echo $old;?> " placeholder="0"/></td>
    </tr>
    <tr>
        <td>Chỉ số mới:</td>
        <td><input type="text" name="new"  value="<?php  echo $new;?> " placeholder="0"/></td>
    </tr>
    <tr>
        <td>Đơn giá:</td>
        <td><input type="text" name="dg" value="<?php  echo $dg;?> "/></td>
    </tr>
    <tr>
        <td>Số tiền thanh toán:</td>
        <td><input type="text" name="total" disabled="disabled" value="<?php  echo $total;?> "/></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
    </tr>
</table>
</form>
</body>
</html>