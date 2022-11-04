<?php # Script 3.4 - index.php
$page_title = 'Thiết kế Form Phát sinh mảng và tính toán';
include ('../../includes/header.php');
?>
<style>
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

<div class="d-flex">
     
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 5:</u>Thiết kế Form Phát sinh mảng và tính toán</a></h2>
<?php
$n = isset($_POST['mang'])? $_POST['mang'] : '';
function makeArr(){
    $n = $_POST['mang'];
	$arr = array();
	for($i=0;$i<$n;$i++){
		$arr[$i]= rand(0,20);
	}
    return $arr;
}

function tongdayso($arr){
    $T = 0;
	foreach($arr as $i){
		$T+=(int)$i;
	}
	return $T;
}

function xuatmang($arr){
	$kq='';
    for($i=0;$i<count($arr);$i++){
        $kq.= $arr[$i].' ';
    }
	return $kq;
}

function Fmax($arr){
    $max = $arr[0];
    for($i=0;$i<count($arr);$i++){
        if($max < $arr[$i]){
            $max = $arr[$i];
        }
    }
    return $max;
}

function Fmin($arr){
    $min = $arr[0];
    for($i=0;$i<count($arr);$i++){
        if($min > $arr[$i]){
            $min = $arr[$i];
        }
    }
    return $min;
}

$ketqua="";

$kq = '';

$min = '';

$max = '';

$xuat = '';

if(isset($_POST['tinh'])){
	$arr = makeArr();
    $kq = tongdayso($arr);
	$xuat = xuatmang($arr);
	$max=Fmax($arr);
	$min=Fmin($arr);
}



?>

<form action="" method="post">

<table border="0" cellpadding="0">

	<th colspan="2"><h2>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h2></th>

	<tr>

		<td>Nhập số phần tử:</td>

		<td><input type="text" name="mang" size= "70" value="<?php echo $n;?> "/></td>

	</tr>
	<tr>

		<td></td>

		<td><input type="submit" name="tinh"  size="20" value="   Phát sinh và tính toán  "/></td>

	</tr>
	<tr>

		<td>Mảng:</td>

		<td><input type="text" name="mang_kq" size= "70" disabled="disabled" value="<?php echo $xuat; ?> "/></td>

	</tr>
	<tr>

		<td>GTLN trong mảng:</td>

		<td><input type="text" name="mang_kq" size= "70" disabled="disabled" value="<?php echo $max; ?> "/></td>

	</tr>
	<tr>

		<td>GTNN trong mảng:</td>

		<td><input type="text" name="mang_kq" size= "70" disabled="disabled" value="<?php echo $min; ?> "/></td>

	</tr>

	<tr>

		<td>Tổng mảng:</td>

		<td><input type="text" name="mang_kq" size= "70" disabled="disabled" value="<?php echo $kq; ?> "/></td>

	</tr>
</table>

</form>
</div>
</div>
<?php
include ('../../includes/footer.html');
?>


