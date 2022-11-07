<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Sắp xếp mảng</title>

<style type="text/css">
	table{
		color: #000;
		background-color: #d0ddd3;		
	}

	table th{
		background-color: #329998;
		font-style: vni-times;
		color: white;
	}
</style>

</head>
<body>
<h3 class="mb-4"><u class="fw-bold text-origin">Bài 8:</u> Thiết kế Form Sắp xếp mảng</a></h2>
<?php 
function hoanVi(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function sapTang($arr) {
    $n = count($arr);
    for($i = 0; $i < $n - 1; $i++) {
        for($j = $i + 1; $j < $n; $j++) {
            if($arr[$i] > $arr[$j]) {
                hoanVi($arr[$i], $arr[$j]);
            }
        }
    }

    return $arr;
}

function sapGiam($arr) {
    $n = count($arr);
    for($i = 0; $i < $n - 1; $i++) {
        for($j = $i + 1; $j < $n; $j++) {
            if($arr[$i] < $arr[$j]) {
                hoanVi($arr[$i], $arr[$j]);
            }
        }
    }

    return $arr;
}


$str="";
$tang="";
$giam="";


if(isset($_POST['tinh'])){
	$str=$_POST['mang'];
	$arr=explode(",",$str);

    $tang = implode(", ", sapTang($arr));
    $giam = implode(", ", sapGiam($arr));
}

?>

	<form action="" method="post">
		<table border="0" cellpadding="0">
			<th colspan="2"><h2>SẮP XẾP MẢNG</h2></th>
			<tr>
				<td>Nhập mảng:</td>
				<td><input type="text" name="mang" size= "70" value="<?php echo $str;?> "/></td>
			</tr>


			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="tinh"  size="20" value="Sắp xếp tăng/giảm"/>
				</td>
			</tr>

            <tr>
                <td colspan="2" style="color: red;">
                    Sau khi sắp xếp:
                </td>
            </tr>

			<tr>
				<td>Tăng dần:</td>
				<td><input type="text" name="tang" size= "70" disabled="disabled" value="<?php echo $tang;?> "/></td>
			</tr>

			
			<tr>
				<td>Giảm dần:</td>
				<td><input type="text" name="giam" size= "70" disabled="disabled" value="<?php echo $giam;?> "/></td>
			</tr>

			<tr >
				<td colspan="2" align="center">
					<label>
						(<span style="color: red;">(*) </span>Các phần tử trong mảng sẽ cách nhau bằng dấu ",")
					</label>
				</td>
			</tr>

		</table>
	</form>
</body>
</html>