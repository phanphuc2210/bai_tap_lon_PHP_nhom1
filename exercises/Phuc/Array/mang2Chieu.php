<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Ma trận</title>
</head>
<body>
<h3 class="mb-4"><u class="fw-bold text-origin">Bài tập:</u> Tạo và hiển thị ma trận số nguyên</a></h2>
<?php
	function taoMaTran($dong, $cot) {
		$arr=array();

		for($i=0;$i<$dong;$i++) {
			for($j=0; $j<$cot; $j++) {
				$x=rand(-1000,1000);
				$arr[$i][$j]=$x;
			}
		}

		return $arr;
	}


	function inMaTran($arr, $dong, $cot){
		global $ketqua;
		$ketqua="Ma trận được tạo là:"."&#13;&#10;";
		for($i=0;$i<$dong;$i++) {
			for($j=0; $j<$cot; $j++) {
				$ketqua .= $arr[$i][$j]."      ";
			}
			$ketqua .= "&#13;&#10;";
		}
	}

	function hienThiDongChanCotLe($arr, $dong, $cot) {
		global $ketqua;
		$ketqua.="Các phần tử thuộc dòng chẵn cột lẻ là:"."&#13;&#10;";
		for($i=0;$i<$dong;$i++) {
			for($j=0; $j<$cot; $j++) {
				if($i % 2 == 0 && $j % 2 != 0)
					$ketqua .= $arr[$i][$j]."   ";
			}
		}

		$ketqua .= "&#13;&#10;";
	}

	function tongBoiSo10($arr, $dong, $cot) {
		$sum = 0;
		
		for($i=0;$i<$dong;$i++) {
			for($j=0; $j<$cot; $j++) {
				if($arr[$i][$j] % 10 == 0)
					$sum += $arr[$i][$j];
			}
		}

		return $sum;
	}

	if(isset($_POST['dong'])) 
        $dong=trim($_POST['dong']);
	else $dong=0;

	if(isset($_POST['cot'])) 
        $cot=trim($_POST['cot']);
	else $cot=0;

	$ketqua="";

	if(isset($_POST['hthi'])) 
	{	
		if(is_int((int)$_POST['dong']) && ((int)$_POST['dong'] >= 2 && (int)$_POST['dong'] <=5) 
			&& is_int((int)$_POST['cot']) && ((int)$_POST['cot'] >= 2 && (int)$_POST['cot'] <=5)) {
			
			// Tạo ma trận 
			$arr = taoMaTran($dong, $cot);

			//In ra mảng vừa tạo
			inMaTran($arr, $dong, $cot);

			//Hiển thị các phần tử thuộc dòng chẵn cột lẻ.
			hienThiDongChanCotLe($arr, $dong, $cot);

			// Tính tổng các phần tử là bội số của 10.  
			$ketqua.="Tính tổng các phần tử là bội số của 10 là: ". tongBoiSo10($arr, $dong, $cot). "&#13;&#10";
			tongBoiSo10($arr, $dong, $cot);

		}
		else {
			echo "<p style='color: red;'>Số hàng và cột phải là số và >= 2 và <= 5</p>";
		}
	}
?>

    <form action="" method="post">
		<table>
            <tr>
                <td>Nhập số dòng:</td>
                <td>
                    <input type="text" name="dong" value="<?php echo $dong?>"/>
                    <span>(2 <= dòng <= 5)</span>
                </td>
            </tr>

            <tr>
                <td>Nhập số cột:</td>
                <td>
                    <input type="text" name="cot" value="<?php echo $cot?>"/>
                    <span>(2 <= dòng <= 5)</span>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" name="hthi" value="Hiển thị"/><br></td>
            </tr>

			<tr>
				<td colspan="2">
				Kết quả: <br>
        		<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>
				</td>
			</tr>
        </table>
        
    </form>
</body>
</html>