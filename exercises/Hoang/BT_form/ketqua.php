<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>tinh dien tich HCN</title>
    <style type="text/css">
        table{
            text-align: center;
        }
        form{
            display: inline-block;  
        }
        td {
            color: blue;
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
$one = $_POST['one'];
$two = $_POST['two'];
$pt = $_POST['pt'];
if(isset($_POST['tinh']))
        
        if (is_numeric($one) && is_numeric($two) && isset($_POST['pt'])){
            switch ($_POST['pt']) {
                case 'plus':
                    $pt = 'Cộng';
                    $kq = $one + $two;
                    break;
                case 'minus':
                    $pt = 'trừ';
                    $kq = $one - $two;
                    break;
                case 'times':
                    $pt = 'Nhân';
                    $kq = $one - $two;
                    break;
                case 'divide':
                    $pt = 'Chia';
                    $kq = $one / $two;
                    break;
            }
        } 
        else {
                echo "<font color='red'>Vui lòng nhập vào số! </font>";
                $kq="";
            }
else $kq=0;
?>
<form align='center' action="" method="post">
<table>
    <thead>
        <th colspan="2" align="center"><h3>PHÉP TÍNH TRÊN 2 SỐ</h3></th>
    </thead>
    <tr>
        <td>Chọn phép Tính:</td>
        <td>
            <?php echo $pt ?>
        </td>
    </tr>
    <tr>
        <td>Số thứ nhất:</td>
        <td><input type="text" name="one" value="<?php  echo $one;?> "/></td>
    </tr>
    <tr>
        <td>Số thứ hai:</td>
        <td><input type="text" name="two"  value="<?php  echo $two;?> "/></td>
    </tr>
    <tr>
        <td>Kết quả:</td>
        <td><input type="text" name="kq"  value="<?php  echo $kq;?> "/></td>
    </tr>
</table>
<a href="javascript:window.history.back(-1);">Tro ve trang truoc</a>
</form>
</body>
</html>