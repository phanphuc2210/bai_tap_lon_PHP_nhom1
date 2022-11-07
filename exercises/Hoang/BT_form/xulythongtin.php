<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>tinh dien tich HCN</title>
    <style type="text/css">
        form{
            width: 30%;
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
$name = $_POST['name'];
$dc = $_POST['dc'];
$sdt = $_POST['sdt'];
$gt = $_POST['gt'];
// $sub = $_POST['sub'];
$qt = $_POST['qt'];
if(isset($_POST['sub'])) {
    $sub=[];
    array_push($sub,$_POST['sub']); 
}
$note = $_POST['note'];
?>
<form align='center' action="" method="post">
<table>
    <thead>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập: </thead>
    <tr>
        <td>Họ tên: <?php echo $name ?></td>
        
    </tr>
    <tr>
        <td>Địa chỉ: <?php echo $dc ?></td>
    </tr>
    <tr>
        <td>Số điện thoại: <?php echo $sdt ?></td>
    </tr>
    <tr>
        <td>Giới tính: <?php echo $gt ?></td>
    </tr>
    <tr>
        <td>Quốc tịch: <?php echo $qt ?></td>
    </tr>
    <tr>
        <td>Các môn đã học: <?php 
        if(!empty($_POST['sub'])){
           $out = implode(', ',$_POST['sub']);
            echo $out;
        }
        ?></td>
    </tr>
    <tr>
        <td>Ghi chú: <?php echo $note ?></td>
    </tr>
    </table>
    <a href="javascript:window.history.back(-1);">Tro ve trang truoc</a>
</form>
</body>
</html>