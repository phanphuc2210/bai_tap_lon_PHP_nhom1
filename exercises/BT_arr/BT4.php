<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mang tim kiem</title>

<style type="text/css">

	table{

		color: #ffff00;

		background-color: gray;		

	}

	table th{

		background-color: blue;

		font-style: vni-times;

		color: yellow;

	}

</style>

</head>

<body>

<?php

function tongdayso($arr){
    $T = 0;
	foreach($arr as $i){
		$T+=$i;
	}
	return $T;
}

$str="";

$str_kq="";

$ketqua="";

$kq = '';

if(isset($_POST['tinh'])){
	$str=$_POST['mang'];
	echo $str;
	$arr=explode(",",$str);
	print_r($arr);
    $kq = tongdayso($arr);

	$path = 'dulieu_bai2.txt';
$fp = @fopen($path, 'w+');
if (!$fp){
    echo 'mo k file thanh cong';
} else {
    foreach($arr as $i){
        fwrite($fp, $i.' ');
    } 
    fwrite($fp,"\n");   
    fwrite($fp,$kq);
    fclose($fp);
}
}



?>

<form action="" method="post">

<table border="0" cellpadding="0">

	<th colspan="2"><h2>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h2></th>

	<tr>

		<td>Nhập dãy số:</td>

		<td><input type="text" name="mang" size= "70" value="<?php echo $str;?> "/></td>

	</tr>
	<tr>

		<td></td>

		<td><input type="submit" name="tinh"  size="20" value="   Tổng dãy số  "/></td>

	</tr>

	<tr>

		<td>Tổng dãy số:</td>

		<td><input type="text" name="mang_kq" size= "70" disabled="disabled" value="<?php echo $kq; ?> "/></td>

	</tr>
</table>

</form>

</body>

</html>

