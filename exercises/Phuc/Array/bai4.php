<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tổng mảng</title>

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
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 4:</u> Thiết kế Form nhập và tính trên dãy số</a></h2>
<?php 
function tong($arr) {
    $sum = 0;
    foreach($arr as $i){
        $sum += $i;
    }

    return $sum;
}

$str="";
$ketqua="";
$f = @fopen("dulieu_bai2.txt", "w+");


if(isset($_POST['tinh'])){
	$str=$_POST['mang'];
	$arr=explode(",",$str);

    if(!$f){
        echo "Mo file khong thanh cong";
    } else {
        foreach($arr as $i){
            fwrite($f, $i."  ");
        }
        fclose($f);
    }

	$tong=tong($arr);

	$ketqua = $tong;
}

?>

<form action="" method="post">

<table border="0" cellpadding="0">

	<th colspan="2"><h2>Nhập và tính trên dãy số</h2></th>

	<tr>

		<td>Nhập mảng:</td>

		<td><input type="text" name="mang" size= "70" value="<?php echo $str;?> "/></td>

	</tr>

	<tr>

		<td></td>

		<td><input type="submit" name="tinh"  size="20" value="   Tổng dãy số  "/></td>

	</tr>
		<td>Tổng dãy số:</td>

		<td><input type="text" name="kq" size= "70" disabled="disabled" value="<?php echo $ketqua;?> "/></td>
	</tr>

	
</table>

</form>

</body>

</html>