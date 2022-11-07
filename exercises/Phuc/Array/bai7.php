<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mảng thay thế</title>

<style type="text/css">
	table{
		color: #000;
		background-color: pink;		
	}

	table th{
		background-color: purple;
		font-style: vni-times;
		color: white;
	}
</style>

</head>
<body>
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 7:</u> Thiết kế Form thay thế</a></h2>
<?php 
function xuatMang($arr) {
    $mang = "";
    foreach($arr as $i) {
        $mang .= $i."  ";
    }

    return $mang;
}

function thayThe($arr, $cu, $moi) {
    foreach($arr as $key => $i) {
        if($i == $cu) {
            $arr[$key] = $moi;
        }
    }
    return $arr;
}

$str="";
$thaythe="";
$str_cu="";
$ketqua="";

if(isset($_POST['so'])){
	$so=$_POST['so'];
}

if(isset($_POST['thaythe'])){
	$thaythe=$_POST['thaythe'];
}

if(isset($_POST['so']) && isset($_POST['thaythe']) && isset($_POST['tinh'])){
	$str=$_POST['mang'];
	$arr=explode(",",$str);

    //Xuất mảng cũ
	$str_cu = xuatMang($arr);

    //Xuất mảng sau khi thay the
    $ketqua = xuatMang(thayThe($arr, $so, $thaythe));
}

?>

	<form action="" method="post">
		<table border="0" cellpadding="0">
			<th colspan="2"><h2>THAY THẾ</h2></th>
			<tr>
				<td>Nhập các phần tử:</td>
				<td><input type="text" name="mang" size= "70" value="<?php echo $str;?> "/></td>
			</tr>

			<tr>
				<td>Giá trị cần thay thế:</td>
				<td><input type="text" name="so" size="20" value="<?php if(isset($_POST['so'])) echo $_POST['so'];?> "/></td>
			</tr>

            <tr>
				<td>Giá trị thay thế:</td>
				<td><input type="text" name="thaythe" size="20" value="<?php if(isset($_POST['thaythe'])) echo $_POST['thaythe'];?> "/></td>
			</tr>

			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="tinh"  size="20" value="   Thay thế  "/>
				</td>
			</tr>

			<tr>
				<td>Mảng cũ:</td>
				<td><input type="text" name="mang_cu" size= "70" disabled="disabled" value="<?php echo $str_cu;?> "/></td>
			</tr>

			
			<tr>
				<td>Mảng sau khi thay thế:</td>
				<td><input type="text" name="kq" size= "70" disabled="disabled" value="<?php echo $ketqua;?> "/></td>
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