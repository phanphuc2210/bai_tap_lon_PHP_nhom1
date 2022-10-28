<?php # Script 3.4 - index.php
$page_title = 'Thiết kế Form nhập và tính trên dãy số';
include ('../../includes/header.html');
?>
<div class="d-flex">
    <?php 
    include ('../includes/sidebar.html');
    ?>
    <div class="w-80 p-3">
		<h3 class="mb-4"><u class="fw-bold text-origin">Bài 4:</u>Thiết kế Form nhập và tính trên dãy số</a></h2>

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
	$arr=explode(",",$str);
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
</div>
</div>
<?php
include ('../../includes/footer.html');
?>

