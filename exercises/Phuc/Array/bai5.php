<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Phát sinh mảng và tính toán</title>

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
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 5:</u> Thiết kế Form phát sinh mảng và tính toán</a></h2>
<?php 
require_once "bai5_ham.php";


if(isset($_POST["n"])){
    $n = trim($_POST["n"]);
} else $n = "";

$mang = "";
$max = "";
$min = "";
$sum = "";

if(isset($_POST['xuly'])){
	if(is_numeric($n) && $n > 0) {
        $arr = taoMang($n);
        $mang = xuatMang($arr);
        $max = timMax($arr);
        $min = timMin($arr);
        $sum = tong($arr);
    } else {
        echo "<p style='color: red;'>Vui lòng nhập số nguyên > 0</p>";
    }
}
?>

<form action="" method="post">

<table border="0" cellpadding="0">

	<th colspan="2"><h2>Phát sinh mảng và tính toán</h2></th>
    <tr>
		<td>Nhập số phần tử:</td>
		<td><input type="text" name="n" size= "70" value="<?php echo $n;?> "/></td>
	</tr>

    <tr>
        <td colspan="2" align="center">
            <input type="submit" name="xuly"  size="20" value="Phát sinh và tính toán"/>
        </td>
    </tr>

	<tr>
		<td>Mảng:</td>
		<td><input type="text" name="mang" size= "70" disabled="disabled" value="<?php echo $mang;?> "/></td>
	</tr>

    <tr>
		<td>GTLN (MAX) trong mảng:</td>
		<td><input type="text" name="max" size= "70" disabled="disabled" value="<?php echo $max;?> "/></td>
	</tr>

    <tr>
		<td>GTNN (MIN) trong mảng:</td>
		<td><input type="text" name="min" size= "70" disabled="disabled" value="<?php echo $min;?> "/></td>
	</tr>

	</tr>
		<td>Tổng mảng:</td>
		<td><input type="text" name="sum" size= "70" disabled="disabled" value="<?php echo $sum;?> "/></td>
	</tr>

    <tr >
		<td colspan="2" align="center">
            <label>
                <span style="color: red;">Ghi chú:</span> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20
            </label>
        </td>
	</tr>

	
</table>

</form>

</body>

</html>