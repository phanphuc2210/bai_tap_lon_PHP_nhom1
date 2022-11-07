<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Đếm phần tử, ghép mảng và sắp xếp</title>
<style type="text/css">
	table{
		color: #000;
		background-color: #d0ddd3;	
		padding: 4px;	
	}

	table th{
		background-color: #329998;
		font-style: vni-times;
		color: white;
	}
</style>
</head>
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 9:</u> Thiết kế Form Đếm phần tử, ghép mảng và sắp xếp</a></h2>
<body>
	<?php 
	$mangA="";
	$mangB="";
	$mangC="";
	$slA="";
	$slB="";
	$tang="";
	$giam="";

	if(isset($_POST['thuchien'])){
		$mangA= trim($_POST['mangA']);
		$arrA=explode(",",$mangA);

		$mangB= trim($_POST['mangB']);
		$arrB=explode(",",$mangB);

		$slA = count($arrA);
		$slB = count($arrB);

		$arrC = array_merge($arrA, $arrB);
		$mangC = implode(", ", $arrC);

		sort($arrC);
		$tang = implode(", ",  $arrC);
		rsort($arrC);
		$giam = implode(", ",  $arrC);
	}

	?>

	<form action="" method="post">
		<table border="0" cellpadding="0">
			<th colspan="2"><h2>Đếm phần tử, ghép mảng và sắp xếp</h2></th>
			<tr>
				<td>Mảng A:</td>
				<td><input type="text" name="mangA" size= "70" value="<?php echo $mangA;?> "/></td>
			</tr>

			<tr>
				<td>Mảng B:</td>
				<td><input type="text" name="mangB" size= "70" value="<?php echo $mangB;?> "/></td>
			</tr>

			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="thuchien"  size="20" value="Thực hiện"/>
				</td>
			</tr>

			<tr>
				<td>Số phần tử mảng A:</td>
				<td><input type="text" name="slA" size= "70" disabled="disabled" value="<?php echo $slA;?> "/></td>
			</tr>

			<tr>
				<td>Số phần tử mảng B:</td>
				<td><input type="text" name="slB" size= "70" disabled="disabled" value="<?php echo $slB;?> "/></td>
			</tr>

			<tr>
				<td>Mảng C:</td>
				<td><input type="text" name="mangC" size= "70" disabled="disabled" value="<?php echo $mangC;?> "/></td>
			</tr>

			<tr>
				<td>Mảng C tăng dần:</td>
				<td><input type="text" name="tang" size= "70" disabled="disabled" value="<?php echo $tang;?> "/></td>
			</tr>

			<tr>
				<td>Mảng C giảm dần:</td>
				<td><input type="text" name="giam" size= "70" disabled="disabled" value="<?php echo $giam;?> "/></td>
			</tr>

			<tr >
				<td colspan="2" align="center">
					<label>
						(<span style="color: red;">Ghi chú: </span>Các phần tử trong mảng sẽ cách nhau bằng dấu ",")
					</label>
				</td>
			</tr>

		</table>
	</form>
</body>
</html>